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
		<!-- FOOTER NAVIGATION
		=================================== -->
					<nav class="footer-nav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
					</nav><!--.footer-navigation-->
			<!-- FOOTER LEGAL NAVIGATION
			=================================== -->
					<nav class="footer-legal-nav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer-legal', 'menu_id' => 'Footer-Legal' ) ); ?>
					</nav><!--.footer-navigation-->
			<div class="row">
				<!-- SITE INFO / COPYRIGHT
				=================================== -->
				<div class=" col-md-12 site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wysac-beta' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'wysac-beta' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'wysac-beta' ), 'wysac-beta', '<a href="http://underscores.me/" rel="designer">Jessica Schillinger</a>' ); ?>
				</div><!-- .site-info -->
			</div><!--.row-->
		</div>
	</footer><!-- #colophon .site-footer .container -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
