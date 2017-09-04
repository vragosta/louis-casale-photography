<?php

namespace LouisCasale\Taxonomies;

/**
 * Taxonomy declaration for bird familes.
 */
class FamilyTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return FAMILY_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Families', 'louiscasale_com' ),
			'singular_name'              => __( 'Family', 'louiscasale_com' ),
			'menu_name'                  => __( 'Families', 'louiscasale_com' ),
			'all_items'                  => __( 'All Families', 'louiscasale_com' ),
			'parent_item'                => __( 'Parent Family', 'louiscasale_com' ),
			'parent_item_colon'          => __( 'Parent Family:', 'louiscasale_com' ),
			'new_item_name'              => __( 'New Family', 'louiscasale_com' ),
			'add_new_item'               => __( 'Add New Family', 'louiscasale_com' ),
			'edit_item'                  => __( 'Edit Family', 'louiscasale_com' ),
			'update_item'                => __( 'Update Family', 'louiscasale_com' ),
			'separate_items_with_commas' => __( 'Separate families with commas', 'louiscasale_com' ),
			'search_items'               => __( 'Search Families', 'louiscasale_com' ),
			'add_or_remove_items'        => __( 'Add or remove families', 'louiscasale_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used families', 'louiscasale_com' ),
			'not_found'                  => __( 'Not Found', 'louiscasale_com' )
		);
	}

	public function get_options() {
		return array(
			'labels'            => $this->get_labels(),
			'hierarchical'      => true,
			'public'            => true,
			'show_admin_column' => false,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_ui'           => true,
			'query_var'         => true
		);
	}

	public function get_post_types() {
		return array( 'bird' );
	}
}
