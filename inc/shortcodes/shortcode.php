<?php

/**
 * Register an abstract class from which all of our shortcodes will inherit.
 *
 * @package WordPress
 * @subpackage cnfaic-obs-satellite
 * @since CNFAIC Obs Satellite 0.1
 */

abstract class CNFAIC_Obs_Satellite_Shortcode {

	public static $localized = FALSE;

	public function __construct( $slug ) {

		$this -> slug = $slug;

		$this -> set_localization_data();

		add_shortcode( 'obs_satellite_' . $slug, array( $this, 'obs_satellite_' . $slug ) );

		$this -> set_iframe_url();	

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 990 );

		add_action( 'wp_enqueue_scripts', array( $this, 'localize' ) );

	}

	function enqueue() {

		wp_enqueue_script( CNFAIC_OBSS_NAMESPACE );

		wp_enqueue_style( CNFAIC_OBSS_NAMESPACE );	

	}

	function set_loader_div( $atts ) {

		$url = $this -> iframe_url;

		$atts_san = array();
		foreach( $atts as $k => $v ) {

			$k = sanitize_key( $k );
			$v = esc_attr( $v );

			$url = add_query_arg( array( $k => $v ), $url );

		}

		$id = __CLASS__ . '-' . $this -> slug;

		$class = CNFAIC_OBSS_NAMESPACE . '-loader';

		//wp_die( var_dump( $this -> atts ) );

		$out = "
			<div id='$id' class='$class'>
				<iframe id='$class-frame' src='$url'></iframe>
			</div>
		";

		$this -> loader_div = $out;

	}

	function get_loader_div() {
		return $this -> loader_div;
	}

	function set_iframe_url() {

		$base   = 'dev.cnfaic.org/site/';
		$slug   = $this -> slug;
		$suffix = '-embedded';

		$url = esc_url( $base . $slug . $suffix );

		$this -> iframe_url = $url;

	}

	function get_iframe_url() {
		return $this -> iframe_url;
	}

	function set_localization_data() {

		$data = array(
			'loader'       => '.' . CNFAIC_OBSS_NAMESPACE . '-loader',
		);

		$this -> localization_data = $data;

	}


	function get_localization_data() {

		return $this -> localization_data;

	}

	function localize() {

		if( self::$localized ) { return FALSE; }

		$data = $this -> localization_data;

		wp_localize_script( 'jquery', CNFAIC_OBSS_NAMESPACE, $data );

		self::$localized = TRUE;

	}

}