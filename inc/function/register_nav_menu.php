<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Register primary-meny, secondary-menu and footer-menu 
 */
function register_theme_menus()
{

    register_nav_menus(array(
        'primary-menu'   => esc_html__('Primary Menu', 'blake'),
        'secondary-menu' => esc_html__('Secondary Menu', 'blake'),
        'footer-menu'    => esc_html__('Footer Menu', 'blake'),
    ));
}
add_action('after_setup_theme', 'register_theme_menus');
