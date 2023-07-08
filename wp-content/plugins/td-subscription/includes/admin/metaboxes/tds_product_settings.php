<div class="td-meta-box-inside">

    <?php
    $post_id = get_the_ID();
    $payment_product_sync = get_post_meta($post_id, 'payment_product_sync', true);
    $td_post_theme_settings = td_util::get_post_meta_array($post_id, 'td_post_theme_settings');
    ?>

    <!-- post option general -->
    <div class="td-page-option-panel td-post-option-general td-page-option-panel-active">

        <?php
            if (empty($payment_product_sync) ) {
	            ?>

                <!-- payment plan sync -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
			            <span class="td-page-o-custom-label">PayPal Not Sync</span><br>
                        <input type="hidden" class="tds-not-sync" value="1">
                    </div>
                </div>

	            <?php

            } else {
                ?>

                <!-- payment plan sync -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
			            <span class="td-page-o-custom-label">PayPal Sync</span><br>
                    </div>
                </div>

                <?php
            }

            if (!empty($td_post_theme_settings['tds_payment_product_id']) ) {
                ?>

                <!-- paypal product id -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
                        <?php
                            $mb->the_field('tds_payment_product_id');
                            $tds_payment_product_id = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                        ?>
                        <span class="td-page-o-custom-label">ID [autocomplete]</span>
                        <input class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>" value="<?php echo $tds_payment_product_id ?>" placeholder="TDS-23423 (ex.)" readonly>
                    </div>
                </div>

                <?php
            }
        ?>

        <!-- payment plan status -->
        <div class="td-meta-box-row td-meta-box-row-border">
            <div class="tds-locker-input">
                <?php
                    $mb->the_field('tds_payment_product_type');
                    $tds_payment_product_type = ( $mb->have_value() ) ? $mb->get_the_value() : "SERVICE";
                ?>
                <span class="td-page-o-custom-label">Type [autocomplete]</span>
                <input class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>" readonly
                               value="<?php echo $tds_payment_product_type ?>" placeholder="SERVICE  (ex.)"/>
                <label class="tds-label-check-type"></label>
            </div>
        </div>

        <?php
        if (empty($payment_product_sync) ) {
            if (!empty($td_post_theme_settings)) {
	            ?>

                <!-- payment check plan -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
                        <button class="tds-sync-product">Sync with payment</button>
                    </div>
                </div>

	            <?php
            }
        } else {
            ?>

            <!-- payment check plan -->
            <div class="td-meta-box-row td-meta-box-row-border">
                <div class="tds-locker-input">
                    <div style="width:200px">
                        <button class="tds-sync-product">Sync with payment</button>
                        <span class="spinner"></span>
                    </div>
                </div>
                <div class="tds-locker-input">
                    <div style="width:200px">
                        <button class="tds-check-product">Check with payment</button>
                        <span class="spinner"></span>
                    </div>
                </div>
            </div>

            <div class="td-meta-box-row td-meta-box-row-border">
                <div class="tds-locker-input">
                    <textarea class="tds-check-results"></textarea>
                </div>
            </div>

        <?php
        }
        ?>

    </div> <!-- /post option general -->

</div>

