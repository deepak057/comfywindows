jQuery(document).ready(function() {


	jQuery(document).on('click', '#um_add_review_love', function (e) {
		jQuery(this).parents('#um_start_review_notice').hide();
		jQuery('.um_hidden_notice[data-key="love"]').show();
	});


	jQuery(document).on('click', '#um_add_review_good', function (e) {
		jQuery(this).parents('#um_start_review_notice').hide();
		jQuery('.um_hidden_notice[data-key="good"]').show();
	});


	jQuery(document).on('click', '#um_add_review_bad', function (e) {
		jQuery(this).parents('#um_start_review_notice').hide();
		jQuery('.um_hidden_notice[data-key="bad"]').show();
	});


	jQuery(document).on('click', '.um_review_link', function (e) {
		jQuery(this).parents('.um-admin-notice').find( '.notice-dismiss' ).trigger('click');
	});


	jQuery(document).on('click', '.um_opt_in_link', function (e) {
		jQuery(this).parents('.um-admin-notice').find( '.notice-dismiss' ).trigger('click');
	});


	jQuery(document).on('click', '#um_opt_in_start', function (e) {
		var dismiss = jQuery(this).parents('.um-admin-notice').find( '.notice-dismiss' );
		jQuery(this).prop('disabled', true).attr('disabled', 'disabled');

		wp.ajax.send( 'um_opt_in_notice', {
			data: {
				nonce: um_admin_scripts.nonce
			},
			success: function( data ) {
				dismiss.trigger('click');
				jQuery(this).prop('disabled', false);
			},
			error: function( data ) {
				jQuery(this).prop('disabled', false);
				return false;
			}
		});
	});


	jQuery(document).on( 'click', '.um-admin-notice.is-dismissible .notice-dismiss', function(e) {
		var notice_key = jQuery(this).parents('.um-admin-notice').data('key');

		wp.ajax.send( 'um_dismiss_notice', {
			data: {
				key: notice_key,
				nonce: um_admin_scripts.nonce
			},
			success: function( data ) {
				return true;
			},
			error: function( data ) {
				return false;
			}
		});
	});


});