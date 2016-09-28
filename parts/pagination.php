<?php
/**
*   Generates pagniation links for the main query
*
*/

global $paged, $wp_query;

if(!$paged) {
    $paged = 1;
}

$page_count = intval($wp_query->max_num_pages);

if($page_count <= 1) {
    return;
}

$pages_to_show = 5;

$start_page = 1;
$end_page = min($page_count,$pages_to_show);

?>
<section class="pagination">
    <div class="row column">

        <?php  if($paged > 1) { ?>
        <a href="<?php echo get_pagenum_link($paged-1); ?>" class="button thin"><i class="fa fa-chevron-left"></i> Prev</a>
        <?php } ?>

        <?php for($x=$start_page;$x<=$end_page;$x++) { ?>
        <a href="<?php echo get_pagenum_link($x); ?>" class="page<?php echo (($paged==$x)?' active':'') ?>"><?php echo $x; ?></a>
        <?php } ?>

        <?php if($paged < $page_count) { ?>
        <span>...</span>

        <?php  if(($page_count - $end_page) > 3) { ?>
        <a href="<?php echo get_pagenum_link($page_count-1); ?>" class="page"><?php echo ($page_count-1); ?></a>
        <?php } ?>
        <?php  if(($page_count - $end_page) > 2) { ?>
        <a href="<?php echo get_pagenum_link($page_count); ?>" class="page"><?php echo ($page_count); ?></a>
        <?php } ?>

        <a href="<?php echo get_pagenum_link($paged+1); ?>" class="button thin">Next <i class="fa fa-chevron-right"></i></a>
        <?php } ?>

    </div>
</section>