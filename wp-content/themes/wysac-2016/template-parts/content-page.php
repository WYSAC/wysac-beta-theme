<?php
/**
* Template part for displaying page content in page.php.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WYSAC_Beta
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header col-md-12">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content col-md-8">
		<?php the_content(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
