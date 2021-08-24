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
