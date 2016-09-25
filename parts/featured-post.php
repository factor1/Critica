<?php
/**
*   Featured Post
*
*/

$heading = get_field('featured_post_heading');
$featured_post = get_field('featured_post');

if(!$featured_post) {
    return;
}

?>
<section class="featured-post">
    <div class="row">
        <div class="large-14 columns">
            <?php if($heading) { ?>
            <h1><?php echo nl2br(esc_html($heading)); ?></h1>
            <?php } ?>
            <h3><?php echo get_the_title($featured_post); ?></h3>
            <div>
                <?php echo get_post_excerpt($featured_post); ?>
            </div>
            <p>
                <a href="<?php echo esc_attr(get_permalink($featured_post)); ?>" class="button">Learn More</a>
            </p>
        </div>
        <div class="large-10 columns">
            <?php if($url = get_featured_image_url('large',$featured_post)) { ?>
            <img src="<?php echo esc_attr($url); ?>" alt="" title="<?php echo get_the_title($featured_post); ?>" />
            <?php } ?>
        </div>
    </div>
</section>