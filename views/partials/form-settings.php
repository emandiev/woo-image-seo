<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<form id="woo_image_seo_form">
    <input
        type="hidden"
        name="action"
        value="woo_image_seo_save_settings"
    >

    <div class="wrap">
        <?php woo_image_seo_render_fieldset( 'alt' ) ?>

        <?php woo_image_seo_render_fieldset( 'title' ) ?>
    </div>

    <?php include WOO_IMAGE_SEO['views_dir'] . 'partials/actions.php' ?>

    <?php wp_nonce_field( 'woo_image_seo_save_settings' ) ?>
</form>
