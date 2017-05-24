<?php
/**
*   This is the template part for the Homepage banner linking to
*   the "Our Services" page.
*
*/

$section = [
    'headline' => get_field('our_services_banner_headline'),
    'content' => get_field('our_services_banner_content'),
    'button_text' => get_field('our_services_banner_button_text'),
    'button_post' => get_field('our_services_banner_button_post'),
];

if ( is_object( $section['button_post'] ) ) {
    $section['button_url'] = get_permalink( $section['button_post'] );
}

?>

<section class="our-services-banner callout dark">
    <div class="row">
        <div class="large-18 columns left">
            <h1>
                <?php echo get_sanitized_heading($section['headline']); ?>
            </h1>
            <p><?php echo $section['content']; ?></p>
        </div>
        <div class="large-6 columns right">
            <?php if ( $section['button_url'] && $section['button_text'] ) : ?>
                <p class="vert-center">
                    <a href="<?php echo esc_attr($section['button_url']); ?>" class="button"><?php echo esc_html($section['button_text']); ?></a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
