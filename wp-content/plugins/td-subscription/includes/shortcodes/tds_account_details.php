<?php

/**
 * Class tds_account_details
 */

class tds_account_details extends td_block {

	public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

		$compiled_css = '';

		/** @noinspection CssInvalidAtRule */
		$raw_css =
            "<style>

                /* @tds_account_details */
                body .tds_account_details {
                    margin-bottom: 0;                    
                }
                body .tds_logout .tds-block-inner {
                    margin: 0 auto;
                    padding: 55px 45px 60px;
                    max-width: 650px;
                    background-color: #fff;
                    text-align: center;
                }
                
            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {
        $res_ctx->load_settings_raw( 'tds_account_details', 1 );
	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        parent::render( $atts );

        $show_notif = $this->get_att('show_notif');

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());

        $buffy = '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js

            $buffy .= '<div class="tds-block-inner td-fix-index">';

                if ( is_user_logged_in() ) {

                    $current_user = wp_get_current_user();
                    $first_name = get_user_meta( $current_user->ID, 'first_name', true );
                    $last_name = get_user_meta( $current_user->ID, 'last_name', true );


                    global $wpdb;
                    $wpdb->suppress_errors = true;

                    $billing_first_name   = '';
                    $billing_last_name    = '';
                    $billing_company_name = '';
                    $billing_vat_number   = '';
                    $billing_address      = '';
                    $billing_country      = '';
                    $billing_city         = '';
                    $billing_county       = '';
                    $billing_post_code    = '';
                    $billing_phone        = '';
                    $billing_email        = '';

                    $billing_details = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM tds_billing WHERE user_id = %s", $current_user->ID) );
                    
                    if( $billing_details !== null && count( $billing_details ) ) {
                        $billing_first_name   = $billing_details[0]->billing_first_name;
                        $billing_last_name    = $billing_details[0]->billing_last_name;
                        $billing_company_name = $billing_details[0]->billing_company_name;
                        $billing_vat_number   = $billing_details[0]->billing_vat_number;
                        $billing_address      = $billing_details[0]->billing_address;
                        $billing_country      = $billing_details[0]->billing_country;
                        $billing_city         = $billing_details[0]->billing_city;
                        $billing_county       = $billing_details[0]->billing_county;
                        $billing_post_code    = $billing_details[0]->billing_post_code;
                        $billing_phone        = $billing_details[0]->billing_phone;
                        $billing_email        = $billing_details[0]->billing_email;
                    }


                    //if (!headers_sent()) {
                    //    session_start();
                    //}

	                if (!headers_sent()) {
		                if (!session_id()) {
			                try {
				                @session_start();
			                } catch (Exception $e) {
				                //***
			                }
		                }
	                }

                    if( $show_notif != '' ) {
                        $buffy .= '<div class="tds-s-notif tds-s-notif-sm tds-s-notif-error">';
                            $buffy .= '<ul class="tds-s-notif-list">';
                                $buffy .= '<li>Sample error message.</li>';
                            $buffy .= '</ul>';
                        $buffy .= '</div>';

                        $buffy .= '<div class="tds-s-notif tds-s-notif-sm tds-s-notif-success">';
                            $buffy .= '<ul class="tds-s-notif-list">';
                                $buffy .= '<li>Sample success message.</li>';
                            $buffy .= '</ul>';
                        $buffy .= '</div>';
                    }

                    if (!empty($_SESSION['tds_errors']) && is_array($_SESSION['tds_errors'])) {
                        $buffy .= '<div class="tds-s-notif tds-s-notif-sm tds-s-notif-error">';
                            $buffy .= '<ul class="tds-s-notif-list">';
                                foreach ($_SESSION['tds_errors'] as $error ) {
                                    $buffy .= '<li>' . $error . '</li>';
                                }
                            $buffy .= '</ul>';
                        $buffy .= '</div>';

                        unset($_SESSION['tds_errors']);

                    } else if (!empty($_SESSION['tds_msg'])) {
                        $buffy .= '<div class="tds-s-notif tds-s-notif-sm tds-s-notif-success">';
                            $buffy .= '<div class="tds-s-notif-descr">' . $_SESSION['tds_msg'] . '</div>';
                        $buffy .= '</div>';

                        unset($_SESSION['tds_msg']);
                    }

                    ob_start();
                    ?>

                    <div class="tds-s-page-sec tds-s-page-acc-details">
                        <div class="tds-s-page-sec-header">
                            <h2 class="tds-spsh-title"><?php echo __td('Account details', TD_THEME_NAME) ?></h2>
                            <div class="tds-spsh-descr"><?php echo __td('Manage your account details.', TD_THEME_NAME) ?></div>
                        </div>

                        <div class="tds-s-page-sec-content">
                            <form action="" method="post" class="tds-s-form tds-s-acc-info-form" enctype="multipart/form-data">
                                <div class="tds-s-form-content">
                                    <div class="tds-s-fc-inner">
                                        <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
                                        <input type="hidden" name="action" value="save_account_details" />

                                        <?php
                                            $mapped_shortcodes = tdc_mapper::get_mapped_shortcodes();
                                            if( defined('TD_CLOUD_LIBRARY') && isset($mapped_shortcodes['tdb_form_file_upload']) ) {
                                                echo do_shortcode( '[tdb_form_file_upload custom_field="td_user_avatars" form_type="user" label_txt="Profile picture"]' );
                                            }
                                        ?>

                                        <div class="tds-account-details-right">
                                            <div>
                                                <div class="tds-s-form-group">
                                                    <label class="tds-s-form-label" for="tds-first-name"><?php echo __td('First name', TD_THEME_NAME) ?> *</label>
                                                    <input class="tds-s-form-input" type="text" id="tds-first-name" name="tds_first_name" value="<?php echo $first_name ?>" required>
                                                </div>
                                                <div class="tds-s-form-group">
                                                    <label class="tds-s-form-label" for="tds-last-name"><?php echo __td('Last name', TD_THEME_NAME) ?> *</label>
                                                    <input class="tds-s-form-input" type="text" id="tds-last-name" name="tds_last_name" value="<?php echo $last_name ?>" required>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tds-s-form-group">
                                                    <label class="tds-s-form-label" for="tds-display-name"><?php echo __td('Display name', TD_THEME_NAME) ?> *</label>
                                                    <input class="tds-s-form-input" type="text" id="tds-display-name" name="tds_display_name" value="<?php echo $current_user->display_name ?>" required>
                                                </div>
                                                <div class="tds-s-form-group">
                                                    <label class="tds-s-form-label" for="tds-email"><?php echo __td('Email address', TD_THEME_NAME) ?> *</label>
                                                    <input class="tds-s-form-input" type="text" id="tds-email" name="tds_email" value="<?php echo $current_user->user_email ?>" required>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tds-s-form-group">
                                                    <label class="tds-s-form-label" for="tds-current-pass"><?php echo __td('Current password', TD_THEME_NAME) ?>
                                                        <span class="tds-s-form-tip"><span class="tds-s-form-tip-txt"><?php echo __td('(leave blank to leave unchanged)', TD_THEME_NAME) ?></span></span></label>
                                                    <input class="tds-s-form-input" type="password" id="tds-current-pass" name="tds_current_pass" value="" autocomplete="off">
                                                </div>

                                                <div class="tds-s-form-group">
                                                    <label class="tds-s-form-label" for="tds-new-pass"><?php echo __td('New password', TD_THEME_NAME) ?>
                                                        <span class="tds-s-form-tip"><span class="tds-s-form-tip-txt"><?php echo __td('(leave blank to leave unchanged)', TD_THEME_NAME) ?></span></span></label>
                                                    <input class="tds-s-form-input" type="password" id="tds-new-pass" name="tds_new_pass" value="" autocomplete="off">
                                                </div>

                                                <div class="tds-s-form-group">
                                                    <label class="tds-s-form-label" for="tds-retype-new-pass"><?php echo __td('Confirm new password', TD_THEME_NAME) ?></label>
                                                    <input class="tds-s-form-input" type="password" id="tds-retype-new-pass" name="tds_retype_new_pass" value="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tds-s-form-footer">
                                    <button class="tds-s-btn" type="submit" name="save_account_details"><?php echo __td('Save changes', TD_THEME_NAME) ?></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tds-s-page-sec tds-s-page-acc-billing">
                        <div class="tds-s-page-sec-header">
                            <h2 class="tds-spsh-title"><?php echo __td('Billing details', TD_THEME_NAME) ?></h2>
                            <div class="tds-spsh-descr"><?php echo __td('Manage your billing details.', TD_THEME_NAME) ?></div>
                        </div>

                        <div class="tds-s-page-sec-content">
                            <form action="" method="post" class="tds-s-form tds-s-acc-billing-form" enctype="multipart/form-data">
                                <div class="tds-s-form-content">
                                    <div class="tds-s-fc-inner">
                                        <?php wp_nonce_field( 'save_account_billing', 'save-account-billing-nonce' ); ?>
                                        <input type="hidden" name="action" value="save_account_billing" />

                                        <div class="tds-s-form-group tds-form-group-billing-first-name">
                                            <label class="tds-s-form-label" for="tds-billing-first-name"><?php echo __td('First name', TD_THEME_NAME) ?> *</label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-first-name" name="tds_billing_first_name" value="<?php echo $billing_first_name ?>" required>
                                        </div>
                                        
                                        <div class="tds-s-form-group tds-form-group-billing-last-name">
                                            <label class="tds-s-form-label" for="tds-billing-last-name"><?php echo __td('Last name', TD_THEME_NAME) ?> *</label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-last-name" name="tds_billing_last_name" value="<?php echo $billing_last_name ?>" required>
                                        </div>
                                        
                                        <div class="tds-s-form-group tds-form-group-billing-company-name">
                                            <label class="tds-s-form-label" for="tds-billing-company-name"><?php echo __td('Company name', TD_THEME_NAME) . ' ' . __td('(optional)', TD_THEME_NAME) ?></label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-company-name" name="tds_billing_company_name" value="<?php echo $billing_company_name ?>">
                                        </div>
                                        
                                        <div class="tds-s-form-group tds-form-group-billing-vat-number">
                                            <label class="tds-s-form-label" for="tds-billing-vat-number"><?php echo __td('VAT number', TD_THEME_NAME) . ' ' . __td('(optional)', TD_THEME_NAME) ?></label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-vat-number" name="tds_billing_vat_number" value="<?php echo $billing_vat_number ?>">
                                        </div>

                                        <div class="tds-s-form-group tds-form-group-billing-address">
                                            <label class="tds-s-form-label" for="tds-billing-address"><?php echo __td('Street address', TD_THEME_NAME) ?> *</label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-address" name="tds_billing_address" value="<?php echo $billing_address ?>" required>
                                        </div>

                                        <div class="tds-s-form-group tds-form-group-billing-country">
                                            <label class="tds-s-form-label" for="tds-billing-country"><?php echo __td('Country/Region', TD_THEME_NAME) ?> *</label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-country" name="tds_billing_country" value="<?php echo $billing_country ?>" required>
                                        </div>

                                        <div class="tds-s-form-group tds-form-group-billing-city">
                                            <label class="tds-s-form-label" for="tds-billing-city"><?php echo __td('Town/City', TD_THEME_NAME) ?> *</label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-city" name="tds_billing_city" value="<?php echo $billing_city ?>" required>
                                        </div>

                                        <div class="tds-s-form-group tds-form-group-billing-county">
                                            <label class="tds-s-form-label" for="tds-billing-county"><?php echo __td('County', TD_THEME_NAME) ?> *</label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-county" name="tds_billing_county" value="<?php echo $billing_county ?>" required>
                                        </div>

                                        <div class="tds-s-form-group tds-form-group-billing-postcode">
                                            <label class="tds-s-form-label" for="tds-billing-post-code"><?php echo __td('Postcode', TD_THEME_NAME) ?> *</label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-post-code" name="tds_billing_post_code" value="<?php echo $billing_post_code ?>" required>
                                        </div>

                                        <div class="tds-s-form-group tds-form-group-billing-phone">
                                            <label class="tds-s-form-label" for="tds-billing-phone"><?php echo __td('Phone', TD_THEME_NAME) ?> *</label>
                                            <input class="tds-s-form-input" type="text" id="tds-billing-phone" name="tds_billing_phone" value="<?php echo $billing_phone ?>" required>
                                        </div>

                                        <div class="tds-s-form-group tds-form-group-billing-email">
                                            <label class="tds-s-form-label" for="tds-billing-email"><?php echo __td('Email', TD_THEME_NAME) ?> *</label>
                                            <input class="tds-s-form-input" type="email" id="tds-billing-email" name="tds_billing_email" value="<?php echo $billing_email ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="tds-s-form-footer">
                                    <button class="tds-s-btn" type="submit" name="save_account_billing"><?php echo __td('Save changes', TD_THEME_NAME) ?></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php
                    $custom_page_id = $this->get_att('custom_page_id');
                    $custom_page_content = '';

                    if( $custom_page_id != '' && get_post_type($custom_page_id) == 'page' ) {
                        $page = get_post($custom_page_id);

                        if ( null !== $page ) {
                            td_global::set_in_element(true);
                            $custom_page_content = $page->post_content;

                            if (is_plugin_active('td-subscription/td-subscription.php') && has_filter('the_content', array(tds_email_locker::instance(), 'lock_content'))) {
                                $has_content_filter = true;
                                remove_filter('the_content', array(tds_email_locker::instance(), 'lock_content'));
                            }

                            $custom_page_content = preg_replace('/\[tdm_block_popup.*?\]/i', '', $custom_page_content);
                            $custom_page_content = apply_filters('the_content', $custom_page_content);
                            $custom_page_content = str_replace(']]>', ']]&gt;', $custom_page_content);

                            // the has_filter check is made for plugins, like bbpress, who think it's okay to remove all filters on 'the_content'
                            if (!has_filter('the_content', 'do_shortcode')) {
                                $custom_page_content = do_shortcode($custom_page_content);
                            }

                            if (!empty($has_content_filter)) {
                                add_filter('the_content', array(tds_email_locker::instance(), 'lock_content'));
                            }

                            td_global::set_in_element(false);
                        }
                    }

                    if( $custom_page_content != '' ) {
                        ?>
                        <div class="tds-s-page-sec tds-s-page-acc-details">
                            <div class="tds-s-page-sec-content tds-s-page-sec-content-custom">
                                <?php echo $custom_page_content ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

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
		$buffy .= '</div>';

		return $buffy;
	}
}
