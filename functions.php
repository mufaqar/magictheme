<?php
function bootstrap_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'my-bootstrap-theme'),
    ));
}
add_action('after_setup_theme', 'bootstrap_theme_setup');

function bootstrap_theme_files() {
    // Bootstrap CSS (CDN)
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

    // Main stylesheet
    wp_enqueue_style('main-style', get_stylesheet_uri(), array('bootstrap-css'));

    // Bootstrap JS bundle (includes Popper)
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'bootstrap_theme_files');
?>