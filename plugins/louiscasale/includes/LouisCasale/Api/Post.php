<?php

namespace LouisCasale;

function get_recent_posts() {
	return new \WP_Query( [
		'post_type'      => 'post',
		'posts_per_page' => 2
	] );
}
