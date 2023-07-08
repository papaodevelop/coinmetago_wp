<!-- AMP ADS -->
<?php

$tdm_mobile_amp_disabled = td_util::get_option('tdm_amp') === '' ? 'tdm_settings_disabled' : '';

echo td_panel_generator::box_start('AMP Ads', false, $tdm_mobile_amp_disabled );

?>

<!-- AMP Ads Title -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">AMP Ads Title</span>
        <p>Display a title above each AMP ad. By default, the ad title is not set.</p>
    </div>
    <div class="td-box-control-full">
		<?php
		echo td_panel_generator::input(array(
			'ds' => 'td_option',
			'option_id' => 'tdm_amp_ads_title',
			'placeholder' => '- Advertisement -',
		));
		?>
    </div>
</div>

<!-- AdSense Auto Ads for AMP -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">AdSense Auto Ads for AMP</span>
        <p>AdSense dynamically injects ads into an AMP page to increase your revenue.</p>
    </div>
    <div class="td-box-control-full">
        <?php
            echo td_panel_generator::textarea( array(
                'ds' => 'td_ads',
                'item_id' => 'tdm_amp_auto_ads',
                'option_id' => 'ad_code',
            ));
        ?>
    </div>
</div>

<?php echo td_panel_generator::box_end();?>