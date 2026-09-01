<?php
/**
 * Front page (homepage) template — YourFirmGrowth content package.
 *
 * @package YourFirmGrowth
 */

get_header();

$yfg_img = YFG_URI . '/assets/images';
?>

<!-- ============ HERO ============ -->
<style>
	.yfg-hero {
		background: linear-gradient(135deg, rgba(3, 24, 46, 0.95) 0%, rgba(5, 47, 87, 0.9) 50%, rgba(4, 75, 87, 0.82) 100%), url(<?php echo esc_url( $yfg_img . '/home-page/home-page-banner.webp' ); ?>) center / cover no-repeat;
		background-color: #03182e;
		padding: 7.5rem 0 8.5rem;
		position: relative;
		overflow: hidden;
	}
	.yfg-hero__title {
		font-size: clamp(2.3rem, 5vw, 3.6rem);
		line-height: 1.15;
		letter-spacing: -0.025em;
		font-weight: 800;
		margin-bottom: 1.5rem;
		color: #ffffff;
	}
	.yfg-hero__title .grad {
		background: linear-gradient(120deg, #5dcaa5 0%, #a2ebd3 100%);
		-webkit-background-clip: text;
		background-clip: text;
		-webkit-text-fill-color: transparent;
		display: inline-block;
	}
	.yfg-hero__lead {
		font-size: 1.15rem;
		line-height: 1.65;
		color: rgba(255, 255, 255, 0.9) !important;
		margin-bottom: 1.2rem;
	}
	.yfg-hero .btn-brand {
		background: var(--yfg-grad);
		border: none;
		box-shadow: 0 8px 25px rgba(4, 112, 125, 0.3);
		transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
		font-weight: 600;
		padding: .55rem 1.2rem;
		font-size: 0.85rem;
		border-radius: 8px;
	}
	.yfg-hero .btn-brand:hover {
		transform: translateY(-3px);
		box-shadow: 0 15px 30px rgba(4, 112, 125, 0.45);
	}
	.yfg-hero .btn-ghost-light {
		border: 1px solid rgba(255, 255, 255, 0.25);
		background: rgba(255, 255, 255, 0.05);
		color: #ffffff;
		backdrop-filter: blur(5px);
		transition: all 0.3s ease;
		padding: .55rem 1.2rem;
		font-size: 0.85rem;
		border-radius: 8px;
		font-weight: 600;
	}
	.yfg-hero .btn-ghost-light:hover {
		background: rgba(255, 255, 255, 0.15);
		border-color: #ffffff;
		transform: translateY(-2px);
	}
	.yfg-hero .yfg-form-card {
		background: rgba(255, 255, 255, 0.98);
		border: 1px solid rgba(255, 255, 255, 0.8);
		border-radius: 24px;
		box-shadow: 0 30px 60px rgba(3, 24, 46, 0.35);
		transform: translateY(0);
		transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
	}
	.yfg-hero .yfg-form-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 40px 80px rgba(3, 24, 46, 0.45);
	}
	.yfg-hero .yfg-form-card__head {
		background: linear-gradient(135deg, #052f57 0%, #04505c 100%);
		padding: 1.8rem 1.8rem 1.5rem;
		border-bottom: 1px solid rgba(255, 255, 255, 0.08);
	}
	.yfg-hero .yfg-form-card .card-body {
		padding: 2rem 1.8rem;
	}
	.yfg-hero .yfg-field .form-control {
		background: #f8fafb;
		border: 1.5px solid #e2ecef;
		border-radius: 12px;
		padding: 0.8rem 1rem 0.8rem 2.8rem;
		font-size: 0.95rem;
		transition: all 0.3s ease;
	}
	.yfg-hero .yfg-field__wrap > i {
		left: 15px;
		top: 15px;
		color: var(--yfg-teal);
		font-size: 1.1rem;
	}
	.yfg-hero .yfg-field .form-control:focus {
		border-color: var(--yfg-teal);
		background: #ffffff;
		box-shadow: 0 0 0 4px rgba(4, 112, 125, 0.15);
		transform: translateY(-1px);
	}
	.yfg-hero .yfg-field label {
		font-size: 0.85rem;
		font-weight: 600;
		color: var(--yfg-navy);
		margin-bottom: 0.45rem;
	}
	.yfg-hero .yfg-form-card button[type="submit"] {
		background: var(--yfg-grad);
		border: none;
		padding: 0.9rem;
		border-radius: 12px;
		font-weight: 700;
		box-shadow: 0 8px 20px rgba(4, 112, 125, 0.2);
		transition: all 0.3s ease;
	}
	.yfg-hero .yfg-form-card button[type="submit"]:hover {
		transform: translateY(-2px);
		box-shadow: 0 12px 25px rgba(4, 112, 125, 0.35);
	}
	.yfg-hero .yfg-trust {
		margin-top: 5.5rem;
		display: flex;
		justify-content: center;
		flex-wrap: wrap;
		gap: 0.8rem;
		padding-left: 0;
	}
	.yfg-hero .yfg-trust li {
		background: rgba(255, 255, 255, 0.08);
		border: 1px solid rgba(255, 255, 255, 0.12);
		color: rgba(255, 255, 255, 0.92);
		backdrop-filter: blur(8px);
		box-shadow: none;
		font-weight: 500;
		font-size: 0.88rem;
		padding: 0.55rem 1.2rem;
		border-radius: 99px;
		transition: all 0.3s ease;
	}
	.yfg-hero .yfg-trust li:hover {
		background: rgba(255, 255, 255, 0.14);
		border-color: rgba(255, 255, 255, 0.25);
		transform: translateY(-2px);
	}
	.yfg-hero .yfg-trust i {
		color: #5dcaa5;
		font-size: 1.05rem;
	}
</style>

<section class="yfg-hero">
	<span class="yfg-blob yfg-hero__bsoft" aria-hidden="true"></span>
	<span class="yfg-blob yfg-hero__bsoft-2" aria-hidden="true"></span>
	<div class="container">
		<div class="row align-items-center g-5">
			<!-- LEFT: content -->
			<div class="col-lg-7">
				<h1 class="yfg-hero__title">
					<?php 
					$hero_title = get_theme_mod( 'yfg_hero_title', 'YFG: Full-Service Digital Agency Built to Grow Your Business Worldwide' );
					if ( 'YFG: Full-Service Digital Agency Built to Grow Your Business Worldwide' === $hero_title ) {
						echo 'YFG: Full-Service Digital Agency Built to <span class="grad">Grow Your Business Worldwide</span>';
					} else {
						echo wp_kses_post( $hero_title );
					}
					?>
				</h1>
				<p class="yfg-hero__lead">
					<?php echo wp_kses_post( get_theme_mod( 'yfg_hero_subtitle', 'Your Firm Growth (YFG) is a full-service digital agency that helps startups, small businesses, and established brands grow through strategic marketing, smart technology, and results-driven digital solutions. From SEO and web design & development to paid advertising, branding, and automation, we bring every service you need under one roof, so you can stop juggling vendors and start scaling with confidence.' ) ); ?>
				</p>

				<div class="yfg-hero__cta">
					<button type="button" class="btn btn-brand btn-lg" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">
						<?php echo esc_html( get_theme_mod( 'yfg_hero_btn_text', 'Book a Free Growth Strategy Call' ) ); ?> &rarr;
					</button>
					<?php yfg_whatsapp_button(); ?>
				</div>
				<div class="yfg-hero__alt">
					<span class="yfg-hero__hint">Prefer to see the plan first?</span>
					<button type="button" class="btn btn-ghost-light" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Get Your Free Proposal</button>
				</div>
			</div>

			<!-- RIGHT: image header + premium lead form (one card) -->
			<div class="col-lg-5">
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
			</div>

		</div>
	</div>
	<ul class="yfg-trust">
		<li><i class="bi bi-check2-circle"></i> One partner for every digital project</li>
		<li><i class="bi bi-check2-circle"></i> GDPR Compliant</li>
		<li><i class="bi bi-check2-circle"></i> Remote teams aligned to your office hours</li>
		<li><i class="bi bi-check2-circle"></i> Trusted across the UK, US, Germany &amp; worldwide</li>
	</ul>
</section>

<!-- ============ INTRO BAND ============ -->
<style>
	.yfg-intro-section {
		background: #fdfefe;
		border-top: 1.5px solid rgba(4, 112, 125, 0.15);
		border-bottom: 1.5px solid rgba(4, 112, 125, 0.15);
		position: relative;
		padding: 5.5rem 0;
	}
	.yfg-text-gradient {
		background: var(--yfg-grad);
		-webkit-background-clip: text;
		background-clip: text;
		-webkit-text-fill-color: transparent;
		font-weight: 800;
	}
	.yfg-intro-img-wrapper {
		position: relative;
		display: inline-block;
		padding: 12px;
		background: #ffffff;
		border: 1px solid #d9e8eb;
		border-radius: 24px;
		box-shadow: 0 15px 35px rgba(5, 47, 87, 0.05);
		transition: all 0.4s ease;
		z-index: 1;
	}
	.yfg-intro-img-wrapper:hover {
		transform: translateY(-5px);
		box-shadow: 0 25px 50px rgba(5, 47, 87, 0.1);
		border-color: rgba(4, 112, 125, 0.3);
	}
	.yfg-intro-img-wrapper img {
		border-radius: 16px;
		transition: transform 0.5s ease;
	}
	.yfg-intro-img-wrapper:hover img {
		transform: scale(1.02);
	}
	.yfg-deco-dots {
		position: absolute;
		width: 90px;
		height: 90px;
		background-image: radial-gradient(var(--yfg-teal) 1.5px, transparent 1.5px);
		background-size: 12px 12px;
		opacity: 0.12;
		z-index: 0;
	}
	.yfg-deco-dots--top-left {
		top: -15px;
		left: -15px;
	}
	.yfg-deco-dots--bottom-right {
		bottom: -15px;
		right: -15px;
	}
</style>

<section class="yfg-intro-section overflow-hidden">
	<span class="yfg-blob" aria-hidden="true" style="background:rgba(4,112,125,0.04);width:350px;height:350px;top:15%;right:-120px;filter:blur(55px);z-index:0;"></span>
	<div class="container position-relative" style="z-index: 1;">
		<div class="row align-items-center g-5">
			<div class="col-lg-7">
				<span class="yfg-accent yfg-accent--start mb-3"></span>
				<h2 class="yfg-section-title mb-4">One Agency. <span class="yfg-text-gradient">Every Digital Solution.</span> Real Growth.</h2>
				<p class="lead text-muted mb-3" style="font-size:1.06rem; line-height:1.65; color: #4b5a6a !important;">Most businesses lose time and money stitching together separate freelancers and agencies for design, marketing, and development. At Your Firm Growth, we remove that friction. As a full-service digital company, we plan, build, launch, and optimize your entire digital presence as one connected strategy, aligned to your goals, your industry, and your audience.</p>
				<p class="text-muted mb-0" style="font-size:1.02rem; line-height:1.65; color: #4b5a6a !important;">Whether you want more visibility, more qualified leads, a stronger brand, or entry into new markets, YFG delivers solutions designed around one outcome: sustainable, measurable business growth.</p>
			    <div class="yfg-hero__cta">
					<button type="button" class="btn btn-brand btn-lg" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">
						<?php echo esc_html( get_theme_mod( 'yfg_hero_btn_text', 'Get a Free Quote' ) ); ?> &rarr;
					</button>
					<?php yfg_whatsapp_button(); ?>
				</div>
			</div>
			<div class="col-lg-5 text-center">
				<div class="position-relative d-inline-block">
					<div class="yfg-deco-dots yfg-deco-dots--top-left"></div>
					<div class="yfg-deco-dots yfg-deco-dots--bottom-right"></div>
					<div class="yfg-intro-img-wrapper">
						<img src="<?php echo esc_url( $yfg_img . '/home-page/home-page-image-1.webp' ); ?>" class="img-fluid" alt="One connected digital strategy" style="max-width: 100%; height: auto;">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ============ SERVICES ============ -->
<style>
	.yfg-services-sec {
		background: #ffffff;
		border-bottom: 1.5px solid rgba(4, 112, 125, 0.15);
		position: relative;
		padding: 5.5rem 0;
	}
	.yfg-services-accordion .accordion-item {
		border: 1px solid #e9f3f5;
		border-radius: 16px !important;
		margin-bottom: 1rem;
		overflow: hidden;
		background: #ffffff;
		box-shadow: 0 4px 12px rgba(5, 47, 87, 0.02);
		transition: all 0.3s ease;
	}
	.yfg-services-accordion .accordion-item:hover {
		border-color: rgba(4, 112, 125, 0.25);
		box-shadow: 0 8px 24px rgba(5, 47, 87, 0.05);
	}
	.yfg-services-accordion .accordion-header {
		margin: 0;
	}
	.yfg-services-accordion .accordion-button {
		padding: 1.25rem 1.5rem;
		background: #ffffff;
		color: var(--yfg-navy);
		font-weight: 700;
		font-size: 1.05rem;
		border: none;
		box-shadow: none;
		display: flex;
		align-items: center;
		gap: 1rem;
		transition: all 0.3s ease;
	}
	.yfg-services-accordion .accordion-button:not(.collapsed) {
		background: rgba(4, 112, 125, 0.03);
		color: var(--yfg-teal);
	}
	.yfg-services-accordion .accordion-button::after {
		margin-left: auto;
		background-size: 1.1rem;
		transition: transform 0.3s ease;
	}
	.yfg-services-accordion .accordion-button:not(.collapsed)::after {
		transform: rotate(-180deg);
	}
	.yfg-services-accordion .accordion-icon-box {
		width: 40px;
		height: 40px;
		border-radius: 10px;
		background: var(--yfg-soft);
		color: var(--yfg-teal);
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 1.2rem;
		transition: all 0.3s ease;
		flex-shrink: 0;
	}
	.yfg-services-accordion .accordion-button:not(.collapsed) .accordion-icon-box {
		background: var(--yfg-teal);
		color: #ffffff;
	}
	.yfg-services-accordion .accordion-body {
		padding: 0 1.5rem 1.5rem 4rem;
		font-size: 0.95rem;
		line-height: 1.6;
		color: #5b6b7d;
		background: rgba(4, 112, 125, 0.03);
		border-top: none;
	}
	.yfg-services-img-card {
		position: sticky;
		top: 100px;
		padding: 12px;
		background: #ffffff;
		border: 1px solid #d9e8eb;
		border-radius: 24px;
		box-shadow: 0 20px 40px rgba(5, 47, 87, 0.06);
		z-index: 1;
		transition: all 0.4s ease;
	}
	.yfg-services-img-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 30px 60px rgba(5, 47, 87, 0.1);
	}
	.yfg-services-img-card img {
		border-radius: 16px;
		width: 100%;
		height: auto;
	}
</style>

<div class="container">
	<div class="yfg-intl-cta mt-5 d-flex flex-wrap align-items-center justify-content-between gap-3">
		<p><strong>With YFG, you&rsquo;re not just hiring a service provider,</strong> you&rsquo;re gaining a dedicated growth partner committed to helping your business achieve long-term success.</p>
		<div class="d-flex flex-wrap align-items-center gap-2">
			<button type="button" class="btn btn-light fw-semibold" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Start Your Growth Journey &rarr;</button>
			<?php yfg_whatsapp_button(); ?>
		</div>
	</div>
</div>

<section class="py-6 yfg-services-sec" id="services">
	<span class="yfg-blob" aria-hidden="true" style="background:rgba(10,163,176,.06);width:340px;height:340px;top:-50px;left:-100px;filter:blur(50px);"></span>
	<div class="container position-relative">
		<div class="text-center mb-5">
			<span class="yfg-accent"></span>
			<h2 class="yfg-section-title">Everything Your Business Needs, Under One Roof</h2>
			<p class="yfg-section-sub mx-auto">We handle every type of digital project, from a single landing page to a complete multi-market growth program. Here is what we deliver as your end-to-end partner:</p>
		</div>

		<div class="row g-5 align-items-start">
			<!-- LEFT COLUMN: Custom Accordion -->
			<div class="col-lg-7">
				<div class="accordion yfg-services-accordion" id="servicesAccordion">
					<?php
					$yfg_services = array(
						array( 'bi-search',        'Search Engine Optimization (SEO)',        'Technical, on-page, and content-led SEO that earns rankings, traffic, and trust, built to trigger visibility on Google and keep it.' ),
						array( 'bi-code-slash',    'Web Design &amp; Development',             'Fast, responsive, conversion-optimized websites and web apps engineered to look great and turn visitors into customers.' ),
						array( 'bi-pencil-square', 'Content Marketing',                       'Strategy, copywriting, and content that ranks, educates, and moves prospects toward a confident decision.' ),
						array( 'bi-megaphone',     'Paid Advertising (PPC &amp; Social Ads)',  'Profit-focused campaigns across Google, Meta, LinkedIn, and more, managed for return, not just clicks.' ),
						array( 'bi-palette',       'Branding &amp; Identity',                  'Distinctive brand positioning, identity, and messaging that make you memorable in a crowded market.' ),
						array( 'bi-graph-up-arrow','Conversion Rate Optimization (CRO)',      'Data-driven testing and UX refinement that lifts conversions from the traffic you already have.' ),
						array( 'bi-gear-wide-connected', 'Business Automation',              'Workflows, CRM, and marketing automation that save your team hours and scale your operations.' ),
						array( 'bi-compass',       'Digital Growth Consulting',               'Senior strategic guidance to align your marketing, technology, and revenue goals into one clear roadmap.' ),
					);
					foreach ( $yfg_services as $i => $s ) :
						$collapse_id = 'service-collapse-' . $i;
						$heading_id = 'service-heading-' . $i;
						?>
						<div class="accordion-item">
							<h3 class="accordion-header" id="<?php echo esc_attr( $heading_id ); ?>">
								<button class="accordion-button <?php echo 0 === $i ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $collapse_id ); ?>" aria-expanded="<?php echo 0 === $i ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $collapse_id ); ?>">
									<span class="accordion-icon-box">
										<i class="bi <?php echo esc_attr( $s[0] ); ?>"></i>
									</span>
									<?php echo wp_kses_post( $s[1] ); ?>
								</button>
							</h3>
							<div id="<?php echo esc_attr( $collapse_id ); ?>" class="accordion-collapse collapse <?php echo 0 === $i ? 'show' : ''; ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>" data-bs-parent="#servicesAccordion">
								<div class="accordion-body">
									<?php echo esc_html( $s[2] ); ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- RIGHT COLUMN: Sticky Styled Image Card -->
			<div class="col-lg-5">
				<div class="yfg-services-img-card">
					<img src="<?php echo esc_url( $yfg_img . '/home-page/home-page-image-2.webp' ); ?>" alt="Everything your business needs under one roof" class="img-fluid">
				</div>
			</div>
		</div>

		<div class="text-center mt-5">
			<button type="button" class="btn btn-brand btn-lg" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Explore Our Services &rarr;</button> <?php yfg_whatsapp_button( 'ms-2' ); ?>
		</div>
	</div>
</section>

<!-- ============ WHY CHOOSE ============ -->
<section class="py-6 bg-brand-dark text-white yfg-why-sec" id="why">
	<span class="yfg-blob" aria-hidden="true" style="width:380px;height:380px;top:-120px;right:-120px;"></span>
	<span class="yfg-blob" aria-hidden="true" style="width:300px;height:300px;bottom:-140px;left:-110px;"></span>
	<div class="container position-relative">
		<div class="text-center mb-5">
			<span class="yfg-accent"></span>
			<h2 class="yfg-section-title text-white">Why Businesses Choose Your Firm Growth</h2>
		</div>
		<div class="row g-4 justify-content-center">
			<?php
			$yfg_why = array(
				array( 'bi-people',        'One partner, zero vendor chaos:', 'a single full-service digital agency for strategy, creative, marketing, and development.' ),
				array( 'bi-sliders',       'Customized strategies:',          'tailored to your industry, audience, and growth objectives, never copy-paste templates.' ),
				array( 'bi-bar-chart-line','Measurable results:',             'we report on the metrics that matter, leads, conversions, revenue, and ROI.' ),
				array( 'bi-shield-check',  'GDPR Compliant:',                 'we follow strict data-protection and privacy standards, so European clients and audiences can trust how data is collected, stored, and used.' ),
				array( 'bi-globe2',        'Global reach, local alignment:',  'teams that work in your time zone and to your business culture.' ),
				array( 'bi-person-workspace', 'Dedicated remote teams:',      'work with skilled specialists focused on your business, giving you reliable support without the cost and hassle of hiring in-house.' ),
			);
			foreach ( $yfg_why as $w ) :
				?>
				<div class="col-md-6 col-lg-4">
					<div class="yfg-why-item">
						<span class="yfg-why-item__ico"><i class="bi <?php echo esc_attr( $w[0] ); ?>"></i></span>
						<p class="mb-0"><strong><?php echo esc_html( $w[1] ); ?></strong> <?php echo esc_html( $w[2] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ COMPLIANCE, REMOTE & INTERNATIONAL STYLES ============ -->
<style>
	.yfg-compliance-sec {
		background: #ffffff;
		border-top: 1.5px solid rgba(4, 112, 125, 0.15);
		position: relative;
		padding: 5.5rem 0;
	}
	.yfg-remote-sec {
		background: #f5fafb;
		border-top: 1.5px solid rgba(4, 112, 125, 0.15);
		border-bottom: 1.5px solid rgba(4, 112, 125, 0.15);
		position: relative;
		padding: 5.5rem 0;
	}
	.yfg-international-sec {
		background: #ffffff;
		border-bottom: 1.5px solid rgba(4, 112, 125, 0.15);
		position: relative;
		padding: 5.5rem 0;
	}
	.yfg-sec-img-card {
		position: relative;
		display: inline-block;
		padding: 12px;
		background: #ffffff;
		border: 1px solid #d9e8eb;
		border-radius: 24px;
		box-shadow: 0 15px 35px rgba(5, 47, 87, 0.05);
		transition: all 0.4s ease;
		z-index: 1;
	}
	.yfg-sec-img-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 25px 50px rgba(5, 47, 87, 0.1);
		border-color: rgba(4, 112, 125, 0.3);
	}
	.yfg-sec-img-card img {
		border-radius: 16px;
		max-width: 100%;
		height: auto;
		transition: transform 0.5s ease;
	}
	.yfg-sec-img-card:hover img {
		transform: scale(1.02);
	}
	.yfg-check-list li {
		position: relative;
		padding-left: 2.2rem !important;
		margin-bottom: 1.1rem;
		font-size: 1.02rem;
		color: #4b5a6a;
		line-height: 1.6;
	}
	.yfg-check-list li i {
		position: absolute;
		left: 0;
		top: 2px;
		color: var(--yfg-teal);
		font-size: 1rem;
		background: var(--yfg-soft);
		width: 26px;
		height: 26px;
		border-radius: 50%;
		display: inline-flex;
		align-items: center;
		justify-content: center;
	}
	.yfg-model-item {
		background: #ffffff;
		border: 1px solid #e9f3f5;
		border-radius: 16px;
		padding: 1.5rem;
		box-shadow: 0 4px 12px rgba(5, 47, 87, 0.02);
		transition: all 0.3s ease;
		display: flex;
		align-items: start;
		gap: 1.1rem;
	}
	.yfg-model-item:hover {
		border-color: rgba(4, 112, 125, 0.25);
		box-shadow: 0 10px 25px rgba(5, 47, 87, 0.06);
		transform: translateY(-3px);
	}
	.yfg-model-item__ico {
		width: 42px;
		height: 42px;
		border-radius: 10px;
		background: var(--yfg-soft);
		color: var(--yfg-teal);
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 1.2rem;
		flex-shrink: 0;
		transition: all 0.3s ease;
	}
	.yfg-model-item:hover .yfg-model-item__ico {
		background: var(--yfg-teal);
		color: #ffffff;
	}
</style>

<div class="container">
	<div class="yfg-intl-cta mt-5 d-flex flex-wrap align-items-center justify-content-between gap-3">
		<p><strong>With YFG, you&rsquo;re not just hiring a service provider,</strong> you&rsquo;re gaining a dedicated growth partner committed to helping your business achieve long-term success.</p>
		<div class="d-flex flex-wrap align-items-center gap-2">
			<button type="button" class="btn btn-light fw-semibold" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Start Your Growth Journey &rarr;</button>
			<?php yfg_whatsapp_button(); ?>
		</div>
	</div>
</div>

<!-- ============ COMPLIANCE ============ -->
<section class="yfg-compliance-sec overflow-hidden">
	<span class="yfg-blob" aria-hidden="true" style="background:rgba(4,112,125,0.04);width:350px;height:350px;top:15%;left:-120px;filter:blur(55px);z-index:0;"></span>
	<div class="container position-relative" style="z-index: 1;">
		<div class="row align-items-center g-5">
			<div class="col-lg-5 text-center order-lg-2">
				<div class="position-relative d-inline-block">
					<div class="yfg-deco-dots yfg-deco-dots--top-left"></div>
					<div class="yfg-deco-dots yfg-deco-dots--bottom-right"></div>
					<div class="yfg-sec-img-card">
						<img src="<?php echo esc_url( $yfg_img . '/home-page/home-page-image-3.webp' ); ?>" alt="GDPR compliant and built on trust">
					</div>
				</div>
			</div>
			<div class="col-lg-7 order-lg-1">
				<span class="yfg-accent yfg-accent--start"></span>
				<h2 class="yfg-section-title">GDPR Compliant &amp; Built on Trust</h2>
				<p style="font-size:1.05rem; line-height:1.65; color: #4b5a6a !important;">For businesses operating in the European market, data protection isn&rsquo;t optional, it&rsquo;s expected. Your Firm Growth is GDPR Compliant, which means every campaign, form, tracking setup, and data process we build respects user consent, privacy, and the regulations that govern the UK, Germany, and the wider EU.</p>
				<p class="mb-0" style="font-size:1.05rem; line-height:1.65; color: #4b5a6a !important;">From cookie consent and secure data handling to privacy-first analytics, we help you grow internationally without putting your reputation, or your compliance, at risk.</p>
			    <div class="yfg-hero__cta">
					<button type="button" class="btn btn-brand btn-lg" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">
						<?php echo esc_html( get_theme_mod( 'yfg_hero_btn_text', 'Get a Free Quote' ) ); ?> &rarr;
					</button>
					<?php yfg_whatsapp_button(); ?>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ============ PORTFOLIO HIGHLIGHTS ============ -->
<?php
$yfg_pf_base = YFG_URI . '/assets/images/portfolio/';
get_template_part( 'template-parts/portfolio-strip', null, array(
	// 'title'      => 'A Snapshot of Our Work',
	// 'sub'        => 'Real, verified results across SEO, local search, Google Ads and Meta Ads.',
	'type'       => 'cards',
	'more_url'   => home_url( '/portfolio/' ),
	'more_label' => 'See More Portfolio',
	'items'      => array(
		// SEO — Traffic (2)
		array( 'img' => $yfg_pf_base . 'image4.jpg',  'tag' => 'SEO — Traffic · Forex',   'title' => 'Forex & CFD Broker Website',     'desc' => '8.15M impressions and 32.4K clicks in a high-competition niche.' ),
		array( 'img' => $yfg_pf_base . 'image3.jpg',  'tag' => 'SEO — Traffic · Germany', 'title' => 'Home Emergency Call System',      'desc' => '306K impressions and 3.93K clicks at an average position of 8.' ),
		// SEO — Sales (3)
		array( 'img' => $yfg_pf_base . 'image20.png', 'tag' => 'SEO — Sales · eCommerce', 'title' => 'Organic Baby Food Store',         'desc' => '' ),
		array( 'img' => $yfg_pf_base . 'image17.png', 'tag' => 'SEO — Sales · eCommerce', 'title' => 'Mushroom Gummies Brand',          'desc' => '' ),
		array( 'img' => $yfg_pf_base . 'image22.png', 'tag' => 'SEO — Sales · Local',     'title' => 'Online Las Vegas Flower Shop',    'desc' => '' ),
		// Local SEO (3)
		array( 'img' => $yfg_pf_base . 'image19.png', 'tag' => 'Local SEO · Las Vegas',   'title' => 'Online Las Vegas Flower Shop',    'desc' => '' ),
		array( 'img' => $yfg_pf_base . 'image27.png', 'tag' => 'Local SEO · New York',    'title' => 'Personal Injury Lawyer, Brooklyn','desc' => '' ),
		array( 'img' => $yfg_pf_base . 'image30.png', 'tag' => 'Local SEO · Sacramento',  'title' => 'Pressure Washing Services',       'desc' => '' ),
		// Google Ads (3)
		array( 'img' => $yfg_pf_base . 'image34.png', 'tag' => 'Google Ads · Florida',    'title' => 'Iguana & Tortoise Seller',        'desc' => '' ),
		array( 'img' => $yfg_pf_base . 'image40.png', 'tag' => 'Google Ads · Germany',    'title' => 'Emergency Call System Provider',   'desc' => '' ),
		array( 'img' => $yfg_pf_base . 'image37.png', 'tag' => 'Google Ads · Houston',    'title' => 'Moving Company',                  'desc' => '' ),
		// Meta Ads (1)
		array( 'img' => $yfg_pf_base . 'image39.png', 'tag' => 'Meta Ads · Pakistan',     'title' => 'Gym Accessories Brand',           'desc' => '' ),
	),
) );
?>


<!-- ============ REMOTE TEAMS ============ -->
<section class="yfg-remote-sec overflow-hidden" id="remote">
	<span class="yfg-blob" aria-hidden="true" style="background:rgba(4,112,125,0.04);width:350px;height:350px;top:15%;right:-120px;filter:blur(55px);z-index:0;"></span>
	<div class="container position-relative" style="z-index: 1;">
		<div class="row align-items-center g-5">
			<div class="col-lg-5 text-center">
				<div class="position-relative d-inline-block">
					<div class="yfg-deco-dots yfg-deco-dots--top-left"></div>
					<div class="yfg-deco-dots yfg-deco-dots--bottom-right"></div>
					<div class="yfg-sec-img-card">
						<img src="<?php echo esc_url( $yfg_img . '/home-page/home-page-image-4.webp' ); ?>" alt="Dedicated remote teams">
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<span class="yfg-accent yfg-accent--start"></span>
				<h2 class="yfg-section-title">Dedicated Remote Teams That Work in Your Hours</h2>
				<p style="font-size:1.05rem; line-height:1.65; color: #4b5a6a !important;">Need extra capacity without the cost and overhead of hiring in-house? YFG provides skilled remote teams, designers, developers, marketers, and strategists, who plug straight into your business and align to your office hours. You get real-time collaboration, faster turnarounds, and a team that feels like your own, wherever you&rsquo;re based.</p>
				<ul class="yfg-check-list list-unstyled">
					<li><i class="bi bi-check2"></i> <strong>Flexible engagement:</strong> scale your team up or down as projects demand.</li>
					<li><i class="bi bi-check2"></i> <strong>Time-zone aligned:</strong> we adapt our schedule to match your working day.</li>
					<li><i class="bi bi-check2"></i> <strong>Seamless communication:</strong> shared tools, clear reporting, and a single point of contact.</li>
				</ul>
				<button type="button" class="btn btn-brand btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Build Your Remote Team &rarr;</button> <?php yfg_whatsapp_button( 'ms-2' ); ?>
			</div>
		</div>
	</div>
</section>

<!-- ============ INTERNATIONAL ORGANIZATIONS ============ -->
<style>
	.yfg-intl-head { max-width: 780px; }
	/* Vertical timeline steps */
	.yfg-intl-step { position: relative; padding: 0 0 1.9rem 4.4rem; }
	.yfg-intl-step::before {
		content: ""; position: absolute; left: 1.5rem; top: 3.5rem; bottom: .4rem; width: 2px;
		background: linear-gradient(180deg, rgba(4,112,125,.35) 0%, rgba(4,112,125,.06) 100%);
	}
	.yfg-intl-step:last-child { padding-bottom: 0; }
	.yfg-intl-step:last-child::before { display: none; }
	.yfg-intl-step__num {
		position: absolute; left: 0; top: 0;
		width: 3.1rem; height: 3.1rem; border-radius: 12px;
		background: var(--yfg-grad); color: #fff;
		font-weight: 800; font-family: var(--yfg-head); font-size: 1rem;
		display: flex; align-items: center; justify-content: center;
		box-shadow: 0 8px 20px rgba(4,112,125,.28);
	}
	.yfg-intl-step h3 { font-size: 1.05rem; font-weight: 700; color: var(--yfg-navy); margin-bottom: .4rem; }
	.yfg-intl-step p { color: #5b6b7d; font-size: .95rem; line-height: 1.7; margin: 0; }
	/* Infographic card */
	.yfg-intl-media { position: sticky; top: 130px; }
	.yfg-intl-media__card {
		background: #fff; border: 1px solid #e4eef0; border-radius: 20px; padding: .9rem;
		box-shadow: 0 24px 55px rgba(5,47,87,.12);
		transition: transform .3s ease, box-shadow .3s ease;
	}
	.yfg-intl-media__card:hover { transform: translateY(-5px); box-shadow: 0 32px 70px rgba(5,47,87,.18); }
	.yfg-intl-media__card img { width: 100%; height: auto; border-radius: 12px; display: block; }
	.yfg-intl-media__badge {
		position: absolute; top: -15px; left: 26px; z-index: 2;
		background: var(--yfg-grad); color: #fff;
		font-size: .78rem; font-weight: 600; padding: .5rem 1.1rem; border-radius: 99px;
		box-shadow: 0 8px 18px rgba(4,112,125,.3);
	}
	/* Closing CTA strip */
	.yfg-intl-cta {
		background: var(--yfg-grad); border-radius: 18px;
		padding: 2rem 2.2rem; color: #fff;
		box-shadow: 0 18px 40px rgba(5,47,87,.18);
	}
	.yfg-intl-cta p { color: rgba(255,255,255,.92); margin: 0; font-size: 1rem; line-height: 1.65; flex: 1 1 380px; }
	.yfg-intl-cta p strong { color: #fff; }
	@media (max-width: 991.98px) {
		.yfg-intl-media { position: static; margin-top: 2rem; }
	}
</style>
<section class="yfg-international-sec overflow-hidden">
	<span class="yfg-blob" aria-hidden="true" style="background:rgba(4,112,125,0.04);width:350px;height:350px;top:15%;left:-120px;filter:blur(55px);z-index:0;"></span>
	<div class="container position-relative" style="z-index: 1;">

		<div class="text-center mx-auto mb-5 yfg-intl-head">
			<span class="yfg-accent"></span>
			<h2 class="yfg-section-title">How We Work With International Organizations</h2>
			<p class="yfg-section-sub mx-auto mt-2">At Your Firm Growth (YFG), we make business growth simple, structured, and transparent.</p>
		</div>

		<div class="row g-5 align-items-start">
			<div class="col-lg-6">
				<?php
				$yfg_intl_steps = array(
					array( 'Onboarding & Custom Strategy', 'Our process begins with a comprehensive onboarding session where we take the time to understand your business, goals, challenges, and vision. This allows us to develop a customized strategy tailored to your unique objectives.' ),
					array( 'Production & Implementation', 'Once the roadmap is approved, our team moves into the production and implementation phase, executing the agreed plan with precision while continuously monitoring performance and making improvements along the way.' ),
					array( 'Monthly Deliverables & Reporting', 'Every month, you\'ll receive a detailed deliverables and performance report outlining completed work, key milestones, measurable results, and recommendations for the next phase.' ),
					array( 'Clear Communication & Insights', 'Through clear communication, consistent execution, and data-driven insights, we ensure you always know what we\'re doing, why we\'re doing it, and how it\'s contributing to your business growth.' ),
				);
				foreach ( $yfg_intl_steps as $yfg_i => $yfg_step ) :
					?>
					<div class="yfg-intl-step">
						<span class="yfg-intl-step__num"><?php echo esc_html( str_pad( $yfg_i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3><?php echo esc_html( $yfg_step[0] ); ?></h3>
						<p><?php echo esc_html( $yfg_step[1] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="col-lg-6">
				<div class="yfg-intl-media position-relative">
					<span class="yfg-intl-media__badge"><i class="bi bi-diagram-3 me-1"></i> Our Simple 3-Step Process</span>
					<div class="yfg-intl-media__card">
						<img src="<?php echo esc_url( $yfg_img . '/how-we-work-with-international-organizations.jpeg' ); ?>" alt="Your Firm Growth — how we work: onboarding, production working, and monthly deliverable reporting" loading="lazy">
					</div>
				</div>
			</div>
		</div>

		<div class="yfg-intl-cta mt-5 d-flex flex-wrap align-items-center justify-content-between gap-3">
			<p><strong>With YFG, you&rsquo;re not just hiring a service provider,</strong> you&rsquo;re gaining a dedicated growth partner committed to helping your business achieve long-term success.</p>
			<div class="d-flex flex-wrap align-items-center gap-2">
				<button type="button" class="btn btn-light fw-semibold" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Start Your Growth Journey &rarr;</button>
				<?php yfg_whatsapp_button(); ?>
			</div>
		</div>

	</div>
</section>
<!-- ============ FAQ ============ -->
<section class="py-3" id="faq">
	<div class="container">
		<div class="text-center mb-5">
			<span class="yfg-accent"></span>
			<h2 class="yfg-section-title">Frequently Asked Questions</h2>
		</div>

		<div class="accordion yfg-faq mx-auto" id="yfgFaq">
			<?php
			$yfg_faqs = array(
				array( 'What is a full-service digital agency?', 'A full-service digital agency handles every part of your digital presence, SEO, web design, content, advertising, branding, CRO, and automation, under one roof. With Your Firm Growth, you get one accountable partner instead of multiple disconnected vendors.' ),
				array( 'Do you work with businesses outside your country?', 'Yes. We partner with startups, SMEs, and established companies across the UK, US, Germany, Europe, and worldwide markets, with localized strategies for each region.' ),
				array( 'Is Your Firm Growth GDPR compliant?', 'Absolutely. YFG is GDPR Compliant and builds every campaign and data process to meet EU and UK data-protection standards.' ),
				array( 'Can your remote team work in our time zone?', 'Yes, our remote teams align to your office hours for real-time collaboration, no matter where you&rsquo;re located.' ),
				array( 'What types of projects do you handle?', 'We handle every type of digital project, from a single website or campaign to a complete multi-market digital growth program.' ),
			);
			foreach ( $yfg_faqs as $i => $faq ) :
				$cid = 'faq-' . $i;
				?>
				<div class="accordion-item">
					<h3 class="accordion-header">
						<button class="accordion-button <?php echo 0 === $i ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $cid ); ?>" aria-expanded="<?php echo 0 === $i ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $cid ); ?>">
							<?php echo esc_html( $faq[0] ); ?>
						</button>
					</h3>
					<div id="<?php echo esc_attr( $cid ); ?>" class="accordion-collapse collapse <?php echo 0 === $i ? 'show' : ''; ?>" data-bs-parent="#yfgFaq">
						<div class="accordion-body"><?php echo wp_kses_post( $faq[1] ); ?></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>



<!-- ============ LATEST FROM BLOG ============ -->
<?php
$yfg_home_posts = new WP_Query( array(
	'post_type'           => 'post',
	'posts_per_page'      => 3,
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => true,
) );
if ( $yfg_home_posts->have_posts() ) :
	$yfg_blog_url = get_option( 'page_for_posts' ) ? get_permalink( (int) get_option( 'page_for_posts' ) ) : home_url( '/blogs/' );
	?>
<section class="py-6 yfg-blog-sec" id="blog">
	<div class="container">
		<div class="text-center mb-5">
			<span class="yfg-accent"></span>
			<h2 class="yfg-section-title">Latest From Our <span class="yfg-text-gradient">Blog</span></h2>
			<p class="yfg-section-sub mx-auto">Practical SEO, marketing and web strategies from the Your Firm Growth team &mdash; insights you can actually put to work.</p>
		</div>

		<div class="yfg-posts-grid">
			<?php
			while ( $yfg_home_posts->have_posts() ) :
				$yfg_home_posts->the_post();
				get_template_part( 'template-parts/content-card' );
			endwhile;
			?>
		</div>

		<div class="text-center mt-5">
			<a class="btn btn-brand btn-lg" href="<?php echo esc_url( $yfg_blog_url ); ?>">Read More Articles<i class="bi bi-arrow-right ms-2"></i></a>
		</div>
	</div>
</section>
	<?php
	wp_reset_postdata();
endif;
?>

<!-- ============ FINAL CTA ============ -->
<section class="yfg-final-cta text-center text-white" id="final-cta">
	<span class="yfg-blob" aria-hidden="true" style="width:360px;height:360px;top:-130px;left:-100px;"></span>
	<span class="yfg-blob" aria-hidden="true" style="width:300px;height:300px;bottom:-130px;right:-90px;"></span>
	<div class="container">
		<h2 class="yfg-section-title text-white">Ready to Grow With a Full-Service Digital Company?</h2>
		<p class="yfg-final-cta__lead mx-auto">Partner with Your Firm Growth, the full-service digital agency trusted to turn opportunities into measurable growth. Tell us your goals and we&rsquo;ll build the strategy to reach them.</p>
		<button type="button" class="btn btn-light btn-lg fw-semibold" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Book Your Free Growth Strategy Call &rarr;</button> <?php yfg_whatsapp_button( 'ms-2' ); ?>
		<p class="mt-3 mb-0">Or visit <a class="text-white text-decoration-underline" href="https://yourfirmgrowth.com">yourfirmgrowth.com</a> to get your free proposal today.</p>
	</div>
</section>

<?php
get_footer();
