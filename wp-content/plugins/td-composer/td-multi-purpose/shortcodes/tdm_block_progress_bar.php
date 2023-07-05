<?php
class tdm_block_progress_bar extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block

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
                
                /* @style_general_progress_bar */
                .tdm-progress-wrap .tdm-progress-percentage {
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                  font-size: 16px;
                }
                .tdm-progress-wrap .tdm-progress-bar {
                  position: relative;
                  width: 100%;
                  background-color: #f7f7f7;
                }
                .tdm-progress-wrap .tdm-progress-bar:after {
                  content: '';
                  position: absolute;
                }
                .tds-progress-bar1 .tdm-progress-bar,
                .tds-progress-bar2 .tdm-progress-bar {
                  height: 4px;
                }
                .tds-progress-bar1 .tdm-progress-bar:after,
                .tds-progress-bar2 .tdm-progress-bar:after {
                  background-color: #4db2ec;
                }
                .tds-progress-bar1 .tdm-progress-percentage {
                  float: left;
                  width: 52px;
                  color: #666;
                }
                .tds-progress-bar1 .tdm-progress-bar-wrap {
                  padding: 8px 0 0 62px;
                }
                .tds-progress-bar1 .tdm-progress-bar {
                  height: 4px;
                }
                .tds-progress-bar1 .tdm-progress-bar:after {
                  top: 0;
                  left: 0;
                  height: 100%;
                  border-radius: 5px;
                }
                .tds-progress-bar1 .tdm-progress-title {
                  font-family: Verdana, BlinkMacSystemFont, -apple-system, \"Segoe UI\", Roboto, Oxygen, Ubuntu, Cantarell, \"Open Sans\", \"Helvetica Neue\", sans-serif;
                  font-size: 12px;
                }
                .tds-progress-bar2 .tdm-progress-title,
                .tds-progress-bar3 .tdm-progress-title {
                  margin-top: 15px;
                  font-family: 'Roboto', sans-serif;
                  font-size: 20px;
                  font-weight: 500;
                }
                .tds-progress-bar2 .tdm-progress-bar:after {
                  bottom: 0;
                  left: 0;
                  width: 100%;
                }
                .tds-progress-bar2 .tdm-progress-title {
                  margin-top: 15px;
                  font-family: 'Roboto', sans-serif;
                  font-size: 20px;
                  font-weight: 500;
                }
                .tds-progress-bar2 .tdm-progress-percentage {
                  position: absolute;
                  padding: 5px 10px 0;
                  font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
                  font-size: 16px;
                  color: #fff;
                  z-index: 10;
                }
                @media (max-width: 767px) {
                  .tds-progress-bar3 {
                    padding: 0 30px;
                  }
                }
                .tds-progress-bar3 .tdm-progress-bar {
                  position: relative;
                  display: inline-block;
                  background: none;
                  width: 100%;
                  height: 0;
                  padding-bottom: 50%;
                  text-align: center;
                  overflow: hidden;
                }
                .tds-progress-bar3 .tdm-progress-bar:before,
                .tds-progress-bar3 .tdm-progress-bar:after {
                  content: '';
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 0;
                  background: none;
                  padding-bottom: calc(100% - 20px);
                  border-radius: 50%;
                  border: 10px solid #f7f7f7;
                }
                .tds-progress-bar3 .tdm-progress-bar:after {
                  border-color: #4db2ec;
                  -webkit-clip-path: inset(50% 0 0 0);
                  clip-path: inset(50% 0 0 0);
                }
                .tds-progress-bar3 .tdm-progress-bar .tdm-progress-percentage {
                  position: absolute;
                  bottom: 0;
                  width: 100%;
                  font-size: 50px;
                  font-weight: 700;
                  line-height: 50px;
                }

				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {
        $res_ctx->load_settings_raw( 'style_general_progress_bar', 1 );
    }

    function render($atts, $content = null) {
        parent::render($atts);

        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_api_multi_purpose::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_progress_bar' ))
            , $atts);

	    $additional_classes = array();

        $buffy = '';

        $buffy .= '<div class="td_block_mp ' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

            //get the block css
            $buffy .= $this->get_block_css();

            // Get progress_bar_style_id
            $tds_progress_bar = $this->get_shortcode_att('tds_progress_bar');
            if ( empty( $tds_progress_bar ) ) {
                $tds_progress_bar = td_util::get_option( 'tds_progress_bar', 'tds_progress_bar1');
            }
            $tds_progress_bar_instance = new $tds_progress_bar( $this->shortcode_atts );
            $buffy .= $tds_progress_bar_instance->render();

        $buffy .= '</div>';

        return $buffy;
    }
}