<?php

/**
 * Class td_woo_add_to_cart
 */
class td_woo_add_to_cart extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
                
                /* @general_style */
                .td_woo_add_to_cart .woocommerce-variation-add-to-cart,
                .td_woo_add_to_cart form:not(.variations_form) {
                    display: flex;
                    margin-bottom: 0 !important;
                }
                .td_woo_add_to_cart form:not(.variations_form) {
                    flex-wrap: wrap;
                }
                .td_woo_add_to_cart .woocommerce-variation-add-to-cart .quantity .qty,
                .td_woo_add_to_cart form:not(.variations_form) .quantity .qty {
                    width: 0;
                    min-width: 50px;
                    height: 100%;
                    background-color: #fff;
                    border-width: 1px;
                    border-style: solid;
                    border-radius: 2px;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form {
                    display: flex;
                    flex-direction: column;
                    margin-bottom: 0;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .variations {
                    margin-bottom: 20px;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .variations tr {
                    display: flex;
                    border-bottom: 15px solid transparent;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .variations tr:last-child {
                    border-bottom: none !important;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .variations td {
                    padding-top: 0;
                    padding-bottom: 0;
                    vertical-align: middle;
                    line-height: 1;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .variations td.label {
                    width: 25%;
                    font-size: 13px;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .variations td.value {
                    position: relative;
                    width: 75%;
                    padding-right: 0;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .variations select {
                    min-width: 100%;
                    margin-right: 0;
                    padding: 9px;
                    font-size: 13px;
                    border-color: #ddd;
                    border-radius: 0;
                    outline: none !important;
                    -webkit-appearance: none;
                    cursor: pointer;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .variations select:active,
                .woocommerce div.td_woo_add_to_cart form.variations_form .variations select:focus {
                    border-color: #b0b0b0;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .woocommerce-variation-availability,
                .woocommerce div.td_woo_add_to_cart .td-woocommerce-variation-availability {
                    margin-bottom: 20px;
                }
                .woocommerce div.td_woo_add_to_cart .td-woocommerce-variation-availability {
                    flex: 1 0 100%;
                }
                .woocommerce div.td_woo_add_to_cart form.cart .stock {
                    margin-bottom: 0;
                    font-size: 12px;
                }
                .woocommerce div.td_woo_add_to_cart form.variations_form .reset_variations {
                    position: absolute;
                    top: 100%;
                    left: 0;
                    margin-top: 4px;
                    font-size: 11px;
                }
                .woocommerce form.variations_form .single_add_to_cart_button {
                    font-size: 13px;
                    border-radius: 0;
                }
                .td_woo_add_to_cart .variable-items-wrapper {
                    display: flex;
                    flex-wrap: wrap;
                    margin: 0;
                    list-style-type: none;
                }
                .td_woo_add_to_cart .variable-item {
                    display: flex;
                    margin: 0;
                    margin-right: 10px;
                    background-color: #fff;
                    transition: all .2s ease;
                    cursor: pointer;
                    outline: none !important;
                    user-select: none;
                    -webkit-user-select: none;
                }
                .td_woo_add_to_cart .variable-item span {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    height: 100%;
                }
                .td_woo_add_to_cart .color-variable-item {
                    padding: 4px;
                    width: 30px;
                    height: 30px;
                }
                .td_woo_add_to_cart .button-variable-item {
                    padding: 0 6px;
                    min-width: 30px;
                    min-height: 30px;
                }
                .td_woo_add_to_cart .variable-item[data-tooltip]:before,
                .td_woo_add_to_cart .variable-item[data-tooltip]:after {
                    position: absolute;
                    bottom: 130%;
                    left: 50%;
                    transform: translateX(-50%);
                    transition: opacity 300ms linear, bottom 300ms linear;
                    visibility: hidden;
                    opacity: 0;
                    z-index: 999;
                    pointer-events: none;
                }
                .td_woo_add_to_cart .variable-item[data-tooltip] {
                    position: relative;
                }
                .td_woo_add_to_cart .variable-item[data-tooltip]:before {
                    content: attr(data-tooltip);
                    margin-bottom: 5px;
                    padding: 7px;
                    min-width: 80px;
                    background-color: rgba(51, 51, 51, 0.9);
                    font-size: 13px;
                    line-height: 1.2;
                    text-align: center;
                    color: #fff;
                    border: 0 solid #000;
                    border-radius: 3px;
                }
                .td_woo_add_to_cart .variable-item[data-tooltip]:after {
                    content: '';
                    font-size: 0;
                    line-height: 0;
                    border-style: solid;
                    border-width: 5px 5px 0 5px;
                    border-color: rgba(51, 51, 51, 0.9) transparent transparent transparent;
                }
                .td_woo_add_to_cart .variable-item[data-tooltip]:hover:before,
                .td_woo_add_to_cart .variable-item[data-tooltip]:hover:after {
                    bottom: 120%;
                    visibility: visible;
                    opacity: 1;
                }
                
                .td_woo_add_to_cart .variable-item.disabled,
                .td_woo_add_to_cart .variable-item.disabled:hover {
                  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05);
                  pointer-events: none;
                  cursor: not-allowed;
                  position: relative;
                  overflow: hidden;
                }
                
                .td_woo_add_to_cart .variable-item.disabled img,
                .td_woo_add_to_cart .variable-item.disabled span,
                .td_woo_add_to_cart .variable-item.disabled:hover img,
                .td_woo_add_to_cart .variable-item.disabled:hover span {
                  opacity: .3;
                }
                
                .td_woo_add_to_cart .variable-item.disabled::before,
                .td_woo_add_to_cart .variable-item.disabled::after,
                .td_woo_add_to_cart .variable-item.disabled:hover::before,
                .td_woo_add_to_cart .variable-item.disabled:hover::after {
                  position: absolute;
                  content: '' !important;
                  width: 100%;
                  height: 1px;
                  background: #FF0000 !important;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  top: 50%;
                  visibility: visible;
                  opacity: 1;
                  border: 0;
                  margin: 0 !important;
                  padding: 0 !important;
                  min-width: auto;
                  -webkit-transform-origin: center;
                          transform-origin: center;
                  z-index: 0;
                }
                
                .td_woo_add_to_cart .variable-item.disabled::before,
                .td_woo_add_to_cart .variable-item.disabled:hover::before {
                  -webkit-transform: rotate(45deg);
                          transform: rotate(45deg);
                }
                
                .td_woo_add_to_cart .variable-item.disabled::after,
                .td_woo_add_to_cart .variable-item.disabled:hover::after {
                  -webkit-transform: rotate(-45deg);
                          transform: rotate(-45deg);
                }
                
                .td_woo_add_to_cart .value div.woo-variation-default-select-wrapper:after {
                    content: '\\e801';
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    right: 9px;
                    font-family: 'newspaper';
                    font-size: 14px;
                }
                
                /* @show_tooltip */
                body .$unique_block_class.tdc-element-selected:not(.tdc-dragged) .variable-item.first-variable-item[data-tooltip]:before,
                body .$unique_block_class.tdc-element-selected:not(.tdc-dragged) .variable-item.first-variable-item[data-tooltip]:after {
                    bottom: 120%;
                    visibility: visible;
                    opacity: 1;
                }
                
                
                /* @form_space */
                body.woocommerce div.$unique_block_class form.variations_form .variations {
                    margin-bottom: @form_space;
                }
                /* @row_display */
                body.woocommerce div.$unique_block_class form.variations_form .variations tr {
                    flex-direction: @row_display;
                }
                /* @row_space */
                body.woocommerce div.$unique_block_class form.variations_form .variations tr {
                    border-bottom-width: @row_space;
                }
                
                /* @stock_txt_space */
                body.woocommerce div.$unique_block_class form.variations_form .woocommerce-variation-availability,
                body.woocommerce div.$unique_block_class .td-woocommerce-variation-availability{
                    margin-bottom: @stock_txt_space;
                }
                
                /* @label_width */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.label {
                    width: @label_width;
                }
                /* @label_space_right */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.label {
                    padding-right: @label_space_right;
                    padding-bottom: 0;
                }
                /* @label_space_bottom */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.label {
                    padding-right: 0;
                    padding-bottom: @label_space_bottom;
                }
                /* @label_horiz_align_left */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.label {
                    text-align: left;
                }
                /* @label_horiz_align_center */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.label {
                    text-align: center;
                }
                /* @label_horiz_align_right */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.label {
                    text-align: right;
                }
                
                /* @drop_width */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.value {
                    width: @drop_width;
                }
                /* @drop_horiz_align_left */
                body .$unique_block_class .variable-items-wrapper {
                    justify-content: flex-start;
                }
                /* @drop_horiz_align_center */
                body .$unique_block_class .variable-items-wrapper {
                    justify-content: center;
                }
                /* @drop_horiz_align_right */
                body .$unique_block_class .variable-items-wrapper {
                    justify-content: flex-end;
                }
                /* @drop_padding */
                body.woocommerce div.$unique_block_class form.variations_form .variations select {
                    padding: @drop_padding;
                }
                /* @drop_arrow_size */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.value div.woo-variation-default-select-wrapper:after {
                    font-size: @drop_arrow_size;
                }
                /* @drop_border */
                body.woocommerce div.$unique_block_class form.variations_form .variations select {
                    border-width: @drop_border;
                }
                /* @drop_border_style */
                body.woocommerce div.$unique_block_class form.variations_form .variations select {
                    border-style: @drop_border_style;
                }
                /* @drop_border_radius */
                body.woocommerce div.$unique_block_class form.variations_form .variations select {
                    border-radius: @drop_border_radius;
                }
                
                /* @color_size */
                body .$unique_block_class .color-variable-item {
                    width: @color_size;
                    height: @color_size;
                }
                /* @color_margin */
                body .$unique_block_class .color-variable-item {
                    margin: @color_margin;
                }
                /* @color_padd */
                body .$unique_block_class .color-variable-item {
                    padding: @color_padd;
                }
                /* @all_color_border */
                body .$unique_block_class .color-variable-item {
                    box-shadow: inset 0 0 0 @all_color_border @all_color_border_c;
                }
                /* @all_color_border_s */
                body .$unique_block_class .color-variable-item.selected {
                    box-shadow: inset 0 0 0 @all_color_border_s @all_color_border_c_s;
                }
                /* @color_radius */
                body .$unique_block_class .color-variable-item,
                body .$unique_block_class .color-variable-item span,
                body .$unique_block_class .color-variable-item img {
                    border-radius: @color_radius;
                }
                
                /* @but_size */
                body .$unique_block_class .button-variable-item {
                    min-width: @but_size;
                    min-height: @but_size;
                }
                /* @but_margin */
                body .$unique_block_class .button-variable-item {
                    margin: @but_margin;
                }
                /* @but_padd */
                body .$unique_block_class .button-variable-item {
                    padding: @but_padd;
                }
                /* @all_but_border */
                body .$unique_block_class .button-variable-item {
                    box-shadow: inset 0 0 0 @all_but_border @all_but_border_c;
                }
                /* @all_but_border_s */
                body .$unique_block_class .button-variable-item.selected {
                    box-shadow: inset 0 0 0 @all_but_border_s @all_but_border_c_s;
                }
                /* @but_radius */
                body .$unique_block_class .button-variable-item {
                    border-radius: @but_radius;
                }
                
                /* @tooltip_width */
                body .$unique_block_class .variable-item[data-tooltip]:before {
                    width: @tooltip_width;
                }
                /* @tooltip_padd */
                body .$unique_block_class .variable-item[data-tooltip]:before {
                    padding: @tooltip_padd;
                }
                /* @tooltip_radius */
                body .$unique_block_class .variable-item[data-tooltip]:before {
                    border-radius: @tooltip_radius;
                }
            
            
                /* @make_inline */
                .$unique_block_class {
                    display: inline-block;
                }
                
                /* @align_horiz_left */
                .$unique_block_class form:not(.variations_form) {
                    justify-content: flex-start;
                }
                .$unique_block_class form.variations_form {
                    align-items: flex-start;
                }
                .$unique_block_class form.variations_form .single_variation_wrap {
                    text-align: left;
                }
                /* @row_align_horiz_left1 */
                body.woocommerce div.$unique_block_class form.variations_form .variations tr {
                    align-items: flex-start;
                    justify-content: flex-start;
                }
                /* @row_align_horiz_left2 */
                body.woocommerce div.$unique_block_class form.variations_form .variations tr {
                    align-items: center;
                    justify-content: flex-start;
                }
                /* @align_horiz_center */
                .$unique_block_class form:not(.variations_form) {
                    justify-content: center;
                }
                .$unique_block_class form.variations_form {
                    align-items: center;
                }
                .$unique_block_class form.variations_form .single_variation_wrap {
                    text-align: center;
                }
                /* @row_align_horiz_center1 */
                body.woocommerce div.$unique_block_class form.variations_form .variations tr {
                    align-items: center;
                    justify-content: flex-start;
                }
                /* @row_align_horiz_center2 */
                body.woocommerce div.$unique_block_class form.variations_form .variations tr {
                    align-items: center;
                    justify-content: center;
                }
                /* @align_horiz_right */
                .$unique_block_class form:not(.variations_form) {
                    justify-content: flex-end;
                }
                .$unique_block_class form.variations_form {
                    align-items: flex-end;
                }
                .$unique_block_class form.variations_form .single_variation_wrap {
                    text-align: right;
                }
                /* @row_align_horiz_right1 */
                body.woocommerce div.$unique_block_class form.variations_form .variations tr {
                    align-items: flex-end;
                    justify-content: flex-start;
                }
                /* @row_align_horiz_right2 */
                body.woocommerce div.$unique_block_class form.variations_form .variations tr {
                    align-items: center;
                    justify-content: flex-end;
                }
                
                /* @qty_width */
                body.woocommerce div.$unique_block_class form .quantity .qty {
                    min-width: @qty_width;
                }
                /* @qty_space */
                body.woocommerce div.$unique_block_class form.cart div.quantity {
                    margin-right: @qty_space;
                }
                /* @qty_padding */
                body.woocommerce div.$unique_block_class form .quantity .qty {
                    padding: @qty_padding;
                }
                /* @qty_border  */
                body.woocommerce div.$unique_block_class form .quantity .qty {
                    border-width: @qty_border;
                }
                /* @qty_border_style */
                body.woocommerce div.$unique_block_class form .quantity .qty {
                    border-style: @qty_border_style;
                }
                /* @qty_border_radius */
                body.woocommerce div.$unique_block_class form .quantity .qty {
                    border-radius: @qty_border_radius;
                }
                
                
                /* @clear_txt_color */
                body.woocommerce div.$unique_block_class form.variations_form .reset_variations {
                    color: @clear_txt_color;
                }
                /* @clear_txt_color_h */
                body.woocommerce div.$unique_block_class form.variations_form .reset_variations:hover {
                    color: @clear_txt_color_h;
                }
                
                /* @stock_txt_color */
                body.woocommerce div.$unique_block_class form.cart .stock {
                    color: @stock_txt_color;
                }
                
                /* @label_color */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.label {
                    color: @label_color;
                }
                /* @drop_color */
                body.woocommerce div.$unique_block_class form.variations_form .variations select {
                    color: @drop_color;
                }
                /* @drop_arrow_color */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.value div.woo-variation-default-select-wrapper:after {
                    color: @drop_arrow_color;
                }
                /* @drop_bg_color */
                body.woocommerce div.$unique_block_class form.variations_form .variations select {
                    background-color: @drop_bg_color;
                }
                /* @drop_bg_color_f */
                body.woocommerce div.$unique_block_class form.variations_form .variations select:active,
                body.woocommerce div.$unique_block_class form.variations_form .variations select:focus {
                    background-color: @drop_bg_color_f;
                }
                /* @drop_border_color */
                body.woocommerce div.$unique_block_class form.variations_form .variations select {
                    border-color: @drop_border_color;
                }
                /* @drop_border_color_f */
                body.woocommerce div.$unique_block_class form.variations_form .variations select:active,
                body.woocommerce div.$unique_block_class form.variations_form .variations select:focus {
                    border-color: @drop_border_color_f;
                }
                
                /* @color_bg */
                body .$unique_block_class .color-variable-item {
                    background-color: @color_bg;
                }
                /* @color_bg_s */
                body .$unique_block_class .color-variable-item.selected {
                    background-color: @color_bg_s;
                }
                
                /* @but_txt */
                body .$unique_block_class .button-variable-item {
                    color: @but_txt;
                }
                /* @but_txt_s */
                body .$unique_block_class .button-variable-item.selected {
                    color: @but_txt_s;
                }
                /* @but_bg */
                body .$unique_block_class .button-variable-item {
                    background-color: @but_bg;
                }
                /* @but_bg_s */
                body .$unique_block_class .button-variable-item.selected {
                    background-color: @but_bg_s;
                }
                
                /* @tooltip_txt */
                body .$unique_block_class .variable-item[data-tooltip]:before {
                    color: @tooltip_txt;
                }
                /* @tooltip_bg */
                body .$unique_block_class .variable-item[data-tooltip]:before {
                    background-color: @tooltip_bg;
                }
                body .$unique_block_class .variable-item[data-tooltip]:after {
                    border-color: @tooltip_bg transparent transparent transparent;
                }
                /* @tooltip_shadow */
                body .$unique_block_class .variable-item[data-tooltip]:before {
                    box-shadow: @tooltip_shadow;
                }
                
                /* @qty_txt_color */
                body.woocommerce div.$unique_block_class form .quantity .qty {
                    color: @qty_txt_color;
                }
                /* @qty_bg_color */
                body.woocommerce div.$unique_block_class form .quantity .qty {
                    background-color: @qty_bg_color;
                }
                /* @qty_border_color */
                body.woocommerce div.$unique_block_class form .quantity .qty {
                    border-color: @qty_border_color;
                }
                
                
                
                /* @f_label */
                body.woocommerce div.$unique_block_class form.variations_form .variations td.label label {
                    @f_label
                }
                /* @f_drop */
                body.woocommerce div.$unique_block_class form.variations_form .variations select {
                    @f_drop
                }
                /* @f_but */
                body .$unique_block_class .button-variable-item {
                    @f_but
                }
                /* @f_clear */
                body.woocommerce div.$unique_block_class form.variations_form .reset_variations {
                    @f_clear
                }
                /* @f_stock */
                body.woocommerce div.$unique_block_class form .stock {
                    @f_stock
                }
                /* @f_qty */
                body.woocommerce div.$unique_block_class form .quantity .qty {
                    @f_qty;
                }
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw( 'general_style', 1 );

        // dropdown arrow
        $drop_arrow_size = $res_ctx->get_shortcode_att('drop_arrow_size');
        $res_ctx->load_settings_raw( 'drop_arrow_size', $drop_arrow_size );
        if( $drop_arrow_size != '' && is_numeric( $drop_arrow_size ) ) {
            $res_ctx->load_settings_raw( 'drop_arrow_size', $drop_arrow_size . 'px' );
        }
        $res_ctx->load_settings_raw( 'drop_arrow_color', $res_ctx->get_shortcode_att('drop_arrow_color') );


        if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) {
            $res_ctx->load_settings_raw('show_tooltip', $res_ctx->get_shortcode_att('show_tooltip'));
        }



        /*-- VARIATIONS FORM -- */
        // form space
        $form_space = $res_ctx->get_shortcode_att('form_space');
        $res_ctx->load_settings_raw( 'form_space', $form_space );
        if( $form_space != '' && is_numeric( $form_space ) ) {
            $res_ctx->load_settings_raw( 'form_space', $form_space . 'px' );
        }
        // rows display
        $row_display = $res_ctx->get_shortcode_att('row_display');
        $res_ctx->load_settings_raw( 'row_display', $row_display );
        // rows space
        $row_space = $res_ctx->get_shortcode_att('row_space');
        $res_ctx->load_settings_raw( 'row_space', $row_space );
        if( $row_space != '' && is_numeric( $row_space ) ) {
            $res_ctx->load_settings_raw('row_space', $row_space . 'px');
        }

        // stock text space
        $stock_txt_space = $res_ctx->get_shortcode_att('stock_txt_space');
        $res_ctx->load_settings_raw( 'stock_txt_space', $stock_txt_space );
        if( $stock_txt_space != '' && is_numeric( $stock_txt_space ) ) {
            $res_ctx->load_settings_raw('stock_txt_space', $stock_txt_space . 'px');
        }

        // label width
        $label_width = $res_ctx->get_shortcode_att('label_width');
        $res_ctx->load_settings_raw( 'label_width', $label_width );
        if( $label_width != '' && is_numeric( $label_width ) ) {
            $res_ctx->load_settings_raw( 'label_width', $label_width . 'px' );
        }
        // label space
        $label_space = $res_ctx->get_shortcode_att('label_space');
        if( $row_display == 'column' ) {
            $res_ctx->load_settings_raw( 'label_space_bottom', $label_space );
            if( $label_space != '' ) {
                if( is_numeric( $label_space ) ) {
                    $res_ctx->load_settings_raw( 'label_space_bottom', $label_space . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'label_space_bottom', '20px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'label_space_right', $label_space );
            if( $label_space != '' ) {
                if( is_numeric( $label_space ) ) {
                    $res_ctx->load_settings_raw( 'label_space_right', $label_space . 'px' );
                }
            } else {
                $res_ctx->load_settings_raw( 'label_space_right', '20px' );
            }
        }
        // label horiz align
        $label_horiz_align = $res_ctx->get_shortcode_att('label_horiz_align');
        if( $label_horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'label_horiz_align_left', 1 );
        } else if( $label_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'label_horiz_align_center', 1 );
        } else if( $label_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'label_horiz_align_right', 1 );
        }



        // options width
        $drop_width = $res_ctx->get_shortcode_att('drop_width');
        $res_ctx->load_settings_raw( 'drop_width', $drop_width );
        if( $drop_width != '' && is_numeric( $drop_width ) ) {
            $res_ctx->load_settings_raw( 'drop_width', $drop_width . 'px' );
        }
        // options horiz align
        $drop_horiz_align = $res_ctx->get_shortcode_att('drop_horiz_align');
        if( $drop_horiz_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'drop_horiz_align_left', 1 );
        } else if( $drop_horiz_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'drop_horiz_align_center', 1 );
        } else if( $drop_horiz_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'drop_horiz_align_right', 1 );
        }


        // dropdown padding
        $drop_padding = $res_ctx->get_shortcode_att('drop_padding');
        $res_ctx->load_settings_raw( 'drop_padding', $drop_padding );
        if( $drop_padding != '' && is_numeric( $drop_padding ) ) {
            $res_ctx->load_settings_raw( 'drop_padding', $drop_padding . 'px' );
        }
        // dropdown border size
        $drop_border = $res_ctx->get_shortcode_att('drop_border');
        $res_ctx->load_settings_raw( 'drop_border', $drop_border );
        if( $drop_border != '' && is_numeric( $drop_border ) ) {
            $res_ctx->load_settings_raw( 'drop_border', $drop_border . 'px' );
        }
        // dropdown border style
        $drop_border_style = $res_ctx->get_shortcode_att('drop_border_style');
        $res_ctx->load_settings_raw( 'drop_border_style', $drop_border_style );
        if( $drop_border_style == '' ) {
            $res_ctx->load_settings_raw( 'drop_border_style', 'solid' );
        }
        // dropdown border radius
        $drop_border_radius = $res_ctx->get_shortcode_att('drop_border_radius');
        $res_ctx->load_settings_raw( 'drop_border_radius', $drop_border_radius );
        if( $drop_border_radius != '' && is_numeric( $drop_border_radius ) ) {
            $res_ctx->load_settings_raw( 'drop_border_radius', $drop_border_radius . 'px' );
        }

        // color width
        $color_size = $res_ctx->get_shortcode_att('color_size');
        $res_ctx->load_settings_raw( 'color_size', $color_size );
        if( $color_size != '' && is_numeric( $color_size ) ) {
            $res_ctx->load_settings_raw( 'color_size', $color_size . 'px' );
        }
        // color margin
        $color_margin = $res_ctx->get_shortcode_att('color_margin');
        $res_ctx->load_settings_raw( 'color_margin', $color_margin );
        if( $color_margin != '' && is_numeric( $color_margin ) ) {
            $res_ctx->load_settings_raw( 'color_margin', $color_margin . 'px' );
        }
        // color padding
        $color_padd = $res_ctx->get_shortcode_att('color_padd');
        if( $color_padd != '' && is_numeric( $color_padd ) ) {
            $res_ctx->load_settings_raw( 'color_padd', $color_padd . 'px' );
        }
        // color border size
        $all_color_border = $res_ctx->get_shortcode_att('all_color_border');
        if( $all_color_border != '' ) {
            if ( is_numeric( $all_color_border ) ) {
                $res_ctx->load_settings_raw( 'all_color_border', $all_color_border . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_color_border', '1px' );
        }
        // selected color border size
        $all_color_border_s = $res_ctx->get_shortcode_att('all_color_border_s');
        if( $all_color_border_s != '' ) {
            if( is_numeric( $all_color_border_s ) ) {
                $res_ctx->load_settings_raw( 'all_color_border_s', $all_color_border_s . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_color_border_s', '2px' );
        }
        // color border radius
        $color_radius = $res_ctx->get_shortcode_att('color_radius');
        $res_ctx->load_settings_raw( 'color_radius', $color_radius );
        if( $color_radius != '' && is_numeric( $color_radius ) ) {
            $res_ctx->load_settings_raw( 'color_radius', $color_radius . 'px' );
        }

        // button switch width
        $but_size = $res_ctx->get_shortcode_att('but_size');
        $res_ctx->load_settings_raw( 'but_size', $but_size );
        if( $but_size != '' && is_numeric( $but_size ) ) {
            $res_ctx->load_settings_raw( 'but_size', $but_size . 'px' );
        }
        // button switch margin
        $but_margin = $res_ctx->get_shortcode_att('but_margin');
        $res_ctx->load_settings_raw( 'but_margin', $but_margin );
        if( $but_margin != '' && is_numeric( $but_margin ) ) {
            $res_ctx->load_settings_raw( 'but_margin', $but_margin . 'px' );
        }
        // button switch padding
        $but_padd = $res_ctx->get_shortcode_att('but_padd');
        $res_ctx->load_settings_raw( 'but_padd', $but_padd );
        if( $but_padd != '' && is_numeric( $but_padd ) ) {
            $res_ctx->load_settings_raw( 'but_padd', $but_padd . 'px' );
        }
        // button switch border size
        $all_but_border = $res_ctx->get_shortcode_att('all_but_border');
        if( $all_but_border != '' ) {
            if( is_numeric( $all_but_border ) ) {
                $res_ctx->load_settings_raw( 'all_but_border', $all_but_border . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_but_border', '1px' );
        }
        // selected button switch border size
        $all_but_border_s = $res_ctx->get_shortcode_att('all_but_border_s');
        if( $all_but_border_s != '' ) {
            if( is_numeric( $all_but_border_s ) ) {
                $res_ctx->load_settings_raw( 'all_but_border_s', $all_but_border_s . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_but_border_s', '2px' );
        }
        // button switch border radius
        $but_radius = $res_ctx->get_shortcode_att('but_radius');
        $res_ctx->load_settings_raw( 'but_radius', $but_radius );
        if( $but_radius != '' && is_numeric( $but_radius ) ) {
            $res_ctx->load_settings_raw( 'but_radius', $but_radius . 'px' );
        }

        // tooltip min width
        $tooltip_width = $res_ctx->get_shortcode_att('tooltip_width');
        $res_ctx->load_settings_raw( 'tooltip_width', $tooltip_width );
        if( $tooltip_width != '' && is_numeric( $tooltip_width ) ) {
            $res_ctx->load_settings_raw( 'tooltip_width', $tooltip_width . 'px' );
        }
        // tooltip padding
        $tooltip_padd = $res_ctx->get_shortcode_att('tooltip_padd');
        $res_ctx->load_settings_raw( 'tooltip_padd', $tooltip_padd );
        if( $tooltip_padd != '' && is_numeric( $tooltip_padd ) ) {
            $res_ctx->load_settings_raw( 'tooltip_padd', $tooltip_padd . 'px' );
        }
        // tooltip border radius
        $tooltip_radius = $res_ctx->get_shortcode_att('tooltip_radius');
        $res_ctx->load_settings_raw( 'tooltip_radius', $tooltip_radius );
        if( $tooltip_radius != '' && is_numeric( $tooltip_radius ) ) {
            $res_ctx->load_settings_raw( 'tooltip_radius', $tooltip_radius . 'px' );
        }


        // make inline
        $res_ctx->load_settings_raw( 'make_inline', $res_ctx->get_shortcode_att('make_inline') );

        // align horizontal
        $align_horiz = $res_ctx->get_shortcode_att('align_horiz');
        if( $align_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_horiz_left', 1 );

            if( $row_display == 'column' ) {
                $res_ctx->load_settings_raw( 'row_align_horiz_left1', 1 );
            } else {
                $res_ctx->load_settings_raw( 'row_align_horiz_left2', 1 );
            }
        } else if( $align_horiz == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_horiz_center', 1 );

            if( $row_display == 'column' ) {
                $res_ctx->load_settings_raw( 'row_align_horiz_center1', 1 );
            } else {
                $res_ctx->load_settings_raw( 'row_align_horiz_center2', 1 );
            }
        } else if( $align_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_horiz_right', 1 );

            if( $row_display == 'column' ) {
                $res_ctx->load_settings_raw( 'row_align_horiz_right1', 1 );
            } else {
                $res_ctx->load_settings_raw( 'row_align_horiz_right2', 1 );
            }
        }



        /*-- QUANTITY INPUT -- */
        // width
        $qty_width = $res_ctx->get_shortcode_att('qty_width');
        $res_ctx->load_settings_raw( 'qty_width', $qty_width );
        if( $qty_width != '' && is_numeric( $qty_width ) ) {
            $res_ctx->load_settings_raw( 'qty_width', $qty_width . 'px' );
        }

        // space
        $qty_space = $res_ctx->get_shortcode_att('qty_space');
        $res_ctx->load_settings_raw( 'qty_space', $qty_space );
        if( $qty_space != '' && is_numeric( $qty_space ) ) {
            $res_ctx->load_settings_raw( 'qty_space', $qty_space . 'px' );
        }

        // padding
        $qty_padding = $res_ctx->get_shortcode_att('qty_padding');
        $res_ctx->load_settings_raw( 'qty_padding', $qty_padding );
        if( $qty_padding != '' && is_numeric( $qty_padding ) ) {
            $res_ctx->load_settings_raw( 'qty_padding', $qty_padding . 'px' );
        }

        // border size
        $qty_border = $res_ctx->get_shortcode_att('qty_border');
        $res_ctx->load_settings_raw( 'qty_border', $qty_border );
        if( $qty_border != '' && is_numeric( $qty_border ) ) {
            $res_ctx->load_settings_raw( 'qty_border', $qty_border . 'px' );
        }

        // border style
        $qty_border_style = $res_ctx->get_shortcode_att('qty_border_style');
        $res_ctx->load_settings_raw( 'qty_border_style', $qty_border_style );
        if( $qty_border_style == '' ) {
            $res_ctx->load_settings_raw( 'qty_border_style', 'solid' );
        }

        // border radius
        $qty_border_radius = $res_ctx->get_shortcode_att('qty_border_radius');
        $res_ctx->load_settings_raw( 'qty_border_radius', $qty_border_radius );
        if( $qty_border_radius != '' && is_numeric( $qty_border_radius ) ) {
            $res_ctx->load_settings_raw( 'qty_border_radius', $qty_border_radius . 'px' );
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'clear_txt_color', $res_ctx->get_shortcode_att('clear_txt_color') );
        $res_ctx->load_settings_raw( 'clear_txt_color_h', $res_ctx->get_shortcode_att('clear_txt_color_h') );

        $res_ctx->load_settings_raw( 'stock_txt_color', $res_ctx->get_shortcode_att('stock_txt_color') );

        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_shortcode_att('label_color') );

        $res_ctx->load_settings_raw( 'drop_color', $res_ctx->get_shortcode_att('drop_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color', $res_ctx->get_shortcode_att('drop_bg_color') );
        $res_ctx->load_settings_raw( 'drop_bg_color_f', $res_ctx->get_shortcode_att('drop_bg_color_f') );
        $res_ctx->load_settings_raw( 'drop_border_color', $res_ctx->get_shortcode_att('drop_border_color') );
        $res_ctx->load_settings_raw( 'drop_border_color_f', $res_ctx->get_shortcode_att('drop_border_color_f') );

        $res_ctx->load_settings_raw( 'color_bg', $res_ctx->get_shortcode_att('color_bg') );
        $res_ctx->load_settings_raw( 'color_bg_s', $res_ctx->get_shortcode_att('color_bg_s') );
        $all_color_border_c = $res_ctx->get_shortcode_att('all_color_border_c');
        if( $all_color_border_c != '' ) {
            $res_ctx->load_settings_raw( 'all_color_border_c', $all_color_border_c );
        } else {
            $res_ctx->load_settings_raw( 'all_color_border_c', '#dfdfdf' );
        }
        $all_color_border_c_s = $res_ctx->get_shortcode_att('all_color_border_c_s');
        if( $all_color_border_c_s != '' ) {
            $res_ctx->load_settings_raw( 'all_color_border_c_s', $all_color_border_c_s );
        } else {
            $res_ctx->load_settings_raw( 'all_color_border_c_s', '#444' );
        }

        $res_ctx->load_settings_raw( 'but_txt', $res_ctx->get_shortcode_att('but_txt') );
        $res_ctx->load_settings_raw( 'but_txt_s', $res_ctx->get_shortcode_att('but_txt_s') );
        $res_ctx->load_settings_raw( 'but_bg', $res_ctx->get_shortcode_att('but_bg') );
        $res_ctx->load_settings_raw( 'but_bg_s', $res_ctx->get_shortcode_att('but_bg_s') );
        $all_but_border_c = $res_ctx->get_shortcode_att('all_but_border_c');
        if( $all_but_border_c != '' ) {
            $res_ctx->load_settings_raw( 'all_but_border_c', $all_but_border_c );
        } else {
            $res_ctx->load_settings_raw( 'all_but_border_c', '#dfdfdf' );
        }
        $all_but_border_c_s = $res_ctx->get_shortcode_att('all_but_border_c_s');
        if( $all_but_border_c_s != '' ) {
            $res_ctx->load_settings_raw( 'all_but_border_c_s', $all_but_border_c_s );
        } else {
            $res_ctx->load_settings_raw( 'all_but_border_c_s', '#444' );
        }

        $res_ctx->load_settings_raw( 'tooltip_txt', $res_ctx->get_shortcode_att('tooltip_txt') );
        $res_ctx->load_settings_raw( 'tooltip_bg', $res_ctx->get_shortcode_att('tooltip_bg') );
        $res_ctx->load_shadow_settings( 15, 0, 7, 0,  'rgba(0, 0, 0, 0.3)', 'tooltip_shadow' );

        $res_ctx->load_settings_raw( 'qty_txt_color', $res_ctx->get_shortcode_att('qty_txt_color') );
        $res_ctx->load_settings_raw( 'qty_bg_color', $res_ctx->get_shortcode_att('qty_bg_color') );
        $res_ctx->load_settings_raw( 'qty_border_color', $res_ctx->get_shortcode_att('qty_border_color') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_label' );
        $res_ctx->load_font_settings( 'f_drop' );
        $res_ctx->load_font_settings( 'f_but' );
        $res_ctx->load_font_settings( 'f_tooltip' );
        $res_ctx->load_font_settings( 'f_clear' );
        $res_ctx->load_font_settings( 'f_stock' );
        $res_ctx->load_font_settings( 'f_qty' );

    }

    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        parent::render($atts);

        global $td_woo_state_single_product_page;

        $add_to_cart_data = $td_woo_state_single_product_page->product_add_to_cart->__invoke($atts);

        $this->unique_block_class = $this->block_uid;

        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_w_button' )
            ), $atts );

        $tds_w_button = $this->get_att('tds_w_button');
        if ( empty( $tds_w_button ) ) {
            $tds_w_button = td_util::get_option( 'tds_w_button', 'tds_w_button1' );
        }
        $tds_w_button_instance = new $tds_w_button( $this->shortcode_atts, $this->unique_block_class );

        // product type
        $product_type = $add_to_cart_data['type'];

        // data type
        $sample_data =  $add_to_cart_data['sample_data'];

        $buffy = '';

        $buffy .= '<div class="' . $this->get_block_classes( array( str_replace('_', '-', $tds_w_button ) ) )  . '" ' . $this->get_block_html_atts() . '>';

        //get the block css
        $buffy .= $this->get_block_css();
        $buffy .= $tds_w_button_instance->render();

        //get the js for this block
        $buffy .= $this->get_block_js();


        $buffy .= '<div class="tdw-block-inner td-fix-index">';

        ob_start();
        do_action( 'woocommerce_before_add_to_cart_form' );
        $buffy .= ob_get_clean();

        if ( $product_type === 'variable' || $product_type === 'variable-subscription' ) {

            // render the JS
            ob_start();
            ?>
            <script>
                /* global jQuery:{} */
                jQuery().ready( function () {

                    var tdwVariationSwitchesItem = new tdwVariationSwitches.item();

                    // block unique ID
                    tdwVariationSwitchesItem.blockUid = '<?php echo $this->block_uid; ?>';
                    tdwVariationSwitchesItem.blockAtts = '<?php echo json_encode( $this->get_all_atts(), JSON_UNESCAPED_SLASHES ); ?>';
                    tdwVariationSwitchesItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?>');
                    tdwVariationSwitchesItem.element = jQuery('.<?php echo $this->block_uid ?> .variations_form');
                    tdwVariationSwitchesItem.product_variations = jQuery('.<?php echo $this->block_uid ?> .variations_form').data('product_variations') || [];
                    tdwVariationSwitchesItem.product_id = jQuery('.<?php echo $this->block_uid ?> .variations_form').data('product_id');

                    <?php if ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) { ?>
                    tdwVariationSwitchesItem.inComposer = true;
                    <?php } ?>

                    tdwVariationSwitches.addItem( tdwVariationSwitchesItem );

                });
            </script>
            <?php
            td_js_buffer::add_to_footer("\n" . td_util::remove_script_tag( ob_get_clean() ) );

            $buffy .= $add_to_cart_data['variations_form'];
        } else {
            $buffy .= '<form class="cart" action="' . $add_to_cart_data['permalink'] . '" method="post" enctype="multipart/form-data">';

            ob_start();
            do_action( 'woocommerce_before_add_to_cart_button' );
            $buffy .= ob_get_clean();

            if ( $sample_data ) {

                // disable add to cart button
                $buffy .= '
                        <style>
                            button.single_add_to_cart_button {
                                pointer-events: none !important;
                            }
                        </style>
                        ';

                // fix for Notice: Undefined index: product in ..wc-template-functions.php on line 1670
                global $product;
                $product = null;

	            if ( $product_type === 'simple' ) {
		            $buffy .= '<div class="td-woocommerce-variation-availability">' . $add_to_cart_data['sample_stock_html'] . '</div>';
	            }

            } else {

	            if ( $product_type === 'simple' ) {
		            $buffy .= '<div class="td-woocommerce-variation-availability">' . wc_get_stock_html( $add_to_cart_data['product'] ) . '</div>';
	            }

            }

            $buffy .= woocommerce_quantity_input(
                array(
                    'min_value' => $add_to_cart_data['min_purchase_quantity'],
                    'max_value' => $add_to_cart_data['max_purchase_quantity'],
                    'input_value' => $add_to_cart_data['input_value'],
                ),
                $add_to_cart_data['product'],
                false
            );

            ob_start();
            do_action('woocommerce_before_add_to_cart_quantity');
            $buffy .= ob_get_clean();

            $buffy .= '<button type="submit" name="add-to-cart" value="' . $add_to_cart_data['id'] . '" class="tdw-btn single_add_to_cart_button">';
            $buffy .= '<span class="tdw-btn-text">' . $add_to_cart_data['add_to_cart_text'] . '</span>';
            $buffy .= '</button>';

            ob_start();
            do_action('woocommerce_after_add_to_cart_button');
            $buffy .= ob_get_clean();

            $buffy .= '</form>';
        }

        ob_start();
        do_action( 'woocommerce_after_add_to_cart_form' );
        $buffy .= ob_get_clean();

        ob_start();

        ?>
        <script>
            /* global jQuery:{} */
            jQuery(window).on( 'load', function () {

                var variableItems = jQuery('.<?php echo $this->block_uid ?> .variable-item[data-tooltip]');

                if( variableItems.length ) {
                    variableItems.first().addClass('first-variable-item');
                }

            });
        </script>
        <?php

        td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );

        $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }

    function js_tdc_callback_ajax() {
        $buffy = '';

        // add a new composer block - that one has the delete callback
        $buffy .= $this->js_tdc_get_composer_block();

        ob_start();

        ?>
        <script>
            /* global jQuery:{} */
            (function () {

                var blockUid = '.<?php echo $this->block_uid ?>',
                    variableItems = jQuery(blockUid + ' ul.variable-items-wrapper'),
                    variableOptionsWithTooltips = jQuery(blockUid + ' .variable-item[data-tooltip]');

                if( variableItems.length ) {
                    variableItems.each(function () {});
                    variableOptionsWithTooltips.first().addClass('first-variable-item');
                }

            })();


        </script>
        <?php

        return $buffy . td_util::remove_script_tag( ob_get_clean() );
    }

}