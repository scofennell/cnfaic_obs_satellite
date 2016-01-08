<?php

/**
 * Register a shortcode for the Observations map.
 *
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

function cnfaic_obs_satellite_map() {
	new CNFAIC_Obs_Satellite_Map;
}
add_action( 'init', 'cnfaic_obs_satellite_map' );

class CNFAIC_Obs_Satellite_Map {

	public function __construct() {
		add_shortcode( 'cnfaic_obs_satellite_map', array( $this, 'obs_satellite_map' ) );
	}

	function obs_satellite_map( $atts ) {

		$a = shortcode_atts( array(), $atts );

		$out = '';

		return $out;

	}

}