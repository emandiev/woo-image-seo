<?php for ( $i = 1; $i < 4; $i++ ) : ?>
	<div class="form__row">
		<label class="text-select">
			<span>Custom Text <?php echo $i ?>:</span>
		</label>

		<input
			type="text"
			data-custom-text="1"
			name="<?php echo $type ?>[custom][<?php echo $i ?>]"
			value="<?php echo empty( $settings[ $type ]['custom'][ $i ] ) ? '' : $settings[ $type ]['custom'][ $i ] ?>"
		>

		<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
	</div><!-- /.form__row -->
<?php endfor; ?>