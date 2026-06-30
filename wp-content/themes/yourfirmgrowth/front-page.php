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
<section class="py-6 bg-light-soft">
	<div class="container">
		<div class="row align-items-center g-5">
			<div class="col-lg-7">
				<span class="yfg-accent yfg-accent--start"></span>
				<h2 class="yfg-section-title">One Agency. Every Digital Solution. Real Growth.</h2>
				<p>Most businesses lose time and money stitching together separate freelancers and agencies for design, marketing, and development. At Your Firm Growth, we remove that friction. As a full-service digital company, we plan, build, launch, and optimize your entire digital presence as one connected strategy, aligned to your goals, your industry, and your audience.</p>
				<p class="mb-0">Whether you want more visibility, more qualified leads, a stronger brand, or entry into new markets, YFG delivers solutions designed around one outcome: sustainable, measurable business growth.</p>
			</div>
			<div class="col-lg-5 text-center">
				<span class="yfg-illus-wrap"><img src="<?php echo esc_url( $yfg_img . '/intro.svg' ); ?>" class="img-fluid yfg-section-img" alt="One connected digital strategy"></span>
			</div>
		</div>
	</div>
</section>

<!-- ============ SERVICES ============ -->
<section class="py-6 yfg-services-sec" id="services">
	<span class="yfg-blob" aria-hidden="true" style="background:rgba(10,163,176,.10);width:340px;height:340px;top:-100px;left:-120px;"></span>
	<div class="container position-relative">
		<div class="text-center mb-5">
			<span class="yfg-accent"></span>
			<h2 class="yfg-section-title">Everything Your Business Needs, Under One Roof</h2>
			<p class="yfg-section-sub mx-auto">We handle every type of digital project, from a single landing page to a complete multi-market growth program. Here is what we deliver as your end-to-end partner:</p>
		</div>

		<div class="row g-4">
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
			foreach ( $yfg_services as $s ) :
				?>
				<div class="col-md-6 col-lg-3">
					<div class="card h-100 yfg-service-card border-0 shadow-sm">
						<div class="card-body">
							<span class="yfg-service-card__icon"><i class="bi <?php echo esc_attr( $s[0] ); ?>"></i></span>
							<h3 class="h5 mt-3"><?php echo wp_kses_post( $s[1] ); ?></h3>
							<p class="text-muted mb-0"><?php echo esc_html( $s[2] ); ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="text-center mt-5">
			<a href="#services" class="btn btn-brand btn-lg">Explore Our Services &rarr;</a>
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

<!-- ============ COMPLIANCE ============ -->
<section class="py-6">
	<div class="container">
		<div class="row align-items-center g-5">
			<div class="col-lg-5 text-center order-lg-2">
				<span class="yfg-illus-wrap"><img src="<?php echo esc_url( $yfg_img . '/gdpr.svg' ); ?>" class="img-fluid yfg-section-img" alt="GDPR compliant and built on trust"></span>
			</div>
			<div class="col-lg-7 order-lg-1">
				<span class="yfg-accent yfg-accent--start"></span>
				<h2 class="yfg-section-title">GDPR Compliant &amp; Built on Trust</h2>
				<p>For businesses operating in the European market, data protection isn&rsquo;t optional, it&rsquo;s expected. Your Firm Growth is GDPR Compliant, which means every campaign, form, tracking setup, and data process we build respects user consent, privacy, and the regulations that govern the UK, Germany, and the wider EU.</p>
				<p class="mb-0">From cookie consent and secure data handling to privacy-first analytics, we help you grow internationally without putting your reputation, or your compliance, at risk.</p>
			</div>
		</div>
	</div>
</section>

<!-- ============ REMOTE TEAMS ============ -->
<section class="py-6 bg-light-soft" id="remote">
	<div class="container">
		<div class="row align-items-center g-5">
			<div class="col-lg-5 text-center">
				<span class="yfg-illus-wrap"><img src="<?php echo esc_url( $yfg_img . '/remote.svg' ); ?>" class="img-fluid yfg-section-img" alt="Dedicated remote teams"></span>
			</div>
			<div class="col-lg-7">
				<span class="yfg-accent yfg-accent--start"></span>
				<h2 class="yfg-section-title">Dedicated Remote Teams That Work in Your Hours</h2>
				<p>Need extra capacity without the cost and overhead of hiring in-house? YFG provides skilled remote teams, designers, developers, marketers, and strategists, who plug straight into your business and align to your office hours. You get real-time collaboration, faster turnarounds, and a team that feels like your own, wherever you&rsquo;re based.</p>
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
<section class="py-6">
	<div class="container">
		<div class="row align-items-center g-5 mb-2">
			<div class="col-lg-5 text-center order-lg-2">
				<span class="yfg-illus-wrap"><img src="<?php echo esc_url( $yfg_img . '/global.svg' ); ?>" class="img-fluid yfg-section-img" alt="International global reach"></span>
			</div>
			<div class="col-lg-7 order-lg-1">
				<span class="yfg-accent yfg-accent--start"></span>
				<h2 class="yfg-section-title">How We Work With International Organizations</h2>
				<p class="mb-0">From local businesses to global brands, Your Firm Growth is built to operate across borders. We partner with international organizations across the United Kingdom, United States, Germany, Europe, and worldwide markets, adapting our strategy, communication, and delivery to each region&rsquo;s language, culture, and compliance requirements.</p>
			</div>
		</div>

		<h3 class="h4 mt-4 mb-4">A proven model for cross-border growth</h3>
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
						<p class="mb-0"><strong><?php echo wp_kses_post( $m[1] ); ?></strong> <?php echo esc_html( $m[2] ); ?></p>
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
