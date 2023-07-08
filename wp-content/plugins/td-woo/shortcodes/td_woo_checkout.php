<?php

/**
 * Class td_woo_checkout - wrapper shortcode for rendering the woocommerce checkout shortcode
 */
class td_woo_checkout extends td_block {

    public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @composer_styles */
                .$unique_block_class .tdw-block-inner > .woocommerce {
                    pointer-events: none;
                }
                .$unique_block_class .td-woo-default > .woocommerce-form-coupon-toggle {
                    display: none;
                }
            
            
                /* @input_border_radius */
                .$unique_block_class .woocommerce .td-woo-default form .form-row input {
                    border-radius: @input_border_radius;
                }
                /* @pay_descr_border_radius */
                .$unique_block_class .td-woo-default .woocommerce-checkout #payment div.payment_box {
                    border-radius: @pay_descr_border_radius;
                }
                /* @pay_btn_border_radius */
                .$unique_block_class .td-woo-default .woocommerce-checkout button.button {
                    border-radius: @pay_btn_border_radius;
                }
                /* @c_det_border_radius */
                .$unique_block_class .woocommerce-order-details table.woocommerce-table {
                    border-radius: @c_det_border_radius;
                }
                /* @c_add_border_radius */
                .$unique_block_class .woocommerce-customer-details address {
                    border-radius: @c_add_border_radius;
                }
                
                /* @title_color */
                .$unique_block_class .td-woo-default h3 {
                    color: @title_color;
                }
                
                /* @bill_bg_color */
                .$unique_block_class .td-woo-default .td-woo-billing {
                    background-color: @bill_bg_color;
                }
                
                /* @label_color */
                .$unique_block_class .woocommerce form .form-row label {
                    color: @label_color;
                }
                
                /* @input_color */
                .$unique_block_class .woocommerce .td-woo-default form .form-row .input-text,
                .$unique_block_class .td-woo-default .select2-selection .select2-selection__rendered {
                    color: @input_color;
                }
                .$unique_block_class .td-woo-default .select2-selection .select2-selection__arrow b {
                    border-color: @input_color transparent transparent transparent;
                }
                /* @input_color_f */
                .$unique_block_class .woocommerce .td-woo-default form .form-row .input-text:focus,
                .$unique_block_class .td-woo-default .select2-container--open .select2-selection .select2-selection__rendered {
                    color: @input_color_f;
                }
                .$unique_block_class .td-woo-default .select2-container--open .select2-selection .select2-selection__arrow b {
                    border-color: transparent transparent @input_color_f transparent;
                }
                /* @input_place_color */
                .$unique_block_class .woocommerce .td-woo-default form .form-row .input-text::placeholder {
                    color: @input_place_color;
                }
                /* @input_bg */
                .$unique_block_class .woocommerce .td-woo-default form .form-row .input-text,
                .$unique_block_class .td-woo-default .select2-selection {
                    background-color: @input_bg;
                }
                /* @input_bg_f */
                .$unique_block_class .woocommerce .td-woo-default form .form-row .input-text:focus,
                .$unique_block_class .td-woo-default .select2-container--open .select2-selection {
                    background-color: @input_bg_f;
                }
                /* @input_border_color */
                .$unique_block_class .woocommerce .td-woo-default form .form-row .input-text,
                .$unique_block_class .td-woo-default .select2-selection {
                    border-color: @input_border_color;
                }
                /* @input_border_color_f */
                .$unique_block_class .woocommerce .td-woo-default form .form-row .input-text:focus,
                .$unique_block_class .td-woo-default .select2-container--open .select2-selection {
                    border-color: @input_border_color_f;
                }
                
                /* @coupon_color */
                .$unique_block_class .td-woo-default .td-woo-coupon-wrap,
                .$unique_block_class .td-woo-default .td-woo-coupon-wrap a {
                    color: @coupon_color;
                }
                .$unique_block_class .td-woo-default .td-woo-coupon-wrap svg {
                    fill: @coupon_color;
                }
                /* @coupon_bg */
                .$unique_block_class .td-woo-default .td-woo-coupon-wrap {
                    background-color: @coupon_bg;
                }
                
                /* @prod_head_color */
                .$unique_block_class .td-woo-default .woocommerce-checkout table thead {
                    color: @prod_head_color;
                }
                /* @prod_body_color */
                .$unique_block_class .td-woo-default .woocommerce-checkout table tbody {
                    color: @prod_body_color;
                }
                /* @prod_foot_color */
                .$unique_block_class .td-woo-default .woocommerce-checkout table tfoot {
                    color: @prod_foot_color;
                }
                /* @prod_border_color */
                .$unique_block_class .woocommerce table.shop_table tbody th,
                .$unique_block_class .woocommerce table.shop_table tbody td,
                .$unique_block_class .woocommerce table.shop_table tfoot td,
                .$unique_block_class .woocommerce table.shop_table tfoot th {
                    border-top-color: @prod_border_color;
                }
                
                /* @pay_name_color */
                .$unique_block_class .woocommerce-checkout #payment ul.payment_methods li label,
                .$unique_block_class .woocommerce-checkout #payment ul.payment_methods li label a {
                    color: @pay_name_color;
                }
                /* @pay_descr_color */
                .$unique_block_class .td-woo-default .woocommerce-checkout #payment div.payment_box {
                    color: @pay_descr_color;
                }
                /* @pay_descr_bg */
                .$unique_block_class .td-woo-default .woocommerce-checkout #payment div.payment_box {
                    background-color: @pay_descr_bg;
                }
                /* @pay_descr_border_color */
                .$unique_block_class .td-woo-default .woocommerce-checkout #payment div.payment_box {
                    border-color: @pay_descr_border_color;
                }
                .$unique_block_class .td-woo-default .woocommerce-checkout #payment div.payment_box:before {
                    border-bottom-color: @pay_descr_border_color;
                }
                
                /* @pay_agree_color */
                .$unique_block_class .td-woo-default .woocommerce-checkout .woocommerce-terms-and-conditions-wrapper,
                .$unique_block_class .td-woo-default .woocommerce-checkout .woocommerce-terms-and-conditions-wrapper a {
                    color: @pay_agree_color;
                }
                
                /* @pay_border_color */
                .$unique_block_class .woocommerce-checkout #payment ul.payment_methods {
                    border-bottom-color: @pay_border_color;
                }
                
                /* @pay_btn_color */
                .$unique_block_class .td-woo-default .woocommerce-checkout button.button {
                    color: @pay_btn_color;
                }
                /* @pay_btn_color_h */
                .$unique_block_class .td-woo-default .woocommerce-checkout button.button:hover {
                    color: @pay_btn_color_h;
                }
                /* @pay_btn_bg */
                .$unique_block_class .td-woo-default .woocommerce-checkout button.button {
                    background-color: @pay_btn_bg;
                }
                /* @pay_btn_bg_h */
                .$unique_block_class .td-woo-default .woocommerce-checkout button.button:hover {
                    background-color: @pay_btn_bg_h;
                }
                /* @pay_btn_border_color */
                .$unique_block_class .td-woo-default .woocommerce-checkout button.button {
                    border-color: @pay_btn_border_color;
                }
                /* @pay_btn_border_color_h */
                .$unique_block_class .td-woo-default .woocommerce-checkout button.button:hover {
                    border-color: @pay_btn_border_color_h;
                }
                
                
                /* @c_title_color */
                .$unique_block_class .woocommerce-order h2 {
                    color: @c_title_color;
                }
                /* @c_thx_color */
                .$unique_block_class .woocommerce-order .woocommerce-notice {
                    color: @c_thx_color;
                }
                
                /* @c_over_color */
                .$unique_block_class ul.woocommerce-order-overview {
                    color: @c_over_color;
                }
                /* @c_over_border_color */
                .$unique_block_class ul.woocommerce-order-overview li {
                    border-right-color: @c_over_border_color;
                }
                
                /* @c_bank_title_color */
                .$unique_block_class .woocommerce-bacs-bank-details h3 {
                    color: @c_bank_title_color;
                }
                /* @c_bank_color */
                .$unique_block_class ul.wc-bacs-bank-details {
                    color: @c_bank_color;
                }
                /* @c_bank_border_color */
                .$unique_block_class ul.wc-bacs-bank-details li {
                    border-right-color: @c_bank_border_color;
                }
                
                /* @c_det_color */
                .$unique_block_class .woocommerce-order-details table.woocommerce-table {
                    color: @c_det_color;
                }
                /* @c_det_a_color */
                .$unique_block_class .woocommerce-order-details table.woocommerce-table a {
                    color: @c_det_a_color;
                }
                /* @c_det_bg */
                .$unique_block_class .woocommerce-order-details table.woocommerce-table {
                    background-color: @c_det_bg;
                }
                /* @c_det_border_color */
                .$unique_block_class .woocommerce-order-details table.woocommerce-table {
                    border-color: @c_det_border_color;
                }
                .$unique_block_class .woocommerce-order-details table.woocommerce-table td,
                .$unique_block_class .woocommerce-order-details table.woocommerce-table th {
                    border-top-color: @c_det_border_color;
                }
                
                /* @c_add_color */
                .$unique_block_class .woocommerce-customer-details address {
                    color: @c_add_color;
                }
                /* @c_add_bg */
                .$unique_block_class .woocommerce-customer-details address {
                    background-color: @c_add_bg;
                }
                /* @c_add_border_color */
                .$unique_block_class .woocommerce-customer-details address {
                    border-color: @c_add_border_color;
                }
                
                
                
                /* @f_title */
                .$unique_block_class .td-woo-default h3 {
                    @f_title
                }
                
                /* @f_label */
                .$unique_block_class .woocommerce form .form-row label {
                    @f_label
                }
                /* @f_input */
                .$unique_block_class .woocommerce .td-woo-default form .form-row .input-text,
                .$unique_block_class .td-woo-default .select2-selection .select2-selection__rendered {
                    @f_input
                }
                
                /* @f_coupon */
                .$unique_block_class .td-woo-default .td-woo-coupon-wrap {
                    @f_coupon
                }
                
                /* @f_pay_name */
                .$unique_block_class .woocommerce-checkout #payment ul.payment_methods li label {
                    @f_pay_name
                }
                /* @f_pay_descr */
                .$unique_block_class .td-woo-default .woocommerce-checkout #payment div.payment_box {
                    @f_pay_descr
                }
                
                /* @f_prod_head */
                .$unique_block_class .td-woo-default .woocommerce-checkout table thead {
                    @f_prod_head
                }
                /* @f_prod_body */
                .$unique_block_class .td-woo-default .woocommerce-checkout table tbody {
                    @f_prod_body
                }
                /* @f_prod_foot */
                .$unique_block_class .td-woo-default .woocommerce-checkout table tfoot {
                    @f_prod_foot
                }
                
                /* @f_pay_agree */
                .$unique_block_class .td-woo-default .woocommerce-checkout .woocommerce-terms-and-conditions-wrapper {
                    @f_pay_agree
                }
                
                /* @f_pay_btn */
                .$unique_block_class .td-woo-default .woocommerce-checkout button.button {
                    @f_pay_btn
                }
                
                
                /* @f_c_title */
                .$unique_block_class .woocommerce-order h2 {
                    @f_c_title
                }
                /* @f_c_thx */
                .$unique_block_class .woocommerce-order .woocommerce-notice {
                    @f_c_thx
                }
                
                /* @f_c_over */
                .$unique_block_class ul.woocommerce-order-overview {
                    @f_c_over
                }
                
                /* @f_c_bank_title */
                .$unique_block_class .woocommerce-bacs-bank-details h3 {
                    @f_c_bank_title
                }
                /* @f_c_bank */
                .$unique_block_class ul.wc-bacs-bank-details {
                    @f_c_bank
                }
                
                /* @f_c_det */
                .$unique_block_class .woocommerce-order-details table.woocommerce-table {
                    @f_c_det
                }
                
                /* @f_c_add */
                .$unique_block_class .woocommerce-customer-details address {
                    @f_c_add
                }
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        if (tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe()) {
            $res_ctx->load_settings_raw( 'composer_styles', 1 );
        }



        /*-- LAYOUT -- */
        // billing details form input border radius
        $input_border_radius = $res_ctx->get_shortcode_att('input_border_radius');
        $res_ctx->load_settings_raw( 'input_border_radius', $input_border_radius );
        if( $input_border_radius != '' && is_numeric( $input_border_radius ) ) {
            $res_ctx->load_settings_raw( 'input_border_radius', $input_border_radius . 'px' );
        }

        // payment option description border radius
        $pay_descr_border_radius = $res_ctx->get_shortcode_att('pay_descr_border_radius');
        $res_ctx->load_settings_raw( 'pay_descr_border_radius', $pay_descr_border_radius );
        if( $pay_descr_border_radius != '' && is_numeric( $pay_descr_border_radius ) ) {
            $res_ctx->load_settings_raw( 'pay_descr_border_radius', $pay_descr_border_radius . 'px' );
        }

        // payments button border radius
        $pay_btn_border_radius = $res_ctx->get_shortcode_att('pay_btn_border_radius');
        $res_ctx->load_settings_raw( 'pay_btn_border_radius', $pay_btn_border_radius );
        if( $pay_btn_border_radius != '' && is_numeric( $pay_btn_border_radius ) ) {
            $res_ctx->load_settings_raw( 'pay_btn_border_radius', $pay_btn_border_radius . 'px' );
        }


        // confirmation order details table border radius
        $c_det_border_radius = $res_ctx->get_shortcode_att('c_det_border_radius');
        $res_ctx->load_settings_raw( 'c_det_border_radius', $c_det_border_radius );
        if( $c_det_border_radius != '' && is_numeric( $c_det_border_radius ) ) {
            $res_ctx->load_settings_raw( 'c_det_border_radius', $c_det_border_radius . 'px' );
        }

        // confirmation billing address section border radius
        $c_add_border_radius = $res_ctx->get_shortcode_att('c_add_border_radius');
        $res_ctx->load_settings_raw( 'c_add_border_radius', $c_add_border_radius );
        if( $c_add_border_radius != '' && is_numeric( $c_add_border_radius ) ) {
            $res_ctx->load_settings_raw( 'c_add_border_radius', $c_add_border_radius . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('title_color', $res_ctx->get_shortcode_att('title_color'));

        $res_ctx->load_settings_raw('bill_bg_color', $res_ctx->get_shortcode_att('bill_bg_color'));

        $res_ctx->load_settings_raw('label_color', $res_ctx->get_shortcode_att('label_color'));
        $res_ctx->load_settings_raw('input_color', $res_ctx->get_shortcode_att('input_color'));
        $res_ctx->load_settings_raw('input_color_f', $res_ctx->get_shortcode_att('input_color_f'));
        $res_ctx->load_settings_raw('input_place_color', $res_ctx->get_shortcode_att('input_place_color'));
        $res_ctx->load_settings_raw('input_bg', $res_ctx->get_shortcode_att('input_bg'));
        $res_ctx->load_settings_raw('input_bg_f', $res_ctx->get_shortcode_att('input_bg_f'));
        $res_ctx->load_settings_raw('input_border_color', $res_ctx->get_shortcode_att('input_border_color'));
        $res_ctx->load_settings_raw('input_border_color_f', $res_ctx->get_shortcode_att('input_border_color_f'));

        $res_ctx->load_settings_raw('coupon_color', $res_ctx->get_shortcode_att('coupon_color'));
        $res_ctx->load_settings_raw('coupon_bg', $res_ctx->get_shortcode_att('coupon_bg'));

        $res_ctx->load_settings_raw('prod_head_color', $res_ctx->get_shortcode_att('prod_head_color'));
        $res_ctx->load_settings_raw('prod_body_color', $res_ctx->get_shortcode_att('prod_body_color'));
        $res_ctx->load_settings_raw('prod_foot_color', $res_ctx->get_shortcode_att('prod_foot_color'));
        $res_ctx->load_settings_raw('prod_border_color', $res_ctx->get_shortcode_att('prod_border_color'));

        $res_ctx->load_settings_raw('pay_name_color', $res_ctx->get_shortcode_att('pay_name_color'));
        $res_ctx->load_settings_raw('pay_descr_color', $res_ctx->get_shortcode_att('pay_descr_color'));
        $res_ctx->load_settings_raw('pay_descr_bg', $res_ctx->get_shortcode_att('pay_descr_bg'));
        $res_ctx->load_settings_raw('pay_descr_border_color', $res_ctx->get_shortcode_att('pay_descr_border_color'));

        $res_ctx->load_settings_raw('pay_agree_color', $res_ctx->get_shortcode_att('pay_agree_color'));

        $res_ctx->load_settings_raw('pay_border_color', $res_ctx->get_shortcode_att('pay_border_color'));

        $res_ctx->load_settings_raw('pay_btn_color', $res_ctx->get_shortcode_att('pay_btn_color'));
        $res_ctx->load_settings_raw('pay_btn_color_h', $res_ctx->get_shortcode_att('pay_btn_color_h'));
        $res_ctx->load_settings_raw('pay_btn_bg', $res_ctx->get_shortcode_att('pay_btn_bg'));
        $res_ctx->load_settings_raw('pay_btn_bg_h', $res_ctx->get_shortcode_att('pay_btn_bg_h'));
        $res_ctx->load_settings_raw('pay_btn_border_color', $res_ctx->get_shortcode_att('pay_btn_border_color'));
        $res_ctx->load_settings_raw('pay_btn_border_color_h', $res_ctx->get_shortcode_att('pay_btn_border_color_h'));


        $res_ctx->load_settings_raw('c_title_color', $res_ctx->get_shortcode_att('c_title_color'));
        $res_ctx->load_settings_raw('c_thx_color', $res_ctx->get_shortcode_att('c_thx_color'));

        $res_ctx->load_settings_raw('c_over_color', $res_ctx->get_shortcode_att('c_over_color'));
        $res_ctx->load_settings_raw('c_over_border_color', $res_ctx->get_shortcode_att('c_over_border_color'));

        $res_ctx->load_settings_raw('c_bank_title_color', $res_ctx->get_shortcode_att('c_bank_title_color'));
        $res_ctx->load_settings_raw('c_bank_color', $res_ctx->get_shortcode_att('c_bank_color'));
        $res_ctx->load_settings_raw('c_bank_border_color', $res_ctx->get_shortcode_att('c_bank_border_color'));

        $res_ctx->load_settings_raw('c_det_color', $res_ctx->get_shortcode_att('c_det_color'));
        $res_ctx->load_settings_raw('c_det_a_color', $res_ctx->get_shortcode_att('c_det_a_color'));
        $res_ctx->load_settings_raw('c_det_bg', $res_ctx->get_shortcode_att('c_det_bg'));
        $res_ctx->load_settings_raw('c_det_border_color', $res_ctx->get_shortcode_att('c_det_border_color'));

        $res_ctx->load_settings_raw('c_add_color', $res_ctx->get_shortcode_att('c_add_color'));
        $res_ctx->load_settings_raw('c_add_bg', $res_ctx->get_shortcode_att('c_add_bg'));
        $res_ctx->load_settings_raw('c_add_border_color', $res_ctx->get_shortcode_att('c_add_border_color'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_label' );
        $res_ctx->load_font_settings( 'f_input' );
        $res_ctx->load_font_settings( 'f_coupon' );
        $res_ctx->load_font_settings( 'f_prod_head' );
        $res_ctx->load_font_settings( 'f_prod_body' );
        $res_ctx->load_font_settings( 'f_prod_foot' );
        $res_ctx->load_font_settings( 'f_pay_name' );
        $res_ctx->load_font_settings( 'f_pay_descr' );
        $res_ctx->load_font_settings( 'f_pay_agree' );
        $res_ctx->load_font_settings( 'f_pay_btn' );

        $res_ctx->load_font_settings( 'f_c_title' );
        $res_ctx->load_font_settings( 'f_c_thx' );
        $res_ctx->load_font_settings( 'f_c_over' );
        $res_ctx->load_font_settings( 'f_c_bank_title' );
        $res_ctx->load_font_settings( 'f_c_bank' );
        $res_ctx->load_font_settings( 'f_c_det' );
        $res_ctx->load_font_settings( 'f_c_add' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render( $atts, $content = null ) {
        
        parent::render( $atts );

        $show_page = $this->get_att('show_page');
        $woocomerce_checkout = '';

        if( !td_util::tdc_is_live_editor_iframe() && !td_util::tdc_is_live_editor_ajax() ) {
            // render the woocommerce_checkout shortcode
            $woocomerce_checkout = do_shortcode('[woocommerce_checkout]');
        } else {
            if( $show_page == '' ) {
                $woocomerce_checkout = '
                    <div class="woocommerce">
                        <div class="woocommerce-notices-wrapper"></div>
                        <div class="td-woo-default">
                            <div class="woocommerce-notices-wrapper"></div>
                            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="http://localhost/wp_011_test_demos/woo-checkout/" enctype="multipart/form-data" novalidate="novalidate">
                                <div class="td-woo-billing" id="customer_details">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Billing details</h3>
                                        
                                        <div class="woocommerce-billing-fields__field-wrapper">
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
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40"><label for="billing_country" class="">Country / Region&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><select name="billing_country" id="billing_country" class="country_to_state country_select select2-hidden-accessible" autocomplete="country" data-placeholder="Select a country / region…" data-label="Country / Region" tabindex="-1" aria-hidden="true"><option value="">Select a country / region…</option><option value="GB" selected="selected">United Kingdom (UK)</option><option value="US">United States (US)</option><option value="UM">United States (US) Minor Outlying Islands</option></select><span class="select2 select2-container select2-container--default select2-container--focus" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-label="Country / Region" role="combobox"><span class="select2-selection__rendered" id="select2-billing_country-container" role="textbox" aria-readonly="true" title="United Kingdom (UK)">United Kingdom (UK)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><noscript><button type="submit" name="woocommerce_checkout_update_totals" value="Update country / region">Update country / region</button></noscript></span></p>
                                            <p class="form-row address-field validate-required form-row-wide" id="billing_address_1_field" data-priority="50">
                                                <label for="billing_address_1" class="">Street address&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="10 Downing Street" autocomplete="address-line1" data-placeholder="House number and street name">
                                                </span>
                                            </p>
                                            <p class="form-row address-field form-row-wide" id="billing_address_2_field" data-priority="60">
                                                <label for="billing_address_2" class="screen-reader-text">Apartment, suite, unit, etc.&nbsp;<span class="optional">(optional)</span></label>
                                                <span class="woocommerce-input-wrapper">
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
                                                <label for="billing_postcode" class="">Postcode / ZIP&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="WC2N 5DU" autocomplete="postal-code">
                                                </span>
                                            </p>
                                            <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                <label for="billing_phone" class="">Phone&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <span class="woocommerce-input-wrapper">
                                                    <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="0215156481" autocomplete="tel">
                                                </span>
                                            </p>
                                            <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                                                <label for="billing_email" class="">Email address&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <span class="woocommerce-input-wrapper">
                                                    <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="test@email.com" autocomplete="email username">
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="woocommerce-shipping-fields"></div>
                                    <div class="woocommerce-additional-fields">
                                        <h3>Additional information</h3>
                                        <div class="woocommerce-additional-fields__field-wrapper">
                                            <p class="form-row notes" id="order_comments_field" data-priority="">
                                                <label for="order_comments" class="">Order notes&nbsp;<span class="optional">(optional)</span></label>
                                                <span class="woocommerce-input-wrapper">
                                                    <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="td-woo-review">
                                    <div class="td-woo-coupon-wrap">
                                        <svg width="24" viewBox="0 0 512 512"><g><path d="M497.231,211.692c8.157,0,14.769-6.613,14.769-14.769v-78.769c0-8.157-6.613-14.769-14.769-14.769H14.769 C6.613,103.385,0,109.997,0,118.154v78.769c0,8.157,6.613,14.769,14.769,14.769c24.431,0,44.308,19.876,44.308,44.308 s-19.876,44.308-44.308,44.308C6.613,300.308,0,306.92,0,315.077v78.769c0,8.157,6.613,14.769,14.769,14.769h482.462 c8.157,0,14.769-6.613,14.769-14.769v-78.769c0-8.157-6.613-14.769-14.769-14.769c-24.431,0-44.308-19.876-44.308-44.308 S472.799,211.692,497.231,211.692z M482.462,328.362v50.715H172.308v-44.308c0-8.157-6.613-14.769-14.769-14.769 s-14.769,6.613-14.769,14.769v44.308H29.538v-50.715c33.665-6.862,59.077-36.701,59.077-72.362s-25.412-65.501-59.077-72.362 v-50.715h113.231v44.308c0,8.157,6.613,14.769,14.769,14.769s14.769-6.613,14.769-14.769v-44.308h310.154v50.715 c-33.665,6.862-59.077,36.701-59.077,72.362S448.797,321.501,482.462,328.362z"></path></g><g><path d="M157.538,221.538c-8.157,0-14.769,6.613-14.769,14.769v39.385c0,8.157,6.613,14.769,14.769,14.769 s14.769-6.613,14.769-14.769v-39.385C172.308,228.151,165.695,221.538,157.538,221.538z"></path></g></svg>
                                        <p>Have a coupon?</p>
                                        <a href="http://localhost/wp_011_test_demos/woo-cart/">Enter your code</a>
                                    </div>
                                    <h3 id="order_review_heading">Your order</h3>
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        <table class="shop_table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="product-name">Sample Product 1<strong class="product-quantity">×&nbsp;10</strong></td>
                                                    <td class="product-total"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>1,400.00</bdi></span></td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">Sample Product 2<strong class="product-quantity">×&nbsp;1</strong></td>
                                                    <td class="product-total"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>15.00</bdi></span></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>1,415.00</bdi></span></td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>1,415.00</bdi></span></strong> </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div id="payment" class="woocommerce-checkout-payment">
                                            <ul class="wc_payment_methods payment_methods methods">
                                                <li class="wc_payment_method payment_method_bacs">
                                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked" data-order_button_text="">
                                                    <label for="payment_method_bacs">Direct bank transfer</label>
                                                    <div class="payment_box payment_method_bacs">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </li>
                                                <li class="wc_payment_method payment_method_cheque">
                                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" data-order_button_text="">
                                                    <label for="payment_method_cheque">Check payments</label>
                                                    <div class="payment_box payment_method_cheque" style="display:none;">
                                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                </li>
                                                <li class="wc_payment_method payment_method_cod">
                                                    <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" data-order_button_text="">
                                                
                                                    <label for="payment_method_cod">Cash on delivery</label>
                                                        <div class="payment_box payment_method_cod" style="display:none;">
                                                        <p>Pay with cash upon delivery.</p>
                                                    </div>
                                                </li>
                                                <li class="wc_payment_method payment_method_paypal">
                                                    <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal">
                                                    <label for="payment_method_paypal">PayPal <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png" alt="PayPal acceptance mark"><a href="https://www.paypal.com/gb/webapps/mpp/paypal-popup" class="about_paypal">What is PayPal?</a></label>
                                                    <div class="payment_box payment_method_paypal" style="display:none;">
                                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-row place-order">
                                                <div class="woocommerce-terms-and-conditions-wrapper">
                                                    <div class="woocommerce-privacy-policy-text">
                                                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="http://localhost/wp_011_test_demos/?page_id=3" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                                                    </div>
                                                </div>
                                                <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>
                                                <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="25d3151859">
                                                <input type="hidden" name="_wp_http_referer" value="/wp_011_test_demos/?wc-ajax=update_order_review">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                         </div>
                    </div>';
            } else {
                $woocomerce_checkout =
                    '<div class="woocommerce">
                        <div class="woocommerce-order">
                            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Thank you. Your order has been received.</p>
                            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                                <li class="woocommerce-order-overview__order order">
                                    Order number: <strong>00001</strong>
                                </li>
                                <li class="woocommerce-order-overview__date date">
                                    Date: <strong>November 16, 2021</strong>
                                </li>
                                <li class="woocommerce-order-overview__email email">
						            Email: <strong>test@email.com</strong>
					            </li>
                                <li class="woocommerce-order-overview__total total">
                                    Total: <strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>1,415.00</bdi></span></strong>
                                </li>
                                <li class="woocommerce-order-overview__payment-method method">
                                    Payment method: <strong>Direct bank transfer</strong>
                                </li>
			                </ul>
		                    <section class="woocommerce-bacs-bank-details">
		                        <h2 class="wc-bacs-bank-details-heading">Our bank details</h2>
                                <h3 class="wc-bacs-bank-details-account-name">Alpha Bank Account:</h3>
                                <ul class="wc-bacs-bank-details order_details bacs_details">
                                    <li class="bank_name">Bank: <strong>Alpha Bank</strong></li>
                                    <li class="account_number">Account number: <strong>123456</strong></li>
                                    <li class="sort_code">Sort code: <strong>123456</strong></li>
                                    <li class="iban">IBAN: <strong>NL43INGB4186520410</strong></li>
                                    <li class="bic">BIC: <strong>123456</strong></li>
                                </ul>
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
                                            <td class="woocommerce-table__product-name product-name"><a href="#">Sample Product 1</a> <strong class="product-quantity">×&nbsp;10</strong></td>
                                            <td class="woocommerce-table__product-total product-total"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>1,400.00</bdi></span></td>
                                        </tr>
                                        <tr class="woocommerce-table__line-item order_item">
                                            <td class="woocommerce-table__product-name product-name"><a href="#">Sample Product 2</a> <strong class="product-quantity">×&nbsp;1</strong></td>
                                            <td class="woocommerce-table__product-total product-total"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>15.00</bdi></span></td>
                                        </tr>
		                            </tbody>
		                            <tfoot>
								        <tr>
                                            <th scope="row">Subtotal:</th>
                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1,415.00</span></td>
					                    </tr>
										<tr>
                                            <th scope="row">Payment method:</th>
                                            <td>Direct bank transfer</td>
					                    </tr>
										<tr>
                                            <th scope="row">Total:</th>
                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1,415.00</span></td>
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
		                            WC2N 5DU<br>
		                            United Kingdom (UK)
					                <p class="woocommerce-customer-details--phone">0215156481</p>
					                <p class="woocommerce-customer-details--email">test@email.com</p>
			                    </address>
                            </section>
                        </div>
                    </div>';
            }
        }


	    $buffy = '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            $buffy .= $this->get_block_css(); // block css
            $buffy .= $this->get_block_js(); // block js


            $buffy .= '<div class="tdw-block-inner td-fix-index">';
                $buffy .= $woocomerce_checkout;
            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }

    /*
     * td_block.php > js_tdc_get_composer_block hook
     * this runs when block is updated in td composer
     */

}

