<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

woo_image_seo_maybe_send_feedback();

woo_image_seo_maybe_save_settings();

?>

<link rel="stylesheet" href="<?php echo WOO_IMAGE_SEO['assets_url'] . 'style.css' ?>" type="text/css" media="all">

<div class="wrap" id="woo_image_seo">
	<?php include WOO_IMAGE_SEO['root_dir'] . 'views/partials/postbox/settings.php' ?>

	<?php include WOO_IMAGE_SEO['root_dir'] . 'views/partials/postbox/feedback.php' ?>

	<?php include WOO_IMAGE_SEO['root_dir'] . 'views/partials/help-modals.php' ?>
</div>

<script src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'settings.js' ?>"></script>
