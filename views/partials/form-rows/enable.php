<div class="form__row">
	<input type="checkbox" class="hidden" name="<?php echo $type ?>[enable]" value="0" checked>

	<label class="label--checkbox">
		<input type="checkbox" name="<?php echo $type ?>[enable]" value="1" <?php if ($settings[$type]['enable'] === 1) echo "checked"; ?>> Automatic <?php echo $type ?> attributes
		<span class="checkmark"></span>
	</label>
</div><!-- /.form__row -->