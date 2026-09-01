<?php
/**
 * Footer template.
 *
 * @package YourFirmGrowth
 */

$yfg_home = home_url( '/' );
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">

	<div class="site-footer__main">
		<div class="container">
			<div class="row g-5">

				<!-- Brand -->
				<div class="col-lg-4 col-md-12">
					<div class="site-footer__brand">
						<?php
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							?>
							<a class="site-footer__name" href="<?php echo esc_url( $yfg_home ); ?>"><img class="custom-logo mb-3" src="https://yourfirmgrowth.com/wp-content/themes/yourfirmgrowth/assets/images/logo/logo.jpeg" alt="Your Firm Growth" style="max-height: 90px !important;"></a>
							<p>Your Firm Growth is a full-service digital agency helping businesses grow through strategic marketing, innovative technology, and results-driven digital solutions. We partner with startups, small businesses, and established companies across the United Kingdom, United States, Germany, Europe, and worldwide markets to build stronger brands, generate qualified leads, and drive sustainable business growth.</p>
							<?php
						}
						$yfg_desc = get_bloginfo( 'description' );
						if ( $yfg_desc ) {
							echo '<p class="site-footer__desc">' . esc_html( $yfg_desc ) . '</p>';
						}
						?>
					</div>
					<div class="site-footer__social">
						<a href="https://www.linkedin.com/company/your-firm-growth/" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="bi bi-linkedin"></i></a>
						<a href="https://www.facebook.com/yourfirmgrowth" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
						<a href="https://www.instagram.com/yourfirmgrowth/" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
						<a href="https://share.google/goFlPT9gLrnwL7Zd7" aria-label="Google Business Profile" target="_blank" rel="noopener"><i class="bi bi-google"></i></a>
						<a href="https://www.trustpilot.com/review/yourfirmgrowth.com" aria-label="Trustpilot" target="_blank" rel="noopener"><i class="bi bi-star-fill"></i></a>
					</div>
				</div>

				<!-- Services -->
				<div class="col-lg-4 col-md-6">
					<h4 class="site-footer__title"><?php esc_html_e( 'Services', 'yourfirmgrowth' ); ?></h4>
					<ul class="site-footer__links">
						<?php
						// Wohi services jo sub-header mein hain — har link apne page par.
						foreach ( yfg_service_nav_items() as $yfg_svc ) {
							printf(
								'<li><a href="%s">%s</a></li>',
								esc_url( $yfg_svc['url'] ),
								esc_html( $yfg_svc['label'] )
							);
						}
						?>
					</ul>
				</div>

				<!-- Quick links + CTA -->
				<div class="col-lg-2 col-md-3 col-6">
					<h4 class="site-footer__title"><?php esc_html_e( 'Company', 'yourfirmgrowth' ); ?></h4>
					<ul class="site-footer__links">
						<li><a href="<?php echo esc_url( $yfg_home . 'about-us/' ); ?>"><?php esc_html_e( 'About Us', 'yourfirmgrowth' ); ?></a></li>
						<!-- <li><a href="<?php //echo esc_url( $yfg_home . 'our-team/' ); ?>"><?php //esc_html_e( 'Our Team', 'yourfirmgrowth' ); ?></a></li> -->
						<li><a href="<?php echo esc_url( $yfg_home . 'portfolio/' ); ?>"><?php esc_html_e( 'Portfolio', 'yourfirmgrowth' ); ?></a></li>
						<li><a href="<?php echo esc_url( $yfg_home . 'case-studies/' ); ?>"><?php esc_html_e( 'Case Studies', 'yourfirmgrowth' ); ?></a></li>
						<li><a href="<?php echo esc_url( $yfg_home . '#faq' ); ?>"><?php esc_html_e( 'FAQ', 'yourfirmgrowth' ); ?></a></li>
						<li><a href="<?php echo esc_url( yfg_page_url_by_template( 'page-contact.php', 'contact' ) ); ?>"><?php esc_html_e( 'Contact', 'yourfirmgrowth' ); ?></a></li>
					</ul>
				</div>

				<div class="col-lg-2 col-md-3 col-6">
					<h4 class="site-footer__title"><?php esc_html_e( 'Get Started', 'yourfirmgrowth' ); ?></h4>
					<button type="button" class="btn btn-brand w-100 mb-2" data-bs-toggle="modal" data-bs-target="#yfgLeadModal">Book a Free Growth Strategy Call &rarr;</button>
					<a class="site-footer__web" href="https://yourfirmgrowth.com">yourfirmgrowth.com</a>
				</div>

			</div>
		</div>
	</div>

	<div class="site-footer__bottom">
		<div class="container site-footer__bottom-inner">
			<p class="site-info mb-0">
				&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
				<?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'yourfirmgrowth' ); ?>
			</p>
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'menu_class'     => 'yfg-footer-menu',
					'container'      => false,
					'depth'          => 1,
				) );
			} else {
				?>
				<ul class="yfg-footer-menu">
					<li><a href="<?php echo esc_url( $yfg_home . 'privacy-policy/' ); ?>"><?php esc_html_e( 'Privacy Policy', 'yourfirmgrowth' ); ?></a></li>
					<li><a href="<?php echo esc_url( $yfg_home . 'gdpr-compliance/' ); ?>"><?php esc_html_e( 'GDPR Compliance', 'yourfirmgrowth' ); ?></a></li>
				</ul>
				<?php
			}
			?>
		</div>
	</div>
</footer>

<?php get_template_part( 'template-parts/lead-modal' ); ?>

<?php wp_footer(); ?>
</body>
</html>
