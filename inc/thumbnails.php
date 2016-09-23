<?php

/*-----------------------------------------------------------------------------
  Add additional thumbnail sizes
-----------------------------------------------------------------------------*/

if( function_exists('prelude_features') ){
  // Use add_image_size below to add additional thumbnail sizes
}

/*-----------------------------------------------------------------------------
  Thumnail and image functions
-----------------------------------------------------------------------------*/

/**
*   Returns to URL for featured images
*
*   @param string|array $size
*
*   @return string
*/
function get_featured_image_url($size = 'large',$post = null) {

    // No post passed, load the queried object
    if(!$post) {
        $post = get_queried_object();
    }

    // No post or no feature image, bail
    if(!$post || !has_post_thumbnail($post)) {
        return '';
    }

    // Load the image
    $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );

    // Return the image
    return ($image && isset($image[0])) ? strval($image[0]) : '';
}

/**
*   Returns to URL for header logo
*
*   @param string $size
*
*   @return string
*/
function get_theme_header_logo_url($size = 'medium') {
    $logo = get_field('header_logo','option');
    return ($logo && isset($logo['sizes'][$size])) ? $logo['sizes'][$size] : '';
}

/**
*   Returns to URL for footer logo
*
*   @param string $size
*
*   @return string
*/
function get_theme_footer_logo_url($size = 'medium') {
    $logo = get_field('footer_logo','option');
    return ($logo && isset($logo['sizes'][$size])) ? $logo['sizes'][$size] : '';
}

/**
*   Returns to URL for image from image array
*
*   @param array $image
*
*   @return string
*/
function get_theme_image_url_from_array($image, $size = 'large') {
    return ($image && is_array($image) && isset($image['sizes'][$size])) ? $image['sizes'][$size] : '';
}

/**
*   Returns to background image style declaration from image array
*
*   @param array|string $image
*
*   @return string
*/
function get_theme_background_image_style($image,$size = 'large') {
    $url = (is_array($image)) ? get_theme_image_url_from_array($image,$size) : $image;
    return ($url) ? ' style="background-image:url('.esc_attr($url).')"' : '';
}

/**
*   Returns to background color style declaration from field
*
*   @param string $field
*
*   @return string
*/
function get_theme_background_color_style($field) {
    $color = get_field($field);
    return ($color) ? ' style="background-color:'.esc_attr($color).'"' : '';
}

/**
*   Returns to border color style declaration from field
*
*   @param string $field
*
*   @return string
*/
function get_theme_border_color_style($field) {
    $color = get_field($field);
    return ($color) ? ' style="border-color:'.esc_attr($color).'"' : '';
}