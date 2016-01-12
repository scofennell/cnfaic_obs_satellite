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

	public function __construct( $resource_slug ) {

		$this -> resource_slug = $resource_slug;


		$this -> satellite_slug = $this -> set_satellite_slug();



		$this -> set_localization_data();

		add_shortcode( 'obs_satellite_' . $resource_slug, array( $this, 'obs_satellite_' . $resource_slug ) );

		$this -> set_iframe_url();	

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 990 );

		add_action( 'wp_enqueue_scripts', array( $this, 'localize' ) );

	}

	function set_satellite_slug() {

		$domain = $_SERVER['HTTP_HOST'];
		$domain_arr = explode( '.', $domain );
		array_pop( $domain_arr );
		$domain = implode( '.', $domain_arr );

		return $domain;

	}

	function enqueue() {

		wp_enqueue_script( CNFAIC_OBSS_NAMESPACE );

		wp_enqueue_style( CNFAIC_OBSS_NAMESPACE );	

	}

	function parse_atts( $atts ) {
		
		$a = shortcode_atts( array(

			'regions' => '',

		), $atts );

		$regions_arr = explode( ',', $a['regions'] );
		$regions_arr = array_map( 'absint', $regions_arr );
		$regions = implode( ',', $regions_arr );

		$atts_san = array(
			'regions' => $regions,
		);

		return $atts_san;

	}

	function set_loader_div( $atts ) {

		$url = $this -> iframe_url;

		/*$atts_san = array();
		foreach( $atts as $k => $v ) {

			$k = sanitize_key( $k );
			$v = esc_attr( $v );

			$url = add_query_arg( array( $k => $v ), $url );

		}*/

		$url = add_query_arg( array( CNFAIC_SAT_POST_TYPE => $this -> satellite_slug ), $url );

		$id = __CLASS__ . '-' . $this -> resource_slug;

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

		$base   = 'dev.cnfaic.org/site';
		$satellite_slug   = $this -> satellite_slug;
		$resource_slug   = $this -> resource_slug;

		$url = esc_url( $base . '/' . $satellite_slug . '/' . $resource_slug );

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