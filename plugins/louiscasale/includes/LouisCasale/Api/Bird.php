<?php

namespace LouisCasale;

function get_bird_finder( $post_id ) {
	return get_plugin()->get_bird_finder( $post_id );
}

function get_featured_birds() {
	$birds = new \WP_Query( [
		'post_type'      => BIRD_POST_TYPE,
		'posts_per_page' => 6,
		'meta_query'     => [
			[
				'key'     => 'featured',
				'value'   => true,
				'compare' => '='
			]
		]
	] );

	if ( $birds->post_count === 0 ) {
		$birds = new \WP_Query( [
			'post_type'      => 'bird',
			'posts_per_page' => 6
		] );
	}

	return $birds;
}

function get_recent_birds() {
	return new \WP_Query( [
		'post_type'      => BIRD_POST_TYPE,
		'posts_per_page' => 2
	] );
}
