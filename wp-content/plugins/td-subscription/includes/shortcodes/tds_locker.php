<?php

/**
 * Class tds_locker
 */

class tds_locker extends td_block {

	public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

		$compiled_css = '';

		/** @noinspection CssInvalidAtRule */
		$raw_css =
            "<style>

                /* @tds_locker */
                body .tds_locker {
                    font-family: Verdana, BlinkMacSystemFont, -apple-system, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                }
                body .tds_locker .tds-block-inner {
                    margin: 0 auto;
                    padding: 55px 45px 60px;
                    max-width: 650px;
                    background-color: #fff;
                    text-align: center;
                }
                body .tds_locker .tds-locker-title {
                    margin-top: 0;
                    margin-bottom: 26px;
                    font-family: 'Roboto', sans-serif;
                    font-size: 24px;
                    line-height: 1.2; 
                    font-weight: 700; 
                }
                body .tds_locker .tds-info:not(:empty) {
                    margin-bottom: 12px; 
                }
                body .tds_locker .tds-messages {
                    padding: 8px 12px;
                    font-size: 12px;
                    line-height: 1.2;
                    color: #fff;
                    border-radius: 3px;
                    transition: opacity .2s ease-in-out;
                }
                body .tds_locker .tds-messages:not(:last-child) {
                    margin-bottom: .4em;
                }
                body .tds_locker .tds-messages-hiding {
                    opacity: 0;
                }
                body .tds_locker .tds-messages-error {
                    background-color: #ec4d4d;
                }
                body .tds_locker .tds-messages-success {
                    background-color: #6bc16f;
                }
                body .tds_locker .tds-message:not(:last-child) {
                    margin-bottom: .4em;
                }
                body .tds_locker .tds-under-title-msg {
                    font-size: 12px;
                    line-height: 1.2;
                    color: #444;
                }
                body .tds_locker .tds-under-title-msg:not(.tds-under-title-msg-no-space) {
                    margin-bottom: 20px;
                }
                body .tds_locker .tds-email-bar {
                    display: flex;
                    flex-direction: column;
                    width: 60%;
                    margin: 0 auto;
                }
                @media (max-width: 1018px) {
                    body .tds_locker .tds-email-bar {
                        width: 100%;
                    }
                }
                body .tds_locker .tds-input-wrap {
                    margin-bottom: 12px;
                }
                body .tds_locker .tds-input-wrap .tds-input:not(:first-child) {
                    margin-top: 12px;
                }
                body .tds_locker .tds-input {
                    height: 100%;
                    padding: 12px 15px;
                    line-height: 1;
                }
                body .tds_locker .tds-submit-btn {
                    -webkit-appearance: none;
                    display: flex;
                    align-items: center;
                    justify-content: center; 
                    padding: 15px;
                    background-color: #4db2ec;
                    font-size: 13px;
                    line-height: 1;
                    color: #fff;
                    border-width: 0;
                    border-style: solid;
                    border-color: #000;
                    -webkit-transition: all 0.3s ease;
                    transition: all 0.3s ease;
                    outline: none;
                }
                body .tds_locker .tds-submit-btn:hover {
                    background-color: #222;
                }
                body .tds_locker .tds-after-btn-text {
                    margin-top: 12px;
                    font-size: 11px;
                    line-height: 1.2;
                    color: #888;
                }
                body .tds_locker .tds-checkbox {
                    margin-top: 24px;
                }
                body .tds_locker .tds-checkbox input {
                    display: none;
                }
                body .tds_locker .tds-checkbox label {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 0;
                    cursor: pointer;
                }
                body .tds_locker .tds-check {
                    position: relative;
                    width: 1em;
                    height: 1em;
                    margin-right: 8px;
                    background-color: #fff;
                    cursor: pointer;
                    border: 1px solid #ccc;
                    transition: all .3s ease-in-out;
                    flex-shrink: 0;
                }
                body .tds_locker .tds-check:after {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 0.5em;
                    height: 0.5em;
                    background-color: #4db2ec;
                    opacity: 0;
                    transition: all .3s ease;
                    pointer-events: none;
                }
                body .tds_locker .tds-checkbox input:checked + label .tds-check:after {
                    opacity: 1;
                }
                body .tds_locker .tds-check-title {
                    margin-top: 1px;
                    user-select: none;
                    -webkit-user-select: none;
                    font-size: 11px;
                    text-align: left;
                    color: #444;
                    line-height: 1.2;
                }
                body .tds_locker .tds-check-title a {
                    text-decoration: none;
                    color: #4db2ec;
                }
                body .tds_locker .tds-check-title a:hover {
                    color: #222;
                }
                .td-post-content .tds-locked-content,
                .tdb_single_content .tds-locked-content,
                .page .tds-locked-content {
                  display: none;
                }
                
                /* @all_border_size */
                html body .$unique_block_class .tds-block-inner {
                    border: @all_border_size solid @all_border_color;
                }
                /* @all_shadow_size */
                html body .$unique_block_class .tds-block-inner {
                    box-shadow: 0 0 @all_shadow_size @all_shadow_color;
                }
                
                /* @bg_color */
                html body .$unique_block_class .tds-block-inner {
                    background-color: @bg_color;
                }
                
                /* @title_color */
                html body .$unique_block_class .tds-locker-title {
                    color: @title_color !important;
                } 
                /* @message_color */
                html body .$unique_block_class .tds-under-title-msg {
                    color: @message_color !important;
                }
                
                /* @input_color */
                html body .$unique_block_class .tds-input,
                html body .$unique_block_class .tds-input::placeholder {
                    color: @input_color;
                } 
                /* @input_color_f */
                html body .$unique_block_class .tds-input:focus {
                    color: @input_color_f;
                }
                /* @input_bg_color */
                html body .$unique_block_class .tds-input {
                    background-color: @input_bg_color;
                }
                /* @input_bg_color_f */
                html body .$unique_block_class .tds-input:focus {
                    background-color: @input_bg_color_f;
                }
                /* @input_border_color */
                html body .$unique_block_class .tds-input {
                    border-color: @input_border_color;
                }
                /* @input_border_color_f */
                html body .$unique_block_class .tds-input:focus {
                    border-color: @input_border_color_f;
                }

                /* @btn_color */
                html body .$unique_block_class .tds-submit-btn {
                    color: @btn_color;
                }
                /* @btn_color_h */
                html body .$unique_block_class .tds-submit-btn:hover {
                    color: @btn_color_h;
                }
                /* @btn_bg_color */
                html body .$unique_block_class .tds-submit-btn {
                    background-color: @btn_bg_color;
                }
                /* @btn_bg_color_h */
                html body .$unique_block_class .tds-submit-btn:hover {
                    background-color: @btn_bg_color_h;
                }
                
                /* @after_btn_text_color */
                html body .$unique_block_class .tds-after-btn-text {
                    color: @after_btn_text_color;
                }
                
                /* @tds_pp_checked_color */
                html body .$unique_block_class .tds-check:after {
                    background-color: @tds_pp_checked_color;
                }
                /* @tds_pp_check_bg */
                html body .$unique_block_class .tds-check {
                    background-color: @tds_pp_check_bg;
                }
                /* @tds_pp_check_bg_f */
                html body .$unique_block_class .tds-checkbox input:checked + label .tds-check {
                    background-color: @tds_pp_check_bg_f;
                }
                /* @tds_pp_check_border_color */
                html body .$unique_block_class .tds-check {
                    border-color: @tds_pp_check_border_color;
                }
                /* @tds_pp_check_border_color_f */
                html body .$unique_block_class .tds-checkbox input:checked + label .tds-check {
                    border-color: @tds_pp_check_border_color_f;
                }
                
                /* @tds_pp_msg_color */
                html body .$unique_block_class .tds-check-title {
                    color: @tds_pp_msg_color;
                }
                /* @tds_pp_msg_links_color */
                html body .$unique_block_class .tds-check-title a {
                    color: @tds_pp_msg_links_color;
                }
                /* @tds_pp_msg_links_color_h */
                html body .$unique_block_class .tds-check-title a:hover {
                    color: @tds_pp_msg_links_color_h;
                }
                
                
                
                /* @tds_general */
                html body .$unique_block_class,
                html body .$unique_block_class * {
                    @tds_general
                }
                /* @tds_title */
                html body .$unique_block_class .tds-locker-title {
                    @tds_title
                }  
                /* @tds_message */
                html body .$unique_block_class .tds-under-title-msg {
                    @tds_message
                }
                /* @tds_input */
                html body .$unique_block_class .tds-input {
                    @tds_input
                }
                /* @tds_submit_btn_text */
                html body .$unique_block_class .tds-submit-btn {
                    @tds_submit_btn_text
                }
                /* @tds_after_btn_text */
                html body .$unique_block_class .tds-after-btn-text {
                    @tds_after_btn_text
                }
                /* @tds_pp_msg */
                html body .$unique_block_class .tds-check-title {
                    @tds_pp_msg
                }

            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'tds_locker', 1 );



        /*-- LAYOUT -- */
        // border size
        $all_border_size = $res_ctx->get_shortcode_att('all_tds_border');
        $res_ctx->load_settings_raw( 'all_border_size', $all_border_size );
        if( $all_border_size != '' && is_numeric( $all_border_size ) ) {
            $res_ctx->load_settings_raw( 'all_border_size', $all_border_size . 'px' );
        }


        // shadow size
        $all_shadow_size = $res_ctx->get_shortcode_att('all_tds_shadow');
        $res_ctx->load_settings_raw( 'all_shadow_size', $all_shadow_size );
        if( $all_shadow_size != '' && is_numeric( $all_shadow_size ) ) {
            $res_ctx->load_settings_raw( 'all_shadow_size', $all_shadow_size . 'px' );
        }



		/*-- COLORS -- */
        $res_ctx->load_settings_raw( 'bg_color', $res_ctx->get_shortcode_att('tds_bg_color') );
        $all_border_color = $res_ctx->get_shortcode_att('all_tds_border_color');
        $res_ctx->load_settings_raw( 'all_border_color', '#000' );
        if( $all_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_border_color', $all_border_color );
        }
        $all_shadow_color = $res_ctx->get_shortcode_att('all_tds_shadow_color');
        $res_ctx->load_settings_raw( 'all_shadow_color', '#000' );
        if( $all_shadow_color != '' ) {
            $res_ctx->load_settings_raw( 'all_shadow_color', $all_shadow_color );
        }

		$res_ctx->load_settings_raw( 'title_color', $res_ctx->get_shortcode_att('tds_title_color') );
		$res_ctx->load_settings_raw( 'message_color', $res_ctx->get_shortcode_att('tds_message_color') );

        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('tds_input_color') );
        $res_ctx->load_settings_raw( 'input_color_f', $res_ctx->get_shortcode_att('tds_input_color_f') );
        $res_ctx->load_settings_raw( 'input_bg_color', $res_ctx->get_shortcode_att('tds_input_bg_color') );
        $res_ctx->load_settings_raw( 'input_bg_color_f', $res_ctx->get_shortcode_att('tds_input_bg_color_f') );
        $res_ctx->load_settings_raw( 'input_border_color', $res_ctx->get_shortcode_att('tds_input_border_color') );
        $res_ctx->load_settings_raw( 'input_border_color_f', $res_ctx->get_shortcode_att('tds_input_border_color_f') );

        $res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('tds_submit_btn_text_color') );
        $res_ctx->load_settings_raw( 'btn_color_h', $res_ctx->get_shortcode_att('tds_submit_btn_text_color_h') );
		$res_ctx->load_settings_raw( 'btn_bg_color', $res_ctx->get_shortcode_att('tds_submit_btn_bg_color') );
        $res_ctx->load_settings_raw( 'btn_bg_color_h', $res_ctx->get_shortcode_att('tds_submit_btn_bg_color_h') );

        $res_ctx->load_settings_raw( 'after_btn_text_color', $res_ctx->get_shortcode_att('tds_after_btn_text_color') );

        $res_ctx->load_settings_raw( 'tds_pp_checked_color', $res_ctx->get_shortcode_att('tds_pp_checked_color') );
        $res_ctx->load_settings_raw( 'tds_pp_check_bg', $res_ctx->get_shortcode_att('tds_pp_check_bg') );
        $res_ctx->load_settings_raw( 'tds_pp_check_bg_f', $res_ctx->get_shortcode_att('tds_pp_check_bg_f') );
        $res_ctx->load_settings_raw( 'tds_pp_check_border_color', $res_ctx->get_shortcode_att('tds_pp_check_border_color') );
        $res_ctx->load_settings_raw( 'tds_pp_check_border_color_f', $res_ctx->get_shortcode_att('tds_pp_check_border_color_f') );

        $res_ctx->load_settings_raw( 'tds_pp_msg_color', $res_ctx->get_shortcode_att('tds_pp_msg_color') );
        $res_ctx->load_settings_raw( 'tds_pp_msg_links_color', $res_ctx->get_shortcode_att('tds_pp_msg_links_color') );
        $res_ctx->load_settings_raw( 'tds_pp_msg_links_color_h', $res_ctx->get_shortcode_att('tds_pp_msg_links_color_h') );



		/*-- FONTS -- */
        $res_ctx->load_font_settings( 'tds_general' );
		$res_ctx->load_font_settings( 'tds_title' );
        $res_ctx->load_font_settings( 'tds_message' );
        $res_ctx->load_font_settings( 'tds_input' );
        $res_ctx->load_font_settings( 'tds_submit_btn_text' );
        $res_ctx->load_font_settings( 'tds_after_btn_text' );
        $res_ctx->load_font_settings( 'tds_pp_msg' );

	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        //echo '<pre><span style="font-weight: bold; color: orangered;">block atts:</span>';
        //echo PHP_EOL;
        //print_r($atts);
        //echo '</pre>';
        //return;

        // don't render on AMP
        if ( td_util::is_amp() ) {
            return '';
        }

		parent::render( $atts );

        $tds_payable = $this->get_att('tds_payable' );

		// flag used to decode b64 encoded shortcode atts
		$b64_decode = ! isset( $atts['b64_decode'] ) || $this->get_att( 'b64_decode' );

		/* -- title -- */
		// text
		$title_text = $this->get_att('tds_title' );

		/* -- message -- */
		// text
		$locker_message = $this->get_att('tds_message' );

		/* -- input -- */
		$input_placeholder = $this->get_att('tds_input_placeholder' );

		/* -- button -- */
		// text
		$btn_text = $this->get_att('tds_submit_btn_text' );

		// after btn text
		$after_btn_text = $this->get_att('tds_after_btn_text' );

		/* -- privacy policy -- */
		// message
        if ( $b64_decode ) {
	        $pp_msg = rawurldecode( base64_decode( strip_tags( $this->get_att('tds_pp_msg' ) ) ) );
        } else {
	        $pp_msg = $this->get_att('tds_pp_msg' );
        }
		$pp_msg = td_util::parse_footer_texts($pp_msg);

        $tds_leads_list = $this->get_att('tds_leads_list');

		/* -- form submission msg -- */
		$tds_form_submission_message = '';

		// check if form was submitted to update $tds_form_submission_message
		if ( td_subscription::instance()->is_tds_form_submit() ) {

			if( tds_form_submission::has_errors() ) {

				$tds_form_submission_errors = tds_form_submission::get_errors();

				$tds_form_submission_message .= '<div class="tds-messages tds-messages-error">';
                    foreach( $tds_form_submission_errors as $err_id => $err_msg ) {
                        $tds_form_submission_message .= '<div class="tds-message">' . __td( $err_msg ) . '</div>';
                    }
				$tds_form_submission_message .= '</div>';

			} else {

                // get the form submit result
                $tds_form_submission_results = tds_form_submission::get_result();

                // check to see if the form submit is a result of subscribing or unsubscribing this mailing list
                if( isset( $tds_form_submission_results['new_lead_data'] ) ) {
                    // if the form submit is a result of subscribing and this is the mailing list
                    // that has been subscribed to, then set the flag to true and display a success message
                    if( $tds_form_submission_results['new_lead_data']['tds_list_id'] == $tds_leads_list ) {
                        $tds_form_submission_message .= '<div class="tds-messages tds-messages-success">';
                            $tds_form_submission_message .= '<div class="tds-message">' . __td( 'Successfully subscribed!' ) . '</div>';
                        $tds_form_submission_message .= '</div>';
                    }
                } else if( isset( $tds_form_submission_results['unsubscribed'] ) ) {
                    // if the form submit is a result of unsubscribing and this is the mailing list
                    // that has been unsubscribed from, then set the flag to false and display a success message
                    if( in_array( $tds_leads_list, $tds_form_submission_results['unsubscribed'] ) ) {

                        $tds_form_submission_message .= '<div class="tds-messages tds-messages-success">';
                            $tds_form_submission_message .= '<div class="tds-message">' . __td( 'Successfully unsubscribed!' ) . '</div>';
                        $tds_form_submission_message .= '</div>';
                    }
                }

			}

		}

		/* -- locker id -- */
		$tds_locker_id = !empty( $atts['tds_locker_id'] ) ? $this->get_att('tds_locker_id') : '';

		/* -- locker leads list -- */
		$tds_leads_list = !empty( $atts['tds_leads_list'] ) ? $this->get_att('tds_leads_list') : '';

		/* -- redirect url -- */
		$tds_successful_submit_rdr_url = !empty( $atts['tds_successful_submit_rdr_url'] ) ?  $this->get_att('tds_successful_submit_rdr_url') : '';

		/* -- custom fields -- */
		$tds_locker_cf = array();
		for ( $i = 1; $i <= 3; $i++ ) {
			if ( isset( $atts["tds_locker_cf_{$i}_state"] ) && !empty( $atts["tds_locker_cf_{$i}_state"] ) ) {
				$tds_locker_cf["tds_locker_cf_{$i}"] = array(
					'name' => $atts["tds_locker_cf_{$i}_name"] ?? 'Custom field ' . $i,
					'req' => isset( $atts["tds_locker_cf_{$i}_req"] )
				);
			}
		}

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());

		$buffy = '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js

            // js render
            ob_start();
            ?>
            <script>
                jQuery().ready(function () {
                    var tdsLeadsItem = new tdsLeads.item();

                    // block unique ID
                    tdsLeadsItem.blockUid = '<?php echo $this->block_uid; ?>';
                    tdsLeadsItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');

	                <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                        tdsLeadsItem.inComposer = true;
	                <?php } ?>

	                <?php if ( td_subscription::instance()->is_tds_form_submit() ) { ?>
                        tdsLeadsItem.isSubmit = true;

                        <?php if ( tds_form_submission::has_errors() ) { ?>
                            tdsLeadsItem.submitHasErrors = true;
                        <?php } ?>

                        <?php if ( !( tdc_state::is_live_editor_ajax() && tdc_state::is_live_editor_iframe() ) ) { ?>
                            var errorMessages = jQuery('.<?php echo $this->block_uid ?> .tds-messages');

                            if( errorMessages.length ) {
                                setTimeout(function () {
                                    errorMessages.addClass('tds-messages-hiding');

                                    setTimeout(function () {
                                        errorMessages.remove();
                                    }, 300);
                                }, 3000);
                            }
                        <?php } ?>
	                <?php } ?>

                    // info/error messages
                    tdsLeadsItem.messages = <?php echo json_encode( array(
                            'ack_require' => __td( 'Acknowledgment is required!' ),
                            'captcha_user_score' => __td( 'CAPTCHA user score failed. Please contact us!' ),
                            'captcha_failed' => __td( 'CAPTCHA verification failed!' )
                    ) ); ?>;

                    tdsLeads.addItem( tdsLeadsItem );
                });
            </script>
            <?php
            td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

            $tds_locker_id = '';
            $show_captcha = td_util::get_option('tds_captcha');
            $captcha_site_key = td_util::get_option('tds_captcha_site_key');
            $hide_fields = false;

            $locker_buffy = '';
            if ( !empty( $tds_payable ) ) {
                $tds_locker_id = tds_email_locker::instance()->get_locker_id();

                if ( empty( $tds_locker_id ) ) {
                    global $post;
                    $tds_locker_id = !empty( $post->ID ) ? $post->ID : false;

                    if ( empty( $tds_locker_id ) ) {
                        $url = wp_get_referer();

                        $post_id = '';

                        if ( empty( $post_id ) ) {
                            $query = parse_url( $url, PHP_URL_QUERY );
                            $args = [];
                            parse_str( $query, $args );
                            if ( !empty( $args['post'] ) && is_numeric( $args['post'] ) && isset( $args['action'] ) && 'edit' === $args ['action'] ) {
                                if ( $id = intval( $args['post'] ) ) {
                                    $tds_locker_id = $id;
                                }
                            }
                        }
                    }
                }

                $tds_locker_types = get_post_meta( $tds_locker_id, 'tds_locker_types', true );

                if ( !empty( $tds_locker_types['tds_paid_subs_page_id'] ) ) {
                    $ref_url = base64_encode(( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
                    $url = 'data-url="' . esc_url( add_query_arg( 'ref_url', $ref_url, get_permalink( $tds_locker_types['tds_paid_subs_page_id'] ) ) ) . '"';
                }

                if ( !empty( $url ) ) {

                    if ( is_user_logged_in() ) {
	                    $result = tds_util::get_subscriptions( get_current_user_id(), -1 );
	                    if ( !empty( $result ) && !empty( $result['subscriptions'] ) ) {

		                    $subscriptions = $result['subscriptions'];
		                    $msg = '';

                            //echo '<pre style="white-space: pre-wrap">';
		                    //print_r( $subscriptions );
                            //echo '</pre>';

		                    foreach ( $subscriptions as $subscription ) {

			                    $valid_plan = false;

			                    // check plan
			                    if ( !empty( $tds_locker_types['tds_paid_subs_plan_ids'] ) && is_array( $tds_locker_types['tds_paid_subs_plan_ids'] ) && in_array( $subscription['plan_id'], $tds_locker_types['tds_paid_subs_plan_ids'] ) ) {
				                    $valid_plan = true;
			                    }

			                    // check subscription status
			                    if ( $valid_plan ) {

				                    if ( in_array( $subscription['status'], [ 'free', 'active', 'trial' ] ) ) {
					                    return '';
				                    } else if ( 'waiting_payment' === $subscription['status'] ) {
					                    $msg = '<div class="tds-under-title-msg">' . __td( 'Unpaid subscription.' ) . '</div>';

					                    global $wpdb;
					                    $my_account_page_id = $wpdb->get_var( "SELECT value FROM tds_options WHERE name = 'my_account_page_id'" );

                                        if ( class_exists('SitePress') ) {
                                            $translated_my_account_page_id = apply_filters('wpml_object_id', $my_account_page_id, 'page');
                                            if ( !is_null($translated_my_account_page_id) ) {
                                                $my_account_page_id = $translated_my_account_page_id;
                                            }
                                        }

					                    if ( false !== $my_account_page_id ) {
						                    $my_account_permalink = get_permalink( $my_account_page_id );
						                    if ( false !== $my_account_permalink ) {
							                    $msg .= '<a class="tds-submit-btn" href="' . esc_url( add_query_arg( 'subscriptions', '', $my_account_permalink ) ) . '">' . __td( 'Complete payment' ) . '</a>';
						                    }
					                    }

				                    } else if ( 'blocked' === $subscription['status'] ) {
					                    $msg = '<div class="tds-under-title-msg tds-under-title-msg-no-space">' . __td( 'Locked subscription.' ) . '</div>';
				                    } else if ( in_array( $subscription['status'], [ 'closed_not_paid', 'closed' ] ) ) {
                                        // ignore unpaid and closed subscriptions
                                    } else {
                                        // show invalid subscription msg for subscriptions with invalid status
					                    $msg = '<div class="tds-under-title-msg tds-under-title-msg-no-space">' . __td( 'Invalid subscription.' ) . '</div>';
				                    }
			                    }
		                    }



	                    }

	                    if ( !empty( $msg ) ) {
		                    $locker_buffy .= $msg;
		                    $hide_fields = true;
	                    } else {
		                    $locker_buffy .= '<button class="tds-submit-btn" type="submit" name="tds-subscribe" ' . $url . '>' . $btn_text . '</button>';
	                    }
                    } else {
                        $locker_buffy .= '<button class="tds-submit-btn" type="submit" name="tds-subscribe" ' . $url . '>' . $btn_text . '</button>';
                    }
                }
            }

            // if locked, add the class on body
            add_filter( 'body_class', function ( $classes ) {
                $classes[] = 'td-content-locked';
                return $classes;
            } );

			$buffy .= '<div class="tds-block-inner td-fix-index">';

			    if( $title_text != '' ) {
                    $buffy .= '<h3 class="tds-locker-title">' . $title_text . '</h3>';
                }

                if( $locker_message != '' && !$hide_fields) {
                    $buffy .= '<div class="tds-under-title-msg">' . $locker_message . '</div>';
                }

                /* message display */
                $buffy .= '<div class="tds-info">';
                    if( $tds_form_submission_message != '' ) {
                        $buffy .= $tds_form_submission_message;
                    }
                $buffy .= '</div>';

                /* form */
                $buffy .= '<form class="tds-form" action="" method="post" name="">';

                if (empty($url) && !empty($tds_locker_id) && current_user_can('edit_posts')) {
                    $buffy .= td_util::get_block_error( 'Locker', 'Please set a <a href="' . get_edit_post_link($tds_locker_id) . '" target="_blank">Plans Page</a> for this locker' );
                }

                    $buffy .= '<div class="tds-email-bar">';

                        $url = '';
                        if ( empty( $tds_payable ) ) {

                            $buffy .= '<div class="tds-input-wrap">';
                                $required = !is_admin() ? 'required' : '';
                                $buffy .= '<input class="tds-input" type="email" name="email" aria-label="email" placeholder="' . $input_placeholder . '" ' . $required . '>';

                                if ($show_captcha == 'show' && $captcha_site_key != '') {
                                    $buffy .= '<input type="hidden"id="g-recaptcha-response-leads" name="g-recaptcha-response" data-sitekey="' . $captcha_site_key . '">';
                                    $buffy .= '<input type="hidden" name="action" value="validate_captcha">';
                                }

                                if ( !empty( $tds_locker_cf ) ) {
                                    foreach ( $tds_locker_cf as $cf_filed => $cf_filed_data ) {
                                        $req = $cf_filed_data['req'] ? 'required' : '';
                                        $placeholder = !empty( $cf_filed_data['name'] ) ? 'placeholder="' . $cf_filed_data['name'] . '"' : '';
	                                    $buffy .= '<input class="tds-input" type="text" name="' . $cf_filed . '" ' . $placeholder . ' ' . $req . '>';
                                    }
                                }

                                $buffy .= '<input type="hidden" name="list" value="' . $tds_leads_list . '">';
                                $buffy .= '<input type="hidden" name="locker" value="' . $tds_locker_id . '">';
                                if ( !empty( $tds_successful_submit_rdr_url ) ) {
                                    $buffy .= '<input type="url" name="rdr_url" value="' . $tds_successful_submit_rdr_url . '" style="display: none;">';
                                }
                            $buffy .= '</div>';

                            $buffy .= '<button class="tds-submit-btn" type="submit" name="tds-subscribe" ' . $url . '>' . $btn_text . '</button>';

                        } else {
                            $tds_plans_list = array();
                            $tds_locker_types = get_post_meta( $tds_locker_id, 'tds_locker_types', true );
                            if ( !empty( $tds_locker_types['tds_paid_subs_plan_ids'] ) && is_array( $tds_locker_types['tds_paid_subs_plan_ids'] ) ) {
                                $tds_plans_list = $tds_locker_types['tds_paid_subs_plan_ids'];
                            }
                            $buffy .= '<input type="hidden" name="plans" value="' . implode(',', $tds_plans_list) . '">';

                            $buffy .= $locker_buffy;
                        }

                    $buffy .= '</div>';

                    if( $after_btn_text != '' && !$hide_fields) {
                        $buffy .= '<div class="tds-after-btn-text">' . $after_btn_text . '</div>';
                    }

                    if( $pp_msg != '' && !$hide_fields ) {
                        $buffy .= '<div class="tds-checkbox">';
                            $buffy .= '<input id="pp_checkbox_' . $this->block_uid . '" class="" name="" value="Y" type="checkbox">';
                            $buffy .= '<label class="checkbox subfield" for="pp_checkbox_' . $this->block_uid . '">';
                                $buffy .= '<span class="tds-check"></span>';
                                $buffy .= '<span class="tds-check-title">' . $pp_msg . '</span>';
                            $buffy .= '</label>';
                        $buffy .= '</div>';
                    }
                $buffy .= '</form>';

                ob_start();
                ?>

                <script>
                    if ( typeof window.tdsLeadsChecker === "function") {
                        window.tdsLeadsChecker();
                    }
                </script>

                <?php
                $buffy .= ob_get_clean();

            $buffy .= '</div>';

		$buffy .= '</div>';

		return $buffy;
	}

}
