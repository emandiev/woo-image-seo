<fieldset>
	<legend>
		<?php echo ucfirst( $type ) ?> attributes
	</legend>

	<?php woo_image_seo_render_form_row( 'enable', $type, $settings ) ?>
	
	<?php woo_image_seo_render_form_row( 'force', $type, $settings ) ?>

	<?php woo_image_seo_render_form_row( 'attribute-builder', $type, $settings ) ?>

	<?php woo_image_seo_render_form_row( 'custom-texts', $type, $settings ) ?>
</fieldset>