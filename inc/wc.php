<?php

add_action( 'init', function () {
    add_rewrite_endpoint( 'add-gallery', EP_ROOT | EP_PAGES );
});

add_filter( 'woocommerce_account_menu_items', function ( $items ) {

    if ( ! is_user_logged_in() ) {
        return $items;
    }

    $user = wp_get_current_user();

    // Only vendors
    if ( ! in_array( 'vendor', (array) $user->roles ) ) {
        return $items;
    }

    $new_items = [];

    foreach ( $items as $key => $label ) {
        $new_items[$key] = $label;

        // Insert after Dashboard
        if ( $key === 'dashboard' ) {
            $new_items['add-gallery'] = __( 'Add Gallery', 'textdomain' );
        }
    }

    return $new_items;
});


add_action( 'woocommerce_account_add-gallery_endpoint', function () {
    wc_get_template( 'myaccount/add-gallery.php' );
});




// Redirect after login for all users (WC Vendors compatible)
add_filter('woocommerce_login_redirect', 'custom_wc_login_redirect', 10, 2);

function custom_wc_login_redirect($redirect, $user) {
    // Optional: check user role if you want to redirect only vendors
    if (in_array('vendor', (array) $user->roles)) {
        $redirect = wc_get_account_endpoint_url('add-gallery'); // my-account/add-gallery/
    }

    return $redirect;
}


// Vendor Dashboard first & remove default dashboard for vendors
add_filter('woocommerce_account_menu_items', 'vendor_dashboard_first', 99);

function vendor_dashboard_first($items) {

    if (is_user_logged_in() && in_array('vendor', wp_get_current_user()->roles)) {

        // Remove default dashboard
        unset($items['dashboard']);

        // Create new menu with Vendor Dashboard on top
        $new_items = [
            'vendor-dashboard' => __('Dashboard', 'textdomain'),
        ];

        // Merge remaining items after
        $items = $new_items + $items;
    }

    return $items;
}
add_filter( 'wcv_dashboard_pages_nav', 'custom_wcv_dashboard_menu', 20 );

function custom_wcv_dashboard_menu( $pages ) {

    // Remove unwanted items
    unset( $pages['dashboard_home'] );
    unset( $pages['commission'] );
    unset( $pages['earnings'] );
    unset( $pages['rating'] );
    unset( $pages['reviews'] );
    unset( $pages['reports'] );
    unset( $pages['shop_coupon'] );
    unset( $pages['product'] );

    // Rename Settings to Profile
    if ( isset( $pages['settings'] ) ) {
        $pages['settings']['label'] = __( 'Profile', 'your-textdomain' );
    }

    return $pages;
}



add_filter( 'woocommerce_account_menu_items', 'remove_woo_account_items_for_vendors', 99 );

function remove_woo_account_items_for_vendors( $items ) {

    // Only for logged-in users
    if ( ! is_user_logged_in() ) {
        return $items;
    }

    $user = wp_get_current_user();

    // WC Vendors vendor role
    if ( in_array( 'vendor', (array) $user->roles, true ) ) {

        unset( $items['orders'] );          // Orders
        unset( $items['edit-address'] );    // Addresses
        unset( $items['edit-account'] );    // Account details
        // unset( $items['downloads'] );     // Optional
        // unset( $items['payment-methods'] ); // Optional
    }

    return $items;
}
