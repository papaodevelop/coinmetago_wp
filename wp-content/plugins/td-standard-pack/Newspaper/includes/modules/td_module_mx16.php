<?php

class td_module_mx16 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();
        $title_length = $this->get_shortcode_att('mx16_tl');
        $excerpt_length = $this->get_shortcode_att('mx16_el');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        $time_ago = $this->get_shortcode_att('time_ago');
        $time_ago_add_txt = $this->get_shortcode_att('time_ago_add_txt');
        $time_ago_txt_pos = $this->get_shortcode_att('time_ago_txt_pos');
        ?>

        <div class="<?php echo $this->get_module_classes();?>">
            <div class="meta-info-container">
                <?php echo $this->get_title($title_length);?>
                <div class="td-info-container">
                    <div class="td-module-image">
                        <?php echo $this->get_image('td_356x364');?>
                        <?php if (td_util::get_option('tds_category_module_mx16') == 'yes') { echo $this->get_category(); }?>
                    </div>

                    <div class="td-item-details">
                        <div class="td-module-meta-info">
                            <?php echo $this->get_date($modified_date, false, $time_ago, $time_ago_add_txt, $time_ago_txt_pos);?>
                            <?php echo $this->get_comments();?>
                        </div>

                        <div class="td-excerpt">
                            <?php echo $this->get_excerpt($excerpt_length);?>
                        </div>

                        <div class="td-read-more">
                            <a href="<?php echo $this->href;?>"><?php echo __td('Read more', TD_THEME_NAME);?></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php return ob_get_clean();
    }
}