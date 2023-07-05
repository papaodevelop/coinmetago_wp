<?php
class tdb_form_link_post extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = ((td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) ? 'tdc-row .' : '') . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @style_general_tdb_form_link_post */
                .tdb_form_link_post {
                    transform: translateZ(0);
                    margin-bottom: 28px;
                    font-family: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-size: 14px;
                }
                .tdb_form_link_post .tdb-s-form-group {
                    display: flex;
                }
                
                /* @style_general_tdb_form_link_post_composer */
                .tdb_form_link_post .tdb-block-inner {
                    pointer-events: none;
                }
                
                
                
                /* @all_input_display_row */
                body .$unique_block_class .tdb-s-form-group {
                    flex-direction: column;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-label {
                    width: 100%;
                    margin: 0 0 8px;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-label-descr {
                    margin-bottom: 2px;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap {
                    width: 100%;
                }
                
                /* @all_input_display_columns */
                body .$unique_block_class .tdb-s-form-group {
                    flex-direction: row;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-label {
                    width: @all_label_width;
                    margin: 0 24px 0 0;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-label-descr {
                    margin-bottom: 0;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap {
                    flex: 1;
                }
                
                
                /* @all_input_border */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input,
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                body .tdb-s-select2-$unique_block_class.select2-dropdown,
                body .tdb-s-select2-$unique_block_class .select2-search__field {
                    border: @all_input_border @all_input_border_style @all_input_border_color;
                }
                /* @input_radius */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input,
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                body .tdb-s-select2-$unique_block_class.select2-dropdown,
                body .tdb-s-select2-$unique_block_class .select2-search__field {
                    border-radius: @input_radius;
                }
                
                /* @drop_height */
                body .tdb-s-select2-$unique_block_class .select2-results__options {
                    max-height: @drop_height;
                }
                
                
                /* @accent_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:focus:not([readonly]),
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-container--open .select2-selection {
                    border-color: @accent_color !important;
                }
                /* @input_outline_accent_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-group:not(.tdb-s-fg-error) .tdb-s-form-input:focus:not([readonly]),
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-container--open .select2-selection {
                    outline-color: @input_outline_accent_color;
                }
                
                /* @label_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-label {
                    color: @label_color;
                }
                /* @descr_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-label-descr {
                    color: @descr_color;
                }
                /* @input_color */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input,
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                body .tdb-s-select2-$unique_block_class .select2-search__field,
                body .tdb-s-select2-$unique_block_class .select2-results__options {
                    color: @input_color;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:active {
                    -webkit-text-fill-color: @input_color;
                }
                /* @input_bg */
                body .$unique_block_class .tdb-s-form .tdb-s-form-input,
                body .$unique_block_class .tdb-s-form .tdb-s-form-select-wrap .select2-selection,
                body .tdb-s-select2-$unique_block_class.select2-dropdown,
                body .tdb-s-select2-$unique_block_class .select2-search__field {
                    background-color: @input_bg;
                }
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:hover,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:focus,
                body .$unique_block_class .tdb-s-form .tdb-s-form-input:-webkit-autofill:active {
                    -webkit-box-shadow: 0 0 0 1000px @input_bg inset !important;
                }
                /* @input_select2_outline_color */
                body .tdb-s-select2-$unique_block_class.select2-dropdown {
                    outline-color: @input_select2_outline_color;
                }
                
                /* @option_color_h */
                body .tdb-s-select2-$unique_block_class .select2-results__options li:hover {
                    color: @option_color_h;
                }
                /* @option_bg_h */
                body .tdb-s-select2-$unique_block_class .select2-results__options li:hover {
                    background-color: @option_bg_h;
                }
                
                
                /* @f_text */
                body .$unique_block_class,
                body .tdb-s-select2-$unique_block_class.select2-dropdown {
                    @f_text
                }

            </style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- GENERAL STYLES -- */
        $res_ctx->load_settings_raw( 'style_general_tdb_form_link_post', 1 );
        if( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $res_ctx->load_settings_raw( 'style_general_tdb_form_link_post_composer', 1 );
        }



        /*-- LAYOUT -- */
        // inputs display
        $all_input_display = $res_ctx->get_shortcode_att('all_input_display');
        if( $all_input_display == '' || $all_input_display == 'row' ) {
            $res_ctx->load_settings_raw( 'all_input_display_row', 1 );
        } else {
            $res_ctx->load_settings_raw( 'all_input_display_columns', 1 );
        }

        // labels width
        $all_label_width = $res_ctx->get_shortcode_att('all_label_width');
        $res_ctx->load_settings_raw( 'all_label_width', $all_label_width );
        if( $all_label_width != '' ) {
            if( is_numeric( $all_label_width ) ) {
                $res_ctx->load_settings_raw( 'all_label_width', $all_label_width . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'all_label_width', '30%' );
        }

        // inputs border size
        $all_input_border = $res_ctx->get_shortcode_att('all_input_border');
        $res_ctx->load_settings_raw( 'all_input_border', $all_input_border );
        if( $all_input_border == '' ) {
            $res_ctx->load_settings_raw( 'all_input_border', '2px' );
        } else {
            if( is_numeric( $all_input_border ) ) {
                $res_ctx->load_settings_raw( 'all_input_border', $all_input_border . 'px' );
            }
        }

        // inputs border style
        $all_input_border_style = $res_ctx->get_shortcode_att('all_input_border_style');
        if( $all_input_border_style != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_style', $all_input_border_style );
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_style', 'solid' );
        }

        // inputs border radius
        $input_radius = $res_ctx->get_shortcode_att('input_radius');
        $res_ctx->load_settings_raw( 'input_radius', $input_radius );
        if( $input_radius != '' && is_numeric( $input_radius ) ) {
            $res_ctx->load_settings_raw( 'input_radius', $input_radius . 'px' );
        }

        // dropdown list height
        $drop_height = $res_ctx->get_shortcode_att('drop_height');
        $res_ctx->load_settings_raw( 'drop_height', $drop_height );
        if( $drop_height != '' && is_numeric( $drop_height ) ) {
            $res_ctx->load_settings_raw( 'drop_height', $drop_height . 'px' );
        }



        /*-- COLORS -- */
        $accent_color = $res_ctx->get_shortcode_att('accent_color');
        $res_ctx->load_settings_raw( 'accent_color', $accent_color );
        if( !empty( $accent_color ) ) {
            $res_ctx->load_settings_raw('input_outline_accent_color', td_util::hex2rgba($accent_color, 0.1));
        }

        $res_ctx->load_settings_raw( 'label_color', $res_ctx->get_shortcode_att('label_color') );
        $res_ctx->load_settings_raw( 'descr_color', $res_ctx->get_shortcode_att('descr_color') );
        $res_ctx->load_settings_raw( 'input_color', $res_ctx->get_shortcode_att('input_color') );
        $res_ctx->load_settings_raw( 'input_bg', $res_ctx->get_shortcode_att('input_bg') );
        $all_input_border_color = $res_ctx->get_shortcode_att('all_input_border_color');
        if( $all_input_border_color != '' ) {
            $res_ctx->load_settings_raw( 'all_input_border_color', $all_input_border_color );
            $res_ctx->load_settings_raw( 'input_select2_outline_color', td_util::hex2rgba($all_input_border_color, 0.18));
        } else {
            $res_ctx->load_settings_raw( 'all_input_border_color', '#D7D8DE' );
        }
        $res_ctx->load_settings_raw( 'option_color_h', $res_ctx->get_shortcode_att('option_color_h') );
        $res_ctx->load_settings_raw( 'option_bg_h', $res_ctx->get_shortcode_att('option_bg_h') );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_text' );

    }

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render( $atts, $content = null ) {
        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)


        // currently logged in user
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;
        $is_current_user_admin = in_array('administrator', $current_user->roles);

        // current post id
        $curr_post_id = '';
        if ( isset($_GET['post_id']) && !( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) ) {
            $post = get_post($_GET['post_id']);

            if( $post && ( $post->post_author == $current_user_id || $is_current_user_admin ) ) {
                $curr_post_id = $_GET['post_id'];
            }
        }

        $linked_post_id = '';
        if ( !empty($curr_post_id) ) {
            $linked_post_id = get_post_meta($curr_post_id, 'tdc-parent-post-id', true);
        }


        // required field
        $required = $this->get_att('required');
        if( $required != '' ) {
            $required = 1;
        } else {
            $required = 0;
        }


        $authenticated_users = $this->get_att('authenticated_users');
        $input_disabled = '';
        if( $authenticated_users != '' && !is_user_logged_in() ) {
            $input_disabled = 'disabled';
        }


        // get posts
        $post_type = $this->get_att('post_type') != '' ? $this->get_att('post_type') : 'post';
        $allowed_post_statuses = array('publish');

        $order_by = $this->get_att('orderby') != '' ? $this->get_att('orderby') : 'title';
        $order = $this->get_att('order') != '' ? $this->get_att('order') : 'ASC';

        $args = array(
            'post_type' => $post_type,
            'post_status' => $allowed_post_statuses,
            'numberposts' => -1,
            'orderby' => $order_by,
            'order' => $order
        );

        if( $this->get_att('curr_user_only') != '' ) {
            $args['author'] = $current_user->ID;
        }

        $posts = get_posts($args);


        // label text
        $label_txt = $this->get_att('label_txt');
        if( $label_txt == '' ) {
            $label_txt = 'Link to existing post';
        }

        // label description
        $label_descr_txt = rawurldecode( base64_decode( strip_tags( $this->get_att('descr_txt') ) ) );


        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . ' ' . ( $input_disabled != '' ? 'tdb-disabled' : '' ) . '" ' . $this->get_block_html_atts() . ' data-required="' . $required . '">';

            //get the block css
            $buffy .= $this->get_block_css();

            //get the js for this block
            $buffy .= $this->get_block_js();


            $buffy .= '<div class="tdb-block-inner td-fix-index tdb-s-form">';
                $buffy .= '<div class="tdb-s-form-content">';
                    $buffy .= '<div class="tdb-s-fc-inner">';
                        $buffy .= '<div class="tdb-s-form-group tdb-s-content" data-required="1">';
                            $buffy .= '<label class="tdb-s-form-label" for="tdb-posts-form-link-post-' . $this->block_uid . '">';
                                $buffy .= $label_txt;

                                if( $required ) {
                                    $buffy .= '<span class="tdb-s-form-label-required"> *</span>';
                                }

                                if( $label_descr_txt != '' ) {
                                    $buffy .= '<span class="tdb-s-form-label-descr">' . $label_descr_txt . '</span>';
                                }
                            $buffy .= '</label>';

                            $buffy .= '<div class="tdb-s-form-select-wrap">';
                                $buffy .= '<select class="tdb-s-form-input" name="tdb-posts-form-link-post-' . $this->block_uid . '[]" ' . $input_disabled . '>';
                                    $buffy .= '<option value="0">-- Select post --</option>';

                                    foreach ( $posts as $post ) {
                                        $buffy .= '<option value="' . $post->ID . '" ' . ( $post->ID == $linked_post_id ? 'selected' : '' ) . '>' . $post->post_title . '</option>';
                                    }
                                $buffy .= '</select>';

                                $buffy .= '<svg class="tdb-s-form-select-icon" xmlns="http://www.w3.org/2000/svg" width="8.947" height="12.578" viewBox="0 0 8.947 12.578"><g transform="translate(7.947 1) rotate(90)"><path d="M0,7.947A1,1,0,0,1-.58,7.761,1,1,0,0,1-.815,6.366l2.06-2.893L-.815.58A1,1,0,0,1-.58-.815,1,1,0,0,1,.815-.58L3.288,2.893a1,1,0,0,1,0,1.16L.815,7.527A1,1,0,0,1,0,7.947Z" transform="translate(8.104 0)"/><path d="M2.474,7.947a1,1,0,0,1-.815-.42L-.815,4.053a1,1,0,0,1,0-1.16L1.659-.58A1,1,0,0,1,3.053-.815,1,1,0,0,1,3.288.58L1.228,3.473l2.06,2.893a1,1,0,0,1-.814,1.58Z" transform="translate(0 0)"/></g></svg>';
                            $buffy .= '</div>';
                        $buffy .= '</div>';
                    $buffy .= '</div>';
                $buffy .= '</div>';
            $buffy .= '</div>';


            if( !( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) ) {
                ob_start();
                ?>
                <script>
                    /* global jQuery:{} */
                    jQuery().ready(function () {

                        let uid = '<?php echo $this->block_uid ?>',
                            $blockObj = jQuery('.<?php echo $this->block_uid ?>');

                        $blockObj.on('select2:open', () => {
                            document.querySelector('.select2-search__field').focus();
                        });

                        $blockObj.find('.tdb-s-form-group select').select2({
                            dropdownCssClass: 'tdb-s-select2 tdb-s-select2-' + uid,
                            templateSelection: function (data) {
                                var $option = jQuery(data.element);
                                return $option.text().replace(/ *\([^)]*\) */g, "");
                            }
                        });

                    });
                </script>
                <?php
                td_js_buffer::add_to_footer( "\n" . td_util::remove_script_tag( ob_get_clean() ) );
            }

        $buffy .= '</div>';

        return $buffy;

    }

}