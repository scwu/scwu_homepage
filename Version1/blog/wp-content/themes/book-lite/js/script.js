jQuery( document ).ready( function( $ ) {
	$( '.gallery-icon a' ).hover(
		function() {
    		$(this).parent().parent().find( '.gallery-caption' ).fadeIn(200);
		}, 
		function() {
			$(this).parent().parent().find( '.gallery-caption' ).fadeOut(200);
		} )
} );