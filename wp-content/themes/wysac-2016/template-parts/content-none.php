<?php
/**
* Template part for displaying a message that posts cannot be found.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WYSAC_Beta
*/

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'wysac-beta' ); ?></h1>
	</header><!-- .page-header -->
	<div class="page-content col-md-8 col-sm-12">
		<?php if ( is_search() ) : ?>
			<!-- SEARCH WITH NO RESULTS
			=================================== -->
				<div class="col-md-6 col-sm-6">
					<img src="<?php site_url();?>/wp-content/uploads/2016/10/spyglass_300x420.png" class="img img-responsive spyglass center-block" />
				</div>
				<div class="col-md-6 col-sm-6">
					<h2>Sorry. Nothing matched your search terms</h2>
					<p>Why don't you try again?</p>
					<?php get_search_form(); ?>
				</div>
					<?php else : ?>
					<!-- ALL OTHER MISSING THINGS
					=================================== -->

					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wysac-beta' ); ?></p>
					<?php
					get_search_form();
				endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
