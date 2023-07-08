<?php

class tds_email_notifications {


    /* ---------
    ---- SEND ADMINS EMAIL NOTIFICATION
    --------- */
    static function send_admin_email_notification( $notif_type, $user_id, $add_tags = array(), $add_tags_replacements = array() ) {

        $enabled_for_admins = self::get_email_enabled($notif_type, 'admins');


        if( $enabled_for_admins ) {
            /* -- Get email template settings -- */
            $email_footer_text = self::get_email_footer_text();

            /* -- Get user email settings -- */
            $admin_emails = self::get_admin_notice_emails();
            $admins_email_subject = self::replace_email_tags(
                self::get_email_subject($notif_type, 'admins'),
                $user_id,
                $add_tags,
                $add_tags_replacements
            );
            $admins_email_body = self::replace_email_tags(
                self::get_email_body($notif_type, 'admins'),
                $user_id,
                $add_tags,
                $add_tags_replacements
            );
            
            /* -- Send the email to the admins -- */
            return td_email::send_mail(
                $admin_emails,
                $admins_email_subject,
                td_email::email_template(
                    $admins_email_subject,
                    $admins_email_body,
                    '',
                    $email_footer_text
                )
            );
        }

        
        return false;

    }




    /* ---------
    ---- SEND USER EMAIL NOTIFICATION
    --------- */
    static function send_user_email_notification( $notif_type, $user_id, $add_tags = array(), $add_tags_replacements = array() ) {

        $enabled_for_user = self::get_email_enabled($notif_type, 'members');
        

        if( $enabled_for_user ) {
            /* -- Get email template settings -- */
            $email_footer_text = self::get_email_footer_text();

            /* -- Get user email settings -- */
            if( strpos( $user_id, '@' ) ) {
                $user_email = $user_id;
                $user_id = 0;
            } else {
                $user_email = self::get_user_email($user_id);
            }
            
            $members_email_subject = self::replace_email_tags(
                self::get_email_subject($notif_type, 'members'),
                $user_id,
                $add_tags,
                $add_tags_replacements
            );
            $member_email_body = self::replace_email_tags(
                self::get_email_body($notif_type, 'members'),
                $user_id,
                $add_tags,
                $add_tags_replacements
            );
            
            /* -- Send the email to the user -- */
            return td_email::send_mail(
                $user_email,
                $members_email_subject,
                td_email::email_template(
                    $members_email_subject,
                    $member_email_body,
                    '',
                    $email_footer_text
                )
            );
        }


        return false;

    }




    /* ---------
    ---- FUNCTION USED TO GET AN USER'S EMAIL
    --------- */
    static function get_user_email( $user_id = 0 ) {

        $user_email = '';

        if( $user_id != 0 ) {
            $user = get_userdata( $user_id );

            if( $user ) {
                $user_email = $user->user_email;
            }
        }

        return $user_email;

    }




    /* ---------
    ---- FUNCTION USED TO GET ADMIN NOTICE EMAILS OPTION
    --------- */
	static function get_admin_notice_emails() {

		$admin_emails = get_bloginfo('admin_email');

		$admin_notice_emails_tds_option = tds_util::get_tds_option('admin_notice_emails');
		if( !is_null( $admin_notice_emails_tds_option ) ) {
			$admin_notice_emails_tds_option = explode(',', $admin_notice_emails_tds_option);

			for( $i = 0; $i < count( $admin_notice_emails_tds_option ); $i++ ) {
				if( $i == 0 ) {
					$admin_emails = $admin_notice_emails_tds_option[$i];
				} else {
					$admin_emails .= ',' . $admin_notice_emails_tds_option[$i];
				}
			}
		}

		return $admin_emails;

	}




    /* ---------
    ---- FUNCTION USED TO GET EMAIL FOOTER TEXT OPTION
    --------- */
	static function get_email_footer_text() {

		$email_footer_text_tds_option = tds_util::get_tds_option('email_footer_text');

		if( !is_null( $email_footer_text_tds_option ) ) {
			return $email_footer_text_tds_option;
		}

		return '';

	}




    /* ---------
    ---- FUNCTION USED TO GET EMAIL ENABLED OPTION
    --------- */
    static function get_email_enabled( $notif_type, $group ) {

		$enabled_tds_option = tds_util::get_tds_option($notif_type . '_email_enabled' . ( $group == 'admins' ? '_admin' : '' ));

		if( !is_null( $enabled_tds_option ) ) {
			if( $enabled_tds_option == '0' ) {
				return false;
			}
		}

		return true;

	}




    /* ---------
    ---- FUNCTION USED TO GET EMAIL SUBJECT OPTION
    --------- */
	static function get_email_subject( $notif_type, $group ) {

		$subject_tds_option =  tds_util::get_tds_option($notif_type . '_email_subject' . ( $group == 'admins' ? '_admin' : '' ));

		if( !is_null( $subject_tds_option ) ) {
			return $subject_tds_option;
		}

		return '';

	}




    /* ---------
    ---- FUNCTION USED TO GET EMAIL BODY OPTION
    --------- */
	static function get_email_body( $notif_type, $group ) {

		$body_tds_option =  tds_util::get_tds_option($notif_type . '_email_body' . ( $group == 'admins' ? '_admin' : '' ));

		if( !is_null( $body_tds_option ) ) {
			return $body_tds_option;
		}

		return '';

	}




    /* ---------
    ---- FUNCTION USED TO REPLACE PREDEFINED & ADDITIONAL TAGS IN A STRING
    --------- */
    static function replace_email_tags( $string, $user_id = 0, $add_tags = array(), $add_tags_replacements = array() ) {

		global $wpdb;


		/* -- User info -- */
		$user_full_name = '';
		$user_first_name = '';
		$user_last_name = '';
		$user_login = '';
		$user_email = '';

		if( $user_id != 0 ) {
			$user = get_userdata( $user_id );

            if( $user ) {
                $user_first_name = get_user_meta( $user_id, 'first_name', true );
                $user_last_name = get_user_meta( $user_id, 'last_name', true );
                $user_login = $user->user_login;
                $user_email = $user->user_email;

                if( empty( $user_login ) ) {
                    $user_login = $user_email;
                }

                if( !empty( $user_first_name ) || !empty( $user_last_name ) ) {
                    $user_full_name = $user_first_name;

                    if( !empty( $user_first_name ) ) {
                        $user_full_name .= ' ';
                    }

                    $user_full_name .= $user_last_name;
                }

                if( empty( $user_full_name ) ) {
                    $user_full_name = $user_login;
                }
            }
		}


		/* -- Blog info -- */
		$blogname = wp_specialchars_decode( get_bloginfo('name'), ENT_QUOTES );


		/* -- My account pges links -- */
		$dashboard_permalink = '';
		$account_details_permalink = '';
		$subscriptions_permalink = '';

		$my_account_page_id = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'my_account_page_id'");
        if ( $my_account_page_id ) {
            $dashboard_permalink = get_permalink( $my_account_page_id );
			$account_details_permalink = add_query_arg('account_details', '', $dashboard_permalink);
			$subscriptions_permalink = add_query_arg('subscriptions', '', $dashboard_permalink);
        }


		/* -- Fill in the predifined tags -- */
		$predefined_tags = array('%name%', '%firstname%', '%lastname%', '%username%', '%useremail%', '%userid%', '%blogname%', '%dashboard_link%', '%account_details_link%', '%subscriptions_link%');
		$predefined_tags_replacements = array($user_full_name, $user_first_name, $user_last_name, $user_login, $user_email, $user_id, $blogname, $dashboard_permalink, $account_details_permalink, $subscriptions_permalink);


		/* -- Merge the predefined tags with the additional ones -- */
		if( count( $add_tags ) == count( $add_tags_replacements ) ) {
			$predefined_tags = array_merge( $predefined_tags, $add_tags );
			$predefined_tags_replacements = array_merge( $predefined_tags_replacements, $add_tags_replacements );
		}


		/* -- Replace the predefined tags in the string and return it -- */
		$string = str_replace( $predefined_tags, $predefined_tags_replacements, $string );

		return $string;

	}

}