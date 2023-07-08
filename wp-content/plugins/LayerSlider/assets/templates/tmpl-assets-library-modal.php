<?php defined( 'LS_ROOT_FILE' ) || exit; ?>
<div class="ls-d-none">

	<lse-b id="lse-assets-inspector">
		<lse-b id="lse-assets-inspector-overlay">
		</lse-b>
		<lse-b id="lse-assets-inspector-content">
			<?= lsGetSVGIcon('times',false,['class' => 'lse-assets-inspector-close']) ?>
			<lse-b id="lse-assets-inspector-inner" class="lse-scrollbar lse-scrollbar-dark">
				<lse-h1 id="lse-assets-inspector-title"></lse-h1>
				<lse-b id="lse-assets-inspector-preview-wrapper" class="lse-hidden-x">
					<lse-b id="lse-assets-inspector-preview"></lse-b>
				</lse-b>
				<lse-grid id="lse-assets-insert-options">
					<lse-row></lse-row>
				</lse-grid>

				<lse-b class="lse-common-modal-style lse-light-theme-alternate">
					<lse-fe-wrapper id="lse-assets-insert-select" class="lse-select">
						<select>
							<option value="layer-image" selected><?= __('New image layer') ?></option>
							<option value="layer-image" data-accepts-svg><?= __('New SVG layer') ?></option>
							<option value="layer-background-image"><?= __('New layer with background') ?></option>
							<option value="slide-image" data-update><?= __('Set as slide background') ?></option>
						</select>
					</lse-fe-wrapper>
					<lse-button id="lse-assets-insert-asset">
						<lse-text class="lse-default-text"><?= __('Apply selected insert method') ?></lse-text>
						<lse-text class="lse-only-slide-image"><?= __('Set slide background') ?></lse-text>
						<lse-text class="lse-only-layer-image"><?= __('Set layer image') ?></lse-text>
						<lse-text class="lse-only-layer-background-image"><?= __('Set layer background') ?></lse-text>
						<lse-text class="lse-only-svg"><?= __('Update SVG') ?></lse-text>
					</lse-button>
				</lse-b>

				<lse-b id="lse-assets-svg-notification" class="lse-notification lse-bg-highlight">
					<?= lsGetSVGIcon('info-circle') ?>
					<lse-text><?= __('This asset type can only be added to SVG layers.') ?></lse-text>
				</lse-b>

				<lse-b id="lse-assets-img-notification" class="lse-notification lse-bg-highlight">
					<?= lsGetSVGIcon('info-circle') ?>
					<lse-text><?= __('This asset type cannot be added to SVG layers.') ?></lse-text>
				</lse-b>
			</lse-b>
		</lse-b>
	</lse-b>

	<div id="tmpl-assets-library-sidebar">
		<div class="kmw-sidebar-title">
			<?= __('Assets Library', 'LayerSlider') ?>
		</div>
		<kmw-navigation class="km-tabs-list" data-disable-auto-rename>

			<kmw-menuitem class="kmw-active">
				<?= lsGetSVGIcon('stars', false, false, 'kmw-icon') ?>
				<kmw-menutext><?= __('Welcome', 'LayerSlider') ?></kmw-menutext>
			</kmw-menuitem>

		</kmw-navigation>
	</div>

	<lse-b id="tmpl-assets-library-modal">

		<kmw-h1 class="kmw-modal-title"><?= __('Welcome', 'LayerSlider') ?></kmw-h1>

		<lse-b class="kmw-modal-toolbar" style="margin-top: 10px;">
			<input type="search" name="s" id="lse-assets-search-input" class="lse-modal-search" placeholder="<?= __('Search objects', 'LayerSlider') ?>">

			<lse-tags-holder>

			</lse-tags-holder>
		</lse-b>

		<lse-b>

			<lse-b id="lse-assets-grid-wrapper">

				<lse-b id="lse-assets-welcome-screen" style="background-image: url(https://layerslider.com/media/assets/welcome/welcome-1.jpg)">
					<lse-b>
						<?= sprintf(__('%sSay goodbye to design roadblocks.%s Elevate your creative vision and easily bring your dream projects to life using our vast collection of professional assets. These pre-made graphics are designed for immediate use and can be quickly integrated into your projects with just a few clicks.', 'LayerSlider'), '<b>', '</b>') ?>
					</lse-b>
				</lse-b>

				<lse-b class="lse-objects-grid">

				</lse-b>

				<div id="lse-asset-not-found" class="lse-not-found ls--not-found">
					<div class="not-found-icon">
						<?= lsGetSVGIcon( 'face-monocle', 'duotone' ) ?>
					</div>
					<div class="not-found-main-text">
						<?= __('Can’t find any assets.', 'LayerSlider') ?>
					</div>
					<div class="not-found-sub-text">
						<?= __('Try a different search term.', 'LayerSlider') ?>
					</div>
					<ls-button class="not-found-button lse-button ls-button">
						<?= __('Reset Search', 'LayerSlider') ?>
					</ls-button>
				</div>

			</lse-b>

		</lse-b>

	</lse-b>

</div>