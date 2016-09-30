<?php
// Content Grid (25/25/25/25)

if( get_sub_field('background_image') ){
  $background = 'url(' . get_sub_field('background_image') . ') center center no-repeat';
} else{
  $background = get_sub_field('background_color');
}
?>

<section class="flex-content-grid container" style="background: <?php echo $background;?>;">
  <div class="row">
    <div class="col-3">
      <?php the_sub_field('content_1');?>
    </div>
    <div class="col-3">
      <?php the_sub_field('content_2');?>
    </div>
    <div class="col-3">
      <?php the_sub_field('content_3');?>
    </div>
    <div class="col-3">
      <?php the_sub_field('content_4');?>
    </div>
  </div>
</section>
