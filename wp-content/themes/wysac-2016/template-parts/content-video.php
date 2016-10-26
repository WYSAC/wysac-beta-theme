<?php
/**
* Template part for displaying video posts.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WYSAC_Beta
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	//check to see if the post has a featured image
	if ( ! in_category('projects') ) { ?>

			<div class="row">
				<div class="col-md-12 entry-thumbnail">
					<?php the_post_thumbnail('entry-thumbnail-post', array('class'=>'img-responsive') ); ?>
				</div><!-- .col-md-12 .entry-thumbnail-->
			</div><!---.row-->
			<?php } else { ?>
				<div class="clear-both no-header"></div>
			<?php } ?>
	<div class="col-md-8">
		<header class="entry-header">
			<?php
			if ( is_single() && 'post' === get_post_type() ) {?>
				<div class="entry-meta">
					<p class="entry-metadata"><?php the_time('m.d.Y')?><?php the_terms( $post->ID, 'project_type', ' |  ', '' ); ?></p>
				</div><!--entry-meta-->
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} ?>
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


	<footer class="entry-footer">
		<?php //wysac_beta_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div><!-- .col-md-8-->
</article><!-- #post-## -->
