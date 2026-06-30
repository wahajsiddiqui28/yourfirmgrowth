<?php
/**
 * Single post template.
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<main class="container yfg-main">
	<div class="yfg-content-area">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'yfg-single' ); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php yfg_post_meta(); ?>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumb"><?php the_post_thumbnail( 'yfg-hero' ); ?></div>
				<?php endif; ?>

				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages();
					?>
				</div>

				<footer class="entry-footer">
					<?php yfg_post_taxonomy(); ?>
				</footer>
			</article>

			<?php
			the_post_navigation( array(
				'prev_text' => '&larr; %title',
				'next_text' => '%title &rarr;',
			) );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
		<?php endwhile; ?>
	</div>

	<?php get_sidebar(); ?>
</main>

<?php
get_footer();
