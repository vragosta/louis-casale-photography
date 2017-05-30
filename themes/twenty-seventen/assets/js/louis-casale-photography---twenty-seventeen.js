/**
 * Louis Casale Photography - Twenty Seventeen - v0.1.0
 * https://louiscasale.com
 * Copyright (c) 2016; * Licensed GPL-2.0+
 */
'use strict';

( function( $ ) {
	$( '.carousel.main' ).slick( {
		infinite: true,
		slidesToShow: 1,
		autoplay: true,
		autoplaySpeed: 3000
	} );

	$( '.carousel:not(.main)' ).slick( {
		infinite: true,
		slidesToShow: 2,
		autoplay: true,
		autoplaySpeed: 2500
	} );
} )( jQuery );
