<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter common image attributes to add SEO attributes
 */
add_filter(
    'wp_get_attachment_image_attributes',
    'woo_image_seo_get_image_attributes',
    PHP_INT_MAX
);

/**
 * Filter woo_variation_gallery_get_image_props to add SEO attributes
 * This is used by the Woo Variation Gallery plugin
 */
add_filter(
	'woo_variation_gallery_get_image_props',
	'woo_image_seo_get_variation_gallery_image_attributes',
	PHP_INT_MAX,
	3
);
