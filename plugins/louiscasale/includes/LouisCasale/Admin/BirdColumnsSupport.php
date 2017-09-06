<?php

namespace LouisCasale\Admin;

use LouisCasale\Finders\BirdFinder;

class BirdColumnsSupport {

	public function register() {
		add_filter( 'manage_bird_posts_columns', array( $this, 'bird_table_head' ) );
		add_action( 'manage_bird_posts_custom_column', array( $this, 'bird_table_content' ), 10, 2 );
	}

	function bird_table_head( $defaults ) {
		unset( $defaults['categories'] );
		unset( $defaults['comments'] );

		$defaults['bird_id']  = __( 'Bird ID', 'louiscasale_com' );
		$defaults['feature']  = __( 'Feature', 'louiscasale_com' );
		$defaults['favorite'] = __( 'Favorite', 'louiscasale_com' );
		$defaults['family'] = __( 'Families', 'louiscasale_com' );

		return $defaults;
	}

	function bird_table_content( $column_name, $post_id ) {

		$finder = new BirdFinder( $post_id );

		switch ( $column_name ) {

			case 'bird_id':
				$bird_id = $finder->get_post_id();

				if ( $bird_id ) {
					printf( '<a href="%s">%s</a><br>', get_edit_post_link( intval( $bird_id ) ), $bird_id );
				} else {
					echo 'None';
				}
				break;

			case 'feature':
				$feature = $finder->is_featured();

				if ( $feature ) {
					echo 'Yes';
				} else {
					echo '';
				}
				break;

			case 'favorite':
				$favorite = $finder->is_favorited();

				if ( $favorite ) {
					echo 'Yes';
				} else {
					echo '';
				}
				break;

			case 'family':
				$bird_id = $finder->get_post_id();
				$families = wp_get_post_terms( $bird_id, FAMILY_TAXONOMY, array( 'fields' => 'names' ) );

				if ( $families ) {
					echo implode( ',', $families );
				} else {
					echo 'None';
				}
				break;

		}
	}
}
