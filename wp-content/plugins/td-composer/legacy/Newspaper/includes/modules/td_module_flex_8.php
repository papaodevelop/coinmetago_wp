<?php

class td_module_flex_8 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render( $order_no, $shortcode_class = '') {
        ob_start();

        $image_size = $this->get_shortcode_att('image_size3');
        $category_position = $this->get_shortcode_att('modules_category');
        $title_length = $this->get_shortcode_att('mf8_tl');
        $title_tag = $this->get_shortcode_att('mf8_title_tag');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        $time_ago = $this->get_shortcode_att('time_ago');
        $time_ago_add_txt = $this->get_shortcode_att('time_ago_add_txt');
        $time_ago_txt_pos = $this->get_shortcode_att('time_ago_txt_pos');

        $hide_author_date = '';

        $hide_cat = '';
        $hide_label = '';
        $hide_author = '';
        $hide_date = '';
        $hide_rev = '';

        if ( !empty($shortcode_class)) {
            $hide_cat = $this->get_shortcode_att('show_cat3');
            $hide_label = $this->get_shortcode_att('modules_extra_cat3'); //this includes label position
            $hide_author = $this->get_shortcode_att('show_author3');
            $hide_date = $this->get_shortcode_att('show_date3');
            $hide_rev = $this->get_shortcode_att('show_review3');

            // when to hide
            if( $hide_cat == 'none') {
                $hide_cat = 'hide';
            }
            if( $hide_author == 'none') {
                $hide_author = 'hide';
            }
            if( $hide_date == 'none') {
                $hide_date = 'hide';
            }
            if( $hide_rev == 'none') {
                $hide_rev = 'hide';
            }

            if( $hide_author == 'hide' && $hide_date == 'hide' && ( $hide_rev == 'hide' || $this->get_review() == '' && $hide_label == 'hide' ) ) {
                $hide_author_date = 'hide';
            }
        }

        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }

        $extra_cat = '';
        if ( $hide_label != 'hide' ) {
            $td_post_theme_settings = td_util::get_post_meta_array($this->post->ID, 'td_post_theme_settings');
            $td_custom_cat_name = '';
            $td_custom_cat_name_url = '#';
//            var_dump($td_post_theme_settings);
            if ( !empty($td_post_theme_settings['td_custom_cat_name']) ) {
                //we have a custom category selected
                $td_custom_cat_name = $td_post_theme_settings['td_custom_cat_name'];
                if (!empty($td_post_theme_settings['td_custom_cat_name_url'])) {
                    $td_custom_cat_name_url = $td_post_theme_settings['td_custom_cat_name_url'];
                }
                $extra_cat = '<a href="' . $td_custom_cat_name_url . '" class="td-post-category td-post-extra-category">'  . $td_custom_cat_name . '</a>';
            }
        }
        $additional_classes_array = array("td-big-grid-flex-post td-big-grid-flex-post-$order_no", 'td-cpt-'. $this->post->post_type);
        $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        ?>

        <div class="<?php echo $this->get_module_classes($additional_classes_array);?>">
            <div class="td-module-container td-category-pos-<?php echo esc_attr($category_position) ?>">
                <div class="td-image-container">
                    <?php echo $this->get_image($image_size, true);?>
                </div>

                <div class="td-module-meta-info">
                    <?php if ($hide_label == 'above') { echo $extra_cat; }?>
                    <?php if ($category_position == 'above' && $hide_cat != 'hide') { echo $this->get_category(); }?>

                    <div class="tdb-module-title-wrap">
                        <?php echo $this->get_title($title_length, $title_tag);?>
                    </div>

                    <?php if ($hide_label == '') { echo $extra_cat; }?>
                    <?php if ($category_position == '' && $hide_cat != 'hide') { echo $this->get_category(); }?>

                    <?php if( $hide_author_date != 'hide' ) { ?>
                        <div class="td-editor-date">
                            <?php if( $hide_author != 'hide' ) { echo $this->get_author(true); } ?>
                            <?php if( $hide_date != 'hide' ) { echo $this->get_date($modified_date, true, $time_ago, $time_ago_add_txt, $time_ago_txt_pos); } ?>
                            <?php if( $hide_rev != 'hide' ) { echo $this->get_review(); } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}
