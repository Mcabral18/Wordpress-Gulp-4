<?php

/**
 * Theme basic setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('after_setup_theme', 'understrap_setup');

if (!function_exists('understrap_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function understrap_setup()
    {
        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'understrap'),
        ));

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
		 * Adding Thumbnail basic support
		 */
        add_theme_support('post-thumbnails');

        /*
		 * Adding support for Widget edit icons in customizer
		 */
        add_theme_support('customize-selective-refresh-widgets');

        /*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('understrap_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Set up the WordPress Theme logo feature.
        add_theme_support('custom-logo');
    }
}
