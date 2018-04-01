<?php

namespace LouisCasale;

use LouisCasale\Admin\MetaBoxes\BirdMetaBox;
use LouisCasale\Admin\MetaBoxes\SceneryMetaBox;
use LouisCasale\Admin\MetaBoxes\WildlifeMetaBox;
use LouisCasale\Admin\MetaBoxes\PostMetaFieldsMetaBox;
use LouisCasale\Admin\BirdColumnsSupport;
use LouisCasale\Admin\MetaBoxes\UserMetaBox;
use LouisCasale\Endpoints\Contact;
use LouisCasale\Finders\BirdFinder;
use LouisCasale\Finders\SceneryFinder;
use LouisCasale\Finders\WildlifeFinder;
use LouisCasale\PostTypes\PostTypeFactory;
use LouisCasale\Taxonomies\TaxonomyFactory;

/**
 * Plugin is the main entry point into the Louis Casale plugin
 * architecture. This class does not strictly enforce singleton pattern
 * for easier testing. But should be used as a singleton elsewhere.
 *
 * Usage:
 *
 * $plugin = Plugin::get_instance();
 * $plugin->enable();
 *
 * The plugin object holds various objects and dependencies instance of
 * global variables.
 */
class Plugin {

	static public $instance;

	static public function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Plugin();
		}
		return self::$instance;
	}

	public $post_type_factory;
	public $taxonomy_factory;

	public function enable() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_init', array( $this, 'init_admin' ) );
	}

	/**
	 * Instantiates objects and activates various parts of the
	 * Louis Casale plugin.
	 *
	 * There is an implicit order of declaration here. For instance
	 * Taxonomies must be registered before the Post Types etc.
	 */
	function init() {
		$this->taxonomy_factory = new TaxonomyFactory();
		$this->taxonomy_factory->build_all();

		$this->post_type_factory = new PostTypeFactory();
		$this->post_type_factory->build_all();

		$this->router = new Router();
		$this->router->register();

		# Add json endpoint register endpoints here.
		$contact_api = new Contact();
		$contact_api->register();
	}

	/**
	 * Sets up the various metaboxes and admin customizations.
	 */
	function init_admin() {
		$bird_meta_box = new BirdMetaBox();
		$bird_meta_box->register();

		$scenery_meta_box = new SceneryMetaBox();
		$scenery_meta_box->register();

		$wildlife_meta_box = new WildlifeMetaBox();
		$wildlife_meta_box->register();

		$postmeta_meta_box = new PostMetaFieldsMetaBox();
		$postmeta_meta_box->register();

		$user_meta_box = new UserMetaBox();
		$user_meta_box->register();

		$bird_columns_support = new BirdColumnsSupport();
		$bird_columns_support->register();
	}

	function get_bird_finder( $post_id ) {
		return new BirdFinder( $post_id );
	}

	function get_scenery_finder( $post_id ) {
		return new SceneryFinder( $post_id );
	}

	function get_wildlife_finder( $post_id ) {
		return new WildlifeFinder( $post_id );
	}
}
