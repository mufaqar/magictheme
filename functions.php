<?php
function bootstrap_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'main_menu'    => __('Main Menu'),
        'footer_nav1'  => __('Footer Nav1'),
        'footer_nav2'  => __('Footer Nav2'),
        'footer_nav3'  => __('Footer Nav3'),
    ));
}
add_action('after_setup_theme', 'bootstrap_theme_setup');

include_once(get_template_directory() . '/inc/walker_nav.php');


function bootstrap_theme_files() {

    // Bootstrap CSS (CDN)
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

    // Slick CSS
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    // Main stylesheet
    wp_enqueue_style('main-style', get_stylesheet_uri(), array('bootstrap-css', 'slick-css'));

    // jQuery (WordPress provides it but ensure loaded)
    wp_enqueue_script('jquery');

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);

}
add_action('wp_enqueue_scripts', 'bootstrap_theme_files');
