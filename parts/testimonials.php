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

<section class="testimonials">
    <div class="row">
        <div class="small-centered small-22 medium-20 large-18 columns">
            <?php foreach($testimonials as $t) { ?>
            <h2><?php echo nl2br(esc_html($t['quote'])); ?></h2>
            <p><?php echo nl2br(esc_html($t['citation'])); ?></p>
            <?php } ?>
        </div>
    </div>
</section>