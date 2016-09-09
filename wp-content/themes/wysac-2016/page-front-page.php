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
								<h1>Most Recent Posts</h1>
					</div>
				</section>
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
				</section>
				<section class="full-width call-to-action" style="background-color:red;">
					<div class="container">
					<h3>We help people do awesome things</h3>
					<a class="btn btn-primary pull-right" href="#" role="button">Contact Us</a>
				</div>
			</section>
			<section class="full-width">
			</section>
			<section class="full-width">
				<div class="container">
						<h3>Site Tags</h3>
						<p> Get all the tags and put them in cool boxes</p>
				</div>
			</section>
			<section class="full-width" style="background-color:green;">
				<div class="container">
					<div class="col-md-2">
						<img src="http://placehold.it/60x60"/>
					</div>
					<div class="col-md-10">
						<h5>Research in the Media</h5>
						<h1>Title of the Media Mention</h1>
					</div>
				</div>
			</section>
			<section>
				<div class="container">
					<?php
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
