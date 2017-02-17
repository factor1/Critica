<?php
/**
*   Testimonials
*
*/

$testimonials = get_field('testimonials');

if(!$testimonials) {
    return;
}

?>
<?php get_template_part('parts/flexible-content-2'); ?>
<section class="testimonials">
    <div class="row">
        <div class="small-centered small-22 medium-20 large-18 columns">
            <?php foreach($testimonials as $t) { ?>
            <h2><?php echo get_sanitized_heading($t['quote']); ?></h2>
            <p><?php echo get_sanitized_heading($t['citation']); ?></p>
            <?php } ?>
        </div>
    </div>

    <?php if (true == get_field( 'show_button' )) : ?>
    <div class="row">
        <div class="small-centered small-24 text-center">
            <a class="button" href="<?php echo get_acf_link('button_internal', 'button_external'); ?>"><?php the_field( 'button_text' ); ?></a>
        </div>
    </div>
    <?php endif; ?>
</section>
