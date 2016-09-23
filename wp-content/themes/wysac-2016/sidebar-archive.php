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

<aside id="secondary" class="widget-area col-md-4" role="complementary">
				<!-- TOPICS
				=================================== -->
				<h4 class="sidebar-section-title">Topics</h5>
					<?php $terms = get_terms('post_tag'); //get the list of clients
								echo '<ul class="tax-list">';
								foreach ($terms as $term) { //put them in a list
										echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
								}
								echo '</ul><div class="clear-both"></div>';?>
				<!-- PARTNER ORGANIZATIONS
				=================================== -->
				<h4 class="sidebar-section-title">Partner Organizations</h5>
					<?php $terms = get_terms('clients'); //get the list of clients
								echo '<ul class="tax-list">';
								foreach ($terms as $term) { //put them in a list
								    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
								}
								echo '</ul><div class="clear-both"></div>';?>
				<!-- PROJECT TYPES
				=================================== -->
				<h4 class="sidebar-section-title">Types</h5>
					<?php $terms = get_terms('project_type'); //get the list of clients
								echo '<ul class="tax-list">';
								foreach ($terms as $term) { //put them in a list
								    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
								}
								echo '</ul><div class="clear-both"></div>';?>
				<!-- SEARCH BOX
				=================================== -->
				<h4 class="sidebar-section-title">Search</h5>
				<?php get_search_form(); ?>
</aside><!-- #secondary -->
