<?php

/**
 * Class td_woo_cart - wrapper shortcode for rendering the woocommerce cart shortcode
 */
class td_woo_cart extends td_block {

    public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general */
                .$unique_block_class .return-to-shop .button {
                    border: 1px solid transparent;
                }
            
                /* @composer_styles */
                .$unique_block_class .tdw-block-inner > .woocommerce {
                    pointer-events: none;
                }
                
                
                /* @prod_qty_border_radius */
                .$unique_block_class .woocommerce .quantity .qty {
                    border-radius: @prod_qty_border_radius;
                }
                
                /* @prod_del_border_radius */
                .$unique_block_class .td-woo-default table.cart a.remove {
                    border-radius: @prod_del_border_radius;
                }
                
                /* @coup_input_border_radius */
                .$unique_block_class .td-woo-default table.shop_table td.actions .coupon .input-text {
                    border-radius: @coup_input_border_radius;
                }
                
                /* @coup_btn_border_radius */
                .$unique_block_class .td-woo-default table.shop_table button {
                    border-radius: @coup_btn_border_radius;
                }
                
                /* @check_btn_border_radius */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals a.checkout-button {
                    border-radius: @check_btn_border_radius;
                }
                
                /* @empty_btn_border_radius */
                .$unique_block_class .return-to-shop .button {
                    border-radius: @empty_btn_border_radius;
                }
                
                
                /* @prod_head_color */
                .$unique_block_class .woocommerce table.shop_table thead {
                    color: @prod_head_color;
                }
                
                
                /* @prod_title_color */
                .$unique_block_class .td-woo-default td.product-name a {
                    color: @prod_title_color;
                }
                /* @prod_title_color_h */
                .$unique_block_class .td-woo-default td.product-name a:hover {
                    color: @prod_title_color_H;
                }
                
                /* @prod_price_color */
                .$unique_block_class .td-woo-default table.shop_table td.product-price,
                .$unique_block_class .td-woo-default table.shop_table td.product-subtotal {
                    color: @prod_price_color;
                }
                
                /* @prod_qty_color */
                .$unique_block_class .woocommerce .quantity .qty {
                    color: @prod_qty_color;
                }
                /* @prod_qty_color_f */
                .$unique_block_class .woocommerce .quantity .qty:focus {
                    color: @prod_qty_color_f;
                }
                /* @prod_qty_bg */
                .$unique_block_class .woocommerce .quantity .qty {
                    background-color: @prod_qty_bg;
                }
                /* @prod_qty_bg_f */
                .$unique_block_class .woocommerce .quantity .qty:focus {
                    background-color: @prod_qty_bg_f;
                }
                /* @prod_qty_border_color */
                .$unique_block_class .woocommerce .quantity .qty {
                    border-color: @prod_qty_border_color;
                }
                /* @prod_qty_border_color_f */
                .$unique_block_class .woocommerce .quantity .qty:focus {
                    border-color: @prod_qty_border_color_f;
                }
                
                /* @prod_del_color */
                .$unique_block_class .td-woo-default table.cart a.remove {
                    color: @prod_del_color !important;
                }
                /* @prod_del_color_h */
                .$unique_block_class .td-woo-default table.cart a.remove:hover {
                    color: @prod_del_color_h !important;
                }
                /* @prod_del_bg */
                .$unique_block_class .td-woo-default table.cart a.remove {
                    background-color: @prod_del_bg;
                }
                /* @prod_del_bg_h */
                .$unique_block_class .td-woo-default table.cart a.remove:hover {
                    background-color: @prod_del_bg_h;
                }
                
                /* @coup_bg */
                .$unique_block_class .td-woo-default .td-cart-actions {
                    background-color: @coup_bg;
                }
                
                /* @coup_input_color */
                .$unique_block_class .td-woo-default table.shop_table td.actions .coupon .input-text {
                    color: @coup_input_color;
                }
                /* @coup_input_color_f */
                .$unique_block_class .td-woo-default table.shop_table td.actions .coupon .input-text:focus {
                    color: @coup_input_color_f;
                }
                /* @coup_input_place */
                .$unique_block_class .td-woo-default table.shop_table td.actions .coupon .input-text::placeholder {
                    color: @coup_input_place;
                }
                /* @coup_input_bg */
                .$unique_block_class .td-woo-default table.shop_table td.actions .coupon .input-text {
                    background-color: @coup_input_bg;
                }
                /* @coup_input_bg_f */
                .$unique_block_class .td-woo-default table.shop_table td.actions .coupon .input-text:focus {
                    background-color: @coup_input_bg_f;
                }
                /* @coup_input_border_color */
                .$unique_block_class .td-woo-default table.shop_table td.actions .coupon .input-text {
                    border-color: @coup_input_border_color;
                }
                /* @coup_input_border_color_f */
                .$unique_block_class .td-woo-default table.shop_table td.actions .coupon .input-text:focus {
                    border-color: @coup_input_border_color_f;
                }
                
                /* @coup_btn_color */
                .$unique_block_class .td-woo-default table.shop_table button.button {
                    color: @coup_btn_color;
                }
                /* @coup_btn_color_h */
                .$unique_block_class .td-woo-default table.shop_table button.button:hover {
                    color: @coup_btn_color_h;
                }
                /* @coup_btn_bg */
                .$unique_block_class .td-woo-default table.shop_table button.button {
                    background-color: @coup_btn_bg;
                }
                /* @coup_btn_bg_h */
                .$unique_block_class .td-woo-default table.shop_table button.button:hover {
                    background-color: @coup_btn_bg_h;
                }
                /* @coup_btn_border_color */
                .$unique_block_class .td-woo-default table.shop_table button.button {
                    border-color: @coup_btn_border_color;
                }
                /* @coup_btn_border_color_h */
                .$unique_block_class .td-woo-default table.shop_table button.button:hover {
                    border-color: @coup_btn_border_color_h;
                }
                
                
                /* @total_bg */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals {
                    background-color: @total_bg;
                }
                
                /* @total_title_color */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals h2 {
                    color: @total_title_color;
                }
                
                /* @break_label_color */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals table th {
                    color: @break_label_color;
                }
                /* @break_val_color */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals table td,
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals table td a {
                    color: @break_val_color;
                }
                /* @break_border_color */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals table th,
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals table td {
                    border-top-color: @break_border_color;
                }
                
                /* @check_btn_color */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals a.checkout-button {
                    color: @check_btn_color;
                }
                /* @check_btn_color_h */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals a.checkout-button:hover {
                    color: @check_btn_color_h;
                }
                /* @check_btn_bg */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals a.checkout-button {
                    background-color: @check_btn_bg;
                }
                /* @check_btn_bg_h */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals a.checkout-button:hover {
                    background-color: @check_btn_bg_h;
                }
                /* @check_btn_border_color */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals a.checkout-button {
                    border-color: @check_btn_border_color;
                }
                /* @check_btn_border_color_h */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals a.checkout-button:hover {
                    border-color: @check_btn_border_color_h;
                }
                
                
                /* @notice_color */
                .$unique_block_class .woocommerce-info,
                .$unique_block_class .woocommerce-message {
                    color: @notice_color;
                }
                /* @notice_color_a */
                .$unique_block_class .woocommerce-info a,
                .$unique_block_class .woocommerce-message a {
                    color: @notice_color_a;
                }
                /* @notice_bg */
                .$unique_block_class .woocommerce-info,
                .$unique_block_class .woocommerce-message {
                    background-color: @notice_bg;
                }
                /* @notice_info_border_color */
                .$unique_block_class .woocommerce-info {
                    border-top-color: @notice_info_border_color;
                }
                /* @notice_succ_border_color */
                .$unique_block_class .woocommerce-message {
                    border-top-color: @notice_succ_border_color;
                }
                
                /* @empty_btn_color */
                .$unique_block_class .return-to-shop .button {
                    color: @empty_btn_color;
                }
                /* @empty_btn_color_h */
                .$unique_block_class .return-to-shop .button:hover {
                    color: @empty_btn_color_h;
                }
                /* @empty_btn_bg */
                .$unique_block_class .return-to-shop .button {
                    background-color: @empty_btn_bg;
                }
                /* @empty_btn_bg_h */
                .$unique_block_class .return-to-shop .button:hover {
                    background-color: @empty_btn_bg_h;
                }
                /* @empty_btn_border_color */
                .$unique_block_class .return-to-shop .button {
                    border-color: @empty_btn_border_color;
                }
                /* @empty_btn_border_color_h */
                .$unique_block_class .return-to-shop .button:hover {
                    border-color: @empty_btn_border_color_h;
                }
                
                
                
                /* @f_prod_head */
                .$unique_block_class .woocommerce table.shop_table thead {
                    @f_prod_head
                }
                
                /* @f_prod_title */
                .$unique_block_class .td-woo-default td.product-name a {
                    @f_prod_title
                }
                /* @f_prod_price */
                .$unique_block_class .td-woo-default table.shop_table td.product-price,
                .$unique_block_class .td-woo-default table.shop_table td.product-subtotal {
                    @f_prod_price
                }
                /* @f_qty */
                .$unique_block_class .woocommerce .quantity .qty {
                    @f_qty
                }
                
                /* @f_coup */
                .$unique_block_class .td-woo-default table.shop_table td.actions .coupon .input-text {
                    @f_coup
                }
                /* @f_coup_btn */
                .$unique_block_class .td-woo-default table.shop_table button.button {
                    @f_coup_btn
                }
                
                /* @f_total_title */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals h2 {
                    @f_total_title
                }
                
                /* @f_break_label */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals table th {
                    @f_break_label
                }
                /* @f_break_val */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals table td {
                    @f_break_val
                }
                
                /* @f_check_btn */
                .$unique_block_class .td-woo-default .cart-collaterals .cart_totals a.checkout-button {
                    @f_check_btn
                }
                
                /* @f_notice */
                .$unique_block_class .woocommerce-info,
                .$unique_block_class .woocommerce-message {
                    @f_notice
                }
                
                /* @f_empty_btn */
                .$unique_block_class .return-to-shop .button {
                    @f_empty_btn
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
        // products table quantity border radius
        $prod_qty_border_radius = $res_ctx->get_shortcode_att('prod_qty_border_radius');
        $res_ctx->load_settings_raw( 'prod_qty_border_radius', $prod_qty_border_radius );
        if( $prod_qty_border_radius != '' && is_numeric( $prod_qty_border_radius ) ) {
            $res_ctx->load_settings_raw( 'prod_qty_border_radius', $prod_qty_border_radius . 'px' );
        }

        // product delete border radius
        $prod_del_border_radius = $res_ctx->get_shortcode_att('prod_del_border_radius');
        $res_ctx->load_settings_raw( 'prod_del_border_radius', $prod_del_border_radius );
        if( $prod_del_border_radius != '' && is_numeric( $prod_del_border_radius ) ) {
            $res_ctx->load_settings_raw( 'prod_del_border_radius', $prod_del_border_radius . 'px' );
        }

        // coupon input border radius
        $coup_input_border_radius = $res_ctx->get_shortcode_att('coup_input_border_radius');
        $res_ctx->load_settings_raw( 'coup_input_border_radius', $coup_input_border_radius );
        if( $coup_input_border_radius != '' && is_numeric( $coup_input_border_radius ) ) {
            $res_ctx->load_settings_raw( 'coup_input_border_radius', $coup_input_border_radius . 'px' );
        }

        // coupon buttons border radius
        $coup_btn_border_radius = $res_ctx->get_shortcode_att('coup_btn_border_radius');
        $res_ctx->load_settings_raw( 'coup_btn_border_radius', $coup_btn_border_radius );
        if( $coup_btn_border_radius != '' && is_numeric( $coup_btn_border_radius ) ) {
            $res_ctx->load_settings_raw( 'coup_btn_border_radius', $coup_btn_border_radius . 'px' );
        }

        // checkout button border radius
        $check_btn_border_radius = $res_ctx->get_shortcode_att('check_btn_border_radius');
        $res_ctx->load_settings_raw( 'check_btn_border_radius', $check_btn_border_radius );
        if( $check_btn_border_radius != '' && is_numeric( $check_btn_border_radius ) ) {
            $res_ctx->load_settings_raw( 'check_btn_border_radius', $check_btn_border_radius . 'px' );
        }

        // empty cart button border radius
        $empty_btn_border_radius = $res_ctx->get_shortcode_att('empty_btn_border_radius');
        $res_ctx->load_settings_raw( 'empty_btn_border_radius', $empty_btn_border_radius );
        if( $empty_btn_border_radius != '' && is_numeric( $empty_btn_border_radius ) ) {
            $res_ctx->load_settings_raw( 'empty_btn_border_radius', $empty_btn_border_radius . 'px' );
        }



        /*-- COLORS -- */
        /* -- CART WITH PRODUCTS -- */
        // Products table header
        $res_ctx->load_settings_raw('prod_head_color', $res_ctx->get_shortcode_att('prod_head_color'));

        // Products row
        $res_ctx->load_settings_raw('prod_title_color', $res_ctx->get_shortcode_att('prod_title_color'));
        $res_ctx->load_settings_raw('prod_title_color_h', $res_ctx->get_shortcode_att('prod_title_color_h'));
        $res_ctx->load_settings_raw('prod_price_color', $res_ctx->get_shortcode_att('prod_price_color'));
        $res_ctx->load_settings_raw('prod_qty_color', $res_ctx->get_shortcode_att('prod_qty_color'));
        $res_ctx->load_settings_raw('prod_qty_color_f', $res_ctx->get_shortcode_att('prod_qty_color_f'));
        $res_ctx->load_settings_raw('prod_qty_bg', $res_ctx->get_shortcode_att('prod_qty_bg'));
        $res_ctx->load_settings_raw('prod_qty_bg_f', $res_ctx->get_shortcode_att('prod_qty_bg_f'));
        $res_ctx->load_settings_raw('prod_qty_border_color', $res_ctx->get_shortcode_att('prod_qty_border_color'));
        $res_ctx->load_settings_raw('prod_qty_border_color_f', $res_ctx->get_shortcode_att('prod_qty_border_color_f'));
        $res_ctx->load_settings_raw('prod_del_color', $res_ctx->get_shortcode_att('prod_del_color'));
        $res_ctx->load_settings_raw('prod_del_color_h', $res_ctx->get_shortcode_att('prod_del_color_h'));
        $res_ctx->load_settings_raw('prod_del_bg', $res_ctx->get_shortcode_att('prod_del_bg'));
        $res_ctx->load_settings_raw('prod_del_bg_h', $res_ctx->get_shortcode_att('prod_del_bg_h'));

        // Coupon area
        $res_ctx->load_settings_raw('coup_bg', $res_ctx->get_shortcode_att('coup_bg'));
        $res_ctx->load_settings_raw('coup_input_color', $res_ctx->get_shortcode_att('coup_input_color'));
        $res_ctx->load_settings_raw('coup_input_color_f', $res_ctx->get_shortcode_att('coup_input_color_f'));
        $res_ctx->load_settings_raw('coup_input_place', $res_ctx->get_shortcode_att('coup_input_place'));
        $res_ctx->load_settings_raw('coup_input_bg', $res_ctx->get_shortcode_att('coup_input_bg'));
        $res_ctx->load_settings_raw('coup_input_bg_f', $res_ctx->get_shortcode_att('coup_input_bg_f'));
        $res_ctx->load_settings_raw('coup_input_border_color', $res_ctx->get_shortcode_att('coup_input_border_color'));
        $res_ctx->load_settings_raw('coup_input_border_color_f', $res_ctx->get_shortcode_att('coup_input_border_color_f'));
        $res_ctx->load_settings_raw('coup_btn_color', $res_ctx->get_shortcode_att('coup_btn_color'));
        $res_ctx->load_settings_raw('coup_btn_color_h', $res_ctx->get_shortcode_att('coup_btn_color_h'));
        $res_ctx->load_settings_raw('coup_btn_bg', $res_ctx->get_shortcode_att('coup_btn_bg'));
        $res_ctx->load_settings_raw('coup_btn_bg_h', $res_ctx->get_shortcode_att('coup_btn_bg_h'));
        $res_ctx->load_settings_raw('coup_btn_border_color', $res_ctx->get_shortcode_att('coup_btn_border_color'));
        $res_ctx->load_settings_raw('coup_btn_border_color_h', $res_ctx->get_shortcode_att('coup_btn_border_color_h'));


        /* -- CART TOTALS -- */
        // Cart totals general
        $res_ctx->load_settings_raw('total_bg', $res_ctx->get_shortcode_att('total_bg'));
        $res_ctx->load_settings_raw('total_title_color', $res_ctx->get_shortcode_att('total_title_color'));

        // Breakdown table
        $res_ctx->load_settings_raw('break_label_color', $res_ctx->get_shortcode_att('break_label_color'));
        $res_ctx->load_settings_raw('break_val_color', $res_ctx->get_shortcode_att('break_val_color'));
        $res_ctx->load_settings_raw('break_border_color', $res_ctx->get_shortcode_att('break_border_color'));

        // Checkout button
        $res_ctx->load_settings_raw('check_btn_color', $res_ctx->get_shortcode_att('check_btn_color'));
        $res_ctx->load_settings_raw('check_btn_color_h', $res_ctx->get_shortcode_att('check_btn_color_h'));
        $res_ctx->load_settings_raw('check_btn_bg', $res_ctx->get_shortcode_att('check_btn_bg'));
        $res_ctx->load_settings_raw('check_btn_bg_h', $res_ctx->get_shortcode_att('check_btn_bg_h'));
        $res_ctx->load_settings_raw('check_btn_border_color', $res_ctx->get_shortcode_att('check_btn_border_color'));
        $res_ctx->load_settings_raw('check_btn_border_color_h', $res_ctx->get_shortcode_att('check_btn_border_color_h'));


        /* -- EMPTY CART -- */
        // Notices
        $res_ctx->load_settings_raw('notice_color', $res_ctx->get_shortcode_att('notice_color'));
        $res_ctx->load_settings_raw('notice_color_a', $res_ctx->get_shortcode_att('notice_color_a'));
        $res_ctx->load_settings_raw('notice_bg', $res_ctx->get_shortcode_att('notice_bg'));
        $res_ctx->load_settings_raw('notice_info_border_color', $res_ctx->get_shortcode_att('notice_info_border_color'));
        $res_ctx->load_settings_raw('notice_succ_border_color', $res_ctx->get_shortcode_att('notice_succ_border_color'));

        // Button
        $res_ctx->load_settings_raw('empty_btn_color', $res_ctx->get_shortcode_att('empty_btn_color'));
        $res_ctx->load_settings_raw('empty_btn_color_h', $res_ctx->get_shortcode_att('empty_btn_color_h'));
        $res_ctx->load_settings_raw('empty_btn_bg', $res_ctx->get_shortcode_att('empty_btn_bg'));
        $res_ctx->load_settings_raw('empty_btn_bg_h', $res_ctx->get_shortcode_att('empty_btn_bg_h'));
        $res_ctx->load_settings_raw('empty_btn_border_color', $res_ctx->get_shortcode_att('empty_btn_border_color'));
        $res_ctx->load_settings_raw('empty_btn_border_color_h', $res_ctx->get_shortcode_att('empty_btn_border_color_h'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_prod_head' );

        $res_ctx->load_font_settings( 'f_prod_title' );
        $res_ctx->load_font_settings( 'f_prod_price' );
        $res_ctx->load_font_settings( 'f_qty' );

        $res_ctx->load_font_settings( 'f_coup' );
        $res_ctx->load_font_settings( 'f_coup_btn' );

        $res_ctx->load_font_settings( 'f_total_title' );
        $res_ctx->load_font_settings( 'f_break_label' );
        $res_ctx->load_font_settings( 'f_break_val' );
        $res_ctx->load_font_settings( 'f_check_btn' );

        $res_ctx->load_font_settings( 'f_notice' );
        $res_ctx->load_font_settings( 'f_empty_btn' );

    }
    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render( $atts, $content = null ) {
        
        parent::render( $atts );

        $show_page = $this->get_att('show_page');
        $woocomerce_cart = '';

        $sample_product_photo_src = TD_WOO_URL . '/assets/images/sample_product_photo.png';

        if( !td_util::tdc_is_live_editor_iframe() && !td_util::tdc_is_live_editor_ajax() ) {
            // render the woocommerce_checkout shortcode
            $woocomerce_cart = do_shortcode('[woocommerce_cart]');
        } else {
            if( $show_page == '' ) {
                $woocomerce_cart =
                    '<div class="woocommerce">
                        <div class="td-woo-default">
                            <div class="woocommerce-notices-wrapper"></div>
                                <form class="woocommerce-cart-form" action="" method="post">
                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Product</th>
                                            <th class="product-name"></th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Subtotal</th>
                                            <th class="product-remove">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="woocommerce-cart-form__cart-item cart_item">
                                            <td class="product-thumbnail">
                                                <a href="#"><img width="300" height="300" src="' . $sample_product_photo_src . '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" ></a>
                                            </td>
                                            <td class="product-name" data-title="Product"><a href="#">Sample Product 1</a></td>
                                            <td class="product-price" data-title="Price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>100.00</bdi></span></td>
                                             <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <label class="screen-reader-text" for="quantity_6193895ee54c4">Sample Product 1</label>
                                                    <input type="number" id="quantity_6193895ee54c4" class="input-text qty text" step="1" min="0" max="86" name="cart[dba67ceab699387e9c3d8edeb6781fdb][qty]" value="2" title="Qty" size="4" placeholder="" inputmode="numeric">
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>200.00</bdi></span></td>
                                            <td class="product-remove"><a href="#" class="remove" aria-label="Remove this item" data-product_id="24105" data-product_sku="">×</a></td>
                                        </tr>
                                        <tr class="woocommerce-cart-form__cart-item cart_item">
                                            <td class="product-thumbnail">
                                                <a href="#"><img width="300" height="300" src="' . $sample_product_photo_src . '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" ></a>
                                            </td>
                                            <td class="product-name" data-title="Product"><a href="#">Sample Product 2</a></td>
                                            <td class="product-price" data-title="Price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>50.00</bdi></span></td>
                                             <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <label class="screen-reader-text" for="quantity_6193895ee54c4">Sample Product 2</label>
                                                    <input type="number" id="quantity_6193895ee54c4" class="input-text qty text" step="1" min="0" max="86" name="cart[dba67ceab699387e9c3d8edeb6781fdb][qty]" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>50.00</bdi></span></td>
                                            <td class="product-remove"><a href="#" class="remove" aria-label="Remove this item" data-product_id="24105" data-product_sku="">×</a></td>
                                        </tr>
                                        <tr class="td-cart-actions">
                                            <td colspan="6" class="actions">
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
                                                    <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                                </div>
                                                <button type="submit" class="button" name="update_cart" value="Update cart" disabled="" aria-disabled="true">Update cart</button>
                                                <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="af954ca39a">
                                                <input type="hidden" name="_wp_http_referer" value="/wp_011_test_demos/woo-cart/">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="cart-collaterals">
                                <div class="cart_totals calculated_shipping">
                                    <h2>Cart totals</h2>
                                    <table cellspacing="0" class="shop_table shop_table_responsive">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>250.00</bdi></span></td>
                                            </tr>
                                            <tr class="cart-discount coupon-discount">
                                                <th>Coupon: discount</th>
                                                <td data-title="Coupon: discount">-<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>50.00</span> <a href="http://localhost/wp_011_test_demos/woo-cart/?remove_coupon=discount" class="woocommerce-remove-coupon" data-coupon="discount">[Remove]</a></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>200.00</bdi></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="#" class="checkout-button button alt wc-forward">Proceed to checkout</a>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>';
            } else {
                $woocomerce_cart =
                    '<div class="woocommerce">
                        <div class="woocommerce-notices-wrapper">
                            <div class="woocommerce-message" role="alert">“Sample Product 1” removed. <a href="#" class="restore-item">Undo?</a></div>
                            <p class="cart-empty woocommerce-info">Your cart is currently empty.</p>
                        </div>
                        <p class="return-to-shop">
		                    <a class="button wc-backward" href="#">Return to shop</a>
	                    </p>
                    </div>';
            }
        }


	    $buffy = '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

            $buffy .= $this->get_block_css(); // block css
            $buffy .= $this->get_block_js(); // block js


            $buffy .= '<div class="tdw-block-inner td-fix-index">';
                $buffy .= $woocomerce_cart;
            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

