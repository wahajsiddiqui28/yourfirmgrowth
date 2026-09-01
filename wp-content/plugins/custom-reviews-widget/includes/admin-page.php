<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_menu', 'crw_register_admin_menu' );
function crw_register_admin_menu() {
	add_menu_page(
		'My Reviews',
		'My Reviews',
		'manage_options',
		'crw-reviews',
		'crw_render_admin_page',
		'dashicons-star-filled',
		26
	);
}

function crw_render_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	global $wpdb;
	$table_name = $wpdb->prefix . CRW_TABLE;

	// ---- DELETE ----
	if ( isset( $_GET['delete'] ) && isset( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'crw_delete_' . $_GET['delete'] ) ) {
		$wpdb->delete( $table_name, array( 'id' => intval( $_GET['delete'] ) ) );
		echo '<div class="notice notice-success is-dismissible"><p>Review delete ho gaya.</p></div>';
	}

	// ---- SAVE (add or edit) ----
	if ( isset( $_POST['crw_save_review'] ) && check_admin_referer( 'crw_save_review_action', 'crw_nonce' ) ) {
		$data = array(
			'name'        => sanitize_text_field( $_POST['name'] ),
			'rating'      => max( 1, min( 5, intval( $_POST['rating'] ) ) ),
			'review_text' => sanitize_textarea_field( $_POST['review_text'] ),
			'source'      => sanitize_text_field( $_POST['source'] ),
			'profile_img' => esc_url_raw( $_POST['profile_img'] ),
			'review_date' => sanitize_text_field( $_POST['review_date'] ),
			'verified'    => isset( $_POST['verified'] ) ? 1 : 0,
			'sort_order'  => intval( $_POST['sort_order'] ),
		);

		if ( ! empty( $_POST['review_id'] ) ) {
			$wpdb->update( $table_name, $data, array( 'id' => intval( $_POST['review_id'] ) ) );
			echo '<div class="notice notice-success is-dismissible"><p>Review update ho gaya.</p></div>';
		} else {
			$wpdb->insert( $table_name, $data );
			echo '<div class="notice notice-success is-dismissible"><p>Naya review add ho gaya.</p></div>';
		}
	}

	// Agar edit link se aaye hain to us review ka data load karo
	$editing = null;
	if ( isset( $_GET['edit'] ) ) {
		$editing = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name WHERE id = %d", intval( $_GET['edit'] ) ) );
	}

	$all_reviews = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY sort_order ASC, id DESC" );
	?>
	<div class="wrap">
		<h1><?php echo $editing ? 'Review Edit Karo' : 'Naya Review Add Karo'; ?></h1>

		<form method="post" style="max-width:700px;background:#fff;padding:20px;border:1px solid #ccd0d4;">
			<?php wp_nonce_field( 'crw_save_review_action', 'crw_nonce' ); ?>
			<input type="hidden" name="review_id" value="<?php echo $editing ? esc_attr( $editing->id ) : ''; ?>">

			<table class="form-table">
				<tr>
					<th><label for="name">Naam</label></th>
					<td><input type="text" name="name" id="name" class="regular-text" required value="<?php echo $editing ? esc_attr( $editing->name ) : ''; ?>"></td>
				</tr>
				<tr>
					<th><label for="source">Source</label></th>
					<td>
						<select name="source" id="source">
							<option value="google" <?php selected( $editing && $editing->source === 'google' ); ?>>Google</option>
							<option value="trustindex" <?php selected( $editing && $editing->source === 'trustindex' ); ?>>Trustindex</option>
							<option value="custom" <?php selected( $editing && $editing->source === 'custom' ); ?>>Custom</option>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="rating">Rating (1-5)</label></th>
					<td><input type="number" name="rating" id="rating" min="1" max="5" value="<?php echo $editing ? esc_attr( $editing->rating ) : '5'; ?>"></td>
				</tr>
				<tr>
					<th><label for="review_text">Review Text</label></th>
					<td><textarea name="review_text" id="review_text" rows="5" class="large-text" required><?php echo $editing ? esc_textarea( $editing->review_text ) : ''; ?></textarea></td>
				</tr>
				<tr>
					<th><label for="profile_img">Profile Image URL (optional)</label></th>
					<td><input type="text" name="profile_img" id="profile_img" class="regular-text" value="<?php echo $editing ? esc_attr( $editing->profile_img ) : ''; ?>" placeholder="khali chhodo to naam ka pehla letter avatar ban jayega"></td>
				</tr>
				<tr>
					<th><label for="review_date">Date Text</label></th>
					<td><input type="text" name="review_date" id="review_date" class="regular-text" value="<?php echo $editing ? esc_attr( $editing->review_date ) : 'today'; ?>" placeholder="jaise: today, 2 days ago, 1 week ago"></td>
				</tr>
				<tr>
					<th><label for="verified">Verified Badge</label></th>
					<td><label><input type="checkbox" name="verified" id="verified" <?php checked( ! $editing || $editing->verified ); ?>> Blue/black tick dikhao</label></td>
				</tr>
				<tr>
					<th><label for="sort_order">Order</label></th>
					<td><input type="number" name="sort_order" id="sort_order" value="<?php echo $editing ? esc_attr( $editing->sort_order ) : '0'; ?>"></td>
				</tr>
			</table>

			<p class="submit">
				<button type="submit" name="crw_save_review" class="button button-primary"><?php echo $editing ? 'Update Karo' : 'Add Karo'; ?></button>
				<?php if ( $editing ) : ?>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=crw-reviews' ) ); ?>" class="button">Cancel</a>
				<?php endif; ?>
			</p>
		</form>

		<h2 style="margin-top:40px;">Sab Reviews (<?php echo count( $all_reviews ); ?>)</h2>
		<p>Shortcode kahin bhi paste karo: <code>[firm_reviews source="all"]</code> — ya sirf ek source: <code>[firm_reviews source="google"]</code> ya <code>[firm_reviews source="trustindex"]</code></p>

		<table class="wp-list-table widefat fixed striped">
			<thead>
				<tr>
					<th>Naam</th>
					<th>Source</th>
					<th>Rating</th>
					<th>Text</th>
					<th>Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $all_reviews as $r ) : ?>
					<tr>
						<td><?php echo esc_html( $r->name ); ?></td>
						<td><?php echo esc_html( ucfirst( $r->source ) ); ?></td>
						<td><?php echo str_repeat( '★', intval( $r->rating ) ); ?></td>
						<td><?php echo esc_html( wp_trim_words( $r->review_text, 12 ) ); ?></td>
						<td><?php echo esc_html( $r->review_date ); ?></td>
						<td>
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=crw-reviews&edit=' . $r->id ) ); ?>">Edit</a> |
							<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=crw-reviews&delete=' . $r->id ), 'crw_delete_' . $r->id ) ); ?>" onclick="return confirm('Pakka delete karna hai?');" style="color:#b32d2e;">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php if ( empty( $all_reviews ) ) : ?>
					<tr><td colspan="6">Abhi koi review nahi hai.</td></tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<?php
}
