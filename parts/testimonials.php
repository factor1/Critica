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
</section>