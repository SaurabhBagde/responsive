var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {
	"use strict";
    // Woo vertical thumbnails
    responsiveWooThumbnails();
} );

// On load
$j( window ).on( 'load', function() {
	"use strict";
    // Woo vertical thumbnails
    responsiveWooThumbnails();
} );

// On resize
$j( window ).on( 'resize', function() {
	"use strict";
    // Woo vertical thumbnails
    responsiveWooThumbnails();
} );

/* ==============================================
WOOCOMMERCE VERTICAL THUMBNAILS
============================================== */
function responsiveWooThumbnails() {
	"use strict"

	var $thumbnails = $j( '.responsive-thumbs-layout-vertical' ),
		$nav 		= $thumbnails.find( '.flex-control-nav' );

	if ( $nav.length > 0 ) {

		if ( $j( window ).width() > 768 ) {

			var $image_height 	= $thumbnails.find( '.flex-viewport' ).height(),
				$nav_height 	= $thumbnails.find('.flex-control-nav').height();

			if ( $nav_height > ( $image_height + 50 ) ) {
				$nav.css( {
					'max-height' : $image_height + 'px',
				} );
			}

		} else {
			$nav.css( {
				'max-height' : '',
			} );
		}

	}

}
