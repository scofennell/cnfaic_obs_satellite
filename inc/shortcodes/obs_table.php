<?php

/**
 * Register a shortcode for the Browse Observations table.
 *
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

function cnfaic_obs_satellite_table() {
	new CNFAIC_Obs_Satellite_Table;
}
add_action( 'init', 'cnfaic_obs_satellite_table' );

class CNFAIC_Obs_Satellite_Table {

	public function __construct() {
		add_shortcode( 'cnfaic_obs_satellite_table', array( $this, 'obs_satellite_table' ) );
	}

	function obs_satellite_table( $atts ) {

		$a = shortcode_atts( array(), $atts );

		$out = '';

		return $out;

	}

}