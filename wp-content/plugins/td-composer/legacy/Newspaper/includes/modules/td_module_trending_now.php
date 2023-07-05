<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 03.02.2015
 * Time: 10:05
 */

class td_module_trending_now extends td_module {

    function __construct($post) {
        parent::__construct($post);
    }

    function render($order_no, $title_length, $title_tag ) {
        ob_start();
        ?>

        <div class="<?php echo $this->get_module_classes(array("td-trending-now-post-$order_no", "td-trending-now-post", 'td-cpt-'. $this->post->post_type)); ?>">

            <?php echo $this->get_title($title_length, $title_tag)?>

        </div>

        <?php return ob_get_clean();
    }
}