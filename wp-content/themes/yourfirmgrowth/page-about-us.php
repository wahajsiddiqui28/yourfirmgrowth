<?php
/**
 * Template Name: About Us
 * About page — YourFirmGrowth content package (SEO copy in inc/seo-metadata.php).
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<style>
	.yfg-about-hero {
		background: linear-gradient(45deg, #0540617d, #046a7a85), url(<?php echo esc_url( YFG_URI . '/assets/images/home-page/home-page-banner.webp' ); ?>) center / cover no-repeat;
		background-color: #052f57;
		padding: 5.5rem 0;
		position: relative;
		overflow: hidden;
	}
	.yfg-about-hero h1 {
		color: #fff; font-weight: 800;
		font-size: clamp(2.2rem, 4.5vw, 3.2rem);
		line-height: 1.15; letter-spacing: -0.02em; margin-bottom: 1.4rem;
	}
	.yfg-about-hero h1 .grad {
		background: linear-gradient(120deg, #5dcaa5 0%, #a2ebd3 100%);
		-webkit-background-clip: text; background-clip: text;
		-webkit-text-fill-color: transparent; display: inline-block;
	}
	.yfg-about-hero p { color: rgba(255,255,255,.9); font-size: 1.08rem; line-height: 1.7; max-width: 860px; }
	.yfg-about-hero .yfg-about-ticks { list-style: none; padding: 0; margin: 1.6rem 0 0; display: flex; flex-wrap: wrap; gap: .7rem; }
	.yfg-about-hero .yfg-about-ticks li {
		background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.14);
		color: rgba(255,255,255,.92); font-size: .86rem; font-weight: 500;
		padding: .5rem 1rem; border-radius: 99px; backdrop-filter: blur(6px);
	}
	.yfg-about-hero .yfg-about-ticks i { color: #5dcaa5; margin-right: .35rem; }
	.yfg-about-card {
		background: #fff; border: 1px solid #e7eef1; border-radius: 16px;
		padding: 1.8rem; height: 100%;
		box-shadow: 0 6px 18px rgba(5,47,87,.05);
		transition: transform .25s ease, box-shadow .25s ease;
	}
	.yfg-about-card:hover { transform: translateY(-4px); box-shadow: 0 16px 34px rgba(5,47,87,.10); }
	.yfg-about-card__icon {
		display: inline-flex; align-items: center; justify-content: center;
		width: 48px; height: 48px; border-radius: 12px;
		background: var(--yfg-grad); color: #fff; font-size: 1.25rem; margin-bottom: 1rem;
	}
	.yfg-about-card h3 { font-size: 1.08rem; font-weight: 700; margin-bottom: .55rem; }
	.yfg-about-card p { color: #5b6b7d; font-size: .95rem; line-height: 1.65; margin: 0; }
	.yfg-about-strip {
		background: var(--yfg-grad); border-radius: 18px;
		padding: 2.2rem 2rem; color: #fff;
	}
	.yfg-about-strip h3 { color: #fff; font-weight: 700; font-size: 1.3rem; margin-bottom: .3rem; }
	.yfg-about-strip p { color: rgba(255,255,255,.82); margin: 0; font-size: .96rem; }
	.yfg-about-steps { counter-reset: yfgstep; }
	.yfg-about-step { position: relative; padding-left: 4.2rem; margin-bottom: 1.6rem; }
	.yfg-about-step::before {
		counter-increment: yfgstep; content: counter(yfgstep, decimal-leading-zero);
		position: absolute; left: 0; top: .1rem;
		width: 3.1rem; height: 3.1rem; border-radius: 12px;
		background: var(--yfg-grad); color: #fff; font-weight: 800; font-size: 1.05rem;
		display: flex; align-items: center; justify-content: center;
		font-family: var(--yfg-head);
	}
	.yfg-about-step h3 { font-size: 1.05rem; font-weight: 700; margin-bottom: .3rem; }
	.yfg-about-step p { color: #5b6b7d; font-size: .95rem; line-height: 1.65; margin: 0; }
	.yfg-about-stat { text-align: center; padding: 1.6rem 1rem; }
	.yfg-about-stat__num {
		font-family: var(--yfg-head); font-weight: 800;
		font-size: clamp(2rem, 4vw, 2.8rem); color: #fff; line-height: 1;
	}
	.yfg-about-stat__label { color: rgba(255,255,255,.78); font-size: .92rem; margin-top: .5rem; }
	.yfg-about-value { display: flex; gap: .9rem; margin-bottom: 1.1rem; }
	.yfg-about-value i { color: var(--yfg-teal); font-size: 1.25rem; flex-shrink: 0; margin-top: .1rem; }
	.yfg-about-value h3 { font-size: 1rem; font-weight: 700; margin-bottom: .2rem; }
	.yfg-about-value p { color: #5b6b7d; font-size: .94rem; line-height: 1.6; margin: 0; }
	.yfg-about-faq .accordion-item { border: 1px solid #e7eef1; border-radius: 12px !important; margin-bottom: .8rem; overflow: hidden; }
	.yfg-about-faq .accordion-button { font-weight: 600; color: var(--yfg-navy); font-size: .98rem; padding: 1.1rem 1.3rem; }
	.yfg-about-faq .accordion-button:not(.collapsed) { background: rgba(4,112,125,.06); color: var(--yfg-teal); box-shadow: none; }
	.yfg-about-faq .accordion-body { color: #5b6b7d; font-size: .95rem; line-height: 1.65; }
</style>

<!-- ============ HERO ============ -->
<section class="yfg-about-hero">
	<div class="container">
		<h1>About <span class="grad">Your Firm Growth</span></h1>
		<p>Your Firm Growth (YFG) is a full-service digital agency helping businesses grow through strategic marketing, innovative technology, and results-driven digital solutions. From startups to global brands, we turn opportunities into measurable growth, all under one roof.</p>
		<p>We partner with businesses across the United Kingdom, United States, Germany, Europe, and worldwide markets to build stronger brands, generate qualified leads, and drive sustainable growth.</p>
		<div class="mt-4 d-flex flex-wrap align-items-center gap-2">
			<button type="button" class="btn btn-brand btn-lg" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Work With Us &rarr;</button>
			<?php yfg_whatsapp_button(); ?>
		</div>
		<ul class="yfg-about-ticks">
			<li><i class="bi bi-check-circle-fill"></i>Full-service, under one roof</li>
			<li><i class="bi bi-shield-check"></i>GDPR Compliant</li>
			<li><i class="bi bi-clock-history"></i>Remote teams aligned to your hours</li>
			<li><i class="bi bi-globe2"></i>Trusted by businesses worldwide</li>
		</ul>
	</div>
</section>

<!-- ============ WHO WE ARE / MISSION / VISION ============ -->
<section class="py-6 bg-light-soft">
	<div class="container">
		<div class="row g-5 align-items-start">
			<div class="col-lg-6">
				<h2 class="yfg-section-title">Who We Are</h2>
				<div class="yfg-accent yfg-accent--start"></div>
				<p class="text-muted" style="font-size:1.02rem; line-height:1.7;">Most businesses lose time and money managing a patchwork of separate freelancers and agencies, one for design, another for marketing, a third for development. Your Firm Growth was built to remove that complexity. We bring every digital service a growing business needs into a single, accountable team, so our clients can stop juggling vendors and start scaling with confidence.</p>
				<p class="text-muted mb-0" style="font-size:1.02rem; line-height:1.7;">Today, YFG works as the dedicated digital partner for startups, small businesses, and established companies alike, combining marketing, technology, and creative expertise to deliver a seamless experience focused on real, measurable results.</p>
			</div>
			<div class="col-lg-6">
				<div class="row g-4">
					<div class="col-12">
						<div class="yfg-about-card">
							<span class="yfg-about-card__icon"><i class="bi bi-bullseye"></i></span>
							<h3>Our Mission</h3>
							<p>Our mission is simple: to empower businesses around the world with the tools, strategies, and expertise they need to grow confidently in an increasingly competitive digital landscape. We believe every business, from a local startup to a global brand, deserves access to high-quality digital solutions that actually move the needle.</p>
						</div>
					</div>
					<div class="col-12">
						<div class="yfg-about-card">
							<span class="yfg-about-card__icon"><i class="bi bi-eye"></i></span>
							<h3>Our Vision</h3>
							<p>We envision a world where growth isn't reserved for companies with the biggest budgets, but is achievable for any business willing to invest in the right strategy. Our goal is to be the trusted full-service partner that businesses rely on to navigate change, seize opportunities, and grow sustainably for years to come.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="yfg-about-strip mt-5 d-flex flex-wrap align-items-center justify-content-between gap-3">
			<div>
				<h3>Share your goals with us</h3>
				<p>Tell us where you want to go — we'll map the route.</p>
			</div>
			<div class="d-flex flex-wrap align-items-center gap-2">
				<button type="button" class="btn btn-light fw-semibold" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Book a Discovery Call &rarr;</button>
				<?php yfg_whatsapp_button(); ?>
			</div>
		</div>
	</div>
</section>

<!-- ============ WHAT WE PROVIDE ============ -->
<section class="py-6">
	<div class="container">
		<div class="text-center mb-5">
			<h2 class="yfg-section-title">What We Provide for You</h2>
			<div class="yfg-accent"></div>
			<p class="yfg-section-sub mx-auto">We handle every type of digital project, so you never have to coordinate multiple vendors again.</p>
		</div>
		<div class="row g-4">
			<?php
			$yfg_about_services = array(
				array( 'bi-search', 'Search Engine Optimization (SEO)', 'Higher rankings and organic traffic that compounds.' ),
				array( 'bi-laptop', 'Web Design & Development', 'Fast, beautiful, conversion-focused websites.' ),
				array( 'bi-pencil-square', 'Content Marketing', 'Content that ranks, educates, and converts.' ),
				array( 'bi-megaphone', 'Paid Advertising', 'Profit-focused campaigns across every major channel.' ),
				array( 'bi-palette', 'Branding', 'Identity and positioning that make you memorable.' ),
				array( 'bi-graph-up-arrow', 'Conversion Optimization (CRO)', 'Turning more of your traffic into customers.' ),
				array( 'bi-gear-wide-connected', 'Business Automation', 'Workflows that save time and scale your operations.' ),
				array( 'bi-compass', 'Digital Growth Consulting', 'Senior strategy that ties it all together.' ),
			);
			foreach ( $yfg_about_services as $yfg_svc ) :
				?>
				<div class="col-lg-3 col-md-6">
					<div class="yfg-about-card">
						<span class="yfg-about-card__icon"><i class="bi <?php echo esc_attr( $yfg_svc[0] ); ?>"></i></span>
						<h3><?php echo esc_html( $yfg_svc[1] ); ?></h3>
						<p><?php echo esc_html( $yfg_svc[2] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ CORE VALUES + DIFFERENT ============ -->
<section class="py-6 bg-light-soft">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-6">
				<h2 class="yfg-section-title">Our Core Values</h2>
				<div class="yfg-accent yfg-accent--start"></div>
				<p class="text-muted mb-4">Everything we do is guided by a simple set of principles:</p>
				<div class="yfg-about-value"><i class="bi bi-trophy"></i><div><h3>Results over vanity</h3><p>We measure success in leads, conversions, and revenue, not empty metrics.</p></div></div>
				<div class="yfg-about-value"><i class="bi bi-people"></i><div><h3>Partnership, not transactions</h3><p>We treat your goals as our own and build long-term relationships.</p></div></div>
				<div class="yfg-about-value"><i class="bi bi-clipboard-data"></i><div><h3>Transparency always</h3><p>Clear reporting, honest advice, and no jargon or hidden surprises.</p></div></div>
				<div class="yfg-about-value"><i class="bi bi-lightbulb"></i><div><h3>Innovation with purpose</h3><p>We adopt new technology when it genuinely helps you grow.</p></div></div>
				<div class="yfg-about-value"><i class="bi bi-shield-check"></i><div><h3>Integrity and trust</h3><p>We handle your data and your brand with care, and we stay GDPR compliant.</p></div></div>
			</div>
			<div class="col-lg-6">
				<h2 class="yfg-section-title">What Makes Your Firm Growth Different?</h2>
				<div class="yfg-accent yfg-accent--start"></div>
				<p class="text-muted" style="line-height:1.7;">Working with multiple agencies can slow things down. We keep it simple by bringing strategy, creative, marketing, and development together under one roof, so you have one team moving your business forward.</p>
				<p class="text-muted" style="line-height:1.7;">We build around your goals, not a template. Every strategy is shaped by your industry or niche, audience, and growth stage to make sure it fits what your business actually needs.</p>
				<p class="text-muted" style="line-height:1.7;">You'll always know what's working. We focus on real results like leads, sales, and growth, backed by clear reporting.</p>
				<p class="text-muted" style="line-height:1.7;">And with GDPR-compliant workflows plus remote teams aligned to your office hours, you get secure, smooth collaboration without the usual delays.</p>
				<div class="mt-4 d-flex flex-wrap align-items-center gap-2">
					<button type="button" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Request Your Free Proposal &rarr;</button>
					<?php yfg_whatsapp_button(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ============ HOW WE START / WHO WE WORK WITH ============ -->
<section class="py-6">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-6">
				<h2 class="yfg-section-title">How We Start Work</h2>
				<div class="yfg-accent yfg-accent--start"></div>
				<p class="text-muted mb-4">We keep our approach clear and collaborative, so you always know what's happening and why:</p>
				<div class="yfg-about-steps">
					<div class="yfg-about-step"><h3>Understand</h3><p>We learn your business, market, and goals before recommending anything.</p></div>
					<div class="yfg-about-step"><h3>Strategize</h3><p>We build a customized roadmap tied to measurable objectives.</p></div>
					<div class="yfg-about-step"><h3>Execute</h3><p>Our specialists deliver across design, development, marketing, and content.</p></div>
					<div class="yfg-about-step"><h3>Optimize</h3><p>We measure, refine, and scale what works to compound your growth.</p></div>
				</div>
			</div>
			<div class="col-lg-6">
				<h2 class="yfg-section-title">Who We Work With</h2>
				<div class="yfg-accent yfg-accent--start"></div>
				<p class="text-muted" style="line-height:1.7;">From local businesses to global brands, Your Firm Growth partners with organizations at every stage of growth. We work with startups finding their footing, small businesses ready to scale, and established companies expanding into new markets.</p>
				<h3 style="font-size:1.1rem; font-weight:700;" class="mt-4">Trusted by international organizations</h3>
				<p class="text-muted" style="line-height:1.7;">We're built to operate across borders. We support international organizations across the UK, US, Germany, Europe, and worldwide, adapting our strategy, communication, and delivery to each region's language, culture, and compliance requirements, so you get a consistent global brand with locally relevant execution.</p>
				<h3 style="font-size:1.1rem; font-weight:700;" class="mt-4">Our Commitment to Compliance &amp; Trust</h3>
				<p class="text-muted mb-0" style="line-height:1.7;">For businesses operating in the European market, trust and data protection are non-negotiable. That's why YFG is <a href="<?php echo esc_url( home_url( '/gdpr-compliance/' ) ); ?>">GDPR Compliant</a>: every campaign, website, and data process we build respects user consent, privacy, and the regulations that govern the UK, Germany, and the wider EU. When you work with us, growth never comes at the cost of your reputation or compliance.</p>
			</div>
		</div>
	</div>
</section>

<!-- ============ BY THE NUMBERS ============ -->
<section class="py-6 bg-brand-dark">
	<div class="container">
		<div class="text-center mb-4">
			<h2 class="yfg-section-title text-white">Your Firm Growth by the Numbers</h2>
			<div class="yfg-accent"></div>
		</div>
		<div class="row g-4">
			<div class="col-lg-3 col-6"><div class="yfg-about-stat"><div class="yfg-about-stat__num">50+</div><div class="yfg-about-stat__label">Digital projects delivered</div></div></div>
			<div class="col-lg-3 col-6"><div class="yfg-about-stat"><div class="yfg-about-stat__num">20+</div><div class="yfg-about-stat__label">Countries served across the UK, US, Germany, Europe &amp; beyond</div></div></div>
			<div class="col-lg-3 col-6"><div class="yfg-about-stat"><div class="yfg-about-stat__num">10+</div><div class="yfg-about-stat__label">Years of combined team experience</div></div></div>
			<div class="col-lg-3 col-6"><div class="yfg-about-stat"><div class="yfg-about-stat__num">90%</div><div class="yfg-about-stat__label">Of clients continue working with us beyond their first project</div></div></div>
		</div>
	</div>
</section>

<!-- ============ TEAM ============ -->
<section class="py-6">
	<div class="container text-center">
		<h2 class="yfg-section-title">The People Behind YFG</h2>
		<div class="yfg-accent"></div>
		<p class="yfg-section-sub mx-auto">Behind every successful project is a dedicated network of remote specialists working together across strategy, SEO, web development, design, content, digital marketing, and business consulting. We bring together the right expertise for every project, working as an extension of your business to deliver measurable, long-term growth.</p>
		<div class="mt-4">
			<button type="button" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Let's Talk  &rarr;</button>
		</div>
	</div>
</section>

<!-- ============ FAQ ============ -->
<section class="py-6 bg-light-soft" id="faq">
	<div class="container" style="max-width: 860px;">
		<div class="text-center mb-5">
			<h2 class="yfg-section-title">Frequently Asked Questions</h2>
			<div class="yfg-accent"></div>
		</div>
		<div class="accordion yfg-about-faq" id="yfgAboutFaq">
			<div class="accordion-item">
				<h3 class="accordion-header">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaq1">What does Your Firm Growth do?</button>
				</h3>
				<div id="aboutFaq1" class="accordion-collapse collapse show" data-bs-parent="#yfgAboutFaq">
					<div class="accordion-body">Your Firm Growth is a full-service digital agency offering SEO, web design and development, content marketing, paid advertising, branding, conversion optimization, automation, and growth consulting, all under one roof.</div>
				</div>
			</div>
			<div class="accordion-item">
				<h3 class="accordion-header">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaq2">Who does YFG work with?</button>
				</h3>
				<div id="aboutFaq2" class="accordion-collapse collapse" data-bs-parent="#yfgAboutFaq">
					<div class="accordion-body">We partner with startups, small businesses, and established companies across the UK, US, Germany, Europe, and worldwide markets.</div>
				</div>
			</div>
			<div class="accordion-item">
				<h3 class="accordion-header">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaq3">Is Your Firm Growth GDPR compliant?</button>
				</h3>
				<div id="aboutFaq3" class="accordion-collapse collapse" data-bs-parent="#yfgAboutFaq">
					<div class="accordion-body">Yes. Your Firm Growth is GDPR compliant and follows privacy-first practices across every engagement.</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ============ FINAL CTA ============ -->
<section class="py-6 bg-brand-dark text-center">
	<div class="container" style="max-width: 760px;">
		<h2 class="yfg-section-title text-white">Let's Grow Your Business Together</h2>
		<div class="yfg-accent"></div>
		<p style="color: rgba(255,255,255,.85); font-size: 1.05rem; line-height: 1.7;">No matter where your business stands today, Your Firm Growth is here to help you move forward. Share your goals with us, and we'll build a clear plan to help you grow.</p>
		<div class="mt-4 d-flex flex-wrap align-items-center justify-content-center gap-2">
			<button type="button" class="btn btn-light fw-semibold" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Start Your Growth Journey &rarr;</button>
			<?php yfg_whatsapp_button(); ?>
		</div>
		<p class="mt-3 mb-0" style="color: rgba(255,255,255,.65); font-size: .9rem;">Or visit <a href="https://yourfirmgrowth.com" style="color:#5dcaa5;">yourfirmgrowth.com</a> to request your free quote.</p>
	</div>
</section>

<?php
get_footer();
