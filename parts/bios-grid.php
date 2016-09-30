<?php
/**
*   Bios Grid
*
*   @var array $blocks
*       @key image @var array
*       @key heading @var string
*       @key content  @var string
*/

$blocks = get_field('bio_blocks');

if(!$blocks) {
    return;
}

?>
<section class="bios-grid">
    <div class="row large-up-2">

        <?php foreach($blocks as $block) { ?>
        <div class="column">
            <section class="block">
                <div<?php echo get_theme_background_image_style($block['image']); ?>></div>
                <h2>
                    <?php echo strip_tags(apply_filters('the_content',$block['heading']),'<strong>'); ?>
                </h2>
                <p>
                    <?php echo apply_filters('the_content',$block['content']); ?>
                </p>
            </section>
        </div>
        <?php } ?>

    </div>
</section>