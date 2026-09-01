<?php
/**
 * Case Studies — custom post type, content data and helpers.
 *
 * Each case study is a real `case_study` post (own URL, SEO, translatable),
 * but the rich, structured content lives in yfg_case_studies() below so the
 * design stays consistent and the copy is used verbatim. The single/archive
 * templates read from here. Posts are auto-created (once) to provide the URLs.
 *
 * @package YourFirmGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Case Study post type.
 */
function yfg_cs_register_cpt() {
	register_post_type(
		'case_study',
		array(
			'labels'       => array(
				'name'          => __( 'Case Studies', 'yourfirmgrowth' ),
				'singular_name' => __( 'Case Study', 'yourfirmgrowth' ),
				'add_new_item'  => __( 'Add New Case Study', 'yourfirmgrowth' ),
				'edit_item'     => __( 'Edit Case Study', 'yourfirmgrowth' ),
				'menu_name'     => __( 'Case Studies', 'yourfirmgrowth' ),
			),
			'public'       => true,
			'has_archive'  => 'case-studies',
			'menu_icon'    => 'dashicons-chart-line',
			'menu_position'=> 22,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'show_in_rest' => true,
			'rewrite'      => array(
				'slug'       => 'case-studies',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'yfg_cs_register_cpt', 5 );

/**
 * All case studies, keyed by slug. Copy is verbatim from the client.
 *
 * media[].file → looked up in assets/images/case-studies/{slug}/{file};
 * if the file isn't there yet, a labelled placeholder is shown instead.
 *
 * @return array[]
 */
function yfg_case_studies() {
	return array(

		'apartment-locator-houston' => array(
			'title'    => 'Apartment Locator Service in Houston, TX',
			'category' => 'Local SEO & Multi-Location GBP Strategy',
			'location' => 'Houston, TX',
			'icon'     => 'bi-geo-alt',
			'summary'  => 'A local SEO and multi-location GBP strategy that grew qualified apartment-search traffic and built visibility across four service areas.',
			'stats'    => array(
				array( 'value' => '+71%',           'label' => 'Organic clicks' ),
				array( 'value' => '5.49K → 9.36K',  'label' => 'Clicks growth' ),
				array( 'value' => '4',              'label' => 'GBP service areas' ),
			),
			'overview_title' => 'Client Background',
			'overview'       => array(
				'This client runs an apartment locator service connecting renters with properties that fit their budget, lifestyle, and preferred neighborhood. While they had a working website, they were losing ground to major rental platforms on the search terms that matter most. Ranking consistently for high-intent apartment queries across multiple markets was a real challenge, and local lead generation was not where it needed to be.',
				'We were brought in to close that gap — boosting qualified organic traffic, locking in local visibility across several service areas, and building an SEO foundation strong enough to compete with the bigger players.',
			),
			'approach_title' => 'The Game Plan',
			'approach_intro' => 'We approached this as a local SEO and content problem. The site needed sharper targeting, a stronger local footprint, and cleaner technical health. Here is how we tackled each area.',
			'approach'       => array(
				array( 'icon' => 'bi-geo-alt', 'title' => 'Multi-Location Profile Setup', 'desc' => 'We created and fully optimized Google Business Profile service area pages for four targeted locations. Each profile was built with relevant services, accurate categories, localized descriptions, and a consistent update schedule to improve visibility in both Google Maps and local search packs.' ),
				array( 'icon' => 'bi-pin-map', 'title' => 'City & Neighborhood Landing Pages', 'desc' => 'We built dedicated location pages for renters searching in specific cities and neighborhoods. Each page was written with unique content covering the local rental market, nearby amenities, lifestyle context, and available apartment options — giving both users and search engines something genuinely worth ranking.' ),
				array( 'icon' => 'bi-search', 'title' => 'Renter Search Intent Targeting', 'desc' => 'We mapped how renters actually search and optimized key pages around those patterns — covering apartments, luxury rentals, pet-friendly options, move-in specials, and neighborhood-specific searches. The focus was on pulling in users with real leasing intent, not just window shoppers.' ),
				array( 'icon' => 'bi-collection', 'title' => 'Local Content Hub', 'desc' => 'To support the main location pages, we built out locally focused content including neighborhood guides, moving resources, apartment hunting tips, and rental market updates. This extended topical authority while picking up long-tail traffic that the core pages could not capture on their own.' ),
				array( 'icon' => 'bi-tools', 'title' => 'Site Health & Technical Fixes', 'desc' => 'We worked through crawlability and indexing issues that were quietly holding rankings back, improved internal linking between listings and location pages, rewrote metadata across priority pages, and cleaned up overall site performance.' ),
				array( 'icon' => 'bi-patch-check', 'title' => 'Citation & Authority Building', 'desc' => 'We managed local citations, kept business profile data accurate and consistent, and monitored local performance across all four service areas. This steadily built trust signals that strengthened the site\'s visibility in both Search and Maps results.' ),
			),
			'results_title' => 'Numbers That Moved',
			'results_intro' => 'Campaign results:',
			'results'       => array(
				'Organic Clicks: Grew from 5.49K to 9.36K (+71%)',
				'Qualified Traffic: Significantly higher share of apartment-related search visitors.',
				'Local Footprint: GBP visibility established and active across four service areas.',
				'Local Discovery: Stronger exposure in both Google Search and Maps for apartment locator terms.',
				'Outcome: A local SEO foundation that brings in more renters actively searching for apartments across multiple markets.',
			),
			'keywords_title' => 'Keywords Driving Traffic',
			'keywords_intro' => 'High-intent rental search terms we ranked for throughout this campaign:',
			'keywords'       => array(
				'apartment locator',
				'studio apts in houston',
				'no credit check apartments houston',
				'no credit check apartments houston tx',
				'apt locator',
				'apartment complex in houston',
				'apartment locator near me',
				'apts in houston no credit check',
				'apartments near shopping houston',
			),
			'media_title' => 'Before & After',
			'media'       => array(
				array( 'label' => 'Before', 'file' => 'before.png' ),
				array( 'label' => 'After',  'file' => 'after.png' ),
			),
		),

		'carpet-flooring-dubai' => array(
			'title'    => 'Carpet & Flooring Company in Dubai, UAE',
			'category' => 'Flooring & Home Improvement',
			'location' => 'Dubai, UAE',
			'icon'     => 'bi-grid-1x2',
			'summary'  => 'A content-first, topical-authority strategy that won high-value flooring searches and grew qualified organic leads in one of Dubai\'s most competitive markets.',
			'stats'    => array(
				array( 'value' => '+150%',       'label' => 'Organic clicks' ),
				array( 'value' => '41 → 24',     'label' => 'Average position' ),
				array( 'value' => '1.2% → 2.3%', 'label' => 'Average CTR' ),
			),
			'overview_title' => 'Project Overview',
			'overview'       => array(
				'This client is a Dubai-based supplier of carpets, flooring, blinds, curtains, and upholstery. They had a solid product range but were not ranking for the commercial keywords that matter most in their space. The brief was to build real search visibility, own high-value flooring searches, and bring in more qualified organic leads.',
				'Rather than spreading thin across hundreds of terms, we concentrated on building deep topical authority around the products their customers search for most and let the rankings follow.',
			),
			'approach_title' => 'Our Approach',
			'approach_intro' => 'We took a content-first approach built around topical depth rather than volume. Each action was designed to reinforce the site\'s authority in one of Dubai\'s most competitive home improvement categories.',
			'approach'       => array(
				array( 'icon' => 'bi-diagram-3', 'title' => 'Topic Cluster Content Strategy', 'desc' => 'We mapped out tightly focused content clusters, producing 10+ detailed articles around each core keyword rather than scattering posts across unrelated topics. By stacking depth and relevance in one area at a time, we built the kind of topical authority that pushed several competitive terms into the Top 3.' ),
				array( 'icon' => 'bi-calendar-week', 'title' => 'Daily Content Publishing', 'desc' => 'We kept a steady daily publishing rhythm with SEO-driven content covering both commercial and informational searches, steadily growing the site\'s keyword footprint without sacrificing quality or relevance.' ),
				array( 'icon' => 'bi-file-earmark-text', 'title' => 'Commercial Landing Page Optimization', 'desc' => 'Product and service pages got a full refresh with tighter metadata, stronger headings, improved internal links, and content rewritten to move browsers toward enquiries.' ),
				array( 'icon' => 'bi-tools', 'title' => 'Technical SEO Improvements', 'desc' => 'Crawl and indexing issues were fixed, Core Web Vitals brought up to standard, page load times reduced, and structured data added so search engines could properly interpret the site.' ),
				array( 'icon' => 'bi-link-45deg', 'title' => 'Internal Linking Strategy', 'desc' => 'We built a logical internal linking framework connecting blog content to the relevant product and service pages, channeling authority to the pages that needed it most.' ),
				array( 'icon' => 'bi-geo-alt', 'title' => 'Local SEO Optimization', 'desc' => 'Service pages were optimized for Dubai-specific search intent, giving the business a competitive edge in a crowded local market and pulling in customers who were already close to making a decision.' ),
			),
			'results_title' => 'Key Stats & Results',
			'results_intro' => 'Results achieved in 3 months:',
			'results'       => array(
				'Organic Clicks: Increased from 759 to 1.9K (+150%)',
				'Organic Impressions: Increased from 63.2K to 82.6K (+31%)',
				'Average CTR: Improved from 1.2% to 2.3%',
				'Average Position: Improved from 41 to 24',
				'Keyword Rankings: Multiple competitive keywords reached Page 1, with several moving into the Top 3 through topical authority building.',
				'Outcome: The client emerged as a more visible organic competitor in Dubai\'s flooring market, with significantly more qualified traffic and stronger coverage across high-value commercial searches.',
			),
			'keywords_title' => 'Target Keywords',
			'keywords_intro' => 'High-intent commercial keywords targeted across this campaign:',
			'keywords'       => array(
				'office carpet',
				'wall to wall carpets dubai',
				'carpet tiles dubai',
				'office carpet tiles',
				'carpet installation dubai',
				'carpet shops in dubai',
				'exhibition carpet dubai',
				'vinyl flooring dubai',
				'vinyl flooring suppliers in dubai',
				'LVT flooring dubai',
				'WPC flooring',
				'sofa upholstery dubai',
				'kitchen renovation dubai',
				'PVC folding door dubai',
				'motorized blinds dubai',
			),
			'media_title' => 'Search Performance Highlights',
			'media'       => array(
				array( 'label' => 'Before', 'file' => 'before.png' ),
				array( 'label' => 'After',  'file' => 'after.png' ),
			),
		),

		'exterior-cleaning-sacramento' => array(
			'title'    => 'Exterior Cleaning Company in Sacramento, CA',
			'category' => 'Local SEO & Google Business Profile Optimization',
			'location' => 'Sacramento, CA',
			'icon'     => 'bi-droplet',
			'summary'  => 'A structured local SEO and GBP program that turned a dormant profile into a dependable source of calls, visits and new business.',
			'stats'    => array(
				array( 'value' => '274',   'label' => 'Calls from GBP' ),
				array( 'value' => '682',   'label' => 'Website visits' ),
				array( 'value' => 'Top 3', 'label' => 'Google Maps rankings' ),
			),
			'overview_title' => 'Project Overview',
			'overview'       => array(
				'An exterior cleaning company in Sacramento came to us wanting better local visibility and a steadier flow of inbound leads.',
				'The business had good word-of-mouth but was barely showing up in Google Maps or local search. Their Google Business Profile was sitting idle and not driving the calls or visits the business needed to grow.',
				'Our goal was simple: get them ranking locally, bring in the right customers, and make their Google Business Profile a reliable lead source.',
			),
			'approach_title' => 'Our Approach',
			'approach_intro' => 'We built a local SEO plan around the areas where this business had the most to gain. The focus was on Google visibility, profile strength, and making sure the right customers could find them at the right time.',
			'approach'       => array(
				array( 'icon' => 'bi-google', 'title' => 'Google Business Profile Optimization', 'desc' => 'We did a full overhaul of the Google Business Profile to sharpen its relevance and get it ranking higher in local results. This covered NAP standardization, service area refinement, keyword-focused descriptions, location-based images, helpful FAQs, and optimizing around the search phrases customers actually use when looking for exterior cleaning services.' ),
				array( 'icon' => 'bi-list-check', 'title' => 'Local Citation Building', 'desc' => 'We built and cleaned up listings across 50+ reputable directories to strengthen the business\'s local authority online. Keeping NAP data consistent across all platforms sent stronger trust signals to Google and backed up the local SEO work.' ),
				array( 'icon' => 'bi-arrow-repeat', 'title' => 'Ongoing Profile Management', 'desc' => 'An active profile consistently outperforms a dormant one, so we made ongoing management a core part of the work. We posted regularly on Google covering finished jobs, seasonal offers, and useful tips. Reviews were monitored and responded to, and happy customers were nudged to share their experience online. This steady activity drove more engagement and gave new prospects the social proof they needed to reach out.' ),
				array( 'icon' => 'bi-key', 'title' => 'Local Keyword Optimization', 'desc' => 'We researched the terms local customers actually use, then worked them into the website and the Google Business Profile in a way that reads naturally. Optimization covered service pages, meta titles and descriptions, headings, GBP content, Q&As, and supporting site pages. This made sure the business showed up when local customers searched for exterior cleaning services across the Sacramento area.' ),
				array( 'icon' => 'bi-graph-up', 'title' => 'Performance Monitoring', 'desc' => 'We tracked performance throughout using GBP Insights and other reporting tools to stay on top of what was working. Regular reviews let us spot gaps, fine-tune the strategy, and keep pushing results in the right direction.' ),
			),
			'results_title' => 'Key Stats & Results',
			'results_intro' => 'Results achieved over 3 months:',
			'results'       => array(
				'Phone Calls: 274 calls generated directly from Google Business Profile.',
				'Website Visits: 682 visits from local Google searches.',
				'Google Maps Rankings: Reached Top 3 positions for multiple high-value local keywords.',
				'GBP Impressions: 47% increase in Google Business Profile impressions.',
				'Organic Traffic: 35% growth in organic website traffic.',
				'Outcome: A structured local SEO approach combined with consistent GBP management turned their online presence into a real, dependable source of new business.',
			),
			'keywords_title' => 'Target Keywords',
			'keywords_intro' => 'Here are the 15 top commercial intent keywords targeted for the client\'s website:',
			'keywords'       => array(
				'roof cleaning sacramento',
				'gutter cleaning sacramento',
				'solar panel cleaning sacramento',
				'chimney cleaning sacramento',
				'window cleaning sacramento',
				'dryer vent cleaning sacramento',
				'pressure washing sacramento',
				'gutter cleaning elk grove ca',
				'roof cleaning roseville',
				'chimney sweep roseville ca',
				'air duct cleaning roseville ca',
				'junk removal roseville ca',
				'driveway cleaning services near me',
				'rain gutter repair sacramento',
				'commercial solar cleaning',
			),
			'keywords_note' => 'These were chosen for their strong buying intent and their ability to drive visibility across Sacramento, Elk Grove, and Roseville.',
			'media_title'   => 'Search Performance Highlights',
			'media'         => array(
				array( 'label' => 'Calls from Google Business Profile', 'file' => 'calls.png' ),
				array( 'label' => 'Business Profile interactions',      'file' => 'interactions.png' ),
				array( 'label' => 'Website clicks from Business Profile','file' => 'clicks.png' ),
				array( 'label' => 'Searches breakdown',                 'file' => 'searches.png' ),
			),
		),

		'flower-shop-las-vegas' => array(
			'title'    => 'Flower Shop in Las Vegas, NV',
			'category' => 'Local SEO & Google Business Profile Optimization',
			'location' => 'Las Vegas, NV',
			'icon'     => 'bi-flower1',
			'summary'  => 'A targeted local SEO and GBP program that grew online orders, calls and walk-ins for high-intent flower-delivery searches across the city.',
			'stats'    => array(
				array( 'value' => '6.91K', 'label' => 'Organic clicks' ),
				array( 'value' => '692K',  'label' => 'Organic impressions' ),
				array( 'value' => '634',   'label' => 'Calls from GBP' ),
			),
			'overview_title' => 'Project Overview',
			'overview'       => array(
				'A flower shop in Las Vegas came to us looking to grow online orders and bring in more walk-in customers. Their website had technical issues, thin content, and a Google Business Profile that was not doing much. They were invisible for high-intent local searches like "Las Vegas flower delivery" and "sympathy flowers near me" — the exact terms their customers were typing.',
				'Our goal was to get them ranking for their core services, drive more calls and store visits, and build stronger visibility for flower deliveries to hotels, hospitals, and events across the city.',
			),
			'approach_title' => 'What We Did',
			'approach_intro' => 'We put together a targeted local SEO plan covering the website, on-page content, technical health, and the Google Business Profile. Every piece was aimed at the same outcome: more local customers finding and contacting the shop.',
			'approach'       => array(
				array( 'icon' => 'bi-flag', 'title' => 'Keyword-Focused Landing Pages', 'desc' => 'We built dedicated service pages for the highest-value offerings including flower arrangements, sympathy flowers, and hotel flower delivery in Las Vegas. Each page was structured around the specific searches local customers use before placing an order.' ),
				array( 'icon' => 'bi-file-earmark-text', 'title' => 'On-Page Content & SEO', 'desc' => 'Every key page was filled with useful, locally relevant content matched to real search intent. We rewrote copy that had been thin or generic and replaced it with content that actually answered what potential customers were looking for.' ),
				array( 'icon' => 'bi-tools', 'title' => 'Technical SEO Fixes', 'desc' => 'We improved site speed, repaired broken links, rewrote meta titles and descriptions, and fixed mobile responsiveness. The site needed a clean technical base before rankings could move in the right direction.' ),
				array( 'icon' => 'bi-google', 'title' => 'Local SEO & Google Business Profile', 'desc' => 'The Google Business Profile was fully optimized with high-converting local keywords, regular photo posts, and promotional updates. We also built consistent citations across business directories to reinforce the shop\'s authority in local search and Google Maps results.' ),
			),
			'results_title' => 'Key Stats & Results',
			'results_intro' => 'Results within a few months:',
			'results'       => array(
				'Organic Clicks: 6.91K',
				'Organic Impressions: 692K',
				'Search Trend: Consistent growth in impressions and clicks following sustained SEO work.',
				'GBP Interactions: 4,321 business interactions in just 5 months.',
				'Direct Calls: 634 calls made directly from the Google Business Profile.',
				'Profile Growth: Steady month-on-month increases in profile visits and customer actions.',
				'Outcome: More calls, local visits, and flower delivery orders — exactly what the client came for.',
			),
			'media_title' => 'Search Performance Highlights',
			'media'       => array(
				array( 'label' => 'Organic Search (GSC)',                 'file' => 'organic-search.png' ),
				array( 'label' => 'Google Business Profile — interactions','file' => 'gbp-interactions.png' ),
				array( 'label' => 'Google Business Profile — website clicks','file' => 'gbp-clicks.png' ),
				array( 'label' => 'Google Business Profile — calls',       'file' => 'gbp-calls.png' ),
				array( 'label' => 'Sales',                                 'file' => 'sales.png' ),
			),
		),

		'functional-mushroom-supplement-brand' => array(
			'title'    => 'Functional Mushroom Supplement Brand',
			'category' => 'eCommerce SEO & Content Marketing',
			'location' => 'eCommerce Brand',
			'icon'     => 'bi-capsule',
			'summary'  => 'A revenue-first, full-funnel eCommerce SEO strategy that turned organic search into a measurable sales channel — 521 purchases and $29,991 in organic revenue.',
			'stats'    => array(
				array( 'value' => '34.7K',   'label' => 'Organic clicks' ),
				array( 'value' => '521',     'label' => 'Organic purchases' ),
				array( 'value' => '$29,991', 'label' => 'Organic revenue' ),
			),
			'overview_title' => 'The Challenge',
			'overview'       => array(
				'This client is a functional mushroom supplement brand with strong product identity but underperforming organic search. Commercial-intent keywords were not ranking, product pages were not pulling in buyers, and the bulk of organic sessions were coming from people browsing rather than purchasing.',
				'The job was to close that gap: build a search presence that attracts purchase-ready traffic and turns organic visits into actual revenue.',
			),
			'approach_title' => 'Our Approach',
			'approach_intro' => 'We built a structured, revenue-first SEO strategy targeting the full funnel from discovery to checkout. Every tactic was chosen with one outcome in mind: organic purchases.',
			'approach'       => array(
				array( 'icon' => 'bi-bag-check', 'title' => 'Product & Collection Page Optimization', 'desc' => 'Every product and collection page was optimized around high-intent commercial keywords designed to bring in shoppers who were already close to buying, not just exploring.' ),
				array( 'icon' => 'bi-code-square', 'title' => 'On-Page SEO & Schema', 'desc' => 'We rewrote meta titles and descriptions, tightened internal linking, and added schema markup across key pages to improve how search engines read and rank the site.' ),
				array( 'icon' => 'bi-tools', 'title' => 'Technical SEO Fixes', 'desc' => 'Crawlability, indexation, and page performance issues were identified and resolved across priority URLs so the site was in the best possible shape for ranking.' ),
				array( 'icon' => 'bi-journal-text', 'title' => 'Content Marketing & EEAT', 'desc' => 'We published expert-led content pieces addressing real customer questions, building topical authority and strengthening EEAT signals while driving users deeper into the buying journey.' ),
				array( 'icon' => 'bi-link-45deg', 'title' => 'Link Building', 'desc' => 'Targeted outreach secured niche-relevant, high-authority backlinks supporting the most competitive commercial keywords and lifting overall domain trust.' ),
				array( 'icon' => 'bi-signpost-split', 'title' => 'Conversion Path Alignment', 'desc' => 'We mapped SEO content directly to user purchase behavior, reducing friction between organic search and checkout and lifting the revenue contribution of organic traffic.' ),
			),
			'results_title' => 'Campaign Results',
			'results_intro' => 'Key outcomes delivered:',
			'results'       => array(
				'Organic Clicks: 34.7K',
				'Organic Impressions: 890K',
				'Organic Users: 31,195',
				'Organic Purchases: 521 purchases generating $29,991 in revenue.',
				'Search Visibility: Significant growth in commercial keyword rankings across target product categories.',
				'Outcome: SEO became a consistent, measurable revenue channel with organic traffic directly driving purchases.',
			),
			'keywords_title' => 'Keywords We Ranked For',
			'keywords_intro' => 'High-intent commercial keywords that drove traffic and sales throughout this campaign:',
			'keywords'       => array(
				'mushroom gummies for sex',
				'mushroom gummies for kids',
				'mushroom mints',
				'mush gummies',
				'mushroom sex gummies',
				'free mushroom gummies',
				'sex mushroom gummies',
			),
			'media_title' => 'Performance Snapshots',
			'media'       => array(
				array( 'label' => 'Before', 'file' => 'before.png' ),
				array( 'label' => 'After',  'file' => 'after.png' ),
				array( 'label' => 'Sales',  'file' => 'sales.png' ),
			),
		),

		'organic-baby-food-brand' => array(
			'title'    => 'Organic Baby Food Brand',
			'category' => 'eCommerce SEO & Content Marketing',
			'location' => 'eCommerce Brand',
			'icon'     => 'bi-basket',
			'summary'  => 'A full-funnel SEO campaign that captured high-intent, non-branded traffic and made organic search a real revenue driver — +400% traffic and 1,000% ROI growth in 8 months.',
			'stats'    => array(
				array( 'value' => '+400%',  'label' => 'Organic traffic growth' ),
				array( 'value' => '1,000%', 'label' => 'ROI growth' ),
				array( 'value' => '1.56M',  'label' => 'Organic impressions' ),
			),
			'overview_title' => 'Project Overview',
			'overview'       => array(
				'This client is an organic baby food brand with a strong product line but poor organic search visibility. When they came to us, the site was almost entirely reliant on branded traffic. Category and product pages were underperforming, technical issues were cutting into crawl efficiency, and a large volume of non-branded purchase intent was going completely untapped.',
				'The goal was to make SEO a real revenue driver by capturing high-intent, non-branded traffic and positioning the brand as a trusted voice in the organic baby food space. The focus was never just rankings — it was traffic that converts into purchases.',
			),
			'approach_title' => 'Our Approach',
			'approach_intro' => 'We ran a full-funnel SEO campaign built around visibility, commercial intent, and long-term scalability. Every decision tied back to one outcome: more organic purchases.',
			'approach'       => array(
				array( 'icon' => 'bi-tools', 'title' => 'Technical SEO Foundation', 'desc' => 'We resolved crawl and indexing issues, cleaned up stale metadata, improved site speed, and tightened mobile performance so search engines could efficiently reach and rank the most important commercial pages.' ),
				array( 'icon' => 'bi-bag-check', 'title' => 'Category & Product Page Optimization', 'desc' => 'We conducted deep keyword research targeting non-branded, high-conversion terms and rebuilt category and product pages around actual search intent. Meta titles, descriptions, content depth, and on-page signals were all realigned to match what purchase-ready shoppers were looking for.' ),
				array( 'icon' => 'bi-link-45deg', 'title' => 'Authority-Driven Link Building', 'desc' => 'To strengthen domain trust, we built a solid backlink profile through niche-relevant, high-authority placements. A mix of earned links and strategic guest posts resulted in 200+ quality backlinks from relevant blogs, directories, and editorial sources.' ),
				array( 'icon' => 'bi-journal-text', 'title' => 'Content Marketing & Topical Authority', 'desc' => 'We published SEO-optimized blog content addressing real parenting questions around nutrition, safety, and organic food benefits. This pulled the brand into earlier stages of the buyer journey and built credibility with a health-conscious audience at the same time.' ),
			),
			'results_title' => 'Key Stats & Results',
			'results_intro' => 'Results achieved in 8 months:',
			'results'       => array(
				'Organic Clicks: 22.9K',
				'Organic Impressions: 1.56M',
				'Organic Traffic Growth: +400%',
				'CTR: Increased to 1.5%',
				'Keyword Rankings: Multiple non-branded, high-intent keywords reached Top 10 positions.',
				'Revenue Impact: 1,000% ROI growth driven by organic traffic.',
				'Technical Performance: Improved crawl efficiency with all critical SEO errors eliminated.',
			),
			'keywords_title' => 'Target Keywords',
			'keywords_intro' => 'High-value, non-branded keywords targeted throughout this campaign:',
			'keywords'       => array(
				'protein for babies', 'protein for baby', 'protein food for baby', 'high protein baby food',
				'best protein for babies', 'protein rich food for babies', 'baby food subscription',
				'protein food for babies', 'baby food delivery', 'best protein for baby',
				'protein foods for babies', 'allergens for babies', 'baby allergens', 'collagen for babies',
				'baby food subscription box',
			),
			'media_title' => 'Search Performance Highlights',
			'media'       => array(
				array( 'label' => 'Before', 'file' => 'before-after.png' ),
				// array( 'label' => 'After',  'file' => 'after.png' ),
				array( 'label' => 'Sales',  'file' => 'sales.png' ),
			),
		),

		'residential-cleaning-los-angeles' => array(
			'title'    => 'Residential Cleaning Company in Los Angeles, CA',
			'category' => 'Residential Cleaning Services',
			'location' => 'Los Angeles, CA',
			'icon'     => 'bi-brush',
			'summary'  => 'A local SEO and Google Business Profile rebuild that turned local search into a steady driver of calls, quote requests and bookings across LA County.',
			'stats'    => array(
				array( 'value' => '+89.5%', 'label' => 'Organic users' ),
				array( 'value' => '10.7K',  'label' => 'Organic clicks' ),
				array( 'value' => '4.29M',  'label' => 'Organic impressions' ),
			),
			'overview_title' => 'Project Overview',
			'overview'       => array(
				'This client runs a residential cleaning business serving homeowners, Airbnb hosts, and property managers across Los Angeles County. Despite a solid range of services, they were barely showing up in local search. Inconsistent business listings and a dormant Google Business Profile were making it hard to compete for the customers who were actively looking to book.',
				'We set out to fix their local foundation, build genuine search visibility, and turn their GBP into a consistent driver of calls and booking requests.',
			),
			'approach_title' => 'Our Approach',
			'approach_intro' => 'Every task was tied to one goal: put this business in front of the right people at the right moment. Here is how we approached it.',
			'approach'       => array(
				array( 'icon' => 'bi-google', 'title' => 'Google Business Profile Optimization', 'desc' => 'We rebuilt the GBP from the ground up with accurate business info, the right service categories, keyword-rich descriptions, and a regular posting schedule to keep it active. Weekly posts covering cleaning tips, seasonal deals, Airbnb turnover services, and company updates kept the profile visible and drove ongoing local engagement.' ),
				array( 'icon' => 'bi-list-check', 'title' => 'Citation Cleanup & NAP Consistency', 'desc' => 'We audited and corrected 50+ local citations to make sure the business name, address, and phone number matched perfectly across every major directory. Consistent NAP data strengthens local trust signals and directly supports Maps rankings.' ),
				array( 'icon' => 'bi-pin-map', 'title' => 'Service & Location Pages', 'desc' => 'We built SEO-optimized landing pages for key cities and neighborhoods across LA County, giving the business a foothold in hyper-local searches. Existing service pages were also tightened around high-intent keywords for house cleaning, deep cleaning, move-in/out, Airbnb prep, and post-construction cleaning.' ),
				array( 'icon' => 'bi-code-square', 'title' => 'Schema Markup', 'desc' => 'We implemented LocalBusiness, Service, and FAQ schema to help search engines better understand the site structure and open the door to richer search result appearances.' ),
				array( 'icon' => 'bi-link-45deg', 'title' => 'Internal Linking & Site Structure', 'desc' => 'We improved internal links between service pages, location pages, and blog content to build topical authority and make the site easier for search engines to crawl and index.' ),
				array( 'icon' => 'bi-graph-up', 'title' => 'Performance Monitoring', 'desc' => 'Throughout the campaign we tracked GBP Insights, Search Console, and GA4 data closely, watching rankings, traffic patterns, calls, and booking activity to keep the strategy on course.' ),
			),
			'results_title' => 'Key Stats & Results',
			'results_intro' => 'Campaign Results:',
			'results'       => array(
				'Organic Clicks: 10.7K',
				'Organic Impressions: 4.29M',
				'Organic Users: Grew from 484 to 917 (+89.5%)',
				'New Organic Users: Grew from 482 to 911 (+89%)',
				'Returning Organic Users: Grew from 53 to 108 (+103.8%)',
				'Local Visibility: Expanded significantly across Los Angeles County for high-intent residential cleaning searches.',
				'Outcome: Stronger organic presence led to more calls, quote requests, and bookings through improved local search visibility.',
			),
			'keywords_title' => 'Target Keywords',
			'keywords_intro' => 'High-intent local search terms we targeted throughout this campaign:',
			'keywords'       => array(
				'maid service Los Angeles', 'move out cleaning services', 'deep cleaning services',
				'bathroom cleaning services', 'Airbnb cleaning service Los Angeles', 'move in move out cleaning services',
				'post construction cleaning Los Angeles', 'fridge cleaning service', 'deep cleaning services Los Angeles',
				'vacation rental cleaners', 'house deep cleaning service', 'refrigerator cleaning service',
				'Airbnb cleaning services near me', 'move out cleaning service Los Angeles', 'bathroom deep cleaning services',
			),
			'media_title' => 'Search Performance Highlights',
			'media'       => array(
				array( 'label' => 'Organic Search (GA4)', 'file' => 'performance.png' ),
			),
		),

		'roofing-palm-beach-county' => array(
			'title'    => 'Roofing Company in Palm Beach County, FL',
			'category' => 'Roofing & Impact Windows',
			'location' => 'Palm Beach County, FL',
			'icon'     => 'bi-hammer',
			'summary'  => 'A content-led local SEO strategy that built real organic visibility for a roofing contractor across Palm Beach County — organic clicks up 287% in just 3 months.',
			'stats'    => array(
				array( 'value' => '+287%',        'label' => 'Organic clicks' ),
				array( 'value' => '7.9K → 18.6K', 'label' => 'Impressions' ),
				array( 'value' => '44.2 → 28.7',  'label' => 'Average position' ),
			),
			'overview_title' => 'Project Overview',
			'overview'       => array(
				'This client is a licensed roofing contractor based in South Florida, offering residential roofing, impact windows, and storm protection services across Palm Beach County. Despite solid field experience and a strong local reputation, their website was not showing up when nearby homeowners searched for these services online.',
				'Our focus was on building real organic visibility for their core services. We put together a content strategy that addressed the actual questions homeowners ask, highlighted the contractor\'s expertise, and brought in more targeted leads through search rather than just chasing rankings.',
			),
			'approach_title' => 'What We Did',
			'approach_intro' => 'We took a focused approach to grow this contractor\'s online presence from the ground up. Every step was tied directly to attracting the right local homeowners and turning their searches into real inquiries.',
			'approach'       => array(
				array( 'icon' => 'bi-file-earmark-text', 'title' => 'Expanded Core Service Pages', 'desc' => 'We built out individual service pages covering roof replacement, roof repair, impact windows, and related exterior work. Each page was written around how homeowners actually search before calling a contractor, making the content both useful and search-friendly.' ),
				array( 'icon' => 'bi-pin-map', 'title' => 'Built Location-Focused Landing Pages', 'desc' => 'Rather than a single catch-all service area page, we created separate location pages for multiple cities across Palm Beach County. Each page carried its own unique content so the site could rank at the city level without running into duplicate content issues.' ),
				array( 'icon' => 'bi-cloud-rain', 'title' => 'Created Hurricane-Focused Content', 'desc' => 'Hurricane season is a major concern for South Florida homeowners, so we published helpful content around storm-ready roofing, impact windows, insurance considerations, and maintenance tips. This built topical authority while pulling in users who were still in the research phase of their buying journey.' ),
				array( 'icon' => 'bi-search', 'title' => 'Optimized for Homeowner Search Intent', 'desc' => 'We reshaped the site\'s content to match how real homeowners search, whether they\'re dealing with storm damage, looking to cut insurance costs with impact windows, or figuring out which roofing material suits their home. The result was better search relevance and more visitors taking action.' ),
				array( 'icon' => 'bi-shield-check', 'title' => 'Strengthened Local Trust Signals', 'desc' => 'We made sure the site clearly featured license details, project history, warranties, financing options, and customer reviews in the right places. These trust signals give homeowners the confidence they need before picking up the phone.' ),
				array( 'icon' => 'bi-diagram-3', 'title' => 'Improved Website Structure', 'desc' => 'We cleaned up the internal linking structure, connecting service pages, location pages, financing info, and educational content in a logical way. This made the site easier to navigate for visitors and gave search engines a clearer picture of what the business covers.' ),
			),
			'results_title' => 'Key Stats & Results',
			'results_intro' => 'Results achieved in 3 months (August 2025 – October 2025):',
			'results'       => array(
				'Organic Clicks: Increased from 71 to 275 (+287%)',
				'Organic Impressions: Increased from 7.9K to 18.6K (+135%)',
				'Average CTR: Improved from 0.9% to 1.5%',
				'Average Position: Improved from 44.2 to 28.7',
				'Local Visibility: Grew across Palm Beach County through targeted service and city-specific landing pages.',
				'Qualified Traffic: More relevant traffic from homeowners actively looking for roofing, impact windows, and storm protection solutions.',
				'Outcome: The client built a solid organic foothold across South Florida, drawing in more qualified local traffic and laying the groundwork for continued SEO growth.',
			),
			'keywords_title' => 'Search Performance Highlights',
			'keywords_intro' => '',
			'keywords'       => array(
				'commercial waterproofing contractors in west palm beach',
				'roofers in palm beach county',
				'roof repair west palm beach',
				'roofing contractor schall circle',
				'roof installer san castle',
			),
			'media_title' => 'Before & After',
			'media'       => array(
				array( 'label' => 'Before', 'file' => 'before.png' ),
				array( 'label' => 'After',  'file' => 'after.png' ),
			),
		),

		'rural-internet-usa' => array(
			'title'    => 'Rural Internet Service Provider in the USA',
			'category' => 'Programmatic SEO & Lead Generation',
			'location' => 'United States',
			'icon'     => 'bi-wifi',
			'summary'  => 'A programmatic, scale-built SEO plan that took a rural ISP from low visibility to a lead-generating asset — +320% organic traffic and 200+ first-page rankings.',
			'stats'    => array(
				array( 'value' => '+320%', 'label' => 'Organic traffic growth' ),
				array( 'value' => '5.11K', 'label' => 'Organic clicks' ),
				array( 'value' => '200+',  'label' => 'First-page rankings' ),
			),
			'overview_title' => 'The Situation',
			'overview'       => array(
				'A rural internet service provider in the USA came to us wanting to expand their reach across underserved regions and convert more organic visitors into leads. Their site had low search visibility, no real local targeting, and landing pages that were not set up to generate enquiries. The opportunity was there — they just were not showing up for the searches that mattered.',
				'Three things needed fixing: the technical foundation was weak, the content was not targeting the right terms, and there was no hyper-local strategy to compete at the state and city level. We were brought in to solve all three.',
			),
			'approach_title' => 'How We Did It',
			'approach_intro' => 'We designed a layered SEO plan built for scale — combining technical work, strategic content, programmatic landing pages, and authority building. Here is how each piece came together.',
			'approach'       => array(
				array( 'icon' => 'bi-hdd-network', 'title' => 'Website & Technical Foundations', 'desc' => 'We started by resolving site speed issues and crawl errors that were holding back indexation, then restructured the website\'s architecture to improve both user experience and how search engines moved through the site.' ),
				array( 'icon' => 'bi-key', 'title' => 'Keyword Research & On-Page Work', 'desc' => 'We identified mid-competition, high-intent keywords with real lead potential and applied them across priority pages — rewriting metadata, tightening headings, and aligning on-page content with what prospective customers were actively searching for.' ),
				array( 'icon' => 'bi-journal-text', 'title' => 'Content Development', 'desc' => 'We published targeted blog content addressing the real challenges rural internet users face, positioning the brand as a helpful resource. We also created conversion-focused landing pages around high-intent terms like "Free Trial Internet" to capture users at the point of decision.' ),
				array( 'icon' => 'bi-diagram-3', 'title' => 'Programmatic SEO at Scale', 'desc' => 'We built individual landing pages for every U.S. state and their inner regions, giving the site a foothold in hyper-local searches it had never competed for. Structured data was added throughout to improve local search visibility and support rich result appearances.' ),
				array( 'icon' => 'bi-link-45deg', 'title' => 'Link Building', 'desc' => 'We acquired 180+ high-quality backlinks through targeted guest posting and outreach, focusing on niche-relevant and geo-targeted domains that directly supported the keywords and regions we were trying to rank for.' ),
				array( 'icon' => 'bi-graph-up', 'title' => 'Tracking & Ongoing Optimization', 'desc' => 'Rankings, traffic, and lead performance were monitored continuously through Google Analytics and Search Console. Monthly reviews fed directly into strategy adjustments, keeping the campaign moving in the right direction throughout.' ),
			),
			'results_title' => 'Results That Mattered',
			'results_intro' => 'Delivered within 8 months:',
			'results'       => array(
				'Organic Clicks: 5.11K',
				'Organic Impressions: 781K',
				'Traffic Growth: 320% increase in organic traffic.',
				'Lead Volume: 60% growth in qualified leads through geo-targeted landing pages.',
				'Keyword Rankings: 200+ first-page rankings including state and city-specific terms.',
				'Backlinks Built: 180+ high-quality, niche-relevant links acquired.',
				'Landing Page Conversions: 35% uplift through hyper-localized targeting.',
				'Outcome: The site went from low visibility to a lead-generating asset reaching underserved communities across multiple U.S. regions.',
			),
			'media_title' => 'Performance Snapshots',
			'media'       => array(
				array( 'label' => 'Performance snapshot', 'file' => 'before-after' ),
				// array( 'label' => 'Sales',                'file' => 'sales.png' ),
			),
		),

		'tire-wholesale-usa' => array(
			'title'    => 'Tire Wholesale Company in the USA',
			'category' => 'SEO Recovery & Organic Growth',
			'location' => 'United States',
			'icon'     => 'bi-truck',
			'summary'  => 'A malware-hit, deindexed tire wholesaler recovered and rebuilt from the ground up — from invisible to a consistent lead-generating asset, with over 300% organic traffic growth in 6 months.',
			'stats'    => array(
				array( 'value' => '+300%', 'label' => 'Organic traffic growth' ),
				array( 'value' => '19.9K', 'label' => 'Organic clicks' ),
				array( 'value' => '+45%',  'label' => 'Dealer registrations' ),
			),
			'overview_title' => 'Project Overview',
			'overview'       => array(
				'A tire wholesale company in the USA came to us in a difficult position. Their website had been hit by a malware attack that triggered deindexing, wiping out whatever organic visibility they had built. On top of that, they were dealing with poor technical performance, stagnant dealer registrations, and no real SEO foundation to speak of.',
				'The brief had three clear parts: clean up and recover the site, build a proper SEO strategy from the ground up, and start generating the kind of traffic that would bring in new dealer partnerships.',
			),
			'approach_title' => 'Our Approach',
			'approach_intro' => 'We put together a multi-layered recovery and growth plan that tackled the immediate security crisis first, then built on it with a full organic SEO strategy. Here is how it came together.',
			'approach'       => array(
				array( 'icon' => 'bi-shield-check', 'title' => 'Site Recovery & Security Cleanup', 'desc' => 'We started by deindexing all malicious URLs using 410 Gone status codes, ran a thorough security audit to close the vulnerabilities that allowed the attack, and resubmitted the cleaned site to Google for reindexing. Getting the site back in good standing with search engines was the first priority before anything else could be done.' ),
				array( 'icon' => 'bi-key', 'title' => 'Keyword Research & On-Page Optimization', 'desc' => 'Once the site was healthy, we identified high-value keywords targeting wholesale and dealership search intent. Meta tags, headings, and on-page content were optimized across the site, and internal linking was restructured to improve crawlability and topical relevance.' ),
				array( 'icon' => 'bi-journal-text', 'title' => 'Content Strategy', 'desc' => 'We published targeted blog posts covering dealer concerns and industry topics, and created dedicated landing pages built around dealer registration and the benefits of partnering with the brand. The goal was to attract the right visitors and give them a clear reason to act.' ),
				array( 'icon' => 'bi-link-45deg', 'title' => 'Backlink Building', 'desc' => 'We secured high-authority backlinks through guest posts on niche-relevant websites and built out citations and local business listings to reinforce regional SEO signals. This helped lift domain authority and gave competitive keywords the off-page support they needed.' ),
				array( 'icon' => 'bi-tools', 'title' => 'Technical SEO Improvements', 'desc' => 'Images were compressed, caching was enabled, and broken links were resolved. Structured data was added across key pages to improve how the site appeared in search results and give search engines cleaner signals to work with.' ),
				array( 'icon' => 'bi-graph-up', 'title' => 'Monitoring & Reporting', 'desc' => 'We tracked performance continuously through Google Search Console and delivered detailed monthly reports covering traffic, keyword movement, and conversion activity — keeping the strategy aligned with what the data was showing.' ),
			),
			'results_title' => 'Key Stats & Results',
			'results_intro' => 'Results delivered within 6 months:',
			'results'       => array(
				'Organic Clicks: 19.9K',
				'Organic Impressions: 595K',
				'Average CTR: 3.3%',
				'Average Position: Improved to 21.3',
				'Organic Traffic Growth: Increased by over 300%',
				'Dealer Registrations: Grew by 45%',
				'Backlink Profile: 150+ high-quality backlinks acquired from authoritative domains.',
				'Outcome: The site went from deindexed and invisible to a consistent lead-generating asset driving dealer inquiries and measurable business growth.',
			),
			'media_title' => 'Search Performance Highlights',
			'media'       => array(
				array( 'label' => 'Search performance (GSC)', 'file' => 'performance.png' ),
			),
		),

	);
}

/**
 * Get a single case study's data by slug.
 *
 * @param string $slug Case study slug.
 * @return array|null
 */
function yfg_cs_get( $slug ) {
	$all = yfg_case_studies();
	return isset( $all[ $slug ] ) ? $all[ $slug ] : null;
}

/**
 * Resolve a case study image: returns the URL if the file exists, else ''.
 *
 * @param string $slug Case study slug.
 * @param string $file Filename inside assets/images/case-studies/{slug}/.
 * @return string
 */
function yfg_cs_image_url( $slug, $file ) {
	if ( '' === $file ) {
		return '';
	}
	$dir  = '/assets/images/case-studies/' . $slug . '/';
	$base = pathinfo( $file, PATHINFO_FILENAME );

	// Accept whatever format the user actually saved (png / jpg / webp / …).
	foreach ( array( pathinfo( $file, PATHINFO_EXTENSION ), 'png', 'jpg', 'jpeg', 'webp', 'avif', 'gif' ) as $ext ) {
		if ( '' === $ext ) {
			continue;
		}
		$rel = $dir . $base . '.' . $ext;
		if ( file_exists( YFG_DIR . $rel ) ) {
			return YFG_URI . $rel;
		}
	}
	return '';
}

/**
 * Create the case_study posts (once) so each study has a real URL, and flush
 * rewrite rules so /case-studies/ and its singles resolve. Re-runs if the
 * version below is bumped.
 */
function yfg_cs_sync_posts() {
	$version = '4';
	if ( get_option( 'yfg_cs_sync_ver' ) === $version ) {
		return;
	}

	foreach ( yfg_case_studies() as $slug => $cs ) {
		$existing = get_page_by_path( $slug, OBJECT, 'case_study' );
		if ( $existing ) {
			continue;
		}
		wp_insert_post(
			array(
				'post_type'    => 'case_study',
				'post_status'  => 'publish',
				'post_title'   => $cs['title'],
				'post_name'    => $slug,
				'post_excerpt' => isset( $cs['summary'] ) ? $cs['summary'] : '',
				'post_content' => '',
			)
		);
	}

	flush_rewrite_rules( false );
	update_option( 'yfg_cs_sync_ver', $version );
}
add_action( 'init', 'yfg_cs_sync_posts', 20 );
