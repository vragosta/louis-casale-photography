<?php
/**
 * Create a new field called 'cover_photo_url'.
 *
 * @since  0.1.0
 * @uses   get_term_meta(), _e()
 * @return void
 */
function add_options( $term ) {
	$cover_photo_url = get_term_meta( $term->term_id, 'cover_photo_url' )[0]; ?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="cover_photo_url"><?php _e( 'Cover Photo URL' ); ?></label></th>
		<td>
			<input type="text" name="cover_photo_url" value="<?php echo $cover_photo_url; ?>" />
		</td>
	</tr><?php
}
add_action( 'family_edit_form_fields', 'add_options' );

/**
 * Saves custom taxonomy fields.
 *
 * @since  0.1.0
 * @uses   isset(), sanitize_title(), update_term_meta()
 * @return void
 */
function save_options( $term_id ) {
	if ( isset( $_POST['cover_photo_url'] ) ) {
		$cover_photo_url = $_POST['cover_photo_url'];
		update_term_meta( $term_id, 'cover_photo_url', $cover_photo_url );
	}
}
add_action( 'edited_family', 'save_options', 10, 2 );
