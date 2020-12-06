<div class="form__row">
	<input type="checkbox" class="hidden" name="<?php echo $type ?>[force]" value="0" checked>

	<label class="label--checkbox">
		<input type="checkbox" name="<?php echo $type ?>[force]" value="1" <?php if ($settings[$type]['force'] === 1) echo "checked"; ?>> Force <?php echo $type ?> attributes<?php echo $type === 'title' ? ' (recommended)' : '' ?>
		<span class="checkmark"></span>
	</label>

	<a href="#force-help" class="dashicons dashicons-editor-help"></a>
</div><!-- /.form__row -->