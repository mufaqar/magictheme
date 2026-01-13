<?php

add_action( 'init', function () {
    add_rewrite_endpoint( 'add-gallery', EP_ROOT | EP_PAGES );
});

add_filter( 'woocommerce_account_menu_items', function ( $items ) {

    $new_items = [];

    foreach ( $items as $key => $label ) {
        $new_items[$key] = $label;

        if ( $key === 'dashboard' ) {
            $new_items['add-gallery'] = 'Add Gallery';
        }
    }

    return $new_items;
});


add_action( 'woocommerce_account_add-gallery_endpoint', function () {
    wc_get_template( 'myaccount/add-gallery.php' );
});





