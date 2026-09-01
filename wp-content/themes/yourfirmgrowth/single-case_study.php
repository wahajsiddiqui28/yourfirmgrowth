<?php
/**
 * Single Case Study.
 *
 * @package YourFirmGrowth
 */

get_header();

while ( have_posts() ) :
	the_post();

	$slug = get_post_field( 'post_name', get_the_ID() );
	$cs   = yfg_cs_get( $slug );

	// Fallback for any case study added later from the admin (not in the data file).
	if ( ! $cs ) :
		?>
		<article class="cs-single">
			<header class="cs-hero">
				<div class="container">
					<a class="cs-hero__back" href="<?php echo esc_url( get_post_type_archive_link( 'case_study' ) ); ?>"><i class="bi bi-arrow-left me-2"></i><?php esc_html_e( 'All Case Studies', 'yourfirmgrowth' ); ?></a>
					<h1 class="cs-hero__title"><?php the_title(); ?></h1>
				</div>
			</header>
			<div class="cs-band cs-band--white"><div class="container cs-band__inner"><div class="cs-lead"><?php the_content(); ?></div></div></div>
		</article>
		<?php
		get_footer();
		return;
	endif;

	$archive_url = get_post_type_archive_link( 'case_study' );
	?>

	<article class="cs-single">

		<header class="cs-hero">
			<div class="container cs-hero__inner">
				<a class="cs-hero__back" href="<?php echo esc_url( $archive_url ); ?>"><i class="bi bi-arrow-left me-2"></i><?php esc_html_e( 'All Case Studies', 'yourfirmgrowth' ); ?></a>

				<span class="cs-hero__eyebrow"><i class="bi <?php echo esc_attr( $cs['icon'] ); ?> me-2"></i><?php echo esc_html( $cs['category'] ); ?></span>
				<h1 class="cs-hero__title"><?php echo esc_html( $cs['title'] ); ?></h1>

				<?php if ( ! empty( $cs['summary'] ) ) : ?>
					<p class="cs-hero__summary"><?php echo esc_html( $cs['summary'] ); ?></p>
				<?php endif; ?>

				<p class="cs-hero__location"><i class="bi bi-geo-alt-fill me-2"></i><?php echo esc_html( $cs['location'] ); ?></p>

				<?php if ( ! empty( $cs['stats'] ) ) : ?>
					<div class="cs-hero__stats">
						<?php foreach ( $cs['stats'] as $stat ) : ?>
							<div class="cs-stat">
								<span class="cs-stat__value"><?php echo esc_html( $stat['value'] ); ?></span>
								<span class="cs-stat__label"><?php echo esc_html( $stat['label'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</header>

		<?php if ( ! empty( $cs['overview'] ) ) : ?>
			<section class="cs-band cs-band--white">
				<div class="container cs-band__inner">
					<div class="cs-shead">
						<span class="cs-shead__eyebrow"><?php esc_html_e( 'The Challenge', 'yourfirmgrowth' ); ?></span>
						<h2 class="cs-shead__title"><?php echo esc_html( $cs['overview_title'] ); ?></h2>
					</div>
					<div class="cs-lead">
						<?php foreach ( $cs['overview'] as $para ) : ?>
							<p><?php echo esc_html( $para ); ?></p>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( ! empty( $cs['approach'] ) ) : ?>
			<section class="cs-band cs-band--tint">
				<div class="container cs-band__inner">
					<div class="cs-shead">
						<span class="cs-shead__eyebrow"><?php esc_html_e( 'Our Strategy', 'yourfirmgrowth' ); ?></span>
						<h2 class="cs-shead__title"><?php echo esc_html( $cs['approach_title'] ); ?></h2>
						<?php if ( ! empty( $cs['approach_intro'] ) ) : ?>
							<p class="cs-shead__intro"><?php echo esc_html( $cs['approach_intro'] ); ?></p>
						<?php endif; ?>
					</div>
					<div class="cs-approach__grid">
						<?php foreach ( $cs['approach'] as $i => $step ) : ?>
							<div class="cs-approach__card">
								<span class="cs-approach__num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
								<span class="cs-approach__icon"><i class="bi <?php echo esc_attr( $step['icon'] ); ?>"></i></span>
								<h3 class="cs-approach__title"><?php echo esc_html( $step['title'] ); ?></h3>
								<p class="cs-approach__desc"><?php echo esc_html( $step['desc'] ); ?></p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( ! empty( $cs['results'] ) ) : ?>
			<?php
			// Split narrative wins from the closing "Outcome" line.
			$res_items = array();
			$res_outcome = '';
			foreach ( $cs['results'] as $item ) {
				if ( 0 === stripos( $item, 'Outcome:' ) ) {
					$res_outcome = trim( substr( $item, strlen( 'Outcome:' ) ) );
				} else {
					$res_items[] = $item;
				}
			}
			?>
			<section class="cs-band cs-band--white">
				<div class="container cs-band__inner">
					<div class="cs-shead">
						<span class="cs-shead__eyebrow"><?php esc_html_e( 'The Outcome', 'yourfirmgrowth' ); ?></span>
						<h2 class="cs-shead__title"><?php echo esc_html( $cs['results_title'] ); ?></h2>
						<?php if ( ! empty( $cs['results_intro'] ) ) : ?>
							<p class="cs-shead__intro"><?php echo esc_html( $cs['results_intro'] ); ?></p>
						<?php endif; ?>
					</div>

					<div class="cs-res__grid">
						<?php
						foreach ( $res_items as $item ) :
							$parts = explode( ':', $item, 2 );
							$label = isset( $parts[1] ) ? trim( $parts[0] ) : '';
							$value = isset( $parts[1] ) ? trim( $parts[1] ) : $item;
							?>
							<div class="cs-res__card">
								<i class="bi bi-check-circle-fill cs-res__tick"></i>
								<div>
									<?php if ( '' !== $label ) : ?>
										<span class="cs-res__label"><?php echo esc_html( $label ); ?></span>
									<?php endif; ?>
									<span class="cs-res__value"><?php echo esc_html( $value ); ?></span>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<?php if ( '' !== $res_outcome ) : ?>
						<div class="cs-res__outcome">
							<span class="cs-res__outcome-icon"><i class="bi bi-trophy-fill"></i></span>
							<div>
								<span class="cs-res__outcome-label"><?php esc_html_e( 'Outcome', 'yourfirmgrowth' ); ?></span>
								<p class="cs-res__outcome-text"><?php echo esc_html( $res_outcome ); ?></p>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( ! empty( $cs['keywords'] ) ) : ?>
			<section class="cs-band cs-band--tint">
				<div class="container cs-band__inner">
					<div class="cs-shead">
						<span class="cs-shead__eyebrow"><?php esc_html_e( 'Search Visibility', 'yourfirmgrowth' ); ?></span>
						<h2 class="cs-shead__title"><?php echo esc_html( $cs['keywords_title'] ); ?></h2>
						<?php if ( ! empty( $cs['keywords_intro'] ) ) : ?>
							<p class="cs-shead__intro"><?php echo esc_html( $cs['keywords_intro'] ); ?></p>
						<?php endif; ?>
					</div>
					<div class="cs-kw__panel">
						<div class="cs-kw__wrap">
							<?php foreach ( $cs['keywords'] as $kw ) : ?>
								<span class="cs-kw"><i class="bi bi-search"></i><?php echo esc_html( $kw ); ?></span>
							<?php endforeach; ?>
						</div>
						<?php if ( ! empty( $cs['keywords_note'] ) ) : ?>
							<p class="cs-kw__note"><i class="bi bi-info-circle me-2"></i><?php echo esc_html( $cs['keywords_note'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( ! empty( $cs['media'] ) ) : ?>
			<section class="cs-band cs-band--white">
				<div class="container cs-band__inner">
					<div class="cs-shead">
						<span class="cs-shead__eyebrow"><?php esc_html_e( 'The Proof', 'yourfirmgrowth' ); ?></span>
						<h2 class="cs-shead__title"><?php echo esc_html( $cs['media_title'] ); ?></h2>
					</div>
					<div class="cs-media__grid">
						<?php
						foreach ( $cs['media'] as $m ) :
							$img = yfg_cs_image_url( $slug, isset( $m['file'] ) ? $m['file'] : '' );
							?>
							<figure class="cs-media__item">
								<figcaption class="cs-media__cap"><?php echo esc_html( $m['label'] ); ?></figcaption>
								<?php if ( $img ) : ?>
									<div class="cs-media__frame">
										<img src="<?php echo esc_url( $img ); ?>" loading="lazy" alt="<?php echo esc_attr( $cs['title'] . ' — ' . $m['label'] ); ?>">
									</div>
								<?php else : ?>
									<div class="cs-media__placeholder">
										<i class="bi bi-image"></i>
										<span class="cs-media__ph-file">assets/images/case-studies/<?php echo esc_html( $slug ); ?>/<?php echo esc_html( $m['file'] ); ?></span>
									</div>
								<?php endif; ?>
							</figure>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<section class="cs-band cs-band--white cs-band--cta">
			<div class="container cs-band__inner">
				<div class="cs-cta__inner">
					<h2 class="cs-cta__title"><?php esc_html_e( 'Want results like these for your business?', 'yourfirmgrowth' ); ?></h2>
					<p class="cs-cta__text"><?php esc_html_e( 'Let\'s map out a plan built around your goals, your market and your numbers.', 'yourfirmgrowth' ); ?></p>
					<div class="cs-cta__actions">
						<button type="button" class="btn btn-brand btn-lg" data-bs-toggle="modal" data-bs-target="#yfgLeadModal"><?php esc_html_e( 'Book a Free Growth Strategy Call', 'yourfirmgrowth' ); ?> &rarr;</button>
						<a class="btn btn-outline-brand btn-lg" href="<?php echo esc_url( $archive_url ); ?>"><?php esc_html_e( 'View More Case Studies', 'yourfirmgrowth' ); ?></a>
					</div>
				</div>
			</div>
		</section>

	</article>

	<?php
endwhile;

get_footer();
