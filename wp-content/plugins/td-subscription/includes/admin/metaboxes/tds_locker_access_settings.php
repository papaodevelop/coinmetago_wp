<?php
    global $post;

    $tds_locker_types_meta = get_post_meta( $post->ID, 'tds_locker_types', true );
    $tds_locker_types = empty( $tds_locker_types_meta ) ? array() : $tds_locker_types_meta;

    $setting_disabled_class = '';
    if( !empty( $tds_locker_types['tds_payable'] ) && $tds_locker_types['tds_payable'] == 'paid_subscription' ) {
        $setting_disabled_class = 'td-op-disabled';
    }
?>

<div class="td-meta-box-inside">

	<div class="td-page-option-panel td-post-option-general td-page-option-panel-active">

        <div class="td-op-section">
            <div class="td-op-meta-box-row">
                <div class="td-meta-box-col">
                    <!-- locker access settings -->
                    <div class="td-meta-box-row td-op-to-disable <?php echo $setting_disabled_class ?>">
                        <span class="td-page-o-custom-label">Locker Access Settings:</span>
                        <?php

                            // locker email list id
                            $mb->the_field('tds_locker_email_list');

                            // the default list id
                            $default_list_id = (int) get_option( 'default_term_tds_list' );

                            // default list select state
                            $def_list_select_state = ( $mb->have_value() ) ? '' : ' selected="selected"';

                        ?>
                        <select name="<?php $mb->the_name(); ?>" id="tds-access-settings">
                            <option value="<?php echo $default_list_id; ?>"<?php echo $def_list_select_state; ?>>Default List <!--- id:--> <?php //echo $default_list_id; ?></option>
                            <?php

                            // get tds list taxonomies
                            $tds_lists = get_terms(
                                array(
                                    'taxonomy' => 'tds_list',
                                    'hide_empty' => false,
                                    'exclude' => array( $default_list_id ), // exclude default list
                                )
                            );

                            $tds_lists_wp_error = null;
                            if ( !is_wp_error( $tds_lists ) ) {
                                foreach ( $tds_lists as $list ) {
                                    ?>
                                    <option value="<?php echo $list->term_id; ?>"<?php $mb->the_select_state( $list->term_id ); ?>>
                                        <?php echo $list->name; ?> <!--- id:--> <?php //echo $list->term_id; ?>
                                    </option>
                                    <?php
                                }
                            } else {
                                $tds_lists_wp_error = $tds_lists->get_error_message();
                            }

                            ?>
                        </select>
                        <?php if ( $tds_lists_wp_error ) { ?>
                            <div style="color: orangered;"><?php echo $tds_lists_wp_error; ?></div>
                        <?php } ?>
                        <span class="td-page-o-info">Select the emails(leads) list for which the locker will apply.</span>
                    </div>
                </div>
            </div>
        </div>

	</div>

</div>

