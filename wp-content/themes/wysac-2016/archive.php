<?php
/**
* The archive page.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WYSAC_Beta
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<div class="row">
					<header class="page-header col-md-12">
						<h1 class="page-title"><?php the_archive_title(); ?></h1>
						<h2 class="taxonomy-description"><?php the_archive_description();  ?></h2>
					</header><!-- .page-header -->
				</div><!--.row-->
				<div class="row">
					<div class="col-md-8">
						<?php /* Start the Loop */
						while ( have_posts() ) : the_post(); ?>
						<div class="row archive-project-entry">
							<div class="col-md-6 col-sm-6">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('recent-post-box', array('class'=>'img-responsive')); ?></a>
							</div><!--col-md-6-->
							<div class="col-md-6 col-sm-6">
								<p class="entry-metadata"><?php the_time('m.d.Y')?><?php the_terms( $post->ID, 'project_type', ' |  ', '' ); ?></p>
								<h2><a href="<?php the_permalink(); ?>" class="entry-title-link"><?php the_title(); ?></a></h2>
								<a href="<?php the_permalink(); ?>" class="read-more-link">Read More &rarr;</a>

							</div><!--col-md-6-->
						</div><!--.row .archive-project-entry-->
					<?php endwhile;
					the_posts_pagination( array(
						'mid_size'		=> 2,
						'prev_text'		=> __('&larr; Previous', 'textdomain'),
						'next_text'		=> __('Next &rarr;', 'textdomain'),
					)); else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</div><!--.col-md-8-->
				<?php get_sidebar('archive'); ?>
			</div><!--row-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();?>
