<?php
/**
 * Template Name: SEO Services
 *
 * @package YourFirmGrowth
 */

get_header();

$yfg_contact_url = home_url( '/contact/?service=SEO' );
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
                <h1 class="mb-3">SEO Services That Rank You on <span class="grad">Google and Drive Real Leads</span></h1>
                <p class="yfg-landing-hero__lead mb-4">Your Firm Growth (YFG) delivers professional SEO services engineered to win higher rankings, more qualified traffic, and measurable revenue. We combine technical SEO, on-page optimization, authoritative content, and trusted link building into one strategy, handled by a single expert team.</p>
                
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Get Your Free SEO Audit &rarr;</a>
                </div>

                <ul class="yfg-trust-badges">
                    <li><i class="bi bi-check-circle-fill"></i> One full-service partner</li>
                    <li><i class="bi bi-shield-fill-check"></i> GDPR Compliant</li>
                    <li><i class="bi bi-clock-fill"></i> Remote SEO teams aligned to your hours</li>
                    <li><i class="bi bi-globe"></i> Trusted by businesses worldwide</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ SECTION 1: COMPOUND GROWTH ============ -->
<section class="yfg-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-3">Professional SEO Services, Built to Compound</h2>
                <p class="lead text-muted mb-4" style="font-size: 1.1rem; line-height: 1.6;">Search rankings aren't luck, they're engineered. The businesses that dominate Google do three things consistently: they fix the technical foundations, they publish content that matches search intent, and they earn authority other sites trust.</p>
                <p class="text-muted mb-4">Unlike agencies that chase quick wins and risky shortcuts, our SEO service is built for the long game. Early improvements come from technical fixes and on-page optimization; lasting growth comes from content and authority that competitors can't easily copy. The result is traffic that costs less over time and converts better than paid alone.</p>
                <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-outline-brand">Book a Strategy Call &rarr;</a>
            </div>
            <div class="col-lg-6">
                <div class="yfg-compliance-card p-4" style="border: 1px solid #d2ebee; background: linear-gradient(135deg, var(--yfg-soft) 0%, #ffffff 100%); border-radius: 20px;">
                    <h3 class="h5 fw-bold mb-3" style="color:var(--yfg-navy);"><i class="bi bi-graph-up-arrow me-2 text-teal"></i> The YFG SEO Advantage</h3>
                    <ul class="yfg-list">
                        <li><strong>Higher Rankings:</strong> Dominate search terms that matter to your bottom line.</li>
                        <li><strong>Organic Traffic:</strong> Get consistent, highly qualified visitors without ad spend.</li>
                        <li><strong>Lower Cost Per Lead:</strong> Organic leads compound, reducing client acquisition costs.</li>
                        <li><strong>Authority Building:</strong> Establish your brand as the topical authority in your industry.</li>
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
            <h2 class="yfg-section-title">Our SEO Services in Detail</h2>
            <p class="text-muted mx-auto" style="max-width:700px;">We handle every part of search, so nothing holds your rankings back. Engage us for the full program or the specific areas you need most:</p>
        </div>

        <div class="row g-4">
            <!-- Technical SEO -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-gear-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Technical SEO</h3>
                    <p class="yfg-detail-card__text">We fix the foundations search engines judge first: crawlability, indexing, site architecture, speed, and Core Web Vitals. A technically sound site ranks faster.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Crawl Audit</span><span>Speed Optimization</span><span>Core Web Vitals</span><span>Schema Markup</span>
                    </div>
                </div>
            </div>

            <!-- On-Page SEO -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-file-earmark-code-fill"></i></span>
                    <h3 class="yfg-detail-card__title">On-Page SEO</h3>
                    <p class="yfg-detail-card__text">We optimize the pages that matter for the keywords that drive revenue, aligning titles, headings, content, and metadata with real search intent.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Keyword Mapping</span><span>Meta Tags</span><span>Headers</span><span>Internal Linking</span>
                    </div>
                </div>
            </div>

            <!-- Content & Topical Authority -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-journal-text"></i></span>
                    <h3 class="yfg-detail-card__title">Content & Authority</h3>
                    <p class="yfg-detail-card__text">We plan and produce content that answers your audience's questions, targets high-intent keywords, and builds topical authority across your niche.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Content Strategy</span><span>Keyword Research</span><span>Cluster Content</span><span>Copywriting</span>
                    </div>
                </div>
            </div>

            <!-- Off-Page SEO -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-link-45deg"></i></span>
                    <h3 class="yfg-detail-card__title">Off-Page & Links</h3>
                    <p class="yfg-detail-card__text">Authority is earned. We build quality backlinks and digital PR placements from relevant, trustworthy sources that strengthen your domain authority.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>White-Hat Links</span><span>Digital PR</span><span>Brand Mentions</span><span>Competitor Analysis</span>
                    </div>
                </div>
            </div>

            <!-- Local SEO -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-geo-alt-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Local SEO</h3>
                    <p class="yfg-detail-card__text">If you serve specific regions, we make you visible in local map packs and 'near me' searches, optimizing your Google Business Profile and local citations.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Google Business</span><span>Local Citations</span><span>Reviews</span><span>Location Pages</span>
                    </div>
                </div>
            </div>

            <!-- International SEO -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-globe2"></i></span>
                    <h3 class="yfg-detail-card__title">Global & eCommerce</h3>
                    <p class="yfg-detail-card__text">Selling across borders or running stores brings unique challenges. We handle hreflang, multi-region targeting, and eCommerce product optimization.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Hreflang Setup</span><span>Multi-Region</span><span>Product SEO</span><span>Faceted Navigation</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">See Which SEO Services You Need &rarr;</a>
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
                <h2 class="yfg-section-title mb-4">Who Our SEO Services Are For</h2>
                <ul class="yfg-list">
                    <li><strong>Startups & Small Businesses:</strong> Need affordable SEO services to build visibility from the ground up.</li>
                    <li><strong>Established Brands:</strong> Looking to defend rankings and outpace competitors.</li>
                    <li><strong>eCommerce Stores:</strong> Need product, category, and technical SEO at scale.</li>
                    <li><strong>B2B & Service Companies:</strong> Focused on qualified lead generation, not just traffic.</li>
                    <li><strong>International Organizations:</strong> Expanding across the UK, US, Germany, Europe, and worldwide markets.</li>
                </ul>
            </div>
            <!-- Right: Differentiators -->
            <div class="col-lg-6">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-4">What Makes YFG's SEO Different</h2>
                <ul class="yfg-list">
                    <li><strong>Results You Can Measure:</strong> We report on rankings, organic traffic, leads, and revenue clearly, every month.</li>
                    <li><strong>White-Hat Only:</strong> Sustainable methods that follow Google's guidelines and protect you from penalties.</li>
                    <li><strong>Full-Stack Expertise:</strong> Technical, content, and authority handled by one team, not stitched across vendors.</li>
                    <li><strong>GDPR Compliant:</strong> Privacy-first analytics and data handling, essential for the European market.</li>
                    <li><strong>Aligned to Your Hours:</strong> Our remote SEO specialists work in your time zone for real-time collaboration.</li>
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
            <h2 class="yfg-section-title">How Our SEO Process Works</h2>
        </div>

        <div class="row g-4">
            <?php
            $steps = array(
                array('1', 'Audit', 'We analyze your site\'s technical health, content, backlinks, and competitors to find the biggest opportunities.'),
                array('2', 'Strategy', 'We map your target keywords to intent and prioritize the actions that move rankings fastest.'),
                array('3', 'Optimize', 'We fix technical issues, improve on-page elements, and strengthen your content.'),
                array('4', 'Create & Earn', 'We publish search-led content and build quality backlinks from authoritative sites.'),
                array('5', 'Measure', 'We track rankings, traffic, and conversions, and report transparently every month.'),
                array('6', 'Scale', 'We double down on what works and expand into new keywords and global markets.')
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

<!-- ============ SECTION 5: AFFORDABLE SERVICES ============ -->
<section class="yfg-section">
    <div class="container">
        <div class="yfg-action-banner text-center text-white">
            <h2 class="h1 mb-3">Affordable SEO Services Without Cutting Corners</h2>
            <p class="mx-auto mb-4">Great SEO doesn't have to break the budget. Our affordable SEO services prioritize the changes that move rankings fastest, so you see momentum early and reinvest from results. As a transparent SEO services company, YFG shows you exactly what we do and the impact it drives, no jargon, no lock-in, no smoke and mirrors.</p>
            <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-light btn-lg fw-semibold">Get a Custom SEO Quote &rarr;</a>
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
                array( 'What are SEO services?', 'SEO services are the technical, on-page, content, and off-page work that improves a website\'s visibility in search engines like Google, driving more organic traffic, leads, and sales over time.' ),
                array( 'How much do SEO services cost?', 'Cost depends on competition, scope, and goals. YFG offers affordable, scalable SEO services so businesses of any size can start at a level that fits their budget and grow from there.' ),
                array( 'How long does SEO take to work?', 'Most websites see meaningful improvement within three to six months, with results compounding the longer the strategy runs. Technical fixes can show impact sooner; content and authority build momentum over time.' ),
                array( 'What\'s the difference between professional and affordable SEO services?', 'Professional SEO services cover the full strategy, technical, content, and authority, while affordable SEO services focus on the highest-impact actions first. With Your Firm Growth, you can start to lean and expand as results come in.' ),
                array( 'Do you offer local and international SEO?', 'Yes. We optimize for local map-pack visibility as well as multi-region and international SEO for businesses expanding across borders.' ),
                array( 'Are your SEO services safe (white-hat)?', 'Yes. We use only sustainable, white-hat methods that follow Google\'s guidelines and protect your site long-term.' ),
                array( 'Will I be locked into a long contract?', 'No. We earn your business with results, and offer flexible engagements rather than restrictive long-term lock-ins.' )
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
        <h2 class="yfg-section-title mb-3">Ready to Rank Higher With Professional SEO?</h2>
        <p class="text-muted mx-auto mb-4" style="max-width:700px;">Partner with YFG for SEO services that turn search visibility into real business growth. Start with a free audit of your current rankings and a clear plan to improve them.</p>
        <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Get Your Free SEO Audit &rarr;</a>
        <p class="mt-3 text-muted">Or visit <a class="text-teal font-semibold" href="<?php echo esc_url( home_url( '/' ) ); ?>">yourfirmgrowth.com</a> to request your free quote.</p>
    </div>
</section>

<?php
get_footer();
