<?php
/**
* Template Name: Expert Archive
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WYSAC_Beta
*/

get_header(); ?>

<div id="primary" class="content-area col-md-12">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<header class="page-header col-md-12">
				<h1 class="page-title"><?php the_title();?></h1>
				<h2 class="taxonomy-description"><?php the_content(); ?></h2>
			</header>
		</div>

	<?php	endwhile; // End of the loop. ?>
	<div class="expert-topic-filters row readmore">
		<h4 style="text-align:center;">View people with expertise in ... </h4>
		<?php $terms = get_terms('expert_areas'); //get the list of expert areas for experts
		echo '<ul class="tax-list">';
		echo '<li><a href="'.get_site_url().'/experts" class="filter-view-all">View All</a></li>';
		foreach ($terms as $term) { //put them in a list
			echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
		}
		echo '</ul><div class="clear-both"></div>';?>
	</div><!-- .expert-topic-filters -->
	<div class="expert-archive-photos row clearfix">
		<?php
		//get the functions for the all experts page.
		all_experts_page();
		//all the code for that is in the wysac-plugins
		?>
	</div><!--.expert-archive-photos-->
</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();?>
