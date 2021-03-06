<?php
/**
*   The homepage template
*
*   Template Name: Home
*/

get_header();

?>

    <section class="page">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="post">

            <?php get_template_part('parts/hero-slider'); ?>
            <?php get_template_part('parts/our-services-banner'); ?>
            <?php get_template_part('parts/featured-post'); ?>
            <?php get_template_part('parts/meet-the-authors'); ?>
            <?php get_template_part('parts/featured-statement'); ?>

        </article>
        <?php endwhile; endif; ?>
    </section>

<?php

  get_footer();