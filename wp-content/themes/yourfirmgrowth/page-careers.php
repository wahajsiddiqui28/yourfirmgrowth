<?php
/**
 * Template Name: Careers
 *
 * Careers page — theme header/footer, scoped .crr-* classes (koi header leak nahi),
 * local images (assets/images/careers/). Abhi koi open positions nahi — empty state.
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<style>
/* Scoped .crr-* — koi generic .btn / global reset nahi, to theme header/footer safe. */
.crr-page{--n:#072F58;--nd:#041D3A;--t:#038791;--td:#026870;--tl:#E0F5F5;--tm:#A8E3E6;--w:#fff;--bg:#F4F7FB;--txt:#0E1C30;--mut:#536070;--bor:#D4DFEE;--r:12px;--rl:18px}
.crr-container{width:100%;max-width:1160px;margin:0 auto;padding:0 24px}

/* Scoped buttons */
.crr-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-weight:700;border-radius:50px;padding:14px 30px;font-size:.95rem;text-decoration:none;transition:transform .2s,box-shadow .2s,background .2s;cursor:pointer;border:none}
.crr-btn--teal{background:linear-gradient(135deg,var(--t),var(--td));color:#fff;box-shadow:0 6px 20px rgba(3,135,145,.35)}
.crr-btn--teal:hover{transform:translateY(-2px);box-shadow:0 10px 26px rgba(3,135,145,.45);color:#fff;text-decoration:none}
.crr-btn--ghost{background:transparent;color:#fff;border:2px solid rgba(255,255,255,.5)}
.crr-btn--ghost:hover{border-color:var(--tm);color:var(--tm);text-decoration:none}

.crr-chip{display:inline-flex;align-items:center;gap:6px;background:rgba(3,135,145,.12);border:1px solid rgba(3,135,145,.28);color:var(--td);font-size:.7rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;padding:5px 14px;border-radius:50px;margin-bottom:14px}
.crr-h2{font-size:clamp(1.7rem,3vw,2.4rem);font-weight:800;color:var(--n);line-height:1.15;margin-bottom:12px}
.crr-p{font-size:1.02rem;color:var(--mut);line-height:1.7;max-width:640px}
.crr-head{text-align:center;margin-bottom:44px}
.crr-head .crr-p{margin:0 auto}

/* ── HERO BANNER ── */
.crr-hero{position:relative;overflow:hidden;padding:120px 0 108px;text-align:center;background:linear-gradient(150deg,var(--nd) 0%,var(--n) 55%,#0A3D5C 100%)}
.crr-hero__bg{position:absolute;inset:0;background-image:url('<?php echo esc_url( YFG_URI . '/assets/images/careers/careers-hero-bg.webp' ); ?>');background-size:cover;background-position:center;opacity:.14}
.crr-hero__ov{position:absolute;inset:0;background:linear-gradient(150deg,rgba(4,29,58,.86),rgba(7,47,88,.72))}
.crr-hero::before{content:'';position:absolute;top:-120px;right:-90px;width:520px;height:520px;background:radial-gradient(circle,rgba(3,135,145,.22) 0%,transparent 70%);pointer-events:none;z-index:1}
.crr-hero__in{position:relative;z-index:2;max-width:820px;margin:0 auto}
.crr-eyebrow{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);color:var(--tm);font-size:.74rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;padding:8px 18px;border-radius:50px;margin-bottom:22px}
.crr-hero__title{font-size:clamp(2.2rem,5vw,3.5rem);font-weight:800;color:#fff;line-height:1.08;letter-spacing:-.02em;margin-bottom:18px}
.crr-hero__title span{color:var(--t)}
.crr-hero__sub{font-size:1.12rem;color:rgba(255,255,255,.8);line-height:1.7;margin:0 auto 30px;max-width:640px}
.crr-hero__cta{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}

/* ── SECTION ── */
.crr-sec{padding:80px 0}
.crr-sec--alt{background:var(--bg)}

/* ── PERKS ── */
.crr-perks{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.crr-perk{background:var(--w);border:1.5px solid var(--bor);border-radius:var(--rl);padding:30px 26px;box-shadow:0 2px 8px rgba(7,47,88,.06);transition:transform .25s,box-shadow .25s}
.crr-perk:hover{transform:translateY(-5px);box-shadow:0 14px 40px rgba(7,47,88,.12)}
.crr-perk__ic{width:56px;height:56px;border-radius:14px;background:linear-gradient(135deg,var(--tl),#fff);display:flex;align-items:center;justify-content:center;font-size:1.7rem;color:var(--t);margin-bottom:18px;border:1px solid var(--bor)}
.crr-perk__t{font-size:1.15rem;font-weight:700;color:var(--n);margin-bottom:8px}
.crr-perk__d{font-size:.92rem;color:var(--mut);line-height:1.65}

/* ── CULTURE BANNER (image) ── */
.crr-banner{position:relative;overflow:hidden;min-height:360px;display:flex;align-items:center}
.crr-banner img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.crr-banner__ov{position:absolute;inset:0;background:linear-gradient(90deg,rgba(4,29,58,.9) 0%,rgba(4,29,58,.6) 55%,rgba(4,29,58,.28) 100%)}
.crr-banner__tx{position:relative;z-index:2;max-width:600px;padding-top:56px;padding-bottom:56px}
.crr-banner__tx h2{font-size:clamp(1.6rem,3vw,2.3rem);font-weight:800;color:#fff;line-height:1.15;margin-bottom:12px}
.crr-banner__tx p{font-size:1.02rem;color:rgba(255,255,255,.82);line-height:1.7}

/* ── EMPTY STATE (no positions) ── */
.crr-empty{max-width:660px;margin:0 auto;text-align:center;background:var(--w);border:1.5px solid var(--bor);border-radius:var(--rl);padding:56px 40px;box-shadow:0 12px 40px rgba(7,47,88,.08)}
.crr-empty__ic{width:88px;height:88px;margin:0 auto 24px;border-radius:50%;background:linear-gradient(135deg,var(--tl),#fff);display:flex;align-items:center;justify-content:center;border:1.5px solid var(--bor)}
.crr-empty__ic svg{width:42px;height:42px;stroke:var(--t);stroke-width:1.6;fill:none}
.crr-empty__t{font-size:1.5rem;font-weight:800;color:var(--n);margin-bottom:12px}
.crr-empty__d{font-size:1rem;color:var(--mut);line-height:1.7;margin-bottom:26px}
.crr-empty__note{margin-top:16px;font-size:.8rem;color:var(--mut)}

@media(max-width:900px){
  .crr-perks{grid-template-columns:1fr}
  .crr-hero{padding:88px 0 78px}
  .crr-sec{padding:56px 0}
}
@media(max-width:600px){
  .crr-empty{padding:40px 24px}
  .crr-banner__tx{max-width:none}
}
</style>

<main class="crr-page">

  <!-- ══ HERO BANNER ══ -->
  <section class="crr-hero">
    <div class="crr-hero__bg"></div>
    <div class="crr-hero__ov"></div>
    <div class="crr-container crr-hero__in">
      <span class="crr-eyebrow"><i class="bi bi-people-fill"></i> Careers at YFG</span>
      <h1 class="crr-hero__title">Grow Your Career <span>With Us</span></h1>
      <p class="crr-hero__sub">We&rsquo;re a remote-first digital growth team helping businesses across the UK, US, and Europe win in search. When we&rsquo;re hiring, this is where you&rsquo;ll find our open roles.</p>
      <div class="crr-hero__cta">
        <a href="#openings" class="crr-btn crr-btn--teal">View Open Roles</a>
        <a href="/about-us/" class="crr-btn crr-btn--ghost">About Your Firm Growth</a>
      </div>
    </div>
  </section>

  <!-- ══ WHY JOIN ══ -->
  <section class="crr-sec">
    <div class="crr-container">
      <div class="crr-head">
        <span class="crr-chip">Why YFG</span>
        <h2 class="crr-h2">Why Work With Us</h2>
        <p class="crr-p">A team that takes real ownership, does great work for real clients, and grows together.</p>
      </div>
      <div class="crr-perks">
        <div class="crr-perk">
          <div class="crr-perk__ic"><i class="bi bi-globe-americas"></i></div>
          <h3 class="crr-perk__t">Remote-First</h3>
          <p class="crr-perk__d">Work from anywhere. We&rsquo;re a distributed team aligned across time zones, focused on outcomes &mdash; not clock-watching.</p>
        </div>
        <div class="crr-perk">
          <div class="crr-perk__ic"><i class="bi bi-graph-up-arrow"></i></div>
          <h3 class="crr-perk__t">Growth &amp; Learning</h3>
          <p class="crr-perk__d">Level up on real projects with mentorship and a team that invests in your skills and career path.</p>
        </div>
        <div class="crr-perk">
          <div class="crr-perk__ic"><i class="bi bi-rocket-takeoff-fill"></i></div>
          <h3 class="crr-perk__t">Real Impact</h3>
          <p class="crr-perk__d">Your work directly moves the needle for real businesses &mdash; more visibility, more leads, more revenue.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══ CULTURE BANNER (image) ══ -->
  <div class="crr-banner">
    <img src="<?php echo esc_url( YFG_URI . '/assets/images/careers/careers-culture.webp' ); ?>" alt="The Your Firm Growth team collaborating" loading="lazy">
    <div class="crr-banner__ov"></div>
    <div class="crr-container crr-banner__tx">
      <h2>A team that grows together</h2>
      <p>We hire people who are curious, take ownership, and genuinely care about doing great work. If that sounds like you, we&rsquo;d love to hear from you when a role opens up.</p>
    </div>
  </div>

  <!-- ══ OPEN POSITIONS (empty state) ══ -->
  <section class="crr-sec crr-sec--alt" id="openings">
    <div class="crr-container">
      <div class="crr-head">
        <span class="crr-chip">Open Positions</span>
        <h2 class="crr-h2">Current Openings</h2>
      </div>
      <div class="crr-empty">
        <div class="crr-empty__ic">
          <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
        </div>
        <h3 class="crr-empty__t">No open positions right now</h3>
        <p class="crr-empty__d">We&rsquo;re not actively hiring at the moment &mdash; but we&rsquo;re always growing. Send us your resume and we&rsquo;ll reach out when the right role opens up.</p>
        <a href="mailto:info@yourfirmgrowth.com?subject=Career%20Enquiry%20%E2%80%94%20Resume" class="crr-btn crr-btn--teal"><i class="bi bi-envelope-fill"></i> Send Your Resume</a>
        <p class="crr-empty__note">Or check back soon &mdash; we post new roles here as they open.</p>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
