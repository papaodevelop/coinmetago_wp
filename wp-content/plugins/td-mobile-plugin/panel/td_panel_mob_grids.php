<!-- GRIDS/LATEST ART SETTINGS -->
<div class="td-section-separator">Grids & Latest Articles Settings</div>

<!-- Grids -->
<?php echo td_panel_generator::box_start('Grids', false); ?>

<!-- Mobile Theme Grids Settings -->
<!-- Front Page Grid: enable/disable -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Show Front Page Grid</span>
        <p>Show or hide the Front Page Grid section</p>
    </div>
    <div class="td-box-control-full">
		<?php
		echo td_panel_generator::checkbox(array(
			'ds' => 'td_option',
			'option_id' => 'tdm_frontpage_grid',
			'true_value' => '',
			'false_value' => 'hide'
		));
		?>
    </div>
</div>

<!-- Category Page Grid: enable/disable -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Show Category Page Grid</span>
        <p>Show or hide the Category Page Grid section</p>
    </div>
    <div class="td-box-control-full">
		<?php
		echo td_panel_generator::checkbox(array(
			'ds' => 'td_option',
			'option_id' => 'tdm_category_grid',
			'true_value' => '',
			'false_value' => 'hide'
		));
		?>
    </div>
</div>

<!-- Grids posts limit -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Number Of Posts</span>
        <p>Number of posts to display.</p>
    </div>
    <div class="td-box-control-full">
		<?php
		echo td_panel_generator::dropdown(array(
			'ds' => 'td_option',
			'option_id' => 'tdm_grids_posts_limit',
			'values' => array(
				array('text' => '1' , 'val' => 1),
				array('text' => '2' , 'val' => 2),
				array('text' => '3' , 'val' => ''),
				array('text' => '4' , 'val' => 4),
				array('text' => '5' , 'val' => 5),
				array('text' => '6' , 'val' => 6)
			)
		));
		?>
    </div>
</div>

<!-- Front Page Grid category filter -->
<div class="td-box-row">
	<div class="td-box-description">
		<span class="td-box-title">Front Page Grid Category Filter</span>
		<p>This option sets a single category filter for the homepage grid articles.</p>
	</div>
	<div class="td-box-control-full">
		<?php

		$categories_array = array();

		foreach ( td_util::get_category2id_array(true, false) as $cat_name => $cat_id ) {
			$categories_array[] = array(
			    'text' => $cat_name , 'val' => $cat_id
            );
        }

//		echo '<pre>';
//		print_r($categories_array);
//		echo '</pre>';
        
		echo td_panel_generator::dropdown(array(
			'ds' => 'td_option',
			'option_id' => 'tdm_frontpage_grid_cat_filter',
			'values' => $categories_array
		));
		?>

	</div>
</div>

<!-- Front Page Grid sorting -->
<div class="td-box-row">
	<div class="td-box-description">
		<span class="td-box-title">Front Page Grid Sort</span>
		<p>This option sets the homepage grid articles sort.</p>
	</div>
	<div class="td-box-control-full">
		<?php
		echo td_panel_generator::dropdown(array(
			'ds' => 'td_option',
			'option_id' => 'tdm_frontpage_grid_sort',
			'values' => array(
				array( 'text' => '- Featured -' , 'val' => '' ),
				array( 'text' => 'Latest' , 'val' => 'latest' ),
				array( 'text' => 'Popular (all time)' , 'val' => 'popular' ),
				array( 'text' => 'Random Posts' , 'val' => 'random_posts' ),
			)
		));
		?>

	</div>
</div>

<?php echo td_panel_generator::box_end();?>

<!-- Latest Articles -->
<?php echo td_panel_generator::box_start('Latest Articles', false); ?>

<!-- Posts Limit -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Limit Posts Number:</span>
        <p>If this field is left empty the posts number limit will be the number from Wordpress Settings -> Reading.</p>
    </div>
    <div class="td-box-control-full">
		<?php
		echo td_panel_generator::input(array(
			'ds' => 'td_option',
			'option_id' => 'tdm_frontpage_latest_articles_posts_limit'
		));
		?>
    </div>
</div>

<!-- Posts Offset -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Offset posts:</span>
        <p>The offset will apply only when the Grid is set to "Latest".</p>
        <?php td_util::tooltip_html('
                             <p>Start the count with an offset. If you set the grid to show 5 posts, you can make the latest articles section to start from the 6\'th post (by using offset 5). </p>
                          ', 'right') ?>


    </div>
    <div class="td-box-control-full">
		<?php
		echo td_panel_generator::input(array(
			'ds' => 'td_option',
			'option_id' => 'tdm_frontpage_latest_articles_posts_offset'
		));
		?>
    </div>
</div>


<?php echo td_panel_generator::box_end();?>

