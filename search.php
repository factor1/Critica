<?php
/**
* The search results template.
*
* Used when a search is performed.
*/

get_header();

?>

<section class="page archive">

    <section class="page-title">
        <div class="row columns">
            <div class="row">
                <div class="small-20 small-centered columns">
                    <h1>Search Results</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="archive-list">
        <div class="row">
            <div class="small-centered small-22 medium-20 large-18 columns">
                <?php if ( have_posts() ) : ?>

                  <?php the_posts_pagination( array('mid_size' => 2) ); ?>

                  <?php while ( have_posts() ) : the_post(); ?>

                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <div class="row">
                        <?php if( has_post_thumbnail() ) { ?>
                        <div class="large-8 columns">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="large-16 columns">
                        <?php } else { ?>
                        <div class="small-24 columns">
                        <?php } ?>
                            <?php
                            get_template_part( 'parts/meta' );
                            the_excerpt();
                            ?>
                        </div>
                    </div>

                  </article>

                  <hr />

                  <?php
                  endwhile;
                  the_posts_pagination( array('mid_size' => 2) );
                else : ?>
                  <h2>Sorry, no posts have been found.</h2>
                <?php endif; ?>
            </div>
        </div>
    </section>

</section>

<?php

get_footer();