<?php
/**
* The default page template.
*
* Used when a default template individual page is queried.
*/

get_header();

?>

    <section class="page interior">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="post">

            <?php get_template_part("parts/featured-image"); ?>
            <?php get_template_part("parts/flexible-content"); ?>

        </article>
        <?php endwhile; endif; ?>
    </section>

<?php

get_footer();