<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue files
 */
require_once(THEMEPATH . 'inc/enqueue/enqueue_css.php');
require_once(THEMEPATH . 'inc/enqueue/enqueue_js.php');

/**
 *  Functions
 */
require_once(THEMEPATH . 'inc/function/disable_comments.php');
require_once(THEMEPATH . 'inc/function/register_nav_menu.php');

/**
 * CPT
 */
require_once(THEMEPATH . 'inc/cpt/photos.php');
require_once(THEMEPATH . 'inc/cpt/projects.php');
require_once(THEMEPATH . 'inc/cpt/services.php');

/**
 * Shortcode
 */


/**
 * Customizer
 */

require_once(THEMEPATH . 'inc/customizer/customizer.php');
