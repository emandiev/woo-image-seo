<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Load translation text domain and AJAX actions
 */
add_action( 'init', function() {
    load_plugin_textdomain( 'woo-image-seo', false, 'woo-image-seo/i18n/languages' );

    require_once WOO_IMAGE_SEO['root_dir'] . 'lib/ajax-actions/save-settings.php';
    require_once WOO_IMAGE_SEO['root_dir'] . 'lib/ajax-actions/send-feedback.php';
}, PHP_INT_MAX );

/*
 * Add settings page to the WooCommerce menu item
 */
add_action( 'admin_menu', function() {
    add_submenu_page(
        'woocommerce',
        'Top Image SEO',
        'Top Image SEO',
        'manage_options',
        'woo_image_seo',
        function() {
            require_once WOO_IMAGE_SEO['root_dir'] . '/views/settings.php';
        },
        PHP_INT_MAX
    );
}, PHP_INT_MAX );

/**
 * Enqueue admin scripts
 */
add_action( 'admin_enqueue_scripts', function() {
    if ( strpos( $_SERVER['REQUEST_URI'], 'admin.php?page=woo_image_seo' ) === false ) {
        return;
    }

    wp_enqueue_style(
        'woo-image-seo-settings-page',
        WOO_IMAGE_SEO['assets_url'] . 'style.css',
        [],
        WOO_IMAGE_SEO['version']
    );

    wp_enqueue_script(
        'woo-image-seo-settings-page',
        WOO_IMAGE_SEO['assets_url'] . 'settings.js',
        [],
        WOO_IMAGE_SEO['version']
    );

    // locale-specific css
    if ( woo_image_seo_i18n_has_key( 'css' ) ) {
        wp_enqueue_style(
            'woo-image-seo-i18n',
            WOO_IMAGE_SEO['root_url'] . 'i18n/assets/' . WOO_IMAGE_SEO['site_locale'] . '/css/admin.css',
            [],
            WOO_IMAGE_SEO['version']
        );
    }
}, PHP_INT_MAX );

/**
 * Prepare media library help text
 */
add_action( 'print_media_templates', function() {
    require_once WOO_IMAGE_SEO['views_dir'] . 'media-popup.php';
}, PHP_INT_MAX, 2 );

/**
 * Add link to settings page on the Plugins page
 */
add_filter( 'plugin_action_links_woo-image-seo/woo-image-seo.php', function( $links ) {
    return array_merge(
        [
            'settings' =>'<a href="' . admin_url() . 'admin.php?page=woo_image_seo">' . __( 'Settings', 'woo-image-seo' ) . '</a>'
        ],
        $links
    );
}, PHP_INT_MAX );

/**
 * Add pro version banner
 */
add_action( 'woo_image_seo_admin_after_settings', function() {
	require_once WOO_IMAGE_SEO['views_dir'] . 'partials/pro-banner.php';
} );

/**
 * Display admin notice for Top Image SEO Pro
 */
function woo_image_seo_pro_ad_admin_notice() {
	global $pagenow;
	if ( $pagenow !== 'index.php' ) {
		return; // Exit if not on the Dashboard landing page
	}

	// Check if Pro plugin is active
	if ( is_plugin_active( 'woo-image-seo-pro/woo-image-seo-pro.php' ) ) {
		return;
	}

	$dismissed = (int) get_user_meta( get_current_user_id(), 'woo_image_seo_pro_ad_admin_notice', true );
	if ( $dismissed && ( time() - $dismissed ) < 60 * 24 * 60 * 60 ) {
		return; // Exit if the notice was dismissed within the last 60 days
	}

	wp_enqueue_style(
		'woo-image-seo-dashboard-styles',
		WOO_IMAGE_SEO['assets_url'] . 'dashboard.css',
		[],
		WOO_IMAGE_SEO['version']
	);

	?>
    <div class="notice woo-image-seo-pro-banner is-dismissible">
        <div class="woo-image-seo-pro-banner__aside">
            <div class="woo-image-seo-img-graphic">
                <div class="woo-image-seo-img-graphic__img">
                    <span class="dashicons dashicons-format-image"></span>
                </div>

                <div class="woo-image-seo-img-graphic__arrow">
                    <div class="woo-image-seo-animated-arrow">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div class="woo-image-seo-img-graphic__img woo-image-seo-img-graphic__img--shrinking">
                    <span class="dashicons dashicons-format-image"></span>
                </div>
            </div><!-- /.woo-image-seo-img-graphic -->

            <p>Now with image optimization!!!</p>
        </div><!-- /.woo-image-seo-pro-banner__aside -->

        <div class="woo-image-seo-pro-banner__content">
            <div class="woo-image-seo-pro-banner__text">
                <h2><a href="https://wooimageseo.com/?ref=kb" target="_blank">Top Image SEO Pro is available!</a></h2>

                <p>Advanced features, premium support.</p>

                <p>👉 <a href="https://wooimageseo.com/?ref=kb" target="_blank">Learn more about Pro</a></p>
            </div>

            <div class="woo-image-seo-pro-banner__features">
                <div class="woo-image-seo-features">
                    <div class="woo-image-seo-features__items">
                        <div class="woo-image-seo-features__item">
                            <div class="woo-image-seo-feature">
                                <div class="woo-image-seo-feature__icon">
                                    <span class="dashicons dashicons-download"></span>
                                </div>

                                <div class="woo-image-seo-feature__text">
                                    <h3>Save attributes to database</h3>
                                </div>
                            </div>
                        </div>

                        <div class="woo-image-seo-features__item">
                            <div class="woo-image-seo-feature">
                                <div class="woo-image-seo-feature__icon">
                                    <span class="dashicons dashicons-editor-code"></span>
                                </div>

                                <div class="woo-image-seo-feature__text">
                                    <h3>Yoast SEO + RankMath support</h3>
                                </div>
                            </div>
                        </div>

                        <div class="woo-image-seo-features__item">
                            <div class="woo-image-seo-feature">
                                <div class="woo-image-seo-feature__icon">
                                    <span class="dashicons dashicons-yes"></span>
                                </div>

                                <div class="woo-image-seo-feature__text">
                                    <h3>Attribute checker</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(document).on('click', '.woo-image-seo-pro-banner .notice-dismiss', function () {
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'dismiss_admin_notice',
                        notice_id: 'woo_image_seo_pro_ad_admin_notice',
                        nonce: '<?php echo wp_create_nonce( 'dismiss_notice_nonce' ); ?>'
                    }
                });
            });
        });
    </script>
	<?php
}

add_action( 'admin_notices', 'woo_image_seo_pro_ad_admin_notice' );

// Handle the AJAX request to dismiss the admin notice
add_action( 'wp_ajax_dismiss_admin_notice', function () {
	check_ajax_referer( 'dismiss_notice_nonce', 'nonce' );
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error();
	}

	$notice_id = sanitize_text_field( $_POST['notice_id'] );
	if ( $notice_id === 'woo_image_seo_pro_ad_admin_notice' ) {
		update_user_meta( get_current_user_id(), 'woo_image_seo_pro_ad_admin_notice', time() );
	}
	wp_send_json_success();
} );
