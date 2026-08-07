<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rainsford
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rainsford' ); ?></a>
	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
			<div class="nav-wrapper">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand-logo">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/inc/rainsford-logo.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
				<a href="#" data-target="mobile-nav" id="hamburger-icon" class="sidenav-trigger hide-on-large-only hamburger-icon">
					<span class="hamburger-line"></span>
					<span class="hamburger-line"></span>
					<span class="hamburger-line"></span>
				</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About Us</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#why-us' ) ); ?>">Why Us</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#team' ) ); ?>">Team</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#work' ) ); ?>">Delivery</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#case-studies' ) ); ?>">Work</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact Us</a></li>
				</ul>
			</div>
		</nav>
		<ul class="sidenav" id="mobile-nav">
			<li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About</a></li>
			<li><a href="<?php echo esc_url( home_url( '/#why-us' ) ); ?>">Why Us</a></li>
			<li><a href="<?php echo esc_url( home_url( '/#team' ) ); ?>">Team</a></li>
			<li><a href="<?php echo esc_url( home_url( '/#work' ) ); ?>">Delivery</a></li>
			<li><a href="<?php echo esc_url( home_url( '/#case-studies' ) ); ?>">Work</a></li>
			<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact Us</a></li>
		</ul>
	</header><!-- #masthead -->
