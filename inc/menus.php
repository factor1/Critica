<?php
/*-----------------------------------------------------------------------------
Register Custom Menus
-----------------------------------------------------------------------------*/

add_action( 'init', function() {

    register_nav_menus([
        'header' => __( 'Header Menu', THEME_SLUG ),
        'mobile'  => __( 'Mobile Menu', THEME_SLUG ),
        //'footer' => __( 'Footer Menu', THEME_SLUG ),
        'social' => __( 'Social Menu', THEME_SLUG ),
    ]);

} );