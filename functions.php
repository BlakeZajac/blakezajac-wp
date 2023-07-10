<?php
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

/**
 * Define constant for global use of stylesheet directory function
 * 
 * provides the directory path of the current active theme
 */
if (!defined('THEMEPATH')) {
    define('THEMEPATH', get_stylesheet_directory() . '/');
}

/**
 * Define constants for global use template-parts/components
 * 
 * This constant will be used in single, archive and similar other template pages
 * For example this constant is used in single-services.php
 */
if (!defined('COMPONENT')) {
    define('COMPONENT', 'template-parts/components');
}
/**
 * Define constants for global use template-parts/containers
 * 
 * This constant will be used in single, archive and similar other template pages
 * For example this constant is used in single-services.php
 */
if (!defined('CONTAINER')) {
    define('CONTAINER', 'template-parts/containers');
}

/**
 * Additional templates
 */
require_once(THEMEPATH . 'inc/inc.php');


/**
 * Disable block editor of wordpress
 */
add_filter('use_block_editor_for_post', '__return_false');

/**
 * This function can be used to add multiple file types to be accepted by Wordpress core.
 */
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


/** 
 * Comment this block for the sites where we require to show author page. 
 * Else ensure that this code is as is to prevent bot bruteforce attack using author name
 */
function my_custom_disable_author_page()
{
    global $wp_query;

    if (is_author()) {
        // Redirect to homepage, set status to 301 permenant redirect. 
        wp_redirect(get_option('home'), 301);
        exit;
    }
}
add_action('template_redirect', 'my_custom_disable_author_page');
