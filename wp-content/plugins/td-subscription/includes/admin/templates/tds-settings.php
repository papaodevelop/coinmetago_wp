<?php
require_once TDS_PATH . '/includes/admin/templates/tds-settings-header.php';

?>
<div class="td-admin-wrap about-wrap td-wp-admin-tds-settings">
    <div id="tds-settings">
        <router-view></router-view>

        <div id="tds-es6-not-supported" style="display: none;">
            <div class="tds-es6-wrap">
                <div class="tds-es6-content">
                    <span class="tds-es6-title" style="display: block;font-size: 2em;color: #23282d;margin: .67em 0;">Javascript ES6 not supported</span>
                    <div class="tds-es6-message">This feature is not available on this browser. Please use a browser that supports javascript ES6:</div>
                    <table>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Chrome</td>
                            <td>(v49+)</td>
                        </tr>
                        <tr>
                            <td>Firefox</td>
                            <td>(v57+)</td>
                        </tr>
                        <tr>
                            <td>Safari</td>
                            <td>(v11+)</td>
                        </tr>
                        <tr>
                            <td>IE Edge</td>
                            <td>(v16+)</td>
                        </tr>
                    </table>
                </div>
                <div class="tds-es6-footer">
                    <button class="tds-btn tdb-es6-close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


