<?php
/**
* The template for displaying search results pages.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
*
* @package WYSAC_Beta
*/

get_header(); ?>

<section id="primary" class="content-area bobcat">
	<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<header class="page-header col-md-12">
				<h1 class="page-title"><?php printf( esc_html__( '%s', 'wysac-beta' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<h2 class="taxonomy-description">Search Results</h2> 
				</header><!-- .page-header -->
				<div class="col-md-8">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>
						<?php
					get_template_part( 'template-parts/content', 'search' );

				endwhile;
				the_posts_pagination( array(
					'mid_size'		=> 2,
					'prev_text'		=> __('&larr; Previous', 'textdomain'),
					'next_text'		=> __('Next &rarr;', 'textdomain'),
				)); ?>
			</div><!--.col-md-8-->
		<?php else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
				<?php get_sidebar(); ?>
			</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
