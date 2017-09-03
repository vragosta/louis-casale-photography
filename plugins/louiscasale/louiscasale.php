<?php
/**
 * Plugin Name: Louis Casale
 * Description: Louis Casale shared plugin
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://www.louiscasale.com
 * Text Domain: louiscasale_com
 * Domain Path: /languages
 */

require_once( __DIR__ . '/config.php' );

/**
 * Loads the Plugin's PHP autoloader.
 */
function louiscasale_autoload() {
	if ( louiscasale_can_autoload() ) {
		require_once( louiscasale_autoloader() );
		return true;
	} else {
		return false;
	}
}

/**
 * In server mode we can autoload if autoloader file exists. For
 * test environments we prevent autoloading of the plugin to prevent
 * global pollution and for better performance.
 */
function louiscasale_can_autoload() {
	if ( ! defined( 'PHPUNIT_RUNNER' ) ) {
		if ( file_exists( louiscasale_autoloader() ) ) {
			return true;
		} else {
			error_log(
				"Fatal Error: Composer not setup in " . LOUISCASALE_PLUGIN_DIR
			);
			return false;
		}
	} else {
		return false;
	}
}
/**
 * Defaults is Composer's autoloader
 */
function louiscasale_autoloader() {
	return LOUISCASALE_PLUGIN_DIR . '/vendor/autoload.php';
}

/**
 * Plugin code entry point. Singleton instance is used to maintain single
 * instance of the plugin throughout the current lifecycle.
 */
function louiscasale_autorun() {
	if ( louiscasale_autoload() ) {
		$plugin = \LouisCasale\Plugin::get_instance();
		$plugin->enable();
	} else {
		add_action( 'admin_notices', 'louiscasale_autoload_notice' );
	}
}

function louiscasale_autoload_notice() {
	$class = 'notice notice-error';
	$message = __( 'Autoload is not setup. Remember to run composer install on the LouisCasale plugin.', 'louiscasale_com' );
	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
}

louiscasale_autorun();
