<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <meta name="description" content="那覇の海を眺めるリゾートホテル">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body <?php body_class(); ?>>
    <!-- header -->
    <header class="site-header" id="top">
        <div class="site-header-inner">
            <a href="#top" class="logo">
                <?php echo esc_html( get_bloginfo( 'name' )); ?>
            </a>
            <nav class="site-nav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'header-menu',
                    'container' => '',
                ));
                ?>

            </nav>
            <a href="#reservation" class="nav-cta">
                ご予約
            </a>
        </div>
    </header>
