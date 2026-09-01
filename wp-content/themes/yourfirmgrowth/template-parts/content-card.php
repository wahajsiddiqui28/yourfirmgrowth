<?php
/**
 * Blog post card (grid loop item).
 *
 * @package YourFirmGrowth
 */

$yfg_cats = get_the_category();
$yfg_cat  = ! empty( $yfg_cats ) ? $yfg_cats[0] : null;
?>
<article <?php post_class( 'yfg-post-card' ); ?>>
	<a class="yfg-post-card__media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'large' );
		} else {
			echo '<span class="yfg-thumb-fallback"><i class="bi bi-journal-text"></i></span>';
		}
		?>
		<?php if ( $yfg_cat ) : ?>
			<span class="yfg-badge-cat yfg-badge-cat--over"><?php echo esc_html( $yfg_cat->name ); ?></span>
		<?php endif; ?>
	</a>
	<div class="yfg-post-card__body">
		<h3 class="yfg-post-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<p class="yfg-post-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
		<div class="yfg-post-meta">
			<span><i class="bi bi-calendar3"></i><?php echo esc_html( get_the_date() ); ?></span>
			<span class="sep">&middot;</span>
			<span><i class="bi bi-clock"></i><?php echo esc_html( yfg_reading_time() ); ?> min read</span>
		</div>
	</div>
</article>
