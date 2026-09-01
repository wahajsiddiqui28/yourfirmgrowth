<?php
/**
 * Search results — blog grid.
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<div class="yfg-blog">
	<div class="container">

		<header class="yfg-blog-head">
			<h1>
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'yourfirmgrowth' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
				?>
			</h1>
			<?php if ( have_posts() ) : ?>
				<p><?php echo esc_html( sprintf( _n( '%d result found.', '%d results found.', (int) $GLOBALS['wp_query']->found_posts, 'yourfirmgrowth' ), (int) $GLOBALS['wp_query']->found_posts ) ); ?></p>
			<?php endif; ?>
		</header>

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
