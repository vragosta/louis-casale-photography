<?php

namespace LouisCasale\PostTypes;

/**
 * CorePageType overrides the 'page' post type. Currently set to
 * defaults but could be used to add custom taxonomies.
 */
class PagePostType extends BasePostType {
	public function get_name() {
		return 'page';
	}

	public function get_supported_taxonomies() {
		return array(
			CATEGORY_TAXONOMY
		);
	}

	# override parent - since this is a Core Post Type
	public function register_post_type() {
		add_post_type_support( 'page', 'postmeta-fields' );
		remove_post_type_support( 'page', 'custom-fields' );
	}
}
