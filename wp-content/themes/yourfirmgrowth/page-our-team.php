<?php
/**
 * Template Name: Our Team
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<style>
    /* ===== TEAM SECTION SPECIFIC STYLES ===== */
    .team-section {
      padding: 5rem 1.5rem;
      background: linear-gradient(180deg, var(--yfg-soft) 0%, #ffffff 100%);
    }

    /* Header */
    .section-header {
      text-align: center;
      margin-bottom: 3.5rem;
    }

    .pill-label {
      display: inline-block;
      background: var(--yfg-grad);
      color: #fff;
      font-size: .78rem;
      font-weight: 600;
      letter-spacing: .07em;
      text-transform: uppercase;
      padding: .45rem 1.2rem;
      border-radius: 999px;
      margin-bottom: 1rem;
    }

    .section-header h1 {
      font-family: var(--yfg-head);
      font-size: clamp(2rem, 4vw, 2.8rem);
      font-weight: 800;
      color: var(--yfg-navy);
      line-height: 1.15;
      letter-spacing: -.02em;
      margin-bottom: .9rem;
    }

    .section-header p {
      color: #5b6b7d;
      font-size: 1.05rem;
      max-width: 580px;
      margin: 0 auto 1rem;
      line-height: 1.6;
    }

    .accent-bar {
      width: 64px;
      height: 5px;
      border-radius: 999px;
      background: var(--yfg-grad);
      margin: 0 auto;
    }

    /* Grid */
    .team-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.6rem;
      max-width: 1100px;
      margin: 0 auto 1.6rem;
    }

    /* Card */
    .team-card {
      background: #ffffff;
      border: 1px solid #d0e8ec;
      border-radius: 20px;
      overflow: hidden;
      transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .team-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 24px 52px rgba(5, 47, 87, .18);
      border-color: var(--yfg-teal);
    }

    /* Card header (gradient bg with photo) */
    .team-card-header {
      position: relative;
      background: var(--yfg-grad);
      height: 148px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .team-card-header::before {
      content: "";
      position: absolute;
      width: 110px;
      height: 110px;
      border-radius: 50%;
      background: rgba(255, 255, 255, .05);
      top: -28px;
      left: -22px;
    }

    .team-card-header::after {
      content: "";
      position: absolute;
      width: 190px;
      height: 190px;
      border-radius: 50%;
      background: rgba(255, 255, 255, .06);
      bottom: -65px;
      right: -55px;
    }

    .team-image-container {
      position: relative;
      z-index: 1;
    }

    .team-image-container img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      border: 3px solid rgba(255, 255, 255, .5);
      object-fit: cover;
      object-position: top;
      display: block;
      box-shadow: 0 8px 20px rgba(5, 47, 87, .3);
    }

    /* Placeholder avatar (no photo) */
    .avatar-placeholder {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      border: 3px solid rgba(255, 255, 255, .4);
      background: rgba(255, 255, 255, .1);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      z-index: 1;
    }

    /* LinkedIn button */
    .social-btn {
      position: absolute;
      bottom: 10px;
      right: 12px;
      z-index: 2;
      width: 32px;
      height: 32px;
      background: #fff;
      border-radius: 9px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      color: var(--yfg-navy);
      font-size: .78rem;
      font-weight: 800;
      transition: background .18s, color .18s, transform .18s;
      box-shadow: 0 4px 10px rgba(5, 47, 87, .2);
      font-family: var(--yfg-head);
    }

    .social-btn:hover {
      background: var(--yfg-teal-2);
      color: #fff;
      transform: scale(1.1);
    }

    /* Card body */
    .team-card-body {
      padding: 1.2rem 1.3rem 1.5rem;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .team-name {
      font-family: var(--yfg-head);
      font-weight: 800;
      font-size: 1.05rem;
      color: var(--yfg-navy);
      margin-bottom: .4rem;
    }

    .teal-divider {
      width: 36px;
      height: 3px;
      background: linear-gradient(90deg, var(--yfg-teal), var(--yfg-teal-2));
      border-radius: 999px;
      margin-bottom: .65rem;
    }

    .role-badge {
      display: inline-block;
      font-size: .72rem;
      font-weight: 600;
      padding: .32rem .8rem;
      border-radius: 999px;
      margin-bottom: .6rem;
      align-self: flex-start;
    }

    .team-bio {
      font-size: .84rem;
      color: #5b6b7d;
      line-height: 1.62;
    }

    /* Responsive */
    @media (max-width: 640px) {
      .team-section { padding: 3.5rem 1rem; }
      .team-grid { grid-template-columns: 1fr 1fr; gap: 1rem; }
    }

    @media (max-width: 420px) {
      .team-grid { grid-template-columns: 1fr; }
    }
</style>

<section class="team-section">
  <div class="section-header">
    <div class="pill-label">Our Leadership</div>
    <h1>Your Firm Growth<br>Team</h1>
    <p>Architects of digital growth. We blend technical precision with creative strategy to dominate search rankings.</p>
    <div class="accent-bar"></div>
  </div>

  <!-- Row 1: Tauqeer, Hassan, Maaz -->
  <div class="team-grid">

    <!-- Tauqeer Ahmed -->
    <div class="team-card">
      <div class="team-card-header">
        <div class="team-image-container">
          <img src="http://www.seospecialistusa.com/wp-content/uploads/2026/06/tauqeer-bhai.jpg" alt="Tauqeer Ahmed">
        </div>
        <a href="https://www.linkedin.com/in/tauqeer-ahmed-a7559b298/" class="social-btn" target="_blank" rel="noopener">in</a>
      </div>
      <div class="team-card-body">
        <h3 class="team-name">Tauqeer Ahmed</h3>
        <div class="teal-divider"></div>
        <p class="team-bio">Leading SEO Specialist with extensive experience in administration, operations, and digital marketing. Focused on driving sustainable growth and delivering outstanding results.</p>
      </div>
    </div>

    <!-- Hassan Abid -->
    <div class="team-card">
      <div class="team-card-header">
        <div class="team-image-container">
          <img src="http://www.seospecialistusa.com/wp-content/uploads/2026/02/hassan-bhai.webp" alt="Hassan Abid">
        </div>
        <a href="https://www.linkedin.com/in/hassan-abid-705a7612b/" class="social-btn" target="_blank" rel="noopener">in</a>
      </div>
      <div class="team-card-body">
        <h3 class="team-name">Hassan Abid</h3>
        <div class="teal-divider"></div>
        <p class="team-bio">Accomplished SEO Specialist recognized for expertise in enhancing online visibility and driving sustainable organic growth through data-driven strategies.</p>
      </div>
    </div>

    <!-- Maaz Ahmed -->
    <div class="team-card">
      <div class="team-card-header">
        <div class="team-image-container">
          <img src="http://www.seospecialistusa.com/wp-content/uploads/2026/02/maaz-ahmed.webp" alt="Maaz Ahmed">
        </div>
        <a href="https://www.linkedin.com/in/maazahmed11479/" class="social-btn" target="_blank" rel="noopener">in</a>
      </div>
      <div class="team-card-body">
        <h3 class="team-name">Maaz Ahmed</h3>
        <div class="teal-divider"></div>
        <p class="team-bio">Highly experienced SEO expert with 6+ years in digital marketing. Specializing in technical SEO, e-commerce strategies, and programmatic SEO architecture.</p>
      </div>
    </div>

  </div>

  <!-- Row 2: Tim, Aamna, Wahaj -->
  <div class="team-grid mt-4">

    <!-- Tim Burklew -->
    <div class="team-card">
      <div class="team-card-header">
        <div class="team-image-container">
          <img src="http://www.seospecialistusa.com/wp-content/uploads/2026/04/TimBurklew.jpeg" alt="Tim Burklew">
        </div>
        <a href="#" class="social-btn">in</a>
      </div>
      <div class="team-card-body">
        <h3 class="team-name">Tim Burklew</h3>
        <span class="role-badge" style="background:rgba(255,59,92,.12);color:#b8223a;">Head of Sales &amp; Marketing (U.S.)</span>
        <p class="team-bio">Dynamic professional and top Realtor® with eXp Realty in Florida. Honored as a 2025 Top Agent by BestAgents.us. Leverages data-driven SEO, content strategies, and paid media to drive business growth.</p>
      </div>
    </div>

    <!-- Aamna Tauqeer -->
    <div class="team-card">
      <div class="team-card-header">
        <div class="avatar-placeholder">
          <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.65)" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
        <a href="#" class="social-btn">in</a>
      </div>
      <div class="team-card-body">
        <h3 class="team-name">Aamna Tauqeer</h3>
        <span class="role-badge" style="background:rgba(138,90,200,.12);color:#6b3db5;">Head of Design</span>
        <p class="team-bio">Directing visual strategy with 5 years of experience, fusing high-impact design with strategic digital optimization for maximum brand visibility.</p>
      </div>
    </div>

    <!-- Wahaj Siddiqui -->
    <div class="team-card">
      <div class="team-card-header">
        <div class="team-image-container">
          <img src="http://www.seospecialistusa.com/wp-content/uploads/2026/02/profile-pic.png" alt="Wahaj Siddiqui">
        </div>
        <a href="https://www.linkedin.com/in/wahaj-siddiqui-mr-coder-51067321a/" class="social-btn" target="_blank" rel="noopener">in</a>
      </div>
      <div class="team-card-body">
        <h3 class="team-name">Wahaj Siddiqui</h3>
        <span class="role-badge" style="background:rgba(4,112,125,.12);color:#04707d;">Head of Development</span>
        <p class="team-bio">Expert web developer with 7+ years of experience building fast, SEO-optimized, and API-integrated websites that deliver outstanding user experiences.</p>
      </div>
    </div>

  </div>
</section>

<?php
get_footer();