<?php
/**
 * "No results" content part.
 *
 * @package YourFirmGrowth
 */
?>
<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Nothing here yet', 'yourfirmgrowth' ); ?></h2>
	</header>
	<div class="page-content">
		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, nothing matched your search. Try different keywords.', 'yourfirmgrowth' ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can’t find what you’re looking for.', 'yourfirmgrowth' ); ?></p>
		<?php endif; ?>
		<?php get_search_form(); ?>
	</div>
</section>
