<?php
/*
Plugin Name: My Basic Plugin
Version: 0.1.0
Description: A basic WordPress plugin example.
Author: Enno Hyttrek
Author URI: https://ennohyttrek.de
*/


// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit;
}


    // Add a simple admin notice to demonstrate plugin functionality
    function basic_plugin_admin_notice() {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e('Willkommen zum Basic Plugin! Dies ist eine einfache Admin-Benachrichtigung.', 'basic-plugin'); ?></p>
        </div>
        <?php
    }
    add_action('admin_notices', 'basic_plugin_admin_notice');