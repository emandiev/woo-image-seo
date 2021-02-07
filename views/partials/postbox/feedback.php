<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="postbox">
	<form
		action="admin.php?page=woo_image_seo"
		method="post"
		id="woo_image_seo_feedback"
	>
		<div class="form__head">
			<h2><?php _e( 'Contact the plugin developer', 'woo-image-seo' ) ?></h2>

			<img src="<?php echo woo_image_seo_i18n_image_url( 'howdy.jpg' ) ?>" alt="">
		</div><!-- /.form__head -->

		<div class="form__body">
			<p>
				<?php _e( 'Howdy!', 'woo-image-seo' ) ?>
			</p>

			<p>
				<?php _e( 'Feel free to contact me with any questions or feedback.', 'woo-image-seo' ) ?>
			</p>

			<input
				type="email"
				name="email"
				placeholder="<?php _e( 'your email', 'woo-image-seo' ) ?> ( <?php _e( 'optional', 'woo-image-seo' ) ?>)"
			>

			<textarea
				name="message"
				rows="5"
				placeholder="<?php _e( 'your message', 'woo-image-seo' ) ?> ( <?php _e( 'required', 'woo-image-seo' ) ?>)"
				required
			></textarea>

			<input type="submit" value="<?php _e( 'Submit', 'woo-image-seo' ) ?>">
		</div><!-- /.form__body -->

		<?php wp_nonce_field( 'nonce' ); ?>
	</form>
</div><!-- /.postbox -->