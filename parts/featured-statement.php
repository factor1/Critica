<?php
/**
*   Featured Statement
*
*/

$section = [
    'heading' => get_field('featured_statement_heading'),
    'content' => get_field('featured_statement_content'),
    'button_text' => get_field('featured_statement_button_text'),
    'button_type' => get_field('featured_statement_button_type'),
    'button_url' => get_field('featured_statement_button_url'),
    'button_post' => get_field('featured_statement_button_post'),
];

if($section['button_type'] !== 'external') {
    $section['button_url'] = '';
}

if($section['button_type'] === 'internal' && is_object($section['button_post'])) {
    $section['button_url'] = get_permalink($section['button_post']->ID);
}

?>

<section class="featured-statement">
    <div class="row">
        <div class="small-24 columns">
            <h1 class="text-center"><?php echo get_sanitized_heading($section['heading']); ?></h1>
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