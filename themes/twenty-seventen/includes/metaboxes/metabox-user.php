<?php
/**
 * Configuration file for creating metaboxes.
 * Additionally provides save and retrieve algorithms.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

/**
 * Create user meta fields for each user record.
 *
 * @since  0.1.0
 * @param  array $fields Existing fields array.
 * @return array $fields Existing fields array with new social fields.
 */
function add_fields( $fields ) {
	$fields['facebook']  = 'Facebook URL';
	$fields['twitter']   = 'Twitter URL';
	$fields['instagram'] = 'Instagram URL';

	return $fields;
}
add_filter( 'user_contactmethods', 'add_fields' );

/**
 * Save additional profile fields.
 *
 * @since  0.1.0
 * @param  int $user_id Current user ID.
 * @uses   current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function save_fields( $user_id ) {
	// Check the user's permissions.
	if ( ! current_user_can( 'edit_user', $user_id ) )
		return false;

	// Sanitize user input.
	$facebook  = sanitize_text_field( $_POST['facebook'] );
	$twitter   = sanitize_text_field( $_POST['twitter'] );
	$instagram = sanitize_text_field( $_POST['instagram'] );
	$phone     = sanitize_text_field( $_POST['phone'] );

	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'instagram', $_POST['instagram'] );
	update_usermeta( $user_id, 'phone', $_POST['phone'] );
}
add_action( 'personal_options_update', 'save_fields' );
add_action( 'edit_user_profile_update', 'save_fields' );
