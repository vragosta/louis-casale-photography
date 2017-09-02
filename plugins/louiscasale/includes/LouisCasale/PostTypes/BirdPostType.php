<?php

namespace LouisCasale\PostTypes;

/**
 * BirdPostType is a custom post type object for storing projects
 * in WordPress.
 */
class BirdPostType extends BasePostType {
	public function get_name() {
		return BIRD_POST_TYPE;
	}

	public function get_labels() {
		return array(
			'name'               => __( 'Birds', 'listen' ),
			'singular_name'      => __( 'Bird', 'listen' ),
			'menu_name'          => __( 'Birds', 'listen' ),
			'parent_item_colon'  => __( 'Parent Bird:', 'listen' ),
			'all_items'          => __( 'All Birds', 'listen' ),
			'view_item'          => __( 'View Bird', 'listen' ),
			'add_new_item'       => __( 'Add New Bird', 'listen' ),
			'add_new'            => __( 'Add New', 'listen' ),
			'edit_item'          => __( 'Edit Bird', 'listen' ),
			'update_item'        => __( 'Update Bird', 'listen' ),
			'search_items'       => __( 'Search Birds', 'listen' ),
			'not_found'          => __( 'Not found', 'listen' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'listen' )
		);
	}

	public function get_options() {
		return array(
			'labels'              => $this->get_labels(),
			'supports'            => $this->get_editor_support(),
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => 'birds', 'with_front' => false),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => 'dashicons-feedback',
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
		return array(
			FAMILY_TAXONOMY,
		);
	}
}
