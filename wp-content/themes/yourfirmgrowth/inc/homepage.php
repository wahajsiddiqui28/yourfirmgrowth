<?php
/**
 * Homepage SEO metadata, JSON-LD schema and hero lead-form handler.
 *
 * @package YourFirmGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Exact Meta Title for the homepage (from the content package).
 *
 * @param array $parts Document title parts.
 * @return array
 */
function yfg_homepage_title( $parts ) {
	if ( is_front_page() ) {
		return array( 'title' => 'Full-Service Digital Agency | Your Firm Growth (YFG)' );
	}
	return $parts;
}
add_filter( 'document_title_parts', 'yfg_homepage_title' );

/**
 * Output meta description + JSON-LD schema on the homepage <head>.
 */
function yfg_homepage_head() {
	if ( ! is_front_page() ) {
		return;
	}

	$desc = 'Your Firm Growth (YFG) is a full-service digital agency delivering SEO, web development, paid ads & automation. GDPR-compliant remote teams for businesses worldwide.';
	echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";

	$schema = array(
		'@context'      => 'https://schema.org',
		'@type'         => 'ProfessionalService',
		'name'          => 'Your Firm Growth',
		'alternateName' => 'YFG',
		'url'           => 'https://yourfirmgrowth.com',
		'description'   => 'Full-service digital agency offering SEO, web design, content marketing, paid advertising, branding, CRO, and automation for businesses worldwide.',
		'areaServed'    => array( 'United Kingdom', 'United States', 'Germany', 'Europe', 'Worldwide' ),
		'knowsAbout'    => array( 'SEO', 'Web Design', 'Paid Advertising', 'Branding', 'Conversion Optimization', 'Business Automation' ),
		'sameAs'        => array( 'https://www.linkedin.com/company/yourfirmgrowth' ),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
}
add_action( 'wp_head', 'yfg_homepage_head', 5 );

/**
 * Handle the hero lead-form submission.
 * Sends an email to the site admin, then redirects back with a status flag.
 */
function yfg_handle_lead() {
	if ( ! isset( $_POST['yfg_lead_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['yfg_lead_nonce'] ), 'yfg_lead' ) ) {
		wp_safe_redirect( home_url( '/?yfg_lead=error#lead-form' ) );
		exit;
	}

	$name    = isset( $_POST['yfg_name'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_name'] ) ) : '';
	$email   = isset( $_POST['yfg_email'] ) ? sanitize_email( wp_unslash( $_POST['yfg_email'] ) ) : '';
	$phone   = isset( $_POST['yfg_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_phone'] ) ) : '';
	$message = isset( $_POST['yfg_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['yfg_message'] ) ) : '';

	if ( empty( $name ) || ! is_email( $email ) ) {
		wp_safe_redirect( home_url( '/?yfg_lead=error#lead-form' ) );
		exit;
	}

	$to      = get_option( 'admin_email' );
	$subject = 'New Growth Strategy Call request — ' . $name;
	$body    = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\n\nMessage:\n{$message}";
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( home_url( '/?yfg_lead=success#lead-form' ) );
	exit;
}
add_action( 'admin_post_yfg_lead', 'yfg_handle_lead' );
add_action( 'admin_post_nopriv_yfg_lead', 'yfg_handle_lead' );

/**
 * Handle the contact page form submission.
 */
function yfg_handle_contact() {
	if ( ! isset( $_POST['yfg_contact_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['yfg_contact_nonce'] ), 'yfg_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'yfg_contact', 'error', wp_get_referer() ) );
		exit;
	}

	$name    = isset( $_POST['yfg_name'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_name'] ) ) : '';
	$email   = isset( $_POST['yfg_email'] ) ? sanitize_email( wp_unslash( $_POST['yfg_email'] ) ) : '';
	$phone   = isset( $_POST['yfg_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_phone'] ) ) : '';
	$company = isset( $_POST['yfg_company'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_company'] ) ) : '';
	$service = isset( $_POST['yfg_service'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_service'] ) ) : '';
	$message = isset( $_POST['yfg_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['yfg_message'] ) ) : '';

	if ( empty( $name ) || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'yfg_contact', 'error', wp_get_referer() ) );
		exit;
	}

	$to      = get_option( 'admin_email' );
	$subject = 'New Contact Inquiry — ' . $name;

	$body    = "Name: {$name}\n";
	$body   .= "Email: {$email}\n";
	if ( ! empty( $phone ) ) {
		$body   .= "Phone: {$phone}\n";
	}
	if ( ! empty( $company ) ) {
		$body   .= "Company: {$company}\n";
	}
	if ( ! empty( $service ) ) {
		$body   .= "Service of Interest: {$service}\n";
	}
	$body   .= "\nMessage:\n{$message}";

	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'yfg_contact', 'success', wp_get_referer() ) );
	exit;
}
add_action( 'admin_post_yfg_contact', 'yfg_handle_contact' );
add_action( 'admin_post_nopriv_yfg_contact', 'yfg_handle_contact' );
