<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Accessible Navigation
 * @since Accessible Navigation 1.0
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'accessible-navigation' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php echo get_bloginfo( 'description', 'display' ) ?></p>
		</div><!-- .site-branding -->

		<nav id="main-navigation" class="site-navigation primary-navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'accessible-navigation' ); ?>
				<span class="dashicons" aria-hidden="true"></span>
			</button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => 'ul',
				'menu_id' => 'primary-menu',
				'menu_class' => 'primary-menu menu',
			) );

			wp_nav_menu( array(
				'theme_location' => 'social',
				'container' => 'ul',
				'menu_id' => 'social-menu',
				'menu_class' => 'social-menu menu',
				'link_before' => '<span class="dashicons" aria-hidden="true"></span><span class="screen-reader-text">',
				'link_after' => '</span>',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<main id="content" class="site-main site-content" role="main">

