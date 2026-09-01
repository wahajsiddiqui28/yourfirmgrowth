<?php
/**
 * Case Studies archive (listing).
 *
 * @package YourFirmGrowth
 */

get_header();

$cs_query = new WP_Query(
	array(
		'post_type'      => 'case_study',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);

// Collect data + the distinct categories for the filter.
$cs_items      = array();
$cs_categories = array();
if ( $cs_query->have_posts() ) {
	while ( $cs_query->have_posts() ) {
		$cs_query->the_post();
		$slug = get_post_field( 'post_name', get_the_ID() );
		$data = yfg_cs_get( $slug );
		if ( ! $data ) {
			continue;
		}
		$data['permalink']            = get_permalink();
		$cs_items[]                   = $data;
		$cs_categories[ $data['category'] ] = true;
	}
	wp_reset_postdata();
}
$cs_categories = array_keys( $cs_categories );
?>

<div class="cs-archive">

	<header class="cs-archive__hero">
		<div class="container">
			<span class="cs-archive__eyebrow"><i class="bi bi-graph-up-arrow me-2"></i><?php esc_html_e( 'Case Studies', 'yourfirmgrowth' ); ?></span>
			<h1 class="cs-archive__title"><?php esc_html_e( 'Real Results for Real Businesses', 'yourfirmgrowth' ); ?></h1>
			<p class="cs-archive__sub"><?php esc_html_e( 'A closer look at the strategies we ran and the growth we delivered — in SEO, local search and Google Business Profile — for clients across different industries and markets.', 'yourfirmgrowth' ); ?></p>
		</div>
	</header>

	<div class="container cs-archive__body">

		<?php if ( ! empty( $cs_items ) ) : ?>

			<?php if ( count( $cs_categories ) > 1 ) : ?>
				<nav class="cs-filter" aria-label="<?php esc_attr_e( 'Filter case studies', 'yourfirmgrowth' ); ?>">
					<button class="cs-filter__chip is-active" type="button" data-cs-filter="all"><?php esc_html_e( 'All', 'yourfirmgrowth' ); ?></button>
					<?php foreach ( $cs_categories as $cat ) : ?>
						<button class="cs-filter__chip" type="button" data-cs-filter="<?php echo esc_attr( sanitize_title( $cat ) ); ?>"><?php echo esc_html( $cat ); ?></button>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>

			<div class="cs-grid">
				<?php foreach ( $cs_items as $item ) : ?>
					<article class="cs-card" data-cs-cat="<?php echo esc_attr( sanitize_title( $item['category'] ) ); ?>">
						<a class="cs-card__link" href="<?php echo esc_url( $item['permalink'] ); ?>">
							<div class="cs-card__top">
								<span class="cs-card__badge"><i class="bi <?php echo esc_attr( $item['icon'] ); ?>"></i><?php echo esc_html( $item['category'] ); ?></span>
								<h2 class="cs-card__title"><?php echo esc_html( $item['title'] ); ?></h2>
								<span class="cs-card__location"><i class="bi bi-geo-alt-fill"></i><?php echo esc_html( $item['location'] ); ?></span>
							</div>

							<?php if ( ! empty( $item['stats'] ) ) : ?>
								<div class="cs-card__stats">
									<?php foreach ( array_slice( $item['stats'], 0, 3 ) as $stat ) : ?>
										<div class="cs-card__stat">
											<span class="cs-card__stat-value"><?php echo esc_html( $stat['value'] ); ?></span>
											<span class="cs-card__stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<p class="cs-card__summary"><?php echo esc_html( $item['summary'] ); ?></p>

							<span class="cs-card__more"><?php esc_html_e( 'Read case study', 'yourfirmgrowth' ); ?> <i class="bi bi-arrow-right"></i></span>
						</a>
					</article>
				<?php endforeach; ?>
			</div>

		<?php else : ?>
			<p class="cs-archive__empty"><?php esc_html_e( 'Case studies are on the way — check back soon.', 'yourfirmgrowth' ); ?></p>
		<?php endif; ?>

	</div>

	<section class="cs-cta">
		<div class="container">
			<div class="cs-cta__inner">
				<h2 class="cs-cta__title"><?php esc_html_e( 'Ready to be our next success story?', 'yourfirmgrowth' ); ?></h2>
				<p class="cs-cta__text"><?php esc_html_e( 'Tell us your goals and we\'ll show you exactly how we\'d get you there.', 'yourfirmgrowth' ); ?></p>
				<button type="button" class="btn btn-brand btn-lg" data-bs-toggle="modal" data-bs-target="#yfgLeadModal"><?php esc_html_e( 'Book a Free Growth Strategy Call', 'yourfirmgrowth' ); ?> &rarr;</button>
			</div>
		</div>
	</section>

</div>

<?php if ( count( $cs_categories ) > 1 ) : ?>
<script>
( function () {
	var chips = document.querySelectorAll( '.cs-filter__chip' );
	var cards = document.querySelectorAll( '.cs-card' );
	if ( ! chips.length ) { return; }
	document.querySelector( '.cs-filter' ).addEventListener( 'click', function ( e ) {
		var chip = e.target.closest( '.cs-filter__chip' );
		if ( ! chip ) { return; }
		var filter = chip.getAttribute( 'data-cs-filter' );
		for ( var i = 0; i < chips.length; i++ ) { chips[ i ].classList.remove( 'is-active' ); }
		chip.classList.add( 'is-active' );
		for ( var j = 0; j < cards.length; j++ ) {
			var show = ( 'all' === filter || cards[ j ].getAttribute( 'data-cs-cat' ) === filter );
			cards[ j ].style.display = show ? '' : 'none';
		}
	} );
} )();
</script>
<?php endif; ?>

<?php
get_footer();
