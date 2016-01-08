<?php

/**
 * Register a shortcode for the Observations form.
 *
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

function cnfaic_obs_satellite_form() {
	new CNFAIC_Obs_Satellite_Form;
}
add_action( 'init', 'cnfaic_obs_satellite_form' );

class CNFAIC_Obs_Satellite_Form {

	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'localize' ) );

		add_shortcode( 'obs_satellite_form', array( $this, 'obs_satellite_form' ) );
	
	}

	function obs_satellite_form( $atts ) {

		$a = shortcode_atts( array(), $atts );

		$id = __CLASS__ . '-' . __FUNCTION__;

		$class = CNFAIC_OBSS_NAMESPACE . '-loader';


		$out = "<div id='$id' class='$class'></div>";

		wp_enqueue_script( CNFAIC_OBSS_NAMESPACE );

		return $out;

	}

	function localize() {

		$data = array(
			'url'      => 'http://www.cnfaic.org/site/submit-observations/',
			'selector' => 'contentleft', 
		);

		wp_localize_script( CNFAIC_OBSS_NAMESPACE, __CLASS__, $data );

	}

}