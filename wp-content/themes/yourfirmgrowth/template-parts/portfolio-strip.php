<?php
/**
 * Reusable portfolio strip — service pages par portfolio ke selected items
 * dikhane ke liye. Portfolio page ke card/shot styles main.css mein hain.
 *
 * Usage:
 * get_template_part( 'template-parts/portfolio-strip', null, array(
 *     'title'      => 'Section title',
 *     'sub'        => 'Subtitle',
 *     'type'       => 'cards' | 'web',   // cards = result screenshots, web = full-page website shots
 *     'items'      => array( array( 'img' => URL, 'tag' => '', 'title' => '', 'desc' => '' ), ... ),
 *     'more_url'   => 'https://.../portfolio/#organic',
 *     'more_label' => 'See More Portfolio',
 * ) );
 *
 * @package YourFirmGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args = wp_parse_args(
	isset( $args ) ? $args : array(),
	array(
		'title'      => '',
		'sub'        => '',
		'type'       => 'cards',
		'items'      => array(),
		'more_url'   => home_url( '/portfolio/' ),
		'more_label' => __( 'See More Portfolio', 'yourfirmgrowth' ),
	)
);

if ( empty( $args['items'] ) ) {
	return;
}
?>
<section class="yfg-pfs">
	<div class="container">
		<div class="text-center mb-5">
			<span class="yfg-accent"></span>
			<h2 class="yfg-section-title"><?php echo esc_html( $args['title'] ); ?></h2>
			<?php if ( $args['sub'] ) : ?>
				<p class="text-muted mx-auto mt-2" style="max-width:680px;"><?php echo esc_html( $args['sub'] ); ?></p>
			<?php endif; ?>
		</div>

		<div class="row g-4 justify-content-center">
			<?php foreach ( $args['items'] as $yfg_pfs_item ) : $yfg_pfs_img = esc_url( $yfg_pfs_item['img'] ); ?>

				<?php if ( 'web' === $args['type'] ) : ?>
					<div class="col-md-6 col-lg-4">
						<div class="yfg-web-shot" data-yfg-lightbox="<?php echo $yfg_pfs_img; ?>">
							<img src="<?php echo $yfg_pfs_img; ?>" loading="lazy" alt="<?php echo esc_attr( isset( $yfg_pfs_item['title'] ) ? $yfg_pfs_item['title'] : $args['title'] ); ?> — website designed and developed by Your Firm Growth">
						</div>
					</div>
				<?php else : ?>
					<div class="col-md-6 col-lg-4">
						<div class="yfg-pf-card">
							<div class="yfg-pf-card__media" data-yfg-lightbox="<?php echo $yfg_pfs_img; ?>">
								<img src="<?php echo $yfg_pfs_img; ?>" loading="lazy" alt="<?php echo esc_attr( $yfg_pfs_item['title'] ); ?> - project result">
							</div>
							<div class="yfg-pf-card__body">
								<?php if ( ! empty( $yfg_pfs_item['tag'] ) ) : ?>
									<span class="yfg-pf-tag"><?php echo esc_html( $yfg_pfs_item['tag'] ); ?></span>
								<?php endif; ?>
								<h3 class="yfg-pf-card__title"><?php echo esc_html( $yfg_pfs_item['title'] ); ?></h3>
								<?php if ( ! empty( $yfg_pfs_item['desc'] ) ) : ?>
									<p class="yfg-pf-card__desc"><?php echo esc_html( $yfg_pfs_item['desc'] ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

			<?php endforeach; ?>
		</div>

		<div class="text-center mt-5">
			<a href="<?php echo esc_url( $args['more_url'] ); ?>" class="btn btn-brand btn-lg"><?php echo esc_html( $args['more_label'] ); ?> &rarr;</a>
		</div>
	</div>
</section>

<?php
// Lightbox markup + JS — sirf ek dafa print ho, chahe strip kitni bhi baar use ho.
global $yfg_pfs_lightbox_printed;
if ( empty( $yfg_pfs_lightbox_printed ) ) :
	$yfg_pfs_lightbox_printed = true;
	?>
	<div class="yfg-lightbox" id="yfgLightbox" aria-hidden="true">
		<span class="yfg-lightbox__close" aria-label="Close">&times;</span>
		<img src="" alt="Portfolio screenshot enlarged">
	</div>
	<script>
	( function () {
		var lb = document.getElementById( 'yfgLightbox' );
		if ( ! lb ) { return; }
		var img = lb.querySelector( 'img' );

		document.addEventListener( 'click', function ( e ) {
			var el = e.target.closest( '[data-yfg-lightbox]' );
			if ( ! el ) { return; }
			img.src = el.getAttribute( 'data-yfg-lightbox' );
			lb.classList.add( 'is-open' );
			document.body.style.overflow = 'hidden';
		} );

		function closeLb() {
			lb.classList.remove( 'is-open' );
			img.src = '';
			document.body.style.overflow = '';
		}
		lb.addEventListener( 'click', function ( e ) { if ( e.target !== img ) { closeLb(); } } );
		document.addEventListener( 'keydown', function ( e ) { if ( 'Escape' === e.key ) { closeLb(); } } );
	} )();
	</script>
<?php endif; ?>
