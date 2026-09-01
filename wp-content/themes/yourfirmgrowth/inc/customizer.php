<?php
/**
 * Theme Customizer settings (hero & CTA).
 *
 * @package YourFirmGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register customizer controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function yfg_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'yfg_homepage', array(
		'title'    => __( 'YourFirmGrowth — Homepage', 'yourfirmgrowth' ),
		'priority' => 30,
	) );

	$fields = array(
		'yfg_hero_eyebrow'  => array( __( 'Hero Eyebrow', 'yourfirmgrowth' ), 'Grow Your Firm Faster' ),
		'yfg_hero_title'    => array( __( 'Hero Title', 'yourfirmgrowth' ), 'We Help Firms Scale With SEO & Smart Marketing' ),
		'yfg_hero_subtitle' => array( __( 'Hero Subtitle', 'yourfirmgrowth' ), 'Data-driven strategies that bring more leads, more clients and steady growth for your business.' ),
		'yfg_hero_btn_text' => array( __( 'Hero Button Text', 'yourfirmgrowth' ), 'Get Started' ),
		'yfg_hero_btn_url'  => array( __( 'Hero Button URL', 'yourfirmgrowth' ), '#contact' ),
		'yfg_cta_url'       => array( __( 'CTA Button URL', 'yourfirmgrowth' ), '#' ),
	);

	foreach ( $fields as $id => $data ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $data[1],
			'sanitize_callback' => ( false !== strpos( $id, 'url' ) ) ? 'esc_url_raw' : 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $data[0],
			'section' => 'yfg_homepage',
			'type'    => ( false !== strpos( $id, 'url' ) ) ? 'url' : 'text',
		) );
	}
}
add_action( 'customize_register', 'yfg_customize_register' );
