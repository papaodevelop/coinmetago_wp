<?php
/**
 * tds form submission class
 *
 */

defined( 'ABSPATH' ) || exit;

class tds_form_submission {

	private static $errors = array();

	private static $result = array();

	private static $subscribed_email = '';

	public static function init() {
		add_action( 'init', array( __CLASS__, 'process_submission' ) );
	}

	public static function process_submission() {

		// check if already subscribed to list
        if( isset( $_POST['subscribed'] ) ) {

            // lists ids
            $lists_ids = $_POST['list'] ?? '';
            $lists_ids_array = explode(',', $lists_ids);

            // rdr url data
            $rdr_url = $_POST['rdr_url'] ?? '';

            // remove the lists from the cookies
            $removed_all_lists = self::remove_lists_from_cookies( $lists_ids_array );

            // set the result
            self::$result = array('unsubscribed' => $lists_ids_array, 'removed_all' => $removed_all_lists);

            // maybe redirect
            if ( !empty( $rdr_url ) ) {
                wp_redirect( $rdr_url );
                exit();
            }

        } else {

            // check email is set
            if ( isset( $_POST['email'] ) && !empty( $_POST['email'] ) ) {

                // email/list & rdr url data
                $email = sanitize_email( wp_unslash( $_POST['email'] ) );
                $list = isset( $_POST['list'] ) ? (int) $_POST['list'] : '';
                $opt_in = isset( $_POST['double_opt_in'] ) ? $_POST['double_opt_in'] : '';
                $locker = isset( $_POST['locker'] ) ? (int) $_POST['locker'] : '';
                $rdr_url = $_POST['rdr_url'] ?? '';

                // custom fields data
                $custom_fields_data = array();
                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( !empty( $_POST["tds_locker_cf_{$i}"] ) ) {
                        $custom_fields_data["tds_locker_cf_{$i}"] = $_POST["tds_locker_cf_{$i}"];
                    }
                }

                // check email is valid
                if ( is_email( $email ) ) {

                    $new_lead_data = array(
                        'tds_email' => $email,
                        'tds_list_id' => $list,
                        'tds_locker_id' => $locker,
                        'tds_custom_fields' => $custom_fields_data
                    );

                    // is double opt-in
                    if ( $opt_in === 'yes' ) {
                        //set no, waiting confirmation
                        $new_lead_data['tds_validate_email'] = 'no';
                        //send the email
                        td_util::td_new_subscriber_double_opt_in($email, 'user');
                    }

                    // store(add) lead email
                    $tds_leads_api_response = tds_leads_api::add( $new_lead_data );

                    // api error
                    if ( self::is_api_error( $tds_leads_api_response ) ) {

                        // api error id
                        $api_error_id = $tds_leads_api_response['id'];

                        switch ( $api_error_id ) {
                            // if email is found in list just update the cookie
                            // @note the email validation is done in tds_leads_api::add
                            case 'email_found_in_list':

                                // set results response
                                // @note the new_lead_data is needed to set the tds_leads cookie
                                self::$result['new_lead_data'] = $new_lead_data;

                                // set cookies
                                self::set_cookies();

                                // maybe redirect
                                if ( !empty( $rdr_url ) ) {
                                    wp_redirect( $rdr_url );
                                    exit();
                                }

                                break;
                            default:
                                // set api error response
                                //if ( is_user_logged_in() && current_user_can('switch_themes') ) {
                                self::$errors['tds_leads_api_error'] = '<pre style="background-color: transparent; text-align: left; margin: 0 auto; max-width: 60%;"><strong>tds_leads_api_error:</strong><br>' . print_r( $tds_leads_api_response, true ) . '</pre>';
                                //}
                                break;
                        }

                        // success
                    } else {

                        // set results resp
                        self::$result = $tds_leads_api_response;
                        self::$result['new_lead_data'] = $new_lead_data;

                        self::$subscribed_email = $email;


                        // set cookies
                        self::set_cookies();

                        // maybe redirect
                        if ( !empty( $rdr_url ) ) {
                            wp_redirect( $rdr_url );
                            exit();
                        }

                    }
                    // invalid email error response
                } else {
                    self::$errors['email_not_valid'] = 'Please fill in a valid email.';
                }

            } else {

                // no email set error response
                self::$errors['email_not_set'] = 'Please fill in an email address.';

            }

        }


	}

	public static function is_api_error($response) {
		return isset( $response['type'] ) && $response['type'] === 'error';
	}

	public static function has_errors() {
		if ( !empty( self::$errors ) ) {
			return true;
		}
		return false;
	}

	public static function get_errors() {
		return self::$errors;
	}

	public static function get_result() {
		return self::$result;
	}

	public static function set_cookies() {

		// do not set the cookies if the headers have been sent for some reasons ..otherwise a user can see warnings
		if ( headers_sent() )
			return;

		$new_cookie_val = array();
		$result = self::get_result();
		$new_lead_list_id = $result['new_lead_data']['tds_list_id'];

		if ( !isset( $_COOKIE['tds_leads'] ) ) {
			$new_cookie_val[] = $new_lead_list_id;
		} else {
			//$old_cookie_val = maybe_unserialize( $_COOKIE['tds_leads'] );
			$old_cookie_val = $_COOKIE['tds_leads'];
			$new_cookie_val = array_merge( array( $new_lead_list_id ), explode( ',', $old_cookie_val ) );
		}

		if( !empty( $new_cookie_val ) ) {
			setcookie(
				'tds_leads',
				//serialize( $new_cookie_val ),
				implode( ',', $new_cookie_val ),
				time() + 3600 * 24 * 5000,
				COOKIEPATH,
				COOKIE_DOMAIN
			);
		}


		$cookie_email = 'tds_leads_email';
		$email = self::$subscribed_email;

		if ( !isset( $_COOKIE[$cookie_email] ) ) {
			$new_cookie_emails[] = $email;
		} else {
			$old_cookie_emails = $_COOKIE[$cookie_email];
			$new_cookie_emails = array_merge( array( $email ), explode( ',', $old_cookie_emails ) );
		}


		if (!empty($new_cookie_emails)) {
			setcookie(
				$cookie_email,
				implode( ',', $new_cookie_emails ),
				time() + 3600 * 24 * 5000,
				COOKIEPATH,
				COOKIE_DOMAIN
			);
		}
	}

    public static function remove_lists_from_cookies($lists_ids) {

        // do not set the cookies if the headers have been sent for some reasons ..otherwise a user can see warnings
        if ( headers_sent() )
            return;

        $removed_all_lists = false;

        if( isset( $_COOKIE['tds_leads'] ) ) {
            $cookie_leads = $_COOKIE['tds_leads'];

            $new_cookie_val = explode( ',', $cookie_leads );

            foreach( $lists_ids as $list_id ) {
                if( in_array( $list_id, $new_cookie_val) ) {
                    unset( $new_cookie_val[array_search( $list_id, $new_cookie_val )] );
                }
            }

            if( empty( $new_cookie_val ) ) {
                $removed_all_lists = true;
            }

            setcookie(
                'tds_leads',
                implode( ',', $new_cookie_val ),
                time() + 3600 * 24 * 5000,
                COOKIEPATH,
                COOKIE_DOMAIN
            );
        }


        if( !empty( $_COOKIE['tds_leads_email'] ) ) {
	        $cookie_leads_email = explode( ',', $_COOKIE[ 'tds_leads_email' ] );

	        foreach( $cookie_leads_email as $email ) {
	        	tds_leads_api::remove_email($email);
	        }

	        setcookie(
                'tds_leads_email',
                null,
                -1,
                COOKIEPATH,
                COOKIE_DOMAIN
            );
        }

        return $removed_all_lists;

    }

}

tds_form_submission::init();
