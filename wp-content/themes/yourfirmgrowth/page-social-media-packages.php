<?php
/**
 * Template Name: Social Media Packages
 *
 * @package YourFirmGrowth
 */

get_header();

// $yfg_contact_url = home_url( '/contact/?service=RemoteTeams' );
?>


<style>

/* ─── BRAND TOKENS (exact logo colors) ─── */
:root {
  --navy:       #072F58;
  --navy-deep:  #041D3A;
  --navy-mid:   #0D3D72;
  --teal:       #038791;
  --teal-dark:  #026870;
  --teal-light: #E0F5F5;
  --teal-mid:   #A8E3E6;
  --white:      #FFFFFF;
  --bg:         #F4F7FB;
  --bg-alt:     #EBF0F7;
  --text:       #0E1C30;
  --muted:      #556070;
  --border:     #D6E0EE;
  --amber:      #F59E0B;
  --amber-bg:   #FFFBEB;
  --red-light:  #FEF2F2;
  --shadow-sm:  0 2px 8px rgba(7,47,88,.08);
  --shadow-md:  0 8px 32px rgba(7,47,88,.13);
  --shadow-lg:  0 20px 60px rgba(7,47,88,.18);
  --radius:     12px;
  --radius-lg:  20px;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body {
  /* font-family: 'Inter', system-ui, sans-serif; */
  font-size: 16px; line-height: 1.7;
  color: var(--text); background: var(--white);
  -webkit-font-smoothing: antialiased;
}
h1,h2,h3,h4 {
  font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
  font-weight: 700; line-height: 1.2; color: var(--navy);
}
/* p { margin-bottom: 1rem; }
p:last-child { margin-bottom: 0; }
a { color: var(--teal-dark); text-decoration: none; }
a:hover { text-decoration: underline; }
ul { list-style: none; } */
/* img { max-width: 100%; height: auto; display: block; } */

/* .container { width: 100%; max-width: 1160px; margin: 0 auto; padding: 0 24px; } */
.section { padding: 88px 0; }
.section--alt { background: var(--bg); }
.section--dark { background: linear-gradient(135deg, var(--navy-deep) 0%, var(--navy) 100%); }

.eyebrow {
  display: inline-flex; align-items: center; gap: 7px;
  background: rgba(3,135,145,.12); border: 1px solid rgba(3,135,145,.3);
  border-radius: 50px; padding: 5px 14px;
  font-size: .73rem; font-weight: 700; letter-spacing: .1em;
  text-transform: uppercase; color: var(--teal); margin-bottom: 14px;
}
.eyebrow--light {
  background: rgba(3,135,145,.2); border-color: rgba(3,135,145,.4); color: var(--teal-mid);
}
.section-title { font-size: clamp(1.7rem, 2.8vw, 2.4rem); margin-bottom: 14px; }
.section-title--white { color: var(--white); }
.section-lead { font-size: 1.02rem; color: var(--muted); max-width: 580px; line-height: 1.7; }
.section-lead--white { color: rgba(255,255,255,.7); }
.section-header { margin-bottom: 52px; }
.section-header--center { text-align: center; }
.section-header--center .section-lead { margin: 0 auto; }

/* BUTTONS */
.btn:not(.site-header__cta) {
  display: inline-flex; align-items: center; justify-content: center; gap: 8px;
  font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700;
  border-radius: 50px; transition: all .22s ease;
  cursor: pointer; text-decoration: none; border: none; white-space: nowrap;
}
.btn--teal {
  background: linear-gradient(135deg, var(--teal) 0%, var(--teal-dark) 100%);
  color: var(--white); padding: 14px 30px; font-size: .95rem;
  box-shadow: 0 4px 18px rgba(3,135,145,.4);
}
.btn--teal:hover {
  transform: translateY(-2px); box-shadow: 0 8px 28px rgba(3,135,145,.5);
  color: var(--white); text-decoration: none;
}
.btn--teal-lg { padding: 17px 38px; font-size: 1.05rem; }
.btn--white {
  background: var(--white); color: var(--navy);
  padding: 14px 30px; font-size: .95rem;
  box-shadow: 0 4px 16px rgba(7,47,88,.2);
}
.btn--white:hover {
  background: var(--teal-light); color: var(--navy);
  text-decoration: none; transform: translateY(-2px);
}
.btn--outline-white {
  background: transparent; color: var(--white);
  padding: 14px 30px; font-size: .95rem;
  border: 2px solid rgba(255,255,255,.4);
}
.btn--outline-white:hover {
  border-color: var(--teal); color: var(--teal);
  text-decoration: none;
}
.btn--outline-navy {
  background: transparent; color: var(--navy);
  padding: 12px 26px; font-size: .9rem;
  border: 2px solid var(--border);
}
.btn--outline-navy:hover {
  border-color: var(--teal); color: var(--teal);
  text-decoration: none;
}

/* ── STICKY BAR ── */
.sticky-bar {
  position: fixed; bottom: 0; left: 0; right: 0; z-index: 999;
  background: var(--navy); border-top: 2px solid var(--teal);
  padding: 14px 24px;
  display: flex; align-items: center; justify-content: space-between;
  gap: 16px; transform: translateY(100%); transition: transform .35s ease;
  box-shadow: 0 -4px 24px rgba(7,47,88,.3);
}
.sticky-bar.is-visible { transform: translateY(0); }
.sticky-bar__text {
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 700; font-size: .95rem; color: var(--white);
}
.sticky-bar__text span { color: var(--teal); }
.sticky-bar__sub { font-size: .78rem; color: rgba(255,255,255,.5); font-weight: 400; }
.sticky-bar__cta { display: flex; gap: 10px; align-items: center; flex-shrink: 0; }
.sticky-bar__close {
  background: none; border: none; cursor: pointer; padding: 4px;
  color: rgba(255,255,255,.4); font-size: 1.2rem; line-height: 1;
}
.sticky-bar__close:hover { color: var(--white); }

/* ── HERO ── */
.hero {
  position: relative; overflow: hidden;
  padding: 100px 0 90px;
  background: linear-gradient(135deg, var(--navy-deep) 0%, var(--navy) 55%, #0A3D5C 100%);
}
.hero__bg {
  position: absolute; inset: 0; z-index: 0;
  background-image: url('<?php echo esc_url( YFG_URI . '/assets/images/social-media-packages/social-media-packages-hero-bg.webp' ); ?>');
  background-size: cover; background-position: center;
  opacity: .09;
}
.hero::before {
  content: ''; position: absolute; top: -100px; right: -80px;
  width: 550px; height: 550px;
  background: radial-gradient(circle, rgba(3,135,145,.18) 0%, transparent 70%);
  pointer-events: none; z-index: 1;
}
.hero__inner { position: relative; z-index: 2; max-width: 760px; }
.hero__title {
  font-size: clamp(2.3rem, 5vw, 3.6rem);
  font-weight: 800; color: var(--white);
  line-height: 1.08; letter-spacing: -.02em; margin-bottom: 20px;
}
.hero__title .hl {
  background: linear-gradient(90deg, var(--teal) 0%, #50D8DF 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.hero__answer {
  background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.12);
  border-left: 3px solid var(--teal); border-radius: 0 8px 8px 0;
  padding: 14px 18px; margin-bottom: 32px;
  font-size: .92rem; color: rgba(255,255,255,.82); line-height: 1.65;
  max-width: 680px;
}
.hero__answer strong { color: var(--white); }
.hero__ctas { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin-bottom: 20px; }
.hero__note { font-size: .78rem; color: rgba(255,255,255,.38); }
.hero__image-card {
  position: absolute; right: 0; top: 50%; transform: translateY(-50%);
  width: 480px; height: 340px; border-radius: var(--radius-lg);
  overflow: hidden; box-shadow: var(--shadow-lg);
  z-index: 2;
}
.hero__image-card img { width: 100%; height: 100%; object-fit: cover; }
.hero__image-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(7,47,88,.25) 0%, transparent 60%);
}

/* ── TRUST BAR ── */
.trust-bar { background: var(--navy-deep); border-bottom: 1px solid rgba(255,255,255,.06); padding: 16px 0; }
.trust-bar__inner { display: flex; flex-wrap: wrap; align-items: center; justify-content: center; }
.trust-item {
  display: flex; align-items: center; gap: 8px;
  font-size: .8rem; font-weight: 600; color: rgba(255,255,255,.65);
  padding: 5px 20px; border-right: 1px solid rgba(255,255,255,.09);
}
.trust-item:last-child { border-right: none; }
.trust-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--teal); flex-shrink: 0; }

/* ── STATS BAR ── */
.stats-bar {
  background: var(--white); border-bottom: 1px solid var(--border);
  padding: 40px 0;
}
.stats-row {
  display: grid; grid-template-columns: repeat(4,1fr); gap: 0;
}
.stat-item {
  text-align: center; padding: 12px 20px;
  border-right: 1px solid var(--border);
}
.stat-item:last-child { border-right: none; }
.stat-num {
  font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800;
  font-size: 2.4rem; line-height: 1; letter-spacing: -.03em; color: var(--navy);
}
.stat-num span { color: var(--teal); }
.stat-label { font-size: .8rem; color: var(--muted); margin-top: 4px; font-weight: 500; }

/* ── INTRO SPLIT ── */
.intro-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
.intro-image {
  border-radius: var(--radius-lg); overflow: hidden;
  box-shadow: var(--shadow-lg); position: relative;
}
.intro-image img { width: 100%; height: 420px; object-fit: cover; }
.intro-badge {
  position: absolute; bottom: 24px; left: 24px;
  background: var(--white); border-radius: var(--radius);
  padding: 14px 18px; box-shadow: var(--shadow-md);
  display: flex; align-items: center; gap: 12px;
}
.intro-badge__dot { width: 10px; height: 10px; border-radius: 50%; background: #10B981; animation: pulse 2s infinite; }
@keyframes pulse { 0%,100%{box-shadow:0 0 0 0 rgba(16,185,129,.4)} 50%{box-shadow:0 0 0 6px rgba(16,185,129,0)} }
.intro-badge__text strong { display: block; font-size: .82rem; font-weight: 700; color: var(--navy); }
.intro-badge__text span { font-size: .74rem; color: var(--muted); }

/* ── PACKAGES ── */
.packages-grid {
  display: grid; grid-template-columns: repeat(4,1fr);
  gap: 20px; align-items: start;
}
.pkg-card {
  background: var(--white); border: 1.5px solid var(--border);
  border-radius: var(--radius-lg); padding: 32px 26px;
  position: relative; box-shadow: var(--shadow-sm);
  transition: box-shadow .25s, transform .25s;
}
.pkg-card:hover { box-shadow: var(--shadow-md); transform: translateY(-4px); }
.pkg-card--featured {
  background: linear-gradient(155deg, var(--navy) 0%, #0A3D5C 100%);
  border-color: var(--teal); box-shadow: 0 0 0 1px var(--teal), var(--shadow-lg);
  transform: translateY(-10px);
}
.pkg-card--featured:hover { transform: translateY(-14px); }
.pkg-badge {
  position: absolute; top: -14px; left: 50%; transform: translateX(-50%);
  background: linear-gradient(90deg, var(--teal) 0%, var(--teal-dark) 100%);
  color: var(--white); font-size: .68rem; font-weight: 700;
  letter-spacing: .1em; text-transform: uppercase;
  padding: 5px 16px; border-radius: 50px; white-space: nowrap;
}
.pkg-name {
  font-size: .72rem; font-weight: 700; letter-spacing: .12em;
  text-transform: uppercase; color: var(--teal); margin-bottom: 8px;
}
.pkg-card--featured .pkg-name { color: var(--teal-mid); }
.pkg-price { margin-bottom: 4px; }
.pkg-price__amount {
  font-family: 'Plus Jakarta Sans', sans-serif; font-size: 2.6rem;
  font-weight: 800; color: var(--navy); letter-spacing: -.03em; line-height: 1;
}
.pkg-card--featured .pkg-price__amount { color: var(--white); }
.pkg-price__period { font-size: .82rem; color: var(--muted); }
.pkg-card--featured .pkg-price__period { color: rgba(255,255,255,.55); }
.pkg-tagline {
  font-size: .8rem; color: var(--muted); line-height: 1.5;
  margin: 12px 0 20px; padding-bottom: 20px; border-bottom: 1px solid var(--border);
}
.pkg-card--featured .pkg-tagline { color: rgba(255,255,255,.55); border-bottom-color: rgba(255,255,255,.12); }
.pkg-features { display: flex; flex-direction: column; gap: 9px; margin-bottom: 24px; }
.pkg-feature {
  display: flex; align-items: flex-start; gap: 9px;
  font-size: .82rem; color: var(--text); line-height: 1.45;
}
.pkg-card--featured .pkg-feature { color: rgba(255,255,255,.85); }
.pkg-check {
  width: 17px; height: 17px; border-radius: 50%;
  background: var(--teal-light);
  display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px;
}
.pkg-card--featured .pkg-check { background: rgba(3,135,145,.25); }
.pkg-check svg { width: 9px; height: 9px; stroke: var(--teal); stroke-width: 2.8; fill: none; }
.pkg-card--featured .pkg-check svg { stroke: #50D8DF; }
.pkg-dash {
  width: 17px; height: 17px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px;
}
.pkg-dash::after { content: '—'; font-size: .6rem; color: var(--border); }
.pkg-cta {
  display: block; text-align: center; padding: 13px 16px;
  border-radius: 50px; font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 700; font-size: .875rem; transition: all .22s; text-decoration: none;
}
.pkg-cta--default {
  background: var(--bg); color: var(--navy); border: 1.5px solid var(--border);
}
.pkg-cta--default:hover { background: var(--teal-light); border-color: var(--teal); color: var(--navy); text-decoration: none; }
.pkg-cta--featured {
  background: linear-gradient(135deg, var(--teal) 0%, var(--teal-dark) 100%);
  color: var(--white); box-shadow: 0 4px 16px rgba(3,135,145,.45);
}
.pkg-cta--featured:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(3,135,145,.55); color: var(--white); text-decoration: none; }
.pkg-note { text-align: center; font-size: .78rem; color: var(--muted); margin-top: 28px; }

/* ── INLINE CTA ── */
.inline-cta {
  background: linear-gradient(135deg, var(--navy) 0%, #0A3D5C 100%);
  border-radius: var(--radius-lg); padding: 48px 52px;
  display: flex; align-items: center; justify-content: space-between;
  gap: 32px; position: relative; overflow: hidden;
}
.inline-cta::before {
  content: ''; position: absolute; right: -60px; top: -60px;
  width: 280px; height: 280px;
  background: radial-gradient(circle, rgba(3,135,145,.2) 0%, transparent 70%);
  pointer-events: none;
}
.inline-cta__text h3 { font-size: 1.6rem; color: var(--white); margin-bottom: 8px; }
.inline-cta__text p { color: rgba(255,255,255,.65); font-size: .9rem; max-width: 460px; }
.inline-cta__btns { display: flex; gap: 12px; flex-shrink: 0; flex-wrap: wrap; }

/* ── WHAT'S INCLUDED ── */
.included-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 22px; }
.included-card {
  background: var(--white); border: 1.5px solid var(--border);
  border-top: 3px solid var(--teal); border-radius: var(--radius);
  padding: 28px 24px; box-shadow: var(--shadow-sm);
}
.included-icon {
  width: 44px; height: 44px; background: var(--teal-light);
  border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: 14px;
}
.included-icon svg { width: 22px; height: 22px; stroke: var(--teal); stroke-width: 1.8; fill: none; }
.included-title { font-size: .95rem; font-weight: 700; margin-bottom: 8px; color: var(--navy); }
.included-text { font-size: .85rem; color: var(--muted); line-height: 1.65; }

/* ── PLATFORMS ── */
.platforms-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; }
.platform-card {
  display: flex; gap: 14px; align-items: flex-start;
  background: var(--white); border: 1.5px solid var(--border);
  border-radius: var(--radius); padding: 22px 18px;
  transition: border-color .2s, box-shadow .2s;
}
.platform-card:hover { border-color: var(--teal); box-shadow: var(--shadow-sm); }
.platform-icon {
  width: 40px; height: 40px; border-radius: 9px;
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.platform-name { font-size: .9rem; font-weight: 700; color: var(--navy); margin-bottom: 4px; }
.platform-desc { font-size: .8rem; color: var(--muted); line-height: 1.55; }

/* ── COMPARE TABLE ── */
.compare-wrap { border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm); }
.compare-table { width: 100%; border-collapse: collapse; font-size: .875rem; }
.compare-table thead { background: var(--navy); }
.compare-table thead th {
  padding: 16px 20px; font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 700; font-size: .82rem; text-align: left; color: rgba(255,255,255,.8);
}
.compare-table thead th:nth-child(2) { background: rgba(3,135,145,.18); color: var(--teal-mid); }
.compare-table tbody tr { border-bottom: 1px solid var(--border); background: var(--white); }
.compare-table tbody tr:hover { background: var(--bg); }
.compare-table tbody tr:last-child { border-bottom: none; }
.compare-table td { padding: 13px 20px; vertical-align: middle; color: var(--text); }
.compare-table td:nth-child(2) { background: rgba(224,245,245,.4); }
.yes { color: var(--teal); font-weight: 700; }
.no { color: #CBD5E1; }
.warn { color: var(--amber); font-size: .78rem; font-weight: 600; }

/* ── STEPS ── */
.steps-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 32px; position: relative; }
.steps-grid::before {
  content: ''; position: absolute; top: 36px;
  left: calc(16.67% + 18px); right: calc(16.67% + 18px);
  height: 2px; background: linear-gradient(90deg, var(--teal) 0%, var(--teal-dark) 100%); opacity: .25;
}
.step-card { text-align: center; }
.step-num {
  width: 72px; height: 72px; margin: 0 auto 18px;
  background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
  border-radius: 50%; display: flex; align-items: center; justify-content: center;
  font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.5rem; font-weight: 800; color: var(--teal);
  border: 3px solid rgba(3,135,145,.25); position: relative; z-index: 1;
}
.step-title { font-size: 1.02rem; font-weight: 700; margin-bottom: 8px; color: var(--navy); }
.step-desc { font-size: .85rem; color: var(--muted); line-height: 1.65; }

/* ── GDPR BLOCK ── */
.gdpr-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: center; }
.gdpr-badges { display: flex; flex-direction: column; gap: 14px; }
.gdpr-badge {
  display: flex; align-items: flex-start; gap: 12px;
  background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.1);
  border-left: 3px solid var(--teal); border-radius: 0 8px 8px 0; padding: 14px 16px;
}
.gdpr-badge__icon { font-size: 1.3rem; line-height: 1; flex-shrink: 0; }
.gdpr-badge__title { display: block; font-size: .84rem; font-weight: 700; color: var(--white); margin-bottom: 3px; }
.gdpr-badge__desc { font-size: .78rem; color: rgba(255,255,255,.5); line-height: 1.5; }

/* ── IMAGE TESTIMONIAL ── */
.social-proof {
  background: var(--bg-alt); border-radius: var(--radius-lg);
  /* display: grid; grid-template-columns: 1fr 1fr; gap: 0; */
  overflow: hidden; box-shadow: var(--shadow-md);
}
.social-proof__img img { width: 100%; height: 100%; object-fit: cover; min-height: 300px; }
.social-proof__content { padding: 48px 44px; display: flex; flex-direction: column; justify-content: center; }
.social-proof__quote {
  font-size: 1.05rem; font-style: italic; color: var(--text);
  line-height: 1.7; margin-bottom: 20px;
  border-left: 3px solid var(--teal); padding-left: 18px;
}
.social-proof__author strong { font-size: .9rem; font-weight: 700; color: var(--navy); }
.social-proof__author span { font-size: .8rem; color: var(--muted); }

/* ── FAQ ── */
.faq-wrap { max-width: 780px; margin: 0 auto; }
.faq-item { border-bottom: 1px solid var(--border); }
.faq-item:first-child { border-top: 1px solid var(--border); }
.faq-btn {
  width: 100%; display: flex; align-items: center; justify-content: space-between; gap: 12px;
  padding: 20px 0; background: none; border: none; cursor: pointer; text-align: left;
  font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: .93rem;
  color: var(--navy); transition: color .2s;
}
.faq-btn:hover, .faq-btn.open { color: var(--teal); }
.faq-icon {
  width: 28px; height: 28px; background: var(--bg); border-radius: 50%;
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
  transition: background .2s, transform .25s;
}
.faq-btn.open .faq-icon { background: var(--teal-light); transform: rotate(45deg); }
.faq-icon svg { width: 13px; height: 13px; stroke: var(--muted); stroke-width: 2.5; fill: none; }
.faq-btn.open .faq-icon svg { stroke: var(--teal); }
.faq-body { display: none; padding-bottom: 18px; font-size: .88rem; color: var(--muted); line-height: 1.7; }
.faq-body.open { display: block; }

/* ── FINAL CTA ── */
.cta-final {
  padding: 100px 0; text-align: center;
  background: linear-gradient(135deg, var(--navy-deep) 0%, var(--navy) 50%, #0A3D5C 100%);
  position: relative; overflow: hidden;
}
.cta-final::before {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse 70% 60% at 50% 110%, rgba(3,135,145,.18), transparent);
  pointer-events: none;
}
.cta-final__inner { position: relative; z-index: 1; max-width: 600px; margin: 0 auto; }
.cta-final__title {
  font-size: clamp(2rem,4vw,2.9rem); font-weight: 800; color: var(--white);
  letter-spacing: -.02em; margin-bottom: 14px; line-height: 1.15;
}
.cta-final__lead { font-size: 1.02rem; color: rgba(255,255,255,.68); margin-bottom: 40px; line-height: 1.65; }
.cta-final__btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
.cta-final__note { font-size: .76rem; color: rgba(255,255,255,.3); margin-top: 18px; }

/* ── FOOTER ── */
/* .footer { background: var(--navy-deep); padding: 30px 0; border-top: 1px solid rgba(255,255,255,.06); }
.footer__inner { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
.footer__logo img { height: 36px; width: auto; }
.footer__links { display: flex; gap: 22px; }
.footer__links a { font-size: .78rem; color: rgba(255,255,255,.4); }
.footer__links a:hover { color: var(--teal); text-decoration: none; }
.footer__copy { font-size: .76rem; color: rgba(255,255,255,.28); } */

/* ── RESPONSIVE ── */
@media (max-width: 1100px) {
  .hero__image-card { display: none; }
  .packages-grid { grid-template-columns: repeat(2,1fr); }
  .pkg-card--featured { transform: none; }
  .pkg-card--featured:hover { transform: translateY(-4px); }
  .intro-grid, .gdpr-grid { grid-template-columns: 1fr; gap: 36px; }
  .social-proof { grid-template-columns: 1fr; }
  .social-proof__img { height: 260px; }
}
@media (max-width: 768px) {
  .section { padding: 56px 0; }
  .nav__links { display: none; }
  .hero { padding: 64px 0 60px; }
  .hero__ctas { flex-direction: column; align-items: flex-start; }
  .stats-row { grid-template-columns: repeat(2,1fr); }
  .stat-item:nth-child(2) { border-right: none; }
  .packages-grid { grid-template-columns: 1fr; max-width: 400px; margin: 0 auto; }
  .included-grid, .platforms-grid, .steps-grid { grid-template-columns: 1fr; }
  .steps-grid::before { display: none; }
  .trust-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,.07); width: 100%; justify-content: center; }
  .inline-cta { flex-direction: column; padding: 32px 28px; text-align: center; }
  .inline-cta__text p { max-width: none; }
  .footer__inner { flex-direction: column; align-items: flex-start; }
  .compare-table { font-size: .76rem; }
  .compare-table th, .compare-table td { padding: 10px 12px; }
  .sticky-bar { flex-direction: column; gap: 10px; padding: 16px; text-align: center; }
}
</style>
<!-- ═══ STICKY BAR ═══ -->
<div class="sticky-bar" id="stickyBar">
  <div>
    <div class="sticky-bar__text">Ready to <span>grow on social media?</span></div>
    <div class="sticky-bar__sub">Plans from 99/mo &nbsp;·&nbsp; No setup fee &nbsp;·&nbsp; Reply in 1 business day</div>
  </div>
  <div class="sticky-bar__cta">
    <a href="/contact/" class="btn btn--teal">Get Free Proposal</a>
    <button class="sticky-bar__close" onclick="document.getElementById('stickyBar').style.display='none'">&#215;</button>
  </div>
</div>


<!-- ═══ HERO ═══ -->
<section class="hero">
  <div class="hero__bg"></div>
  <div class="container" style="display:grid;grid-template-columns:1fr 480px;gap:48px;align-items:center;position:relative;z-index:2;">
    <div class="hero__inner">
      <div class="eyebrow eyebrow--light">
        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 1l1 2.5 2.5.4-1.8 1.8.4 2.5L5 7 2.9 8.2l.4-2.5L1.5 3.9l2.5-.4z"/></svg>
        Social Media Marketing Packages
      </div>
      <h1 class="hero__title">
        Social Media <span class="hl">Management</span><br>That Grows Your Brand
      </h1>
      <div class="hero__answer">
        <strong>What are YFG&rsquo;s social media marketing packages?</strong><br>
        Your Firm Growth offers social media marketing packages covering content creation, scheduling, community management, and paid ad management across Facebook, Instagram, LinkedIn, TikTok, and X. Plans start from 99 per month with no setup fee, full GDPR compliance, and dedicated management aligned to your time zone.
      </div>
      <div class="hero__ctas">
        <a href="/contact/" class="btn btn--teal btn--teal-lg">Get Your Free Proposal</a>
        <a href="#packages" class="btn btn--outline-white">View All Packages</a>
      </div>
      <p class="hero__note">No setup fee &nbsp;&middot;&nbsp; No annual contract &nbsp;&middot;&nbsp; Response within 1 business day</p>
    </div>
    <div class="hero__image-card">
      <img src="<?php echo esc_url( YFG_URI . '/assets/images/social-media-packages/social-media-packages-hero.webp' ); ?>" alt="Social media marketing team working together" loading="eager">
      <div class="hero__image-overlay"></div>
    </div>
  </div>
</section>

<!-- ═══ TRUST BAR ═══ -->
<div class="trust-bar">
  <div class="container">
    <div class="trust-bar__inner">
      <div class="trust-item"><span class="trust-dot"></span>UK, USA, Germany &amp; Europe</div>
      <div class="trust-item"><span class="trust-dot"></span>GDPR Compliant</div>
      <div class="trust-item"><span class="trust-dot"></span>No Setup Fee</div>
      <div class="trust-item"><span class="trust-dot"></span>No Annual Contract</div>
      <div class="trust-item"><span class="trust-dot"></span>Dedicated Account Manager</div>
      <div class="trust-item"><span class="trust-dot"></span>Full-Service Agency</div>
    </div>
  </div>
</div>

<!-- ═══ STATS BAR ═══ -->
<div class="stats-bar">
  <div class="container">
    <div class="stats-row">
      <div class="stat-item">
        <div class="stat-num">$<span>399</span></div>
        <div class="stat-label">Starting price / month</div>
      </div>
      <div class="stat-item">
        <div class="stat-num"><span>6</span></div>
        <div class="stat-label">Platforms managed</div>
      </div>
      <div class="stat-item">
        <div class="stat-num"><span>4</span></div>
        <div class="stat-label">Global markets served</div>
      </div>
      <div class="stat-item">
        <div class="stat-num"><span>/bin/sh</span></div>
        <div class="stat-label">Setup fees charged</div>
      </div>
    </div>
  </div>
</div>

<!-- ═══ INTRO ═══ -->
<section class="section">
  <div class="container">
    <div class="intro-grid">
      <div class="intro-image">
        <img src="<?php echo esc_url( YFG_URI . '/assets/images/social-media-packages/social-media-packages-intro.webp' ); ?>" alt="Digital marketing professional managing social media campaigns" loading="lazy">
        <div class="intro-badge">
          <span class="intro-badge__dot"></span>
          <div class="intro-badge__text">
            <strong>Actively managing campaigns</strong>
            <span>UK &middot; US &middot; DE &middot; EU</span>
          </div>
        </div>
      </div>
      <div>
        <span class="eyebrow">Why Outsource Social Media?</span>
        <h2 class="section-title">More Than Posting.<br>A Real Growth Strategy.</h2>
        <p>Running social media in-house takes more time than most businesses have. Between content planning, graphic design, scheduling, comment moderation, and paid campaign management, it quickly becomes a full-time role. Outsourcing to a specialist team gives you that time back while putting your brand in front of the right audiences.</p>
        <p>Your Firm Growth works with businesses across the UK, United States, Germany, and wider Europe. Our packages are built for multi-market realities: platform preferences vary by region, content tone shifts depending on your audience, and GDPR compliance is non-negotiable for any business with European customers.</p>
        <div style="display:flex;gap:12px;margin-top:20px;flex-wrap:wrap;">
          <a href="/contact/" class="btn btn--teal">Start With a Free Proposal</a>
          <a href="/services/" class="btn btn--outline-navy">All Services</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!--<section>-->
<!--  <div class="container">-->
<!--    <?php //echo do_shortcode('[firm_reviews source="all"]'); ?>-->
<!--  </div>-->
<!--</section>-->

<!-- ═══ PACKAGES ═══ -->
<section class="section section--alt" id="packages">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Pricing &amp; Plans</span>
      <h2 class="section-title">Social Media Marketing Packages</h2>
      <p class="section-lead">No setup fees. No annual contracts. Transparent pricing with every deliverable listed up front. All prices in USD.</p>
    </div>

    <div class="packages-grid">

      <!-- STARTER -->
      <div class="pkg-card">
        <div class="pkg-name">Starter</div>
        <div class="pkg-price">
          <span class="pkg-price__amount">99</span>
          <span class="pkg-price__period"> /mo</span>
        </div>
        <p class="pkg-tagline">New businesses establishing a social media presence.</p>
        <ul class="pkg-features">
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>2 platforms of your choice</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>12 posts per month</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Custom image posts &amp; graphics</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Hashtag research &amp; strategy</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Profile optimisation</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Monthly performance report</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>GDPR-compliant setup</span></li>
          <li class="pkg-feature"><span class="pkg-dash"></span><span style="color:var(--border)">Community management</span></li>
          <li class="pkg-feature"><span class="pkg-dash"></span><span style="color:var(--border)">Paid ad management</span></li>
        </ul>
        <a href="/contact/" class="pkg-cta pkg-cta--default">Get Started</a>
      </div>

      <!-- GROWTH (featured) -->
      <div class="pkg-card pkg-card--featured">
        <div class="pkg-badge">Most Popular</div>
        <div class="pkg-name">Growth</div>
        <div class="pkg-price">
          <span class="pkg-price__amount">49</span>
          <span class="pkg-price__period"> /mo</span>
        </div>
        <p class="pkg-tagline">Businesses ready to post consistently and reach new audiences.</p>
        <ul class="pkg-features">
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>3 platforms of your choice</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>20 posts per month</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Images + Reels / short-form video</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Custom branded graphics</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Community management (5 days/wk)</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Sponsored post &amp; follower ads</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Monthly report + strategy call</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>GDPR-compliant setup</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Email &amp; chat support</span></li>
        </ul>
        <a href="/contact/" class="pkg-cta pkg-cta--featured">Get Started</a>
      </div>

      <!-- SCALE -->
      <div class="pkg-card">
        <div class="pkg-name">Scale</div>
        <div class="pkg-price">
          <span class="pkg-price__amount">99</span>
          <span class="pkg-price__period"> /mo</span>
        </div>
        <p class="pkg-tagline">Established brands managing multiple platforms and paid campaigns.</p>
        <ul class="pkg-features">
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>5 platforms of your choice</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>30 posts per month</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Images, Reels, carousels &amp; video</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Full paid social campaign mgmt</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Advanced targeting &amp; A/B testing</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Community management (7 days/wk)</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Competitor monitoring</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Dedicated account manager</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Priority support</span></li>
        </ul>
        <a href="/contact/" class="pkg-cta pkg-cta--default">Get Started</a>
      </div>

      <!-- ENTERPRISE -->
      <div class="pkg-card">
        <div class="pkg-name">Enterprise</div>
        <div class="pkg-price">
          <span class="pkg-price__amount" style="font-size:1.9rem;letter-spacing:-.01em;">Custom</span>
        </div>
        <p class="pkg-tagline">Multi-market, multi-brand, or multi-language requirements.</p>
        <ul class="pkg-features">
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Custom platform mix</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Custom content volumes</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Multi-language content (UK/US/DE/EU)</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Full paid social management</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Full strategy &amp; creative direction</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Weekly strategy sessions</span></li>
          <li class="pkg-feature"><span class="pkg-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></span><span>Dedicated team &amp; account director</span></li>
        </ul>
        <a href="/contact/" class="pkg-cta pkg-cta--default">Request a Proposal</a>
      </div>

    </div>
    <p class="pkg-note">Ad spend billed separately &nbsp;&middot;&nbsp; 3-month initial term, then rolling monthly &nbsp;&middot;&nbsp; GBP / EUR pricing available on request</p>
  </div>
</section>

<!-- ═══ INLINE CTA 1 ═══ -->
<section class="section" style="padding:40px 0;">
  <div class="container">
    <div class="inline-cta">
      <div class="inline-cta__text">
        <h3>Not sure which package is right for you?</h3>
        <p>Tell us your goals, platforms, and budget. We will recommend the right plan and send you a first-month content strategy outline at no charge.</p>
      </div>
      <div class="inline-cta__btns">
        <a href="/contact/" class="btn btn--teal btn--teal-lg">Get a Free Recommendation</a>
        <a href="mailto:info@yourfirmgrowth.com" class="btn btn--outline-white">Email Us</a>
      </div>
    </div>
  </div>
</section>

<!-- ═══ WHAT'S INCLUDED ═══ -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Package Deliverables</span>
      <h2 class="section-title">What Every Package Includes</h2>
      <p class="section-lead">Every yourfirmgrowth.com package starts with a documented strategy, not with posting. Content is approved before it is scheduled. Reports map to business goals.</p>
    </div>
    <div class="included-grid">
      <div class="included-card">
        <div class="included-icon"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
        <h3 class="included-title">Content Strategy &amp; Planning</h3>
        <p class="included-text">We produce a monthly content calendar aligned to your objectives before a single post is created. You approve everything before it goes live.</p>
      </div>
      <div class="included-card">
        <div class="included-icon"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
        <h3 class="included-title">Original Content Creation</h3>
        <p class="included-text">Every post is created from scratch for your brand. No stock captions, no recycled templates. Copywriting, graphics, and short-form video all handled in-house.</p>
      </div>
      <div class="included-card">
        <div class="included-icon"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
        <h3 class="included-title">Community Management</h3>
        <p class="included-text">On Growth and Scale plans, our team monitors your accounts, responds to comments and messages, and flags anything requiring your attention.</p>
      </div>
      <div class="included-card">
        <div class="included-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3 class="included-title">Performance Reporting</h3>
        <p class="included-text">Monthly reports covering reach, impressions, engagement rate, follower growth, and where paid campaigns run, CPC and ROAS. Written in plain English.</p>
      </div>
      <div class="included-card">
        <div class="included-icon"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <h3 class="included-title">GDPR Compliance</h3>
        <p class="included-text">All content, paid targeting, data handling, and pixel configurations in our packages follow current GDPR requirements. Critical for UK and EU businesses.</p>
      </div>
      <div class="included-card">
        <div class="included-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg></div>
        <h3 class="included-title">Dedicated Account Support</h3>
        <p class="included-text">A named point of contact for questions, approvals, and strategy reviews. No shared inboxes. Scale and Enterprise plans include a dedicated account manager.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PLATFORMS ═══ -->
<section class="section section--alt">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Social Media Platform Coverage</span>
      <h2 class="section-title">Platforms We Manage</h2>
      <p class="section-lead">Choose the platforms your audience actually uses. Mix and match across all tiers.</p>
    </div>
    <div class="platforms-grid">
      <div class="platform-card">
        <div class="platform-icon" style="background:#EEF2FF;"><svg width="22" height="22" viewBox="0 0 24 24" fill="#1877F2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></div>
        <div><div class="platform-name">Facebook</div><p class="platform-desc">Largest network globally. Best for demographic-targeted paid advertising. Effective for both B2C and B2B brands.</p></div>
      </div>
      <div class="platform-card">
        <div class="platform-icon" style="background:#FFF0F7;"><svg width="22" height="22" viewBox="0 0 24 24"><defs><linearGradient id="ig" x1="0" y1="1" x2="1" y2="0"><stop offset="0%" stop-color="#F58529"/><stop offset="50%" stop-color="#DD2A7B"/><stop offset="100%" stop-color="#8134AF"/></linearGradient></defs><path fill="url(#ig)" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></div>
        <div><div class="platform-name">Instagram</div><p class="platform-desc">Ideal for product brands, hospitality, and retail. We handle feed posts, Stories, and Reels with consistent brand identity.</p></div>
      </div>
      <div class="platform-card">
        <div class="platform-icon" style="background:#EEF4FF;"><svg width="22" height="22" viewBox="0 0 24 24" fill="#0A66C2"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></div>
        <div><div class="platform-name">LinkedIn</div><p class="platform-desc">First-choice platform for B2B outreach and professional services. LinkedIn content demands a different register, and we write accordingly.</p></div>
      </div>
      <div class="platform-card">
        <div class="platform-icon" style="background:#FFF0F0;"><svg width="22" height="22" viewBox="0 0 24 24" fill="#000"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.27 8.27 0 004.84 1.56V6.79a4.85 4.85 0 01-1.07-.1z"/></svg></div>
        <div><div class="platform-name">TikTok</div><p class="platform-desc">Short-form video drives significant discovery for consumer brands. Platform-native content, not repurposed clips from other channels.</p></div>
      </div>
      <div class="platform-card">
        <div class="platform-icon" style="background:#F5F5F5;"><svg width="22" height="22" viewBox="0 0 24 24" fill="#000"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></div>
        <div><div class="platform-name">X (Twitter)</div><p class="platform-desc">Suits brands with a strong point of view or a customer base that expects real-time responses and industry conversation.</p></div>
      </div>
      <div class="platform-card">
        <div class="platform-icon" style="background:#FFF0F0;"><svg width="22" height="22" viewBox="0 0 24 24" fill="#FF0000"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></div>
        <div><div class="platform-name">YouTube</div><p class="platform-desc">For businesses investing in long-form content, demonstrations, or tutorials. Available on Scale and Enterprise plans.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ WHY YFG TABLE ═══ -->
<section class="section">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Why Choose Us</span>
      <h2 class="section-title">YFG vs Generic Agency vs In-House</h2>
      <p class="section-lead">Most agencies offer social media management. Few are built for multi-market, GDPR-compliant delivery across UK, US, and European audiences.</p>
    </div>
    <div class="compare-wrap">
      <table class="compare-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>Your Firm Growth</th>
            <th>Generic Agency</th>
            <th>In-House Team</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>GDPR-compliant management for UK &amp; EU</td><td><span class="yes">Yes</span></td><td><span class="warn">Rarely confirmed</span></td><td><span class="warn">Depends on training</span></td></tr>
          <tr><td>Multi-market content (UK, US, Germany)</td><td><span class="yes">Yes</span></td><td><span class="">Often single-market</span></td><td><span class="">Limited capacity</span></td></tr>
          <tr><td>Full-service (social + SEO + web + ads)</td><td><span class="yes">Yes</span></td><td><span class="">Usually social only</span></td><td><span class="">Siloed teams</span></td></tr>
          <tr><td>Dedicated account manager</td><td><span class="yes">Yes (Scale+)</span></td><td><span class="warn">Sometimes</span></td><td>N/A</td></tr>
          <tr><td>No setup fee</td><td><span class="yes">Yes</span></td><td><span class="">Often 00&ndash;,000</span></td><td>N/A</td></tr>
          <tr><td>Transparent monthly reporting</td><td><span class="yes">Yes</span></td><td><span class="warn">Varies</span></td><td>Internal only</td></tr>
          <tr><td>No annual contract lock-in</td><td><span class="yes">Yes</span></td><td><span class="">Often 12 months</span></td><td>N/A</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ═══ HOW IT WORKS ═══ -->
<section class="section section--alt">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Getting Started</span>
      <h2 class="section-title">How It Works</h2>
      <p class="section-lead">No lengthy onboarding. Three steps from first conversation to first post going live.</p>
    </div>
    <div class="steps-grid">
      <div class="step-card">
        <div class="step-num">1</div>
        <h3 class="step-title">Discovery Call</h3>
        <p class="step-desc">We spend 30 minutes understanding your business, your target audience, your existing social presence, and your goals. No sales pitch, no obligation.</p>
      </div>
      <div class="step-card">
        <div class="step-num">2</div>
        <h3 class="step-title">Strategy &amp; Approval</h3>
        <p class="step-desc">Within five working days we send you a content strategy outline, platform recommendations, and a first-month content calendar. You approve before anything is scheduled.</p>
      </div>
      <div class="step-card">
        <div class="step-num">3</div>
        <h3 class="step-title">Launch &amp; Management</h3>
        <p class="step-desc">Once approved, we manage everything: content creation, scheduling, community management, and reporting. One point of contact throughout.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ GDPR ═══ -->
<section class="section section--dark">
  <div class="container">
    <div class="gdpr-grid">
      <div>
        <div class="eyebrow eyebrow--light">GDPR &amp; European Compliance</div>
        <h2 class="section-title section-title--white">Built Right for UK &amp; EU Businesses</h2>
        <p class="section-lead section-lead--white" style="max-width:none;">For any business in the UK or European Union, social media advertising carries specific data obligations that US-based agencies routinely overlook. Custom audiences, pixel-based retargeting, and lead generation forms all touch personal data and fall under GDPR.</p>
        <p style="color:rgba(255,255,255,.65);font-size:.92rem;margin-top:16px;">YFG handles this correctly from day one. Our paid social setup includes privacy-compliant pixel installation, lawful basis documentation, and cross-border data transfer configuration. If you have been running ads without these safeguards, we audit your setup before spending another dollar of your budget.</p>
        <a href="/contact/" class="btn btn--teal" style="margin-top:24px;">Request a GDPR-Compliant Audit</a>
      </div>
      <div class="gdpr-badges">
        <div class="gdpr-badge"><span class="gdpr-badge__icon">&#128274;</span><div><span class="gdpr-badge__title">GDPR-Compliant Pixel Installation</span><span class="gdpr-badge__desc">Consent-aware tracking configured before a single ad goes live.</span></div></div>
        <div class="gdpr-badge"><span class="gdpr-badge__icon">&#128203;</span><div><span class="gdpr-badge__title">Lawful Basis Documentation</span><span class="gdpr-badge__desc">Full compliance documentation available for your DPO on request.</span></div></div>
        <div class="gdpr-badge"><span class="gdpr-badge__icon">&#127757;</span><div><span class="gdpr-badge__title">Cross-Border Transfer Compliance</span><span class="gdpr-badge__desc">Data transfer configurations meeting UK GDPR and EU standards.</span></div></div>
        <div class="gdpr-badge"><span class="gdpr-badge__icon">&#128269;</span><div><span class="gdpr-badge__title">Existing Campaign Audit</span><span class="gdpr-badge__desc">We audit current setups before spending any of your ad budget.</span></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SOCIAL PROOF / IMAGE SECTION ═══ -->
<section class="section">
  <div class="container">
    <div class="section-header section-header--center" style="margin-bottom:36px;">
      <span class="eyebrow">Results &amp; Trust</span>
      <h2 class="section-title">A Team That Gets Results</h2>
    </div>
    <div class="social-proof">

      <?php echo do_shortcode('[firm_reviews source="all"]'); ?>

      <!-- <div class="social-proof__img">
        <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&w=800&q=80" alt="Marketing team reviewing social media analytics and campaign results" loading="lazy">
      </div> -->
      <!-- <div class="social-proof__content">
        <p style="font-size:.8rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--teal);margin-bottom:12px;">What Our Clients Say</p>
        <p class="social-proof__quote">"[REAL YFG CLIENT QUOTE &mdash; replace this placeholder with a verified testimonial before publishing. Per editorial policy, no fabricated quotes.]"</p>
        <div class="social-proof__author">
          <strong>[Client Name, Title]</strong>
          <span style="display:block;">[Company Name &mdash; replace with real client detail]</span>
        </div>
        <div style="margin-top:24px;display:flex;gap:16px;flex-wrap:wrap;">
          <a href="/contact/" class="btn btn--teal">Start Growing Today</a>
          <a href="/case-studies/" class="btn btn--outline-navy">See Case Studies</a>
        </div>
      </div> -->
    </div>
  </div>
</section>

<!-- ═══ INLINE CTA 2 ═══ -->
<section style="padding:0 0 56px;">
  <div class="container">
    <div style="background:var(--teal-light);border:1.5px solid var(--teal-mid);border-radius:var(--radius-lg);padding:40px 48px;display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;">
      <div>
        <div style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:1.3rem;color:var(--navy);margin-bottom:6px;">Plans from 99/mo &nbsp;&middot;&nbsp; No setup fee &nbsp;&middot;&nbsp; No annual contract</div>
        <p style="color:var(--muted);font-size:.875rem;margin:0;">Start with a free proposal. Get a recommended package and first-month strategy outline back within 1 business day.</p>
      </div>
      <a href="/contact/" class="btn btn--teal btn--teal-lg" style="flex-shrink:0;">Get Your Free Proposal</a>
    </div>
  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section class="section section--alt">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">FAQs</span>
      <h2 class="section-title">Frequently Asked Questions</h2>
    </div>
    <div class="faq-wrap">
      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">How much do social media marketing packages cost?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">Our packages start at 99 per month for the Starter plan and reach 99 per month for Scale. Enterprise pricing is agreed on scope. No package carries a setup fee, and after an initial 3-month period, all contracts move to rolling monthly terms. GBP and EUR pricing available on request.</div>
      </div>
      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">Which social media platforms are included?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">You choose from Facebook, Instagram, LinkedIn, TikTok, X, and YouTube. Each tier specifies how many platforms are included. Enterprise can be scoped to include regional or niche platforms outside this list.</div>
      </div>
      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">How long before I see results from social media marketing?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">Organic social growth is a medium-term activity. Most clients see measurable improvements in reach and engagement within 60 to 90 days. Paid social campaigns show performance data within the first two weeks, though we allow 30 days before drawing conclusions.</div>
      </div>
      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">Do I need to supply content or creative assets?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">No. Content creation, graphic design, and short-form video are included in every package. We will ask for your brand guidelines, logo, and any product photography you want used, but we handle everything else.</div>
      </div>
      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">Can I upgrade or change my package?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">Yes. Upgrades take effect at the start of the following billing month. Your account manager reviews performance with you each month and will recommend a change if the data suggests a different tier would serve you better.</div>
      </div>
      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">Are your packages GDPR compliant?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">Yes. Every package includes GDPR-compliant data handling covering pixel installation, custom audience configuration, and lead form data. Compliance documentation is available for your data protection officer on request.</div>
      </div>
      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">Is social media marketing worth it for B2B businesses?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">Yes, particularly on LinkedIn. B2B buyers spend time on social media outside of working hours, and consistent presence builds brand familiarity that shortens sales cycles. Our Growth and Scale packages are regularly chosen by professional services and B2B firms across the UK and Europe.</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FINAL CTA ═══ -->
<section class="cta-final">
  <div class="container">
    <div class="cta-final__inner">
      <div class="eyebrow eyebrow--light" style="margin:0 auto 16px;">Free Proposal &mdash; No Obligation</div>
      <h2 class="cta-final__title">Ready to Grow on Social Media?</h2>
      <p class="cta-final__lead">Tell us your platforms, your goals, and your budget. Your Firm Growth will come back within one business day with a recommended package, a first-month strategy outline, and transparent pricing.</p>
      <div class="cta-final__btns">
        <a href="/contact/" class="btn btn--teal btn--teal-lg">Get Your Free Proposal</a>
        <a href="mailto:info@yourfirmgrowth.com" class="btn btn--outline-white">Email Us Directly</a>
      </div>
      <p class="cta-final__note">No setup fee &nbsp;&middot;&nbsp; No annual contract &nbsp;&middot;&nbsp; No obligation</p>
    </div>
  </div>
</section>

<!-- ═══ FOOTER ═══ -->
<!-- <footer class="footer">
  <div class="container">
    <div class="footer__inner">
      <a href="/" class="footer__logo"><img src="data:image/png;base64,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" alt="Your Firm Growth"></a>
      <div class="footer__links">
        <a href="/services/">Services</a>
        <a href="/blog/">Blog</a>
        <a href="/about/">About</a>
        <a href="/privacy-policy/">Privacy</a>
        <a href="/contact/">Contact</a>
      </div>
      <div class="footer__copy">&copy; 2026 Your Firm Growth. All rights reserved.</div>
    </div>
  </div>
</footer> -->

<script>
function toggleFaq(btn) {
  var body = btn.nextElementSibling;
  var isOpen = btn.classList.contains('open');
  document.querySelectorAll('.faq-btn').forEach(function(b) {
    b.classList.remove('open');
    b.nextElementSibling.classList.remove('open');
  });
  if (!isOpen) { btn.classList.add('open'); body.classList.add('open'); }
}
// Sticky bar
(function() {
  var bar = document.getElementById('stickyBar');
  var shown = false;
  window.addEventListener('scroll', function() {
    if (!shown && window.scrollY > 600) {
      bar.classList.add('is-visible'); shown = true;
    }
  });
})();
</script>

<?php
get_footer();
