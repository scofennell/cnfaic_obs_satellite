<?php

/**
 * Register an abstract class from which all of our shortcodes will inherit.
 *
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

abstract class CNFAIC_Obs_Satellite_Shortcode {

	public function __construct( $slug ) {

		$this -> slug = $slug;	

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 990 );

		//add_action( 'wp_enqueue_scripts', array( $this, 'localize' ), 991 );

		add_action( 'wp_enqueue_scripts', array( $this, 'localize' ) );

		$this -> set_loader_div();

		add_shortcode( 'obs_satellite_' . $slug, array( $this, 'obs_satellite_' . $slug ) );

	}

	function enqueue() {

		wp_enqueue_script( CNFAIC_OBSS_NAMESPACE );

	}

	function get_loader_div() {

		return $this -> loader_div;

	}

	function set_loader_div() {

		$id = __CLASS__ . '-' . $this -> slug;

		$class = CNFAIC_OBSS_NAMESPACE . '-loader';

		$out = "
			<div id='$id' class='$class'>
				<iframe id='$class-frame' src='' width='100%' height='300'>
				</iframe>
			</div>
		";

		$this -> loader_div = $out;

	}

	function get_localization_data() {

		return $this -> localization_data;

	}

	function set_localization_data() {

		$data = array(
			'loader'     => '.' . CNFAIC_OBSS_NAMESPACE . '-loader iframe',
			'url_base'   => 'http://dev.cnfaic.org/site/',
			'url_suffix' => '-embedded',
		);

		$this -> localization_data = $data;

	}

	function localize() {

		$data = $this -> localization_data;

		wp_localize_script( 'jquery', CNFAIC_OBSS_NAMESPACE, $data );

	}

}