<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * callback function to register custom customiser
 * @param $wp_customize
 * 
 * Registers panel for log, contact info fields
 */
function custom_customizer($wp_customize)
{
    //add section for general infromation
    $wp_customize->add_section('general_information', array(
        'title'      => 'General Information',
        'priority'   => 10,
        'capability' => 'edit_theme_options'
    ));

    //add image upload option
    $wp_customize->add_setting('logo_image', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh'
    ));
    //add image upload option control

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'logo_image', array(
        'label'        => 'Logo',
        'section'    => 'general_information',
        'settings'   => 'logo_image',
        'mime_type'  => 'image'
    )));

    //add alternate image upload option
    $wp_customize->add_setting('alternate_logo_image', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh'
    ));

    //add image upload option control
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'alt_logo_image', array(
        'label'        => 'Alternate Logo',
        'section'    => 'general_information',
        'settings'   => 'alternate_logo_image',
        'mime_type'  => 'image'
    )));

    if (current_user_can('administrator')) {
        // Add section for the JavaScript script
        $wp_customize->add_section('analytics', array(
            'title'      => 'Analytics Codes',
            'priority'   => 10,
        ));

        // Add setting for the JavaScript code
        $wp_customize->add_setting('head_js_code', array(
            'default'     => '',
            'transport'   => 'refresh',
        ));

        // Add control for the JavaScript code
        $wp_customize->add_control(new WP_Customize_Code_Editor_Control($wp_customize, 'head_js_code', array(
            'label'        => 'Head JavaScript Code',
            'section'      => 'analytics',
            'settings'     => 'head_js_code',
            'code_type'    => 'text/javascript', // Set the code type to JavaScript
            'editor_settings' => array(
                'theme' => 'monokai', // Optional: Set the code editor theme
            ),
        )));

        // Add setting for the JavaScript code
        $wp_customize->add_setting('body_js_code', array(
            'default'     => '',
            'transport'   => 'refresh',
        ));

        // Add control for the JavaScript code
        $wp_customize->add_control(new WP_Customize_Code_Editor_Control($wp_customize, 'body_js_code', array(
            'label'        => 'Body JavaScript Code',
            'section'      => 'analytics',
            'settings'     => 'body_js_code',
            'code_type'    => 'text/javascript', // Set the code type to JavaScript
            'editor_settings' => array(
                'theme' => 'monokai', // Optional: Set the code editor theme
            ),
        )));
    }
}

add_action('customize_register', 'custom_customizer');
