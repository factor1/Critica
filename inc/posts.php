<?php

/*-----------------------------------------------------------------------------
  Post functions
-----------------------------------------------------------------------------*/

/**
*   Returns the excerpt for a given post pulling from the content
*   if no excerpt exists.
*
*   @param WP_Post|integer
*
*   @return string
*/
function get_post_excerpt($p) {

    if(is_int($p)) {
        $p = get_post($p);
    }

    if(!is_object($p) || !($p instanceof WP_Post)) {
        return '';
    }

    $text = $raw_excerpt = $p->post_excerpt;

    if(!$text) {
        $text = $p->post_content;
        $text = strip_shortcodes( $text );
        $text = str_replace(']]>', ']]&gt;', apply_filters( 'the_content', $text ));
        $excerpt_length = apply_filters( 'excerpt_length', 55 );
        $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]', $p->ID );
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }

    return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}