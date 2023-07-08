<?php

/**
 * Class td_woo_archive_subcategories_list - shortcode for woocommerce products archives subcategories list dropdown
 */
class td_woo_archive_subcategories_list extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general */
                .td_woo_archive_subcategories_list .tdw-block-inner {
                    display: flex;
                    flex-wrap: wrap;
                }
                .td_woo_archive_subcategories_list .tdw-as-subcat-inner {
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                }        
                .td_woo_archive_subcategories_list .tdw-as-img {
                    position: relative;
                    width: 100%;
                    height: 0;
                    padding-bottom: 60%;
                    display: block;
                    background-color: #f5f5f5;
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                }   
                .td_woo_archive_subcategories_list .tdw-as-img:after {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                }
                .td_woo_archive_subcategories_list .tdw-as-subcat-info {
                    border: 0 solid #000;
                }
                .td_woo_archive_subcategories_list .tdw-as-subcat-info-bottom {
                    margin-top: 17px;
                }          
                .td_woo_archive_subcategories_list .tdw-as-name {
                    margin: 0 0 8px;
                    font-size: 21px;
                    line-height: 1.2;
                }
                .td_woo_archive_subcategories_list .tdw-as-subcat-inner:hover .tdw-as-name a {
                    color: #4db2ec;
                }
                .td_woo_archive_subcategories_list .tdw-as-descr {
                    margin: 0;
                    font-family: 'Open Sans', arial, sans-serif;
                    font-size: 13px;
                    line-height: 1.6;
                    color: #777;
                }
                
                
                /* @columns */
                body .$unique_block_class .tdw-as-subcat {
                    width: @columns;
                }
                /* @padding */
                @media (min-width: 767px) {
                    body .$unique_block_class .tdw-as-subcat:nth-last-child(@padding) {
                        margin-bottom: 0;
                    }
                }
                @media (max-width: 767px) {
                    body .$unique_block_class .tdw-as-subcat:last-child {
                        margin-bottom: 0;
                    }
                }
                /* @gap */
                body .$unique_block_class .tdw-as-subcat {
                    padding-left: @gap;
                    padding-right: @gap;
                }
                body .$unique_block_class .tdw-block-inner {
                    margin-left: -@gap;
                    margin-right: -@gap;
                }
                /* @space */
                body .$unique_block_class .tdw-as-subcat {
                    margin-bottom: @space;
                }
                
                
                /* @img_height */
                body .$unique_block_class .tdw-as-img {
                    padding-bottom: @img_height;
                }
                /* @img_radius */
                body .$unique_block_class .tdw-as-img {
                    border-radius: @img_radius;
                }
                /* @show_img */
                body .$unique_block_class .tdw-as-img {
                    display: @show_img;
                }
                
                
                /* @info_margin1 */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    margin: @info_margin1;
                }
                /* @info_padding1 */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    padding: @info_padding1;
                }
                /* @info_border1 */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    border-width: @info_border1;
                }
                /* @info_border_style1 */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    border-style: @info_border_style1;
                }
                /* @info_horiz_center1 */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    text-align: center;
                }
                /* @info_horiz_right1 */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    text-align: right;
                }
                
                /* @info_margin2 */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    margin: @info_margin2;
                }
                /* @info_padding2 */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    padding: @info_padding2;
                }
                /* @info_border2 */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    border-width: @info_border2;
                }
                /* @info_border_style2 */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    border-style: @info_border_style2;
                }
                /* @info_horiz_center2 */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    text-align: center;
                }
                /* @info_horiz_right2 */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    text-align: right;
                }
                
                /* @name_margin */
                body .$unique_block_class .tdw-as-name {
                    margin: @name_margin;
                }
                
                /* @descr_margin */
                body .$unique_block_class .tdw-as-descr {
                    margin: @descr_margin;
                }
                /* @show_descr */
                body .$unique_block_class .tdw-as-descr {
                    display: @show_descr;
                }
                
                /* @hide_info_top */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    display: none;
                }
                /* @hide_info_bottom */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    display: none;
                }
                /* @show_info_top */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    display: block;
                }
                /* @show_info_bottom */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    display: block;
                }
                
                
                /* @bg_color */
                body .$unique_block_class .tdw-as-subcat-inner {
                    background-color: @bg_color;
                }
                
                /* @img_overlay */
                body .$unique_block_class .tdw-as-img:after {
                    content: '';
                    background: @img_overlay;
                }
                /* @img_overlay_gradient */
                body .$unique_block_class .tdw-as-img:after {
                    content: '';
                    @img_overlay_gradient
                }
                /* @img_overlay_h */
                body .$unique_block_class .tdw-as-subcat-inner:hover .tdw-as-img:after {
                    content: '';
                    background: @img_overlay_h;
                }
                /* @img_overlay_h_gradient */
                body .$unique_block_class .tdw-as-subcat-inner:hover .tdw-as-img:after {
                    content: '';
                    @img_overlay_h_gradient;
                }
                
                /* @info_bg_color1 */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    background-color: @info_bg_color1;
                }
                /* @info_border_color1 */
                body .$unique_block_class .tdw-as-subcat-info-top {
                    border-color: @info_border_color1;
                }
                
                /* @info_bg_color2 */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    background-color: @info_bg_color2;
                }
                /* @info_border_color2 */
                body .$unique_block_class .tdw-as-subcat-info-bottom {
                    border-color: @info_border_color2;
                }
                
                /* @name_color */
                body .$unique_block_class .tdw-as-name a {
                    color: @name_color;
                }
                /* @name_color_h */
                body .$unique_block_class .tdw-as-subcat-inner:hover .tdw-as-name a {
                    color: @name_color_h;
                }
                
                /* @descr_color */
                body .$unique_block_class .tdw-as-descr {
                    color: @descr_color;
                }
                
                
				/* @f_header */
				body .$unique_block_class .td-block-title a,
				body .$unique_block_class .td-block-title span {
					@f_header
				}
                /* @f_name */
                body .$unique_block_class .tdw-as-name {
                    @f_name
                }
                /* @f_descr */
                body .$unique_block_class .tdw-as-descr {
                    @f_descr
                }
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        // general style
        $res_ctx->load_settings_raw('general', 1);




        /*-- LAYOUT -- */
        // columns
        $columns = $res_ctx->get_shortcode_att('columns');
        if ( $columns == '' ) {
            $columns = '100%';
        }
        $res_ctx->load_settings_raw( 'columns', $columns );

        // modules clearfix
        $padding = 'padding';
        switch ($columns) {
            case '100%':
                $res_ctx->load_settings_raw( $padding,  '1' );
                break;
            case '50%':
                $res_ctx->load_settings_raw( $padding,  '-n+2' );
                break;
            case '33.33333333%':
                $res_ctx->load_settings_raw( $padding,  '-n+3' );
                break;
            case '25%':
                $res_ctx->load_settings_raw( $padding,  '-n+4' );
                break;
            case '20%':
                $res_ctx->load_settings_raw( $padding,  '-n+5' );
                break;
            case '16.66666667%':
                $res_ctx->load_settings_raw( $padding,  '-n+6' );
                break;
            case '14.28571428%':
                $res_ctx->load_settings_raw( $padding,  '-n+7' );
                break;
            case '12.5%':
                $res_ctx->load_settings_raw( $padding,  '-n+8' );
                break;
            case '11.11111111%':
                $res_ctx->load_settings_raw( $padding,  '-n+9' );
                break;
            case '10%':
                $res_ctx->load_settings_raw( $padding,  '-n+10' );
                break;
        }

        // gap
        $gap = $res_ctx->get_shortcode_att('gap');
        $res_ctx->load_settings_raw( 'gap', $gap );
        if( $gap != '' ) {
            if( is_numeric( $gap ) ) {
                $res_ctx->load_settings_raw( 'gap', $gap / 2 . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'gap', '15px' );
        }
        // space
        $space = $res_ctx->get_shortcode_att('space');
        $res_ctx->load_settings_raw( 'space', $space );
        if( $space != '' ) {
            if( is_numeric( $space ) ) {
                $res_ctx->load_settings_raw( 'space', $space . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'space', '30px' );
        }

        // image height
        $img_height = $res_ctx->get_shortcode_att('img_height');
        $res_ctx->load_settings_raw( 'img_height', $img_height );
        if( $img_height != '' && is_numeric( $img_height ) ) {
            $res_ctx->load_settings_raw( 'img_height', $img_height . 'px' );
        }
        // image radius
        $img_radius = $res_ctx->get_shortcode_att('img_radius');
        $res_ctx->load_settings_raw( 'img_radius', $img_radius );
        if( $img_radius != '' && is_numeric( $img_radius ) ) {
            $res_ctx->load_settings_raw( 'img_radius', $img_radius . 'px' );
        }
        // show image
        $res_ctx->load_settings_raw( 'show_img', $res_ctx->get_shortcode_att('show_img') );

        // top info margin
        $info_margin1 = $res_ctx->get_shortcode_att('info_margin1');
        $res_ctx->load_settings_raw( 'info_margin1', $info_margin1 );
        if( $info_margin1 != '' && is_numeric( $info_margin1 ) ) {
            $res_ctx->load_settings_raw( 'info_margin1', $info_margin1 . 'px' );
        }
        // top info padding
        $info_padding1 = $res_ctx->get_shortcode_att('info_padding1');
        $res_ctx->load_settings_raw( 'info_padding1', $info_padding1 );
        if( $info_padding1 != '' && is_numeric( $info_padding1 ) ) {
            $res_ctx->load_settings_raw( 'info_padding1', $info_padding1 . 'px' );
        }
        // top info border size
        $info_border1 = $res_ctx->get_shortcode_att('info_border1');
        $res_ctx->load_settings_raw( 'info_border1', $info_border1 );
        if( $info_border1 != '' && is_numeric( $info_border1 ) ) {
            $res_ctx->load_settings_raw( 'info_border1', $info_border1 . 'px' );
        }
        // top info border style
        $res_ctx->load_settings_raw( 'info_border_style1', $res_ctx->get_shortcode_att('info_border_style1') );
        // top info horizontal align
        $info_horiz1 = $res_ctx->get_shortcode_att('info_horiz1');
        if( $info_horiz1 == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'info_horiz_center1', 1 );
        } else if ( $info_horiz1 == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'info_horiz_right1', 1 );
        }

        // bottom info margin
        $info_margin2 = $res_ctx->get_shortcode_att('info_margin2');
        $res_ctx->load_settings_raw( 'info_margin2', $info_margin2 );
        if( $info_margin2 != '' && is_numeric( $info_margin2 ) ) {
            $res_ctx->load_settings_raw( 'info_margin2', $info_margin2 . 'px' );
        }
        // bottom info padding
        $info_padding2 = $res_ctx->get_shortcode_att('info_padding2');
        $res_ctx->load_settings_raw( 'info_padding2', $info_padding2 );
        if( $info_padding2 != '' && is_numeric( $info_padding2 ) ) {
            $res_ctx->load_settings_raw( 'info_padding2', $info_padding2 . 'px' );
        }
        // bottom info border size
        $info_border2 = $res_ctx->get_shortcode_att('info_border2');
        $res_ctx->load_settings_raw( 'info_border2', $info_border2 );
        if( $info_border2 != '' && is_numeric( $info_border2 ) ) {
            $res_ctx->load_settings_raw( 'info_border2', $info_border2 . 'px' );
        }
        // bottom info border style
        $res_ctx->load_settings_raw( 'info_border_style2', $res_ctx->get_shortcode_att('info_border_style2') );
        // bottom info horizontal align
        $info_horiz2 = $res_ctx->get_shortcode_att('info_horiz2');
        if( $info_horiz2 == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'info_horiz_center2', 1 );
        } else if ( $info_horiz2 == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'info_horiz_right2', 1 );
        }

        // category name margin
        $name_margin = $res_ctx->get_shortcode_att('name_margin');
        $res_ctx->load_settings_raw( 'name_margin', $name_margin );
        if( $name_margin != '' && is_numeric( $name_margin ) ) {
            $res_ctx->load_settings_raw( 'name_margin', $name_margin . 'px' );
        }
        // category description margin
        $descr_margin = $res_ctx->get_shortcode_att('descr_margin');
        $res_ctx->load_settings_raw( 'descr_margin', $descr_margin );
        if( $descr_margin != '' && is_numeric( $descr_margin ) ) {
            $res_ctx->load_settings_raw( 'descr_margin', $descr_margin . 'px' );
        }
        // show description
        $name_pos = $res_ctx->get_shortcode_att('name_pos');
        $descr_pos = $res_ctx->get_shortcode_att('descr_pos');
        $show_descr = $res_ctx->get_shortcode_att('show_descr');
        $res_ctx->load_settings_raw( 'show_descr', $show_descr );
        if( $show_descr == 'none' ) {
            if( $descr_pos == '' || $descr_pos == 'above' ) {
                if( $name_pos != '' || $descr_pos != 'above' ) {
                    $res_ctx->load_settings_raw( 'hide_info_top', 1 );
                }
            } else {
                if( $name_pos != 'bellow' ) {
                    $res_ctx->load_settings_raw( 'hide_info_bottom', 1 );
                }
            }
        } else {
            if( $descr_pos == '' || $descr_pos == 'above' ) {
                if( $name_pos != '' || $descr_pos != 'above' ) {
                    $res_ctx->load_settings_raw( 'show_info_top', 1 );
                }
            } else {
                if( $name_pos != 'bellow' ) {
                    $res_ctx->load_settings_raw( 'show_info_bottom', 1 );
                }
            }
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'bg_color', $res_ctx->get_shortcode_att('bg_color') );

        $res_ctx->load_color_settings( 'img_overlay', 'img_overlay', 'img_overlay_gradient' );
        $res_ctx->load_color_settings( 'img_overlay_h', 'img_overlay_h', 'img_overlay_h_gradient' );

        $res_ctx->load_settings_raw( 'info_bg_color1', $res_ctx->get_shortcode_att('info_bg_color1') );
        $res_ctx->load_settings_raw( 'info_border_color1', $res_ctx->get_shortcode_att('info_border_color1') );

        $res_ctx->load_settings_raw( 'info_bg_color2', $res_ctx->get_shortcode_att('info_bg_color2') );
        $res_ctx->load_settings_raw( 'info_border_color2', $res_ctx->get_shortcode_att('info_border_color2') );

        $res_ctx->load_settings_raw( 'name_color', $res_ctx->get_shortcode_att('name_color') );
        $res_ctx->load_settings_raw( 'name_color_h', $res_ctx->get_shortcode_att('name_color_h') );

        $res_ctx->load_settings_raw( 'descr_color', $res_ctx->get_shortcode_att('descr_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_name' );
        $res_ctx->load_font_settings( 'f_descr' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_archive_product_page;
	    $subcategories = $td_woo_state_archive_product_page->subcategories->__invoke($atts);
        
        parent::render($atts);

        $name_pos = $this->get_att('name_pos');
        $descr_pos = $this->get_att('descr_pos');


        $buffy = '';

        if ( empty($subcategories) ) {
            if ( ! ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) ) {
                return $buffy;
            }
        }

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            // block title wrap
            $buffy .= '<div class="td-block-title-wrap">';
                $buffy .= $this->get_block_title(); //get the block title
                $buffy .= $this->get_pull_down_filter(); //get the sub category filter for this block
            $buffy .= '</div>';

            $buffy .= '<div class="tdw-block-inner td-fix-index">';

	            if ( ! empty( $subcategories ) ) {

                    foreach ( $subcategories as $subcategory ) {
                        $cat_link = $subcategory['category_link'];
                        $cat_name_html = '<h3 class="tdw-as-name"><a href="' . $cat_link . '">' . $subcategory['category_name'] . '</a></h3>';
                        $cat_descr = $subcategory['category_descr'];
                        $cat_descr_html = '<p class="tdw-as-descr">' . $subcategory['category_descr'] . '</p>';

                        $buffy .= '<div class="tdw-as-subcat">';
                            $buffy .= '<div class="tdw-as-subcat-inner">';
                                if( $name_pos == 'above' || ( $cat_descr != '' && $descr_pos == 'above' ) ) {
                                    $buffy .= '<div class="tdw-as-subcat-info tdw-as-subcat-info-top">';
                                        if( $name_pos == 'above' ) {
                                            $buffy .= $cat_name_html;
                                        }

                                        if( $cat_descr != '' && $descr_pos == 'above' ) {
                                            $buffy .= $cat_descr_html;
                                        }
                                    $buffy .= '</div>';
                                }

                                $buffy .= '<a class="tdw-as-img" href="' . $cat_link . '" style="background-image:url(' . $subcategory['category_img'] . ')"></a>';

                                if( $name_pos == 'bellow' || ( $cat_descr != '' && $descr_pos == 'bellow' ) ) {
                                    $buffy .= '<div class="tdw-as-subcat-info tdw-as-subcat-info-bottom">';
                                        if( $name_pos == 'bellow' ) {
                                            $buffy .= $cat_name_html;
                                        }

                                        if( $cat_descr != '' && $descr_pos == 'bellow' ) {
                                            $buffy .= $cat_descr_html;
                                        }
                                    $buffy .= '</div>';
                                }
                            $buffy .= '</div>';
                        $buffy .= '</div>';

                    }

	            }

            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

