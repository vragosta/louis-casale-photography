<?php

namespace LouisCasale\PostTypes;

/**
 * BasePostType is the base class for all post type objects. This object
 * is used for registering a Post type with WordPress and for
 * configuring it's taxonomies.
 *
 * Usage: To create a new post type use,
 *
 * class FooPostType {
 *
 *    public function get_name() {
 *       return 'foo';
 *    }
 *
 *    public function get_supported_taxonomies() {
 *       return array( 'category' );
 *    }
 * }
 *
 * And use with,
 *
 * $post_type = new FooPostType();
 * $post_type->register();
 *
 * The 'foo_taxonomies' hook can be used to override the taxonomies of
 * this Post Type by the Theme.
 *
 */
class BasePostType {
	/* abstract start */
	/**
	 * The name of this post type.
	 *
	 * @return string The post type name
	 */
	public function get_name() {
		return 'base_post_type';
	}

	/**
	 * The post type labels & options
	 *
	 * @return array
	 */
	public function get_options() {
		return array();
	}

	/**
	 * List of taxonomies supported by this post type.
	 *
	 * @return array list of taxonomy names
	 */
	public function get_supported_taxonomies() {
		return array(
			CATEGORY_TAXONOMY,
		);
	}

	/* abstract end */
	/**
	 * Registers a post type and associates it's taxonomies.
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomies();
	}

	/**
	 * Registers the current post type with wordpress.
	 */
	public function register_post_type() {
		register_post_type(
			$this->get_name(),
			$this->get_options()
		);
	}

	/**
	 * Registers the taxonomies declared with the current post type.
	 */
	public function register_taxonomies() {
		$taxonomies  = $this->get_taxonomies();
		$object_type = $this->get_name();
		if ( ! empty( $taxonomies ) ) {
			foreach ( $taxonomies as $taxonomy ) {
				register_taxonomy_for_object_type(
					$taxonomy, $object_type
				);
			}
		}
	}

	/* helpers */

	function get_taxonomies() {
		$post_type = $this->get_name();
		return apply_filters(
			"${post_type}_taxonomies",
			$this->get_supported_taxonomies()
		);
	}
}
