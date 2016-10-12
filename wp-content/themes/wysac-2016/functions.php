<?php
/**
* WYSAC Beta functions and definitions.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package WYSAC_Beta
*/

if ( ! function_exists( 'wysac_beta_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function wysac_beta_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WYSAC Beta, use a find and replace
		* to change 'wysac-beta' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'wysac-beta', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Formats
		*
		*/

		add_theme_support('post-formats', array (
		'gallery',
		//'link',
		'image',
		//'quote',
		'video')
	);


	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.

	//Add the footer nav menus
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wysac-beta' ),
		'footer'  => esc_html__( 'Footer', 'wysac-beta'),
		'footer-legal' => esc_html__( 'Footer-Legal', 'wysac-beta'),
		) );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wysac_beta_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif;
add_action( 'after_setup_theme', 'wysac_beta_setup' );

/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*/
function wysac_beta_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wysac_beta_content_width', 640 );
}
add_action( 'after_setup_theme', 'wysac_beta_content_width', 0 );

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function wysac_beta_widgets_init() {
	register_sidebar( array(
		//basic sidebar for the theme
		'name'          => esc_html__( 'Sidebar', 'wysac-beta' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wysac-beta' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title sidebar-section-title">',
		'after_title'   => '</h4>',
		) );
		register_sidebar( array(
			// sidebar for the Careers category
			'name'          => esc_html__( 'Sidebar - Careers', 'wysac-beta' ),
			'id'            => 'sidebar-careers',
			'description'   => esc_html__( 'Sidebar for posts in the Careers category', 'wysac-beta' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-area col-md-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title sidebar-section-title">',
			'after_title'   => '</h4>',
			) );
		}
		add_action( 'widgets_init', 'wysac_beta_widgets_init' );

		/**
		* Enqueue scripts and styles.
		*/
		function wysac_beta_scripts() {
			wp_enqueue_style( 'wysac-beta-style', get_stylesheet_uri() );

			wp_enqueue_script( 'wysac-beta-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

			wp_enqueue_script( 'wysac-beta-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'wysac_beta_scripts' );

		/**
		* Implement the Custom Header feature.
		*/
		require get_template_directory() . '/inc/custom-header.php';

		/**
		* Custom template tags for this theme.
		*/
		require get_template_directory() . '/inc/template-tags.php';

		/**
		* Custom functions that act independently of the theme templates.
		*/
		require get_template_directory() . '/inc/extras.php';

		/**
		* Customizer additions.
		*/
		require get_template_directory() . '/inc/customizer.php';

		/**
		* Load Jetpack compatibility file.
		*/
		require get_template_directory() . '/inc/jetpack.php';

		/* Add bootstrap support to the Wordpress theme*/

		function theme_add_bootstrap() {
			wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
			wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
			wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '3.3.7', true );
		}

		add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );

		/** add a custom user field for the job title to try to call it elsewhere */

		add_action( 'show_user_profile', 'extra_user_profile_fields' );
		add_action( 'edit_user_profile', 'extra_user_profile_fields' );

		function extra_user_profile_fields( $user ) { ?>

			<table class="form-table">
				<tr>
					<th><label for="jobtitle"><?php _e("Job Title"); ?></label></th>
					<td>
						<input type="text" name="jobtitle" id="jobtitle" value="<?php echo esc_attr( get_the_author_meta( 'jobtitle', $user->ID ) ); ?>" class="regular-text" /><br />
						<span class="description"><?php _e("If your current job title (Assistant Research Scientists, for example) is not indicative of your job duties, you can include a more descriptive job title."); ?></span>
					</td>
				</tr>
			</table>
			<?php }

			add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
			add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

			function save_extra_user_profile_fields( $user_id ) {

				if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

				update_user_meta( $user_id, 'jobtitle', $_POST['jobtitle'] );
			}

/* Add Navwalker support to make collapasble bootstrap navigation */

// register bootstrap navigation walker
include 'bootstrap/wp_bootstrap_navwalker.php';
