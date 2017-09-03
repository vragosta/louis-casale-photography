<?php

namespace LouisCasale;

function get_bird_finder( $post_id ) {
	return get_plugin()->get_bird_finder( $post_id );
}

function get_featured_birds() {
	$birds = new \WP_Query( array(
		'post_type'      => BIRD_POST_TYPE,
		'posts_per_page' => 6,
		'meta_query'     => array(
			array(
				'key'     => 'featured',
				'value'   => true,
				'compare' => '='
			)
		)
	) );

	if ( $birds->post_count === 0 ) {
		$birds = new \WP_Query( array(
			'post_type'      => BIRD_POST_TYPE,
			'posts_per_page' => 6
		) );
	}

	return $birds;
}

function get_recent_birds() {
	return new \WP_Query( array(
		'post_type'      => BIRD_POST_TYPE,
		'posts_per_page' => 2
	) );
}

function get_bird_families() {
	return get_terms( array(
		'taxonomy' => 'family',
		'hide_empty' => false,
	) );
}

function get_birds_by_family( $family ) {
	$args = array(
		'post_type' => BIRD_POST_TYPE,
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);

	if ( isset( $family ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'family',
				'field'    => 'slug',
				'terms'    => [ $family ]
			)
		);
	}

	return new \WP_Query( $args );
}
