<?php
/**
 * Comments template — branded.
 *
 * @package YourFirmGrowth
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="yfg-comments comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="yfg-comments__title">
			<?php
			$yfg_count = get_comments_number();
			if ( '1' === (string) $yfg_count ) {
				esc_html_e( '1 Comment', 'yourfirmgrowth' );
			} else {
				/* translators: %s: comment count. */
				printf( esc_html__( '%s Comments', 'yourfirmgrowth' ), esc_html( number_format_i18n( $yfg_count ) ) );
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 48,
			) );
			?>
		</ol>

		<?php
		the_comments_pagination( array(
			'prev_text' => '&larr; ' . __( 'Older comments', 'yourfirmgrowth' ),
			'next_text' => __( 'Newer comments', 'yourfirmgrowth' ) . ' &rarr;',
		) );
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'yourfirmgrowth' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form( array(
		'class_form'         => 'comment-form',
		'class_submit'       => 'submit btn btn-brand',
		'title_reply'        => __( 'Leave a Reply', 'yourfirmgrowth' ),
		'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title yfg-comments__title">',
		'title_reply_after'  => '</h3>',
		'comment_notes_before' => '',
	) );
	?>
</div>
