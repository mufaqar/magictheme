<?php





add_action( 'wp_enqueue_scripts', function () {

    wp_enqueue_script(
        'vendor-product-js',
        get_template_directory_uri() . '/assets/js/vendor-product.js',
        ['jquery'],
        null,
        true
    );

    wp_localize_script( 'vendor-product-js', 'vendorAjax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
    ]);
});



add_action( 'wp_ajax_vendor_ajax_add_product', 'vendor_ajax_add_product' );

function vendor_ajax_add_product() {

    // Nonce check
    if ( ! isset($_POST['vendor_nonce']) ||
         ! wp_verify_nonce($_POST['vendor_nonce'], 'vendor_ajax_product') ) {
        wp_send_json_error('Security check failed');
    }

    // Vendor check (AJAX-safe)
    $user = wp_get_current_user();

    $is_vendor = in_array( 'vendor', (array) $user->roles ) 
                 || user_can( $user->ID, 'manage_vendor_store' );

    if ( ! $is_vendor ) {
        wp_send_json_error('Not allowed to add product');
    }

    // Sanitize data
    $title    = sanitize_text_field($_POST['product_title']);
    $price    = floatval($_POST['product_price']);
    $category = intval($_POST['product_category']);

    // Create product
    $product_id = wp_insert_post([
        'post_title'  => $title,
        'post_type'   => 'product',
        'post_status' => 'publish', // or pending
        'post_author' => $user->ID,
    ]);

    if ( is_wp_error($product_id) ) {
        wp_send_json_error('Product creation failed');
    }

    // Woo product setup
    wp_set_object_terms( $product_id, 'simple', 'product_type' );
    wp_set_object_terms( $product_id, [$category], 'product_cat' );

    update_post_meta( $product_id, '_regular_price', $price );
    update_post_meta( $product_id, '_price', $price );
    update_post_meta( $product_id, '_vendor_id', $user->ID );

    // Image upload
    if ( ! empty($_FILES['product_image']['name']) ) {

        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $attach_id = media_handle_upload( 'product_image', $product_id );

        if ( ! is_wp_error($attach_id) ) {
            set_post_thumbnail( $product_id, $attach_id );
        }
    }

    wp_send_json_success('Product added');
}
