<div class="td-meta-box-inside">

    <?php
    $post_id = get_the_ID();
    $payment_subscription_sync = get_post_meta($post_id, 'payment_subscription_sync', true);
    $td_post_theme_settings = td_util::get_post_meta_array($post_id, 'td_post_theme_settings');
    ?>

    <!-- post option general -->
    <div class="td-page-option-panel td-post-option-general td-page-option-panel-active">

        <?php
            if (empty($payment_subscription_sync) ) {
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

            if (!empty($td_post_theme_settings['tds_payment_subscription_id']) ) {
                ?>

                <!-- payment plan id -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
			            <?php
			            $mb->the_field( 'tds_payment_subscription_id' );
			            $tds_payment_subscription_id = ( $mb->have_value() ) ? $mb->get_the_value() : "";
			            ?>
                        <span class="td-page-o-custom-label">ID [autocomplete]</span>
                        <input class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>" readonly
                               value="<?php echo $tds_payment_subscription_id ?>" placeholder="I-T2TWB0NTSLDR  (ex.)"/>
                    </div>
                </div>

                <?php
            }
        ?>

        <!-- payment plan status -->
        <div class="td-meta-box-row td-meta-box-row-border">
            <div class="tds-locker-input">
                <?php
                    $mb->the_field('tds_payment_subscription_status');
                    $tds_payment_subscription_status = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                ?>
                <span class="td-page-o-custom-label">Status</span>
                <select class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>">
                    <option value="ACTIVE" <?php echo 'ACTIVE' === $tds_payment_subscription_status ? 'selected' : '' ?>>ACTIVE</option>
                    <option value="INACTIVE" <?php echo 'INACTIVE' === $tds_payment_subscription_status ? 'selected' : ''?>>INACTIVE</option>
                </select>
                <label class="tds-label-check-status"></label>
            </div>
        </div>

        <!-- payment plan status -->
        <div class="td-meta-box-row td-meta-box-row-border">
            <div class="tds-locker-input">
                <?php
                    $mb->the_field('tds_payment_plan_id');
                    $tds_payment_plan_id = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                ?>
                <span class="td-page-o-custom-label">Plan</span>
                <select class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>">
                    <option value="">NO PLAN</option>

                    <?php

                    $tds_plans = get_posts(array(
                        'post_type' => 'tds_plan',
                    ));

                    foreach ($tds_plans as $tds_plan) {

                        $payment_plan_id = '';
                        $td_post_theme_settings = td_util::get_post_meta_array($tds_plan->ID, 'td_post_theme_settings');
                        if (!empty($td_post_theme_settings['tds_payment_plan_id']) ) {
                            $payment_plan_id = $td_post_theme_settings['tds_payment_plan_id'];
                        }

                        ?>
                        <option value="<?php echo $payment_plan_id ?>" <?php echo $payment_plan_id == $tds_payment_plan_id ? 'selected' : '' ?>><?php echo $tds_plan->post_name . ' [' . $payment_plan_id . ']' ?></option>
                        <?php
                    }

                    ?>

                </select>
                <label class="tds-label-check-plan"></label>
            </div>
        </div>

        <?php
        if (empty($payment_subscription_sync) ) {
            if (!empty($td_post_theme_settings)) {
	            ?>

                <!-- payment check plan -->
                <div class="td-meta-box-row td-meta-box-row-border">
                    <div class="tds-locker-input">
                        <button class="tds-sync-subscription">Sync with payment</button>
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
                        <button class="tds-sync-subscription">Sync with payment</button>
                        <span class="spinner"></span>
                    </div>
                </div>
                <div class="tds-locker-input">
                    <div style="width:200px">
                        <button class="tds-check-subscription">Check with payment</button>
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

