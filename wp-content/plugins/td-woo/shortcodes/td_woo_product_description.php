<?php

/**
 * Class td_woo_product_description - shortcode for woocommerce single product page description
 */
class td_woo_product_description extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @general */
                .td_woo_product_description blockquote {
                    padding: 0;
                    position: relative;
                    border-left: none;
                    margin: 40px 5% 38px;
                    font-family: 'Roboto', sans-serif;
                    font-size: 32px;
                    line-height: 40px;
                    font-weight: 400;
                    text-transform: uppercase;
                    font-style: italic;
                    text-align: center;
                    color: #4db2ec;
                    word-wrap: break-word;
                }
                .td_woo_product_description blockquote.td_quote_left {
                    float: left;
                    width: 50%;
                    margin: 18px 18px 18px 0;
                    text-align: left;
                }
                .td_woo_product_description blockquote.td_quote_right {
                    float: right;
                    width: 50%;
                    margin: 21px 0 21px 21px;
                }
                .td_woo_product_description blockquote.td_quote_box {
                    margin: 0;
                    background-color: #FCFCFC;
                    border-left: 2px solid #4db2ec;
                    padding: 15px 23px 16px 23px;
                    position: relative;
                    top: 6px;
                    font-family: 'Open Sans', arial, sans-serif;
                    color: #777;
                    font-size: 13px;
                    line-height: 21px;
                    text-transform: none;
                    clear: both;
                }
                .td_woo_product_description blockquote.td_box_center {
                    margin: 0 0 29px 0;
                }
                .td_woo_product_description blockquote.td_box_left,
                .td_woo_product_description blockquote.td_box_right {
                    text-align: left;
                }
                .td_woo_product_description blockquote.td_box_left {
                    width: 40%;
                    float: left;
                    margin: 0 34px 20px 0;
                }
                .td_woo_product_description blockquote.td_box_right {
                    width: 40%;
                    float: right;
                    margin: 0 34px 20px 0;
                }
                .td_woo_product_description blockquote.td_pull_quote {
                    padding: 18px 25px;
                    margin: 0;
                    clear: both;
                    font-family: 'Open Sans', arial, sans-serif;
                    font-size: 14px;
                    line-height: 26px;
                    font-weight: 600;
                    text-transform: none;
                    text-align: center;
                }
                .td_woo_product_description blockquote.td_pull_quote:before,
                .td_woo_product_description blockquote.td_pull_quote:after {
                    content: '';
                    position: absolute;
                    display: block;
                    width: 15px;
                    height: 15px;
                    box-sizing: border-box;
                    -webkit-box-sizing: border-box;
                }
                .td_woo_product_description blockquote.td_pull_quote:before {
                    left: 0;
                    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAALBAMAAABSacpvAAAALVBMVEUAAAC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLRK0HxpAAAADnRSTlMAd+67mWZR3SKqMxGIzB8/1rAAAABlSURBVAjXFcexDQEBAAXQd+KCRm4CDZURFGICMYFadTHBxQQmEDHCzWAI9XGJ8s/ANS95FBvccKwYr5kuUQ/5omm5dpQ9Fu+H2efEPX07Sg62f+bJ2T6pJkmnTi5FslM2L56r9geMACBhjTsodgAAAABJRU5ErkJggg==) no-repeat;
                }
                .td_woo_product_description blockquote.td_pull_quote:after {
                    right: 0;
                    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAALBAMAAABSacpvAAAALVBMVEUAAAC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLRK0HxpAAAADnRSTlMA3ZnuqndmIhG7VYhEMzOiL2oAAABkSURBVAjXY+D1E2PgULZuYGB89+4A07t3AQzn3r1T4Hv3ToCh7t27CUDRBwxAYQe2d+8MGBiuAuWr5BwYGBjeFTAwzEtgYOB6xMDA8RAowGnOwMD6CsjIA4oWKwBFXYGcLQ0MAFHHH+tW1OhlAAAAAElFTkSuQmCC) no-repeat;
                }
                .td_woo_product_description blockquote.td_pull_center {
                    margin: 17px 0;
                    padding: 15px 50px;
                }
                .td_woo_product_description blockquote.td_pull_left {
                    width: 40%;
                    margin-right: 34px;
                    float: left;
                }
                .td_woo_product_description blockquote.td_pull_right {
                    width: 30%;
                    margin-left: 24px;
                    float: right;
                }
                .td_woo_product_description p:empty {
                    display: none;
                }


                	                
                /* @align_center */
				.td-theme-wrap .$unique_block_class {
					text-align: center;
				}
				/* @align_right */
				.td-theme-wrap .$unique_block_class {
					text-align: right;
				}
				/* @align_left */
				.td-theme-wrap .$unique_block_class {
					text-align: left;
				}
				
				/* @descr_color */
				.$unique_block_class {
					color: @descr_color;
				}
				/* @h_color */
				.$unique_block_class h1,
				.$unique_block_class h2,
				.$unique_block_class h3,
				.$unique_block_class h4,
				.$unique_block_class h5,
				.$unique_block_class h6 {
			        color: @h_color;
		        }
				/* @bq_color */
				body .$unique_block_class .tdw-block-inner blockquote {
			        color: @bq_color;
		        }
				/* @a_color */
				.$unique_block_class a {
			        color: @a_color;
		        }
				/* @a_hover_color */
				.$unique_block_class a:hover {
			        color: @a_hover_color;
		        }
				
				
				
				/* @f_descr */
				.$unique_block_class {
					@f_descr
				}
				/* @f_h1 */
				.$unique_block_class h1 {
			        @f_h1
		        }
				/* @f_h2 */
				.$unique_block_class h2 {
			        @f_h2
		        }
				/* @f_h3 */
				.$unique_block_class h3 {
			        @f_h3
		        }
				/* @f_h4 */
				.$unique_block_class h4 {
			        @f_h4
		        }
				/* @f_h5 */
				.$unique_block_class h5 {
			        @f_h5
		        }
				/* @f_h6 */
				.$unique_block_class h6 {
			        @f_h6
		        }
				/* @f_list */
				.$unique_block_class li {
			        @f_list
		        }
				/* @f_list_arrow */
				.$unique_block_class li:before {
				    margin-top: 1px;
			        line-height: @f_list_arrow !important;
		        }
				/* @f_bq */
				.$unique_block_class blockquote {
			        @f_bq
		        }
                
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw('general', 1);


        // content align
        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'descr_color', $res_ctx->get_shortcode_att('descr_color') );
        $res_ctx->load_settings_raw( 'h_color', $res_ctx->get_shortcode_att('h_color') );
        $res_ctx->load_settings_raw( 'bq_color', $res_ctx->get_shortcode_att('bq_color') );
        $res_ctx->load_settings_raw( 'a_color', $res_ctx->get_shortcode_att('a_color') );
        $res_ctx->load_settings_raw( 'a_hover_color', $res_ctx->get_shortcode_att('a_hover_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_descr' );
        $res_ctx->load_font_settings( 'f_h1' );
        $res_ctx->load_font_settings( 'f_h2' );
        $res_ctx->load_font_settings( 'f_h3' );
        $res_ctx->load_font_settings( 'f_h4' );
        $res_ctx->load_font_settings( 'f_h5' );
        $res_ctx->load_font_settings( 'f_h6' );
        $res_ctx->load_font_settings( 'f_list' );
        $f_list_size = $res_ctx->get_shortcode_att('f_list_font_size');
        $f_list_lh = $res_ctx->get_shortcode_att('f_list_font_line_height');
        if( $f_list_size != '' && $f_list_lh == '' ) {
            if( is_numeric( $f_list_size ) ) {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_size . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_size );
            }
        }
        if( $f_list_size == '' && $f_list_lh != '' ) {
            if( is_numeric( $f_list_lh ) ) {
                $res_ctx->load_settings_raw( 'f_list_arrow', 15 * $f_list_lh . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_lh );
            }
        }
        if( $f_list_size != '' && $f_list_lh != '' ) {
            if( is_numeric( $f_list_lh ) ) {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_size * $f_list_lh . 'px' );
            } else {
                $res_ctx->load_settings_raw( 'f_list_arrow', $f_list_lh );
            }
        }
        $res_ctx->load_font_settings( 'f_bq' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page;

	    $product_description_data = $td_woo_state_single_product_page->product_description->__invoke($atts);
        
        parent::render($atts);

        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdw-block-inner td-fix-index">';
                $buffy .= '<p>' . $product_description_data['description'] . '</p>';
            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

