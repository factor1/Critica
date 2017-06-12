<?php

/*
*   Our Advisors Page Template
*   Template Name: Our Advisors
*/

get_header();

?>

    <section class="page interior-b our-advisors">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="post">
            <section class="flexible-content">
                <div class="row">
                    <div class="small-centered small-24 medium-20 large-18 columns">
                        <?php the_content(); ?>
                    </div>
                </div>
                <ul class="advisors">
                    <?php foreach ( get_field( 'advisors' ) as $advisor ) : ?>
                        <li class="advisor">
                            <img class="advisor-image" src="<?php echo $advisor['image']; ?>" alt="Headshot">
                            <div class="advisor-text">
                                <div class="advisor-name"><?php echo $advisor['name']; ?></div>
                                <div class="advisor-title"><?php echo $advisor['title']; ?></div>
                                <div class="advisor-description"><?php echo $advisor['description']; ?></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </article>
        <?php endwhile; endif; ?>
    </section>

<?php

get_footer();
