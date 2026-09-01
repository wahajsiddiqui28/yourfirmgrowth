<?php
/**
 * Custom template tags for this theme.
 *
 * @package YourFirmGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'yfg_post_meta' ) ) :
	/**
	 * Prints date and author meta for a post.
	 */
	function yfg_post_meta() {
		if ( 'post' !== get_post_type() ) {
			return;
		}
		?>
		<div class="yfg-meta">
			<time class="yfg-meta__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
				<?php echo esc_html( get_the_date() ); ?>
			</time>
			<span class="yfg-meta__sep">&middot;</span>
			<span class="yfg-meta__author"><?php the_author(); ?></span>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'yfg_post_taxonomy' ) ) :
	/**
	 * Prints categories and tags.
	 */
	function yfg_post_taxonomy() {
		$cats = get_the_category_list( ', ' );
		$tags = get_the_tag_list( '', ', ' );

		if ( $cats ) {
			echo '<p class="yfg-cats"><strong>' . esc_html__( 'Categories:', 'yourfirmgrowth' ) . '</strong> ' . wp_kses_post( $cats ) . '</p>';
		}
		if ( $tags ) {
			echo '<p class="yfg-tags"><strong>' . esc_html__( 'Tags:', 'yourfirmgrowth' ) . '</strong> ' . wp_kses_post( $tags ) . '</p>';
		}
	}
endif;

if ( ! function_exists( 'yfg_page_url_by_template' ) ) :
	/**
	 * Resolve a page URL by its page template, with a slug fallback.
	 *
	 * @param string $template Template filename, e.g. 'page-seo-services.php'.
	 * @param string $fallback_slug Slug used when no page has the template.
	 * @return string Page URL.
	 */
	function yfg_page_url_by_template( $template, $fallback_slug ) {
		static $cache = array();

		if ( isset( $cache[ $template ] ) ) {
			return $cache[ $template ];
		}

		$pages = get_pages( array(
			'meta_key'   => '_wp_page_template',
			'meta_value' => $template,
			'number'     => 1,
		) );

		$url = $pages ? get_permalink( $pages[0] ) : home_url( '/' . $fallback_slug . '/' );

		$cache[ $template ] = $url;

		return $url;
	}
endif;

if ( ! function_exists( 'yfg_service_nav_items' ) ) :
	/**
	 * Service links shown in the sub-header below the main header.
	 *
	 * @return array[] Each item: label, icon (Bootstrap Icons class), url.
	 */
	function yfg_service_nav_items() {
		return array(
			array(
				'label' => __( 'SEO Services', 'yourfirmgrowth' ),
				'icon'  => 'bi-graph-up-arrow',
				'url'   => yfg_page_url_by_template( 'page-seo-services.php', 'seo-services' ),
			),
			array(
				'label' => __( 'Dedicated Remote Teams', 'yourfirmgrowth' ),
				'icon'  => 'bi-people',
				'url'   => yfg_page_url_by_template( 'page-remote-teams.php', 'dedicated-remote-teams' ),
			),
			array(
				'label' => __( 'Digital Marketing Services', 'yourfirmgrowth' ),
				'icon'  => 'bi-megaphone',
				'url'   => yfg_page_url_by_template( 'page-digital-marketing.php', 'digital-marketing-services' ),
			),
			array(
				'label' => __( 'Web Design & Development Services', 'yourfirmgrowth' ),
				'icon'  => 'bi-code-slash',
				'url'   => yfg_page_url_by_template( 'page-web-design.php', 'web-design-development-services' ),
			),
		);
	}
endif;

if ( ! function_exists( 'yfg_whatsapp_button' ) ) :
	/**
	 * Global WhatsApp button — jahan chahiye wahan call karein:
	 * `yfg_whatsapp_button();` ya extra classes ke saath
	 * `yfg_whatsapp_button( 'site-header__cta' );`
	 * Number/link functions.php ke YFG_PHONE_* constants se aata hai.
	 *
	 * @param string $classes Extra CSS classes for the button.
	 */
	function yfg_whatsapp_button( $classes = '' ) {
		printf(
			'<a class="btn btn-whatsapp %1$s" href="%2$s" target="_blank" rel="noopener"><i class="bi bi-whatsapp me-2"></i>%3$s</a>',
			esc_attr( $classes ),
			esc_url( YFG_WHATSAPP_URL ),
			esc_html( YFG_PHONE_DISPLAY )
		);
	}
endif;

if ( ! function_exists( 'yfg_phone_link' ) ) :
	/**
	 * Global phone (tel:) link — text mein number dikhana ho to use karein.
	 *
	 * @param string $classes Extra CSS classes for the anchor.
	 */
	function yfg_phone_link( $classes = '' ) {
		printf(
			'<a class="%1$s" href="tel:%2$s">%3$s</a>',
			esc_attr( $classes ),
			esc_attr( YFG_PHONE_E164 ),
			esc_html( YFG_PHONE_DISPLAY )
		);
	}
endif;

if ( ! function_exists( 'yfg_lead_services_options' ) ) :
	/**
	 * Lead form ke services dropdown ki options — sub-header wali
	 * services (yfg_service_nav_items) se hi banti hain, plus "Other".
	 *
	 * @return string[] Service labels.
	 */
	function yfg_lead_services_options() {
		$labels   = wp_list_pluck( yfg_service_nav_items(), 'label' );
		$labels[] = __( 'Other / General Inquiry', 'yourfirmgrowth' );
		return $labels;
	}
endif;

if ( ! function_exists( 'yfg_reading_time' ) ) :
	/**
	 * Estimated reading time in minutes (~200 words/min).
	 *
	 * @param int|null $post_id Post ID (defaults to current).
	 * @return int Minutes (minimum 1).
	 */
	function yfg_reading_time( $post_id = null ) {
		$content = get_post_field( 'post_content', $post_id ? $post_id : get_the_ID() );
		$words   = str_word_count( wp_strip_all_tags( (string) $content ) );
		return max( 1, (int) ceil( $words / 200 ) );
	}
endif;

if ( ! function_exists( 'yfg_category_filter' ) ) :
	/**
	 * Renders the blog category filter chips (All + each category),
	 * marking the current category active on category archives.
	 */
	function yfg_category_filter() {
		$cats = get_categories( array( 'hide_empty' => true ) );
		if ( empty( $cats ) ) {
			return;
		}
		$posts_page = get_option( 'page_for_posts' );
		$all_url    = $posts_page ? get_permalink( $posts_page ) : home_url( '/' );
		$current    = is_category() ? (int) get_queried_object_id() : 0;

		echo '<nav class="yfg-cat-filter" aria-label="' . esc_attr__( 'Blog categories', 'yourfirmgrowth' ) . '">';
		printf(
			'<a class="%s" href="%s">%s</a>',
			$current ? '' : 'is-active',
			esc_url( $all_url ),
			esc_html__( 'All', 'yourfirmgrowth' )
		);
		foreach ( $cats as $c ) {
			printf(
				'<a class="%s" href="%s">%s</a>',
				$current === (int) $c->term_id ? 'is-active' : '',
				esc_url( get_category_link( $c ) ),
				esc_html( $c->name )
			);
		}
		echo '</nav>';
	}
endif;
