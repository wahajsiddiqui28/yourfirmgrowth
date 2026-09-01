<?php
/**
 * "No results" empty state.
 *
 * @package YourFirmGrowth
 */
?>
<div class="text-center py-5" style="max-width:520px;margin:0 auto;">
	<div style="font-size:3rem;color:var(--yfg-teal);"><i class="bi bi-journal-x"></i></div>
	<h2 class="mt-2" style="font-weight:800;color:var(--yfg-navy);"><?php esc_html_e( 'Nothing here yet', 'yourfirmgrowth' ); ?></h2>
	<?php if ( is_search() ) : ?>
		<p class="text-muted"><?php esc_html_e( 'Sorry, nothing matched your search. Try different keywords.', 'yourfirmgrowth' ); ?></p>
	<?php else : ?>
		<p class="text-muted"><?php esc_html_e( 'No posts to show right now. Please check back soon.', 'yourfirmgrowth' ); ?></p>
	<?php endif; ?>
	<div class="d-flex justify-content-center mt-3">
		<?php get_search_form(); ?>
	</div>
</div>
