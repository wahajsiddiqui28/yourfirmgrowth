<?php
/**
 * Plugin Name: YFG Multilingual
 * Description: Lightweight multilingual layer — /fr/ and /de/ URLs with automatic, cached Google translation, hreflang tags and a language switcher. No paid API, works with the custom theme.
 * Version: 1.0.0
 * Author: Your Firm Growth
 *
 * @package YFG_Multilang
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'YFG_ML_DIR', plugin_dir_path( __FILE__ ) );

require_once YFG_ML_DIR . 'includes/class-yfg-ml-translator.php';

class YFG_Multilang {

	const DEFAULT_LANG = 'en';

	/** Supported languages. */
	public static $langs = array(
		'en' => array( 'label' => 'English',  'short' => 'EN', 'flag' => '&#127468;&#127463;' ),
		'fr' => array( 'label' => 'Français', 'short' => 'FR', 'flag' => '&#127467;&#127479;' ),
		'de' => array( 'label' => 'Deutsch',  'short' => 'DE', 'flag' => '&#127465;&#127466;' ),
// 		'es' => array( 'label' => 'Spannish',  'short' => 'DE', 'flag' => '&#127465;&#127466;' ),
		'es' => array( 'label' => 'Spanish',  'short' => 'ES', 'flag' => '&#127466;&#127480;' )
	);

	private $current   = 'en';
	private $home_path = '';
	private $rel       = '';
	private $slugmap   = null;

	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'detect' ), 1 );
		add_action( 'init', array( $this, 'maybe_install' ) );
		add_action( 'init', array( $this, 'build_slugs_if_missing' ), 20 );
		add_action( 'save_post', array( $this, 'clear_slugs' ) );
		add_action( 'template_redirect', array( $this, 'maybe_buffer' ), 0 );
		add_action( 'wp_head', array( $this, 'head_tags' ), 1 );
		// Keep WordPress's own redirects (old-slug, canonical/404-guess) in-language.
		add_filter( 'wp_redirect', array( $this, 'localize_redirect' ) );
		add_shortcode( 'yfg_lang_switcher', array( $this, 'switcher_html' ) );

		// Rank Math sitemap: add hreflang alternates (translated slugs) to every entry.
		add_filter( 'rank_math/sitemap/url', array( $this, 'sitemap_entry' ), 10, 2 );
		foreach ( array( 'post', 'page', 'category', 'author', 'post_tag', 'product' ) as $yfg_t ) {
			add_filter( "rank_math/sitemap/{$yfg_t}_urlset", array( $this, 'sitemap_urlset' ) );
		}
	}

	/** Add the xhtml namespace to the sitemap urlset (needed for hreflang). */
	public function sitemap_urlset( $urlset, $type = '' ) {
		if ( false === strpos( $urlset, 'xmlns:xhtml' ) ) {
			$urlset = str_replace( '<urlset ', '<urlset xmlns:xhtml="http://www.w3.org/1999/xhtml" ', $urlset );
		}
		return $urlset;
	}

	/** Append <xhtml:link> hreflang alternates to each sitemap URL entry. */
	public function sitemap_entry( $output, $url = array() ) {
		$loc = ( is_array( $url ) && isset( $url['loc'] ) ) ? $url['loc'] : '';
		if ( '' === $loc || false === strpos( $output, '</url>' ) ) {
			return $output;
		}
		$rel = trim( (string) wp_parse_url( $loc, PHP_URL_PATH ), '/' );
		if ( '' !== $this->home_path && 0 === strpos( $rel, $this->home_path ) ) {
			$rel = trim( substr( $rel, strlen( $this->home_path ) ), '/' );
		}
		$alts = array( self::DEFAULT_LANG => home_url( '/' . $rel ) );
		foreach ( self::extra_langs() as $lang ) {
			$alts[ $lang ] = home_url( '/' . $lang . '/' . $this->tr_path( $rel, $lang ) );
		}
		$alts['x-default'] = home_url( '/' . $rel );
		$xhtml = '';
		foreach ( $alts as $hreflang => $href ) {
			$xhtml .= '<xhtml:link rel="alternate" hreflang="' . esc_attr( $hreflang ) . '" href="' . esc_url( $href ) . '"/>';
		}
		return str_replace( '</url>', $xhtml . '</url>', $output );
	}

	/** Current language code. */
	public function current() {
		return $this->current;
	}

	/** All languages except the default (English), e.g. array( 'fr', 'de' ). */
	public static function extra_langs() {
		return array_values( array_diff( array_keys( self::$langs ), array( self::DEFAULT_LANG ) ) );
	}

	/** Ensure the cache table exists even if activated by copying files. */
	public function maybe_install() {
		if ( '1' !== get_option( 'yfg_ml_db' ) ) {
			YFG_ML_Translator::create_table();
			update_option( 'yfg_ml_db', '1' );
		}
	}

	/**
	 * Detect the language from the URL prefix and, for non-English, rewrite
	 * REQUEST_URI to the English path so WordPress routes to the same content.
	 */
	public function detect() {
		$this->home_path = trim( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ), '/' );
		$uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/';
		$path = trim( (string) wp_parse_url( $uri, PHP_URL_PATH ), '/' );

		$rest = $path;
		if ( '' !== $this->home_path && 0 === strpos( $path, $this->home_path ) ) {
			$rest = trim( substr( $path, strlen( $this->home_path ) ), '/' );
		}

		$segs  = ( '' === $rest ) ? array() : explode( '/', $rest );
		$first = isset( $segs[0] ) ? $segs[0] : '';

		if ( isset( self::$langs[ $first ] ) && self::DEFAULT_LANG !== $first ) {
			$this->current = $first;
			array_shift( $segs );
			// Reverse-map a translated slug (uber-uns) back to the English one (about-us).
			$this->rel = $this->en_path( implode( '/', $segs ), $this->current );

			// Send the visitor to the one canonical URL for this language: adds the
			// trailing slash on the language root (/fr -> /fr/) and swaps an English
			// slug for its translation (/fr/about-us -> /fr/a-propos-de-nous).
			$this->maybe_canonical_redirect( $uri );

			$new_path = '/' . ltrim( $this->home_path . '/' . $this->rel, '/' );
			$new_path = ( '/' === $new_path ) ? '/' : rtrim( $new_path, '/' ) . '/';
			$qs       = wp_parse_url( $uri, PHP_URL_QUERY );
			$_SERVER['REQUEST_URI'] = $new_path . ( $qs ? '?' . $qs : '' );
		} else {
			$this->rel = $rest;
		}

		$this->auto_lang( $uri );

		// Non-English sitemap requests: start the buffer NOW (Rank Math outputs the
		// sitemap and exits on template_redirect:0, before our normal buffer runs).
		if ( self::DEFAULT_LANG !== $this->current && preg_match( '#sitemap[^/]*\.xml#i', (string) $uri ) ) {
			ob_start( array( $this, 'sitemap_buffer_cb' ) );
		}
	}

	/** Output-buffer callback for language sitemaps. */
	public function sitemap_buffer_cb( $xml ) {
		if ( false === strpos( $xml, '<urlset' ) && false === strpos( $xml, '<sitemapindex' ) ) {
			return $xml;
		}
		return $this->translate_sitemap( $xml );
	}

	/**
	 * First-visit auto language: redirect to the visitor's browser language
	 * once (remembered with a cookie so their manual choice is respected).
	 */
	private function auto_lang( $orig_uri ) {
		if ( ! isset( $_SERVER['REQUEST_METHOD'] ) || 'GET' !== $_SERVER['REQUEST_METHOD'] ) {
			return;
		}
		if ( preg_match( '#(/wp-admin|/wp-login|/wp-json|/wp-cron|/xmlrpc|\.xml|/feed)#i', (string) $orig_uri ) ) {
			return;
		}
		$cookie = isset( $_COOKIE['yfg_ml_lang'] ) ? sanitize_key( $_COOKIE['yfg_ml_lang'] ) : '';

		// Truly first visit, on an un-prefixed (English) URL → detect & redirect once.
		if ( '' === $cookie && self::DEFAULT_LANG === $this->current ) {
			$pref = $this->accept_language();
			@setcookie( 'yfg_ml_lang', $pref, time() + MONTH_IN_SECONDS, '/' ); // phpcs:ignore
			if ( self::DEFAULT_LANG !== $pref ) {
				wp_safe_redirect( home_url( '/' . $pref . '/' . $this->rel ), 302 );
				exit;
			}
			return;
		}

		// Remember whichever language the visitor is currently viewing.
		if ( $cookie !== $this->current ) {
			@setcookie( 'yfg_ml_lang', $this->current, time() + MONTH_IN_SECONDS, '/' ); // phpcs:ignore
		}
	}

	/**
	 * Redirect a prefixed URL to its single canonical form (301):
	 *   /fr          -> /fr/                  (language root keeps its trailing slash)
	 *   /fr/about-us -> /fr/a-propos-de-nous  (English slug -> translated slug)
	 *
	 * The target is exactly what the switcher and in-page links use ( lang_url() ),
	 * so a URL that is already correct matches and never redirects — no loops.
	 * Runs only for non-English requests (English is handled by WordPress itself).
	 *
	 * @param string $orig_uri The original, un-rewritten REQUEST_URI.
	 */
	private function maybe_canonical_redirect( $orig_uri ) {
		$method = isset( $_SERVER['REQUEST_METHOD'] ) ? strtoupper( sanitize_key( $_SERVER['REQUEST_METHOD'] ) ) : 'GET';
		if ( 'GET' !== $method && 'HEAD' !== $method ) {
			return;
		}
		// Never touch admin, API, cron, feeds or sitemap requests.
		if ( preg_match( '#(/wp-admin|/wp-login|/wp-json|/wp-cron|/xmlrpc|\.xml|/feed)#i', (string) $orig_uri ) ) {
			return;
		}

		$request_path   = urldecode( (string) wp_parse_url( $orig_uri, PHP_URL_PATH ) );
		$canonical_url  = $this->lang_url( $this->current );
		$canonical_path = urldecode( (string) wp_parse_url( $canonical_url, PHP_URL_PATH ) );

		if ( $request_path === $canonical_path ) {
			return; // Already canonical.
		}

		$qs = wp_parse_url( $orig_uri, PHP_URL_QUERY );
		wp_safe_redirect( $canonical_url . ( $qs ? '?' . $qs : '' ), 301 );
		exit;
	}

	/** Best supported language from the browser's Accept-Language header. */
	private function accept_language() {
		$al = isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '';
		foreach ( explode( ',', $al ) as $part ) {
			$code = strtolower( substr( trim( explode( ';', $part )[0] ), 0, 2 ) );
			if ( isset( self::$langs[ $code ] ) ) {
				return $code;
			}
		}
		return self::DEFAULT_LANG;
	}

	/** Start translating the output for non-English pages. */
	public function maybe_buffer() {
		if ( self::DEFAULT_LANG === $this->current || is_admin() || is_feed() ) {
			return;
		}
		ob_start( array( $this, 'translate_buffer' ) );
	}

	public function translate_buffer( $html ) {
		// XML sitemaps: rewrite <loc> URLs into the current language (with translated slugs).
		if ( false !== strpos( $html, '<urlset' ) || false !== strpos( $html, '<sitemapindex' ) ) {
			return $this->translate_sitemap( $html );
		}
		$map = $this->slug_map();
		$lm  = isset( $map[ $this->current ] ) ? $map[ $this->current ] : array();
		return YFG_ML_Translator::translate_html( $html, $this->current, $this->home_path, $lm );
	}

	/** Rewrite every <loc> in a sitemap into the current language. */
	private function translate_sitemap( $xml ) {
		return preg_replace_callback(
			'#<loc>(.*?)</loc>#',
			function ( $m ) {
				return '<loc>' . htmlspecialchars( $this->localize_url( html_entity_decode( $m[1] ) ), ENT_QUOTES ) . '</loc>';
			},
			$xml
		);
	}

	/** English site URL -> current-language URL (prefix + translated slug). */
	private function localize_url( $url ) {
		$lang = $this->current;
		if ( self::DEFAULT_LANG === $lang ) {
			return $url;
		}
		$host      = wp_parse_url( $url, PHP_URL_HOST );
		$home_host = wp_parse_url( home_url( '/' ), PHP_URL_HOST );
		if ( $host && $host !== $home_host ) {
			return $url;
		}
		$path = (string) wp_parse_url( $url, PHP_URL_PATH );
		$rel  = trim( $path, '/' );
		if ( '' !== $this->home_path && 0 === strpos( $rel, $this->home_path ) ) {
			$rel = trim( substr( $rel, strlen( $this->home_path ) ), '/' );
		}
		$first = explode( '/', $rel )[0];
		if ( isset( self::$langs[ $first ] ) ) {
			return $url;
		}
		$new = home_url( '/' . $lang . '/' . $this->tr_path( $rel, $lang ) );
		if ( '/' === substr( $path, -1 ) && '/' !== substr( $new, -1 ) ) {
			$new .= '/';
		}
		return $new;
	}

	/**
	 * Keep WordPress's own redirects inside the current language.
	 *
	 * On a non-English page, core redirects (old-slug + canonical/404-guess,
	 * e.g. /blog/ -> /blogs/) point at the plain English URL because the language
	 * prefix was stripped before WordPress saw the request. Re-add the prefix and
	 * translated slug so the visitor stays in /fr/ or /de/ instead of being thrown
	 * back to the English site.
	 *
	 * @param string $location Redirect target.
	 * @return string
	 */
	public function localize_redirect( $location ) {
		if ( self::DEFAULT_LANG === $this->current || '' === (string) $location ) {
			return $location;
		}
		// Leave admin, login, cron, API and any .php / asset targets untouched.
		if ( preg_match( '#/wp-(admin|login|json|cron|content|includes)|\.php(\?|$)#i', (string) $location ) ) {
			return $location;
		}
		$localized = $this->localize_url( $location );
		if ( $localized === $location ) {
			return $location; // External host, or already language-prefixed.
		}
		$qs = wp_parse_url( $location, PHP_URL_QUERY );
		$fr = wp_parse_url( $location, PHP_URL_FRAGMENT );
		if ( $qs ) {
			$localized .= '?' . $qs;
		}
		if ( $fr ) {
			$localized .= '#' . $fr;
		}
		return $localized;
	}

	/** URL of the current page in a given language (translated slug, trailing slash). */
	public function lang_url( $lang ) {
		if ( self::DEFAULT_LANG === $lang ) {
			$path = $this->rel;
		} else {
			$path = $lang . '/' . $this->tr_path( $this->rel, $lang );
		}
		return trailingslashit( home_url( '/' . $path ) );
	}

	/** Cached slug map (read-only). */
	public function slug_map() {
		if ( null === $this->slugmap ) {
			$m             = get_option( 'yfg_ml_slugs' );
			$this->slugmap = is_array( $m ) ? $m : array();
		}
		return $this->slugmap;
	}

	/** English path -> translated path. */
	public function tr_path( $en_path, $lang ) {
		if ( self::DEFAULT_LANG === $lang || '' === $en_path ) {
			return $en_path;
		}
		$map = $this->slug_map();
		$lm  = isset( $map[ $lang ] ) ? $map[ $lang ] : array();
		if ( empty( $lm ) ) {
			return $en_path;
		}
		$segs = explode( '/', trim( $en_path, '/' ) );
		foreach ( $segs as $i => $s ) {
			if ( isset( $lm[ $s ] ) ) {
				$segs[ $i ] = $lm[ $s ];
			}
		}
		return implode( '/', $segs );
	}

	/** Translated path -> English path. */
	public function en_path( $tr_path, $lang ) {
		if ( self::DEFAULT_LANG === $lang || '' === $tr_path ) {
			return $tr_path;
		}
		$map = $this->slug_map();

		// The requested language's reverse map takes priority. Fall back to every
		// other language so a slug that landed under the wrong prefix (e.g. the
		// French "blogues" typed under /de/) still resolves to its English slug —
		// the canonical redirect then sends it to the correct in-language URL.
		$primary = isset( $map[ $lang ] ) ? array_flip( $map[ $lang ] ) : array();
		$others  = array();
		foreach ( $map as $l => $pairs ) {
			if ( $l === $lang ) {
				continue;
			}
			foreach ( array_flip( (array) $pairs ) as $tr => $en ) {
				if ( ! isset( $others[ $tr ] ) ) {
					$others[ $tr ] = $en;
				}
			}
		}
		if ( empty( $primary ) && empty( $others ) ) {
			return $tr_path;
		}
		$segs = explode( '/', trim( $tr_path, '/' ) );
		foreach ( $segs as $i => $s ) {
			if ( isset( $primary[ $s ] ) ) {
				$segs[ $i ] = $primary[ $s ];
			} elseif ( isset( $others[ $s ] ) ) {
				$segs[ $i ] = $others[ $s ];
			}
		}
		return implode( '/', $segs );
	}

	/** Build the slug map on 'init' — also auto-rebuilds when the language list changes. */
	public function build_slugs_if_missing() {
		$sig = implode( ',', array_keys( self::$langs ) );
		if ( ! is_array( get_option( 'yfg_ml_slugs' ) ) || get_option( 'yfg_ml_langs_sig' ) !== $sig ) {
			$this->build_slugs();
			update_option( 'yfg_ml_langs_sig', $sig );
		}
	}

	public function clear_slugs() {
		delete_option( 'yfg_ml_slugs' );
		$this->slugmap = null;
	}

	/** Translate every page/post slug into fr & de and cache the map. */
	public function build_slugs() {
		$ids    = get_posts( array(
			'post_type'   => array( 'page', 'post', 'case_study' ),
			'post_status' => 'publish',
			'numberposts' => -1,
			'fields'      => 'ids',
		) );
		$titles = array();
		foreach ( $ids as $pid ) {
			$slug = get_post_field( 'post_name', $pid );
			if ( '' !== $slug ) {
				$titles[ $slug ] = get_the_title( $pid );
			}
		}
		$map = array();
		foreach ( self::extra_langs() as $lang ) {
			$map[ $lang ] = array();
			$trs          = YFG_ML_Translator::translate_many( array_values( $titles ), $lang );
			foreach ( $titles as $slug => $title ) {
				$t     = ( isset( $trs[ $title ] ) && $trs[ $title ] ) ? $trs[ $title ] : $title;
				$tslug = sanitize_title( $t );
				if ( $tslug && $tslug !== $slug && ! in_array( $tslug, $map[ $lang ], true ) ) {
					$map[ $lang ][ $slug ] = $tslug;
				}
			}
		}
		update_option( 'yfg_ml_slugs', $map );
		$this->slugmap = $map;
		return $map;
	}

	/** hreflang alternates + a tiny bit of switcher CSS. */
	public function head_tags() {
		foreach ( self::$langs as $code => $l ) {
			printf( "<link rel=\"alternate\" hreflang=\"%s\" href=\"%s\" />\n", esc_attr( $code ), esc_url( $this->lang_url( $code ) ) );
		}
		printf( "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\" />\n", esc_url( $this->lang_url( self::DEFAULT_LANG ) ) );
		?>
		<style>
			.yfg-lang { position: relative; display: inline-block; }
			.yfg-lang__btn { display: inline-flex; align-items: center; gap: 6px; background: #fff; border: 1px solid #e2e8f0; border-radius: 999px; padding: 6px 12px; font-size: 13px; font-weight: 600; color: #33475b; cursor: pointer; box-shadow: 0 6px 18px rgba(5,47,87,.08); line-height: 1; transition: border-color .15s ease; }
			.yfg-lang__btn:hover { border-color: #04707d; }
			.yfg-lang__flag { font-size: 15px; line-height: 1; }
			.yfg-lang__chev { font-size: 10px; opacity: .65; transition: transform .2s ease; }
			.yfg-lang.is-open .yfg-lang__chev { transform: rotate(180deg); }
			.yfg-lang__menu { position: absolute; right: 0; top: calc(100% + 8px); min-width: 168px; background: #fff; border: 1px solid #e6eef0; border-radius: 14px; box-shadow: 0 16px 38px rgba(5,47,87,.16); padding: 6px; opacity: 0; visibility: hidden; transform: translateY(-6px); transition: opacity .18s ease, transform .18s ease, visibility .18s; z-index: 1100; }
			.yfg-lang.is-open .yfg-lang__menu { opacity: 1; visibility: visible; transform: translateY(0); }
			.yfg-lang__item { display: flex; align-items: center; gap: 9px; padding: 8px 12px; border-radius: 9px; font-size: 13px; font-weight: 600; color: #33475b; text-decoration: none; line-height: 1.2; }
			.yfg-lang__item:hover { background: #eef6f8; color: #04707d; }
			.yfg-lang__item.is-active { background: linear-gradient(135deg,#052f57,#04707d); color: #fff; }
			.site-header__inner .yfg-lang { flex-shrink: 0; margin-left: 8px; }
			@media (max-width: 1199.98px) { .site-header__inner .yfg-lang { order: 5; } }
		</style>
		<script>
		( function () {
			document.addEventListener( 'click', function ( e ) {
				var btn  = e.target.closest ? e.target.closest( '.yfg-lang__btn' ) : null;
				var open = document.querySelectorAll( '.yfg-lang.is-open' );
				if ( btn ) {
					e.preventDefault();
					var wrap = btn.closest( '.yfg-lang' );
					var show = ! wrap.classList.contains( 'is-open' );
					for ( var i = 0; i < open.length; i++ ) { open[ i ].classList.remove( 'is-open' ); }
					if ( show ) { wrap.classList.add( 'is-open' ); }
					btn.setAttribute( 'aria-expanded', String( show ) );
				} else if ( ! ( e.target.closest && e.target.closest( '.yfg-lang__menu' ) ) ) {
					for ( var j = 0; j < open.length; j++ ) { open[ j ].classList.remove( 'is-open' ); }
				}
			} );
			document.addEventListener( 'keydown', function ( e ) {
				if ( 'Escape' === e.key ) {
					var open = document.querySelectorAll( '.yfg-lang.is-open' );
					for ( var i = 0; i < open.length; i++ ) { open[ i ].classList.remove( 'is-open' ); }
				}
			} );
		} )();
		</script>
		<?php
	}

	/** Switcher dropdown markup (used by shortcode + header). */
	public function switcher_html( $atts = array() ) {
		$cur = isset( self::$langs[ $this->current ] ) ? self::$langs[ $this->current ] : self::$langs[ self::DEFAULT_LANG ];

		$out  = '<div class="yfg-lang notranslate" translate="no">';
		$out .= '<button class="yfg-lang__btn" type="button" aria-haspopup="true" aria-expanded="false">';
		$out .= '<span class="yfg-lang__flag">' . $cur['flag'] . '</span> <span class="yfg-lang__label">' . esc_html( $cur['short'] ) . '</span> <span class="yfg-lang__chev">&#9662;</span>';
		$out .= '</button>';
		$out .= '<div class="yfg-lang__menu" role="menu">';
		foreach ( self::$langs as $code => $l ) {
			$out .= sprintf(
				'<a class="yfg-lang__item%s" href="%s" hreflang="%s" role="menuitem"><span class="yfg-lang__flag">%s</span> %s</a>',
				$code === $this->current ? ' is-active' : '',
				esc_url( $this->lang_url( $code ) ),
				esc_attr( $code ),
				$l['flag'],
				esc_html( $l['label'] )
			);
		}
		$out .= '</div></div>';
		return $out;
	}

	/** Floating switcher shown on the frontend. */
	public function floating_switcher() {
		echo '<div class="yfg-lang-float">' . $this->switcher_html() . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput
	}
}

$GLOBALS['yfg_ml'] = new YFG_Multilang();

register_activation_hook( __FILE__, array( 'YFG_ML_Translator', 'create_table' ) );

/**
 * Output the language switcher — call this from the theme (e.g. header.php):
 * <?php if ( function_exists( 'yfg_ml_switcher' ) ) { yfg_ml_switcher(); } ?>
 */
function yfg_ml_switcher() {
	if ( isset( $GLOBALS['yfg_ml'] ) ) {
		echo $GLOBALS['yfg_ml']->switcher_html(); // phpcs:ignore WordPress.Security.EscapeOutput
	}
}
