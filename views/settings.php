<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

woo_image_seo_maybe_save_settings();

$settings = woo_image_seo_get_settings();

?>

<style>
	<?php echo file_get_contents( WOO_IMAGE_SEO['root_dir'] . 'assets/style.css' ); ?>
</style>

<div class="wrap">
	<div class="postbox">
		<h1>Woo Image SEO</h1>

		<form action="admin.php?page=woo_image_seo" method="post" id="woo_image_seo_form">
			<div class="wrap">
				<fieldset>
					<legend>Alt attributes</legend>

					<input type="checkbox" class="hidden" name="alt[enable]" value="0" checked>

					<input type="checkbox" class="hidden" name="alt[force]" value="0" checked>

					<div class="form__row">
						<label>
							<input type="checkbox" name="alt[enable]" value="1" <?php if ($settings['alt']['enable'] === 1) echo "checked"; ?>> Automatic alt attributes
							<span class="checkmark"></span>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label>
							<input type="checkbox" name="alt[force]" value="1" <?php if ($settings['alt']['force'] === 1) echo "checked"; ?>> Force alt attributes
							<span class="checkmark"></span>
							<a href="#force-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label class="text-select">
							<span>Attribute builder:</span>

							<select name="alt[text][1]">
								<option value="[none]" <?php if ($settings['alt']['text'][1] === '[none]') echo "selected"; ?>>Empty</option>

								<option value="[name]" <?php if ($settings['alt']['text'][1] === '[name]') echo "selected"; ?>>Product Name</option>

								<option value="[category]" <?php if ($settings['alt']['text'][1] === '[category]') echo "selected"; ?>>First Category</option>

								<option value="[tag]" <?php if ($settings['alt']['text'][1] === '[tag]') echo "selected"; ?>>First Tag</option>

								<option value="[custom]" <?php if ($settings['alt']['text'][1] === '[custom]') echo "selected"; ?>>Custom Text 1</option>
							</select>

							<select name="alt[text][2]">
								<option value="[none]" <?php if ($settings['alt']['text'][2] === '[none]') echo "selected"; ?>>Empty</option>

								<option value="[name]" <?php if ($settings['alt']['text'][2] === '[name]') echo "selected"; ?>>Product Name</option>

								<option value="[category]" <?php if ($settings['alt']['text'][2] === '[category]') echo "selected"; ?>>First Category</option>

								<option value="[tag]" <?php if ($settings['alt']['text'][2] === '[tag]') echo "selected"; ?>>First Tag</option>

								<option value="[custom]" <?php if ($settings['alt']['text'][2] === '[custom]') echo "selected"; ?>>Custom Text 2</option>
							</select>

							<select name="alt[text][3]">
								<option value="[none]" <?php if ($settings['alt']['text'][3] === '[none]') echo "selected"; ?>>Empty</option>

								<option value="[name]" <?php if ($settings['alt']['text'][3] === '[name]') echo "selected"; ?>>Product Name</option>

								<option value="[category]" <?php if ($settings['alt']['text'][3] === '[category]') echo "selected"; ?>>First Category</option>

								<option value="[tag]" <?php if ($settings['alt']['text'][3] === '[tag]') echo "selected"; ?>>First Tag</option>

								<option value="[custom]" <?php if ($settings['alt']['text'][3] === '[custom]') echo "selected"; ?>>Custom Text 3</option>
							</select>

							<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label class="text-select">
							<span>Custom Text 1:</span>

							<input type="text" data-custom-text="1" name="alt[custom][1]" value="<?php echo empty( $settings['alt']['custom'][1] ) ? '' : $settings['alt']['custom'][1] ?>">

							<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label class="text-select">
							<span>Custom Text 2:</span>

							<input type="text" data-custom-text="2" name="alt[custom][2]" value="<?php echo empty( $settings['alt']['custom'][2] ) ? '' : $settings['alt']['custom'][2] ?>">

							<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label class="text-select">
							<span>Custom Text 3:</span>

							<input type="text" data-custom-text="3" name="alt[custom][3]" value="<?php echo empty( $settings['alt']['custom'][3] ) ? '' : $settings['alt']['custom'][3] ?>">

							<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->
				</fieldset>

				<fieldset>
					<legend>Title attributes</legend>

					<input type="checkbox" class="hidden" name="title[enable]" value="0" checked>

					<input type="checkbox" class="hidden" name="title[force]" value="0" checked>

					<div class="form__row">
						<label>
							<input type="checkbox" name="title[enable]" value="1" <?php if ($settings['title']['enable'] === 1) echo "checked"; ?>> Automatic title attributes

							<span class="checkmark"></span>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label>
							<input type="checkbox" name="title[force]" value="1" <?php if ($settings['title']['force'] === 1) echo "checked"; ?>> Force title attributes (recommended)

							<span class="checkmark"></span>

							<a href="#force-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label class="text-select">
							<span>Attribute builder:</span>

							<select name="title[text][1]">
								<option value="[none]" <?php if ($settings['title']['text'][1] === '[none]') echo "selected"; ?>>Empty</option>

								<option value="[name]" <?php if ($settings['title']['text'][1] === '[name]') echo "selected"; ?>>Product Name</option>

								<option value="[category]" <?php if ($settings['title']['text'][1] === '[category]') echo "selected"; ?>>First Category</option>

								<option value="[tag]" <?php if ($settings['title']['text'][1] === '[tag]') echo "selected"; ?>>First Tag</option>

								<option value="[custom]" <?php if ($settings['title']['text'][1] === '[custom]') echo "selected"; ?>>Custom Text 1</option>
							</select>

							<select name="title[text][2]">
								<option value="[none]" <?php if ($settings['title']['text'][2] === '[none]') echo "selected"; ?>>Empty</option>

								<option value="[name]" <?php if ($settings['title']['text'][2] === '[name]') echo "selected"; ?>>Product Name</option>

								<option value="[category]" <?php if ($settings['title']['text'][2] === '[category]') echo "selected"; ?>>First Category</option>

								<option value="[tag]" <?php if ($settings['title']['text'][2] === '[tag]') echo "selected"; ?>>First Tag</option>

								<option value="[custom]" <?php if ($settings['title']['text'][2] === '[custom]') echo "selected"; ?>>Custom Text 2</option>
							</select>

							<select name="title[text][3]">
								<option value="[none]" <?php if ($settings['title']['text'][3] === '[none]') echo "selected"; ?>>Empty</option>

								<option value="[name]" <?php if ($settings['title']['text'][3] === '[name]') echo "selected"; ?>>Product Name</option>

								<option value="[category]" <?php if ($settings['title']['text'][3] === '[category]') echo "selected"; ?>>First Category</option>

								<option value="[tag]" <?php if ($settings['title']['text'][3] === '[tag]') echo "selected"; ?>>First Tag</option>

								<option value="[custom]" <?php if ($settings['title']['text'][3] === '[custom]') echo "selected"; ?>>Custom Text 3</option>
							</select>

							<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label class="text-select">
							<span>Custom Text 1:</span>

							<input type="text" data-custom-text="1" name="title[custom][1]" value="<?php echo empty( $settings['alt']['custom'][1] ) ? '' : $settings['alt']['custom'][1] ?>">

							<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label class="text-select">
							<span>Custom Text 2:</span>

							<input type="text" data-custom-text="2" name="title[custom][2]" value="<?php echo empty( $settings['alt']['custom'][2] ) ? '' : $settings['alt']['custom'][2] ?>">

							<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->

					<div class="form__row">
						<label class="text-select">
							<span>Custom Text 3:</span>

							<input type="text" data-custom-text="3" name="title[custom][3]" value="<?php echo empty( $settings['alt']['custom'][3] ) ? '' : $settings['alt']['custom'][3] ?>">

							<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
						</label>
					</div><!-- /.form__row -->
				</fieldset>
			</div>

			<input type="submit" value="Save Settings">

			<input
				type="button"
				value="Reset to Default"
				id="reset-settings"
				data-default-settings="<?php echo esc_html( WOO_IMAGE_SEO['default_settings'] ) ?>"
			>

			<?php wp_nonce_field( 'nonce' ); ?>
		</form>
	</div>

	<div id="post-success" class="hidden">Settings Saved!</div>

	<?php include WOO_IMAGE_SEO['root_dir'] . 'views/partials/help-modals.php' ?>
</div>

<script src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'settings.js' ?>"></script>
