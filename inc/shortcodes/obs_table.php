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
add_action( 'init', 'cnfaic_obs_satellite_table', 997 );

final class CNFAIC_Obs_Satellite_Table extends CNFAIC_Obs_Satellite_Shortcode {

	public function __construct() {

		$slug = 'table';

		$atts = array( 'regions' );

		parent::__construct( $slug, $atts );

	}

	function obs_satellite_table() {

		$out = $this -> get_loader_div();

		return $out;

	}

	/*function set_localization_data() {

		$data = $this -> get_localization_data();

		$data['url_slug'] = 'browse-observations';

		$this -> localization_data = $data;

	}*/

}