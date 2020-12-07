<div class="form__row">
	<label class="text-select" for="<?php echo $type ?>[text][1]">
		<span>Attribute builder:</span>
	</label>

	<?php for ( $i = 1; $i < 4; $i++ ) : ?>
		<select name="<?php echo $type ?>[text][<?php echo $i ?>]" id="<?php echo $type ?>[text][<?php echo $i ?>]">
			<option value="[none]" <?php selected( $settings[ $type ]['text'][ $i ], '[none]' ) ?>>Empty</option>

			<option value="[name]" <?php selected( $settings[ $type ]['text'][ $i ], '[name]' ) ?>>Product Name</option>

			<option value="[category]" <?php selected( $settings[ $type ]['text'][ $i ], '[category]' ) ?>>First Category</option>

			<option value="[tag]" <?php selected( $settings[ $type ]['text'][ $i ], '[tag]' ) ?>>First Tag</option>

			<option value="[custom]" <?php selected( $settings[ $type ]['text'][ $i ], '[custom]' ) ?>>Custom Text <?php echo $i ?></option>
		</select>
	<?php endfor; ?>

	<a href="#attribute-builder-help" class="dashicons dashicons-editor-help" title="Click to learn about the Attribute Builder"></a>
</div><!-- /.form__row -->