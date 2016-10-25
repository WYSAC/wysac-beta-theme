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
	<div class="row">
		<div class="col-md-12 gallery-slider">
			<div class="owl-carousel">
			<?php
			// let's try to build a slider

			$args = array (
			'post_parent' 		=> $post->ID,
			'post_type'				=> 'attachment',
			'orderby'					=> 'menu_order',
			'order'						=> 'ASC',
			'numberposts'			=> 5,
			'post_mine_type'	=> 'gallery'
		);

		if ( $images = get_children($args) ) {
			foreach($images as $image) {
				echo '<div>';
				echo wp_get_attachment_image( $image->ID, 'entry-thumbnail-post', false, array("class" => "img-responsive" ) );
				echo '</div>';
			}
		} ?>
	</div>
		</div><!-- .col-md-12-->
	</div><!---.row-->
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
