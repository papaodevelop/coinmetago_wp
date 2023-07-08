<div class="td-meta-box-inside">

    <?php
    $post_id = get_the_ID();
    $paypal_plan_sync = get_post_meta($post_id, 'paypal_plan_sync', true);
    $td_post_theme_settings = td_util::get_post_meta_array($post_id, 'td_post_theme_settings');
    ?>

    <!-- post option general -->
    <div class="td-page-option-panel td-post-option-general td-page-option-panel-active">

        <?php
            if (empty($paypal_plan_sync) ) {
	            ?>

                <!-- paypal plan sync -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
			            <span class="td-page-o-custom-label">PayPal Not Sync</span><br>
                        <input type="hidden" class="tds-not-sync" value="1">
                    </div>
                </div>

	            <?php

            } else {
                ?>

                <!-- paypal plan sync -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
			            <span class="td-page-o-custom-label">PayPal Sync</span><br>
                    </div>
                </div>

                <?php
            }

            if (!empty($td_post_theme_settings['tds_payment_plan_id']) ) {
                ?>

                <!-- paypal plan id -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
			            <?php
			            $mb->the_field( 'tds_payment_plan_id' );
			            $tds_payment_plan_id = ( $mb->have_value() ) ? $mb->get_the_value() : "";
			            ?>
                        <span class="td-page-o-custom-label">ID [autocomplete]</span>
                        <input class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>" readonly
                               value="<?php echo $tds_payment_plan_id ?>" placeholder="P-7LL72272J2390814NMEEZB (ex.)"/>
                    </div>
                </div>

                <?php
            }
        ?>

        <!-- paypal plan status -->
        <div class="td-meta-box-row td-meta-box-row-border">
            <div class="tds-locker-input">
                <?php
                    $mb->the_field('tds_paypal_plan_status');
                    $tds_paypal_plan_status = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                ?>
                <span class="td-page-o-custom-label">Status</span>
                <select class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>">
                    <option value="ACTIVE" <?php echo 'ACTIVE' === $tds_paypal_plan_status ? 'selected' : '' ?>>ACTIVE</option>
                    <option value="INACTIVE" <?php echo 'INACTIVE' === $tds_paypal_plan_status ? 'selected' : ''?>>INACTIVE</option>
                </select>
                <label class="tds-label-check-status"></label>
            </div>
        </div>

        <!-- paypal plan product id -->
        <div class="td-meta-box-row td-meta-box-row-border">
            <div class="tds-locker-input">
                <?php
                    $mb->the_field('tds_paypal_plan_product');
                    $tds_paypal_plan_product = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                ?>
                <span class="td-page-o-custom-label">Plan</span>

                <?php

                    $tds_products = get_posts( array(
                        'post_type'   => 'tds_product',
                        //'numberposts' => 1
                    ) );

                    if (empty($tds_paypal_plan_product)) {
	                    ?>

                        <select class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>">

		                    <?php

		                    foreach ( $tds_products as $tds_product ) {
			                    ?>
                                <option value="<?php echo $tds_product->ID ?>" <?php echo $tds_product->ID == $tds_paypal_plan_product ? 'selected' : '' ?>><?php echo $tds_product->post_name ?></option>
			                    <?php
		                    }

		                    ?>

                        </select>
	                    <?php

                    } else {

                        $td_postmeta = get_post_meta($tds_paypal_plan_product, 'td_post_theme_settings', true);
                        if (!empty($td_postmeta) && is_array($td_postmeta) && ! empty($td_postmeta['tds_payment_product_id'])) {
                            $tds_payment_product_id = $td_postmeta['tds_payment_product_id'];
                        }

                        ?>
                            <input type="hidden" name="<?php $mb->the_name(); ?>" value="<?php echo $tds_paypal_plan_product ?>">
                            <input type="text" readonly value="<?php echo '[Paypal ID: ' . $tds_payment_product_id . '] ' . $tds_products[0]->post_name ?>">
                        <?php
                    }
                ?>
                <label class="tds-label-check-product"></label>
            </div>
        </div>

        <!-- paypal plan price -->
        <div class="td-meta-box-row td-meta-box-row-border">
            <div class="tds-locker-input">
                <?php
                    $mb->the_field('tds_price');
                    $tds_price = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                ?>
                <span class="td-page-o-custom-label">Price</span>
                <input type="text" class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>" value="<?php echo $tds_price ?>">
            </div>
        </div>

        <!-- paypal plan price -->
        <div class="td-meta-box-row td-meta-box-row-border">
            <div class="tds-locker-input">
                <?php
                    $mb->the_field('tds_months_in_cycle');
                    $tds_months_in_cycle = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                ?>
                <span class="td-page-o-custom-label">Status</span>
                <select class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>">
                    <option value="1" <?php echo '1' == $tds_months_in_cycle ? 'selected' : '' ?>>1 Month</option>
                    <option value="12" <?php echo '12' === $tds_months_in_cycle ? 'selected' : ''?>>12 Months</option>
                </select>
            </div>
        </div>

        <?php
        if (empty($paypal_plan_sync) ) {
            if (!empty($td_post_theme_settings)) {
	            ?>

                <!-- paypal check plan -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
                        <button class="tds-sync-plan">Sync with PayPal</button>
                    </div>
                </div>

                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
                        <textarea class="tds-check-results"></textarea>
                    </div>
                </div>

	            <?php
            }
        } else {
            ?>

            <!-- paypal check plan -->
            <div class="td-meta-box-row td-meta-box-row-border">
                <div class="tds-locker-input">
                    <div style="width:200px">
                        <button class="tds-sync-plan">Sync with PayPal</button>
                        <span class="spinner"></span>
                    </div>
                </div>
                <div class="tds-locker-input">
                    <div style="width:200px">
                        <button class="tds-check-plan">Check with PayPal</button>
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

