<?php

/**
* Plugin Name: Hide span
* Plugin URI: http://www.gideaonline.com/
* Description: This module hide the span with class phoneHide and show span with class phone.
* Version: 1.0 or whatever version of the plugin (pretty self explanatory)
* Author: Roberto Morais
* Author URI: 
* License: GNU
*/

// for front end
add_action('wp_enqueue_scripts', 'load_my_scripts');

function load_my_scripts() {
        wp_enqueue_script('script', '/wp-content/plugins/hidespan/js/hidespan.js');
        wp_enqueue_style('css', '/wp-content/plugins/hidespan/css/hidespan.css');
}