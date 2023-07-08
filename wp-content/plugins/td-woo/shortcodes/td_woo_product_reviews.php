<?php

/**
 * Class td_woo_product_reviews - shortcode for woocommerce single product reviews
 */
class td_woo_product_reviews extends td_block {

    public function get_custom_css() {
        // $unique_block_class
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>
            
                /* @general_style */
                .td_woo_product_reviews .woocommerce-Reviews-title {
                    margin-top: 0;
                }
                .td_woo_product_reviews #reviews #comments ol.commentlist li:last-child {
                    margin-bottom: 0;
                }
                .td_woo_product_reviews #reviews #comments ol.commentlist li img.avatar {
                    background-color: transparent;
                    padding: 0;
                    border-width: 4px;
                    border-color: #ebe9eb;
                }
                .td_woo_product_reviews #reviews #comments ol.commentlist li .comment-text {
                    padding: 14px;
                }
                .td_woo_product_reviews #reviews #comments ol.commentlist li .comment-tex .meta {
                    margin-bottom: 14px;
                }
                body.woocommerce .td_woo_product_reviews .star-rating {
                    width: auto;
                    height: auto;
                }
                body.woocommerce .td_woo_product_reviews .star-rating:before,
                body.woocommerce .td_woo_product_reviews .star-rating span:before {
                    position: relative;
                    font-size: 14px;
                }
                body.woocommerce .td_woo_product_reviews .star-rating span {
                    padding-top: 0;
                    font-size: 0;
                }
                .td_woo_product_reviews #reviews #comments ol.commentlist li .comment-text .description p {
                    margin-bottom: 0;
                }
                .td_woo_product_reviews #review_form_wrapper {
                    margin-top: 20px;
                }
                .td_woo_product_reviews .comment-form {
                    margin-top: 10px;
                }
                .td_woo_product_reviews #review_form #respond .form-submit {
                    margin-bottom: 0;
                }
                .td_woo_product_reviews #respond input#submit {
                    padding: 10px;
                    background: none #222;
                    font-size: 11px;
                    color: #fff;
                    text-shadow: none;
                    border: 0 solid #000;
                    border-radius: 0;
                }
                
                /* @rev_title_space */
                body .$unique_block_class .woocommerce-Reviews-title{
                    margin-bottom: @rev_title_space;
                }
            
                /* @rev_space */
                body .$unique_block_class #reviews #comments ol.commentlist li {
                    margin-bottom: @rev_space; 
                }
                
                /* @av_border */
                body .$unique_block_class #reviews #comments ol.commentlist li img.avatar {
                    border-width: @av_border;}
                
                /* @av_border_style */
                body .$unique_block_class #reviews #comments ol.commentlist li img.avatar {
                    border-style: @av_border_style;}
                
                /* @av_radius */
                body .$unique_block_class #reviews #comments ol.commentlist li img.avatar {
                    border-radius: @av_radius;}
                
                /* @rev_padding */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    padding: @rev_padding;}
                 
                /* @rev_border */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    border-width: @rev_border;}
                 
                /* @rev_border_style */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    border-style: @rev_border_style;}
                  
                /* @rev_radius */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    border-radius: @rev_radius;}
                 
                /* @meta_space */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta {
                    margin-bottom: @meta_space;}
                 
                /* @show_date */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__dash,
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta time {
                    display: @show_date;}
                    
                /* @rev_title */
                body .$unique_block_class .woocommerce-Reviews-title {
                    display: @rev_title;}
                    
                /* @stars_size */
                body.woocommerce .$unique_block_class .star-rating:before,
                body.woocommerce .$unique_block_class .star-rating span:before {
                    font-size: @stars_size;}
                    
                /* @form_space */
                body .$unique_block_class #review_form_wrapper {
                    margin-top: @form_space;}
                    
                /* @form_stars_size */  
                body .$unique_block_class #review_form #respond .stars {
                    font-size: @form_stars_size;}
                    
                /* @label_space */  
                body .$unique_block_class #review_form #respond p label {
                    display: block;
                    margin-bottom: @label_space;}
                    
                /* @input_padding */ 
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    padding: @input_padding;
                    height: auto;
                }
                    
                /* @input_space */    
                body .$unique_block_class #review_form #respond p {
                    margin-bottom: @input_space;}
                   
                /* @input_border */  
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    border-width: @input_border !important;}
                    
                /* @input_border_style */  
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    border-style: @input_border_style !important;}
                    
                /* @input_radius */  
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    border-radius: @input_radius !important;}
                    
                /* @btn_padding */ 
                body .$unique_block_class #respond input#submit {
                    padding: @btn_padding;}
                  
                /* @btn_border */
                body .$unique_block_class #respond input#submit {
                    border-width: @btn_border;}
                    
                /* @btn_border_style */
                body .$unique_block_class #respond input#submit {
                    border-style: @btn_border_style;}
                    
                /* @btn_radius */  
                body .$unique_block_class #respond input#submit {
                    border-radius: @btn_radius;}
                    
                
                
                /* @rev_title_color */
                body .$unique_block_class .woocommerce-Reviews-title {
                    color: @rev_title_color;
                }
                
                /* @av_border_color */
                body .$unique_block_class #reviews #comments ol.commentlist li img.avatar {
                    border-color: @av_border_color;
                }
                
                /* @rev_bg_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    background-color: @rev_bg_color;
                }
                /* @rev_border_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text {
                    border-color: @rev_border_color;
                }
                
                /* @auth_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text .woocommerce-review__author {
                    color: @auth_color;
                }
                /* @date_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta time {
                    color: @date_color;
                }
                /* @stars_full_color */
                body.woocommerce .$unique_block_class .star-rating span:before {
                    color: @stars_full_color;
                }
                /* @stars_empty_color */
                body.woocommerce .$unique_block_class .star-rating:before {
                    color: @stars_empty_color;
                }
                /* @rev_txt_color */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text .description {
                    color: @rev_txt_color;
                }
                
                /* @form_title_color */
                body .$unique_block_class #reply-title {
                    color: @form_title_color;
                }
                /* @form_stars_txt_color */
                body .$unique_block_class #review_form #respond .comment-form-rating label {
                    color: @form_stars_txt_color;
                }
                /* @form_stars_color */
                body .$unique_block_class #review_form #respond .stars a {
                    color: @form_stars_color;
                }
                /* @label_txt_color */
                body .$unique_block_class #review_form #respond label {
                    color: @label_txt_color;
                }
                /* @input_txt_color */
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    color: @input_txt_color;
                }
                /* @input_bg_color */
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    background-color: @input_bg_color;
                }
                /* @input_border_color */
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    border-color: @input_border_color !important;
                }
                
                /* @btn_bg_color */
                body .$unique_block_class #respond input#submit {
                    background-color: @btn_bg_color;
                }
                /* @btn_bg_color_h */
                body .$unique_block_class #respond input#submit:hover {
                    background-color: @btn_bg_color_h;
                }
                /* @btn_txt_color */
                body .$unique_block_class #respond input#submit {
                    color: @btn_txt_color;
                }
                /* @btn_txt_color_h */
                body .$unique_block_class #respond input#submit:hover {
                    color: @btn_txt_color_h;
                }
                /* @btn_border_color */
                body .$unique_block_class #respond input#submit {
                    border-color: @btn_border_color;
                }
                /* @btn_border_color_h */
                body .$unique_block_class #respond input#submit:hover {
                    border-color: @btn_border_color_h;
                }
                
                
                
                /* @f_title */
                body .$unique_block_class .woocommerce-Reviews-title {
                    @f_title
                }
                /* @f_auth */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text .woocommerce-review__author {
                    @f_auth
                }
                /* @f_date */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text p.meta time {
                    @f_date
                }
                /* @f_txt */
                body .$unique_block_class #reviews #comments ol.commentlist li .comment-text .description {
                    @f_txt;
                }
                /* @f_form_t */
                body .$unique_block_class #reply-title {
                    @f_form_t
                }
                /* @f_label */
                body .$unique_block_class #review_form #respond label {
                    @f_label
                }
                /* @f_input */
                body .$unique_block_class #review_form #respond textarea,
                body .$unique_block_class #review_form #respond input[type=text],
                body .$unique_block_class #review_form #respond input[type=email] {
                    @f_input
                }
                /* @f_btn */
                body .$unique_block_class #respond input#submit {
                    @f_btn
                }
            
            </style>";

        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx )
    {

        /*-- GENERAL-- */
        $res_ctx->load_settings_raw('general_style', 1);

        /*-- REVIEWS -- */
        $rev_title_space = $res_ctx->get_shortcode_att('rev_title_space');
        $res_ctx->load_settings_raw('rev_title_space', $rev_title_space);
        if ($rev_title_space != '' && is_numeric($rev_title_space)) {
            $res_ctx->load_settings_raw('rev_title_space', $rev_title_space . 'px');
        }

        $rev_space = $res_ctx->get_shortcode_att('rev_space');
        $res_ctx->load_settings_raw('rev_space', $rev_space);
        if ($rev_space != '' && is_numeric($rev_space)) {
            $res_ctx->load_settings_raw('rev_space', $rev_space . 'px');
        }

        /*-- AUTHOR AVATAR -- */
        $av_border = $res_ctx->get_shortcode_att('av_border');
        $res_ctx->load_settings_raw('av_border', $av_border);
        if ($av_border != '' && is_numeric($av_border)) {
            $res_ctx->load_settings_raw('av_border', $av_border . 'px');
        }

        $res_ctx->load_settings_raw('av_border_style', $res_ctx->get_shortcode_att('av_border_style'));

        $av_radius = $res_ctx->get_shortcode_att('av_radius');
        $res_ctx->load_settings_raw('av_radius', $av_radius);
        if ($av_radius != '' && is_numeric($av_radius)) {
            $res_ctx->load_settings_raw('av_radius', $av_radius . 'px');
        }

        /*-- REVIEW BOX -- */
        $rev_padding = $res_ctx->get_shortcode_att('rev_padding');
        $res_ctx->load_settings_raw('rev_padding', $rev_padding);
        if ($rev_padding != '' && is_numeric($rev_padding)) {
            $res_ctx->load_settings_raw('rev_padding', $rev_padding . 'px');
        }

        $rev_border =  $res_ctx->get_shortcode_att('rev_border');
        $res_ctx->load_settings_raw('rev_border', $rev_border);
        if ($rev_border != '' && is_numeric($rev_border)) {
            $res_ctx->load_settings_raw('rev_border', $rev_border . 'px');
        }

        $res_ctx->load_settings_raw('rev_border_style', $res_ctx->get_shortcode_att('rev_border_style'));

        $rev_radius =  $res_ctx->get_shortcode_att('rev_radius');
        $res_ctx->load_settings_raw('rev_radius', $rev_radius);
        if ($rev_radius != '' && is_numeric($rev_radius)) {
            $res_ctx->load_settings_raw('rev_radius', $rev_radius . 'px');
        }

        /*-- META INFO -- */
        $meta_space =  $res_ctx->get_shortcode_att('meta_space');
        $res_ctx->load_settings_raw('meta_space', $meta_space);
        if ($meta_space != '' && is_numeric($meta_space)) {
            $res_ctx->load_settings_raw('meta_space', $meta_space . 'px');
        }

        $res_ctx->load_settings_raw('show_date', $res_ctx->get_shortcode_att('show_date'));
        $res_ctx->load_settings_raw('rev_title', $res_ctx->get_shortcode_att('rev_title'));

        $stars_size = $res_ctx->get_shortcode_att('stars_size');
        $res_ctx->load_settings_raw('stars_size', $stars_size);
        if ($stars_size != '' && is_numeric($stars_size)) {
            $res_ctx->load_settings_raw('stars_size', $stars_size . 'px');
        }

        /*-- REVIEW FORM SETTINGS-- */
        $form_space = $res_ctx->get_shortcode_att('form_space');
        $res_ctx->load_settings_raw('form_space', $form_space);
        if ($form_space != '' && is_numeric($form_space)) {
            $res_ctx->load_settings_raw('form_space', $form_space . 'px');
        }

        $form_stars_size = $res_ctx->get_shortcode_att('form_stars_size');
        $res_ctx->load_settings_raw('form_stars_size', $form_stars_size);
        if ($form_stars_size != '' && is_numeric($form_stars_size)) {
            $res_ctx->load_settings_raw('form_stars_size', $form_stars_size . 'px');
        }

        /*--LABELS-- */
        $label_space = $res_ctx->get_shortcode_att('label_space');
        $res_ctx->load_settings_raw('label_space', $label_space);
        if ($label_space != '' && is_numeric($label_space)) {
            $res_ctx->load_settings_raw('label_space', $label_space . 'px');
        }

        /*--INPUTS-- */
        $input_padding = $res_ctx->get_shortcode_att('input_padding');
        $res_ctx->load_settings_raw('input_padding', $input_padding);
        if ($input_padding != '' && is_numeric($input_padding)) {
            $res_ctx->load_settings_raw('input_padding', $input_padding . 'px');
        }

        $input_space = $res_ctx->get_shortcode_att('input_space');
        $res_ctx->load_settings_raw('input_space', $input_space);
        if ($input_space != '' && is_numeric($input_space)) {
            $res_ctx->load_settings_raw('input_space', $input_space . 'px');
        }

        $input_border = $res_ctx->get_shortcode_att('input_border');
        $res_ctx->load_settings_raw('input_border', $input_border);
        if ($input_border != '' && is_numeric($input_border)) {
            $res_ctx->load_settings_raw('input_border', $input_border . 'px');
        }

        $res_ctx->load_settings_raw('input_border_style', $res_ctx->get_shortcode_att('input_border_style'));

        $input_radius = $res_ctx->get_shortcode_att('input_radius');
        $res_ctx->load_settings_raw('input_radius', $input_radius);
        if ($input_radius != '' && is_numeric($input_radius)) {
            $res_ctx->load_settings_raw('input_radius', $input_radius . 'px');
        }

        /*--SUBMIT BUTTON-- */
        $btn_padding = $res_ctx->get_shortcode_att('btn_padding');
        $res_ctx->load_settings_raw('btn_padding', $btn_padding);
        if ($btn_padding != '' && is_numeric($btn_padding)) {
            $res_ctx->load_settings_raw('btn_padding', $btn_padding . 'px');
        }

        $btn_border = $res_ctx->get_shortcode_att('btn_border');
        $res_ctx->load_settings_raw('btn_border', $btn_border);
        if ($btn_border != '' && is_numeric($btn_border)) {
            $res_ctx->load_settings_raw('btn_border', $btn_border . 'px');
        }

        $res_ctx->load_settings_raw('btn_border_style', $res_ctx->get_shortcode_att('btn_border_style'));

        $btn_radius = $res_ctx->get_shortcode_att('btn_radius');
        $res_ctx->load_settings_raw('btn_radius', $btn_radius);
        if ($btn_radius != '' && is_numeric($btn_radius)) {
            $res_ctx->load_settings_raw('btn_radius', $btn_radius . 'px');
        }



        /*-- COLORS -- */
        $res_ctx->load_settings_raw('rev_title_color', $res_ctx->get_shortcode_att('rev_title_color'));

        $res_ctx->load_settings_raw('av_border_color', $res_ctx->get_shortcode_att('av_border_color'));

        $res_ctx->load_settings_raw('rev_bg_color', $res_ctx->get_shortcode_att('rev_bg_color'));
        $res_ctx->load_settings_raw('rev_border_color', $res_ctx->get_shortcode_att('rev_border_color'));

        $res_ctx->load_settings_raw('auth_color', $res_ctx->get_shortcode_att('auth_color'));
        $res_ctx->load_settings_raw('date_color', $res_ctx->get_shortcode_att('date_color'));
        $res_ctx->load_settings_raw('stars_full_color', $res_ctx->get_shortcode_att('stars_full_color'));
        $res_ctx->load_settings_raw('stars_empty_color', $res_ctx->get_shortcode_att('stars_empty_color'));
        $res_ctx->load_settings_raw('rev_txt_color', $res_ctx->get_shortcode_att('rev_txt_color'));

        $res_ctx->load_settings_raw('form_title_color', $res_ctx->get_shortcode_att('form_title_color'));
        $res_ctx->load_settings_raw('form_stars_txt_color', $res_ctx->get_shortcode_att('form_stars_txt_color'));
        $res_ctx->load_settings_raw('form_stars_color', $res_ctx->get_shortcode_att('form_stars_color'));
        $res_ctx->load_settings_raw('label_txt_color', $res_ctx->get_shortcode_att('label_txt_color'));
        $res_ctx->load_settings_raw('input_txt_color', $res_ctx->get_shortcode_att('input_txt_color'));
        $res_ctx->load_settings_raw('input_bg_color', $res_ctx->get_shortcode_att('input_bg_color'));
        $res_ctx->load_settings_raw('input_border_color', $res_ctx->get_shortcode_att('input_border_color'));
        $res_ctx->load_settings_raw('btn_bg_color', $res_ctx->get_shortcode_att('btn_bg_color'));
        $res_ctx->load_settings_raw('btn_bg_color_h', $res_ctx->get_shortcode_att('btn_bg_color_h'));
        $res_ctx->load_settings_raw('btn_txt_color', $res_ctx->get_shortcode_att('btn_txt_color'));
        $res_ctx->load_settings_raw('btn_txt_color_h', $res_ctx->get_shortcode_att('btn_txt_color_h'));
        $res_ctx->load_settings_raw('btn_border_color', $res_ctx->get_shortcode_att('btn_border_color'));
        $res_ctx->load_settings_raw('btn_border_color_h', $res_ctx->get_shortcode_att('btn_border_color_h'));



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title' );
        $res_ctx->load_font_settings( 'f_auth' );
        $res_ctx->load_font_settings( 'f_date' );
        $res_ctx->load_font_settings( 'f_txt' );
        $res_ctx->load_font_settings( 'f_form_t' );
        $res_ctx->load_font_settings( 'f_label' );
        $res_ctx->load_font_settings( 'f_input' );
        $res_ctx->load_font_settings( 'f_btn' );


    }

    
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render($atts, $content = null) {

        global $td_woo_state_single_product_page;

	    $product_reviews = $td_woo_state_single_product_page->product_reviews->__invoke($atts);
        
        parent::render($atts);


        $buffy = '';

        if( $product_reviews == '' ) {
            return $buffy;
        }

        $buffy .= '<div class="' . $this->get_block_classes()  . '" ' . $this->get_block_html_atts() . '>';

	        //get the block css
	        $buffy .= $this->get_block_css();

	        //get the js for this block
	        $buffy .= $this->get_block_js();

            $buffy .= '<div class="tdb-block-inner td-fix-index">';
                $buffy .= $product_reviews;
            $buffy .= '</div>';

        $buffy .= '</div>';

        return $buffy;
    }
}

