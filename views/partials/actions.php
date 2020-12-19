<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="form__actions">
	<input type="submit" value="Save Settings">

	<input
		type="button"
		value="Reset to Default"
		id="reset-settings"
		data-default-settings="<?php echo esc_html( WOO_IMAGE_SEO['default_settings'] ) ?>"
	>
</div><!-- /.form__actions -->