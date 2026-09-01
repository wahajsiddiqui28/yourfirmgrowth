<?php
/**
 * 404 template.
 *
 * @package YourFirmGrowth
 */

get_header();
?>

<main class="container yfg-main">
	<div class="yfg-content-area yfg-404">
		<h1 class="page-title">404</h1>
		<h2><?php esc_html_e( 'Oops! That page can’t be found.', 'yourfirmgrowth' ); ?></h2>
		<p><?php esc_html_e( 'The page you are looking for may have been moved or removed.', 'yourfirmgrowth' ); ?></p>
		<?php get_search_form(); ?>
		<a class="yfg-btn yfg-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php esc_html_e( 'Back to Home', 'yourfirmgrowth' ); ?>
		</a>
	</div>
</main>

<?php
get_footer();
