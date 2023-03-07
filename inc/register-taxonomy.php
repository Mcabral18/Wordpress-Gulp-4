<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

function create_taxonomies()
{

    $labels = array(
        'name'              => _x('States', 'taxonomy general name', 'understrap'),
        'singular_name'     => _x('State', 'taxonomy singular name', 'understrap'),
        'search_items'      => __('Search State', 'understrap'),
        'all_items'         => __('All States', 'understrap'),
        'parent_item'       => __('Parent State', 'understrap'),
        'parent_item_colon' => __('Parent State:', 'understrap'),
        'edit_item'         => __('Edit State', 'understrap'),
        'update_item'       => __('Update state', 'understrap'),
        'add_new_item'      => __('Add new gênero', 'understrap'),
        'new_item_name'     => __('New State name', 'understrap'),
        'menu_name'         => __('State', 'understrap'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'genre'),
    );

    // register_taxonomy('genre', 'stores', $args);
}

add_action('init', 'create_taxonomies', 0);
