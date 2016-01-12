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
add_action( 'template_redirect', 'cnfaic_obs_satellite_table', 997 );

final class CNFAIC_Obs_Satellite_Table extends CNFAIC_Obs_Satellite_Shortcode {

	public function __construct() {

		$resource_slug = 'table';

		parent::__construct( $resource_slug );

	}

	function obs_satellite_table( $atts ) {

		$atts = $this -> parse_atts( $atts );

		$this -> set_loader_div( $atts );

		$out = $this -> get_loader_div();

		return $out;

	}

	/*function set_localization_data() {

		$data = $this -> get_localization_data();

		$data['url_slug'] = 'browse-observations';

		$this -> localization_data = $data;

	}*/

}