<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="postbox postbox--support">
	<h2><?php _e( 'Support the plugin', 'woo-image-seo' ) ?></h2>

	<p>
		<?php _e( 'Donations are greatly appreciated.', 'woo-image-seo' ) ?><br>
		<?php _e( 'Thank you!', 'woo-image-seo' ) ?>
	</p>

	<form
		action="https://www.paypal.com/donate"
		method="post"
		target="_blank"
		class="form--donate"
	>
		<input
			type="hidden"
			name="cmd"
			value="_donations"
		/>

		<input
			type="hidden"
			name="business"
			value="danail@emandiev.com"
		/>

		<input
			type="hidden"
			name="item_name"
			value="Support Woo Image SEO plugin development"
		/>

		<input
			type="hidden"
			name="currency_code"
			value="USD"
		/>

		<input
			type="image"
			src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'paypal-donate.png?version=' . WOO_IMAGE_SEO['version'] ?>"
			border="0"
			name="submit"
			title="<?php _e( 'Donate with PayPal', 'woo-image-seo' ) ?>"
			alt="<?php _e( 'Donate with PayPal button', 'woo-image-seo' ) ?>"
		/>
	</form>
</div><!-- /.postbox -->