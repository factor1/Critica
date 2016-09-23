<?php
/**
* The archive template.
*
* Used when a category, author, or date is queried.
*/

get_header();

$p = get_queried_object();

if ( have_posts() ) {
    $post = $posts[0];
    if(is_category()) {
        $title = 'Archive for the "'.$p->name.'" Category';
    } else if(is_tag()) {
        $title = 'Posts Tagged "'.$p->name.'"';
    } else if(is_day()) {
        $title = 'Archive for '.get_the_time( 'F jS, Y' );
    } else if(is_month()) {
        $title = 'Archive for '.get_the_time( 'F, Y' );
    } else if(is_year()) {
        $title = 'Archive for '.get_the_time( 'Y' );
    } else if(is_author()) {
        $title = 'Author Archive';
    } else if( isset($_GET[ 'paged' ]) && !empty($_GET[ 'paged' ]) ) {
        $title = 'Blog Archives';
    } else if(is_post_type_archive()) {
        $title = $p->label;
    }
}

if(!isset($p->post_title)) {
    $p->post_title = $title;
}

?>

<section class="page archive">

    <?php get_template_part("parts/featured-image"); ?>
    <?php get_template_part('parts/archive-grid'); ?>

</section>

<?php

get_footer();