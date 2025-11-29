<?php
/*
	Plugin Name: Top Image SEO
	Description: Improve your WooCommerce SEO! Automatically add alt tags and title attributes to product images using Top Image SEO.
	Version: 1.5.0
	Plugin URI: https://wordpress.org/plugins/woo-image-seo/
	Author: Danail Emandiev
	Author URI: https://wooimageseo.com/
	License: GPLv3
	License URI: https://www.gnu.org/licenses/gpl-3.0.html
	Text Domain: woo-image-seo
	Domain Path: /i18n/languages/
	Requires at least: 4.1
	Tested up to: 6.8.3
	WC requires at least: 4.0
	WC tested up to: 10.2.2
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once __DIR__ . '/lib/init.php';

// Declare compatibility with WooCommerce's HPOS feature.
add_action( 'before_woocommerce_init', function () {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );
