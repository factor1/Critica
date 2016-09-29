<?php

// Fetch the slides
$slides = get_field('hero_slides');

// No slides set, skip
if(!$slides) {
    return;
}

// Prepare the slides
$slides = array_filter(array_map(function($slide) {

    if(!is_array($slide)) {
        return null;
    }

    // Load base slide attributes
    $slide = array_merge([
        'image' => '',
        'heading' => '',
        'content' => '',
        'button_text' => '',
        'button_type' => '',
        'button_post' => '',
        'button_url' => '',
    ],$slide);

    if($slide['button_type'] !== 'external') {
        $slide['button_url'] = '';
    }

    // Determine and load the button url if internal
    if($slide['button_type'] === 'internal' && is_object($slide['button_post'])) {
        $slide['button_url'] = get_permalink($slide['button_post']->ID);
    }

    return $slide;

},$slides),function($slide) {

    // Ensure no empty/invalid slides
    return ! is_null($slide);

});

?>
<section class="hero-slider">
    <div class="slider">
        <?php foreach($slides as $slide) { ?>
        <div>
            <section<?php echo get_theme_background_image_style($slide['image']); ?>>
                <div class="row columns">
                    <?php if($slide['heading']) { ?>
                    <h1>
                        <?php echo get_sanitized_heading($slide['heading']); ?>
                    </h1>
                    <?php } ?>
                    <div>
                        <?php if($slide['content']) { ?>
                            <?php echo apply_filters('the_content',$slide['content']); ?>
                        <?php } ?>
                        <p>
                            <?php if($slide['button_text'] && $slide['button_url']) { ?>
                            <a href="<?php echo esc_attr($slide['button_url']); ?>" class="button"><?php echo esc_html($slide['button_text']); ?></a>
                            <?php } ?>
                        </p>
                    </div>
                </div>
            </section>
        </div>
        <?php } ?>
    </div>
</section>