<!-- Smartlist -->
<?php echo td_panel_generator::box_start('Smartlists', false); ?>

<div class="td-box-row">
	<div class="td-box-description td-box-full">
		<span class="td-box-title">More information:</span>
		<p> From here you can choose the smartlist template used on the Mobile Theme. </p>
		<p> There are two smartlist templates available: </p>
		<ul>
		<li> Smartlist 1 -  Displays the content one by one. It comes with next/prev pagination buttons - default template; </li>
		<li> Smartlist 2 - Displays the content in a single page, without pagination; </li>
		</ul>
	</div>
	<div class="td-box-row-margin-bottom"></div>
</div>


<div class="td-box-row">
	<div class="td-box-description">
		<span class="td-box-title">Use Smartlist 2</span>
		<p>Enable this feature to use the Smartlist 2 on mobile.</p>
	</div>
	<div class="td-box-control-full">
		<?php
		echo td_panel_generator::checkbox(array(
			'ds' => 'td_option',
			'option_id' => 'tdm_smartlist_2',
			'true_value' => 'yes',
			'false_value' => ''
		));
		?>
	</div>
</div>

<?php echo td_panel_generator::box_end();?>

