<?php
// Flexible Accordions
?>

<?php if( have_rows('accordion_repeater') ):?>
  <section class="flex-accordions container">

    <?php while( have_rows('accordion_repeater') ): the_row(); ?>

      <?php // ACCORDION TITLE ?>
      <div class="accordion--title container">
        <div class="row">
          <div class="col-10 col-centered text-center">
            <h1><?php the_sub_field('accordion_title');?></h1><i class="fa fa-chevron-down"></i>
          </div>
        </div>
        <?php // ACCORDION CONTENT ?>
        <div class="accordion--content">
          <div class="container">
            <div class="row">
              <div class="col-10 col-centered text-center">

                <?php the_sub_field('accordion_content_editor'); ?>

              </div>
            </div>
          </div>
        </div>
      </div>

    <?php endwhile;?>

  </section>
<?php endif;?>
