<?php
/*-----------------------------------------------------------------------------
Custom Theme Tweaks
-----------------------------------------------------------------------------*/
// Set the maximum content width for the theme
function prelude_content_width() {
    $GLOBALS[ 'content_width' ] = apply_filters( 'prelude_content_width', 1200 );
}
add_action( 'after_setup_theme', 'prelude_content_width', 0 );

// Add page excerpts
function prelude_page_excerpt() {
    add_post_type_support( 'page', array('excerpt') );
}
add_action( 'init', 'prelude_page_excerpt' );

// Customize the default read more link
function prelude_continue_reading_link() {
    return ' <a href="' . get_permalink() . '">' .
     __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_SLUG ) .
     '</a>';
}

// Customize the default ellipsis (...)
function prelude_auto_excerpt_more( $more ) {
    return '&hellip;' . prelude_continue_reading_link();
}
add_filter( 'excerpt_more', 'prelude_auto_excerpt_more' );

// Remove the default gallery styling
function prelude_remove_gallery_css( $css ) {
    return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'prelude_remove_gallery_css' );

// Remove the default recent comments styling
function prelude_remove_recent_comments_style() {
    global $wp_widget_factory;

    if(!isset($wp_widget_factory->widgets[ 'WP_Widget_Recent_Comments' ])) {
      return;
    }

    remove_action(
      'wp_head', array(
        $wp_widget_factory->widgets[ 'WP_Widget_Recent_Comments' ],
        'recent_comments_style'
      )
    );
}
add_action( 'widgets_init', 'prelude_remove_recent_comments_style' );

// Ensure only admin users receive update notifications
add_action('plugins_loaded',function() {
    if ( !current_user_can( 'update_plugins' ) ) {
        add_action('init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2);
        add_filter('pre_option_update_core', create_function( '$a', 'return null;' ) );
    }
});

// Customize which dashboard widgets show
function prelude_remove_dashboard_boxes() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'core' ); // Right Now Overview Box
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core' ); // Incoming Links Box
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core' ); // Quick Press Box
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' ); // Plugins Box
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core' ); // Recent Drafts Box
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core' ); // Recent Comments
    remove_meta_box('dashboard_primary', 'dashboard', 'core' ); // WordPress Development Blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'core' ); // Other WordPress News
}
add_action( 'admin_menu', 'prelude_remove_dashboard_boxes' );

// Remove meta boxes from default posts screen
function prelude_remove_default_post_metaboxes() {
    remove_meta_box( 'postcustom', 'post', 'normal' ); // Custom Fields Metabox
    //remove_meta_box( 'postexcerpt', 'post', 'normal' ); // Excerpt Metabox
    //remove_meta_box( 'commentstatusdiv', 'post', 'normal' ); // Comments Metabox
    remove_meta_box( 'trackbacksdiv', 'post', 'normal' ); // Talkback Metabox
    remove_meta_box( 'authordiv', 'post', 'normal' ); // Author Metabox
}
add_action( 'admin_menu', 'prelude_remove_default_post_metaboxes' );

// Remove meta boxes from default pages screen
function prelude_remove_default_page_metaboxes() {
    remove_meta_box( 'postcustom', 'page', 'normal' ); // Custom Fields Metabox
    //remove_meta_box('commentstatusdiv', 'page', 'normal' ); // Discussion Metabox
    remove_meta_box( 'authordiv', 'page', 'normal' ); // Author Metabox
}
add_action( 'admin_menu', 'prelude_remove_default_page_metaboxes' );

// Stop automatically hyper-linking images to themselves
$image_set = get_option( 'image_default_link_type' );

if ( !$image_set == 'none' ) {
    update_option( 'image_default_link_type', 'none' );
}

// Customize the Yoast SEO columns
add_filter( 'wpseo_use_page_analysis', '__return_false' );

// Filters for Yoast breadcrumbs
add_filter('wpseo_breadcrumb_separator',function($separator) {
    return '<span>/</span>';
},10,1);

// Add touch detection class to body
function be_body_classes( $classes ) {
    $classes[] = 'no-touch';
    return $classes;
}
add_filter( 'body_class', 'be_body_classes' );

// Add custom entries on login
add_filter('login_headerurl',function($url) {
  return home_url();
});

add_filter('login_headertitle',function($title) {
  return get_bloginfo('name');
});

add_action('login_enqueue_scripts',function() {
  wp_enqueue_style('prelude-css', get_template_directory_uri() . '/assets/css/theme.min.css' );
});

// Add ACF JS overrides to admin
add_action('admin_enqueue_scripts',function() {
    wp_enqueue_script(
        'theme_acf_overrides_js',
        get_template_directory_uri() . '/assets/js/src/acf_overrides.js',
        ['jquery']
    );
},1);

// Add Google API Key to Footers
function theme_add_maps_api_key() {
    if(!defined('GOOGLE_MAPS_API_KEY') || !GOOGLE_MAPS_API_KEY) {
        return;
    }
    echo '<div data-maps-api-key="'.GOOGLE_MAPS_API_KEY.'"></div>';
}
add_action('wp_footer','theme_add_maps_api_key');
add_action('admin_footer','theme_add_maps_api_key');

// Add Theme Typekit if defined
add_action('wp_head',function() {
    if(!defined('THEME_TYPEKIT') || !THEME_TYPEKIT) {
        return;
    }
    ?>
    <script src="https://use.typekit.net/<?php echo esc_attr(THEME_TYPEKIT); ?>.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <?php
});

// Add localized script for ajax tokens
add_action( 'wp_enqueue_scripts', function() {
    wp_localize_script('prelude-js',THEME_SLUG.'_ajax',[
        'url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( THEME_SLUG ),
    ]);
} );