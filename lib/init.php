<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
	Main function definitions
*/
require_once __DIR__ . '/functions.php';

/*
	Hooks, actions, filters
*/
register_activation_hook( __FILE__, 'woo_image_seo_get_settings' );
add_action( 'admin_menu', 'woo_image_seo_add_page' );
add_action( 'init', 'woo_image_seo_load_textdomain' );
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'woo_image_seo_add_settings_link' );
add_filter( 'wp_get_attachment_image_attributes', 'woo_image_seo_change_image_attributes', 20, 2 );
