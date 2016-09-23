<?php
// Thirty - Seventy (30/70) Content & Image

if( get_sub_field('background_image') ){
  $background = 'url(' . get_sub_field('background_image') . ') center center no-repeat';
} else{
  $background = get_sub_field('background_color');
}

?>

<section class="flex-thirty-seventy container" style="background: <?php echo $background;?>;">
  <div class="row">

    <?php if( get_sub_field('image_placement') == 'left' ): ?>

      <div class="col-4">
        <img src="<?php the_sub_field('image');?>" alt="">
      </div>
      <div class="col-8">
        <?php the_sub_field('content');?>
      </div>

    <?php else: ?>

      <div class="col-8">
        <?php the_sub_field('content');?>
      </div>
      <div class="col-4">
        <img src="<?php the_sub_field('image');?>" alt="">
      </div>

    <?php endif; ?>

  </div>
</section>
