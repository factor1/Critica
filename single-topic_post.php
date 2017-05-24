<?php
/**
* The single post template for a Topic Post.
*
* Used when a single Topic Post is queried.
*/

get_header();

?>

<section class="page single interior-d">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   
    <?php get_template_part("parts/featured-image"); ?>
    <?php get_template_part("parts/post-header"); ?>
    <section class="flexible-content">
    <div class="row">
        <div class="small-centered small-24 medium-20 large-18 columns">
         
            <?php the_content();?>
            
        </div>
    </div>
    <?php endwhile; endif; ?>
    </section>
    
    <?php get_template_part("parts/share-links"); ?>
    <?php get_template_part("parts/comments"); ?>

</section>
<?php

get_footer();
