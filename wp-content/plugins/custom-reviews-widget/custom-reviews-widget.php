<?php
/**
 * Plugin Name: Custom Reviews Widget
 * Description: Apna free review widget — Google, Trustindex aur Custom reviews ko Trustindex jaisi slider cards mein dikhata hai. Koi subscription/trial expiry nahi.
 * Version: 1.0.0
 * Author: Your Firm Growth
 * Text Domain: custom-reviews-widget
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access nahi.
}

define( 'CRW_VERSION', '1.5.0' );
define( 'CRW_PATH', plugin_dir_path( __FILE__ ) );
define( 'CRW_URL', plugin_dir_url( __FILE__ ) );
define( 'CRW_TABLE', 'crw_reviews' );

require_once CRW_PATH . 'includes/db.php';
require_once CRW_PATH . 'includes/admin-page.php';
require_once CRW_PATH . 'includes/shortcode.php';

// Activation: table banao + seed reviews (sirf pehli dafa)
register_activation_hook( __FILE__, 'crw_activate_plugin' );
function crw_activate_plugin() {
	crw_create_table();
	crw_sync_reviews();
}

// Frontend assets sirf tab load karo jab shortcode page pe ho (performance ke liye)
add_action( 'wp_enqueue_scripts', 'crw_enqueue_frontend_assets' );
function crw_enqueue_frontend_assets() {
	wp_register_style( 'crw-style', CRW_URL . 'assets/css/style.css', array(), CRW_VERSION );
	wp_register_script( 'crw-script', CRW_URL . 'assets/js/script.js', array(), CRW_VERSION, true );
	wp_localize_script( 'crw-script', 'crwIcons', array(
		'starTiFull'      => CRW_URL . 'assets/icons/star-ti-full.svg',
		'starTiEmpty'     => CRW_URL . 'assets/icons/star-ti-empty.svg',
		'starGoogleFull'  => CRW_URL . 'assets/icons/star-google-full.svg',
		'starGoogleEmpty' => CRW_URL . 'assets/icons/star-google-empty.svg',
		'google'          => CRW_URL . 'assets/icons/google.svg',
		'trustindex'      => CRW_URL . 'assets/icons/trustindex.svg',
		'verifiedBlue'    => CRW_URL . 'assets/icons/verified-blue.svg',
		'verifiedBlack'   => CRW_URL . 'assets/icons/verified-black.svg',
	) );
}
