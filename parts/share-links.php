<?php
/**
*   Share links for a single post/page
*
*/
?>
<section class="share-links">
    <div class="row">
        <div class="small-centered small-24 medium-20 large-16 columns">
            <h4>
                <nav class="social">
                    <ul>
                        <li><span>Share</span></li>
                        <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank"></a></li>
                        <li><a href="http://www.twitter.com/home?status=<?php echo urlencode(get_permalink()); ?>"" target="_blank"></a></li>
                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>&summary=&source=" target="_blank"></a></li>
                        <li><a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>"" target="_blank"></a></li>
                        <li><a href="mailto:?subject=test"></a></li>
                    </ul>
                </nav>
            </h4>
        </div>
    </div>
</section>
