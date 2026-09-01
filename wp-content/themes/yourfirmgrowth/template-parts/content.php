<?php
/**
 * Default content part (single loop item).
 *
 * @package YourFirmGrowth
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'yfg-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="yfg-card__media" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'yfg-card' ); ?>
		</a>
	<?php endif; ?>

	<div class="yfg-card__body">
		<?php yfg_post_meta(); ?>
		<h2 class="yfg-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="yfg-card__excerpt"><?php the_excerpt(); ?></div>
		<a class="yfg-readmore" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'Read more', 'yourfirmgrowth' ); ?> &rarr;
		</a>
	</div>
</article>
