<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_shortcode( 'firm_reviews', 'crw_render_shortcode' );

function crw_render_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'source'    => 'all',   // all | google | trustindex | custom
			'limit'     => 20,
			'layout'    => 'slider', // slider | grid
			'more_url'  => 'https://public.trustindex.io/reviews/yourfirmgrowth.com',
			'more_text' => 'See all reviews',
		),
		$atts,
		'firm_reviews'
	);

	wp_enqueue_style( 'crw-style' );
	wp_enqueue_script( 'crw-script' );

	global $wpdb;
	$table_name = $wpdb->prefix . CRW_TABLE;

	if ( 'all' === $atts['source'] ) {
		$reviews = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name ORDER BY sort_order ASC, id DESC LIMIT %d", intval( $atts['limit'] ) ) );
	} else {
		$reviews = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE source = %s ORDER BY sort_order ASC, id DESC LIMIT %d", sanitize_text_field( $atts['source'] ), intval( $atts['limit'] ) ) );
	}

	if ( empty( $reviews ) ) {
		return '<p>Abhi koi review available nahi hai.</p>';
	}

	$is_grid = ( 'grid' === $atts['layout'] );

	// Overall summary + per-source stats (for the tabs).
	$avg       = 0;
	$total     = count( $reviews );
	$by_source = array();
	foreach ( $reviews as $r ) {
		$avg += intval( $r->rating );
		$s   = $r->source;
		if ( ! isset( $by_source[ $s ] ) ) {
			$by_source[ $s ] = array( 'count' => 0, 'sum' => 0 );
		}
		$by_source[ $s ]['count']++;
		$by_source[ $s ]['sum'] += intval( $r->rating );
	}
	$avg = $total ? round( $avg / $total, 1 ) : 0;

	// Stats the JS uses to update the header rating/count per tab.
	$stats = array( 'all' => array( 'count' => $total, 'avg' => $avg ) );
	foreach ( $by_source as $s => $d ) {
		$stats[ $s ] = array( 'count' => $d['count'], 'avg' => $d['count'] ? round( $d['sum'] / $d['count'], 1 ) : 0 );
	}

	$show_tabs  = ( 'all' === $atts['source'] && count( $by_source ) > 1 );
	$src_labels = array( 'google' => 'Google', 'trustindex' => 'Trustindex', 'custom' => 'Custom' );

	$widget_id = 'crw-widget-' . uniqid();

	ob_start();
	?>
	<div class="crw-widget<?php echo $is_grid ? ' crw-widget--grid' : ''; ?>" id="<?php echo esc_attr( $widget_id ); ?>" data-layout="<?php echo $is_grid ? 'grid' : 'slider'; ?>" data-stats="<?php echo esc_attr( wp_json_encode( $stats ) ); ?>">

		<?php if ( $show_tabs ) : ?>
			<div class="crw-tabs" role="tablist">
				<button class="crw-tab is-active" type="button" data-tab="all">All <span class="crw-tab-count"><?php echo (int) $total; ?></span></button>
				<?php foreach ( array( 'google', 'trustindex', 'custom' ) as $s ) : ?>
					<?php if ( isset( $by_source[ $s ] ) ) : ?>
						<button class="crw-tab" type="button" data-tab="<?php echo esc_attr( $s ); ?>"><?php if ( 'custom' !== $s ) : ?><img src="<?php echo esc_url( CRW_URL . 'assets/icons/' . $s . '.svg' ); ?>" alt=""><?php endif; ?><?php echo esc_html( $src_labels[ $s ] ); ?> <span class="crw-tab-count"><?php echo (int) $by_source[ $s ]['count']; ?></span></button>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="crw-header">
			<span class="crw-header-rating"><?php echo esc_html( $avg ); ?></span>
			<span class="crw-header-stars"><?php echo crw_render_stars( round( $avg ), 'google' ); ?></span>
			<span class="crw-header-count"><?php echo esc_html( $total ); ?> reviews</span>
		</div>

		<?php if ( $is_grid ) : ?>

			<div class="crw-grid">
				<?php foreach ( $reviews as $r ) { echo crw_render_card( $r ); } ?>
			</div>

		<?php else : ?>

			<div class="crw-container">
				<button class="crw-arrow crw-prev" aria-label="Previous review">&#10094;</button>
				<div class="crw-track-wrapper">
					<div class="crw-track">
						<?php foreach ( $reviews as $r ) { echo crw_render_card( $r ); } ?>
					</div>
				</div>
				<button class="crw-arrow crw-next" aria-label="Next review">&#10095;</button>
			</div>

			<div class="crw-dots"></div>

		<?php endif; ?>

		<?php if ( ! empty( $atts['more_url'] ) ) : ?>
			<div class="crw-more-wrap">
				<a class="crw-more-btn" href="<?php echo esc_url( $atts['more_url'] ); ?>" target="_blank" rel="noopener nofollow">
					<span><?php echo esc_html( $atts['more_text'] ); ?></span>
					<svg class="crw-more-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</a>
			</div>
		<?php endif; ?>
	</div>

	<div class="crw-lightbox-overlay crw-hidden">
		<div class="crw-lightbox-box">
			<button class="crw-lightbox-close" aria-label="Close">&times;</button>
			<div class="crw-lightbox-content"></div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * Ek single review card ka markup return karta hai (slider + grid dono use karte hain).
 */
function crw_render_card( $r ) {
	$full_text     = esc_html( $r->review_text );
	$is_long       = mb_strlen( $r->review_text ) > 130;
	$verified_icon = 'google' === $r->source ? CRW_URL . 'assets/icons/verified-blue.svg' : CRW_URL . 'assets/icons/verified-black.svg';

	ob_start();
	?>
	<div class="crw-card source-<?php echo esc_attr( $r->source ); ?>">
		<div class="crw-card-inner">
			<span class="crw-platform-icon"><?php echo crw_platform_icon( $r->source ); ?></span>

			<div class="crw-card-header">
				<div class="crw-avatar-wrap">
					<?php if ( ! empty( $r->profile_img ) ) : ?>
						<img class="crw-avatar" src="<?php echo esc_url( $r->profile_img ); ?>" alt="<?php echo esc_attr( $r->name ); ?>">
					<?php else : ?>
						<span class="crw-avatar crw-avatar-letter"><?php echo esc_html( mb_substr( $r->name, 0, 1 ) ); ?></span>
					<?php endif; ?>
				</div>
				<div class="crw-name-block">
					<div class="crw-name"><?php echo esc_html( $r->name ); ?></div>
					<div class="crw-date"><?php echo esc_html( $r->review_date ); ?></div>
				</div>
			</div>

			<div class="crw-stars-row">
				<?php echo crw_render_stars( intval( $r->rating ), $r->source ); ?>
				<?php if ( $r->verified ) : ?>
					<span class="crw-verified" title="Verified <?php echo esc_attr( ucfirst( $r->source ) ); ?> review"><img src="<?php echo esc_url( $verified_icon ); ?>" alt="Verified"></span>
				<?php endif; ?>
			</div>

			<div class="crw-text">
				<p><?php echo $full_text; ?></p>
			</div>

			<?php if ( $is_long ) : ?>
				<div class="crw-read-more">
					<span class="crw-read-more-btn">Read more</span>
				</div>
			<?php endif; ?>

			<!-- hidden full data for the lightbox -->
			<script type="application/json" class="crw-full-data"><?php echo wp_json_encode( array(
				'name'     => $r->name,
				'date'     => $r->review_date,
				'rating'   => intval( $r->rating ),
				'text'     => $r->review_text,
				'source'   => $r->source,
				'verified' => (bool) $r->verified,
				'img'      => $r->profile_img,
			) ); ?></script>
		</div>
	</div>
	<?php
	return ob_get_clean();
}

function crw_render_stars( $rating, $source = 'trustindex' ) {
	$set   = ( 'google' === $source ) ? 'google' : 'ti';
	$full  = CRW_URL . 'assets/icons/star-' . $set . '-full.svg';
	$empty = CRW_URL . 'assets/icons/star-' . $set . '-empty.svg';
	$out   = '';
	for ( $i = 1; $i <= 5; $i++ ) {
		$src  = $i <= (int) $rating ? $full : $empty;
		$out .= '<img class="crw-star-img" src="' . esc_url( $src ) . '" alt="star">';
	}
	return $out;
}

function crw_platform_icon( $source ) {
	switch ( $source ) {
		case 'google':
			return '<img src="' . esc_url( CRW_URL . 'assets/icons/google.svg' ) . '" alt="Google">';
		case 'trustindex':
			return '<img src="' . esc_url( CRW_URL . 'assets/icons/trustindex.svg' ) . '" alt="Trustindex">';
		default:
			return '<img src="' . esc_url( CRW_URL . 'assets/icons/trustindex.svg' ) . '" alt="Review">';
	}
}
