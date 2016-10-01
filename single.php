<?php
/**
* The single post template.
*
* Used when a single post is queried.
*/

get_header();

?>

<section class="page single interior-d">

    <?php get_template_part("parts/featured-image"); ?>
    <?php get_template_part("parts/post-header"); ?>
    <section class="flexible-content">
    <div class="row">
        <div class="small-centered small-24 medium-20 large-18 columns">
	     <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   
		 	<?php the_content();?>
		 	<?php endwhile; endif; ?>
        </div>
    </div>
    </section>
    
    <?php get_template_part("parts/share-links"); ?>
    <?php get_template_part("parts/comments"); ?>

</section>
<?php

get_footer();