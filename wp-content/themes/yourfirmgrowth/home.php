<?php
/**
 * Blog posts index (Posts page) — magazine layout.
 *
 * @package YourFirmGrowth
 */

get_header();

$yfg_posts_page = (int) get_option( 'page_for_posts' );
$yfg_blog_title = $yfg_posts_page ? get_the_title( $yfg_posts_page ) : __( 'Blog', 'yourfirmgrowth' );
?>

<div class="yfg-blog">
	<div class="container">

		<header class="yfg-blog-head">
			<h1><?php echo esc_html( $yfg_blog_title ); ?></h1>
			<p><?php esc_html_e( 'Insights, tips and strategies to help your business grow.', 'yourfirmgrowth' ); ?></p>
		</header>

		<?php yfg_category_filter(); ?>

		<?php if ( have_posts() ) : ?>

			<?php
			$yfg_paged = max( 1, (int) get_query_var( 'paged' ) );

			// Featured post = the first one, only on page 1.
			if ( 1 === $yfg_paged ) :
				the_post();
				$yfg_fcats = get_the_category();
				?>
				<article class="yfg-featured">
					<a class="yfg-featured__media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'yfg-hero' );
						} else {
							echo '<span class="yfg-thumb-fallback"><i class="bi bi-journal-richtext"></i></span>';
						}
						?>
					</a>
					<div class="yfg-featured__body">
						<?php if ( ! empty( $yfg_fcats ) ) : ?>
							<a class="yfg-badge-cat" href="<?php echo esc_url( get_category_link( $yfg_fcats[0] ) ); ?>"><?php echo esc_html( $yfg_fcats[0]->name ); ?></a>
						<?php endif; ?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="yfg-featured__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 34 ) ); ?></p>
						<div class="yfg-post-meta mb-3">
							<span><i class="bi bi-person"></i><?php the_author(); ?></span>
							<span class="sep">&middot;</span>
							<span><i class="bi bi-calendar3"></i><?php echo esc_html( get_the_date() ); ?></span>
							<span class="sep">&middot;</span>
							<span><i class="bi bi-clock"></i><?php echo esc_html( yfg_reading_time() ); ?> min read</span>
						</div>
						<a class="btn btn-brand align-self-start" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read Article', 'yourfirmgrowth' ); ?> &rarr;</a>
					</div>
				</article>
			<?php endif; ?>

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
