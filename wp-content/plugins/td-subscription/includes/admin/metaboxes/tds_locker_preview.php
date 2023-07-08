<div class="td-meta-box-inside">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

	<div class="preview-wrapper">
        <div class="preview-html">
            <?php

            global $post;

            // locker meta
            $tds_locker_types_meta = get_post_meta( $post->ID, 'tds_locker_types', true );
            $tds_locker_settings_meta = get_post_meta( $post->ID, 'tds_locker_settings', true );
            $tds_locker_styles_meta = get_post_meta( $post->ID, 'tds_locker_styles', true );

            $tds_locker_types_defaults = array(
                'tds_payable' => '',
            );

            // basic locker settings defaults
            $tds_locker_settings_defaults = array (
                'tds_title' => '',
                'tds_message' => '',
                'tds_input' => '',
                'tds_input_placeholder' => '',
                'tds_submit_btn_text' => '',
                'tds_after_btn_text' => '',
                'tds_pp_msg' => '',
            );

            // build locker styles defaults
            $tds_locker_styles_defaults = array(
                'tds_bg_color' => '',
                'all_tds_border' => '',
                'all_tds_border_color' => '',
                'all_tds_shadow' => '',
                'all_tds_shadow_color' => '',
                'tds_input_color_f' => '',
                'tds_input_bg_color' => '',
                'tds_input_bg_color_f' => '',
                'tds_input_border_color' => '',
                'tds_input_border_color_f' => '',
                'tds_submit_btn_text_color_h' => '',
                'tds_submit_btn_bg_color' => '',
                'tds_submit_btn_bg_color_h' => '',
                'tds_pp_checked_color' => '',
                'tds_pp_check_bg' => '',
                'tds_pp_check_bg_f' => '',
                'tds_pp_check_border_color' => '',
                'tds_pp_check_border_color_f' => '',
                'tds_pp_msg_links_color' => '',
                'tds_pp_msg_links_color_h' => '',
                'tds_general_font_family' => '',
                'tds_general_font_size' => '',
                'tds_general_font_line_height' => '',
                'tds_general_font_style' => '',
                'tds_general_font_weight' => '',
                'tds_general_font_transform' => '',
                'tds_general_font_spacing' => ''

            );
            foreach ( $tds_locker_settings_defaults as $setting_id => $val ) {
                // colors
	            $tds_locker_styles_defaults[$setting_id . '_color'] = '';
                // fonts
	            $tds_locker_styles_defaults[$setting_id . '_font_family'] = '';
	            $tds_locker_styles_defaults[$setting_id . '_font_size'] = '';
	            $tds_locker_styles_defaults[$setting_id . '_font_line_height'] = '';
	            $tds_locker_styles_defaults[$setting_id . '_font_style'] = '';
	            $tds_locker_styles_defaults[$setting_id . '_font_weight'] = '';
	            $tds_locker_styles_defaults[$setting_id . '_font_transform'] = '';
	            $tds_locker_styles_defaults[$setting_id . '_font_spacing'] = '';
            }

            $tds_locker_types = empty( $tds_locker_types_meta ) ? array() : $tds_locker_types_meta;
            $tds_locker_settings = empty( $tds_locker_settings_meta ) ? array() : $tds_locker_settings_meta;
            $tds_locker_styles = empty( $tds_locker_styles_meta ) ? array() : $tds_locker_styles_meta;

            // locker shortcode atts
            $locker_shortcode_atts = array_merge(
                array_merge( $tds_locker_types_defaults, $tds_locker_types ),
                array_merge( $tds_locker_settings_defaults, $tds_locker_settings ),
                array_merge( $tds_locker_styles_defaults, $tds_locker_styles ),
                array(
                    'tds_leads_list' => '',
	                'b64_decode' => false,
                )
            );

            //echo '<pre>';
            //print_r($locker_shortcode_atts);
            //print_r( count($locker_shortcode_atts) );
            //echo '</pre>';

            echo td_global_blocks::get_instance('tds_locker')->render( $locker_shortcode_atts );

            ?>
        </div>

        <div class="preview-loader"></div>
	</div>

    <!-- preview update button -->
    <a href="#" class="tds-update-preview button button-primary button-large">Update Preview</a>

</div>
