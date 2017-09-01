<?php

namespace LouisCasale\Taxonomies;

/**
 * Overrides for the Core Category Taxonomy
 */
class CategoryTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return CATEGORY_TAXONOMY;
	}

	public function register() {
		$taxonomy = get_taxonomy( CATEGORY_TAXONOMY );
		$taxonomy->capabilities = array(
			'manage_terms'  => 'manage_categories',
			'edit_terms'    => 'edit_categories',
			'delete_terms'  => 'delete_categories',
			'assign_terms'  => 'assign_categories',
		);

		register_taxonomy(
			CATEGORY_TAXONOMY, array( 'post', 'page' ), (array) $taxonomy
		);
	}

}
