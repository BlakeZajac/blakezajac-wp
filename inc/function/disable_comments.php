<?php
if (!defined('ABSPATH')) {
    exit;
}
// Hide comments from the admin menu
function hide_comments_admin_menu()
{
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'hide_comments_admin_menu');

// Disable comments REST API endpoints
function disable_comments_api($endpoints)
{
    if (isset($endpoints['/wp/v2/comments'])) {
        unset($endpoints['/wp/v2/comments']);
    }
    if (isset($endpoints['/wp/v2/comments/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/comments/(?P<id>[\d]+)']);
    }
    return $endpoints;
}
add_filter('rest_endpoints', 'disable_comments_api');
