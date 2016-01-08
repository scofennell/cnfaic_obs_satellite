<?php

/**
 * Register our plugin JS.
 *
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

function cnfaic_obs_satellite_js() {
	new CNFAIC_Obs_Satellite_JS;
}
add_action( 'init', 'cnfaic_obs_satellite_js', 1 );

class CNFAIC_Obs_Satellite_JS {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register' ) );
	}

	function register() {

		wp_register_script( CNFAIC_OBSS_NAMESPACE, CNFAIC_OBSS_URL . 'js/script.js', array( 'jquery' ), CNFAIC_OBSS_VERSION, FALSE );

	}

}

?>