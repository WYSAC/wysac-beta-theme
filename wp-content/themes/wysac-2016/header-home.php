<?php
/**
 * The header for the home page.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WYSAC_Beta
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>
</head>

<body>
<div id="page" class="site">
	<!--Need a Screenreader skip link here-->

	<header id="masthead" class="site-header masthead-home-page" role="banner">
		<!-- TOP BAR
		=================================== -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="http://www.uwyo.edu/" class="uw-linkback"><small>University of Wyoming</small></a>
					</div>
					<div class="col-md-6">
						<a href="http://www.uwyo.edu/" ><img src="<?php echo get_site_url();?>/wp-content/uploads/2016/09/uw_white_52x25.png" class="uw-logo pull-right" /></a>
					</div>
				</div> <!--.row-->
			</div><!--.container-->
		</div><!--.topbar-->
		<!-- Site-Logo + Navigation
		=================================== -->
		<div class="site-branding">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div class="site-logo">
								<a href="<?php echo get_home_url();?>"><?php the_custom_logo(); ?></a>
							</div> <!--.site-logo-->
						</div><!--.col-md-2-->
						<div class="col-md-10">
							<nav id="site-navigation" class="main-navigation" role="navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							</nav><!-- #site-navigation -->
						</div><!--.col-md-10-->
					</div><!--.row-->
				</div> <!--.container-->
			</div><!--.site-branding-->
		<!-- Jumbotron
		=================================== -->
		<div class="container front-page-banner">
			<div class="row">
				<div class="col-md-12">
									<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
						<?php

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
						<?php
						endif; ?>
				</div> <!--.col-md-12-->
			</div><!--.row-->
		</div><!--.container-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
