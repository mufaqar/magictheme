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
include_once(get_template_directory() . '/inc/woo.php');
include_once(get_template_directory() . '/inc/extra.php');


function bootstrap_theme_files() {

    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );

    wp_enqueue_style(
        'slick-css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css'
    );

    wp_enqueue_style(
        'slick-theme-css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css'
    );

    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri(),
        array('bootstrap-css', 'slick-css')
    );

    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script(
        'slick-js',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        array('jquery'),
        null,
        true
    );

   if ( is_product() ) {

    wp_enqueue_style(
        'cropper-css',
        'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css',
        [],
        '1.6.1'
    );

    wp_enqueue_script(
        'cropper-js',
        'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js',
        ['jquery'],
        '1.6.1',
        true
    );

    wp_enqueue_script(
        'product-cropper',
        get_stylesheet_directory_uri() . '/assets/js/product-cropper.js',
        ['jquery', 'cropper-js'],
        null,
        true
    );
}

}
add_action('wp_enqueue_scripts', 'bootstrap_theme_files');




function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');




