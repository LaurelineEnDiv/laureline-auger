<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="site-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-laureline-jaune.png" alt="Logo de Laureline Auger, développeuse Wordpress SEO">
        </a>
    </div>
    <button class="burger-menu" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <nav class="nav-wrapper">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'main-menu', 
            'menu_class'     => 'header-menu',
            'container'      => 'ul', 
            'depth'          => 2, // Permet d'afficher les sous-menus
        ) );
        ?>
    </nav>
    <?php get_template_part('template_parts/mobile-menu'); ?>
</header>

<?php get_template_part('template_parts/contact'); ?>

