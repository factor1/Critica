<?php
/**
*   Callout
*
*/

$section = [
    'heading' => get_field('callout_purchase_heading'),
    'content' => get_field('callout_purchase_content'),
    'links' => get_field('callout_purchase_links'),
];

?>

<section class="callout purchase dark">
    <div class="row">
        <div class="small-centered small-22 medium-18 large-14 columns">
            <h2 class="text-center"><?php echo nl2br(esc_html($section['heading'])); ?></h2>
            <div>
                <?php echo apply_filters('the_content',$section['content']); ?>
            </div>
            <p class="links">
                <?php foreach($section['links'] as $p) { ?>
                    <a href="<?php echo esc_attr($p['link']); ?>"><img src="<?php echo get_theme_image_url_from_array($p['image']); ?>" alt="" title="" /></a>
                <?php } ?>
            </p>
        </div>
    </div>
</section>