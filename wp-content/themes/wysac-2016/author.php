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

		// Create variables for the custom fields to ask about them later
		$field_job_title 						= get_field('job_title', $curauth);
		$field_skills_trainings 		= get_field('skills_trainings', $curauth);
		$field_pubs_books 					= get_field('pubs_books', $curauth);
		$field_pubs_journals 				= get_field('pubs_journals', $curauth);
		$field_pubs_presentations 	= get_field('pubs_presentations', $curauth);
		$field_twitter_username 		= get_field('twitter_username', $curauth );
		$field_facebook_profile_url = get_field('facebook_profile_url', $curauth );
		$field_linkedin_profile 		= get_field('linkedin_profile', $curauth );
		$field_awards								= get_field('awards', $curauth);
		$field_memberships			 		= get_field('memberships', $curauth );


		?>

		<header class="page-header col-md-12">
			<?php echo get_wp_user_avatar ($user_id, 'profile-image'); ?>
			<!-- NAME AND JOB TITLE
			=================================== -->
			<h1 class="page-title"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h1>
			<h2 class="taxonomy-description"><?php echo $field_job_title?></h2>
		</header><!--.col-md-12-->
		<div class="row">
			<div class="page-content col-md-8">
				<!-- BIOGRAPHY
				=================================== -->
				<div class="expert-profile-section">
					<h3>About <?php echo $curauth->nickname; ?></h3>
					<p><?php echo $curauth->user_description; ?></p>
					<?php if ( ! empty ($field_skills_trainings) ) {
						//if skills and trainings has a value ?>
						<h4>Skills and Trainings</h4>
						<p><?php echo $field_skills_trainings?></p>
						<?php } ?>
				</div>
				<!-- PROJECTS AND PUBLICATIONS
				=================================== -->
				<div class="expert-profile-section">
					<h3>Projects & Publications</h3>
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
					<!-- SOCIAL MEDIA ICONS / LINKS
					=================================== -->
					<?php if ( ! empty ( $field_twitter_username || $field_facebook_profile_url || $field_linkedin_profile) ) {
						// if there are any of the social media fields with values, print the heading ?>
						<h4>Social Media</h4>
						<?php }  //Now, let's print each one individually if they exist ?>
						<!-- TWITTER USERNAME -->
						<?php if( ! empty( $field_twitter_username ) ) { ?>
							<a href="http://www.twitter.com/<?php echo $field_twitter_username ?>"><?php echo $field_twitter_username ?></a>
								<?php }?>
						<!-- FACEBOOK PROFILE  -->
						<?php if( ! empty( $field_facebook_profile_url ) ) { ?>
							<a href="<?php echo $field_facebook_profile_url ?>">Facebook</a>
								<?php }?>
						<!-- LINKED IN  PROFILE  -->
						<?php if( ! empty( $field_linkedin_profile ) ) { ?>
							<a href="<?php echo $field_linkedin_profile ?>">LinkedIn Profile</a>
								<?php }?>
					<!-- EXPERT AREAS / USER TAGS
					=================================== -->
					<h4>Expert Areas</h4>
					<ul class="tax-list">
					</ul>
					<!-- PUBLICATIONS
					=================================== -->
					<?php if ( ! empty ( $field_pubs_books || $field_pubs_journals) ) {
						// if there are any of the social media fields with values, print the heading ?>
						<h4>Publications</h4>
						<?php }  //Now, let's print each one individually if they exist ?>
						<!-- BOOKS -->
						<?php if( ! empty( $field_pubs_books ) ) { ?>
								<h5>Books</h5>
								<p><?php echo $field_pubs_books ?></p>
								<?php } ?>
						<!-- JOURNALS -->
						<?php if( ! empty( $field_pubs_journals ) ) { ?>
								<h5>Journals and Magazines</h5>
								<p><?php echo $field_pubs_journals ?></p>
								<?php } ?>
					<!-- PRESENTATIONS
					=================================== -->
					<?php // if there are presentations fields with values, print the heading and the values
							if( ! empty( $field_pubs_presentations) ) { ?>
								<h4>Presentations</h4>
								<p><?php echo $field_pubs_presentations ?></p>
								<?php } ?>
				</aside>
			</div><!--.row-->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_footer();
