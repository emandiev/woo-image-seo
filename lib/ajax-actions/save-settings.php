<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'wp_ajax_woo_image_seo_save_settings', function() {
    check_ajax_referer( 'woo_image_seo_save_settings' );

    $return_markup = ! empty( $_POST['reload-form'] );

    // clean the $_POST variable from the values we don't need in the DB
    unset( $_POST['_wpnonce'] );
    unset( $_POST['_wp_http_referer'] );
    unset( $_POST['action'] );
    unset( $_POST['reload-form'] );

    // save $_POST in JSON format
    update_option( 'woo_image_seo', json_encode( $_POST, JSON_NUMERIC_CHECK ) );

    if ( $return_markup ) {
        ob_start();
        include WOO_IMAGE_SEO['views_dir'] . 'partials/form-settings.php';
        wp_send_json( ob_get_clean() );
    }

    return true;
} );
