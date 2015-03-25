<?php
/**
*
* @package Bluu_Portfolio
* @author Paul Winslow
* @license GPL-2.0+
*
* Plugin Name: 	Bluu Portfolio
* Plugin URI: 	http://pau1winslow.com
* Description: 	Registers portfolio features to the Bluu theme
* Version: 		1.0.0
* Author: 		Paul Winslow
* Author URI: 	http://pau1winslow.com
* Text Domain: 	bluu
* License: 		GPL-2.0+
* License URI: 	http://www.gnu.org/licenses/gpl-2.0.txt
* Domain Path: 	/languages
*
*/


/*----------------------------------------------------------------------------*
* Register portfolio post-type
*----------------------------------------------------------------------------*/

function bluu_register_portfolio_post_type() {

	$labels = array(
		'name'               => __( 'Portfolio Items', 'bluu' ),
		'singular_name'      => __( 'Portfolio Item', 'bluu' ),
		'add_new'            => __( 'Add New', 'bluu' ),
		'add_new_item'       => __( 'Add New Portfolio Item', 'bluu' ),
		'edit_item'          => __( 'Edit Portfolio Item', 'bluu' ),
		'new_item'           => __( 'New Portfolio Item', 'bluu' ),
		'all_items'          => __( 'All Portfolio Items', 'bluu' ),
		'view_item'          => __( 'View Portfolio Items', 'bluu' ),
		'search_items'       => __( 'Search Portfolio Items', 'bluu' ),
		'not_found'          => __( 'No portfolio items found', 'bluu' ),
		'not_found_in_trash' => __( 'No portfolio items found in trash', 'bluu' ),
		'menu_name'          => __( 'Portfolio Items', 'bluu' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio-items' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'exclude_from_search' => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
	);

	register_post_type( 'portfolio-items', $args );

}
add_action( 'init', 'bluu_register_portfolio_post_type' );


/*----------------------------------------------------------------------------*
* Register portfolio categories
*----------------------------------------------------------------------------*/

function bluu_register_portfolio_types() {
	
	$labels = array(
		'name'              => __( 'Portfolio Types', 'bluu' ),
		'singular_name'     => __( 'Portfolio Type', 'bluu' ),
		'search_items'      => __( 'Search Portfolio Types', 'bluu' ),
		'all_items'         => __( 'All Portfolio Types', 'bluu' ),
		'parent_item'       => __( 'Parent Portfolio Type', 'bluu' ),
		'parent_item_colon' => __( 'Parent Portfolio Type:', 'bluu' ),
		'edit_item'         => __( 'Edit Portfolio Types', 'bluu' ),
		'update_item'       => __( 'Update Portfolio Type', 'bluu' ),
		'add_new_item'      => __( 'Add New Portfolio Type', 'bluu' ),
		'new_item_name'     => __( 'New Portfolio Type', 'bluu' ),
		'menu_name'         => __( 'Portfolio Types', 'bluu' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio_types' ),
	);

	register_taxonomy( 'portfolio_types', array( 'portfolio-items' ), $args );

}
add_action( 'init', 'bluu_register_portfolio_types' );
