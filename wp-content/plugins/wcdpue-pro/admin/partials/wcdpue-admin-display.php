<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link  https://uriahsvictor.com
 * @since 2.0.0
 *
 * @package    Wcdpue
 * @subpackage Wcdpue/admin/partials
 */

// TODO redo settings page using https://github.com/jeremyHixon/RationalOptionPages

defined( 'ABSPATH' ) or die( 'But why!?' );

// create custom plugin settings menu
add_action( 'admin_menu', 'wcdpue_add_admin_menu' );

/**
 * Creates plugin admin menu item.
 *
 * @since 2.0.0
 */
function wcdpue_add_admin_menu() {
	//create top level menu item just for display
	add_menu_page(
		'WooCommerce Downloadable Product Update Emails',
		'WCDPUE Pro',
		'manage_options',
		'wcdpue',
		'',
		'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIzMnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZXNjLz48ZGVmcy8+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSI+PGcgZmlsbD0iIzkyOTI5MiIgaWQ9Imljb24tOTItaW5ib3gtZG93bmxvYWQiPjxwYXRoIGQ9Ik0xNiwxNiBMMTIuNzUsMTIuNzUgTDEyLDEzLjUgTDE2LjUsMTggTDIxLDEzLjUgTDIwLjI1LDEyLjc1IEwxNywxNiBMMTcsNSBMMTYsNSBMMTYsMTYgTDE2LDE2IEwxNiwxNiBaIE0yMSwxOCBMMjcuNzc1MDI0NCwxOCBMMjcuNzc1MDI0NCwxOCBMMjMuNDAwMDI0NCwxMSBMMTgsMTEgTDE4LDEwIEwyNCwxMCBMMjksMTggTDI5LDE5IEwyOSwyNyBMNCwyNyBMNCwxOCBMOSwxMCBMMTUsMTAgTDE1LDExIEw5LjU5OTk3NTU5LDExIEw1LjIyNDk3NTU5LDE4IEwxMiwxOCBMMTIsMjAgQzEyLDIxLjEwNDU2OTUgMTIuODk1ODU3OCwyMiAxMy45OTczOTE3LDIyIEwxOS4wMDI2MDgzLDIyIEMyMC4xMDU3MzczLDIyIDIxLDIxLjExMjI3MDQgMjEsMjAgTDIxLDE4IEwyMSwxOCBaIiBpZD0iaW5ib3gtZG93bmxvYWQiLz48L2c+PC9nPjwvc3ZnPg=='
	);

	//create sub menu with main options
	add_submenu_page(
		'wcdpue',
		'WooCommerce Downloadable Product Update Emails',
		'Settings',
		'manage_options',
		'wcdpue',
		'wcdpue_settings_page'
	);

	//call register settings function
	add_action( 'admin_init', 'wcdpue_settings' );

}

/**
 * Gets total number of scheduled emails to be sent
 *
 * @since 2.0.0
 */
function wcdpue_get_queue() {
	global $wpdb;
	$tld_wcdpue_tbl_prefix         = $wpdb->prefix;
	$tld_wcdpue_the_schedule_table = $tld_wcdpue_tbl_prefix . 'wcdpue_scheduled';

	$tld_wcdpue_queue_count = $wpdb->get_var(
		"SELECT COUNT(*)
    FROM $tld_wcdpue_the_schedule_table
    "
	);
	echo $tld_wcdpue_queue_count;

}

  /**
   * Settings page contents.
   *
   * @since 2.0.0
   */
function wcdpue_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'wcdpue' ) );
	}

	?>

	<div class="wrap">
	  <h2><?php _e( 'Plugin Settings', 'wcdpue' ); ?></h2>
	  <form method="post" action="options.php">

	  <?php settings_fields( 'wcdpue-settings-group' ); ?>
	  <?php do_settings_sections( 'wcdpue-settings-group' ); ?>

		<div id="wcdpue-settings-tabs" style="display: none;">
		  <ul>
			<li><a href="#tld-wcdpue-settings-tab-general"><?php _e( 'General Settings', 'wcdpue' ); ?></a></li>
			<li><a href="#tld-wcdpue-settings-tab-email"><?php _e( 'Email Settings', 'wcdpue' ); ?></a></li>
			<li><a href="#tld-wcdpue-settings-tab-email-schedule"><?php _e( 'Schedule', 'wcdpue' ); ?></a></li>
			<li><a href="#tld-wcdpue-settings-tab-email-maintenance"><?php _e( 'Maintenance', 'wcdpue' ); ?></a></li>
		  </ul>
		 
		  <!-- ** General Settings tab ** -->
		  <div id="tld-wcdpue-settings-tab-general">

		  <!-- Dokan support -->
		  <?php if ( class_exists( 'WeDevs_Dokan' ) ) : ?>
			<p>
			  <span>
				<span class="wcdpue-settings-option"><?php _e( 'Enable Dokan Support', 'wcdpue' ); ?></span>

				<?php
				$wcdpue_enable_dokan_support = get_option( 'wcdpue_enable_dokan_support' );
				if ( ! empty( $wcdpue_enable_dokan_support ) ) {
					$wcdpue_enable_dokan_support = 'checked';
				}
				?>

				<input type="checkbox" name="wcdpue_enable_dokan_support" <?php echo $wcdpue_enable_dokan_support; ?> > <br>
				<small><em><?php _e( 'Check this option if you\'d like Dokan Product Vendors to have the ability to send product update emails to their customers.', 'wcdpue' ); ?></em></small>
			  </span>
			</p>

			<?php endif ?>

			<!-- Guest customers email option -->
			<p>
			  <span>
				<span class="wcdpue-settings-option"><?php _e( 'Send Update Emails for Guest Purchases', 'wcdpue' ); ?></span>

				<?php

				$wcdpue_enable_notification_for_guest_purchases = get_option( 'wcdpue_enable_notification_for_guest_purchases' );

				// We're checking if $wcdpue_enable_notification_for_guest_purchases is false because of backwards compatibility
				// That option was added in v2.0.3, prior to that guests would receive notifications by default.
				// So we're showing the option as checked for users who updated from < v2.0.3 so they know that this feature is enabled
				if ( ! empty( $wcdpue_enable_notification_for_guest_purchases ) || $wcdpue_enable_notification_for_guest_purchases === false ) {
					$wcdpue_enable_notification_for_guest_purchases = 'checked';
				}
				?>

				<input type="checkbox" name="wcdpue_enable_notification_for_guest_purchases" <?php echo $wcdpue_enable_notification_for_guest_purchases; ?> > <br>
				<small><em><?php _e( 'Check this option if you\'d like guest customers to also receive product update emails.', 'wcdpue' ); ?></em></small>
			  </span>
			</p>
			
			<!-- Enable send immediately option -->
			<p>
			  <span>
				<span class="wcdpue-settings-option"><?php _e( 'Enable send immediately option (Simple Products)', 'wcdpue' ); ?></span>

				<?php
				$wcdpue_show_immediately = get_option( 'wcdpue_show_immediately' );
				if ( ! empty( $wcdpue_show_immediately ) ) {
					$wcdpue_show_immediately = 'checked';
				}
				?>

				<input type="checkbox" name="wcdpue_show_immediately" <?php echo $wcdpue_show_immediately; ?> > <br>
				<small><em><?php _e( 'This option will let you choose between scheduling emails and sending immediately on simple downloadable products. This option is not recommended if your products have a high number buyers.', 'wcdpue' ); ?></em></small>
			  </span>
			</p>

			<!-- Add unsubscribe button to user accounts -->
			<p>
			  <span>
				<span class="wcdpue-settings-option"><?php _e( 'Add unsubscribe button to user accounts', 'wcdpue' ); ?></span>

				<?php
				$wcdpue_show_unsubscribe_button_in_accounts = get_option( 'wcdpue_show_unsubscribe_button_in_accounts' );
				if ( ! empty( $wcdpue_show_unsubscribe_button_in_accounts ) ) {
					$wcdpue_show_unsubscribe_button_in_accounts = 'checked';
				}
				?>

				<input id="wcdpue-show-unsubscribe-button-in-accounts" type="checkbox" name="wcdpue_show_unsubscribe_button_in_accounts" <?php echo $wcdpue_show_unsubscribe_button_in_accounts; ?> > <br>
				<small><em><?php _e( 'This option adds an "Unsubscribe"/"Subscribe" button on the downloads page of customer accounts. It allows customers to unsubscribe from ALL future emails regardless of the whether they opted-in for specific emails at checkout. Customers can always resubscribe to update emails by clicking the button again, but their per order notification preference will still be respected if they opted out of updates for a particular download at checkout.', 'wcdpue' ); ?></em></small>
			  </span>
			</p>

			<!-- Unsubscribe button text -->
			<p class="wcdpue-hidden wcdpue-subscribe-unsubscribe-button-text-wrap">
			  <span>
				<span class="wcdpue-settings-option"><?php _e( 'Unsubscribe button text', 'wcdpue' ); ?></span>

				<?php
				$wcdpue_unsubscribe_button_text = get_option( 'wcdpue_unsubscribe_button_text' );
				?>

				<input type="textbox" class="wcdpue-text-input" name="wcdpue_unsubscribe_button_text" value="<?php echo $wcdpue_unsubscribe_button_text; ?>" > <br>
				<small><em><?php _e( 'Override "Unsubscribe" with the text of your choice.', 'wcdpue' ); ?></em></small>
			  </span>
			</p>

			<!-- Subscribe button text -->
			<p class="wcdpue-hidden wcdpue-subscribe-unsubscribe-button-text-wrap">
			  <span>
				<span class="wcdpue-settings-option"><?php _e( 'Subscribe button text', 'wcdpue' ); ?></span>

				<?php
				$wcdpue_subscribe_button_text = get_option( 'wcdpue_subscribe_button_text' );
				?>

				<input type="textbox" class="wcdpue-text-input" name="wcdpue_subscribe_button_text" value="<?php echo $wcdpue_subscribe_button_text; ?>" > <br>
				<small><em><?php _e( 'Override "Subscribe" with the text of your choice.', 'wcdpue' ); ?></em></small>
			  </span>
			</p>

			<!-- Allow customers to opt-in/out setting -->
			<p>
			  <span>
				<span class="wcdpue-settings-option"><?php _e( 'Allow customers to opt in/out of email updates on checkout page.', 'wcdpue' ); ?></span>
				<br/>
				<small><em><?php _e( 'Enabling either of these options below will allow customers to either opt-out or opt-in to email updates. This option is visible on the checkout page and works on a per order basis.', 'wcdpue' ); ?></em></small>
				<br/>

				<?php

				$wcdpue_allow_opt_in          = '';
				$wcdpue_dont_show_opt_options = '';

				$wcdpue_allow_opt_out = get_option( 'wcdpue_allow_opt_out' ); // backward compatibility with previously differently named option

				$wcdpue_opt_option = get_option( 'wcdpue_opt_option' );

				if ( $wcdpue_opt_option === 'dont-show' ) {
					$wcdpue_dont_show_opt_options = 'checked';
				}

				if ( $wcdpue_opt_option === 'optin' ) {
					$wcdpue_allow_opt_in = 'checked';
				}

				// "dont-show" might exist in the options along with wcdpue_allow_opt_out = 'on', here we're making sure the optout radio isn't checked
				if ( $wcdpue_opt_option === 'optout' || ( ! empty( $wcdpue_allow_opt_out ) && $wcdpue_opt_option !== 'optin' && $wcdpue_opt_option !== 'dont-show' ) ) {
					$wcdpue_allow_opt_out = 'checked';
				}

				?>

				<input type="radio" id="opt-dont-show" name="wcdpue_opt_option" value="dont-show" <?php echo $wcdpue_dont_show_opt_options; ?>>
				<label for="opt-dont-show"><?php _e( 'Don\'t Show', 'wcdpue' ); ?></label><br>
				<input type="radio" id="optin" name="wcdpue_opt_option" value="optin" <?php echo $wcdpue_allow_opt_in; ?>>
				<label for="optin"><?php _e( 'Opt-in', 'wcdpue' ); ?></label><br>
				<input type="radio" id="optout" name="wcdpue_opt_option" value="optout" <?php echo $wcdpue_allow_opt_out; ?> >
				<label for="optout"><?php _e( 'Opt-out', 'wcdpue' ); ?></label><br>
			  </span>
			</p>

		  </div>

		  <!-- ** Email Settings ** -->
		  <div id="tld-wcdpue-settings-tab-email">
			<?php

			$wcdpue_test_email_sent = get_transient( 'wcdpue_test_email_sent' );
			$admin_email            = get_bloginfo( 'admin_email' );

			if ( $wcdpue_test_email_sent === 'yes' ) {
				echo '<div id="wcdpue-sent-email-status"><p>';
				echo sprintf( __( 'Test email sucessfully sent to: %1$s, please check your inbox.', 'wcdpue' ), $admin_email );
				echo sprintf( __( '%1$s%1$sIf email is not in your inbox then please check your spam/junk mail.', 'wcdpue' ), '<br/>' );
				echo sprintf( __( '%1$s%1$s%2$sIf these emails are landing in your junk/spam mail then you should set up dedicated SMTP sending using a plugin like %3$sthis one%4$s to improve email deliverability.%5$s', 'wcdpue' ), '<br/>', '<small>', '<a href="https://wordpress.org/plugins/post-smtp/" target="_blank">', '</a>', '</small>' );
				echo '</p></div>';
			}

			if ( $wcdpue_test_email_sent === 'no' ) {
				echo '<div id="wcdpue-sent-email-status"><p>';
				echo _e( 'Something went wrong while trying to send the test email. Please make sure that your website is able to send emails.', 'wcdpue' );
				echo '</p></div>';
			}

			if ( $wcdpue_test_email_sent === 'no-orders-found' ) {
				echo '<div id="wcdpue-sent-email-status"><p>';
				echo _e( 'No orders with valid download permissions found.', 'wcdpue' );
				echo '</p></div>';
			}

			?>

			<!--Email subject -->
			<p>
			  <span class="wcdpue-settings-option"><?php _e( 'E-mail subject', 'wcdpue' ); ?></span><br/>
			  <input type="text" name="wcdpue_email_subject" value="<?php echo esc_attr( get_option( 'wcdpue_email_subject' ) ); ?>" placeholder="<?php _e( 'A product you bought has been updated!', 'wcdpue' ); ?>" size="70"/>
			</p>

			<!-- Email body -->
			<p style="width: 80%;">
			  <span class="wcdpue-settings-option"><?php _e( 'E-mail body', 'wcdpue' ); ?></span> <br/><br/>
			<?php

			wp_nonce_field( 'wcdpue_settings_nonce_action', 'wcdpue_settings_nonce_field' );

			$wcdpue_settings_email_content = get_option( 'wcdpue_settings_email_content' );

			$editor_settings = array(
				'wpautop' => false,
			);
			wp_editor( $wcdpue_settings_email_content, 'wcdpue_settings_wpeditor', $editor_settings );

			?>
			  <br>
			  <span style="margin-top:10px; font-size: 11px;"><?php _e( 'Available Variables:', 'wcdpue' ); ?> <em><b>{what_changed}, {download_url}, {download_name}, {account_url}, {account_url_trim}, {product_name}, {product_url}, {product_url_trim}, {first_name}, {last_name}, {full_name}, {product_img}, {product_table} <a href="https://wcdpue.com/available-magic-tags" target="_blank"><?php _e( 'LEARN MORE', 'wcdpue' ); ?></a></b></em></span>
			</p>

			<!-- Email templates -->
			<p>
			  <div id="wcdpue-email-templates">
				<h3 id="wcdpue-email-templates-header">&#x21c5; <?php _e( 'Email Templates', 'wcdpue' ); ?></h3>
				<div>
				  <div class="wcdpue-email-templates-container">
					<img src="<?php echo plugins_url( 'wcdpue-pro/admin/img/tmpl1.png' ); ?>" alt="">
					<br>
					<span id="wcdpue-tmplt1-code" class="wcdpue-email-templates-code button button-primary"><?php _e( 'Show HTML', 'wcdpue' ); ?></span>
				  </div>

				  <div id="wcdpue-dialog1" class="wcdpue-email-template-code-dialog" title="<?php _e( 'Email Template Code', 'wcdpue' ); ?>">
					<button data-clipboard-target="#tmpl1" class="wcdpue-copy"><?php _e( 'Copy', 'wcdpue' ); ?></button>
					<textarea rows="15" readonly="readonly" class="wcdpue-raw-email-templates-code" id="tmpl1"><?php include dirname( __FILE__ ) . '/email-templates/tld-template1.php'; ?>
					</textarea>
				  </div>

				  <div class="wcdpue-email-templates-container">
					<img src="<?php echo plugins_url( 'wcdpue-pro/admin/img/tmpl2.png' ); ?>" alt="">
					<br>
					<span id="wcdpue-tmplt2-code" class="wcdpue-email-templates-code button button-primary" ><?php _e( 'Show HTML', 'wcdpue' ); ?></span>
				  </div>

				  <div id="wcdpue-dialog2" class="wcdpue-email-template-code-dialog" title="<?php _e( 'Email Template Code', 'wcdpue' ); ?>">
					<button data-clipboard-target="#tmpl2" class="wcdpue-copy"><?php _e( 'Copy', 'wcdpue' ); ?></button>
					<textarea rows="15" readonly="readonly" class="wcdpue-raw-email-templates-code" id="tmpl2"><?php include dirname( __FILE__ ) . '/email-templates/tld-template2.php'; ?>
					</textarea>
				  </div>

				  <div class="wcdpue-email-templates-container">
					<img src="<?php echo plugins_url( 'wcdpue-pro/admin/img/tmpl3.png' ); ?>" alt="">
					<br>
					<span id="wcdpue-tmplt3-code" class="wcdpue-email-templates-code button button-primary" ><?php _e( 'Show HTML', 'wcdpue' ); ?></span>
				  </div>

				  <div id="wcdpue-dialog3" class="wcdpue-email-template-code-dialog" title="<?php _e( 'Email Template Code', 'wcdpue' ); ?>">
					<button data-clipboard-target="#tmpl3" class="wcdpue-copy"><?php _e( 'Copy', 'wcdpue' ); ?></button>
					<textarea rows="15" readonly="readonly" class="wcdpue-raw-email-templates-code" id="tmpl3"><?php include dirname( __FILE__ ) . '/email-templates/tld-template3.php'; ?>
					</textarea>
				  </div>

				  <div class="wcdpue-email-templates-container">
					<img src="<?php echo plugins_url( 'wcdpue-pro/admin/img/tmpl4.png' ); ?>" alt="">
					<br>
					<span id="wcdpue-tmplt4-code" class="wcdpue-email-templates-code button button-primary" ><?php _e( 'Show HTML', 'wcdpue' ); ?></span>
				  </div>

				  <div id="wcdpue-dialog4" class="wcdpue-email-template-code-dialog" title="<?php _e( 'Email Template Code', 'wcdpue' ); ?>">
					<div id="test">
					  <button data-clipboard-target="#tmpl4" class="wcdpue-copy"><?php _e( 'Copy', 'wcdpue' ); ?></button>
					  <textarea rows="15" readonly="readonly" class="wcdpue-raw-email-templates-code" id="tmpl4"><?php include dirname( __FILE__ ) . '/email-templates/tld-template4.php'; ?>
					  </textarea>
					</div>
				  </div>
				</div>
			  </div>
			</p>
			
			<!-- Using download url magic tag? -->
			<p>
			  <span>
				<span class="wcdpue-settings-option"><?php _e( 'Using', 'wcdpue' ); ?> <b>{download_url}</b> <?php _e( 'or', 'wcdpue' ); ?> <b>{download_name}</b> <?php _e( 'magic tag?', 'wcdpue' ); ?></span>

				<?php
				$wcdpue_using_downloads_magictag = get_option( 'wcdpue_using_downloads_magictag' );
				if ( ! empty( $wcdpue_using_downloads_magictag ) ) {
					$wcdpue_using_downloads_magictag = 'checked';
				}
				?>

				<input type="checkbox" name="wcdpue_using_downloads_magictag" <?php echo $wcdpue_using_downloads_magictag; ?> > <br>
				<small><em><span style="color: red"><?php _e( 'IMPORTANT:', 'wcdpue' ); ?></span> <?php _e( 'Check this option if you\'re using the', 'wcdpue' ); ?> {download_url} <?php _e( 'or', 'wcdpue' ); ?> {download_name} <?php _e( 'magic tag in the email body.', 'wcdpue' ); ?></em></small>
			  </span>
			</p>

			<!-- Use WooCommerce default styles -->
			<p>
			  <span>
				<span class="wcdpue-settings-option"><?php _e( 'Use WooCommerce default styles', 'wcdpue' ); ?></span>

				<?php
				$wcdpue_wc_default_styles = get_option( 'wcdpue_wc_default_styles' );
				if ( ! empty( $wcdpue_wc_default_styles ) ) {
					$wcdpue_wc_default_styles = 'checked';
				}
				?>

				<input type="checkbox" name="wcdpue_wc_default_styles" <?php echo $wcdpue_wc_default_styles; ?> > <br>
				<small><em><?php _e( 'This will format your update email so it looks like the default WooCommerce emails (product order etc.). It wraps whatever you enter into the body inside the default WooCommerce styles.', 'wcdpue' ); ?></em></small>
			  </span>
			</p>
			
			<p>
			  <span class="wcdpue-settings-option"><?php _e( 'Send test email:', 'wcdpue' ); ?></span>
			  <form>
				<button type="submit" formmethod="post" formaction="<?php echo plugins_url( 'wcdpue-test-email.php', __FILE__ ); ?>" class="button button-primary"><?php _e( 'Send now', 'wcdpue' ); ?></button>
			  </form>
			  <small><em><?php _e( 'Send a test email to yourself. Uses email address inside Settings->General. You need to have at least one valid download purchase for this feature to work.', 'wcdpue' ); ?></em></small>
			  </p>
		  </div>

		  <!-- ** Schedule Settings tab **  -->
		  <div id="tld-wcdpue-settings-tab-email-schedule">

			<p>
			  <span class="wcdpue-settings-option"><?php _e( 'Send e-mails in bursts of:', 'wcdpue' ); ?></span>

			  <input type="number" name="wcdpue_email_bursts_count" value="<?php echo esc_attr( get_option( 'wcdpue_email_bursts_count' ) ); ?>" min="1" size="4"/>

			</p>
			<small> <?php _e( '(It is recommend you keep this value below 10)', 'wcdpue' ); ?></small>

			<p>
			  <span class="wcdpue-settings-option"><?php _e( 'Schedule:', 'wcdpue' ); ?></span>

			  <select name="wcdpue_schedule_setting_value">
				<?php

				$wcdpue_active_cron_schedules = wp_get_schedules();

				$wcdpue_current_schedule = esc_attr( get_option( 'wcdpue_schedule_setting_value' ) );

				$wcdpue_cron_schedules = array();

				foreach ( $wcdpue_active_cron_schedules as $key => $value ) {

					// if this cron display is already outputted, skip
					if ( in_array( $value['display'], $wcdpue_cron_schedules ) ) {
						continue;
					}

					if ( empty( $wcdpue_current_schedule ) && $key === 'daily' ) {
						echo '<option value="' . $key . '" selected>' . $value['display'] . '</option>';
					} elseif ( $key === $wcdpue_current_schedule ) {
						echo '<option value="' . $key . '" selected>' . $value['display'] . '</option>';
					} else {
						echo '<option value="' . $key . '">' . $value['display'] . '</option>';
					}
					$wcdpue_cron_schedules[] = $value['display'];
				}

				?>
			  </select>
			</p>

		  </div>

		  <!-- ** Maintenance Settings tab **  -->
		  <div id="tld-wcdpue-settings-tab-email-maintenance">

			<p>
			  <span class="wcdpue-settings-option"><?php _e( 'Log date format:', 'wcdpue' ); ?></span>
			  <select name="wcdpue_log_date_format">
				<?php

				$tld_wcdpue_date_formats = array(

					'14-01-2017 12:00:00' => 'd-m-Y H:i:s',
					'14-01-17 12:00:00'   => 'd-m-y H:i:s',
					'01-14-2017 12:00:00' => 'm-d-Y H:i:s',
					'01-14-17 12:00:00'   => 'm-d-y H:i:s',
					'2017-01-14 12:00:00' => 'Y-m-d H:i:s',
					'17-01-14 12:00:00'   => 'y-m-d H:i:s',

				);

				$tld_wcdpue_current_format = get_option( 'wcdpue_log_date_format' );

				foreach ( $tld_wcdpue_date_formats as $key => $format ) {

					if ( $format == $tld_wcdpue_current_format ) {
						echo '<option value="' . $format . '"selected>' . $key . '</option>';
					} else {
						echo '<option value="' . $format . '">' . $key . '</option>';
					}
				}
				?>
			  </select>

			</p>
			
			<!-- Clear queue button -->
			<p>
			  <span class="wcdpue-settings-option"><?php _e( 'Emails in queue:', 'wcdpue' ); ?></span>
			  <?php wcdpue_get_queue(); ?><br><br>
			  <form>
				<button type="submit" formmethod="post" formaction="<?php echo plugins_url( 'wcdpue-clear-queue.php', __FILE__ ); ?>" class="button button-primary"><?php _e( 'Clear Queue', 'wcdpue' ); ?></button>
			  </form>
			  </p>

			  <p> <span class="wcdpue-settings-option"><?php _e( 'Delete all plugin settings on uninstall?', 'wcdpue' ); ?></span>
				<?php
				$tld_wcdpue_housekeeping = get_option( 'wcdpue_delete_db_settings' );
				if ( ! empty( $tld_wcdpue_housekeeping ) ) {
					$tld_wcdpue_housekeeping = 'checked';
				}
				?>
				<input type="checkbox" name="wcdpue_delete_db_settings" <?php echo $tld_wcdpue_housekeeping; ?> >
			  </p>
			</div>
			<?php submit_button(); ?>
		  </div>
		</form>
	  </div>


<?php }

/**
 * Save email body to database.
 *
 * @since 2.0.0
 */
function wcdpue_settings_save_wpeditor() {
	// TODO add search to check email content for {download_url} magic tag...most likely preg_match
	// This might be better than having user set the option in settings

	// check the nonce, update the option etc...
	if ( isset( $_POST['wcdpue_settings_wpeditor'] ) && isset( $_POST['wcdpue_settings_nonce_field'] ) && wp_verify_nonce( $_POST['wcdpue_settings_nonce_field'], 'wcdpue_settings_nonce_action' ) ) {

		update_option( 'wcdpue_settings_email_content', wp_kses_post( stripslashes( $_POST['wcdpue_settings_wpeditor'] ) ) );

	}

}

	add_action( 'admin_init', 'wcdpue_settings_save_wpeditor', 10 );

/**
 * Register our settings fields.
 *
 * @since 2.0.0
 */
function wcdpue_settings() {
	register_setting( 'wcdpue-settings-group', 'wcdpue_email_subject' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_wc_default_styles' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_show_immediately' );
	// register_setting('wcdpue-settings-group', 'wcdpue_allow_opt_out');
	// register_setting('wcdpue-settings-group', 'opt-option-in');
	register_setting( 'wcdpue-settings-group', 'wcdpue_show_unsubscribe_button_in_accounts' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_unsubscribe_button_text' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_subscribe_button_text' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_opt_option' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_using_downloads_magictag' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_enable_dokan_support' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_enable_notification_for_guest_purchases' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_email_bursts_count' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_schedule_setting_value' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_log_date_format' );
	register_setting( 'wcdpue-settings-group', 'wcdpue_delete_db_settings' );

}

/**
 * Update cronjob after schedule setting changed.
 *
 * @since 2.0.0
 */
function wcdpue_update_cron_schedule() {
	//get schedule interval set by user
	$tld_wcdpue_cur_recurrence = get_option( 'wcdpue_schedule_setting_value' );

	$wcdpue_active_cron_schedules = wp_get_schedules();

	foreach ( $wcdpue_active_cron_schedules as $key => $value ) {

		if ( $key === $tld_wcdpue_cur_recurrence ) {

			$tld_wcdpue_wait_time = $value['interval'];

		}
	}
		//remove previous scheduled time
		wp_clear_scheduled_hook( 'wcdpue_email_send_burst' );
		//add new scheduled time
		wp_schedule_event( time() + $tld_wcdpue_wait_time, $tld_wcdpue_cur_recurrence, 'wcdpue_email_send_burst' );

}
	add_action( 'update_option_wcdpue_schedule_setting_value', 'wcdpue_update_cron_schedule' );

?>
