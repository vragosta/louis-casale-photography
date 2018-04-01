<?php

namespace LouisCasale\PostTypes;

/**
 * LandscapePostType is a custom post type object for storing projects
 * in WordPress.
 */
class LandscapePostType extends BasePostType {
	public function get_name() {
		return LANDSCAPE_POST_TYPE;
	}

	public function get_labels() {
		return array(
			'name'               => __( 'Landscapes', 'listen' ),
			'singular_name'      => __( 'Landscape', 'listen' ),
			'menu_name'          => __( 'Landscapes', 'listen' ),
			'parent_item_colon'  => __( 'Parent Landscape:', 'listen' ),
			'all_items'          => __( 'All Landscapes', 'listen' ),
			'view_item'          => __( 'View Landscape', 'listen' ),
			'add_new_item'       => __( 'Add New Landscape', 'listen' ),
			'add_new'            => __( 'Add New', 'listen' ),
			'edit_item'          => __( 'Edit Landscape', 'listen' ),
			'update_item'        => __( 'Update Landscape', 'listen' ),
			'search_items'       => __( 'Search Landscapes', 'listen' ),
			'not_found'          => __( 'Not found', 'listen' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'listen' )
		);
	}

	public function get_options() {
		return array(
			'labels'              => $this->get_labels(),
			'supports'            => $this->get_editor_support(),
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => 'landscape', 'with_front' => false ),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => 'dashicons-format-gallery',
			'menu_position'       => 26,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
		);
	}

	public function get_editor_support() {
		return array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'comments',
			'postmeta-fields',
		);
	}

	public function get_supported_taxonomies() {
		return array();
	}
}
