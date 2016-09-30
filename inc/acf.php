<?php
/*-----------------------------------------------------------------------------
ACF Options
-----------------------------------------------------------------------------*/

if( !function_exists('acf_add_options_page') ) {
    return;
}

// Add theme options page
acf_add_options_page([
    'page_title' => 'Theme Options',
    'menu_title' => 'Theme Options',
    'menu_slug' => THEME_OPTIONS_SLUG,
    'capability' => 'manage_options',
    'redirect' => true,
]);

// Add header options page
acf_add_options_sub_page([
    'page_title'    => 'Theme Header',
    'menu_title'    => 'Header',
    'parent_slug'   => THEME_OPTIONS_SLUG,
]);

// Add footer options page
acf_add_options_sub_page([
    'page_title'    => 'Theme Footer',
    'menu_title'    => 'Footer',
    'parent_slug'   => THEME_OPTIONS_SLUG,
]);