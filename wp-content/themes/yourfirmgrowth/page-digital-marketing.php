<?php
/**
 * Template Name: Digital Marketing Services
 *
 * @package YourFirmGrowth
 */

get_header();

$yfg_contact_url = home_url( '/contact/?service=Marketing' );
?>

<style>
    /* Premium Page-Specific Styles */
    .yfg-landing-hero {
        padding: 7rem 0 6rem;
        background: linear-gradient(135deg, #03182e 0%, #052f57 50%, #04505c 100%);
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
        margin-bottom: 1.2rem;
    }
    .yfg-detail-card__tags {
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px dashed #e9f3f5;
    }
    .yfg-detail-card__tags strong {
        font-size: 0.82rem;
        color: var(--yfg-navy-2);
        text-transform: uppercase;
        display: block;
        margin-bottom: 0.4rem;
    }
    .yfg-detail-card__tags span {
        display: inline-block;
        font-size: 0.8rem;
        background: #f1f8f9;
        color: var(--yfg-teal);
        padding: 0.15rem 0.55rem;
        border-radius: 4px;
        margin-right: 0.3rem;
        margin-bottom: 0.3rem;
        font-weight: 500;
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
    /* CTA Block */
    .yfg-action-banner {
        background: var(--yfg-grad);
        color: #ffffff;
        border-radius: 24px;
        padding: 3.5rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(4, 112, 125, 0.2);
    }
    .yfg-action-banner h2 {
        color: #ffffff !important;
        font-weight: 800;
    }
    .yfg-action-banner p {
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
    }
</style>

<!-- ============ HERO SECTION ============ -->
<section class="yfg-landing-hero">
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-8">
                <h1 class="mb-3">Digital Marketing Services That Turn <span class="grad">Clicks Into Customers</span></h1>
                <p class="yfg-landing-hero__lead mb-4">Your Firm Growth (YFG) is a results-driven agency offering full-service digital marketing services, SEO, paid advertising, content, social media, email, and automation, engineered to grow your traffic, leads, and revenue.</p>
                
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Get Your Free Marketing Proposal &rarr;</a>
                </div>

                <ul class="yfg-trust-badges">
                    <li><i class="bi bi-check-circle-fill"></i> One full-service partner</li>
                    <li><i class="bi bi-shield-fill-check"></i> GDPR Compliant</li>
                    <li><i class="bi bi-clock-fill"></i> Remote teams aligned to your hours</li>
                    <li><i class="bi bi-globe"></i> Trusted by businesses worldwide</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ SECTION 1: BUILT FOR GROWTH ============ -->
<section class="yfg-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-3">Digital Marketing Service, Built for Growth</h2>
                <p class="lead text-muted mb-4" style="font-size: 1.1rem; line-height: 1.6;">Scattered tactics waste the budget. A blog here, a few ads there, an abandoned social account—none of it compounds. Your Firm Growth plans, launches, and optimizes your entire digital presence as one connected strategy.</p>
                <p class="text-muted mb-4">We start with your goals and your numbers, not a template. Then we build a channel mix designed to attract the right audience, convert them efficiently, and keep them coming back, measuring everything so we can prove what's working and scale it.</p>
                <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-outline-brand">Book a Strategy Call &rarr;</a>
            </div>
            <div class="col-lg-6">
                <div class="yfg-compliance-card p-4" style="border: 1px solid #d2ebee; background: linear-gradient(135deg, var(--yfg-soft) 0%, #ffffff 100%); border-radius: 20px;">
                    <h3 class="h5 fw-bold mb-3" style="color:var(--yfg-navy);"><i class="bi bi-rocket-takeoff-fill me-2 text-teal"></i> Unifying Your Marketing Mix</h3>
                    <ul class="yfg-list">
                        <li><strong>Connected Strategy:</strong> Aligning all channels under one growth plan.</li>
                        <li><strong>Zero Budget Waste:</strong> Making sure every dollar or pound compounds.</li>
                        <li><strong>Data-Driven Execution:</strong> Tracking conversions, cost-per-lead, and ROAS.</li>
                        <li><strong>Continuous Optimization:</strong> Constant A/B testing on ads and landing pages.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ SECTION 2: SERVICES IN DETAIL ============ -->
<section class="yfg-section yfg-section--light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="yfg-accent"></span>
            <h2 class="yfg-section-title">Our Digital Marketing Services in Detail</h2>
            <p class="text-muted mx-auto" style="max-width:700px;">We handle every type of digital project, across the channels that move your numbers. Use us for the full mix or the specific services you need:</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- SEO -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-search"></i></span>
                    <h3 class="yfg-detail-card__title">Search Engine Optimization</h3>
                    <p class="yfg-detail-card__text">Rank higher on Google and earn organic traffic that compounds over time, lowering your cost per lead.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Technical SEO</span><span>On-Page</span><span>Content</span><span>Link Building</span>
                    </div>
                </div>
            </div>

            <!-- PPC -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-megaphone-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Paid Advertising (PPC)</h3>
                    <p class="yfg-detail-card__text">Profit-focused campaigns across Google, Meta, LinkedIn, and beyond, managed for return on ad spend.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Google Ads</span><span>Meta Ads</span><span>Retargeting</span><span>A/B Testing</span>
                    </div>
                </div>
            </div>

            <!-- Content Marketing -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-pencil-square"></i></span>
                    <h3 class="yfg-detail-card__title">Content Marketing</h3>
                    <p class="yfg-detail-card__text">Strategy, copywriting, and creative that rank, educate, and move prospects toward a confident decision.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Content Strategy</span><span>Blog Copy</span><span>Lead Magnets</span><span>Scripts</span>
                    </div>
                </div>
            </div>

            <!-- Social Media Marketing -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-share-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Social Media Marketing</h3>
                    <p class="yfg-detail-card__text">A consistent, on-brand presence that builds community, trust, and demand across platforms.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Calendars</span><span>Community Mgmt</span><span>Paid Social</span><span>Influencer</span>
                    </div>
                </div>
            </div>

            <!-- CRO -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-graph-up-arrow"></i></span>
                    <h3 class="yfg-detail-card__title">Conversion Rate (CRO)</h3>
                    <p class="yfg-detail-card__text">Turn more of the traffic you already have into customers through data-driven testing and UX refinement.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Funnel Analysis</span><span>A/B Testing</span><span>Landing Pages</span><span>UX Review</span>
                    </div>
                </div>
            </div>

            <!-- Email & Automation -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-envelope-open-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Email &amp; Automation</h3>
                    <p class="yfg-detail-card__text">Nurture leads automatically and keep customers coming back with segmented campaigns and workflows.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Email Strategy</span><span>Automated Flows</span><span>Segmentation</span><span>CRM Integration</span>
                    </div>
                </div>
            </div>

            <!-- Analytics & Reporting -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-bar-chart-line-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Analytics &amp; Reporting</h3>
                    <p class="yfg-detail-card__text">Clear, honest reporting that connects marketing activity to business outcomes, so you always know what's working.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>KPI Dashboards</span><span>Conversion Tracking</span><span>Attribution</span><span>Reviews</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Explore Our Marketing Services &rarr;</a>
        </div>
    </div>
</section>

<!-- ============ SECTION 3: AUDIENCE & DIFFERENTIATORS ============ -->
<section class="yfg-section">
    <div class="container">
        <div class="row g-5">
            <!-- Left: Who it is for -->
            <div class="col-lg-6">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-4">Who Our Digital Marketing Services Are For</h2>
                <ul class="yfg-list">
                    <li><strong>Small Businesses:</strong> Focused, affordable digital marketing services for small business that show results fast.</li>
                    <li><strong>Startups & Scale-ups:</strong> Looking to build demand and acquire customers efficiently.</li>
                    <li><strong>Established Brands:</strong> Unify channels under a single digital marketing services company.</li>
                    <li><strong>eCommerce & B2B Teams:</strong> Focused on revenue, ROAS, and qualified sales pipeline.</li>
                    <li><strong>International Organizations:</strong> Growing across the UK, US, Germany, Europe, and worldwide.</li>
                </ul>
            </div>
            <!-- Right: Differentiators -->
            <div class="col-lg-6">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-4">Why Businesses Choose YFG</h2>
                <ul class="yfg-list">
                    <li><strong>Measurable Results:</strong> We report on leads, conversions, ROAS, and revenue, not vanity metrics.</li>
                    <li><strong>Customized Strategies:</strong> Tailored specifically to your industry, audience, and objectives.</li>
                    <li><strong>Everything Under One Roof:</strong> No juggling separate vendors for SEO, ads, content, and design.</li>
                    <li><strong>GDPR Compliant:</strong> Privacy-first tracking and data handling for the European market.</li>
                    <li><strong>Remote Teams in Your Hours:</strong> Real-time collaboration wherever you're based.</li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Request Your Proposal &rarr;</a>
        </div>
    </div>
</section>

<!-- ============ SECTION 4: PROCESS ============ -->
<section class="yfg-section yfg-section--light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="yfg-accent"></span>
            <h2 class="yfg-section-title">How We Drive Marketing Results</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <?php
            $steps = array(
                array('1', 'Discover', 'We audit your market, competitors, audience, and current performance.'),
                array('2', 'Strategize', 'We design a channel-by-channel roadmap tied to measurable KPIs.'),
                array('3', 'Launch', 'We execute campaigns across SEO, ads, content, social, and email.'),
                array('4', 'Measure', 'We track every channel against the metrics that matter to your business.'),
                array('5', 'Optimize & Scale', 'We test, refine, and double down on what drives growth.')
            );
            foreach ( $steps as $step ) :
            ?>
            <div class="col-md-6 col-lg-4">
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

<!-- ============ SECTION 5: SMALL BUSINESS ============ -->
<section class="yfg-section">
    <div class="container">
        <div class="yfg-action-banner text-center text-white">
            <h2 class="h1 mb-3">Digital Marketing Services for Small Business</h2>
            <p class="mx-auto mb-4">Growth shouldn't be reserved for big budgets. Our digital marketing services for small business focus on the highest-impact channels first (usually SEO and paid ads) so every penny works hard and results come quickly. As a flexible digital marketing services company, YFG scales your strategy as your revenue grows.</p>
            <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-light btn-lg fw-semibold">Get a Custom Marketing Quote &rarr;</a>
        </div>
    </div>
</section>

<!-- ============ SECTION 6: FAQ ============ -->
<section class="yfg-section yfg-section--light" id="faq">
    <div class="container">
        <div class="text-center mb-5">
            <span class="yfg-accent"></span>
            <h2 class="yfg-section-title">Frequently Asked Questions</h2>
        </div>

        <div class="accordion yfg-faq mx-auto" id="yfgFaq">
            <?php
            $faqs = array(
                array( 'What are digital marketing services?', 'Digital marketing services are the campaigns and channels—SEO, paid ads, content, social, email, and automation—used to grow a brand\'s online visibility, leads, and sales.' ),
                array( 'How much do digital marketing services cost?', 'Cost depends on your goals and the channels involved. YFG offers scalable packages, so small businesses and larger brands alike invest only in what drives results.' ),
                array( 'Which digital marketing services do I need?', 'It depends on your audience and goals. We start with an audit and recommend the highest-impact mix, often SEO and paid ads first, then content, social, and automation.' ),
                array( 'How are digital marketing services different from a digital marketing agency?', 'Digital marketing services are the specific solutions; a digital marketing agency like Your Firm Growth delivers and manages them together as one strategy, so your channels work in sync.' ),
                array( 'Do you offer digital marketing for small businesses?', 'Yes. We provide digital marketing services for small business focused on fast, measurable wins within your budget.' ),
                array( 'How do you measure success?', 'We track the metrics tied to your business goals, leads, conversions, cost per acquisition, ROAS, and revenue, and report on them transparently every month.' )
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
</section>

<!-- ============ SECTION 7: FINAL CTA ============ -->
<section class="yfg-section text-center">
    <div class="container">
        <h2 class="yfg-section-title mb-3">Ready to Grow With a Digital Marketing Company?</h2>
        <p class="text-muted mx-auto mb-4" style="max-width:700px;">Partner with YFG for digital marketing services that turn clicks into customers. Tell us your goals and we'll build the strategy to hit them.</p>
        <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Get Your Free Marketing Proposal &rarr;</a>
        <p class="mt-3 text-muted">Or visit <a class="text-teal font-semibold" href="<?php echo esc_url( home_url( '/' ) ); ?>">yourfirmgrowth.com</a> to request your free quote.</p>
    </div>
</section>

<?php
get_footer();
