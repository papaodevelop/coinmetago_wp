<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */
class tds_tabbed_content2 extends td_style {

    private $unique_style_class;
    private $atts = array();
    private $index_style;

    function __construct($atts, $unique_block_class = '', $index_style = '') {
        $this->atts = $atts;
        $this->unique_block_class = $unique_block_class;
        $this->index_style = $index_style;
    }

    private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;
        $unique_block_class = $this->unique_block_class;

        $raw_css =
            "<style>

				/* @specific_style_tds_tabbed_content2 */
				@media (max-width: 767px) {
				    .tds_tabbed_content2 > .td_block_inner {
				        flex-direction: column;
				    }
				}
                .tds_tabbed_content2 .td-tc-tabs {
                    flex-direction: column;
                    width: 200px; 
                }
                @media (max-width: 767px) {
                    .tds_tabbed_content2 .td-tc-tabs {
                        display: block;
                        overflow-x: auto;
                        overflow-y: hidden;
                        font-size: 0;
                        white-space: nowrap;
                        width: 100% !important; 
                    }
                }
                .tds_tabbed_content2 .td-tc-tabs:before {
                    content: '';
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    width: 1px;
                    height: 100%;
                    background-color: #d7d7d7;
                }
                @media (max-width: 767px) {
                    .tds_tabbed_content2 .td-tc-tabs:before {
                        width: 100%;
                        height: 1px;
                    }
                }
                .tds_tabbed_content2 .td-tc-tab {
                    padding: 5px 25px 5px 0;
                    font-size: 14px;
                    line-height: 1;
                    font-weight: 600;
                    color: #1D2327;
                    transition: color 0.2s ease-in-out;
                    cursor: pointer;
                }
                @media (max-width: 767px) {
                    .tds_tabbed_content2 .td-tc-tab {
                        display: inline-flex;
                        padding: 5px 0 20px;
                    }
                }
                .tds_tabbed_content2 .td-tc-tab:after {
                    content: '';
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    width: 3px;
                    height: 100%;
                    background-color: transparent;
                    transition: background-color 0.2s ease-in-out;
                }
                @media (max-width: 767px) {
                    .tds_tabbed_content2 .td-tc-tab:after {
                        width: 100%;
                        height: 3px;
                    }
                }
                .tds_tabbed_content2 .td-tc-tab:not(:last-child) {
                    margin: 0 0 16px;
                }
                @media (max-width: 767px) {
                    .tds_tabbed_content2 .td-tc-tab:not(:last-child) {
                        margin: 0 20px 0 0;
                    }
                }
                .tds_tabbed_content2 .td-tc-tab-icon {
                    font-size: 14px;
                }
                .tds_tabbed_content2 .td-tc-tab svg {
                    display: block; 
                    width: 14px;
                    height: auto;
                    fill: #1D2327;
                    transition: fill .2s ease-in-out;
                }
                .tds_tabbed_content2 .td-tc-tab:not(.td-tc-tab-active):hover:after {
                    background-color: #d7d7d7;
                }
                .tds_tabbed_content2 .td-tc-tab-active {
                    color: #4db2ec;
                }
                .tds_tabbed_content2 .td-tc-tab-active:after {
                    background-color: #4db2ec;
                }
                .tds_tabbed_content2 .td-tc-tab-active svg {
                    fill: #4db2ec;
                }
                .tds_tabbed_content2 .td-tc-content {
                    flex: 1;
                }
                .tds_tabbed_content2 .td-tc-page-content {
                    padding: 0 0 0 30px;
                }
                @media (max-width: 767px) {
                    .tds_tabbed_content2 .td-tc-page-content {
                        padding: 30px 0 0;
                    }
                }
                
                
                /* @tabs_width */
                body .$unique_block_class .td-tc-tabs {
                    width: @tabs_width;
                }
                /* @tabs_border */
                body .$unique_block_class .td-tc-tabs:before {
                    width: @tabs_border;
                    height: 100%;
                }
                /* @tabs_border_mob */
                body .$unique_block_class .td-tc-tabs:before {
                    width: 100%;
                    height: @tabs_border_mob;
                }
                
                /* @tab_space */
                body .$unique_block_class .td-tc-tab:not(:last-child) {
                    margin: 0 0 @tab_space;
                }
                /* @tab_space_mob */
                body .$unique_block_class .td-tc-tab:not(:last-child) {
                    margin: 0 @tab_space_mob 0 0;
                }
                /* @tab_padd */
                body .$unique_block_class .td-tc-tab {
                    padding: @tab_padd;
                }
                /* @tab_horiz */
                body .$unique_block_class .td-tc-tab {
                    justify-content: @tab_horiz;
                }
                /* @tab_border */
                body .$unique_block_class .td-tc-tab:after {
                    width: @tab_border;
                    height: 100%;
                }
                /* @tab_border_mob */
                body .$unique_block_class .td-tc-tab:after {
                    width: 100%;
                    height: @tab_border_mob;
                }
                
                /* @icon_pos */
                body .$unique_block_class .td-tc-tab-txt {
                    order: 1;
                }
                body .$unique_block_class .td-tc-tab-icon {
                    order: 2;
                }
                /* @icon_size */
                body .$unique_block_class .td-tc-tab-icon {
                    font-size: @icon_size;
                }
                /* @icon_space_right */
                body .$unique_block_class .td-tc-tab-icon {
                    margin-right: @icon_space_right;
                }
                /* @icon_space_left */
                body .$unique_block_class .td-tc-tab-icon {
                    margin-left: @icon_space_left;
                }
                
                /* @content_padd */
                body .$unique_block_class .td-tc-page-content {
                    padding: @content_padd;
                }
                
                
                /* @tabs_border_color */
                body .$unique_block_class .td-tc-tabs:before,
                body .$unique_block_class .td-tc-tab:not(.td-tc-tab-active):hover:after {
                    background-color: @tabs_border_color;
                }
                
                /* @tab_border_color */
                body .$unique_block_class .td-tc-tab:not(:hover):not(.td-tc-tab-active):after {
                    background-color: @tab_border_color;
                }
                /* @tab_border_color_h */
                body .$unique_block_class .td-tc-tab:not(.td-tc-tab-active):hover:after {
                    background-color: @tab_border_color_h;
                }
                /* @tab_border_color_a */
                body .$unique_block_class .td-tc-tab-active:after {
                    background-color: @tab_border_color_a;
                }
                
                /* @txt_color */
                body .$unique_block_class .td-tc-tab {
                    color: @txt_color;
                }
                body .$unique_block_class .td-tc-tab-icon svg {
                    fill: @txt_color;
                }
                /* @txt_color_h */
                body .$unique_block_class .td-tc-tab:hover {
                    color: @txt_color_h;
                }
                body .$unique_block_class .td-tc-tab:hover .td-tc-tab-icon svg {
                    fill: @txt_color_h;
                }
                /* @txt_color_a */
                body .$unique_block_class .td-tc-tab-active {
                    color: @txt_color_a;
                }
                body .$unique_block_class .td-tc-tab-active .td-tc-tab-icon svg {
                    fill: @txt_color_a;
                }
                
                /* @icon_color */
                body .$unique_block_class .td-tc-tab-icon {
                    color: @icon_color;
                }
                body .$unique_block_class .td-tc-tab-icon svg {
                    fill: @icon_color;
                }
                /* @icon_color_h */
                body .$unique_block_class .td-tc-tab:hover .td-tc-tab-icon {
                    color: @icon_color_h;
                }
                body .$unique_block_class .td-tc-tab:hover .td-tc-tab-icon svg {
                    fill: @icon_color_h;
                }
                /* @icon_color_a */
                body .$unique_block_class .td-tc-tab-active .td-tc-tab-icon {
                    color: @icon_color_a;
                }
                body .$unique_block_class .td-tc-tab-active .td-tc-tab-icon svg {
                    fill: @icon_color_a;
                }
                
                
                /* @f_txt */
                body .$unique_block_class .td-tc-tab-txt {
                    @f_txt
                }

			</style>";


        $td_css_res_compiler = new td_css_res_compiler($raw_css);
        $td_css_res_compiler->load_settings(__CLASS__ . '::cssMedia', $this->atts);

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    /**
     * Callback pe media
     *
     * @param $responsive_context td_res_context
     * @param $atts
     */
    static function cssMedia($res_ctx) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw('specific_style_tds_tabbed_content2', 1);


        /*-- LAYOUT -- */
        // tabs width
        $tabs_width = $res_ctx->get_style_att('tabs_width', __CLASS__);
        $res_ctx->load_settings_raw('tabs_width', $tabs_width);
        if( $tabs_width != '' && is_numeric( $tabs_width ) ) {
            $res_ctx->load_settings_raw('tabs_width', $tabs_width . 'px');
        }

        // tabs right border size
        $tabs_border = $res_ctx->get_style_att('tabs_border', __CLASS__);
        if( $res_ctx->is('phone') ) {
            $res_ctx->load_settings_raw('tabs_border_mob', $tabs_border);
            if( $tabs_border != '' && is_numeric( $tabs_border ) ) {
                $res_ctx->load_settings_raw('tabs_border_mob', $tabs_border . 'px');
            }
        } else {
            $res_ctx->load_settings_raw('tabs_border', $tabs_border);
            if( $tabs_border != '' && is_numeric( $tabs_border ) ) {
                $res_ctx->load_settings_raw('tabs_border', $tabs_border . 'px');
            }
        }



        // tab space
        $tab_space = $res_ctx->get_style_att('tab_space', __CLASS__);
        if( $res_ctx->is('phone') ) {
            $res_ctx->load_settings_raw('tab_space_mob', $tab_space);
            if( $tab_space != '' && is_numeric( $tab_space ) ) {
                $res_ctx->load_settings_raw('tab_space_mob', $tab_space . 'px');
            }
        } else {
            $res_ctx->load_settings_raw('tab_space', $tab_space);
            if( $tab_space != '' && is_numeric( $tab_space ) ) {
                $res_ctx->load_settings_raw('tab_space', $tab_space . 'px');
            }
        }

        // tab padding
        $tab_padd = $res_ctx->get_style_att('tab_padd', __CLASS__);
        $res_ctx->load_settings_raw('tab_padd', $tab_padd);
        if( $tab_padd != '' && is_numeric( $tab_padd ) ) {
            $res_ctx->load_settings_raw('tab_padd', $tab_padd . 'px');
        }

        // tab horizontal align
        $tab_horiz_align = $res_ctx->get_style_att('tab_horiz', __CLASS__);
        if( $tab_horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw('tab_horiz', 'flex-start');
        } else if( $tab_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw('tab_horiz', 'center');
        } else if( $tab_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw('tab_horiz', 'flex-end');
        }

        // tab right border size
        $tab_border = $res_ctx->get_style_att('tab_border', __CLASS__);
        if( $res_ctx->is('phone') ) {
            $res_ctx->load_settings_raw('tab_border_mob', $tab_border);
            if( $tab_border != '' && is_numeric( $tab_border ) ) {
                $res_ctx->load_settings_raw('tab_border_mob', $tab_border . 'px');
            }
        } else {
            $res_ctx->load_settings_raw('tab_border', $tab_border);
            if( $tab_border != '' && is_numeric( $tab_border ) ) {
                $res_ctx->load_settings_raw('tab_border', $tab_border . 'px');
            }
        }


        // tab icons position
        $icon_pos = $res_ctx->get_style_att('icon_pos', __CLASS__);
        $res_ctx->load_settings_raw('icon_pos', $icon_pos);

        // tab icons size
        $icon_size = $res_ctx->get_style_att('icon_size', __CLASS__);
        $res_ctx->load_settings_raw('icon_size', $icon_size);
        if( $icon_size != '' && is_numeric( $icon_size ) ) {
            $res_ctx->load_settings_raw('icon_size', $icon_size . 'px');
        }

        // tab icons space
        $icon_space = $res_ctx->get_style_att('icon_space', __CLASS__);
        if( $icon_pos == '' ) {
            $res_ctx->load_settings_raw('icon_space_right', $icon_space);
            if( $icon_space != '' ) {
                if( is_numeric( $icon_space ) ) {
                    $res_ctx->load_settings_raw('icon_space_right', $icon_space . 'px');
                }
            } else {
                $res_ctx->load_settings_raw('icon_space_right', '8px');
            }
        } else if ( $icon_pos == 'after' ) {
            $res_ctx->load_settings_raw('icon_space_left', $icon_space);
            if( $icon_space != '' ) {
                if( is_numeric( $icon_space ) ) {
                    $res_ctx->load_settings_raw('icon_space_left', $icon_space . 'px');
                }
            } else {
                $res_ctx->load_settings_raw('icon_space_left', '8px');
            }
        }


        // content padding
        $content_padd = $res_ctx->get_style_att('content_padd', __CLASS__);
        $res_ctx->load_settings_raw('content_padd', $content_padd);
        if( $content_padd != '' && is_numeric( $content_padd ) ) {
            $res_ctx->load_settings_raw('content_padd', $content_padd . 'px');
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('tabs_border_color', $res_ctx->get_style_att('tabs_border_color', __CLASS__));

        $res_ctx->load_settings_raw('tab_border_color', $res_ctx->get_style_att('tab_border_color', __CLASS__));
        $res_ctx->load_settings_raw('tab_border_color_h', $res_ctx->get_style_att('tab_border_color_h', __CLASS__));
        $res_ctx->load_settings_raw('tab_border_color_a', $res_ctx->get_style_att('tab_border_color_a', __CLASS__));

        $res_ctx->load_settings_raw('txt_color', $res_ctx->get_style_att('txt_color', __CLASS__));
        $res_ctx->load_settings_raw('txt_color_h', $res_ctx->get_style_att('txt_color_h', __CLASS__));
        $res_ctx->load_settings_raw('txt_color_a', $res_ctx->get_style_att('txt_color_a', __CLASS__));

        $res_ctx->load_settings_raw('icon_color', $res_ctx->get_style_att('icon_color', __CLASS__));
        $res_ctx->load_settings_raw('icon_color_h', $res_ctx->get_style_att('icon_color_h', __CLASS__));
        $res_ctx->load_settings_raw('icon_color_a', $res_ctx->get_style_att('icon_color_a', __CLASS__));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_txt', __CLASS__ );

    }

    function render($index_style = '') {

        if (!empty($index_style)) {
            $this->index_style = $index_style;
        }
        $this->unique_style_class = td_global::td_generate_unique_id();


        return $this->get_style($this->get_css());
    }

    function get_style_att($att_name) {
        return $this->get_att($att_name, __CLASS__, $this->index_style);
    }

    function get_atts()
    {
        return $this->atts;
    }
}