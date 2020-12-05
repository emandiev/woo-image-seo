<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once WOO_IMAGE_SEO['root_dir'] . 'lib/functions.php';

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

					<label>
						<input type="checkbox" name="alt[enable]" value="1" <?php if ($settings['alt']['enable'] === 1) echo "checked"; ?>> Automatic alt attributes
						<span class="checkmark"></span>
					</label>

					<label>
						<input type="checkbox" name="alt[force]" value="1" <?php if ($settings['alt']['force'] === 1) echo "checked"; ?>> Force alt attributes
						<span class="checkmark"></span>
						<a href="#force-help" class="dashicons dashicons-editor-help"></a>
					</label>

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

					<label class="text-select">
						<span>Custom Text 1:</span>

						<input type="text" data-custom-text="1" name="alt[custom][1]" value="<?php echo empty( $settings['alt']['custom'][1] ) ? '' : $settings['alt']['custom'][1] ?>">

						<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
					</label>

					<label class="text-select">
						<span>Custom Text 2:</span>

						<input type="text" data-custom-text="2" name="alt[custom][2]" value="<?php echo empty( $settings['alt']['custom'][2] ) ? '' : $settings['alt']['custom'][2] ?>">

						<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
					</label>

					<label class="text-select">
						<span>Custom Text 3:</span>

						<input type="text" data-custom-text="3" name="alt[custom][3]" value="<?php echo empty( $settings['alt']['custom'][3] ) ? '' : $settings['alt']['custom'][3] ?>">

						<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
					</label>

				</fieldset>

				<fieldset>
					<legend>Title attributes</legend>

					<input type="checkbox" class="hidden" name="title[enable]" value="0" checked>

					<input type="checkbox" class="hidden" name="title[force]" value="0" checked>

					<label>
						<input type="checkbox" name="title[enable]" value="1" <?php if ($settings['title']['enable'] === 1) echo "checked"; ?>> Automatic title attributes

						<span class="checkmark"></span>
					</label>

					<label>
						<input type="checkbox" name="title[force]" value="1" <?php if ($settings['title']['force'] === 1) echo "checked"; ?>> Force title attributes (recommended)

						<span class="checkmark"></span>

						<a href="#force-help" class="dashicons dashicons-editor-help"></a>
					</label>

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

					<label class="text-select">
						<span>Custom Text 1:</span>

						<input type="text" data-custom-text="1" name="title[custom][1]" value="<?php echo empty( $settings['alt']['custom'][1] ) ? '' : $settings['alt']['custom'][1] ?>">

						<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
					</label>

					<label class="text-select">
						<span>Custom Text 2:</span>

						<input type="text" data-custom-text="2" name="title[custom][2]" value="<?php echo empty( $settings['alt']['custom'][2] ) ? '' : $settings['alt']['custom'][2] ?>">

						<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
					</label>

					<label class="text-select">
						<span>Custom Text 3:</span>

						<input type="text" data-custom-text="3" name="title[custom][3]" value="<?php echo empty( $settings['alt']['custom'][3] ) ? '' : $settings['alt']['custom'][3] ?>">

						<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
					</label>
				</fieldset>
			</div>

			<input type="submit" value="Save Settings">

			<input type="button" value="Reset to Default" id="reset-settings">

			<?php wp_nonce_field( 'nonce' ); ?>
		</form>
	</div>

	<div id="post-success" class="hidden">Settings Saved!</div>

	<div id="help-background">
		<span>Click anywhere to close overlay</span>

		<span>Click anywhere to close overlay</span>
	</div>

	<div id="force-help" class="postbox postbox--help">
		<h2>How does "Force attribute" work?</h2>
		<strong>If the setting is disabled:</strong><br>
		The plugin will only set the attribute to images that don't have one.<br>
		This is useful if you wish to set your own attributes for individual images.<br>
		<hr>
		<strong>If the setting is enabled:</strong><br>
		The plugin will set the attribute to all images, even if they already have one.<br>
		This is especially useful for the "title" attribute because WordPress generates title attributes automatically using the file name.<br>
		Example:<br>
		You upload an image with the file name "pic3.jpg".<br>
		WordPress will automatically set a title attribute of "pic3".<br>
		<img src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'force-help.png'; ?>"><br>
		This isn't great if you have not optimized your image file names.<br>
		However, if you have manually set proper titles you may want to disable the setting.
	</div>
	<div id="attribute-builder-help" class="postbox postbox--help">
		<h2>How does the Attribute builder work?</h2>
		The attribute builder let's you customize the attributes that the plugin will set to your product images.<br>
		Example:<br>
		You have a product called "Amazing Avengers Shirt", with main category called "Movie-Inspired Clothing" and two tags "men's clothing" and "avengers".<br>
		By default, the plugin will build the image attribute using only the Product Name, so your images will have "Amazing Avengers Shirt" as attributes.<br>
		If you wish, you can choose to change this by using the drop-down options.<br>
		There are three drop-down positions that allows you to order the way your attribute is formed.<br>
		Let's say you want to include the product's category before its name.<br>
		You would need to change the first option to "First Category", so the setting look like this:<br>
		<img src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'attribute-builder-help.png'; ?>"><br>
		This will result in the following attribute: "Movie-Inspired Clothing Amazing Avengers Shirt".<br>
		You can also choose to include the first tag in the end, resulting in: "Movie-Inspired Clothing Amazing Avengers Shirt men's clothing".
	</div>
</div>

<script>
jQuery(document).ready(function() {

	// AJAX form submission
	jQuery('#woo_image_seo_form').submit(function(e){
		e.preventDefault();
		var data = jQuery(this).serializeArray();

		jQuery.ajax({
					type: 'POST',
					data: data,
					beforeSend: function() {
						jQuery('#woo_image_seo_form input').attr('disabled', 'disabled');
						jQuery('input[type="submit"], input[type="button"]').attr('value', 'Please wait...');
					},
					success: function(){
						jQuery('#woo_image_seo_form input').removeAttr('disabled');
						jQuery('input[type="submit"]').attr('value', 'Save Settings');
						jQuery('#reset-settings').attr('value', 'Reset to Default');
						jQuery('#post-success').text('Settings Saved!').removeClass('hidden');
						setTimeout(function(){ jQuery('#post-success').addClass('hidden'); }, 3000);
					},
					error: function( jqXhr, textStatus, errorThrown ){
						console.log( errorThrown );
					}
		});
		
	});
	
	
	// AJAX Reset Settings
	jQuery('#reset-settings').click(function() {
		// Prepare the default settings by adding WP NONCE fields
		var defaultSettings = JSON.parse('<?php echo WOO_IMAGE_SEO['default_settings']; ?>');
		defaultSettings['_wpnonce'] = jQuery('[name="_wpnonce"]').val();
		defaultSettings['_wp_http_referer'] = jQuery('[name="_wp_http_referer"]').val();
		
		jQuery.ajax({
					type: 'POST',
					data: defaultSettings,
					beforeSend: function() {
						jQuery('#woo_image_seo_form input').attr('disabled', 'disabled');
						jQuery('input[type="submit"], input[type="button"]').attr('value', 'Please wait...');
					},
					success: function(data){
						// Replace the form with the new one
						jQuery('#woo_image_seo_form .wrap').html(jQuery('#woo_image_seo_form .wrap', data));
						jQuery('#woo_image_seo_form input').removeAttr('disabled');
						jQuery('input[type="submit"]').attr('value', 'Save Settings');
						jQuery('#reset-settings').attr('value', 'Reset to Default');
						jQuery('#post-success').text('Default settings applied!').removeClass('hidden');
						setTimeout(function(){ jQuery('#post-success').addClass('hidden'); }, 3000);
					},
					error: function( jqXhr, textStatus, errorThrown ){
						console.log( errorThrown );
					}
		});
	});


	// smooth scroll
	jQuery('#woo_image_seo_form a.dashicons.dashicons-editor-help').click(function(event) {
		event.preventDefault();
		var $target = jQuery(this.hash);
		var $helpBackground = jQuery('#help-background');

		$helpBackground.fadeIn();
		$target.fadeIn();

		$helpBackground.click(function() {
			$helpBackground.fadeOut();
			$target.fadeOut();
		});
	});

});

</script>