<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Add our custom filter to the attributes of WooCommerce products
 */
add_filter( 'wp_get_attachment_image_attributes', function( $attr ) {
    if ( get_post_type() !== 'product' ) {
        return $attr;
    }

    return woo_image_seo_get_image_attributes( $attr );
}, PHP_INT_MAX, 2 );
