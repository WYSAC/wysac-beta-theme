<?php
/**
 * The sidebar for projects category.
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
	<!-- PARTNER ORGANIZATIONS
	=================================== -->
		<h4 class="sidebar-section-title">Partner Organization</h5>
		<?php the_terms( $post->ID, 'clients', '<ul class="tax-list"><li>', '</li><li>','</li></ul><div class="clear-both"></div>' );
					//current post, custom tax, before, between, after
					?>
		<!-- EXPERTS
		=================================== -->
		<h4 class="sidebar-section-title">Experts</h5>
		<?php if ( function_exists( 'coauthors_posts_links' ) ) {
					coauthors_posts_links('','','',''); //get the co-authors
					//these options are between, betweenLast, before and after
					}
					else {
					the_author_posts_link(); //if there are none, get the regular author
					}
					echo '<div class="clear-both"></div>'
				?>
		<!-- TOPICS
		=================================== -->
		<h4 class="sidebar-section-title">Topics</h5>
		<?php the_tags('<ul class="tax-list"><li>', '</li><li>','</li></ul><div class="clear-both"></div>' );
					//get the tags for this post and format it like the list of boxes
					?>
</aside><!-- #secondary -->
