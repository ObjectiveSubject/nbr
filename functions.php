<?php
/**
 * nbr functions and definitions
 *
 * @package nbr
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1000; /* pixels */

if ( ! function_exists( 'nbr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function nbr_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on nbr, use a find and replace
	 * to change 'nbr' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nbr', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'column_one' => __( 'Column One', 'nbr' ),
		'column_two' => __( 'Column Two', 'nbr' ),
		'column_three' => __( 'Column Three', 'nbr' ),
		'column_four' => __( 'Column Four', 'nbr' )
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	add_theme_support( 'post-thumbnails' );

}
endif; // nbr_setup
add_action( 'after_setup_theme', 'nbr_setup' );


/*
Modify the loop for certain templates
-------------------------------------------------------------
------------------------------------------------------------- */
function set_custom_post_types_admin_order($query) {
  if (is_admin()) {

    $post_type = $query->query['post_type'];

    if ( $post_type == 'awards') {
      $query->set('orderby', 'title');
      $query->set('order', 'ASC');
    }
  }
}
add_filter('pre_get_posts', 'set_custom_post_types_admin_order');


/* Award Years tax archive */
function award_years_archive( $query ) {
    if ( $query->is_tax('award-years') ) {
        $query->set( 'orderby','menu_order' );
        $query->set( 'order','ASC' );
        //$query->set( 'post_type','awards' );
        $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'award_years_archive' );


/* Award Names tax archive */
function award_names_archive( $query ) {
    if ( !is_admin() && $query->is_tax('award-names') ) {
        $query->set( 'orderby','title' );
		$query->set( 'order','DESC' );
        $query->set( 'posts_per_page', 500 );
    }
}
add_action( 'pre_get_posts', 'award_names_archive' );


/* Search Results */
function search_results( $query ) {
    if ( is_search() ) {
    	$query->set( 'posts_per_page',15 );
    	$query->set( 'orderby','title' );
        $query->set( 'order','DESC' );
    }
}
add_action( 'pre_get_posts', 'search_results' );


/* Grant Year tax archive */
function grant_year_archive( $query ) {
    if ( $query->is_tax('grant-year') ) {
        $query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', array( 'title' => 'ASC' ) );
    }
}
add_action( 'pre_get_posts', 'grant_year_archive' );


/* Schools tax archive */
function schools_archive( $query ) {
    if ( $query->is_tax('schools') ) {
        $query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', array( 'date' => 'DESC', 'title' => 'ASC' ) );
    }
}
add_action( 'pre_get_posts', 'schools_archive' );


/* Student awards archive */
function student_awards_archive( $query ) {
    if ( $query->is_tax('student_award') ) {
        $query->set( 'posts_per_page', 20 );
		$query->set( 'orderby', array( 'date' => 'DESC', 'title' => 'ASC' ) );
    }
}
add_action( 'pre_get_posts', 'student_awards_archive' );




/* Show "Grant Years" Taxonomy in Admin list of Student Grants */
add_filter( 'manage_taxonomies_for_student-grants_columns', 'grant_year_columns' );
function grant_year_columns( $taxonomies ) {
    $taxonomies[] = 'grant-year';
    return $taxonomies;
}


/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function nbr_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'nbr_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'nbr_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function nbr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'nbr' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'nbr_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function nbr_scripts() {

	$postfix = ( defined( "WP_DEBUG" ) && true === WP_DEBUG ) ? "" : ".min";

	wp_enqueue_style( "nbr-style", get_template_directory_uri() . "/style{$postfix}.css" );
	wp_enqueue_script( "modernizr", get_template_directory_uri() . "/js/modernizr.min.js", array(), "1.0", false );
	wp_enqueue_script( "app_js", get_template_directory_uri() . "/js/app{$postfix}.js", array("jquery"), "1.0", true );

}
add_action( 'wp_enqueue_scripts', 'nbr_scripts' );

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

/**
 * Custom Post Types for this theme.
 */
require get_template_directory() . '/functions/post-types.php';

/**
 * Custom Taxonomies for this theme.
 */
require get_template_directory() . '/functions/taxonomies.php';
