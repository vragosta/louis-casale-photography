/**
 * Louis Casale Photography - Twenty Seventeen - v0.1.0
 * https://louiscasale.com
 * Copyright (c) 2016; * Licensed GPL-2.0+
 */
'use strict';

( function( $ ) {

	// TODO
	$( '.carousel.main' ).slick( {
		infinite: true,
		slidesToShow: 1,
		autoplay: true,
		autoplaySpeed: 3000
	} );

	// TODO
	$( '.carousel:not(.main)' ).slick( {
		infinite: true,
		slidesToShow: 2,
		autoplay: true,
		autoplaySpeed: 2500
	} );

	// TODO
	if ( $( '.unloaded' ).length ) {
		$( 'figure.unloaded' ).removeClass( 'unloaded' );
		$( 'h5.unloaded' ).removeClass( 'unloaded' );
	}

	// TODO
	$( '.contact' ).click(function() {
		var firstname = $( '#firstname' ).val(),
				lastname  = $( '#lastname' ).val(),
				email     = $( '#email' ).val(),
				subject   = $( '#subject' ).val(),
				message   = $( '#message' ).val(),
				data = {
					'firstname' : firstname,
					'lastname' : lastname,
					'email' : email,
					'subject' : subject,
					'message' : message
				};

		$.ajax( {
			url: LouisCasalePhotography.options.apiUrl  + '/contact/',
			type: 'post',
			headers: {
				'X-WP-Nonce': LouisCasalePhotography.options.nonce
			},
			data: JSON.stringify( data ),
			dataType: 'json',
		} ).then(function( response ) {
			console.log( response );
			location.reload();
		} );
	});

} )( jQuery );
