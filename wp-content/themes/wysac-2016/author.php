<?php
/**
* The template for displaying a single author pages.
*
* @link https://codex.wordpress.org/Author_Templates
*
* @package WYSAC_Beta
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		// get's the author's name/ID of the current page as a variable to use elsewhere on this page
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

		// Create variables for the custom fields to ask about them later
		$field_skills_trainings 		= get_field('skills_trainings', $curauth);
		$field_pubs_books 					= get_field('pubs_books', $curauth);
		$field_pubs_journals 				= get_field('pubs_journals', $curauth);
		$field_pubs_presentations 	= get_field('pubs_presentations', $curauth);
		$field_twitter_username 		= get_field('twitter_username', $curauth );
		$field_facebook_profile_url = get_field('facebook_profile_url', $curauth );
		$field_linkedin_profile 		= get_field('linkedin_profile', $curauth );
		$field_awards								= get_field('awards', $curauth);
		$field_memberships			 		= get_field('memberships', $curauth );
		$field_education						= get_field('degree', $curauth);


		?>
		<div class="row">
			<header class="page-header col-md-12">
				<img src="<?php echo get_wp_user_avatar_src ($user_id, 'profile-image'); ?>" class="center-block img-circle" />
				<!-- NAME AND JOB TITLE
				=================================== -->
				<h1 class="page-title"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h1>
				<h2 class="taxonomy-description"><?php echo $curauth->jobtitle ?></h2>
			</header><!--.col-md-12-->
		</div>
		<div class="row">
			<div class="page-content col-md-8">
				<!-- BIOGRAPHY
				=================================== -->
				<?php if (! empty ($curauth->user_description ) ) { ?>
					<div class="expert-profile-section">
						<h3>About <?php echo $curauth->first_name; ?></h3>
						<p><?php echo $curauth->user_description; ?></p>
					</div>
					<?php } ?>
					<div class="expert-profile-section">
						<!-- PUBLICATIONS
						=================================== -->
						<?php if ( ! empty ( $field_pubs_books || $field_pubs_journals) ) {
							// if there are any of the publications fields with values, print the heading ?>
							<h3 class="expert-profile-heading">Publications</h3>
							<?php }  //Now, let's print each one individually if they exist ?>
							<!-- BOOKS -->
							<?php if( ! empty( $field_pubs_books ) ) { ?>
								<h4>Books</h4>
								<p><?php echo $field_pubs_books ?></p>
								<?php } ?>
								<!-- JOURNALS -->
								<?php if( ! empty( $field_pubs_journals ) ) { ?>
									<h4>Journals and Magazines</h4>
									<p><?php echo $field_pubs_journals ?></p>
									<?php } ?>
								</div>
								<div class="expert-profile-section">
									<!-- PRESENTATIONS
									=================================== -->
									<?php // if there are presentations fields with values, print the heading and the values
									if( ! empty( $field_pubs_presentations) ) { ?>
										<h3 class="expert-profile-heading">Presentations</h3>
										<p><?php echo $field_pubs_presentations ?></p>
										<?php } ?>
									</div>

									<!-- PROJECTS AND PUBLICATIONS
									=================================== -->
									<div class="expert-profile-section">
										<!-- The Loop -->

										<?php if ( have_posts() ) : ?>
											<h3 class="expert-profile-heading">Projects</h3>
											<?php	while ( have_posts() ) : the_post(); ?>
												<div class="row archive-project-entry">
													<div class="col-md-6">
														<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('recent-post-box', array('class'=>'img-responsive')); ?></a>
													</div>
													<div class="col-md-6">
														<p class="entry-metadata"><?php the_time('m.d.Y')?><?php the_terms( $post->ID, 'project_type', ' |  ', '' ); ?></p>
														<a href="<?php the_permalink();?>" class="entry-title-link"><h2><?php the_title(); ?></h2></a>
														<a href="<?php the_permalink(); ?>" class="read-more-link">View Project &rarr;</a>
													</div>
											</div>
												<div class="clear-both"></div>
											<?php endwhile;
										endif; ?>
										<!-- End Loop -->
									</div><!--.expert-profile-section-->
								</div><!--.col-md-8 page-content -->
								<aside class="col-md-4 widget-area author-sidebar">
									<!-- SOCIAL MEDIA ICONS / LINKS
									=================================== -->
									<?php if ( ! empty ( $field_twitter_username || $field_facebook_profile_url || $field_linkedin_profile) ) {
										// if there are any of the social media fields with values, print the heading ?>
										<h4>Social Media</h4>
										<?php }  //Now, let's print each one individually if they exist ?>
										<!-- TWITTER USERNAME -->
										<?php if( ! empty( $field_twitter_username ) ) { ?>
											<a href="http://www.twitter.com/<?php echo $field_twitter_username ?>"><img src="<?php site_url()?>/wp-content/uploads/2016/09/icon_twitter_32x32.png" class="social-icon" /></a>
											<?php }?>
											<!-- FACEBOOK PROFILE  -->
											<?php if( ! empty( $field_facebook_profile_url ) ) { ?>
												<a href="<?php echo $field_facebook_profile_url ?>"><img src="<?php site_url()?>/wp-content/uploads/2016/09/icon_facebook_32x32.png" class="social-icon" /></a>
												<?php }?>
												<!-- LINKED IN  PROFILE  -->
												<?php if( ! empty( $field_linkedin_profile ) ) { ?>
													<a href="<?php echo $field_linkedin_profile ?>"><img src="<?php site_url()?>/wp-content/uploads/2016/09/icon_linkedin_32x32.png" class="social-icon" /></a>
													<?php } ?>
													<!-- EXPERT AREAS / USER TAGS
													=================================== -->
													<?php
													$terms = get_the_terms( $curauth, 'expert_areas');
													if (! empty ($terms) ) { ?>
														<h4 class="sidebar-section-title">Expert Areas</h4>
														<ul class="tax-list">
															<?php
															foreach($terms as $term ) {
																echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
																unset($term);
															}
															echo '</ul><div class="clear-both"></div>';
														} ?>
														<!-- EDUCATION
														=================================== -->
														<?php // if there are presentations fields with values, print the heading and the values
														if( ! empty( $field_degree) ) { ?>
															<h4 class="sidebar-section-title">Education</h4>
															<p><?php echo $field_degree ?></p>
															<div class="clear-both"></div>
															<?php } ?>
															<!-- SKILLS & TRAININGS
															=================================== -->
															<?php if ( ! empty ($field_skills_trainings) ) {
																//if skills and trainings has a value ?>
																<h4 class="sidebar-section-title">Skills & Trainings</h4>
																<p><?php echo $field_skills_trainings?></p>
																<div class="clear-both"></div>
																<?php }?>
																<!-- Associations and Memberships
																=================================== -->
																<?php if (! empty ($field_memberships ) ) { ?>
																	<h4 class="sidebar-section-title">Associations & Memberships</h4>
																	<p><?php echo $field_memberships?></p>
																	<div class="clear-both"></div>
																	<?php } ?>
																	<!-- AWARDS
																	=================================== -->
																	<?php if (! empty ($field_awards ) ) { ?>
																		<h4 class="sidebar-section-title">Awards & Recoginitions</h4>
																		<p><?php echo $field_awards?></p>
																		<div class="clear-both"></div>
																		<?php } ?>

																	</aside>

																</div><!--.row-->
															</main><!-- #main -->
														</div><!-- #primary -->

														<?php
														get_footer();
