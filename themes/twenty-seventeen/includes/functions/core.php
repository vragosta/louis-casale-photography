<?php
/**
 * This file contains the necessary theme configuration functions.
 *
 * @package LouisCasale - Twenty Seventeen
 * @since 0.1.0
 */

namespace LouisCasale\Functions\Core;

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

	add_action( 'after_setup_theme',  $n( 'louiscasale_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
	add_action( 'wp_head',            $n( 'louiscasale_headers' ) );
}

/**
 * Declare theme support.
 *
 * @since  0.1.0
 * @uses   add_theme_support, set_post_thumbnail_size, add_image_size, and add_post_type_support, show_admin_bar
 * @return void
 */
function louiscasale_setup() {
	# Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	# Enable support for Post Thumbnails, and declare two sizes.
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

	# Add excerpt support to...
	add_post_type_support( 'page', 'excerpt' );

	# If set to 'false', the admin bar will not display on front end.
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
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 *
	 * @param bool louiscasale_script_debug
	 */
	$debug = apply_filters( 'louiscasale_script_debug', false );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_register_script(
		'bootstrap',
		LOUISCASALE_TEMPLATE_URL . "/assets/lib/bootstrap/dist/js/bootstrap.min.js",
		array( 'jquery' ),
		LOUISCASALE_VERSION,
		true
	);

	wp_register_script(
		'slick',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js',
		array( 'jquery' ),
		LOUISCASALE_VERSION,
		true
	);

	wp_enqueue_script(
		'louiscasale',
		LOUISCASALE_TEMPLATE_URL . "/assets/js/louiscasale---twenty-seventeen{$min}.js",
		array( 'jquery', 'bootstrap', 'slick' ),
		LOUISCASALE_VERSION,
		true
	);

	wp_localize_script(
		'louiscasale',
		'LouisCasale',
		array(
			'themeUrl' => LOUISCASALE_TEMPLATE_URL,
			'options'  => array(
				'apiUrl'  => home_url( '/wp-json/v1' ),
				'homeUrl' => home_url(),
				'nonce'   => wp_create_nonce( 'wp_rest' ),
			)
		)
	);
}

/**
 * Enqueue styles for front-end.
 *
 * @since  0.1.0
 * @uses   wp_register_style(), wp_enqueue_style()
 * @return void
 */
function styles() {
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 *
	 * @param bool louiscasale_style_debug
	 */
	$debug = apply_filters( 'louiscasale_style_debug', false );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_register_style(
		'fonts',
		'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,600,600i',
		array(),
		LOUISCASALE_VERSION
	);

	wp_register_style(
		'fontawesome',
		LOUISCASALE_TEMPLATE_URL . "/assets/lib/fontawesome/css/font-awesome.min.css",
		array(),
		LOUISCASALE_VERSION
	);

	wp_register_style(
		'ionicons',
		LOUISCASALE_TEMPLATE_URL . "/assets/lib/ionicons/css/ionicons.min.css",
		array(),
		LOUISCASALE_VERSION
	);

	wp_register_style(
		'bootstrap',
		LOUISCASALE_TEMPLATE_URL . "/assets/lib/bootstrap/dist/css/bootstrap.min.css",
		array( 'fontawesome' ),
		LOUISCASALE_VERSION
	);

	wp_register_style(
		'sanitize',
		LOUISCASALE_TEMPLATE_URL . "/assets/lib/sanitize/sanitize.min.css",
		array(),
		LOUISCASALE_VERSION
	);

	wp_register_style(
		'slick',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css',
		array(),
		LOUISCASALE_VERSION
	);

	wp_register_style(
		'slick-theme',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css',
		array( 'slick' ),
		LOUISCASALE_VERSION
	);

	wp_enqueue_style(
		'louiscasale',
		LOUISCASALE_TEMPLATE_URL . "/assets/css/louiscasale---twenty-seventeen{$min}.css",
		array( 'bootstrap', 'fontawesome', 'ionicons', 'sanitize', 'slick-theme', 'fonts' ),
		LOUISCASALE_VERSION
	);
}

function louiscasale_headers() { ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-102532068-1', 'auto');
		ga('send', 'pageview');

	</script><?php
}
