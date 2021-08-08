<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
	Render a partial template file
	reduces duplicate code in main template file
*/
function woo_image_seo_render_form_row( $name, $type, $settings ) {
    require WOO_IMAGE_SEO['root_dir'] . 'views/partials/form-rows/' . $name . '.php';
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
