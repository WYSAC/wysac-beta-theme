<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WYSAC_Beta
*/

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile; // End of the loop.
		?>
		<?php
		if (in_category('projects') ) : //if the post is a Project
			get_sidebar('projects');  //get sidebar-projects.php
			elseif (in_category('careers') ) :
				dynamic_sidebar('sidebar-careers');
			else : //if it's any other category
				get_sidebar(); //get the default sidebar
			endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();?>
