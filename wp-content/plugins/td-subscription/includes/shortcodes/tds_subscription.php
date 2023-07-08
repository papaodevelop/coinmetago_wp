<?php

/**
 * Class tds_subscription
 */

class tds_subscription extends td_block {

    private static $direct_payment_details = [];

	public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

		$compiled_css = '';

		/** @noinspection CssInvalidAtRule */
		$raw_css =
            "<style>

                /* @tds_subscription */
                body .tds_subscription {
                    margin-bottom: 0;                    
                }
                
                .tds_subscription #tds-cancel-message {
                    display: none;
                    margin-top: 18px;
                    margin-bottom: 0;
                }
                
                .tds_subscription .tds-s-tre-subscr-info .tds-cancel-subscription {
                    margin-top: 20px;
                }

            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {
        $res_ctx->load_settings_raw( 'tds_subscription', 1 );
	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	private function get_direct_payment_details() {

	    if (!empty(self::$direct_payment_details)) {
	        return self::$direct_payment_details;
        }

        global $wpdb;
        $payment_bank = $wpdb->get_results("SELECT * FROM tds_payment_bank LIMIT 1", ARRAY_A);

        if ( null !== $payment_bank && count($payment_bank) && 1 == $payment_bank[0]['is_active']) {
            self::$direct_payment_details['direct_payment_bank'] = $payment_bank[0]['bank_name'];
            self::$direct_payment_details['direct_payment_account_name'] = $payment_bank[0]['account_name'];
            self::$direct_payment_details['direct_payment_account_number'] = $payment_bank[0]['account_number'];
            self::$direct_payment_details['direct_payment_routing_number'] = $payment_bank[0]['routing_number'];
            self::$direct_payment_details['direct_payment_iban'] = $payment_bank[0]['iban'];
            self::$direct_payment_details['direct_payment_bic_swift'] = $payment_bank[0]['bic_swift'];
            self::$direct_payment_details['direct_payment_instruction'] = $payment_bank[0]['instruction'];
        }
        return self::$direct_payment_details;
    }

	function render( $atts, $content = null ) {

        parent::render( $atts );


        // flag to check if we are in composer
        $is_composer = false;
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $is_composer = true;
        }


        // current user information
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;


        // pagination settings
        $enable_pag = $this->get_att('enable_pag');

        $per_page = -1;
        $current_page = 1;

        if( $enable_pag != '' ) {
            $per_page = 10;
            if( $this->get_att('per_page') ) {
                $per_page = $this->get_att('per_page');
            }

            if( isset( $_GET['tds_s_page'] ) ) {
                $current_page = $_GET['tds_s_page'];
            }
        }


        // dummy subscriptions
        $dummy_subscriptions_data = array(
            'subscriptions' => array(
                array(
                    'id' => '1',
                    'plan_id' => '1',
                    'user_id' => '1',
                    'ref_id' => NULL,
                    'billing_first_name' => 'John',
                    'billing_last_name' => 'Doe',
                    'billing_company_name' => 'Demo company name',
                    'billing_cui' => NULL,
                    'billing_j' => NULL,
                    'billing_address' => 'Cross Roads 44',
                    'billing_county' => 'New York',
                    'billing_city' => 'New York',
                    'billing_country' => 'United States',
                    'billing_phone' => '+30 789546548',
                    'billing_email' => 'mail@example.com',
                    'billing_bank_account' => NULL,
                    'billing_post_code' => '123456',
                    'billing_vat_number' => '123456',
                    'price' => '10',
                    'payment_type' => 'direct',
                    'status' => 'waiting_payment',
                    'is_free' => '0',
                    'last_months_in_cycle' => '1',
                    'start_day' => '29',
                    'trial_days' => '0',
                    'start_date' => '2021-12-29 00:00:00',
                    'paypal_order_id' => '',
                    'paypal_order_intent' => '',
                    'paypal_order_status' => '',
                    'paypal_order_payer_id' => '',
                    'paypal_order_payer_given_name' => '',
                    'paypal_order_payer_surname' => '',
                    'paypal_order_payer_email' => '',
                    'paypal_order_payee_id' => '',
                    'paypal_order_payee_email' => '',
                    'paypal_order_amount_currency_code' => '',
                    'paypal_order_amount_value' => '',
                    'paypal_order_info' => '',
                    'paypal_order_create_time' => '',
                    'paypal_order_update_time' => '',
                    'paypal_order_capture_create_time' => '',
                    'paypal_order_capture_update_time' => '',
                    'confirm_key' => '161cc414e16f971',
                    'created_at' => '2021-12-29 11:06:54',
                    'plan_name' => 'Monthly Plan',
                    'user_name' => 'admin',
                    'end_date' => '2022-01-28',
                    'account_name' => 'Example bank name',
                    'account_number' => '123456',
                    'bank_name' => 'Example account name',
                    'routing_number' => '123456',
                    'iban' => 'NL43INGB4186520410',
                    'bic_swift' => '123456',
                    'description' => 'Sample payment method description.',
                    'instruction' => 'Sample payment method instructions.',
                    'options' => NULL,
                    'formatted_price' => 'USD 10'
                ),
                array(
                    'id' => '2',
                    'plan_id' => '1',
                    'user_id' => '1',
                    'ref_id' => NULL,
                    'billing_first_name' => 'John',
                    'billing_last_name' => 'Doe',
                    'billing_company_name' => 'Demo company name',
                    'billing_cui' => NULL,
                    'billing_j' => NULL,
                    'billing_address' => 'Cross Roads 44',
                    'billing_county' => 'New York',
                    'billing_city' => 'New York',
                    'billing_country' => 'United States',
                    'billing_phone' => '+30 789546548',
                    'billing_email' => 'mail@example.com',
                    'billing_bank_account' => NULL,
                    'billing_post_code' => '123456',
                    'billing_vat_number' => '123456',
                    'price' => '10',
                    'payment_type' => 'direct',
                    'status' => 'active',
                    'is_free' => '0',
                    'last_months_in_cycle' => '12',
                    'start_day' => '29',
                    'trial_days' => '0',
                    'start_date' => '2021-11-05 00:00:00',
                    'paypal_order_id' => '',
                    'paypal_order_intent' => '',
                    'paypal_order_status' => '',
                    'paypal_order_payer_id' => '',
                    'paypal_order_payer_given_name' => '',
                    'paypal_order_payer_surname' => '',
                    'paypal_order_payer_email' => '',
                    'paypal_order_payee_id' => '',
                    'paypal_order_payee_email' => '',
                    'paypal_order_amount_currency_code' => '',
                    'paypal_order_amount_value' => '',
                    'paypal_order_info' => '',
                    'paypal_order_create_time' => '',
                    'paypal_order_update_time' => '',
                    'paypal_order_capture_create_time' => '',
                    'paypal_order_capture_update_time' => '',
                    'confirm_key' => '161cc414e16f971',
                    'created_at' => '2021-12-29 11:06:54',
                    'plan_name' => 'Yearly Plan',
                    'user_name' => 'admin',
                    'end_date' => '2022-11-04',
                    'account_name' => 'Example bank name',
                    'account_number' => '123456',
                    'bank_name' => 'Example account name',
                    'routing_number' => '123456',
                    'iban' => 'NL43INGB4186520410',
                    'bic_swift' => '123456',
                    'description' => 'Sample payment method description.',
                    'instruction' => 'Sample payment method instructions.',
                    'options' => NULL,
                    'formatted_price' => 'USD 10'
                ),
                array(
                    'id' => '2',
                    'plan_id' => '1',
                    'user_id' => '1',
                    'ref_id' => NULL,
                    'billing_first_name' => 'John',
                    'billing_last_name' => 'Doe',
                    'billing_company_name' => 'Demo company name',
                    'billing_cui' => NULL,
                    'billing_j' => NULL,
                    'billing_address' => 'Cross Roads 44',
                    'billing_county' => 'New York',
                    'billing_city' => 'New York',
                    'billing_country' => 'United States',
                    'billing_phone' => '+30 789546548',
                    'billing_email' => 'mail@example.com',
                    'billing_bank_account' => NULL,
                    'billing_post_code' => '123456',
                    'billing_vat_number' => '',
                    'price' => '10',
                    'payment_type' => 'paypal',
                    'status' => 'closed',
                    'is_free' => '0',
                    'last_months_in_cycle' => '1',
                    'start_day' => '29',
                    'trial_days' => '0',
                    'start_date' => '2021-10-14 00:00:00',
                    'paypal_order_id' => '',
                    'paypal_order_intent' => '',
                    'paypal_order_status' => '',
                    'paypal_order_payer_id' => '',
                    'paypal_order_payer_given_name' => '',
                    'paypal_order_payer_surname' => '',
                    'paypal_order_payer_email' => '',
                    'paypal_order_payee_id' => '',
                    'paypal_order_payee_email' => '',
                    'paypal_order_amount_currency_code' => '',
                    'paypal_order_amount_value' => '',
                    'paypal_order_info' => '',
                    'paypal_order_create_time' => '',
                    'paypal_order_update_time' => '',
                    'paypal_order_capture_create_time' => '',
                    'paypal_order_capture_update_time' => '',
                    'confirm_key' => '161cc414e16f971',
                    'created_at' => '2021-12-29 11:06:54',
                    'plan_name' => 'Monthly Plan',
                    'user_name' => 'admin',
                    'end_date' => '2021-11-14',
                    'account_name' => 'Example bank name',
                    'account_number' => '123456',
                    'bank_name' => 'Example account name',
                    'routing_number' => '123456',
                    'iban' => 'NL43INGB4186520410',
                    'bic_swift' => '123456',
                    'description' => 'Sample payment method description.',
                    'instruction' => 'Sample payment method instructions.',
                    'options' => NULL,
                    'formatted_price' => 'USD 10'
                ),
            ),
            'count' => 3
        );

        $dummy_direct_payment_details = array(
            'direct_payment_bank' => 'Example bank name',
            'direct_payment_account_name' => 'Example account name',
            'direct_payment_account_number' => '123456',
            'direct_payment_routing_number' => '123456',
            'direct_payment_iban' => 'NL43INGB4186520410',
            'direct_payment_bic_swift' => '123456',
            'direct_payment_instruction' => 'Sample payment methods instructions.'
        );

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());

		$buffy = '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js

            if ( is_user_logged_in() ) {

	            ob_start();
	            ?>
                <script>

                    if ( 'undefined' === typeof tdsSubsCancel ) {

                        tdsSubsCancel = {

                            init: function () {

                                jQuery().ready( function () {

                                    jQuery(document).on( 'click', '.tds-cancel-subscription', function (event) {

                                        event.preventDefault();

                                        var $this = jQuery(this),
                                            dataSubscriptionId = $this.data('subscription-id'),
                                            dataSubscriptionUserId = $this.data('subscription-user-id'),
                                            dataSubscriptionStatus = $this.data('subscription-status'),
                                            dataStripeSubscriptionId = $this.data('stripe-subscription-id');

                                        $this.prop( 'disabled', true );

                                        jQuery.ajax({
                                            timeout: 20000,
                                            type: 'POST',
                                            url: tdsSubsCancel.get_rest_endpoint(
                                                'tds_subscription/cancel_subscription',
                                                'uuid=' + tdsSubsCancel.get_unique_id()
                                            ),
                                            beforeSend: function (xhr) {
                                                xhr.setRequestHeader( 'X-WP-Nonce', window.tds_js_globals.wpRestNonce );
                                            },
                                            cache: false,
                                            dataType: 'json',
                                            data: {
                                                subscriptionId: dataSubscriptionId,
                                                subscriptionUserId: dataSubscriptionUserId,
                                                subscriptionStatus: dataSubscriptionStatus,
                                                stripeSubscriptionId: dataStripeSubscriptionId
                                            },
                                            success: function ( data, textStatus, jqXHR ) {
                                                if ( 'undefined' !== typeof data['error'] ) {
                                                    console.log( data['error'] );
                                                    tdsSubsCancel.showStripeMsg( data['error'], 'error', true );
                                                } else if ( 'undefined' !== typeof data['success'] && 'undefined' !== typeof data['redirect_url'] ) {
                                                    //tdsSubsCancel.showStripeMsg( JSON.stringify( data ), 'info', true );
                                                    console.log( data );
                                                    $this.removeClass('tds-s-btn-saving');
                                                    window.location.href = decodeURI( data['redirect_url'] );
                                                }

                                            },
                                            error: function ( MLHttpRequest, textStatus, errorThrown ) {
                                                console.log( 'tds cancel subscription - Error callback - textStatus: ' + textStatus + ' errorThrown: ' + errorThrown );
                                            }
                                        });

                                    });

                                });
                            },

                            showStripeMsg: function( messageText, type = '', permanent ) {
                                const $tdsCancelMessage = jQuery("#tds-cancel-message"),
                                    $tdsCancelMessageTxt = $tdsCancelMessage.find('.tds-s-notif-descr');

                                $tdsCancelMessage.show();
                                $tdsCancelMessageTxt.html(messageText);

                                if ( type !== '' ) {
                                    $tdsCancelMessage.addClass('tds-s-notif-' + type);
                                }

                                if ( 'undefined' !== typeof permanent && true === permanent ) {
                                    return;
                                }

                                setTimeout(function () {
                                    $tdsCancelMessage.hide();
                                    $tdsCancelMessageTxt.html('');

                                    if ( type !== '' ) {
                                        $tdsCancelMessage.removeClass( 'tds-s-notif-' + type );
                                    }
                                }, 10000 );

                            },

                            // returns a full rest endpoint url..
                            get_rest_endpoint: function ( restEndPoint, queryString ) {
                                if ( _.isEmpty( window.tds_js_globals.permalinkStructure ) ) {
                                    return window.tds_js_globals.wpRestUrl + restEndPoint + '&' + queryString; // no permalinks
                                } else {
                                    return window.tds_js_globals.wpRestUrl + restEndPoint + '?' + queryString; // we have permalinks enabled
                                }
                            },

                            // generates a unique ID
                            get_unique_id: function () {
                                function s4() {
                                    return Math.floor( ( 1 + Math.random() ) * 0x10000 ).toString(16).substring(1);
                                }
                                return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
                            }

                        };

                        tdsSubsCancel.init();

                    }

                </script>

	            <?php
	            // js for frontend
	            td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );

                ob_start();
                ?>

	            <div class="tds-block-inner td-fix-index">
                    <div class="tds-s-page-sec tds-s-page-subsc">
                        <div class="tds-s-page-sec-header">
                            <h2 class="tds-spsh-title"><?php echo __td('Subscriptions', TD_THEME_NAME) ?></h2>
                            <div class="tds-spsh-descr"><?php echo __td('All your subscriptions.', TD_THEME_NAME) ?></div>
                        </div>

                        <div class="tds-s-page-sec-content">
                            <?php
                            $buffy .= ob_get_clean();

                            $result = $dummy_subscriptions_data;
                            if( !$is_composer ) {
                                $result = tds_util::get_subscriptions( get_current_user_id(), $current_page, $per_page );
                            }

                            if ( ! empty( $result ) && ! empty( $result['subscriptions'] ) ) {

                                ob_start();
                                ?>

                                <table class="tds-s-table tds-s-table-subscr">
                                    <thead class="tds-s-table-header">
                                        <tr class="tds-s-table-row tds-s-table-row-h">
                                            <th class="tds-s-table-col"><?php echo __td('Plan', TD_THEME_NAME) ?></th>
                                            <th class="tds-s-table-col"><?php echo __td('Payment type', TD_THEME_NAME) ?></th>
                                            <th class="tds-s-table-col"><?php echo __td('Price', TD_THEME_NAME) ?></th>
                                            <th class="tds-s-table-col"><?php echo __td('Status', TD_THEME_NAME) ?></th>
                                            <th class="tds-s-table-col"><?php echo __td('Months', TD_THEME_NAME) ?></th>
                                            <th class="tds-s-table-col tds-s-table-col-start-date"><?php echo __td('Start date', TD_THEME_NAME) ?></th>
                                            <th class="tds-s-table-col tds-s-table-col-end-date"><?php echo __td('End date', TD_THEME_NAME) ?></th>
                                            <th class="tds-s-table-col"></th>
                                        </tr>
                                    </thead>

                                    <tbody class="tds-s-table-body">
                                        <?php

                                        $is_stripe = false;

                                        foreach ( $result['subscriptions'] as $key => $subscription ) {
                                            $buffy_payment_btn = '';
                                            $buffy_payment_stripe_form = '';

                                            if ( 'waiting_payment' === $subscription['status'] && !empty( $subscription['price'] ) ) {

                                                switch ( $subscription['payment_type'] ) {
                                                    case 'paypal':

                                                        $payment_paypal       = td_subscription::get_payment_method_credentials();
                                                        $tds_paypal_client_id = $payment_paypal[ 'client_id' ];

                                                        if ( ! empty( $payment_paypal ) && '1' === $payment_paypal[ 'is_active' ] ) {

                                                            $price = $subscription[ 'price' ];
                                                            if ( 'waiting_payment' !== $subscription[ 'status' ] && ! empty( $subscription[ 'next_price' ] ) ) {
                                                                $price = $subscription[ 'next_price' ];
                                                            }

                                                            $currency = tds_util::get_tds_option( 'curr_name' );
                                                            if ( empty( $currency ) ) {
                                                                $currency = 'USD';
                                                            }
                                                            if ( ! empty( $subscription[ 'curr_name' ] ) ) {
                                                                $currency = $subscription[ 'curr_name' ];
                                                            }

                                                            $buffy_payment_btn =
                                                                '<script src="https://www.paypal.com/sdk/js?client-id=' . $tds_paypal_client_id . '&currency=' . $currency . '"></script>
                                                            <div class="tds-paypal-button" data-value="' . $price . '" data-currency="' . $currency . '"></div>';
                                                        }
                                                        break;

                                                    case 'stripe':

                                                        global $wpdb;
                                                        $tds = $wpdb->get_results("SELECT * FROM tds_payment_stripe LIMIT 1", ARRAY_A );

                                                        if ( !empty( $tds[0] ) && '1' === $tds[0]['is_active'] ) {

                                                            $price = $subscription['price'];
                                                            if ( 'waiting_payment' !== $subscription['status'] && !empty( $subscription['next_price'] ) ) {
                                                                $price = $subscription['next_price'];
                                                            }

                                                            $currency = tds_util::get_tds_option( 'curr_name' );
                                                            if ( empty( $currency ) ) {
                                                                $currency = 'USD';
                                                            }
                                                            if ( !empty( $subscription['curr_name'] ) ) {
                                                                $currency = $subscription['curr_name'];
                                                            }

                                                            $in_testing = '';
                                                            if ( $tds[0]['is_sandbox'] ) {
                                                                $in_testing = 'sandbox_';
                                                            }
                                                            $public_key = $tds[0][$in_testing . 'public_key'];
                                                            $secret_key = $tds[0][$in_testing . 'secret_key'];

	                                                        //require_once TDS_PATH . '/includes/vendor/stripe/init.php';
                                                            //
                                                            //$stripe_client = new \Stripe\StripeClient($secret_key);
	                                                        //$stripe_subscription_id = $subscription['stripe_subscription_id'];
	                                                        //$stripe_customer_id = $subscription['stripe_customer_id'];
	                                                        //$plan_id = $subscription['plan_id'];
	                                                        //$plan_data = tds_util::get_plan($plan_id);

	                                                        //$price = $subscription['price'];
	                                                        //$curr_name = $subscription['curr_name'];

                                                            //try {

                                                                // get stripe subscription
	                                                            //$stripe_subscription = $stripe_client->subscriptions->retrieve($stripe_subscription_id);
	                                                            //$stripe_client->subscriptions->update( $stripe_subscription_id, array( 'trial_end' => 'now' ) );
                                                                //
                                                                // latest invoice
                                                                //$latest_invoice_id = $stripe_subscription['latest_invoice'];
	                                                            //$stripe_subscription_latest_invoice = $stripe_client->invoices->retrieve($latest_invoice_id);

	                                                            //$paid_invoice = $stripe_subscription_latest_invoice->pay();

                                                                // pending setup intent
                                                                //$pending_setup_intent_id = $stripe_subscription['pending_setup_intent'];
	                                                            //$stripe_subscription_pending_setup_intent = $stripe_client->setupIntents->retrieve($pending_setup_intent_id);
	                                                            //$_setup_intent = $stripe_client->setupIntents->retrieve('seti_1MUTwjBCi74bRWJ6SjHK88v6');
                                                                //
	                                                            //echo '<pre style="white-space: pre-wrap">';
	                                                            //print_r( $stripe_subscription );
	                                                            //print_r( $stripe_subscription_latest_invoice );
	                                                            //echo '<div style="">PAID INVOICE</div>';
	                                                            //print_r( $paid_invoice );
	                                                            //print_r( $stripe_subscription_pending_setup_intent );
	                                                            //print_r( $payment_intent );
	                                                            //print_r( $_setup_intent );
	                                                            //echo '</pre>';

	                                                            //$stripe_pi_client_secret = '';

                                                            //} catch ( Exception $ex ) {
                                                                // log subscription update error msg
                                                                //error_log('stripe subscriptions->retrieve error: ' . $ex->getMessage() );
                                                            //}

                                                            // set action type: payment or setup intent
                                                            $stripe_action_type = ( substr( $subscription['stripe_payment_intent'], 0, 5 ) === "seti_" ) ? 'setup' : 'payment';

                                                            ob_start();

                                                            if ( empty( $subscription['stripe_subscription_id'] ) ) {

	                                                            $payment_page_id = tds_util::get_tds_option('payment_page_id');

                                                                if ( empty( $payment_page_id ) || !get_post( $payment_page_id ) instanceof WP_Post ) {
                                                                    ?>
                                                                    <div class="tds-stripe-button">N/A</div>
                                                                    <?php
                                                                } else {

	                                                                $data_payment_page_url = add_query_arg(
                                                                        array(
	                                                                        'plan_id' => $subscription['plan_id'],
	                                                                        'tds_subscription_local_id' => $subscription['id']
                                                                        ),
                                                                        get_permalink( $payment_page_id )
                                                                    );

                                                                    ?>

                                                                    <div class="tds-stripe-button" data-payment-page-url="<?php echo $data_payment_page_url ?>">Go to checkout</div>

                                                                    <?php
                                                                }

                                                            } else {
                                                                ?>

                                                                <div class="tds-stripe-button"
                                                                     data-subscription-id="<?php echo $subscription['id'] ?>"
                                                                     data-value="<?php echo $price ?>"
                                                                     data-currency="<?php echo $currency ?>"
                                                                     data-public-key="<?php echo $public_key ?>"
                                                                     data-stripe-pi="<?php echo $subscription['stripe_payment_intent'] ?>"
                                                                >Stripe</div>

                                                                <?php
                                                            }

                                                            $buffy_payment_btn = ob_get_clean();

                                                            if ( !$is_stripe ) {
                                                                $is_stripe = true;
                                                                ob_start();
                                                                ?>

                                                                <script src="https://js.stripe.com/v3/"></script>
                                                                <div id="tds-stripe-container">

	                                                                <?php
	                                                                if ( !empty( $in_testing ) ) { ?>
                                                                        <div class="tds-s-notif tds-s-notif-sm tds-s-notif-info">
                                                                            <div class="tds-s-notif-descr">
                                                                                Test mode is enabled. You can use the following card details for Stripe test transactions:<br><br>
                                                                                Number: <strong>4242424242424242</strong><br>
                                                                                CVC: <strong>123</strong><br>
                                                                                Expiration: <strong>any future date</strong><br><br>
                                                                                For more test card numbers visit the <a target="blank" href="https://stripe.com/docs/testing#cards">Stripe documentation page</a>.
                                                                            </div>
                                                                        </div>
                                                                    <?php }
	                                                                ?>

                                                                    <form id="tds-stripe-form">
                                                                        <div id="tds-payment-element" class="loading"></div>

                                                                        <div id="tds-payment-message" class="tds-s-notif tds-s-notif-xsm">
                                                                            <div class="tds-s-notif-descr"></div>
                                                                        </div>

                                                                        <div class="tds-stripe-form-btns">
                                                                            <button id="tds-stripe-submit"
                                                                                    class="tds-s-btn tds-s-btn-sm"
                                                                                    disabled="disabled"
                                                                                    data-public-key="<?php echo $public_key ?>"
                                                                                    data-type="<?php echo $stripe_action_type ?>"
                                                                            >Pay with Stripe</button>
                                                                            <button class="tds-s-btn tds-s-btn-sm tds-s-btn-hollow tds-stripe-cancel" disabled="disabled">Cancel</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                <?php
                                                                $buffy_payment_stripe_form .= ob_get_clean();

                                                            }
                                                        }

                                                        break;
                                                }
                                            }

                                            ?>
                                            <tr class="tds-s-table-row <?php echo ( $is_composer && $key == 0 ) ? 'tds-s-table-row-active tds-s-table-row-info-expanded' : '' ?>" data-subscription-id="<?php echo $subscription['id'] ?>">
                                                <td class="tds-s-table-col">
                                                    <div class="tds-s-table-col-label"><?php echo __td('Plan', TD_THEME_NAME) ?></div>
                                                    <?php echo $subscription['plan_name'] ? $subscription['plan_name'] : __td('missing plan', TD_THEME_NAME)  ?>
                                                </td>
                                                <td class="tds-s-table-col">
                                                    <div class="tds-s-table-col-label"><?php echo __td('Payment type', TD_THEME_NAME) ?></div>
                                                    <?php
                                                    $buffy .= ob_get_clean();

                                                    if( $subscription['is_free'] == 0 ) {
                                                        switch ( $subscription['payment_type'] ) {
                                                            case 'direct':
                                                                $buffy .=  __td('Bank transfer', TD_THEME_NAME);
                                                                break;
                                                            case 'paypal':
                                                                $buffy .= 'PayPal';
                                                                break;
                                                            case 'stripe':
                                                                $buffy .= 'Stripe';
                                                                break;
                                                            default:
                                                                $buffy .= $subscription['payment_type'];
                                                                break;
                                                        }
                                                    } else {
                                                        $buffy .= '-';
                                                    }

                                                    ob_start();
                                                    ?>
                                                </td>
                                                <td class="tds-s-table-col">
                                                    <div class="tds-s-table-col-label"><?php echo __td('Price', TD_THEME_NAME)?></div>
                                                    <?php if ( !empty( $subscription['formatted_full_price'] ) ) { ?>
                                                        <div class="tds-s-table-price-full">
	                                                        <?php echo $subscription['formatted_full_price'] ?>
                                                        </div>
                                                    <?php } ?>
                                                    <?php echo ( $subscription['is_free'] == 1 ) ? __td('Free', TD_THEME_NAME) : $subscription['formatted_price'] ?>
                                                </td>
                                                <td class="tds-s-table-col">
                                                    <div class="tds-s-table-col-label"><?php echo __td('Status', TD_THEME_NAME) ?></div>
                                                    <?php
                                                    $buffy .= ob_get_clean();

                                                    switch ( $subscription['status'] ) {
                                                        case 'free':
                                                            $buffy .= '<div class="tds-s-table-status tds-s-table-status-free">' . __td('Free', TD_THEME_NAME) . '</div>';
                                                            break;
                                                        case 'active':
                                                            $buffy .= '<div class="tds-s-table-status tds-s-table-status-active">' . __td('Active', TD_THEME_NAME) . '</div>';
                                                            break;
                                                        case 'trial':
                                                            $buffy .= '<div class="tds-s-table-status tds-s-table-status-trial">' . __td('Trial ', TD_THEME_NAME)  . $subscription['trial_days'] . ' ' . ((intval($subscription['trial_days']) > 1 ) ? 'days' : 'day') . '</div>';
                                                            break;
                                                        case 'blocked':
                                                            $buffy .= '<div class="tds-s-table-status tds-s-table-status-generic">' . __td('Blocked', TD_THEME_NAME) . '</div>';
                                                            break;
                                                        case 'closed':
                                                            if ( !empty( $subscription['canceled'] ) ) {
	                                                            $msg = __td('Canceled', TD_THEME_NAME);
                                                            } else {
	                                                            $msg = __td('Closed', TD_THEME_NAME);
                                                            }
                                                            $buffy .= '<div class="tds-s-table-status tds-s-table-status-canceled">' . $msg . '</div>';
                                                            break;
                                                        case 'closed_not_paid':
                                                            $buffy .= '<div class="tds-s-table-status tds-s-table-status-not-paid">' . __td('Not paid', TD_THEME_NAME) . '</div>';
                                                            break;
                                                        case 'waiting_payment':
                                                            $buffy .= '<div class="tds-s-table-status tds-s-table-status-waiting">' . __td('Awaiting payment', TD_THEME_NAME) . '</div>';
                                                            break;
                                                        default:
                                                            $buffy .= '<div class="tds-s-table-status tds-s-table-status-generic">' . $subscription['status'] . '</div>';
                                                            break;
                                                    }

                                                    ob_start();
                                                    ?>
                                                </td>
                                                <td class="tds-s-table-col">
                                                    <div class="tds-s-table-col-label"><?php echo __td('Months', TD_THEME_NAME)?></div>
                                                    <?php echo $subscription['is_free'] == 0 ? $subscription['last_months_in_cycle'] : '' ?>
                                                </td>

                                                <td class="tds-s-table-col tds-s-table-col-start-date">
                                                    <div class="tds-s-table-col-label"><?php echo __td('Start date', TD_THEME_NAME)?></div>
                                                    <?php echo tds_util::get_formatted_date($subscription['start_date']) ?>
                                                </td>
                                                <td class="tds-s-table-col tds-s-table-col-end-date">
                                                    <div class="tds-s-table-col-label"><?php echo __td('End date', TD_THEME_NAME)?></div>
                                                    <?php echo $subscription['is_free'] == 0 ? tds_util::get_formatted_date($subscription['end_date']) : '' ?>
                                                </td>

                                                <td class="tds-s-table-col tds-s-table-col-pp-btn <?php echo $buffy_payment_btn == '' ? 'tds-s-table-col-pp-btn-none' : '' ?>">
                                                    <div class="tds-s-table-col-label"><?php echo __td('Pay now', TD_THEME_NAME)?></div>
                                                    <?php echo $buffy_payment_btn ?>
                                                </td>

                                                <td class="tds-s-table-col tds-s-table-col-expand" title="Show more info">
                                                    <div class="tds-s-table-col-label"><?php echo __td('Show more info', TD_THEME_NAME)?></div>
                                                    <svg class="tds-s-table-expand-toggle" xmlns="http://www.w3.org/2000/svg" width="12" height="7" viewBox="0 0 12 7"><path d="M11,15a1,1,0,0,1-.707-.293l-5-5A1,1,0,0,1,6.707,8.293L11,12.586l4.293-4.293a1,1,0,1,1,1.414,1.414l-5,5A1,1,0,0,1,11,15Z" transform="translate(-5 -8)"/></svg>
                                                </td>
                                            </tr>

                                            <?php if( $buffy_payment_stripe_form != '' ) { ?>
                                                <tr class="tds-s-table-row-extra-wrap tds-s-table-row-extra-wrap-stripe" style="display: none" data-belongs-to="<?php echo $subscription['id'] ?>">
                                                    <td class="tds-s-table-row-extra" colspan="9">
                                                        <div class="tds-s-table-row-extra-inner">
                                                            <div class="tds-s-tre-cols">
                                                                <div class="tds-s-tre-col tds-stripe-placeholder">
                                                                    <?php echo $buffy_payment_stripe_form ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <tr class="tds-s-table-row-extra-wrap tds-s-table-row-extra-wrap-info" <?php echo ( $is_composer && $key == 0 ) ? '' : 'style="display: none"' ?> data-belongs-to="<?php echo $subscription['id'] ?>">
                                                <td class="tds-s-table-row-extra" colspan="9">
                                                    <div class="tds-s-table-row-extra-inner">
                                                        <div class="tds-s-tre-cols">
                                                            <div class="tds-s-tre-col tds-s-tre-subscr-info">
                                                                <div class="tds-s-list-wrap">
                                                                    <div class="tds-s-list-title"><?php echo __td('Subscription info', TD_THEME_NAME) ?></div>

                                                                    <ul class="tds-s-list">
                                                                        <li class="tds-s-list-item">
                                                                            <span class="tds-s-list-label"><?php echo __td('ID', TD_THEME_NAME) ?>:</span>
                                                                            <span class="tds-s-list-text">#<?php echo $subscription['id'] ?></span>
                                                                        </li>
                                                                        <li class="tds-s-list-item">
                                                                            <span class="tds-s-list-label"><?php echo __td('Name', TD_THEME_NAME) ?>:</span>
                                                                            <span class="tds-s-list-text"><?php echo $subscription['billing_first_name'] . ' ' . $subscription['billing_last_name'] ?></span>
                                                                        </li>
                                                                        <li class="tds-s-list-item" <?php echo !empty($subscription['billing_company_name']) ? '' : 'style="display: none"' ?>>
                                                                            <span class="tds-s-list-label"><?php echo __td('Company name', TD_THEME_NAME) ?>:</span>
                                                                            <span class="tds-s-list-text"><?php echo $subscription['billing_company_name'] ?></span>
                                                                        </li>
                                                                        <li class="tds-s-list-item" <?php echo !empty($subscription['billing_vat_number']) ? '' : 'style="display: none"' ?>>
                                                                            <span class="tds-s-list-label"><?php echo __td('VAT', TD_THEME_NAME) ?>:</span>
                                                                            <span class="tds-s-list-text"><?php echo $subscription['billing_vat_number'] ?></span>
                                                                        </li>
                                                                        <li class="tds-s-list-item">
                                                                            <span class="tds-s-list-label"><?php echo __td('Address', TD_THEME_NAME) ?>:</span>
                                                                            <span class="tds-s-list-text"><?php echo $subscription['billing_address'] ?></span>
                                                                        </li>
                                                                        <li class="tds-s-list-item">
                                                                            <span class="tds-s-list-label"><?php echo __td('City', TD_THEME_NAME) ?>:</span>
                                                                            <span class="tds-s-list-text"><?php echo $subscription['billing_city'] ?></span>
                                                                        </li>
                                                                        <li class="tds-s-list-item">
                                                                            <span class="tds-s-list-label"><?php echo __td('Country/State', TD_THEME_NAME) ?>:</span>
                                                                            <span class="tds-s-list-text"><?php echo $subscription['billing_country'] ?></span>
                                                                        </li>
                                                                        <li class="tds-s-list-item">
                                                                            <span class="tds-s-list-label"><?php echo __td('Email', TD_THEME_NAME) ?>:</span>
                                                                            <span class="tds-s-list-text"><?php echo $subscription['billing_email'] ?></span>
                                                                        </li>
                                                                        <li class="tds-s-list-item">
                                                                            <span class="tds-s-list-label"><?php echo __td('Postal code', TD_THEME_NAME) ?>:</span>
                                                                            <span class="tds-s-list-text"><?php echo $subscription['billing_post_code'] ?></span>
                                                                        </li>
                                                                    </ul>

                                                                    <div id="tds-cancel-message" class="tds-s-notif tds-s-notif-xsm">
                                                                        <div class="tds-s-notif-descr"></div>
                                                                    </div>

	                                                                <?php
	                                                                $buffy .= ob_get_clean();

	                                                                if ( empty( $subscription['canceled'] ) ) {

		                                                                if ( $subscription['status'] === 'active' || $subscription['status'] === 'waiting_payment' ) {
			                                                                $buffy .= '<button class="tds-s-btn tds-s-btn-sm tds-s-btn-hollow tds-cancel-subscription"';
			                                                                $buffy .= 'data-subscription-id="' . $subscription['id'] . '"';
			                                                                $buffy .= 'data-subscription-user-id="' . $subscription['user_id'] . '"';
			                                                                $buffy .= 'data-subscription-status="' . $subscription['status'] . '"';

			                                                                if ( $subscription['payment_type'] === 'stripe' ) {
				                                                                $buffy .= 'data-stripe-subscription-id="' . $subscription['stripe_subscription_id'] . '"';
			                                                                }

			                                                                $buffy .= '>';
			                                                                $buffy .= __td( 'Cancel subscription', TD_THEME_NAME );
			                                                                $buffy .= '</button>';
		                                                                }

                                                                    } else {

		                                                                if ( $subscription['status'] === 'active' ) {
			                                                                $buffy .= '<div class="tds-s-notif tds-s-notif-xsm tds-s-notif-info" style="margin: 20px 0 0 0 !important">';
			                                                                $buffy .= '<div class="tds-s-notif-descr">';
			                                                                $buffy .= str_replace( '%END_DATE%', tds_util::get_formatted_date( $subscription['end_date'] ), __td( 'This subscription has been canceled and it will end on %END_DATE%.', TD_THEME_NAME ) );
			                                                                $buffy .= '</div>';
			                                                                $buffy .= '</div>';
		                                                                }

                                                                    }

	                                                                ob_start();
	                                                                ?>

                                                                </div>
                                                            </div>
                                                            <?php if ( $subscription['payment_type'] == 'direct' ) {
                                                                $direct_payment_details = self::get_direct_payment_details();
                                                            ?>
                                                                <div class="tds-s-tre-col tds-s-tre-pay-info tds-s-tre-pay-info-bank">
                                                                    <div class="tds-s-list-wrap">
                                                                        <div class="tds-s-list-title"><?php echo __td('Direct bank transfer details', TD_THEME_NAME) ?></div>

                                                                        <ul class="tds-s-list">
                                                                            <li class="tds-s-list-item">
                                                                                <span class="tds-s-list-label"><?php echo __td('Account name', TD_THEME_NAME) ?>:</span>
                                                                                <span class="tds-s-list-text"><?php echo $direct_payment_details['direct_payment_account_name'] ?></span>
                                                                            </li>
                                                                            <li class="tds-s-list-item">
                                                                                <span class="tds-s-list-label"><?php echo __td('Account number', TD_THEME_NAME) ?>:</span>
                                                                                <span class="tds-s-list-text"><?php echo $direct_payment_details['direct_payment_account_number'] ?></span>
                                                                            </li>
                                                                            <li class="tds-s-list-item">
                                                                                <span class="tds-s-list-label"><?php echo __td('Bank name', TD_THEME_NAME) ?>:</span>
                                                                                <span class="tds-s-list-text"><?php echo $direct_payment_details['direct_payment_bank'] ?></span>
                                                                            </li>
                                                                            <li class="tds-s-list-item" <?php echo !empty($direct_payment_details['direct_payment_routing_number']) ? '' : 'style="display: none"' ?>>
                                                                                <span class="tds-s-list-label"><?php echo __td('Routing number', TD_THEME_NAME) ?>:</span>
                                                                                <span class="tds-s-list-text"><?php echo $direct_payment_details['direct_payment_routing_number'] ?></span>
                                                                            </li>
                                                                            <li class="tds-s-list-item" <?php echo !empty($direct_payment_details['direct_payment_iban']) ? '' : 'style="display: none"' ?>>
                                                                                <span class="tds-s-list-label"><?php echo __td('IBAN', TD_THEME_NAME) ?>:</span>
                                                                                <span class="tds-s-list-text"><?php echo $direct_payment_details['direct_payment_iban'] ?></span>
                                                                            </li>
                                                                            <li class="tds-s-list-item" <?php echo !empty($direct_payment_details['direct_payment_bic_swift']) ? '' : 'style="display: none"' ?>>
                                                                                <span class="tds-s-list-label"><?php echo __td('Bic/Swift', TD_THEME_NAME) ?>:</span>
                                                                                <span class="tds-s-list-text"><?php echo $direct_payment_details['direct_payment_bic_swift'] ?></span>
                                                                            </li>
                                                                            <li class="tds-s-list-item" <?php echo !empty($direct_payment_details['direct_payment_instruction']) ? '' : 'style="display: none"' ?>>
                                                                                <span class="tds-s-list-label"><?php echo __td('Instructions', TD_THEME_NAME) ?>:</span>
                                                                                <span class="tds-s-list-text"><?php echo $direct_payment_details['direct_payment_instruction'] ?></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ( $subscription['payment_type'] == 'stripe' ) { ?>
                                                                <div class="tds-s-tre-col tds-s-tre-pay-info tds-s-tre-pay-info">
                                                                    <div class="tds-s-list-wrap">
                                                                        <div class="tds-s-list-title">
                                                                            <?php echo __td('Stripe subscription details', TD_THEME_NAME ) ?>
                                                                        </div>

                                                                        <ul class="tds-s-list">
                                                                            <li class="tds-s-list-item">
                                                                                <span class="tds-s-list-label"><?php echo __td('Current status', TD_THEME_NAME) ?>:</span>
                                                                                <span class="tds-s-list-text">
                                                                                    <?php
                                                                                    if ( !empty( $subscription['stripe_payment_status'] ) ) {

                                                                                        switch ( $subscription['stripe_payment_status'] ) {
                                                                                            case 'subscription_create - invoice.payment_succeeded':
	                                                                                            echo __td('Subscription Create: Initial Invoice Paid', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_create - invoice.created':
	                                                                                            echo __td('Subscription Create: Initial Invoice has been created', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_create - invoice.finalized':
	                                                                                            echo __td('Subscription Create: Initial Invoice has been finalized, and it is ready to be paid', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_create - invoice.updated - void':
	                                                                                            echo __td('Subscription Create: Initial Invoice voided', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_cycle - invoice.updated - void':
	                                                                                            echo __td('Subscription Renew: Invoice voided', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_update - invoice.updated - void':
	                                                                                            echo __td('Subscription Update: Initial voided', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_create - invoice.updated':
                                                                                            case 'subscription_cycle - invoice.updated':
                                                                                            case 'subscription_update - invoice.updated':
	                                                                                            echo __td('Invoice updated', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_update - invoice.payment_succeeded':
	                                                                                            echo __td('Subscription Update: Invoice Paid', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_cycle - invoice.payment_succeeded':
                                                                                            case 'subscription_cycle - invoice.paid':
	                                                                                            echo __td('Subscription Renew: Invoice Paid', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_cycle - invoice.finalized':
	                                                                                            echo __td('Subscription Renew: Invoice Finalized', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_cycle - invoice.created':
	                                                                                            echo __td('Subscription Renew: Invoice Created', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_cycle - invoice.upcoming':
	                                                                                            echo __td('Subscription Renew: Invoice Upcoming', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'incomplete_expired':
	                                                                                            echo __td('Subscription Expired: Invoice Voided(the first invoice was not paid)', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_create - trialing':
	                                                                                            echo __td('Subscription Create: Trialing', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_deleted':
	                                                                                            echo __td('Subscription Deleted', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_canceled':
	                                                                                            echo __td('Subscription Canceled', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'subscription_cancel_at_period_end':
	                                                                                            echo __td('Subscription has been canceled and will end on: ', TD_THEME_NAME );
                                                                                                echo tds_util::get_formatted_date( $subscription['end_date'] );
                                                                                                break;
                                                                                            case 'setupIntent - succeeded':
	                                                                                            echo __td('Setup successful - You have successfully set up your payment method for future payments.', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'setupIntent - requires_payment_method':
	                                                                                            echo __td('Setup failed - We are sorry, there was an error setting up your payment method. Please try again with a different payment method.', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'paymentIntent - succeeded':
	                                                                                            echo __td('Payment successful - Your latest subscription payment was completed successfully.', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'paymentIntent - processing':
	                                                                                            echo __td('Payment processing - Your latest subscription payment is being processed.', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'paymentIntent - requires_payment_method':
	                                                                                            echo __td('Payment failed - We are sorry, there was an error processing your payment. Please try again with a different payment method.', TD_THEME_NAME );
                                                                                                break;
                                                                                            case 'trial_end_now_failed':
	                                                                                            echo __td('Trial End Renew failed due to missing a default payment method fro your account. Please consider adding a default payment method. You can use the "Stripe" button above to setup a payment for your account which will be used to pay subscriptions waiting to be paid.', TD_THEME_NAME );
                                                                                                break;
                                                                                            default:
	                                                                                            echo $subscription['stripe_payment_status'];
                                                                                                break;
                                                                                        }

                                                                                    } else {
	                                                                                    echo 'no updates yet';
                                                                                    }
                                                                                    ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>

                                                                        <div class="tds-s-list-title">
                                                                            <?php echo __td('Stripe invoice details', TD_THEME_NAME) ?>
                                                                        </div>

	                                                                    <?php
	                                                                    if ( !empty( $subscription['stripe_invoice_details'] ) ) {
	                                                                    ?>
                                                                            <ul class="tds-s-list">
                                                                                <li class="tds-s-list-item">
                                                                                    <span class="tds-s-list-label"><?php echo __td('Latest invoice', TD_THEME_NAME ) ?>:</span>
                                                                                    <span class="tds-s-list-text">
                                                                                    <?php
                                                                                    if ( !empty( $subscription['stripe_invoice_details']['invoice_url'] ) ) {

	                                                                                    echo '<a href="' . $subscription['stripe_invoice_details']['invoice_url'] . '" target="_blank" title="view invoice">' . __td('View', TD_THEME_NAME ) . '</a>';

                                                                                    } else {
	                                                                                    echo '<a class="disabled" title="invoice view not available">' . __td('View', TD_THEME_NAME ) . '</a>';
                                                                                    }
                                                                                    ?>
                                                                                    </span>
                                                                                    <span class="tds-s-list-text-sep"> | </span>
                                                                                    <span class="tds-s-list-text">
	                                                                                <?php
	                                                                                if ( !empty( $subscription['stripe_invoice_details']['invoice_pdf'] ) ) {

		                                                                                echo '<a href="' . $subscription['stripe_invoice_details']['invoice_pdf'] . '" target="_blank" title="download invoice">' . __td('Download', TD_THEME_NAME ) . '</a>';

	                                                                                } else {
		                                                                                echo '<a class="disabled" title="invoice download not available">' . __td('Download', TD_THEME_NAME ) . '</a>';
	                                                                                }
	                                                                                ?>
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        <?php
	                                                                    } else {
	                                                                        ?>
                                                                            <ul>
                                                                                <li class="tds-s-list-item">
                                                                                    <span class="tds-s-list-label"><?php echo __td('Latest invoice', TD_THEME_NAME )?>:</span>
                                                                                    <span class="tds-s-list-text"><?php echo __td('N/A', TD_THEME_NAME )?></span>
                                                                                </li>
                                                                            </ul>
		                                                                    <?php
	                                                                    }
	                                                                    ?>

                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <?php
                                    // Pagination
                                    $num_pages = 3;
                                    $subscriptions_count = $result['count'];
                                    if( !$is_composer ) {
                                        $num_pages = ceil( $subscriptions_count / $per_page );
                                    }

                                    if( $enable_pag != '' ) {
                                        echo tds_util::get_custom_pagination(
                                            $current_page,
                                            $num_pages,
                                            'tds_s_page',
                                            3,
                                            array(
                                                'wrapper' => 'tds-s-pagination',
                                                'item' => 'tds-s-pagination-item',
                                                'active' => 'tds-s-pagination-active',
                                                'dots' => 'tds-s-pagination-dots'
                                            )
                                        );
                                    }
                                $buffy .= ob_get_clean();
                            } else {
                                $buffy .= '<div class="tds-s-notif tds-s-notif-info">';
                                    $buffy .= '<div class="tds-s-notif-descr">' . __td('No subscription created.', TD_THEME_NAME) . '</div>';
                                $buffy .= '</div>';
                            }
                        ob_start();
                        ?>

                        </div>
                    </div>

                    <?php
                    $publishing_posts_remaining = array();
                    $all_user_subscriptions = tds_util::get_user_subscriptions($current_user_id, null, array('active', 'free'));

                    if( $all_user_subscriptions ) {
                        foreach( $all_user_subscriptions as $user_subscription ) {
                            $plan_posts_remaining = unserialize($user_subscription['plan_posts_remaining']);

                            if( !empty($plan_posts_remaining) ) {
                                foreach( $plan_posts_remaining as $remaining_post_type => $remaining_posts ) {
                                    if( array_key_exists( $remaining_post_type, $publishing_posts_remaining ) ) {
                                        $publishing_posts_remaining[$remaining_post_type] += $remaining_posts;
                                    } else {
                                        $publishing_posts_remaining[$remaining_post_type] = $remaining_posts;
                                    }
                                }
                            }
                        }
                    }

                    if( !empty($publishing_posts_remaining) ) { ?>
                        <div class="tds-s-page-sec tds-s-page-posts-remaining">
                            <div class="tds-s-page-sec-header">
                                <h2 class="tds-spsh-title"><?php echo __td('Remaining publishing rights', TD_THEME_NAME) ?></h2>
                                <div class="tds-spsh-descr"><?php echo __td('The number of articles you have left to publish across different post types.', TD_THEME_NAME) ?></div>
                            </div>

                            <div class="tds-s-page-sec-content">
                                <div class="tds-s-subscr-remaining-posts">
                                    <?php
                                    foreach( $publishing_posts_remaining as $post_type => $remaining_posts ) {
                                        $post_type_obj = get_post_type_object($post_type);
                                        $post_type_labels = $post_type_obj->labels;
                                        ?>
                                        <button class="tds-s-btn tds-s-btn-sm tds-s-btn-grey tds-s-subscr-rp-item">
                                            <span class="tds-s-subscr-rp-type"><?php echo $post_type_labels->name ?></span>
                                            <span class="tds-s-subscr-rp-count"><?php echo $remaining_posts ?></span></button>
                                        <?php
                                    } ?>
                                </div>

                                <!-- <ul class="tds-s-list">
                                    <?php
                                    foreach( $publishing_posts_remaining as $post_type => $remaining_posts ) {
                                        $post_type_obj = get_post_type_object($post_type);
                                        $post_type_labels = $post_type_obj->labels;
                                        ?>
                                            <li class="tds-s-list-item">
                                                <span class="tds-s-list-label"><?php echo $post_type_labels->name ?>:</span>
                                                <span class="tds-s-list-text"><?php echo $remaining_posts ?></span>
                                            </li>
                                        <?php
                                    } ?>
                                </ul> -->
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <?php
                $buffy .= ob_get_clean();

            } else {

                ob_start();

                wp_login_form();
                ?>

                <a href="<?php echo esc_url( add_query_arg('lost_password', '', get_permalink()) ); ?>"><?php echo __td('Lost Password', TD_THEME_NAME) ?></a>

                <?php
                $buffy .= ob_get_clean();
            }

		$buffy .= '</div>';

		return $buffy;
	}
}
