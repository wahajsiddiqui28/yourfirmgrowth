<?php
/**
 * Comments template.
 *
 * @package YourFirmGrowth
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$yfg_count = get_comments_number();
			printf(
				/* translators: %s: comment count. */
				esc_html( _n( '%s Comment', '%s Comments', $yfg_count, 'yourfirmgrowth' ) ),
				esc_html( number_format_i18n( $yfg_count ) )
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 48,
			) );
			?>
		</ol>

		<?php
		the_comments_pagination( array(
			'prev_text' => __( '&larr; Older comments', 'yourfirmgrowth' ),
			'next_text' => __( 'Newer comments &rarr;', 'yourfirmgrowth' ),
		) );
		?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'yourfirmgrowth' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>
