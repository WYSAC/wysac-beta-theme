<?php
/**
* The header for our theme.
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
		<a class="skip-link" href="#content">Skip to main content</a>

		<header id="masthead" class="site-header" role="banner">
			<!-- TOP BAR
			=================================== -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-8 col-xs-8">
							<a href="http://www.uwyo.edu/" class="uw-linkback"><img src="<?php echo get_site_url();?>/wp-content/uploads/2016/09/uw_white_52x25.png" class="uw-logo" /> <small>University of Wyoming</small></a>
						</div><!--.col-md-6 -->
						<div class="col-md-6 col-sm-4 col-xs-4">
							<form role="search" method="get" id="searchform" class="form-inline pull-right" action="<?php echo get_site_url();?>">
								<div><label class="screen-reader-text" for="s">Search for:</label>
									<div class="input-group">
										<input type="text" value="" name="s" id="s" class="form-control input-sm" placeholder="Search ...">
										<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
									</div>
								</div>
							</form>
						</div><!--.col-md-6 -->
					</div> <!--.row-->
				</div><!--.container-->
			</div><!--.topbar-->
			<!-- Site-Logo + Navigation
			=================================== -->
			<div class="site-branding">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-sm-3">
							<div class="site-logo">
								<a href="<?php echo get_home_url();?>"><?php the_custom_logo(); ?></a>
							</div> <!--.site-logo-->
						</div><!--.col-md-2-->
						<div class="col-md-10 col-sm-8 main-navigation-container">
							<nav class="navbar navbar-default main-navigation navbar-static-top" role="navigation">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse navbar-ex1-collapse">
									<?php
									wp_nav_menu( array(
										'menu'              => 'main-navigation',
										'theme_location'    => 'primary',
										'depth'             => 2,
										'container'         => false,
										'container_class'   => 'collapse navbar-collapse',
										'container_id'      => 'bs-example-navbar-collapse-1',
										'menu_class'        => 'nav navbar-nav',
										'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
										'walker'            => new wp_bootstrap_navwalker())
									);
									?>
								</div>
							</nav>
						</div>
					</div><!--.row-->
				</div> <!--.container-->
			</div><!--.site-branding-->
		</header><!-- #masthead -->

		<div id="content" class="site-content container">
