<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Regiser custom post types
 */
function post_type()
{

    $labels = array(
        'name'               => _x('Destaques', 'Post Type General Name', 'understrap'),
        'singular_name'      => _x('Destaque', 'Post Type Singular Name', 'understrap'),
        'menu_name'          => _x('Destaques', 'Admin Menu', 'understrap'),
        'parent_item_colon'  => __('Destaques pai', 'understrap'),
        'all_items'          => __('Todos os Destaques', 'understrap'),
        'view_item'          => __('Ver Destaque', 'understrap'),
        'add_new_item'       => __('Adicionar Destaque', 'understrap'),
        'add_new'            => _x('Adicionar', 'highligth', 'understrap'),
        'edit_item'          => __('Editar Destaque', 'understrap'),
        'update_item'        => __('Atualizar Destaque', 'understrap'),
        'search_items'       => __('Procurar Destaque', 'understrap'),
        'not_found'          => __('Não encontrado', 'understrap'),
        'not_found_in_trash' => __('Não encontrado no Lixo', 'understrap'),
    );

    $args = array(
        'labels'              => $labels,
        'label'               => __('highligth', 'understrap'),
        'description'         => __('highlight Review', 'understrap'),
        'supports'            => array('title', 'revisions'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        //'rewrite'             => array( 'slug' => 'o-que-esta-a-acontecer' ),
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        //'menu_icon'           => 'dashicons-awards',
    );

    register_post_type('highligth', $args);
}


add_action('init', 'post_type', 0);
