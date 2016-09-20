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

<aside id="secondary" class="widget-area container" role="complementary">
	<div class="col-md-4">
		<h5 class="sidebar-section-title">Partner Organization</h5>
		<?php the_terms( $post->ID, 'clients', '', ' ' );
					//current post, custom tax, before, after
					?>
		<h5 class="sidebar-section-title">Experts</h5>
		<?php if ( function_exists( 'coauthors_posts_links' ) ) {
					coauthors_posts_links(); //get the co-authors
					}
					else {
					the_author_posts_link(); //if there are none, get the regular author
					}
				?>
		<h5 class="sidebar-section-title">Topics</h5>
		<?php the_tags('','');
					//get the tags for this post and don't put anything before or after it
					?>
</div>
</aside><!-- #secondary -->
