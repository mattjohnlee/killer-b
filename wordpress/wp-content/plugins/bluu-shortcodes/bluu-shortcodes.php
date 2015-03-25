<?php
/**
*
* @package Bluu_Shortcodes
* @author Paul Winslow
* @license GPL-2.0+
*
* Plugin Name: 	Bluu Shortcodes
* Plugin URI: 	http://pau1winslow.com
* Description: 	Registers shortcodes to the Bluu theme
* Version: 		1.0.0
* Author: 		Paul Winslow
* Author URI: 	http://pau1winslow.com
* License: 		GPL-2.0+
* License URI: 	http://www.gnu.org/licenses/gpl-2.0.txt
*
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/*--------------------------------------------------*/
/* Bluu-Shortcodes class
/*--------------------------------------------------*/

if ( !class_exists( 'BluuShortcodes' ) ) {

	class BluuShortcodes {

	    function __construct() {
	    	require_once( DIRNAME(__FILE__) . '/bluu-shortcodes-functions.php' );
	        add_action( 'wp_enqueue_scripts', array( &$this, 'bluu_shortcodes_public_css' ) );
		}

		/* Register public styles */	 
		function bluu_shortcodes_public_css() {

			$shortcode_css = plugin_dir_url(__FILE__) . 'assets/bluu-shortcodes.css';
			$fontawesome_css = plugin_dir_url(__FILE__) . 'assets/fonts/font-awesome.min.css';

			wp_enqueue_style( 'bluu-shortcodes', $shortcode_css, false, false, 'all' );
			wp_enqueue_style( 'fontawesome', $fontawesome_css, false, false, 'all' );

		}

	} // end class
	
	new BluuShortcodes;

}