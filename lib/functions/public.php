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

/**
 * The main attribute modification logic
 * Hooked into the "wp_get_attachment_image_attributes" filter
 * @param array $attr
 * @return array
 */
function woo_image_seo_get_image_attributes( array $attr ): array
{
    if ( get_post_type() !== 'product' ) {
        return $attr;
    }

    // skip images with the "woo-image-seo-skip" class
    if ( ! empty( $attr['class'] ) && strpos( $attr['class'], 'woo-image-seo-skip' ) !== false ) {
        return $attr;
    }

    $product_id = get_the_ID();

    // if no product id is found, return the original attributes
    if ( empty( $product_id ) ) {
        return $attr;
    }

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

    // get plugin settings
    $settings = woo_image_seo_get_settings();

    // check which attributes should be handled - loops through "alt" and "title"
    foreach ( $settings as $attribute_name => $attribute_values ) {
        if ( empty( $attribute_values['enable'] ) ) {
            continue;
        }

        // "forced" attributes will override existing attributes
        if ( empty( $attribute_values['force'] ) && ! empty( $attr[ $attribute_name ] ) ) {
            continue;
        }

        // build the attribute
        $attr[ $attribute_name ] = woo_image_seo_build_attribute( $attribute_values, $product_id );
    }

    // return the modified attributes
    return $attr;
}

/**
 * Build the attribute string based on plugin settings
 * @param $attribute_values
 * @param $product_id
 * @return string
 */
function woo_image_seo_build_attribute( $attribute_values, $product_id ): string
{
    $result = '';

    foreach ( $attribute_values['text'] as $text_key => $text_value ) {
        $result .= woo_image_seo_parse_attribute_text(
            $text_value,
            $text_key,
            $attribute_values['custom'],
            $product_id
        );
    }

    // trim whitespace
    $result = trim( $result );

    // optionally add number at end for products with more than one image
    global $woo_image_seo_product_info;

    if ( ! empty( $attribute_values['count'] ) && $woo_image_seo_product_info['count'] > 1 ) {
        $result .= ' ' . $woo_image_seo_product_info['count'];
    }

    return $result;
}

/**
 * Parse each of the Attribute Builder texts
 * @param $text_value
 * @param $text_key
 * @param $custom_values
 * @param $product_id
 * @return string
 */
function woo_image_seo_parse_attribute_text( $text_value, $text_key, $custom_values, $product_id ): string
{
    $parsed_attribute = '';

    if ( empty( $text_value ) ) {
        return $parsed_attribute;
    }

    switch ( $text_value ) {
        case '[name]':
            // get product title
            $parsed_attribute = get_the_title();
            break;

        case '[category]':
            // get product categories
            $product_categories = get_the_terms( $product_id, 'product_cat' );
            // go through the first 2 categories and try to use them
            foreach ( [0, 1] as $index ) {
                $is_valid_category_name = ! empty( $product_categories[ $index ]->name ) && $product_categories[ $index ]->name !== 'Uncategorized';
                if ( $is_valid_category_name ) {
                    $parsed_attribute = $product_categories[ $index ]->name;
                    break 2;
                }
            }
            break;

        case '[tag]':
            // get product tags
            $product_tags = get_the_terms( $product_id, 'product_tag' );
            $parsed_attribute = empty( $product_tags[0]->name ) ? '' : $product_tags[0]->name;
            break;

        case '[custom]':
            // custom text
            $parsed_attribute = ! isset( $custom_values[ $text_key ] ) ? '' : (string) $custom_values[ $text_key ];
            break;

        case '[site-name]':
            // site name
            $parsed_attribute = wp_strip_all_tags( get_bloginfo( 'name' ), true );
            break;

        case '[site-description]':
            // site description
            $parsed_attribute = wp_strip_all_tags( get_bloginfo( 'description' ) );
            break;

        case '[site-domain]':
            // site domain
            $parsed_attribute = empty( $_SERVER['HTTP_HOST'] ) ? '' : $_SERVER['HTTP_HOST'];
            break;

        case '[current-date]':
            // current date
            $parsed_attribute = current_time( 'Y-m-d' );
            break;

        default:
            break;
    }

    // avoid adding empty strings
    if ( is_string( $parsed_attribute ) && strlen( $parsed_attribute ) ) {
        $parsed_attribute .= ' ';
    }

    return $parsed_attribute;
}
