<?php
/**
 * Plugin Name: Custom Post Types
 * Description: Enables custom post types for use within theme.
 * Author: Vincent Ragosta
 * Author URI: http://vincentragosta.com
 */

/**
 * Register podcast custom post type.
 *
 * @since 0.1.0
 * @uses  register_post_type()
 */
function louis_casale_photography_register_post_type_bird() {
    register_post_type( 'bird', array(
        'label'           => 'Birds',
        'description'     => '',
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'map_meta_cap'    => true,
        'hierarchical'    => false,
        'rewrite'         => array( 'slug' => 'gallery', 'with_front' => false ),
        'query_var'       => true,
        'has_archive'     => true,
        'menu_position'   => 38,
        'menu_icon'       => 'dashicons-format-image',
        'supports'        => array( 'title', 'editor', 'custom-fields', 'revisions', 'thumbnail', 'page-attributes', 'excerpt' ),
        'taxonomies'      => array( 'category' ),
        'labels'          => array(
            'name'               => 'Birds',
            'singular_name'      => 'Bird',
            'menu_name'          => 'Birds',
            'add_new'            => 'Add Bird',
            'add_new_item'       => 'Add New Bird',
            'edit'               => 'Edit',
            'edit_item'          => 'Edit Bird',
            'new_item'           => 'New Bird',
            'view'               => 'View Bird',
            'view_item'          => 'View Bird',
            'search_items'       => 'Search Birds',
            'not_found'          => 'No Birds Found',
            'not_found_in_trash' => 'No Birds Found in Trash',
            'parent'             => 'Parent Bird',
        )
    ));
}
add_action( 'init', 'louis_casale_photography_register_post_type_bird' );
