<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="form__row">
	<label class="text-select" for="<?php echo $type ?>[text][1]">
		<span><?php _e( 'Attribute builder', 'woo-image-seo' ) ?></span>

		<a
			href="#attribute-builder-help"
			class="dashicons dashicons-editor-help"
			title="<?php _e( 'Click to learn about the Attribute Builder', 'woo-image-seo' ) ?>"
		></a>
	</label>


	<div class="form__inner">
		<?php for ( $i = 1; $i < 4; $i++ ) : ?>
			<select
				name="<?php echo $type ?>[text][<?php echo $i ?>]"
				id="<?php echo $type ?>[text][<?php echo $i ?>]"
			>
				<option
					value="[none]"
					class="wis-c-999"
					<?php selected( $settings[ $type ]['text'][ $i ], '[none]' ) ?>
				>&#x3C;<?php _e( 'Empty', 'woo-image-seo' ) ?>&#x3E;</option>

				<option
					value="[name]"
					<?php selected( $settings[ $type ]['text'][ $i ], '[name]' ) ?>
				><?php _e( 'Product Name', 'woo-image-seo' ) ?></option>

				<option
					value="[category]"
					<?php selected( $settings[ $type ]['text'][ $i ], '[category]' ) ?>
				><?php _e( 'First Category', 'woo-image-seo' ) ?></option>

				<option
					value="[tag]"
					<?php selected( $settings[ $type ]['text'][ $i ], '[tag]' ) ?>
				><?php _e( 'First Tag', 'woo-image-seo' ) ?></option>

				<option
					value="[custom]"
					<?php selected( $settings[ $type ]['text'][ $i ], '[custom]' ) ?>
				><?php _e( 'Custom Text', 'woo-image-seo' ) ?> <?php echo $i ?></option>
			</select>
		<?php endfor; ?>
	</div>
</div><!-- /.form__row -->