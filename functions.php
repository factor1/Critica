<?php

/**
* Load constants
*/
require __DIR__ . '/inc/constants.php';

/**
*   Load Prelude features
*/
if ( !function_exists( 'prelude_features' ) ) {

    // Register Theme Features
    function prelude_features() {

      // Add theme support for Automatic Feed Links
      add_theme_support( 'automatic-feed-links' );

      // Add theme support for Post Formats
      add_theme_support('post-formats', array('status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside') );

      // Add theme support for Featured Images
      add_theme_support( 'post-thumbnails' );

      // Add theme support for HTML5 Semantic Markup
      add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );

      // Add theme support for document Title tag
      add_theme_support( 'title-tag' );

      // Add theme support for Yoast breadcrumbs
      add_theme_support('yoast-seo-breadcrumbs');

      // Clean up the default WordPress head section
      remove_action( 'wp_head', 'rsd_link' );
      remove_action( 'wp_head', 'wlwmanifest_link' );
      remove_action( 'wp_head', 'wp_generator' );
      remove_action( 'wp_head', 'start_post_rel_link' );
      remove_action( 'wp_head', 'index_rel_link' );
      remove_action( 'wp_head', 'adjacent_posts_rel_link' );
    }
    add_action( 'after_setup_theme', 'prelude_features' );

}

/**
* Load jQuery
*/
if ( !is_admin() ) {
    add_action('wp_enqueue_scripts',function() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'), false);
        wp_enqueue_script('jquery');
    });
}

/**
* Defer jQuery Parsing using the HTML5 defer property
*/
if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.min.js' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}

/**
* Link to all theme CSS files.
*/
function prelude_theme_scripts() {
    wp_enqueue_style('prelude-css', get_template_directory_uri() . '/assets/css/theme.min.css' );
    wp_enqueue_script('prelude-js', get_template_directory_uri() . '/assets/js/theme.min.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'prelude_theme_scripts' );


/**
 * Fix Gravity Form Tabindex Conflicts
 * http://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
 */
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

/**
 * A function to grab fields from Advanced Custom Fields.
 *
 * Use case: Using ACF you need to link to either an internal page in the site or an external URL
 *
 * @param string         $field1  The name of the first field to check for
 * @param string         $field2  The name of the second field to check for
 * @param string|integer $page_id Alternate page ID, if the fields being checked are from a different page
 */
function get_acf_link( $field1, $field2, $page_id = null ) {
    $field1 = get_field( $field1, $page_id ) ? get_field( $field1, $page_id ) : get_sub_field( $field1, $page_id );
    $field2 = get_field( $field2, $page_id ) ? get_field( $field2, $page_id ) : get_sub_field( $field2, $page_id );

    if ( $field1 ) {
        return esc_url( $field1 );
    }

    if ( $field2 ) {
        return esc_url( $field2 );
    }
}

/**
 * Debug some piece of code.
 * Remove the die; if you want the rest of the code on the page to execute
 *
 * @param $code The code that you want to check.
 */
function debug( $code ) {
    printf( '<pre>%s</pre>', print_r( $code, true ) );
    die;
}


/**
* Load autoloader
*/
require __DIR__ . '/inc/autoload.php';

/**
* Load menus
*/
require __DIR__. '/inc/menus.php';

/**
* Load custom post types
*/
require __DIR__ . '/inc/custom-post-types.php';

/**
* Load widgets
*/
require __DIR__ . '/inc/widgets.php';

/**
* Load tweaks
*/
require __DIR__ . '/inc/tweaks.php';

/**
* Load thumbnail support and sizes
*/
require __DIR__. '/inc/thumbnails.php';

/**
* Load shortcodes
*/
require __DIR__ . '/inc/shortcodes.php';

/**
* Load ACF options
*/
require __DIR__ . '/inc/acf.php';

/**
* Load added post functions
*/
require __DIR__ . '/inc/posts.php';

/**
* Load added formatting functions
*/
require __DIR__ . '/inc/formatting.php';
