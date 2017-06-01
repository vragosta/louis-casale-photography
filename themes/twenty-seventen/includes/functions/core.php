<?php
/**
 * This file contains the necessary theme configuration functions.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */
namespace LouisCasalePhotography\TwentySeventeen\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since  0.1.0
 * @uses   add_action
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme',  $n( 'louis_casale_photography_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
	add_action( 'widgets_init',       $n( 'sidebars' ) );
}

/**
 * Declare theme support.
 *
 * @since  0.1.0
 * @uses   add_theme_support, set_post_thumbnail_size, add_image_size, and add_post_type_support, show_admin_bar
 * @return void
 */
function louis_casale_photography_setup() {
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	/**
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

	// Add excerpt support to...
	add_post_type_support( 'page', 'excerpt' );

	// If set to 'false', the admin bar will not display on front end.
	show_admin_bar( false );
}
/**
 * Enqueue scripts for front-end.
 *
 * @since  0.1.0
 * @uses   wp_register_script(), p_enqueue_script(), wp_localize_script()
 * @return void
 */
function scripts() {
	wp_register_script(
		'bootstrap',
		LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . "/assets/lib/bootstrap/dist/js/bootstrap.min.js",
		array( 'jquery' ),
		LOUIS_CASALE_PHOTOGRAPHY_VERSION,
		true
	);

	wp_register_script(
		'slick',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js',
		array( 'jquery' ),
		STORYCORPS_ORG_VERSION,
		true
	);

	wp_enqueue_script(
		'louis_casale_photography',
		LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . "/assets/js/louis-casale-photography---twenty-seventeen.js",
		array( 'jquery', 'bootstrap', 'slick' ),
		LOUIS_CASALE_PHOTOGRAPHY_VERSION,
		true
	);

	wp_localize_script( 'louis_casale_photography', 'themeUrl', LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL );
}
/**
 * Enqueue styles for front-end.
 *
 * @since  0.1.0
 * @uses   wp_register_style(), wp_enqueue_style()
 * @return void
 */
function styles() {
	wp_register_style(
		'fontawesome',
		LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . "/assets/lib/fontawesome/css/font-awesome.min.css",
		array(),
		LOUIS_CASALE_PHOTOGRAPHY_VERSION
	);

	wp_register_style(
		'ionicons',
		LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . "/assets/lib/ionicons/css/ionicons.min.css",
		array(),
		LOUIS_CASALE_PHOTOGRAPHY_VERSION
	);

	wp_register_style(
		'bootstrap',
		LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . "/assets/lib/bootstrap/dist/css/bootstrap.min.css",
		array( 'fontawesome' ),
		LOUIS_CASALE_PHOTOGRAPHY_VERSION
	);

	wp_register_style(
		'sanitize',
		LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . "/assets/lib/sanitize/sanitize.min.css",
		array(),
		LOUIS_CASALE_PHOTOGRAPHY_VERSION
	);

	wp_register_style(
		'slick',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css',
		array(),
		STORYCORPS_ORG_VERSION
	);

	wp_register_style(
		'slick-theme',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css',
		array( 'slick' ),
		STORYCORPS_ORG_VERSION
	);

	wp_enqueue_style(
		'louis_casale_photography',
		LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . "/assets/css/louis-casale-photography---twenty-seventeen.css",
		array( 'bootstrap', 'fontawesome', 'ionicons', 'sanitize', 'slick-theme' ),
		LOUIS_CASALE_PHOTOGRAPHY_VERSION
	);
}

/**
 * Register sidebars for back-end.
 *
 * @since  0.1.0
 * @uses   __(), register_sidebar()
 * @return void
 */
function sidebars() {
	$blog = array(
		'name'          => __( 'Blog', 'louis_casale_photography_com' ),
		'id'            => 'blog-sidebar',
		'description'   => 'Sidebar for the blog template.',
		'class'         => '',
		'before_widget' => '<div class="widget-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	register_sidebar( $blog );
}
