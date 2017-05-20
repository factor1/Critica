<?php
  /*-----------------------------------------------------------------------------
    Register Custom Post Types
  -----------------------------------------------------------------------------*/

/*
*   Registers the Topic Post custom post type.
*/

define( TOPIC_POST_TYPE, 'topic_post' );
function register_topic_post_type() {

    register_post_type( TOPIC_POST_TYPE, array(

        'labels' => array(

            'name' => 'Topic Posts',
            'singular_name' => 'Topic Post',
            'add_new_item' => 'Add New Topic Post',
            'edit_item' => 'Edit Topic Post',
            'new_item' => 'New Topic Post',
            'view_item' => 'View Topic Post',
            'view_items' => 'View Topic Post',
            'search_items' => 'Search Topic Posts',
            'all_items' => 'All Topic Posts',
            'archives' => 'Topic Post Archives',
            'attributes' => 'Topic Post Attributes',

        ),

        'public' => true,
        'menu_position' => 5,
        'supports' => array(

            'title',
            'thumbnail',
            'excerpt',
            'revisions',

        ),
        'taxonomies' => array( 'category', 'post_tag' ),
        'rewrite' => array( 'slug' => 'topic', 'with_front' => false ),

    ) );

}

add_action( 'init', 'register_topic_post_type' );


/*
*   Adds these custom posts to the Commentary query.
*/

function add_topic_posts_to_query( $query ) {
  
    if ( !is_admin() && $query->is_main_query() && $query->is_posts_page ) {

        $query->set( 'post_type', array( 'post', TOPIC_POST_TYPE ) );

    }

}

add_action('pre_get_posts','add_topic_posts_to_query');
