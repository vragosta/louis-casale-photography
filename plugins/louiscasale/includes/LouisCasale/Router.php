<?php

namespace LouisCasale;

/**
 * Router provides Rewrite Rules for custom URLs and endpoints used by
 * LouisCasale Archive. The custom routes provider are,
 *
 * 1. Bird Endpoints (/birds/families)
 *
 * NOTE: The routes declared have an implicit order. Any changes here
 * require a through round of Testing for each of the above URLs &
 * Endpoints.
 *
 * The Router utilizes auto rewrite rules flushing. To make use of this
 * bump the version in Router#get_version to a new version. On the next
 * visit to any page on the site, the rewrite rules will get flushed
 * automatically.
 *
 * The router version is then stored as an option to avoid additional
 * rewrite flushes.
 *
 * 2 Types of Routes are supported below,
 *
 * 1. Template Routes
 * 2. Endpoint Routes
 *
 * Template Routes are used for matching a URL to a template in the
 * current Theme. While Endpoint routes are used for features that do
 * not use templates, eg:- redirects.
 *
 * Usage:- Adding new Routes
 *
 * 1. Declare the name and route in the get_routes method. This should
 * match the parameters used in add_rewrite_rule's second parameter.
 * Array format is used for readability.
 *
 * 2. Add a new case statement to get_template. If matched return the
 * template file or endpoint object.
 *
 * 3. Add corresponding template file in Theme or Endpoint in the
 * plugin.
 *
 * Eg:- To add a new route /birds/families
 *
 * 1. route params
 *
 * array(
 *   'bird/families',
 *   '^/families/?$',
 *   array(
 *     'bird_families' => true,
 *   )
 * );
 *
 * 2. Case statement
 *
 * case 'bird/family':
 *   $template_file = 'bird-families.php';
 *   break;
 *
 * 3. Template File - bird-families.php
 *
 * <?php get_query_var( 'bird_families' ); ?>
 *
 */
class Router {

	public $current_route;
	public $matched;
	public $routes;

	public function get_version() {
		return '1.0.6';
	}

	public function register() {
		$this->register_routes();
		$this->flush_rewrite_rules_if();

		add_action(
			'template_include', array( $this, 'template_include_if' )
		);
	}

	public function template_include_if( $template ) {
		$match = $this->match();

		if ( $match ) {
			$matched_template = $this->get_template( $match );

			if ( ! empty( $matched_template ) && file_exists( $matched_template ) ) {
				return $matched_template;
			} else {
				return $template;
			}
		} else {
			return $template;
		}
	}

	public function get_template( $route_name ) {
		$template_file = null;

		switch ( $route_name ) {

			case 'birds/families':
				$template_file = 'bird-families.php';
				break;

			default:
				$template_file = null;
		}

		if ( ! empty( $template_file ) ) {
			$template_dir        = get_stylesheet_directory();
			$this->current_route = $route_name;

			return $template_dir . '/' . $template_file;
		} else {
			return false;
		}
	}

	public function match() {
		if ( is_null( $this->matched ) ) {
			$route_id = intval( get_query_var( 'route_id' ) );

			if ( ! empty( $route_id ) && ! empty( $this->routes[ $route_id - 1 ] ) ) {
				$this->matched = $this->routes[ $route_id - 1 ][0];
			} else {
				$this->matched = false;
			}
		}

		return $this->matched;
	}

	/*
	 * Each Route is an array of the form,
	 *
	 * (
	 *		route name,
	 *		regex pattern,
	 *		redirect params (serializes to index.php?a=1&b=2),
	 *		after (optional - top or bottom)
	 * )
	 *
	 * Each array gets converted into an add_rewrite_rule
	 *
	 * Use louiscasale_routes filter to override these routes in the
	 * theme.
	 */
	public function get_routes() {
		if ( ! is_null( $this->routes ) ) {
			return $this->routes;
		}

		$routes = array(
			/* Custom Endpoints */

			/*
			 * Bird Families Route
			 * Birds Families : /families/
			 */
			array(
				'birds/families',
				'^families/?$',
				array(
					'bird_families' => true,
				),
			),

		);

		$routes = apply_filters( 'louiscasale_routes', $routes );
		$this->routes = $routes;

		return $this->routes;
	}

	/* helpers */

	function register_routes() {
		global $wp;
		global $wp_rewrite;

		$query_vars = array();
		$this->route_ids = array();

		foreach ( $this->get_routes() as $index => $route ) {
			$pattern         = $route[1];
			$redirect_params = $route[2];
			$after           = ! empty( $route[3] ) ? $route[3] : 'top';

			foreach ( $redirect_params as $key => $value ) {
				if ( empty( $query_vars[ $key ] ) ) {
					$wp->add_query_var( $key );
					$query_vars[ $key ] = true;
				}
			}

			$wp->add_query_var( 'route_id' );
			$redirect_params['route_id'] = $index + 1;

			add_rewrite_rule(
				$pattern,
				$redirect_params,
				$after
			);
		}

		$wp_rewrite->author_base = 'user';
	}

	function flush_rewrite_rules_if() {
		if ( $this->needs_rewrite_flush() ) {
			flush_rewrite_rules();
			update_option( 'louiscasale_router_version', $this->get_version() );
		}
	}

	function needs_rewrite_flush() {
		$version       = $this->get_version();
		$saved_version = $this->get_saved_version();
		$result        = version_compare( $version, $saved_version, '>' );

		return $result;
	}

	function get_saved_version() {
		$version = get_option( 'louiscasale_router_version' );

		if ( empty( $version ) ) {
			$version = '0';
		}

		return $version;
	}

}
