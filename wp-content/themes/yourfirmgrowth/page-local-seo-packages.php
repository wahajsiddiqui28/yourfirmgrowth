<?php
/**
 * Template Name: Local SEO Packages
 *
 * SEO team ka standalone landing page — ab theme ke header/footer ke saath.
 * Images local (assets/images/local-seo-packages/), .btn header-leak scoped.
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<style>
/* ─── EXACT BRAND TOKENS ─── */
:root {
  --N:    #072F58; /* navy */
  --ND:   #041D3A; /* navy deep */
  --NM:   #0D3D72; /* navy mid */
  --T:    #038791; /* teal */
  --TD:   #026870; /* teal dark */
  --TL:   #E0F5F5; /* teal light */
  --TM:   #A8E3E6; /* teal mid */
  --W:    #FFFFFF;
  --BG:   #F3F7FC;
  --BGA:  #E8EFF8;
  --TXT:  #0E1C30;
  --MUT:  #536070;
  --BOR:  #D4DFEe;
  --GRN:  #10B981;
  --AMB:  #F59E0B;
  --sh1:  0 2px 8px rgba(7,47,88,.08);
  --sh2:  0 8px 32px rgba(7,47,88,.13);
  --sh3:  0 20px 60px rgba(7,47,88,.18);
  --r:    10px;
  --rl:   18px;
}
/* Globals theme se conflict karte the — isliye body/h/p/a/ul/.container comment (page-seo-packages jaisa). */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
/* body{font-family:'Inter',system-ui,sans-serif;font-size:16px;line-height:1.7;color:var(--TXT);background:var(--W);-webkit-font-smoothing:antialiased}
h1,h2,h3,h4,h5{font-family:'Plus Jakarta Sans',system-ui,sans-serif;font-weight:700;line-height:1.2;color:var(--N)}
p{margin-bottom:.9rem}p:last-child{margin-bottom:0}
a{color:var(--TD);text-decoration:none}a:hover{text-decoration:underline}
ul{list-style:none}
.container{width:100%;max-width:1160px;margin:0 auto;padding:0 24px} */
img{max-width:100%;height:auto;display:block}
.sec{padding:84px 0}.sec-alt{background:var(--BG)}.sec-dark{background:linear-gradient(150deg,var(--ND) 0%,var(--N) 100%)}

/* LABELS */
.chip{display:inline-flex;align-items:center;gap:6px;background:rgba(3,135,145,.13);border:1px solid rgba(3,135,145,.28);border-radius:50px;padding:4px 13px;font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--T);margin-bottom:12px}
.chip-lt{background:rgba(3,135,145,.2);border-color:rgba(3,135,145,.38);color:var(--TM)}
.sec-h{font-size:clamp(1.65rem,2.6vw,2.35rem);margin-bottom:12px;color:var(--N)}
.sec-h-w{color:var(--W)}
.sec-p{font-size:1rem;color:var(--MUT);max-width:580px;line-height:1.7}
.sec-p-w{color:rgba(255,255,255,.68)}
.hdr{margin-bottom:48px}.hdr-c{text-align:center}.hdr-c .sec-p{margin:0 auto}

/* BUTTONS — .btn ki jagah page ke actual button classes (header .site-header__cta.btn leak rokne ke liye) */
.bt,.bw,.bo,.bon{display:inline-flex;align-items:center;justify-content:center;gap:7px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;border-radius:50px;transition:all .22s;cursor:pointer;text-decoration:none;border:none;white-space:nowrap}
.bt{background:linear-gradient(135deg,var(--T),var(--TD));color:var(--W);padding:13px 28px;font-size:.92rem;box-shadow:0 4px 18px rgba(3,135,145,.38)}
.bt:hover{transform:translateY(-2px);box-shadow:0 8px 26px rgba(3,135,145,.5);color:var(--W);text-decoration:none}
.bt-lg{padding:16px 36px;font-size:1rem}
.bw{background:var(--W);color:var(--N);padding:13px 28px;font-size:.92rem;box-shadow:0 4px 14px rgba(7,47,88,.18)}
.bw:hover{background:var(--TL);color:var(--N);text-decoration:none;transform:translateY(-2px)}
.bo{background:transparent;color:var(--W);padding:13px 28px;font-size:.92rem;border:2px solid rgba(255,255,255,.38)}
.bo:hover{border-color:var(--T);color:var(--T);text-decoration:none}
.bon{background:transparent;color:var(--N);padding:11px 24px;font-size:.88rem;border:2px solid var(--BOR)}
.bon:hover{border-color:var(--T);color:var(--T);text-decoration:none}

/* STICKY BAR */
.sb{position:fixed;bottom:0;left:0;right:0;z-index:999;background:var(--N);border-top:2px solid var(--T);padding:13px 24px;display:flex;align-items:center;justify-content:space-between;gap:16px;transform:translateY(100%);transition:transform .35s ease;box-shadow:0 -4px 24px rgba(7,47,88,.3)}
.sb.on{transform:translateY(0)}
.sbt{font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.93rem;color:var(--W)}
.sbt span{color:var(--T)}
.sbs{font-size:.76rem;color:rgba(255,255,255,.48);font-weight:400}
.sbx{background:none;border:none;cursor:pointer;padding:4px;color:rgba(255,255,255,.38);font-size:1.3rem;line-height:1}
.sbx:hover{color:var(--W)}

/* ─── HERO (MAP-INSPIRED, UNIQUE LAYOUT) ─── */
.hero{position:relative;overflow:hidden;min-height:600px;display:flex;align-items:center;background:linear-gradient(150deg,var(--ND) 0%,var(--N) 50%,#0B3D5C 100%);padding:88px 0}
.hero-map-bg{position:absolute;inset:0;background-image:url('<?php echo esc_url( YFG_URI . '/assets/images/local-seo-packages/local-seo-packages-hero-bg.webp' ); ?>');background-size:cover;background-position:center;opacity:.06}
/* decorative map grid lines */
.hero-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(3,135,145,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(3,135,145,.05) 1px,transparent 1px);background-size:40px 40px;pointer-events:none}
.hero-glow{position:absolute;right:-100px;top:-100px;width:600px;height:600px;background:radial-gradient(circle,rgba(3,135,145,.13) 0%,transparent 65%);pointer-events:none}
.hero-glow2{position:absolute;left:-80px;bottom:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(7,47,88,.5) 0%,transparent 70%);pointer-events:none}
/* location pin decorations */
.pin-deco{position:absolute;opacity:.12;pointer-events:none}
.pin-deco-1{top:80px;right:320px;font-size:2.5rem}
.pin-deco-2{top:200px;right:100px;font-size:1.8rem}
.pin-deco-3{bottom:100px;right:250px;font-size:2rem}

.hero-inner{position:relative;z-index:2;display:grid;grid-template-columns:1fr 440px;gap:52px;align-items:center}
.hero-h1{font-size:clamp(2.1rem,4.2vw,3.4rem);font-weight:800;color:var(--W);line-height:1.08;letter-spacing:-.022em;margin-bottom:18px}
.hero-h1 .hl{color:var(--T);position:relative}
.hero-ans{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);border-left:3px solid var(--T);border-radius:0 7px 7px 0;padding:13px 16px;margin-bottom:28px;font-size:.9rem;color:rgba(255,255,255,.8);line-height:1.65;max-width:640px}
.hero-ans strong{color:var(--W)}
.hero-ctas{display:flex;flex-wrap:wrap;gap:11px;margin-bottom:16px}
.hero-note{font-size:.76rem;color:rgba(255,255,255,.36)}

/* GBP CARD MOCKUP in hero */
.gbp-card{background:var(--W);border-radius:var(--r);box-shadow:var(--sh3);overflow:hidden;border:1px solid var(--BOR)}
.gbp-card-map{height:140px;background:linear-gradient(135deg,#e8f4f0 0%,#d4ece7 100%);position:relative;overflow:hidden}
.gbp-card-map img{width:100%;height:100%;object-fit:cover}
.gbp-card-map-overlay{position:absolute;inset:0;background:rgba(7,47,88,.1)}
.gbp-pin{position:absolute;top:40%;left:50%;transform:translate(-50%,-50%);font-size:2rem;filter:drop-shadow(0 2px 4px rgba(0,0,0,.3))}
.gbp-body{padding:16px}
.gbp-biz{font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:1.05rem;color:var(--N);margin-bottom:3px}
.gbp-cat{font-size:.78rem;color:var(--MUT);margin-bottom:8px}
.gbp-stars{display:flex;align-items:center;gap:5px;margin-bottom:10px}
.gbp-star{color:#F59E0B;font-size:.9rem}
.gbp-rat{font-size:.82rem;color:var(--MUT);font-weight:600}
.gbp-actions{display:flex;gap:8px;margin-bottom:10px}
.gbp-act-btn{flex:1;padding:7px 8px;border-radius:6px;font-size:.75rem;font-weight:700;text-align:center;border:1.5px solid var(--T);color:var(--T);cursor:pointer;transition:all .2s;font-family:'Plus Jakarta Sans',sans-serif}
.gbp-act-btn:hover{background:var(--T);color:var(--W)}
.gbp-info{display:flex;flex-direction:column;gap:5px}
.gbp-info-row{display:flex;align-items:flex-start;gap:8px;font-size:.77rem;color:var(--MUT)}
.gbp-info-row span:first-child{flex-shrink:0;margin-top:1px}
.gbp-rank-badge{background:linear-gradient(135deg,var(--T),var(--TD));color:var(--W);font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.7rem;letter-spacing:.06em;text-transform:uppercase;padding:5px 12px;margin:12px -16px -16px;display:block;text-align:center}

/* ─── TRUST BAR ─── */
.trust{background:var(--ND);border-bottom:1px solid rgba(255,255,255,.07);padding:14px 0}
.trust-in{display:flex;flex-wrap:wrap;align-items:center;justify-content:center}
.ti{display:flex;align-items:center;gap:7px;font-size:.79rem;font-weight:600;color:rgba(255,255,255,.62);padding:5px 18px;border-right:1px solid rgba(255,255,255,.08)}
.ti:last-child{border-right:none}
.tidot{width:7px;height:7px;border-radius:50%;background:var(--T);flex-shrink:0}

/* ─── LOCAL STATS PILLS ─── */
.stats-pills{display:flex;flex-wrap:wrap;gap:14px;justify-content:center;margin-bottom:52px}
.stat-pill{background:var(--W);border:1.5px solid var(--BOR);border-radius:50px;padding:14px 24px;display:flex;align-items:center;gap:12px;box-shadow:var(--sh1)}
.stat-pill-num{font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:1.6rem;color:var(--N);letter-spacing:-.02em;line-height:1}
.stat-pill-num em{color:var(--T);font-style:normal}
.stat-pill-txt{font-size:.78rem;color:var(--MUT);max-width:120px;line-height:1.4}

/* ─── IMAGE SECTION 1: FULL WIDTH BANNER ─── */
.img-banner{position:relative;overflow:hidden;height:320px}
.img-banner img{width:100%;height:100%;object-fit:cover;object-position:center 40%}
.img-banner-overlay{position:absolute;inset:0;background:linear-gradient(90deg,rgba(4,29,58,.88) 0%,rgba(4,29,58,.5) 60%,rgba(4,29,58,.2) 100%)}
.img-banner-content{position:absolute;inset:0;display:flex;align-items:center}
.img-banner-text{max-width:520px;padding:0 24px 0 calc((100% - 1160px)/2 + 24px)}
.img-banner-text h2{font-size:clamp(1.5rem,3vw,2.2rem);color:var(--W);margin-bottom:10px}
.img-banner-text p{font-size:.92rem;color:rgba(255,255,255,.75);margin-bottom:20px}

/* ─── PACKAGES ─── */
.pkg-wrap{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;align-items:start}
.pc{background:var(--W);border-radius:var(--rl);padding:28px 22px;position:relative;border:1.5px solid var(--BOR);box-shadow:var(--sh1);transition:all .28s}
.pc:hover{box-shadow:var(--sh2);transform:translateY(-4px)}
.pc-hot{background:var(--N);border-color:var(--T);box-shadow:0 0 0 1px var(--T),var(--sh3);transform:translateY(-12px)}
.pc-hot:hover{transform:translateY(-16px);box-shadow:0 0 0 1px var(--T),0 24px 64px rgba(3,135,145,.22)}
.pc-badge{position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:linear-gradient(90deg,var(--T),var(--TD));color:var(--W);font-size:.66rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:4px 14px;border-radius:50px;white-space:nowrap}
.pc-loc-tag{display:inline-flex;align-items:center;gap:5px;background:var(--TL);color:var(--TD);font-size:.68rem;font-weight:700;padding:3px 10px;border-radius:50px;margin-bottom:10px}
.pc-hot .pc-loc-tag{background:rgba(3,135,145,.2);color:var(--TM)}
.pc-name{font-size:.7rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--T);margin-bottom:7px}
.pc-hot .pc-name{color:var(--TM)}
.pc-price{margin-bottom:3px}
.pc-amt{font-family:'Plus Jakarta Sans',sans-serif;font-size:2.4rem;font-weight:800;color:var(--N);letter-spacing:-.03em;line-height:1}
.pc-hot .pc-amt{color:var(--W)}
.pc-per{font-size:.8rem;color:var(--MUT)}
.pc-hot .pc-per{color:rgba(255,255,255,.52)}
.pc-desc{font-size:.78rem;color:var(--MUT);line-height:1.5;margin:11px 0 18px;padding-bottom:18px;border-bottom:1px solid var(--BOR)}
.pc-hot .pc-desc{color:rgba(255,255,255,.52);border-bottom-color:rgba(255,255,255,.12)}
.pc-list{list-style:none;display:flex;flex-direction:column;gap:8px;margin-bottom:22px}
.pi{display:flex;align-items:flex-start;gap:8px;font-size:.8rem;color:var(--TXT);line-height:1.45}
.pc-hot .pi{color:rgba(255,255,255,.84)}
.pi-y{width:15px;height:15px;border-radius:50%;background:var(--TL);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px}
.pc-hot .pi-y{background:rgba(3,135,145,.25)}
.pi-y svg{width:8px;height:8px;stroke:var(--T);stroke-width:3;fill:none}
.pc-hot .pi-y svg{stroke:#50D8DF}
.pi-n{width:15px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.65rem;color:var(--BOR);margin-top:3px}
.pc-btn{display:block;text-align:center;padding:12px 14px;border-radius:50px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.84rem;transition:all .22s;text-decoration:none;cursor:pointer;border:none;width:100%}
.pc-btn-d{background:var(--BG);color:var(--N);border:1.5px solid var(--BOR)}
.pc-btn-d:hover{background:var(--TL);border-color:var(--T);color:var(--N);text-decoration:none}
.pc-btn-h{background:linear-gradient(135deg,var(--T),var(--TD));color:var(--W);box-shadow:0 4px 14px rgba(3,135,145,.42)}
.pc-btn-h:hover{transform:translateY(-2px);box-shadow:0 8px 22px rgba(3,135,145,.52);color:var(--W);text-decoration:none}
.pkg-note{text-align:center;font-size:.76rem;color:var(--MUT);margin-top:22px}

/* ─── INLINE CTA ─── */
.icta{background:linear-gradient(135deg,var(--N) 0%,#0A3D5C 100%);border-radius:var(--rl);padding:44px 48px;display:flex;align-items:center;justify-content:space-between;gap:24px;position:relative;overflow:hidden}
.icta::after{content:'📍';position:absolute;right:200px;top:-10px;font-size:6rem;opacity:.06;pointer-events:none}
.icta h3{font-size:1.5rem;color:var(--W);margin-bottom:7px}
.icta p{color:rgba(255,255,255,.62);font-size:.88rem;max-width:460px}
.icta-btns{display:flex;gap:11px;flex-shrink:0;flex-wrap:wrap}

/* ─── IMAGE SECTION 2: GBP SPLIT ─── */
.gbp-split{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
.gbp-phone-wrap{position:relative}
.gbp-phone-img{border-radius:var(--rl);overflow:hidden;box-shadow:var(--sh3)}
.gbp-phone-img img{width:100%;height:auto;display:block}
.gbp-float-card{position:absolute;bottom:24px;right:-28px;background:var(--W);border-radius:var(--r);padding:14px 18px;box-shadow:var(--sh2);border:1.5px solid var(--BOR);min-width:180px}
.gfc-label{font-size:.68rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--T);margin-bottom:6px}
.gfc-stat{font-family:'Plus Jakarta Sans',sans-serif;font-size:1.8rem;font-weight:800;color:var(--N);letter-spacing:-.02em;line-height:1}
.gfc-sub{font-size:.72rem;color:var(--MUT);margin-top:3px}

/* MAP PACK MOCKUP */
.mappack-wrap{background:var(--W);border:1.5px solid #dadce0;border-radius:10px;box-shadow:0 2px 12px rgba(0,0,0,.1);overflow:hidden;max-width:480px}
.mp-header{background:#f8f9fa;border-bottom:1px solid #dadce0;padding:10px 14px;display:flex;align-items:center;gap:8px}
.mp-search{flex:1;background:var(--W);border:1px solid #dadce0;border-radius:20px;padding:6px 14px;font-size:.78rem;color:#5f6368}
.mp-map-thumb{height:100px;background:linear-gradient(135deg,#e8f5e9 0%,#c8e6c9 50%,#dcedc8 100%);position:relative;overflow:hidden;border-bottom:1px solid #dadce0}
.mp-map-thumb img{width:100%;height:100%;object-fit:cover;opacity:.7}
.mp-results{display:flex;flex-direction:column}
.mp-result{display:flex;align-items:flex-start;gap:10px;padding:11px 14px;border-bottom:1px solid #f0f0f0;cursor:pointer;transition:background .15s}
.mp-result:hover{background:#f8f9fa}
.mp-result:last-child{border-bottom:none}
.mp-result-num{width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.65rem;font-weight:700;flex-shrink:0;margin-top:1px}
.r1 .mp-result-num{background:#072F58;color:var(--W)}
.r2 .mp-result-num{background:#e8f0fe;color:#1a73e8}
.r3 .mp-result-num{background:#e8f0fe;color:#1a73e8}
.mp-result-name{font-size:.8rem;font-weight:700;color:#202124;margin-bottom:2px}
.mp-result-cat{font-size:.72rem;color:#70757a;margin-bottom:3px}
.mp-result-stars{font-size:.7rem;color:#F59E0B}
.mp-result-dist{font-size:.7rem;color:#70757a}
.mp-position-badge{position:absolute;top:8px;left:8px;background:rgba(7,47,88,.85);color:var(--W);font-size:.7rem;font-weight:700;padding:3px 10px;border-radius:20px}

/* ─── IMAGE SECTION 3: THREE-COLUMN PHOTO GRID ─── */
.photo-grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.pg-card{border-radius:var(--rl);overflow:hidden;position:relative;box-shadow:var(--sh2)}
.pg-card img{width:100%;height:260px;object-fit:cover;transition:transform .4s ease}
.pg-card:hover img{transform:scale(1.04)}
.pg-overlay{position:absolute;inset:0;background:linear-gradient(0deg,rgba(4,29,58,.82) 0%,rgba(4,29,58,.2) 50%,transparent 100%)}
.pg-content{position:absolute;bottom:0;left:0;right:0;padding:20px 18px}
.pg-icon{font-size:1.8rem;margin-bottom:8px}
.pg-title{font-family:'Plus Jakarta Sans',sans-serif;font-size:1rem;font-weight:700;color:var(--W);margin-bottom:4px}
.pg-desc{font-size:.78rem;color:rgba(255,255,255,.72);line-height:1.5}

/* ─── DELIVERABLES TABS ─── */
.tab-nav{display:flex;gap:0;background:var(--BGA);border-radius:10px;padding:5px;margin-bottom:32px;overflow-x:auto}
.tab-btn{padding:10px 20px;border-radius:7px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;font-size:.84rem;cursor:pointer;border:none;background:transparent;color:var(--MUT);transition:all .22s;white-space:nowrap}
.tab-btn.active{background:var(--W);color:var(--N);box-shadow:var(--sh1)}
.tab-pane{display:none;animation:fadeIn .25s ease}
.tab-pane.active{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
@keyframes fadeIn{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}
.dv-card{background:var(--W);border:1.5px solid var(--BOR);border-left:3px solid var(--T);border-radius:0 var(--r) var(--r) 0;padding:20px 20px 20px 22px;box-shadow:var(--sh1)}
.dv-title{font-size:.9rem;font-weight:700;color:var(--N);margin-bottom:6px}
.dv-text{font-size:.82rem;color:var(--MUT);line-height:1.6}

/* ─── STEPS ─── */
.steps-h{display:grid;grid-template-columns:repeat(4,1fr);gap:0;position:relative}
.steps-h::before{content:'';position:absolute;top:28px;left:calc(12.5% + 14px);right:calc(12.5% + 14px);height:2px;background:linear-gradient(90deg,var(--T),var(--TD));opacity:.2}
.step{text-align:center;padding:0 12px}
.step-n{width:56px;height:56px;margin:0 auto 14px;background:linear-gradient(135deg,var(--N),var(--NM));border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Plus Jakarta Sans',sans-serif;font-size:1.2rem;font-weight:800;color:var(--T);border:2.5px solid rgba(3,135,145,.22);position:relative;z-index:1}
.step-t{font-size:.95rem;font-weight:700;margin-bottom:6px;color:var(--N)}
.step-d{font-size:.82rem;color:var(--MUT);line-height:1.65}

/* ─── COMPARE TABLE ─── */
.ctb{width:100%;border-collapse:collapse;font-size:.84rem;border-radius:var(--r);overflow:hidden;box-shadow:var(--sh1)}
.ctb thead{background:var(--N)}
.ctb thead th{padding:14px 18px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.79rem;text-align:left;color:rgba(255,255,255,.78)}
.ctb thead th:nth-child(2){background:rgba(3,135,145,.18);color:var(--TM)}
.ctb tbody tr{border-bottom:1px solid var(--BOR);background:var(--W)}
.ctb tbody tr:hover{background:var(--BG)}
.ctb td{padding:12px 18px;vertical-align:middle;color:var(--TXT)}
.ctb td:nth-child(2){background:rgba(224,245,245,.35)}
.cy{color:var(--T);font-weight:700}.cn{color:var(--BOR)}.cw{color:var(--AMB);font-size:.79rem;font-weight:600}

/* ─── FAQ (TWO-COLUMN) ─── */
.faq-2col{display:grid;grid-template-columns:1fr 1fr;gap:0 40px}
.fq-item{border-bottom:1px solid var(--BOR)}
.fq-item:first-child,.fq-item:nth-child(2){border-top:1px solid var(--BOR)}
.fq-btn{width:100%;display:flex;align-items:center;justify-content:space-between;gap:10px;padding:18px 0;background:none;border:none;cursor:pointer;text-align:left;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.9rem;color:var(--N);transition:color .2s}
.fq-btn:hover,.fq-btn.open{color:var(--T)}
.fq-ic{width:26px;height:26px;background:var(--BG);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .2s,transform .25s}
.fq-btn.open .fq-ic{background:var(--TL);transform:rotate(45deg)}
.fq-ic svg{width:12px;height:12px;stroke:var(--MUT);stroke-width:2.5;fill:none}
.fq-btn.open .fq-ic svg{stroke:var(--T)}
.fq-body{display:none;padding-bottom:16px;font-size:.86rem;color:var(--MUT);line-height:1.7}
.fq-body.open{display:block}

/* ─── FINAL CTA ─── */
.fcta{padding:96px 0;text-align:center;background:linear-gradient(150deg,var(--ND) 0%,var(--N) 50%,#0A3D5C 100%);position:relative;overflow:hidden}
.fcta::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 68% 55% at 50% 115%,rgba(3,135,145,.18),transparent);pointer-events:none}
.fcta::after{content:'📍📍📍';position:absolute;bottom:-20px;left:50%;transform:translateX(-50%);font-size:5rem;opacity:.04;letter-spacing:40px;pointer-events:none}
.fcta-in{position:relative;z-index:1;max-width:580px;margin:0 auto}
.fcta-h{font-size:clamp(1.9rem,3.8vw,2.8rem);font-weight:800;color:var(--W);letter-spacing:-.02em;margin-bottom:12px;line-height:1.15}
.fcta-p{font-size:1rem;color:rgba(255,255,255,.66);margin-bottom:36px;line-height:1.65}
.fcta-note{font-size:.74rem;color:rgba(255,255,255,.28);margin-top:16px}

/* ─── RESPONSIVE ─── */
@media(max-width:1100px){
  .hero-inner{grid-template-columns:1fr}
  .gbp-card{display:none}
  .pkg-wrap{grid-template-columns:repeat(2,1fr)}
  .pc-hot{transform:none}
  .pc-hot:hover{transform:translateY(-4px)}
  .gbp-split{grid-template-columns:1fr;gap:32px}
  .gbp-float-card{right:16px}
  .faq-2col{grid-template-columns:1fr}
  .fq-item:nth-child(2){border-top:none}
}
@media(max-width:768px){
  .sec{padding:52px 0}
  .hero{padding:60px 0 56px;min-height:auto}
  .hero-ctas{flex-direction:column;align-items:flex-start}
  .stats-pills{gap:10px}
  .stat-pill{padding:10px 18px}
  .pkg-wrap{grid-template-columns:1fr;max-width:380px;margin:0 auto}
  .photo-grid-3{grid-template-columns:1fr}
  .pg-card img{height:200px}
  .steps-h{grid-template-columns:repeat(2,1fr)}
  .steps-h::before{display:none}
  .tab-pane.active{grid-template-columns:1fr}
  .icta{flex-direction:column;padding:28px 24px;text-align:center}
  .icta p{max-width:none}
  .img-banner{height:auto}
  .img-banner img{height:260px}
  .img-banner-text{padding:0 20px}
  .ti{border-right:none;border-bottom:1px solid rgba(255,255,255,.07);width:100%;justify-content:center}
  .ctb th,.ctb td{padding:9px 10px;font-size:.75rem}
}

/* ─── Local SEO Case Studies (inline — koi redirect nahi) ─── */
.lsp-cs-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.lsp-cs-card{background:var(--W);border:1.5px solid var(--BOR);border-radius:var(--rl);padding:24px;box-shadow:var(--sh1);display:flex;flex-direction:column;transition:box-shadow .25s,transform .25s}
.lsp-cs-card:hover{box-shadow:var(--sh2);transform:translateY(-4px)}
.lsp-cs-cat{display:inline-flex;align-items:center;gap:6px;align-self:flex-start;background:var(--TL);color:var(--TD);font-size:.66rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;padding:5px 12px;border-radius:50px;margin-bottom:12px;line-height:1.3}
.lsp-cs-title{font-family:'Plus Jakarta Sans',sans-serif;font-size:1.1rem;font-weight:700;color:var(--N);line-height:1.25;margin-bottom:6px}
.lsp-cs-loc{display:flex;align-items:center;gap:6px;font-size:.8rem;color:var(--MUT);margin-bottom:16px}
.lsp-cs-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;padding:14px 0;margin-bottom:14px;border-top:1px solid var(--BOR);border-bottom:1px solid var(--BOR)}
.lsp-cs-stat{text-align:center}
.lsp-cs-stat-v{font-family:'Plus Jakarta Sans',sans-serif;font-size:1.02rem;font-weight:800;color:var(--T);line-height:1.1;letter-spacing:-.01em}
.lsp-cs-stat-l{font-size:.64rem;color:var(--MUT);margin-top:3px;line-height:1.2}
.lsp-cs-summary{font-size:.84rem;color:var(--MUT);line-height:1.6;margin:0}

/* ─── Local SEO Portfolio (GBP screenshots) ─── */
.lsp-pf-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.lsp-pf-card{background:var(--W);border:1.5px solid var(--BOR);border-radius:var(--rl);overflow:hidden;box-shadow:var(--sh1);transition:box-shadow .25s,transform .25s}
.lsp-pf-card:hover{box-shadow:var(--sh2);transform:translateY(-4px)}
.lsp-pf-imgs{display:grid;grid-template-columns:1fr 1fr;gap:3px;background:#eef3f9}
.lsp-pf-imgs img{width:100%;height:88px;object-fit:cover;object-position:top;display:block}
.lsp-pf-imgs img:first-child{grid-column:1 / -1;height:150px}
.lsp-pf-body{padding:15px 18px 18px}
.lsp-pf-tag{display:inline-flex;align-items:center;gap:6px;font-size:.66rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--TD);margin-bottom:7px}
.lsp-pf-title{font-family:'Plus Jakarta Sans',sans-serif;font-size:.98rem;font-weight:700;color:var(--N);line-height:1.3}

@media(max-width:1000px){.lsp-cs-grid,.lsp-pf-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:640px){.lsp-cs-grid,.lsp-pf-grid{grid-template-columns:1fr}}

/* ─── Contact popup modal (same page) ─── */
body.lsp-modal-open{overflow:hidden}
.lsp-modal{position:fixed;inset:0;z-index:100000;display:none;align-items:center;justify-content:center;padding:20px}
.lsp-modal.is-open{display:flex}
.lsp-modal__overlay{position:absolute;inset:0;background:rgba(4,29,58,.62);-webkit-backdrop-filter:blur(3px);backdrop-filter:blur(3px)}
.lsp-modal__box{position:relative;background:var(--W);border-radius:var(--rl);max-width:520px;width:100%;max-height:90vh;overflow-y:auto;padding:30px 30px 26px;box-shadow:var(--sh3);animation:lspPop .2s ease}
@keyframes lspPop{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
.lsp-modal__close{position:absolute;top:14px;right:14px;width:32px;height:32px;border-radius:50%;background:var(--BG);border:none;cursor:pointer;font-size:1.35rem;line-height:1;color:var(--MUT)}
.lsp-modal__close:hover{background:var(--TL);color:var(--N)}
.lsp-modal__eyebrow{display:inline-flex;align-items:center;gap:6px;background:var(--TL);color:var(--TD);font-size:.66rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:5px 12px;border-radius:50px;margin-bottom:12px}
.lsp-modal__title{font-family:'Plus Jakarta Sans',sans-serif;font-size:1.35rem;font-weight:800;color:var(--N);margin-bottom:6px}
.lsp-modal__sub{font-size:.88rem;color:var(--MUT);margin-bottom:18px;line-height:1.55}
.lsp-form label{display:block;font-size:.8rem;font-weight:600;color:var(--N);margin-bottom:5px}
.lsp-form input,.lsp-form textarea{width:100%;border:1.5px solid var(--BOR);border-radius:9px;padding:11px 14px;font-family:inherit;font-size:.9rem;color:var(--TXT);background:var(--W);margin-bottom:13px;transition:border-color .18s}
.lsp-form input:focus,.lsp-form textarea:focus{outline:none;border-color:var(--T);box-shadow:0 0 0 3px rgba(3,135,145,.12)}
.lsp-form textarea{resize:vertical;min-height:92px}
.lsp-form .lsp-row{display:grid;grid-template-columns:1fr 1fr;gap:0 13px}
.lsp-submit{width:100%;background:linear-gradient(135deg,var(--T),var(--TD));color:var(--W);border:none;border-radius:50px;padding:14px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.95rem;cursor:pointer;transition:transform .2s,box-shadow .2s;margin-top:2px}
.lsp-submit:hover{transform:translateY(-2px);box-shadow:0 8px 22px rgba(3,135,145,.4)}
.lsp-note{font-size:.72rem;color:var(--MUT);text-align:center;margin-top:10px}
.lsp-formerr{background:#FEF2F2;border:1px solid #FECACA;color:#B91C1C;font-size:.82rem;padding:10px 14px;border-radius:9px;margin-bottom:14px;display:flex;align-items:center;gap:8px}
.lsp-thanks{text-align:center;padding:16px 0 6px}
.lsp-thanks__ic{width:64px;height:64px;margin:0 auto 16px;border-radius:50%;background:var(--TL);display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--T)}
.lsp-thanks h3{font-family:'Plus Jakarta Sans',sans-serif;font-size:1.3rem;font-weight:800;color:var(--N);margin-bottom:8px}
.lsp-thanks p{font-size:.9rem;color:var(--MUT);line-height:1.6}
@media(max-width:520px){.lsp-form .lsp-row{grid-template-columns:1fr}.lsp-modal__box{padding:24px 20px}}

/* ─── Mobile layout fixes: 2-col sections collapse + sticky bar compact ─── */
.lsp-split2{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
@media(max-width:900px){.lsp-split2{grid-template-columns:1fr;gap:32px}}
@media(max-width:768px){
  .sb{padding:10px 12px;gap:10px;max-width:100vw}
  .sb > div:first-child{min-width:0}
  .sbs{display:none}
  .sbt{font-size:.8rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
  .sb .bt{padding:9px 14px !important;font-size:.78rem !important}
}


/* ── LIGHTBOX ── */
.lsp-pf-imgs img{cursor:zoom-in}
.lsp-lb{position:fixed;inset:0;z-index:99999;background:rgba(4,29,58,.94);display:none;align-items:center;justify-content:center;padding:40px 20px;backdrop-filter:blur(4px)}
.lsp-lb.is-open{display:flex}
.lsp-lb__img{max-width:92vw;max-height:86vh;object-fit:contain;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,.5);animation:lspZoom .22s ease}
@keyframes lspZoom{from{opacity:0;transform:scale(.96)}to{opacity:1;transform:scale(1)}}
.lsp-lb__btn{position:absolute;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;width:46px;height:46px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.5rem;line-height:1;cursor:pointer;transition:background .2s,transform .2s}
.lsp-lb__btn:hover{background:rgba(3,135,145,.9);transform:scale(1.08)}
.lsp-lb__close{top:22px;right:22px;font-size:1.7rem}
.lsp-lb__prev{left:22px;top:50%;transform:translateY(-50%)}
.lsp-lb__next{right:22px;top:50%;transform:translateY(-50%)}
.lsp-lb__prev:hover,.lsp-lb__next:hover{transform:translateY(-50%) scale(1.08)}
.lsp-lb__count{position:absolute;bottom:22px;left:50%;transform:translateX(-50%);color:rgba(255,255,255,.75);font-size:.85rem;font-weight:600;letter-spacing:.05em}
body.lsp-lb-lock{overflow:hidden}
@media(max-width:600px){
  .lsp-lb__btn{width:38px;height:38px;font-size:1.2rem}
  .lsp-lb__close{top:14px;right:14px}
  .lsp-lb__prev{left:8px}.lsp-lb__next{right:8px}
}

/* ── CASE STUDY CARD LINK ── */
.lsp-cs-card{position:relative;transition:transform .25s,box-shadow .25s,border-color .25s}
.lsp-cs-card:hover{transform:translateY(-5px);box-shadow:0 16px 44px rgba(7,47,88,.14);border-color:#A8E3E6}
.lsp-cs-link{display:inline-flex;align-items:center;gap:7px;margin-top:18px;font-weight:700;font-size:.92rem;color:#038791;text-decoration:none;transition:gap .2s,color .2s}
.lsp-cs-link i{transition:transform .2s}
.lsp-cs-card:hover .lsp-cs-link{color:#026870}
.lsp-cs-card:hover .lsp-cs-link i{transform:translateX(4px)}
/* poora card clickable */
.lsp-cs-link::after{content:'';position:absolute;inset:0;z-index:1;border-radius:inherit}
.lsp-cs-card{cursor:pointer}
.lsp-cs-link:focus-visible::after{outline:2px solid #038791;outline-offset:3px}
</style>

<!-- ══ STICKY BAR ══ -->
<div class="sb" id="lsp-sbar">
  <div>
    <div class="sbt">Local SEO packages from <span>$199/mo</span></div>
    <div class="sbs">Map Pack rankings &nbsp;·&nbsp; GBP management &nbsp;·&nbsp; Free audit &nbsp;·&nbsp; No annual contract</div>
  </div>
  <div style="display:flex;gap:10px;align-items:center;flex-shrink:0">
    <a href="#" data-lsp-open-contact class="bt" style="padding:9px 20px;font-size:.84rem;">Free Local SEO Audit</a>
    <button class="sbx" onclick="document.getElementById('lsp-sbar').style.display='none'">&#215;</button>
  </div>
</div>

<!-- ══ HERO ══ -->
<section class="hero">
  <div class="hero-map-bg"></div>
  <div class="hero-grid"></div>
  <div class="hero-glow"></div>
  <div class="hero-glow2"></div>
  <div class="pin-deco pin-deco-1">📍</div>
  <div class="pin-deco pin-deco-2">📍</div>
  <div class="pin-deco pin-deco-3">📍</div>
  <div class="container">
    <div class="hero-inner">
      <div>
        <div class="chip chip-lt">
          <svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
          Local Business SEO Packages
        </div>
        <h1 class="hero-h1">
          Local SEO Packages<br>That Put You <span class="hl">On The Map</span>
        </h1>
        <div class="hero-ans">
          <strong>What are local SEO packages?</strong><br>
          yourfirmgrowth.com offers local SEO packages covering Google Business Profile management, Map Pack ranking, citation building, local link acquisition, review management, and location-page optimisation. Local SEO packages start from $199 per month with a free audit included, no setup fee, and no annual contract.
        </div>
        <div class="hero-ctas">
          <a href="#" class="bt bt-lg" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Get Your Free Local SEO Audit</a>
          <a href="#packages" class="bo">View All Packages</a>
        </div>
        <p class="hero-note">Free audit included &nbsp;&middot;&nbsp; No setup fee &nbsp;&middot;&nbsp; No annual contract &nbsp;&middot;&nbsp; UK, US &amp; European markets</p>
      </div>
      <!-- GBP Card Mockup -->
      <img src="<?php echo esc_url( YFG_URI . '/assets/images/local-seo-packages/local-seo-packages-map-thumb.jpeg' ); ?>" alt="Local business map view">
      <!-- <div class="gbp-card">
        <div class="gbp-card-map">
          <div class="gbp-card-map-overlay"></div>
          <div class="gbp-pin">📍</div>
          <div class="mp-position-badge">&#11088; Map Pack Position #1</div>
        </div>
        <div class="gbp-body">
          <div class="gbp-biz">[Your Business Name]</div>
          <div class="gbp-cat">Local Business &bull; Open Now</div>
          <div class="gbp-stars">
            <span class="gbp-star">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
            <span class="gbp-rat">4.9 (147 reviews)</span>
          </div>
          <div class="gbp-actions">
            <div class="gbp-act-btn">&#128222; Call</div>
            <div class="gbp-act-btn">&#128205; Directions</div>
            <div class="gbp-act-btn">&#127760; Website</div>
          </div>
          <div class="gbp-info">
            <div class="gbp-info-row"><span>&#128336;</span><span>Mon–Fri: 9am–6pm</span></div>
            <div class="gbp-info-row"><span>&#128205;</span><span>Your City, Your State</span></div>
            <div class="gbp-info-row"><span>&#11088;</span><span>4.9 star rating &bull; 147 Google reviews</span></div>
          </div>
        </div>
        <span class="gbp-rank-badge">&#9989; Optimised by Your Firm Growth &nbsp;&middot;&nbsp; yourfirmgrowth.com</span>
      </div> -->


    </div>
  </div>
</section>

<!-- ══ TRUST BAR ══ -->
<div class="trust">
  <div class="container">
    <div class="trust-in">
      <div class="ti"><span class="tidot"></span>UK, USA, Germany &amp; Europe</div>
      <div class="ti"><span class="tidot"></span>GDPR Compliant</div>
      <div class="ti"><span class="tidot"></span>Free Audit Included</div>
      <div class="ti"><span class="tidot"></span>No Setup Fee</div>
      <div class="ti"><span class="tidot"></span>Map Pack Specialists</div>
      <div class="ti"><span class="tidot"></span>No Annual Contract</div>
    </div>
  </div>
</div>

<!-- ══ LOCAL SEO STATS ══ -->
<section class="sec">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Why Local SEO Matters</span>
      <h2 class="sec-h">Local Search Is Where Customers Find You</h2>
      <p class="sec-p">Most customers have already decided what they need before they open a browser. The question is whether your business appears when they search.</p>
    </div>
    <div class="stats-pills">
      <div class="stat-pill">
        <div class="stat-pill-num"><em>96</em>%</div>
        <div class="stat-pill-txt">of people search online to find local businesses</div>
      </div>
      <div class="stat-pill">
        <div class="stat-pill-num"><em>42</em>%</div>
        <div class="stat-pill-txt">of local searches click Google Map Pack results</div>
      </div>
      <div class="stat-pill">
        <div class="stat-pill-num"><em>87</em>%</div>
        <div class="stat-pill-txt">of consumers use Google to evaluate local businesses</div>
      </div>
      <div class="stat-pill">
        <div class="stat-pill-num"><em>50</em>%</div>
        <div class="stat-pill-txt">higher purchase rate with a complete Google Business Profile</div>
      </div>
    </div>
    <!-- MAP PACK MOCKUP + INTRO TEXT -->
    <div class="lsp-split2">
      <div>
        <span class="chip">What Local SEO Gets You</span>
        <h2 class="sec-h">Rank in Google's Map Pack</h2>
        <p>The Map Pack, those three business listings that appear beneath a map on Google, captures 42% of clicks on local search results. Appearing there requires a very specific set of optimisations: a fully configured Google Business Profile, consistent NAP data across directories, local citations, reviews, and location-relevant content on your site.</p>
        <p>Your Firm Growth's local business SEO packages are built around these exact factors. Every plan starts with a free audit that shows exactly where you stand in your local market before a dollar is spent.</p>
        <a href="#" data-lsp-open-contact class="bt" style="margin-top:8px;display:inline-flex">Get My Free Local Audit</a>
      </div>
      <!-- CSS MAP PACK MOCKUP -->
      <div>
        <img src="<?php echo esc_url( YFG_URI . '/assets/images/local-seo-packages/local-seo-packages-map-thumb2.jpeg' ); ?>" alt="Google Maps local area">
        <!-- <div class="mappack-wrap">
          <div class="mp-header">
            <span style="font-size:.8rem;color:#5f6368;font-weight:600">🔍</span>
            <div class="mp-search">plumber near me</div>
          </div>
          <div class="mp-map-thumb" style="position:relative">
            <div style="position:absolute;inset:0;background:rgba(232,240,254,.4)"></div>
            <div style="position:absolute;top:35px;left:44%;font-size:1.6rem;transform:translateX(-50%)">📍</div>
            <div style="position:absolute;top:20px;left:56%;font-size:1.2rem;transform:translateX(-50%);opacity:.6">📍</div>
            <div style="position:absolute;top:45px;left:28%;font-size:1rem;transform:translateX(-50%);opacity:.5">📍</div>
          </div>
          <div class="mp-results">
            <div class="mp-result r1">
              <div class="mp-result-num">1</div>
              <div>
                <div class="mp-result-name">Your Business Name ✓</div>
                <div class="mp-result-cat">Plumber &bull; <span style="color:var(--GRN);font-weight:600">Open now</span></div>
                <div class="mp-result-stars">&#9733;&#9733;&#9733;&#9733;&#9733; <span style="color:#70757a">4.9 (147)</span></div>
              </div>
              <div style="margin-left:auto;background:rgba(3,135,145,.1);color:var(--T);font-size:.65rem;font-weight:700;padding:3px 8px;border-radius:20px;white-space:nowrap;align-self:center">YFG Client</div>
            </div>
            <div class="mp-result r2">
              <div class="mp-result-num">2</div>
              <div>
                <div class="mp-result-name">Competitor A</div>
                <div class="mp-result-cat">Plumber &bull; Closes at 5pm</div>
                <div class="mp-result-stars">&#9733;&#9733;&#9733;&#9733; <span style="color:#70757a">4.1 (34)</span></div>
              </div>
            </div>
            <div class="mp-result r3">
              <div class="mp-result-num">3</div>
              <div>
                <div class="mp-result-name">Competitor B</div>
                <div class="mp-result-cat">Plumbing Service &bull; Closes at 6pm</div>
                <div class="mp-result-stars">&#9733;&#9733;&#9733;&#9999; <span style="color:#70757a">3.8 (22)</span></div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- <p style="font-size:.74rem;color:var(--MUT);text-align:center;margin-top:10px">Illustrative example of Google Map Pack results. [REAL YFG DETAIL: replace with actual client ranking screenshot before publishing.]</p> -->
      </div>
    </div>
  </div>
</section>

<!-- ══ IMAGE SECTION 1: FULL WIDTH BANNER ══ -->
<div class="img-banner">
  <img src="<?php echo esc_url( YFG_URI . '/assets/images/local-seo-packages/local-seo-packages-banner.webp' ); ?>" alt="Local business owner working on digital marketing and local SEO" loading="lazy">
  <div class="img-banner-overlay"></div>
  <div class="img-banner-content">
    <div class="container">
      <div class="img-banner-text">
        <h2>98% of customers search online before visiting a local business</h2>
        <p>If you are not visible in local search results and the Google Map Pack, those customers are walking through a competitor's door instead of yours.</p>
        <a href="#" data-lsp-open-contact class="bt">Fix My Local Visibility Today</a>
      </div>
    </div>
  </div>
</div>

<!-- ══ PACKAGES ══ -->
<section class="sec sec-alt" id="packages">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Pricing &amp; Plans</span>
      <h2 class="sec-h">Local SEO Package Pricing</h2>
      <p class="sec-p">Transparent pricing for every plan. No setup fees, no annual contracts, and a free audit before work begins. All prices in USD.</p>
    </div>

    <div class="pkg-wrap">

      <!-- LOCAL STARTER -->
      <div class="pc">
        <div class="pc-loc-tag">📍 1 Location</div>
        <div class="pc-name">Local Starter</div>
        <div class="pc-price"><span class="pc-amt">$199</span><span class="pc-per"> /mo</span></div>
        <p class="pc-desc">New businesses and service providers in low-competition local markets establishing their first online presence.</p>
        <ul class="pc-list">
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Google Business Profile setup &amp; optimisation</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Up to 10 local keywords targeted</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>NAP consistency audit &amp; 20 citations</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>On-page local SEO (5 pages)</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>LocalBusiness schema markup</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Review monitoring setup</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Monthly local ranking report</span></li>
          <li class="pi"><span class="pi-n">&mdash;</span><span style="color:var(--BOR)">Review response service</span></li>
          <li class="pi"><span class="pi-n">&mdash;</span><span style="color:var(--BOR)">Local content creation</span></li>
        </ul>
        <a href="#" data-lsp-open-contact class="pc-btn pc-btn-d">Get Started</a>
      </div>

      <!-- LOCAL GROWTH (HOT) -->
      <div class="pc pc-hot">
        <div class="pc-badge">Most Popular</div>
        <div class="pc-loc-tag">📍 1–2 Locations</div>
        <div class="pc-name">Local Growth</div>
        <div class="pc-price"><span class="pc-amt">$349</span><span class="pc-per"> /mo</span></div>
        <p class="pc-desc">Growing local businesses ready to dominate their market area, increase calls, and beat the Map Pack competition.</p>
        <ul class="pc-list">
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full GBP management &amp; weekly posts</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Up to 25 local keywords targeted</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>40 citations + ongoing cleanup</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>On-page local SEO (15 pages)</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>2 local content pieces/mo</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>4 local backlinks/mo</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Review response service</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Competitor Map Pack analysis</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Monthly report + strategy call</span></li>
        </ul>
        <a href="#" data-lsp-open-contact class="pc-btn pc-btn-h">Get Started</a>
      </div>

      <!-- LOCAL SCALE -->
      <div class="pc">
        <div class="pc-loc-tag">📍 Up to 5 Locations</div>
        <div class="pc-name">Local Scale</div>
        <div class="pc-price"><span class="pc-amt">$599</span><span class="pc-per"> /mo</span></div>
        <p class="pc-desc">Established local brands and multi-location businesses competing aggressively in dense local markets.</p>
        <ul class="pc-list">
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full GBP management (all locations)</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Up to 60 local keywords</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>75 citations + full cleanup</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Full site on-page local SEO</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>4 local content pieces/mo</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>8 local backlinks/mo</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Review management &amp; response</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Location page creation/optimisation</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Dedicated account manager</span></li>
        </ul>
        <a href="#" data-lsp-open-contact class="pc-btn pc-btn-d">Get Started</a>
      </div>

      <!-- MULTI-LOCATION -->
      <div class="pc">
        <div class="pc-loc-tag">📍 6+ Locations / Franchise</div>
        <div class="pc-name">Multi-Location</div>
        <div class="pc-price"><span class="pc-amt" style="font-size:1.9rem;letter-spacing:-.01em">Custom</span></div>
        <p class="pc-desc">Franchise groups, chains, and multi-city brands needing centralised local SEO management across many locations.</p>
        <ul class="pc-list">
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>All locations under one managed programme</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Custom keyword scope per location</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Centralised citation &amp; NAP management</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Multi-language local SEO (UK/US/DE/EU)</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Franchise local content strategy</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Senior account director</span></li>
          <li class="pi"><span class="pi-y"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span>Custom reporting dashboard</span></li>
        </ul>
        <a href="#" data-lsp-open-contact class="pc-btn pc-btn-d">Request Proposal</a>
      </div>

    </div>
    <p class="pkg-note">All prices USD &nbsp;&middot;&nbsp; 3-month initial term then rolling monthly &nbsp;&middot;&nbsp; Free audit before work starts &nbsp;&middot;&nbsp; GBP / EUR pricing on request</p>
  </div>
</section>

<!-- ══ INLINE CTA ══ -->
<section style="padding:36px 0">
  <div class="container">
    <div class="icta">
      <div>
        <h3>Not sure which local SEO package fits your area?</h3>
        <p>Tell us your postcode or city, your industry, and your top competitors. We will audit your local presence for free and tell you exactly what it will take to reach position one in the Map Pack.</p>
      </div>
      <div class="icta-btns">
        <a href="#" data-lsp-open-contact class="bt bt-lg">Get My Free Local Audit</a>
        <a href="#" data-lsp-open-contact class="bo">Email Our Team</a>
      </div>
    </div>
  </div>
</section>

<!-- ══ IMAGE SECTION 2: GBP SPLIT ══ -->
<section class="sec">
  <div class="container">
    <div class="gbp-split">
      <div class="gbp-phone-wrap">
        <div class="gbp-phone-img">
          <img src="<?php echo esc_url( YFG_URI . '/assets/images/local-seo-packages/our-gbp.jpeg' ); ?>" alt="Person using smartphone to search local businesses on Google Maps" loading="lazy">
        </div>
        <div class="gbp-float-card">
          <div class="gfc-label">GBP Calls This Month</div>
          <div class="gfc-stat">+752</div>
          <div class="gfc-sub">Inbound calls from Google Maps for one of our pressure-washing business clients.</div>
        </div>
      </div>
      <div>
        <span class="chip">Google Business Profile</span>
        <h2 class="sec-h">Your GBP Is the Most Valuable Local SEO Asset You Own</h2>
        <p>A fully optimised Google Business Profile increases the chance of a customer making a purchase by 50%. It is the direct gateway to appearing in Google Maps and the Local Pack, and most businesses leave it half-finished with no photos, outdated hours, and no response to reviews.</p>
        <p>Every Local SEO package from Your Firm Growth includes full GBP management: category selection, service listings, photo strategy, weekly posts, Q&amp;A management, and review response. On Local Growth and Scale plans, we manage your GBP as an active marketing channel, not a listing you set up once and forget.</p>
        <div style="display:flex;flex-direction:column;gap:12px;margin-top:22px">
          <div style="display:flex;align-items:flex-start;gap:12px;padding:14px 16px;background:var(--BG);border-radius:var(--r);border-left:3px solid var(--T)">
            <span style="font-size:1.3rem;flex-shrink:0">📋</span>
            <div><strong style="display:block;font-size:.85rem;color:var(--N);margin-bottom:3px">Complete profile optimisation</strong><span style="font-size:.8rem;color:var(--MUT)">Categories, services, attributes, hours, and photos all configured to the latest GBP best practices.</span></div>
          </div>
          <div style="display:flex;align-items:flex-start;gap:12px;padding:14px 16px;background:var(--BG);border-radius:var(--r);border-left:3px solid var(--T)">
            <span style="font-size:1.3rem;flex-shrink:0">&#11088;</span>
            <div><strong style="display:block;font-size:.85rem;color:var(--N);margin-bottom:3px">Review management &amp; response</strong><span style="font-size:.8rem;color:var(--MUT)">We monitor and respond to every review, protecting your rating and demonstrating active management to Google.</span></div>
          </div>
          <div style="display:flex;align-items:flex-start;gap:12px;padding:14px 16px;background:var(--BG);border-radius:var(--r);border-left:3px solid var(--T)">
            <span style="font-size:1.3rem;flex-shrink:0">&#128247;</span>
            <div><strong style="display:block;font-size:.85rem;color:var(--N);margin-bottom:3px">Weekly GBP posts &amp; photo strategy</strong><span style="font-size:.8rem;color:var(--MUT)">Fresh posts and photos signal an active business to Google, directly supporting Map Pack rankings.</span></div>
          </div>
        </div>
        <a href="#" data-lsp-open-contact class="bt" style="margin-top:22px;display:inline-flex">Audit My Google Profile Free</a>
      </div>
    </div>
  </div>
</section>

<!-- ══ DELIVERABLES TABS ══ -->
<section class="sec sec-alt">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">What We Deliver</span>
      <h2 class="sec-h">Every Local SEO Package Includes</h2>
      <p class="sec-p">Six pillars of local search dominance, delivered each month across every plan.</p>
    </div>
    <div class="tab-nav" id="lsp-tabs">
      <button class="tab-btn active" onclick="lspSwitchTab(this,'lsp-t1')">GBP &amp; Maps</button>
      <button class="tab-btn" onclick="lspSwitchTab(this,'lsp-t2')">Citations &amp; NAP</button>
      <button class="tab-btn" onclick="lspSwitchTab(this,'lsp-t3')">On-Page SEO</button>
      <button class="tab-btn" onclick="lspSwitchTab(this,'lsp-t4')">Local Content</button>
      <button class="tab-btn" onclick="lspSwitchTab(this,'lsp-t5')">Link Building</button>
      <button class="tab-btn" onclick="lspSwitchTab(this,'lsp-t6')">Reporting</button>
    </div>

    <div class="tab-pane active" id="lsp-t1">
      <div class="dv-card"><h3 class="dv-title">Google Business Profile Management</h3><p class="dv-text">We manage your GBP end-to-end: categories, services, attributes, hours, and photos configured to the latest guidelines, with weekly posts and active Q&amp;A monitoring keeping your profile current.</p></div>
      <div class="dv-card"><h3 class="dv-title">Map Pack Ranking Strategy</h3><p class="dv-text">Map Pack position is driven by proximity, relevance, and prominence. We track your local ranking grid, identify why competitors outrank you, and work systematically through each factor to improve your position.</p></div>
      <div class="dv-card"><h3 class="dv-title">Review Management &amp; Response</h3><p class="dv-text">Every review is monitored and responded to by our team. Positive reviews are acknowledged promptly; negative reviews are handled with care to protect your reputation and demonstrate active management to Google.</p></div>
    </div>

    <div class="tab-pane" id="lsp-t2">
      <div class="dv-card"><h3 class="dv-title">NAP Consistency Audit</h3><p class="dv-text">Inconsistent Name, Address, and Phone data across the web confuses Google and suppresses local rankings. We audit every major directory listing and correct discrepancies before building new citations.</p></div>
      <div class="dv-card"><h3 class="dv-title">Citation Building</h3><p class="dv-text">We build consistent, accurate business citations across Google, Bing, Apple Maps, Yelp, Yell, Thomson Local, and dozens of niche directories relevant to your industry and location.</p></div>
      <div class="dv-card"><h3 class="dv-title">Ongoing Cleanup &amp; Monitoring</h3><p class="dv-text">Citations decay over time: businesses move, phone numbers change, listings get corrupted. We monitor your citation health on an ongoing basis and correct new inaccuracies as they appear.</p></div>
    </div>

    <div class="tab-pane" id="lsp-t3">
      <div class="dv-card"><h3 class="dv-title">Local Keyword Optimisation</h3><p class="dv-text">We research how your customers actually search in your service area, from "emergency plumber [city]" to "[service] near me," and optimise every page in scope around those specific local intent queries.</p></div>
      <div class="dv-card"><h3 class="dv-title">LocalBusiness Schema Markup</h3><p class="dv-text">Structured data tells Google exactly what your business is, where it operates, and what services it offers. We implement LocalBusiness, Service, and Review schema to improve rich result eligibility.</p></div>
      <div class="dv-card"><h3 class="dv-title">Technical &amp; Mobile Optimisation</h3><p class="dv-text">Most local searches happen on mobile devices. We audit and optimise Core Web Vitals, page speed, mobile usability, and crawl health to ensure your site is technically competitive in local results.</p></div>
    </div>

    <div class="tab-pane" id="lsp-t4">
      <div class="dv-card"><h3 class="dv-title">Local Service Pages</h3><p class="dv-text">Dedicated pages for each service you offer in each area you target. These pages are written around real local search intent and structured to rank for "[service] in [city]" queries.</p></div>
      <div class="dv-card"><h3 class="dv-title">Location-Specific Blog Content</h3><p class="dv-text">Local content that builds topical authority in your area, covering local questions, community topics, and industry news relevant to your service region. Published on a documented monthly calendar.</p></div>
      <div class="dv-card"><h3 class="dv-title">GBP Posts &amp; Updates</h3><p class="dv-text">Weekly posts on your Google Business Profile covering offers, updates, and services. Fresh GBP content signals an active business to Google and keeps your listing engaging for customers who find it.</p></div>
    </div>

    <div class="tab-pane" id="lsp-t5">
      <div class="dv-card"><h3 class="dv-title">Local Link Acquisition</h3><p class="dv-text">Links from local business directories, chambers of commerce, community organisations, and regional news sites carry significant weight in local rankings. Every link we build is placed on a real, relevant local site.</p></div>
      <div class="dv-card"><h3 class="dv-title">Niche-Relevant Placements</h3><p class="dv-text">Beyond local directories, we pursue links from industry-specific sites that your target customers read, strengthening topical authority alongside geographic relevance.</p></div>
      <div class="dv-card"><h3 class="dv-title">Competitor Backlink Analysis</h3><p class="dv-text">We analyse the backlink profiles of the businesses ranking above you in your local market, identify where their links come from, and build a gap-closing programme around those specific opportunities.</p></div>
    </div>

    <div class="tab-pane" id="lsp-t6">
      <div class="dv-card"><h3 class="dv-title">Monthly Local Rankings Report</h3><p class="dv-text">A clear report covering your local keyword positions, Map Pack visibility, GBP performance metrics (calls, direction requests, website clicks), citation count, and new reviews earned each month.</p></div>
      <div class="dv-card"><h3 class="dv-title">GBP Insights &amp; Call Tracking</h3><p class="dv-text">We report on search queries that triggered your GBP, actions taken (calls, clicks, direction requests), and photo views, giving you a clear picture of how Google Maps is driving customer contact.</p></div>
      <div class="dv-card"><h3 class="dv-title">Strategy Calls &amp; Account Support</h3><p class="dv-text">Regular check-ins to review performance, discuss strategy, and align the SEO roadmap with your business priorities. Growth and Scale plans include monthly strategy calls with a named account manager.</p></div>
    </div>

  </div>
</section>

<!-- ══ IMAGE SECTION 3: THREE-COLUMN PHOTO GRID ══ -->
<section class="sec">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Local SEO in Action</span>
      <h2 class="sec-h">What Local Search Success Looks Like</h2>
      <p class="sec-p">Whether you are a single location service business or a growing multi-location brand, local search drives real customers to your door.</p>
    </div>
    <div class="photo-grid-3">
      <div class="pg-card">
        <img src="<?php echo esc_url( YFG_URI . '/assets/images/local-seo-packages/local-seo-packages-grid-1.webp' ); ?>" alt="Local restaurant business benefiting from local SEO and Google Map Pack visibility" loading="lazy">
        <div class="pg-overlay"></div>
        <div class="pg-content">
          <div class="pg-icon">&#127869;</div>
          <div class="pg-title">Hospitality &amp; Restaurants</div>
          <p class="pg-desc">Map Pack visibility drives direct table bookings and walk-ins from "restaurants near me" searches.</p>
        </div>
      </div>
      <div class="pg-card">
        <img src="<?php echo esc_url( YFG_URI . '/assets/images/local-seo-packages/local-seo-packages-grid-2.webp' ); ?>" alt="Professional service business owner using local SEO to attract new clients" loading="lazy">
        <div class="pg-overlay"></div>
        <div class="pg-content">
          <div class="pg-icon">&#128188;</div>
          <div class="pg-title">Professional Services</div>
          <p class="pg-desc">Accountants, solicitors, and consultants grow client enquiries from local "near me" searches.</p>
        </div>
      </div>
      <div class="pg-card">
        <img src="<?php echo esc_url( YFG_URI . '/assets/images/local-seo-packages/local-seo-packages-grid-3.webp' ); ?>" alt="Local business analytics showing growth in local search traffic and map pack rankings" loading="lazy">
        <div class="pg-overlay"></div>
        <div class="pg-content">
          <div class="pg-icon">&#128200;</div>
          <div class="pg-title">Trades &amp; Home Services</div>
          <p class="pg-desc">Plumbers, electricians, and cleaners fill their diaries with high-intent local leads from Maps.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ LOCAL SEO CASE STUDIES (inline — same page) ══ -->
<section class="sec sec-alt" id="local-seo-case-studies">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Proven Local Results</span>
      <h2 class="sec-h">Local SEO Case Studies</h2>
      <p class="sec-p">Real local businesses we helped rank in the Map Pack and win more calls.</p>
    </div>
      <div class="lsp-cs-grid">
        <?php
        $lsp_cs_slugs = array(
          'apartment-locator-houston',
          'exterior-cleaning-sacramento',
          'flower-shop-las-vegas',
          'residential-cleaning-los-angeles',
          'roofing-palm-beach-county',
        );
        foreach ( $lsp_cs_slugs as $lsp_slug ) :
          $lsp_c = function_exists( 'yfg_cs_get' ) ? yfg_cs_get( $lsp_slug ) : null;
          if ( ! $lsp_c ) { continue; }

          // Permalink nikalo — post mil jaye to uska, warna slug se fallback.
          $lsp_post = get_page_by_path( $lsp_slug, OBJECT, 'case_study' );
          $lsp_url  = $lsp_post ? get_permalink( $lsp_post ) : home_url( '/case-studies/' . $lsp_slug . '/' );
          ?>
          <div class="lsp-cs-card">
            <span class="lsp-cs-cat"><i class="bi <?php echo esc_attr( isset( $lsp_c['icon'] ) ? $lsp_c['icon'] : 'bi-geo-alt' ); ?>"></i><?php echo esc_html( $lsp_c['category'] ); ?></span>
            <h3 class="lsp-cs-title"><?php echo esc_html( $lsp_c['title'] ); ?></h3>
            <div class="lsp-cs-loc"><i class="bi bi-geo-alt-fill"></i><?php echo esc_html( $lsp_c['location'] ); ?></div>
            <?php if ( ! empty( $lsp_c['stats'] ) ) : ?>
              <div class="lsp-cs-stats">
                <?php foreach ( array_slice( $lsp_c['stats'], 0, 3 ) as $lsp_st ) : ?>
                  <div class="lsp-cs-stat">
                    <div class="lsp-cs-stat-v"><?php echo esc_html( $lsp_st['value'] ); ?></div>
                    <div class="lsp-cs-stat-l"><?php echo esc_html( $lsp_st['label'] ); ?></div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <p class="lsp-cs-summary"><?php echo esc_html( $lsp_c['summary'] ); ?></p>

            <a class="lsp-cs-link" href="<?php echo esc_url( $lsp_url ); ?>">
              Read Case Study <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
  </div>
</section>

<!-- ══ LOCAL SEO PORTFOLIO (GBP results) ══ -->
<section class="sec">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Our Local Work</span>
      <h2 class="sec-h">Local SEO Portfolio</h2>
      <p class="sec-p">A snapshot of local businesses we&rsquo;ve put on the map.</p>
    </div>
    <div class="lsp-pf-grid">
      <?php
      $lsp_pf_base  = YFG_URI . '/assets/images/portfolio/';
      $lsp_pf_items = array(
        array( 'tag' => 'Local SEO · Las Vegas',  'title' => 'Online Las Vegas Flower Shop',       'imgs' => array( 'image19.png', 'image18.png', 'image21.png' ) ),
        array( 'tag' => 'Local SEO · New York',   'title' => 'Personal Injury Lawyer, Brooklyn NY', 'imgs' => array( 'image27.png', 'image23.png', 'image25.png' ) ),
        array( 'tag' => 'Local SEO · Sacramento', 'title' => 'Pressure Washing Services, Sacramento','imgs' => array( 'image30.png', 'image24.png', 'image26.png' ) ),
        array( 'tag' => 'Local SEO · California', 'title' => 'Family Law Firm in California',        'imgs' => array( 'image29.png', 'image28.png', 'image31.png' ) ),
        array( 'tag' => 'Local SEO · Torrance',   'title' => 'Injury Lawyer in Torrance',           'imgs' => array( 'image32.png', 'image33.png', 'image38.png' ) ),
      );
      foreach ( $lsp_pf_items as $lsp_item ) : ?>
        <div class="lsp-pf-card">
          <div class="lsp-pf-imgs">
            <?php foreach ( $lsp_item['imgs'] as $lsp_img ) : ?>
              <img src="<?php echo esc_url( $lsp_pf_base . $lsp_img ); ?>" alt="<?php echo esc_attr( $lsp_item['title'] ); ?> — Google Business Profile results" loading="lazy">
            <?php endforeach; ?>
          </div>
          <div class="lsp-pf-body">
            <span class="lsp-pf-tag"><i class="bi bi-geo-alt-fill"></i><?php echo esc_html( $lsp_item['tag'] ); ?></span>
            <div class="lsp-pf-title"><?php echo esc_html( $lsp_item['title'] ); ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ HOW IT WORKS ══ -->
<section class="sec sec-alt">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Getting Started</span>
      <h2 class="sec-h">How Our Local SEO Process Works</h2>
      <p class="sec-p">From free audit to Map Pack visibility in four clear steps.</p>
    </div>
    <div class="steps-h">
      <div class="step">
        <div class="step-n">1</div>
        <h3 class="step-t">Free Local Audit</h3>
        <p class="step-d">We audit your GBP, citations, local rankings, and on-page health at no cost. You receive a prioritised report showing exactly what is holding your local visibility back.</p>
      </div>
      <div class="step">
        <div class="step-n">2</div>
        <h3 class="step-t">Strategy &amp; Plan</h3>
        <p class="step-d">We recommend the right local SEO package for your market, location count, and budget. A written deliverables plan and transparent pricing are provided within two business days.</p>
      </div>
      <div class="step">
        <div class="step-n">3</div>
        <h3 class="step-t">Month One Launch</h3>
        <p class="step-d">GBP is optimised, citations are cleaned, on-page local SEO is applied, and content production begins. Every change is documented and shared with you for approval.</p>
      </div>
      <div class="step">
        <div class="step-n">4</div>
        <h3 class="step-t">Rankings &amp; Growth</h3>
        <p class="step-d">Local rankings, Map Pack positions, and GBP metrics improve month on month. Monthly reports keep you informed. Strategy evolves as your visibility data matures.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══ IMAGE SECTION 4: DARK ANALYTICS SECTION ══ -->
<section class="sec sec-dark" style="position:relative;overflow:hidden">
  <div style="position:absolute;inset:0;z-index:0">
    <img src="<?php echo esc_url( YFG_URI . '/assets/images/local-seo-packages/local-seo-packages-dark-bg.webp' ); ?>" alt="Digital marketing team reviewing local SEO performance data and analytics" style="width:100%;height:100%;object-fit:cover;opacity:.08" loading="lazy">
  </div>
  <div class="container" style="position:relative;z-index:1">
    <div class="lsp-split2">
      <div>
        <span class="chip chip-lt">Measurable Local Results</span>
        <h2 class="sec-h sec-h-w">What YFG Local SEO Packages Deliver</h2>
        <p class="sec-p sec-p-w" style="max-width:none">Local SEO is not about vanity metrics. It is about calls, direction requests, website clicks, and customers walking through your door. Every metric we report maps directly to how customers are finding and contacting your business through local search.</p>
        <p style="color:rgba(255,255,255,.6);font-size:.88rem;margin-top:14px">[REAL YFG DETAIL: Replace the result cards opposite with verified client outcomes before publishing. Per editorial rules, no fabricated statistics.]</p>
        <a href="#" data-lsp-open-contact class="bt" style="margin-top:22px;display:inline-flex">Start Growing Locally</a>
        <a href="/case-studies/" class="bt" style="margin-top:22px;display:inline-flex">Veiw All Case Studies</a>
      </div>
      <div style="display:flex;flex-direction:column;gap:14px">
        <div style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:var(--r);padding:16px 18px;display:flex;align-items:center;gap:14px">
          <div style="width:44px;height:44px;border-radius:10px;background:rgba(3,135,145,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.4rem">📞</div>
          <div>
            <div style="font-size:.8rem;font-weight:700;color:var(--W);margin-bottom:2px">GBP Service Areas</div>
            <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:1.4rem;font-weight:800;color:var(--T);line-height:1">4 Locations</div>
            <div style="font-size:.72rem;color:rgba(255,255,255,.45);margin-top:2px">GBP visibility built across Houston service areas</div>
          </div>
        </div>
        <div style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:var(--r);padding:16px 18px;display:flex;align-items:center;gap:14px">
          <div style="width:44px;height:44px;border-radius:10px;background:rgba(3,135,145,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.4rem">📍</div>
          <div>
            <div style="font-size:.8rem;font-weight:700;color:var(--W);margin-bottom:2px">Map Pack Position</div>
            <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:1.4rem;font-weight:800;color:var(--T);line-height:1">#1–3 </div>
            <div style="font-size:.72rem;color:rgba(255,255,255,.45);margin-top:2px">Apartment Locator — Houston, TX</div>
          </div>
        </div>
        <div style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:var(--r);padding:16px 18px;display:flex;align-items:center;gap:14px">
          <div style="width:44px;height:44px;border-radius:10px;background:rgba(3,135,145,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.4rem">⭐</div>
          <div>
            <div style="font-size:.8rem;font-weight:700;color:var(--W);margin-bottom:2px">Organic Traffic Growth</div>
            <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:1.4rem;font-weight:800;color:var(--T);line-height:1">+71%</div>
            <div style="font-size:.72rem;color:rgba(255,255,255,.45);margin-top:2px">Clicks grew from 5.49K to 9.36K</div>
          </div>
        </div>
        <div style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:var(--r);padding:16px 18px;display:flex;align-items:center;gap:14px">
          <div style="width:44px;height:44px;border-radius:10px;background:rgba(3,135,145,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.4rem">📈</div>
          <div>
            <div style="font-size:.8rem;font-weight:700;color:var(--W);margin-bottom:2px">Local Organic Clicks</div>
            <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:1.4rem;font-weight:800;color:var(--T);line-height:1">9.36K</div>
            <div style="font-size:.72rem;color:rgba(255,255,255,.45);margin-top:2px">Monthly organic clicks at campaign peak</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ COMPARE TABLE ══ -->
<section class="sec">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Why Choose YFG</span>
      <h2 class="sec-h">YFG vs Big Agency vs In-House for Local SEO</h2>
      <p class="sec-p">Large agencies start around $800/mo. In-house hires cost $40,000+/year. YFG local SEO packages start at $199/mo with no setup fee.</p>
    </div>
    <div style="border-radius:var(--r);overflow:hidden;box-shadow:var(--sh1);overflow-x:auto">
      <table class="ctb">
        <thead>
          <tr>
            <th style="width:30%">Factor</th>
            <th>Your Firm Growth</th>
            <th>Large Agency</th>
            <th>In-House Hire</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Starting monthly price</td><td><span class="cy">$199/mo</span></td><td>$800–$3,000/mo</td><td>$3,300–$6,500/mo equiv.</td></tr>
          <tr><td>Free audit before commitment</td><td><span class="cy">Yes</span></td><td><span class="cw">Rarely</span></td><td>N/A</td></tr>
          <tr><td>Google Business Profile managed</td><td><span class="cy">Yes, every plan</span></td><td><span class="cw">Sometimes extra</span></td><td><span class="cw">Depends on skills</span></td></tr>
          <tr><td>GDPR-compliant for UK &amp; EU</td><td><span class="cy">Yes</span></td><td><span class="cw">Rarely confirmed</span></td><td><span class="cw">Needs training</span></td></tr>
          <tr><td>Multi-market (UK, US, Germany)</td><td><span class="cy">Yes</span></td><td><span >Usually US-only</span></td><td><span >Limited</span></td></tr>
          <tr><td>Review management included</td><td><span class="cy">Yes (Growth+)</span></td><td><span class="cw">Often add-on</span></td><td><span class="cw">If time allows</span></td></tr>
          <tr><td>No annual contract</td><td><span class="cy">Yes (3mo then monthly)</span></td><td><span >Often 6–12 months</span></td><td>N/A</td></tr>
          <tr><td>No setup fee</td><td><span class="cy">Yes</span></td><td><span >Often $500+</span></td><td>N/A</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ══ LIGHT CTA BAND ══ -->
<section style="padding:0 0 52px">
  <div class="container">
    <div style="background:var(--TL);border:1.5px solid var(--TM);border-radius:var(--rl);padding:38px 46px;display:flex;align-items:center;justify-content:space-between;gap:22px;flex-wrap:wrap">
      <div>
        <div style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:1.25rem;color:var(--N);margin-bottom:6px">Local SEO packages from $199/mo &nbsp;&middot;&nbsp; Free audit &nbsp;&middot;&nbsp; No setup fee</div>
        <p style="color:var(--MUT);font-size:.86rem;margin:0">We audit your local presence before recommending a plan. You see exactly what needs fixing and why, before spending anything.</p>
      </div>
      <a href="#" data-lsp-open-contact class="bt bt-lg" style="flex-shrink:0">Get My Free Local Audit</a>
    </div>
  </div>
</section>

<!-- ══ FAQ (TWO-COLUMN) ══ -->
<section class="sec sec-alt">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Common Questions</span>
      <h2 class="sec-h">Local SEO Package FAQs</h2>
    </div>
    <div class="faq-2col">

      <div class="fq-item">
        <button class="fq-btn" onclick="lspFaq(this)">What do local SEO packages include?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="fq-body">YFG's local SEO packages include Google Business Profile management, local keyword targeting, NAP consistency and citation building, on-page local optimisation, LocalBusiness schema, local content creation, local link building, review management, and monthly ranking reports. Every plan starts with a free local audit before any work begins.</div>
      </div>

      <div class="fq-item">
        <button class="fq-btn" onclick="lspFaq(this)">How much do local SEO packages cost?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="fq-body">YFG's local SEO package pricing starts at $199/month for the Local Starter plan, $349 for Local Growth, and $599 for Local Scale. Multi-location and franchise pricing is scoped on request. No plan carries a setup fee. After an initial 3-month period, contracts move to rolling monthly terms.</div>
      </div>

      <div class="fq-item">
        <button class="fq-btn" onclick="lspFaq(this)">How long does local SEO take to show results?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="fq-body">GBP improvements and citation corrections can show measurable impact within 4 to 8 weeks. Map Pack ranking improvements typically become visible within 2 to 4 months, depending on competition. Low-competition local niches can see faster progress than dense urban markets with many established competitors.</div>
      </div>

      <div class="fq-item">
        <button class="fq-btn" onclick="lspFaq(this)">What is a local SEO growth package?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="fq-body">A local SEO growth package is a more comprehensive tier of local SEO management that goes beyond foundation work to include active content creation, link building, review management, and competitive Map Pack strategy. YFG's Local Growth plan at $349/month covers 1–2 locations with all of these elements included.</div>
      </div>

      <div class="fq-item">
        <button class="fq-btn" onclick="lspFaq(this)">Do you manage Google Business Profile for me?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="fq-body">Yes. Every plan includes GBP work from basic setup and optimisation on the Starter plan through to active weekly posting, photo management, Q&amp;A, and review response on Growth and Scale plans. GBP management is included in the plan price, not charged as an add-on.</div>
      </div>

      <div class="fq-item">
        <button class="fq-btn" onclick="lspFaq(this)">What is local SEO package pricing based on?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button>
        <div class="fq-body">YFG's local SEO package pricing is based on the number of locations, the volume of keywords targeted, the scope of content and link building delivered each month, and the level of account management included. Enterprise and multi-location pricing is scoped individually based on total location count, market competition, and language requirements.</div>
      </div>

    </div>
  </div>
</section>

<!-- ══ FINAL CTA ══ -->
<section class="fcta">
  <div class="container">
    <div class="fcta-in">
      <div class="chip chip-lt" style="margin:0 auto 14px">Free Local SEO Audit &mdash; No Obligation</div>
      <h2 class="fcta-h">Show Up Where Local Customers Are Searching</h2>
      <p class="fcta-p">Your Firm Growth will audit your local search presence for free, show you exactly where competitors are outranking you, and recommend the right local SEO package for your market and budget.</p>
      <div style="display:flex;gap:13px;justify-content:center;flex-wrap:wrap">
        <a href="#" data-lsp-open-contact class="bt bt-lg">Get My Free Local SEO Audit</a>
        <a href="#" data-lsp-open-contact class="bo">Email Us Directly</a>
      </div>
      <p class="fcta-note">No setup fee &nbsp;&middot;&nbsp; No annual contract &nbsp;&middot;&nbsp; Response within 1 business day &nbsp;&middot;&nbsp; UK, US &amp; European markets</p>
    </div>
  </div>
</section>

<!-- ══ CONTACT POPUP (same page — koi doosre page pe redirect nahi) ══ -->
<?php $lsp_cstate = isset( $_GET['yfg_contact'] ) ? sanitize_key( wp_unslash( $_GET['yfg_contact'] ) ) : ''; ?>
<div class="lsp-modal<?php echo ( 'success' === $lsp_cstate || 'error' === $lsp_cstate ) ? ' is-open' : ''; ?>" id="lsp-contact-modal" aria-hidden="true">
  <div class="lsp-modal__overlay" data-lsp-close></div>
  <div class="lsp-modal__box" role="dialog" aria-modal="true" aria-labelledby="lsp-modal-title">
    <button type="button" class="lsp-modal__close" data-lsp-close aria-label="Close">&times;</button>
    <?php if ( 'success' === $lsp_cstate ) : ?>
      <div class="lsp-thanks">
        <div class="lsp-thanks__ic"><i class="bi bi-check-lg"></i></div>
        <h3>Thank you! Request received.</h3>
        <p>Aapki free local SEO audit request mil gayi hai. Hamari team 1 business day mein aapse rabta karegi.</p>
      </div>
    <?php else : ?>
      <span class="lsp-modal__eyebrow"><i class="bi bi-geo-alt-fill"></i> Free Local SEO Audit</span>
      <h3 class="lsp-modal__title" id="lsp-modal-title">Get Your Free Local SEO Audit</h3>
      <p class="lsp-modal__sub">Tell us about your business and target area &mdash; we&rsquo;ll audit your local presence and reply within 1 business day.</p>
      <?php if ( 'error' === $lsp_cstate ) : ?>
        <div class="lsp-formerr"><i class="bi bi-exclamation-triangle-fill"></i> Please apna Name aur ek valid Email dobara bharein.</div>
      <?php endif; ?>
      <form class="lsp-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
        <input type="hidden" name="action" value="yfg_contact">
        <?php wp_nonce_field( 'yfg_contact', 'yfg_contact_nonce' ); ?>
        <input type="hidden" name="yfg_service[]" value="SEO">
        <div class="lsp-row">
          <div><label for="lsp_name">Full Name *</label><input type="text" id="lsp_name" name="yfg_name" required placeholder="e.g. John Doe"></div>
          <div><label for="lsp_email">Email *</label><input type="email" id="lsp_email" name="yfg_email" required placeholder="you@company.com"></div>
        </div>
        <div class="lsp-row">
          <div><label for="lsp_phone">Phone</label><input type="tel" id="lsp_phone" name="yfg_phone" placeholder="+1 (321) 555-0199"></div>
          <div><label for="lsp_company">Business Name</label><input type="text" id="lsp_company" name="yfg_company" placeholder="Your business"></div>
        </div>
        <label for="lsp_message">Your business &amp; target city *</label>
        <textarea id="lsp_message" name="yfg_message" required placeholder="What do you do, and which city/area do you want to rank in?"></textarea>
        <button type="submit" class="lsp-submit">Get My Free Local SEO Audit</button>
        <p class="lsp-note"><i class="bi bi-lock-fill"></i> No setup fee &middot; No obligation &middot; Reply within 1 business day.</p>
      </form>
    <?php endif; ?>
  </div>
</div>

<script>
( function () {
  var modal = document.getElementById( 'lsp-contact-modal' );
  if ( ! modal ) { return; }
  function openM() {
    modal.classList.add( 'is-open' );
    modal.setAttribute( 'aria-hidden', 'false' );
    document.body.classList.add( 'lsp-modal-open' );
    var f = modal.querySelector( 'input[name="yfg_name"]' );
    if ( f ) { setTimeout( function () { f.focus(); }, 60 ); }
  }
  function closeM() {
    modal.classList.remove( 'is-open' );
    modal.setAttribute( 'aria-hidden', 'true' );
    document.body.classList.remove( 'lsp-modal-open' );
  }
  document.addEventListener( 'click', function ( e ) {
    if ( e.target.closest( '[data-lsp-open-contact]' ) ) { e.preventDefault(); openM(); return; }
    if ( e.target.closest( '[data-lsp-close]' ) ) { e.preventDefault(); closeM(); }
  } );
  document.addEventListener( 'keydown', function ( e ) {
    if ( 'Escape' === e.key && modal.classList.contains( 'is-open' ) ) { closeM(); }
  } );
  // Success/error par modal PHP se already khula hai — scroll-lock + URL se query saaf.
  if ( modal.classList.contains( 'is-open' ) ) {
    document.body.classList.add( 'lsp-modal-open' );
    modal.setAttribute( 'aria-hidden', 'false' );
    if ( window.history && history.replaceState ) { history.replaceState( null, '', window.location.pathname ); }
  }
} )();
</script>

<script>
// Tab switcher
function lspSwitchTab(btn, id) {
  var root = btn.closest('.sec');
  root.querySelectorAll('.tab-btn').forEach(function(b){b.classList.remove('active')});
  root.querySelectorAll('.tab-pane').forEach(function(p){p.classList.remove('active')});
  btn.classList.add('active');
  document.getElementById(id).classList.add('active');
}
// Two-col FAQ
function lspFaq(btn) {
  var body = btn.nextElementSibling, isOpen = btn.classList.contains('open');
  document.querySelectorAll('.fq-btn').forEach(function(b){b.classList.remove('open');b.nextElementSibling.classList.remove('open')});
  if (!isOpen) { btn.classList.add('open'); body.classList.add('open'); }
}
// Sticky bar
(function(){
  var bar = document.getElementById('lsp-sbar'), shown = false;
  if(!bar) return;
  window.addEventListener('scroll', function(){
    if (!shown && window.scrollY > 500){ bar.classList.add('on'); shown = true; }
  });
})();
</script>


<!-- ══ LIGHTBOX ══ -->
<div class="lsp-lb" id="lspLb" role="dialog" aria-modal="true" aria-label="Image viewer">
  <button class="lsp-lb__btn lsp-lb__close" id="lspLbClose" aria-label="Close">&times;</button>
  <button class="lsp-lb__btn lsp-lb__prev" id="lspLbPrev" aria-label="Previous">&#8249;</button>
  <img class="lsp-lb__img" id="lspLbImg" src="" alt="">
  <button class="lsp-lb__btn lsp-lb__next" id="lspLbNext" aria-label="Next">&#8250;</button>
  <span class="lsp-lb__count" id="lspLbCount"></span>
</div>

<script>
(function(){
  var imgs = Array.prototype.slice.call(document.querySelectorAll('.lsp-pf-grid .lsp-pf-imgs img'));
  if(!imgs.length) return;

  var lb    = document.getElementById('lspLb'),
      lbImg = document.getElementById('lspLbImg'),
      cnt   = document.getElementById('lspLbCount'),
      i     = 0;

  function show(n){
    i = (n + imgs.length) % imgs.length;
    lbImg.src = imgs[i].src;
    lbImg.alt = imgs[i].alt || '';
    cnt.textContent = (i + 1) + ' / ' + imgs.length;
  }
  function open(n){ show(n); lb.classList.add('is-open'); document.body.classList.add('lsp-lb-lock'); }
  function close(){ lb.classList.remove('is-open'); document.body.classList.remove('lsp-lb-lock'); lbImg.src = ''; }

  imgs.forEach(function(img, idx){
    img.addEventListener('click', function(){ open(idx); });
  });

  document.getElementById('lspLbClose').addEventListener('click', close);
  document.getElementById('lspLbPrev').addEventListener('click', function(e){ e.stopPropagation(); show(i - 1); });
  document.getElementById('lspLbNext').addEventListener('click', function(e){ e.stopPropagation(); show(i + 1); });

  // backdrop pe click => close
  lb.addEventListener('click', function(e){ if(e.target === lb) close(); });

  // keyboard
  document.addEventListener('keydown', function(e){
    if(!lb.classList.contains('is-open')) return;
    if(e.key === 'Escape') close();
    if(e.key === 'ArrowLeft') show(i - 1);
    if(e.key === 'ArrowRight') show(i + 1);
  });
})();
</script>

<?php get_footer(); ?>
