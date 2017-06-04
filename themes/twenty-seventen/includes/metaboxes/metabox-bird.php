<?php
/**
 * Configuration file for creating metaboxes.
 * Additionally provides save and retrieve algorithms.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

/**
 * Create 'Configuration' metabox for the 'bird' custom post type.
 *
 * @since  0.1.0
 * @uses   add_meta_box()
 * @return void
 */
function louis_casale_photography_metaboxes() {
	add_meta_box(
		'configuration',
		__( 'Configuration', 'louis_casale_photography_com' ),
		'louis_casale_photography_configuration_callback',
		'bird'
	);
}
add_action( 'add_meta_boxes', 'louis_casale_photography_metaboxes' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function louis_casale_photography_configuration_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'louis_casale_photography_configuration_save_data', 'louis_casale_photography_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$featured = get_post_meta( $post->ID, 'featured', true ); ?>

	<table style="width: 100%;">
		<tr>
			<td>
				<label for="featured"><?php echo esc_html( __( 'Featured Bird', 'louis_casale_photography_com' ) ); ?></label>
			</td>
			<td>
				<input name="featured" type="checkbox" <?php echo ( $featured == 'on' ) ? 'checked': ''; ?> />
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
function louis_casale_photography_configuration_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['louis_casale_photography_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['louis_casale_photography_nonce'], 'louis_casale_photography_configuration_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$featured = sanitize_text_field( $_POST['featured'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'featured', $featured );
}
add_action( 'save_post', 'louis_casale_photography_configuration_save_data' );
