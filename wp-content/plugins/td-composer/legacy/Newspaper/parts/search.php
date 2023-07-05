<div class="td-search-background" style="visibility:hidden"></div>
<div class="td-search-wrap-mob" style="visibility:hidden">
	<div class="td-drop-down-search">
		<form method="get" class="td-search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
			<!-- close button -->
			<div class="td-search-close">
				<span><i class="td-icon-close-mobile"></i></span>
			</div>
			<div role="search" class="td-search-input">
				<span><?php _etd('Search', TD_THEME_NAME)?></span>
				<input id="td-header-search-mob" type="text" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
			</div>
		</form>
		<div id="td-aj-search-mob" class="td-ajax-search-flex"></div>
	</div>
</div>