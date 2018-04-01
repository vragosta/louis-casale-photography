<?php

namespace LouisCasale\PostTypes;

/**
 * WildlifePostType is a custom post type object for storing projects
 * in WordPress.
 */
class WildlifePostType extends BasePostType {
	public function get_name() {
		return WILDLIFE_POST_TYPE;
	}

	public function get_labels() {
		return array(
			'name'               => __( 'Wildlife', 'louiscasale' ),
			'singular_name'      => __( 'Wildlife', 'louiscasale' ),
			'menu_name'          => __( 'Wildlife', 'louiscasale' ),
			'parent_item_colon'  => __( 'Parent Wildlife:', 'louiscasale' ),
			'all_items'          => __( 'All Wildlife', 'louiscasale' ),
			'view_item'          => __( 'View Wildlife', 'louiscasale' ),
			'add_new_item'       => __( 'Add New Wildlife', 'louiscasale' ),
			'add_new'            => __( 'Add New', 'louiscasale' ),
			'edit_item'          => __( 'Edit Wildlife', 'louiscasale' ),
			'update_item'        => __( 'Update Wildlife', 'louiscasale' ),
			'search_items'       => __( 'Search Wildlife', 'louiscasale' ),
			'not_found'          => __( 'Not found', 'louiscasale' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'louiscasale' )
		);
	}

	public function get_options() {
		return array(
			'labels'              => $this->get_labels(),
			'supports'            => $this->get_editor_support(),
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => 'wildlife', 'with_front' => false ),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => 'dashicons-admin-site',
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
