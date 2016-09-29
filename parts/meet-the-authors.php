<?php
/**
*   Meet the Authors
*
*/

$section = [
    'image' => get_field('meet_authors_image'),
    'content' => get_field('meet_authors_content'),
    'button_text' => get_field('meet_authors_button_text'),
    'button_type' => get_field('meet_authors_button_type'),
    'button_url' => get_field('meet_authors_button_url'),
    'button_post' => get_field('meet_authors_button_post'),
];

if($section['button_type'] !== 'external') {
    $section['button_url'] = '';
}

if($section['button_type'] === 'internal' && is_object($section['button_post'])) {
    $section['button_url'] = get_permalink($section['button_post']->ID);
}

?>
<section class="meet-the-authors">
    <div class="row">
        <div class="large-12 columns"<?php echo get_theme_background_image_style($section['image']); ?>></div>
        <div class="large-12 columns dark">
            <div>
                <h2>
                    <?php echo get_sanitized_heading($section['content']); ?>
                </h2>
                <?php if($section['button_url'] && $section['button_text']) { ?>
                <p>
                    <a href="<?php echo esc_attr($section['button_url']); ?>" class="button thin"><?php echo esc_html($section['button_text']); ?></a>
                </p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>