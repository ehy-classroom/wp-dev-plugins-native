<?php
/**
 * Plugin Name: QAB Navigation Native
 * Description: Stellt einen nativen Gutenberg-Block für Navigation ohne Build-Tools bereit.
 * Version: 0.1.1
 * Author: Enno Hyttrek
 */

// Editor-JavaScript und Editor-CSS einbinden
add_action('enqueue_block_editor_assets', function() {
    wp_enqueue_script(
        'qab-navigation-native-js',
        plugin_dir_url(__FILE__) . 'block.js',
        array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n'),
        filemtime(__DIR__ . '/block.js')
    );

    wp_enqueue_style(
        'qab-navigation-native-css',
        plugin_dir_url(__FILE__) . 'style.css',
        array(),
        filemtime(__DIR__ . '/style.css')
    );
});

// Frontend-CSS für den Block laden
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'qab-navigation-native-css',
        plugin_dir_url(__FILE__) . 'style.css',
        array(),
        filemtime(__DIR__ . '/style.css')
    );
});

// REST-Endpoint registrieren, um Menü-HTML auszugeben
add_action('rest_api_init', function() {
    register_rest_route('qab-native/v1', '/menu/(?P<location>[a-zA-Z0-9_-]+)', array(
        'methods' => 'GET',
        'callback' => function($data) {
            $location = sanitize_text_field($data['location']);

            // wp_nav_menu gibt die HTML-Struktur eines Menüs zurück
            // container => 'ul' erzeugt KEIN <div>, sondern setzt das <ul> als Container
            // echo => false sorgt dafür, dass das Menü als String zurückgegeben wird
            $menu_html = wp_nav_menu(array(
                'theme_location' => $location,
                'container' => 'ul',
                'menu_class' => 'container',
                'echo' => false
            ));

            return array(
                'html' => $menu_html
            );
        },
        'permission_callback' => '__return_true'
    ));
});

// Optional: Menüpositionen registrieren, falls dein Theme dies nicht schon tut
// Kennzeichnung der Menüpositionen, die parallel in block.js angepasst werden müssen
add_action('after_setup_theme', function() {
    register_nav_menus(array(
        'qab-primary' => 'QAB Primary', // Parallel in block.js als Menüoption definiert
        'qab-footer'  => 'QAB Footer',  // Parallel in block.js als Menüoption definiert
        // 'qab-secondary' => 'QAB Secondary', // Beispiel für ein neues Menü
        // 'qab-language'  => 'QAB Language'    // Beispiel für ein neues Menü
    ));
});

// REST-Endpoint: Menüpositionen werden dynamisch übergeben, keine direkte Anpassung erforderlich
// Keine Änderungen erforderlich, da die Klassen vollständig über das JavaScript-Attribut gesteuert werden.
