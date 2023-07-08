<?php
class tdm_block_button extends td_block {

	protected $shortcode_atts = array(); //the atts used for rendering the current block

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
                
                /* @style_general_button */
                .tdm_block.tdm_block_button {
                  margin-bottom: 0;
                }
                .tdm_block.tdm_block_button .tds-button {
                  line-height: 0;
                }
                .tdm_block.tdm_block_button.tdm-block-button-inline {
                  display: inline-block;
                }
                .tdm_block.tdm_block_button.tdm-block-button-full,
                .tdm_block.tdm_block_button.tdm-block-button-full .tdm-btn {
                  display: block;
                }
                
                /* @float_right */
                .$unique_block_class {
                    float: right;
                    clear: none;
                }
                
                /* @button_padding */
                .$unique_block_class .tdm-btn {
                    height: auto;
                    padding: @button_padding;
                }
                /* @icon_align */
                .$unique_block_class i {
                    position: relative;
                    top: @icon_align;
                }
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_button', 1 );

        // make inline
        $res_ctx->load_settings_raw('float_right', $res_ctx->get_shortcode_att('float_right'));

        // button padding
        $button_padding = $res_ctx->get_shortcode_att('button_padding');
        $res_ctx->load_settings_raw('button_padding', $res_ctx->get_shortcode_att('button_padding'));
        if( $button_padding != '' && is_numeric( $button_padding ) ) {
            $res_ctx->load_settings_raw('button_padding', $res_ctx->get_shortcode_att('button_padding') . 'px');
        }

        $icon_align = $res_ctx->get_shortcode_att( 'icon_align' );
        if ( $icon_align != '0' ) {
            $res_ctx->load_settings_raw( 'icon_align', $icon_align . 'px');
        }
    }

	function render($atts, $content = null) {
		parent::render($atts);

        $this->unique_block_class = $this->block_uid;

		$this->shortcode_atts = shortcode_atts(
			array_merge(
				td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_button' ))
			, $atts);

		$additional_classes = array();

		// button display
		$button_display = $this->get_shortcode_att('button_display');
        $data_inline = '';
        if ( '' !== $button_display ) {
            $additional_classes[] = $button_display;
        }

        // content align horizontal
		$content_align_horizontal = $this->get_shortcode_att('content_align_horizontal');
        if( ! empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdm-' . $content_align_horizontal;
        }

        $data_video_popup = '';
        $icon_video_url = $this->get_shortcode_att('icon_video_url');
        if ( ! empty( $icon_video_url ) ) {
            $data_video_popup = ' data-mfp-src="' . $icon_video_url . '" ';
        }

        $data_scroll_to_class = '';
        $scroll_to_class = $this->get_shortcode_att('scroll_to_class');
        if ( ! empty( $scroll_to_class ) ) {
            $data_scroll_to_class = ' data-scroll-to-class="' . $scroll_to_class . '" ';
        }

        $data_scroll_offset = '';
        $scroll_offset = $this->get_shortcode_att('scroll_offset');
        if ( ! empty( $scroll_offset ) ) {
            $data_scroll_offset = ' data-scroll-offset="' . $scroll_offset . '" ';
        }


		$buffy = '';


        // display restrictions
        $hide_for_user_type = $this->get_shortcode_att( 'hide_for_user_type' );
        if( $hide_for_user_type != '' ) {
            if( !( td_util::tdc_is_live_editor_ajax() || td_util::tdc_is_live_editor_iframe() ) &&
                (
                    ( $hide_for_user_type == 'logged-in' && is_user_logged_in() ) ||
                    ( $hide_for_user_type == 'guest' && !is_user_logged_in() )
                )
            ) {
                return $buffy;
            }
        } else {
            $author_plan_ids = $this->get_att('author_plan_id');
            $all_users_plan_ids = $this->get_att('logged_plan_id');

            if( !td_util::plan_limit($author_plan_ids, $all_users_plan_ids) ) {
                return $buffy;
            }
        }



		$buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . ' ' . $data_inline . ' ' . $data_video_popup . ' ' . $data_scroll_to_class . ' ' . $data_scroll_offset . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            // button
            $button_text = $this->get_shortcode_att('button_text');
            $button_icon = $this->get_shortcode_att( 'button_tdicon' );

//            if ( $hide_for_logged =='yes' && is_user_logged_in() && !td_util::tdc_is_live_editor_ajax() && !td_util::tdc_is_live_editor_iframe()) {
//                   //return false;
//            } else {
                if ( !empty($button_text) || !empty($button_icon) ) {
                    $tds_button = $this->get_shortcode_att('tds_button');
                    if (empty($tds_button)) {
                        $tds_button = td_util::get_option('tds_button', 'tds_button1');
                    }
                    $tds_button_instance = new $tds_button($this->shortcode_atts, '', $this->unique_block_class);
                    $buffy .= $tds_button_instance->render();
                }
            //}
		$buffy .= '</div>';

		return $buffy;
	}
}