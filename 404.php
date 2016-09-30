<?php
/**
* The 404 Not Found template.
*
* Used when WordPress encounters an unknown URL.
*/

get_header();

?>

    <section class="page error-404">
        <div class="row">
            <h2>Hmm, that page does not exist...</h2>
            <p>
                Maybe you can find what you are looking for <a href="<?php echo esc_url( home_url( '/' ) ); ?>">here</a>.
            </p>
            <p>
                Or try searching below...
            </p>
            <?php get_search_form(); ?>
        </div>
    </section>

<?php

get_footer();
