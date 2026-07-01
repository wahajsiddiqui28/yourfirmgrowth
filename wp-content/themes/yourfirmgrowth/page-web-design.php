<?php
/**
 * Template Name: Web Design & Development Services
 *
 * @package YourFirmGrowth
 */

get_header();

$yfg_contact_url = home_url( '/contact/?service=WebDev' );
?>

<style>
    /* Premium Page-Specific Styles */
    .yfg-landing-hero {
        padding: 8rem 0 7rem;
        background: linear-gradient(135deg, rgba(3, 24, 46, 0.94) 0%, rgba(5, 47, 87, 0.9) 50%, rgba(4, 80, 92, 0.82) 100%), url(<?php echo esc_url( YFG_URI . '/assets/images/web-design-development-services/web-design-development-services-banner.webp' ); ?>) center / cover no-repeat;
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
                <h1 class="mb-3">Web Design and Development <span class="grad">Services That Convert</span></h1>
                <p class="yfg-landing-hero__lead mb-4">Your Firm Growth (YFG) builds fast, beautiful, conversion-focused websites. Our web design and development services combine standout design with clean, scalable code, so your site looks the part, loads in a flash, and turns visitors into customers.</p>
                
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Get a Website Quote &rarr;</a>
                </div>

                <ul class="yfg-trust-badges">
                    <li><i class="bi bi-check-circle-fill"></i> One full-service partner</li>
                    <li><i class="bi bi-shield-fill-check"></i> GDPR Compliant</li>
                    <li><i class="bi bi-clock-fill"></i> Remote design &amp; dev teams in your hours</li>
                    <li><i class="bi bi-globe"></i> Trusted by businesses worldwide</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ SECTION 1: DONE RIGHT THE FIRST TIME ============ -->
<section class="yfg-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-3">Web Design and Development, Done Right the First Time</h2>
                <p class="lead text-muted mb-4" style="font-size: 1.1rem; line-height: 1.6;">A great website is far more than a pretty homepage. It's speed, structure, accessibility, and a clear path that guides visitors toward action.</p>
                <p class="text-muted mb-4">Too many sites look good but load slowly, rank poorly, and convert badly, because design and development were treated as separate jobs. Your Firm Growth pairs designers and developers in one team, so your site is engineered to perform from the first wireframe. Every site we build is responsive, SEO-ready, and conversion-optimized by default.</p>
                <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-outline-brand">Book a Discovery Call &rarr;</a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="position-relative d-inline-block">
                    <div class="yfg-deco-dots yfg-deco-dots--top-left"></div>
                    <div class="yfg-deco-dots yfg-deco-dots--bottom-right"></div>
                    <div class="yfg-img-frame">
                        <img src="<?php echo esc_url( YFG_URI . '/assets/images/web-design-development-services/web-design-development-services-image-1.webp' ); ?>" alt="Web Design and Development">
                    </div>
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
            <h2 class="yfg-section-title">Our Web Design and Development Services in Detail</h2>
            <p class="text-muted mx-auto" style="max-width:700px;">We handle every type of web project, end to end. Engage us for a complete build or the specific services you need:</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Custom Web Design -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-palette-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Custom Web Design</h3>
                    <p class="yfg-detail-card__text">Distinctive, on-brand designs crafted around your audience, your goals, and your conversion paths—never recycled templates.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>UX Research</span><span>Wireframes</span><span>UI Design</span><span>Prototypes</span>
                    </div>
                </div>
            </div>

            <!-- Responsive Development -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-code-slash"></i></span>
                    <h3 class="yfg-detail-card__title">Responsive Development</h3>
                    <p class="yfg-detail-card__text">Pixel-perfect, mobile-first builds with clean, maintainable code that works flawlessly on every device and screen size.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Front-End</span><span>Back-End</span><span>Mobile-First</span><span>Testing</span>
                    </div>
                </div>
            </div>

            <!-- eCommerce Development -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-cart-fill"></i></span>
                    <h3 class="yfg-detail-card__title">eCommerce Development</h3>
                    <p class="yfg-detail-card__text">Online stores built to sell: fast, secure, and easy to manage, with optimized product pages and frictionless checkout.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>WooCommerce</span><span>Shopify</span><span>Checkouts</span><span>Payments</span>
                    </div>
                </div>
            </div>

            <!-- Web Applications -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-cpu-fill"></i></span>
                    <h3 class="yfg-detail-card__title">Web Applications</h3>
                    <p class="yfg-detail-card__text">Custom web apps, client portals, booking systems, and integrations tailored to how your business actually works.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Custom Apps</span><span>APIs</span><span>Dashboards</span><span>Integrations</span>
                    </div>
                </div>
            </div>

            <!-- CMS & WordPress -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-wordpress"></i></span>
                    <h3 class="yfg-detail-card__title">CMS &amp; WordPress</h3>
                    <p class="yfg-detail-card__text">Easy-to-manage sites your team can update without touching code, built on the platforms you already know.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>WordPress</span><span>Headless CMS</span><span>Page Builders</span><span>Training</span>
                    </div>
                </div>
            </div>

            <!-- SEO & Conversion Builds -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-check-circle-fill"></i></span>
                    <h3 class="yfg-detail-card__title">SEO &amp; CRO Ready</h3>
                    <p class="yfg-detail-card__text">Clean code, fast load times, structured data, and CRO best practices baked into every build from day one.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Core Web Vitals</span><span>SEO Setup</span><span>Schema Markup</span><span>CRO Layout</span>
                    </div>
                </div>
            </div>

            <!-- Website Care -->
            <div class="col-md-6 col-lg-4">
                <div class="yfg-detail-card">
                    <span class="yfg-detail-card__icon"><i class="bi bi-shield-fill-check"></i></span>
                    <h3 class="yfg-detail-card__title">Website Care &amp; Support</h3>
                    <p class="yfg-detail-card__text">Keep your site fast, secure, and up to date with ongoing maintenance, monitoring, and support after launch.</p>
                    <div class="yfg-detail-card__tags">
                        <strong>Includes</strong>
                        <span>Backups</span><span>Security</span><span>Performance</span><span>Content Edits</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Start Your Website Project &rarr;</a>
        </div>
    </div>
</section>

<!-- ============ SECTION 3: AUDIENCE & DIFFERENTIATORS ============ -->
<section class="yfg-section">
    <div class="container">
        <!-- Row 1: Who Our Web Design & Dev Services Are For -->
        <div class="row align-items-center g-5 mb-5 pb-4">
            <div class="col-lg-7">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-4">Who Our Web Design and Development Services Are For</h2>
                <ul class="yfg-list">
                    <li><strong>Startups & Small Businesses:</strong> Need affordable web design and development services to launch fast.</li>
                    <li><strong>Growing Brands:</strong> Ready for a custom site that scales with their audience.</li>
                    <li><strong>eCommerce Businesses:</strong> Need a fast, optimized store that sells.</li>
                    <li><strong>Replatforming Companies:</strong> Moving from a slow, outdated, or hard-to-manage website.</li>
                    <li><strong>International Organizations:</strong> Need multi-region, multilingual websites across worldwide markets.</li>
                </ul>
            </div>
            <div class="col-lg-5 text-center">
                <div class="position-relative d-inline-block">
                    <div class="yfg-deco-dots yfg-deco-dots--top-left"></div>
                    <div class="yfg-deco-dots yfg-deco-dots--bottom-right"></div>
                    <div class="yfg-img-frame">
                        <img src="<?php echo esc_url( YFG_URI . '/assets/images/web-design-development-services/web-design-development-services-image-2.webp' ); ?>" alt="Web Design Target Audience">
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2: Why Businesses Choose YFG for Web -->
        <div class="row align-items-center g-5 pt-4">
            <div class="col-lg-5 text-center order-lg-1 order-2">
                <div class="yfg-compliance-card p-4 text-start" style="border: 1px solid #d2ebee; background: linear-gradient(135deg, var(--yfg-soft) 0%, #ffffff 100%); border-radius: 20px;">
                    <h3 class="h5 fw-bold mb-3" style="color:var(--yfg-navy);"><i class="bi bi-shield-fill-check me-2 text-teal"></i> GDPR &amp; Speed Optimized</h3>
                    <p class="text-muted small">Every website we build complies with the latest cookie consent policies, data encryption practices, and GDPR guidelines, ensuring safe transactions globally.</p>
                    <ul class="yfg-list mb-0">
                        <li class="small">Core Web Vitals optimized (Grade A speed)</li>
                        <li class="small">Fully responsive design layout</li>
                        <li class="small">Custom integrations &amp; CMS setups</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 order-lg-2 order-1">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-4">Why Businesses Choose YFG for Web</h2>
                <ul class="yfg-list">
                    <li><strong>Built to Convert:</strong> Design and CRO work together, not against each other.</li>
                    <li><strong>Fast &amp; SEO-Ready:</strong> Clean code and speed that help you rank from launch.</li>
                    <li><strong>Design + Dev in One Team:</strong> No handoff gaps, no finger-pointing, no compromise.</li>
                    <li><strong>GDPR Compliant:</strong> Privacy-first forms, cookie consent, and data handling.</li>
                    <li><strong>Aligned to Your Hours:</strong> Remote design and dev teams working in your time zone.</li>
                </ul>
            </div>
        </div>

        <div class="text-center mt-5 pt-3">
            <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Request Your Proposal &rarr;</a>
        </div>
    </div>
</section>

<!-- ============ SECTION 4: PROCESS ============ -->
<section class="yfg-section yfg-section--light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="yfg-accent"></span>
            <h2 class="yfg-section-title">How We Build Your Website</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <?php
            $steps = array(
                array('1', 'Discover', 'We learn your brand, audience, goals, and technical requirements.'),
                array('2', 'Design', 'We create wireframes and visual designs, refining until you love them.'),
                array('3', 'Develop', 'We build a fast, responsive, SEO-ready site with clean code.'),
                array('4', 'Test', 'We check performance, responsiveness, accessibility, and compatibility.'),
                array('5', 'Launch & Support', 'We go live and keep your site secure, fast, and optimized.')
            );
            foreach ( $steps as $step ) :
            ?>
            <div class="col-md-6 col-lg-4 text-center">
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

<!-- ============ SECTION 5: CUSTOM & AFFORDABLE ============ -->
<section class="yfg-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="yfg-accent yfg-accent--start"></span>
                <h2 class="yfg-section-title mb-3">Custom, Affordable &amp; Professional Web Design and Development</h2>
                <p class="lead text-muted mb-4" style="font-size: 1.1rem; line-height: 1.6;">Whether you need a custom flagship site or affordable web design and development services to launch quickly, YFG scales the build to your budget without cutting corners on performance or quality.</p>
                <p class="text-muted mb-4">Our professional web design and development services give you a partner for the long term, not a one-off project that's abandoned at launch. We provide post-launch care, hosting configuration, speed audits, and content updates so your website continues to grow alongside your business pipeline.</p>
                <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-brand btn-lg">Get a Custom Website Quote &rarr;</a>
            </div>
            <div class="col-lg-5 text-center">
                <div class="position-relative d-inline-block">
                    <div class="yfg-deco-dots yfg-deco-dots--top-left"></div>
                    <div class="yfg-deco-dots yfg-deco-dots--bottom-right"></div>
                    <div class="yfg-img-frame">
                        <img src="<?php echo esc_url( YFG_URI . '/assets/images/web-design-development-services/web-design-development-services-image-3.webp' ); ?>" alt="Custom Website Design">
                    </div>
                </div>
            </div>
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
                array( 'What are web design and development services?', 'Web design and development services cover both the visual design of a website and the technical build, turning a concept into a fast, functional, conversion-ready site.' ),
                array( 'How much do web design and development services cost?', 'Cost depends on size and complexity. YFG offers everything from affordable launch sites to fully custom builds, with a clear, itemized quote before any work begins.' ),
                array( 'How long does it take to build a website?', 'A typical small-business site takes a few weeks; larger custom or eCommerce builds take longer. We agree a clear timeline during discovery so you know what to expect.' ),
                array( 'Do you build custom websites?', 'Yes. Your Firm Growth provides custom web design and development services tailored to your brand, plus CMS options your team can manage easily.' ),
                array( 'Will my website be SEO-friendly?', 'Every site we build is fast, mobile-first, and SEO-ready, with clean code, structured data, and conversion best practices built in from the start.' ),
                array( 'Do you offer support after launch?', 'Yes. We provide ongoing care, hosting, security, and optimization so your website stays fast, safe, and effective long after it goes live.' )
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
        <div class="yfg-action-banner text-center text-white" style="background: linear-gradient(135deg, #03182e 0%, #052f57 50%, #04505c 100%); border-radius: 24px; padding: 4rem 2rem; box-shadow: 0 15px 40px rgba(3, 24, 46, 0.15);">
            <h2 class="h1 mb-3 text-white" style="font-weight: 800; color: #ffffff !important;">Ready for a Website That Works as Hard as You Do?</h2>
            <p class="mx-auto mb-4" style="max-width:700px; color: rgba(255, 255, 255, 0.9); font-size: 1.05rem;">Partner with YFG for web design and development services that look great and convert. Tell us about your project and get a free, no-obligation quote.</p>
            <a href="<?php echo esc_url( $yfg_contact_url ); ?>" class="btn btn-light btn-lg fw-semibold px-4 py-3" style="border-radius: 12px; transition: all 0.3s ease; box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);">Get Your Free Website Quote &rarr;</a>
            <p class="mt-4 mb-0" style="color: rgba(255, 255, 255, 0.7); font-size: 0.95rem;">Or visit <a class="text-white fw-semibold" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="text-decoration: underline;">yourfirmgrowth.com</a> to request your quote.</p>
        </div>
    </div>
</section>

<?php
get_footer();
