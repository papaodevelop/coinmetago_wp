<?php
class tdb_single_post_share extends td_block {

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

				/* @style_general_single_post_share */
				.tdb_single_post_share {
                  margin-bottom: 23px;
                }
                .tdb-share-classic {
                  position: relative;
                  height: 20px;
                  margin-bottom: 15px;
                }

				
				
				/* @share_radius */
                .$unique_block_class .td-social-share-text {
                    border-radius: @share_radius;
                }
				
				/* @btn_radius_general */
                .$unique_block_class .td-social-network .td-social-but-icon {
                    border-top-left-radius: @btn_radius_general;
                    border-bottom-left-radius: @btn_radius_general;
                }
                .$unique_block_class .td-social-network .td-social-but-text {
                    border-top-right-radius: @btn_radius_general;
                    border-bottom-right-radius: @btn_radius_general;
                }
                .$unique_block_class .td-social-expand-tabs {
                    border-radius: @btn_radius_general;
                }
                
                /* @btn_radius_td-ps-notext */
				.$unique_block_class .td-ps-notext .td-social-network .td-social-but-icon,
                .$unique_block_class .td-ps-notext .td-social-handler .td-social-but-icon {
                    border-top-right-radius: @btn_radius_td-ps-notext;
                    border-bottom-right-radius: @btn_radius_td-ps-notext;
                }
                
                
                /* @btn_radius_td-ps-rounded */
                .$unique_block_class .td-ps-rounded .td-social-network .td-social-but-icon {
                    border-top-left-radius: @btn_radius_td-ps-rounded;
                    border-bottom-left-radius: @btn_radius_td-ps-rounded;
                }
                .$unique_block_class .td-ps-rounded .td-social-network .td-social-but-text {
                    border-top-right-radius: @btn_radius_td-ps-rounded;
                    border-bottom-right-radius: @btn_radius_td-ps-rounded;
                }
                .$unique_block_class .td-ps-rounded.td-ps-notext .td-social-network .td-social-but-icon {
                    border-top-right-radius: @btn_radius_td-ps-rounded;
                    border-bottom-right-radius: @btn_radius_td-ps-rounded;
                }
                .$unique_block_class .td-ps-rounded .td-social-expand-tabs {
                    border-radius: @btn_radius_td-ps-rounded;
                }
                
                /* @btn_radius_td-ps-padding_td-ps-big */
                .$unique_block_class .td-ps-big.td-ps-padding .td-social-but-icon {
                    border-bottom-left-radius: 0;
                    border-top-right-radius: @btn_radius_td-ps-padding_td-ps-big;
                }
                .$unique_block_class .td-ps-big.td-ps-padding .td-social-but-text {
                    border-top-left-radius: 0;
                    border-top-right-radius: 0;
                    border-bottom-left-radius: @btn_radius_td-ps-padding_td-ps-big;
                }
                
				/* @btn_radius_icon_before */
                .$unique_block_class .td-social-network .td-social-but-icon:before {
                    border-top-left-radius: @btn_radius_icon_before;
                    border-bottom-left-radius: @btn_radius_icon_before;
                }

				
				
				/* @align_center */
				.$unique_block_class .td-post-sharing,
				.$unique_block_class .tdb-share-classic {
					text-align: center;
				}
				/* @align_right */
				.$unique_block_class .td-post-sharing,
				.$unique_block_class .tdb-share-classic {
					text-align: right;
				}
				/* @f_share */
				.$unique_block_class .td-social-share-text {
					@f_share
				}
				/* @f_txt */
				.$unique_block_class .td-social-network {
					@f_txt
				}
				
				/* @share_i_color */
				.$unique_block_class .td-social-expand-tabs-icon,
				.$unique_block_class .td-icon-share {
					color: @share_i_color;
				}
				/* @share_color */
				.$unique_block_class .td-social-share-text .td-social-but-text {
					color: @share_color;
				}
				.$unique_block_class .td-social-handler .td-social-but-text:before {
					background-color: @share_color;
				}
				/* @share_bg_color */
				.$unique_block_class .td-social-share-text,
				.$unique_block_class .td-social-handler {
					background-color: @share_bg_color;
				}
				.$unique_block_class .td-social-share-text:after {
					border-color: transparent transparent transparent @share_bg_color;
				}
				/* @share_b_color */
				.$unique_block_class .td-social-handler {
					border-color: @share_b_color;
				}
				.$unique_block_class .td-social-share-text:before {
					border-color: transparent transparent transparent @share_b_color;
				}
				
				/* @btn_i_color */
				.$unique_block_class .td-social-network .td-social-but-icon .td-social-copy_url-check,
				.$unique_block_class .td-social-network .td-social-but-icon i {
					color: @btn_i_color;
				}
				/* @btn_color */
				.$unique_block_class .td-social-network .td-social-but-text {
					color: @btn_color;
				}
				.$unique_block_class .td-social-network .td-social-but-text:before {
					background-color: @btn_color;
				}
				/* @btn_bg_color */
				.$unique_block_class .td-ps-bg .td-social-network div,
				.$unique_block_class .td-ps-icon-bg .td-social-network .td-social-but-icon,
				.$unique_block_class .td-ps-dark-bg .td-social-network div {
					background-color: @btn_bg_color;
				}
				.$unique_block_class .td-ps-icon-arrow .td-social-but-icon:after {
				    border-left-color: @btn_bg_color;
				}
				.$unique_block_class .td-ps-border-colored .td-social-but-text {
				    border-color: @btn_bg_color;
				}
			
				/* @btn_b_color */
				.$unique_block_class .td-ps-border .td-social-sharing-button .td-social-but-icon,
				.$unique_block_class .td-ps-border .td-social-sharing-button .td-social-but-text,
				.$unique_block_class .td-ps-border .td-social-sharing-button .td-social-handler {
					border-color: @btn_b_color;
				}
				
			</style>";


		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

	static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_single_post_share', 1 );

		/*-- LAYOUT -- */
        $like_share_style = $res_ctx->get_shortcode_att('like_share_style');
        if( $like_share_style == '' ) {
            $like_share_style = 'style1';
        }

        $share_radius = $res_ctx->get_shortcode_att('share_radius');
        if( $share_radius != '' && is_numeric( $share_radius ) ) {
            $res_ctx->load_settings_raw( 'share_radius', $share_radius . 'px' );
        }

        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
            $res_ctx->load_settings_raw( 'btn_radius_general', $btn_radius . 'px' );
        }

        switch ( $like_share_style ) {
            case 'style1':
            case 'style3':
            case 'style5':
            case 'style8':
            case 'style10':
            case 'style12':
            case 'style14':
            case 'style16':
                if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
                    $res_ctx->load_settings_raw( 'btn_radius_td-ps-notext', $btn_radius . 'px' );
                }

                break;

            case 'style3':
            case 'style4':
            case 'style18':
                if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
                    $res_ctx->load_settings_raw( 'btn_radius_td-ps-rounded', $btn_radius . 'px' );
                }

                break;

            case 'style9':
            case 'style11':
            case 'style13':
                if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
                    $res_ctx->load_settings_raw( 'btn_radius_td-ps-padding_td-ps-big', $btn_radius . 'px' );
                }

                break;

            case 'style7':
                if( $btn_radius != '' && is_numeric( $btn_radius ) ) {
                    $res_ctx->load_settings_raw( 'btn_radius_icon_before', $btn_radius . 'px' );
                }

                break;
        }


		/*-- FONTS -- */
		$res_ctx->load_font_settings( 'f_share' );
		$res_ctx->load_font_settings( 'f_txt' );


		/*-- COLORS -- */
		$res_ctx->load_settings_raw( 'share_i_color', $res_ctx->get_shortcode_att('share_i_color') );
		$res_ctx->load_settings_raw( 'share_color', $res_ctx->get_shortcode_att('share_color') );
		$res_ctx->load_settings_raw( 'share_bg_color', $res_ctx->get_shortcode_att('share_bg_color') );
		$res_ctx->load_settings_raw( 'share_b_color', $res_ctx->get_shortcode_att('share_b_color') );

		$res_ctx->load_settings_raw( 'btn_i_color', $res_ctx->get_shortcode_att('btn_i_color') );
		$res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
		$res_ctx->load_settings_raw( 'btn_bg_color', $res_ctx->get_shortcode_att('btn_bg_color') );
		$res_ctx->load_settings_raw( 'btn_b_color', $res_ctx->get_shortcode_att('btn_b_color') );

		// content align
		$content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
		if ( $content_align == 'content-horiz-center' ) {
			$res_ctx->load_settings_raw( 'align_center', 1 );
		} else if ( $content_align == 'content-horiz-right' ) {
			$res_ctx->load_settings_raw( 'align_right', 1 );
		}
	}

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render( $atts, $content = null ) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

	    global $tdb_state_single;
//        var_dump(tdb_state_template::get_template_type());

	    if ( tdb_state_template::get_template_type() === 'woo_product'  ) {
		    global $td_woo_state_single_product_page;

		    // update the hide like btn attribute to hide it all the time
		    $atts['like'] = 'yes';

		    $post_socials_data = $td_woo_state_single_product_page->product_socials->__invoke( $this->get_all_atts() );
	    } elseif ( is_page() || 'page' === tdb_state_template::get_template_type() ) {
            global $tdb_state_single_page;

		    // update the hide like btn attribute to hide it all the time
		    $atts['like'] = 'yes';

		    $post_socials_data = $tdb_state_single_page->page_socials->__invoke( $this->get_all_atts() );
	    } else {
		    $post_socials_data = $tdb_state_single->post_socials->__invoke( $this->get_all_atts() );
	    }

        $buffy = ''; // output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

	        // get the block css
	        $buffy .= $this->get_block_css();

	        // get the js for this block
	        $buffy .= $this->get_block_js();

	        // like button
	        $show_like_btn = isset( $atts['like'] ) && $atts['like'] !== 'yes';

	        // is amp
	        $is_amp = $post_socials_data['is_amp'];

		    if( $show_like_btn and !$is_amp ) {

			    $buffy .= '<div class="tdb-share-classic">';
			        $buffy .= '<iframe title="Share article" frameBorder="0" src="' . td_global::$http_or_https . '://www.facebook.com/plugins/like.php?href=' . $post_socials_data['post_permalink'] . '&amp;layout=button_count&amp;show_faces=false&amp;width=105&amp;action=like&amp;colorscheme=light&amp;height=21" style="border:none; overflow:hidden; width:105px; height:21px; background-color:transparent;"></iframe>';
			    $buffy .= '</div>';

		    }

		    $buffy .= td_social_sharing::render_generic( $post_socials_data, $this->block_uid );

	    $buffy .= '</div>';

        return $buffy;
    }
}