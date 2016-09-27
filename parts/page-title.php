<section class="page-title">
    <div class="row">
        <div class="small-20 small-centered columns">
            <?php if(is_single()) { ?>
            <h1><?php the_title(); ?></h1>
            <?php } else if($p = get_queried_object()) { ?>
            <h1><?php echo esc_html($p->post_title); ?></h1>
            <?php } ?>
        </div>
    </div>
</section>