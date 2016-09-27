<?php
/**
*   Callout
*
*/

$section = [
    'heading' => get_field('callout_heading'),
    'content' => get_field('callout_content'),
    'button_text' => get_field('callout_button_text'),
    'button_type' => get_field('callout_button_type'),
    'button_url' => get_field('callout_button_url'),
    'button_post' => get_field('callout_button_post'),
];

if($section['button_type'] !== 'external') {
    $section['button_url'] = '';
}

if($section['button_type'] === 'internal' && is_object($section['button_post'])) {
    $section['button_url'] = get_permalink($section['button_post']->ID);
}

?>

<section class="callout dark">
    <div class="row">
        <div class="small-centered small-22 medium-18 large-14 columns">
            <h2 class="text-center"><?php echo nl2br(esc_html($section['heading'])); ?></h2>
            <div>
                <?php echo apply_filters('the_content',$section['content']); ?>
            </div>
            <?php if($section['button_url'] && $section['button_text']) { ?>
            <p>
                <a href="<?php echo esc_attr($section['button_url']); ?>" class="button"><?php echo esc_html($section['button_text']); ?></a>
            </p>
            <?php } ?>
        </div>
    </div>
</section>