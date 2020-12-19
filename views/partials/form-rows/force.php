<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="form__row">
	<input type="checkbox" class="hidden" name="<?php echo $type ?>[force]" value="0" checked>

	<label class="label--checkbox">
		<input
			type="checkbox"
			name="<?php echo $type ?>[force]"
			value="1"
			<?php checked( $settings[ $type ]['force'] ) ?>
		> Force <?php echo $type ?> attributes<?php echo $type === 'title' ? ' (recommended)' : '' ?>

		<span class="checkmark"></span>
	</label>

	<a href="#force-help" class="dashicons dashicons-editor-help" title="Click to learn about the Force Attributes option"></a>
</div><!-- /.form__row -->