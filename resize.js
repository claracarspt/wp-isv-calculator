/**
 * Auto-fit any Clara Cars calculator iframe to its content height.
 * The embedded widget (claracars.pt/embed-isv) posts { claracarsIsvHeight: <px> } to the parent;
 * we match the sending frame by its contentWindow and set its height. Dependency-free.
 */
( function () {
	'use strict';
	window.addEventListener( 'message', function ( e ) {
		if ( e.origin !== 'https://claracars.pt' ) {
			return;
		}
		var h = e.data && e.data.claracarsIsvHeight;
		if ( ! h ) {
			return;
		}
		var frames = document.getElementsByTagName( 'iframe' );
		for ( var i = 0; i < frames.length; i++ ) {
			if ( frames[ i ].contentWindow === e.source ) {
				frames[ i ].style.height = parseInt( h, 10 ) + 'px';
				break;
			}
		}
	} );
}() );
