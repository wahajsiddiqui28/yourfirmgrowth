<?php
/**
 * YourFirmGrowth functions and definitions.
 *
 * @package YourFirmGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access se rokein.
}

define( 'YFG_VERSION', '1.4.0' );
define( 'YFG_DIR', get_template_directory() );
define( 'YFG_URI', get_template_directory_uri() );

/**
 * Theme setup: supports, menus, image sizes.
 */
function yfg_setup() {
	load_theme_textdomain( 'yourfirmgrowth', YFG_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'yourfirmgrowth' ),
		'footer'  => __( 'Footer Menu', 'yourfirmgrowth' ),
	) );

	add_image_size( 'yfg-card', 600, 400, true );
	add_image_size( 'yfg-hero', 1600, 900, true );
}
add_action( 'after_setup_theme', 'yfg_setup' );

/**
 * Content width.
 */
function yfg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yfg_content_width', 1140 );
}
add_action( 'after_setup_theme', 'yfg_content_width', 0 );

/**
 * Enqueue styles & scripts.
 */
function yfg_assets() {
	// Google Fonts.
	wp_enqueue_style(
		'yfg-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap',
		array(),
		null
	);

	// Bootstrap 5.3 CSS.
	wp_enqueue_style(
		'bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
		array(),
		'5.3.3'
	);

	// Bootstrap Icons.
	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		array(),
		'1.11.3'
	);

	// Main stylesheet (loaded after Bootstrap so it can override).
	wp_enqueue_style(
		'yfg-main',
		YFG_URI . '/assets/css/main.css',
		array( 'bootstrap', 'yfg-fonts' ),
		YFG_VERSION
	);

	// Scroll Animations CSS.
	wp_enqueue_style(
		'yfg-animations',
		YFG_URI . '/assets/css/yfg_enqueue_animations.css',
		array( 'yfg-main' ),
		YFG_VERSION
	);

	// Bootstrap 5.3 JS bundle (Popper included).
	wp_enqueue_script(
		'bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
		array(),
		'5.3.3',
		true
	);

	// Main script.
	wp_enqueue_script(
		'yfg-main',
		YFG_URI . '/assets/js/main.js',
		array(),
		YFG_VERSION,
		true
	);

	// Scroll Animations JS (loads in footer, deferred).
	wp_enqueue_script(
		'yfg-animations',
		YFG_URI . '/assets/js/yfg-animations.js',
		array( 'yfg-main' ),
		YFG_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yfg_assets' );

/**
 * Register widget areas.
 */
function yfg_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'yourfirmgrowth' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets here appear on the blog sidebar.', 'yourfirmgrowth' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	for ( $i = 1; $i <= 3; $i++ ) {
		register_sidebar( array(
			'name'          => sprintf( __( 'Footer Column %d', 'yourfirmgrowth' ), $i ),
			'id'            => 'footer-' . $i,
			'description'   => __( 'Footer widget column.', 'yourfirmgrowth' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', 'yfg_widgets_init' );





/**
 * Custom excerpt length & more.
 */
function yfg_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'yfg_excerpt_length' );

function yfg_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'yfg_excerpt_more' );

/**
 * Body classes helper.
 */
function yfg_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	if ( is_front_page() ) {
		$classes[] = 'yfg-front';
	}
	return $classes;
}
add_filter( 'body_class', 'yfg_body_classes' );

/**
 * Fallback menu when no menu is assigned.
 */
function yfg_primary_menu_fallback() {
	$items = array(
		'#services'  => __( 'Services', 'yourfirmgrowth' ),
		'#why'       => __( 'Why Us', 'yourfirmgrowth' ),
		'#remote'    => __( 'Remote Teams', 'yourfirmgrowth' ),
		'#faq'       => __( 'FAQ', 'yourfirmgrowth' ),
		'#final-cta' => __( 'Contact', 'yourfirmgrowth' ),
	);
	echo '<ul class="yfg-menu">';
	foreach ( $items as $anchor => $label ) {
		printf(
			'<li class="menu-item"><a href="%s">%s</a></li>',
			esc_url( home_url( '/' ) . $anchor ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}



// Modular includes.
require_once YFG_DIR . '/inc/template-tags.php';
require_once YFG_DIR . '/inc/customizer.php';
require_once YFG_DIR . '/inc/homepage.php';
require_once YFG_DIR . '/inc/smtp.php';
require_once YFG_DIR . '/inc/seo-metadata.php';
