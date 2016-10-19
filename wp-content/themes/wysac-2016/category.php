<?php
/**
* The archive page for catorgies.
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
						<h1 class="page-title"><?php single_cat_title(); ?></h1>
						<h2 class="taxonomy-description"><?php the_archive_description();  ?></h2>
					</header><!-- .page-header -->
				</div><!--.row -->
				<div class="row">
					<div class="col-md-8">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); ?>
						<div class="row archive-project-entry">
							<div class="col-md-6 col-sm-6">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('recent-post-box', array('class'=>'img-responsive')); ?></a>
							</div><!--.col-md-6-->
							<div class="col-md-6 col-sm-6">
								<p class="entry-metadata"><?php the_time('m.d.Y')?> <?php the_terms( $post->ID, 'project_type', ' |  ', '' ); ?></p>
								<a href="<?php the_permalink();?>" class="entry-title-link"><h2><?php the_title(); ?></h2></a>
								<?php
								//Change the Read More link based on the category archive
								if ( is_category('projects') ) { ?>
									<a href="<?php the_permalink(); ?>" class="read-more-link">View Project &rarr;</a>
									<?php } else if ( is_category('careers') ) { ?>
										<a href="<?php the_permalink(); ?>" class="read-more-link">View Posting &rarr;</a>
										<?php } else { ?>
											<a href="<?php the_permalink(); ?>" class="read-more-link">Read More &rarr;</a>
											<?php } ?>
										</div><!--.col-md-6-->
									</div><!--.row-->

								<?php endwhile;
								the_posts_pagination( array(
									'mid_size'		=> 2,
									'prev_text'		=> __('&larr; Previous', 'textdomain'),
									'next_text'		=> __('Next &rarr;', 'textdomain'),
								)); else :
									get_template_part( 'template-parts/content', 'none' );
								endif; ?>
							</div><!--.col-md-8-->
							<?php
							if (is_category('careers') ) : //if the post is a Project
								dynamic_sidebar('sidebar-careers');  //get sidebar-projects.php
								else : //if it's any other category
									get_sidebar('archive'); //get the default sidebar
								endif; ?>
							</div><!--.row-->
						</main><!-- #main -->
					</div><!-- #primary -->

				<?php get_footer();?>
