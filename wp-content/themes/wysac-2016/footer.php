<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WYSAC_Beta
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
		<!-- FOOTER NAVIGATION
		=================================== -->
			<div class="col-md-12 main-footer-nav">
					<nav class="footer-nav" role="navigation">
						<?php wp_nav_menu( array(
							'theme_location' 	=> 'footer',
							'menu_id' 				=> 'footer-menu',
						 	'menu_class'			=> 'nav nav-justified') ); ?>
					</nav><!--.footer-navigation-->
				</div><!-- .main-footer-nav-->
			</div><!--.row-->
			<div class="row">
			<!-- FOOTER LEGAL NAVIGATION
			=================================== -->
			<div class="col-md-12 secondary-footer-nav">
					<nav class="footer-legal-nav" role="navigation">
						<?php wp_nav_menu( array(
							'theme_location' 	=> 'footer-legal',
							'menu_id' 				=> 'footer-Legal',
						 	'menu_class'			=> 'nav nav-justified') ); ?>
					</nav><!--.footer-navigation-->
				</div><!-- .secondary-footer-nav-->
			</div><!--.row-->
			<div class="row">
				<!-- SITE INFO / COPYRIGHT
				=================================== -->
				<div class="col-md-12 site-info">
					<p class="small">&copy; <?php echo date("Y"); ?> Wyoming Survey & Analysis Center at the University of Wyoming</p>

				</div><!-- .site-info -->
			</div><!--.row-->
		</div>
	</footer><!-- #colophon .site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
