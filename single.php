<?php
/**
* The single post template.
*
* Used when a single post is queried.
*/

get_header();

?>

<section class="page single interior-d">

    <?php get_template_part("parts/featured-image"); ?>
    <?php get_template_part("parts/post-header"); ?>
    <?php get_template_part("parts/flexible-content"); ?>
    <?php get_template_part("parts/share-links"); ?>
    <?php get_template_part("parts/comments"); ?>

</section>
<?php

get_footer();