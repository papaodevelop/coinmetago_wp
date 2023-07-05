<?php
class td_block_image_box extends td_block {

	private $atts = array(); //the atts used for rendering the current block

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

                /* @style_general_image_box */
                .td_block_image_box .td-custom {
                  position: relative;
                }
                .td_block_image_box .td-custom a:hover:after {
                  opacity: 0.6;
                }
                .td_block_image_box .td-custom-image a {
                  display: block;
                  background-size: cover;
                  background-position: center;
                }
                .td_block_image_box .td-custom-image a:before {
                  content: '';
                  width: 100%;
                  height: 100%;
                  opacity: 0.4;
                  position: absolute;
                  top: 0;
                  left: 0;
                  background-color: #000;
                  -webkit-transition: all 0.3s ease 0s;
                  transition: all 0.3s ease 0s;
                }
                .td_block_image_box .td-custom-image a:after {
                  content: '';
                  border: 1px solid #fff;
                  opacity: 0.3;
                  position: absolute;
                  top: 0;
                  left: 0;
                  bottom: 0;
                  right: 0;
                  margin: 10px;
                  -webkit-transition: all 0.3s ease 0s;
                  transition: all 0.3s ease 0s;
                }
                .td_block_image_box .td-custom-image.td-no-img-custom-url a {
                  pointer-events: none;
                  cursor: default;
                }
                .td_block_image_box .td-custom-image img {
                  vertical-align: top;
                }
                .td_block_image_box .td-custom-title {
                  position: absolute;
                  top: 50%;
                  -webkit-transform: translateY(-50%);
                  transform: translateY(-50%);
                  display: table;
                  text-align: center;
                  width: 100%;
                  padding: 10px 20px;
                  pointer-events: none;
                }
                .td_block_image_box .entry-title {
                  margin: 0;
                  padding: 0;
                  font-size: 19px;
                  text-transform: uppercase;
                  font-weight: 500;
                }
                .td_block_image_box .entry-title a {
                  color: #fff;
                }
                .td_block_image_box .entry-title:after {
                  display: none;
                }
                .td_block_image_box .td-image-box-row {
                  margin: 0 -20px;
                  *zoom: 1;
                }
                .td_block_image_box .td-image-box-row:before,
                .td_block_image_box .td-image-box-row:after {
                  display: table;
                  content: '';
                  line-height: 0;
                }
                .td_block_image_box .td-image-box-row:after {
                  clear: both;
                }
                .td_block_image_box .td-image-box-span {
                  padding: 0 20px;
                  float: left;
                }
                .td_block_image_box .td-big-image .td-image-box-span {
                  width: 100%;
                }
                .td_block_image_box .td-big-image .td-custom-image a {
                  height: 360px;
                }
                .td_block_image_box .td-medium-image .td-image-box-span {
                  width: 50%;
                }
                .td_block_image_box .td-medium-image .td-custom-image a {
                  height: 320px;
                }
                .td_block_image_box .td-small-image .td-image-box-span {
                  width: 33.33333333%;
                }
                .td_block_image_box .td-small-image .td-custom-image a {
                  height: 220px;
                }
                .td_block_image_box .td-tiny-image .td-image-box-span {
                  width: 25%;
                }
                .td_block_image_box .td-tiny-image .td-custom-image a {
                  height: 160px;
                }
                .td_block_image_box .td-tiny-image .td-custom-image a:after {
                  margin: 8px;
                }
                .td_block_image_box .td-tiny-image .entry-title {
                  font-size: 12px;
                }
                @media (max-width: 767px) {
                  .td_block_image_box .td-custom {
                    margin: 0 -20px;
                  }
                  .td_block_image_box .td-custom-image a {
                    margin-bottom: 5px;
                  }
                  .td_block_image_box .td-image-box-row {
                    margin: 0 -20px;
                  }
                  .td_block_image_box .td-image-box-span {
                    width: 100% !important;
                    float: none;
                    padding: 0 10px;
                  }
                  .td_block_image_box .td-big-image .td-custom-image a,
                  .td_block_image_box .td-medium-image .td-custom-image a,
                  .td_block_image_box .td-small-image .td-custom-image a {
                    height: 160px;
                  }
                  .td_block_image_box .entry-title,
                  .td_block_image_box .td-tiny-image .entry-title {
                    font-size: 16px;
                  }
                }
                .td_block_image_box.td-box-vertical .td-image-box-row {
                  margin-left: 0 !important;
                  margin-right: 0 !important;
                }
                .td_block_image_box.td-box-vertical .td-image-box-span {
                  float: none;
                  width: 100%;
                  padding-left: 0 !important;
                  padding-right: 0 !important;
                  margin-bottom: 5px;
                }
                .td_block_image_box.td-box-vertical .td-image-box-span a:after {
                  margin: 8px;
                }
                .td_block_image_box.td-box-vertical .td-image-box-span:last-child {
                  margin-bottom: 0 !important;
                }
                .td_block_image_box.td-box-vertical .entry-title {
                  font-size: 15px;
                }
                .td_block_image_box.td-image-box-top .td-custom-image a {
                  background-position: top center;
                }
                .td_block_image_box.td-image-box-bottom .td-custom-image a {
                  background-position: bottom center;
                }
                .td_block_image_box.td-image-box-style-2 .td-custom-image a:before,
                .td_block_image_box.td-image-box-style-2 .td-custom-image a:after {
                  display: none;
                }
                .td_block_image_box.td-image-box-style-2 .entry-title {
                  font-size: 15px;
                }
                .td_block_image_box.td-image-box-style-2 .entry-title a {
                  padding: 8px 16px;
                  background-color: #fff;
                  color: #000;
                }
                .td_block_image_box.td-image-box-style-2 .entry-title a:empty {
                  display: none;
                }
                
                /* @images_height */
				.$unique_block_class.td_block_image_box div .td-custom-image a {
					height: @images_height;
				}
				/* @images_gap */
				.$unique_block_class .td-image-box-row {
				    margin-left: -@images_gap;
				    margin-right: -@images_gap;
				}
				.$unique_block_class .td-image-box-span {
					padding-left: @images_gap;
					padding-right: @images_gap;
				}
				.$unique_block_class.td-box-vertical .td-image-box-span {
				    margin-bottom: @images_gap;
				}
				
				
				/* @custom_titles_color */
				.$unique_block_class .td-custom-title .entry-title a {
					color: @custom_titles_color;
				}
				/* @custom_titles_bg */
				.$unique_block_class.td-image-box-style-2 .td-custom-title .entry-title a {
					background-color: @custom_titles_bg;
				}
		
		

				/* @f_header */
				.$unique_block_class .td-block-title a,
				.$unique_block_class .td-block-title span {
					@f_header
				}
				/* @f_titles */
				.$unique_block_class .entry-title {
					@f_titles
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_image_box', 1 );

        /*-- SHORTCODE -- */
        // images height
        $images_height = $res_ctx->get_shortcode_att('height');
        if( $images_height != '' && is_numeric( $images_height ) ) {
            $res_ctx->load_settings_raw( 'images_height', $images_height . 'px' );
        }

        // images gap
        $images_gap = $res_ctx->get_shortcode_att('gap');
        if( $images_gap != '' && is_numeric( $images_gap ) ) {
            $res_ctx->load_settings_raw( 'images_gap', $images_gap . 'px' );
        }


        /*-- CUSTOM TITLES -- */
        // custom titles color
        $res_ctx->load_settings_raw( 'custom_titles_color', $res_ctx->get_shortcode_att('custom_titles_color') );
        // custom titles background color
        $res_ctx->load_settings_raw( 'custom_titles_bg', $res_ctx->get_shortcode_att('custom_titles_bg') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_titles' );

    }

	function render($atts, $content = null) {
		parent::render($atts);

		$this->atts = shortcode_atts(
			array(
				'height' => '',
				'gap' => '',
				'display' => '',
				'alignment' => '',
				'style' => '',


				'image_title_item0' => '',
				'custom_url_item0' => '#',
				'open_in_new_window_item0' => '',
				'url_rel_item0' => '',
				'image_item0' => '',

				'image_title_item1' => '',
				'custom_url_item1' => '#',
				'open_in_new_window_item1' => '',
				'url_rel_item1' => '',
				'image_item1' => '',

				'image_title_item2' => '',
				'custom_url_item2' => '#',
				'open_in_new_window_item2' => '',
				'url_rel_item2' => '',
				'image_item2' => '',

				'image_title_item3' => '',
				'custom_url_item3' => '#',
				'open_in_new_window_item3' => '',
				'url_rel_item3' => '',
				'image_item3' => '',

			), $atts);

		$items = array();
		for ($i = 0; $i < 4; $i++ ) {
			if ( ! empty( $this->atts['image_item' . $i] ) ) {
				$items[] = array(
					'image_title' => $this->atts['image_title_item' . $i],
					'custom_url' => $this->atts['custom_url_item' . $i],
					'open_in_new_window' => $this->atts['open_in_new_window_item' . $i],
					'url_rel' => $this->atts['url_rel_item' . $i],
					'image' => $this->atts['image_item' . $i],
				);
			}
		}

		// additional classes
		$additional_classes = array();

		$tds_animation_stack = td_util::get_option('tds_animation_stack');
		if ( empty($tds_animation_stack) ) { //lazyload animation is ON
			$additional_classes[] = 'td-animation-stack';
		}

		if(!empty($this->atts['display'])) {
			$additional_classes [] = 'td-box-vertical';
		}

		// alignment
		if(!empty($this->atts['alignment'])) {
			$additional_classes[] = 'td-image-box-' . $this->atts['alignment'];
		}

		// style
		if(!empty($this->atts['style'])) {
			$additional_classes[] = 'td-image-box-' . $this->atts['style'];
		}

		$buffy = '';
		$buffy .= '<div class="' . $this->get_block_classes($additional_classes) . '" ' . $this->get_block_html_atts() . '>';

		//get the block css
		$buffy .= $this->get_block_css();

		// block title wrap
		$buffy .= '<div class="td-block-title-wrap">';
			$buffy .= $this->get_block_title();
			$buffy .= $this->get_pull_down_filter(); //get the sub category filter for this block
		$buffy .= '</div>';

		switch(count($items)) {
			case 1: $css_class = 'td-big-image'; break;
			case 2: $css_class = 'td-medium-image'; break;
			case 3: $css_class = 'td-small-image'; break;
			case 4: $css_class = 'td-tiny-image'; break;
		}

		if ( isset($css_class) ) {

			$buffy .= '<div class="td-image-box-row ' . $css_class . '">';
				foreach($items as $item) {

					$buffy .= '<div class="td-image-box-span">';

					$target = '';
					$td_link_rel = '';
					$no_custom_url = '';

					if ( '' !== $item[ 'open_in_new_window' ] ) {
						$target = ' target="_blank" ';
					}

					if ( '' !== $item['url_rel'] ) {
						$td_link_rel = ' rel="' . $item['url_rel'] . '" ';
					}

					if ( '#' == $item[ 'custom_url' ] ) {
						$no_custom_url = ' td-no-img-custom-url';
					}

					$buffy .= '<div class="td-custom">';
						$buffy .= '<div class="td-custom-image' . $no_custom_url . '">';
					if( empty( $tds_animation_stack ) && ! td_util::tdc_is_live_editor_ajax() && ! td_util::tdc_is_live_editor_iframe() && !td_util::is_mobile_theme() && !td_util::is_amp() ) {
						$buffy .= '<a class="td-lazy-img"  data-type="css_image" data-img-url="' . wp_get_attachment_url($item[ 'image' ]) . '" href="' . $item[ 'custom_url' ] . '" ' . $target . $td_link_rel . ' title="' . get_the_title($item[ 'image' ]) . '"></a>';
					} else {
						$buffy .= '<a style="background-image: url(\'' . wp_get_attachment_url($item['image']) . '\');" href="' . $item['custom_url'] . '" ' . $target . $td_link_rel . ' title="' . get_the_title($item['image']) . '"></a>';
					}
						$buffy .= '</div>';

					if ($item['image_title'] !== '') {
                        //we need to decode the square bracket case
                        if ( strpos($item['image_title'], 'td_encval') === 0 ) {
                            $item['image_title'] = str_replace('td_encval', '', $item['image_title']);
                            $item['image_title'] = base64_decode( $item['image_title'] );
                        }

						$buffy .= '<div class="td-custom-title">';
						$buffy .= '<h3 class="entry-title"><a href="' . $item['custom_url'] . '" ' . $td_link_rel . '>' . $item['image_title'] . '</a></h3>';
						$buffy .= '</div>';
					}
					
					$buffy .= '</div>';

					$buffy .= '</div>';
				}
			$buffy .= '</div>';

		} else {

			$buffy .= '<div class="td-image-box-row td-small-image">';

			$index = 0;
			while($index < 3) {
				$buffy .= '<div class="td-image-box-span">';
					$buffy .= '<div class="td-custom">';
						$buffy .= '<div class="td-custom-image td-no-img-custom-url">';
						$buffy .= '<a href="#" rel="bookmark" title="Custom title"></a>';
						$buffy .= '</div>';
						$buffy .= '<div class="td-custom-title">';
						$buffy .= '<h3 class="entry-title"><a href="#">Custom title</a></h3>';
						$buffy .= '</div>';
					$buffy .= '</div>';
				$buffy .= '</div>';

				$index++;
			}
			$buffy .= '</div>';
		}

		$buffy .= '</div>';


		return $buffy;
	}
}