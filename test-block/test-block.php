<?php
/**
 * Plugin Name: Test Block
 * Description: Ein einfacher Gutenberg-Block mit Texteingabe über die rechte Seitenleiste.
 * Version: 1.0
 * Author: Dein Name
 *
 * Diese Datei ist der Einstiegspunkt für das Plugin.
 * Hier wird festgelegt, welche JavaScript- und CSS-Dateien für den Editor und das Frontend geladen werden.
 */

// Diese Funktion lädt die Assets (JS, CSS) für den Gutenberg-Editor (Backend).
function test_block_enqueue_assets() {
    // JavaScript für den Block-Editor (block.js)
    wp_enqueue_script(
        'test-block-editor-script', // Handle (interner Name)
        plugin_dir_url(__FILE__) . 'test-block.js', // Pfad zur Datei
        array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components'), // Abhängigkeiten
        filemtime(plugin_dir_path(__FILE__) . 'test-block.js') // Versionierung (Cache-Busting über Dateidatum)
    );

    // Stylesheet nur für den Editor (editor-style.css)
    wp_enqueue_style(
        'test-block-editor-style', // Handle
        plugin_dir_url(__FILE__) . 'editor-style.css', // Pfad
        array('wp-edit-blocks'), // Abhängigkeit: Basis-Styles des Editors
        filemtime(plugin_dir_path(__FILE__) . 'editor-style.css') // Versionierung
    );
}
// Diese Assets sollen NUR im Gutenberg-Editor geladen werden.
add_action('enqueue_block_editor_assets', 'test_block_enqueue_assets');

// Diese Funktion lädt das Stylesheet für die öffentliche Website (Frontend).
function test_block_enqueue_frontend_styles() {
    // Frontend-Stylesheet (style.css)
    wp_enqueue_style(
        'test-block-style', // Handle
        plugin_dir_url(__FILE__) . 'style.css', // Pfad
        array(), // Keine speziellen Abhängigkeiten
        filemtime(plugin_dir_path(__FILE__) . 'style.css') // Versionierung
    );
}
// Diese Assets sollen NUR im Frontend geladen werden.
add_action('wp_enqueue_scripts', 'test_block_enqueue_frontend_styles');
