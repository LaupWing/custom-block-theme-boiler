<?php
/**
 * Theme Functions
 */

// Disable WordPress default block styles (use Tailwind instead)
function customblocktheme_disable_wp_styles() {
    wp_dequeue_style('wp-block-library');        // Core blocks
    wp_dequeue_style('wp-block-library-theme');  // Theme blocks
    wp_dequeue_style('global-styles');           // Global styles
    wp_dequeue_style('classic-theme-styles');    // Classic theme styles
}
add_action('wp_enqueue_scripts', 'customblocktheme_disable_wp_styles', 100);

// Enqueue Tailwind CSS for Frontend
function customblocktheme_enqueue_styles() {
    $css_file = get_theme_file_path('build/index.css');
    $version = file_exists($css_file) ? filemtime($css_file) : '1.0.0';

    wp_enqueue_style(
        'customblocktheme-tailwind',
        get_theme_file_uri('build/index.css'),
        array(),
        $version
    );
}
add_action('wp_enqueue_scripts', 'customblocktheme_enqueue_styles');

// Enqueue Tailwind CSS for Block Editor (Site Editor)
function customblocktheme_enqueue_editor_styles() {
    $css_file = get_theme_file_path('build/index.css');
    $version = file_exists($css_file) ? filemtime($css_file) : '1.0.0';

    wp_enqueue_style(
        'customblocktheme-tailwind-editor',
        get_theme_file_uri('build/index.css'),
        array(),
        $version
    );
}
add_action('enqueue_block_editor_assets', 'customblocktheme_enqueue_editor_styles');

// Enqueue Google Fonts (Frontend + Editor)
function customblocktheme_enqueue_fonts() {
    wp_enqueue_style(
        'customblocktheme-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'customblocktheme_enqueue_fonts');
add_action('enqueue_block_editor_assets', 'customblocktheme_enqueue_fonts');

// Theme Setup
function customblocktheme_theme_setup() {
    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add editor stylesheet
    add_editor_style(array(
        'build/index.css',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap'
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 96,
        'width'       => 150,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'custom-block-theme'),
    ));
}
add_action('after_setup_theme', 'customblocktheme_theme_setup');
