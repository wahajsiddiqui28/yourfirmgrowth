<?php
/**
 * Sidebar template.
 *
 * @package YourFirmGrowth
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="yfg-sidebar widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
