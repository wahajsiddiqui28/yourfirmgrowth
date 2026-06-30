<?php
/**
 * Main template — blog/posts listing fallback.
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<main class="container yfg-main">
	<div class="yfg-content-area">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<div class="yfg-posts-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				?>
			</div>

			<?php
			the_posts_pagination( array(
				'prev_text' => __( '&larr; Older', 'yourfirmgrowth' ),
				'next_text' => __( 'Newer &rarr;', 'yourfirmgrowth' ),
			) );
			?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>
</main>

<?php
get_footer();
