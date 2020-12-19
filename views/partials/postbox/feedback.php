<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="postbox">
	<form action="admin.php?page=woo_image_seo" method="post" id="woo_image_seo_feedback">
		<div class="form__head">
			<h2>Contact the plugin developer</h2>

			<img src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'howdy.jpg' ?>" alt="">
		</div><!-- /.form__head -->

		<div class="form__body">
			<p>
				Howdy!
			</p>

			<p>
				Feel free to contact me with any questions or feedback.
			</p>

			<input type="email" name="email" placeholder="your email (optional)">

			<textarea name="message" rows="5" placeholder="your message (required)" required></textarea>

			<input type="submit">
		</div><!-- /.form__body -->

		<?php wp_nonce_field( 'nonce' ); ?>
	</form>
</div><!-- /.postbox -->