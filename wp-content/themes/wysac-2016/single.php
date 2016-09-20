<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WYSAC_Beta
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
 	if (in_category('projects') ) : //if the post is a Project
		get_sidebar('projects');  //get sidebar-projects.php
		else : //if it's any other category
			get_sidebar(); //get the default sidebar
		endif; ?>
</div><!--.container-->
<?php get_footer();?>
