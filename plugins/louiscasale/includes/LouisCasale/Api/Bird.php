<?php

namespace LouisCasale;

function get_bird_finder( $post_id ) {
	return get_plugin()->get_bird_finder( $post_id );
}

function get_featured_birds( $posts_per_page ) {
	$birds = new \WP_Query( array(
		'post_type'      => BIRD_POST_TYPE,
		'posts_per_page' => $posts_per_page ? $posts_per_page : 6,
		'meta_query'     => array(
			array(
				'key'     => '_featured',
				'value'   => true,
				'compare' => '=',
			),
		),
	) );

	if ( $birds->post_count === 0 ) {
		$birds = new \WP_Query( array(
			'post_type'      => BIRD_POST_TYPE,
			'posts_per_page' => $posts_per_page ? $posts_per_page : 6,
		) );
	}

	return $birds;
}

function get_recent_birds( $posts_per_page ) {
	return new \WP_Query( array(
		'post_type'      => BIRD_POST_TYPE,
		'posts_per_page' => $posts_per_page ? $post_per_page : 20,
	) );
}

function get_favorite_birds( $posts_per_page ) {
	$birds = new \WP_Query( array(
		'post_type'      => BIRD_POST_TYPE,
		'posts_per_page' => $posts_per_page ? $posts_per_page : -1,
		'meta_query'     => array(
			array(
				'key'     => '_favorited',
				'value'   => true,
				'compare' => '=',
			),
		),
	) );

	if ( $birds->post_count === 0 ) {
		$birds = new \WP_Query( array(
			'post_type'      => BIRD_POST_TYPE,
			'posts_per_page' => $posts_per_page ? $posts_per_page : -1,
		) );
	}

	return $birds;
}

function get_bird_families() {
	return get_terms( array(
		'taxonomy'   => FAMILY_TAXONOMY,
		'hide_empty' => false,
	) );
}

function get_birds_by_family( $term_slug ) {
	$args = array(
		'post_type'      => BIRD_POST_TYPE,
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
		'tax_query'      => array(
			array(
				'taxonomy' => FAMILY_TAXONOMY,
				'field'    => 'slug',
				'terms'    => array( $term_slug ),
			),
		),
	);

	return new \WP_Query( $args );
}

function get_all_birds() {
	return new \WP_Query( array(
		'post_type'      => BIRD_POST_TYPE,
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );
}
