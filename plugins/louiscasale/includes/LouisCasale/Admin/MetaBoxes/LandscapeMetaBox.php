<?php

namespace LouisCasale\Admin\MetaBoxes;
use LouisCasale\Finders\LandscapeFinder;

class LandscapeMetaBox {

	/**
	 * Registers metabox with WordPress.
	 *
	 * @since  0.1.0
	 * @uses   add_action()
	 * @return void
	 */
	function register() {
		add_action( 'add_meta_boxes', array( $this, 'louiscasale_landscape_metaboxes' ) );
		add_action( 'save_post', array( $this, 'louiscasale_landscape_save_data' ) );
	}

	/**
	 * Create 'Configuration' metabox for the 'project' custom post type.
	 *
	 * @since  0.1.0
	 * @uses   add_meta_box()
	 * @return void
	 */
	function louiscasale_landscape_metaboxes() {
		add_meta_box(
			'configuration',
			__( 'Configuration', 'louiscasale_com' ),
			array( $this, 'louiscasale_landscape_callback' ),
			LANDSCAPE_POST_TYPE
		);
	}

	/**
	 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
	 *
	 * @since  0.1.0
	 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
	 * @return void
	 */
	function louiscasale_landscape_callback( $post ) {
		# Add a nonce field so we can check for it later.
		wp_nonce_field( 'louiscasale_landscape_save_data', 'louiscasale_landscape_nonce' );

		# Transfer $key to _$key.
		$this->transfer_key( $post->ID, 'featured' );

		# Call LandscapeFinder class methods.
		$finder = new LandscapeFinder( $post->ID );
		$is_featured = $finder->is_featured();
		$is_favorited = $finder->is_favorited();

		?>

		<table style="width: 100%;">
		<tr>
			<td>
				<label for="_featured"><?php echo esc_html( __( 'Feature Landscape', 'louiscasale_com' ) ); ?></label>
			</td>
			<td>
				<input name="_featured" type="checkbox" <?php echo $is_featured == true ? 'checked': ''; ?> />
			</td>
		</tr>
		<tr>
			<td>
				<label for="_favorited"><?php echo esc_html( __( 'Favorite Landscape', 'louiscasale_com' ) ); ?></label>
			</td>
			<td>
				<input name="_favorited" type="checkbox" <?php echo $is_favorited == true ? 'checked': ''; ?> />
			</td>
		</tr>
		</table><?php
	}

	/**
	 * Saves and sanitizes the POST data.
	 *
	 * @since  0.1.0
	 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
	 * @return void
	 */
	function louiscasale_landscape_save_data( $post_id ) {
		/**
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */
		if ( ! isset( $_POST['louiscasale_landscape_nonce'] ) ) {
			return;
		}

		# Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['louiscasale_landscape_nonce'], 'louiscasale_landscape_save_data' ) ) {
			return;
		}

		# If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		# Check the user's permissions.
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

		# Catch the default checkbox behavior.
		$featured = $_POST['_featured'] == 'on' ? true : false;
		$favorited = $_POST['_favorited'] == 'on' ? true : false;

		# Sanitize the input and update the meta field in the database.
		update_post_meta( $post_id, '_featured', $featured );
		update_post_meta( $post_id, '_favorited', $favorited );
	}

	/**
	 * Ports over key value to _key value and then removes key.
	 *
	 * @since  0.1.0
	 * @uses   metadata_exists(), get_post_meta(), update_post_meta(), delete_post_meta_by_key()
	 * @return void
	 */
	function transfer_key( $id, $key ) {
		if ( metadata_exists( 'post', $id, $key ) ) {
			$featured = get_post_meta( $id, $key, true );

			if ( $featured == 'on' ) {
				$featured = true;
			}

			update_post_meta( $id, "_$key", $featured );
		}
	}

}
?>
