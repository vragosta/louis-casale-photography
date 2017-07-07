/**
 * Louis Casale Photography - Twenty Seventeen - v0.1.0
 * https://louiscasale.com
 * Copyright (c) 2016; * Licensed GPL-2.0+
 */
'use strict';

( function( $ ) {

	/**
	 * Carousel settings.
	 */
	$( '.carousel.main' ).slick( {
		infinite: true,
		slidesToShow: 1,
		autoplay: true,
		autoplaySpeed: 3000
	} );

	/**
	 * Fade in effect for images and titles on page load.
	 */
	if ( $( '.unloaded' ).length ) {
		$( 'figure.unloaded' ).removeClass( 'unloaded' );
		$( 'h5.unloaded' ).removeClass( 'unloaded' );
	}

	/**
	 * Sends contact information to contact endpoint for processing.
	 */
	$( '.contact-btn' ).click(function() {
		var _id       = $( 'input[type=hidden]' ).val(),
				firstname = $( '#firstname' ).val(),
				lastname  = $( '#lastname' ).val(),
				email     = $( '#email' ).val(),
				subject   = $( '#subject' ).val(),
				message   = $( '#message' ).val(),
				data      = {
					'firstname' : firstname,
					'lastname' : lastname,
					'email' : email,
					'subject' : subject,
					'message' : message
				};

		if ( _id ) {
			data['_id'] = _id;
		}

		$.ajax( {
			url: LouisCasalePhotography.options.apiUrl  + '/contact/',
			type: 'post',
			headers: {
				'X-WP-Nonce': LouisCasalePhotography.options.nonce
			},
			data: JSON.stringify( data ),
			dataType: 'json',
		} ).then(function( response ) {
			location.reload();
		} );
	});

	/**
	 * Disables right click of images.
	 */
	$( document ).on( 'contextmenu', 'figure div, #swipebox-slider img', function( e ) {
		return false;
	});

} )( jQuery );
