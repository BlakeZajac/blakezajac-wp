<?php
if (!defined('ABSPATH')) {
    exit;
}
function my_theme_enqueue_styles()
{
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('cog-cdn-normalize', 'https://localcdn.cogprint.com.au/src/cdn/css/divi/diviNormalize.css');
    wp_enqueue_style('custom-font-style', get_stylesheet_directory_uri() . '/css/font.css');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles', 99);
