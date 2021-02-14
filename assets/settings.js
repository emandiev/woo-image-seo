jQuery(document).ready(function($) {

	var $body = $('body');

	// accessibility
	$body.on('mousedown', function() {
		this.classList.add('no-focus');
	}).on('keydown', function() {
		this.classList.remove('no-focus');
	});

	// AJAX form submission
	jQuery('#woo_image_seo_form').on('submit', function(e){
		e.preventDefault();
		var data = jQuery(this).serializeArray();

		jQuery.ajax({
			type: 'POST',
			data: data,
			beforeSend: function() {
				jQuery('#post-success').text(jQuery('#post-success').data('saving')).fadeIn();
			},
			success: function(){
				jQuery('#woo_image_seo_form input').removeAttr('disabled');
				jQuery('#post-success').text(jQuery('#post-success').data('saved')).addClass('bg-green');
				setTimeout(function(){ jQuery('#post-success').fadeOut(); }, 2000);
			},
			error: function( jqXhr, textStatus, errorThrown ){
				console.log( errorThrown );
			}
		});
	});
	
	
	// AJAX Reset Settings
	jQuery('#reset-settings').on('click', function() {
		jQuery('#reset-settings').blur();

		if (!window.confirm(jQuery('#reset-settings').data('confirm'))) {
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
				jQuery('#post-success').text(jQuery('#post-success').data('saving')).fadeIn();
			},
			success: function(data) {
				// Replace the form with the new one
				jQuery('#woo_image_seo_form .wrap').replaceWith(jQuery('#woo_image_seo_form .wrap', data));
				jQuery('#post-success').text(jQuery('#post-success').data('saved')).addClass('bg-green');
				setTimeout(function(){ jQuery('#post-success').fadeOut(); }, 2000);
			},
			error: function(jqXhr, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	});


	// smooth scroll
	jQuery('#woo_image_seo').on('click', 'a.dashicons-editor-help, a.help-trigger', function(event) {
		event.preventDefault();
		event.stopPropagation();
		var $target = jQuery(this.hash);
		var $helpBackground = jQuery('#help-background');

		$helpBackground.fadeIn();
		$target.fadeIn();

		$helpBackground.click(function() {
			$helpBackground.fadeOut();
			$target.fadeOut();
		});
	});

	// AJAX feedback form submission
	jQuery('#woo_image_seo_feedback').on('submit', function(event) {
		event.preventDefault();

		jQuery.ajax({
			type: 'POST',
			data: jQuery(this).serializeArray(),
			beforeSend: function() {
				jQuery('#woo_image_seo_feedback input[type="submit"]')
					.replaceWith('<strong>' + jQuery('#woo_image_seo_feedback input[type="submit"]').data('submitting') + '</strong>');
			},
			success: function() {
				jQuery('#woo_image_seo_feedback .form__body')
				.html(
					jQuery('#woo_image_seo_feedback .form__body').data('sent') + '<br>' + jQuery('#woo_image_seo_feedback .form__body').data('thanks')
				);
			},
			error: function( jqXhr, textStatus, errorThrown ) {
				console.log( errorThrown );
			}
		});
	});

});