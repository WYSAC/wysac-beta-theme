<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package WYSAC_Beta
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">
			<div class="col-md-12">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! ', 'wysac-beta' ); ?></h1>
				</header><!-- .page-header -->
			</div><!--.col-md-12-->
				<div class="page-content">
					<div class="col-md-4">
					<img src="http://placehold.it/300x300" class="img img-responsive" />
					</div><!--.col-md-4-->
					<div class="col-md-4">
						<h2>Something seems to have went wrong.</h2>
						<p>Try searching or one of these helpful links. </p>
					</div>
					<div class="col-md-4 widget-area">
						<h4>More about WYSAC</h4>
						<?php wp_nav_menu( array (
						'menu'							=> 'Sidebar - More about WYSAC',
						) ); ?>
						<div class="clearfix"></div>
						<h4>Search</h4>
						<?php get_search_form(); ?>
					</div><!--.col-md-4-->
					</div><!-- .page-content .col-md-8-->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_footer();
