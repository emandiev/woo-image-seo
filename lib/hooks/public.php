<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Add our custom filter to the image attributes
 */
add_filter( 'wp_get_attachment_image_attributes', function( $attr ) {
    if ( get_post_type() !== 'product' ) {
        return $attr;
    }

    // skip images with the "woo-image-seo-skip" class
    if ( ! empty( $attr['class'] ) && strpos( $attr['class'], 'woo-image-seo-skip' ) !== false ) {
        return $attr;
    }

    return woo_image_seo_get_image_attributes( $attr );
}, PHP_INT_MAX );
