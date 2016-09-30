<?php

// Load featured image
$image = get_featured_image_url('full');

// Check for alternate image selected
if(!get_field('use_featured_image') && ($banner_image = get_field('banner_image'))) {
    $image = $banner_image;
}

$subtitle = get_field('subtitle');

?>
<section class="featured-image dark"<?php echo (($image) ? get_theme_background_image_style($image) : ''); ?>>

    <div class="row">
        <div class="small-20 small-centered columns">
            <div>
                <h1><?php echo get_the_title(); ?></h1>
                <?php if($subtitle) { ?>
                <h2><?php echo get_sanitized_heading($subtitle); ?></h2>
                <?php } ?>
            </div>
        </div>
    </div>

</section>