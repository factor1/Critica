<h2>
    <hr>
    <span>Expert Opinions</span>
</h2>
<ul>
    <?php foreach ( get_field( 'expert_opinions' ) as $opinion ) : ?>
        <li>
            <article><?php echo $opinion['content']; ?></article>
            <div class="attribution">
                <span class="author-name"><?php echo $opinion['author_name'] . ', '; ?></span>
                <span class="author-title"><?php echo $opinion['author_title']; ?></span>
            </div>
        </li>
    <?php endforeach; ?>
</ul>