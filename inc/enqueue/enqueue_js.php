<?php

if (!defined('ABSPATH')) {
    exit;
}
/**
 * Enqueue all js in footer
 */
function my_theme_enqueue_scripts()
{
    wp_enqueue_script('jquery-3.0', 'https://code.jquery.com/jquery-3.6.0.min.js', '', '', true);
    wp_enqueue_script('cog-cdn-function', 'https://localcdn.cogprint.com.au/src/cdn/js/divi/diviFunction.js', array('jquery'), true);
    wp_enqueue_script(
        'slick-cdn',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        array('cog-cdn-function'),
        true
    );
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array('cog-cdn-function'), true);
    wp_enqueue_script('cdn', get_stylesheet_directory_uri() . '/js/cdn.js', array('cog-cdn-function'), true);
    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/js/slick.js', array('custom'), true);
    wp_enqueue_script('lenis-scroll', 'https://cdn.jsdelivr.net/gh/studio-freight/lenis@1/bundled/lenis.min.js');
}
add_action('wp_footer', 'my_theme_enqueue_scripts');
