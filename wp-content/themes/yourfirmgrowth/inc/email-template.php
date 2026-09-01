<?php
/**
 * YourFirmGrowth — Branded HTML Email Template
 * ─────────────────────────────────────────────
 * Saari form submissions (lead form, modal, contact form) ki admin emails
 * is template se HTML mein jati hain — logo, fields table, message box,
 * aur request meta (page, waqt, IP, browser) ke saath.
 *
 * @package YourFirmGrowth
 */

defined( 'ABSPATH' ) || exit;

/**
 * Request ki meta details — kaunse page se submit hua, kab, kis IP/browser se.
 *
 * @return array
 */
function yfg_email_request_meta() {
	$referer    = wp_get_referer();
	$page_label = '';

	if ( $referer ) {
		$pid        = url_to_postid( $referer );
		$page_label = $pid ? get_the_title( $pid ) : wp_parse_url( $referer, PHP_URL_PATH );
	}

	$browser = isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) : '';
	if ( strlen( $browser ) > 140 ) {
		$browser = substr( $browser, 0, 140 ) . '…';
	}

	return array(
		'page_url' => $referer ? $referer : '',
		'page'     => $page_label ? $page_label : '',
		'time'     => current_time( 'M j, Y — g:i a' ) . ' (' . wp_timezone_string() . ')',
		'ip'       => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '',
		'browser'  => $browser,
	);
}

/**
 * Branded HTML email body banata hai.
 *
 * @param string $heading    Email ka main title, e.g. 'New Contact Inquiry'.
 * @param string $source     Kaunsa form tha, e.g. 'Contact Page Form'.
 * @param array  $fields     array( array( 'label' => '', 'value' => '', 'type' => 'text|email|tel' ), ... ).
 * @param string $message    Visitor ka message (plain text).
 * @param array  $meta       yfg_email_request_meta() ka output.
 * @return string HTML.
 */
function yfg_admin_email_html( $heading, $source, $fields, $message, $meta ) {
	// Email hamesha inbox (Gmail waghera) mein khulti hai, is liye logo ka
	// absolute LIVE URL use karo — localhost/dev URL wahan load nahi hota.
	$logo = 'https://yourfirmgrowth.com/wp-content/themes/yourfirmgrowth/assets/images/logo/logo.jpeg';
	$year = date_i18n( 'Y' );

	// ---- Field rows ----
	$rows = '';
	foreach ( $fields as $f ) {
		if ( ! isset( $f['value'] ) || '' === trim( (string) $f['value'] ) ) {
			continue;
		}
		$type  = isset( $f['type'] ) ? $f['type'] : 'text';
		$value = esc_html( $f['value'] );

		if ( 'email' === $type ) {
			$value = '<a href="mailto:' . esc_attr( $f['value'] ) . '" style="color:#04707d; text-decoration:none; font-weight:600;">' . $value . '</a>';
		} elseif ( 'tel' === $type ) {
			$value = '<a href="tel:' . esc_attr( preg_replace( '/[^0-9+]/', '', $f['value'] ) ) . '" style="color:#04707d; text-decoration:none; font-weight:600;">' . $value . '</a>';
		}

		$rows .= '
		<tr>
			<td style="padding:11px 0; font-size:11px; font-weight:700; letter-spacing:.06em; text-transform:uppercase; color:#7b8a9a; vertical-align:top; width:170px; border-bottom:1px solid #eef2f5;">' . esc_html( $f['label'] ) . '</td>
			<td style="padding:11px 0 11px 14px; font-size:14px; color:#1e293b; font-weight:600; border-bottom:1px solid #eef2f5; line-height:1.5;">' . $value . '</td>
		</tr>';
	}

	// ---- Message block ----
	$message_html = '';
	if ( '' !== trim( (string) $message ) ) {
		$message_html = '
		<tr>
			<td style="padding:22px 30px 0;">
				<p style="margin:0 0 8px; font-size:11px; font-weight:700; letter-spacing:.06em; text-transform:uppercase; color:#7b8a9a;">Message</p>
				<div style="background:#f4f9fa; border-left:4px solid #04707d; border-radius:0 10px 10px 0; padding:16px 18px; font-size:14px; color:#33475b; line-height:1.7;">' . nl2br( esc_html( $message ) ) . '</div>
			</td>
		</tr>';
	}

	// ---- Meta rows (page, time, IP, browser) ----
	$meta_rows = '';
	if ( ! empty( $meta['page_url'] ) ) {
		$page_text  = $meta['page'] ? esc_html( $meta['page'] ) : esc_html( $meta['page_url'] );
		$meta_rows .= '<tr><td style="padding:4px 0; font-size:12px; color:#7b8a9a; width:130px;">&#128205; Submitted From</td><td style="padding:4px 0; font-size:12px;"><a href="' . esc_url( $meta['page_url'] ) . '" style="color:#04707d; text-decoration:none; font-weight:600;">' . $page_text . '</a></td></tr>';
	}
	if ( ! empty( $meta['time'] ) ) {
		$meta_rows .= '<tr><td style="padding:4px 0; font-size:12px; color:#7b8a9a;">&#128337; Date &amp; Time</td><td style="padding:4px 0; font-size:12px; color:#33475b; font-weight:600;">' . esc_html( $meta['time'] ) . '</td></tr>';
	}
	if ( ! empty( $meta['ip'] ) ) {
		$meta_rows .= '<tr><td style="padding:4px 0; font-size:12px; color:#7b8a9a;">&#127760; IP Address</td><td style="padding:4px 0; font-size:12px; color:#33475b; font-weight:600;">' . esc_html( $meta['ip'] ) . '</td></tr>';
	}
	if ( ! empty( $meta['browser'] ) ) {
		$meta_rows .= '<tr><td style="padding:4px 0; font-size:12px; color:#7b8a9a; vertical-align:top;">&#128187; Browser</td><td style="padding:4px 0; font-size:12px; color:#8a99a8; line-height:1.5;">' . esc_html( $meta['browser'] ) . '</td></tr>';
	}

	// ---- Full template ----
	return '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>' . esc_html( $heading ) . '</title>
</head>
<body style="margin:0; padding:0; background:#edf2f6; font-family:Segoe UI, Helvetica, Arial, sans-serif; -webkit-font-smoothing:antialiased;">

	<table role="presentation" width="100%" cellpadding="0" cellspacing="0" bgcolor="#edf2f6" style="padding:34px 12px;">
		<tr>
			<td align="center">

				<table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px; width:100%; background:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 10px 30px rgba(5,47,87,.10);">

					<!-- Brand accent line -->
					<tr><td height="5" bgcolor="#04707d" style="background:linear-gradient(90deg,#052f57,#04707d); font-size:0; line-height:0;">&nbsp;</td></tr>

					<!-- Header -->
					<tr>
						<td bgcolor="#052f57" style="background:linear-gradient(135deg,#052f57 0%,#04505c 100%); padding:30px 30px 26px; text-align:center;">
							<div style="display:inline-block; background:#ffffff; border-radius:12px; padding:10px 18px; margin-bottom:16px;">
								<img src="' . esc_url( $logo ) . '" alt="Your Firm Growth" width="120" style="display:block; width:120px; height:auto;">
							</div>
							<h1 style="margin:0 0 6px; color:#ffffff; font-size:21px; font-weight:800; letter-spacing:-.02em;">' . esc_html( $heading ) . '</h1>
							<p style="margin:0 0 14px; color:rgba(255,255,255,.75); font-size:13px;">You have a new enquiry from your website</p>
							<span style="display:inline-block; background:rgba(255,255,255,.14); border:1px solid rgba(255,255,255,.25); color:#a2ebd3; font-size:12px; font-weight:600; padding:6px 16px; border-radius:99px;">' . esc_html( $source ) . '</span>
						</td>
					</tr>

					<!-- Fields -->
					<tr>
						<td style="padding:26px 30px 0;">
							<table role="presentation" width="100%" cellpadding="0" cellspacing="0">' . $rows . '</table>
						</td>
					</tr>

					' . $message_html . '

					<!-- Request meta -->
					<tr>
						<td style="padding:22px 30px 26px;">
							<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafb; border:1px solid #eef2f5; border-radius:12px;">
								<tr>
									<td style="padding:14px 18px;">
										<table role="presentation" width="100%" cellpadding="0" cellspacing="0">' . $meta_rows . '</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<!-- Footer -->
					<tr>
						<td bgcolor="#f4f8fa" style="padding:18px 30px; text-align:center; border-top:1px solid #eef2f5;">
							<p style="margin:0; font-size:12px; color:#8a99a8; line-height:1.6;">
								This enquiry was sent automatically from the website forms.<br>
								&copy; ' . esc_html( $year ) . ' Your Firm Growth &middot; <a href="https://yourfirmgrowth.com" style="color:#04707d; text-decoration:none; font-weight:600;">yourfirmgrowth.com</a>
							</p>
						</td>
					</tr>

				</table>

			</td>
		</tr>
	</table>

</body>
</html>';
}

/**
 * Admin ko branded HTML email bhejta hai (Reply-To visitor par set hota hai
 * taake Reply dabate hi jawab seedha visitor ko jaye).
 *
 * @param string $subject     Email subject.
 * @param string $heading     Template ka title.
 * @param string $source      Form ka naam (header chip mein dikhta hai).
 * @param array  $fields      Field rows.
 * @param string $message     Visitor ka message.
 * @param string $reply_name  Visitor name (Reply-To).
 * @param string $reply_email Visitor email (Reply-To).
 * @return bool wp_mail() result.
 */
function yfg_send_admin_email( $subject, $heading, $source, $fields, $message, $reply_name, $reply_email, $meta = null ) {
	if ( ! is_array( $meta ) ) {
		$meta = yfg_email_request_meta();
	}
	$body = yfg_admin_email_html( $heading, $source, $fields, $message, $meta );

	$headers = array( 'Content-Type: text/html; charset=UTF-8' );

	// Reply dabate hi jawab seedha visitor ko jaye.
	if ( is_email( $reply_email ) ) {
		$reply_name = trim( preg_replace( '/[\r\n<>]/', '', (string) $reply_name ) );
		$headers[]  = $reply_name
			? 'Reply-To: ' . $reply_name . ' <' . $reply_email . '>'
			: 'Reply-To: ' . $reply_email;
	}

	foreach ( yfg_lead_cc_recipients() as $cc ) {
		$headers[] = 'Cc: ' . $cc;
	}

	return wp_mail( yfg_lead_to_recipients(), $subject, $body, $headers );
}

/**
 * Primary recipients (To). YFG_LEAD_TO comma-separated ho sakta hai.
 *
 * @return string[]
 */
function yfg_lead_to_recipients() {
	$to = yfg_split_emails( defined( 'YFG_LEAD_TO' ) ? YFG_LEAD_TO : '' );

	// Constant khali/ghalat ho to lead gum na ho — admin email par fallback.
	if ( empty( $to ) ) {
		$to = array( get_option( 'admin_email' ) );
	}

	return (array) apply_filters( 'yfg_lead_to_recipients', $to );
}

/**
 * CC recipients. YFG_LEAD_CC comma-separated ho sakta hai.
 *
 * @return string[]
 */
function yfg_lead_cc_recipients() {
	$cc = yfg_split_emails( defined( 'YFG_LEAD_CC' ) ? YFG_LEAD_CC : '' );

	// Wohi address To aur Cc dono mein na jaye.
	$cc = array_values( array_diff( $cc, yfg_lead_to_recipients() ) );

	return (array) apply_filters( 'yfg_lead_cc_recipients', $cc );
}

/**
 * Comma-separated email list ko validated array mein todta hai.
 *
 * @param string $list Comma-separated emails.
 * @return string[]
 */
function yfg_split_emails( $list ) {
	$out = array();

	foreach ( explode( ',', (string) $list ) as $email ) {
		$email = sanitize_email( trim( $email ) );
		if ( $email && is_email( $email ) ) {
			$out[] = $email;
		}
	}

	return array_values( array_unique( $out ) );
}
