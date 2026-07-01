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
		padding: 0.9rem 2rem;
		border-radius: 12px;
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
		padding: 0.9rem 2rem;
		border-radius: 12px;
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
					<a href="<?php echo esc_url( get_theme_mod( 'yfg_hero_btn_url', '#lead-form' ) ); ?>" class="btn btn-brand btn-lg">
						<?php echo esc_html( get_theme_mod( 'yfg_hero_btn_text', 'Book a Free Growth Strategy Call' ) ); ?> &rarr;
					</a>
				</div>
				<div class="yfg-hero__alt">
					<span class="yfg-hero__hint">Prefer to see the plan first?</span>
					<a href="<?php echo esc_url( get_theme_mod( 'yfg_cta_url', '#final-cta' ) ); ?>" class="btn btn-ghost-light">Get Your Free Proposal</a>
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
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-brand btn-lg">Explore Our Services &rarr;</a>
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
			</div>
		</div>
	</div>
</section>

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
				<a href="#lead-form" class="btn btn-brand btn-lg mt-2">Build Your Remote Team &rarr;</a>
			</div>
		</div>
	</div>
</section>

<!-- ============ INTERNATIONAL ORGANIZATIONS ============ -->
<section class="yfg-international-sec overflow-hidden">
	<span class="yfg-blob" aria-hidden="true" style="background:rgba(4,112,125,0.04);width:350px;height:350px;top:15%;left:-120px;filter:blur(55px);z-index:0;"></span>
	<div class="container position-relative" style="z-index: 1;">
		<div class="row align-items-center g-5 mb-2">
			<div class="col-lg-5 text-center order-lg-2">
				<div class="position-relative d-inline-block">
					<div class="yfg-deco-dots yfg-deco-dots--top-left"></div>
					<div class="yfg-deco-dots yfg-deco-dots--bottom-right"></div>
					<div class="yfg-sec-img-card">
						<img src="<?php echo esc_url( $yfg_img . '/home-page/home-page-image-5.webp' ); ?>" alt="International global reach">
					</div>
				</div>
			</div>
			<div class="col-lg-7 order-lg-1">
				<span class="yfg-accent yfg-accent--start"></span>
				<h2 class="yfg-section-title">How We Work With International Organizations</h2>
				<p class="mb-0" style="font-size:1.05rem; line-height:1.65; color: #4b5a6a !important;">From local businesses to global brands, Your Firm Growth is built to operate across borders. We partner with international organizations across the United Kingdom, United States, Germany, Europe, and worldwide markets, adapting our strategy, communication, and delivery to each region&rsquo;s language, culture, and compliance requirements.</p>
			</div>
		</div>

		<h3 class="h4 mt-5 mb-4 fw-bold" style="color:var(--yfg-navy);">A proven model for cross-border growth</h3>
		<div class="row g-4">
			<?php
			$yfg_model = array(
				array( 'bi-search',          'Discovery &amp; alignment:',     'we learn your markets, goals, and internal stakeholders before we build anything.' ),
				array( 'bi-translate',       'Localized strategy:',           'campaigns and content adapted for each region, not translated, but truly localized.' ),
				array( 'bi-shield-lock',     'Compliance-first delivery:',     'GDPR-aligned data handling and region-specific best practices baked in from day one.' ),
				array( 'bi-clipboard-data',  'Unified reporting:',             'one transparent dashboard across all markets, so leadership always sees the full picture.' ),
			);
			foreach ( $yfg_model as $m ) :
				?>
				<div class="col-md-6">
					<div class="yfg-model-item h-100">
						<span class="yfg-model-item__ico"><i class="bi <?php echo esc_attr( $m[0] ); ?>"></i></span>
						<p class="mb-0 text-muted" style="font-size:0.95rem; line-height:1.5;"><strong><?php echo wp_kses_post( $m[1] ); ?></strong> <?php echo esc_html( $m[2] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<p class="mt-4 mb-0 yfg-section-sub">The result: a consistent global brand, locally relevant execution, and growth you can measure in every market you enter. That&rsquo;s how YFG helps international organizations move fast and stay aligned.</p>
	</div>
</section>
<!-- ============ PROCESS ============ -->
<section class="py-6 bg-light-soft yfg-process-sec">
	<div class="container">
		<div class="text-center mb-5">
			<span class="yfg-accent"></span>
			<h2 class="yfg-section-title">How We Drive Measurable Growth</h2>
			<p class="yfg-section-sub mx-auto">A clear, proven path from audit to scale, every step built around your results.</p>
		</div>

		<div class="yfg-process-outer">
			<!-- Connector track (desktop only) -->
			<div class="yfg-proc-track">
				<div class="yfg-proc-fill" id="yfgProcFill"></div>
			</div>

			<div class="row g-3 yfg-proc-grid" id="yfgProcGrid">
				<?php
				$yfg_process = array(
					array( '1', 'Discover',         'Research &amp; Audit',  'We audit your business, market, and competitors to find your biggest growth opportunities.' ),
					array( '2', 'Strategize',       'Custom Roadmap',        'We design a customized, channel-by-channel roadmap tied to clear KPIs.' ),
					array( '3', 'Build &amp; Launch','Full Execution',        'Our specialists execute across design, development, content, and campaigns.' ),
					array( '4', 'Optimize &amp; Scale','Continuous Growth',   'We measure, test, and refine relentlessly to compound your results over time.' ),
				);
				foreach ( $yfg_process as $i => $p ) :
					$delay = $i * 200;
				?>
				<div class="col-md-6 col-lg-3">
					<div class="yfg-proc-step" data-delay="<?php echo esc_attr( $delay ); ?>">
						<div class="yfg-proc-num"><?php echo esc_html( $p[0] ); ?></div>
						<div class="yfg-proc-card">
							<div class="yfg-proc-card__accent"></div>
							<h3 class="yfg-proc-card__title"><?php echo wp_kses_post( $p[1] ); ?></h3>
							<p class="yfg-proc-card__desc"><?php echo esc_html( $p[3] ); ?></p>
							<span class="yfg-proc-badge"><?php echo wp_kses_post( $p[2] ); ?></span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="text-center mt-5">
			<a href="#lead-form" class="btn btn-brand btn-lg">Start Your Growth Journey &rarr;</a>
		</div>
	</div>
</section>
<!-- ============ FAQ ============ -->
<section class="py-6" id="faq">
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

<!-- ============ FINAL CTA ============ -->
<section class="yfg-final-cta text-center text-white" id="final-cta">
	<span class="yfg-blob" aria-hidden="true" style="width:360px;height:360px;top:-130px;left:-100px;"></span>
	<span class="yfg-blob" aria-hidden="true" style="width:300px;height:300px;bottom:-130px;right:-90px;"></span>
	<div class="container">
		<h2 class="yfg-section-title text-white">Ready to Grow With a Full-Service Digital Company?</h2>
		<p class="yfg-final-cta__lead mx-auto">Partner with Your Firm Growth, the full-service digital agency trusted to turn opportunities into measurable growth. Tell us your goals and we&rsquo;ll build the strategy to reach them.</p>
		<a href="#lead-form" class="btn btn-light btn-lg fw-semibold">Book Your Free Growth Strategy Call &rarr;</a>
		<p class="mt-3 mb-0">Or visit <a class="text-white text-decoration-underline" href="https://yourfirmgrowth.com">yourfirmgrowth.com</a> to get your free proposal today.</p>
	</div>
</section>

<?php
get_footer();
