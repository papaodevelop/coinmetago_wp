<!-- MOBILE MODULES SETTINGS -->
<div class="td-section-separator">Mobile Theme Modules Settings</div>

<!-- Category label on modules -->
<?php echo td_panel_generator::box_start('Category tag on Modules/Blocks', false); ?>

<div class="td-box-row">
	<div class="td-box-description td-box-full">
		<span class="td-box-title">More information:</span>
		<p>From here you can show or hide the category tag from mobile theme modules.</p>
	</div>
	<div class="td-box-row-margin-bottom"></div>
</div>

<!-- Mobile Module 1 -->
<div class="td-box-row">
	<div class="td-box-description">
		<span class="td-box-title">Mobile Module 1</span>
		<p>Hide or show the category tag</p>
	</div>
	<div class="td-box-control-full">
		<?php
		echo td_panel_generator::checkbox(array(
			'ds' => 'td_option',
			'option_id' => 'tds_category_mobule_mob_1',
			'true_value' => 'yes',
			'false_value' => ''
		));
		?>
	</div>
</div>

<!-- Mobile Module 2 -->
<div class="td-box-row">
	<div class="td-box-description">
		<span class="td-box-title">Mobile Module 2</span>
		<p>Hide or show the category tag</p>
	</div>
	<div class="td-box-control-full">
		<?php
		echo td_panel_generator::checkbox(array(
			'ds' => 'td_option',
			'option_id' => 'tds_category_mobule_mob_2',
			'true_value' => 'yes',
			'false_value' => ''
		));
		?>
	</div>
</div>

<?php echo td_panel_generator::box_end();?>

<?php if( TD_THEME_NAME == 'Newspaper' && defined( 'TD_SUBSCRIPTION' )) { ?>

<!-- Exclusive label on modules -->
<?php echo td_panel_generator::box_start('Exclusive label (Opt-in Builder)', false); ?>

<div class="td-box-row">
	<div class="td-box-description td-box-full">
		<span class="td-box-title">More information:</span>
		<p>From here you can show or hide the exclusive label from mobile theme modules.</p>
	</div>
	<div class="td-box-row-margin-bottom"></div>
</div>


<div class="td-box-row">
	<div class="td-box-description">
		<span class="td-box-title">SHOW EXCLUSIVE (Opt-In Builder)</span>
		<p>Enable or disable exclusive (on blocks and modules)</p>
	</div>
	<div class="td-box-control-full">
		<?php
		echo td_panel_generator::checkbox(array(
			'ds' => 'td_option',
			'option_id' => 'tds_m_show_exclusive',
			'true_value' => '',
			'false_value' => 'hide'
		));
		?>
	</div>
</div>


<?php echo td_panel_generator::box_end();?>

<?php } ?>
