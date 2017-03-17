<?php
/**
 * Friendship Theme functions and definitions
 *
 * @package Friendship Theme
 */

if ( ! function_exists( 'friendship_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function friendship_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Friendship Theme, use a find and replace
	 * to change 'friendship' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'friendship', get_template_directory() . '/languages' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'friendship' ),
		'utility' => esc_html__( 'Utility Menu', 'friendship' ),
		'footer_one' => esc_html__( 'Footer Nav One', 'friendship' ),
		'footer_two' => esc_html__( 'Footer Nav Two', 'friendship' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'friendship_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // friendship_setup
add_action( 'after_setup_theme', 'friendship_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function friendship_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'friendship_content_width', 640 );
}
add_action( 'after_setup_theme', 'friendship_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function friendship_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'friendship' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'friendship_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function friendship_scripts() {
	
	wp_enqueue_style( 'friendship-style-foundation', get_template_directory_uri() . '/css/foundation.min.css' );
	wp_enqueue_style( 'friendship-style-slick', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_style( 'friendship-style', get_stylesheet_uri() );

	wp_enqueue_script( 'friendship-modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '20150713', false );
	wp_enqueue_script( 'friendship-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'friendship-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'friendship-jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '20150427', true );
	wp_enqueue_script( 'friendship-js-foundation', get_template_directory_uri() . '/js/foundation.min.js', array(), '20150427', true );
	wp_enqueue_script( 'friendship-js-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '201507210452', true );
	wp_enqueue_script( 'friendship-js-custom', get_template_directory_uri() . '/main.js', array(), '201507210455', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'friendship_scripts' );

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


//custom code to call custom menu for adding race results
function add_custom_menu_item() {
	add_menu_page("Race Results Uploader Form", "Race Results", "manage_options", "race-results-menu-test", "resultdisplay", "dashicons-awards", 11 );
}
//add_dashboard_page( "Race Results Uploader Form", "Race Results", "read", "race-results-menu-test", 'resultdisplay');
/*function example_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'race-results-menu-test',         // Widget slug.
                 'Race Results',         // Title.
                 'resultdisplay' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'example_add_dashboard_widgets' );*/
add_action( 'admin_menu', 'add_custom_menu_item' );

function resultdisplay() {
	echo '<h1>Race Results</h1>';
	include('uploaderDisplay.php');
}
