<?php
/**
 * Archive template (category, tag, date, author) — blog grid.
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<div class="yfg-blog">
	<div class="container">

		<header class="yfg-blog-head">
			<?php
			the_archive_title( '<h1>', '</h1>' );
			the_archive_description( '<p>', '</p>' );
			?>
		</header>

		<?php yfg_category_filter(); ?>

		<?php if ( have_posts() ) : ?>
			<div class="row g-4">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<div class="col-md-6 col-lg-4">
						<?php get_template_part( 'template-parts/content', 'card' ); ?>
					</div>
					<?php
				endwhile;
				?>
			</div>

			<div class="yfg-pagination">
				<?php
				the_posts_pagination( array(
					'mid_size'  => 1,
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
				) );
				?>
			</div>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>

	</div>
</div>

<?php
get_footer();
