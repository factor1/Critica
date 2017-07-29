<?php
/**
* The single post template for a Recent Engagement.
*
* Used when a single Recent Engagement is queried.
*/

$images = get_field('photos');

$archive_link = get_post_type_archive_link( RECENT_ENGAGEMENT_POST_TYPE );
$archive_link_label = get_post_type_object( RECENT_ENGAGEMENT_POST_TYPE )->labels->name;
$our_services_link = get_permalink( get_page_by_path( 'our-services' ) );

get_header();

?>

<section class="page single interior-b recent-engagement">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   
    
    <article id="post-<?php the_ID(); ?>" class="post">
        <section class="flexible-content">
            
            <a href="<?php echo $archive_link; ?>" class="back-link">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <?php echo $archive_link_label; ?>
            </a>
            
            <?php if ( $images && count( $images ) > 0 ) : ?>
                <div class="row">
                    <div class="photo-gallery small-centered small-24 medium-20 large-14 columns">
                        <a class="fa fa-angle-left" aria-hidden="true"></a>
                        <div class="gallery-images">
                            <?php foreach ( $images as $image ) : ?>
                                <div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>');"></div>
                            <? endforeach; ?>
                        </div>
                        <a class="fa fa-angle-right" aria-hidden="true"></a>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="row">
                <h1><?php the_title(); ?></h1>
                <div class="date"><?php the_date(); ?></div>
                <?php get_template_part("parts/share-links"); ?>
                <div class="small-centered small-24 medium-20 large-18 columns">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php get_template_part("parts/share-links"); ?>
        
        </section>
    </article>
    <a href="<?php echo $our_services_link; ?>" class="learn-more-link">Learn more about Critica's services</a>

<?php endwhile; endif; ?>
</section>

<?php

get_footer();
