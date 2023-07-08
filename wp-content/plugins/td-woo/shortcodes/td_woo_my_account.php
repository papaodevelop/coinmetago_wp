<?php

/**
 * Class td_woo_my_account - wrapper shortcode for rendering the woocommerce my account shortcode
 */
class td_woo_my_account extends td_block {

    public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @general */
                .$unique_block_class .woocommerce form button.button {
                    border: 1px solid transparent;
                }
            
                /* @composer_styles */
                .$unique_block_class .tdw-block-inner > .woocommerce {
                    pointer-events: none;
                }
                
                
               
                /* @input_border_radius */
                .$unique_block_class .woocommerce form .form-row input.input-text,
                .$unique_block_class .woocommerce .select2-selection {
                    border-radius: @input_border_radius;
                }
                
                /* @btn_border_radius */
                .$unique_block_class .woocommerce form button.button {
                    border-radius: @btn_border_radius;
                }
                
                /* @table_border_radius */
                .$unique_block_class .woocommerce table.shop_table,
                .$unique_block_class .woocommerce .woocommerce-customer-details address {
                    border-radius: @table_border_radius;
                }
                
                /* @table_btn_radius */
                .$unique_block_class .woocommerce table.shop_table a.button {
                    border-radius: @table_btn_radius;
                }
                
                /* @g_box_border_radius */
                .$unique_block_class .woocommerce #customer_login .woocommerce-form-login,
                .$unique_block_class .woocommerce #customer_login .woocommerce-form-register {
                    border-radius: @g_box_border_radius;
                }
                
                
                
                /* @texts_color */
                .$unique_block_class .woocommerce .woocommerce-MyAccount-content > p,
                .$unique_block_class .woocommerce .woocommerce-MyAccount-content > p a {
                    color: @texts_color;
                }
                
                /* @label_color */
                .$unique_block_class .woocommerce form .form-row label {
                    color: @label_color;
                }
                
                /* @input_color */
                .$unique_block_class .woocommerce form .form-row input.input-text,
                .$unique_block_class .woocommerce .select2-selection .select2-selection__rendered {
                    color: @input_color;
                }
                .$unique_block_class .woocommerce .select2-selection .select2-selection__arrow b {
                    border-color: @input_color transparent transparent transparent;
                }
                /* @input_color_f */
                .$unique_block_class .woocommerce form .form-row input.input-text:focus,
                .$unique_block_class .woocommerce .select2-container--open .select2-selection .select2-selection__rendered {
                    color: @input_color_f;
                }
                .$unique_block_class .woocommerce .select2-container--open .select2-selection .select2-selection__arrow b {
                    border-color: transparent transparent @input_color_f transparent;
                }
                /* @input_place_color */
                .$unique_block_class .woocommerce form .form-row input.input-text::placeholder {
                    color: @input_place_color;
                }
                /* @input_help_color */
                .$unique_block_class .woocommerce form .form-row span em {
                    color: @input_help_color;
                }
                /* @input_bg */
                .$unique_block_class .woocommerce form .form-row input.input-text,
                .$unique_block_class .woocommerce .select2-selection {
                    background-color: @input_bg;
                }
                /* @input_bg_f */
                .$unique_block_class .woocommerce form .form-row input.input-text:focus,
                .$unique_block_class .woocommerce .select2-container--open .select2-selection {
                    background-color: @input_bg_f;
                }
                /* @input_border_color */
                .$unique_block_class .woocommerce form .form-row input.input-text,
                .$unique_block_class .woocommerce .select2-selection {
                    border-color: @input_border_color;
                }
                /* @input_border_color_f */
                .$unique_block_class .woocommerce form .form-row input.input-text:focus,
                .$unique_block_class .woocommerce .select2-container--open .select2-selection {
                    border-color: @input_border_color_f;
                }
                
                /* @form_ex_color */
                .$unique_block_class .woocommerce form p:not(.form-row):not(:last-child),
                .$unique_block_class .woocommerce .woocommerce-privacy-policy-text p {
                    color: @form_ex_color;
                }
                /* @form_a_color */
                .$unique_block_class .woocommerce form a {
                    color: @form_a_color;
                }
                /* @form_a_color_h */
                .$unique_block_class .woocommerce form a:hover {
                    color: @form_a_color_h;
                }
                
                /* @btn_color */
                .$unique_block_class .woocommerce form button.button {
                    color: @btn_color;
                }
                /* @btn_color_h */
                .$unique_block_class .woocommerce form button.button:hover {
                    color: @btn_color_h;
                }
                /* @btn_bg */
                .$unique_block_class .woocommerce form button.button {
                    background-color: @btn_bg;
                }
                /* @btn_bg_h */
                .$unique_block_class .woocommerce form button.button:hover {
                    background-color: @btn_bg_h;
                }
                /* @btn_border_color */
                .$unique_block_class .woocommerce form button.button {
                    border-color: @btn_border_color;
                }
                /* @btn_border_color_h */
                .$unique_block_class .woocommerce form button.button:hover {
                    border-color: @btn_border_color_h;
                }
                
                
                /* @table_head_color */
                .$unique_block_class .woocommerce table.shop_table thead,
                .$unique_block_class .woocommerce table.shop_table thead a {
                    color: @table_head_color;
                }
                /* @table_body_color */
                .$unique_block_class .woocommerce table.shop_table tbody,
                .$unique_block_class .woocommerce table.shop_table tbody a:not(.button),
                .$unique_block_class .woocommerce .woocommerce-customer-details address {
                    color: @table_body_color;
                }
                /* @table_foot_color */
                .$unique_block_class .woocommerce table.shop_table tfoot,
                .$unique_block_class .woocommerce table.shop_table tfoot a {
                    color: @table_foot_color;
                }
                /* @table_bg */
                .$unique_block_class .woocommerce table.shop_table,
                .$unique_block_class .woocommerce .woocommerce-customer-details address {
                    background-color: @table_bg;
                }
                /* @table_border_color */
                .$unique_block_class .woocommerce table.shop_table,
                .$unique_block_class .woocommerce .woocommerce-customer-details address {
                    border-color: @table_border_color;
                }
                .$unique_block_class .woocommerce table.shop_table td,
                .$unique_block_class .woocommerce table.shop_table th {
                    border-top-color: @table_border_color;
                }
                /* @table_btn_color */
                .$unique_block_class .woocommerce table.shop_table a.button {
                    color: @table_btn_color;
                }
                /* @table_btn_color_h */
                .$unique_block_class .woocommerce table.shop_table a.button:hover {
                    color: @table_btn_color_h;
                }
                /* @table_btn_bg */
                .$unique_block_class .woocommerce table.shop_table a.button {
                    background-color: @table_btn_bg;
                }
                /* @table_btn_bg_h */
                .$unique_block_class .woocommerce table.shop_table a.button:hover {
                    background-color: @table_btn_bg_h;
                }
                
                
                /* @nav_bg */
                .$unique_block_class .woocommerce .woocommerce-MyAccount-navigation {
                    background-color: @nav_bg;
                }
                /* @nav_a_color */
                .$unique_block_class .woocommerce .woocommerce-MyAccount-navigation a {
                    color: @nav_a_color;
                }
                /* @nav_a_color_h */
                .$unique_block_class .woocommerce .woocommerce-MyAccount-navigation li.is-active a,
                .$unique_block_class .woocommerce .woocommerce-MyAccount-navigation a:hover {
                    color: @nav_a_color_h;
                }
                
                
                /* @order_titles_color */
                .$unique_block_class .woocommerce .woocommerce-order-downloads h2,
                .$unique_block_class .woocommerce .woocommerce-order-details h2,
                .$unique_block_class .woocommerce .woocommerce-customer-details h2 {
                    color: @order_titles_color;
                }
                
                
                /* @add_title_color */
                .$unique_block_class .woocommerce h3 {
                    color: @add_title_color;
                }
                /* @add_color */
                .$unique_block_class .woocommerce .woocommerce-Address-title a,
                .$unique_block_class .woocommerce .woocommerce-Address address {
                    color: @add_color;
                }
                
                
                /* @pass_title_color */
                .$unique_block_class .woocommerce form fieldset legend {
                    color: @pass_title_color;
                }
                /* @pass_box_bg */
                .$unique_block_class .woocommerce form fieldset {
                    background-color: @pass_box_bg;
                }
                /* @pass_box_border_color */
                .$unique_block_class .woocommerce form fieldset {
                    border-color: @pass_box_border_color;
                }
                
                
                /* @g_title_color */
                .$unique_block_class .woocommerce #customer_login h2 {
                    color: @g_title_color;
                }
                /* @g_box_bg */
                .$unique_block_class .woocommerce #customer_login .woocommerce-form-login,
                .$unique_block_class .woocommerce #customer_login .woocommerce-form-register {
                    background-color: @g_box_bg;
                }
                /* @g_box_border_color */
                .$unique_block_class .woocommerce #customer_login .woocommerce-form-login,
                .$unique_block_class .woocommerce #customer_login .woocommerce-form-register {
                    border-color: @g_box_border_color;
                }
                
                
                
                /* @f_texts */
                .$unique_block_class .woocommerce .woocommerce-MyAccount-content > p {
                    @f_texts
                }
                
                /* @f_label */
                .$unique_block_class .woocommerce form .form-row label {
                    @f_label
                }
                /* @f_input */
                .$unique_block_class .woocommerce form .form-row input.input-text,
                .$unique_block_class .woocommerce .select2-selection .select2-selection__rendered {
                    @f_input
                }
                /* @f_help */
                .$unique_block_class .woocommerce form .form-row span em {
                    @f_help
                }
                /* @f_f_extra */
                .$unique_block_class .woocommerce form p:not(.form-row):not(:last-child),
                .$unique_block_class .woocommerce .woocommerce-privacy-policy-text p {
                    @f_f_extra;
                }
                /* @f_btn */
                .$unique_block_class .woocommerce form button.button {
                    @f_btn
                }
                
                /* @f_t_head */
                .$unique_block_class .woocommerce table.shop_table thead {
                    @f_t_head
                }
                /* @f_t_body */
                .$unique_block_class .woocommerce table.shop_table tbody,
                .$unique_block_class .woocommerce .woocommerce-customer-details address {
                    @f_t_body
                }
                /* @f_t_foot */
                .$unique_block_class .woocommerce table.shop_table tfoot {
                    @f_t_foot
                }
                /* @f_t_btn */
                .$unique_block_class .woocommerce table.shop_table a.button {
                    @f_t_btn
                }
                
                /* @f_nav */
                .$unique_block_class .woocommerce .woocommerce-MyAccount-navigation a {
                    @f_nav
                }
                
                /* @f_order_title */
                .$unique_block_class .woocommerce .woocommerce-order-downloads h2,
                .$unique_block_class .woocommerce .woocommerce-order-details h2,
                .$unique_block_class .woocommerce .woocommerce-customer-details h2 {
                    @f_order_title
                }
                
                /* @f_add_title */
                .$unique_block_class .woocommerce h3 {
                    @f_add_title
                }
                /* @f_add */
                .$unique_block_class .woocommerce .woocommerce-Address-title a,
                .$unique_block_class .woocommerce .woocommerce-Address address {
                    @f_add
                }
                
                /* @f_pass_title */
                .$unique_block_class .woocommerce form fieldset legend {
                    @f_pass_title
                }
                
                /* @f_g_title */
                .$unique_block_class .woocommerce #customer_login h2 {
                    @f_g_title
                }
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'general', 1 );

        if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe()) {
            $res_ctx->load_settings_raw( 'composer_styles', 1 );
        }



        /*-- LAYOUT -- */
        // form inputs border radius
        $input_border_radius = $res_ctx->get_shortcode_att('input_border_radius');
        $res_ctx->load_settings_raw( 'input_border_radius', $input_border_radius );
        if( $input_border_radius != '' && is_numeric( $input_border_radius ) ) {
            $res_ctx->load_settings_raw( 'input_border_radius', $input_border_radius . 'px' );
        }

        // form buttons border radius
        $btn_border_radius = $res_ctx->get_shortcode_att('btn_border_radius');
        $res_ctx->load_settings_raw( 'btn_border_radius', $btn_border_radius );
        if( $btn_border_radius != '' && is_numeric( $btn_border_radius ) ) {
            $res_ctx->load_settings_raw( 'btn_border_radius', $btn_border_radius . 'px' );
        }

        // tables border radius
        $table_border_radius = $res_ctx->get_shortcode_att('table_border_radius');
        $res_ctx->load_settings_raw( 'table_border_radius', $table_border_radius );
        if( $table_border_radius != '' && is_numeric( $table_border_radius ) ) {
            $res_ctx->load_settings_raw( 'table_border_radius', $table_border_radius . 'px' );
        }

        // tables buttons border radius
        $table_btn_radius = $res_ctx->get_shortcode_att('table_btn_radius');
        $res_ctx->load_settings_raw( 'table_btn_radius', $table_btn_radius );
        if( $table_btn_radius != '' && is_numeric( $table_btn_radius ) ) {
            $res_ctx->load_settings_raw( 'table_btn_radius', $table_btn_radius . 'px' );
        }

        // guest boxes border radius
        $g_box_border_radius = $res_ctx->get_shortcode_att('g_box_border_radius');
        $res_ctx->load_settings_raw( 'g_box_border_radius', $g_box_border_radius );
        if( $g_box_border_radius != '' && is_numeric( $g_box_border_radius ) ) {
            $res_ctx->load_settings_raw( 'g_box_border_radius', $g_box_border_radius . 'px' );
        }



        /*-- COLORS -- */
        /* -- general -- */
        // Forms
        $res_ctx->load_settings_raw('label_color', $res_ctx->get_shortcode_att('label_color'));
        $res_ctx->load_settings_raw('texts_color', $res_ctx->get_shortcode_att('texts_color'));
        $res_ctx->load_settings_raw('input_color', $res_ctx->get_shortcode_att('input_color'));
        $res_ctx->load_settings_raw('input_color_f', $res_ctx->get_shortcode_att('input_color_f'));
        $res_ctx->load_settings_raw('input_place_color', $res_ctx->get_shortcode_att('input_place_color'));
        $res_ctx->load_settings_raw('input_help_color', $res_ctx->get_shortcode_att('input_help_color'));
        $res_ctx->load_settings_raw('input_bg', $res_ctx->get_shortcode_att('input_bg'));
        $res_ctx->load_settings_raw('input_bg_f', $res_ctx->get_shortcode_att('input_bg_f'));
        $res_ctx->load_settings_raw('input_border_color', $res_ctx->get_shortcode_att('input_border_color'));
        $res_ctx->load_settings_raw('input_border_color_f', $res_ctx->get_shortcode_att('input_border_color_f'));
        $res_ctx->load_settings_raw('form_ex_color', $res_ctx->get_shortcode_att('form_ex_color'));
        $res_ctx->load_settings_raw('form_a_color', $res_ctx->get_shortcode_att('form_a_color'));
        $res_ctx->load_settings_raw('form_a_color_h', $res_ctx->get_shortcode_att('form_a_color_h'));
        $res_ctx->load_settings_raw('btn_color', $res_ctx->get_shortcode_att('btn_color'));
        $res_ctx->load_settings_raw('btn_color_h', $res_ctx->get_shortcode_att('btn_color_h'));
        $res_ctx->load_settings_raw('btn_bg', $res_ctx->get_shortcode_att('btn_bg'));
        $res_ctx->load_settings_raw('btn_bg_h', $res_ctx->get_shortcode_att('btn_bg_h'));
        $res_ctx->load_settings_raw('btn_border_color', $res_ctx->get_shortcode_att('btn_border_color'));
        $res_ctx->load_settings_raw('btn_border_color_h', $res_ctx->get_shortcode_att('btn_border_color_h'));


        /* -- logged in -- */
        // Tables
        $res_ctx->load_settings_raw('table_head_color', $res_ctx->get_shortcode_att('table_head_color'));
        $res_ctx->load_settings_raw('table_body_color', $res_ctx->get_shortcode_att('table_body_color'));
        $res_ctx->load_settings_raw('table_foot_color', $res_ctx->get_shortcode_att('table_foot_color'));
        $res_ctx->load_settings_raw('table_bg', $res_ctx->get_shortcode_att('table_bg'));
        $res_ctx->load_settings_raw('table_border_color', $res_ctx->get_shortcode_att('table_border_color'));
        $res_ctx->load_settings_raw('table_btn_color', $res_ctx->get_shortcode_att('table_btn_color'));
        $res_ctx->load_settings_raw('table_btn_color_h', $res_ctx->get_shortcode_att('table_btn_color_h'));
        $res_ctx->load_settings_raw('table_btn_bg', $res_ctx->get_shortcode_att('table_btn_bg'));
        $res_ctx->load_settings_raw('table_btn_bg_h', $res_ctx->get_shortcode_att('table_btn_bg_h'));

        // Navigation
        $res_ctx->load_settings_raw('nav_bg', $res_ctx->get_shortcode_att('nav_bg'));
        $res_ctx->load_settings_raw('nav_a_color', $res_ctx->get_shortcode_att('nav_a_color'));
        $res_ctx->load_settings_raw('nav_a_color_h', $res_ctx->get_shortcode_att('nav_a_color_h'));

        // Dashboard
        $res_ctx->load_settings_raw('dash_color', $res_ctx->get_shortcode_att('dash_color'));

        // Order details
        $res_ctx->load_settings_raw('order_titles_color', $res_ctx->get_shortcode_att('order_titles_color'));

        // Addresses
        $res_ctx->load_settings_raw('add_title_color', $res_ctx->get_shortcode_att('add_title_color'));
        $res_ctx->load_settings_raw('add_color', $res_ctx->get_shortcode_att('add_color'));

        // Account details
        $res_ctx->load_settings_raw('pass_title_color', $res_ctx->get_shortcode_att('pass_title_color'));
        $res_ctx->load_settings_raw('pass_box_bg', $res_ctx->get_shortcode_att('pass_box_bg'));
        $res_ctx->load_settings_raw('pass_box_border_color', $res_ctx->get_shortcode_att('pass_box_border_color'));


        /* -- guest -- */
        $res_ctx->load_settings_raw('g_title_color', $res_ctx->get_shortcode_att('g_title_color'));

        // Boxes
        $res_ctx->load_settings_raw('g_box_bg', $res_ctx->get_shortcode_att('g_box_bg'));
        $res_ctx->load_settings_raw('g_box_border_color', $res_ctx->get_shortcode_att('g_box_border_color'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_texts' );

        $res_ctx->load_font_settings( 'f_label' );
        $res_ctx->load_font_settings( 'f_input' );
        $res_ctx->load_font_settings( 'f_help' );
        $res_ctx->load_font_settings( 'f_f_extra' );
        $res_ctx->load_font_settings( 'f_btn' );

        $res_ctx->load_font_settings( 'f_t_head' );
        $res_ctx->load_font_settings( 'f_t_body' );
        $res_ctx->load_font_settings( 'f_t_foot' );
        $res_ctx->load_font_settings( 'f_t_btn' );

        $res_ctx->load_font_settings( 'f_nav' );

        $res_ctx->load_font_settings( 'f_dash' );

        $res_ctx->load_font_settings( 'f_order_title' );

        $res_ctx->load_font_settings( 'f_add_title' );
        $res_ctx->load_font_settings( 'f_add' );

        $res_ctx->load_font_settings( 'f_pass_title' );

        $res_ctx->load_font_settings( 'f_g_title' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render( $atts, $content = null ) {
        
        parent::render( $atts );

        $show_page = $this->get_att('show_page');
        $woocommerce_my_account = '';

        if( !td_util::tdc_is_live_editor_iframe() && !td_util::tdc_is_live_editor_ajax() ) {
            // render the woocommerce_my_account shortcode
            $woocommerce_my_account = do_shortcode('[woocommerce_my_account]');
        } else {
            $woocommerce_my_account =
                '<div class="woocommerce">';
                    if( $show_page != 'guest' ) {
                        $woocommerce_my_account .=
                            '<nav class="woocommerce-MyAccount-navigation">
                                <ul>
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard ' . ( $show_page == '' ? 'is-active' : '' ) . '">
                                        <a href="#">Dashboard</a>
                                    </li>
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders ' . ( ( $show_page == 'orders' || $show_page == 'order' ) ? 'is-active' : '' ) . '">
                                        <a href="#">Orders</a>
                                    </li>
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads ' . ( $show_page == 'downloads' ? 'is-active' : '' ) . '">
                                        <a href="#">Downloads</a>
                                    </li>
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address ' . ( ( $show_page == 'addresses' || $show_page == 'address' ) ? 'is-active' : '' ) . '">
                                        <a href="#">Addresses</a>
                                    </li>
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account ' . ( $show_page == 'acc_details' ? 'is-active' : '' ) . '">
                                        <a href="#">Account details</a>
                                    </li>
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout ' . ( $show_page == 'guest' ? 'is-active' : '' ) . '">
                                        <a href="#">Logout</a>
                                    </li>
                                </ul>
                            </nav>
                            
                            <div class="woocommerce-MyAccount-content">';
                                switch ($show_page) {
                                    case '':
                                        $woocommerce_my_account .=
                                            '<p>Hello <strong>John Doe</strong> (not <strong>John Doe</strong>? <a href="#">Log out</a>)</p>
                                            <p>From your account dashboard you can view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a>, and <a href="#">edit your password and account details</a>.</p>';

                                        break;

                                    case 'orders':
                                        $woocommerce_my_account .=
                                            '<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
                                                <thead>
                                                    <tr>
                                                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">Order</span></th>
                                                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Date</span></th>
                                                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Status</span></th>
                                                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">Total</span></th>
                                                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">Actions</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                                            <a href="#">#24283</a>
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                                            <time datetime="2021-11-17T09:04:29+00:00">November 17, 2021</time>
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">Processing</td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>50.00</span> for 1 item
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                                            <a href="#" class="woocommerce-button button view">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                                            <a href="#">#24259</a>
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                                            <time datetime="2021-11-16T07:19:48+00:00">November 16, 2021</time>
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">On hold</td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1,415.00</span> for 15 items
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                                            <a href="#" class="woocommerce-button button view">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                                            <a href="#">#24245</a>
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                                            <time datetime="2021-11-15T12:38:10+00:00">November 15, 2021</time>
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">On hold</td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>45.00</span> for 1 item
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                                            <a href="#" class="woocommerce-button button view">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                                            <a href="#">#23993</a>
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                                            <time datetime="2021-11-11T06:36:03+00:00">November 11, 2021</time>
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">On hold</td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>18.00</span> for 1 item
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                                            <a href="#" class="woocommerce-button button view">View</a>													</td>
                                                        </tr>
                                                    </tbody>
                                                </table>';

                                        break;

                                    case 'order':
                                        $woocommerce_my_account .=
                                            '<p>Order #<mark class="order-number">24283</mark> was placed on <mark class="order-date">November 17, 2021</mark> and is currently <mark class="order-status">Processing</mark>.</p>
                                            <section class="woocommerce-order-downloads">
                                                <h2 class="woocommerce-order-downloads__title">Downloads</h2>
                                                <table class="woocommerce-table woocommerce-table--order-downloads shop_table shop_table_responsive order_details">
                                                    <thead>
                                                        <tr>
                                                            <th class="download-product"><span class="nobr">Product</span></th>
                                                            <th class="download-remaining"><span class="nobr">Downloads remaining</span></th>
                                                            <th class="download-expires"><span class="nobr">Expires</span></th>
                                                            <th class="download-file"><span class="nobr">Download</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="download-product" data-title="Product">
                                                                <a href="#">Sample Product 1</a>
                                                            </td>
                                                            <td class="download-remaining" data-title="Downloads remaining">∞</td>
                                                            <td class="download-expires" data-title="Expires">Never</td>
                                                            <td class="download-file" data-title="Download">
                                                                <a href="#" class="woocommerce-MyAccount-downloads-file button alt">FILE</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </section>
                                            <section class="woocommerce-order-details">
                                                <h2 class="woocommerce-order-details__title">Order details</h2>
                                                <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                                    <thead>
                                                        <tr>
                                                            <th class="woocommerce-table__product-name product-name">Product</th>
                                                            <th class="woocommerce-table__product-table product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="woocommerce-table__line-item order_item">
                                                            <td class="woocommerce-table__product-name product-name">
                                                                <a href="#">Sample Product 1</a> <strong class="product-quantity">×&nbsp;1</strong>
                                                            </td>
                                                            <td class="woocommerce-table__product-total product-total">
                                                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>50.00</bdi></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th scope="row">Subtotal:</th>
                                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>50.00</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Discount:</th>
                                                            <td>-<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>50.00</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Total:</th>
                                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>0.00</span></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </section>
                                            <section class="woocommerce-customer-details">
                                                <h2 class="woocommerce-column__title">Billing address</h2>
                                                <address>
                                                    John Doe<br>
                                                    Demo Company Name<br>
                                                    10 Downing Street<br>
                                                    London<br>
                                                    WC2N 5DU
                                                    <p class="woocommerce-customer-details--phone">0216598181</p>
                                                    <p class="woocommerce-customer-details--email">test@email.com</p>
                                                </address>
                                            </section>';

                                        break;

                                    case 'downloads':
                                        $woocommerce_my_account .=
                                            '<section class="woocommerce-order-downloads">
                                                <table class="woocommerce-table woocommerce-table--order-downloads shop_table shop_table_responsive order_details">
                                                <thead>
                                                    <tr>
                                                        <th class="download-product"><span class="nobr">Product</span></th>
                                                        <th class="download-remaining"><span class="nobr">Downloads remaining</span></th>
                                                        <th class="download-expires"><span class="nobr">Expires</span></th>
                                                        <th class="download-file"><span class="nobr">Download</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="download-product" data-title="Product">
                                                            <a href="#">Sample Product 1</a>
                                                        </td>
                                                        <td class="download-remaining" data-title="Downloads remaining">∞</td>
                                                        <td class="download-expires" data-title="Expires">Never</td>
                                                        <td class="download-file" data-title="Download">
                                                            <a href="#" class="woocommerce-MyAccount-downloads-file button alt">FILE</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </section>';

                                        break;

                                    case 'addresses':
                                        $woocommerce_my_account .=
                                            '<p>The following addresses will be used on the checkout page by default.</p>
                                            <div class="u-columns woocommerce-Addresses col2-set addresses">
                                                <div class="u-column1 col-1 woocommerce-Address">
                                                    <header class="woocommerce-Address-title title">
                                                        <h3>Billing address</h3>
                                                        <a href="#" class="edit">Edit</a>
                                                    </header>
                                                    <address>
                                                        John Doe<br>
                                                        Demo Company Name<br>
                                                        10 Downing Street<br>
                                                        London<br>
                                                        WC2N 5DU
                                                    </address>
                                                </div>
                                                <div class="u-column2 col-2 woocommerce-Address">
                                                    <header class="woocommerce-Address-title title">
                                                        <h3>Shipping address</h3>
                                                        <a href="#" class="edit">Edit</a>
                                                    </header>
                                                    <address>
                                                        John Doe<br>
                                                        10 Downing Street<br>
                                                        London<br>
                                                        WC2N 5DU
                                                    </address>
                                                </div>
                                            </div>';

                                        break;

                                    case 'address':
                                        $woocommerce_my_account .=
                                            '<form method="post">
                                                <h3>Billing address</h3>
                                                <div class="woocommerce-address-fields">
                                                    <div class="woocommerce-address-fields__field-wrapper">
                                                        <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                                                            <label for="billing_first_name" class="">First name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="John" autocomplete="given-name">
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                                                            <label for="billing_last_name" class="">Last name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="Doe" autocomplete="family-name">
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                            <label for="billing_company" class="">Company name&nbsp;<span class="optional">(optional)</span></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" value="Demo Company Name" autocomplete="organization">
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
                                                            <label for="billing_country" class="">Country / Region&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <select name="billing_country" id="billing_country" class="country_to_state country_select " autocomplete="country" data-placeholder="Select a country / region…" data-label="Country / Region">
                                                                    <option value="">Select a country / region…</option>
                                                                    <option value="GB" selected="selected">United Kingdom (UK)</option>
                                                                    <option value="US">United States (US)</option>
                                                                    <option value="UM">United States (US) Minor Outlying Islands</option>
                                                                </select>
                                                            </span>
                                                        </p>
                                                        <p class="form-row address-field validate-required form-row-wide" id="billing_address_1_field" data-priority="50">
                                                            <label for="billing_address_1" class="">Street address&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="10 Downing Street" autocomplete="address-line1" data-placeholder="House number and street name">
                                                            </span>
                                                        </p>
                                                        <p class="form-row address-field form-row-wide" id="billing_address_2_field" data-priority="60">
                                                            <label for="billing_address_2" class="screen-reader-text">Apartment, suite, unit, etc.&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="" autocomplete="address-line2" data-placeholder="Apartment, suite, unit, etc. (optional)">
                                                            </span>
                                                        </p>
                                                        <p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                                            <label for="billing_city" class="">Town / City&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="London" autocomplete="address-level2">
                                                            </span>
                                                        </p>
                                                        <p class="form-row address-field validate-state form-row-wide" id="billing_state_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-state">
                                                            <label for="billing_state" class="">County&nbsp;<span class="optional">(optional)</span></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " value="" placeholder="" name="billing_state" id="billing_state" autocomplete="address-level1" data-input-classes="">
                                                            </span>
                                                        </p>
                                                        <p class="form-row address-field validate-required validate-postcode form-row-wide" id="billing_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                                                            <label for="billing_postcode" class="">Postcode&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="WC2N 5DU" autocomplete="postal-code">
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                            <label for="billing_phone" class="">Phone&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel">
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                                                            <label for="billing_email" class="">Email address&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="test@mail.com" autocomplete="email username">
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <p>
                                                        <button type="submit" class="button" name="save_address" value="Save address">Save address</button>
                                                        <input type="hidden" id="woocommerce-edit-address-nonce" name="woocommerce-edit-address-nonce" value="">
                                                        <input type="hidden" name="_wp_http_referer" value="#">
                                                        <input type="hidden" name="action" value="edit_address">
                                                    </p>
                                                </div>
                                            </form>';

                                        break;

                                    case 'acc_details':
                                        $woocommerce_my_account .=
                                            '<form class="woocommerce-EditAccountForm edit-account" action="" method="post">
                                                <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                                    <label for="account_first_name">First name&nbsp;<span class="required">*</span></label>
                                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="John">
                                                </p>
                                                <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                                    <label for="account_last_name">Last name&nbsp;<span class="required">*</span></label>
                                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="Doe">
                                                </p>
                                                <div class="clear"></div>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="account_display_name">Display name&nbsp;<span class="required">*</span></label>
                                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="John Doe"> <span><em>This will be how your name will be displayed in the account section and in reviews</em></span>
                                                </p>
                                                <div class="clear"></div>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="account_email">Email address&nbsp;<span class="required">*</span></label>
                                                    <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="test@test.com">
                                                </p>
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="password_current">Current password (leave blank to leave unchanged)</label>
                                                        <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off"><span class="show-password-input"></span></span>
                                                    </p>
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="password_1">New password (leave blank to leave unchanged)</label>
                                                        <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off"><span class="show-password-input"></span></span>
                                                    </p>
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="password_2">Confirm new password</label>
                                                        <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off"><span class="show-password-input"></span></span>
                                                    </p>
                                                </fieldset>
                                                <div class="clear"></div>
                                                <p>
                                                    <input type="hidden" id="save-account-details-nonce" name="save-account-details-nonce" value="89f2b801b4"><input type="hidden" name="_wp_http_referer" value="/wp_011_test_demos/woo-my-account/edit-account/">		<button type="submit" class="woocommerce-Button button" name="save_account_details" value="Save changes">Save changes</button>
                                                    <input type="hidden" name="action" value="save_account_details">
                                                </p>
                                            </form>';
                                }
                            $woocommerce_my_account .=
                            '</div>';
                    } else {
                        $woocommerce_my_account .=
                            '<div class="u-columns col2-set" id="customer_login">
                                <div class="u-column1 col-1">
                                    <h2>Login</h2>
                                    <form class="woocommerce-form woocommerce-form-login login" method="post">
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="username">Username or email address&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="">
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                                            <span class="password-input"><input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password"><span class="show-password-input"></span></span>
                                        </p>
                                        <p class="form-row">
                                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                                            </label>
                                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="03f9618203"><input type="hidden" name="_wp_http_referer" value="/wp_011_test_demos/woo-my-account/">
                                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                                        </p>
                                        <p class="woocommerce-LostPassword lost_password">
                                            <a href="http://localhost/wp_011_test_demos/woo-my-account/lost-password/">Lost your password?</a>
                                        </p>
                                    </form>
                                </div>
                                <div class="u-column2 col-2">
                                    <h2>Register</h2>
                                    <form method="post" class="woocommerce-form woocommerce-form-register register">
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="reg_email">Email address&nbsp;<span class="required">*</span></label>
                                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="">
                                        </p>
                                        <p>A password will be sent to your email address.</p>
                                        <div class="woocommerce-privacy-policy-text">
                                            <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.
                                            </p>
                                        </div>
                                        <p class="woocommerce-form-row form-row">
                                            <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="">
                                            <input type="hidden" name="_wp_http_referer" value="">
                                            <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Register</button>
                                        </p>
                                    </form>
                                </div>
                            </div>';
                    }
                $woocommerce_my_account .=
                ' </div>';
        }


        $buffy = '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';
            $buffy .= $this->get_block_css(); // block css
            $buffy .= $this->get_block_js(); // block js


            $buffy .= '<div class="tdw-block-inner td-fix-index">';
                $buffy .= $woocommerce_my_account;
            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }
}

