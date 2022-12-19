<?php

/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles()
{

    // Get the theme data.
    $the_theme = wp_get_theme();

    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles  = "/dist/css/app{$suffix}.css";
    $theme_scripts = "/dist/js/app{$suffix}.js";

    //Enqueue Styles
    $filepath = '/dist/css/app.min.css';
    if (validate_file($filepath) < 1 && file_exists(get_template_directory() . $filepath)) {
        $filepath_version = $theme_version . '.' . filemtime(get_template_directory() . $filepath);
        wp_enqueue_style('understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get('Version'));
    }

    //Enqueue Javascript
    $filepath = '/dist/js/app.min.js';
    if (validate_file($filepath) < 1 && file_exists(get_template_directory() . $filepath)) {
        $filepath_version = $theme_version . '.' . filemtime(get_template_directory() . $filepath);
        wp_enqueue_script('understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get('Version'), true);
    }

    //Enqueue Vendor
    $filepath = '/dist/js/vendor/vendor.min.js';
    if (validate_file($filepath) < 1 && file_exists(get_template_directory() . $filepath)) {
        $filepath_version = $theme_version . '.' . filemtime(get_template_directory() . $filepath);
        wp_enqueue_script('vendor-scripts', get_template_directory_uri() . $filepath, array(), $filepath_version, true);
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
