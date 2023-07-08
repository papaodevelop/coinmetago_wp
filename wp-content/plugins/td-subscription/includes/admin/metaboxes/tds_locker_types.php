<?php
    global $post;

    $tds_locker_types_meta = get_post_meta( $post->ID, 'tds_locker_types', true );
    $tds_locker_types = empty( $tds_locker_types_meta ) ? array() : $tds_locker_types_meta;

    $setting_disabled_class = '';
    if( !empty( $tds_locker_types['tds_payable'] ) && $tds_locker_types['tds_payable'] != 'paid_subscription' ) {
        $setting_disabled_class = 'td-op-disabled';
    }
?>

<div class="td-meta-box-inside">

    <div class="td-page-option-panel td-post-option-general td-page-option-panel-active">

        <div class="td-op-section">
            <div class="td-op-meta-box-row">
                <div class="td-meta-box-col">
                    <!-- locker type -->
                    <div class="td-meta-box-row">
                        <?php
                        $mb->the_field('tds_payable');
                        $tds_payable = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                        ?>

                        <span class="td-page-o-custom-label">Locker Type:</span>
                        <select id="tds-locker-type" name="<?php $mb->the_name(); ?>">
                            <?php

                            foreach ( [ 'Email' => '', 'Subscription' => 'paid_subscription'] as $op_name => $op_val ) {
                                ?>
                                <option value="<?php echo $op_val ?>" <?php $mb->the_select_state( $op_val ); ?>><?php echo $op_name; ?></option>
                                <?php
                            }

                            ?>
                        </select>
                        <span class="td-page-o-info">Collect Leads choosing the "<b>Email</b>" type or paid members using the "<b>Subscription</b>" option.</span>
                    </div>

                    <div class="tds-paid-subscription-settings td-op-to-disable <?php echo $setting_disabled_class ?>">
                        <!-- locker plans switcher page -->
                        <div class="td-meta-box-row">
                            <?php
                            $mb->the_field('tds_paid_subs_page_id');
                            $tds_paid_subs_page_id = ( $mb->have_value() ) ? $mb->get_the_value() : "";

                            $links = '';

                            if (!empty($tds_paid_subs_page_id) && get_post($tds_paid_subs_page_id) instanceof WP_Post) {
                                $links = '<a href="' . get_permalink($tds_paid_subs_page_id) . '" target="_blank">View</a>';
                            }

                            ?>

                            <span class="td-page-o-custom-label">Plans Page ID: <?php echo $links ?></span>
                            <input class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>" value="<?php echo $tds_paid_subs_page_id ?>">
                            <span class="td-page-o-info">Please type the ID of the Plan Page you want to use for this locker.</span>
                        </div>

                        <!-- locker title -->
                        <div class="td-meta-box-row">
                            <?php
                            $mb->the_field('tds_paid_subs_plan_ids');
                            $tds_paid_subs_plan_ids = ( $mb->have_value() ) ? $mb->get_the_value() : [];

                            global $wpdb;

                            $plans = [];
                            $results = $wpdb->get_results("SELECT * FROM tds_plans", ARRAY_A);

                            if ( null !== $results) {
                                $plans = $results;
                            }

                            if( !empty($plans) ) {
                                ?>
                                <span class="td-page-o-custom-label">Plans:</span>

                                <div class="td-op-checkbox-group">
                                    <?php
                                    foreach ( $plans as $plan ) {
                                        ?>

                                        <div class="td-op-checkbox-wrap">
                                            <label class="td-op-checkbox-label">
                                                <input class="td-op-checkbox-input" type="checkbox" value="<?php echo $plan['id'] ?>" <?php echo in_array($plan['id'], $tds_paid_subs_plan_ids) ? 'checked' : ''  ?> name="<?php $mb->the_name() ?>[]">

                                                <span class="td-op-checkbox-check"></span>
                                                <span class="td-op-checkbox-title"><?php echo $plan['name'] . ' #' . $plan['id'] ?></span>
                                            </label>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
                                <span class="td-page-o-info">Select which plans will unlock this locker.</span>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-- locker type -->
                    <div class="td-meta-box-row">
                        <?php
                        global $post;
                        $mb->the_field('tds_locker_slug');
                        $tds_locker_slug = ( $mb->have_value() ) ? $mb->get_the_value() : '';
                        ?>

                        <span class="td-page-o-custom-label">Custom Locker Slug:</span>
                        <input class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>" value="<?php echo $tds_locker_slug ?>">
                        <span class="td-page-o-info">The content lockers can be identified by ID or a custom slug. If you delete one locker, you can use this custom slug to easily reassign it.</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
