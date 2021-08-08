<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
	Render a partial template file
	reduces duplicate code in main template file
*/
function woo_image_seo_render_form_row( $name, $type, $settings ) {
    require WOO_IMAGE_SEO['root_dir'] . 'views/partials/form-rows/' . $name . '.php';
}

/*
	Render a fieldset
	"alt" and "title" fieldsets are almost the same, so this function reduces code duplication
*/
function woo_image_seo_render_fieldset( $type ) {
    $settings = woo_image_seo_get_settings();

    require WOO_IMAGE_SEO['root_dir'] . 'views/partials/fieldset.php';
}

/**
 * Helper function to get optional i18n asset url
 * @param string $file_extension
 */
function woo_image_seo_i18n_maybe_load_locale_admin_asset( $file_extension ) {
    if ( ! woo_image_seo_i18n_has_key( $file_extension ) ) {
        return;
    }

    wp_enqueue_style(
        'woo-image-seo-i18n',
        WOO_IMAGE_SEO['root_url'] . 'i18n/assets/' . WOO_IMAGE_SEO['site_locale'] . '/' . $file_extension . '/admin.' . $file_extension,
        [],
        WOO_IMAGE_SEO['version']
    );
}

/**
 * Check if WOO_IMAGE_SEO['i18n'][ WOO_IMAGE_SEO['site_locale'] ][ $key ] exists
 * @param $key
 * @return bool
 */
function woo_image_seo_i18n_has_key( $key ) {
    return
        ! empty( WOO_IMAGE_SEO['i18n'][ WOO_IMAGE_SEO['site_locale'] ] )
        &&
        array_key_exists( $key, WOO_IMAGE_SEO['i18n'][ WOO_IMAGE_SEO['site_locale'] ] )
    ;
}

/**
 * Try to get locale-specific image URL
 * Fallback to default version
 * Also adds version parameter to avoid cache
 * @param $file_name
 * @return string
 */
function woo_image_seo_i18n_image_url( $file_name ) {
    if ( woo_image_seo_i18n_has_key( $file_name ) ) {
        $result = str_replace(
            '/assets/',
            '/i18n/assets/images/' . WOO_IMAGE_SEO['site_locale'] . '/images/' . $file_name,
            WOO_IMAGE_SEO['assets_url']
        );
    } else {
        $result = WOO_IMAGE_SEO['assets_url'] . $file_name;
    }

    return ( $result . '?version=' . WOO_IMAGE_SEO['version'] );
}
