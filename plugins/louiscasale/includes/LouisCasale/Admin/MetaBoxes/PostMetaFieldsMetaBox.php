<?php

namespace LouisCasale\Admin\MetaBoxes;

/**
 * PostMetaFieldsMetaBox is a read-only replacement for Core's Custom
 * Fields metabox.
 *
 * The Core Custom Field Metabox has a major performance limitation on a
 * large postmeta table like LouisCasale. The select box in this Metabox
 * uses a very slow full table scanning query.
 *
 * This Metabox sidesteps this by limiting the fields to display to just
 * those that are attached to the current post type.
 *
 * Usage:
 *
 * $metabox = new PostMetaFieldsMetaBox();
 * $metabox->register();
 */
class PostMetaFieldsMetaBox {
	public function register() {
		add_action(
			'add_meta_boxes', array( $this, 'add_meta_box_if' )
		);
	}

	/* helpers */

	function add_meta_box_if() {
		if ( $this->can_add_meta_box() ) {
			$this->add_meta_box();
		}
	}

	function add_meta_box() {
		add_meta_box(
			'postmeta-fields-metabox',
			'Post Meta Fields',
			array( $this, 'render' ),
			null,
			'advanced'
		);
	}

	function can_add_meta_box() {
		$post_type = $this->get_current_post_type();
		if ( ! empty( $post_type ) ) {
			$yes = post_type_supports( $post_type, 'postmeta-fields' );
		} else {
			$yes = false;
		}
		return $yes;
	}

	function render() {
		$post_id = $this->get_current_post()->ID;
		$fields  = get_post_meta( $post_id );

		if ( ! empty( $fields ) ) {
			ksort( $fields );
		} else {
			$fields = [];
		}

		$row = 1; ?>

		<table class="widefat" style="table-layout: fixed">
			<thead>
				<th style="width: 24%">Key</th>
				<th>Value</th>
			</thead>

			<tbody>
				<?php if ( ! empty( $fields ) ) { ?>
					<?php foreach ( $fields as $key => $field ) { ?>
						<tr valign="top" class="<?php echo $row % 2 === 0 ? 'alternate' : '' ?>">
							<td scope="row"><label for="tablecell">
								<?php esc_html_e( $key ); ?></label>
							</td>
							<td style="">
								<?php if ( is_array( $field ) ) { ?>
									<?php if ( count( $field ) > 1 ) { ?>
										<?php esc_html_e( json_encode( $field ) ); ?>
									<?php } else { ?>
										<?php esc_html_e( $this->to_value( $field[0] ) ); ?>
									<?php } ?>
								<?php } else { ?>
									<?php esc_html_e( $this->to_value( $field ) ); ?>
								<?php } ?>
							</td>
						</tr>

						<?php $row++; ?>
					<?php } ?>
				<?php } else { ?>
					<tr valign="top">
						<td colspan="2"><?php esc_html_e( "No postmeta fields found." ); ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table><?php
	}

	function to_value( $str ) {
		if ( is_serialized( $str ) ) {
			$result = unserialize( $str );
			if ( is_array( $result ) ) {
				return json_encode( $result );
			} else {
				return $result;
			}
		} else {
			return $str;
		}
	}

	function get_current_post_type() {
		$post = $this->get_current_post();
		if ( ! empty( $post ) ) {
			return $post->post_type;
		} else {
			return false;
		}
	}

	function get_current_post() {
		global $post;
		if ( ! empty( $post ) && ! empty( $post->post_type ) ) {
			return $post;
		} else {
			return false;
		}
	}
}
