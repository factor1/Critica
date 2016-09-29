<?php
/**
* The default blog / index template.
*/

get_header();

?>
<section class="page archive">

    <?php get_template_part('parts/post-banner'); ?>
    <?php get_template_part('parts/post-filters'); ?>
    <?php get_template_part('parts/archive-grid'); ?>

</section>
<?php

  get_footer();