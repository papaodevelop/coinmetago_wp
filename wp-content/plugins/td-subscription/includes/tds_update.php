<?php

class tds_update {

	private static $versions = ['1.2', '1.3', '1.3.2', '1.4', '1.4.1'];

	static function update_settings( $to_version ) {

		if ( empty( $to_version ) ) {
			return;
		}

		$versions = self::get_upper_versions( $to_version );

		foreach ( $versions as $version ) {
		    $method_name = '_to_' . str_replace('.', 'p', $version );
		    if ( method_exists(__CLASS__, $method_name ) ) {
		        call_user_func( array( __CLASS__, $method_name ) );
            }
		}
	}

	static function get_upper_versions( $current_version ) {
		$upper_versions = [];
		foreach ( self::$versions as $version ) {
			if ( 1 === version_compare( $version, $current_version ) ) {
				$upper_versions[] = $version;
			}
		}

		return $upper_versions;
	}

	static function _to_1p2 () {
		global $wpdb;

		try {

			$wpdb->query( "ALTER TABLE `tds_subscriptions` MODIFY paypal_order_info TEXT;" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `curr_dec_no` VARCHAR(30) DEFAULT NULL AFTER `price`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `curr_dec_sep` VARCHAR(30) NULL DEFAULT NULL AFTER `price`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `curr_th_sep` VARCHAR(30) NULL DEFAULT NULL AFTER `price`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `curr_pos` VARCHAR(30) NULL DEFAULT NULL AFTER `price`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `curr_name` VARCHAR(50) NULL DEFAULT NULL AFTER `price`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `next_price` VARCHAR(50) DEFAULT NULL AFTER `price`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

		} catch (Exception $ex) {
			// $ex
			return;
		}

		$wpdb->query( 'SET autocommit = 0;' );

		$wpdb->query('START TRANSACTION;');

		$wpdb->query("LOCK TABLES tds_subscriptions WRITE, tds_options WRITE;");

		try {

			$wpdb->query( "UPDATE `tds_subscriptions` SET `curr_name` = 'USD' WHERE `curr_name` IS NULL" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "UPDATE `tds_subscriptions` SET `curr_pos` = 'left_space' WHERE `curr_pos` IS NULL" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "UPDATE `tds_subscriptions` SET `curr_th_sep` = ',' WHERE `curr_th_sep` IS NULL" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "UPDATE `tds_subscriptions` SET `curr_dec_sep` = '.' WHERE `curr_dec_sep` IS NULL" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "UPDATE `tds_subscriptions` SET `curr_dec_no` = '0' WHERE `curr_dec_no` IS NULL" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			foreach ( [ 'curr_name'    => 'USD',
			            'curr_pos'     => 'left',
			            'curr_th_sep'   => '.',
			            'curr_dec_sep' => ',',
			            'curr_dec_no'  => '0'
			] as $key => $val
			) {
				$wpdb->insert( 'tds_options',
					array(
						'name'  => $key,
						'value' => $val
					),
					array( '%s', '%s' ) );

				if ( '' !== $wpdb->last_error ) {
					throw new Exception($wpdb->print_error());
				}
			}

			tds_util::set_tds_option('version', '1.2');
			$wpdb->query('COMMIT');

		} catch (Exception $ex) {
			// $ex
			$wpdb->query( 'ROLLBACK' );
		} finally {
			$wpdb->query('UNLOCK TABLES');
			$wpdb->query( 'SET autocommit = 1;' );
		}
	}

	static function _to_1p3 () {
		global $wpdb;

		try {

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `stripe_payment_info` TEXT DEFAULT NULL AFTER `paypal_order_capture_update_time`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `stripe_payment_status` VARCHAR(40) DEFAULT NULL AFTER `paypal_order_capture_update_time`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `stripe_payment_intent` VARCHAR(40) DEFAULT NULL AFTER `paypal_order_capture_update_time`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			tds_util::set_tds_option('version', '1.3');

		} catch (Exception $ex) {
			// $ex
			return;
		}
	}

	static function _to_1p3p2 () {
		global $wpdb;

		try {

			$wpdb->query( "ALTER TABLE `tds_plans` ADD `list` VARCHAR(255) DEFAULT NULL AFTER `options`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception( $wpdb->print_error() );
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `canceled` TINYINT NOT NULL DEFAULT '0' AFTER `created_at`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception( $wpdb->print_error() );
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `coupon_id` INT NOT NULL DEFAULT 0 AFTER `canceled`" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception( $wpdb->print_error() );
			}

            $wpdb->query( "ALTER TABLE `tds_companies` convert to character set utf8mb4 collate utf8mb4_unicode_520_ci" );
            if ( '' !== $wpdb->last_error ) {
                throw new Exception( $wpdb->print_error() );
            }

            $wpdb->query( "ALTER TABLE `tds_payment_bank` convert to character set utf8mb4 collate utf8mb4_unicode_520_ci" );
            if ( '' !== $wpdb->last_error ) {
                throw new Exception( $wpdb->print_error() );
            }

            $wpdb->query( "ALTER TABLE `tds_subscriptions` convert to character set utf8mb4 collate utf8mb4_unicode_520_ci" );
            if ( '' !== $wpdb->last_error ) {
                throw new Exception( $wpdb->print_error() );
            }

			tds_util::set_tds_option('version', '1.3.2');

		} catch ( Exception $ex ) {
			// $ex
			return;
		}
	}

	static function _to_1p4 () {
		global $wpdb;

		try {

			$wpdb->query( "ALTER TABLE `tds_options` MODIFY value LONGTEXT;" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception( $wpdb->print_error() );
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` MODIFY stripe_payment_intent VARCHAR(255);" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception( $wpdb->print_error() );
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` MODIFY stripe_payment_status VARCHAR(255);" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception( $wpdb->print_error() );
			}

            $wpdb->query( "ALTER TABLE `tds_payment_bank` MODIFY description VARCHAR(1000);" );
            if ( '' !== $wpdb->last_error ) {
                throw new Exception( $wpdb->print_error() );
            }

            $wpdb->query( "ALTER TABLE `tds_payment_bank` MODIFY instruction VARCHAR(1000);" );
            if ( '' !== $wpdb->last_error ) {
                throw new Exception( $wpdb->print_error() );
            }

            // add columns to tds_subscriptions table
			$columns_to_add = array( 'stripe_customer_id', 'stripe_subscription_id', 'stripe_invoice_details' );
			foreach ( $columns_to_add as $column_name ) {

				$add = true;
				foreach ( $wpdb->get_col( "DESC tds_subscriptions", 0 ) as $column ) {
					if ( $column === $column_name ) {
						$add = false;
					}
				}

				if ( $add ) {

					if ( $column_name === 'stripe_invoice_details' ) {
						$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `$column_name` TEXT AFTER `stripe_payment_info`" );
					} else {
						$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `$column_name` VARCHAR(40) DEFAULT '' AFTER `stripe_payment_info`" );
					}

					if ( '' !== $wpdb->last_error ) {
						throw new Exception( $wpdb->print_error() );
					}

				}

			}

			// add default data to tds_options table
			$tds_options = tds_util::get_tds_options();
			foreach ( [ 'from_name'    					   => get_bloginfo('name'),
			            'from_email'     				   => get_bloginfo('admin_email'),
			            'admin_notice_emails'     		   => get_bloginfo('admin_email'),
			            'email_footer_text'     		   => '&copy; ' . get_bloginfo('name'),

			            'register_email_enabled'           => '1',
			            'register_email_enabled_admin'     => '1',
			            'register_email_subject'       	   => '[%blogname%] Activate account',
			            'register_email_subject_admin'	   => '[%blogname%] New user registration',
			            'register_email_body'     		   => 
							'<h3>Welcome onboard!</h3>
							<p>Hello %name%,</p>
							<p>Thank you for registering on %blogname%! To activate your account, please visit the following link:</p>
							<p><a href="%verification_link%">%verification_link%</a></p>',
			            'register_email_body_admin'        => 
							'<h3>New user!</h3>
							<p>A new user has registered on your website!</p>
							<p>Username: %username%<br>
							Email: %useremail%</p>',

			            'optin_email_enabled'       	   => '1',
			            'optin_email_enabled_admin' 	   => '0',
			            'optin_email_subject'       	   => '[%blogname%] Confirm subscription',
			            'optin_email_subject_admin'        => '',
			            'optin_email_body'     			   => 
							'<h3>Welcome onboard!</h3>
							<p>Hello,</p>
							<p>Thank you for subscribing to %blogname%! To confirm your subscription, please visit the following link:</p>
							<p><a href="%optin_confirm_link%">%optin_confirm_link%</a></p>',
			            'optin_email_body_admin'        => '',

			            'password_email_enabled'       	   => '1',
			            'password_email_enabled_admin' 	   => '0',
			            'password_email_subject'       	   => '[%blogname%] Password reset',
			            'password_email_subject_admin'     => '',
			            'password_email_body'     		   => 
							'<h3>Password reset</h3>
							<p>Hello %name%,</p>
							<p>Someone has requested a password reset for your account.</p>
							<p>To reset your password, visit the following address: <a href="%pass_reset_link%">%pass_reset_link%</a>.</p>
							<p>If this was a mistake, just ignore this email and nothing will happen.</p>',
			            'password_email_body_admin'        => '',

			            'subscription_email_enabled'       => '1',
			            'subscription_email_enabled_admin' 	   => '1',
			            'subscription_email_subject'       => '[%blogname%] Subscription confirmation',
			            'subscription_email_subject_admin' => '[%blogname%] New subscriber',
			            'subscription_email_body'     	   => 
							'<h3>Subscription confirmation</h3>
							<p>Hello %name%,</p>
							<p>Thank you for subscribing to %blogname%!</p>
							<p>Subscription plan: %subscription_name%<br>
							Subscription price: %subscription_price%</p>
							%direct_bank_info%',
			            'subscription_email_body_admin'    => 
							'<h3>New subscription</h3>
							<p>A new user has subscribed to your website.</p>
							<p>Username: %username%<br>
							Subscription plan: %subscription_name%<br>
							Subscription price: %subscription_price%</p>',

			            'renewal_email_enabled'       	   => '1',
			            'renewal_email_enabled_admin' 	   => '0',
			            'renewal_email_subject'            => '[%blogname%] Subscription renewal',
			            'renewal_email_subject_admin'      => '[%blogname%] Subscription renewal',
			            'renewal_email_body'     		   => 
							'<h3>Subscription renewal</h3>
							<p>Hello %name%,</p>
							<p>Your subscription on %blogname% has been sucessfully renewed.
							Subscription plan: %subscription_name%<br>
							Subscription price: %subscription_price%</p>',
			            'renewal_email_body_admin'     	   => 
							'<h3>Subscription renewal</h3>
							<p>An user has successfully renewed their subscription.</p>
							<p>Username: %username%<br>
							Subscription plan: %subscription_name%<br>
							Subscription price: %subscription_price%</p>',

			            'cancel_email_enabled'       	   => '1',
			            'cancel_email_enabled_admin' 	   => '1',
			            'cancel_email_subject'              => '[%blogname%] Subscription canceled',
			            'cancel_email_subject_admin'       	   => '[%blogname%] Subscription canceled',
			            'cancel_email_body'     		   => 
							'<h3>Subscription cancelation</h3>
							<p>Hello %name%,</p>
							<p>We are sorry to see you go! Your subscription on %blogname% has been canceled and is only valid until %subscription_expiry%. You will not be charged in the future.</p>',
			            'cancel_email_body_admin'     	   => 
							'<h3>Subscription cancelation</h3>
							<p>An user on your website has canceled their subscription.</p>
							<p>Username: %username%<br>
							Subscription plan: %subscription_name%<br>
							Subscription expiry: %subscription_expiry%</p>',

			            'failed_email_enabled'       	   => '1',
			            'failed_email_enabled_admin' 	   => '0',
			            'failed_email_subject'       	   => '[%blogname%] Your latest payment has failed',
			            'failed_email_subject_admin'       => '[%blogname%] A subscription payment has failed',
			            'failed_email_body'     		   => 
							'<h3>Payment failure</h3>
							<p>Hello %name%,</p>
							<p>Your latest payment for "%subscription_name%" has failed.</p>
							<p>You can go to the <a href="%subscriptions_page_link%">account page</a> in order to try again.</p>',
			            'failed_email_body_admin'     	   => 
							'<h3>Payment failure</h3>
							<p>An user on your website has failed to pay for their subscription.</p>
							<p>Username: %username%<br>
							Subscription plan: %subscription_name%<br>
							Subscription price: %subscription_price%</p>',
			] as $key => $val ) {

				$add = true;
				foreach ( $tds_options as $tds_option ) {
					if ( $tds_option['name'] == $key ) {
						$add = false;
					}
				}

				if ( $add ) {
					$wpdb->insert(
						'tds_options',
						array( 'name'  => $key, 'value' => $val ),
						array( '%s', '%s' )
					);

					if ( '' !== $wpdb->last_error ) {
						throw new Exception( $wpdb->print_error() );
					}
				}

			}

			// get stripe api keys
			$results = $wpdb->get_results("SELECT * FROM tds_payment_stripe LIMIT 1", ARRAY_A );
			if ( null !== $results ) {

				// the stripe payment id
				$tds_stripe_payment_id = $results[0]['id'];

				$is_testing = '';
				if ( !empty( $results[0]['is_sandbox'] ) ) {
					$is_testing = 'sandbox_';
				}

				// the secret api key
				$api_key = $results[0][$is_testing . 'secret_key'];

				if ( !empty( $api_key ) ) {

					require_once TDS_PATH . '/includes/vendor/stripe/init.php';

					try {
						$stripeClient = new \Stripe\StripeClient( $api_key ); // set client api key
						$stripeClient->balance->retrieve(); // try to get the balance
						$valid_secret_key = true; // if no error > valid
					} catch ( Exception $ex ) {
						$valid_secret_key = false; // if error > not valid
					}

					// all good ... try to add the tds stripe webhook endpoint
					if ( $valid_secret_key ) {

						\Stripe\Stripe::setApiKey( $api_key );

						try {
							// create the tds rest webhook endpoint
							$tds_stripe_webhook_endpoint = \Stripe\WebhookEndpoint::create([
								'url' => rest_url("tds_stripe/webhook/" ),
								'enabled_events' => [
									'customer.subscription.created',
									'customer.subscription.deleted',
									'customer.subscription.updated',
									'invoice.upcoming',
									'invoice.created',
									'invoice.updated',
									'invoice.paid',
									'invoice.payment_succeeded',
									'invoice.payment_failed',
									'invoice.finalized',
									'invoice.finalization_failed',
									//'payment_method.attached',
									'setup_intent.succeeded',
								],
							]);
						} catch ( Exception $ex ) {
							$tds_stripe_webhook_endpoint = null;
						}

						// add it to db
						if ( !empty( $tds_stripe_webhook_endpoint ) ) {
							$wpdb->update( 'tds_payment_stripe',
								array(
									'webhook_endpoint' => $tds_stripe_webhook_endpoint->url,
									'webhook_endpoint_secret' => !empty( $tds_stripe_webhook_endpoint->secret ) ? $tds_stripe_webhook_endpoint->secret : ''
								),
								array( 'id' => $tds_stripe_payment_id ),
								array( '%s', '%s' ),
								array( '%d' )
							);
						}

					}

				}

			}
			if ( '' !== $wpdb->last_error ) {
				throw new Exception($wpdb->print_error());
			}

			// check/add billing details table
			$tds_billing_table_query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( 'tds_billing' ) );
			if ( $wpdb->get_var( $tds_billing_table_query ) === 'tds_billing' ) {
				// do nothing ... the billing details table was found
			} else {
				// didn't find it, so try to create it
				$wpdb->query( "CREATE TABLE `tds_billing` (
	                    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	                    `user_id` INT NOT NULL,
	                    `billing_first_name` VARCHAR(50),     
	                    `billing_last_name` VARCHAR(60),
	                    `billing_company_name` VARCHAR(500),
	                    `billing_vat_number` VARCHAR(50), 
	                    `billing_address` VARCHAR(500),
	                    `billing_country` VARCHAR(50),
	                    `billing_city` VARCHAR(50),
	                    `billing_county` VARCHAR(50),
	                    `billing_post_code` VARCHAR(50),
	                    `billing_phone` VARCHAR(50),
	                    `billing_email` VARCHAR(50)
	                );"
				);
			}
			if ( '' !== $wpdb->last_error ) {
				throw new Exception( $wpdb->print_error() );
			}

			tds_util::set_tds_option('version', '1.4');

		} catch ( Exception $ex ) {
			// $ex
			return;
		}
	}

	static function _to_1p4p1 () {
		global $wpdb;

		try {
			$add_publishing_limits_column = true;
			foreach ( $wpdb->get_col( "DESC tds_plans", 0 ) as $column ) {
				if ( $column === 'publishing_limits' ) {
					$add_publishing_limits_column = false;
				}
			}
			if( $add_publishing_limits_column ) {
				$wpdb->query( "ALTER TABLE `tds_plans` ADD `publishing_limits` LONGTEXT AFTER `list`" );
				if ( '' !== $wpdb->last_error ) {
					throw new Exception( $wpdb->print_error() );
				}
			}

			$add_plan_posts_remaining_column = true;
			foreach ( $wpdb->get_col( "DESC tds_subscriptions", 0 ) as $column ) {
				if ( $column === 'plan_posts_remaining' ) {
					$add_plan_posts_remaining_column = false;
				}
			}
			if( $add_plan_posts_remaining_column ) {
				$wpdb->query( "ALTER TABLE `tds_subscriptions` ADD `plan_posts_remaining` LONGTEXT AFTER `coupon_id`" );
				if ( '' !== $wpdb->last_error ) {
					throw new Exception( $wpdb->print_error() );
				}
			}

			$wpdb->query( "ALTER TABLE `tds_subscriptions` MODIFY stripe_invoice_details TEXT;" );
			if ( '' !== $wpdb->last_error ) {
				throw new Exception( $wpdb->print_error() );
			}	
		} catch ( Exception $ex ) {
			// $ex
			return;
		}

	}

}
