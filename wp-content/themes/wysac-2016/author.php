<?php
/**
* The template for displaying a single author pages.
*
* @link https://codex.wordpress.org/Author_Templates
*
* @package WYSAC_Beta
*/

get_header(); ?>

<div id="primary" class="content-area container">
	<main id="main" class="site-main" role="main">

		<?php
		// get's the author's name/ID of the current page as a variable to use elsewhere on this page
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

		?>

		<header class="page-header col-md-12">
			<?php echo get_wp_user_avatar ($user_id, 'profile-image'); ?>
			<!-- NAME AND JOB TITLE
			=================================== -->
			<h1 class="page-title"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h1>
			<h2 class="taxonomy-description"><?php the_field('job_title', $curauth); ?></h2>
		</header><!--.col-md-12-->
		<div class="row">
			<div class="page-content col-md-8">
				<!-- BIOGRAPHY
				=================================== -->
				<div class="expert-profile-section">
					<h3>About <?php echo $curauth->nickname; ?></h3>
					<p><?php echo $curauth->user_description; ?></p>
					<p><?php the_field('skills_trainings', $curauth); ?></p>
				</div>
				<!-- PROJECTS AND PUBLICATIONS
				=================================== -->
				<div class="expert-profile-section">
					<h3>Projects & Publications</h3>
					<p><?php echo $curauth->user_description; ?></p>
				</div>
				<!-- RECENT POSTS
				=================================== -->
				<div class="expert-profile-section">
					<ul>
						<!-- The Loop -->

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<li>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
									<?php the_title(); ?></a>,
									<?php the_time('d M Y'); ?> in <?php the_category('&');?>
								</li>

							<?php endwhile; else: ?>
								<p><?php _e('No posts by this author.'); ?></p>

							<?php endif; ?>

							<!-- End Loop -->

						</ul>
					</div>
				</div><!--.col-md-8 page-content -->
				<aside class="col-md-4 widget-area">
					<h4>Social Media</h4>

					<h4>Expert Areas</h4>
					<ul class="tax-list">
					</ul>
					<h4>Publications</h4>
					<p><?php the_field('pubs_books', $curauth); ?></p>
					<p><?php the_field('pubs_journals', $curauth); ?></p>
					<h4>Presentations</h4>
					<p><?php the_field('pubs_presentations', $curauth); ?></p>
				</aside>
			</div><!--.row-->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_footer();
