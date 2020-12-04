<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
	Lazy but sufficient approach for globally available data
*/
define(
	'WOO_IMAGE_SEO',
	[
		'option_name' => 'woo_image_seo',
		'default_settings' => file_get_contents( __DIR__ . '/default-settings.json' ),
	]
);

/*
	Main function definitions
*/
require_once __DIR__ . '/functions.php';

/*
	Hooks, actions, filters
*/
register_activation_hook( __FILE__, 'woo_image_seo_get_settings' );
add_action( 'admin_menu', 'woo_image_seo_add_page' );
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'woo_image_seo_add_settings_link' );
add_filter( 'wp_get_attachment_image_attributes', 'woo_image_seo_change_image_attributes', 20, 2 );
