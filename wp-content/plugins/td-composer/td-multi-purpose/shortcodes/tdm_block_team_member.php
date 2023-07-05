<?php
class tdm_block_team_member extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block

	public function get_custom_css() {

		$compiled_css = '';
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

        $raw_css =
			"<style>
				/* @style_general_team_member */
				.tdm_block_team_member .tdm-member-image {
                  height: 0;
                  margin-bottom: 16px;
                  padding-bottom: 100%;
                  background-repeat: no-repeat;
                  background-size: cover;
                  background-position: center center;
                }
                .tdm_block_team_member .tdm-title {
                  margin-bottom: 0;
                }
                .tdm_block_team_member .tdm-title a {
                    color: inherit;
                }
                .tdm_block_team_member .tdm-member-title {
                  display: block;
                  margin-bottom: 13px;
                  color: #a5a5a5;
                }
                .tdm_block_team_member .tdm-descr {
                  margin-bottom: 20px;
                  font-size: 15px;
                  line-height: 24px;
                }
                .tds-team-member2 .tdm-member-info {
                  padding-bottom: 100%;
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 0;
                  background: rgba(0, 0, 0, 0.8);
                  -webkit-transition: opacity 0.3s ease;
                  transition: opacity 0.3s ease;
                  opacity: 0;
                }
                .tds-team-member2:hover .tdm-member-info {
                  opacity: 1;
                }
                .tds-team-member2 .tdm-member-info-inner {
                  position: absolute;
                  top: 50%;
                  -webkit-transform: translateY(-50%);
                  transform: translateY(-50%);
                  left: 0;
                  width: 100%;
                  padding: 20px;
                }
                .tds-team-member2 .tdm-descr {
                  margin-bottom: 21px;
                  font-size: 14px;
                  line-height: 22px;
                  color: #fff;
                }
                .tds-team-member2 .tdm-member-title {
                  margin-bottom: 0;
                }
                .tds-team-member2 .tds-social1 .tdm-social-item i,
                .tds-team-member2 .tds-social2 .tdm-social-item i,
                .tds-team-member2 .tds-social4 .tdm-social-item i,
                .tds-team-member2 .tds-social5 .tdm-social-item i,
                .tds-team-member2 .tds-social6 .tdm-social-item i {
                  color: #fff;
                }
                .tds-team-member2 .tds-social1 .tdm-social-item:hover i,
                .tds-team-member2 .tds-social4 .tdm-social-item:hover i,
                .tds-team-member2 .tds-social5 .tdm-social-item:hover i,
                .tds-team-member2 .tds-social6 .tdm-social-item:hover i {
                  color: #4db2ec;
                }
                .tds-team-member2.tds-team-member-content-vert-top .tdm-member-info-inner {
                  top: 0;
                  -webkit-transform: none;
                  transform: none;
                }
                .tds-team-member2.tds-team-member-content-vert-bottom .tdm-member-info-inner {
                  top: auto;
                  bottom: 0;
                  -webkit-transform: none;
                  transform: none;
                }
                .tds-team-member3 .tdm-member-image-wrap,
                .tds-team-member3 .tdm-member-info {
                  display: table-cell;
                  vertical-align: top;
                }
                .tds-team-member3 .tdm-member-image {
                  margin-bottom: 5px;
                }
                .tds-team-member3.tdm-team-content-vert-center .tdm-member-image-wrap,
                .tds-team-member3.tdm-team-content-vert-center .tdm-member-info {
                  vertical-align: middle;
                }
                .tds-team-member3.tdm-team-content-vert-center .tdm-title {
                  margin-top: 0;
                }
                .tds-team-member3.tdm-team-content-vert-bottom .tdm-member-image-wrap,
                .tds-team-member3.tdm-team-content-vert-bottom .tdm-member-info {
                  vertical-align: bottom;
                }

 .tdm-social-wrapper {
                  *zoom: 1;
                }
                .tdm-social-wrapper:before,
                .tdm-social-wrapper:after {
                  display: table;
                  content: '';
                  line-height: 0;
                }
                .tdm-social-wrapper:after {
                  clear: both;
                }
                .tdm-social-item-wrap {
                  display: inline-block;
                }
                .tdm-social-item {
                  position: relative;
                  display: inline-block;
                  vertical-align: middle;
                  -webkit-transition: all 0.2s;
                  transition: all 0.2s;
                  text-align: center;
                  -webkit-transform: translateZ(0);
                  transform: translateZ(0);
                }
                .tdm-social-item i {
                  font-size: 14px;
                  color: #4db2ec;
                  -webkit-transition: all 0.2s;
                  transition: all 0.2s;
                }
                .tdm-social-text {
                  display: none;
                  margin-top: -1px;
                  vertical-align: middle;
                  font-size: 13px;
                  color: #4db2ec;
                  -webkit-transition: all 0.2s;
                  transition: all 0.2s;
                }
                .tdm-social-item-wrap:hover i,
                .tdm-social-item-wrap:hover .tdm-social-text {
                  color: #000;
                }
                .tdm-social-item-wrap:last-child .tdm-social-text {
                  margin-right: 0 !important;
                }
				
				/* @img_margin */
				.$unique_block_class .tdm-member-image {
					margin: @img_margin;
				}
				/* @mix_type */
                .$unique_block_class .tdm-member-image:before {
                    content: '';
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    opacity: 1;
                    transition: opacity 1s ease;
                    -webkit-transition: opacity 1s ease;
                    mix-blend-mode: @mix_type;
                    z-index: 1;
                    top: 0;
                    left: 0;
                }
                /* @color */
                .$unique_block_class .tdm-member-image:before {
                    background: @color;
                }
                /* @mix_gradient */
                .$unique_block_class .tdm-member-image:before {
                    @mix_gradient;
                }
                
                
                /* @mix_type_h */
                @media (min-width: 1141px) {
                    .$unique_block_class .tdm-member-image:after {
                        content: '';
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        opacity: 0;
                        transition: opacity 1s ease;
                        -webkit-transition: opacity 1s ease;
                        mix-blend-mode: @mix_type_h;
                        z-index: 1;
                        top: 0;
                        left: 0;
                    }
                    .$unique_block_class .tdm-team-member-wrap:hover .tdm-member-image:after {
                        opacity: 1;
                    }
                }
                
                /* @color_h */
                .$unique_block_class .tdm-member-image:after {
                    background: @color_h;
                }
                /* @mix_gradient_h */
                .$unique_block_class .tdm-member-image:after {
                    @mix_gradient_h;
                }
                /* @mix_type_off */
                .$unique_block_class .tdm-team-member-wrap:hover .tdm-member-image:before {
                    opacity: 0;
                }
                    
                /* @effect_on */
                .$unique_block_class .tdm-member-image {
                    filter: @fe_brightness @fe_contrast @fe_saturate;
                    transition: all 1s ease;
                    -webkit-transition: all 1s ease;
                }
                /* @effect_on_h */
                @media (min-width: 1141px) {
                    .$unique_block_class .tdm-team-member-wrap:hover .tdm-member-image {
                        filter: @fe_brightness_h @fe_contrast_h @fe_saturate_h;
                    }
                }
			</style>";


		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->shortcode_atts);

		$compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

	static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_team_member', 1 );

		// add description margin
		$img_margin = $res_ctx->get_shortcode_att( 'img_margin' );
		$res_ctx->load_settings_raw( 'img_margin', $img_margin );
		if( $img_margin != '' && is_numeric( $img_margin )  ) {
			$res_ctx->load_settings_raw( 'img_margin', $img_margin . 'px' );
		}

        // mix blend
        $mix_type = $res_ctx->get_shortcode_att('mix_type');
        if ( $mix_type != '' ) {
            $res_ctx->load_settings_raw('mix_type', $res_ctx->get_shortcode_att('mix_type'));
        }
        $res_ctx->load_color_settings( 'mix_color', 'color', 'mix_gradient', '', '' );

        $mix_type_h = $res_ctx->get_shortcode_att('mix_type_h');
        if ( $mix_type_h != '' ) {
            $res_ctx->load_settings_raw('mix_type_h', $res_ctx->get_shortcode_att('mix_type_h'));
        } else {
            $res_ctx->load_settings_raw('mix_type_off', 1);
        }
        $res_ctx->load_color_settings( 'mix_color_h', 'color_h', 'mix_gradient_h', '', '' );

        // effects
        $res_ctx->load_settings_raw('fe_brightness', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate', 'saturate(1)');

        $fe_brightness = $res_ctx->get_shortcode_att('fe_brightness');
        if ($fe_brightness != '1') {
            $res_ctx->load_settings_raw('fe_brightness', 'brightness(' . $fe_brightness . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_contrast = $res_ctx->get_shortcode_att('fe_contrast');
        if ($fe_contrast != '1') {
            $res_ctx->load_settings_raw('fe_contrast', 'contrast(' . $fe_contrast . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_saturate = $res_ctx->get_shortcode_att('fe_saturate');
        if ($fe_saturate != '1') {
            $res_ctx->load_settings_raw('fe_saturate', 'saturate(' . $fe_saturate . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }

        // effects hover
        $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(1)');

        $fe_brightness_h = $res_ctx->get_shortcode_att('fe_brightness_h');
        $fe_contrast_h = $res_ctx->get_shortcode_att('fe_contrast_h');
        $fe_saturate_h = $res_ctx->get_shortcode_att('fe_saturate_h');

        if ($fe_brightness_h != '1') {
            $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(' . $fe_brightness_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_contrast_h != '1') {
            $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(' . $fe_contrast_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(' . $fe_saturate_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        // make hover to work
        if ($fe_brightness_h != '1' || $fe_contrast_h != '1' || $fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        if ($fe_brightness != '1' || $fe_contrast != '1' || $fe_saturate != '1') {
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
	}

    function render($atts, $content = null) {
        parent::render($atts);

        $this->shortcode_atts = shortcode_atts(
			array_merge(
				td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_team_member' ),
                td_api_style::get_style_group_params( 'tds_social' ))
			, $atts);


	    $content_align_horizontal = $this->get_shortcode_att( 'content_align_horizontal' );

        $additional_classes = array();

        $tds_animation_stack = td_util::get_option('tds_animation_stack');
        if ( empty($tds_animation_stack) ) { //lazyload animation is ON
            $additional_classes[] = 'td-animation-stack';
        }

        // content align horizontal
        if ( ! empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdm-' . $content_align_horizontal;
        }


        $buffy = '';

        $buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            // Get progress_bar_style_id
            $tds_team_member = $this->get_shortcode_att('tds_team_member');
            if ( empty( $tds_team_member ) ) {
                $tds_team_member = td_util::get_option( 'tds_team_member', 'tds_team_member1');
            }
            $tds_team_member_instance = new $tds_team_member( $this->shortcode_atts );
            $buffy .= $tds_team_member_instance->render();

        $buffy .= '</div>';


        return $buffy;
    }
}