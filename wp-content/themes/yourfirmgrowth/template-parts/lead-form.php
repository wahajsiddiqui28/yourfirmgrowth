<?php
/**
 * Reusable lead-form card — "Book a Free Growth Strategy Call".
 * Posts to admin-post.php (action: yfg_lead); handler lives in inc/homepage.php.
 * Used on the homepage hero and on the service landing pages.
 *
 * @package YourFirmGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="card yfg-form-card" id="lead-form">
	<div class="yfg-form-card__head">
		<h2 class="yfg-form-card__title"><i class="bi bi-calendar2-check me-1"></i> Book a Free Growth Strategy Call</h2>
	</div>
	<div class="card-body">

		<?php if ( isset( $_GET['yfg_lead'] ) && 'success' === $_GET['yfg_lead'] ) : ?>
			<div class="alert alert-success mb-3">Thank you! We&rsquo;ll be in touch shortly.</div>
		<?php elseif ( isset( $_GET['yfg_lead'] ) && 'error' === $_GET['yfg_lead'] ) : ?>
			<div class="alert alert-danger mb-3">Please enter a valid name and email.</div>
		<?php endif; ?>

		<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
			<input type="hidden" name="action" value="yfg_lead">
			<?php wp_nonce_field( 'yfg_lead', 'yfg_lead_nonce' ); ?>

			<div class="yfg-field">
				<label for="yfg_name">Full Name</label>
				<div class="yfg-field__wrap">
					<i class="bi bi-person"></i>
					<input type="text" class="form-control" id="yfg_name" name="yfg_name" required>
				</div>
			</div>
			<div class="yfg-field">
				<label for="yfg_email">Email Address</label>
				<div class="yfg-field__wrap">
					<i class="bi bi-envelope"></i>
					<input type="email" class="form-control" id="yfg_email" name="yfg_email" required>
				</div>
			</div>
			<div class="yfg-field">
				<label for="yfg_phone">Phone</label>
				<div class="yfg-field__wrap">
					<i class="bi bi-telephone"></i>
					<input type="text" class="form-control" id="yfg_phone" name="yfg_phone">
				</div>
			</div>
			<div class="yfg-field">
				<label for="yfg_message">Tell us about your goals</label>
				<div class="yfg-field__wrap">
					<i class="bi bi-chat-left-text"></i>
					<textarea class="form-control" id="yfg_message" name="yfg_message" rows="3"></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-brand w-100">Book a Free Growth Strategy Call &rarr;</button>
		</form>
	</div>
</div>
