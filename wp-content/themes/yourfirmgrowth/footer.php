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
							<a class="site-footer__name" href="<?php echo esc_url( $yfg_home ); ?>"><?php bloginfo( 'name' ); ?></a>
							<?php
						}
						$yfg_desc = get_bloginfo( 'description' );
						if ( $yfg_desc ) {
							echo '<p class="site-footer__desc">' . esc_html( $yfg_desc ) . '</p>';
						}
						?>
					</div>
					<div class="site-footer__social">
						<a href="https://www.linkedin.com/company/yourfirmgrowth" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="bi bi-linkedin"></i></a>
						<a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
						<a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
						<a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
					</div>
				</div>

				<!-- Services -->
				<div class="col-lg-4 col-md-6">
					<h4 class="site-footer__title"><?php esc_html_e( 'Services', 'yourfirmgrowth' ); ?></h4>
					<ul class="site-footer__links">
						<?php
						$yfg_foot_services = array(
							'Search Engine Optimization (SEO)',
							'Web Design &amp; Development',
							'Content Marketing',
							'Paid Advertising (PPC &amp; Social Ads)',
							'Branding &amp; Identity',
							'Conversion Rate Optimization (CRO)',
							'Business Automation',
							'Digital Growth Consulting',
						);
						foreach ( $yfg_foot_services as $svc ) {
							printf(
								'<li><a href="%s">%s</a></li>',
								esc_url( $yfg_home . '#services' ),
								wp_kses_post( $svc )
							);
						}
						?>
					</ul>
				</div>

				<!-- Quick links + CTA -->
				<div class="col-lg-2 col-md-3 col-6">
					<h4 class="site-footer__title"><?php esc_html_e( 'Company', 'yourfirmgrowth' ); ?></h4>
					<ul class="site-footer__links">
						<li><a href="<?php echo esc_url( $yfg_home . '#why' ); ?>"><?php esc_html_e( 'Why Us', 'yourfirmgrowth' ); ?></a></li>
						<li><a href="<?php echo esc_url( $yfg_home . '#remote' ); ?>"><?php esc_html_e( 'Remote Teams', 'yourfirmgrowth' ); ?></a></li>
						<li><a href="<?php echo esc_url( $yfg_home . '#faq' ); ?>"><?php esc_html_e( 'FAQ', 'yourfirmgrowth' ); ?></a></li>
						<li><a href="<?php echo esc_url( $yfg_home . '#final-cta' ); ?>"><?php esc_html_e( 'Contact', 'yourfirmgrowth' ); ?></a></li>
					</ul>
				</div>

				<div class="col-lg-2 col-md-3 col-6">
					<h4 class="site-footer__title"><?php esc_html_e( 'Get Started', 'yourfirmgrowth' ); ?></h4>
					<a class="btn btn-brand w-100 mb-2" href="<?php echo esc_url( $yfg_home . '#lead-form' ); ?>">Book a Free Growth Strategy Call &rarr;</a>
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
			}
			?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
