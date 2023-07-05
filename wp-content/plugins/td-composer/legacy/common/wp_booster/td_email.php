<?php


class td_email {

    /* ---------
    ---- Email template
    --------- */
    static function email_template( $title = '', $content = '', $custom_logo = '', $footer_text = '', $content_style = true, $enable_header = true, $enable_footer = true ) {

        $message = '';


        /* --
        -- Assemble the header
        -- */
        $header = '';

        $logo_img = '';
        if( $enable_header ) {
            if( !empty( $custom_logo ) ) {
                $logo_img = $custom_logo;
            } else {
                $theme_panel_logo_img = td_util::get_option('tds_logo_upload');

                if( !empty( $theme_panel_logo_img ) ) {
                    $logo_img = $theme_panel_logo_img;
                }
            }

            if( !empty( $logo_img ) ) {
                $header =
                    '<tr style="padding: 0; vertical-align: top; text-align: left;">
                        <td align="center" valign="middle" style="word-wrap: break-word; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; margin: 0; Margin: 0; font-size: 14px; text-align: center; padding: 0 40px 30px 40px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;">
                            <img src="' . $logo_img . '" style="outline: none; text-decoration: none; clear: both; -ms-interpolation-mode: bicubic; display: inline-block !important; max-width: 250px; height: auto;"/>
                        </td>
                    </tr>';
            }
        }


        /* --
        -- Assemble the footer
        -- */
        $footer = '';
        if( $enable_footer && !empty( $footer_text ) ) {
            $footer =
                '<tr style="padding: 0; vertical-align: top; text-align: left;">
                    <td align="center" valign="middle" style="word-wrap: break-word; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; margin: 0; Margin: 0; padding: 20px 40px 0 40px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;">
                        <p style="padding: 0; margin: 0; Margin: 0; font-size: 13px; text-align: center;">
                            ' . $footer_text . '
                        </p>
                    </td>
                </tr>';
        }


        /* --
        -- Apply style formatting on the content
        -- */
        if( $content_style ) {
            $content = self::apply_style_formatting($content);
        }


        /* --
        -- Assemble the final message
        -- */
        $message .=
            '<!doctype html>
            <html lang="en">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width">
                    <title>' . $title . '</title>
                </head>
            
                <body style="height: 100% !important; width: 100% !important; min-width: 100%; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; -webkit-font-smoothing: antialiased !important; -moz-osx-font-smoothing: grayscale !important; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #1d2327; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen-Sans, Ubuntu, Cantarell, \'Helvetica Neue\', sans-serif; font-weight: normal; padding: 0 20px; margin: 0; Margin: 0; font-size: 15px; mso-line-height-rule: exactly; line-height: 160%; background-color: #f7f7f7; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" style="border-collapse: collapse; border-spacing: 0; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100% height: 100% !important; width: 100% !important; min-width: 100%; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; background-color: #f7f7f7; padding: 0; margin: 0; Margin: 0; text-align: left; word-break: break-word;">
                        <tr style="padding: 0; vertical-align: top; text-align: left;">
                            <td align="center" valign="top" style="word-wrap: break-word; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding: 0; margin: 0; Margin: 0;">
                                <!-- Container -->
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; padding: 0; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; max-width: 600px; margin: 30px auto 30px auto; Margin: 30px auto 30px auto; text-align: inherit;">
                                    <!-- Header -->
                                    ' . $header . '
                                    
                                    <!-- Content -->
                                    <tr style="padding: 0; vertical-align: top; text-align: left;">
                                        <td align="left" valign="top" style="word-wrap: break-word; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; margin: 0; Margin: 0; text-align: left; background-color: #ffffff; padding: 45px 40px 50px 40px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.12); border-radius: 3px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                            ' . $content . '
                                        </td>
                                    </tr>

                                    <!-- Footer -->
                                    ' . $footer . '
                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>';


        return $message;

    }




    /* ---------
    ---- Function used to send an email
    --------- */
    static function send_mail( $to, $subject, $message ) {

        return wp_mail(
            $to,
            $subject,
            $message,
            array('Content-Type: text/html; charset=UTF-8', 'From: ' . self::get_email_from_name(). ' <' . self::get_email_from_email() . '>')
        );

    }




    /* ---------
    ---- Function used to get the email from name
    --------- */
    static function get_email_from_name() {

        return wp_specialchars_decode( get_bloginfo('name'), ENT_QUOTES );

    }




    /* ---------
    ---- Function used to get the email from email
    --------- */
    static function get_email_from_email() {

        return get_bloginfo('admin_email');

    }




    /* ---------
    ---- Function used to get the email footer text
    --------- */
    static function get_email_footer_text() {

        return '&copy ' . self::get_email_from_name();

    }




    /* ---------
    ---- Internal function used to apply style formatting on
    ---- email content
    --------- */
    private static function apply_style_formatting( $content ) {

        $search = array();
        $replace = array();


        /* --
        -- Appy styles to headings
        -- */
        preg_match_all('/<h([0-9])(.*)>/U', $content, $headings_matches, PREG_PATTERN_ORDER);
        if (!empty($headings_matches) and is_array($headings_matches)) {
            foreach ($headings_matches[0] as $index => $heading_match) {
                $search[] = $heading_match;
                $styles = 'font-weight: 500; padding: 0; line-height: 120%; margin: 0 0 30px 0; Margin: 0 0 30px 0;';

                switch( $headings_matches[1][$index] ) {
                    case '1':
                        $styles .= 'font-size:30px;';
                        break;
                    case '2':
                        $styles .= 'font-size:25px;';
                        break;
                    case '3':
                        $styles .= 'font-size:20px;';
                        break;
                    case '4':
                        $styles .= 'font-size:18px;';
                        break;
                    case '5':
                    case '6':
                        $styles .= 'font-size:16px;';
                        break;
                }

                if( strpos($headings_matches[2][$index], 'style') === false ) {
                    $replace[] = str_replace('<h' . $headings_matches[1][$index], '<h' . $headings_matches[1][$index] . ' style="' . $styles . '"', $heading_match);
                } else {
                    $replace[] = str_replace('style="', 'style="' . $styles, $heading_match);
                }
            }
        }


        /* --
        -- Apply styles to paragraphs
        -- */
        preg_match_all('/<p(.*)>/U', $content, $par_matches, PREG_PATTERN_ORDER);
        if (!empty($par_matches) and is_array($par_matches)) {
            foreach ($par_matches[0] as $index => $par_match) {
                $search[] = $par_match;
                $styles = 'padding: 0; margin: 0 0 20px 0; Margin: 0 0 20px 0;';

                if( strpos($par_matches[1][$index], 'style') === false ) {
                    $replace[] = str_replace('<p', '<p style="' . $styles . '"', $par_match);
                } else {
                    $replace[] = str_replace('style="', 'style="' . $styles, $par_match);
                }
            }
        }


        /* --
        -- Apply styles to links
        -- */
        preg_match_all('/<a(.*)>/U', $content, $url_matches, PREG_PATTERN_ORDER);
        if (!empty($url_matches) and is_array($url_matches)) {
            foreach ($url_matches[0] as $index => $url_match) {
                $search[] = $url_match;
                $styles = 'color: #0489fc; text-decoration: none;';

                if( strpos($url_matches[1][$index], 'style') === false ) {
                    $replace[] = str_replace('<a', '<a style="' . $styles . '"', $url_match);
                } else {
                    $replace[] = str_replace('style="', 'style="' . $styles, $url_match);
                }
            }
        }


        /* --
        -- Apply styles to lists
        -- */
        preg_match_all('/<ul(.*)>/U', $content, $list_matches, PREG_PATTERN_ORDER);
        if (!empty($list_matches) and is_array($list_matches)) {
            foreach ($list_matches[0] as $index => $list_match) {
                $search[] = $list_match;
                $styles = ' margin: 0 0 25px 0; Margin: 0 0 25px 0;';

                if( strpos($list_matches[1][$index], 'style') === false ) {
                    $replace[] = str_replace('<ul', '<ul style="' . $styles . '"', $list_match);
                } else {
                    $replace[] = str_replace('style="', 'style="' . $styles, $list_match);
                }
            }
        }


        /* --
        -- Add the extra styles for the matched html elements in the content
        -- */
        if( !empty($search) && !empty($replace) && count($search) == count($replace) ) {
            $content = str_replace($search, $replace, $content);
        }


        return $content;

    }

}