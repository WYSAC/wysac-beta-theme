<?php
/**
* Template part for displaying gallery format posts.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WYSAC_Beta
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<!-- Out carousel wrapper.  Must have an ID -->
	<div id="carousel-gallery-post" class="carousel slide gallery-slider-container hidden-xs" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-gallery-post" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-gallery-post" data-slide-to="1"></li>
			<li data-target="#carousel-gallery-post" data-slide-to="2"></li>
		</ol>
		<!-- Wrapper for Slides -->
		<div class="carousel-inner" role="list-box">
			<?php
			// Set all the settings for getting the post attachments
			$args = array (
			'post_parent' 		=> $post->ID,
			'post_type'				=> 'attachment',
			'orderby'					=> 'menu_order',
			'order'						=> 'ASC',
			'numberposts'			=> 5,
			'post_mine_type'	=> 'gallery'
		);
		// variable for setting one of the slides to active
		$isActive = ' active';
		$i=0;
		// if the post has attachments
		if ( $images = get_children($args) ) {
			foreach($images as $image) :
				// if it's the first one
				if ($i==0) {
					// add the class "active", set above
					echo '<div class="item'.$isActive.'">';
					echo wp_get_attachment_image( $image->ID, 'entry-thumbnail-post' );
					// ID, 'class from image sizes (defaults to thumbnail)', should it be treated like an icon? defaults false, array ("class") options
					echo '</div>';
				} else {
					// if it's not first, don't add the class
					echo '<div class="item">';
					echo wp_get_attachment_image( $image->ID, 'entry-thumbnail-post' );
					echo '</div>';
				}
				$i++;
			endforeach;
			} ?>
	</div><!-- .carousel-inner -->
	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-gallery-post" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-gallery-post" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div><!--- #carousel-gallery-post .carousel .slide-->
<div class="col-md-12 entry-thumbnail hidden-sm hidden-md hidden-lg">
	<?php
	//check to see if the post has a featured image
	if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_post_thumbnail_url(); ?>"> <?php the_post_thumbnail('recent-post-box', array('class' => 'img-responsive')); ?> </a>
		<?php } ?>
</div><!-- .col-md-12 .entry-thumbnail-->
<div class="col-md-8">
	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<p class="entry-metadata"><?php the_time('m.d.Y')?><?php the_terms( $post->ID, 'project_type', ' |  ', ', ' ); ?></p>
			</div><!--entry-meta-->
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( sprintf(
		/* translators: %s: Name of current post. */
		wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wysac-beta' ), array( 'span' => array( 'class' => array() ) ) ),
		the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
		?>
	</div><!-- .entry-content -->
</div><!--.col-md-8-->
</article><!-- #post-## -->
