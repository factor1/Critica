<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:site_name" content="<?php bloginfo('name') ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php endif; ?>
    <?php if (is_search()) { ?>
    <meta name="robots" content="noindex, nofollow" />
    <?php } ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header>
        <div class="row">
            <div class="small-16 large-6 columns">
                <?php if($url = get_theme_header_logo_url()) { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" style="background-image:url(<?php echo esc_attr($url); ?>)"><?php bloginfo( 'name' ); ?></a>
                <?php } ?>
            </div>
            <div class="small-0 medium-0 large-18 columns">
                <nav>
                    <?php wp_nav_menu( [ 'theme_location' => 'header' ] ); ?>
                </nav>
            </div>
            <div class="small-8 large-0 columns">
                <nav>
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-bars"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>