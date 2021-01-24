<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$name = $type . '[count]';

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
			<?php
				if ( ! empty( $settings[ $type ]['count'] ) ) :
				// don't use checked() here because old versions don't have it
			?>
				checked
			<?php endif; ?>
		> Add image number to <?php echo $type ?> attributes

		<span class="checkmark"></span>
	</label>
</div><!-- /.form__row -->