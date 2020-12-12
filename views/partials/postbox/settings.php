<div class="postbox">
	<h1>Woo Image SEO Global Settings</h1>

	<form action="admin.php?page=woo_image_seo" method="post" id="woo_image_seo_form">
		<div class="wrap">
			<?php woo_image_seo_render_fieldset( 'alt' ) ?>

			<?php woo_image_seo_render_fieldset( 'title' ) ?>
		</div>

		<?php include WOO_IMAGE_SEO['root_dir'] . 'views/partials/actions.php' ?>

		<?php wp_nonce_field( 'nonce' ); ?>
	</form>

	<div id="post-success" class="hidden bg-gray">Settings Saved!</div>
</div>