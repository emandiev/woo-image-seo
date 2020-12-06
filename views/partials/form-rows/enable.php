<?php

$name = $type . '[enable]';

?>

<div class="form__row">
	<input
		type="checkbox"
		class="hidden"
		name="<?php echo $name ?>"
		value="0"
		checked
	>

	<label
		class="label--checkbox"
		for="<?php echo $name ?>"
	>
		<input
			type="checkbox"
			name="<?php echo $name ?>"
			id="<?php echo $name ?>"
			value="1"
			<?php checked( $settings[ $type ]['enable'] ) ?>
		> Automatic <?php echo $type ?> attributes

		<span class="checkmark"></span>
	</label>
</div><!-- /.form__row -->