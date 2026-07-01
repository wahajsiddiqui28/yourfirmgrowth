<?php
/**
 * Template Name: Dedicated Remote Teams
 *
 * @package YourFirmGrowth
 */

get_header();

$yfg_contact_url = home_url( '/contact/?service=RemoteTeams' );
?>

<style>
    /* Premium Page-Specific Styles */
    .yfg-landing-hero {
        padding: 8rem 0 7rem;
        background: linear-gradient(135deg, rgba(3, 24, 46, 0.94) 0%, rgba(5, 47, 87, 0.9) 50%, rgba(4, 80, 92, 0.82) 100%), url(<?php echo esc_url( YFG_URI . '/assets/images/dedicated-remote-teams/dedicated-remote-teams-banner.webp' ); ?>) center / cover no-repeat;
        color: #ffffff;
        position: relative;
        overflow: hidden;
    }
    .yfg-landing-hero h1 {
        color: #ffffff !important;
        font-size: clamp(2.2rem, 4.5vw, 3.5rem);
        line-height: 1.15;
        font-weight: 800;
    }
    .yfg-landing-hero .grad {
        background: linear-gradient(120deg, #5dcaa5 0%, #9fe1cb 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .yfg-landing-hero__lead {
        font-size: 1.18rem;
        color: rgba(255, 255, 255, 0.88);
        max-width: 720px;
        line-height: 1.6;
    }
    .yfg-trust-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 1.2rem;
        margin-top: 2.5rem;
        padding: 0;
        list-style: none;
    }
    .yfg-trust-badges li {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.9);
        background: rgba(255, 255, 255, 0.08);
        padding: 0.4rem 1rem;
        border-radius: 99px;
        border: 1px solid rgba(255, 255, 255, 0.12);
    }
    .yfg-trust-badges i {
        color: #5dcaa5;
    }
    .yfg-section {
        padding: 5.5rem 0;
    }
    .yfg-section--light {
        background: linear-gradient(180deg, #f3fafc 0%, #ffffff 100%);
    }
    .yfg-section-title {
        color: var(--yfg-navy);
        font-weight: 800;
        font-size: clamp(1.8rem, 3.2vw, 2.4rem);
        letter-spacing: -0.02em;
    }
    .yfg-accent--start {
        margin-left: 0;
        margin-bottom: 1.2rem;
    }
    /* Detailed Services Grid */
    .yfg-detail-card {
        background: #ffffff;
        border: 1px solid #e9f3f5;
        border-radius: 20px;
        padding: 2.2rem;
        box-shadow: 0 5px 20px rgba(5, 47, 87, 0.02);
        transition: all 0.25s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .yfg-detail-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(5, 47, 87, 0.07);
        border-color: rgba(4, 112, 125, 0.2);
    }
    .yfg-detail-card__icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 54px;
        height: 54px;
        border-radius: 14px;
        background: var(--yfg-soft);
        color: var(--yfg-teal);
        font-size: 1.5rem;
        margin-bottom: 1.4rem;
    }
    .yfg-detail-card__title {
        font-size: 1.22rem;
        font-weight: 700;
        color: var(--yfg-navy);
        margin-bottom: 0.75rem;
    }
    .yfg-detail-card__text {
        font-size: 0.95rem;
        color: #5b6b7d;
        line-height: 1.6;
        margin-bottom: 0;
    }
    /* List styling */
    .yfg-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .yfg-list li {
        position: relative;
        padding-left: 1.8rem;
        margin-bottom: 0.9rem;
        font-size: 0.98rem;
        color: #5b6b7d;
        line-height: 1.5;
    }
    .yfg-list li::before {
        content: "\F272";
        font-family: "bootstrap-icons";
        position: absolute;
        left: 0;
        top: 2px;
        color: var(--yfg-teal);
        font-weight: 900;
        font-size: 1.1rem;
    }
    /* Image Frame */
    .yfg-img-frame {
        position: relative;
        display: inline-block;
        padding: 12px;
        background: #ffffff;
        border: 1px solid #d9e8eb;
        border-radius: 24px;
        box-shadow: 0 15px 35px rgba(5, 47, 87, 0.05);
        transition: all 0.4s ease;
        z-index: 1;
        width: 100%;
    }
    .yfg-img-frame:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(5, 47, 87, 0.1);
        border-color: rgba(4, 112, 125, 0.3);
    }
    .yfg-img-frame img {
        border-radius: 16px;
        width: 100%;
        height: auto;
        transition: transform 0.5s ease;
    }
    .yfg-img-frame:hover img {
        transform: scale(1.02);
    }
    .yfg-deco-dots {
        position: absolute;
        width: 90px;
        height: 90px;
        background-image: radial-gradient(var(--yfg-teal) 1.5px, transparent 1.5px);
        background-size: 12px 12px;
        opacity: 0.15;
        z-index: 0;
    }
    .yfg-deco-dots--top-left {
        top: -15px;
        left: -15px;
    }
    .yfg-deco-dots--bottom-right {
        bottom: -15px;
        right: -15px;
    }
    /* Process Cards */
    .yfg-process-card {
        background: #ffffff;
        border: 1px solid #e9f3f5;
        border-radius: 18px;
        padding: 1.8rem;
        height: 100%;
        position: relative;
        box-shadow: 0 5px 15px rgba(5, 47, 87, 0.02);
    }
    .yfg-process-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--yfg-teal);
        color: #ffffff;
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 1rem;
    }
    .yfg-process-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--yfg-navy);
        margin-bottom: 0.5rem;
    }
    .yfg-process-desc {
        font-size: 0.9rem;
        color: #5b6b7d;
        line-height: 1.5;
        margin-bottom: 0;
    }
</style>

<!-- ============ HERO SECTION ============ -->
<section class="yfg-landing-hero">
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-8">
                <h1 class="mb-3">Hire a Dedicated Remote Team <span class="grad">That Works in Your Hours</span></h1>
                <p class="yfg-landing-hero__lead mb-4">Your Firm Growth (YFG) is your dedicated remote team. Hire us, and you get designers, developers, marketers, and strategists who plug straight into your business and align to your office hours for real-time collaboration—no recruiting, no agencies, no overhead.</p>
                
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Hire Your Dedicated Team &rarr;</a>
                </div>

                <ul class="yfg-trust-badges">
                    <li><i class="bi bi-check-circle-fill"></i> One full-service partner</li>
                    <li><i class="bi bi-shield-fill-check"></i> GDPR Compliant</li>
                    <li><i class="bi bi-clock-fill"></i> Our teams align to your office hours</li>
                    <li><i class="bi bi-globe"></i> Trusted by businesses worldwide</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ SECTION 1: AS YOUR OWN ============ -->
<section class="yfg-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-3">A Dedicated Remote Team You Can Hire as Your Own</h2>
                <p class="lead text-muted mb-4" style="font-size: 1.1rem; line-height: 1.6;">Freelancers come and go, and recruitment takes months. When you hire Your Firm Growth, you get a dedicated remote team that's already assembled, skilled, and ready to work.</p>
                <p class="text-muted mb-4">Our professionals integrate directly into your tools (Slack, Jira, Teams) and workflow, attending your standups and participating in real-time. You get seamless collaboration during your working day, with a team that feels like your own, wherever you're based.</p>
                <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-outline-brand">Book a Strategy Call &rarr;</a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="position-relative d-inline-block">
                    <div class="yfg-deco-dots yfg-deco-dots--top-left"></div>
                    <div class="yfg-deco-dots yfg-deco-dots--bottom-right"></div>
                    <div class="yfg-img-frame">
                        <img src="<?php echo esc_url( YFG_URI . '/assets/images/dedicated-remote-teams/dedicated-remote-teams-image-1.webp' ); ?>" alt="Dedicated Remote Teams">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ SECTION 2: SKILLS INSIDE ============ -->
<section class="yfg-section yfg-section--light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="yfg-accent"></span>
            <h2 class="yfg-section-title">The Skills Inside Your Dedicated Remote Team</h2>
            <p class="text-muted mx-auto" style="max-width:700px;">Hire us and you get access to a full team's range of expertise, we handle every type of digital project:</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Designers -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-palette-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Design &amp; UX/UI</h3>
                    <p class="yfg-detail-card__text">Web designers and user experience specialists creating visually stunning, user-friendly layouts and high-converting interfaces.</p>
                </div>
            </div>

            <!-- Developers -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-code-slash"></i></span>
                    <h3 class="yfg-detail-card__title">Web Developers</h3>
                    <p class="yfg-detail-card__text">Front-end and back-end developers building clean, scalable code for responsive websites, stores, and custom web applications.</p>
                </div>
            </div>

            <!-- SEO & Content -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-search"></i></span>
                    <h3 class="yfg-detail-card__title">SEO &amp; Content</h3>
                    <p class="yfg-detail-card__text">SEO specialists and professional copywriters driving organic traffic, building topical authority, and optimizing search rankings.</p>
                </div>
            </div>

            <!-- Marketing Managers -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-megaphone-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Paid Ads &amp; Social</h3>
                    <p class="yfg-detail-card__text">Campaign managers driving leads and sales through Google Ads, Meta Ads, LinkedIn Ads, and organic social channels.</p>
                </div>
            </div>

            <!-- Project Managers -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-compass-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Managers &amp; Strategists</h3>
                    <p class="yfg-detail-card__text">Project managers and digital strategists ensuring seamless delivery, clear reporting, and strategic business alignment.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="#how-it-works" class="btn btn-brand btn-lg">See How It Works &rarr;</a>
        </div>
    </div>
</section>

<!-- ============ SECTION 3: HOW IT WORKS ============ -->
<section class="yfg-section" id="how-it-works">
    <div class="container">
        <div class="text-center mb-5">
            <span class="yfg-accent"></span>
            <h2 class="yfg-section-title">How Hiring Your Firm Growth Works</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <?php
            $steps = array(
                array('1', 'Define', 'Tell us your goals, share the skills you need and your working hours.'),
                array('2', 'Assign', 'We dedicate the right specialists from YFG to your account, aligned to your time zone.'),
                array('3', 'Integrate', 'Your new remote team joins your communication tools, standups, and workflow.'),
                array('4', 'Scale', 'Scale your team capacity up or down dynamically as your projects demand.')
            );
            foreach ( $steps as $step ) :
            ?>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="yfg-process-card">
                    <span class="yfg-process-badge"><?php echo esc_html( $step[0] ); ?></span>
                    <h3 class="yfg-process-title"><?php echo esc_html( $step[1] ); ?></h3>
                    <p class="yfg-process-desc"><?php echo esc_html( $step[2] ); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ SECTION 4: WHY CHOOSE ============ -->
<section class="yfg-section yfg-section--light">
    <div class="container">
        <div class="row align-items-center g-5 mb-5">
            <!-- Left: Value Prop -->
            <div class="col-lg-7">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-4">Why Businesses Hire YFG as Their Remote Team</h2>
                <ul class="yfg-list">
                    <li><strong>Aligned to Your Hours:</strong> Real-time collaboration and standups during your working day.</li>
                    <li><strong>Dedicated, Not Shared:</strong> We focus entirely on your business, not a generic client queue.</li>
                    <li><strong>GDPR Compliant:</strong> Secure, privacy-first ways of working, essential for the European market.</li>
                    <li><strong>Flexible &amp; Cost-Effective:</strong> Scale without payroll, employee benefits, or recruiting overhead.</li>
                    <li><strong>Global Experience:</strong> Aligned with international organizations in the UK, US, Germany, and Europe.</li>
                </ul>
            </div>
            <!-- Right: Image -->
            <div class="col-lg-5 text-center">
                <div class="position-relative d-inline-block">
                    <div class="yfg-deco-dots yfg-deco-dots--top-left"></div>
                    <div class="yfg-deco-dots yfg-deco-dots--bottom-right"></div>
                    <div class="yfg-img-frame">
                        <img src="<?php echo esc_url( YFG_URI . '/assets/images/dedicated-remote-teams/dedicated-remote-teams-image-2.webp' ); ?>" alt="Why Hire YFG Remote Team">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4">
            <div class="col-12" id="faq">
                <span class="yfg-accent"></span>
                <h2 class="yfg-section-title text-center mb-4">Frequently Asked Questions</h2>
                
                <div class="accordion yfg-faq mx-auto" id="yfgFaq" style="max-width: 800px;">
                    <?php
                    $faqs = array(
                        array( 'What is a dedicated remote team?', 'A dedicated remote team is a group of specialists you hire to work exclusively on your projects from a remote location, integrated into your tools and processes like in-house staff.' ),
                        array( 'Can I hire your team to work in my time zone?', 'Yes. When you hire Your Firm Growth, your dedicated remote team aligns to your office hours, so collaboration happens in real time.' ),
                        array( 'How do I hire a dedicated remote team?', 'Tell YFG your goals, the skills you need, and your hours. We dedicate the right specialists from our team to your account, integrate them into your workflow, and you can scale up or down anytime.' ),
                        array( 'Is hiring your remote team cheaper than hiring in-house?', 'In most cases, yes. Hiring YFG avoids recruitment, payroll, overhead, and idle capacity. You pay only for the team and hours you actually need.' )
                    );
                    foreach ( $faqs as $i => $faq ) :
                        $cid = 'faq-' . $i;
                    ?>
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button <?php echo 0 === $i ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $cid ); ?>" aria-expanded="<?php echo 0 === $i ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $cid ); ?>">
                                <?php echo esc_html( $faq[0] ); ?>
                            </button>
                        </h3>
                        <div id="<?php echo esc_attr( $cid ); ?>" class="accordion-collapse collapse <?php echo 0 === $i ? 'show' : ''; ?>" data-bs-parent="#yfgFaq">
                            <div class="accordion-body">
                                <?php echo esc_html( $faq[1] ); ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ SECTION 5: FINAL CTA ============ -->
<section class="yfg-section text-center">
    <div class="container">
        <div class="yfg-action-banner text-center text-white" style="background: linear-gradient(135deg, #03182e 0%, #052f57 50%, #04505c 100%); border-radius: 24px; padding: 4rem 2rem; box-shadow: 0 15px 40px rgba(3, 24, 46, 0.15);">
            <h2 class="h1 mb-3 text-white" style="font-weight: 800; color: #ffffff !important;">Ready to Hire Your Dedicated Remote Team?</h2>
            <p class="mx-auto mb-4" style="max-width:700px; color: rgba(255, 255, 255, 0.9); font-size: 1.05rem;">Hire YFG as your dedicated remote team, aligned to your hours and ready to scale with your goals. Tell us what you need and we'll get started.</p>
            <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-light btn-lg fw-semibold px-4 py-3" style="border-radius: 12px; transition: all 0.3s ease; box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);">Hire Your Dedicated Team &rarr;</a>
            <p class="mt-4 mb-0" style="color: rgba(255, 255, 255, 0.7); font-size: 0.95rem;">Or visit <a class="text-white fw-semibold" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="text-decoration: underline;">yourfirmgrowth.com</a> to request your free quote.</p>
        </div>
    </div>
</section>

<?php
get_footer();
