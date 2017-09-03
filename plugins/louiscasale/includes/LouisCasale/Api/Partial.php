<?php

namespace LouisCasale;

function get_partial( $path, $opts = array() ) {
	$GLOBALS['get_partial_opts'] = $opts;
	get_template_part( $path, '' );
	unset( $GLOBALS['get_partial_opts'] );
}

function get_partial_opts() {
	if ( ! empty( $GLOBALS['get_partial_opts'] ) ) {
		return $GLOBALS['get_partial_opts'];
	} else {
		return array();
	}
}
