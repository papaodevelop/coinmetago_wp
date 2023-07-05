<?php

$tdc_wm_custom_svg_icons = td_util::get_option('tdc_wm_custom_svg_icons');
if( !empty( $tdc_wm_custom_svg_icons ) ) {
    $buffy = '';

    foreach ( array_reverse( $tdc_wm_custom_svg_icons ) as $custom_svg_icon_id => $custom_svg_icon_data ) {
        $buffy .= '<span class="td-icon-svg" title="Gradient color options are not available for this icon" data-font_class="td-icon-' . $custom_svg_icon_id . '">';
            $buffy .= base64_decode($custom_svg_icon_data['code']);
        $buffy .= '</span>';
    }

    echo $buffy;
}

