<?php
/**
 * YourFirmGrowth — Leads Storage & Delivery
 * ─────────────────────────────────────────
 * Har form submission pehle database mein save hoti hai, uske BAAD email
 * bhejne ki koshish hoti hai. Is tarah SMTP fail ho jaye tab bhi lead
 * kabhi gum nahi hoti — WP Admin → Leads mein hamesha mojood rehti hai,
 * aur email khud-ba-khud dobara try hoti rehti hai.
 *
 * @package YourFirmGrowth
 */

defined( 'ABSPATH' ) || exit;

/** Schema version — badalne par table apne aap upgrade ho jata hai. */
define( 'YFG_LEADS_DB_VERSION', '1.0.0' );

/** Email fail hone par kitni dafa dobara koshish karni hai. */
define( 'YFG_LEAD_MAX_ATTEMPTS', 5 );

/**
 * Leads table ka poora naam.
 *
 * @return string
 */
function yfg_leads_table() {
	global $wpdb;
	return $wpdb->prefix . 'yfg_leads';
}

/* ============================================================
 * 1. TABLE INSTALL / UPGRADE
 * ========================================================== */

/**
 * Table banata ya upgrade karta hai jab schema version badle.
 */
function yfg_leads_maybe_install() {
	if ( get_option( 'yfg_leads_db_version' ) === YFG_LEADS_DB_VERSION ) {
		return;
	}

	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table   = yfg_leads_table();
	$collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table} (
		id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		created_at datetime NOT NULL,
		form_type varchar(32) NOT NULL DEFAULT '',
		source varchar(160) NOT NULL DEFAULT '',
		name varchar(200) NOT NULL DEFAULT '',
		email varchar(200) NOT NULL DEFAULT '',
		phone varchar(60) NOT NULL DEFAULT '',
		company varchar(200) NOT NULL DEFAULT '',
		service text NOT NULL,
		message longtext NOT NULL,
		page_title varchar(255) NOT NULL DEFAULT '',
		page_url text NOT NULL,
		ip varchar(45) NOT NULL DEFAULT '',
		user_agent varchar(255) NOT NULL DEFAULT '',
		is_read tinyint(1) NOT NULL DEFAULT 0,
		mail_status varchar(20) NOT NULL DEFAULT 'pending',
		mail_attempts smallint(5) unsigned NOT NULL DEFAULT 0,
		mail_error text NOT NULL,
		mail_sent_at datetime DEFAULT NULL,
		PRIMARY KEY  (id),
		KEY created_at (created_at),
		KEY mail_status (mail_status),
		KEY is_read (is_read)
	) {$collate};";

	dbDelta( $sql );

	update_option( 'yfg_leads_db_version', YFG_LEADS_DB_VERSION, true );
}
add_action( 'after_setup_theme', 'yfg_leads_maybe_install' );
add_action( 'after_switch_theme', 'yfg_leads_maybe_install' );

/**
 * Kya leads table database mein mojood hai?
 *
 * @return bool
 */
function yfg_leads_table_exists() {
	global $wpdb;

	$table = yfg_leads_table();

	// phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	return (bool) $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) );
}

/**
 * Table zabardasti dobara banata hai (admin button se).
 *
 * @return bool Table ab mojood hai ya nahi.
 */
function yfg_leads_force_install() {
	delete_option( 'yfg_leads_db_version' );
	yfg_leads_maybe_install();

	return yfg_leads_table_exists();
}

/**
 * Admin ka "Create Leads Table" button.
 */
function yfg_leads_admin_install() {
	if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'yfg_leads_install' ) ) {
		wp_die( esc_html__( 'Ijazat nahi.', 'yourfirmgrowth' ) );
	}

	global $wpdb;

	$ok = yfg_leads_force_install();

	if ( ! $ok && $wpdb->last_error ) {
		set_transient( 'yfg_install_error', $wpdb->last_error, 5 * MINUTE_IN_SECONDS );
	}

	wp_safe_redirect( add_query_arg(
		array( 'page' => 'yfg-leads', 'yfg_msg' => $ok ? 'table_ok' : 'table_fail' ),
		admin_url( 'admin.php' )
	) );
	exit;
}
add_action( 'admin_post_yfg_leads_install', 'yfg_leads_admin_install' );

/* ============================================================
 * 2. SAVE
 * ========================================================== */

/**
 * Ek lead database mein save karta hai.
 *
 * @param array $data Lead fields (name, email, phone, company, service, message, form_type, source).
 * @return int Insert ki gayi row ka ID, ya 0 agar fail ho.
 */
function yfg_lead_save( $data ) {
	global $wpdb;

	$referer    = wp_get_referer();
	$page_title = '';

	if ( $referer ) {
		$pid        = url_to_postid( $referer );
		$page_title = $pid ? get_the_title( $pid ) : (string) wp_parse_url( $referer, PHP_URL_PATH );
	}

	$agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) : '';

	$row = array(
		'created_at'    => current_time( 'mysql' ),
		'form_type'     => isset( $data['form_type'] ) ? substr( (string) $data['form_type'], 0, 32 ) : '',
		'source'        => isset( $data['source'] ) ? substr( (string) $data['source'], 0, 160 ) : '',
		'name'          => isset( $data['name'] ) ? substr( (string) $data['name'], 0, 200 ) : '',
		'email'         => isset( $data['email'] ) ? substr( (string) $data['email'], 0, 200 ) : '',
		'phone'         => isset( $data['phone'] ) ? substr( (string) $data['phone'], 0, 60 ) : '',
		'company'       => isset( $data['company'] ) ? substr( (string) $data['company'], 0, 200 ) : '',
		'service'       => isset( $data['service'] ) ? (string) $data['service'] : '',
		'message'       => isset( $data['message'] ) ? (string) $data['message'] : '',
		'page_title'    => substr( $page_title, 0, 255 ),
		'page_url'      => $referer ? $referer : '',
		'ip'            => yfg_lead_client_ip(),
		'user_agent'    => substr( $agent, 0, 255 ),
		'is_read'       => 0,
		'mail_status'   => 'pending',
		'mail_attempts' => 0,
		'mail_error'    => '',
	);

	$ok = $wpdb->insert( yfg_leads_table(), $row ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery

	if ( ! $ok ) {
		// Table hi missing/kharab ho to bhi lead na khoye — log kar do.
		error_log( '[YFG] Lead DB insert failed: ' . $wpdb->last_error . ' | data: ' . wp_json_encode( $row ) );
		return 0;
	}

	$lead_id = (int) $wpdb->insert_id;

	do_action( 'yfg_lead_saved', $lead_id, $row );

	return $lead_id;
}

/**
 * Visitor ka IP (proxy/CDN headers ka khayal rakhte hue).
 *
 * @return string
 */
function yfg_lead_client_ip() {
	$keys = array( 'HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR' );

	foreach ( $keys as $key ) {
		if ( empty( $_SERVER[ $key ] ) ) {
			continue;
		}
		$raw = sanitize_text_field( wp_unslash( $_SERVER[ $key ] ) );
		// X-Forwarded-For comma-separated ho sakta hai — pehla asal client hai.
		$ip = trim( explode( ',', $raw )[0] );
		if ( filter_var( $ip, FILTER_VALIDATE_IP ) ) {
			return $ip;
		}
	}

	return '';
}

/**
 * ID se ek lead uthata hai.
 *
 * @param int $id Lead ID.
 * @return array|null
 */
function yfg_lead_get( $id ) {
	global $wpdb;

	$table = yfg_leads_table();

	// phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	return $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table} WHERE id = %d", (int) $id ), ARRAY_A );
}

/* ============================================================
 * 3. EMAIL DELIVERY (+ auto retry)
 * ========================================================== */

/**
 * Lead ki notification email bhejta hai aur row ka mail status update
 * karta hai. Fail hone par background retry schedule ho jati hai.
 *
 * @param int $lead_id Lead ID.
 * @return bool Email chali gayi ya nahi.
 */
function yfg_lead_send_email( $lead_id ) {
	global $wpdb;

	$lead = yfg_lead_get( $lead_id );
	if ( ! $lead ) {
		return false;
	}

	$is_contact = 'contact' === $lead['form_type'];

	$fields = array(
		array( 'label' => 'Full Name', 'value' => $lead['name'] ),
		array( 'label' => 'Email Address', 'value' => $lead['email'], 'type' => 'email' ),
		array( 'label' => 'Phone', 'value' => $lead['phone'], 'type' => 'tel' ),
	);

	if ( $is_contact ) {
		$fields[] = array( 'label' => 'Company', 'value' => $lead['company'] );
	}

	$fields[] = array( 'label' => 'Service of Interest', 'value' => $lead['service'] );

	$heading = $is_contact ? 'New Contact Inquiry' : 'New Growth Strategy Call Request';
	$subject = ( $is_contact ? 'New Contact Inquiry — ' : 'New Growth Strategy Call request — ' ) . $lead['name'];

	// Meta DB se banti hai (na ke current request se) — retry cron ke waqt
	// referer/IP mojood nahi hota, warna email mein ghalat info jati.
	$meta = array(
		'page_url' => $lead['page_url'],
		'page'     => $lead['page_title'],
		'time'     => mysql2date( 'M j, Y — g:i a', $lead['created_at'] ) . ' (' . wp_timezone_string() . ')',
		'ip'       => $lead['ip'],
		'browser'  => $lead['user_agent'],
	);

	$sent = yfg_send_admin_email(
		$subject,
		$heading,
		$lead['source'],
		$fields,
		$lead['message'],
		$lead['name'],
		$lead['email'],
		$meta
	);

	$attempts = (int) $lead['mail_attempts'] + 1;

	if ( $sent ) {
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery
		$wpdb->update(
			yfg_leads_table(),
			array(
				'mail_status'   => 'sent',
				'mail_attempts' => $attempts,
				'mail_error'    => '',
				'mail_sent_at'  => current_time( 'mysql' ),
			),
			array( 'id' => $lead_id )
		);

		delete_transient( 'yfg_smtp_down' );

		return true;
	}

	$error = yfg_last_mail_error();
	if ( '' === $error ) {
		$error = 'wp_mail() returned false (koi tafseel nahi mili).';
	}

	// SMTP down hai — agli submissions inline send ki koshish na karein
	// (warna har visitor ko timeout ka intezar karna parega).
	set_transient( 'yfg_smtp_down', 1, 5 * MINUTE_IN_SECONDS );

	$exhausted = $attempts >= YFG_LEAD_MAX_ATTEMPTS;

	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$wpdb->update(
		yfg_leads_table(),
		array(
			'mail_status'   => $exhausted ? 'failed' : 'pending',
			'mail_attempts' => $attempts,
			'mail_error'    => substr( $error, 0, 1000 ),
		),
		array( 'id' => $lead_id )
	);

	error_log( sprintf( '[YFG] Lead #%d email attempt %d failed: %s', $lead_id, $attempts, $error ) );

	if ( ! $exhausted ) {
		yfg_lead_schedule_retry( $lead_id, $attempts );
	}

	return false;
}

/**
 * Background retry schedule karta hai (badhta hua wakfa: 2, 4, 8… minute).
 *
 * @param int $lead_id  Lead ID.
 * @param int $attempts Ab tak ki koshishein.
 */
function yfg_lead_schedule_retry( $lead_id, $attempts ) {
	$args = array( (int) $lead_id );

	if ( wp_next_scheduled( 'yfg_lead_retry_mail', $args ) ) {
		return;
	}

	$delay = MINUTE_IN_SECONDS * pow( 2, min( (int) $attempts, 5 ) );

	wp_schedule_single_event( time() + $delay, 'yfg_lead_retry_mail', $args );
}

/**
 * Cron handler — pending lead ki email dobara bhejta hai.
 *
 * @param int $lead_id Lead ID.
 */
function yfg_lead_retry_mail( $lead_id ) {
	$lead = yfg_lead_get( $lead_id );

	if ( ! $lead || 'pending' !== $lead['mail_status'] ) {
		return;
	}

	// Cron background mein chalti hai — yahan transient ki rukawat nahi.
	delete_transient( 'yfg_smtp_down' );

	yfg_lead_send_email( $lead_id );
}
add_action( 'yfg_lead_retry_mail', 'yfg_lead_retry_mail' );

/**
 * Submission ke waqt email bhejne ka faisla: agar SMTP abhi abhi fail hua
 * hai to inline koshish skip karke seedha background retry par daal do,
 * taake visitor ko form submit par intezar na karna pare.
 *
 * @param int $lead_id Lead ID.
 */
function yfg_lead_deliver( $lead_id ) {
	if ( ! $lead_id ) {
		return;
	}

	if ( get_transient( 'yfg_smtp_down' ) ) {
		yfg_lead_schedule_retry( $lead_id, 0 );
		return;
	}

	yfg_lead_send_email( $lead_id );
}

/* ============================================================
 * 4. ADMIN — LEADS SCREEN
 * ========================================================== */

/**
 * WP Admin mein "Leads" menu (naye leads ka count bubble ke saath).
 */
function yfg_leads_admin_menu() {
	$new   = yfg_leads_unread_count();
	$label = __( 'Leads', 'yourfirmgrowth' );

	if ( $new ) {
		$label .= ' <span class="awaiting-mod"><span class="pending-count">' . (int) $new . '</span></span>';
	}

	add_menu_page(
		__( 'Form Leads', 'yourfirmgrowth' ),
		$label,
		'manage_options',
		'yfg-leads',
		'yfg_leads_render_page',
		'dashicons-email-alt',
		26
	);
}
add_action( 'admin_menu', 'yfg_leads_admin_menu' );

/**
 * Ab tak na parhe gaye leads ki tadaad.
 *
 * @return int
 */
function yfg_leads_unread_count() {
	global $wpdb;

	$table = yfg_leads_table();

	// phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	return (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table} WHERE is_read = 0" );
}

/**
 * Leads screen render karta hai (list ya single lead detail).
 */
function yfg_leads_render_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Aap is page ko dekhne ke mujaz nahi hain.', 'yourfirmgrowth' ) );
	}

	$view_id = isset( $_GET['lead'] ) ? (int) $_GET['lead'] : 0; // phpcs:ignore WordPress.Security.NonceVerification

	if ( $view_id ) {
		yfg_leads_render_single( $view_id );
		return;
	}

	yfg_leads_render_list();
}

/**
 * Leads ki list table.
 */
function yfg_leads_render_list() {
	global $wpdb;

	$table = yfg_leads_table();

	// Table hi na ho to list chalane ka faida nahi — pehle banane ka mauqa do.
	if ( ! yfg_leads_table_exists() ) {
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Form Leads', 'yourfirmgrowth' ); ?></h1>
			<?php yfg_leads_admin_notice(); ?>
			<div class="notice notice-error">
				<p>
					<strong><?php esc_html_e( 'Leads table database mein mojood nahi hai.', 'yourfirmgrowth' ); ?></strong><br>
					<?php
					printf(
						/* translators: %s: table name */
						esc_html__( 'Table ka naam: %s — neeche wala button dabayein, ban jayega.', 'yourfirmgrowth' ),
						'<code>' . esc_html( $table ) . '</code>'
					);
					?>
				</p>
				<p>
					<a class="button button-primary" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=yfg_leads_install' ), 'yfg_leads_install' ) ); ?>">
						<?php esc_html_e( 'Create Leads Table', 'yourfirmgrowth' ); ?>
					</a>
				</p>
			</div>
		</div>
		<?php
		return;
	}

	// phpcs:disable WordPress.Security.NonceVerification.Recommended
	$search = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';
	$type   = isset( $_GET['form_type'] ) ? sanitize_key( wp_unslash( $_GET['form_type'] ) ) : '';
	$mail   = isset( $_GET['mail_status'] ) ? sanitize_key( wp_unslash( $_GET['mail_status'] ) ) : '';
	$paged  = isset( $_GET['paged'] ) ? max( 1, (int) $_GET['paged'] ) : 1;
	// phpcs:enable

	$per_page = 20;
	$offset   = ( $paged - 1 ) * $per_page;

	$where  = array( '1=1' );
	$params = array();

	if ( $search ) {
		$like     = '%' . $wpdb->esc_like( $search ) . '%';
		$where[]  = '(name LIKE %s OR email LIKE %s OR phone LIKE %s OR company LIKE %s OR message LIKE %s)';
		$params   = array_merge( $params, array( $like, $like, $like, $like, $like ) );
	}
	if ( in_array( $type, array( 'lead', 'contact' ), true ) ) {
		$where[]  = 'form_type = %s';
		$params[] = $type;
	}
	if ( in_array( $mail, array( 'sent', 'pending', 'failed' ), true ) ) {
		$where[]  = 'mail_status = %s';
		$params[] = $mail;
	}

	$where_sql = implode( ' AND ', $where );

	// phpcs:disable WordPress.DB.DirectDatabaseQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	$count_sql = "SELECT COUNT(*) FROM {$table} WHERE {$where_sql}";
	$total     = (int) $wpdb->get_var( $params ? $wpdb->prepare( $count_sql, $params ) : $count_sql );

	$list_sql = "SELECT * FROM {$table} WHERE {$where_sql} ORDER BY created_at DESC, id DESC LIMIT %d OFFSET %d";
	$rows     = $wpdb->get_results( $wpdb->prepare( $list_sql, array_merge( $params, array( $per_page, $offset ) ) ), ARRAY_A );
	// phpcs:enable

	$pages = (int) ceil( $total / $per_page );
	?>
	<div class="wrap">
		<h1 class="wp-heading-inline"><?php esc_html_e( 'Form Leads', 'yourfirmgrowth' ); ?></h1>

		<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=yfg_leads_export' ), 'yfg_leads_export' ) ); ?>" class="page-title-action">
			<?php esc_html_e( 'Export CSV', 'yourfirmgrowth' ); ?>
		</a>

		<hr class="wp-header-end">

		<?php yfg_leads_admin_notice(); ?>

		<p class="description">
			<?php
			printf(
				/* translators: 1: To address, 2: CC address */
				esc_html__( 'Notifications: %1$s (CC: %2$s)', 'yourfirmgrowth' ),
				'<strong>' . esc_html( implode( ', ', yfg_lead_to_recipients() ) ) . '</strong>',
				'<strong>' . esc_html( implode( ', ', yfg_lead_cc_recipients() ) ?: '—' ) . '</strong>'
			);
			?>
		</p>

		<?php yfg_leads_smtp_panel(); ?>

		<form method="get">
			<input type="hidden" name="page" value="yfg-leads">
			<p class="search-box">
				<select name="form_type">
					<option value=""><?php esc_html_e( 'All forms', 'yourfirmgrowth' ); ?></option>
					<option value="lead" <?php selected( $type, 'lead' ); ?>><?php esc_html_e( 'Strategy Call / Lead', 'yourfirmgrowth' ); ?></option>
					<option value="contact" <?php selected( $type, 'contact' ); ?>><?php esc_html_e( 'Contact', 'yourfirmgrowth' ); ?></option>
				</select>
				<select name="mail_status">
					<option value=""><?php esc_html_e( 'Any email status', 'yourfirmgrowth' ); ?></option>
					<option value="sent" <?php selected( $mail, 'sent' ); ?>><?php esc_html_e( 'Sent', 'yourfirmgrowth' ); ?></option>
					<option value="pending" <?php selected( $mail, 'pending' ); ?>><?php esc_html_e( 'Pending', 'yourfirmgrowth' ); ?></option>
					<option value="failed" <?php selected( $mail, 'failed' ); ?>><?php esc_html_e( 'Failed', 'yourfirmgrowth' ); ?></option>
				</select>
				<input type="search" name="s" value="<?php echo esc_attr( $search ); ?>" placeholder="<?php esc_attr_e( 'Search leads…', 'yourfirmgrowth' ); ?>">
				<?php submit_button( __( 'Filter', 'yourfirmgrowth' ), '', '', false ); ?>
			</p>
		</form>

		<table class="wp-list-table widefat fixed striped">
			<thead>
				<tr>
					<th style="width:140px;"><?php esc_html_e( 'Date', 'yourfirmgrowth' ); ?></th>
					<th style="width:170px;"><?php esc_html_e( 'Name', 'yourfirmgrowth' ); ?></th>
					<th><?php esc_html_e( 'Email / Phone', 'yourfirmgrowth' ); ?></th>
					<th style="width:180px;"><?php esc_html_e( 'Service', 'yourfirmgrowth' ); ?></th>
					<th style="width:130px;"><?php esc_html_e( 'Form', 'yourfirmgrowth' ); ?></th>
					<th style="width:110px;"><?php esc_html_e( 'Email', 'yourfirmgrowth' ); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php if ( ! $rows ) : ?>
				<tr><td colspan="6"><?php esc_html_e( 'Abhi tak koi lead nahi aayi.', 'yourfirmgrowth' ); ?></td></tr>
			<?php else : ?>
				<?php foreach ( $rows as $row ) : ?>
					<tr<?php echo $row['is_read'] ? '' : ' style="font-weight:600;"'; ?>>
						<td><?php echo esc_html( mysql2date( 'M j, Y g:i a', $row['created_at'] ) ); ?></td>
						<td>
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=yfg-leads&lead=' . (int) $row['id'] ) ); ?>">
								<?php echo esc_html( $row['name'] ? $row['name'] : '(no name)' ); ?>
							</a>
						</td>
						<td>
							<a href="mailto:<?php echo esc_attr( $row['email'] ); ?>"><?php echo esc_html( $row['email'] ); ?></a>
							<?php if ( $row['phone'] ) : ?><br><span class="description"><?php echo esc_html( $row['phone'] ); ?></span><?php endif; ?>
						</td>
						<td><?php echo esc_html( $row['service'] ? $row['service'] : '—' ); ?></td>
						<td><?php echo esc_html( $row['source'] ); ?></td>
						<td><?php echo wp_kses_post( yfg_lead_status_badge( $row['mail_status'] ) ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>

		<?php if ( $pages > 1 ) : ?>
			<div class="tablenav"><div class="tablenav-pages">
				<?php
				echo wp_kses_post( paginate_links( array(
					'base'      => add_query_arg( 'paged', '%#%' ),
					'format'    => '',
					'current'   => $paged,
					'total'     => $pages,
					'prev_text' => '&laquo;',
					'next_text' => '&raquo;',
				) ) );
				?>
			</div></div>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Email status ka rangeen badge.
 *
 * @param string $status sent|pending|failed.
 * @return string HTML.
 */
function yfg_lead_status_badge( $status ) {
	$map = array(
		'sent'    => array( '#0a6b3d', '#d7f0e1', __( 'Sent', 'yourfirmgrowth' ) ),
		'pending' => array( '#8a5b00', '#fdf0d5', __( 'Pending', 'yourfirmgrowth' ) ),
		'failed'  => array( '#8c1d1d', '#fbdddd', __( 'Failed', 'yourfirmgrowth' ) ),
	);

	$s = isset( $map[ $status ] ) ? $map[ $status ] : array( '#555', '#eee', $status );

	return sprintf(
		'<span style="display:inline-block;padding:2px 9px;border-radius:99px;font-size:11px;font-weight:600;color:%s;background:%s;">%s</span>',
		esc_attr( $s[0] ),
		esc_attr( $s[1] ),
		esc_html( $s[2] )
	);
}

/**
 * Ek lead ki mukammal tafseel.
 *
 * @param int $id Lead ID.
 */
function yfg_leads_render_single( $id ) {
	global $wpdb;

	$lead = yfg_lead_get( $id );

	if ( ! $lead ) {
		echo '<div class="wrap"><h1>' . esc_html__( 'Lead nahi mili', 'yourfirmgrowth' ) . '</h1></div>';
		return;
	}

	// Kholte hi "read" mark ho jaye.
	if ( ! $lead['is_read'] ) {
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery
		$wpdb->update( yfg_leads_table(), array( 'is_read' => 1 ), array( 'id' => $id ) );
		$lead['is_read'] = 1;
	}

	$rows = array(
		__( 'Received', 'yourfirmgrowth' )   => mysql2date( 'M j, Y — g:i a', $lead['created_at'] ),
		__( 'Form', 'yourfirmgrowth' )       => $lead['source'],
		__( 'Full Name', 'yourfirmgrowth' )  => $lead['name'],
		__( 'Email', 'yourfirmgrowth' )      => $lead['email'] ? '<a href="mailto:' . esc_attr( $lead['email'] ) . '">' . esc_html( $lead['email'] ) . '</a>' : '—',
		__( 'Phone', 'yourfirmgrowth' )      => $lead['phone'] ? esc_html( $lead['phone'] ) : '—',
		__( 'Company', 'yourfirmgrowth' )    => $lead['company'] ? esc_html( $lead['company'] ) : '—',
		__( 'Service', 'yourfirmgrowth' )    => $lead['service'] ? esc_html( $lead['service'] ) : '—',
		__( 'Submitted From', 'yourfirmgrowth' ) => $lead['page_url'] ? '<a href="' . esc_url( $lead['page_url'] ) . '" target="_blank" rel="noopener">' . esc_html( $lead['page_title'] ? $lead['page_title'] : $lead['page_url'] ) . '</a>' : '—',
		__( 'IP Address', 'yourfirmgrowth' ) => $lead['ip'] ? esc_html( $lead['ip'] ) : '—',
		__( 'Browser', 'yourfirmgrowth' )    => $lead['user_agent'] ? esc_html( $lead['user_agent'] ) : '—',
	);
	?>
	<div class="wrap">
		<h1 class="wp-heading-inline"><?php esc_html_e( 'Lead', 'yourfirmgrowth' ); ?> #<?php echo (int) $lead['id']; ?></h1>
		<a href="<?php echo esc_url( admin_url( 'admin.php?page=yfg-leads' ) ); ?>" class="page-title-action">&larr; <?php esc_html_e( 'All leads', 'yourfirmgrowth' ); ?></a>
		<hr class="wp-header-end">

		<?php yfg_leads_admin_notice(); ?>

		<div class="card" style="max-width:820px;padding:0 20px 20px;">
			<h2><?php echo esc_html( $lead['name'] ); ?> <?php echo wp_kses_post( yfg_lead_status_badge( $lead['mail_status'] ) ); ?></h2>

			<table class="widefat striped" style="margin-bottom:18px;">
				<tbody>
				<?php foreach ( $rows as $label => $value ) : ?>
					<tr>
						<th style="width:180px;"><?php echo esc_html( $label ); ?></th>
						<td><?php echo wp_kses_post( $value ); ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<?php if ( trim( $lead['message'] ) ) : ?>
				<h3><?php esc_html_e( 'Message', 'yourfirmgrowth' ); ?></h3>
				<div style="background:#f4f9fa;border-left:4px solid #04707d;padding:14px 16px;white-space:pre-wrap;">
					<?php echo esc_html( $lead['message'] ); ?>
				</div>
			<?php endif; ?>

			<?php if ( 'sent' !== $lead['mail_status'] && $lead['mail_error'] ) : ?>
				<h3><?php esc_html_e( 'Email Error', 'yourfirmgrowth' ); ?></h3>
				<div style="background:#fbdddd;border-left:4px solid #8c1d1d;padding:12px 14px;">
					<code><?php echo esc_html( $lead['mail_error'] ); ?></code>
					<p class="description" style="margin:8px 0 0;">
						<?php
						printf(
							/* translators: %d: attempts */
							esc_html__( 'Koshishein: %d', 'yourfirmgrowth' ),
							(int) $lead['mail_attempts']
						);
						?>
					</p>
				</div>
			<?php endif; ?>

			<p style="margin-top:20px;">
				<a class="button button-primary" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=yfg_lead_resend&lead=' . (int) $lead['id'] ), 'yfg_lead_resend_' . (int) $lead['id'] ) ); ?>">
					<?php esc_html_e( 'Resend Email', 'yourfirmgrowth' ); ?>
				</a>
				<a class="button button-link-delete" style="float:right;" onclick="return confirm('<?php echo esc_js( __( 'Yeh lead permanently delete ho jayegi. Pakka?', 'yourfirmgrowth' ) ); ?>');" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=yfg_lead_delete&lead=' . (int) $lead['id'] ), 'yfg_lead_delete_' . (int) $lead['id'] ) ); ?>">
					<?php esc_html_e( 'Delete', 'yourfirmgrowth' ); ?>
				</a>
			</p>
		</div>
	</div>
	<?php
}

/**
 * Redirect ke baad admin notice dikhata hai.
 */
function yfg_leads_admin_notice() {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$msg = isset( $_GET['yfg_msg'] ) ? sanitize_key( wp_unslash( $_GET['yfg_msg'] ) ) : '';

	$map = array(
		'resent'      => array( 'success', __( 'Email dobara bhej di gayi.', 'yourfirmgrowth' ) ),
		'resend_fail' => array( 'error', __( 'Email abhi bhi nahi ja saki — lead detail mein error dekhein. Background retry schedule kar di gayi hai.', 'yourfirmgrowth' ) ),
		'deleted'     => array( 'success', __( 'Lead delete ho gayi.', 'yourfirmgrowth' ) ),
		'test_ok'     => array( 'success', __( 'Test email bhej di gayi — inbox (aur spam folder) check karein.', 'yourfirmgrowth' ) ),
		'test_fail'   => array( 'error', __( 'Test email nahi ja saki.', 'yourfirmgrowth' ) ),
		'table_ok'    => array( 'success', __( 'Leads table ban gaya — ab har form submission yahan save hogi.', 'yourfirmgrowth' ) ),
		'table_fail'  => array( 'error', __( 'Table nahi ban saka.', 'yourfirmgrowth' ) ),
	);

	if ( ! isset( $map[ $msg ] ) ) {
		return;
	}

	$text = $map[ $msg ][1];

	if ( 'test_fail' === $msg ) {
		$err = get_transient( 'yfg_test_mail_error' );
		if ( $err ) {
			$text .= ' ' . __( 'Wajah:', 'yourfirmgrowth' ) . ' ' . $err;
		}
		delete_transient( 'yfg_test_mail_error' );
	}

	if ( 'table_fail' === $msg ) {
		$err = get_transient( 'yfg_install_error' );
		if ( $err ) {
			$text .= ' ' . __( 'MySQL error:', 'yourfirmgrowth' ) . ' ' . $err;
		}
		delete_transient( 'yfg_install_error' );
	}

	printf(
		'<div class="notice notice-%s is-dismissible"><p>%s</p></div>',
		esc_attr( $map[ $msg ][0] ),
		esc_html( $text )
	);
}

/* ============================================================
 * 4b. SMTP DIAGNOSTICS PANEL
 * ========================================================== */

/**
 * Mojooda SMTP settings + connectivity check + test email button.
 * Isse foran pata chal jata hai ke mail server tak rasai hai ya nahi.
 */
function yfg_leads_smtp_panel() {
	$host = defined( 'YFG_SMTP_HOST' ) ? YFG_SMTP_HOST : '';
	$port = defined( 'YFG_SMTP_PORT' ) ? (int) YFG_SMTP_PORT : 465;
	$user = defined( 'YFG_SMTP_USER' ) ? YFG_SMTP_USER : '';

	// SMTP abhi set hi nahi — sirf hidayat dikhao, connect karne ki koshish nahi.
	if ( ! yfg_smtp_is_configured() ) {
		?>
		<div class="card" style="max-width:820px;padding:6px 20px 16px;margin-top:16px;">
			<h2 style="margin-bottom:6px;"><?php esc_html_e( 'Email Delivery (SMTP)', 'yourfirmgrowth' ); ?></h2>
			<div class="notice notice-warning inline" style="margin:0 0 6px;">
				<p style="margin:.6em 0;">
					<strong><?php esc_html_e( 'SMTP abhi set nahi hai — emails nahi ja rahin.', 'yourfirmgrowth' ); ?></strong><br>
					<?php esc_html_e( 'wp-config.php kholein aur YFG_SMTP_HOST + YFG_SMTP_PASS mein cPanel ki asal values daalein. Values cPanel → Email Accounts → Connect Devices → Mail Client Manual Settings mein milengi.', 'yourfirmgrowth' ); ?><br>
					<?php esc_html_e( 'Fikar na karein — us waqt tak bhi har lead neeche list mein mehfooz ho rahi hai, aur settings theek karte hi purani leads ko "Resend Email" se bheja ja sakta hai.', 'yourfirmgrowth' ); ?>
				</p>
			</div>
		</div>
		<?php
		return;
	}

	$ip = gethostbyname( $host );

	// Connectivity check cache — har page load par 10s intezar na ho.
	$probe = get_transient( 'yfg_smtp_probe' );

	if ( false === $probe ) {
		$start = microtime( true );

		// Shared hosting ke SSL certs aksar hostname se match nahi karte
		// (khaas kar 'localhost' par). PHPMailer bhi verification off rakhta
		// hai, is liye probe bhi wahi kare — warna kaam karta SMTP bhi
		// ghalat se "Failed" dikhta hai.
		$ctx = stream_context_create( array(
			'ssl' => array(
				'verify_peer'       => false,
				'verify_peer_name'  => false,
				'allow_self_signed' => true,
			),
		) );

		$target = ( 465 === $port ? 'ssl://' : 'tcp://' ) . $host . ':' . $port;
		$sock   = @stream_socket_client( $target, $errno, $errstr, 8, STREAM_CLIENT_CONNECT, $ctx ); // phpcs:ignore

		$probe = array(
			'ok'    => (bool) $sock,
			'error' => $sock ? '' : $errstr,
			'time'  => round( microtime( true ) - $start, 1 ),
		);

		if ( $sock ) {
			fclose( $sock );
		}

		set_transient( 'yfg_smtp_probe', $probe, 5 * MINUTE_IN_SECONDS );
	}

	// Cloudflare ki proxied IP ranges — SMTP kabhi kaam nahi karega.
	$cf_ranges  = array( '104.16.', '104.17.', '104.18.', '104.19.', '104.20.', '104.21.', '104.22.', '104.23.', '104.24.', '104.25.', '104.26.', '104.27.', '172.64.', '172.65.', '172.66.', '172.67.', '172.68.', '172.69.', '162.158.', '162.159.', '188.114.', '190.93.', '197.234.', '198.41.' );
	$is_cf      = false;
	foreach ( $cf_ranges as $r ) {
		if ( 0 === strpos( $ip, $r ) ) {
			$is_cf = true;
			break;
		}
	}
	?>
	<div class="card" style="max-width:820px;padding:6px 20px 16px;margin-top:16px;">
		<h2 style="margin-bottom:6px;"><?php esc_html_e( 'Email Delivery (SMTP)', 'yourfirmgrowth' ); ?></h2>

		<table class="widefat striped" style="margin-bottom:14px;">
			<tbody>
				<tr><th style="width:170px;"><?php esc_html_e( 'SMTP Host', 'yourfirmgrowth' ); ?></th><td><code><?php echo esc_html( $host ); ?></code> &rarr; <code><?php echo esc_html( $ip ); ?></code></td></tr>
				<tr><th><?php esc_html_e( 'Port', 'yourfirmgrowth' ); ?></th><td><code><?php echo (int) $port; ?></code></td></tr>
				<tr><th><?php esc_html_e( 'Username', 'yourfirmgrowth' ); ?></th><td><code><?php echo esc_html( $user ); ?></code></td></tr>
				<tr>
					<th><?php esc_html_e( 'Connection', 'yourfirmgrowth' ); ?></th>
					<td>
						<?php if ( $probe['ok'] ) : ?>
							<?php echo wp_kses_post( yfg_lead_status_badge( 'sent' ) ); ?>
							<?php
							printf(
								/* translators: %s: seconds */
								esc_html__( 'Reachable (%ss)', 'yourfirmgrowth' ),
								esc_html( $probe['time'] )
							);
							?>
						<?php else : ?>
							<?php echo wp_kses_post( yfg_lead_status_badge( 'failed' ) ); ?>
							<code><?php echo esc_html( $probe['error'] ); ?></code>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>

		<?php if ( $is_cf ) : ?>
			<div class="notice notice-error inline" style="margin:0 0 14px;">
				<p style="margin:.6em 0;">
					<strong><?php esc_html_e( 'Masla mil gaya:', 'yourfirmgrowth' ); ?></strong>
					<?php
					printf(
						/* translators: 1: host, 2: ip */
						esc_html__( '%1$s ek Cloudflare IP (%2$s) par ja raha hai. Cloudflare sirf HTTP/HTTPS proxy karta hai — SMTP nahi. Is host par email kabhi nahi jayegi.', 'yourfirmgrowth' ),
						'<code>' . esc_html( $host ) . '</code>',
						'<code>' . esc_html( $ip ) . '</code>'
					);
					?>
					<br>
					<?php esc_html_e( 'Hal: Cloudflare DNS mein "mail" record ko DNS-only (grey cloud) karein, ya wp-config.php mein YFG_SMTP_HOST apne hosting ke asal mail server par set karein.', 'yourfirmgrowth' ); ?>
				</p>
			</div>
		<?php endif; ?>

		<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" style="margin:0;">
			<input type="hidden" name="action" value="yfg_lead_test_mail">
			<?php wp_nonce_field( 'yfg_lead_test_mail' ); ?>
			<button type="submit" class="button"><?php esc_html_e( 'Send Test Email', 'yourfirmgrowth' ); ?></button>
			<span class="description">
				<?php
				printf(
					/* translators: %s: recipients */
					esc_html__( 'Test email %s par jayegi.', 'yourfirmgrowth' ),
					esc_html( implode( ', ', array_merge( yfg_lead_to_recipients(), yfg_lead_cc_recipients() ) ) )
				);
				?>
			</span>
		</form>
	</div>
	<?php
}

/**
 * Test email bhejta hai aur asal error dikhata hai.
 */
function yfg_lead_test_mail() {
	if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'yfg_lead_test_mail' ) ) {
		wp_die( esc_html__( 'Ijazat nahi.', 'yourfirmgrowth' ) );
	}

	delete_transient( 'yfg_smtp_down' );
	delete_transient( 'yfg_smtp_probe' );

	$headers = array( 'Content-Type: text/html; charset=UTF-8' );
	foreach ( yfg_lead_cc_recipients() as $cc ) {
		$headers[] = 'Cc: ' . $cc;
	}

	$sent = wp_mail(
		yfg_lead_to_recipients(),
		'YFG test email — ' . current_time( 'M j, Y g:i a' ),
		'<p>Yeh <strong>Your Firm Growth</strong> website ki test email hai. Agar yeh mil gayi hai to form notifications theek kaam kar rahi hain.</p>',
		$headers
	);

	$args = array( 'page' => 'yfg-leads', 'yfg_msg' => $sent ? 'test_ok' : 'test_fail' );

	if ( ! $sent ) {
		set_transient( 'yfg_test_mail_error', yfg_last_mail_error(), 5 * MINUTE_IN_SECONDS );
	}

	wp_safe_redirect( add_query_arg( $args, admin_url( 'admin.php' ) ) );
	exit;
}
add_action( 'admin_post_yfg_lead_test_mail', 'yfg_lead_test_mail' );

/* ============================================================
 * 5. ADMIN ACTIONS — resend / delete / export
 * ========================================================== */

/**
 * Ek lead ki email dobara bhejta hai.
 */
function yfg_lead_admin_resend() {
	$id = isset( $_GET['lead'] ) ? (int) $_GET['lead'] : 0;

	if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'yfg_lead_resend_' . $id ) ) {
		wp_die( esc_html__( 'Ijazat nahi.', 'yourfirmgrowth' ) );
	}

	delete_transient( 'yfg_smtp_down' );
	$sent = yfg_lead_send_email( $id );

	wp_safe_redirect( admin_url( 'admin.php?page=yfg-leads&lead=' . $id . '&yfg_msg=' . ( $sent ? 'resent' : 'resend_fail' ) ) );
	exit;
}
add_action( 'admin_post_yfg_lead_resend', 'yfg_lead_admin_resend' );

/**
 * Ek lead delete karta hai.
 */
function yfg_lead_admin_delete() {
	global $wpdb;

	$id = isset( $_GET['lead'] ) ? (int) $_GET['lead'] : 0;

	if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'yfg_lead_delete_' . $id ) ) {
		wp_die( esc_html__( 'Ijazat nahi.', 'yourfirmgrowth' ) );
	}

	// phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$wpdb->delete( yfg_leads_table(), array( 'id' => $id ) );

	wp_safe_redirect( admin_url( 'admin.php?page=yfg-leads&yfg_msg=deleted' ) );
	exit;
}
add_action( 'admin_post_yfg_lead_delete', 'yfg_lead_admin_delete' );

/**
 * Saari leads CSV mein export karta hai.
 */
function yfg_leads_export_csv() {
	global $wpdb;

	if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'yfg_leads_export' ) ) {
		wp_die( esc_html__( 'Ijazat nahi.', 'yourfirmgrowth' ) );
	}

	$table = yfg_leads_table();

	// phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	$rows = $wpdb->get_results( "SELECT * FROM {$table} ORDER BY created_at DESC", ARRAY_A );

	nocache_headers();
	header( 'Content-Type: text/csv; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=yfg-leads-' . gmdate( 'Y-m-d' ) . '.csv' );

	$out = fopen( 'php://output', 'w' );

	// Excel UTF-8 ko sahi parhe.
	fwrite( $out, "\xEF\xBB\xBF" );

	fputcsv( $out, array( 'ID', 'Date', 'Form', 'Name', 'Email', 'Phone', 'Company', 'Service', 'Message', 'Page', 'Page URL', 'IP', 'Email Status' ) );

	foreach ( $rows as $r ) {
		fputcsv( $out, array(
			$r['id'],
			$r['created_at'],
			$r['source'],
			$r['name'],
			$r['email'],
			$r['phone'],
			$r['company'],
			$r['service'],
			$r['message'],
			$r['page_title'],
			$r['page_url'],
			$r['ip'],
			$r['mail_status'],
		) );
	}

	fclose( $out );
	exit;
}
add_action( 'admin_post_yfg_leads_export', 'yfg_leads_export_csv' );
