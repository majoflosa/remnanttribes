<?php
/**
 * Plugin Name: Remnant Tribes Post Types
 * Description: Enables custom post types and taxonomies for the remnanttribes.com site
 * Author: Mauricio J Flores
 * Author URI: http://maurojflores.com
 * Version: 1.0.0
 */

// security check
if ( ! function_exists( 'add_action' ) ) {
    die( 'Plugin files cannot be accessed directly. But nice try.' );
}

// shorthand for plugin's base path & url
define( 'REM_CUSTOM_TYPES_PATH', plugin_dir_path( __FILE__ ) );
define( 'REM_CUSTOM_TYPES_URL', plugin_dir_url( __FILE__ ) );


// run on plugin initiation
require_once( REM_CUSTOM_TYPES_PATH . '/init.php' );
register_activation_hook( __FILE__, 'rem_init_custom_post_types' );


// register custom post types and taxonomies
require_once( REM_CUSTOM_TYPES_PATH . '/register.php' );
add_action( 'init', 'rem_register_posttypes' );
add_action( 'init', 'rem_register_taxonomies' );

