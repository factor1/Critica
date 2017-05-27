<?php
/**
* The single post template for a Topic Post.
*
* Used when a single Topic Post is queried.
*/

get_header();

?>

<section class="page single topic-post interior-d">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   
    
    <?php get_template_part("parts/featured-image"); ?>
    <?php get_template_part("parts/share-links"); ?>
    <section class="flexible-content about">
        <div class="row">
            <div class="small-centered small-24 medium-20 large-18 columns">
                <?php get_template_part("parts/topic-about"); ?>
            </div>
        </div>
    </section>
    <section class="flexible-content dark opinions">
        <div class="row">
            <div class="small-centered small-24 medium-20 large-18 columns">
                <?php get_template_part("parts/topic-opinions"); ?>
            </div>
        </div>
    </section>
    <section class="flexible-content thoughts">
        <div class="row">
            <div class="small-centered small-24 medium-20 large-18 columns">
                <?php get_template_part("parts/topic-thoughts"); ?>
            </div>
        </div>
    </section>
    <section class="flexible-content comments">
        <div class="row">
            <div class="small-centered small-24 medium-20 large-18 columns">
                <?php get_template_part("parts/topic-comments"); ?>
            </div>
        </div>
    </section>
    <?php get_template_part("parts/share-links"); ?>

<?php endwhile; endif; ?>
</section>

<?php

get_footer();
