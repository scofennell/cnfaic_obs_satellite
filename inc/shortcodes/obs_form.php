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
add_action( 'init', 'cnfaic_obs_satellite_form', 998 );

final class CNFAIC_Obs_Satellite_Form extends CNFAIC_Obs_Satellite_Shortcode {

	public function __construct() {

		$slug = 'form';

		parent::__construct( $slug );

		//add_shortcode( 'obs_satellite_' . $slug, array( $this, 'obs_satellite_' . $slug ) );

		//parent::set_localization_data();
		//$this -> set_localization_data();

	}

	function obs_satellite_form( $atts ) {

		$a = shortcode_atts( array(), $atts );

		$out = $this -> get_loader_div();

		return $out;

	}

	/*function set_localization_data() {

		$data = $this -> get_localization_data();

		$data['url_slug'] = 'submit-observations';

		$this -> localization_data = $data;

	}*/

}