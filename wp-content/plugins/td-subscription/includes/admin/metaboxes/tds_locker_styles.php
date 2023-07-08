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
        <!--<pre>-->
        <?php
            //print_r( get_post_meta( $mb->current_post_id, 'tds_locker_styles', true ) );
            //print_r( td_fonts::get_block_font_params() );
        ?>
        <!--</pre>-->

        <?php ?>
        <div class="td-op-section">
            <div class="td-op-meta-box-row">
                <!-- locker colors -->
                <div class="td-meta-box-col td-meta-box-col-style-colors">
                    <div class="td-meta-box-col-title">Colors</div>

                    <!-- locker background color -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-color">
                            <?php
                            $mb->the_field('tds_bg_color');
                            ?>
                            <span class="td-page-o-custom-label">Locker background color</span>
                            <input id="tds-bg-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker border -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-input">
                            <?php
                                $mb->the_field('all_tds_border');
                                $tds_border_val = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                            ?>
                            <span class="td-page-o-custom-label">Locker border</span>
                            <input id="all-tds-border" class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>" value="<?php echo $tds_border_val; ?>" placeholder="0"/>
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                                $mb->the_field('all_tds_border_color');
                            ?>
                            <span class="td-page-o-custom-label">Locker border color</span>
                            <input id="all-tds-border-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker shadow -->
                    <div class="td-meta-box-row td-meta-box-row-border">
                        <div class="tds-locker-input">
                            <?php
                                $mb->the_field('all_tds_shadow');
                                $tds_shadow_val = ( $mb->have_value() ) ? $mb->get_the_value() : "";
                            ?>
                            <span class="td-page-o-custom-label">Locker shadow</span>
                            <input id="all-tds-shadow" class="td-input-text-post-settings" type="text" name="<?php $mb->the_name(); ?>" value="<?php echo $tds_shadow_val; ?>" placeholder="0"/>
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                                $mb->the_field('all_tds_shadow_color');
                            ?>
                            <span class="td-page-o-custom-label">Locker shadow color</span>
                            <input id="all-tds-shadow-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker title color -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-color">
                            <?php
                                $mb->the_field('tds_title_color');
                            ?>
                            <span class="td-page-o-custom-label">Locker title color</span>
                            <input id="tds-title-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker message color -->
                    <div class="td-meta-box-row td-meta-box-row-border">
                        <div class="tds-locker-color">
                            <?php
                                $mb->the_field('tds_message_color');
                            ?>
                            <span class="td-page-o-custom-label">Locker message color</span>
                            <input id="tds-message-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker input text color -->
                    <div class="td-meta-box-row td-op-to-disable <?php echo $setting_disabled_class ?>">
                        <div class="tds-locker-color-a">
                            <?php
                                $mb->the_field('tds_input_color');
                            ?>
                            <span class="td-page-o-custom-label">Input text color</span>
                            <input id="tds-input-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                                $mb->the_field('tds_input_color_f');
                            ?>
                            <span class="td-page-o-custom-label">Input text focus color</span>
                            <input id="tds-input-color-h" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker input bg color -->
                    <div class="td-meta-box-row td-op-to-disable <?php echo $setting_disabled_class ?>">
                        <div class="tds-locker-color-a">
                            <?php
                                $mb->the_field('tds_input_bg_color');
                            ?>
                            <span class="td-page-o-custom-label">Input background color</span>
                            <input id="tds-input-bg-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                                $mb->the_field('tds_input_bg_color_f');
                            ?>
                            <span class="td-page-o-custom-label">Input background focus color</span>
                            <input id="tds-input-bg-color-h" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker input border color -->
                    <div class="td-meta-box-row td-meta-box-row-border td-op-to-disable <?php echo $setting_disabled_class ?>">
                        <div class="tds-locker-color-a">
                            <?php
                                $mb->the_field('tds_input_border_color');
                            ?>
                            <span class="td-page-o-custom-label">Input border color</span>
                            <input id="tds-input-border-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                                $mb->the_field('tds_input_border_color_f');
                            ?>
                            <span class="td-page-o-custom-label">Input border focus color</span>
                            <input id="tds-input-border-color-h" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker submit button text color -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-color-a">
                            <?php
                                $mb->the_field('tds_submit_btn_text_color');
                            ?>
                            <span class="td-page-o-custom-label">Button text color</span>
                            <input id="tds-submit-btn-text-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                                $mb->the_field('tds_submit_btn_text_color_h');
                            ?>
                            <span class="td-page-o-custom-label">Button text hover color</span>
                            <input id="tds-submit-btn-text-color-h" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker submit button bg color -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-color-a">
                            <?php
                                $mb->the_field('tds_submit_btn_bg_color');
                            ?>
                            <span class="td-page-o-custom-label">Button background color</span>
                            <input id="tds-submit-btn-bg-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                                $mb->the_field('tds_submit_btn_bg_color_h');
                            ?>
                            <span class="td-page-o-custom-label">Button background hover color</span>
                            <input id="tds-submit-btn-bg-color-h" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker after button text color -->
                    <div class="td-meta-box-row td-meta-box-row-border">
                        <div class="tds-locker-color">
                            <?php
                                $mb->the_field('tds_after_btn_text_color');
                            ?>
                            <span class="td-page-o-custom-label">After button text color</span>
                            <input id="tds-after-btn-text-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker privacy policy checkbox square color -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-color">
                            <?php
                                $mb->the_field('tds_pp_checked_color');
                            ?>
                            <span class="td-page-o-custom-label">Checkbox square color</span>
                            <input id="tds-pp-checked-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker privacy policy checkbox bg color -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-color-a">
                            <?php
                                $mb->the_field('tds_pp_check_bg');
                            ?>
                            <span class="td-page-o-custom-label">Checkbox background color</span>
                            <input id="tds-pp-check-bg" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                                $mb->the_field('tds_pp_check_bg_f');
                            ?>
                            <span class="td-page-o-custom-label">Checkbox background hover color</span>
                            <input id="tds-pp-msg-check-bg-f" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker privacy policy checkbox border color -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-color-a">
                            <?php
                                $mb->the_field('tds_pp_check_border_color');
                            ?>
                            <span class="td-page-o-custom-label">Checkbox border color</span>
                            <input id="tds-pp-check-border-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                                $mb->the_field('tds_pp_check_border_color_f');
                            ?>
                            <span class="td-page-o-custom-label">Checkbox border hover color</span>
                            <input id="tds-pp-msg-check-border-color-f" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker privacy policy message text color -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-color">
                            <?php
                                $mb->the_field('tds_pp_msg_color');
                            ?>
                            <span class="td-page-o-custom-label">Privacy policy text color</span>
                            <input id="tds-pp-msg-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>

                    <!-- locker privacy policy message text color -->
                    <div class="td-meta-box-row">
                        <div class="tds-locker-color-a">
                            <?php
                                $mb->the_field('tds_pp_msg_links_color');
                            ?>
                            <span class="td-page-o-custom-label">Privacy policy links color</span>
                            <input id="tds-pp-msg-links-color" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>

                        <div class="tds-locker-color-b">
                            <?php
                            $mb->the_field('tds_pp_msg_links_color_h');
                            ?>
                            <span class="td-page-o-custom-label">Privacy policy links hover color</span>
                            <input id="tds-pp-msg-links-color-h" class="tds-color-picker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                        </div>
                    </div>
                </div>

                <!-- locker fonts -->
                <div class="td-meta-box-col td-meta-box-col-style-fonts">
                <div class="td-meta-box-col-title">Fonts</div>

                <div class="td-meta-box-row tds-locker-font-header">
                    <div class="tds-locker-font-size" title="Font size"><span></span></div>
                    <div class="tds-locker-font-line-height" title="Line height (Use with px or a number that will be multiplied with the current font-size)"><span></span></div>
                    <div class="tds-locker-font-style" title="Font style"><span></span></div>
                    <div class="tds-locker-font-weight" title="Font weight"><span></span></div>
                    <div class="tds-locker-font-transform" title="Text transform"><span></span></div>
                    <div class="tds-locker-font-spacing" title="Font spacing"><span></span></div>
                </div>

                <?php
                    // locker options that use fonts
                    $font_locker_options = array(
                        'tds_general' => 'General font',
                        'tds_title' => 'Title text',
                        'tds_message' => 'Message text',
                        'tds_input' => 'Input text',
                        'tds_submit_btn_text' => 'Button text',
                        'tds_after_btn_text' => 'After button text',
                        'tds_pp_msg' => 'Privacy policy text',
                    );

                    // font params
                    $font_params = td_fonts::get_block_font_params();

                    foreach ( $font_locker_options as $option_id => $option_name ) {

                        ?>
                        <div class="td-meta-box-row td-meta-box-row-<?php echo $option_id . ' ' . ( ( $option_id == 'tds_input') ? ( 'td-op-to-disable ' . $setting_disabled_class ) : '' ) ?>">
                            <span class="td-page-o-custom-label"><?php echo $option_name ?></span>

                            <?php
                            foreach ( $font_params as $param ) {

                                if ( empty( $param['param_name'] ) )
                                    continue;

                                $param_title_tag = $param['description'];


                                $mb->the_field( $option_id . '_' . $param['param_name'] );

                                if ( strpos( $param['type'], 'textfield-' ) !== false ) {
                                    ?>

                                    <input id="<?php echo 'tds-' . $option_id . '-' . $param['param_name']; ?>"
                                           class="tds-locker-font-input tds-locker-<?php echo str_replace('_', '-', $param['param_name']) ?>"
                                           type="text"
                                           name="<?php $mb->the_name(); ?>"
                                           value="<?php $mb->the_value(); ?>"
                                           placeholder="-"
                                           title="<?php echo $param_title_tag ?>"
                                    />

                                    <?php
                                } elseif ( strpos( $param['type'], 'dropdown-' ) !== false ) {
                                    ?>

                                    <div class="tds-locker-font-dropdown tds-locker-<?php echo str_replace('_', '-', $param['param_name']) ?>">
                                        <select name="<?php $mb->the_name(); ?>" title="<?php echo $param_title_tag ?>">
                                            <?php

                                            foreach ( $param['value'] as $op_name => $op_val ) {
                                                ?>
                                                <option value="<?php echo $op_val ?>" <?php $mb->the_select_state( $op_val ); ?>>
                                                    <?php echo $op_name; ?></option>
                                                <?php
                                            }

                                            ?>
                                        </select>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <?php
                    }
                ?>
            </div>
            </div>
        </div>
    </div>

</div>
