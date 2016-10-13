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
				<div class="col-md-12 home-section-title">
					<h2>Projects and Publications</h2>
				</div>
				<?php
				//get posts in Projects but only get the first 6
				$args = array (
				'posts_per_page'	=>		'6',
				'category_name'		=>		'projects');
				//Query using these arguments
				$the_query = new WP_Query($args);
				//The Loop
				while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
				<div class="col-md-4 col-sm-6">
					<div class="recent-post-box">
						<p class="entry-metadata"><?php the_time('m.d.Y')?><?php the_terms( $post->ID, 'project_type', ' |  ', '' ); ?></p>
						<p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('recent-post-box', array('class'=>'img-responsive')); ?></a></p>
						<h2><a href="<?php the_permalink(); ?>" class="entry-title-link"><?php the_title(); ?></a></h2>
						<p><a href="<?php the_permalink(); ?>" class="read-more-link">View Project &rarr;</a></p>
					</div><!--.recent-post-box-->
				</div><!--.col-md-4-->
			<?php endwhile;
			wp_reset_postdata();?>
		</div><!--.container-->
	</section><!--end Recent Posts-->
	<!-- CLIENT MAP
	=================================== -->
	<section class="full-width client-map-box">
		<div class="container">
			<div class="row" >
				<div class="col-md-4">
					<h3 class="text-white">Description of the Map</h3>
				</div>
				<div class="col-md-8">
					<img class="us-map" src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Blank_US_map_borders_labels.svg" />
				</div>
			</div>
		</div>
	</section><!--end Client Map-->
	<section class="full-width call-to-action">
		<!-- CALL TO ACTION
		=================================== -->
		<div class="container-fluid">
			<div class="col-md-6 col-md-offset-1">
				<h1>We help people do awesome things</h1>
			</div>
			<div class="col-md-4">
				<form action="<?php echo get_site_url();?>/contact-wysac">
					<button type="submit" class="btn btn-warning btn-lg center-block">Connect with Us</button>
				</form>
			</div>
		</div>
	</section><!--end Call to Action-->
	<section class="full-width quote-box">
		<div class="container">
			<!-- EXPERT QUOTES
			=================================== -->
			<?php
			//Get a single quote randomly on load
			$args = array (
			'post_type'				=>		'expert-quote',
			'orderby'					=>		'rand',
			'posts_per_page'	=>		'1');
			//Query using these arguments
			$the_query = new WP_Query($args);
			//The Loop
			while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
			<!--Get the Expert's Photo-->
			<div class="col-md-4 col-sm-4 col-xs-12">
				<?php the_post_thumbnail('profile-image', array('class'=>'img-circle pull-right hidden-xs', 'style'=>'margin-right:5rem;') ); ?>
				<?php the_post_thumbnail('profile-image', array('class'=>'img-circle hidden-sm hidden-md hidden-lg center-block') ); ?>
			</div>
			<!--Get the Quote-->
			<div class="col-md-8 col-sm-8 col-xs-12">
				<h5 class="text-white">From Our Experts</h5>
				<h2 class="text-white"><?php the_content(); ?></h2>
				<h4 class="text-white">- <?php the_title(); ?></h4>
			</div>
			<?php
		endwhile;
		wp_reset_postdata();
		?>
	</div><!--.container-->
</section><!--end Expert Quotes-->
<section class="full-width">
	<!-- SITE TAGS
	=================================== -->
	<div class="container site-tags">
		<div class="col-md-12 home-section-title">
			<h2>Our experts are knowledgable in ... </h2>
		</div>
		<div class="row tags-container">
			<?php
			$args = array (
			'hide_empty'		=> false,
			'get'						=> 'all',
		);
		$tags = get_tags($args);
		$html = '<div class="post_tags">';
		foreach ( $tags as $tag ) {
			if ($tag->count < 1) {
				$tag_link = get_tag_link( $tag->term_id );

				$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug} col-md-3 col-sm-12 col-xs-12 site-tag-box tag-small'>";
				$html .= "{$tag->name}</a>";
			} elseif ($tag->count >=1 && $tag->count <=3) {
				$tag_link = get_tag_link( $tag->term_id );

				$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug} col-md-3 col-sm-12 col-xs-12  site-tag-box tag-medium'>";
				$html .= "{$tag->name}</a>";
			} else {
				$tag_link = get_tag_link( $tag->term_id );

				$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug} col-md-3 col-sm-12 col-xs-12  site-tag-box tag-large'>";
				$html .= "{$tag->name}</a>";
			}
		}
		$html .= '</div>';
		echo $html;
		?>
	</div>
</div>
</section><!-- end Site Tags -->
<section class="full-width media-mention-box">
	<!-- MEDIA MENTIONS
	=================================== -->
	<div class="container">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<img src="<?php echo get_site_url();?>/wp-content/uploads/2016/09/iconmonstr-newspaper-3-240.png" class="media-mention-icon center-block hidden-xs"/>
			<img src="<?php echo get_site_url();?>/wp-content/uploads/2016/09/iconmonstr-newspaper-3-240.png" class=" hidden-sm hidden-md hidden-lg center-block" width=155/>
		</div>
		<div class="col-md-8 col-sm-8 col-xs-12">
			<?php
			//Get a single media media-mention randomly on load
			$args = array (
			'post_type'				=>		'media-mention',
			'orderby'					=>		'rand',
			'posts_per_page'	=>		'1');
			$the_query = new WP_Query($args);
			//The Loop for finding a post
			while ($the_query -> have_posts()) : $the_query -> the_post();
			// Get the stored values of the source_name and source_url metaboxes.
			// 'true' calls the single piece of data, where 'false' or blank calls an array
			$meta_value_name = get_post_meta (get_the_ID(), 'source_information_source_name', 'true');
			// Get the stored values of the source_url and source_url metaboxes
			$meta_value_url = get_post_meta (get_the_ID(), 'source_information_source_url', 'true'); ?>

			<h5 class="text-white">Research in the Media  |  <?php the_time('m.d.Y') ?></h5>
			<a href="<?php echo $meta_value_url ?>"><h1 class="text-white"><?php the_title(); ?> &rarr;</h1></a>
			<a href="<?php echo $meta_value_url ?>"><h4 class="text-white"><?php echo $meta_value_name ?></h4></a>
			<?php
		endwhile;
		wp_reset_postdata();
		?>

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
