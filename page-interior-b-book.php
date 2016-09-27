<?php
/**
*   Interior B Page Template
*
*   Template Name: Interior B - Book
*/

get_header();

?>

    <section class="page interior-b book">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="post">

            <?php get_template_part('parts/flexible-content'); ?>
            <?php get_template_part('parts/callout-purchase'); ?>
            <?php get_template_part('parts/flexible-content-2'); ?>
            <?php get_template_part('parts/testimonials'); ?>

        </article>
        <?php endwhile; endif; ?>
    </section>

<?php

  get_footer();