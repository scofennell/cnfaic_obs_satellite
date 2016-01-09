<?php

/**
 * Register our plugin JS.
 *
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

function cnfaic_obs_satellite_settings() {
	new CNFAIC_Obs_Satellite_Settings;
}
add_action( 'init', 'cnfaic_obs_satellite_settings', 1 );

class CNFAIC_Obs_Satellite_Settings {

	public function __construct() {
	
		//wp_die( 20 );

	}
}

?>