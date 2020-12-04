<?php
/*
	Plugin Name: Woo Image SEO
	Description: Boost your SEO by automatically adding alt tags and title attributes to all product images. Requires WooCommerce.
	Version: 1.1.0
	Plugin URI: https://wordpress.org/plugins/woo-image-seo/
	Author: Danail Emandiev
	Author URI: https://emandiev.com
	License: GPLv3
	License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
	Get plugin settings
	If not found, saves the default settings first
*/
function woo_image_seo_get_settings() {
	$settings = get_option( 'woo_image_seo' );

	if ( empty( $settings ) ) {
		$settings = woo_image_seo_set_default_settings();
	}

	return json_decode( $settings, true );
}

/*
	Set default settings
	returns the default settings in JSON string
*/
function woo_image_seo_set_default_settings() {
	$default_settings = '{"alt":{"enable":1,"force":0,"text":{"1":"[none]","2":"[name]","3":"[none]"},"custom":{"1":"","2":"","3":""}},"title":{"enable":1,"force":1,"text":{"1":"[none]","2":"[name]","3":"[none]"},"custom":{"1":"","2":"","3":""}}}';

	update_option( 'woo_image_seo', $default_settings );

	return $default_settings;
}

/*
	Add settings page to dashboard
*/
function woo_image_seo_add_page() {
	add_submenu_page( 'woocommerce', 'Woo Image SEO', 'Woo Image SEO', 'manage_options', 'woo_image_seo', function() { include 'settings.php'; } );
}

/*
	Add a link in the Installed Plugins page to the Plugin's settings page
*/
function woo_image_seo_add_settings_link( $links ) {
	array_push( $links, '<a href="admin.php?page=woo_image_seo">Settings</a>' );
	return $links;
}

/*
	Filter wp_get_attachment_image_attributes
*/
function woo_image_seo_change_image_attributes( $attr, $attachment ) {
	if ( get_post_type() !== 'product' ) {
		return $attr;
	}

	return woo_image_seo_get_image_attributes( $attr );
}

/*
	Build custom image attributes
*/
function woo_image_seo_get_image_attributes( $attr ) {
	$settings = woo_image_seo_get_settings();

	// check which attributes should be handled - loops through "alt" and "title"
	foreach ( $settings as $attribute_name => $attribute_values ) {
		$should_handle_attr = $attribute_values['enable'] && ( $attribute_values['force'] || empty( $attr[ $attribute_name ] ) );

		if ( $should_handle_attr === false ) {
			continue;
		}

		// declare var so we can append later
		$attr[ $attribute_name ] = '';

		// check how the attribute is built
		foreach ( $attribute_values['text'] as $text_key => $text_value ) {
			if ( empty( $text_value ) ) {
				continue;
			}

			switch ( $text_value ) {
				case '[name]':
					// get product title
					$text_value = get_the_title();
					break;

				case '[category]':
					// get product categories
					$product_categories = get_the_terms( get_the_ID(), 'product_cat' );
					// check if product has a category, it should be an array
					if ( is_array( $product_categories ) ) {
						// if first category is not "Uncategorized", use it
						if ( $product_categories[0]->name !== 'Uncategorized' ) {
							$text_value = $product_categories[0]->name;
						}
						else if ( isset($product_categories[1]) ) { // try to get another category
							$text_value = $product_categories[1]->name;
						}
					}
					break;

				case '[tag]':
					// get product tags
					$product_tags = get_the_terms( get_the_ID(), 'product_tag' );
					// check if product has a tag
					if ( is_array( $product_tags ) ) {
						$text_value = $product_tags[0]->name;
					}
					break;

				case '[custom]':
					// custom text
					$text_value = $attribute_values['custom'][ $text_key ];

				default:
					// if value is not one of the above
					$text_value = '';
					break;
			}

			// append the proper text
			if ( ! empty( $text_value ) ) {
				$attr[ $attribute_name ] .= $text_value . ' ';
			}
		}

		// trim whitespace
		$attr[ $attribute_name ] = trim( $attr[ $attribute_name ] );
	}

	// return the final attribute to front-end
	return $attr;
}

/*
	Hooks, actions, filters
*/
register_activation_hook( __FILE__, 'woo_image_seo_get_settings' );
add_action( 'admin_menu', 'woo_image_seo_add_page' );
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'woo_image_seo_add_settings_link' );
add_filter( 'wp_get_attachment_image_attributes', 'woo_image_seo_change_image_attributes', 20, 2 );
