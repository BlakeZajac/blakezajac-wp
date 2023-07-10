<?php
function create_projects_post_type()
{
    $labels = array(
        'name'               => 'Projects',
        'singular_name'      => 'Project',
        'menu_name'          => 'Projects',
        'name_admin_bar'     => 'Projects',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Project',
        'new_item'           => 'New Project',
        'edit_item'          => 'Edit Project',
        'view_item'          => 'View Project',
        'all_items'          => 'All Projects',
        'search_items'       => 'Search Projects',
        'parent_item_colon'  => 'Parent Project:',
        'not_found'          => 'No Projects found.',
        'not_found_in_trash' => 'No Projects found in Trash.'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'projects'),
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'categories', 'tags'),
    );

    register_post_type('projects', $args);
}

add_action('init', 'create_projects_post_type');

//hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'create_projects_category_taxonomy', 0);

function create_projects_category_taxonomy()
{
    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI
    $labels = array(
        'name' => _x('Project Categories', 'taxonomy general name'),
        'singular_name' => _x('Project Category', 'taxonomy singular name'),
        'search_items' =>  __('Search Project Categories'),
        'all_items' => __('All Project Categories'),
        'parent_item' => __('Parent Project Category'),
        'parent_item_colon' => __('Parent Project Category:'),
        'edit_item' => __('Edit Project Category'),
        'update_item' => __('Update Project Category'),
        'add_new_item' => __('Add New Project Category'),
        'new_item_name' => __('New Project Category Name'),
        'menu_name' => __('Project Categories'),
    );

    // Now register the taxonomy
    register_taxonomy('categories', array('projects'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-categories'),
    ));
}
