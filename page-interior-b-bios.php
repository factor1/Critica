<?php
/**
*   Interior B Page Template
*
*   Template Name: Interior B - Bios
*/

get_header();

?>

    <section class="page interior-b bios">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="post">

            <?php get_template_part('parts/page-title'); ?>
            <?php get_template_part('parts/bios-grid'); ?>
            <?php get_template_part('parts/callout'); ?>

        </article>
        <?php endwhile; endif; ?>
    </section>

<?php

  get_footer();