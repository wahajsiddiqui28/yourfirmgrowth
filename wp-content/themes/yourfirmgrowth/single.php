<?php
/**
 * Single blog post — 2-column hero, table of contents, FAQ accordion.
 *
 * @package YourFirmGrowth
 */

get_header();

while ( have_posts() ) :
	the_post();

	$yfg_cats      = get_the_category();
	$yfg_author_id = (int) get_the_author_meta( 'ID' );
	$yfg_permalink = rawurlencode( get_permalink() );
	$yfg_title_enc = rawurlencode( get_the_title() );
	$yfg_has_img   = has_post_thumbnail();

	// Render the content, then (1) pull the leading paragraph out for the hero,
	// and (2) turn a Rank Math FAQ block into a Bootstrap accordion.
	ob_start();
	the_content();
	$yfg_content = ob_get_clean();

	// (1) Intro = the first paragraph, only if it comes before the first heading.
	$yfg_intro   = '';
	$yfg_first_h = ( preg_match( '/<h[1-6]\b/i', $yfg_content, $hm, PREG_OFFSET_CAPTURE ) ) ? $hm[0][1] : PHP_INT_MAX;
	if ( preg_match( '/<p\b[^>]*>.*?<\/p>/is', $yfg_content, $pm, PREG_OFFSET_CAPTURE ) && $pm[0][1] < $yfg_first_h ) {
		$yfg_intro   = $pm[0][0];
		$yfg_content = substr_replace( $yfg_content, '', $pm[0][1], strlen( $pm[0][0] ) );
	}

	// (2) FAQ block -> accordion.
	$yfg_faq_pos = strpos( $yfg_content, 'id="rank-math-faq"' );
	if ( false !== $yfg_faq_pos ) {
		$yfg_div_start = strrpos( substr( $yfg_content, 0, $yfg_faq_pos ), '<div' );
		if ( false !== $yfg_div_start ) {
			// Locate the matching close of the FAQ wrapper (depth-aware).
			$yfg_depth = 0;
			$yfg_end   = false;
			if ( preg_match_all( '/<div\b|<\/div>/i', substr( $yfg_content, $yfg_div_start ), $yfg_tok, PREG_OFFSET_CAPTURE ) ) {
				foreach ( $yfg_tok[0] as $yfg_t ) {
					$yfg_depth += ( 0 === strcasecmp( '</div>', $yfg_t[0] ) ) ? -1 : 1;
					if ( 0 === $yfg_depth ) {
						$yfg_end = $yfg_div_start + $yfg_t[1] + strlen( $yfg_t[0] );
						break;
					}
				}
			}
			if ( false !== $yfg_end ) {
				$yfg_faq_html = substr( $yfg_content, $yfg_div_start, $yfg_end - $yfg_div_start );
				if ( preg_match_all( '/rank-math-list-item[^>]*>\s*<h3[^>]*>(.*?)<\/h3>\s*<div[^>]*rank-math-answer[^>]*>(.*?)<\/div>\s*<\/div>/is', $yfg_faq_html, $yfg_items, PREG_SET_ORDER ) ) {
					$yfg_acc = '<div class="accordion yfg-faq" id="yfgPostFaq">';
					foreach ( $yfg_items as $yfg_i => $yfg_it ) {
						$yfg_q    = wp_strip_all_tags( $yfg_it[1] );
						$yfg_a    = trim( $yfg_it[2] );
						$yfg_open = ( 0 === $yfg_i );
						$yfg_cid  = 'pfaq-' . $yfg_i;
						$yfg_acc .= '<div class="accordion-item">';
						$yfg_acc .= '<h3 class="accordion-header"><button class="accordion-button' . ( $yfg_open ? '' : ' collapsed' ) . '" type="button" data-bs-toggle="collapse" data-bs-target="#' . $yfg_cid . '" aria-expanded="' . ( $yfg_open ? 'true' : 'false' ) . '" aria-controls="' . $yfg_cid . '">' . esc_html( $yfg_q ) . '</button></h3>';
						$yfg_acc .= '<div id="' . $yfg_cid . '" class="accordion-collapse collapse' . ( $yfg_open ? ' show' : '' ) . '" data-bs-parent="#yfgPostFaq"><div class="accordion-body">' . wp_kses_post( $yfg_a ) . '</div></div>';
						$yfg_acc .= '</div>';
					}
					$yfg_acc .= '</div>';
					$yfg_content = substr( $yfg_content, 0, $yfg_div_start ) . $yfg_acc . substr( $yfg_content, $yfg_end );
				}
			}
		}
	}
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'yfg-article' ); ?>>

		<!-- ===== HERO (2 columns: text + image) ===== -->
		<div class="container">
			<div class="yfg-article-hero row align-items-center g-4 g-lg-5">
				<div class="<?php echo $yfg_has_img ? 'col-lg-7' : 'col-lg-9 mx-auto text-center'; ?>">
					<?php if ( ! empty( $yfg_cats ) ) : ?>
						<a class="yfg-badge-cat" href="<?php echo esc_url( get_category_link( $yfg_cats[0] ) ); ?>"><?php echo esc_html( $yfg_cats[0]->name ); ?></a>
					<?php endif; ?>
					<h1 class="yfg-article-hero__title"><?php the_title(); ?></h1>
					<div class="yfg-article__meta<?php echo $yfg_has_img ? ' yfg-article__meta--start' : ''; ?>">
						<span class="yfg-article__author"><?php echo get_avatar( $yfg_author_id, 28, '', '', array( 'class' => 'avatar' ) ); ?><?php the_author(); ?></span>
						<span class="sep">&middot;</span>
						<span><i class="bi bi-calendar3"></i> <?php echo esc_html( get_the_date() ); ?></span>
						<span class="sep">&middot;</span>
						<span><i class="bi bi-clock"></i> <?php echo esc_html( yfg_reading_time() ); ?> min read</span>
					</div>
					<?php if ( $yfg_intro ) : ?>
						<div class="yfg-article__intro"><?php echo $yfg_intro; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
					<?php endif; ?>
				</div>

				<?php if ( $yfg_has_img ) : ?>
					<div class="col-lg-5">
						<div class="yfg-article__hero-media">
							<div class="yfg-article__hero-img"><?php the_post_thumbnail( 'large' ); ?></div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<!-- ===== BODY ===== -->
		<div class="container yfg-article__body">
			<div class="row g-5 justify-content-center">

				<!-- Content -->
				<div class="col-lg-8">

					<!-- Table of contents (mobile, collapsible) -->
					<div class="yfg-toc-mobile d-lg-none" id="yfgTocMobile" hidden>
						<button class="yfg-toc-mobile__btn" type="button" aria-expanded="false">
							<span><i class="bi bi-list-ul me-2"></i><?php esc_html_e( 'On this page', 'yourfirmgrowth' ); ?></span>
							<i class="bi bi-chevron-down yfg-toc-mobile__chev"></i>
						</button>
						<ul class="yfg-toc-mobile__list yfg-toc__list"></ul>
					</div>

					<div class="yfg-article__content">
						<?php
						echo $yfg_content; // phpcs:ignore WordPress.Security.EscapeOutput -- rendered post content.
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yourfirmgrowth' ),
							'after'  => '</div>',
						) );
						?>
					</div>

					<?php the_tags( '<div class="yfg-tags">', '', '</div>' ); ?>

					<div class="yfg-share">
						<span class="yfg-share__label"><?php esc_html_e( 'Share:', 'yourfirmgrowth' ); ?></span>
						<a class="s-li" target="_blank" rel="noopener" aria-label="Share on LinkedIn" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $yfg_permalink; ?>"><i class="bi bi-linkedin"></i></a>
						<a class="s-fb" target="_blank" rel="noopener" aria-label="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $yfg_permalink; ?>"><i class="bi bi-facebook"></i></a>
						<a class="s-x" target="_blank" rel="noopener" aria-label="Share on X" href="https://twitter.com/intent/tweet?url=<?php echo $yfg_permalink; ?>&text=<?php echo $yfg_title_enc; ?>"><i class="bi bi-twitter-x"></i></a>
						<a class="s-wa" target="_blank" rel="noopener" aria-label="Share on WhatsApp" href="https://wa.me/?text=<?php echo $yfg_title_enc . '%20' . $yfg_permalink; ?>"><i class="bi bi-whatsapp"></i></a>
					</div>

					<?php $yfg_bio = get_the_author_meta( 'description' ); ?>
					<div class="yfg-author-box">
						<?php echo get_avatar( $yfg_author_id, 64 ); ?>
						<div>
							<p class="yfg-author-box__name"><?php the_author(); ?></p>
							<p class="yfg-author-box__role"><?php esc_html_e( 'Author at Your Firm Growth', 'yourfirmgrowth' ); ?></p>
							<?php if ( $yfg_bio ) : ?>
								<p class="yfg-author-box__bio"><?php echo esc_html( $yfg_bio ); ?></p>
							<?php endif; ?>
						</div>
					</div>

				</div>

				<!-- Table of contents (desktop, sticky) -->
				<div class="col-lg-4 d-none d-lg-block">
					<aside class="yfg-toc" id="yfgToc" hidden>
						<div class="yfg-toc__inner">
							<div class="yfg-toc__head">
								<span class="yfg-toc__head-icon"><i class="bi bi-list-ul"></i></span>
								<p class="yfg-toc__title"><?php esc_html_e( 'On this page', 'yourfirmgrowth' ); ?></p>
							</div>
							<div class="yfg-toc__progress"><span id="yfgTocProgress"></span></div>
							<ul class="yfg-toc__list"></ul>
						</div>
					</aside>
				</div>

			</div>
		</div>
	</article>

	<?php
	// Related posts (same primary category).
	if ( ! empty( $yfg_cats ) ) :
		$yfg_related = new WP_Query( array(
			'category__in'        => array( (int) $yfg_cats[0]->term_id ),
			'post__not_in'        => array( get_the_ID() ),
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		) );
		if ( $yfg_related->have_posts() ) :
			?>
			<section class="yfg-related">
				<div class="container">
					<h2><?php esc_html_e( 'Related Articles', 'yourfirmgrowth' ); ?></h2>
					<div class="row g-4">
						<?php
						while ( $yfg_related->have_posts() ) :
							$yfg_related->the_post();
							?>
							<div class="col-md-6 col-lg-4">
								<?php get_template_part( 'template-parts/content', 'card' ); ?>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
			<?php
		endif;
	endif;
	?>

	<!-- CTA -->
	<section class="yfg-section" style="padding: 3.5rem 0;">
		<div class="container">
			<div class="text-center text-white" style="background: linear-gradient(135deg, #03182e 0%, #052f57 50%, #04505c 100%); border-radius: 22px; padding: 3rem 2rem; box-shadow: 0 15px 40px rgba(3,24,46,.15);">
				<h2 class="text-white mb-2" style="font-weight: 800; color: #fff !important;"><?php esc_html_e( 'Ready to grow your business?', 'yourfirmgrowth' ); ?></h2>
				<p class="mx-auto mb-4" style="max-width: 620px; color: rgba(255,255,255,.9);"><?php esc_html_e( 'Book a free strategy call and let’s turn these ideas into real growth.', 'yourfirmgrowth' ); ?></p>
				<button type="button" class="btn btn-light btn-lg fw-semibold" data-bs-toggle="modal" data-bs-target="#yfgLeadModal"><?php esc_html_e( 'Book a Free Growth Strategy Call', 'yourfirmgrowth' ); ?> &rarr;</button>
			</div>
		</div>
	</section>

	<?php
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
	?>

<?php
endwhile;
?>

<script>
( function () {
	var content = document.querySelector( '.yfg-article__content' );
	if ( ! content ) { return; }

	// Collect headings for the TOC, but skip FAQ accordion questions.
	var heads = Array.prototype.slice.call( content.querySelectorAll( 'h2, h3' ) ).filter( function ( h ) {
		return ! h.closest( '.yfg-faq' );
	} );
	if ( heads.length < 2 ) { return; }

	var slug = function ( text ) {
		return text.toLowerCase().trim().replace( /[^\w\s-]/g, '' ).replace( /\s+/g, '-' ).substring( 0, 40 );
	};

	var itemsHtml = '';
	heads.forEach( function ( h, i ) {
		if ( ! h.id ) { h.id = 'sec-' + i + '-' + slug( h.textContent ); }
		var sub = 'H3' === h.tagName ? ' class="yfg-toc__sub"' : '';
		itemsHtml += '<li' + sub + '><a href="#' + h.id + '">' + h.textContent + '</a></li>';
	} );

	var lists = document.querySelectorAll( '.yfg-toc__list' );
	lists.forEach( function ( ul ) { ul.innerHTML = itemsHtml; } );

	// Reveal the TOC containers.
	var deskToc = document.getElementById( 'yfgToc' );
	var mobToc  = document.getElementById( 'yfgTocMobile' );
	if ( deskToc ) { deskToc.hidden = false; }
	if ( mobToc )  { mobToc.hidden = false; }

	// Mobile collapse toggle.
	if ( mobToc ) {
		var btn = mobToc.querySelector( '.yfg-toc-mobile__btn' );
		btn.addEventListener( 'click', function () {
			var open = mobToc.classList.toggle( 'is-open' );
			btn.setAttribute( 'aria-expanded', String( open ) );
		} );
		mobToc.querySelectorAll( 'a' ).forEach( function ( a ) {
			a.addEventListener( 'click', function () { mobToc.classList.remove( 'is-open' ); btn.setAttribute( 'aria-expanded', 'false' ); } );
		} );
	}

	// Scroll-spy.
	var allLinks = document.querySelectorAll( '.yfg-toc__list a' );
	var setActive = function ( id ) {
		allLinks.forEach( function ( a ) {
			a.classList.toggle( 'is-active', a.getAttribute( 'href' ) === '#' + id );
		} );
	};
	if ( 'IntersectionObserver' in window ) {
		var obs = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( e ) {
				if ( e.isIntersecting ) { setActive( e.target.id ); }
			} );
		}, { rootMargin: '-130px 0px -70% 0px', threshold: 0 } );
		heads.forEach( function ( h ) { obs.observe( h ); } );
	}

	// Reading progress bar inside the TOC.
	var bar = document.getElementById( 'yfgTocProgress' );
	if ( bar ) {
		var updateProgress = function () {
			var start = content.offsetTop;
			var end   = start + content.offsetHeight - window.innerHeight;
			var pct   = end > start ? ( ( window.scrollY - start ) / ( end - start ) ) * 100 : 0;
			bar.style.width = Math.min( 100, Math.max( 0, pct ) ) + '%';
		};
		window.addEventListener( 'scroll', updateProgress, { passive: true } );
		updateProgress();
	}
} )();
</script>

<?php
get_footer();
