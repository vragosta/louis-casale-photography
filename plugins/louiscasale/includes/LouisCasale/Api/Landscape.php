<?php

namespace LouisCasale;

function get_landscape_finder( $post_id ) {
	return get_plugin()->get_landscape_finder( $post_id );
}

function get_featured_landscape( $posts_per_page ) {
	$landscape = new \WP_Query( array(
		'post_type'      => LANDSCAPE_POST_TYPE,
		'posts_per_page' => $posts_per_page ? $posts_per_page : 6,
		'meta_query'     => array(
			array(
				'key'     => '_featured',
				'value'   => true,
				'compare' => '=',
			),
		),
	) );

	if ( $landscape->post_count === 0 ) {
		$landscape = new \WP_Query( array(
			'post_type'      => LANDSCAPE_POST_TYPE,
			'posts_per_page' => $posts_per_page ? $posts_per_page : 6,
		) );
	}

	return $landscape;
}

function get_recent_landscape( $posts_per_page ) {
	return new \WP_Query( array(
		'post_type'      => LANDSCAPE_POST_TYPE,
		'posts_per_page' => $posts_per_page ? $posts_per_page : 20,
	) );
}

function get_favorite_landscape( $posts_per_page ) {
	$landscape = new \WP_Query( array(
		'post_type'      => LANDSCAPE_POST_TYPE,
		'posts_per_page' => $posts_per_page ? $posts_per_page : -1,
		'meta_query'     => array(
			array(
				'key'     => '_favorited',
				'value'   => true,
				'compare' => '=',
			),
		),
	) );

	if ( $landscape->post_count === 0 ) {
		$landscape = new \WP_Query( array(
			'post_type'      => LANDSCAPE_POST_TYPE,
			'posts_per_page' => $posts_per_page ? $posts_per_page : -1,
		) );
	}

	return $landscape;
}

function get_all_landscape() {
	return new \WP_Query( array(
		'post_type'      => LANDSCAPE_POST_TYPE,
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );
}
