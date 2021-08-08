<?php

add_action( 'wp_ajax_woo_image_seo_send_feedback', function() {
    check_ajax_referer( 'woo_image_seo_send_feedback' );

    if (
        empty( $_POST['message'] )
        ||
        empty( $_POST['email'] )
    ) {
        wp_send_json_error( 'missing required fields' );
    }

    wp_send_json(
        wp_mail(
            'danail@emandiev.com',
            'Woo Image SEO Plugin Feedback',
            'Email: ' . esc_html( $_POST['email'] ) . '<br>Message: ' . esc_html( $_POST['message'] ),
            [
                'From: Woo Image SEO <danail@emandiev.com>',
                'Content-Type: text/html; charset=UTF-8',
            ]
        )
    );
} );
