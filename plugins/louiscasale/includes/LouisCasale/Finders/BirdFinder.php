<?php

namespace LouisCasale\Finders;

/**
 * BirdFinder is a central place to find and filter projects in the theme.
 * API Helpers are provider in the \LouisCasale namespace to commonly
 * used methods below.
 *
 * Usage:
 *
 * $finder = new BirdFinder();
 * $finder->get_foo();
 */
class BirdFinder {

	public $post_id;
	public $post;

	public function __construct( $post_id ) {
		$this->post_id = $post_id;
	}

	public function get_post_id() {
		return $this->post_id;
	}

	public function get_post() {
		if ( is_null( $this->post ) ) {
			$this->post = get_post( $this->post_id );
		}
		return $this->post;
	}

	public function is_featured() {
		$value = get_post_meta( $this->post_id, '_featured', true );
		return $value == true ? true : false;
	}

	public function is_favorited() {
		$value = get_post_meta( $this->post_id, '_favorited', true );
		return $value == true ? true : false;
	}

}
