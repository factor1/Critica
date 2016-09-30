<?php
// Flexible Full Width Content

if( get_sub_field('background_image') ){
  $background = 'url(' . get_sub_field('background_image') . ') center center no-repeat';
} else{
  $background = get_sub_field('background_color');
}
?>

<section class="flex-full-width container" style="background: <?php echo $background;?>;">
  <div class="row">
    <div class="col-12">
      <?php the_sub_field('full_width_content');?>
    </div>
  </div>
</section>
