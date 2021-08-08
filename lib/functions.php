<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
	Helper variable used to count the number of images for a given product
	The goal is to have unique attributes for all images
	Array key 'id' holds the lastly affected product's id
	Array key 'image_count' holds the currently affected image's index (starts with 1)
*/
$woo_image_seo_product_info = [
	'id' => 0,
	'image_count' => 0,
];

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
	Set default settings
	returns the default settings in JSON string
*/
function woo_image_seo_set_default_settings() {
	update_option( 'woo_image_seo', WOO_IMAGE_SEO['default_settings'] );

	return WOO_IMAGE_SEO['default_settings'];
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
		},
        PHP_INT_MAX
	);
}

/*
	Add a link in the Installed Plugins page to the Plugin's settings page
*/
function woo_image_seo_add_settings_link( $links ) {
    $settings_link = [
        'settings' =>'<a href="' . admin_url() . 'admin.php?page=woo_image_seo">' . __( 'Settings', 'woo-image-seo' ) . '</a>'
    ];

    return array_merge( $settings_link, $links );
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
	$product_id = get_the_ID();

	// helper global to count number of images for current product
	global $woo_image_seo_product_info;

	// modify the global to either add to the image count or reset it
	if ( $woo_image_seo_product_info['id'] === $product_id ) {
		$woo_image_seo_product_info['count']++;
	} else {
		$woo_image_seo_product_info = [
			'id' => $product_id,
			'count' => 1,
		];
	}

	// check which attributes should be handled - loops through "alt" and "title"
	foreach ( $settings as $attribute_name => $attribute_values ) {
		$should_handle_attr = ! empty( $attribute_values['enable'] ) && ( $attribute_values['force'] || empty( $attr[ $attribute_name ] ) );

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
					$product_categories = get_the_terms( $product_id, 'product_cat' );
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
					$product_tags = get_the_terms( $product_id, 'product_tag' );
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

		// (optional) add number for products with more than one image
		if ( ! empty( $attribute_values['count'] ) && $woo_image_seo_product_info['count'] > 1 ) {
			$attr[ $attribute_name ] .= ' ' . $woo_image_seo_product_info['count'];
		}
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

/*
	Get the social share link data
*/
function woo_image_seo_get_socials() {
	return require_once WOO_IMAGE_SEO['root_dir'] . 'data/socials.php';
}

/*
	Load the translations
*/
function woo_image_seo_load_textdomain() {
	load_plugin_textdomain( 'woo-image-seo', false, 'woo-image-seo/i18n/languages' ); 
}

/*
	Helper function to get relative i18n asset path
*/
function woo_image_seo_get_i18n_asset_url( $file_extension ) {
	return WOO_IMAGE_SEO['root_url'] . 'i18n/assets/' . $file_extension . '/' . WOO_IMAGE_SEO['site_locale'] . '.' . $file_extension;
}

/*
	Load locale-specific assets
*/
function woo_image_seo_i18n_locale_enqueue() {
	// load css file if found
	$css_url = woo_image_seo_get_i18n_asset_url( 'css' );
	if ( woo_image_seo_file_exists( $css_url ) ) {
		wp_enqueue_style( 'woo-image-seo-i18n', $css_url, [], WOO_IMAGE_SEO['version'] );
	}
}

/*
	Try to get locale-specific image URL
	Fallback to default version
	Also adds version parameter to avoid cache
*/
function woo_image_seo_i18n_image_url( $file_name ) {
    $default_url = WOO_IMAGE_SEO['assets_url'] . $file_name;
	$locale_url = str_replace(
	    '/assets/',
        '/i18n/assets/images/',
        WOO_IMAGE_SEO['assets_url']
        ) . WOO_IMAGE_SEO['site_locale'] . '/' . $file_name;

	if ( woo_image_seo_file_exists( $locale_url ) ) {
        $result = $locale_url;
    } else {
	    $result = $default_url;
    }

	return ( $result . '?version=' . WOO_IMAGE_SEO['version'] );
}

/**
 * Check if URL exists
 * Best used along with a fallback URL
 * curl -> get_headers -> false
 * @param $url
 * @return bool
 */
function woo_image_seo_file_exists( $url ) {
    $status_code = 404;

    if ( extension_loaded( 'curl' ) ) {
        $curl = curl_init( $url );

        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );

        curl_exec( $curl );

        $status_code = (curl_getinfo( $curl ))['http_code'];

        curl_close( $curl );
    } elseif ( ini_get( 'allow_url_fopen' ) ) {
        $headers = get_headers( $url );

        if ( ! empty( $headers ) ) {
            $status_code = substr( $headers[0], 9, 3 );
        }
    }

    return (int) $status_code === 200;
}

/*
	Modify the Media Library popup to help users understand how the plugin works
*/
function woo_image_seo_add_info_on_media_popup() {
	include_once WOO_IMAGE_SEO['views_dir'] . 'media-popup.php';
}

/**
 * Load all files containing AJAX actions
 */
function woo_image_seo_load_ajax_actions() {
    require_once WOO_IMAGE_SEO['root_dir'] . 'lib/ajax-actions/save-settings.php';
    require_once WOO_IMAGE_SEO['root_dir'] . 'lib/ajax-actions/send-feedback.php';
}
