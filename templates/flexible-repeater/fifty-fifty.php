<?php
// Flexible fifty fifty content split

if( get_sub_field('background_image') ){
  $background = 'url(' . get_sub_field('background_image') . ') center center no-repeat';
} else{
  $background = get_sub_field('background_color');
}
?>

<section class="flex-fifty-fifty container" style="background: <?php echo $background;?>;">
  <div class="row">
    <div class="col-6">
      <?php the_sub_field('fifty_left_content');?>
    </div>
    <div class="col-6">
      <?php the_sub_field('fifty_right_content');?>
    </div>
  </div>
</section>
