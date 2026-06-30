<?php
/**
 * Card content part (grid item).
 *
 * @package YourFirmGrowth
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'yfg-card' ); ?>>
	<a class="yfg-card__media" href="<?php the_permalink(); ?>">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'yfg-card' );
		} else {
			echo '<span class="yfg-card__placeholder" aria-hidden="true"></span>';
		}
		?>
	</a>
	<div class="yfg-card__body">
		<?php yfg_post_meta(); ?>
		<h3 class="yfg-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<div class="yfg-card__excerpt"><?php the_excerpt(); ?></div>
	</div>
</article>
