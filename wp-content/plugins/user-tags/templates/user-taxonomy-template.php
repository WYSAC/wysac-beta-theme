<?php
/**
* The template for displaying Custom User taxonomies
* @author Umesh Kumar
* @subpackage Custom User Taxonomy Plugin
*
* Edited and customized - September 29, 2016
*/
get_header(); ?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="row">
				<header class="page-header col-md-12">
					<?php $taxonomy = get_taxonomy( get_query_var( 'taxonomy' ) );
								$term     = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
					<h1 class="page-title"> <?php
					echo $term->name
					/* echo apply_filters( 'ut_template_heading', sprintf( '%s: %s', __( $taxonomy->labels->name, WP_UT_TRANSLATION_DOMAIN ), __( $term->name, WP_UT_TRANSLATION_DOMAIN ) ) ); */
					?> </h1>


					<h2 class="taxonomy-description">page content</h2>
				</header>
			</div><!--.row-->
			<div class="expert-topic-filters row">
				<h4 style="text-align:center;">View people with expertise in ... </h4>
							<?php $terms = get_terms('expert_areas'); //get the list of expert areas for experts
							echo '<ul class="tax-list">';
							echo '<li><a href="'.get_site_url().'/experts" class="filter-view-all">View All</a></li>';
							foreach ($terms as $term) { //put them in a list
								echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
							}
							echo '</ul><div class="clear-both"></div>';?>
			</div><!-- .expert-topic-filters -->
			<?php
			$term_id = get_queried_object_id();
			$term    = get_queried_object();

			$users   = get_objects_in_term( $term_id, $term->taxonomy );

			/**
			* Allows to filter user list before displaying it in template
			* can be used for sorting the users as per username
			*/
			$users = apply_filters( 'ut_template_users', $users );
			$template_content = '';
			if ( ! empty( $users ) ) {
				?>
				<div id="ut-content" class="expert-archive-photos row">
					<?php
					foreach ( $users as $user_id ) {
						$c =
						'<div class="col-md-3 all-experts-user">' .
						get_avatar( $user_id, '96' ) .
						'<div class="all-experts-info"><a href="' .
						esc_url( get_author_posts_url( $user_id ) ) .
						'"><span class="all-experts-name">' .
						get_the_author_meta( 'display_name', $user_id ) .
						'</span><br/><span class="all-experts-title">' .
						get_field( 'job_title', 'user_', $user_ID ) . //this doesn't work and I'm not sure why
						'</span></a></div> <div class="ut-description">' .
						wpautop( /*get_the_author_meta( 'description', $user_id )*/ ) .
						'</div></div>';
						$template_content .= apply_filters( 'ut_tepmplate_content', $c, $user_id );
					}
					echo $template_content; ?>
			</div>
			<?php
		} else {
			$content = "<p>No Users found.</p>";
			echo apply_filters( 'ut_template_content_empty', __( $content ) );
		} ?>
	</main>
	<!-- #content -->
</div><!-- #primary -->
</div><!--.container-->
<?php get_footer(); ?>
