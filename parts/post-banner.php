<?php
/**
*   Post Banner for Archives
*
*/

// Shouldn't occur but if main query missing, bail
if(!isset($wp_query)) {
    return;
}

$featured = get_posts([
    'post_type' => get_query_var('post_type'),
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC',
    'suppress_filters' => false,
]);

$featured_post = ($featured) ? $featured[0] : null;

if(!$featured_post) {
    return;
}

// Filter the featured from the posts if present
$wp_query->posts = array_filter($wp_query->posts,function($post) use($featured_post) {
    return $post->ID != $featured_post->ID;
});


?>
<section class="hero dark"<?php echo get_theme_background_image_style(get_featured_image_url('full',$featured_post)); ?>>
    <div class="row">
        <div class="large-20 small-centered columns">

            <div>

                <h1 class="<?php echo get_post_type() === TOPIC_POST_TYPE ? 'topic-post' : ''; ?>"><?php echo get_the_title($featured_post); ?></h1>

                <?php if($subtitle=get_field('subtitle',$featured_post->ID)) { ?>
                <h2><?php echo get_sanitized_heading($subtitle); ?></h2>
                <?php } ?>

                <p>
                    <a href="<?php echo esc_attr(get_permalink($featured_post)); ?>" class="button">Read More</a>
                </p>

            </div>

        </div>
    </div>
</section>