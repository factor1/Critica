<?php
/**
*   Archive Post Filters
*
*/

$categories = get_categories();

$authors = get_users([
    'who' => 'authors',
]);

?>
<section class="post-filters dark">
    <div class="row">
        <div class="medium-12 columns">
            <div class="dropdown category" data-query-var="cat">
                <span>Filter by Category</span>
                <ul>
                    <li><a href="#" data-value="">All Categories</a></li>
                    <?php foreach($categories as $category) { ?>
                    <li><a href="#" data-value="<?php echo $category->term_id; ?>"><?php echo esc_html($category->name); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
         <div class="medium-12 columns">
            <div class="dropdown author" data-query-var="author">
                <span>Filter by Author</span>
                <ul>
                    <li><a href="#" data-value="">All Authors</a></li>
                    <?php foreach($authors as $author) { ?>
                        <?php if ('0' !== count_user_posts($author->ID)) : ?>
                            <li><a href="#" data-value="<?php echo $author->ID; ?>"><?php echo esc_html($author->display_name); ?></a></li>
                        <?php endif; ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
