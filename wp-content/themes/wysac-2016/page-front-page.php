<?php
/**
 * The template for the front page.

 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WYSAC_Beta
 */


get_header('home'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="full-width">
					<div class="container">
						<!-- MOST RECENT POSTS
						=================================== -->
								<h1>Most Recent Posts</h1>
										<?php // Define our WP Query Parameters
										$the_query = new WP_Query( 'posts_per_page=5' );
										// Start our WP Query
										while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
												<div class="col-md-4">
													<div class="recent-post-box">
														<small><?php the_time('m.d.Y')?></small>
														<p><?php the_post_thumbnail('recent-post-box'); ?></p>
														<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
														<p><a href="<?php the_permalink(); ?>"><span class="glyphicon glyphicon-folder-open"></span>  View Project</a></p>
												</div><!--.recent-post-box-->
											</div><!--.col-md-4-->
										<?php endwhile;
													wp_reset_postdata();?>
					</div><!--.container-->
				</section><!--end Recent Posts-->
				<!-- CLIENT MAP
				=================================== -->
				<section class="full-width" style="background-color:gray;">
					<div class="container">
						<div class="row" >
								<div class="col-md-4">
									<h3>Description of the Map</h3>
							</div>
							<div class="col-md-8">
								<img src="http://placehold.it/500x300" class="pull-right"/>
							</div>
						</div>
					</div>
				</section><!--end Client Map-->
				<section class="full-width call-to-action">
					<!-- CALL TO ACTION
					=================================== -->
					<div class="container">
						<div class="col-md-8">
							<h3>We help people do awesome things</h3>
						</div>
						<div class="col-md-4">
								<a class="btn btn-primary pull-right" href="#" role="button">Contact Us</a>
							</div>
				</div>
			</section><!--end Call to Action-->
			<section class="full-width">
					<div class="container">
					<!-- EXPERT QUOTES
					=================================== -->


				</div><!--.container-->
			</section><!--end Expert Quotes-->
			<section class="full-width">
				<!-- SITE TAGS
				=================================== -->
				<div class="container">
						<h3>Site Tags</h3>
						<p> Get all the tags and put them in cool boxes</p>
				</div>
			</section><!-- end Site Tags -->
			<section class="full-width" style="background-color:green;">
				<!-- MEDIA MENTIONS
				=================================== -->
				<div class="container">
					<div class="col-md-2">
						<img src="http://placehold.it/60x60"/>
					</div>
					<div class="col-md-10">
						<h5>Research in the Media</h5>
						<h1>Title of the Media Mention</h1>
					</div>
				</div>
			</section><!--end Media Mentions-->
			<section>
				<!-- FRONT PAGE CONTENT
				=================================== -->
				<div class="container">
					<?php //Get the content of the Front Page and put it here
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile; // End of the loop.
					?>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//there's no sidebar on the homepage
get_footer();
