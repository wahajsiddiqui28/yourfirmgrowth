<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom table banata hai reviews store karne ke liye.
 */
function crw_create_table() {
	global $wpdb;
	$table_name      = $wpdb->prefix . CRW_TABLE;
	$charset_collate = $wpdb->get_charset_collate();

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$sql = "CREATE TABLE $table_name (
		id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		name VARCHAR(191) NOT NULL,
		rating TINYINT(1) NOT NULL DEFAULT 5,
		review_text LONGTEXT NOT NULL,
		source VARCHAR(20) NOT NULL DEFAULT 'custom',
		profile_img VARCHAR(500) DEFAULT '',
		review_date VARCHAR(100) DEFAULT '',
		verified TINYINT(1) NOT NULL DEFAULT 1,
		sort_order INT NOT NULL DEFAULT 0,
		created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (id)
	) $charset_collate;";

	dbDelta( $sql );
}

/**
 * Trustindex/Google reviews ka default set (yourfirmgrowth.com Trustindex profile se).
 * Newest first. Isko update karo aur crw_sync_reviews() ka version bump karo.
 *
 * @return array[]
 */
function crw_reviews_data() {
	return array(
		array( 'name' => 'Wahaj Siddiqui', 'rating' => 5, 'source' => 'trustindex', 'review_date' => 'today',
			'review_text' => 'Outstanding Website Development & SEO Services. They built a modern, fast, and user-friendly website exactly as I envisioned. Communication was always clear, and they were quick to implement any changes or suggestions I had.' ),
		array( 'name' => 'Catherine Curtis', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '1 day ago',
			'review_text' => 'Reliable Staff Augmentation Partner. We were looking for a reliable staff augmentation partner, and YFG exceeded our expectations. They understood our requirements and quickly connected us with experienced professionals.' ),
		array( 'name' => 'Ali Mujtaba', 'rating' => 5, 'source' => 'google', 'review_date' => '2 days ago',
			'review_text' => 'Yourfirmgrowth hat mir geholfen, meine Website und die Sichtbarkeit bei Google zu verbessern. Sehr professionell, gerne wieder.' ),
		array( 'name' => 'pflege de', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '2 days ago',
			'review_text' => 'Professionelle Unterstützung bei unseren Pflegeinhalten. Vor einigen Monaten haben wir begonnen, mit Your Firm Growth zusammenzuarbeiten, um unsere Inhalte rund um das Thema Pflege zu verbessern. Das Team unterstützt uns bei der Erstellung gut strukturierter und verständlicher Fachartikel, die sowohl für unsere Leser als auch für Suchmaschinen sinnvoll aufgebaut sind. Besonders positiv finde ich die zuverlässige Kommunikation und die Bereitschaft, auf Feedback einzugehen. Änderungswünsche werden schnell umgesetzt, und die Zusammenarbeit verläuft professionell und unkompliziert. Wir sind mit den bisherigen Ergebnissen zufrieden und freuen uns auf die weitere Zusammenarbeit.' ),
		array( 'name' => 'Louis Roberts', 'rating' => 4, 'source' => 'trustindex', 'review_date' => '2 days ago',
			'review_text' => 'Social Media Campaigns. I started working with Your Firm Growth to improve my social media presence, and I\'m genuinely happy with the experience. They took the time to understand my business and created content that actually reflects my brand. I\'ve noticed better engagement, more inquiries, and a much more consistent online presence since they started managing my campaigns. The team is easy to communicate with, responsive, and always willing to make adjustments based on my feedback. It\'s great to work with a company that cares about results and keeps you informed every step of the way. I would definitely recommend Your Firm Growth to any business looking for professional social media marketing services.' ),
		array( 'name' => 'Jackson Steve', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '2 days ago',
			'review_text' => 'Reliable SEO bietet zuverlässige. Reliable SEO bietet zuverlässige, dedizierte Remote-Experten an ... Sehr zu empfehlen für alle, die nach erschwinglichen Dienstleistungen für ihr Unternehmen suchen ...' ),
		array( 'name' => 'Louis Roberts', 'rating' => 4, 'source' => 'google', 'review_date' => '2 days ago',
			'review_text' => 'Contraté a Your Firm Growth para gestionar mis campañas de redes sociales y PPC, y estoy muy satisfecho con su trabajo. Se tomaron el tiempo para comprender mi negocio, desarrollaron una estrategia adaptada a mis objetivos y me mantuvieron informado durante todo el proceso. He notado una mayor interacción en mis redes sociales, un mejor rendimiento de mis campañas publicitarias y un aumento constante en la generación de clientes potenciales de calidad. El equipo es profesional, atento y realmente se preocupa por ofrecer resultados. Es muy gratificante trabajar con una empresa que cumple lo que promete, y sin duda recomendaría Your Firm Growth a cualquier persona que busque servicios confiables de marketing digital.' ),
		array( 'name' => 'Al Amin', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '2 days ago',
			'review_text' => 'Exceptional social media strategy and support. We\'ve been working with Your Firm Growth to manage our social media marketing, and the experience has been excellent. The team is creative, responsive, and always comes up with fresh ideas that align with our brand. They\'ve helped us improve our social media presence, increase engagement, and maintain a consistent posting schedule. What I appreciate most is how easy they are to work with. They listen to feedback, communicate clearly, and genuinely care about delivering quality results.' ),
		array( 'name' => 'Sales Comp', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '4 days ago',
			'review_text' => 'Good Service. About 7 months ago we hired Your Firm Growth to provide us a complete SEO services. The ranking process did not happen overnight but month after month there was a gradual improvement. We are now seeing more organic traffic and enquiries coming through our website. They submit reports every month and explain all the data, not just the numbers. It seems like they are concerned about the long term outcomes.' ),
		array( 'name' => 'Janice disouza', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '4 days ago',
			'review_text' => 'Impressive Social Media Work. So far so good, our Facebook and Instagram pages finally look like what they should on a professional site. It\'s a matter of time to see results but things are going in the right direction. I would recommend.' ),
		array( 'name' => 'Edward Lawson', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '4 days ago',
			'review_text' => 'Exceptional Social Media Services. YFG handles all our social media and they do a great job. They are always on time, true to the brand and really care about getting things done. Not going anywhere else.' ),
		array( 'name' => 'Premium Impact Windows And Doors', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '4 days ago',
			'review_text' => 'Local SEO in Florida. My Impact windows service was not very well known in my area and not many people were calling to enquire about it. YFG fixed some stuff with my local SEO and my rankings got better. I am receiving more calls and texts now. I\'m glad it worked out.' ),
		array( 'name' => 'Hassan Abid', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '4 days ago',
			'review_text' => 'Wordpress Development. I use WordPress for my website but it wasn\'t getting much traffic and was ranking poorly in search. Thanks to the YFG SEO team that quickly found the problems and optimized my website and made it perform better. I\'m getting better rankings and more visitors now. So happy!' ),
		array( 'name' => 'Leon Müller', 'rating' => 5, 'source' => 'google', 'review_date' => '1 week ago',
			'review_text' => 'Ich habe die SEO-Beratung für meine Website genutzt. Danke für die hilfreichen Hinweise, danach wusste ich besser wo ich mit den Verbesserungen anfangen soll.' ),
		array( 'name' => 'Jane Harriet', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '2 weeks ago',
			'review_text' => 'Hired for Website Revamp. I hired Your Firm Growth to revamp my website, and the experience was excellent from start to finish. The team was professional, easy to work with, and delivered a modern, user-friendly website that exceeded my expectations. They were responsive to feedback and completed the project on time. I\'m really happy with the final result and would definitely recommend them to anyone looking for a reliable web design team.' ),
		array( 'name' => 'Jane Aragon', 'rating' => 5, 'source' => 'trustindex', 'review_date' => '2 weeks ago',
			'review_text' => 'Fantastic services they provide to me. Fantastic services they provide to me and give proper monthly SEO reports for my personal business website. They produce organic visitors through different SEO strategies. Highly recommended team.' ),
		array( 'name' => 'Jim Gerald', 'rating' => 5, 'source' => 'google', 'review_date' => '4 weeks ago',
			'review_text' => 'We had an excellent experience working with Your Firm Growth for our website design and development project. From the very beginning, their team took the time to understand our organization\'s goals and requirements, transforming our vision into a modern, professional, and user-friendly website. The website is visually appealing, fast, mobile-responsive, and easy to navigate, providing a great experience for our visitors. Throughout the project, the team was highly responsive, attentive to detail, and quick to implement feedback and requested changes. Since launching the new website, we have received positive feedback from our audience and supporters, and we are extremely pleased with the final outcome. We highly recommend Your Firm Growth to anyone seeking reliable, high-quality web design and development services. Their professionalism, expertise, and commitment to client satisfaction truly set them apart.' ),
		array( 'name' => 'Savage', 'rating' => 5, 'source' => 'google', 'review_date' => '1 month ago',
			'review_text' => 'I\'ve hired YFG for my personal projects, and they aligned a fully dedicated specialist for my personal projects where he aligned as per my office hours. Highly recommended with their efforts of that specialist and their team. Thanks for the support.' ),
	);
}

/**
 * Reviews ko default set se sync karta hai — version-gated (sirf ek dafa jab version badle).
 * Version bump karte hi maujooda reviews ko naye 18 se replace kar deta hai.
 * init pe chalta hai, isliye deactivate/reactivate ki zaroorat nahi.
 */
function crw_sync_reviews() {
	$seed_ver = '3'; // Isko badlo to reviews dobara refresh hongi.

	if ( get_option( 'crw_seed_ver' ) === $seed_ver ) {
		return; // Pehle se latest set laga hua hai.
	}

	// Version PEHLE set karo — taake ek hi request mein dobara na chale (no duplicates).
	update_option( 'crw_seed_ver', $seed_ver );

	global $wpdb;
	$table_name = $wpdb->prefix . CRW_TABLE;

	crw_create_table(); // Ensure table exists (dbDelta idempotent hai).

	// Table ko poori tarah clear karke naye 18 reviews daalo.
	$wpdb->query( "TRUNCATE TABLE $table_name" ); // phpcs:ignore WordPress.DB

	$order = 0;
	foreach ( crw_reviews_data() as $r ) {
		$order++;
		$wpdb->insert(
			$table_name,
			array(
				'name'        => $r['name'],
				'rating'      => $r['rating'],
				'review_text' => $r['review_text'],
				'source'      => $r['source'],
				'profile_img' => '',
				'review_date' => $r['review_date'],
				'verified'    => 1,
				'sort_order'  => $order,
			)
		);
	}
}
add_action( 'init', 'crw_sync_reviews' );
