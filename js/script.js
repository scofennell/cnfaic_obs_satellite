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
	loader: cnfaic_obs_satellite.loader
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

			//console.log( $( frame[0].contentWindow ) );

			var containerHeight = '1000px';

			$( frame ).css( 'minHeight', containerHeight );

		});

	}

}( jQuery ) );