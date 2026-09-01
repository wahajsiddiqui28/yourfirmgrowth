<?php
/**
 * Template Name: Reviews
 *
 * Dedicated reviews page — saare reviews grid cards mein (custom-reviews-widget plugin).
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<style>
/* Scoped .rv-* classes — koi generic .btn/global rule nahi (header buttons safe). */
.rv-hero{position:relative;overflow:hidden;padding:72px 0 60px;background:linear-gradient(135deg,#041D3A 0%,#072F58 55%,#0A3D5C 100%);color:#fff;text-align:center}
.rv-hero::before{content:'';position:absolute;top:-120px;right:-90px;width:520px;height:520px;background:radial-gradient(circle,rgba(4,112,125,.22) 0%,transparent 70%);pointer-events:none}
.rv-hero::after{content:'';position:absolute;bottom:-140px;left:-90px;width:480px;height:480px;background:radial-gradient(circle,rgba(5,47,87,.35) 0%,transparent 70%);pointer-events:none}
.rv-hero__in{position:relative;z-index:1;max-width:760px;margin:0 auto;padding:0 24px}
.rv-eyebrow{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.10);border:1px solid rgba(255,255,255,.20);color:#cfe9ec;font-size:.78rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;padding:8px 16px;border-radius:999px;margin-bottom:20px}
.rv-hero__title{font-size:clamp(2rem,4.6vw,3rem);line-height:1.12;font-weight:800;margin:0 0 14px;color:#fff}
.rv-hero__title span{color:#3fd0c9}
.rv-hero__sub{font-size:1.05rem;line-height:1.7;color:#c7d6e5;margin:0}
.rv-section{background:#F4F7FB;padding:46px 0 66px}
.rv-section > .rv-container{width:100%;max-width:1200px;margin:0 auto;padding:0 24px}
@media(max-width:600px){.rv-hero{padding:54px 0 46px}.rv-section{padding:30px 0 48px}}
</style>

<main class="rv-page">

	<section class="rv-hero">
		<div class="rv-hero__in">
			<span class="rv-eyebrow"><i class="bi bi-star-fill"></i> Client Reviews</span>
			<h1 class="rv-hero__title">What Our <span>Clients Say</span></h1>
			<p class="rv-hero__sub">Real, verified reviews from businesses we&rsquo;ve helped grow &mdash; across SEO, web design, social media and dedicated remote teams.</p>
		</div>
	</section>

	<section class="rv-section">
		<div class="rv-container">
			<?php echo do_shortcode( '[firm_reviews layout="grid" limit="100"]' ); ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
