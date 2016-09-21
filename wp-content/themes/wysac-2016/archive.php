<?php
/**
 * The archive page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WYSAC_Beta
 */

get_header(); ?>

<div class="container">
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
							<div class="col-md-6">
								<?php the_post_thumbnail('recent-post-box', array('class'=>'img-responsive')); ?>
							</div><!--col-md-6-->
							<div class="col-md-6">
								<small class="entry-metadata"><?php the_time('m.d.Y')?><?php the_terms( $post->ID, 'project_type', ' |  ', '' ); ?></small>
								<h2><?php the_title(); ?></h2>
								<a href="<?php the_permalink(); ?>" class="read-more-link">View Project</a>
							</div><!--col-md-6-->
						</div><!--.row .archive-project-entry-->
				<?php endwhile;
				the_posts_navigation(); else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div><!--.col-md-8-->
			<?php get_sidebar('archive');?>
		</div><!--row-->
	</main><!-- #main -->
</div><!-- #primary -->
</div><!--.container-->

<?php get_footer();?>
