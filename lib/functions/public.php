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
 * @param $attr
 * @return array
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
                    // handle unexpected cases
                    $text_value = '';
                    // get product categories
                    $product_categories = get_the_terms( $product_id, 'product_cat' );
                    // go through the first 2 categories and try to use them
                    foreach ( [0, 1] as $index ) {
                        $is_valid_category_name = ! empty( $product_categories[ $index ]->name ) && $product_categories[ $index ]->name !== 'Uncategorized';
                        if ( $is_valid_category_name ) {
                            $text_value = $product_categories[ $index ]->name;
                            break 2;
                        }
                    }
                    break;

                case '[tag]':
                    // get product tags
                    $product_tags = get_the_terms( $product_id, 'product_tag' );
                    $text_value = empty( $product_tags[0]->name ) ? '' : $product_tags[0]->name;
                    break;

                case '[custom]':
                    // custom text
                    $text_value = ! isset( $attribute_values['custom'][ $text_key ] ) ? '' : $attribute_values['custom'][ $text_key ];
                    break;

                case '[site-name]':
                    // site name
                    $text_value = wp_strip_all_tags( get_bloginfo( 'name' ), true );
                    break;

                case '[site-description]':
                    // site description
                    $text_value = wp_strip_all_tags( get_bloginfo( 'description' ) );
                    break;

                case '[site-domain]':
                    // site domain
                    $text_value = empty( $_SERVER['HTTP_HOST'] ) ? '' : $_SERVER['HTTP_HOST'];
                    break;

                case '[current-date]':
                    // current date
                    $text_value = current_time( 'Y-m-d' );
                    break;

                default:
                    // if value is not one of the above
                    $text_value = '';
                    break;
            }

            // handle numbers
            if ( is_int( $text_value ) ) {
                $text_value = (string) $text_value;
            }

            // avoid adding empty strings
            if ( is_string( $text_value ) && strlen( $text_value ) ) {
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
