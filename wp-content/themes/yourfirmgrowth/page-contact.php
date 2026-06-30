<?php
/**
 * Template Name: Contact Page
 *
 * @package YourFirmGrowth
 */

get_header();

$yfg_img = YFG_URI . '/assets/images';
?>

<style>
	/* ==========================================
	   CONTACT PAGE PREMIUM UI STYLES
	   ========================================== */

	/* Hero Section */
	.yfg-contact-hero {
		padding: 6.5rem 0 5.5rem;
		background: linear-gradient(135deg, #03182e 0%, #052f57 50%, #04505c 100%);
		color: #ffffff;
		position: relative;
		overflow: hidden;
	}
	
	/* Explicitly fix contrast for h1 in dark hero */
	.yfg-contact-hero h1 {
		color: #ffffff !important;
		font-size: clamp(2.2rem, 4.5vw, 3.4rem);
		line-height: 1.15;
		font-weight: 800;
	}

	.yfg-contact-hero .grad {
		background: linear-gradient(120deg, #5dcaa5 0%, #9fe1cb 100%);
		-webkit-background-clip: text;
		background-clip: text;
		-webkit-text-fill-color: transparent;
	}

	.yfg-contact-hero__lead {
		font-size: 1.18rem;
		color: rgba(255, 255, 255, 0.88);
		max-width: 650px;
		line-height: 1.6;
	}

	/* Animated floating blobs behind hero */
	.yfg-contact-hero .yfg-blob-1 {
		position: absolute;
		width: 320px;
		height: 320px;
		background: rgba(10, 163, 176, 0.15);
		border-radius: 50%;
		filter: blur(60px);
		top: -80px;
		right: -50px;
		animation: floatBlob1 12s infinite ease-in-out;
		pointer-events: none;
	}

	.yfg-contact-hero .yfg-blob-2 {
		position: absolute;
		width: 280px;
		height: 280px;
		background: rgba(93, 202, 165, 0.1);
		border-radius: 50%;
		filter: blur(50px);
		bottom: -90px;
		left: 10%;
		animation: floatBlob2 15s infinite ease-in-out;
		pointer-events: none;
	}

	@keyframes floatBlob1 {
		0%, 100% { transform: translate(0, 0) scale(1); }
		50% { transform: translate(-30px, 20px) scale(1.1); }
	}

	@keyframes floatBlob2 {
		0%, 100% { transform: translate(0, 0) scale(1); }
		50% { transform: translate(25px, -20px) scale(1.05); }
	}

	/* Main section spacing & background */
	.yfg-contact-section {
		padding: 5.5rem 0;
		background: linear-gradient(180deg, #f3fafc 0%, #ffffff 100%);
		position: relative;
	}

	/* Info Column Elements */
	.yfg-contact-info-title {
		color: var(--yfg-navy);
		font-weight: 800;
		font-size: 1.95rem;
		letter-spacing: -0.02em;
	}

	.yfg-contact-info-item {
		display: flex;
		gap: 1.25rem;
		margin-bottom: 1.8rem;
		padding: 1.25rem;
		background: #ffffff;
		border: 1px solid #e9f3f5;
		border-radius: 16px;
		box-shadow: 0 4px 12px rgba(5, 47, 87, 0.02);
		transition: all 0.25s ease;
	}

	.yfg-contact-info-item:hover {
		transform: translateX(6px);
		box-shadow: 0 10px 25px rgba(5, 47, 87, 0.06);
		border-color: rgba(4, 112, 125, 0.2);
	}

	.yfg-contact-info-item__icon {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 52px;
		height: 52px;
		border-radius: 14px;
		background: linear-gradient(135deg, var(--yfg-soft) 0%, var(--yfg-soft-2) 100%);
		color: var(--yfg-teal);
		font-size: 1.45rem;
		flex-shrink: 0;
		box-shadow: inset 0 2px 4px rgba(255,255,255,0.8);
		transition: all 0.25s ease;
	}

	.yfg-contact-info-item:hover .yfg-contact-info-item__icon {
		background: var(--yfg-grad);
		color: #ffffff;
	}

	.yfg-contact-info-item__title {
		font-weight: 700;
		color: var(--yfg-navy);
		margin-bottom: 0.35rem;
		font-size: 1.1rem;
	}

	.yfg-contact-info-item__text {
		color: #5b6b7d;
		font-size: 0.95rem;
		margin-bottom: 0;
		line-height: 1.5;
	}

	.yfg-contact-info-item__text a {
		color: inherit;
		text-decoration: none;
		font-weight: 500;
		transition: color 0.15s;
	}

	.yfg-contact-info-item__text a:hover {
		color: var(--yfg-teal);
	}

	/* Social Links styling */
	.yfg-social-section-title {
		font-size: 0.82rem;
		font-weight: 700;
		letter-spacing: 0.08em;
		color: #8593a1;
	}

	.yfg-social-links {
		display: flex;
		gap: 0.85rem;
		margin-top: 1.1rem;
	}

	.yfg-social-links a {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 44px;
		height: 44px;
		border-radius: 12px;
		background: #ffffff;
		border: 1px solid #e2f0f2;
		color: var(--yfg-navy);
		font-size: 1.15rem;
		box-shadow: 0 4px 10px rgba(5, 47, 87, 0.03);
		transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
		text-decoration: none;
	}

	.yfg-social-links a:hover {
		background: var(--yfg-grad);
		color: #ffffff;
		transform: translateY(-4px) scale(1.08);
		box-shadow: 0 8px 20px rgba(4, 112, 125, 0.25);
		border-color: transparent;
	}

	/* GDPR Compliance Card */
	.yfg-compliance-card {
		border: 1px solid #d2ebee;
		background: linear-gradient(135deg, var(--yfg-soft) 0%, #f1f8f9 100%);
		border-radius: 18px;
		padding: 1.4rem;
		box-shadow: inset 0 2px 4px rgba(255,255,255,0.9), 0 4px 15px rgba(5,47,87,0.01);
		transition: transform 0.2s ease;
	}

	.yfg-compliance-card:hover {
		transform: scale(1.01);
	}

	.yfg-compliance-card h3 {
		font-size: 1.05rem;
		font-weight: 700;
		color: var(--yfg-navy);
		display: flex;
		align-items: center;
		gap: 0.6rem;
		margin-bottom: 0.6rem;
	}

	.yfg-compliance-card h3 i {
		color: var(--yfg-teal);
		font-size: 1.25rem;
	}

	.yfg-compliance-card p {
		font-size: 0.88rem;
		color: #5b6b7d;
		margin-bottom: 0;
		line-height: 1.6;
	}

	/* Form Card Styling */
	.yfg-contact-card {
		border: 1px solid #eaf2f4;
		border-radius: 24px;
		background: #ffffff;
		box-shadow: 0 25px 60px -15px rgba(5, 47, 87, 0.08);
		position: relative;
		overflow: hidden;
	}

	/* Subtle top gradient bar for form card */
	.yfg-contact-card::before {
		content: "";
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 6px;
		background: var(--yfg-grad);
	}

	.yfg-contact-card .form-control {
		border: 1.5px solid #e1ebed;
		background: #f8fafb;
		border-radius: 14px;
		padding: 0.78rem 1rem 0.78rem 2.8rem;
		font-size: 0.96rem;
		color: var(--yfg-ink);
		transition: all 0.2s ease;
	}

	.yfg-contact-card select.form-control {
		padding-left: 2.8rem;
	}

	.yfg-contact-card textarea.form-control {
		padding-left: 2.8rem;
	}

	.yfg-contact-card .form-control:focus {
		border-color: var(--yfg-teal);
		background: #ffffff;
		box-shadow: 0 0 0 0.25rem rgba(4, 112, 125, 0.12);
	}

	/* Input wrapper icons */
	.yfg-field__wrap > i {
		position: absolute;
		left: 16px;
		top: 15px;
		color: var(--yfg-teal-2);
		font-size: 1.15rem;
		transition: color 0.2s ease;
		pointer-events: none;
	}

	.yfg-contact-card .form-control:focus + i,
	.yfg-field__wrap:focus-within > i {
		color: var(--yfg-teal);
	}

	.yfg-field label {
		font-size: 0.85rem;
		font-weight: 600;
		color: var(--yfg-navy-2);
		margin-bottom: 0.45rem;
		display: block;
	}

	/* Submit Button */
	.yfg-contact-card .btn-brand {
		border-radius: 14px;
		padding: 0.9rem 2rem;
		font-size: 1.05rem;
		font-weight: 700;
		letter-spacing: 0.02em;
		box-shadow: 0 8px 24px rgba(4, 112, 125, 0.2);
	}

	.yfg-contact-card .btn-brand i {
		transition: transform 0.2s ease;
	}

	.yfg-contact-card .btn-brand:hover i {
		transform: translateX(4px);
	}

	/* Responsive tweaks */
	@media (max-width: 991px) {
		.yfg-contact-hero {
			padding: 4.5rem 0 3.5rem;
		}
		.yfg-contact-section {
			padding: 4rem 0;
		}
	}
</style>

<!-- ============ HERO BANNER ============ -->
<section class="yfg-contact-hero">
	<span class="yfg-blob-1" aria-hidden="true"></span>
	<span class="yfg-blob-2" aria-hidden="true"></span>
	<div class="container position-relative">
		<div class="row">
			<div class="col-lg-8">
				<h1 class="mb-3">Let's Build Something <span class="grad">Exceptional Together</span></h1>
				<p class="yfg-contact-hero__lead">Have a project in mind, want to scale your search visibility, or need extra developer capacity? Tell us about your goals, and we'll show you how we can help you grow.</p>
			</div>
		</div>
	</div>
</section>

<!-- ============ MAIN CONTENT SECTION ============ -->
<section class="yfg-contact-section">
	<div class="container">
		<div class="row g-5">

			<!-- LEFT COLUMN: Contact details -->
			<div class="col-lg-5">
				<div class="pe-lg-4">
					<span class="yfg-accent yfg-accent--start"></span>
					<h2 class="yfg-contact-info-title mb-4">Contact Information</h2>
					<p class="text-muted mb-4 fs-6">Feel free to reach out to our team directly. We typically respond to all inquiries within 1 business day.</p>

					<!-- Info Items -->
					<div class="yfg-contact-info-item">
						<span class="yfg-contact-info-item__icon"><i class="bi bi-envelope-fill"></i></span>
						<div>
							<h3 class="yfg-contact-info-item__title">Email Us</h3>
							<p class="yfg-contact-info-item__text"><a href="mailto:info@yourfirmgrowth.com">info@yourfirmgrowth.com</a></p>
						</div>
					</div>

					<div class="yfg-contact-info-item">
						<span class="yfg-contact-info-item__icon"><i class="bi bi-telephone-fill"></i></span>
						<div>
							<h3 class="yfg-contact-info-item__title">Call Us</h3>
							<p class="yfg-contact-info-item__text"><a href="tel:+13214567890">+1 (321) 456-7890</a> (US Support)</p>
						</div>
					</div>

					<div class="yfg-contact-info-item">
						<span class="yfg-contact-info-item__icon"><i class="bi bi-globe"></i></span>
						<div>
							<h3 class="yfg-contact-info-item__title">Our Markets</h3>
							<p class="yfg-contact-info-item__text">United Kingdom, United States, Germany, Europe, and clients worldwide.</p>
						</div>
					</div>

					<hr class="my-4" style="border-color:#d2ebee;">

					<!-- Social Links -->
					<h3 class="yfg-social-section-title text-uppercase">Connect With Us</h3>
					<div class="yfg-social-links">
						<a href="https://www.linkedin.com/company/yourfirmgrowth" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
						<a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
						<a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
						<a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
					</div>

					<div class="mt-4 pt-2">
						<div class="yfg-compliance-card">
							<h3><i class="bi bi-shield-fill-check"></i> GDPR Compliant</h3>
							<p>Your data privacy matters. We handle all contact requests in compliance with GDPR standards. We do not sell, rent, or share your contact details.</p>
						</div>
					</div>
				</div>
			</div>

			<!-- RIGHT COLUMN: Contact Form -->
			<div class="col-lg-7" id="contact-form">
				<div class="card yfg-contact-card p-4 p-md-5">
					
					<?php if ( isset( $_GET['yfg_contact'] ) && 'success' === $_GET['yfg_contact'] ) : ?>
						<div class="alert alert-success d-flex align-items-center mb-4 border-0 shadow-sm" role="alert" style="border-radius: 12px; background-color: #d1e7dd; color: #0f5132;">
							<i class="bi bi-check-circle-fill me-2 fs-5"></i>
							<div>
								<strong>Thank you!</strong> Your message has been sent successfully. We will get back to you shortly.
							</div>
						</div>
					<?php elseif ( isset( $_GET['yfg_contact'] ) && 'error' === $_GET['yfg_contact'] ) : ?>
						<div class="alert alert-danger d-flex align-items-center mb-4 border-0 shadow-sm" role="alert" style="border-radius: 12px; background-color: #f8d7da; color: #842029;">
							<i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
							<div>
								<strong>Error!</strong> Please check your inputs and make sure you provide a valid name and email address.
							</div>
						</div>
					<?php endif; ?>

					<h2 class="h4 fw-bold mb-4" style="color:var(--yfg-navy);"><i class="bi bi-chat-square-dots-fill me-2"></i>Send Us a Message</h2>

					<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
						<input type="hidden" name="action" value="yfg_contact">
						<?php wp_nonce_field( 'yfg_contact', 'yfg_contact_nonce' ); ?>

						<div class="row">
							<div class="col-md-6">
								<div class="yfg-field">
									<label for="yfg_name">Full Name <span class="text-danger">*</span></label>
									<div class="yfg-field__wrap">
										<input type="text" class="form-control" id="yfg_name" name="yfg_name" required placeholder="e.g. John Doe">
										<i class="bi bi-person-fill"></i>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="yfg-field">
									<label for="yfg_email">Email Address <span class="text-danger">*</span></label>
									<div class="yfg-field__wrap">
										<input type="email" class="form-control" id="yfg_email" name="yfg_email" required placeholder="e.g. john@company.com">
										<i class="bi bi-envelope-fill"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="yfg-field">
									<label for="yfg_phone">Phone Number</label>
									<div class="yfg-field__wrap">
										<input type="tel" class="form-control" id="yfg_phone" name="yfg_phone" placeholder="e.g. +1 (321) 555-0199">
										<i class="bi bi-telephone-fill"></i>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="yfg-field">
									<label for="yfg_company">Company Name</label>
									<div class="yfg-field__wrap">
										<input type="text" class="form-control" id="yfg_company" name="yfg_company" placeholder="e.g. Acme Corporation">
										<i class="bi bi-building-fill"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="yfg-field">
							<label for="yfg_service">Service of Interest</label>
							<div class="yfg-field__wrap">
								<select class="form-control form-select" id="yfg_service" name="yfg_service">
									<option value="" disabled selected>Select a service...</option>
									<option value="SEO">Search Engine Optimization (SEO)</option>
									<option value="Web Design & Development">Web Design &amp; Development</option>
									<option value="Content Marketing">Content Marketing</option>
									<option value="Paid Advertising">Paid Advertising (PPC &amp; Ads)</option>
									<option value="Branding & Identity">Branding &amp; Identity</option>
									<option value="CRO">Conversion Rate Optimization (CRO)</option>
									<option value="Automation">Business Automation</option>
									<option value="Consulting">Digital Growth Consulting</option>
								</select>
								<i class="bi bi-briefcase-fill"></i>
							</div>
						</div>

						<div class="yfg-field">
							<label for="yfg_message">Tell us about your project/goals <span class="text-danger">*</span></label>
							<div class="yfg-field__wrap">
								<textarea class="form-control" id="yfg_message" name="yfg_message" rows="4" required placeholder="What are you trying to achieve? How can our team help?"></textarea>
								<i class="bi bi-chat-left-text-fill" style="top: 15px;"></i>
							</div>
						</div>

						<button type="submit" class="btn btn-brand btn-lg w-100 mt-2">
							Send Message <i class="bi bi-arrow-right ms-1"></i>
						</button>
						<p class="yfg-form-note"><i class="bi bi-lock-fill"></i> Secure transmission. Your details are safe with us.</p>
					</form>

				</div>
			</div>

		</div>
	</div>
</section>

<?php
get_footer();
