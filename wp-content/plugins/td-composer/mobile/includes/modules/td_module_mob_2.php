<?php

class td_module_mob_2 extends td_module {

    function __construct($post) {
        //run the parrent constructor
        parent::__construct($post);
    }

    function render() {
        ob_start();

        $additional_classes_array = array();
        $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        ?>

        <div class="<?php echo $this->get_module_classes($additional_classes_array); ?>">
            <?php
            echo $this->get_image('td_741x486');
            ?>
            <div class="td-meta-info-container">
                <div class="td-meta-align">
                    <div class="td-big-grid-meta">
                        <?php if ( td_util::get_option('tds_category_mobule_mob_2') == 'yes' ) { echo $this->get_category(); }?>
                        <?php echo $this->get_title();?>
                    </div>
                    <div class="td-module-meta-info">
                        <?php echo $this->get_author();?>
                        <?php echo $this->get_date();?>
                    </div>
                </div>
            </div>

        </div>

        <?php return ob_get_clean();
    }
}