( function( $ ) {

	$( function() {
		$( '.icp' ).iconpicker().on( 'iconpickerUpdated', function() {
			$( this ).trigger( 'change' );
		} );
	} );

} )( jQuery );