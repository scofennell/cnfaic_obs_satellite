/**
 * Scripts for our plugin.
 * 
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

console.log( 9 );
console.log( cnfaic_obs_satellite );

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

			var url = cnfaicObsSat.urlBase + cnfaicObsSat.urlSlug + cnfaicObsSat.urlSuffix;

			console.log( url );

			var content = $( that ).attr( 'src', url );

		});

	}

}( jQuery ) );

console.log( cnfaicObsSat );