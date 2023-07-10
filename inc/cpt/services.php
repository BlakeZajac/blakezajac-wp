<?php
// Register custom post type
function create_services_post_type()
{
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'menu_name'          => 'Services',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Service',
        'edit'               => 'Edit',
        'edit_item'          => 'Edit Service',
        'new_item'           => 'New Service',
        'view'               => 'View',
        'view_item'          => 'View Service',
        'search_items'       => 'Search Services',
        'not_found'          => 'No services found',
        'not_found_in_trash' => 'No services found in Trash',
        'parent_item_colon'  => 'Parent Service:',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'services'),
        'capability_type'     => 'post',
        'hierarchical'        => true,
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'categories', 'tags'),
        'menu_icon'           => 'dashicons-admin-tools',
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'services'),
        'show_in_nav_menus'   => true,
    );

    register_post_type('services', $args);
}
add_action('init', 'create_services_post_type');

// /
//  * ACF Options Page
//  *
//  */
function ea_acf_portfolio_page()
{
    if (function_exists('acf_add_options_sub_page')) {
        acf_add_options_sub_page(array(
            'title'     => 'Services Settings',
            'parent'    => 'edit.php?post_type=services',
            'capability' => 'manage_options'
        ));
    }
}
add_action('init', 'ea_acf_portfolio_page');
