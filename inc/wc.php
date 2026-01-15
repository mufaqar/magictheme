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




