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
				<div class="row">
					<div class="col-md-12 home-section-title">
						<h2>Projects and Publications</h2>
					</div>
				</div>
				<div class="row" id="ms-container">
					<?php
					//get posts in Projects but only get the first 6
					$args = array (
					'posts_per_page'	=>		'6',
					'category_name'		=>		'projects');
					//Query using these arguments
					$the_query = new WP_Query($args);
					//The Loop
					while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
					<div class="ms-item col-md-4 col-sm-6">
						<div class="recent-post-box">
							<p class="entry-metadata"><?php the_time('m.d.Y')?><?php the_terms( $post->ID, 'project_type', ' |  ', '' ); ?></p>
							<p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('recent-post-box', array('class'=>'img-responsive')); ?></a></p>
							<h2><a href="<?php the_permalink(); ?>" class="entry-title-link"><?php the_title(); ?></a></h2>
							<p><a href="<?php the_permalink(); ?>" class="read-more-link">View Project &rarr;</a></p>
						</div><!--.recent-post-box-->
					</div><!--.col-md-4-->
					<div class="clear-fix"></div>
				<?php endwhile;
				wp_reset_postdata();?>
			</div>
		</div><!--.container-->
	</section><!--end Recent Posts-->
	<!-- CLIENT MAP
	=================================== -->
	<section class="full-width client-map-box">
		<div class="container">
			<div class="col-sm-4 col-md-offset-1">
				<h5 class="text-white">Our Reach</h5>
				<h2 class="text-white">WYSAC works with clients in Wyoming, the west, and beyond.  <br /><br />We work with non-profits, state and local agencies, and universities to generate research to improve lives.</h2>
			</div>
			<div class="col-sm-7">
				<img class="us-map img img-responsive" src="<?php site_url(); ?>/wp-content/uploads/2016/10/16.10.24_wysac-beta_client-map.png" />
			</div>
		</div>
	</section><!--end Client Map-->
	<section class="full-width call-to-action">
		<!-- CALL TO ACTION
		=================================== -->
		<div class="container">
			<div class="col-md-8">
				<h1 class="montserrat">We help people do awesome things</h1>
			</div>
			<div class="col-md-4">
				<form action="<?php echo get_site_url();?>/contact-wysac">
					<button type="submit" class="btn btn-primary btn-lg center-block">Connect with Us</button>
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
			<h2>Our research covers a variety of topics including ... </h2>
		</div>
		<div class="row tags-container">
			<?php
			$args = array (
			'hide_empty'		=> false,
			'get'						=> 'all',
			'number'				=> 8,
			'orderby'				=> 'count',
			'order'					=> 'ASC'
		);
		$tags = get_tags($args);
		$html = '<div class="post_tags"><ul class="tag-boxes">';
		foreach ( $tags as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );
				$html .= "<li class='col-md-3 col-sm-6 col-xs-12'><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}  site-tag-box tag-small'>";
				$html .= "{$tag->name}</a></li>";
		}
		$html .= '</ul><div class="clearfix"></div></div>';
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
			<img src="<?php echo get_site_url();?>/wp-content/uploads/2016/09/iconmonstr-newspaper-3-240.png" class=" hidden-sm hidden-md hidden-lg center-block" width=130/>
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
			<a href="<?php echo $meta_value_url ?>"  target="_blank"><h1 class="text-white"><?php the_title(); ?> <span class="glyphicon glyphicon-new-window small"></span></h1></a>
			<a href="<?php echo $meta_value_url ?>"  target="_blank"><h4 class="text-white"><?php echo $meta_value_name ?></h4></a>
			<?php
		endwhile;
		wp_reset_postdata();
		?>

	</div>
</div>
</section><!--end Media Mentions-->
<section class="location">
	<!-- FRONT PAGE CONTENT
	=================================== -->
	<div class="container">
		<?php //Get the content of the Front Page and put it here
		// while ( have_posts() ) : the_post();
		// get_template_part( 'template-parts/content', 'page' );
		// endwhile; // End of the loop.
		?>
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<?php echo do_shortcode('[google_maps id="280"]'); ?>
			</div><!--.col-md-6-->
			<div class="col-md-6 col-sm-6 location-info">
				<h2>Wyoming Survey & Analysis Center <br/>at the University of Wyoming</h2>
				<p><span class="glyphicon glyphicon-envelope"></span> 1000 E University Ave, Laramie, WY 82070</p>
				<p><span class="glyphicon glyphicon-map-marker"></span> 406 S 21st St., Laramie, WY 82070 </p>
				<p><span class="glyphicon glyphicon-earphone"></span> 307.766.2189 </p>
				<br/>
				<form action="<?php echo get_site_url();?>/contact-wysac">
					<button type="submit" class="btn btn-default">Connect with Us</button>
				</form>
			</div><!--.col-md-6-->
		</div><!--.row-->
	</div>
</section><!--.location-->
</main><!-- #main -->
</div><!-- #primary -->

<script type="text/javascript">

jQuery(window).load(function() {

	//This is only used here, so the script will also live here

	var container = document.querySelector('#ms-container');
	var msnry = new Masonry( container, {
		itemSelector: '.ms-item',
		columnWidth: '.ms-item',
	});
});
</script>

<?php
//there's no sidebar on the homepage
get_footer();
