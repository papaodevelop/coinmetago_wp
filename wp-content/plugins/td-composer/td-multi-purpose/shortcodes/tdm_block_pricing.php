<?php
class tdm_block_pricing extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

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
                
                /* @style_general_pricing */
                .tdm_block_pricing .tdm-pricing-header {
                  position: relative;
                  overflow: hidden;
                }
                .tdm_block_pricing .tdm-title {
                  margin: 0 0 10px;
                  color: #444;
                }
                .tdm_block_pricing .tdm-pricing-price {
                  position: relative;
                  margin-bottom: 16px;
                  font-family: 'Roboto', sans-serif;
                  font-size: 58px;
                  font-weight: 700;
                  line-height: 1;
                }
                .tdm_block_pricing .tdm-pricing-price-old {
                  font-size: 29px;
                  vertical-align: super;
                  color: #666;
                }
                .tdm_block_pricing .tdm-pricing-price-old .tdm-pricing-price-2 {
                    text-decoration: line-through;
                }
                .tdm_block_pricing .tdm-pricing-ribbon-wrap {
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  overflow: hidden;
                  z-index: 10;
                  pointer-events: none;
                }
                .tdm_block_pricing .tdm-pricing-ribbon {
                  position: absolute;
                  top: 16px;
                  right: -68px;
                  padding: 2px 0;
                  width: 200px;
                  background-color: #FF0000;
                  color: #fff;
                  transform: rotate(40deg);
                  text-align: center;
                  font-size: 12px;
                }
                .tdm_block_pricing.tdm-content-horiz-right .tdm-pricing-ribbon {
                  left: -68px;
                  right: auto;
                  transform: rotate(-40deg);
                }
                .tdm_block_pricing .tdm-pricing-currency,
                .tdm_block_pricing .tdm-pricing-period {
                  font-weight: 400;
                }
                .tdm_block_pricing .tdm-pricing-currency,
                .tdm_block_pricing .tdm-pricing-currency-old {
                  vertical-align: super;
                }
                .tdm_block_pricing .tdm-pricing-currency {
                  font-size: 22px;
                  margin-right: -12px;
                }
                .tdm_block_pricing .tdm-pricing-currency-old {
                  font-size: 12px;
                  text-decoration: none;
                }
                .tdm_block_pricing .tdm-pricing-period {
                  font-size: 14px;
                }
                .tdm_block_pricing .tdm-pricing-features {
                  margin: 0;
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                  font-size: 15px;
                  line-height: 24px;
                  color: #666;
                }
                .tdm_block_pricing .tdm-descr {
                  margin-bottom: 18px;
                  font-size: 15px;
                  line-height: 24px;
                }
                .tdm_block_pricing .tdm-pricing-feature {
                  list-style-type: none;
                  margin: 0 0 5px;
                }
                .tdm_block_pricing .tdm-pricing-feature .tdm-pricing-icon {
                  margin-top: -3px;
                  vertical-align: middle;
                }
                .tdm_block_pricing .tdm-pricing-feature i {
                  width: 15px;
                  line-height: 1;
                  vertical-align: middle;
                  text-align: center;
                  color: #4db2ec;
                }
                .tdm_block_pricing .tdm-pricing-feature .tdm-pricing-icon-svg {
                  display: inline-flex;
                  align-items: center;
                  justify-content: center;
                }
                .tdm_block_pricing .tdm-pricing-feature .tdm-pricing-icon-svg svg {
                  width: 15px;
                  height: auto;
                }
                .tdm_block_pricing .tdm-pricing-feature .tdm-pricing-icon-svg svg,
                .tdm_block_pricing .tdm-pricing-feature .tdm-pricing-icon-svg svg * {
                  fill: #4db2ec;
                }
                .tdm_block_pricing .tds-button {
                  margin: 28px 0 26px;
                }
                .tdm_block_pricing .tds-button:last-child {
                  margin-bottom: 0;
                }
                .tdm_block_pricing.tdm-content-horiz-center .tdm-descr {
                  padding: 0 10px;
                }
                .tdm_block_pricing.tdm-content-horiz-center .tdm-pricing-features {
                  display: inline-block;
                  text-align: left;
                }
                .tdm_block_pricing.tdm-content-horiz-center .tds-button {
                  margin-top: 25px;
                }
                .tdm_block_pricing .tds-pricing1 {
                  padding-top: 13px;
                }
                .tdm_block_pricing .tds-pricing2 .tdm-pricing-header {
                  background: #F8F8F9;
                  margin-bottom: 5px;
                  padding: 14px 20px;
                }
                .tdm_block_pricing .tds-pricing2 .tdm-pricing-price {
                  margin-bottom: 0;
                }
                .tdm_block_pricing .tds-pricing2 .tdm-descr {
                  margin-top: 21px;
                  margin-bottom: 7px;
                }
                .tdm_block_pricing .tds-pricing2 .tdm-pricing-feature {
                  margin-bottom: 0;
                  padding: 11px 20px 12px;
                  border-bottom: 1px solid #f1f1f1;
                }
                .tdm_block_pricing.tds_pricing2_block.tdm-pricing-featured:before {
                  display: none;
                }
                .tdm_block_pricing.tds_pricing2_block.tdm-pricing-featured .tdm-pricing-header {
                  background: #4db2ec;
                  color: #fff;
                }
                .tdm_block_pricing.tds_pricing2_block.tdm-pricing-featured .tdm-pricing-header .tdm-title {
                  color: #fff;
                }
                .tdm_block_pricing.tds_pricing2_block.tdm-pricing-featured .tdm-pricing-price-old {
                  color: #dfdfdf;
                }
                .tdm_block_pricing.tds_pricing3_block {
                  padding: 25px 22px;
                }

				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {
        $res_ctx->load_settings_raw( 'style_general_pricing', 1 );
    }

    function render($atts, $content = null) {
        parent::render($atts);

        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $this->unique_block_class = $this->block_uid;

        $this->shortcode_atts = shortcode_atts(
			array_merge(
				td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_pricing' ),
                td_api_style::get_style_group_params( 'tds_title' ),
                td_api_style::get_style_group_params( 'tds_button' ))
			, $atts);

        $featured = $this->get_shortcode_att( 'featured' );
        $style = $this->get_shortcode_att( 'tds_pricing' );
        $content_align_horizontal = $this->get_shortcode_att( 'content_align_horizontal' );

        $additional_classes = array();

        // style
        $additional_classes[] = $style . '_block';

        // featured table
        if ( ! empty( $featured ) ) {
            $additional_classes[] = 'tdm-pricing-featured';
        }

        // content align horizontal
        if ( ! empty( $content_align_horizontal ) ) {
            $additional_classes[] = 'tdm-' . $content_align_horizontal;
        }

        $buffy = '';

        $buffy .= '<div class="tdm_block ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

        //get the block css
        $buffy .= $this->get_block_css();

            // Get tds_pricing
            $tds_pricing = $this->get_shortcode_att('tds_pricing');
            if ( empty( $tds_pricing ) ) {
                $tds_pricing = td_util::get_option( 'tds_pricing', 'tds_pricing1' );
            }
            $tds_pricing_instance = new $tds_pricing( $this->shortcode_atts, $this->unique_block_class );
            $buffy .= $tds_pricing_instance->render();

        $buffy .= '</div>';


        return $buffy;
    }
}