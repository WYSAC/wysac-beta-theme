<?php
/**
* Template part for displaying results in search pages.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WYSAC_Beta
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
	<div class="row archive-project-entry">
		<div class="col-md-6">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('recent-post-box', array('class'=>'img-responsive')); ?></a>
		</div><!--.col-md-6-->
		<div class="col-md-6">
				<?php if ( 'post' === get_post_type() ): ?>
						<p class="entry-metadata"><?php the_time('m.d.Y')?><?php the_terms( $post->ID, 'project_type', ' |  ', '' ); ?></p>
					<?php endif; ?>
					<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark" class="entry-title-link">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<a href="<?php the_permalink(); ?>" class="read-more-link">View Project &rarr;</a>
			</div><!--.col-md-6-->
		</div><!--.row .archive-project-entry -->
	</article><!-- #post-## -->
