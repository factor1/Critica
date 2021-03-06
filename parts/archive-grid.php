<?php
/**
*   Archive Grid
*
*   @var $wp_query
*
*/

// Shouldn't occur but if main query missing, bail
if(!isset($wp_query)) {
    return;
}

// Prepare grid blocks from the main query
$blocks = array_map(function($post) {

    $block = [];

    $block['image'] = get_featured_image_url('large',$post);
    $block['title'] = get_the_title($post);
    $block['date'] = get_the_time( 'F jS, Y', $post);
    $block['content'] = get_post_excerpt($post);
    $block['learn_more_url'] = get_permalink($post);
    $block['author'] = get_user_by('id',$post->post_author);
    $block['post_type'] = get_post_type($post);

    if ($block['post_type'] === TOPIC_POST_TYPE) {
        $block['n_opinions'] = count(get_field('expert_opinions', $post));
    }

    $block['categories'] = array_map(function($term) {
        return '<a href="'.esc_attr(get_term_link($term->term_id,'category')).'">'.esc_html($term->name).'</a>';
    },wp_get_object_terms($post->ID,['category'],['fields'=>'all']));

    return $block;

},$wp_query->posts);

// No blocks, bail here
if(!$blocks) {
    return;
}

?>
<section class="archive-grid">

    <?php if($blocks) { ?>
    <div class="row large-up-1">

        <?php foreach($blocks as $k => $block) { ?>
        <div class="column <? echo $block['post_type'] === TOPIC_POST_TYPE ? 'topic-post' : ''; ?>">

            <div class="row">

                <div class="medium-9 large-8 columns"<?php echo get_theme_background_image_style($block['image']); ?>></div>

                <div class="medium-15 large-16 columns">

                    <h2>
                        <?php echo get_sanitized_heading($block['title']); ?>
                    </h2>

                    <?php if($block['post_type'] !== TOPIC_POST_TYPE && $block['author']) { ?>
                    <div>
                        Posted by <?php echo $block['author']->data->display_name; ?>
                        <?php if($block['categories']) { ?>
                        in <?php echo implode(', ',$block['categories']); ?>
                        <?php } ?>
                    </div>
                    <?php } else { ?>
                    <div class="counts">
                        <span><?php echo $block['n_opinions']; ?> Expert Opinion<?php echo ($block['n_opinions'] !== 1 ? 's' : ''); ?></span>
                        <span><span class="fb-comments-count" data-href="<?php echo esc_attr($block['learn_more_url']); ?>"></span> Reader Comments</span>
                    </div>
                    <?php } ?>

                    <div>
                        <?php echo apply_filters('the_content',$block['content']); ?>
                    </div>

                    <p>
                        <a href="<?php echo esc_attr($block['learn_more_url']); ?>" class="button">Read More</a>
                    </p>

                </div>

            </div>

        </div>
        <?php } ?>

    </div>
    <?php } ?>

    <?php get_template_part('parts/pagination'); ?>

</section>

