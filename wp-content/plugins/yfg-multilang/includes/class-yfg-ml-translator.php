<?php
/**
 * Translation engine + cache for YFG Multilingual.
 *
 * Collects every translatable string on a page, translates the uncached
 * ones in a few BATCHED requests to the Google translate engine (joined by
 * newlines), caches them in a DB table, then applies them to the DOM.
 *
 * @package YFG_Multilang
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class YFG_ML_Translator {

	/** In-request memory cache: [lang][md5] => translation. */
	protected static $mem = array();

	/** Per-request API deadline (microtime float) — warm()/batch() ise dekh ke rukte hain (hang na ho). */
	protected static $deadline = 0;

	public static function table() {
		global $wpdb;
		return $wpdb->prefix . 'yfg_ml_cache';
	}

	public static function create_table() {
		global $wpdb;
		$table   = self::table();
		$charset = $wpdb->get_charset_collate();
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta(
			"CREATE TABLE {$table} (
				id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
				lang VARCHAR(5) NOT NULL,
				src_hash CHAR(32) NOT NULL,
				translation LONGTEXT NOT NULL,
				PRIMARY KEY (id),
				UNIQUE KEY lang_hash (lang, src_hash)
			) {$charset};"
		);
	}

	public static function get_cached( $lang, $core ) {
		$hash = md5( $core );
		if ( isset( self::$mem[ $lang ][ $hash ] ) ) {
			return self::$mem[ $lang ][ $hash ];
		}
		global $wpdb;
		$table = self::table();
		$row   = $wpdb->get_var( $wpdb->prepare( "SELECT translation FROM {$table} WHERE lang = %s AND src_hash = %s", $lang, $hash ) );
		if ( null !== $row ) {
			self::$mem[ $lang ][ $hash ] = $row;
		}
		return $row;
	}

	public static function store( $lang, $core, $translation ) {
		$hash = md5( $core );
		self::$mem[ $lang ][ $hash ] = $translation;
		global $wpdb;
		$wpdb->replace(
			self::table(),
			array(
				'lang'        => $lang,
				'src_hash'    => $hash,
				'translation' => $translation,
			)
		);
	}

	/** Worth translating? Non-empty and contains at least one letter. */
	protected static function worth( $core ) {
		return '' !== $core && preg_match( '/\p{L}/u', $core );
	}

	/** Split into [leading ws, core, trailing ws]. */
	protected static function split_ws( $text ) {
		preg_match( '/^(\s*)(.*?)(\s*)$/su', $text, $m );
		return array( $m[1], $m[2], $m[3] );
	}

	/** Brand / proper nouns that must NEVER be translated. Filterable. */
	protected static function token_map() {
		$terms = apply_filters(
			'yfg_ml_protected_terms',
			array( 'Your Firm Growth', 'yourfirmgrowth.com', 'YourFirmGrowth' )
		);
		$map = array();
		foreach ( array_values( $terms ) as $i => $term ) {
			$map[ 'Xqzb' . $i . 'zqX' ] = $term;
		}
		return $map;
	}

	/** Replace protected terms with survive-translation tokens. */
	protected static function protect( $text ) {
		foreach ( self::token_map() as $token => $term ) {
			$text = str_ireplace( $term, $token, $text );
		}
		return $text;
	}

	/** Put the original protected terms back. */
	protected static function restore( $text ) {
		$map = self::token_map();
		return str_replace( array_keys( $map ), array_values( $map ), $text );
	}

	/** Google translate engine — returns null on failure. */
	public static function api( $text, $to ) {
		// POST use karo (GET nahi) — warna bade batch se URL bahut lamba ho jata hai aur Google
		// fail/hang kar deta hai (yehi asli bug tha: choti strings chalti thीं, badी nahi).
		$url = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=' . rawurlencode( $to ) . '&dt=t';
		$res = wp_remote_post(
			$url,
			array(
				'timeout' => 12,
				'headers' => array( 'User-Agent' => 'Mozilla/5.0' ),
				'body'    => array( 'q' => $text ),
			)
		);
		if ( is_wp_error( $res ) || 200 !== (int) wp_remote_retrieve_response_code( $res ) ) {
			return null;
		}
		$json = json_decode( wp_remote_retrieve_body( $res ), true );
		if ( ! isset( $json[0] ) || ! is_array( $json[0] ) ) {
			return null;
		}
		$out = '';
		foreach ( $json[0] as $seg ) {
			if ( isset( $seg[0] ) ) {
				$out .= $seg[0];
			}
		}
		return '' !== $out ? $out : null;
	}

	/** Public helper: translate a list, return [ source => translation ]. */
	public static function translate_many( $strings, $lang ) {
		self::warm( $strings, $lang );
		$out = array();
		foreach ( $strings as $s ) {
			$out[ $s ] = self::get_cached( $lang, $s );
		}
		return $out;
	}

	/** Translate + cache a list of unique core strings using batched requests. */
	public static function warm( $cores, $lang ) {
		$todo = array();
		foreach ( $cores as $c ) {
			if ( self::worth( $c ) && null === self::get_cached( $lang, $c ) ) {
				$todo[] = $c;
			}
		}
		if ( empty( $todo ) ) {
			return;
		}
		// Per-request API budget + circuit breaker: badi pages ko hang hone se bachata hai.
		// Ek batch fail (rate-limit) hote hi ruk jao; baaki strings agli page-load pe cache hongi (self-heal).
		self::$deadline = microtime( true ) + 15.0;
		$chunk          = array();
		$len            = 0;
		foreach ( $todo as $s ) {
			if ( microtime( true ) > self::$deadline ) {
				break;
			}
			$sl = strlen( $s );
			if ( $chunk && ( $len + $sl > 10000 || count( $chunk ) >= 150 ) ) {
				if ( ! self::batch( $chunk, $lang ) ) {
					return; // Rate-limited — abhi ruk jao (circuit breaker). Baaki agli load pe cache hongi.
				}
				usleep( 400000 ); // 0.4s throttle — bade batches + spacing se burst rate-limit (429) se bachta hai.
				$chunk = array();
				$len   = 0;
			}
			$chunk[] = $s;
			$len    += $sl + 1;
		}
		if ( $chunk && microtime( true ) <= self::$deadline ) {
			self::batch( $chunk, $lang );
		}
	}

	/** Translate one chunk of strings in a single request (newline-joined). */
	protected static function batch( $strings, $lang ) {
		$strings = array_values( $strings );
		$n       = count( $strings );
		if ( 0 === $n ) {
			return true;
		}
		if ( self::$deadline && microtime( true ) > self::$deadline ) {
			return false;
		}
		// Single string: poori translate karke store karo (internal newlines OK — sab isi ka hissa hai).
		if ( 1 === $n ) {
			$t = self::api( self::protect( trim( preg_replace( '/\s+/', ' ', $strings[0] ) ) ), $lang );
			if ( null === $t ) {
				return false;
			}
			self::store( $lang, $strings[0], self::restore( trim( $t ) ) );
			return true;
		}
		$clean = array();
		foreach ( $strings as $s ) {
			$clean[] = self::protect( trim( preg_replace( '/\s+/', ' ', $s ) ) );
		}
		$tr = self::api( implode( "\n", $clean ), $lang );
		if ( null === $tr ) {
			return false; // API fail (rate-limit) — warm() ise dekh ke ruk jayega.
		}
		// Google har segment ke aakhir mein "\n" laga deta hai. Trailing newline hatao, warna line-count
		// hamesha off-by-one hoti thी → batch "fail" ho ke slow fallback chalti thी.
		$lines = explode( "\n", rtrim( $tr, "\n" ) );
		if ( count( $lines ) === count( $strings ) ) {
			foreach ( $strings as $i => $s ) {
				self::store( $lang, $s, self::restore( trim( $lines[ $i ] ) ) );
			}
			return true;
		}
		// Mismatch: Google ne kisi lambी (multi-sentence) string ko extra segments mein toda.
		// 90-individual-requests ki jagah batch ko do halves mein baant ke retry karo — problematic
		// string aakhir mein akeli reh ke poori translate ho jati hai (bounded, no hang).
		$mid = intdiv( $n, 2 );
		$a   = self::batch( array_slice( $strings, 0, $mid ), $lang );
		$b   = self::batch( array_slice( $strings, $mid ), $lang );
		return $a && $b;
	}

	/**
	 * Translate a full HTML document.
	 */
	public static function translate_html( $html, $lang, $home_path, $slug_map = array() ) {
		if ( false === stripos( $html, '<html' ) ) {
			return $html;
		}

		@set_time_limit( 180 ); // phpcs:ignore

		libxml_use_internal_errors( true );
		$dom = new DOMDocument();
		$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $html );
		libxml_clear_errors();

		$xpath = new DOMXPath( $dom );
		$skip  = array( 'script', 'style', 'code', 'pre', 'textarea', 'noscript' );

		$jobs  = array(); // array( node, attr|null, lead, core, trail )
		$cores = array();

		// 1) Collect visible text nodes.
		$nodes = $xpath->query( '//text()[normalize-space(.) != ""]' );
		foreach ( $nodes as $node ) {
			$p       = $node->parentNode;
			$skip_it = false;
			while ( $p && XML_ELEMENT_NODE === $p->nodeType ) {
				$name = strtolower( $p->nodeName );
				if ( in_array( $name, $skip, true ) || 'wpadminbar' === $p->getAttribute( 'id' ) || 'no' === $p->getAttribute( 'translate' ) ) {
					$skip_it = true;
					break;
				}
				$cls = $p->getAttribute( 'class' );
				if ( $cls && false !== strpos( $cls, 'notranslate' ) ) {
					$skip_it = true;
					break;
				}
				$p = $p->parentNode;
			}
			if ( $skip_it ) {
				continue;
			}
			list( $lead, $core, $trail ) = self::split_ws( $node->nodeValue );
			if ( ! self::worth( $core ) ) {
				continue;
			}
			$jobs[]         = array( $node, null, $lead, $core, $trail );
			$cores[ $core ] = true;
		}

		// 2) Collect translatable attributes.
		foreach ( array( 'alt', 'title', 'placeholder', 'aria-label', 'value' ) as $attr ) {
			$els = $xpath->query( '//*[@' . $attr . ']' );
			foreach ( $els as $el ) {
				if ( 'value' === $attr ) {
					$type = strtolower( $el->getAttribute( 'type' ) );
					if ( 'input' === strtolower( $el->nodeName ) && ! in_array( $type, array( 'submit', 'button', 'reset' ), true ) ) {
						continue;
					}
				}
				list( $lead, $core, $trail ) = self::split_ws( $el->getAttribute( $attr ) );
				if ( ! self::worth( $core ) ) {
					continue;
				}
				$jobs[]         = array( $el, $attr, $lead, $core, $trail );
				$cores[ $core ] = true;
			}
		}

		// 3) Collect SEO meta tags.
		$metas = $xpath->query( '//meta[@name="description" or @property="og:title" or @property="og:description" or @name="twitter:title" or @name="twitter:description"]' );
		foreach ( $metas as $meta ) {
			list( $lead, $core, $trail ) = self::split_ws( $meta->getAttribute( 'content' ) );
			if ( ! self::worth( $core ) ) {
				continue;
			}
			$jobs[]         = array( $meta, 'content', $lead, $core, $trail );
			$cores[ $core ] = true;
		}

		// 4) Translate everything (batched) then apply.
		self::warm( array_keys( $cores ), $lang );

		foreach ( $jobs as $job ) {
			list( $node, $attr, $lead, $core, $trail ) = $job;
			$tr = self::get_cached( $lang, $core );
			if ( null === $tr ) {
				continue;
			}
			$val = $lead . $tr . $trail;
			if ( null === $attr ) {
				$node->nodeValue = $val;
			} else {
				$node->setAttribute( $attr, $val );
			}
		}

		// 5) Keep internal links in-language + set <html lang>.
		self::rewrite_links( $xpath, $lang, $home_path, $slug_map );
		$html_el = $dom->getElementsByTagName( 'html' )->item( 0 );
		if ( $html_el ) {
			$html_el->setAttribute( 'lang', $lang );
		}

		$out = $dom->saveHTML();
		$out = preg_replace( '/^<\?xml[^>]*\?>\s*/', '', $out );
		return $out;
	}

	/** Prefix internal links with the current language (and translated slugs). */
	protected static function rewrite_links( $xpath, $lang, $home_path, $slug_map = array() ) {
		$home_host = wp_parse_url( home_url( '/' ), PHP_URL_HOST );
		$links     = $xpath->query( '//a[@href]' );
		foreach ( $links as $a ) {
			// Explicit language links (the switcher has hreflang) must stay exactly as-is.
			if ( $a->hasAttribute( 'hreflang' ) ) {
				continue;
			}
			$href = $a->getAttribute( 'href' );
			if ( '' === $href || '#' === $href[0] ) {
				continue;
			}
			$host = wp_parse_url( $href, PHP_URL_HOST );
			if ( $host && $host !== $home_host ) {
				continue;
			}
			$path = (string) wp_parse_url( $href, PHP_URL_PATH );
			if ( '' === $path || preg_match( '#/wp-(admin|content|includes|json)/#', $path ) || preg_match( '#\.(png|jpe?g|webp|gif|svg|css|js|pdf|zip|ico|mp4|mp3|woff2?|ttf)$#i', $path ) ) {
				continue;
			}
			$rel = trim( $path, '/' );
			if ( '' !== $home_path && 0 === strpos( $rel, $home_path ) ) {
				$rel = trim( substr( $rel, strlen( $home_path ) ), '/' );
			}
			$first = explode( '/', $rel )[0];
			if ( isset( YFG_Multilang::$langs[ $first ] ) ) {
				continue;
			}
			// Translate slug segments (about-us -> uber-uns).
			if ( ! empty( $slug_map ) && '' !== $rel ) {
				$segs = explode( '/', $rel );
				foreach ( $segs as $i => $s ) {
					if ( isset( $slug_map[ $s ] ) ) {
						$segs[ $i ] = $slug_map[ $s ];
					}
				}
				$rel = implode( '/', $segs );
			}
			$new = trailingslashit( home_url( '/' . $lang . '/' . $rel ) );
			$q   = wp_parse_url( $href, PHP_URL_QUERY );
			$f   = wp_parse_url( $href, PHP_URL_FRAGMENT );
			if ( $q ) {
				$new .= '?' . $q;
			}
			if ( $f ) {
				$new .= '#' . $f;
			}
			$a->setAttribute( 'href', $new );
		}
	}
}
