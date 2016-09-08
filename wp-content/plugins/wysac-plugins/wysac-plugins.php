<?php
/*
Plugin Name: Site Plugins for WYSAC Beta
Description: Site specific functions for www.uwyo.edu/wysac
Author: Jessica Schillinger
Date: September 8, 2016
URL: http://www.uwyo.edu/wysac
*/

/*--------------------------------------------------------------

* * TABLE OF CONTENTS * *

## Custom User Profile Fields
## Custom Taxonomies
   - Add Clients
   - Change Tags to Topics
## Media Mention Post Type
   - Custom metaboxes for media mention posts
     ~ Source Name / Media Outlet
     ~ URL to source
## Expert Quote Post Type

* * * * *
----------------------------------------------------------------*/

/*--------------------------------------------------------------
## Custom User Profile Fields
----------------------------------------------------------------*/

// Add the actions
 add_action( 'show_user_profile', 'wysac_beta_extra_user_fields' );
 add_action( 'edit_user_profile', 'wysac_beta_extra_user_fields' );

// Add Custom Fields on User Profile in the Admin
 function wysac_beta_extra_user_fields( $user ) {
   ?>

 	<h3>Social Media Links</h3>
 	<table class="form-table">
 		<tr> <!-- TWITTER PROFILE -->
 			<th><label for="twitter">Twitter</label></th>
 			<td>
 				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
 				<span class="description">Please enter your Twitter username.</span>
 			</td>
 		</tr>
		<tr><!-- FACEBOOK PROFILE -->
 			<th><label for="facebook">Facebook</label></th>
 			<td>
 				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text code" /><br />
 				<span class="description">Please enter the link to your Facebook profile</span>
 			</td>
 		</tr>
		<tr><!-- LINKED IN PROFILE -->
			<th><label for="linkedin">LinkedIn</label></th>
			<td>
				<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text code" /><br />
				<span class="description">Please enter the link to your LinkedIn profile</span>
			</td>
		</tr>
 	</table><!-- end Social Media Links table-->
	<h3>Education & Experience</h3>
	<table class="form-table">
		<tr>
				<th><label for="education">Educational History</label></th>
				<td>
					<textarea name="education" id="education" rows="5" cols="30" value="<?php echo esc_attr(get_the_author_meta('education', $user->ID) ); ?>" class="regular-text" ></textarea></br/><span class="description">Description TK</span>
				</td>
		</tr>
		<tr>
				<th><label for="work-history">Work History</label></th>
				<td>
					<textarea name="work-history" id="work-history" rows="5" cols="30" value="<?php echo esc_attr(get_the_author_meta('work-history', $user->ID) ); ?>" class="regular-text" ></textarea></br/><span class="description">Description TK</span>
				</td>
		</tr>
	</table><!-- end Education & Experience -->
 <?php };

//Save the data to the database

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

			if ( !current_user_can( 'edit_user', $user_id ) )
				return false;

			/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
			update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
      update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
      update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
      update_usermeta( $user_id, 'education', $_POST['education'] );
      update_usermeta( $user_id, 'work-history', $_POST['work-history'] );
};

/*--------------------------------------------------------------
## Custom Taxonomies
----------------------------------------------------------------*/

// CLIENTS TAXONOMY //

//hook into the init action and call create_clients_taxonomy when it fires
add_action( 'init', 'create_clients_taxonomy', 0 );

//create a custom taxonomy name

function create_clients_taxonomy() {

// Add new taxonomy
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Clients', 'taxonomy general name' ),
    'singular_name' => _x( 'Client', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Clients' ),
    'all_items' => __( 'All Clients' ),
    'parent_item' => __( 'Parent Client' ),
    'parent_item_colon' => __( 'Parent Client:' ),
    'edit_item' => __( 'Edit Client' ),
    'update_item' => __( 'Update Client' ),
    'add_new_item' => __( 'Add New Client' ),
    'new_item_name' => __( 'New Client Name' ),
    'menu_name' => __( 'Clients' ),
  );

// Now register the taxonomy

  register_taxonomy('clients',array('post'), array(
    'hierarchical' => true, //make it hierarchical like categories
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'client' ),
  ));

} //end create_clients_taxonomy

// CHANGE NAME OF TAG TAXONOMY TO TOPICS //

//add the action
add_action('init', 'change_tag_label');

//Open the Tags and change the labels

function change_tag_label() {
  global $wp_taxonomies;
  $wp_taxonomies ['post_tag']->labels = (object)array(
    'name' => 'Topics',
    'menu_name' => 'Topics',
    'singular_name' => 'Topic',
    'search_items' => 'Search Topics',
    'popular_items' => 'Popular Topics',
    'all_items' => 'All Topics',
    'parent_item' => null, // Tags aren't hierarchical
    'parent_item_colon' => null,
    'edit_item' => 'Edit Topic',
    'update_item' => 'Update Topic',
    'add_new_item' => 'Add new Topic',
    'new_item_name' => 'New Topics',
    'separate_items_with_commas' => 'Separata topics with commas',
    'add_or_remove_items' => 'Add or remove topic',
    'choose_from_most_used' => 'Choose from the most used Topics',
  );

  $wp_taxonomies['post_tag']->label = 'Topics';
}; //end topics_tags functions



/*--------------------------------------------------------------
## Media Mention Post Type
----------------------------------------------------------------*/
// Register Custom Post Type
function wysac_media_mention() {

	$labels = array(
		'name'                  => _x( 'Media Mentions', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Media Mention', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Media Mentions', 'text_domain' ),
		'name_admin_bar'        => __( 'Media Mention', 'text_domain' ),
		'archives'              => __( 'Media Mention Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Media Mention:', 'text_domain' ),
		'all_items'             => __( 'All Media Mentions', 'text_domain' ),
		'add_new_item'          => __( 'Add New', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Media Mention', 'text_domain' ),
		'edit_item'             => __( 'Edit Media Mention', 'text_domain' ),
		'update_item'           => __( 'Update Media Mention', 'text_domain' ),
		'view_item'             => __( 'View Media Mention', 'text_domain' ),
		'search_items'          => __( 'Search Media Mentions', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Media Mentions list', 'text_domain' ),
		'items_list_navigation' => __( 'Media Mentions list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Media Mentions items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Media Mention', 'text_domain' ),
		'description'           => __( 'Research, people and projects mentioned elsewhere', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'taxonomies'            => false,
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-thumbs-up',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'media-mention', $args ); // this name determines the folder in the URL too: site/this-name/post

} //End wysac_media_mention function

// Add Media Mentions as a Post Type

add_action( 'init', 'wysac_media_mention', 0 );


// META BOXES FOR SOURCE INFORMATION //

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function source_information_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function source_information_add_meta_box() {
	add_meta_box(
		'source_information-source-information',
		__( 'Source Information', 'source_information' ),
		'source_information_html',
		'media-mention',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'source_information_add_meta_box' );

function source_information_html( $post) {
	wp_nonce_field( '_source_information_nonce', 'source_information_nonce' ); ?>

	<p><em>Research, people or projects mentioned elsewhere.</em></p>

	<p>
		<label for="source_information_source_name"><?php _e( 'Source Name', 'source_information' ); ?></label><br>
		<input type="text" name="source_information_source_name" id="source_information_source_name" class="regular-text" value="<?php echo source_information_get_meta( 'source_information_source_name' ); ?>"><br/><span class="description">Newpaper, TV station, blog, etc.</span>
	</p>	<p>
		<label for="source_information_source_url"><?php _e( 'Source URL', 'source_information' ); ?></label><br>
		<input type="text" name="source_information_source_url" id="source_information_source_url" class="regular-text code" value="<?php echo source_information_get_meta( 'source_information_source_url' ); ?>"><br/><span class="description">PERMALINK to the specific mention within the source.  Newspaper article online, YouTube video, etc.</span>
	</p><?php
}

function source_information_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['source_information_nonce'] ) || ! wp_verify_nonce( $_POST['source_information_nonce'], '_source_information_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['source_information_source_name'] ) )
		update_post_meta( $post_id, 'source_information_source_name', esc_attr( $_POST['source_information_source_name'] ) );
	if ( isset( $_POST['source_information_source_url'] ) )
		update_post_meta( $post_id, 'source_information_source_url', esc_attr( $_POST['source_information_source_url'] ) );
}
add_action( 'save_post', 'source_information_save' );

/*
	Usage: source_information_get_meta( 'source_information_source_name' )
	Usage: source_information_get_meta( 'source_information_source_url' )
*/


/*--------------------------------------------------------------
## Expert Quote Post Type
----------------------------------------------------------------*/

// Register Custom Post Type
function wysac_expert_quote() {

	$labels = array(
		'name'                  => _x( 'Expert Quotes', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Expert Quote', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Expert Quotes', 'text_domain' ),
		'name_admin_bar'        => __( 'Expert Quotes', 'text_domain' ),
		'archives'              => __( 'Expert Quote Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Expert Quote:', 'text_domain' ),
		'all_items'             => __( 'All Expert Quotes', 'text_domain' ),
		'add_new_item'          => __( 'Add New Expert Quote', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Expert Quote', 'text_domain' ),
		'edit_item'             => __( 'Edit Expert Quote', 'text_domain' ),
		'update_item'           => __( 'Update Expert Quote', 'text_domain' ),
		'view_item'             => __( 'View Expert Quote', 'text_domain' ),
		'search_items'          => __( 'Search Expert Quotes', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Expert quote list', 'text_domain' ),
		'items_list_navigation' => __( 'Expert quote list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Expert quotes items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Expert Quote', 'text_domain' ),
		'description'           => __( 'Inspiration quotes from people', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-comments',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'expert-quote', $args );
  // this name determines the folder in the URL too: site/this-name/post

} // end wysac_expert_quote function
add_action( 'init', 'wysac_expert_quote', 0 );
// End Expert Quote




//END OF PLUGIN ?>
