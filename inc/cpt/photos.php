<?php
function create_photos_post_type()
{
    $labels = array(
        'name'               => 'Photos',
        'singular_name'      => 'Photo',
        'menu_name'          => 'Photos',
        'name_admin_bar'     => 'Photos',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Photo',
        'new_item'           => 'New Photo',
        'edit_item'          => 'Edit Photo',
        'view_item'          => 'View Photo',
        'all_items'          => 'All Photos',
        'search_items'       => 'Search Photos',
        'parent_item_colon'  => 'Parent Photo:',
        'not_found'          => 'No Photos found.',
        'not_found_in_trash' => 'No Photos found in Trash.'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'photos'),
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'categories', 'tags'),
    );

    register_post_type('photos', $args);
}

add_action('init', 'create_photos_post_type');

//hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'create_photos_category_taxonomy', 0);

function create_photos_category_taxonomy()
{
    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI
    $labels = array(
        'name' => _x('Photo Categories', 'taxonomy general name'),
        'singular_name' => _x('Photo Category', 'taxonomy singular name'),
        'search_items' =>  __('Search Photo Categories'),
        'all_items' => __('All Photo Categories'),
        'parent_item' => __('Parent Photo Category'),
        'parent_item_colon' => __('Parent Photo Category:'),
        'edit_item' => __('Edit Photo Category'),
        'update_item' => __('Update Photo Category'),
        'add_new_item' => __('Add New Photo Category'),
        'new_item_name' => __('New Photo Category Name'),
        'menu_name' => __('Photo Categories'),
    );

    // Now register the taxonomy
    register_taxonomy('categories', array('photos'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'photo-categories'),
    ));
}
