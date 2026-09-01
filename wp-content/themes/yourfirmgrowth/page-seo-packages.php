<?php
/**
 * Template Name: SEO Packages
 *
 * @package YourFirmGrowth
 */

get_header();

// $yfg_contact_url = home_url( '/contact/?service=RemoteTeams' );
?>


<style>
:root {
  --navy:      #072F58;
  --navy-deep: #041D3A;
  --navy-mid:  #0D3D72;
  --teal:      #038791;
  --teal-dk:   #026870;
  --teal-lt:   #E0F5F5;
  --teal-mid:  #A8E3E6;
  --white:     #FFFFFF;
  --bg:        #F4F7FB;
  --bg-alt:    #EBF0F7;
  --text:      #0E1C30;
  --muted:     #556070;
  --border:    #D6E0EE;
  --amber:     #F59E0B;
  --amber-lt:  #FFFBEB;
  --green:     #10B981;
  --shadow-sm: 0 2px 8px rgba(7,47,88,.08);
  --shadow-md: 0 8px 32px rgba(7,47,88,.13);
  --shadow-lg: 0 20px 60px rgba(7,47,88,.18);
  --r:  12px;
  --rl: 20px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
/* body{font-family:'Inter',system-ui,sans-serif;font-size:16px;line-height:1.7;color:var(--text);background:var(--white);-webkit-font-smoothing:antialiased} */
/* h1,h2,h3,h4{font-family:'Plus Jakarta Sans',system-ui,sans-serif;font-weight:700;line-height:1.2;color:var(--navy)}
p{margin-bottom:1rem}p:last-child{margin-bottom:0} */
/* a{color:var(--teal-dk);text-decoration:none}a:hover{text-decoration:underline}
ul{list-style:none}img{max-width:100%;height:auto;display:block}
.container{width:100%;max-width:1160px;margin:0 auto;padding:0 24px} */
.section{padding:88px 0}.section--alt{background:var(--bg)}.section--dark{background:linear-gradient(135deg,var(--navy-deep) 0%,var(--navy) 100%)}
.eyebrow{display:inline-flex;align-items:center;gap:7px;background:rgba(3,135,145,.12);border:1px solid rgba(3,135,145,.3);border-radius:50px;padding:5px 14px;font-size:.73rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--teal);margin-bottom:14px}
.eyebrow--lt{background:rgba(3,135,145,.2);border-color:rgba(3,135,145,.4);color:var(--teal-mid)}
.section-title{font-size:clamp(1.7rem,2.8vw,2.4rem);margin-bottom:14px}
.section-title--white{color:var(--white)}
.section-lead{font-size:1.02rem;color:var(--muted);max-width:600px;line-height:1.7}
.section-lead--white{color:rgba(255,255,255,.7)}
.section-header{margin-bottom:52px}.section-header--center{text-align:center}.section-header--center .section-lead{margin:0 auto}

/* BUTTONS */
/* :not(.site-header__cta) so these page-button styles don't leak into the global site header */
.btn:not(.site-header__cta){display:inline-flex;align-items:center;justify-content:center;gap:8px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;border-radius:50px;transition:all .22s;cursor:pointer;text-decoration:none;border:none;white-space:nowrap}
.btn-teal{background:linear-gradient(135deg,var(--teal) 0%,var(--teal-dk) 100%);color:var(--white);padding:14px 30px;font-size:.95rem;box-shadow:0 4px 18px rgba(3,135,145,.4)}
.btn-teal:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(3,135,145,.5);color:var(--white);text-decoration:none}
.btn-teal-lg{padding:17px 38px;font-size:1.05rem}
.btn-white{background:var(--white);color:var(--navy);padding:14px 30px;font-size:.95rem;box-shadow:0 4px 16px rgba(7,47,88,.2)}
.btn-white:hover{background:var(--teal-lt);color:var(--navy);text-decoration:none;transform:translateY(-2px)}
.btn-outline-w{background:transparent;color:var(--white);padding:14px 30px;font-size:.95rem;border:2px solid rgba(255,255,255,.4)}
.btn-outline-w:hover{border-color:var(--teal);color:var(--teal);text-decoration:none}
.btn-outline-n{background:transparent;color:var(--navy);padding:12px 26px;font-size:.9rem;border:2px solid var(--border)}
.btn-outline-n:hover{border-color:var(--teal);color:var(--teal);text-decoration:none}

/* STICKY BAR */
.sticky-bar{position:fixed;bottom:0;left:0;right:0;z-index:999;background:var(--navy);border-top:2px solid var(--teal);padding:14px 24px;display:flex;align-items:center;justify-content:space-between;gap:16px;transform:translateY(100%);transition:transform .35s ease;box-shadow:0 -4px 24px rgba(7,47,88,.3)}
.sticky-bar.show{transform:translateY(0)}
.sb-text{font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.95rem;color:var(--white)}
.sb-text span{color:var(--teal)}
.sb-sub{font-size:.78rem;color:rgba(255,255,255,.5);font-weight:400}
.sb-close{background:none;border:none;cursor:pointer;padding:4px;color:rgba(255,255,255,.4);font-size:1.3rem;line-height:1}
.sb-close:hover{color:var(--white)}

/* NAV */
.nav{position:sticky;top:0;z-index:100;background:rgba(7,47,88,.97);backdrop-filter:blur(12px);border-bottom:1px solid rgba(255,255,255,.07)}
.nav__in{display:flex;align-items:center;justify-content:space-between;height:70px}
.nav__logo img{height:44px;width:auto}
.nav__links{display:flex;align-items:center;gap:28px}
.nav__links a{font-size:.875rem;font-weight:500;color:rgba(255,255,255,.7);transition:color .2s}
.nav__links a:hover{color:var(--white);text-decoration:none}

/* HERO */
.hero{position:relative;overflow:hidden;padding:96px 0 86px;background:linear-gradient(135deg,var(--navy-deep) 0%,var(--navy) 55%,#0A3D5C 100%)}
.hero-bg{position:absolute;inset:0;background-image:url('<?php echo esc_url( YFG_URI . '/assets/images/seo-packages/seo-packages-hero-bg.webp' ); ?>');background-size:cover;background-position:center;opacity:.08}
.hero::before{content:'';position:absolute;top:-100px;right:-80px;width:520px;height:520px;background:radial-gradient(circle,rgba(3,135,145,.16) 0%,transparent 70%);pointer-events:none;z-index:1}
.hero__in{position:relative;z-index:2;display:grid;grid-template-columns:1fr 460px;gap:48px;align-items:center}
.hero-content{}
.hero-title{font-size:clamp(2.2rem,4.5vw,3.5rem);font-weight:800;color:var(--white);line-height:1.08;letter-spacing:-.02em;margin-bottom:20px}
.hero-title .hl{background:linear-gradient(90deg,var(--teal) 0%,#50D8DF 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.hero-answer{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);border-left:3px solid var(--teal);border-radius:0 8px 8px 0;padding:14px 18px;margin-bottom:30px;font-size:.92rem;color:rgba(255,255,255,.82);line-height:1.65;max-width:660px}
.hero-answer strong{color:var(--white)}
.hero-ctas{display:flex;flex-wrap:wrap;gap:12px;margin-bottom:18px}
.hero-note{font-size:.78rem;color:rgba(255,255,255,.38)}
.hero-img-card{border-radius:var(--rl);overflow:hidden;box-shadow:var(--shadow-lg);position:relative}
.hero-img-card img{width:100%;height:340px;object-fit:cover}
.hero-img-overlay{position:absolute;inset:0;background:linear-gradient(135deg,rgba(7,47,88,.2) 0%,transparent 60%)}
.hero-float{position:absolute;bottom:20px;left:20px;background:var(--white);border-radius:var(--r);padding:12px 16px;box-shadow:var(--shadow-md);display:flex;align-items:center;gap:10px}
.hf-dot{width:9px;height:9px;border-radius:50%;background:var(--green);animation:pulse 2s infinite}
@keyframes pulse{0%,100%{box-shadow:0 0 0 0 rgba(16,185,129,.4)}50%{box-shadow:0 0 0 6px rgba(16,185,129,0)}}
.hf-text strong{display:block;font-size:.8rem;font-weight:700;color:var(--navy)}
.hf-text span{font-size:.72rem;color:var(--muted)}

/* TRUST BAR */
.trust-bar{background:var(--navy-deep);border-bottom:1px solid rgba(255,255,255,.06);padding:16px 0}
.trust-inner{display:flex;flex-wrap:wrap;align-items:center;justify-content:center}
.trust-item{display:flex;align-items:center;gap:8px;font-size:.8rem;font-weight:600;color:rgba(255,255,255,.65);padding:5px 20px;border-right:1px solid rgba(255,255,255,.09)}
.trust-item:last-child{border-right:none}
.tdot{width:7px;height:7px;border-radius:50%;background:var(--teal);flex-shrink:0}

/* STATS */
.stats-bar{background:var(--white);border-bottom:1px solid var(--border);padding:40px 0}
.stats-row{display:grid;grid-template-columns:repeat(4,1fr)}
.stat-item{text-align:center;padding:12px 20px;border-right:1px solid var(--border)}
.stat-item:last-child{border-right:none}
.stat-num{font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:2.4rem;line-height:1;letter-spacing:-.03em;color:var(--navy)}
.stat-num em{color:var(--teal);font-style:normal}
.stat-label{font-size:.79rem;color:var(--muted);margin-top:4px;font-weight:500}

/* INTRO */
.intro-grid{display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center}
.intro-image{border-radius:var(--rl);overflow:hidden;box-shadow:var(--shadow-lg);position:relative}
.intro-image img{width:100%;height:440px;object-fit:cover}
.intro-badge{position:absolute;bottom:20px;left:20px;background:var(--white);border-radius:var(--r);padding:14px 18px;box-shadow:var(--shadow-md);display:flex;align-items:center;gap:12px}
.ib-dot{width:10px;height:10px;border-radius:50%;background:var(--green);animation:pulse 2s infinite;flex-shrink:0}
.ib-text strong{display:block;font-size:.82rem;font-weight:700;color:var(--navy)}
.ib-text span{font-size:.74rem;color:var(--muted)}

/* PACKAGES */
.pkg-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;align-items:start}
.pkg-card{background:var(--white);border:1.5px solid var(--border);border-radius:var(--rl);padding:30px 24px;position:relative;box-shadow:var(--shadow-sm);transition:box-shadow .25s,transform .25s}
.pkg-card:hover{box-shadow:var(--shadow-md);transform:translateY(-4px)}
.pkg-card.featured{background:linear-gradient(155deg,var(--navy) 0%,#0A3D5C 100%);border-color:var(--teal);box-shadow:0 0 0 1px var(--teal),var(--shadow-lg);transform:translateY(-10px)}
.pkg-card.featured:hover{transform:translateY(-14px)}
.pkg-badge{position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:linear-gradient(90deg,var(--teal) 0%,var(--teal-dk) 100%);color:var(--white);font-size:.68rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:5px 16px;border-radius:50px;white-space:nowrap}
.pkg-tier{font-size:.72rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:8px}
.featured .pkg-tier{color:var(--teal-mid)}
.pkg-price{margin-bottom:4px}
.pkg-amt{font-family:'Plus Jakarta Sans',sans-serif;font-size:2.5rem;font-weight:800;color:var(--navy);letter-spacing:-.03em;line-height:1}
.featured .pkg-amt{color:var(--white)}
.pkg-per{font-size:.82rem;color:var(--muted)}
.featured .pkg-per{color:rgba(255,255,255,.55)}
.pkg-tag{font-size:.79rem;color:var(--muted);line-height:1.5;margin:12px 0 18px;padding-bottom:18px;border-bottom:1px solid var(--border)}
.featured .pkg-tag{color:rgba(255,255,255,.55);border-bottom-color:rgba(255,255,255,.12)}
.pkg-feats{display:flex;flex-direction:column;gap:8px;margin-bottom:22px}
.pf{display:flex;align-items:flex-start;gap:8px;font-size:.81rem;color:var(--text);line-height:1.45}
.featured .pf{color:rgba(255,255,255,.85)}
.pf-yes{width:16px;height:16px;border-radius:50%;background:var(--teal-lt);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px}
.featured .pf-yes{background:rgba(3,135,145,.25)}
.pf-yes svg{width:8px;height:8px;stroke:var(--teal);stroke-width:3;fill:none}
.featured .pf-yes svg{stroke:#50D8DF}
.pf-no{width:16px;height:16px;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;font-size:.65rem;color:var(--border)}
.pkg-btn{display:block;text-align:center;padding:12px 14px;border-radius:50px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.875rem;transition:all .22s;text-decoration:none}
.pkg-btn-def{background:var(--bg);color:var(--navy);border:1.5px solid var(--border)}
.pkg-btn-def:hover{background:var(--teal-lt);border-color:var(--teal);color:var(--navy);text-decoration:none}
.pkg-btn-feat{background:linear-gradient(135deg,var(--teal) 0%,var(--teal-dk) 100%);color:var(--white);box-shadow:0 4px 16px rgba(3,135,145,.45)}
.pkg-btn-feat:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(3,135,145,.55);color:var(--white);text-decoration:none}
.pkg-note{text-align:center;font-size:.78rem;color:var(--muted);margin-top:26px}

/* FULL COMPARISON TABLE */
.full-table{width:100%;border-collapse:collapse;font-size:.83rem;border-radius:var(--r);overflow:hidden;box-shadow:var(--shadow-sm)}
.full-table thead{background:var(--navy)}
.full-table thead th{padding:15px 16px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.8rem;text-align:left;color:rgba(255,255,255,.8);white-space:nowrap}
.full-table thead th:nth-child(3){background:rgba(3,135,145,.18);color:var(--teal-mid)}
.full-table tbody tr{border-bottom:1px solid var(--border);background:var(--white);transition:background .15s}
.full-table tbody tr:hover{background:var(--bg)}
.full-table tbody tr.group-header{background:var(--navy-deep)}
.full-table tbody tr.group-header td{padding:8px 16px;font-size:.72rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--teal);border-bottom:none}
.full-table td{padding:11px 16px;color:var(--text);vertical-align:middle}
.full-table td:nth-child(3){background:rgba(224,245,245,.35)}
.t-y{color:var(--teal);font-weight:700}
.t-n{color:var(--border)}
.t-g{color:#64748B;font-size:.8rem}

/* DELIVERABLES */
.deliv-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.deliv-card{background:var(--white);border:1.5px solid var(--border);border-top:3px solid var(--teal);border-radius:var(--r);padding:26px 22px;box-shadow:var(--shadow-sm)}
.deliv-icon{width:42px;height:42px;background:var(--teal-lt);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:14px}
.deliv-icon svg{width:22px;height:22px;stroke:var(--teal);stroke-width:1.8;fill:none}
.deliv-title{font-size:.93rem;font-weight:700;margin-bottom:8px;color:var(--navy)}
.deliv-text{font-size:.84rem;color:var(--muted);line-height:1.65}

/* INLINE CTA */
.icta{background:linear-gradient(135deg,var(--navy) 0%,#0A3D5C 100%);border-radius:var(--rl);padding:46px 52px;display:flex;align-items:center;justify-content:space-between;gap:28px;position:relative;overflow:hidden}
.icta::before{content:'';position:absolute;right:-60px;top:-60px;width:280px;height:280px;background:radial-gradient(circle,rgba(3,135,145,.2) 0%,transparent 70%);pointer-events:none}
.icta-text h3{font-size:1.55rem;color:var(--white);margin-bottom:8px}
.icta-text p{color:rgba(255,255,255,.65);font-size:.9rem;max-width:480px}
.icta-btns{display:flex;gap:12px;flex-shrink:0;flex-wrap:wrap}

/* WHO SECTION */
.who-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px}
.who-card{background:var(--white);border:1.5px solid var(--border);border-radius:var(--r);padding:26px 22px;box-shadow:var(--shadow-sm);transition:border-color .2s,box-shadow .2s}
.who-card:hover{border-color:var(--teal);box-shadow:var(--shadow-sm)}
.who-badge{display:inline-block;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.68rem;letter-spacing:.1em;text-transform:uppercase;background:var(--teal-lt);color:var(--teal-dk);padding:4px 12px;border-radius:50px;margin-bottom:14px}
.who-title{font-size:1.05rem;font-weight:700;color:var(--navy);margin-bottom:8px}
.who-text{font-size:.83rem;color:var(--muted);line-height:1.65}

/* AI SECTION */
.ai-grid{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
.ai-image{border-radius:var(--rl);overflow:hidden;box-shadow:var(--shadow-lg);position:relative}
.ai-image img{width:100%;height:400px;object-fit:cover}
.ai-badge-strip{display:flex;flex-direction:column;gap:12px;margin-top:24px}
.ai-badge{display:flex;align-items:flex-start;gap:12px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-left:3px solid var(--teal);border-radius:0 8px 8px 0;padding:14px 16px}
.ai-badge-icon{font-size:1.3rem;flex-shrink:0}
.ai-badge-title{display:block;font-size:.84rem;font-weight:700;color:var(--white);margin-bottom:3px}
.ai-badge-desc{font-size:.78rem;color:rgba(255,255,255,.5);line-height:1.5}

/* COMPARE vs competitors */
.comp-table{width:100%;border-collapse:collapse;font-size:.86rem;border-radius:var(--r);overflow:hidden;box-shadow:var(--shadow-sm)}
.comp-table thead{background:var(--navy)}
.comp-table thead th{padding:15px 18px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.82rem;text-align:left;color:rgba(255,255,255,.8)}
.comp-table thead th:nth-child(2){background:rgba(3,135,145,.18);color:var(--teal-mid)}
.comp-table tbody tr{border-bottom:1px solid var(--border);background:var(--white)}
.comp-table tbody tr:hover{background:var(--bg)}
.comp-table td{padding:13px 18px;color:var(--text);vertical-align:middle}
.comp-table td:nth-child(2){background:rgba(224,245,245,.4)}
.cy{color:var(--teal);font-weight:700}.cn{color:var(--border)}.cw{color:var(--amber);font-size:.8rem;font-weight:600}

/* STEPS */
.steps-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;position:relative}
.steps-grid::before{content:'';position:absolute;top:34px;left:calc(12.5% + 16px);right:calc(12.5% + 16px);height:2px;background:linear-gradient(90deg,var(--teal) 0%,var(--teal-dk) 100%);opacity:.22}
.step-card{text-align:center}
.step-num{width:68px;height:68px;margin:0 auto 16px;background:linear-gradient(135deg,var(--navy) 0%,var(--navy-mid) 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Plus Jakarta Sans',sans-serif;font-size:1.4rem;font-weight:800;color:var(--teal);border:3px solid rgba(3,135,145,.25);position:relative;z-index:1}
.step-title{font-size:1rem;font-weight:700;margin-bottom:8px;color:var(--navy)}
.step-desc{font-size:.84rem;color:var(--muted);line-height:1.65}

/* FAQ */
.faq-wrap{max-width:780px;margin:0 auto}
.faq-item{border-bottom:1px solid var(--border)}
.faq-item:first-child{border-top:1px solid var(--border)}
.faq-btn{width:100%;display:flex;align-items:center;justify-content:space-between;gap:12px;padding:20px 0;background:none;border:none;cursor:pointer;text-align:left;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.93rem;color:var(--navy);transition:color .2s}
.faq-btn:hover,.faq-btn.open{color:var(--teal)}
.faq-icon{width:28px;height:28px;background:var(--bg);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .2s,transform .25s}
.faq-btn.open .faq-icon{background:var(--teal-lt);transform:rotate(45deg)}
.faq-icon svg{width:13px;height:13px;stroke:var(--muted);stroke-width:2.5;fill:none}
.faq-btn.open .faq-icon svg{stroke:var(--teal)}
.faq-body{display:none;padding-bottom:18px;font-size:.88rem;color:var(--muted);line-height:1.7}
.faq-body.open{display:block}

/* FINAL CTA */
.cta-final{padding:100px 0;text-align:center;background:linear-gradient(135deg,var(--navy-deep) 0%,var(--navy) 50%,#0A3D5C 100%);position:relative;overflow:hidden}
.cta-final::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 70% 60% at 50% 110%,rgba(3,135,145,.18),transparent);pointer-events:none}
.cta-inner{position:relative;z-index:1;max-width:600px;margin:0 auto}
.cta-title{font-size:clamp(2rem,4vw,2.9rem);font-weight:800;color:var(--white);letter-spacing:-.02em;margin-bottom:14px;line-height:1.15}
.cta-lead{font-size:1.02rem;color:rgba(255,255,255,.68);margin-bottom:40px;line-height:1.65}
.cta-btns{display:flex;gap:14px;justify-content:center;flex-wrap:wrap}
.cta-note{font-size:.76rem;color:rgba(255,255,255,.3);margin-top:18px}

/* FOOTER */
.footer{background:var(--navy-deep);padding:30px 0;border-top:1px solid rgba(255,255,255,.06)}
.footer-inner{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px}
.footer-logo img{height:36px;width:auto}
.footer-links{display:flex;gap:22px}
.footer-links a{font-size:.78rem;color:rgba(255,255,255,.4)}
.footer-links a:hover{color:var(--teal);text-decoration:none}
.footer-copy{font-size:.76rem;color:rgba(255,255,255,.28)}

/* RESPONSIVE */
@media(max-width:1100px){
  .hero__in{grid-template-columns:1fr}
  .hero-img-card{display:none}
  .pkg-grid{grid-template-columns:repeat(2,1fr)}
  .pkg-card.featured{transform:none}
  .pkg-card.featured:hover{transform:translateY(-4px)}
  .intro-grid,.ai-grid{grid-template-columns:1fr;gap:36px}
  .who-grid{grid-template-columns:repeat(2,1fr)}
  .steps-grid{grid-template-columns:repeat(2,1fr)}
  .steps-grid::before{display:none}
}
@media(max-width:768px){
  .section{padding:56px 0}
  .nav__links{display:none}
  .hero{padding:64px 0 60px}
  .hero-ctas{flex-direction:column;align-items:flex-start}
  .stats-row{grid-template-columns:repeat(2,1fr)}
  .stat-item:nth-child(2){border-right:none}
  .pkg-grid{grid-template-columns:1fr;max-width:400px;margin:0 auto}
  .deliv-grid,.who-grid{grid-template-columns:1fr}
  .icta{flex-direction:column;padding:32px 24px;text-align:center}
  .icta-text p{max-width:none}
  .steps-grid{grid-template-columns:1fr}
  .trust-item{border-right:none;border-bottom:1px solid rgba(255,255,255,.07);width:100%;justify-content:center}
  .footer-inner{flex-direction:column;align-items:flex-start}
  .full-table{font-size:.74rem}
  .full-table th,.full-table td{padding:9px 10px}
}
</style>
</head>
<body>

<!-- STICKY BAR -->
<div class="sticky-bar" id="sbar">
  <div>
    <div class="sb-text">Professional <span>SEO packages from $299/mo</span></div>
    <div class="sb-sub">Free audit &nbsp;·&nbsp; No setup fee &nbsp;·&nbsp; No annual contract &nbsp;·&nbsp; AI Search included</div>
  </div>
  <div style="display:flex;gap:10px;align-items:center;flex-shrink:0">
    <a href="/contact/" class="btn-teal" style="padding:10px 22px;font-size:.88rem;">Get Free Audit</a>
    <button class="sb-close" onclick="document.getElementById('sbar').style.display='none'">&#215;</button>
  </div>
</div>

<!-- NAV -->
<!-- <nav class="nav">
  <div class="container">
    <div class="nav__in">
      <a href="/" class="nav__logo"><img src="data:image/png;base64,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" alt="Your Firm Growth"></a>
      <div class="nav__links">
        <a href="/services/">Services</a>
        <a href="/seo-packages/" style="color:var(--teal);">SEO Packages</a>
        <a href="/blog/">Blog</a>
        <a href="/about/">About</a>
        <a href="/contact/" class="btn-teal" style="padding:10px 22px;font-size:.84rem;">Free SEO Audit</a>
      </div>
    </div>
  </div>
</nav> -->

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="container">
    <div class="hero__in">
      <div class="hero-content">
        <div class="eyebrow eyebrow--lt">
          <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 1l1 2.5 2.5.4-1.8 1.8.4 2.5L5 7 2.9 8.2l.4-2.5L1.5 3.9l2.5-.4z"/></svg>
          SEO Packages &amp; Monthly Plans
        </div>
        <h1 class="hero-title">
          Professional Monthly SEO Service Packages From <span class="hl">Your Firm Growth</span>
        </h1>
        <div class="hero-answer">
          <strong>What are YFG's SEO packages?</strong><br>
          Your Firm Growth offers monthly SEO packages covering technical SEO, on-page optimisation, content creation, link building, and AI search visibility. Plans start from $299 per month with no setup fee, a free audit before work begins, and GDPR-compliant delivery for UK, US, and European businesses.
        </div>
        <div class="hero-ctas">
          <a href="/contact/" class="btn-teal btn-teal-lg">Get Your Free SEO Audit</a>
          <a href="#packages" class="btn-outline-w">View All Packages</a>
        </div>
        <p class="hero-note">Free audit included &nbsp;&middot;&nbsp; No setup fee &nbsp;&middot;&nbsp; No annual contract &nbsp;&middot;&nbsp; AI Search &amp; GEO included</p>
      </div>
      <div class="hero-img-card">
        <img src="<?php echo esc_url( YFG_URI . '/assets/images/seo-packages/seo-packages-hero.webp' ); ?>" alt="SEO analytics dashboard showing organic traffic growth" loading="eager">
        <div class="hero-img-overlay"></div>
        <div class="hero-float">
          <span class="hf-dot"></span>
          <div class="hf-text"><strong>Rankings improving</strong><span>Active campaign running</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TRUST BAR -->
<div class="trust-bar">
  <div class="container">
    <div class="trust-inner">
      <div class="trust-item"><span class="tdot"></span>UK, USA, Germany &amp; Europe</div>
      <div class="trust-item"><span class="tdot"></span>GDPR Compliant</div>
      <div class="trust-item"><span class="tdot"></span>Free Audit Included</div>
      <div class="trust-item"><span class="tdot"></span>No Setup Fee</div>
      <div class="trust-item"><span class="tdot"></span>AI Search / GEO Included</div>
      <div class="trust-item"><span class="tdot"></span>No Annual Contract</div>
    </div>
  </div>
</div>

<!-- STATS BAR -->
<div class="stats-bar">
  <div class="container">
    <div class="stats-row">
      <div class="stat-item">
        <div class="stat-num">$<em>299</em></div>
        <div class="stat-label">Starting price / month</div>
      </div>
      <div class="stat-item">
        <div class="stat-num"><em>68</em>%</div>
        <div class="stat-label">Of online experiences start with search</div>
      </div>
      <div class="stat-item">
        <div class="stat-num"><em>4</em></div>
        <div class="stat-label">Global markets served</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">$<em>0</em></div>
        <div class="stat-label">Setup or onboarding fee</div>
      </div>
    </div>
  </div>
</div>

<!-- INTRO -->
<section class="section">
  <div class="container">
    <div class="intro-grid">
      <div class="intro-image">
        <img src="<?php echo esc_url( YFG_URI . '/assets/images/seo-packages/seo-packages-intro.webp' ); ?>" alt="SEO specialist doing keyword research and on-page optimisation" loading="lazy">
        <div class="intro-badge">
          <span class="ib-dot"></span>
          <div class="ib-text"><strong>Live SEO campaigns running</strong><span>UK &middot; US &middot; DE &middot; EU</span></div>
        </div>
      </div>
      <div>
        <span class="eyebrow">Why Invest in SEO?</span>
        <h2 class="section-title">Organic Traffic That Compounds Month on Month</h2>
        <p>Paid ads stop the moment you stop paying. SEO builds compounding authority: the rankings, content, and backlinks you earn in month one are still working in month twelve, and beyond. It is the channel with the most durable return on investment in digital marketing.</p>
        <p>Your Firm Growth builds monthly SEO packages around what actually moves rankings in 2026: technically sound websites, content that answers real search intent, links from genuinely relevant sites, and visibility in AI-generated search results including Google AI Overviews, ChatGPT, and Perplexity. Every package includes a free audit before work starts so you know exactly what is being fixed and why.</p>
        <div style="display:flex;gap:12px;margin-top:20px;flex-wrap:wrap;">
          <a href="/contact/" class="btn-teal">Start With a Free Audit</a>
          <a href="/services/" class="btn-outline-n">All Services</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PACKAGES -->
<section class="section section--alt" id="packages">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Pricing &amp; Plans</span>
      <h2 class="section-title">Monthly SEO Packages &amp; Pricing</h2>
      <p class="section-lead">No setup fees. No hidden costs. Every deliverable listed up front. Free audit included with every plan. All prices in USD.</p>
    </div>

    <div class="pkg-grid">

      <!-- STARTER -->
      <div class="pkg-card">
        <div class="pkg-tier">Starter</div>
        <div class="pkg-price">
          <span class="pkg-amt">$299</span><span class="pkg-per"> /mo</span>
        </div>
        <p class="pkg-tag">For new websites and local businesses in low-competition niches establishing organic visibility.</p>
        <ul class="pkg-feats">
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Up to 15 target keywords</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Up to 10 pages optimised</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full technical SEO audit (initial)</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>On-page optimisation + schema</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>2 SEO content pieces/mo</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>3 quality backlinks/mo</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Google Business Profile setup</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Basic AI Search / GEO setup</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Monthly ranking report</span></li>
          <li class="pf"><span class="pf-no">&mdash;</span><span style="color:var(--border)">Dedicated account manager</span></li>
        </ul>
        <a href="/contact/" class="pkg-btn pkg-btn-def">Get Started</a>
      </div>

      <!-- GROWTH (FEATURED) -->
      <div class="pkg-card featured">
        <div class="pkg-badge">Most Popular</div>
        <div class="pkg-tier">Growth</div>
        <div class="pkg-price">
          <span class="pkg-amt">$599</span><span class="pkg-per"> /mo</span>
        </div>
        <p class="pkg-tag">For growing businesses ready to compete for high-value keywords and drive consistent organic leads.</p>
        <ul class="pkg-feats">
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Up to 40 target keywords</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Up to 25 pages optimised</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Technical audit + quarterly review</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full on-page + schema + Core Web Vitals</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>4 SEO content pieces/mo</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>6 quality backlinks/mo</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Advanced Local SEO + GBP management</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>AI Search / GEO optimisation</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Competitor gap analysis</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Monthly report + strategy call</span></li>
        </ul>
        <a href="/contact/" class="pkg-btn pkg-btn-feat">Get Started</a>
      </div>

      <!-- SCALE -->
      <div class="pkg-card">
        <div class="pkg-tier">Scale</div>
        <div class="pkg-price">
          <span class="pkg-amt">$999</span><span class="pkg-per"> /mo</span>
        </div>
        <p class="pkg-tag">For established businesses in competitive markets needing aggressive content and authoritative links.</p>
        <ul class="pkg-feats">
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Up to 100 target keywords</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Up to 50 pages optimised</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Monthly technical audit + fixes</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full on-page + schema + CWV fixes</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>8 SEO content pieces/mo</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>12 high-authority backlinks/mo</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full Local SEO + multi-location</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full AI Search / GEO strategy</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Dedicated account manager</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Bi-weekly strategy calls</span></li>
        </ul>
        <a href="/contact/" class="pkg-btn pkg-btn-def">Get Started</a>
      </div>

      <!-- ENTERPRISE -->
      <div class="pkg-card">
        <div class="pkg-tier">Enterprise</div>
        <div class="pkg-price">
          <span class="pkg-amt" style="font-size:2rem;letter-spacing:-.01em">Custom</span>
        </div>
        <p class="pkg-tag">For multi-market, ecommerce, or multi-language campaigns requiring bespoke strategy.</p>
        <ul class="pkg-feats">
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Unlimited keywords &amp; pages</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full technical SEO implementation</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Custom content production</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Custom link building programme</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Multi-language SEO (UK, US, DE, EU)</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>International hreflang strategy</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full AI Search / GEO &amp; Digital PR</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Senior account director</span></li>
          <li class="pf"><span class="pf-yes"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Weekly strategy sessions</span></li>
        </ul>
        <a href="/contact/" class="pkg-btn pkg-btn-def">Request Proposal</a>
      </div>

    </div>
    <p class="pkg-note">All prices USD &nbsp;&middot;&nbsp; 3-month initial term then rolling monthly &nbsp;&middot;&nbsp; Free audit before work starts &nbsp;&middot;&nbsp; GBP / EUR pricing on request</p>
  </div>
</section>

<!-- INLINE CTA 1 -->
<section style="padding:40px 0">
  <div class="container">
    <div class="icta">
      <div class="icta-text">
        <h3>Unsure which SEO package fits your business?</h3>
        <p>Our team audits your site for free, identifies the gaps holding your rankings back, and recommends the right plan before you spend a dollar. No pitch, no obligation.</p>
      </div>
      <div class="icta-btns">
        <a href="/contact/" class="btn-teal btn-teal-lg">Get My Free SEO Audit</a>
        <a href="mailto:info@yourfirmgrowth.com" class="btn-outline-w">Email Our Team</a>
      </div>
    </div>
  </div>
</section>

<!-- FULL DELIVERABLES TABLE -->
<section class="section">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Full Feature Comparison</span>
      <h2 class="section-title">What's Included in Each SEO Package</h2>
      <p class="section-lead">A complete side-by-side breakdown of every deliverable across all four plans.</p>
    </div>
    <div style="overflow-x:auto;border-radius:var(--r);box-shadow:var(--shadow-sm)">
      <table class="full-table">
        <thead>
          <tr>
            <th style="width:30%">Deliverable</th>
            <th>Starter &nbsp;$299</th>
            <th>Growth &nbsp;$599</th>
            <th>Scale &nbsp;$999</th>
            <th>Enterprise</th>
          </tr>
        </thead>
        <tbody>
          <tr class="group-header"><td colspan="5">Keyword &amp; Site Scope</td></tr>
          <tr><td>Keywords tracked</td><td>Up to 15</td><td>Up to 40</td><td>Up to 100</td><td>Custom</td></tr>
          <tr><td>Pages optimised / month</td><td>Up to 10</td><td>Up to 25</td><td>Up to 50</td><td>Unlimited</td></tr>

          <tr class="group-header"><td colspan="5">Technical SEO</td></tr>
          <tr><td>Initial technical audit</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Ongoing technical monitoring</td><td><span class="t-n">—</span></td><td><span class="t-g">Quarterly</span></td><td><span class="t-y">Monthly</span></td><td><span class="t-y">Monthly</span></td></tr>
          <tr><td>Core Web Vitals optimisation</td><td><span class="t-g">Monitoring</span></td><td><span class="t-g">Fixes included</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td></tr>
          <tr><td>Schema markup / structured data</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Crawl error resolution</td><td><span class="t-g">Basic</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td></tr>
          <tr><td>XML sitemap &amp; robots.txt</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>

          <tr class="group-header"><td colspan="5">On-Page Optimisation</td></tr>
          <tr><td>Meta titles &amp; descriptions</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Header tag optimisation (H1–H4)</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Internal linking strategy</td><td><span class="t-g">Basic</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td></tr>
          <tr><td>Image alt text &amp; optimisation</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>

          <tr class="group-header"><td colspan="5">Content Creation</td></tr>
          <tr><td>SEO content pieces per month</td><td>2 pieces</td><td>4 pieces</td><td>8 pieces</td><td>Custom</td></tr>
          <tr><td>Keyword research per piece</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Content brief &amp; approval process</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Content cluster / pillar strategy</td><td><span class="t-n">—</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>

          <tr class="group-header"><td colspan="5">Link Building</td></tr>
          <tr><td>Quality backlinks per month</td><td>3 links</td><td>6 links</td><td>12 links</td><td>Custom</td></tr>
          <tr><td>Niche-relevant placements</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Digital PR / authority links</td><td><span class="t-n">—</span></td><td><span class="t-n">—</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Toxic link disavow monitoring</td><td><span class="t-g">Quarterly</span></td><td><span class="t-g">Quarterly</span></td><td><span class="t-y">Monthly</span></td><td><span class="t-y">Monthly</span></td></tr>

          <tr class="group-header"><td colspan="5">Local SEO</td></tr>
          <tr><td>Google Business Profile</td><td><span class="t-g">Setup</span></td><td><span class="t-g">Advanced</span></td><td><span class="t-y">Full mgmt</span></td><td><span class="t-y">Full mgmt</span></td></tr>
          <tr><td>Local citation building</td><td><span class="t-g">Basic</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td></tr>
          <tr><td>Multi-location SEO</td><td><span class="t-n">—</span></td><td><span class="t-n">—</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>

          <tr class="group-header"><td colspan="5">AI Search &amp; GEO (2026)</td></tr>
          <tr><td>Google AI Overview optimisation</td><td><span class="t-g">Basic</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td></tr>
          <tr><td>ChatGPT / Perplexity visibility</td><td><span class="t-n">—</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td></tr>
          <tr><td>Entity &amp; brand authority building</td><td><span class="t-n">—</span></td><td><span class="t-g">Basic</span></td><td><span class="t-y">Full</span></td><td><span class="t-y">Full</span></td></tr>

          <tr class="group-header"><td colspan="5">Reporting &amp; Support</td></tr>
          <tr><td>Monthly performance report</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Strategy calls</td><td><span class="t-g">Quarterly</span></td><td><span class="t-g">Monthly</span></td><td><span class="t-y">Bi-weekly</span></td><td><span class="t-y">Weekly</span></td></tr>
          <tr><td>Account manager</td><td><span class="t-g">Shared</span></td><td><span class="t-g">Dedicated</span></td><td><span class="t-y">Senior</span></td><td><span class="t-y">Director</span></td></tr>
          <tr><td>GDPR-compliant data handling</td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td><td><span class="t-y">Yes</span></td></tr>
          <tr><td>Setup fee</td><td><span class="t-y">None</span></td><td><span class="t-y">None</span></td><td><span class="t-y">None</span></td><td><span class="t-y">None</span></td></tr>
          <tr><td>Minimum contract</td><td><span class="t-g">3 months</span></td><td><span class="t-g">3 months</span></td><td><span class="t-g">3 months</span></td><td>Custom</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- WHAT'S INCLUDED (CARDS) -->
<section class="section section--alt">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Core Deliverables</span>
      <h2 class="section-title">What Every SEO Package Delivers</h2>
      <p class="section-lead">Six pillars that underpin every plan at every price point. No deliverable is cut to hit a price — scope is scaled, not quality.</p>
    </div>
    <div class="deliv-grid">
      <div class="deliv-card">
        <div class="deliv-icon"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></div>
        <h3 class="deliv-title">Technical SEO Audit &amp; Fixes</h3>
        <p class="deliv-text">Every campaign begins with a free audit covering crawl architecture, indexation, Core Web Vitals, structured data, mobile usability, and site speed. Issues are prioritised by ranking impact, not just volume.</p>
      </div>
      <div class="deliv-card">
        <div class="deliv-icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
        <h3 class="deliv-title">On-Page Optimisation</h3>
        <p class="deliv-text">Meta titles, descriptions, header hierarchies, internal linking, schema markup, and image optimisation applied to every page in scope. Changes are documented so you always know what was done and why.</p>
      </div>
      <div class="deliv-card">
        <div class="deliv-icon"><svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
        <h3 class="deliv-title">SEO Content Creation</h3>
        <p class="deliv-text">Original, keyword-researched content produced for your site each month. Every piece is written against a documented brief, reviewed for search intent, and published with correct on-page structure before going live.</p>
      </div>
      <div class="deliv-card">
        <div class="deliv-icon"><svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg></div>
        <h3 class="deliv-title">Link Building</h3>
        <p class="deliv-text">Niche-relevant backlinks from real websites your audience reads. Every placement is manually reviewed for relevance, domain quality, and editorial standards. No private blog networks, no link farms.</p>
      </div>
      <div class="deliv-card">
        <div class="deliv-icon"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8m-4-4v4"/></svg></div>
        <h3 class="deliv-title">AI Search &amp; GEO Visibility</h3>
        <p class="deliv-text">In 2026, ranking in Google AI Overviews, ChatGPT, and Perplexity requires different work than traditional SEO. Every package includes optimisation for generative engine visibility alongside conventional rankings.</p>
      </div>
      <div class="deliv-card">
        <div class="deliv-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3 class="deliv-title">Transparent Reporting</h3>
        <p class="deliv-text">Monthly reports in plain English covering keyword rankings, organic traffic, backlinks earned, Core Web Vitals scores, and goal conversions. No agency jargon, no selective metrics, no fluff.</p>
      </div>
    </div>
  </div>
</section>

<!-- WHO IS EACH PACKAGE FOR -->
<section class="section">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Which Plan Fits You?</span>
      <h2 class="section-title">The Right SEO Package for Your Business</h2>
      <p class="section-lead">Not sure which tier suits your situation? Here is a plain-language guide to who each plan is built for.</p>
    </div>
    <div class="who-grid">
      <div class="who-card">
        <div class="who-badge">Starter &nbsp;$299/mo</div>
        <h3 class="who-title">New or Local Businesses</h3>
        <p class="who-text">You have a new website or a local service business with limited online competition. You want to establish a clean technical foundation, start ranking for a core set of local keywords, and build organic traffic without overextending your budget.</p>
      </div>
      <div class="who-card">
        <div class="who-badge">Growth &nbsp;$599/mo</div>
        <h3 class="who-title">Growing SMBs</h3>
        <p class="who-text">You are an established small or medium business that wants to compete for commercially valuable keywords, build content authority in your niche, and generate consistent inbound leads through organic search. This is the most popular tier.</p>
      </div>
      <div class="who-card">
        <div class="who-badge">Scale &nbsp;$999/mo</div>
        <h3 class="who-title">Competitive Markets</h3>
        <p class="who-text">You are in a competitive industry or major city where rankings require aggressive content output, a sustained link building programme, and monthly technical depth. You need a dedicated account manager and a strategy reviewed every two weeks.</p>
      </div>
      <div class="who-card">
        <div class="who-badge">Enterprise &nbsp;Custom</div>
        <h3 class="who-title">Multi-Market &amp; Ecommerce</h3>
        <p class="who-text">You operate across multiple countries or languages, run a large ecommerce site, or need international hreflang strategy across UK, US, Germany, and European markets. Your campaign needs senior-level direction and a bespoke deliverables scope.</p>
      </div>
    </div>
  </div>
</section>

<!-- AI SEARCH SECTION -->
<section class="section section--dark">
  <div class="container">
    <div class="ai-grid">
      <div>
        <div class="eyebrow eyebrow--lt">2026 SEO Differentiator</div>
        <h2 class="section-title section-title--white">Built for AI Search, Not Just Google Blue Links</h2>
        <p class="section-lead section-lead--white" style="max-width:none">In 2026, Google AI Overviews now appear above organic results for a large share of commercial queries. ChatGPT, Perplexity, and other AI assistants are answering questions that used to send traffic to your website. Businesses that only optimise for blue links are losing visibility they cannot see in their Analytics.</p>
        <p style="color:rgba(255,255,255,.65);font-size:.92rem;margin-top:14px;">Every YFG SEO package includes Generative Engine Optimisation (GEO): structured content built to be cited in AI-generated answers, entity authority work that helps AI systems recognise your brand as a trusted source, and schema configurations that feed structured data into AI result parsing. This is included in every plan, not sold as an upgrade.</p>
        <a href="/contact/" class="btn-teal" style="margin-top:22px">Get a GEO-Ready SEO Audit</a>
      </div>
      <div>
        <div class="ai-image">
          <img src="<?php echo esc_url( YFG_URI . '/assets/images/seo-packages/seo-packages-ai.webp' ); ?>" alt="AI search results and generative engine optimisation analytics" loading="lazy">
        </div>
        <div class="ai-badge-strip">
          <div class="ai-badge"><span class="ai-badge-icon">&#129302;</span><div><span class="ai-badge-title">Google AI Overviews</span><span class="ai-badge-desc">Content structured to be cited in Google's AI-generated answer boxes.</span></div></div>
          <div class="ai-badge"><span class="ai-badge-icon">&#128172;</span><div><span class="ai-badge-title">ChatGPT &amp; Perplexity</span><span class="ai-badge-desc">Entity and brand authority work that gets your business cited in AI answers.</span></div></div>
          <div class="ai-badge"><span class="ai-badge-icon">&#128200;</span><div><span class="ai-badge-title">Traditional Rankings Too</span><span class="ai-badge-desc">AI Search work builds on solid SEO foundations, not instead of them.</span></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="section section--alt">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Getting Started</span>
      <h2 class="section-title">How Our SEO Process Works</h2>
      <p class="section-lead">From first conversation to first rankings movement in four clear steps.</p>
    </div>
    <div class="steps-grid">
      <div class="step-card">
        <div class="step-num">1</div>
        <h3 class="step-title">Free Audit</h3>
        <p class="step-desc">We audit your site for free: technical health, keyword gaps, backlink profile, and AI search visibility. You get a prioritised report before spending anything.</p>
      </div>
      <div class="step-card">
        <div class="step-num">2</div>
        <h3 class="step-title">Strategy &amp; Proposal</h3>
        <p class="step-desc">We recommend the right package based on your market, competition level, and goals. You receive a written strategy, deliverables list, and pricing within two business days.</p>
      </div>
      <div class="step-card">
        <div class="step-num">3</div>
        <h3 class="step-title">Month One Kickoff</h3>
        <p class="step-desc">Technical fixes are deployed, keyword targets are locked, content briefs are approved, and link outreach begins. You approve everything before it goes live.</p>
      </div>
      <div class="step-card">
        <div class="step-num">4</div>
        <h3 class="step-title">Ongoing Growth</h3>
        <p class="step-desc">Each month the team delivers against the plan, sends a plain-English report, and reviews performance against targets. Strategy adjusts as your rankings data matures.</p>
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
    </div>
  </div>
</section>

<!-- WHY YFG VS COMPETITORS -->
<section class="section">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Why Choose YFG</span>
      <h2 class="section-title">YFG vs WebFX vs In-House SEO</h2>
      <p class="section-lead">WebFX starts at $1,500/mo. In-house hires cost $40,000–$80,000/year in salary alone. Here is where Your Firm Growth sits.</p>
    </div>
    <div style="border-radius:var(--r);overflow:hidden;box-shadow:var(--shadow-sm)">
      <table class="comp-table">
        <thead>
          <tr>
            <th style="width:32%">Factor</th>
            <th>Your Firm Growth</th>
            <th>WebFX / Large Agency</th>
            <th>In-House SEO Hire</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Starting monthly price</td><td><span class="cy">$299/mo</span></td><td>$1,500–$2,500/mo</td><td>$3,300–$6,500/mo salary equiv.</td></tr>
          <tr><td>Free audit before commitment</td><td><span class="cy">Yes</span></td><td><span class="">Rarely</span></td><td>N/A</td></tr>
          <tr><td>AI Search / GEO included</td><td><span class="cy">Yes, every plan</span></td><td><span class="cw">Premium add-on</span></td><td><span class="cw">Depends on skills</span></td></tr>
          <tr><td>GDPR-compliant for UK &amp; EU</td><td><span class="cy">Yes</span></td><td><span class="cw">Rarely confirmed</span></td><td><span class="cw">Depends on training</span></td></tr>
          <tr><td>Multi-market (UK, US, DE, EU)</td><td><span class="cy">Yes</span></td><td><span class="">Usually US-only</span></td><td><span class="">Limited capacity</span></td></tr>
          <tr><td>Full-service (SEO + web + social)</td><td><span class="cy">Yes</span></td><td><span class="cy">Yes</span></td><td><span class="">SEO only</span></td></tr>
          <tr><td>No annual contract lock-in</td><td><span class="cy">Yes (3mo then monthly)</span></td><td><span class="">Often 6–12 months</span></td><td>N/A</td></tr>
          <tr><td>No setup fee</td><td><span class="cy">Yes</span></td><td><span class="">Often $750–$1,000</span></td><td>N/A</td></tr>
          <tr><td>Transparent monthly reporting</td><td><span class="cy">Yes</span></td><td><span class="cy">Yes</span></td><td>Internal only</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- INLINE CTA 2 (LIGHT) -->
<section style="padding:0 0 56px">
  <div class="container">
    <div style="background:var(--teal-lt);border:1.5px solid var(--teal-mid);border-radius:var(--rl);padding:40px 48px;display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap">
      <div>
        <div style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:1.3rem;color:var(--navy);margin-bottom:6px">SEO packages from $299/mo &nbsp;&middot;&nbsp; Free audit &nbsp;&middot;&nbsp; No setup fee &nbsp;&middot;&nbsp; No annual contract</div>
        <p style="color:var(--muted);font-size:.875rem;margin:0">We audit your site for free before recommending a plan. No commitment until you have seen the plan, the deliverables, and the pricing in writing.</p>
      </div>
      <a href="/contact/" class="btn-teal btn-teal-lg" style="flex-shrink:0">Get My Free SEO Audit</a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="section section--alt">
  <div class="container">
    <div class="section-header section-header--center">
      <span class="eyebrow">Common Questions</span>
      <h2 class="section-title">SEO Packages FAQ</h2>
    </div>
    <div class="faq-wrap">

      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">What do SEO packages include?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">YFG's monthly SEO packages include a technical audit, on-page optimisation, keyword research, original SEO content creation, quality link building, local SEO management, AI Search and GEO visibility work, and a plain-English monthly report. Every plan starts with a free audit before any work begins. The full deliverables for each tier are listed in the table above.</div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">How much do monthly SEO packages cost?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">YFG's search engine optimisation packages start at $299 per month for the Starter plan, $599 for Growth, and $999 for Scale. Enterprise pricing is scoped on request. No plan carries a setup fee. After a 3-month initial period, contracts move to rolling monthly terms. GBP and EUR pricing is available for UK and European clients on request.</div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">How long before SEO packages show results?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">Most businesses see measurable improvements in keyword rankings and organic traffic within 3 to 6 months. Technical fixes often show results sooner; content and link building compound over 6 to 12 months. Competitive industries take longer than low-competition niches. We set realistic timelines during the free audit based on your specific market and starting position.</div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">What is the best SEO package for a small business?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">For most small businesses, the Growth plan at $599/month is the right starting point. It covers 40 keywords, 25 pages, 4 content pieces per month, 6 backlinks, local SEO management, and AI Search optimisation. If your niche is low-competition and your budget is tighter, the Starter at $299 is a solid foundation. The free audit we run beforehand confirms which plan matches your market before you commit.</div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">Are professional SEO packages worth it?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">Yes, provided the package is built around real work rather than automated shortcuts. Cheap SEO under $200/month typically relies on thin content, spammy links, and outdated tactics that can result in Google penalties. Professional SEO packages from a legitimate agency produce compounding returns: unlike paid ads, the rankings and authority built each month remain even if you eventually pause the campaign.</div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">What makes your SEO packages different for UK and European businesses?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">Most large SEO agencies are US-based and build packages around US search behaviour and US Google. YFG serves UK, US, German, and European markets from a single team. Our packages include GDPR-compliant data handling, hreflang strategy for international sites, regional keyword research calibrated to UK and European search intent, and content written in the correct regional register.</div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" onclick="toggleFaq(this)">Do your SEO packages include AI Search and Google AI Overviews?<span class="faq-icon"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="faq-body">Yes. Every plan includes Generative Engine Optimisation (GEO) at a level appropriate to the tier. This means content structured to be cited in Google AI Overviews, entity and brand authority work that helps ChatGPT and Perplexity recognise your business as a credible source, and schema configurations that feed structured data to AI result parsing. This is included in every plan, not sold as a separate add-on.</div>
      </div>

    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="cta-final">
  <div class="container">
    <div class="cta-inner">
      <div class="eyebrow eyebrow--lt" style="margin:0 auto 16px">Free SEO Audit &mdash; No Obligation</div>
      <h2 class="cta-title">Start Ranking Higher This Month</h2>
      <p class="cta-lead">Tell us your website, your market, and your goals. yourfirmgrowth.com will audit your site for free, identify the exact issues holding your rankings back, and recommend the right SEO package for your budget.</p>
      <div class="cta-btns">
        <a href="/contact/" class="btn-teal btn-teal-lg">Get My Free SEO Audit</a>
        <a href="mailto:info@yourfirmgrowth.com" class="btn-outline-w">Email Us Directly</a>
      </div>
      <p class="cta-note">No setup fee &nbsp;&middot;&nbsp; No annual contract &nbsp;&middot;&nbsp; Response within 1 business day</p>
    </div>
  </div>
</section>

<!-- FOOTER -->
<!-- <footer class="footer">
  <div class="container">
    <div class="footer-inner">
      <a href="/"><img src="data:image/png;base64,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" alt="Your Firm Growth" style="height:36px;width:auto"></a>
      <div class="footer-links">
        <a href="/services/">Services</a>
        <a href="/seo-packages/">SEO Packages</a>
        <a href="/blog/">Blog</a>
        <a href="/about/">About</a>
        <a href="/privacy-policy/">Privacy</a>
        <a href="/contact/">Contact</a>
      </div>
      <div class="footer-copy">&copy; 2026 Your Firm Growth. All rights reserved.</div>
    </div>
  </div>
</footer> -->

<script>
function toggleFaq(btn){
  var body=btn.nextElementSibling,isOpen=btn.classList.contains('open');
  document.querySelectorAll('.faq-btn').forEach(function(b){b.classList.remove('open');b.nextElementSibling.classList.remove('open')});
  if(!isOpen){btn.classList.add('open');body.classList.add('open')}
}
(function(){
  var bar=document.getElementById('sbar'),shown=false;
  window.addEventListener('scroll',function(){
    if(!shown&&window.scrollY>500){bar.classList.add('show');shown=true}
  });
})();
</script>
</body>
</html>
<?php
get_footer();
