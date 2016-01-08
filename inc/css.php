<?php

/**
 * Register our plugin CSS.
 *
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

function cnfaic_obs_satellite_css() {
	new CNFAIC_Obs_Satellite_CSS;
}
add_action( 'init', 'cnfaic_obs_satellite_css', 1 );

class CNFAIC_Obs_Satellite_CSS {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register' ) );
	}

	function register() {

		wp_register_style( CNFAIC_OBSS_NAMESPACE, CNFAIC_OBSS_URL . 'css/style.css', FALSE, CNFAIC_OBSS_VERSION );

	}

}

?>