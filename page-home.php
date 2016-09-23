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

            <?php get_template_part('parts/hero'); ?>

        </article>
        <?php endwhile; endif; ?>
    </section>

<?php

  get_footer();