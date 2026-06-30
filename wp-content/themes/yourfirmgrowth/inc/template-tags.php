<?php
/**
 * Custom template tags for this theme.
 *
 * @package YourFirmGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'yfg_post_meta' ) ) :
	/**
	 * Prints date and author meta for a post.
	 */
	function yfg_post_meta() {
		if ( 'post' !== get_post_type() ) {
			return;
		}
		?>
		<div class="yfg-meta">
			<time class="yfg-meta__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
				<?php echo esc_html( get_the_date() ); ?>
			</time>
			<span class="yfg-meta__sep">&middot;</span>
			<span class="yfg-meta__author"><?php the_author(); ?></span>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'yfg_post_taxonomy' ) ) :
	/**
	 * Prints categories and tags.
	 */
	function yfg_post_taxonomy() {
		$cats = get_the_category_list( ', ' );
		$tags = get_the_tag_list( '', ', ' );

		if ( $cats ) {
			echo '<p class="yfg-cats"><strong>' . esc_html__( 'Categories:', 'yourfirmgrowth' ) . '</strong> ' . wp_kses_post( $cats ) . '</p>';
		}
		if ( $tags ) {
			echo '<p class="yfg-tags"><strong>' . esc_html__( 'Tags:', 'yourfirmgrowth' ) . '</strong> ' . wp_kses_post( $tags ) . '</p>';
		}
	}
endif;
