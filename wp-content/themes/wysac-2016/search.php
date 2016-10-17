<?php
/**
* The template for displaying search results pages.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
*
* @package WYSAC_Beta
*/

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
		<div class="row">
			<header class="page-header col-md-12">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'wysac-beta' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->
			</div>
			<div class="row">
				<div class="col-md-8">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

					/**
					* Run the loop for the search to output the results.
					* If you want to overload this in a child theme then include a file
					* called content-search.php and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'search' );

				endwhile;
				the_posts_pagination( array(
					'mid_size'		=> 2,
					'prev_text'		=> __('Previous', 'textdomain'),
					'next_text'		=> __('Next', 'textdomain'),
				)); else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div><!--.col-md-8-->
			<?php get_sidebar(); ?>
		</div><!--.row-->
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
