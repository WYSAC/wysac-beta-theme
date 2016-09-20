<?php
/**
 * The sidebar for archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WYSAC_Beta
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area container" role="complementary">
	<div class="col-md-4">
		<h4 class="sidebar-title">Filter Results</h4>
				<h5 class="sidebar-section-title">Topics</h5>
					<?php the_tags('<ul class="tax-list"><li>','</li><li>','</li></ul><div class="clear-both"></div>'); ?>
				<h5 class="sidebar-section-title">Partner Organizations</h5>
					<?php $terms = get_terms('clients'); //get the list of clients
								echo '<ul class="tax-list">';
								foreach ($terms as $term) { //put them in a list
								    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
								}
								echo '</ul><div class="clear-both"></div>';?>
				<h5 class="sidebar-section-title">Project Type</h5>
					<?php $terms = get_terms('project-types'); //get the list of clients
								echo '<ul class="tax-list">';
								foreach ($terms as $term) { //put them in a list
								    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
								}
								echo '</ul><div class="clear-both"></div>';?>
				<h5 class="sidebar-section-title">Search</h5>
				<?php get_search_form(); ?>
</div>
</aside><!-- #secondary -->
