<?php

/**
 * Class tds_plans_switcher
 */

class tds_plans_switcher extends td_block {

    protected $shortcode_atts = array(); //the atts used for rendering the current block
    private $unique_block_class;

	public function get_custom_css() {

        // $unique_block_class
        $unique_block_class = $this->block_uid;

		$compiled_css = '';

		/** @noinspection CssInvalidAtRule */
		$raw_css =
            "<style>

                /* @style_general_tds_plans_switcher */
                .tds_plans_switcher .tds-block-inner {
                    display: flex;
                }

            </style>";

		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();

		return $compiled_css;

	}

	static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_tds_plans_switcher', 1 );
	}

	function __construct() {
		parent::disable_loop_block_features();
	}

	function render( $atts, $content = null ) {

        parent::render( $atts );


        $this->unique_block_class = $this->block_uid;

        $this->shortcode_atts = shortcode_atts(
            array_merge(
                td_global_blocks::get_mapped_atts( __CLASS__ ),
                td_api_style::get_style_group_params( 'tds_plans_switcher' )
            ), $atts );

        $tds_plans_switcher = $this->get_att('tds_plans_switcher');
        if ( empty( $tds_plans_switcher ) ) {
            $tds_plans_switcher = td_util::get_option( 'tds_plans_switcher', 'tds_plans_switcher1' );
        }
        $tds_plans_switcher_instance = new $tds_plans_switcher( $this->shortcode_atts, $this->unique_block_class );

        // remove top border on Newsmag
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());

		$buffy = '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . '>';

			$buffy .= $this->get_block_css(); // get block css
			$buffy .= $this->get_block_js(); // get block js


            $buffy .= '<div class="tds-block-inner td-fix-index">';

                $buffy .= $tds_plans_switcher_instance->render();

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

                // check for the default plan selected in the plan switcher,
                // and set the active plan
                var $defaultPlan = jQuery('.tds-switcher:checked');

                if( $defaultPlan.length ) {

                    // set the active plan
                    tdsMain.setActivePlan($defaultPlan.val());

                }

            })();
        </script>
        <?php

        return $buffy . td_util::remove_script_tag( ob_get_clean() );
    }
}
