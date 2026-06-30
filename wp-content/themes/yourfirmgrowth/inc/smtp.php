<?php
/**
 * YourFirmGrowth — SMTP Mail Configuration (no plugin needed)
 * ─────────────────────────────────────────────────────────
 * Routes ALL wp_mail() through the yourfirmgrowth.com mailbox via
 * the `phpmailer_init` hook. Credentials live in wp-config.php
 * (YFG_SMTP_* constants) — never hardcode them here.
 *
 * @package YourFirmGrowth
 */

defined( 'ABSPATH' ) || exit;

/**
 * Configure PHPMailer to use SMTP when constants are defined.
 * 
 * @param PHPMailer\PHPMailer\PHPMailer $phpmailer The PHPMailer object.
 */
function yfg_smtp_init( $phpmailer ) {
    // phpcs:disable WordPress.NamingConventions.ValidVariableName
    $phpmailer->isSMTP();
    
    // Host (SMTP Server) is mail.yourfirmgrowth.com
    $phpmailer->Host       = defined( 'YFG_SMTP_HOST' ) ? YFG_SMTP_HOST : 'mail.yourfirmgrowth.com';
    $phpmailer->Port       = defined( 'YFG_SMTP_PORT' ) ? (int) YFG_SMTP_PORT : 465;
    $phpmailer->SMTPSecure = defined( 'YFG_SMTP_SECURE' ) ? YFG_SMTP_SECURE : 'ssl';
    $phpmailer->SMTPAuth   = true;
    
    // Credentials
    $phpmailer->Username   = defined( 'YFG_SMTP_USER' ) ? YFG_SMTP_USER : 'info@yourfirmgrowth.com';
    $phpmailer->Password   = defined( 'YFG_SMTP_PASS' ) ? YFG_SMTP_PASS : 'zj7hRAGwi4yuR7T';

    // Force the From identity — most SMTP servers reject mismatched senders
    $from_email = defined( 'YFG_SMTP_FROM' ) ? YFG_SMTP_FROM : 'info@yourfirmgrowth.com';
    $from_name  = defined( 'YFG_SMTP_FROM_NAME' ) ? YFG_SMTP_FROM_NAME : get_bloginfo( 'name' );
    
    $phpmailer->setFrom( $from_email, $from_name, false );
    $phpmailer->Sender = $from_email; // envelope sender (Return-Path)
    // phpcs:enable
}
add_action( 'phpmailer_init', 'yfg_smtp_init' );

/**
 * Keep WP's default From headers consistent with the SMTP identity.
 */
function yfg_mail_from( $email ) {
    return defined( 'YFG_SMTP_FROM' ) ? YFG_SMTP_FROM : 'info@yourfirmgrowth.com';
}
add_filter( 'wp_mail_from', 'yfg_mail_from' );

function yfg_mail_from_name( $name ) {
    return defined( 'YFG_SMTP_FROM_NAME' ) ? YFG_SMTP_FROM_NAME : $name;
}
add_filter( 'wp_mail_from_name', 'yfg_mail_from_name' );
