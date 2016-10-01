<?php
/**
*   Interior E Page Template
*
*   Template Name: Interior E - Contact Form
*/

get_header();

?>

<section class="page interior-e">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" class="post">

        <?php get_template_part('parts/page-title'); ?>
        <?php get_template_part('parts/content'); ?>

        <section class="contact-form">
            <div class="row">
                <div class="small-24 medium-22 large-20 small-centered columns">
                    <?php if($form_id = get_field('contact_form_id')) { ?>
                        <?php gravity_form(intval($form_id),false,false,false,null,true); ?>
                    <?php } ?>
                </div>
            </div>
        </section>

    </article>
    <?php endwhile; endif; ?>
</section>

<?php

  get_footer();