<?php

//  Finds the latest Recent Engagement, if it exists

$posts = get_posts( array( 'post_type' => RECENT_ENGAGEMENT_POST_TYPE, 'posts_per_page' => 1 ) );
if ( count( $posts ) > 0 ) {

    $latest_recent_engagement = $posts[0];

    //  Retrieves the post type name and link to archive
    $section_label = get_post_type_object( RECENT_ENGAGEMENT_POST_TYPE )->labels->name;
    $link_label = get_field( 'recent_engagements_link_label' );
    $link_destination = get_field( 'recent_engagements_link_destination' );

    ?>

    <div class="recent-engagements">
        <div class="title-in-border">
            <div class="border-top-left"></div>
            <div class="title"><?php echo $section_label; ?></div>
            <div class="border-top-right"></div>
        </div>
        <div class="latest-recent-engagement">
            <div class="engagement-title"><?php echo $latest_recent_engagement->post_title; ?></div>
            <div class="engagement-excerpt">
                <?php
                    echo $latest_recent_engagement->post_excerpt
                    ? $latest_recent_engagement->post_excerpt . prelude_auto_excerpt_more($post->ID)
                    : wp_trim_excerpt();
                ?>
            </div>
        </div>
        <hr>
        <a href="<?php echo $link_destination; ?>" class="see-more-link"><?php echo $link_label; ?></a>
    </div>

    <?php

}
