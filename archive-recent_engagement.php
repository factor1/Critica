<?php

/*
*   This is the page template for the Recent Engagements post type
*   archive.
*/

//  Redirects to home if there are none
if ( !have_posts() ) {
    wp_safe_redirect( home_url() );
    exit;
}

//  Retrieves the content from the recent-engagement-archive dummy page
$page = get_page_by_path( RECENT_ENGAGEMENT_ARCHIVE_PAGE_SLUG );
$title = $page ? $page->post_title : get_post_type_object( RECENT_ENGAGEMENT_POST_TYPE )->labels->name;
$content = $page ? $page->post_content : '';

//  Retrieves link to Our Services page
$our_services_link = get_permalink( get_page_by_path( 'our-services' ) );

get_header();

?>

<section class="page interior-b recent-engagements">
    
    <section class="flexible-content">
        <div class="row">
            <div class="small-centered small-24 medium-20 large-18 columns">
                <h1><?php echo $title; ?></h1>
                <?php echo $content; ?>
            </div>
        </div>
        <ul class="recent-engagement-list">
            <?php while ( have_posts() ) : the_post(); ?>
                <li class="recent-engagement">
                    <?php
                        $photos = get_field( 'photos' );
                        if ($photos) echo '<img class="engagement-image" src="' . $photos[0]['url'] . '">';
                    ?>
                    <div class="engagement-text">
                        <div class="engagement-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="engagement-date"><?php echo get_the_date(); ?></div>
                        <div class="engagement-excerpt"><?php
                            echo $post->post_excerpt
                            ? $post->post_excerpt . prelude_auto_excerpt_more($post->ID)
                            : wp_trim_excerpt();
                        ?></div>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php get_template_part('parts/pagination'); ?>
        <a href="<?php echo $our_services_link; ?>" class="learn-more-link">Learn more about Critica's services</a>
    </section>

</section>

<?php 

get_footer();
