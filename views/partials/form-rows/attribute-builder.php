<div class="form__row">
	<label class="text-select" for="<?php echo $type ?>[text][1]">
		<span>Attribute builder:</span>
	</label>

	<select name="<?php echo $type ?>[text][1]" id="<?php echo $type ?>[text][1]">
		<option value="[none]" <?php if ($settings[$type]['text'][1] === '[none]') echo "selected"; ?>>Empty</option>

		<option value="[name]" <?php if ($settings[$type]['text'][1] === '[name]') echo "selected"; ?>>Product Name</option>

		<option value="[category]" <?php if ($settings[$type]['text'][1] === '[category]') echo "selected"; ?>>First Category</option>

		<option value="[tag]" <?php if ($settings[$type]['text'][1] === '[tag]') echo "selected"; ?>>First Tag</option>

		<option value="[custom]" <?php if ($settings[$type]['text'][1] === '[custom]') echo "selected"; ?>>Custom Text 1</option>
	</select>

	<select name="<?php echo $type ?>[text][2]">
		<option value="[none]" <?php if ($settings[$type]['text'][2] === '[none]') echo "selected"; ?>>Empty</option>

		<option value="[name]" <?php if ($settings[$type]['text'][2] === '[name]') echo "selected"; ?>>Product Name</option>

		<option value="[category]" <?php if ($settings[$type]['text'][2] === '[category]') echo "selected"; ?>>First Category</option>

		<option value="[tag]" <?php if ($settings[$type]['text'][2] === '[tag]') echo "selected"; ?>>First Tag</option>

		<option value="[custom]" <?php if ($settings[$type]['text'][2] === '[custom]') echo "selected"; ?>>Custom Text 2</option>
	</select>

	<select name="<?php echo $type ?>[text][3]">
		<option value="[none]" <?php if ($settings[$type]['text'][3] === '[none]') echo "selected"; ?>>Empty</option>

		<option value="[name]" <?php if ($settings[$type]['text'][3] === '[name]') echo "selected"; ?>>Product Name</option>

		<option value="[category]" <?php if ($settings[$type]['text'][3] === '[category]') echo "selected"; ?>>First Category</option>

		<option value="[tag]" <?php if ($settings[$type]['text'][3] === '[tag]') echo "selected"; ?>>First Tag</option>

		<option value="[custom]" <?php if ($settings[$type]['text'][3] === '[custom]') echo "selected"; ?>>Custom Text 3</option>
	</select>

	<a href="#attribute-builder-help" class="dashicons dashicons-editor-help"></a>
</div><!-- /.form__row -->