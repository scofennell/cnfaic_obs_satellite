<?php

/**
 * Plugin Name: CNFAIC Observations Satellite
 * Plugin URI:  http://www.scottfennell.org/
 * Description: Shortcodes for loading the CNFAIC.org content into satellite avy centers.
 * Version:     0.1
 * Author:      Scott Fennell
 * Author URI:  http://www.scottfennell.org/
 * Text Domain: cnfaic-obs-satellite
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }

/**
 * Define the plugin constants for easy use throughout the plugin.
 * In theory, you should be able to change any of these values and still have the plugin work.
 * Don't do that.
 */

// The namespace for our plugin, used in CSS classes, php classes, form input names, etc.
define( 'CNFAIC_OBSS_NAMESPACE', 'cnfaic_obs_satellite' );

// The version of our plugin, for cache busting.
define( 'CNFAIC_OBSS_VERSION', 0.1 );

// A constant to define the path to this plugin file and sub-folders.
define( 'CNFAIC_OBSS_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'CNFAIC_OBSS_ADMIN_PATH', CNFAIC_OBSS_PATH . 'admin/' );
define( 'CNFAIC_OBSS_INC_PATH', CNFAIC_OBSS_PATH . 'inc/' );

// A constant to define the url to this plugin file and sub-folders.
define( 'CNFAIC_OBSS_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'CNFAIC_OBSS_ADMIN_URL', CNFAIC_OBSS_URL . 'admin/' );
define( 'CNFAIC_OBSS_INC_URL', CNFAIC_OBSS_URL . 'inc/' );

/**
 * Include the files that are used on both the front and back end.
 */

// Register our JS.
require_once( CNFAIC_OBSS_INC_PATH . 'js.php' );

// Register shortcodes.
require_once( CNFAIC_OBSS_INC_PATH . 'shortcodes/obs_form.php' );
require_once( CNFAIC_OBSS_INC_PATH . 'shortcodes/obs_table.php' );
require_once( CNFAIC_OBSS_INC_PATH . 'shortcodes/obs_map.php' );

?>