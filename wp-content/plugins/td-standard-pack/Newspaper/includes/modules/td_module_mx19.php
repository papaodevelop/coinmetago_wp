<?php

class td_module_mx19 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render($order_no) {
        ob_start();
        $title_length = $this->get_shortcode_att('mx19_tl');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        $time_ago = $this->get_shortcode_att('time_ago');
        $time_ago_add_txt = $this->get_shortcode_att('time_ago_add_txt');
        $time_ago_txt_pos = $this->get_shortcode_att('time_ago_txt_pos');
        ?>

        <div class="<?php echo $this->get_module_classes(array("td-big-grid-post-$order_no", "td-big-grid-post td-mx-23"));?>">
            <div class="td-module-image">
                <?php echo $this->get_image('td_1068x0', true);?>
            </div>

            <div class="td-meta-info-container">
                <div class="td-meta-align">
                    <div class="td-big-grid-meta">
                        <?php if (td_util::get_option('tds_category_module_mx19') == 'yes') { echo $this->get_category(); }?>
                        <?php echo $this->get_title($title_length);?>
                    </div>

                    <div class="td-module-meta-info">
                        <?php echo $this->get_author();?>
                        <?php echo $this->get_date($modified_date, false, $time_ago, $time_ago_add_txt, $time_ago_txt_pos);?>
                    </div>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}