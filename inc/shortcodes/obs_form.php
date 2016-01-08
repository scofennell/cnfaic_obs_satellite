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
add_action( 'template_redirect', 'cnfaic_obs_satellite_form', 999 );

final class CNFAIC_Obs_Satellite_Form extends CNFAIC_Obs_Satellite_Shortcode {

	public function __construct() {

		parent::__construct( 'form' );

		parent::set_localization_data();
		$this -> set_localization_data();

		//wp_die( var_dump( $this -> localization_data ) );

		//parent::localize();

	}

	function obs_satellite_form( $atts ) {

		$a = shortcode_atts( array(), $atts );

		$id = __CLASS__ . '-' . __FUNCTION__;

		$class = CNFAIC_OBSS_NAMESPACE . '-loader';

		$out = $this -> get_loader_div();

		return $out;

	}

	function set_localization_data() {

		$data = $this -> get_localization_data();

		$data['url_slug'] = 'submit-observations';

		$this -> localization_data = $data;

	}

}