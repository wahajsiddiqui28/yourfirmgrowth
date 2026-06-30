<?php
/**
 * YourFirmGrowth — SEO Title, Meta Descriptions, and JSON-LD Schema Integrations
 * ─────────────────────────────────────────────────────────────────────────────
 * Dynamically injects SEO Metadata (Titles, Meta Descriptions, Open Graph Tags)
 * and structured JSON-LD (Service & FAQPage Schemas) into the page <head> based 
 * on the active page templates.
 *
 * @package YourFirmGrowth
 */

defined( 'ABSPATH' ) || exit;

/**
 * Filter document title parts to set custom SEO titles.
 *
 * @param array $title_parts Current title parts.
 * @return array Modified title parts.
 */
function yfg_custom_page_titles( $title_parts ) {
    if ( is_page_template( 'page-seo-services.php' ) ) {
        $title_parts['title'] = 'SEO Services | Professional & Affordable SEO | YFG';
    } elseif ( is_page_template( 'page-digital-marketing.php' ) ) {
        $title_parts['title'] = 'Digital Marketing Services | Your Firm Growth (YFG)';
    } elseif ( is_page_template( 'page-web-design.php' ) ) {
        $title_parts['title'] = 'Custom Web Design & Development Services | YFG';
    } elseif ( is_page_template( 'page-remote-teams.php' ) ) {
        $title_parts['title'] = 'Hire a Dedicated Remote Team | Your Firm Growth';
    }
    return $title_parts;
}
add_filter( 'document_title_parts', 'yfg_custom_page_titles', 20 );

/**
 * Inject Meta Descriptions & Open Graph tags in wp_head.
 */
function yfg_custom_page_meta() {
    $desc = '';
    $og_title = '';
    $og_desc = '';
    $canonical = '';

    if ( is_page_template( 'page-seo-services.php' ) ) {
        $desc = 'Professional, affordable SEO services that rank you on Google & drive leads. GDPR-compliant SEO experts for businesses worldwide. Get your free SEO audit.';
        $og_title = 'Professional & Affordable SEO Services | Your Firm Growth';
        $og_desc = 'Rank higher and drive leads with YFG\'s SEO services, technical, on-page & content SEO. GDPR compliant. Free SEO audit available.';
        $canonical = home_url( '/seo-services' );
    } elseif ( is_page_template( 'page-digital-marketing.php' ) ) {
        $desc = 'Grow faster with full-service digital marketing services, SEO, ads, content & automation. GDPR-compliant teams for businesses worldwide. Free proposal.';
        $og_title = 'Digital Marketing Services | Results-Driven Agency, YFG';
        $og_desc = 'Full-service digital marketing services from Your Firm Growth, SEO, ads, content & more. GDPR compliant. Built for measurable growth.';
        $canonical = home_url( '/digital-marketing-services' );
    } elseif ( is_page_template( 'page-web-design.php' ) ) {
        $desc = 'Custom web design and development services that convert fast, responsive & SEO-ready. GDPR-compliant builds for businesses worldwide. Get a free quote.';
        $og_title = 'Web Design and Development Services | Your Firm Growth';
        $og_desc = 'Fast, responsive, conversion-focused websites from YFG. Custom & affordable web design and development services. GDPR compliant. Free quote.';
        $canonical = home_url( '/web-design-development-services' );
    } elseif ( is_page_template( 'page-remote-teams.php' ) ) {
        $desc = 'Hire a dedicated remote team that works in your office hours, designers, developers & marketers. GDPR-compliant, ready to scale. Hire YFG today.';
        $og_title = 'Hire a Dedicated Remote Team | Aligned to Your Hours, YFG';
        $og_desc = 'Hire YFG as your dedicated remote team, designers, developers & marketers aligned to your office hours. GDPR compliant. Scale anytime.';
        $canonical = home_url( '/dedicated-remote-teams' );
    }

    if ( ! empty( $desc ) ) {
        echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
        echo '<meta property="og:title" content="' . esc_attr( $og_title ) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr( $og_desc ) . '">' . "\n";
        echo '<meta property="og:type" content="article">' . "\n";
        echo '<meta property="og:url" content="' . esc_url( $canonical ) . '">' . "\n";
        echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'yfg_custom_page_meta', 5 );

/**
 * Inject JSON-LD Service & FAQPage Schema in wp_head.
 */
function yfg_custom_page_schemas() {
    $schema = null;
    $faqs = array();

    if ( is_page_template( 'page-seo-services.php' ) ) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'serviceType' => 'SEO Services',
            'name' => 'Professional & Affordable SEO Services',
            'provider' => array(
                '@type' => 'Organization',
                'name' => 'Your Firm Growth',
                'alternateName' => 'YFG',
                'url' => 'https://yourfirmgrowth.com'
            ),
            'areaServed' => array( 'United Kingdom', 'United States', 'Germany', 'Europe', 'Worldwide' ),
            'description' => 'SEO services including technical SEO, on-page optimization, content, link building, and local & international SEO.',
            'url' => 'https://yourfirmgrowth.com/seo-services'
        );
        $faqs = array(
            array( 'What are SEO services?', 'SEO services are the technical, on-page, content, and off-page work that improves a website\'s visibility in search engines like Google, driving more organic traffic, leads, and sales over time.' ),
            array( 'How much do SEO services cost?', 'Cost depends on competition, scope, and goals. YFG offers affordable, scalable SEO services so businesses of any size can start at a level that fits their budget and grow from there.' ),
            array( 'How long does SEO take to work?', 'Most websites see meaningful improvement within three to six months, with results compounding the longer the strategy runs. Technical fixes can show impact sooner; content and authority build momentum over time.' ),
            array( 'What\'s the difference between professional and affordable SEO services?', 'Professional SEO services cover the full strategy, technical, content, and authority, while affordable SEO services focus on the highest-impact actions first. With Your Firm Growth, you can start to lean and expand as results come in.' ),
            array( 'Do you offer local and international SEO?', 'Yes. We optimize for local map-pack visibility as well as multi-region and international SEO for businesses expanding across borders.' ),
            array( 'Are your SEO services safe (white-hat)?', 'Yes. We use only sustainable, white-hat methods that follow Google\'s guidelines and protect your site long-term.' ),
            array( 'Will I be locked into a long contract?', 'No. We earn your business with results, and offer flexible engagements rather than restrictive long-term lock-ins.' )
        );
    } elseif ( is_page_template( 'page-digital-marketing.php' ) ) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'serviceType' => 'Digital Marketing Services',
            'name' => 'Full-Service Digital Marketing Services',
            'provider' => array(
                '@type' => 'Organization',
                'name' => 'Your Firm Growth',
                'alternateName' => 'YFG',
                'url' => 'https://yourfirmgrowth.com'
            ),
            'areaServed' => array( 'United Kingdom', 'United States', 'Germany', 'Europe', 'Worldwide' ),
            'description' => 'Digital marketing services including SEO, paid advertising, content, social media, CRO, and automation for businesses of all sizes.',
            'url' => 'https://yourfirmgrowth.com/digital-marketing-services'
        );
        $faqs = array(
            array( 'What are digital marketing services?', 'Digital marketing services are the strategies and channels, SEO, paid ads, content, social, email, and automation, used to grow a brand\'s online visibility, leads, and sales.' ),
            array( 'How much do digital marketing services cost?', 'Cost depends on your goals and the channels involved. YFG offers scalable packages, so small businesses and larger brands alike invest only in what drives results.' ),
            array( 'Which digital marketing services do I need?', 'It depends on your audience and goals. We start with an audit and recommend the highest-impact mix, often SEO and paid ads first, then content, social, and automation.' ),
            array( 'How are digital marketing services different from a digital marketing agency?', 'Digital marketing services are the specific solutions; a digital marketing agency like Your Firm Growth delivers and manages them together as one strategy, so your channels work in sync.' ),
            array( 'Do you offer digital marketing for small businesses?', 'Yes. We provide digital marketing services for small business focused on fast, measurable wins within your budget.' ),
            array( 'How do you measure success?', 'We track the metrics tied to your business goals, leads, conversions, cost per acquisition, ROAS, and revenue, and report on them transparently every month.' )
        );
    } elseif ( is_page_template( 'page-web-design.php' ) ) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'serviceType' => 'Web Design and Development Services',
            'name' => 'Custom Web Design and Development Services',
            'provider' => array(
                '@type' => 'Organization',
                'name' => 'Your Firm Growth',
                'alternateName' => 'YFG',
                'url' => 'https://yourfirmgrowth.com'
            ),
            'areaServed' => array( 'United Kingdom', 'United States', 'Germany', 'Europe', 'Worldwide' ),
            'description' => 'Web design and development services including custom design, responsive development, eCommerce, web apps, and CMS builds.',
            'url' => 'https://yourfirmgrowth.com/web-design-development-services'
        );
        $faqs = array(
            array( 'What are web design and development services?', 'Web design and development services cover both the visual design of a website and the technical build, turning a concept into a fast, functional, conversion-ready site.' ),
            array( 'How much do web design and development services cost?', 'Cost depends on size and complexity. YFG offers everything from affordable launch sites to fully custom builds, with a clear, itemized quote before any work begins.' ),
            array( 'How long does it take to build a website?', 'A typical small-business site takes a few weeks; larger custom or eCommerce builds take longer. We agree a clear timeline during discovery so you know what to expect.' ),
            array( 'Do you build custom websites?', 'Yes. Your Firm Growth provides custom web design and development services tailored to your brand, plus CMS options your team can manage easily.' ),
            array( 'Will my website be SEO-friendly?', 'Every site we build is fast, mobile-first, and SEO-ready, with clean code, structured data, and conversion best practices built in from the start.' ),
            array( 'Do you offer support after launch?', 'Yes. We provide ongoing care, hosting, security, and optimization so your website stays fast, safe, and effective long after it goes live.' )
        );
    } elseif ( is_page_template( 'page-remote-teams.php' ) ) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'serviceType' => 'Dedicated Remote Teams',
            'name' => 'Hire a Dedicated Remote Team',
            'provider' => array(
                '@type' => 'Organization',
                'name' => 'Your Firm Growth',
                'alternateName' => 'YFG',
                'url' => 'https://yourfirmgrowth.com'
            ),
            'areaServed' => array( 'United Kingdom', 'United States', 'Germany', 'Europe', 'Worldwide' ),
            'description' => 'Dedicated remote teams of designers, developers, marketers, and strategists aligned to your office hours.',
            'url' => 'https://yourfirmgrowth.com/dedicated-remote-teams'
        );
        $faqs = array(
            array( 'What is a dedicated remote team?', 'A dedicated remote team is a group of specialists you hire to work exclusively on your projects from a remote location, integrated into your tools and processes like in-house staff.' ),
            array( 'Can I hire your team to work in my time zone?', 'Yes. When you hire Your Firm Growth, your dedicated remote team aligns to your office hours, so collaboration happens in real time.' ),
            array( 'How do I hire a dedicated remote team?', 'Tell YFG your goals, the skills you need, and your hours. We dedicate the right specialists from our team to your account, integrate them into your workflow, and you can scale up or down anytime.' ),
            array( 'Is hiring your remote team cheaper than hiring in-house?', 'In most cases, yes, hiring YFG avoids recruitment, payroll, overhead, and idle capacity. You pay only for the team and hours you actually need.' )
        );
    }

    if ( $schema ) {
        echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
        if ( ! empty( $faqs ) ) {
            $faq_schema = array(
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => array()
            );
            foreach ( $faqs as $faq ) {
                $faq_schema['mainEntity'][] = array(
                    '@type' => 'Question',
                    'name' => $faq[0],
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => $faq[1]
                    )
                );
            }
            echo '<script type="application/ld+json">' . wp_json_encode( $faq_schema ) . '</script>' . "\n";
        }
    }
}
add_action( 'wp_head', 'yfg_custom_page_schemas', 20 );
