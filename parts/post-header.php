<?php
/**
*   Header for single post content
*/

// No post found, skip
if(!isset($post)) {
    return;
}

// Load the author
$author = get_user_by('id',$post->post_author);

// Load the post categories
$categories = array_map(function($term) {
    return '<a href="'.esc_attr(get_term_link($term->term_id,'category')).'">'.esc_html($term->name).'</a>';
},wp_get_object_terms($post->ID,['category'],['fields'=>'all']));

?>
<section class="post-header">

    <?php if($author) { ?>
    <div class="author">
        Posted by <a href="<?php echo esc_attr(get_author_posts_url( $author->ID, $author->user_nicename )); ?>"><?php echo esc_html($author->user_nicename); ?></a>
        <?php if($categories) { ?>
        in <?php echo implode(', ',$categories); ?>
        <?php } ?>
    </div>
    <?php } ?>

    <?php get_template_part("parts/share-links"); ?>

</section>
