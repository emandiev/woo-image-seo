<?php for ( $i = 1; $i < 4; $i++ ) : $name = $type .'[custom][' . $i . ']'; ?>
	<div class="form__row">
		<label class="text-select" for="<?php echo $name ?>">
			<span>Custom Text <?php echo $i ?>:</span>
		</label>

		<input
			type="text"
			data-custom-text="1"
			name="<?php echo $name ?>"
			id="<?php echo $name ?>"
			value="<?php echo empty( $settings[ $type ]['custom'][ $i ] ) ? '' : $settings[ $type ]['custom'][ $i ] ?>"
		>
	</div><!-- /.form__row -->
<?php endfor; ?>