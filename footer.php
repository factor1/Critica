    </main>

    <footer>
        <div class="row dark">

            <div class="large-16 columns">
                <div class="row">

                    <div class="medium-12 columns">
                        <h2>Purchase</h2>
                        <nav class="purchase">
                            <ul>
                                <li>
                                    <a href="http://amzn.to/2d3JPzM"><img src="<?php echo esc_attr(get_stylesheet_directory_uri().'/assets/img/footer_buy_amazon.png'); ?>" alt="" title="Amazon.com" /></a>
                                </li>
                                <li>
                                    <a href="http://bit.ly/2dxvH3N"><img src="<?php echo esc_attr(get_stylesheet_directory_uri().'/assets/img/footer_buy_barnes.png'); ?>" alt="" title="Barnes &amp; Noble" /></a>
                                </li>
                                <li>
                                    <a href="http://bit.ly/2d8OGiv"><img src="<?php echo esc_attr(get_stylesheet_directory_uri().'/assets/img/footer_buy_oxford.png'); ?>" alt="" title="Oxford University Press" /></a>
                                </li>
                                
                                <li>
                                    <a href="http://bit.ly/2dffrlH"><img src="<?php echo esc_attr(get_stylesheet_directory_uri().'/assets/img/footer_buy_indie.png'); ?>" width="110px" alt="" title="IndieBound" /></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="medium-12 columns">
                        <h2>Newsletter</h2>
                        <div>
                            <?php if($form_id = get_field('footer_newsletter_form_id','options')) { ?>
                                <?php gravity_form(intval($form_id),false,false,false,null,true); ?>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="large-8 columns">
                <h2>Contact</h2>
                <?php if($address = get_field('footer_address','option')) { ?>
                <address>
                    <?php echo nl2br(esc_html($address)); ?>
                </address>
                <?php } ?>
                <?php if($phone = get_field('footer_phone','option')) { ?>
                <p>
                    <?php echo nl2br(esc_html($phone)); ?>
                </p>
                <?php } ?>
                <nav class="social">
                    <?php wp_nav_menu( [ 'theme_location' => 'social' ] ); ?>
                </nav>
                <div class="copyright">
                    <p><?php echo get_field('footer_copyright_text','option'); ?></p>
                    <p>Site design by <a href="http://rule29.com">Rule29</a>.</p>
                </div>
            </div>

        </div>
    </footer>

    <?php wp_footer(); ?>

    <a id="nifty-nav-toggle"><span></span></a>
    <nav class="nifty-panel">
        <?php wp_nav_menu( [ 'theme_location' => 'mobile' ] ); ?>
    </nav>

</body>
</html>