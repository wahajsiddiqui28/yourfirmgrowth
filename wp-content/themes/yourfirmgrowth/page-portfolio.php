<?php
/**
 * Template Name: Portfolio
 *
 * Showcases real SEO, Google Ads, Meta Ads and Local SEO project results.
 * Screenshots live in assets/images/portfolio/.
 *
 * @package YourFirmGrowth
 */

get_header();

$pf = YFG_URI . '/assets/images/portfolio/';

/* ---- Portfolio data (grouped by channel) ---- */
$yfg_sections = array(

	array(
		'id'    => 'organic',
		'title' => 'Organic Traffic Growth - SEO',
		'sub'   => 'Search Console & Analytics growth we delivered across competitive industries and markets.',
		'type'  => 'single',
		'items' => array(
			array( 'img' => 'image4.jpg',  'tag' => 'Forex & Finance', 'title' => 'Forex & CFD Broker Website', 'desc' => 'High-competition Forex & CFD market - aggressive SEO growth. We scaled the site to 8.15M impressions and 32.4K clicks through in-depth technical SEO, high-authority link building, strategic content, and aggressive on-page optimization.' ),
			array( 'img' => 'image3.jpg',  'tag' => 'Germany', 'title' => 'Home Emergency Call System Provider', 'desc' => 'Germany-wide emergency services with a native German-language content and keyword strategy. Achieved 306K impressions and 3.93K clicks at a strong average position of 8.' ),
			array( 'img' => 'image6.png',  'tag' => 'Wholesale · USA', 'title' => 'Tire Wholesale Brand', 'desc' => 'SEO services for a tire wholesale brand in the USA, with results showing significant growth.' ),
			array( 'img' => 'image5.png',  'tag' => 'Internet Services · USA', 'title' => 'Rural Internet Services', 'desc' => 'SEO for a rural internet service provider in the USA, with results demonstrating significant growth.' ),
			array( 'img' => 'image7.png',  'tag' => 'eCommerce · USA', 'title' => 'Organic Baby Food Store', 'desc' => 'SEO and social media services for an organic baby food eCommerce website in the USA, resulting in strong online visibility and sustainable growth.' ),
			array( 'img' => 'image8.png',  'tag' => 'eCommerce · USA', 'title' => 'Mushroom Gummies Brand', 'desc' => 'SEO and social media for a mushroom gummies eCommerce brand in the USA, driving increased visibility, engagement, and consistent growth.' ),
			array( 'img' => 'image10.png', 'tag' => 'Blog · USA', 'title' => 'Lean Manufacturing Blog', 'desc' => 'SEO for a lean manufacturing blog in the USA - improved search rankings, higher traffic, and stronger audience engagement.' ),
			array( 'img' => 'image13.png', 'tag' => 'Local SEO · Las Vegas', 'title' => 'Online Las Vegas Flower Shop', 'desc' => 'Full SEO including Local SEO for an online flower shop in Las Vegas, USA, boosting local visibility, rankings, and online orders.' ),
			array( 'img' => 'image9.png',  'tag' => 'Legal · New York', 'title' => 'Personal Injury Law Firm', 'desc' => 'Full SEO including Local SEO for a personal injury law firm in New York, USA, driving stronger local visibility and higher rankings.' ),
			array( 'img' => 'image11.png', 'tag' => 'Legal', 'title' => 'Injury Law Firm', 'desc' => '' ),
			array( 'img' => 'image11.png', 'tag' => 'Legal · California', 'title' => 'Family Law Firm in California', 'desc' => '' ),
			array( 'img' => 'image14.png', 'tag' => 'Supplier · Germany', 'title' => 'Nursing Aids Box Supplier', 'desc' => '' ),
			array( 'img' => 'image12.png', 'tag' => 'eCommerce · Pakistan', 'title' => 'Gym Accessories Brand', 'desc' => '' ),
			array( 'img' => 'image16.png', 'tag' => 'Sports · Dubai', 'title' => 'Indoor Sports Arena', 'desc' => '' ),
		),
	),

	array(
		'id'    => 'purchases',
		'title' => 'Sales & Purchases Growth - SEO',
		'sub'   => 'Organic revenue and purchase growth tracked in Analytics for eCommerce and service clients.',
		'type'  => 'single',
		'items' => array(
			array( 'img' => 'image15.png', 'tag' => 'Internet Services · USA', 'title' => 'Rural Internet Services', 'desc' => '' ),
			array( 'img' => 'image20.png', 'tag' => 'eCommerce · USA', 'title' => 'Organic Baby Food Store', 'desc' => '' ),
			array( 'img' => 'image17.png', 'tag' => 'eCommerce · USA', 'title' => 'Mushroom Gummies Brand', 'desc' => '' ),
			array( 'img' => 'image22.png', 'tag' => 'Local · Las Vegas', 'title' => 'Online Las Vegas Flower Shop', 'desc' => '' ),
		),
	),

	array(
		'id'    => 'local',
		'title' => 'Local SEO - Google Business Profile',
		'sub'   => 'Calls, website clicks and interactions driven from Google Business Profile.',
		'type'  => 'local',
		'items' => array(
			array( 'tag' => 'Local SEO · Las Vegas', 'title' => 'Online Las Vegas Flower Shop', 'imgs' => array( 'image19.png', 'image18.png', 'image21.png' ) ),
			array( 'tag' => 'Local SEO · New York', 'title' => 'Personal Injury Lawyer, Brooklyn NY', 'imgs' => array( 'image27.png', 'image23.png', 'image25.png' ) ),
			array( 'tag' => 'Local SEO · Sacramento', 'title' => 'Pressure Washing Services, Sacramento', 'imgs' => array( 'image30.png', 'image24.png', 'image26.png' ) ),
			array( 'tag' => 'Local SEO · California', 'title' => 'Family Law Firm in California', 'imgs' => array( 'image29.png', 'image28.png', 'image31.png' ) ),
			array( 'tag' => 'Local SEO · Torrance', 'title' => 'Injury Lawyer in Torrance', 'imgs' => array( 'image32.png', 'image33.png', 'image38.png' ) ),
		),
	),

	array(
		'id'    => 'google-ads',
		'title' => 'Google Ads Campaigns',
		'sub'   => 'Profit-focused Google Ads performance across service and eCommerce clients.',
		'type'  => 'single',
		'items' => array(
			array( 'img' => 'image34.png', 'tag' => 'Google Ads · Florida', 'title' => 'Iguana & Tortoise Seller', 'desc' => '' ),
			array( 'img' => 'image36.png', 'tag' => 'Google Ads · Germany', 'title' => 'Nursing Aids Box Supplier', 'desc' => '' ),
			array( 'img' => 'image40.png', 'tag' => 'Google Ads · Germany', 'title' => 'Emergency Call System Provider', 'desc' => '' ),
			array( 'img' => 'image35.png', 'tag' => 'Google Ads · New York', 'title' => 'Personal Injury Lawyer', 'desc' => '' ),
			array( 'img' => 'image37.png', 'tag' => 'Google Ads · Houston', 'title' => 'Moving Company', 'desc' => '' ),
			array( 'img' => 'image41.png', 'tag' => 'Google Ads · Las Vegas', 'title' => 'Injury Lawyer', 'desc' => '' ),
		),
	),

	array(
		'id'    => 'meta-ads',
		'title' => 'Meta Ads Campaigns',
		'sub'   => 'Facebook & Instagram advertising results.',
		'type'  => 'single',
		'items' => array(
			array( 'img' => 'image39.png', 'tag' => 'Meta Ads · Pakistan', 'title' => 'Gym Accessories Brand', 'desc' => '' ),
		),
	),
);
?>

<style>
	.yfg-pf-hero {
		padding: 7rem 0 6rem;
		background: linear-gradient(135deg, rgba(3,24,46,.95) 0%, rgba(5,47,87,.9) 50%, rgba(4,80,92,.85) 100%), url(<?php echo esc_url( YFG_URI . '/assets/images/hero-bg.svg' ); ?>) center / cover no-repeat;
		color: #fff; position: relative; overflow: hidden;
	}
	.yfg-pf-hero h1 { color: #fff !important; font-size: clamp(2.2rem, 4.6vw, 3.4rem); font-weight: 800; line-height: 1.12; }
	.yfg-pf-hero .grad { background: linear-gradient(120deg, #5dcaa5, #9fe1cb); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
	.yfg-pf-hero__lead { font-size: 1.15rem; color: rgba(255,255,255,.88); max-width: 760px; line-height: 1.6; }
	.yfg-pf-chips { display: flex; flex-wrap: wrap; gap: .6rem; margin-top: 2rem; padding: 0; list-style: none; }
	.yfg-pf-chips li { font-size: .82rem; font-weight: 500; color: rgba(255,255,255,.92); background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.14); padding: .45rem 1rem; border-radius: 99px; }

	.yfg-section { padding: 5rem 0; }
	.yfg-section--light { background: linear-gradient(180deg, #f3fafc 0%, #ffffff 100%); }
	.yfg-section-title { color: var(--yfg-navy); font-weight: 800; font-size: clamp(1.7rem, 3vw, 2.3rem); letter-spacing: -.02em; }

	/* Category filter bar */
	.yfg-pf-filter { position: sticky; top: 60px; z-index: 90; background: rgba(255,255,255,.96); backdrop-filter: saturate(180%) blur(10px); border-bottom: 1px solid #e6eef0; box-shadow: 0 6px 18px rgba(5,47,87,.05); }
	.yfg-pf-filter__inner { display: flex; flex-wrap: wrap; gap: .5rem; justify-content: center; padding: .85rem 0; }
	.yfg-pf-filter__btn { border: 1px solid #e0eaec; background: #fff; color: #33475b; font-weight: 600; font-size: .85rem; padding: .5rem 1.1rem; border-radius: 999px; cursor: pointer; transition: all .18s ease; font-family: var(--yfg-font); white-space: nowrap; }
	.yfg-pf-filter__btn:hover { border-color: var(--yfg-teal); color: var(--yfg-teal); }
	.yfg-pf-filter__btn.is-active { background: var(--yfg-grad); border-color: transparent; color: #fff; box-shadow: 0 6px 16px rgba(5,47,87,.18); }
	@media (max-width: 767px) {
		.yfg-pf-filter__inner { flex-wrap: nowrap; overflow-x: auto; justify-content: flex-start; -webkit-overflow-scrolling: touch; }
		.yfg-pf-filter__btn { flex: 0 0 auto; }
	}

	/* Project card */
	.yfg-pf-card { background: #fff; border: 1px solid #e9f3f5; border-radius: 18px; overflow: hidden; height: 100%; display: flex; flex-direction: column; box-shadow: 0 6px 20px rgba(5,47,87,.04); transition: transform .25s ease, box-shadow .25s ease; }
	.yfg-pf-card:hover { transform: translateY(-6px); box-shadow: 0 20px 44px rgba(5,47,87,.12); }
	.yfg-pf-card__media { position: relative; height: 230px; overflow: hidden; background: #eef6f8; cursor: zoom-in; }
	.yfg-pf-card__media img { width: 100%; height: 100%; object-fit: cover; object-position: top center; transition: transform .45s ease; }
	.yfg-pf-card:hover .yfg-pf-card__media img { transform: scale(1.05); }
	.yfg-pf-card__media::after { content: "\F52A"; font-family: "bootstrap-icons"; position: absolute; top: 12px; right: 12px; width: 34px; height: 34px; display: flex; align-items: center; justify-content: center; background: rgba(5,47,87,.75); color: #fff; border-radius: 9px; font-size: 1rem; opacity: 0; transition: opacity .25s ease; }
	.yfg-pf-card:hover .yfg-pf-card__media::after { opacity: 1; }
	.yfg-pf-card__body { padding: 1.25rem 1.35rem 1.45rem; display: flex; flex-direction: column; gap: .55rem; flex: 1; }
	.yfg-pf-tag { align-self: flex-start; font-size: .71rem; font-weight: 600; text-transform: uppercase; letter-spacing: .03em; color: var(--yfg-teal); background: var(--yfg-soft); padding: .3rem .7rem; border-radius: 999px; }
	.yfg-pf-card__title { font-family: var(--yfg-head); font-size: 1.12rem; font-weight: 700; color: var(--yfg-navy); margin: 0; }
	.yfg-pf-card__desc { font-size: .89rem; color: #5b6b7d; margin: 0; line-height: 1.55; }

	/* Local SEO card (3 screenshots) */
	.yfg-pf-local { background: #fff; border: 1px solid #e9f3f5; border-radius: 18px; padding: 1.5rem; height: 100%; box-shadow: 0 6px 20px rgba(5,47,87,.04); transition: transform .25s ease, box-shadow .25s ease; }
	.yfg-pf-local:hover { transform: translateY(-5px); box-shadow: 0 20px 44px rgba(5,47,87,.1); }
	.yfg-pf-local__shots { display: grid; grid-template-columns: repeat(3, 1fr); gap: .6rem; margin-top: 1.1rem; }
	.yfg-pf-shot { border: 1px solid #e9f3f5; border-radius: 10px; overflow: hidden; cursor: zoom-in; aspect-ratio: 4 / 3; background: #eef6f8; }
	.yfg-pf-shot img { width: 100%; height: 100%; object-fit: cover; object-position: top center; transition: transform .4s ease; }
	.yfg-pf-shot:hover img { transform: scale(1.06); }

	/* Website design & development gallery */
	.yfg-web-group { margin-top: 2.8rem; }
	.yfg-web-group:first-of-type { margin-top: 0; }
	.yfg-web-group__title { font-family: var(--yfg-head); font-size: 1.18rem; font-weight: 700; color: var(--yfg-navy); display: inline-flex; align-items: center; gap: .55rem; margin-bottom: 1.3rem; }
	.yfg-web-group__title i { color: var(--yfg-teal); font-size: 1.25rem; }
	.yfg-web-shot { position: relative; height: 260px; overflow: hidden; border-radius: 16px; border: 1px solid #e4eef0; background: #eef6f8; cursor: zoom-in; box-shadow: 0 6px 20px rgba(5,47,87,.05); transition: box-shadow .25s ease, transform .25s ease; }
	.yfg-web-shot:hover { box-shadow: 0 20px 44px rgba(5,47,87,.14); transform: translateY(-4px); }
	.yfg-web-shot img { width: 100%; height: auto; display: block; transition: transform 3.5s ease; }
	.yfg-web-shot:hover img { transform: translateY(calc(-100% + 260px)); }
	.yfg-web-shot::after { content: "\F52A"; font-family: "bootstrap-icons"; position: absolute; top: 12px; right: 12px; width: 34px; height: 34px; display: flex; align-items: center; justify-content: center; background: rgba(5,47,87,.8); color: #fff; border-radius: 9px; opacity: 0; transition: opacity .25s ease; z-index: 2; }
	.yfg-web-shot:hover::after { opacity: 1; }

	/* Lightbox (supports tall full-page screenshots via scroll) */
	.yfg-lightbox { position: fixed; inset: 0; background: rgba(3,18,33,.93); display: none; justify-content: center; align-items: flex-start; overflow-y: auto; z-index: 9999; padding: 26px; }
	.yfg-lightbox.is-open { display: flex; }
	.yfg-lightbox img { max-width: min(96%, 1050px); height: auto; margin: 0 auto; border-radius: 10px; box-shadow: 0 20px 60px rgba(0,0,0,.5); }
	.yfg-lightbox__close { position: fixed; top: 16px; right: 28px; color: #fff; font-size: 2.4rem; line-height: 1; cursor: pointer; opacity: .85; z-index: 10000; }
	.yfg-lightbox__close:hover { opacity: 1; }

	@media (max-width: 575px) {
		.yfg-pf-local__shots { grid-template-columns: 1fr 1fr; }
	}
</style>

<!-- ============ HERO ============ -->
<section class="yfg-pf-hero">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<h1 class="mb-3">Our Portfolio - <span class="grad">Proven Results We&rsquo;ve Delivered</span></h1>
				<p class="yfg-pf-hero__lead">These are examples of our recent and ongoing work, showcasing the results we&rsquo;ve achieved for our clients. All results are authentic and reflect our proven strategies and consistent performance.</p>
				<ul class="yfg-pf-chips">
					<li>SEO</li>
					<li>Local SEO</li>
					<li>Google Ads</li>
					<li>Meta Ads</li>
					<li>Web Design &amp; Development</li>
					<li>eCommerce</li>
					<li>USA · Germany · Dubai · Worldwide</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- ============ CATEGORY FILTER ============ -->
<nav class="yfg-pf-filter" id="yfgPfFilter" aria-label="Portfolio categories">
	<div class="container">
		<div class="yfg-pf-filter__inner">
			<button type="button" class="yfg-pf-filter__btn is-active" data-filter="all">All Work</button>
			<button type="button" class="yfg-pf-filter__btn" data-filter="organic">SEO &mdash; Traffic</button>
			<button type="button" class="yfg-pf-filter__btn" data-filter="purchases">SEO &mdash; Sales</button>
			<button type="button" class="yfg-pf-filter__btn" data-filter="local">Local SEO</button>
			<button type="button" class="yfg-pf-filter__btn" data-filter="google-ads">Google Ads</button>
			<button type="button" class="yfg-pf-filter__btn" data-filter="meta-ads">Meta Ads</button>
			<button type="button" class="yfg-pf-filter__btn" data-filter="web-development">Web Development</button>
		</div>
	</div>
</nav>

<?php
$yfg_alt = true;
foreach ( $yfg_sections as $sec ) :
	$yfg_alt = ! $yfg_alt;
	?>
	<section class="yfg-section <?php echo $yfg_alt ? 'yfg-section--light' : ''; ?>" id="<?php echo esc_attr( $sec['id'] ); ?>" data-cat="<?php echo esc_attr( $sec['id'] ); ?>">
		<div class="container">
			<div class="text-center mb-5">
				<span class="yfg-accent"></span>
				<h2 class="yfg-section-title"><?php echo esc_html( $sec['title'] ); ?></h2>
				<?php if ( ! empty( $sec['sub'] ) ) : ?>
					<p class="text-muted mx-auto mt-2" style="max-width:680px;"><?php echo esc_html( $sec['sub'] ); ?></p>
				<?php endif; ?>
			</div>

			<div class="row g-4 <?php echo 'local' === $sec['type'] ? 'justify-content-center' : ''; ?>">
				<?php foreach ( $sec['items'] as $it ) : ?>

					<?php if ( 'local' === $sec['type'] ) : ?>
						<div class="col-md-6">
							<div class="yfg-pf-local">
								<span class="yfg-pf-tag"><?php echo esc_html( $it['tag'] ); ?></span>
								<h3 class="yfg-pf-card__title mt-2"><?php echo esc_html( $it['title'] ); ?></h3>
								<p class="yfg-pf-card__desc mt-1 mb-0">Google Business Profile insights - calls, website clicks &amp; interactions.</p>
								<div class="yfg-pf-local__shots">
									<?php foreach ( $it['imgs'] as $im ) : $u = esc_url( $pf . $im ); ?>
										<div class="yfg-pf-shot" data-yfg-lightbox="<?php echo $u; ?>">
											<img src="<?php echo $u; ?>" loading="lazy" alt="<?php echo esc_attr( $it['title'] ); ?> - Google Business Profile result">
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php else : $u = esc_url( $pf . $it['img'] ); ?>
						<div class="col-md-6 col-lg-4">
							<div class="yfg-pf-card">
								<div class="yfg-pf-card__media" data-yfg-lightbox="<?php echo $u; ?>">
									<img src="<?php echo $u; ?>" loading="lazy" alt="<?php echo esc_attr( $it['title'] ); ?> - project result">
								</div>
								<div class="yfg-pf-card__body">
									<span class="yfg-pf-tag"><?php echo esc_html( $it['tag'] ); ?></span>
									<h3 class="yfg-pf-card__title"><?php echo esc_html( $it['title'] ); ?></h3>
									<?php if ( ! empty( $it['desc'] ) ) : ?>
										<p class="yfg-pf-card__desc"><?php echo esc_html( $it['desc'] ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endforeach; ?>

<!-- ============ WEBSITE DESIGN & DEVELOPMENT ============ -->
<?php
$yfg_web    = YFG_URI . '/assets/images/web-dev-portfolio/';
$yfg_webdev = array(
	array( 'icon' => 'bi-tools',       'title' => 'Auto Repair Websites',         'folder' => 'auto-repairs',      'files' => array( 'auto-repairs1.webp', 'auto-repairs2.webp', 'auto-repairs3.webp', 'auto-repairs4.webp', 'auto-repairs5.webp', 'auto-repairs6.webp' ) ),
	array( 'icon' => 'bi-heart-pulse', 'title' => 'Doctor & Clinic Websites',      'folder' => 'doctors-portfolio', 'files' => array( 'doctors-portfolio1.webp', 'doctors-portfolio2.webp', 'doctors-portfolio3.webp', 'doctors-portfolio4.webp', 'doctors-portfolio5.webp', 'doctors-portfolio6.webp' ) ),
	array( 'icon' => 'bi-building',     'title' => 'Hotel & Hospitality Websites',  'folder' => 'hotels',            'files' => array( 'hotels-portfolio1.webp', 'hotels-portfolio2.webp', 'hotels-portfolio3.webp' ) ),
	array( 'icon' => 'bi-bank',         'title' => 'Law Firm Websites',             'folder' => 'lawyer',            'files' => array( 'lawyer-portfolio1.webp', 'lawyer-portfolio2.webp', 'lawyer-portfolio3.webp' ) ),
	array( 'icon' => 'bi-airplane',     'title' => 'Travel & Tourism Websites',     'folder' => 'travel',            'files' => array( 'travel-portfolio1.webp', 'travel-portfolio2.webp', 'travel-portfolio3.webp', 'travel-portfolio4.webp' ) ),
	array( 'icon' => 'bi-window-stack', 'title' => 'More Website Projects',         'folder' => 'web-development',    'files' => array( 'portfolio1.webp', 'portfolio2.webp', 'portfolio3.webp', 'portfolio4.webp', 'portfolio5.webp', 'portfolio6.webp', 'portfolio7.webp', 'portfolio8.webp' ) ),
);
?>
<section class="yfg-section yfg-section--light" id="web-development" data-cat="web-development">
	<div class="container">
		<div class="text-center mb-5">
			<span class="yfg-accent"></span>
			<h2 class="yfg-section-title">Website Design &amp; Development</h2>
			<p class="text-muted mx-auto mt-2" style="max-width:680px;">Fast, conversion-focused websites we&rsquo;ve designed and built across industries. Hover to preview the full page, or click to view.</p>
		</div>

		<?php foreach ( $yfg_webdev as $g ) : ?>
			<div class="yfg-web-group">
				<h3 class="yfg-web-group__title"><i class="bi <?php echo esc_attr( $g['icon'] ); ?>"></i> <?php echo esc_html( $g['title'] ); ?></h3>
				<div class="row g-4">
					<?php foreach ( $g['files'] as $file ) : $u = esc_url( $yfg_web . $g['folder'] . '/' . $file ); ?>
						<div class="col-md-6 col-lg-4">
							<div class="yfg-web-shot" data-yfg-lightbox="<?php echo $u; ?>">
								<img src="<?php echo $u; ?>" loading="lazy" alt="<?php echo esc_attr( $g['title'] ); ?> — website designed and developed by Your Firm Growth">
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<!-- ============ FINAL CTA ============ -->
<section class="yfg-section">
	<div class="container">
		<div class="text-center text-white" style="background: linear-gradient(135deg, #03182e 0%, #052f57 50%, #04505c 100%); border-radius: 24px; padding: 4rem 2rem; box-shadow: 0 15px 40px rgba(3,24,46,.15);">
			<h2 class="h1 mb-3 text-white" style="font-weight:800; color:#fff !important;">Want Results Like These For Your Business?</h2>
			<p class="mx-auto mb-4" style="max-width:680px; color:rgba(255,255,255,.9); font-size:1.05rem;">Tell us your goals and we&rsquo;ll build the strategy to reach them.</p>
			<button type="button" class="btn btn-light btn-lg fw-semibold px-4 py-3" style="border-radius:8px;" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Book a Free Growth Strategy Call &rarr;</button> <?php yfg_whatsapp_button( 'ms-2' ); ?>
		</div>
	</div>
</section>

<!-- Lightbox -->
<div class="yfg-lightbox" id="yfgLightbox" aria-hidden="true">
	<span class="yfg-lightbox__close" aria-label="Close">&times;</span>
	<img src="" alt="Portfolio screenshot enlarged">
</div>

<script>
( function () {
	var lb = document.getElementById( 'yfgLightbox' );
	if ( ! lb ) { return; }
	var img = lb.querySelector( 'img' );

	document.querySelectorAll( '[data-yfg-lightbox]' ).forEach( function ( el ) {
		el.addEventListener( 'click', function () {
			img.src = el.getAttribute( 'data-yfg-lightbox' );
			lb.classList.add( 'is-open' );
			document.body.style.overflow = 'hidden';
		} );
	} );

	function closeLb() {
		lb.classList.remove( 'is-open' );
		img.src = '';
		document.body.style.overflow = '';
	}
	lb.addEventListener( 'click', function ( e ) { if ( e.target !== img ) { closeLb(); } } );
	document.addEventListener( 'keydown', function ( e ) { if ( 'Escape' === e.key ) { closeLb(); } } );
} )();

// Category filter — show only the selected portfolio type.
( function () {
	var bar = document.getElementById( 'yfgPfFilter' );
	if ( ! bar ) { return; }
	var btns     = bar.querySelectorAll( '.yfg-pf-filter__btn' );
	var sections = document.querySelectorAll( '.yfg-section[data-cat]' );

	function yfgApplyFilter( f, scroll ) {
		btns.forEach( function ( x ) { x.classList.toggle( 'is-active', x.getAttribute( 'data-filter' ) === f ); } );

		sections.forEach( function ( s ) {
			s.style.display = ( 'all' === f || s.getAttribute( 'data-cat' ) === f ) ? '' : 'none';
		} );

		if ( scroll ) {
			// Bring the filter bar (and results below it) up under the header.
			window.scrollTo( { top: bar.offsetTop - 58, behavior: 'smooth' } );
		}
	}

	btns.forEach( function ( b ) {
		b.addEventListener( 'click', function () {
			yfgApplyFilter( b.getAttribute( 'data-filter' ), true );
		} );
	} );

	// Deep link support — /portfolio/#organic, /portfolio/#web-development waghera
	// se seedha us category ka filter khul jata hai (service pages ke "See More" buttons).
	var yfgHash = window.location.hash.replace( '#', '' );
	if ( yfgHash && bar.querySelector( '[data-filter="' + yfgHash + '"]' ) ) {
		yfgApplyFilter( yfgHash, true );
	}
} )();
</script>

<?php
get_footer();
