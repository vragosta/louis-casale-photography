<?php
/**
 * Contact Form API Class
 *
 * Namespace: v1
 *
 * ENDPOINTS:
 *   /contact
 *     CREATABLE
 */

// Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

class WP_REST_Contact extends WP_REST_Controller {

	/**
	 * Register the routes for the objects of the controller.
	 *
	 * @param  void
	 * @uses   add_action, reigster_rest_route
	 * @return void
	 */
	public function register_routes() {
		add_action( 'rest_api_init', function() {
			register_rest_route( 'v1', 'contact', [
				[
					'methods'  => WP_REST_Server::CREATABLE,
					'callback' => [ $this, 'send_email' ]
				]
			] );
		} );
	}

	/**
	 * Sends email to client.
	 *
	 * @param  wp_rest_request $request contains data from the request, to be passed to the callback
	 * @uses   prepare_arguements_for_query, prepare_posts_for_response, cache_response
	 * @return wp_rest_response $interviews array of interview objects
	 */
	public function send_email( $request ) {
		$sender = json_decode( $request->get_body() );

		if ( ! $sender ) :
			return new WP_REST_Response( 'There was an error with the request.', 500 );
		endif;

		$to      = 'vragosta@storycorps.org';
		$subject = $sender->subject;
		$message = $sender->message;

		$content = '
%1$s

From,
%2$s %3$s
%4$s
		';

		$content = sprintf(
			$content,
			$message,
			$sender->firstname,
			$sender->lastname,
			$sender->email
		);

		wp_mail( $to, $subject, $content );

		return new WP_REST_Response( 200 );
	}

	/**
	 * Inserts post into database and updates all other fields sent via post request.
	 *
	 * @param  object $data data to be stored as an interview object in database
	 * @uses   wp_insert_post, isset, update_post_meta, get_post_meta, get_string_between, is_array, in_array, array_push, is_string,
	 *         wp_set_object_terms, array_map
	 * @return void
	 */
	public function update_item_fields( $data, $post_id ) {
		if ( isset( $data->version ) ) :
			update_post_meta( $post_id, 'version', sanitize_text_field( $data->version ) );
		endif;

		return $post_id;
	}
};

$contact_api = new WP_REST_Contact();
$contact_api->register_routes();
