/**
 * Scripts for our plugin.
 * 
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

/**
 * Some global vars we can use across our JS.
 * 
 * @type {Object}
 */
var cnfaicObsSat = {

	loader: cnfaic_obs_satellite.loader,
	
	urlBase: cnfaic_obs_satellite.url_base,
	urlSlug: cnfaic_obs_satellite.url_slug,
	urlSuffix: cnfaic_obs_satellite.url_suffix,	

};

jQuery( window ).load( function() {

	var el = jQuery( cnfaicObsSat.loader );

	jQuery( el ).cnfaicObsSatLoader();

});

( function ( $ ) {

	$.fn.cnfaicObsSatLoader = function( options ) {

		// The maybe empty elements...
		return this.each( function() {
			
			var that = this;

			var frame = $( that ).find( 'iframe' );

			// var container = $( that ).parent();
			// var containerHeight = $( container ).height();

			var containerHeight = 1000;

			var url = cnfaicObsSat.urlBase + cnfaicObsSat.urlSlug + cnfaicObsSat.urlSuffix;

			$( frame ).attr( 'src', url );

			$( frame ).css( 'minHeight', containerHeight );

			$( frame ).load( function() {

				console.log( 'iframe loaded' );

			});

		});

	}

}( jQuery ) );