<?php
/**
 * Plugin Name: EHy Portfolio
 * Description: Ein Plugin zur Registrierung eines Custom Post Types namens Portfolio.
 * Version: 1.0
 * Author: Enno Hyttrek
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Beende, wenn WordPress nicht geladen ist
}

function ehy_register_portfolio_cpt() {
    $labels = array(
        'name'               => 'Portfolios',
        'singular_name'      => 'Portfolio',
        'menu_name'          => 'EHy PFs',
        'name_admin_bar'     => 'Portfolio',
        'add_new'            => 'Neu hinzufügen',
        'add_new_item'       => 'Neues Portfolio hinzufügen',
        'edit_item'          => 'Portfolio bearbeiten',
        'new_item'           => 'Neues Portfolio',
        'view_item'          => 'Portfolio ansehen',
        'search_items'       => 'Portfolios durchsuchen',
        'not_found'          => 'Keine Portfolios gefunden',
        'not_found_in_trash' => 'Keine Portfolios im Papierkorb gefunden',
        'all_items'          => 'Alle Portfolios anzeigen',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true,
        'taxonomies'         => array('category', 'post_tag'),
    );

    register_post_type( 'portfolio', $args );
}

add_action( 'init', 'ehy_register_portfolio_cpt' );