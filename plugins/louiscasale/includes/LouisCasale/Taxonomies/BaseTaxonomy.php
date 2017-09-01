<?php

namespace LouisCasale\Taxonomies;

/**
 * BaseTaxonomy is the base class for all LouisCasale Taxonomies.
 * Taxonomies are registered as standalone by default. And PostTypes
 * declare their supported taxonomies instead.
 *
 * This maps to the idea that only PostTypes have taxonomies. And hence
 * should declare their taxonomies and not the other way around.
 *
 * Usage:
 *
 * class FooTaxonomy extends BaseTaxonomy {
 *
 *    public function get_name() {
 *        return 'foo';
 *    }
 *
 * }
 *
 * $taxonomy = new FooTaxonomy();
 * $taxonomy->register();
 */
class BaseTaxonomy {

	/**
	 * Registers a Taxonomy in WordPress.
	 */
	public function register() {
		register_taxonomy(
			$this->get_name(),
			$this->get_post_types(),
			$this->get_options()
		);
	}

	/* abstract start */

	public function get_name() {
		return 'base_taxonomy';
	}

	public function get_labels() {
		return array();
	}

	public function get_options() {
		return array(
			'labels'            => $this->get_labels(),
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => false,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true
		);
	}

	/* abstract end */

	/**
	 * Setting the post types to null to ensure no post type is
	 * registered with this taxonomy.
	 */
	public function get_post_types() {
		return null;
	}

}
