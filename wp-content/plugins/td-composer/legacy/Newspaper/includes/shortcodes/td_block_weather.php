<?php

class td_block_weather extends td_block {

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

        $theme_url = TDC_URL_LEGACY;

        $compiled_css = '';

        $raw_css =
            "<style>
                /* @style_general_weather */
                .td_block_weather .block-title {
                    margin-bottom: 22px;
                }
                .td_block_weather .td-weather-wrap {
                    position: relative;
                    -webkit-touch-callout: none;
                    -webkit-user-select: none;
                    user-select: none;
                }
                .td-weather-header {
                    padding-left: 10px;
                    font-family: 'Roboto', sans-serif;
                }
                .td-weather-city {
                    font-size: 20px;
                    font-weight: bold;
                    line-height: 1;
                    text-transform: uppercase;
                    margin-bottom: 7px;
                }
                .td-weather-condition {
                    font-size: 14px;
                    line-height: 1;
                    text-transform: capitalize;
                    opacity: 0.8;
                }
                .td-location-icon {
                    position: absolute;
                    top: 0;
                    right: 10px;
                    font-size: 22px;
                    opacity: 0.6;
                    z-index: 1;
                }
                .td-location-icon:hover {
                    cursor: pointer;
                    opacity: 0.9;
                }
                .td-weather-temperature {
                    font-family: 'Roboto', sans-serif;
                    padding: 3px 0;
                    display: inline-block;
                    width: 100%;
                    float: left;
                    text-align: center;
                }
                @media (max-width: 1018px) {
                    .td-weather-temperature {
                        margin-bottom: -6px;
                        padding: 0;
                    }
                }
                .td-weather-temp-wrap {
                    display: inline-block;
                }
                .td-weather-now {
                    float: left;
                    text-align: center;
                    line-height: 1;
                    padding: 32px 16px;
                    font-weight: 300;
                    width: 145px;
                    -webkit-touch-callout: none;
                    -webkit-user-select: none;
                    user-select: none;
                }
                @media (max-width: 1018px) {
                    .td-weather-now {
                        padding: 28px 0;
                        position: relative;
                        left: -10px;
                        width: 90px;
                        margin-left: 12px;
                    }
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .td-weather-now {
                        margin-left: 0;
                    }
                }
                @media (max-width: 767px) {
                    .td-weather-now {
                        width: 100px;
                    }
                }
                .td-weather-now .td-big-degrees {
                    font-size: 40px;
                }
                @media (max-width: 1018px) {
                    .td-weather-now .td-big-degrees {
                        font-size: 32px;
                    }
                }
                .td-weather-now .td-circle {
                    font-size: 30px;
                    position: relative;
                    top: -6px;
                    opacity: 0.6;
                    line-height: 1;
                    vertical-align: top;
                }
                .td-weather-now .td-weather-unit {
                    font-size: 16px;
                    position: relative;
                    top: -4px;
                    font-weight: 400;
                    opacity: 0.6;
                    left: -2px;
                    line-height: 1;
                    vertical-align: top;
                }
                .td-weather-now:hover {
                    cursor: pointer;
                }
                .td-weather-lo-hi {
                    float: left;
                    text-align: left;
                    width: 55px;
                }
                .td-weather-degrees-wrap {
                    padding: 15px 0;
                }
                @media (max-width: 1018px) {
                    .td-weather-degrees-wrap {
                        padding: 10px 0;
                    }
                }
                .td-weather-degrees-wrap i {
                    position: relative;
                    top: 3px;
                    font-size: 16px;
                    color: #b3b3b3;
                }
                .td-weather-degrees-wrap .td-small-degrees {
                    font-size: 12px;
                }
                .td-weather-degrees-wrap .td-circle {
                    font-size: 18px;
                    position: relative;
                    right: 3px;
                    top: 3px;
                }
                .td-weather-information {
                    font-family: 'Roboto', sans-serif;
                    font-size: 12px;
                    position: relative;
                    padding: 5px 0;
                    display: inline-block;
                    width: 100%;
                    float: left;
                    opacity: 0.6;
                }
                .td-weather-information:before {
                    content:'';
                    width: 100%;
                    height: 2px;
                    position: absolute;
                    top: -2px;
                    left: 0;
                    background-color: #4db2ec;
                    opacity: 0.2;
                }
                .td-weather-information i {
                    font-size: 16px;
                    position: relative;
                    top: 2px;
                }
                .td-weather-section-1,
                .td-weather-section-2,
                .td-weather-section-3 {
                    float: left;
                    width: 33%;
                }
                .td-weather-section-1 {
                text-align: right;
                    padding-right: 10px;
                }
                .td-weather-section-2 {
                    text-align: center;
                }
                .td-weather-section-3 {
                    text-align: left;
                    padding-left: 10px;
                }
                .td-weather-week {
                    font-family: 'Roboto', sans-serif;
                    padding: 15px 8px;
                    width: 100%;
                    text-align: center;
                    line-height: 1;
                    position: relative;
                    display: inline-block;
                }
                .td-weather-week:before {
                    content:'';
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    background-color: #4db2ec;
                    opacity: 0.07;
                }
                .td-weather-days {
                    width: 20%;
                    float: left;
                    text-align: center;
                    text-transform:uppercase;
                    line-height: 1;
                }
                .td-weather-days .td-day-0,
                .td-weather-days .td-day-1,
                .td-weather-days .td-day-2,
                .td-weather-days .td-day-3,
                .td-weather-days .td-day-4 {
                    margin-bottom: 8px;
                    font-size: 11px;
                    opacity: 0.5;
                }
                .td-weather-days .td-day-degrees {
                    font-size: 20px;
                    position: relative;
                    left: 4px;
                    line-height: 14px;
                    opacity: 0.7;
                }
                .td-weather-days .td-circle {
                    position: relative;
                    right: 5px;
                }
                .td-weather-animated-icon {
                    float: left;
                    text-align: right;
                    margin-left: -15px;
                    position: relative;
                }
                @media (max-width: 1018px) {
                    .td-weather-animated-icon {
                        left: 0;
                        top: -6px;
                        margin-right: 0;
                        margin-left: -22px;
                    }
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                    .td-weather-animated-icon {
                        transform: scale(0.72);
                        -webkit-transform: scale(0.72);
                        margin-left: -20px;
                    }
                }
                .td-weather-animated-icon span {
                    width: 100px;
                    height: 100px;
                    display: inline-block;
                    opacity: 0.4;
                    margin-top: 4px;
                }
                @media (max-width: 1018px) {
                    .td-weather-animated-icon span {
                        margin-top: 0;
                    }
                }
                .clear-sky-d {
                    background: url('$theme_url/assets/images/sprite/weather/clear-sky-d.png') no-repeat;
                }
                .clear-sky-n {
                    background: url('$theme_url/assets/images/sprite/weather/clear-sky-n.png') no-repeat;
                }
                .few-clouds-d {
                    background: url('$theme_url/assets/images/sprite/weather/few-clouds-d.png') no-repeat;
                }
                .few-clouds-n {
                    background: url('$theme_url/assets/images/sprite/weather/few-clouds-n.png') no-repeat;
                }
                .scattered-clouds-d {
                    background: url('$theme_url/assets/images/sprite/weather/scattered-clouds-d.png') no-repeat;
                }
                .scattered-clouds-n {
                    background: url('$theme_url/assets/images/sprite/weather/scattered-clouds-n.png') no-repeat;
                }
                .broken-clouds-d {
                    background: url('$theme_url/assets/images/sprite/weather/broken-clouds-d.png') no-repeat;
                }
                .broken-clouds-n {
                    background: url('$theme_url/assets/images/sprite/weather/broken-clouds-n.png') no-repeat;
                }
                .shower-rain-d {
                    background: url('$theme_url/assets/images/sprite/weather/shower-rain-d.png') no-repeat;
                }
                .shower-rain-n {
                    background: url('$theme_url/assets/images/sprite/weather/shower-rain-n.png') no-repeat;
                }
                .rain-d {
                    background: url('$theme_url/assets/images/sprite/weather/rain-d.png') no-repeat;
                }
                .rain-n {
                    background: url('$theme_url/assets/images/sprite/weather/rain-n.png') no-repeat;
                }
                .thunderstorm-d {
                    background: url('$theme_url/assets/images/sprite/weather/thunderstorm.png') no-repeat;
                }
                .thunderstorm-n {
                    background: url('$theme_url/assets/images/sprite/weather/thunderstorm.png') no-repeat;
                }
                .snow-d {
                    background: url('$theme_url/assets/images/sprite/weather/snow-d.png') no-repeat;
                }
                .snow-n {
                    background: url('$theme_url/assets/images/sprite/weather/snow-n.png') no-repeat;
                }
                .mist-d {
                    background: url('$theme_url/assets/images/sprite/weather/mist.png') no-repeat;
                }
                .mist-n {
                    background: url('$theme_url/assets/images/sprite/weather/mist.png') no-repeat;
                }
                .td-weather-set-location {
                    display: none;
                    position: absolute;
                    top: 0;
                }
                .td-weather-set-location .td-location-set-input {
                    height: 20px;
                    font-size: 20px;
                    font-weight: bold;
                    text-transform: uppercase;
                    font-family: 'Roboto', sans-serif;
                    border: 0;
                    padding: 0 10px;
                }
                .td-weather-set-location .td-location-set-input:focus ~ label {
                    top: -20px;
                    font-size: 11px;
                    opacity: 0.5;
                }
                .td-show-location {
                    display: block !important;
                }
                .td-show-location label {
                    position: absolute;
                    top: 0;
                    left: 10px;
                    font-size: 13px;
                    opacity: 0.6;
                    pointer-events: none;
                    -webkit-transition: all 0.2s ease;
                    transition: all 0.2s ease;
                }
                .td_block_weather .td-column-2,
                .td_block_weather .td-column-3 {
                    text-align: right;
                    height: 90px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2,
                    .td_block_weather .td-column-3 {
                        height: auto;
                        display: inline-block;
                        text-align: left;
                        width: 100%;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-city,
                .td_block_weather .td-column-3 .td-weather-city {
                    position: absolute;
                    top: 0;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-city,
                    .td_block_weather .td-column-3 .td-weather-city {
                        position: relative;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-condition,
                .td_block_weather .td-column-3 .td-weather-condition {
                    position: absolute;
                    bottom: 0;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-condition,
                    .td_block_weather .td-column-3 .td-weather-condition {
                        position: relative;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-temperature,
                .td_block_weather .td-column-3 .td-weather-temperature {
                    text-align: right;
                    width: 55%;
                    padding-right: 20px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-temperature,
                    .td_block_weather .td-column-3 .td-weather-temperature {
                        width: 100%;
                        text-align: center;
                        padding: 0;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-temp-wrap,
                .td_block_weather .td-column-3 .td-weather-temp-wrap{
                    position: relative;
                    top: -3px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-temp-wrap,
                    .td_block_weather .td-column-3 .td-weather-temp-wrap{
                        top: 0;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-animated-icon,
                .td_block_weather .td-column-3 .td-weather-animated-icon {
                    transform: scale(0.7);
                    -webkit-transform: scale(0.7);
                    margin-right: -15px;
                    top: -5px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-animated-icon,
                    .td_block_weather .td-column-3 .td-weather-animated-icon {
                        transform: scale(1);
                        -webkit-transform: scale(1);
                        left: 0;
                        top: -5px;
                        margin-right: 0;
                        margin-left: -22px;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-now,
                .td_block_weather .td-column-3 .td-weather-now {
                    width: 110px;
                    padding: 32px 0;
                    margin-right: 10px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-now,
                    .td_block_weather .td-column-3 .td-weather-now {
                        padding: 30px 0;
                        position: relative;
                        left: -10px;
                        width: 100px;
                        margin-right: 0;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-now .td-big-degrees,
                .td_block_weather .td-column-3 .td-weather-now .td-big-degrees {
                    font-size: 32px;
                }
                .td_block_weather .td-column-2 .td-weather-degrees-wrap,
                .td_block_weather .td-column-3 .td-weather-degrees-wrap {
                    padding: 12px 0;
                }
                .td_block_weather .td-column-2 .td-weather-animated-icon,
                .td_block_weather .td-column-3 .td-weather-animated-icon,
                .td_block_weather .td-column-2 .td-weather-lo-hi,
                .td_block_weather .td-column-3 .td-weather-lo-hi {
                    width: auto;
                }
                .td_block_weather .td-column-2 .td-weather-info-wrap,
                .td_block_weather .td-column-3 .td-weather-info-wrap {
                    width: 45%;
                    float: right;
                    padding-left: 20px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-info-wrap,
                    .td_block_weather .td-column-3 .td-weather-info-wrap {
                        width: 100%;
                        padding-left: 0;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-information,
                .td_block_weather .td-column-3 .td-weather-information {
                    padding: 3px 0 10px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-information,
                    .td_block_weather .td-column-3 .td-weather-information {
                        padding: 5px 0;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-information:before,
                .td_block_weather .td-column-3 .td-weather-information:before {
                    top: auto;
                    bottom: -4px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-information:before,
                    .td_block_weather .td-column-3 .td-weather-information:before {
                        bottom: auto;
                        top: -2px;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-week,
                .td_block_weather .td-column-3 .td-weather-week {
                    padding: 20px 0 15px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-week,
                    .td_block_weather .td-column-3 .td-weather-week {
                        padding: 15px 0;
                    }
                }
                .td_block_weather .td-column-2 .td-weather-week:before,
                .td_block_weather .td-column-3 .td-weather-week:before {
                    display: none;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-2 .td-weather-week:before,
                    .td_block_weather .td-column-3 .td-weather-week:before {
                        display: block;
                    }
                }
                .td_block_weather .td-column-3 .td-weather-temp-wrap {
                    margin-right: 100px;
                }
                @media (max-width: 1018px) {
                    .td_block_weather .td-column-3 .td-weather-temp-wrap {
                        margin-right: 0;
                    }
                }
                
                

                /* @city_color */
				body .$unique_block_class .td-weather-city {
					color: @city_color;
				}
                /* @condition_color */
				body .$unique_block_class .td-weather-condition {
					color: @condition_color;
				}
                /* @loc_icon_color */
				body .$unique_block_class .td-location-icon {
					color: @loc_icon_color;
				}
				
                /* @temp_color */
				body .$unique_block_class .td-weather-now {
					color: @temp_color;
				}
                /* @temp_min_color */
				body .$unique_block_class .td-w-low-temp {
					color: @temp_min_color;
				}
                /* @temp_min_i_color */
				body .$unique_block_class .td-down-icon {
					color: @temp_min_i_color;
				}
                /* @temp_max_color */
				body .$unique_block_class .td-w-high-temp {
					color: @temp_max_color;
				}
                /* @temp_max_i_color */
				body .$unique_block_class .td-up-icon {
					color: @temp_max_i_color;
				}
                /* @sep_color */
				body .$unique_block_class .td-weather-information:before {
					background-color: @sep_color;
				}
                /* @humid_color */
				body .$unique_block_class .td-weather-section-1 {
					color: @humid_color;
				}
                /* @wind_color */
				body .$unique_block_class .td-weather-section-2 {
					color: @wind_color;
				}
                /* @clouds_color */
				body .$unique_block_class .td-weather-section-3 {
					color: @clouds_color;
				}
				
                /* @frcst_bg_color */
				body .$unique_block_class .td-weather-week:before {
					background-color: @frcst_bg_color;
				}
                /* @frcst_day_color */
				body .$unique_block_class .td-weather-days > div:first-child {
					color: @frcst_day_color;
				}
                /* @frcst_temp_color */
				body .$unique_block_class .td-weather-days .td-day-degrees {
					color: @frcst_temp_color;
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL -- */
        $res_ctx->load_settings_raw( 'style_general_weather', 1 );



        /*-- COLORS -- */
        $res_ctx->load_settings_raw( 'city_color', $res_ctx->get_shortcode_att('city_color') );
        $res_ctx->load_settings_raw( 'condition_color', $res_ctx->get_shortcode_att('condition_color') );
        $res_ctx->load_settings_raw( 'loc_icon_color', $res_ctx->get_shortcode_att('loc_icon_color') );

        $res_ctx->load_settings_raw( 'temp_color', $res_ctx->get_shortcode_att('temp_color') );
        $res_ctx->load_settings_raw( 'temp_min_color', $res_ctx->get_shortcode_att('temp_min_color') );
        $res_ctx->load_settings_raw( 'temp_min_i_color', $res_ctx->get_shortcode_att('temp_min_i_color') );
        $res_ctx->load_settings_raw( 'temp_max_color', $res_ctx->get_shortcode_att('temp_max_color') );
        $res_ctx->load_settings_raw( 'temp_max_i_color', $res_ctx->get_shortcode_att('temp_max_i_color') );
        $res_ctx->load_settings_raw( 'sep_color', $res_ctx->get_shortcode_att('sep_color') );
        $res_ctx->load_settings_raw( 'humid_color', $res_ctx->get_shortcode_att('humid_color') );
        $res_ctx->load_settings_raw( 'wind_color', $res_ctx->get_shortcode_att('wind_color') );
        $res_ctx->load_settings_raw( 'clouds_color', $res_ctx->get_shortcode_att('clouds_color') );

        $res_ctx->load_settings_raw( 'frcst_bg_color', $res_ctx->get_shortcode_att('frcst_bg_color') );
        $res_ctx->load_settings_raw( 'frcst_day_color', $res_ctx->get_shortcode_att('frcst_day_color') );
        $res_ctx->load_settings_raw( 'frcst_temp_color', $res_ctx->get_shortcode_att('frcst_temp_color') );

    }


	/**
	 * Disable loop block features. This block does not use a loop and it dosn't need to run a query.
	 */
	function __construct() {
		parent::disable_loop_block_features();
	}



	function render($atts, $content = null) {
		parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)
		//$atts['w_location'] = 'Alba Iulia';






		if (empty($td_column_number)) {
			$td_column_number = td_global::vc_get_column_number(); // get the column width of the block from the page builder API
		}

		//$buffy = '';
		$buffy = $this->get_block_js(); //output buffer

		$buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';


			//get the block js
			$buffy .= $this->get_block_css();

            // block title wrap
            $buffy .= '<div class="td-block-title-wrap">';
                $buffy .= $this->get_block_title();
                $buffy .= $this->get_pull_down_filter(); //get the sub category filter for this block
            $buffy .= '</div>';

			$buffy .= '<div id=' . $this->block_uid . ' class="td-weather-wrap td_block_inner td-column-' . $td_column_number . '">';
				$buffy.= td_weather::render_generic($atts, $this->block_uid);
			$buffy .= '</div>';
		$buffy .= '</div>';
		return $buffy;
	}

	/**
	 * tagDiv composer specific code:
	 *  - it's added to the end of the iFrame when the live editor is active (when @see td_util::tdc_is_live_editor_iframe()  === true)
	 *  - it is injected int he iFrame and evaluated there in the global scoupe when a new block is added to the page via AJAX!
	 * @return string the JS without <script> tags
	 */
/*
		function js_tdc_get_composer_block() {
			ob_start();
			?>
			<script>

				(function () {
					var tdComposerBlockItem = new tdcComposerBlocksApi.item();
					tdComposerBlockItem.blockUid = '<?php echo $this->block_uid ?>';
					tdComposerBlockItem.callbackDelete = function(blockUid) {
						tdAnimationSprite.deleteItem(blockUid);
						tdcDebug.log('tdComposerBlockItem.callbackDelete(' + blockUid + ') - for weather');
					};
					tdcComposerBlocksApi.addItem(tdComposerBlockItem);
				})();
			</script>
			<?php
			return td_util::remove_script_tag(ob_get_clean());
		}
*/


	/**
	 * tagDiv composer specific code:
	 *  - it's added to the end of the iFrame when the live editor is active (when @see td_util::tdc_is_live_editor_iframe()  === true)
	 *  - it is injected int he iFrame and evaluated there in the global scoupe when a new block is added to the page via AJAX!
	 * @return string the JS without <script> tags
	 */
	function js_tdc_callback_ajax() {
		$buffy = '';

		// add a new composer block - that one has the delete callback
		$buffy .= $this->js_tdc_get_composer_block();

		ob_start();
		?>
		<script>
			(function () {
				var tdAnimationSpriteItem = new tdAnimationSprite.item();

				tdAnimationSpriteItem.jqueryObj = jQuery('.<?php echo $this->block_uid ?> span[class^="td_animation_sprite"]');
				if (tdAnimationSpriteItem.jqueryObj.length) {
					tdAnimationSpriteItem.blockUid = tdAnimationSpriteItem.jqueryObj.data('td-block-uid');   // the block uid is used on the front end editor when we want to delete this item via it's blockuid
					tdAnimationSprite.addItem( tdAnimationSpriteItem );
				}
			})();
		</script>
		<?php
		return $buffy . td_util::remove_script_tag(ob_get_clean());
	}




}