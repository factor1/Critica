<?php
/**
*   Featured Post
*
*/

$heading = get_field('featured_post_heading');


?>
<section class="featured-post">
    <div class="row">
        <div class="large-15 columns">
            <?php if($heading) { ?>
            <h1><?php echo get_sanitized_heading($heading); ?></h1>
            <?php } ?>
            
            <?php if (get_field('intro')): ?>
				<img src="<?php the_field('intro');?>">
			<?php endif;?>
            
            
            <?php if (get_field('call_to_action_url')): ?>
			
	            <p>
	                <a href="<?php the_field('call_to_action_url');?>" class="button"><?php the_field('call_to_action_text');?></a>
	            </p>
            
            <?php endif;?>
        </div>
        <div class="large-9 columns">
            <?php if(has_post_thumbnail()) {
			the_post_thumbnail('large');
			} else {	}
			?>
        </div>
    </div>
</section>