<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

woo_image_seo_maybe_save_settings();

?>

<link rel="stylesheet" href="<?php echo WOO_IMAGE_SEO['assets_url'] . 'style.css' ?>" type="text/css" media="all">

<div class="wrap">
	<div class="postbox">
		<h1>Woo Image SEO</h1>

		<form action="admin.php?page=woo_image_seo" method="post" id="woo_image_seo_form">
			<div class="wrap">
				<?php woo_image_seo_render_fieldset( 'alt' ) ?>

				<?php woo_image_seo_render_fieldset( 'title' ) ?>
			</div>

			<?php include WOO_IMAGE_SEO['root_dir'] . 'views/partials/actions.php' ?>

			<?php wp_nonce_field( 'nonce' ); ?>
		</form>
	</div>

	<div id="post-success" class="hidden">Settings Saved!</div>

	<?php include WOO_IMAGE_SEO['root_dir'] . 'views/partials/help-modals.php' ?>
</div>

<script src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'settings.js' ?>"></script>
