<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$label = __( 'Force ' . $type . ' attributes', 'woo-image-seo' );

if ( $type === 'title' ) {
	$label .= ' (' . __( 'recommended', 'woo-image-seo' ) . ')';
}

?>
<div class="form__row">
	<input
		type="checkbox"
		class="hidden"
		name="<?php echo $type ?>[force]"
		value="0"
		checked
	>

	<label class="label--checkbox">
		<input
			type="checkbox"
			name="<?php echo $type ?>[force]"
			value="1"
			<?php checked( $settings[ $type ]['force'] ) ?>
		><?php echo $label ?>

		<span class="checkmark"></span>
	</label>

	<a
		href="#force-help"
		class="dashicons dashicons-editor-help"
		title="<?php _e( 'Click to learn about the Force Attributes option', 'woo-image-seo' ) ?>"
	></a>
</div><!-- /.form__row -->