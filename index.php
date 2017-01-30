<?php
/**
* The default blog / index template.
*/

get_header();

?>
<section class="page archive">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
	    <?php get_template_part('parts/post-banner'); ?>
	    <?php get_template_part('parts/post-filters'); ?>
	    <?php get_template_part('parts/archive-grid'); ?>
    <?php endwhile; endif; ?>

</section>
<?php

  get_footer();