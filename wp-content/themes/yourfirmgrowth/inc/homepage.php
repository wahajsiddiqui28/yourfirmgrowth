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
	// Return the visitor to whichever page the form was submitted from.
	$referer  = wp_get_referer();
	$base_url = $referer ? $referer : home_url( '/' );

	// Modal se submit hua? To status modal mein dikhana hai, hero card mein nahi.
	$from_modal = isset( $_POST['yfg_source'] ) && 'modal' === $_POST['yfg_source'];

	$yfg_redirect = static function ( $status ) use ( $base_url, $from_modal ) {
		$args = array(
			'yfg_lead' => $status,
			// false = add_query_arg param ko URL se hata deta hai (stale referer se aya ho to).
			'yfg_src'  => $from_modal ? 'modal' : false,
		);
		wp_safe_redirect( add_query_arg( $args, $base_url ) . ( $from_modal ? '' : '#lead-form' ) );
		exit;
	};

	if ( ! isset( $_POST['yfg_lead_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['yfg_lead_nonce'] ), 'yfg_lead' ) ) {
		$yfg_redirect( 'error' );
	}

	$name    = isset( $_POST['yfg_name'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_name'] ) ) : '';
	$email   = isset( $_POST['yfg_email'] ) ? sanitize_email( wp_unslash( $_POST['yfg_email'] ) ) : '';
	$phone   = isset( $_POST['yfg_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_phone'] ) ) : '';
	$service = isset( $_POST['yfg_service'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_service'] ) ) : '';
	$message = isset( $_POST['yfg_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['yfg_message'] ) ) : '';

	if ( empty( $name ) || ! is_email( $email ) ) {
		$yfg_redirect( 'error' );
	}

	// PEHLE database mein mehfooz karo — SMTP fail ho jaye to bhi lead na khoye.
	$lead_id = yfg_lead_save( array(
		'form_type' => 'lead',
		'source'    => $from_modal ? 'Lead Modal — Book a Free Growth Strategy Call' : 'Hero Banner Lead Form',
		'name'      => $name,
		'email'     => $email,
		'phone'     => $phone,
		'service'   => $service,
		'message'   => $message,
	) );

	// PHIR email (fail hone par background retry khud schedule ho jati hai).
	yfg_lead_deliver( $lead_id );

	$yfg_redirect( 'success' );
}
add_action( 'admin_post_yfg_lead', 'yfg_handle_lead' );
add_action( 'admin_post_nopriv_yfg_lead', 'yfg_handle_lead' );

/**
 * Handle the contact page form submission.
 */
function yfg_handle_contact() {
	// Referer na mile (privacy extensions, direct POST) to home par wapas bhejo,
	// warna add_query_arg() ko khali URL milta hai aur redirect toot jata hai.
	$referer  = wp_get_referer();
	$base_url = $referer ? $referer : home_url( '/' );

	if ( ! isset( $_POST['yfg_contact_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['yfg_contact_nonce'] ), 'yfg_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'yfg_contact', 'error', $base_url ) );
		exit;
	}

	$name    = isset( $_POST['yfg_name'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_name'] ) ) : '';
	$email   = isset( $_POST['yfg_email'] ) ? sanitize_email( wp_unslash( $_POST['yfg_email'] ) ) : '';
	$phone   = isset( $_POST['yfg_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_phone'] ) ) : '';
	$company = isset( $_POST['yfg_company'] ) ? sanitize_text_field( wp_unslash( $_POST['yfg_company'] ) ) : '';
	$message = isset( $_POST['yfg_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['yfg_message'] ) ) : '';

	// Service of Interest — multi-select (checkbox array) ya purana single value, dono handle.
	$service = '';
	if ( isset( $_POST['yfg_service'] ) ) {
		$yfg_svc_raw = wp_unslash( $_POST['yfg_service'] );
		if ( is_array( $yfg_svc_raw ) ) {
			$service = implode( ', ', array_filter( array_map( 'sanitize_text_field', $yfg_svc_raw ) ) );
		} else {
			$service = sanitize_text_field( $yfg_svc_raw );
		}
	}

	if ( empty( $name ) || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'yfg_contact', 'error', $base_url ) );
		exit;
	}

	// PEHLE database, PHIR email — bilkul lead form ki tarah.
	$lead_id = yfg_lead_save( array(
		'form_type' => 'contact',
		'source'    => 'Contact Page Form',
		'name'      => $name,
		'email'     => $email,
		'phone'     => $phone,
		'company'   => $company,
		'service'   => $service,
		'message'   => $message,
	) );

	yfg_lead_deliver( $lead_id );

	wp_safe_redirect( add_query_arg( 'yfg_contact', 'success', $base_url ) );
	exit;
}
add_action( 'admin_post_yfg_contact', 'yfg_handle_contact' );
add_action( 'admin_post_nopriv_yfg_contact', 'yfg_handle_contact' );
