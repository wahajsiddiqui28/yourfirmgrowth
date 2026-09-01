<?php
/**
 * Header template.
 *
 * @package YourFirmGrowth
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q51DYKGB1E"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-Q51DYKGB1E');
    </script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yourfirmgrowth' ); ?></a>

<header id="masthead" class="site-header">
	<div class="container site-header__inner">

		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="custom-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo/logo.jpeg' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			</a>
		</div>

		<button class="yfg-nav-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'yourfirmgrowth' ); ?>">
			<span class="yfg-nav-toggle__bar"></span>
			<span class="yfg-nav-toggle__bar"></span>
			<span class="yfg-nav-toggle__bar"></span>
		</button>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary', 'yourfirmgrowth' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'yfg-menu',
				'container'      => false,
				'fallback_cb'    => 'yfg_primary_menu_fallback',
			) );
			?>
			<a class="btn btn-brand site-header__cta site-header__cta--mobile" href="<?php echo esc_url( yfg_page_url_by_template( 'page-contact.php', 'contact' ) ); ?>">
				<?php esc_html_e( 'Contact', 'yourfirmgrowth' ); ?><i class="bi bi-arrow-right ms-2"></i>
			</a>
			<?php yfg_whatsapp_button( 'site-header__cta site-header__cta--mobile' ); ?>
		</nav>

		<a class="btn btn-brand site-header__cta" href="<?php echo esc_url( yfg_page_url_by_template( 'page-contact.php', 'contact' ) ); ?>">
			<?php esc_html_e( 'Contact', 'yourfirmgrowth' ); ?><i class="bi bi-arrow-right ms-2"></i>
		</a>

		<?php yfg_whatsapp_button( 'site-header__cta' ); ?>

		<?php if ( function_exists( 'yfg_ml_switcher' ) ) { yfg_ml_switcher(); } ?>

	</div>

	<nav class="yfg-subheader" aria-label="<?php esc_attr_e( 'Services', 'yourfirmgrowth' ); ?>">
		<div class="container yfg-subheader__inner">
			<?php
			$yfg_current_url = is_page() ? untrailingslashit( get_permalink() ) : '';
			foreach ( yfg_service_nav_items() as $yfg_svc ) :
				$yfg_is_active = $yfg_current_url && untrailingslashit( $yfg_svc['url'] ) === $yfg_current_url;
				?>
				<a class="yfg-subheader__link<?php echo $yfg_is_active ? ' is-active' : ''; ?>" href="<?php echo esc_url( $yfg_svc['url'] ); ?>">
					<i class="bi <?php echo esc_attr( $yfg_svc['icon'] ); ?>"></i>
					<span><?php echo esc_html( $yfg_svc['label'] ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</nav>
</header>

<script>
( function () {
	var header = document.getElementById( 'masthead' );
	if ( ! header ) { return; }
	var onScroll = function () {
		header.classList.toggle( 'is-scrolled', window.scrollY > 8 );
	};
	onScroll();
	window.addEventListener( 'scroll', onScroll, { passive: true } );
} )();
</script>

<div id="content" class="site-content">
