<?php
/**
* Template part for displaying image format posts.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WYSAC_Beta
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="row">
		<?php
		//check to see if the post has a featured image
		if ( has_post_thumbnail() ) { ?>
			<div class="col-md-12 entry-thumbnail hidden-xs">
				<?php the_post_thumbnail('entry-thumbnail-post', array('class' => 'img-responsive')); ?>
			</div>
			<div class="col-md-12 entry-thumbnail hidden-sm hidden-md hidden-lg">
				<?php the_post_thumbnail('recent-post-box', array('class' => 'img-responsive')); ?>
			</div>
			<?php } ?>
		</div><!-- .col-md-12 .entry-thumbnail-->
	</div><!---.row-->
	<div class="col-md-8">
		<header class="entry-header">
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<p class="entry-metadata"><?php the_time('m.d.Y')?><?php the_terms( $post->ID, 'project_type', ' |  ', '' ); ?></p>
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
