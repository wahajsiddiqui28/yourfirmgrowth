<?php
/**
 * Template Name: Ecommerce SEO Packages
 *
 * SEO team ka standalone landing page - ab theme ke header/footer ke saath.
 * Images Ecommerce (assets/images/ecommerce-seo-packages/), .btn header-leak scoped.
 *
 * @package YourFirmGrowth
 */

get_header();
?>



<style>
:root{
  --N:#072F58;--ND:#041D3A;--NM:#0D3D72;
  --T:#038791;--TD:#026870;--TL:#E0F5F5;--TM:#A8E3E6;
  --W:#FFF;--BG:#F4F7FB;--BGA:#EBF0F7;
  --TXT:#0E1C30;--MUT:#536070;--BOR:#D4DFEE;
  --GRN:#10B981;--GL:#D1FAE5;--GD:#065F46;
  --AMB:#F59E0B;--AL:#FEF3C7;
  --s1:0 2px 8px rgba(7,47,88,.08);
  --s2:0 8px 32px rgba(7,47,88,.13);
  --s3:0 24px 64px rgba(7,47,88,.18);
  --r:10px;--rl:16px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Inter',system-ui,sans-serif;font-size:16px;line-height:1.7;color:#0E1C30;background:#FFF;-webkit-font-smoothing:antialiased}
h1,h2,h3,h4{font-family:'Plus Jakarta Sans',system-ui,sans-serif;font-weight:700;line-height:1.2;color:#072F58}
p{margin-bottom:.95rem}p:last-child{margin-bottom:0}
a{color:#026870;text-decoration:none}a:hover{text-decoration:underline}
ul{list-style:none}img{max-width:100%;height:auto;display:block}
/* .container theme header/footer se conflict karta tha - comment (theme ka Bootstrap container use hoga) */
/* .container{width:100%;max-width:1160px;margin:0 auto;padding:0 24px} */
.sec{padding:80px 0}.sec-alt{background:#F4F7FB}.sec-dk{background:linear-gradient(150deg,#041D3A,#072F58)}
.chip{display:inline-flex;align-items:center;gap:6px;background:rgba(3,135,145,.12);border:1px solid rgba(3,135,145,.28);border-radius:50px;padding:4px 13px;font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#038791;margin-bottom:12px}
.chip-lt{background:rgba(3,135,145,.2);border-color:rgba(3,135,145,.38);color:#A8E3E6}
.chip-w{background:rgba(255,255,255,.15);border-color:rgba(255,255,255,.3);color:#FFF}
.hdr{margin-bottom:48px}.hdr-c{text-align:center}.hdr-c .sp{margin:0 auto}
.sh{font-size:clamp(1.6rem,2.5vw,2.3rem);margin-bottom:12px;color:#072F58}
.sh-w{color:#FFF}
.sp{font-size:1rem;color:#536070;max-width:580px;line-height:1.7}
.sp-w{color:rgba(255,255,255,.7)}

/* ── BUTTONS ── */
/* :not(.site-header__cta) so ye page-button styles theme header ke buttons pe leak na karein (duplicate buttons fix) */
.btn:not(.site-header__cta){display:inline-flex;align-items:center;justify-content:center;gap:7px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;border-radius:50px;transition:all .22s;cursor:pointer;text-decoration:none;border:none;white-space:nowrap}
.bt-w{background:#FFF;color:#072F58;padding:15px 32px;font-size:.95rem;box-shadow:0 4px 20px rgba(0,0,0,.18)}
.bt-w:hover{background:#E0F5F5;color:#072F58;text-decoration:none;transform:translateY(-2px)}
.bt-t{background:linear-gradient(135deg,#038791,#026870);color:#FFF;padding:15px 32px;font-size:.95rem;box-shadow:0 4px 18px rgba(3,135,145,.4)}
.bt-t:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(3,135,145,.5);color:#FFF;text-decoration:none}
.bt-n{background:linear-gradient(135deg,#072F58,#0D3D72);color:#FFF;padding:15px 32px;font-size:.95rem;box-shadow:0 4px 18px rgba(7,47,88,.35)}
.bt-n:hover{transform:translateY(-2px);box-shadow:0 8px 26px rgba(7,47,88,.45);color:#FFF;text-decoration:none}
.bt-lg{padding:17px 38px;font-size:1.05rem}
.bo{background:transparent;color:#FFF;padding:15px 32px;font-size:.95rem;border:2px solid rgba(255,255,255,.4)}
.bo:hover{border-color:#FFF;background:rgba(255,255,255,.1);text-decoration:none}
.bon{background:transparent;color:#072F58;padding:11px 24px;font-size:.88rem;border:2px solid #D4DFEE}
.bon:hover{border-color:#038791;color:#038791;text-decoration:none}
.bw2{background:#FFF;color:#072F58;padding:13px 26px;font-size:.92rem}
.bw2:hover{background:#E0F5F5;color:#072F58;text-decoration:none;transform:translateY(-2px)}

/* ── STICKY BAR ── */
.sb{position:fixed;bottom:0;left:0;right:0;z-index:999;background:#038791;border-top:2px solid rgba(255,255,255,.2);padding:12px 24px;display:flex;align-items:center;justify-content:space-between;gap:16px;transform:translateY(100%);transition:transform .35s ease;box-shadow:0 -4px 24px rgba(3,135,145,.4)}
.sb.on{transform:translateY(0)}
.sbt{font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.92rem;color:#FFF}
.sbt em{font-style:normal;opacity:.75;font-weight:400}
.sbx{background:none;border:none;cursor:pointer;color:rgba(255,255,255,.5);font-size:1.3rem;line-height:1}
.sbx:hover{color:#FFF}

/* ── NAV ── */
.nav{position:sticky;top:0;z-index:100;background:rgba(7,47,88,.97);backdrop-filter:blur(12px);border-bottom:1px solid rgba(255,255,255,.07)}
.nav-in{display:flex;align-items:center;justify-content:space-between;height:68px}
.nav-logo img{height:42px;width:auto}
.nav-links{display:flex;align-items:center;gap:26px}
.nav-links a{font-size:.85rem;font-weight:500;color:rgba(255,255,255,.68);transition:color .2s}
.nav-links a:hover,.nav-links a.cur{color:#FFF;text-decoration:none}

/* ══════════════════════════════════════════
   HERO - FULL-WIDTH CENTERED (COMPLETELY REBUILT)
   No grid. No columns. Clean vertical layout.
══════════════════════════════════════════ */
.hero{
  background:linear-gradient(150deg,#026870 0%,#038791 45%,#072F58 100%);
  padding:80px 0 0;
  position:relative;
  overflow:hidden;
}
.hero::before{
  content:'';position:absolute;inset:0;
  background-image:radial-gradient(rgba(255,255,255,.04) 1px,transparent 1px);
  background-size:28px 28px;
  pointer-events:none;
}
.hero-glow{
  position:absolute;right:-100px;top:-100px;
  width:500px;height:500px;
  background:radial-gradient(circle,rgba(255,255,255,.06) 0%,transparent 65%);
  pointer-events:none;
}

/* Centered text block */
.hero-center{
  position:relative;z-index:2;
  text-align:center;
  max-width:890px;
  margin:0 auto;
  padding:0 24px;
}
.hero-eyebrow{
  display:inline-flex;align-items:center;gap:7px;
  background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);
  border-radius:50px;padding:5px 16px;
  font-size:.72rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  color:#FFF;margin-bottom:20px;
}
.hero-h1{
  font-size:clamp(2.4rem,5vw,3.8rem);
  font-weight:800;color:#FFF;
  line-height:1.06;letter-spacing:-.025em;
  margin-bottom:22px;
}
.hero-h1 .hl{
  display:inline-block;
  background:linear-gradient(90deg,#A8E3E6,#FFF);
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;
  background-clip:text;
}
.hero-sub{
  font-size:1.05rem;color:rgba(255,255,255,.78);
  max-width:800px;margin:0 auto 28px;
  line-height:1.7;
}
.hero-btns{
  display:flex;align-items:center;justify-content:center;
  flex-wrap:wrap;gap:12px;
  margin-bottom:16px;
}
.hero-note{
  font-size:.76rem;color:rgba(255,255,255,.4);
  margin-bottom:52px;
}

/* ── HERO IMAGE: browser frame with real screenshot ── */
.hero-browser{
  position:relative;z-index:2;
  margin:0 auto;
  max-width:1000px;
  padding:0 24px;
}
.browser-frame{
  background:#1E1E1E;
  border-radius:14px 14px 0 0;
  overflow:hidden;
  box-shadow:0 -8px 48px rgba(0,0,0,.35);
}
.browser-bar{
  background:#2D2D2D;
  padding:10px 16px;
  display:flex;
  align-items:center;
  gap:12px;
}
.browser-dots{
  display:flex;gap:6px;flex-shrink:0;
}
.browser-dot{
  width:12px;height:12px;border-radius:50%;
}
.bd-r{background:#FF5F57}
.bd-y{background:#FFBD2E}
.bd-g{background:#28CA41}
.browser-url{
  flex:1;background:#3D3D3D;
  border-radius:6px;padding:5px 14px;
  font-size:.75rem;color:rgba(255,255,255,.6);
  display:flex;align-items:center;gap:7px;
}
.browser-url-lock{font-size:.7rem;color:#38791}
.browser-img{
  width:100%;
  height:380px;
  object-fit:cover;
  object-position:center top;
  display:block;
}

/* ── PLATFORM STRIP ── */
.plat-strip{background:#FFF;border-bottom:1.5px solid #D4DFEE;padding:16px 0}
.plat-in{display:flex;align-items:center;justify-content:center;flex-wrap:wrap}
.plat-lbl{font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#536070;padding:6px 20px;border-right:1px solid #D4DFEE}
.plat-it{display:flex;align-items:center;gap:6px;padding:6px 20px;border-right:1px solid #D4DFEE;font-family:'Plus Jakarta Sans',sans-serif;font-size:.82rem;font-weight:700;color:#536070}
.plat-it:last-child{border-right:none}

/* ── TRUST BAR ── */
.trust{background:#072F58;padding:13px 0}
.trust-in{display:flex;flex-wrap:wrap;align-items:center;justify-content:center}
.ti{display:flex;align-items:center;gap:7px;font-size:.79rem;font-weight:600;color:rgba(255,255,255,.62);padding:4px 18px;border-right:1px solid rgba(255,255,255,.08)}
.ti:last-child{border-right:none}
.tdot{width:7px;height:7px;border-radius:50%;background:#038791;flex-shrink:0}

/* ── INTRO SPLIT ── */
.intro-grid{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
.intro-img-wrap{position:relative;border-radius:var(--rl);overflow:hidden;box-shadow:var(--s3)}
.intro-img{width:100%;height:420px;object-fit:cover;display:block}
.intro-badge{position:absolute;bottom:20px;left:20px;background:#FFF;border-radius:var(--r);padding:14px 16px;box-shadow:var(--s2);display:flex;align-items:center;gap:10px}
.ib-dot{width:10px;height:10px;border-radius:50%;background:#10B981;animation:pulse 2s infinite;flex-shrink:0}
@keyframes pulse{0%,100%{box-shadow:0 0 0 0 rgba(16,185,129,.4)}50%{box-shadow:0 0 0 6px rgba(16,185,129,0)}}
.ib-txt strong{display:block;font-size:.82rem;font-weight:700;color:#072F58}
.ib-txt span{font-size:.74rem;color:#536070}

/* ── DIFF GRID (WHY EC SEO DIFFERENT) ── */
.diff-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.diff-card{background:#FFF;border:1.5px solid #D4DFEE;border-top:3px solid #038791;border-radius:10px;padding:22px 20px;box-shadow:var(--s1)}
.diff-icon{width:42px;height:42px;background:#E0F5F5;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;font-size:1.3rem}
.diff-title{font-size:.9rem;font-weight:700;color:#072F58;margin-bottom:7px}
.diff-text{font-size:.82rem;color:#536070;line-height:1.65}

/* ── REVENUE STATS ── */
.rev-stats{display:grid;grid-template-columns:repeat(4,1fr);background:#072F58;border-radius:var(--rl);overflow:hidden;box-shadow:var(--s2)}
.rs{padding:26px 22px;text-align:center;border-right:1px solid rgba(255,255,255,.08)}
.rs:last-child{border-right:none}
.rs-num{font-family:'Plus Jakarta Sans',sans-serif;font-size:2rem;font-weight:800;letter-spacing:-.03em;line-height:1;margin-bottom:5px}
.rs-gold{color:#F59E0B}.rs-teal{color:#038791}.rs-white{color:#FFF}.rs-grn{color:#10B981}
.rs-lbl{font-size:.75rem;color:rgba(255,255,255,.5);line-height:1.4}

/* ── IMG BANNER ── */
.img-banner{position:relative;overflow:hidden;height:280px}
.img-banner img{width:100%;height:100%;object-fit:cover;object-position:center 35%}
.ib-ov{position:absolute;inset:0;background:linear-gradient(90deg,rgba(4,29,58,.9) 0%,rgba(4,29,58,.5) 55%,rgba(4,29,58,.1) 100%)}
.ib-con{position:absolute;inset:0;display:flex;align-items:center}
.ib-text{max-width:520px;padding-left:max(24px,calc((100% - 1160px)/2 + 24px))}
.ib-text h2{font-size:clamp(1.3rem,2.4vw,1.95rem);color:#FFF;margin-bottom:10px;line-height:1.25}
.ib-text p{color:rgba(255,255,255,.72);font-size:.88rem;margin-bottom:18px}

/* ══════════════════════════════════════════
   PACKAGES - FIXED HORIZONTAL CARDS
   Text color explicit on every element.
══════════════════════════════════════════ */
.pkg-stack{display:flex;flex-direction:column;gap:20px}

/* Base card */
.phc{
  background:#FFF;
  border:1.5px solid #D4DFEE;
  border-radius:var(--rl);
  overflow:hidden;
  box-shadow:var(--s1);
  transition:box-shadow .28s,transform .28s;
  display:grid;
  grid-template-columns:210px 1fr 165px;
}
.phc:hover{box-shadow:var(--s2);transform:translateY(-3px)}

/* Hot card */
.phc.hot{border-color:#038791;box-shadow:0 0 0 1px #038791,var(--s2)}

/* LEFT: price */
.pc-left{
  padding:26px 22px;
  background:#FFF;
  border-right:1.5px solid #D4DFEE;
  display:flex;flex-direction:column;justify-content:center;
  position:relative;
}
.phc.hot .pc-left{background:#041D3A;border-right-color:rgba(255,255,255,.1)}

.pc-hot-badge{
  position:absolute;top:-1px;right:-1px;
  background:linear-gradient(90deg,#038791,#026870);
  color:#FFF;font-size:.62rem;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;
  padding:4px 12px;border-radius:0 0 0 8px;
}
.pc-size{
  display:inline-flex;align-items:center;gap:5px;
  background:#E0F5F5;color:#026870;
  font-size:.67rem;font-weight:700;
  padding:3px 10px;border-radius:50px;
  margin-bottom:10px;width:fit-content;
}
.phc.hot .pc-size{background:rgba(3,135,145,.25);color:#A8E3E6}
.pc-tier{font-size:.7rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#038791;margin-bottom:7px}
.phc.hot .pc-tier{color:#A8E3E6}
.pc-price{font-family:'Plus Jakarta Sans',sans-serif;font-size:2.1rem;font-weight:800;color:#072F58;letter-spacing:-.03em;line-height:1}
.phc.hot .pc-price{color:#FFF}
.pc-per{font-size:.79rem;color:#536070}
.phc.hot .pc-per{color:rgba(255,255,255,.5)}
.pc-tag{font-size:.78rem;color:#536070;margin-top:9px;line-height:1.5}
.phc.hot .pc-tag{color:rgba(255,255,255,.55)}

/* MID: features */
.pc-mid{
  padding:22px 24px;
  background:#FFF;
  border-right:1.5px solid #D4DFEE;
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:8px 18px;
  align-content:start;
}
.phc.hot .pc-mid{background:#072F58;border-right-color:rgba(255,255,255,.1)}

/* Feature row */
.pf{display:flex;align-items:flex-start;gap:8px}
.pf-check{
  width:15px;height:15px;border-radius:50%;
  background:#E0F5F5;
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;margin-top:3px;
}
.phc.hot .pf-check{background:rgba(3,135,145,.3)}
.pf-check svg{width:8px;height:8px;stroke:#038791;stroke-width:3;fill:none}
.phc.hot .pf-check svg{stroke:#A8E3E6}
/* THE TEXT - explicit color, no inheritance */
.pf-txt{font-size:.8rem;line-height:1.45;font-weight:400;color:#0E1C30}
.phc.hot .pf-txt{color:#FFF}

/* RIGHT: CTA + metrics */
.pc-right{
  padding:22px 18px;
  background:#F4F7FB;
  display:flex;flex-direction:column;
  gap:12px;align-items:center;justify-content:center;
}
.phc.hot .pc-right{background:#041D3A}
.pc-cta{
  display:block;text-align:center;
  padding:11px 16px;border-radius:50px;
  font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.84rem;
  transition:all .22s;text-decoration:none;width:100%;cursor:pointer;border:none;
}
.pc-cta-d{background:#FFF;color:#072F58;border:1.5px solid #D4DFEE}
.pc-cta-d:hover{background:#E0F5F5;border-color:#038791;color:#072F58;text-decoration:none}
.pc-cta-h{background:linear-gradient(135deg,#038791,#026870);color:#FFF;box-shadow:0 4px 14px rgba(3,135,145,.42)}
.pc-cta-h:hover{transform:translateY(-2px);box-shadow:0 8px 22px rgba(3,135,145,.52);color:#FFF;text-decoration:none}
.pc-div{width:100%;height:1px;background:#D4DFEE}
.phc.hot .pc-div{background:rgba(255,255,255,.1)}
.pc-mets{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}
.pc-met{text-align:center}
.pc-mv{font-family:'Plus Jakarta Sans',sans-serif;font-size:1rem;font-weight:800;display:block;color:#072F58}
.phc.hot .pc-mv{color:#FFF}
.pc-ml{font-size:.64rem;display:block;color:#536070;margin-top:1px}
.phc.hot .pc-ml{color:rgba(255,255,255,.45)}

.pkg-note{text-align:center;font-size:.76rem;color:#536070;margin-top:16px}

/* ── INLINE CTA ── */
.icta{background:linear-gradient(135deg,#072F58,#0A3D5C);border-radius:var(--rl);padding:44px 48px;display:flex;align-items:center;justify-content:space-between;gap:24px;position:relative;overflow:hidden}
.icta::before{content:'🛒';position:absolute;right:160px;top:-15px;font-size:8rem;opacity:.04;pointer-events:none}
.icta h3{font-size:1.45rem;color:#FFF;margin-bottom:8px}
.icta p{color:rgba(255,255,255,.65);font-size:.88rem;max-width:450px}
.icta-btns{display:flex;gap:11px;flex-shrink:0;flex-wrap:wrap}

/* ── GOOGLE SCREENSHOT SECTION ── */
.gscr-grid{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
.gscr-img-wrap{border-radius:var(--rl);overflow:hidden;box-shadow:var(--s3);position:relative}
.gscr-img{width:100%;height:420px;object-fit:cover;object-position:center top;display:block}
.gscr-badge{position:absolute;top:16px;left:16px;background:#FFF;border-radius:8px;padding:10px 14px;box-shadow:var(--s2);display:flex;align-items:center;gap:8px;font-size:.78rem;font-weight:700;color:#072F58}
.gscr-badge-dot{width:8px;height:8px;border-radius:50%;background:#10B981;flex-shrink:0}

/* ── DELIVERABLES 3-COL ── */
.d3{display:grid;grid-template-columns:repeat(3,1fr);border-radius:var(--rl);overflow:hidden;box-shadow:var(--s2);border:1.5px solid #D4DFEE}
.d3c{padding:26px 22px;border-right:1.5px solid #D4DFEE;background:#FFF}
.d3c.d3mid{background:#072F58;border-right-color:rgba(255,255,255,.1)}
.d3c:last-child{border-right:none}
.d3h{display:flex;align-items:center;gap:10px;margin-bottom:16px;padding-bottom:14px;border-bottom:1px solid #D4DFEE}
.d3mid .d3h{border-bottom-color:rgba(255,255,255,.1)}
.d3-icon{width:34px;height:34px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0}
.d3-name{font-size:.76rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.d3list{display:flex;flex-direction:column;gap:9px}
.d3item{display:flex;align-items:flex-start;gap:7px;font-size:.81rem;line-height:1.5;color:#0E1C30}
.d3mid .d3item{color:rgba(255,255,255,.85)}
.d3dot{width:5px;height:5px;border-radius:50%;flex-shrink:0;margin-top:7px}

/* ── TECH CHALLENGES ── */
.tc-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:18px}
.tc{background:#FFF;border:1.5px solid #D4DFEE;border-left:3px solid #038791;border-radius:10px;padding:20px 18px;box-shadow:var(--s1)}
.tc-warn{display:inline-flex;align-items:center;gap:5px;background:#FEF3C7;color:#92400E;font-size:.65rem;font-weight:700;padding:3px 8px;border-radius:20px;margin-bottom:9px;letter-spacing:.06em;text-transform:uppercase}
.tc-title{font-size:.88rem;font-weight:700;color:#072F58;margin-bottom:6px}
.tc-text{font-size:.81rem;color:#536070;line-height:1.65}
.tc-fix{display:flex;align-items:flex-start;gap:7px;margin-top:10px;padding:8px 10px;border-radius:7px;background:#D1FAE5;border:1px solid #6EE7B7;font-size:.78rem;color:#065F46;line-height:1.55}

/* ── PLATFORM TABS ── */
.ptabs{display:flex;background:#EBF0F7;border-radius:10px;padding:5px;margin-bottom:24px;border:1.5px solid #D4DFEE;overflow-x:auto;gap:4px}
.ptab{padding:10px 20px;border-radius:7px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;font-size:.83rem;cursor:pointer;border:none;background:transparent;color:#536070;transition:all .22s;white-space:nowrap}
.ptab.active{background:#FFF;color:#072F58;box-shadow:var(--s1)}
.ppane{display:none;animation:fadeUp .25s ease}
.ppane.active{display:grid;grid-template-columns:1fr 1fr;gap:16px}
@keyframes fadeUp{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:translateY(0)}}
.pp{background:#FFF;border:1.5px solid #D4DFEE;border-radius:10px;padding:18px 16px;box-shadow:var(--s1)}
.pp h3{font-size:.86rem;font-weight:700;color:#072F58;margin-bottom:6px}
.pp p{font-size:.8rem;color:#536070;line-height:1.65}

/* ── COMPARE TABLE ── */
.ctb{width:100%;border-collapse:collapse;font-size:.83rem;border-radius:10px;overflow:hidden;box-shadow:var(--s1)}
.ctb thead{background:#072F58}
.ctb thead th{padding:14px 16px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.78rem;text-align:left;color:rgba(255,255,255,.82)}
.ctb thead th:nth-child(2){background:rgba(3,135,145,.22);color:#A8E3E6}
.ctb tbody tr{border-bottom:1px solid #D4DFEE;background:#FFF}
.ctb tbody tr:hover{background:#F4F7FB}
.ctb td{padding:11px 16px;vertical-align:middle;color:#0E1C30}
.ctb td:nth-child(2){background:rgba(224,245,245,.35)}
.cy{color:#038791;font-weight:700}.cn{color:#CBD5E1}.cw{color:#F59E0B;font-size:.78rem;font-weight:600}

/* ── STEPS ── */
.steps4{display:grid;grid-template-columns:repeat(4,1fr);position:relative}
.steps4::before{content:'';position:absolute;top:28px;left:calc(12.5% + 14px);right:calc(12.5% + 14px);height:2px;background:linear-gradient(90deg,#038791,#072F58);opacity:.2}
.stepc{text-align:center;padding:0 14px}
.stepn{width:56px;height:56px;margin:0 auto 14px;background:linear-gradient(135deg,#038791,#026870);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Plus Jakarta Sans',sans-serif;font-size:1.2rem;font-weight:800;color:#FFF;position:relative;z-index:1}
.stept{font-size:.92rem;font-weight:700;margin-bottom:6px;color:#072F58}
.stepd{font-size:.8rem;color:#536070;line-height:1.65}

/* ── FAQ ── */
.faq-wrap{max-width:760px;margin:0 auto}
.fq{border-bottom:1px solid #D4DFEE}
.fq:first-child{border-top:1px solid #D4DFEE}
.fq-btn{width:100%;display:flex;align-items:center;justify-content:space-between;gap:10px;padding:18px 0;background:none;border:none;cursor:pointer;text-align:left;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:.9rem;color:#072F58;transition:color .2s}
.fq-btn:hover,.fq-btn.open{color:#038791}
.fq-ic{width:26px;height:26px;background:#F4F7FB;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .2s,transform .25s}
.fq-btn.open .fq-ic{background:#E0F5F5;transform:rotate(45deg)}
.fq-ic svg{width:12px;height:12px;stroke:#536070;stroke-width:2.5;fill:none}
.fq-btn.open .fq-ic svg{stroke:#038791}
.fq-body{display:none;padding-bottom:15px;font-size:.87rem;color:#536070;line-height:1.75}
.fq-body.open{display:block}

/* ── FINAL CTA ── */
.fcta{padding:96px 0;text-align:center;background:linear-gradient(150deg,#026870,#038791 40%,#072F58 100%);position:relative;overflow:hidden}
.fcta::before{content:'';position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,.04) 1px,transparent 1px);background-size:24px 24px}
.fcta-in{position:relative;z-index:1;max-width:600px;margin:0 auto}
.fcta-h{font-size:clamp(1.9rem,3.8vw,2.9rem);font-weight:800;color:#FFF;letter-spacing:-.022em;margin-bottom:12px;line-height:1.15}
.fcta-p{font-size:1rem;color:rgba(255,255,255,.7);margin-bottom:36px;line-height:1.65}
.fcta-note{font-size:.74rem;color:rgba(255,255,255,.35);margin-top:16px}

/* ── FOOTER ── */
.foot{background:#041D3A;padding:28px 0;border-top:1px solid rgba(255,255,255,.06)}
.foot-in{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px}
.foot-links{display:flex;gap:20px}
.foot-links a{font-size:.76rem;color:rgba(255,255,255,.38)}
.foot-links a:hover{color:#038791;text-decoration:none}
.foot-copy{font-size:.74rem;color:rgba(255,255,255,.26)}

/* ── CTA BAND ── */
.cta-band{background:#E0F5F5;border:1.5px solid #A8E3E6;border-radius:var(--rl);padding:36px 44px;display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap}
.cta-band h3{font-size:1.1rem;color:#072F58;margin-bottom:5px}
.cta-band p{font-size:.85rem;color:#536070;max-width:420px}

/* ── RESPONSIVE ── */
@media(max-width:1080px){
  .phc,.phc.hot{grid-template-columns:1fr;display:block}
  .pc-left{border-right:none;border-bottom:1.5px solid #D4DFEE}
  .phc.hot .pc-left{border-bottom-color:rgba(255,255,255,.1)}
  .pc-mid{border-right:none;border-bottom:1.5px solid #D4DFEE}
  .phc.hot .pc-mid{border-bottom-color:rgba(255,255,255,.1)}
  .pc-right{border-left:none;flex-direction:row;flex-wrap:wrap;justify-content:center}
  .diff-grid{grid-template-columns:repeat(2,1fr)}
  .d3{grid-template-columns:1fr}
  .d3c,.d3c.d3mid{border-right:none;border-bottom:1.5px solid #D4DFEE}
  .d3c:last-child{border-bottom:none}
  .d3mid{border-bottom-color:rgba(255,255,255,.1)}
  .intro-grid,.gscr-grid{grid-template-columns:1fr;gap:32px}
  .tc-grid{grid-template-columns:1fr}
  .ppane.active{grid-template-columns:1fr}
}
@media(max-width:768px){
  .sec{padding:52px 0}
  .nav-links{display:none}
  .hero{padding:56px 0 0}
  .browser-img{height:220px}
  .hero-h1{font-size:2.2rem}
  .hero-btns{flex-direction:column;align-items:center}
  .rev-stats{grid-template-columns:repeat(2,1fr)}
  .rs:nth-child(2){border-right:none}
  .diff-grid{grid-template-columns:1fr}
  .steps4{grid-template-columns:repeat(2,1fr)}
  .steps4::before{display:none}
  .icta{flex-direction:column;padding:28px 24px;text-align:center}
  .icta p{max-width:none}
  .cta-band{flex-direction:column;text-align:center}
  .ti{border-right:none;border-bottom:1px solid rgba(255,255,255,.07);width:100%;justify-content:center}
  .foot-in{flex-direction:column;align-items:flex-start}
  .ctb th,.ctb td{padding:9px 10px;font-size:.74rem}
  .ib-text{padding:0 20px}
  .pc-mid{grid-template-columns:1fr}
  .plat-in{flex-direction:column;align-items:flex-start}
  .plat-it,.plat-lbl{border-right:none;border-bottom:1px solid #D4DFEE;width:100%}
}
</style>

<!-- STICKY BAR -->
<div class="sb" id="sbar">
  <div>
    <div class="sbt">AffordableSEO from <strong style="font-size:1.05em">$499/mo</strong><em> &nbsp;&middot;&nbsp; Shopify, WooCommerce &amp; Magento &nbsp;&middot;&nbsp; Free audit included</em></div>
  </div>
  <div style="display:flex;gap:10px;align-items:center;flex-shrink:0">
    <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="btn bt-w" style="padding:9px 20px;font-size:.84rem;">Get Free Store Audit</a>
    <button class="sbx" onclick="document.getElementById('sbar').style.display='none'">&#215;</button>
  </div>
</div>


<!-- ═══ HERO: CENTERED, CLEAN, NO GRID ═══ -->
<section class="hero">
  <div class="hero-glow"></div>

  <!-- Centered text -->
  <div class="hero-center">
    <!--<div class="hero-eyebrow">-->
    <!--  <svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>-->
    <!--  Ecommerce SEO Packages &amp; Pricing-->
    <!--</div>-->
    <h1 class="hero-h1">
     Affordable Ecommerce SEO Packages &amp; Pricing
    </h1>
    <p class="hero-sub">
      YFG's ecommerce SEO packages cover product and category page optimisation, technical store audits, Product schema, crawl budget management, and AI Shopping Graph visibility - starting from $499/month with a free audit and no setup fee.
    </p>
    <div class="hero-btns">
      <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="btn bt-w bt-lg">Get My Free Store Audit</a>
      <a href="#packages" class="btn bo">View Packages &amp; Pricing</a>
    </div>
    <p class="hero-note">Free audit &nbsp;&middot;&nbsp; No setup fee &nbsp;&middot;&nbsp; No annual contract &nbsp;&middot;&nbsp; Shopify, WooCommerce, Magento &amp; BigCommerce</p>
  </div>

  <!-- Browser frame with real Unsplash analytics image -->
  <div class="hero-browser">
    <div class="browser-frame">
      <div class="browser-bar">
        <div class="browser-dots">
          <div class="browser-dot bd-r"></div>
          <div class="browser-dot bd-y"></div>
          <div class="browser-dot bd-g"></div>
        </div>
        <div class="browser-url">
          <span class="browser-url-lock">🔒</span>
          <span>search.google.com/search-console/performance &nbsp;&mdash;&nbsp; <span style="color:#10B981;font-weight:600">Organic clicks up 184% vs previous period</span></span>
        </div>
      </div>
      <img class="browser-img"
        src="<?php echo esc_url( YFG_URI . '/assets/images/ecommerce-seo-packages/ecommerce-seo-packages-hero-bg.jpeg' ); ?>"
        alt="Google Search Console showing organic traffic growth from ecommerce SEO campaign"
        loading="eager">
    </div>
  </div>
</section>

<!-- PLATFORM STRIP -->
<div class="plat-strip">
  <div class="container">
    <div class="plat-in">
      <div class="plat-lbl">Works with</div>
      <div class="plat-it">🟢 Shopify</div>
      <div class="plat-it">🟣 WooCommerce</div>
      <div class="plat-it">🟠 Magento</div>
      <div class="plat-it">⬛ BigCommerce</div>
      <div class="plat-it">🩷 PrestaShop</div>
      <div class="plat-it">🔷 Wix / Custom</div>
    </div>
  </div>
</div>

<!-- TRUST BAR -->
<div class="trust">
  <div class="container">
    <div class="trust-in">
      <div class="ti"><span class="tdot"></span>UK, USA, Germany &amp; Europe</div>
      <div class="ti"><span class="tdot"></span>Free Store Audit Included</div>
      <div class="ti"><span class="tdot"></span>Product Schema on Every Plan</div>
      <div class="ti"><span class="tdot"></span>No Setup Fee</div>
      <div class="ti"><span class="tdot"></span>GDPR Compliant</div>
      <div class="ti"><span class="tdot"></span>No Annual Contract</div>
    </div>
  </div>
</div>

<!-- INTRO WITH REAL IMAGE -->
<section class="sec">
  <div class="container">
    <div class="intro-grid">
      <div class="intro-img-wrap">
        <img class="intro-img"
          src="<?php echo esc_url( YFG_URI . '/assets/images/ecommerce-seo-packages/ecbusiness-data-analytics-dashboard.jpg' ); ?>"
          alt="Ecommerce SEO specialist reviewing Google Search results and keyword rankings"
          loading="lazy">
        <div class="intro-badge">
          <span class="ib-dot"></span>
          <div class="ib-txt">
            <strong>Organic rankings improving</strong>
            <span>Live campaign running</span>
          </div>
        </div>
      </div>
      <div>
        <span class="chip">Why Ecommerce SEO Matters</span>
        <h2 class="sh">Organic Traffic Is the Only Channel That Compounds Month on Month</h2>
        <p style="color:#536070;font-size:1rem;line-height:1.75">Paid ads stop the moment you stop paying. Organic rankings keep delivering traffic - and revenue - around the clock at zero cost per click. For an ecommerce store, moving a category page from position five to position one can be worth tens of thousands of dollars a year in incremental revenue without increasing your ad spend by a penny.</p>
        <p style="color:#536070;font-size:1rem;line-height:1.75">Your Firm Growth's ecommerce SEO packages are built for the specific technical complexity of online stores: product variant canonicalisation, faceted navigation control, crawl budget allocation, rich snippet implementation, and platform-specific fixes that generic SEO agencies miss entirely.</p>
        <div style="display:flex;gap:12px;margin-top:22px;flex-wrap:wrap">
          <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="btn bt-t">Get a Free Store Audit</a>
          <a href="/services/" class="btn bon">All Services</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WHY ECOMMERCE SEO IS DIFFERENT -->
<section class="sec sec-alt">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Ecommerce vs Generic SEO</span>
      <h2 class="sh">Six Challenges Unique to Ecommerce Stores</h2>
      <p class="sp">These do not appear on brochure websites. Every one can suppress your rankings without showing a warning in Google Search Console.</p>
    </div>
    <div class="diff-grid">
      <div class="diff-card"><div class="diff-icon">🕷️</div><h3 class="diff-title">Crawl Budget Management</h3><p class="diff-text">Large catalogs exhaust Google's crawl budget before your most valuable pages are reached. Your newest, highest-converting products may never be indexed regardless of how well they are written.</p></div>
      <div class="diff-card"><div class="diff-icon">🔀</div><h3 class="diff-title">Faceted Navigation Control</h3><p class="diff-text">Filter parameters generate thousands of near-duplicate URLs diluting your site's authority. Managing which combinations Google can index is one of the most impactful - and overlooked - ecommerce SEO tasks.</p></div>
      <div class="diff-card"><div class="diff-icon">📦</div><h3 class="diff-title">Product Variant Duplication</h3><p class="diff-text">A product in 12 colours and 8 sizes can create 96 near-identical URLs. Without correct canonical configuration, ranking signals are split across variants, suppressing your main product page from the top positions.</p></div>
      <div class="diff-card"><div class="diff-icon">🏷️</div><h3 class="diff-title">Product Schema &amp; Rich Results</h3><p class="diff-text">Correctly implemented Product structured data shows star ratings, price, stock status, and shipping directly in search results - increasing click-through rates without changing your ranking position.</p></div>
      <div class="diff-card"><div class="diff-icon">📂</div><h3 class="diff-title">Category Page Authority</h3><p class="diff-text">Category pages are typically the highest-traffic, highest-converting pages in any store. Yet most treat them as thin pagination wrappers. Building genuine authority here delivers more organic revenue than product page work alone.</p></div>
      <div class="diff-card"><div class="diff-icon">🤖</div><h3 class="diff-title">AI Shopping Graph Visibility</h3><p class="diff-text">In 2026, Google's AI Shopping Graph and ChatGPT's shopping integrations surface products in conversational AI responses. Appearing there requires structured data, brand entity work, and Merchant Center alignment.</p></div>
    </div>
  </div>
</section>

<!-- REVENUE STATS -->
<div class="container" style="padding-bottom:56px">
  <div class="rev-stats">
    <div class="rs"><div class="rs-num rs-gold">$499</div><div class="rs-lbl">Starting price per month - well below the nearest named competitor at $899+</div></div>
    <div class="rs"><div class="rs-num rs-teal">30%</div><div class="rs-lbl">Average share of organic clicks going to position one - every ranking has a dollar value</div></div>
    <div class="rs"><div class="rs-num rs-grn">$0</div><div class="rs-lbl">Setup fee on any plan - the audit is free and included before you commit to anything</div></div>
    <div class="rs"><div class="rs-num rs-white">6</div><div class="rs-lbl">Ecommerce platforms supported: Shopify, WooCommerce, Magento, BigCommerce, PrestaShop, Wix</div></div>
  </div>
</div>

<!-- IMAGE BANNER 1 -->
<div class="img-banner" >
  <img src="<?php echo esc_url( YFG_URI . '/assets/images/ecommerce-seo-packages/ecommerce-seo-packages-banner.webp' ); ?>" alt="Customer shopping online on mobile - ecommerce organic traffic and revenue growth" loading="lazy">
  <div class="ib-ov"></div>
  <div class="ib-con">
    <div class="container">
      <div class="ib-text" style="padding: 40px 0;">
        <h2>Position one captures 30% of all clicks. Position two gets 13%.</h2>
        <p>For an ecommerce store at $500K/year in revenue with 40% from organic, moving your top category page from position four to position one can be worth $30,000–$50,000 a year in additional revenue.</p>
        <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="btn bw2">Calculate My Store's Potential</a>
      </div>
    </div>
  </div>
</div>

<!-- PACKAGES -->
<section class="sec sec-alt" id="packages">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Pricing &amp; Plans</span>
      <h2 class="sh">Ecommerce SEO Packages &amp; Pricing</h2>
      <p class="sp">Four tiers built around store size and catalog complexity. Free audit before work starts. All prices in USD, no setup fee.</p>
    </div>

    <div class="pkg-stack">

      <!-- STARTER -->
      <div class="phc">
        <div class="pc-left">
          <div class="pc-size">🛒 Up to 100 products</div>
          <div class="pc-tier">Starter</div>
          <div style="display:flex;align-items:baseline;gap:3px;margin-bottom:4px"><span class="pc-price">$499</span><span class="pc-per">/mo</span></div>
          <p class="pc-tag">New or small stores in low-competition niches building their organic foundation.</p>
        </div>
        <div class="pc-mid">
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Technical ecommerce audit (initial)</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Product schema on all in-scope pages</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Up to 15 keywords targeted</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">10 pages optimised per month</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Canonical &amp; duplicate URL fix</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">2 category descriptions per month</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">3 quality backlinks per month</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Monthly performance report</span></div>
        </div>
        <div class="pc-right">
          <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="pc-cta pc-cta-d">Get Started</a>
          <div class="pc-div"></div>
          <div class="pc-mets">
            <div class="pc-met"><span class="pc-mv">15</span><span class="pc-ml">keywords</span></div>
            <div class="pc-met"><span class="pc-mv">3</span><span class="pc-ml">links/mo</span></div>
            <div class="pc-met"><span class="pc-mv">$0</span><span class="pc-ml">setup</span></div>
          </div>
        </div>
      </div>

      <!-- GROWTH HOT -->
      <div class="phc hot">
        <div class="pc-left">
          <div class="pc-hot-badge">Most Popular</div>
          <div class="pc-size">🛒 100–500 products</div>
          <div class="pc-tier">Growth</div>
          <div style="display:flex;align-items:baseline;gap:3px;margin-bottom:4px"><span class="pc-price">$899</span><span class="pc-per">/mo</span></div>
          <p class="pc-tag">Growing stores ready to compete for high-value category and product keywords.</p>
        </div>
        <div class="pc-mid">
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Full platform technical audit + fixes</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Product + Review + BreadcrumbList schema</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Up to 40 keywords targeted</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">25 pages optimised per month</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Faceted nav &amp; crawl budget management</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">4 content pieces per month</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">6 quality backlinks per month</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Monthly report + strategy call</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">AI Shopping Graph optimisation</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Core Web Vitals monitoring &amp; fixes</span></div>
        </div>
        <div class="pc-right">
          <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="pc-cta pc-cta-h">Get Started</a>
          <div class="pc-div"></div>
          <div class="pc-mets">
            <div class="pc-met"><span class="pc-mv">40</span><span class="pc-ml">keywords</span></div>
            <div class="pc-met"><span class="pc-mv">6</span><span class="pc-ml">links/mo</span></div>
            <div class="pc-met"><span class="pc-mv">$0</span><span class="pc-ml">setup</span></div>
          </div>
        </div>
      </div>

      <!-- SCALE -->
      <div class="phc">
        <div class="pc-left">
          <div class="pc-size">🛒 500–5,000 products</div>
          <div class="pc-tier">Scale</div>
          <div style="display:flex;align-items:baseline;gap:3px;margin-bottom:4px"><span class="pc-price">$1,499</span><span class="pc-per">/mo</span></div>
          <p class="pc-tag">Established stores in competitive markets needing aggressive content and link building.</p>
        </div>
        <div class="pc-mid">
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Monthly technical audit + implementation</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Full schema suite incl. Offer + ItemList</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Up to 100 keywords targeted</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Full site on-page optimisation</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Full faceted nav + crawl budget control</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">8 content pieces per month</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">12 high-authority backlinks per month</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Full AI Shopping Graph strategy</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Core Web Vitals full implementation</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Dedicated account manager</span></div>
        </div>
        <div class="pc-right">
          <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="pc-cta pc-cta-d">Get Started</a>
          <div class="pc-div"></div>
          <div class="pc-mets">
            <div class="pc-met"><span class="pc-mv">100</span><span class="pc-ml">keywords</span></div>
            <div class="pc-met"><span class="pc-mv">12</span><span class="pc-ml">links/mo</span></div>
            <div class="pc-met"><span class="pc-mv">$0</span><span class="pc-ml">setup</span></div>
          </div>
        </div>
      </div>

      <!-- ENTERPRISE -->
      <div class="phc">
        <div class="pc-left">
          <div class="pc-size">🛒 5,000+ / Multi-store</div>
          <div class="pc-tier">Enterprise</div>
          <div style="display:flex;align-items:baseline;gap:3px;margin-bottom:4px"><span class="pc-price" style="font-size:1.8rem;letter-spacing:-.01em">Custom</span></div>
          <p class="pc-tag">Large catalogues, multi-store, international ecommerce, and platform migrations.</p>
        </div>
        <div class="pc-mid">
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Unlimited SKUs and pages in scope</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Platform migration SEO (zero-loss)</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Multi-language / hreflang ecommerce</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">International market strategy</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Custom content programme</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Custom link building programme</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Google Merchant Center alignment</span></div>
          <div class="pf"><span class="pf-check"><svg viewBox="0 0 8 8"><polyline points="1,4 3,6.5 7,1.5"/></svg></span><span class="pf-txt">Senior account director</span></div>
        </div>
        <div class="pc-right">
          <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="pc-cta pc-cta-d">Request Proposal</a>
          <div class="pc-div"></div>
          <div class="pc-mets">
            <div class="pc-met"><span class="pc-mv">&#8734;</span><span class="pc-ml">SKUs</span></div>
            <div class="pc-met"><span class="pc-mv">Custom</span><span class="pc-ml">scope</span></div>
          </div>
        </div>
      </div>
    </div>
    <p class="pkg-note">All prices USD &nbsp;&middot;&nbsp; 3-month initial term then rolling monthly &nbsp;&middot;&nbsp; Free audit before work starts &nbsp;&middot;&nbsp; GBP/EUR pricing on request</p>
  </div>
</section>

<!-- INLINE CTA -->
<section style="padding:36px 0">
  <div class="container">
    <div class="icta">
      <div>
        <h3>Not sure which ecommerce SEO package fits your store?</h3>
        <p>Tell us your platform, catalog size, and top categories. We will audit your store's organic performance for free and show exactly what is holding your product pages back.</p>
      </div>
      <div class="icta-btns">
        <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="btn bt-t bt-lg">Get My Free Store Audit</a>
        <a href="mailto:info@yourfirmgrowth.com" class="btn bo">Email Our Team</a>
      </div>
    </div>
  </div>
</section>

<!-- GOOGLE SEARCH SCREENSHOT SECTION -->
<section class="sec">
  <div class="container">
    <div class="gscr-grid">
      <div class="gscr-img-wrap">
        <img class="gscr-img"
          src="<?php echo esc_url( YFG_URI . '/assets/images/ecommerce-seo-packages/ecommerce-seo-packages-split.webp' ); ?>"
          alt="SEO analytics dashboard showing organic keyword rankings and traffic growth for ecommerce store"
          loading="lazy">
        <div class="gscr-badge">
          <span class="gscr-badge-dot"></span>
          Rankings actively improving
        </div>
      </div>
      <div>
        <span class="chip">Product Schema &amp; Rich Results</span>
        <h2 class="sh">Make Your Products Stand Out Before Anyone Clicks</h2>
        <p style="color:#536070;font-size:1rem;line-height:1.75">Product schema tells Google exactly what your product is - price, availability, star rating, and shipping. This information appears directly in search results as rich snippets, increasing click-through rates without changing your ranking position.</p>
        <p style="color:#536070;font-size:1rem;line-height:1.75">Most ecommerce stores have incorrectly configured or entirely absent Product schema. YFG implements the full schema suite on every product, category, and collection page in scope from month one - included in every plan, at no extra charge.</p>
        <div style="display:flex;flex-direction:column;gap:10px;margin-top:20px">
          <div style="display:flex;align-items:flex-start;gap:10px;padding:12px 14px;background:#D1FAE5;border-radius:8px;border:1px solid #6EE7B7"><span style="color:#10B981;font-size:1rem;flex-shrink:0">✓</span><div><strong style="font-size:.84rem;color:#065F46;display:block">Product, Offer, AggregateRating</strong><span style="font-size:.79rem;color:#065F46">Price, stock status, and star ratings in search results</span></div></div>
          <div style="display:flex;align-items:flex-start;gap:10px;padding:12px 14px;background:#D1FAE5;border-radius:8px;border:1px solid #6EE7B7"><span style="color:#10B981;font-size:1rem;flex-shrink:0">✓</span><div><strong style="font-size:.84rem;color:#065F46;display:block">BreadcrumbList + ItemList</strong><span style="font-size:.79rem;color:#065F46">Navigation path and product collections shown in results</span></div></div>
          <div style="display:flex;align-items:flex-start;gap:10px;padding:12px 14px;background:#D1FAE5;border-radius:8px;border:1px solid #6EE7B7"><span style="color:#10B981;font-size:1rem;flex-shrink:0">✓</span><div><strong style="font-size:.84rem;color:#065F46;display:block">AI Shopping Graph compatibility</strong><span style="font-size:.79rem;color:#065F46">Products discoverable in Google AI and ChatGPT shopping results</span></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DELIVERABLES 3-WAY -->
<section class="sec sec-alt">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">What We Optimise</span>
      <h2 class="sh">Three Levels of Ecommerce SEO Optimisation</h2>
      <p class="sp">Most agencies focus only on product pages. We optimise all three levels simultaneously.</p>
    </div>
    <div class="d3">
      <div class="d3c">
        <div class="d3h"><div class="d3-icon" style="background:#E0F5F5">📄</div><div class="d3-name" style="color:#038791">Product Pages</div></div>
        <ul class="d3list">
          <li class="d3item"><span class="d3dot" style="background:#038791"></span>Keyword-mapped product titles and H1 tags for search and purchase intent</li>
          <li class="d3item"><span class="d3dot" style="background:#038791"></span>Original product descriptions - no manufacturer copy, no variant duplication</li>
          <li class="d3item"><span class="d3dot" style="background:#038791"></span>Product, Offer, Review, and AggregateRating schema on every page</li>
          <li class="d3item"><span class="d3dot" style="background:#038791"></span>Image alt text, filename, and compression for Google Image Search discovery</li>
          <li class="d3item"><span class="d3dot" style="background:#038791"></span>Canonical URLs preventing variant duplication from splitting ranking signals</li>
          <li class="d3item"><span class="d3dot" style="background:#038791"></span>Internal linking from blog and category pages using natural anchors</li>
        </ul>
      </div>
      <div class="d3c d3mid">
        <div class="d3h"><div class="d3-icon" style="background:rgba(3,135,145,.25)">📂</div><div class="d3-name" style="color:#A8E3E6">Category Pages</div></div>
        <ul class="d3list">
          <li class="d3item"><span class="d3dot" style="background:#A8E3E6"></span>Category content satisfying search intent - buying context, not just product lists</li>
          <li class="d3item"><span class="d3dot" style="background:#A8E3E6"></span>Faceted navigation audit: which filter combinations to allow, block, or canonicalise</li>
          <li class="d3item"><span class="d3dot" style="background:#A8E3E6"></span>Pagination structure configured with the correct approach for your platform</li>
          <li class="d3item"><span class="d3dot" style="background:#A8E3E6"></span>BreadcrumbList schema on all category and subcategory pages</li>
          <li class="d3item"><span class="d3dot" style="background:#A8E3E6"></span>Internal silo structure concentrating category authority where it matters</li>
          <li class="d3item"><span class="d3dot" style="background:#A8E3E6"></span>H1, meta title, and meta description reviewed across the full category tree</li>
        </ul>
      </div>
      <div class="d3c">
        <div class="d3h"><div class="d3-icon" style="background:#FEF3C7">⚙️</div><div class="d3-name" style="color:#F59E0B">Store-Wide Technical</div></div>
        <ul class="d3list">
          <li class="d3item"><span class="d3dot" style="background:#F59E0B"></span>Crawl budget allocation directing Google to your highest-value pages first</li>
          <li class="d3item"><span class="d3dot" style="background:#F59E0B"></span>Core Web Vitals (LCP, INP, CLS) - slow stores lose rankings and conversions</li>
          <li class="d3item"><span class="d3dot" style="background:#F59E0B"></span>Platform-specific fixes: Shopify canonicals, WooCommerce bloat, Magento indexing</li>
          <li class="d3item"><span class="d3dot" style="background:#F59E0B"></span>XML sitemap segmented and prioritised toward revenue-generating pages</li>
          <li class="d3item"><span class="d3dot" style="background:#F59E0B"></span>Google Merchant Center alignment: organic listings and product feeds consistent</li>
          <li class="d3item"><span class="d3dot" style="background:#F59E0B"></span>GDPR-compliant tracking: GA4, pixel, and Consent Mode v2 for UK and EU stores</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- IMAGE BANNER 2 -->
<div class="img-banner">
  <img src="<?php echo esc_url( YFG_URI . '/assets/images/ecommerce-seo-packages/ecommerce-seo-packages-dark-bg.webp' ); ?>" alt="Ecommerce store products with organic SEO revenue growth strategy" loading="lazy">
  <div class="ib-ov"></div>
  <div class="ib-con">
    <div class="container">
      <div class="ib-text">
        <h2>The top 5 organic results capture 67.6% of all clicks</h2>
        <p>For an ecommerce store, the difference between being on page one and page two is the difference between traffic and silence - and between organic revenue and a larger ad spend.</p>
        <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="btn bw2">Get Into the Top Five</a>
      </div>
    </div>
  </div>
</div>

<!-- TECH CHALLENGES -->
<section class="sec">
  <div class="container">
    <div class="hdr">
      <span class="chip">Ecommerce-Specific Issues</span>
      <h2 class="sh">Technical Problems Only Ecommerce Stores Face</h2>
      <p class="sp">These do not appear on brochure websites and most generic SEO agencies miss them entirely.</p>
    </div>
    <div class="tc-grid">
      <div class="tc"><div class="tc-warn">⚠ Common Cause of Ranking Loss</div><h3 class="tc-title">Faceted Navigation Index Bloat</h3><p class="tc-text">Filter parameters generate thousands of indexable near-duplicate URLs. A store with 300 products and 10 filter options can have 50,000+ URLs competing in Google's index, diluting every category page's authority.</p><div class="tc-fix"><span>✓</span><span>We audit every filter combination, configure robots.txt and canonical tags to control which parameter URLs Google can index, and implement noindex on genuinely thin filter pages.</span></div></div>
      <div class="tc"><div class="tc-warn">⚠ Silently Splits Ranking Signals</div><h3 class="tc-title">Product Variant Duplication</h3><p class="tc-text">A shoe available in 8 colours and 6 sizes creates 48 near-identical product pages. Without correct canonical configuration, ranking signal is divided between them rather than concentrated on your primary product page.</p><div class="tc-fix"><span>✓</span><span>We audit all variant URL structures, implement canonical tags pointing variants to the primary product page, and ensure the primary page has all variant information visible for crawlers.</span></div></div>
      <div class="tc"><div class="tc-warn">⚠ Affects Large Catalogues Most</div><h3 class="tc-title">Crawl Budget Exhaustion</h3><p class="tc-text">Google allocates a finite crawl budget to every site. For large stores, this is frequently exhausted on low-value parameter pages - meaning your newest, highest-converting products can wait months to be indexed.</p><div class="tc-fix"><span>✓</span><span>We review your crawl log data, identify which URLs are consuming budget unnecessarily, and configure your robots.txt, sitemap priority, and internal links to direct Google toward revenue-generating pages first.</span></div></div>
      <div class="tc"><div class="tc-warn">⚠ Platform-Specific Risk</div><h3 class="tc-title">Platform Canonical Conflicts</h3><p class="tc-text">Shopify creates duplicate content between /products/ and /collections/products/ paths. WooCommerce generates duplicate archives through category taxonomies. These platform defaults must be overridden before other SEO work can compound.</p><div class="tc-fix"><span>✓</span><span>We implement platform-appropriate canonical configurations from month one, ensuring your preferred URLs receive full ranking authority from any content and links you build.</span></div></div>
    </div>
  </div>
</section>

<!-- PLATFORM TABS -->
<section class="sec sec-alt">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Platform-Specific Expertise</span>
      <h2 class="sh">SEO That Knows Your Platform</h2>
      <p class="sp">Each ecommerce platform has its own technical SEO quirks. Our team works inside each one daily.</p>
    </div>
    <div class="ptabs">
      <button class="ptab active" onclick="sw(this,'sp')">🟢 Shopify</button>
      <button class="ptab" onclick="sw(this,'wc')">🟣 WooCommerce</button>
      <button class="ptab" onclick="sw(this,'mg')">🟠 Magento</button>
      <button class="ptab" onclick="sw(this,'bc')">⬛ BigCommerce</button>
    </div>
    <div class="ppane active" id="sp">
      <div class="pp"><h3>Canonical conflicts on /collections/ vs /products/</h3><p>Shopify generates two accessible URL paths for every product. Without correct canonical configuration, these compete against each other and split ranking signals. We resolve this at theme level in month one.</p></div>
      <div class="pp"><h3>Duplicate content from blog and tag URLs</h3><p>Shopify's blog generates tag archive pages that are indexable by default and frequently contain thin or duplicate content. We configure canonical or noindex tags where appropriate to protect index quality.</p></div>
      <div class="pp"><h3>App conflict and page speed impact</h3><p>Third-party Shopify apps regularly inject render-blocking scripts that damage Core Web Vitals scores. We audit every installed app for performance impact and recommend removal or deferral of problem scripts.</p></div>
      <div class="pp"><h3>Working within Shopify's fixed URL structure</h3><p>Unlike WordPress, Shopify enforces fixed URL structures. We optimise what can be controlled: handle names, breadcrumb schema, and internal linking architecture that builds category authority within the platform's constraints.</p></div>
    </div>
    <div class="ppane" id="wc">
      <div class="pp"><h3>Plugin conflicts affecting Core Web Vitals</h3><p>WooCommerce stores typically run 15–30 active plugins. Conflicting scripts and redundant CSS libraries frequently push LCP above the 2.5s threshold. We audit your plugin stack and recommend a leaner configuration.</p></div>
      <div class="pp"><h3>Database bloat and slow query times</h3><p>WooCommerce stores accumulate database bloat through post revisions and orphaned metadata over time. We implement a database maintenance schedule and query caching configuration to restore performance.</p></div>
      <div class="pp"><h3>Product taxonomy duplication</h3><p>WooCommerce generates archive pages for every product category, tag, and attribute combination. Without careful configuration, these archives duplicate content and compete with your primary category pages in results.</p></div>
      <div class="pp"><h3>WooCommerce + WordPress content strategy advantage</h3><p>WooCommerce + WordPress is the best content architecture available in ecommerce. We exploit this fully - building internal linking structures that connect blog content to product and category pages, driving category authority faster.</p></div>
    </div>
    <div class="ppane" id="mg">
      <div class="pp"><h3>Layered navigation and filter URL proliferation</h3><p>Magento's layered navigation creates the most aggressive index bloat of any major ecommerce platform. We configure layered navigation settings alongside robots.txt rules to control what Google can and cannot index.</p></div>
      <div class="pp"><h3>URL rewrite complexity and redirect chains</h3><p>Magento's URL rewrite system can create long chains of redirect hops that lose PageRank at each step. We audit your rewrite configuration and implement direct 301s from source URLs to final destinations.</p></div>
      <div class="pp"><h3>Full-page cache and performance configuration</h3><p>Misconfigured cache rules can cause dynamic content to persist in cache or prevent pages from caching altogether. We review your cache configuration alongside Core Web Vitals data to identify underperforming pages.</p></div>
      <div class="pp"><h3>Multi-store hreflang for international Magento</h3><p>Multi-store Magento installations with separate store views for different regions require careful hreflang implementation to prevent each view from competing with the others. We implement and verify hreflang across all store views.</p></div>
    </div>
    <div class="ppane" id="bc">
      <div class="pp"><h3>Faceted search and URL parameter management</h3><p>BigCommerce's built-in faceted search generates indexable parameter URLs. We configure robots.txt and canonical tags to control which parameter combinations remain indexable, protecting your core category pages.</p></div>
      <div class="pp"><h3>Custom URL structure optimisation</h3><p>BigCommerce allows more URL customisation than Shopify. We optimise your URL structure across product, category, and brand pages to ensure target keywords appear in URL paths where they support search intent.</p></div>
      <div class="pp"><h3>Stencil theme and Core Web Vitals</h3><p>The Stencil framework gives developers good performance control. We audit your theme's script loading order, image handling, and CSS delivery to resolve Core Web Vitals issues from apps or customisations.</p></div>
      <div class="pp"><h3>Multi-storefront SEO management</h3><p>BigCommerce's multi-storefront feature enables multiple branded stores under one account. Each requires independent SEO configuration, schema implementation, and sitemap management - all managed under one programme.</p></div>
    </div>
  </div>
</section>

<!-- COMPARE TABLE -->
<section class="sec">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Why Choose YFG</span>
      <h2 class="sh">YFG vs Specialist Ecommerce SEO Agencies</h2>
      <p class="sp">1Digital Agency starts at $899/mo. Most serious ecommerce SEO begins at $2,500. YFG enters at $499 with more included at every tier.</p>
    </div>
    <div style="border-radius:10px;overflow:hidden;box-shadow:var(--s1)">
      <table class="ctb">
        <thead>
          <tr>
            <th style="width:30%">Factor</th>
            <th>Your Firm Growth</th>
            <th>1Digital / Large Agency</th>
            <th>Generic SEO Agency</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Starting monthly price</td><td><span class="cy">$499/mo</span></td><td>$899–$4,499/mo</td><td>$299–$999/mo</td></tr>
          <tr><td>Ecommerce platform specialisation</td><td><span class="cy">Shopify, WooCommerce, Magento, BigCommerce</span></td><td><span class="cy">Yes</span></td><td><span >Rarely</span></td></tr>
          <tr><td>Product schema on every plan</td><td><span class="cy">Yes</span></td><td><span class="cw">Sometimes</span></td><td><span >No</span></td></tr>
          <tr><td>Faceted nav &amp; crawl budget management</td><td><span class="cy">Yes (Growth+)</span></td><td><span class="cy">Yes</span></td><td><span >No</span></td></tr>
          <tr><td>AI Shopping Graph included</td><td><span class="cy">Yes, every plan</span></td><td><span class="cw">Not always stated</span></td><td><span >No</span></td></tr>
          <tr><td>Free audit before commitment</td><td><span class="cy">Yes</span></td><td><span class="cw">Varies</span></td><td><span class="cw">Varies</span></td></tr>
          <tr><td>GDPR-compliant for UK &amp; EU stores</td><td><span class="cy">Yes</span></td><td><span class="cw">Rarely confirmed</span></td><td><span >No</span></td></tr>
          <tr><td>No annual contract lock-in</td><td><span class="cy">Yes</span></td><td><span >Often 6 months</span></td><td><span class="cw">Varies</span></td></tr>
          <tr><td>No setup fee</td><td><span class="cy">Yes</span></td><td><span >Often $500–$1,000</span></td><td><span class="cw">Varies</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="sec sec-alt">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Getting Started</span>
      <h2 class="sh">How YFG Ecommerce SEO Works</h2>
      <p class="sp">From free store audit to measurable organic revenue growth in four clear steps.</p>
    </div>
    <div class="steps4">
      <div class="stepc"><div class="stepn">1</div><h3 class="stept">Free Store Audit</h3><p class="stepd">We audit your platform, catalog architecture, schema, crawl health, and rankings. You receive a prioritised report before spending anything.</p></div>
      <div class="stepc"><div class="stepn">2</div><h3 class="stept">Strategy &amp; Plan</h3><p class="stepd">We recommend the right package for your catalog size, competition, and goals. Written deliverables plan and pricing within two business days.</p></div>
      <div class="stepc"><div class="stepn">3</div><h3 class="stept">Month One Launch</h3><p class="stepd">Technical fixes deployed, schema implemented, keyword targets locked, content briefs approved, and link outreach begins in month one.</p></div>
      <div class="stepc"><div class="stepn">4</div><h3 class="stept">Rankings &amp; Revenue</h3><p class="stepd">Monthly reports track rankings, organic traffic, rich result impressions, and revenue attribution from organic. Strategy evolves as your data matures.</p></div>
    </div>
  </div>
</section>

<!-- CTA BAND -->
<section style="padding:0 0 52px">
  <div class="container">
    <div class="cta-band">
      <div>
        <h3>Ecommerce SEO packages from $499/mo &nbsp;&middot;&nbsp; Free store audit &nbsp;&middot;&nbsp; No setup fee</h3>
        <p>We audit your store before recommending a plan. You see exactly what is holding your product pages back before spending anything.</p>
      </div>
      <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="btn bt-t bt-lg" style="flex-shrink:0">Get My Free Store Audit</a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="sec sec-alt">
  <div class="container">
    <div class="hdr hdr-c">
      <span class="chip">Common Questions</span>
      <h2 class="sh">Ecommerce SEO Package FAQs</h2>
    </div>
    <div class="faq-wrap">
      <div class="fq"><button class="fq-btn" onclick="tFaq(this)">What do ecommerce SEO packages include?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button><div class="fq-body">YFG's ecommerce SEO packages include a full technical store audit, product and category page optimisation, Product and Review schema implementation, crawl budget management, faceted navigation control, canonical URL configuration, SEO content creation, link building, AI Shopping Graph optimisation, and monthly reporting. Every plan starts with a free store audit and includes no setup fee.</div></div>
      <div class="fq"><button class="fq-btn" onclick="tFaq(this)">How much do ecommerce SEO packages cost?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button><div class="fq-body">YFG's ecommerce website SEO packages start at $499 per month for the Starter plan, $899 for Growth, and $1,499 for Scale. Enterprise pricing for large catalogues and multi-store setups is scoped on request. No plan carries a setup fee, and after an initial 3-month period, contracts move to rolling monthly terms.</div></div>
      <div class="fq"><button class="fq-btn" onclick="tFaq(this)">Does ecommerce SEO work for Shopify and WooCommerce stores?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button><div class="fq-body">Yes. YFG's ecommerce SEO packages are built for Shopify, WooCommerce, Magento, BigCommerce, PrestaShop, and Wix stores. Each platform has its own technical SEO quirks - Shopify's canonical conflicts, WooCommerce's plugin performance issues, Magento's layered navigation bloat - and our team resolves platform-specific issues from month one.</div></div>
      <div class="fq"><button class="fq-btn" onclick="tFaq(this)">How long before ecommerce SEO shows results?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button><div class="fq-body">Technical fixes and schema implementation show measurable improvements within 4–8 weeks. Product and category keyword ranking improvements typically become visible within 3–5 months. Organic revenue growth from SEO compounds over 6–18 months. We set realistic timelines during the free audit based on your specific market and starting authority.</div></div>
      <div class="fq"><button class="fq-btn" onclick="tFaq(this)">What makes ecommerce SEO different from standard SEO?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button><div class="fq-body">Ecommerce SEO addresses challenges that do not exist on brochure or service websites: crawl budget management for large catalogs, faceted navigation control, product variant canonical issues, Product and Review schema, category page authority building, and platform-specific technical fixes. Standard SEO packages rarely address any of these, which is why ecommerce stores with generic SEO often see limited results.</div></div>
      <div class="fq"><button class="fq-btn" onclick="tFaq(this)">Do your packages include AI Shopping Graph optimisation?<span class="fq-ic"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></span></button><div class="fq-body">Yes. Every plan includes AI Shopping Graph visibility work: correctly structured Product schema, brand entity work, and Google Merchant Center alignment on Growth and Scale plans. This is included in the plan price, not charged as a premium add-on.</div></div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="fcta">
  <div class="container">
    <div class="fcta-in">
      <div class="chip chip-w" style="margin:0 auto 14px">Free Ecommerce SEO Audit &mdash; No Obligation</div>
      <h2 class="fcta-h">Your Products Should Rank. Let's Make That Happen.</h2>
      <p class="fcta-p">Your Firm Growth will audit your store's organic performance for free, identify the exact issues suppressing your product rankings, and recommend the right ecommerce SEO package for your catalog and budget.</p>
      <div style="display:flex;gap:13px;justify-content:center;flex-wrap:wrap">
        <a data-bs-toggle="modal" data-bs-target="#yfgLeadModal" class="btn bt-w bt-lg">Get My Free Store Audit</a>
        <a href="mailto:info@yourfirmgrowth.com" class="btn bo">Email Us Directly</a>
      </div>
      <p class="fcta-note">No setup fee &nbsp;&middot;&nbsp; No annual contract &nbsp;&middot;&nbsp; Response within 1 business day &nbsp;&middot;&nbsp; UK, US &amp; European markets</p>
    </div>
  </div>
</section>


<script>
function tFaq(btn){var b=btn.nextElementSibling,o=btn.classList.contains('open');document.querySelectorAll('.fq-btn').forEach(function(x){x.classList.remove('open');x.nextElementSibling.classList.remove('open')});if(!o){btn.classList.add('open');b.classList.add('open')}}
function sw(btn,id){document.querySelectorAll('.ptab').forEach(function(b){b.classList.remove('active')});document.querySelectorAll('.ppane').forEach(function(p){p.classList.remove('active')});btn.classList.add('active');document.getElementById(id).classList.add('active')}
(function(){var bar=document.getElementById('sbar'),shown=false;window.addEventListener('scroll',function(){if(!shown&&window.scrollY>500){bar.classList.add('on');shown=true}})})();
</script>


<?php get_footer(); ?>
