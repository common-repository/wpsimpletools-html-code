<?php

/*
 * Plugin Name: WpSimpleTools HTML Code Snippet
 * Description: Adds a field in 'Appearance' menu to manage pure HTML code in page footer (for script tags, analytics, css).
 * Author: WpSimpleTools
 * Author URI: https://profiles.wordpress.org/wpsimpletools/#content-plugins
 * Version: 1.0.9
 * Plugin Slug: wpsimpletools-html-code
 * Text Domain: wpsimpletools-html-code
 */
if (! defined('ABSPATH')) {
    die("Don't call this file directly.");
}

//
function wpst_hc_customize_register($wp_customize) {

    $wp_customize->add_setting('html_code', array(
        'default' => '<script></script>'
    ));
    
    $wp_customize->add_section('html_code', array(
        'title' => __('Footer HTML code', 'wpsimpletools-html-code'),
        'priority' => 25
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'html_code', array(
        'label' => __('HTML code', 'wpsimpletools-html-code'),
        'section' => 'html_code',
        'settings' => 'html_code',
        'type' => 'textarea'
    )));
}

function wpst_hc_insert_code() {

    echo PHP_EOL . PHP_EOL . '<!-- WpSimpleTools HTML Code Snippet -->' . PHP_EOL;
    if (get_theme_mod('html_code'))
        echo get_theme_mod('html_code');
    echo PHP_EOL . '<!-- https://wordpress.org/plugins/wpsimpletools-html-code/ -->' . PHP_EOL . PHP_EOL;
}

add_action('customize_register', 'wpst_hc_customize_register');
add_action('wp_footer', 'wpst_hc_insert_code');
