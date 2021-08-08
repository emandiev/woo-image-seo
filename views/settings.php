<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<link
	rel="stylesheet"
	href="<?php echo WOO_IMAGE_SEO['assets_url'] . 'style.css?version=' . WOO_IMAGE_SEO['version'] ?>"
	type="text/css"
	media="all"
>

<link
	rel="stylesheet"
	href="<?php echo WOO_IMAGE_SEO['assets_url'] . 'cryptocoins.css?version=' . WOO_IMAGE_SEO['version'] ?>"
	type="text/css"
	media="all"
>

<div class="wrap" id="woo_image_seo">
	<div class="wrap__inner">
		<?php require_once WOO_IMAGE_SEO['root_dir'] . 'views/partials/postbox/settings.php' ?>

		<?php require_once WOO_IMAGE_SEO['root_dir'] . 'views/partials/help-modals.php' ?>
	</div><!-- /.wrap__inner -->

	<div class="wrap__inner">
		<?php require_once WOO_IMAGE_SEO['root_dir'] . 'views/partials/postbox/feedback.php' ?>

		<?php require_once WOO_IMAGE_SEO['root_dir'] . 'views/partials/postbox/share.php' ?>

		<?php require_once WOO_IMAGE_SEO['root_dir'] . 'views/partials/postbox/support.php' ?>
	</div><!-- /.wrap__inner -->
</div>
