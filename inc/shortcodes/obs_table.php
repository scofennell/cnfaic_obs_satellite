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

		$slug = 'table';

		parent::__construct( $slug );

	}

	function obs_satellite_table( $atts ) {

		$a = shortcode_atts( array(

			'regions' => '',

		), $atts );

		$regions_arr = explode( ',', $a['regions'] );
		$regions_arr = array_map( 'absint', $regions_arr );
		$regions = implode( ',', $regions_arr );

		$atts_san = array(
			'regions' => $regions,
		);
		
		$this -> set_loader_div( $atts_san );

		$out = $this -> get_loader_div();

		return $out;

	}

	/*function set_localization_data() {

		$data = $this -> get_localization_data();

		$data['url_slug'] = 'browse-observations';

		$this -> localization_data = $data;

	}*/

}