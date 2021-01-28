<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="postbox postbox--support">
	<h2><?php _e( 'Support the plugin', 'woo-image-seo' ) ?></h2>

	<p>
		<?php _e( 'Please consider donating. This will allow me to continue developing the plugin.', 'woo-image-seo' ) ?>
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
			src="https://www
			paypalobjects.com/en_US/i/btn/btn_donate_SM.gif"
			border="0"
			name="submit"
			title="<?php _e( 'Donate with PayPal', 'woo-image-seo' ) ?>"
			alt="<?php _e( 'Donate with PayPal button', 'woo-image-seo' ) ?>"
		/>

		<img
			src="https://www.paypal.com/en_US/i/scr/pixel.gif"
			alt=""
			border="0"
			width="1"
			height="1"
		/>
	</form>
</div><!-- /.postbox -->