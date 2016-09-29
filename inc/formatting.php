<?php
/*-----------------------------------------------------------------------------
  Formatting functions
-----------------------------------------------------------------------------*/

/**
*   Returns sanitized text for use in headings
*
*   @param string
*
*   @return string
*/
function get_sanitized_heading($text) {

    $tags = [
        '<a>', '<b>', '<i>', '<u>', '<strong>', '<em>', '<sup>', '<sub>'
    ];

    $text = strip_tags($text,implode('',$tags));

    $raw = preg_split('#(<[^>]+>)#ismu',$text);

    foreach($raw as $replace) {
        $text = str_replace($replace,esc_html($replace),$text);
    }

    return nl2br($text);
}