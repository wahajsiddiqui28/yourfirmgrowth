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
 * Kya SMTP wp-config.php mein theek se set hai?
 * Placeholder values (PASTE_...) ko bhi "set nahi" hi samjha jata hai.
 *
 * @return bool
 */
function yfg_smtp_is_configured() {
    if ( ! defined( 'YFG_SMTP_HOST' ) || ! defined( 'YFG_SMTP_USER' ) || ! defined( 'YFG_SMTP_PASS' ) ) {
        return false;
    }

    foreach ( array( YFG_SMTP_HOST, YFG_SMTP_USER, YFG_SMTP_PASS ) as $value ) {
        if ( '' === trim( (string) $value ) || false !== strpos( (string) $value, 'PASTE_' ) ) {
            return false;
        }
    }

    return true;
}

/**
 * SMTP set na ho to wp_mail() ko chalne se pehle rok do, taake lead row
 * mein "SMTP configured nahi" ka saaf message aaye (na ke timeout error).
 *
 * @param null|bool $short_circuit Existing short-circuit value.
 * @return null|bool
 */
function yfg_smtp_block_when_unconfigured( $short_circuit ) {
    if ( yfg_smtp_is_configured() ) {
        return $short_circuit;
    }

    $GLOBALS['yfg_last_mail_error'] = 'SMTP configured nahi hai — wp-config.php mein YFG_SMTP_HOST / YFG_SMTP_USER / YFG_SMTP_PASS set karein.';

    return false; // wp_mail() false return karega, PHPMailer chalega hi nahi.
}
add_filter( 'pre_wp_mail', 'yfg_smtp_block_when_unconfigured' );

/**
 * Configure PHPMailer to use SMTP when constants are defined.
 * 
 * @param PHPMailer\PHPMailer\PHPMailer $phpmailer The PHPMailer object.
 */
function yfg_smtp_init( $phpmailer ) {
    // phpcs:disable WordPress.NamingConventions.ValidVariableName

    // Settings adhoori hain to SMTP par switch hi na karein — warna PHPMailer
    // khali host par connect karne ki koshish mein waqt zaya karta hai.
    if ( ! yfg_smtp_is_configured() ) {
        return;
    }

    $phpmailer->isSMTP();

    // Bina timeout ke PHPMailer 300s tak wait karta hai — agar SMTP port
    // block ho (local/dev machines par aam hai) to form submit "hang" lagta
    // hai. Chhota timeout matlab fail bhi ho to user 15s se zyada na ruke.
    $phpmailer->Timeout      = defined( 'YFG_SMTP_TIMEOUT' ) ? (int) YFG_SMTP_TIMEOUT : 15;
    $phpmailer->SMTPKeepAlive = false;

    // Host — cPanel ka outgoing server (wp-config.php mein set karein).
    // NOTE: mail.yourfirmgrowth.com Cloudflare par proxied hai aur Cloudflare
    // SMTP proxy nahi karta, is liye woh host kabhi connect nahi hoga.
    $phpmailer->Host       = defined( 'YFG_SMTP_HOST' ) ? YFG_SMTP_HOST : '';
    $phpmailer->Port       = defined( 'YFG_SMTP_PORT' ) ? (int) YFG_SMTP_PORT : 465;
    $phpmailer->SMTPSecure = defined( 'YFG_SMTP_SECURE' ) ? YFG_SMTP_SECURE : 'ssl';
    $phpmailer->SMTPAuth   = true;

    // Credentials — sirf wp-config.php se. Yahan kabhi hardcode na karein:
    // theme files backup/git/migration ke zariye aage chali jati hain.
    $phpmailer->Username   = defined( 'YFG_SMTP_USER' ) ? YFG_SMTP_USER : '';
    $phpmailer->Password   = defined( 'YFG_SMTP_PASS' ) ? YFG_SMTP_PASS : '';

    // Force the From identity — most SMTP servers reject mismatched senders
    $from_email = defined( 'YFG_SMTP_FROM' ) ? YFG_SMTP_FROM : 'info@yourfirmgrowth.com';
    $from_name  = defined( 'YFG_SMTP_FROM_NAME' ) ? YFG_SMTP_FROM_NAME : get_bloginfo( 'name' );
    
    $phpmailer->setFrom( $from_email, $from_name, false );
    $phpmailer->Sender = $from_email; // envelope sender (Return-Path)

    // Shared-hosting SSL certs often don't match the mail hostname, which
    // makes the TLS handshake fail from a local/dev machine. Relax peer
    // verification so the connection still succeeds. (Safe: auth still required.)
    $phpmailer->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
        ),
    );
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

/**
 * wp_mail() fail hone ki asal wajah pakad kar rakhta hai, taake lead row
 * mein error save ho sake aur admin ko pata chale ke masla kya tha.
 * (wp_mail() sirf false return karta hai, error nahi deta.)
 *
 * @param WP_Error $error Mail error.
 */
function yfg_capture_mail_error( $error ) {
    $GLOBALS['yfg_last_mail_error'] = $error->get_error_message();
}
add_action( 'wp_mail_failed', 'yfg_capture_mail_error' );

/**
 * Aakhri mail error ka message do (aur reset kar do).
 *
 * @return string
 */
function yfg_last_mail_error() {
    $err = isset( $GLOBALS['yfg_last_mail_error'] ) ? (string) $GLOBALS['yfg_last_mail_error'] : '';
    unset( $GLOBALS['yfg_last_mail_error'] );
    return $err;
}
