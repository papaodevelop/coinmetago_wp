<?php

class td_block_exchange extends td_block {

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

        $tdc_url = TDC_URL;

        $compiled_css = '';

        $raw_css =
            "<style>
                /* @style_general_exchange */
                .td_block_exchange {
                    font-family: 'Roboto', sans-serif;
                    margin-bottom: 35px;
                }
                .td_block_exchange .td-exchange-header {
                    position: relative;
                    text-align: center;
                    font-weight: bold;
                    padding-top: 14px;
                    padding-bottom: 12px;
                    margin-bottom: 10px;
                    z-index: 0;
                }
                .td_block_exchange .td-exchange-header:before {
                    content: '';
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    background-color: #4db2ec;
                    opacity: 0.07;
                    z-index: -1;
                }
                .td_block_exchange .td-base-title {
                    margin-left: 9px;
                }
                .td_block_exchange .td-column-1 .td-exchange-base {
                    width: 300px;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    overflow: hidden;
                    margin-left: auto;
                    margin-right: auto;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .td_block_exchange .td-column-1 .td-exchange-base {
                        width: 212px;
                    }
                }
                .td_block_exchange .td-rate {
                    position: relative;
                    border-bottom: 1px dashed #f2f2f2;
                    padding-top: 10px;
                    padding-bottom: 10px;
                }
                .td_block_exchange .td-rate:last-child {
                    border-bottom: none;
                }
                .td_block_exchange .td-rate .td-rate-currency {
                    font-weight: bold;
                    display: inline-block;
                    margin-left: 34px;
                }
                .td_block_exchange .td-rate .td-exchange-value {
                    float: right;
                }
                .td_block_exchange .td-flags {
                    background-image: url($tdc_url/assets/images/flags/flags.png);
                    background-repeat: no-repeat;
                    display: inline-block;
                }
                .td_block_exchange .td-flag-header {
                    vertical-align: middle;
                    position: relative;
                    bottom: 1px;
                }
                .td_block_exchange .td-flags-all {
                    position: absolute;
                    top: 8px;
                    left: 0;
                }
                .td_block_exchange .td-flag-aud {
                    background-position: 0 0;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-bgn {
                    background-position: -24px 0;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-brl {
                    background-position: -48px 0;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-cad {
                    background-position: -72px 0;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-chf {
                    background-position: -96px 0;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-cny {
                    background-position: 0 -24px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-czk {
                    background-position: -24px -24px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-dkk {
                    background-position: -48px -24px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-eur {
                    background-position: -72px -24px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-gbp {
                    background-position: -96px -24px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-hkd {
                    background-position: 0 -48px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-hrk {
                    background-position: -24px -48px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-huf {
                    background-position: -48px -48px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-idr {
                    background-position: -72px -48px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-ils {
                    background-position: -96px -48px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-inr {
                    background-position: 0 -72px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-jpy {
                    background-position: -24px -72px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-krw {
                    background-position: -48px -72px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-mxn {
                    background-position: -72px -72px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-myr {
                    background-position: -96px -72px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-nok {
                    background-position: 0 -96px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-nzd {
                    background-position: -24px -96px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-php {
                    background-position: -48px -96px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-pln {
                    background-position: -72px -96px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-ron {
                    background-position: -96px -96px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-rub {
                    background-position: -120px 0;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-sek {
                    background-position: -120px -24px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-sgd {
                    background-position: -120px -48px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-thb {
                    background-position: -120px -72px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-try {
                    background-position: -120px -96px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-usd {
                    background-position: 0 -120px;
                    width: 24px;
                    height: 24px;
                }
                .td_block_exchange .td-flag-zar {
                    background-position: -24px -120px;
                    width: 24px;
                    height: 24px;
                }
                @-moz-document url-prefix() .td_block_exchange .td-flags-all {
                    top: 9px;
                }
                .td_block_exchange .td-column-2 {
                    overflow: hidden;
                }
                .td_block_exchange .td-column-2 .td-rate {
                    width: 26%;
                    float: left;
                    margin-right: 11%;
                    border-bottom-width: 0;
                    position: relative;
                }
                @media (max-width: 767px) {
                    .td_block_exchange .td-column-2 .td-rate {
                        width: auto;
                        float: none;
                        margin-right: 0;
                        border-bottom-width: 1px;
                    }
                }
                .td_block_exchange .td-column-2 .td-exchange-rates .td-rate:nth-child(3n) {
                    margin-right: 0;
                }
                .td_block_exchange .td-column-2 .td-exchange-rates .td-rate:nth-child(3n + 1):before {
                    content: '';
                    width: 1400px;
                    height: 1px;
                    border-bottom: 1px dashed #F2F2F2;
                    position: absolute;
                    bottom: 0;
                    left: 0;
                }
                @media (max-width: 767px) {
                    .td_block_exchange .td-column-2 .td-exchange-rates .td-rate:nth-child(3n + 1):before {
                        display: none;
                    }
                }
                .td_block_exchange .td-column-3 {
                    overflow: hidden;
                }
                .td_block_exchange .td-column-3 .td-rate {
                    width: 19%;
                    float: left;
                    margin-right: 8%;
                    border-bottom-width: 0;
                    position: relative;
                }
                @media (max-width: 767px) {
                    .td_block_exchange .td-column-3 .td-rate {
                        width: auto;
                        float: none;
                        margin-right: 0;
                        border-bottom-width: 1px;
                    }
                }
                .td_block_exchange .td-column-3 .td-exchange-rates .td-rate:nth-child(4n) {
                    margin-right: 0;
                }
                .td_block_exchange .td-column-3 .td-exchange-rates .td-rate:nth-child(4n + 1):before {
                    content: '';
                    width: 1400px;
                    height: 1px;
                    border-bottom: 1px dashed #F2F2F2;
                    position: absolute;
                    bottom: 0;
                    left: 0;
                }
                @media (max-width: 767px) {
                    .td_block_exchange .td-column-3 .td-exchange-rates .td-rate:nth-child(4n + 1):before {
                        display: none;
                    }
                }

                
                
                

                /* @heading_color */
				.$unique_block_class .td-base-title {
					color: @heading_color;
				}
                /* @heading_bg_color */
				body .td-theme-wrap .$unique_block_class .td-exchange-header:before {
					background-color: @heading_bg_color;
					opacity: 1;
				}
				
				
				/* @currency_name_color */
				.$unique_block_class .td-rate-currency {
					color: @currency_name_color;
                }
				/* @currency_value_color */
				.$unique_block_class .td-exchange-value {
					color: @currency_value_color;
				}
				/* @currency_border_color */
				.$unique_block_class .td-rate,
				.$unique_block_class .td-column-2 .td-exchange-rates .td-rate:nth-child(3n + 1):before,
				.$unique_block_class .td-column-3  .td-exchange-rates .td-rate:nth-child(4n + 1):before {
					border-bottom-color: @currency_border_color;
				}
				

                /* @f_header */
				body .$unique_block_class .td-block-title a,
				body .$unique_block_class .td-block-title span {
					@f_header
				}
				/* @f_heading */
				.$unique_block_class .td-base-title {
					@f_heading
				}
				/* @f_curr */
				.$unique_block_class .td-rate-currency {
					@f_curr
				}
				/* @f_val */
				.$unique_block_class .td-exchange-value {
					@f_val
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL -- */
        $res_ctx->load_settings_raw( 'style_general_exchange', 1 );




        /*-- HEADING -- */
        // heading text color
        $res_ctx->load_settings_raw( 'heading_color', $res_ctx->get_shortcode_att('heading_color') );

        // heading background color
        $res_ctx->load_settings_raw( 'heading_bg_color', $res_ctx->get_shortcode_att('heading_bg_color') );



        /*-- CURRENCY -- */
        // currency name color
        $res_ctx->load_settings_raw( 'currency_name_color', $res_ctx->get_shortcode_att('currency_name_color') );

        // currency value color
        $res_ctx->load_settings_raw( 'currency_value_color', $res_ctx->get_shortcode_att('currency_value_color') );

        // currency border color
        $res_ctx->load_settings_raw( 'currency_border_color', $res_ctx->get_shortcode_att('currency_border_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_heading' );
        $res_ctx->load_font_settings( 'f_curr' );
        $res_ctx->load_font_settings( 'f_val' );

    }

	/**
	 * Disable loop block features. This block does not use a loop and it dosn't need to run a query.
	 */
	function __construct() {
		parent::disable_loop_block_features();
	}



    function render($atts, $content = null) {

        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        if (empty($td_column_number)) {
            $td_column_number = td_global::vc_get_column_number(); // get the column width of the block from the page builder API
        }

        $buffy = ''; //output buffer
        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

		    //get the block js
		    $buffy .= $this->get_block_css();

            // block title wrap
            $buffy .= '<div class="td-block-title-wrap">';
                $buffy .= $this->get_block_title();
                $buffy .= $this->get_pull_down_filter(); //get the sub category filter for this block
            $buffy .= '</div>';

	        $buffy .= '<div id=' . $this->block_uid . ' class="td-exchange-wrap td_block_inner td-column-' . $td_column_number . '">';
                $buffy.= td_exchange::render_generic($atts);
            $buffy .= '</div>';
        $buffy .= '</div>';
        return $buffy;
    }


}