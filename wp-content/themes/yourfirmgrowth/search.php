<?php
/**
 * Search results template.
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<main class="container yfg-main">
	<div class="yfg-content-area">
		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'yourfirmgrowth' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="yfg-posts-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'card' );
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>

	<?php get_sidebar(); ?>
</main>

<?php
get_footer();
