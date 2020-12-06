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
		'assets_url' => plugin_dir_url( __DIR__ ) . '/assets/',
		'default_settings' => file_get_contents( dirname( __DIR__ ) . '/data/default-settings.json' ),
	]
);

/*
	Get plugin settings
	If not found, saves the default settings first
*/
function woo_image_seo_get_settings() {
	$settings = get_option( WOO_IMAGE_SEO['option_name'] );

	if ( empty( $settings ) ) {
		$settings = woo_image_seo_set_default_settings();
	}

	return json_decode( $settings, true );
}

/*
	Save plugin settings - works only on settings page
*/
function woo_image_seo_maybe_save_settings() {
	if (
		strpos( $_SERVER['REQUEST_URI'], '/admin.php?page=woo_image_seo' ) == false
		||
		empty( $_POST['_wpnonce'] )
		||
		wp_verify_nonce( $_POST['_wpnonce'], 'nonce' ) == false
		||
		current_user_can( 'administrator' ) == false
	) {
		return;
	}

	// Clean the $_POST variable from NONCE elements
	unset( $_POST['_wpnonce'] );
	unset( $_POST['_wp_http_referer'] );

	// save $_POST in JSON format
	update_option( 'woo_image_seo', json_encode( $_POST, JSON_NUMERIC_CHECK ) );
}

/*
	Set default settings
	returns the default settings in JSON string
*/
function woo_image_seo_set_default_settings() {
	update_option( 'woo_image_seo', WOO_IMAGE_SEO['default_settings'] );

	return $default_settings;
}

/*
	Add settings page to dashboard
*/
function woo_image_seo_add_page() {
	add_submenu_page(
		'woocommerce',
		'Woo Image SEO',
		'Woo Image SEO',
		'manage_options',
		'woo_image_seo',
		function() {
			include WOO_IMAGE_SEO['root_dir'] . '/views/settings.php';
		}
	);
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
						} else if ( isset($product_categories[1]) ) { // try to get another category
							$text_value = $product_categories[1]->name;
						} else {
							$text_value = '';
						}
					} else {
						$text_value = '';
					}
					break;

				case '[tag]':
					// get product tags
					$product_tags = get_the_terms( get_the_ID(), 'product_tag' );
					// check if product has a tag
					if ( is_array( $product_tags ) ) {
						$text_value = $product_tags[0]->name;
					} else {
						$text_value = '';
					}
					break;

				case '[custom]':
					// custom text
					$text_value = $attribute_values['custom'][ $text_key ];
					break;

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
	Render a partial template file
	reduces duplicate code in main template file
*/
function woo_image_seo_render_form_row( $name, $type, $settings ) {
	include WOO_IMAGE_SEO['root_dir'] . 'views/partials/form-rows/' . $name . '.php';
}

/*
	Render a fieldset
	"alt" and "title" fieldsets are almost the same, so this function reduces code duplication
*/
function woo_image_seo_render_fieldset( $type ) {
	$settings = woo_image_seo_get_settings();

	include WOO_IMAGE_SEO['root_dir'] . 'views/partials/fieldset.php';
}
