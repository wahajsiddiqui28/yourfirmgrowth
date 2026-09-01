<?php
/**
 * Global lead modal — "Book a Free Growth Strategy Call".
 * Banner wale lead form ki saari fields + ek extra Services dropdown.
 * footer.php se har page par include hota hai; kisi bhi button se
 * `data-bs-toggle="modal" data-bs-target="#yfgLeadModal"` laga ke khulta hai.
 * Posts to admin-post.php (action: yfg_lead); handler inc/homepage.php mein hai.
 *
 * @package YourFirmGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Modal se submit hua tha to status yahin dikhana hai (aur modal auto-open karna hai).
$yfg_modal_status = '';
if ( isset( $_GET['yfg_lead'], $_GET['yfg_src'] ) && 'modal' === $_GET['yfg_src'] ) {
	$yfg_modal_status = sanitize_key( wp_unslash( $_GET['yfg_lead'] ) );
}
?>
<div class="modal fade" id="yfgLeadModal" tabindex="-1" aria-labelledby="yfgLeadModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">

			<div class="modal-header">
				<div class="yfg-modal-head">
					<span class="yfg-modal-head__icon"><i class="bi bi-calendar2-check"></i></span>
					<div>
						<h2 class="modal-title" id="yfgLeadModalTitle"><?php esc_html_e( 'Book a Free Growth Strategy Call', 'yourfirmgrowth' ); ?></h2>
						<p class="yfg-modal-head__sub"><?php esc_html_e( 'Share your goals — we typically respond within 1 business day.', 'yourfirmgrowth' ); ?></p>
					</div>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e( 'Close', 'yourfirmgrowth' ); ?>"></button>
			</div>

			<div class="modal-body">

				<?php if ( 'success' === $yfg_modal_status ) : ?>
					<div class="alert alert-success mb-3"><i class="bi bi-check-circle me-2"></i><?php esc_html_e( 'Thank you! We’ll be in touch shortly.', 'yourfirmgrowth' ); ?></div>
				<?php elseif ( 'error' === $yfg_modal_status ) : ?>
					<div class="alert alert-danger mb-3"><i class="bi bi-exclamation-triangle me-2"></i><?php esc_html_e( 'Please enter a valid name and email.', 'yourfirmgrowth' ); ?></div>
				<?php endif; ?>

				<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
					<input type="hidden" name="action" value="yfg_lead">
					<input type="hidden" name="yfg_source" value="modal">
					<?php wp_nonce_field( 'yfg_lead', 'yfg_lead_nonce' ); ?>

					<div class="row g-3">

						<div class="col-md-6 yfg-m-field">
							<label for="yfg_m_name"><?php esc_html_e( 'Full Name', 'yourfirmgrowth' ); ?> <span class="yfg-req">*</span></label>
							<div class="yfg-m-field__wrap">
								<i class="bi bi-person"></i>
								<input type="text" class="form-control" id="yfg_m_name" name="yfg_name" placeholder="e.g. John Doe" required>
							</div>
						</div>

						<div class="col-md-6 yfg-m-field">
							<label for="yfg_m_email"><?php esc_html_e( 'Email Address', 'yourfirmgrowth' ); ?> <span class="yfg-req">*</span></label>
							<div class="yfg-m-field__wrap">
								<i class="bi bi-envelope"></i>
								<input type="email" class="form-control" id="yfg_m_email" name="yfg_email" placeholder="e.g. john@company.com" required>
							</div>
						</div>

						<div class="col-md-6 yfg-m-field">
							<label for="yfg_m_phone"><?php esc_html_e( 'Phone', 'yourfirmgrowth' ); ?></label>
							<div class="yfg-m-field__wrap">
								<i class="bi bi-telephone"></i>
								<input type="text" class="form-control" id="yfg_m_phone" name="yfg_phone" placeholder="e.g. +1 (321) 555-0199">
							</div>
						</div>

						<div class="col-md-6 yfg-m-field">
							<label for="yfg_m_service"><?php esc_html_e( 'Which service are you interested in?', 'yourfirmgrowth' ); ?> <span class="yfg-req">*</span></label>
							<div class="yfg-m-field__wrap">
								<i class="bi bi-grid"></i>
								<select class="form-select" id="yfg_m_service" name="yfg_service" required>
									<option value="" selected disabled><?php esc_html_e( 'Select a service', 'yourfirmgrowth' ); ?></option>
									<?php foreach ( yfg_lead_services_options() as $yfg_svc_label ) : ?>
										<option value="<?php echo esc_attr( $yfg_svc_label ); ?>"><?php echo esc_html( $yfg_svc_label ); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="col-12 yfg-m-field">
							<label for="yfg_m_message"><?php esc_html_e( 'Tell us about your goals', 'yourfirmgrowth' ); ?></label>
							<div class="yfg-m-field__wrap yfg-m-field__wrap--area">
								<i class="bi bi-chat-left-text"></i>
								<textarea class="form-control" id="yfg_m_message" name="yfg_message" rows="3" placeholder="e.g. We want more qualified leads from Google in the next 6 months&hellip;"></textarea>
							</div>
						</div>

						<div class="col-12">
							<button type="submit" class="btn btn-brand w-100"><?php esc_html_e( 'Book a Free Growth Strategy Call', 'yourfirmgrowth' ); ?> &rarr;</button>
							<p class="yfg-modal-trust"><i class="bi bi-lock-fill"></i> <?php esc_html_e( 'Secure transmission. Your details are safe with us — GDPR compliant.', 'yourfirmgrowth' ); ?></p>
						</div>

					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<?php if ( $yfg_modal_status ) : ?>
<script>
document.addEventListener( 'DOMContentLoaded', function () {
	var el = document.getElementById( 'yfgLeadModal' );
	if ( el && window.bootstrap ) {
		new bootstrap.Modal( el ).show();
	}
} );
</script>
<?php endif; ?>
