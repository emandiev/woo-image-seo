<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
	Lazy but sufficient approach for globally available data
*/
define(
	'WOO_IMAGE_SEO',
	[
		'option_name' => 'woo_image_seo',
		'root_dir' => dirname( __DIR__ ) . '/',
		'views_dir' => dirname( __DIR__ ) . '/views/',
		'root_url' => plugin_dir_url( __DIR__ ) . '',
		'assets_url' => plugin_dir_url( __DIR__ ) . 'assets/',
		'default_settings' => file_get_contents( dirname( __DIR__ ) . '/data/default-settings.json' ),
		'version' => '1.2.3',
		'site_locale' => get_locale(),
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
add_action( 'init', 'woo_image_seo_load_textdomain' );
add_action( 'admin_enqueue_scripts', 'woo_image_seo_i18n_locale_enqueue' );
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'woo_image_seo_add_settings_link' );
add_filter( 'wp_get_attachment_image_attributes', 'woo_image_seo_change_image_attributes', 20, 2 );
add_action( 'print_media_templates', 'woo_image_seo_add_info_on_media_popup', 20, 2 );
