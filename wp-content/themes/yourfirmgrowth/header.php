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
			<a class="btn btn-brand site-header__cta site-header__cta--mobile" href="<?php echo esc_url( home_url( '/#lead-form' ) ); ?>">
				<?php esc_html_e( 'Get Your Free Proposal', 'yourfirmgrowth' ); ?>
			</a>
		</nav>

		<a class="btn btn-brand site-header__cta" href="<?php echo esc_url( home_url( '/#lead-form' ) ); ?>">
			<?php esc_html_e( 'Get Your Free Proposal', 'yourfirmgrowth' ); ?>
		</a>

	</div>
</header>

<div id="content" class="site-content">
