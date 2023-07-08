(function ($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$( document ).ready(
		function () {

			const show_unsubscribe_button_in_accounts_status = $( '#wcdpue-show-unsubscribe-button-in-accounts' ).prop( 'checked' );

			// If option is turned on, show button text input area
			if ( show_unsubscribe_button_in_accounts_status ) {
				$( '.wcdpue-subscribe-unsubscribe-button-text-wrap' ).removeClass( 'wcdpue-hidden' );
			}

			$( '#wcdpue-show-unsubscribe-button-in-accounts' ).click(
				function() {
					if (this.checked) {
						$( '.wcdpue-subscribe-unsubscribe-button-text-wrap' ).removeClass( 'wcdpue-hidden' );
					} else {
						$( '.wcdpue-subscribe-unsubscribe-button-text-wrap' ).addClass( 'wcdpue-hidden' );
					}
				}
			);

			const { __, _x, _n, _nx, _e } = wp.i18n;
			// console.log(`test: ${ __('Downloads Updated', 'wcdpue') }`);
			// Select2 functionality for metabox
			$( '.wcdpue-product-name-select' ).selectWoo(
				{
					placeholder: __( 'Downloads Updated', 'wcdpue' ),
					allowClear: true,
					width: '200px'
				}
			);

			// Sent emails
			var wcdpue_sent_emails      = Cookies.get( 'wcdpue-send-count' );
			var wcdpue_scheduled_emails = Cookies.get( 'wcdpue-scheduled-count' );

			if (wcdpue_scheduled_emails !== undefined ) {

				  document.getElementById( "wcdpue-send-count" ).style.cssText = "margin-top: 15px; font-weight: bold; color: #4d85b5; text-transform: capitalize;";

				if (wcdpue_scheduled_emails > 1 ) {
					document.getElementById( "wcdpue-send-count" ).innerHTML = wcdpue_scheduled_emails + " emails scheduled";
				} else {
					document.getElementById( "wcdpue-send-count" ).innerHTML = wcdpue_scheduled_emails + " email scheduled";
				}

				document.cookie = "wcdpue-scheduled-count = wcdpue-send-count; expires=Thu, 01 Jan 1970 00:00:00 UTC";

			}

			if (wcdpue_sent_emails !== undefined ) {

				document.getElementById( "wcdpue-send-count" ).style.cssText = "margin-top: 15px; font-weight: bold; color: #4d85b5; text-transform: capitalize;";

				if (wcdpue_sent_emails > 1 ) {
					document.getElementById( "wcdpue-send-count" ).innerHTML = wcdpue_sent_emails + " emails sent out";
				} else {
					document.getElementById( "wcdpue-send-count" ).innerHTML = wcdpue_sent_emails + " email sent out";
				}

				document.cookie = "wcdpue-send-count = wcdpue-send-count; expires=Thu, 01 Jan 1970 00:00:00 UTC";

			}

			// Settings page tabs
			$( "#wcdpue-settings-tabs" ).tabs().show();

			// Settings page template accordion
			$( "#wcdpue-email-templates" ).accordion(
				{
					collapsible: true,
					active: false
				}
			);

			// Settings page email template diaglog effects
			$( ".wcdpue-email-template-code-dialog" ).dialog(
				{
					autoOpen: false,
					show: {
						effect: "fade",
						duration: 200
					},
					hide: {
						effect: "fade",
						duration: 200
					}
				}
			);

			// Settings page email template diaglog actions
			$( "#wcdpue-tmplt1-code" ).on(
				"click",
				function () {
					$( "#wcdpue-dialog1" ).dialog( "open" );
				}
			);
			$( "#wcdpue-tmplt2-code" ).on(
				"click",
				function () {
					$( "#wcdpue-dialog2" ).dialog( "open" );
				}
			);
			$( "#wcdpue-tmplt3-code" ).on(
				"click",
				function () {
					$( "#wcdpue-dialog3" ).dialog( "open" );
				}
			);
			$( "#wcdpue-tmplt4-code" ).on(
				"click",
				function () {
					$( "#wcdpue-dialog4" ).dialog( "open" );
				}
			);

			var wcdpue_clipboard = new Clipboard( '.wcdpue-copy' );

			wcdpue_clipboard.on(
				'success',
				function (e) {
					alert( 'Copied to clipboard, paste HTML in the "Text" tab of the editor above, then switch to "Visual" to see your template.' );
				}
			);

			wcdpue_clipboard.on(
				'error',
				function (e) {
					alert( 'There was an error coping, please try copying manually then paste the HTML in the "Text" tab of the editor above, then switch to "Visual" to see your template.' );
				}
			);

		}
	);

})( jQuery );
