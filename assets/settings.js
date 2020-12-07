jQuery(document).ready(function($) {

	var $body = $('body');

	// accessibility
	$body.on('mousedown', function() {
		this.classList.add('no-focus');
	}).on('keydown', function() {
		this.classList.remove('no-focus');
	});

	// AJAX form submission
	jQuery('#woo_image_seo_form').submit(function(e){
		e.preventDefault();
		var data = jQuery(this).serializeArray();

		jQuery.ajax({
			type: 'POST',
			data: data,
			beforeSend: function() {
				jQuery('#post-success').text('Please wait...').fadeIn();
			},
			success: function(){
				jQuery('#woo_image_seo_form input').removeAttr('disabled');
				jQuery('#post-success').text('Settings Saved!').addClass('bg-green');
				setTimeout(function(){ jQuery('#post-success').fadeOut(); }, 2000);
			},
			error: function( jqXhr, textStatus, errorThrown ){
				console.log( errorThrown );
			}
		});
	});
	
	
	// AJAX Reset Settings
	jQuery('#reset-settings').click(function() {
		jQuery('#reset-settings').blur();

		if (!window.confirm('Reset plugin settings?')) {
			return;
		}

		// Prepare the default settings by adding WP NONCE fields
		var defaultSettings = jQuery('#reset-settings').data('default-settings');
		defaultSettings['_wpnonce'] = jQuery('[name="_wpnonce"]').val();
		defaultSettings['_wp_http_referer'] = jQuery('[name="_wp_http_referer"]').val();
		
		jQuery.ajax({
			type: 'POST',
			data: defaultSettings,
			beforeSend: function() {
				jQuery('#post-success').text('Please wait...').fadeIn();
			},
			success: function(data) {
				// Replace the form with the new one
				jQuery('#woo_image_seo_form .wrap').replaceWith(jQuery('#woo_image_seo_form .wrap', data));
				jQuery('#post-success').text('Settings Saved!').addClass('bg-green');
				setTimeout(function(){ jQuery('#post-success').fadeOut(); }, 2000);
			},
			error: function(jqXhr, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	});


	// smooth scroll
	jQuery('#woo_image_seo_form').on('click', 'a.dashicons-editor-help', function(event) {
		event.preventDefault();
		var $target = jQuery(this.hash);
		var $helpBackground = jQuery('#help-background');

		$helpBackground.fadeIn();
		$target.fadeIn();

		$helpBackground.click(function() {
			$helpBackground.fadeOut();
			$target.fadeOut();
		});
	});

});