<?php
// Flexible fifty fifty content/image split

if( get_sub_field('background_image') ){
  $background = 'url(' . get_sub_field('background_image') . ') center center no-repeat';
} else{
  $background = get_sub_field('background_color');
}

?>

<section class="flex-fifty-fifty container" style="background: <?php echo $background;?>;">
  <div class="row">

    <?php if( get_sub_field('image_placement') == 'left' ):?>

      <div class="col-6">
        <img src="<?php the_sub_field('fifty_image');?>" alt="">
      </div>
      <div class="col-6">
        <?php the_sub_field('fifty_content');?>
      </div>

    <?php else:?>

      <div class="col-6">
        <?php the_sub_field('fifty_content');?>
      </div>
      <div class="col-6">
        <img src="<?php the_sub_field('fifty_image');?>" alt="">
      </div>

    <?php endif;?>

  </div>
</section>
