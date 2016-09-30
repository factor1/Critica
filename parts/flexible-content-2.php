<?php if( have_rows('flexible_content_2') ): ?>
<section class="flexible-content blue">
    <div class="row">
        <div class="small-centered small-24 medium-20 large-16 columns">
            <?php

                while( have_rows('flexible_content_2') ): the_row();

                    /*** (1) full width content ***/
                    if( get_row_layout() == 'full_width' ):
                        get_template_part('templates/flexible-repeater/full-width');
                    endif;

                    /*** (2) Fifty Fifty (50/50) ***/
                    if( get_row_layout() == 'fifty_fifty' ):
                        get_template_part('templates/flexible-repeater/fifty-fifty');
                    endif;

                    /*** (3) Fifty Fifty (50/50) content and image  ***/
                    if( get_row_layout() == 'fifty_fifty_content_image' ):
                        get_template_part('templates/flexible-repeater/fifty-fifty-content-image');
                    endif;

                    /*** (4) Thirty - Seventy (30/70 image-content split) ***/
                    if( get_row_layout() == 'thirty_seventy'):
                        get_template_part('templates/flexible-repeater/thirty-seventy');
                    endif;

                    /*** (5) Content Grid (25%x4) ***/
                    if( get_row_layout() == 'content_grid'):
                        get_template_part('templates/flexible-repeater/content-grid');
                    endif;

                    /*** (6) Accordions ***/
                    if( get_row_layout() == 'accordions'):
                        get_template_part('templates/flexible-repeater/accordions');
                    endif;

                endwhile;

            ?>
        </div>
    </div>
</section>
<?php endif; ?>