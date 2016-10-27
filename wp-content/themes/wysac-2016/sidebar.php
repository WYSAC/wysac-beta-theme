<?php
/**
 * The sidebar containing the main widget area.
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
	<?php

	//To change the classes of the section wrappers, or to add text before/after, you do that in the functions.php when you register the sidebar

	dynamic_sidebar( 'sidebar-1' );
	?>
</aside><!-- #secondary -->
