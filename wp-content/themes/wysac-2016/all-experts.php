<?php
/**
 * Template Name: Expert Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WYSAC_Beta
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
			<!-- Show all the authors -->
			<?php echo do_shortcode('[authoravatars show_name=true]'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!--.container-->

<?php get_footer();?>
