<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- js code for analytics
    value comes from customizer > analytics section -->
    <?php echo get_theme_mod('head_js_code'); ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php echo get_theme_mod('body_js_code'); ?>
    <?php wp_body_open();

    $primary_menu = wp_nav_menu(
        array(
            'menu_name' => 'main_menu',
            'echo' => false,
        )
    );

    $logo = get_theme_mod('logo_image');
    $alternate_logo = get_theme_mod('alternate_logo_image');
    ?>

    <header class="header">
        <div class="row header__container">
            <a href="/">
                <img src="<?php echo wp_get_attachment_image_url($logo); ?>" alt="Logo" class="logo" />
            </a>

            <div class="header__menu">
                <span class="header__menu__label">Menu</span>

                <div class="header__submenu">
                    <?php echo $primary_menu; ?>
                </div>
            </div>
        </div>
    </header>