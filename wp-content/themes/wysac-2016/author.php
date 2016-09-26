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
	    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	    ?>
	    <h2>About: <?php echo $curauth->nickname; ?></h2>
	    <dl>
	        <dt>Website</dt>
	        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
	        <dt>Profile</dt>
	        <dd><?php echo $curauth->user_description; ?></dd>

	    </dl>


	    <h2>Posts by <?php echo $curauth->nickname; ?>:</h2>

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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
