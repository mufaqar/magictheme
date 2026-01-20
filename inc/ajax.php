<?php
/* =============================
   ENQUEUE SCRIPT
============================= */
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
        'nonce'   => wp_create_nonce('vendor_ajax_product'),
    ]);
});


/* =============================
   ADD / UPDATE PRODUCT
============================= */
add_action( 'wp_ajax_vendor_ajax_add_product', 'vendor_ajax_add_product' );

function vendor_ajax_add_product() {

    check_ajax_referer( 'vendor_ajax_product', 'vendor_nonce' );

    $user = wp_get_current_user();

    $is_vendor = in_array( 'vendor', (array) $user->roles )
        || user_can( $user->ID, 'manage_vendor_store' );

    if ( ! $is_vendor ) {
        wp_send_json_error( 'Not allowed' );
    }

    $title      = sanitize_text_field( $_POST['product_title'] );
    $price      = floatval( $_POST['product_price'] );
    $category   = absint( $_POST['product_category'] );
    $product_id = ! empty( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;
    $is_update  = $product_id > 0;

    /* ===== UPDATE ===== */
    if ( $is_update ) {

        $post = get_post( $product_id );

        if ( ! $post || $post->post_author != $user->ID || $post->post_type !== 'product' ) {
            wp_send_json_error( 'Unauthorized' );
        }

        wp_update_post([
            'ID'         => $product_id,
            'post_title' => $title,
        ]);

    }
    /* ===== CREATE ===== */
    else {

        $product_id = wp_insert_post([
            'post_title'  => $title,
            'post_type'   => 'product',
            'post_status' => 'publish', // change to pending if needed
            'post_author' => $user->ID,
        ]);

        if ( is_wp_error( $product_id ) ) {
            wp_send_json_error( 'Product creation failed' );
        }

        wp_set_object_terms( $product_id, 'simple', 'product_type' );
    }

    /* ===== COMMON DATA ===== */
    wp_set_object_terms( $product_id, [ $category ], 'product_cat' );

    update_post_meta( $product_id, '_regular_price', $price );
    update_post_meta( $product_id, '_price', $price );

    /* ===== SHAPE ATTRIBUTE (SINGLE) ===== */
    if ( ! empty( $_POST['product_attributes']['pa_shape'] ) ) {

        $shape_term = absint( $_POST['product_attributes']['pa_shape'] );

        wp_set_object_terms( $product_id, $shape_term, 'pa_shape' );

        $product    = wc_get_product( $product_id );
        $attributes = $product->get_attributes();

        $attribute = new WC_Product_Attribute();
        $attribute->set_id( wc_attribute_taxonomy_id_by_name( 'pa_shape' ) );
        $attribute->set_name( 'pa_shape' );
        $attribute->set_options( [ $shape_term ] ); // SINGLE VALUE
        $attribute->set_visible( true );
        $attribute->set_variation( false );

        $attributes['pa_shape'] = $attribute;

        $product->set_attributes( $attributes );
        $product->save();
    }

    /* ===== FEATURED IMAGE ===== */
    if ( ! empty( $_FILES['product_image']['name'] ) ) {

        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $thumb_id = media_handle_upload( 'product_image', $product_id );

        if ( ! is_wp_error( $thumb_id ) ) {
            set_post_thumbnail( $product_id, $thumb_id );
        }
    }

    wp_send_json_success( $is_update ? 'Product updated' : 'Product added' );
}


/* =============================
   GET PRODUCT (EDIT)
============================= */
add_action( 'wp_ajax_vendor_get_product', function () {

    check_ajax_referer( 'vendor_ajax_product', 'vendor_nonce' );

    $product_id = absint( $_POST['product_id'] );
    $product    = wc_get_product( $product_id );

    if ( ! $product || $product->get_author_id() != get_current_user_id() ) {
        wp_send_json_error( 'Unauthorized' );
    }

    $cats  = wp_get_post_terms( $product_id, 'product_cat', ['fields' => 'ids'] );
    $shape = wp_get_post_terms( $product_id, 'pa_shape', ['fields' => 'ids'] );

    wp_send_json_success([
        'id'       => $product_id,
        'title'    => $product->get_name(),
        'price'    => $product->get_price(),
        'category' => $cats[0] ?? '',
        'shape'    => $shape[0] ?? '', // ✅ SHAPE RETURNED
    ]);
});


/* =============================
   UNPUBLISH PRODUCT
============================= */
add_action( 'wp_ajax_vendor_unpublish_product', function () {

    check_ajax_referer( 'vendor_ajax_product', 'vendor_nonce' );

    $user       = wp_get_current_user();
    $product_id = absint( $_POST['product_id'] );
    $post       = get_post( $product_id );

    if ( ! $post || $post->post_author != $user->ID ) {
        wp_send_json_error( 'Unauthorized' );
    }

    wp_update_post([
        'ID'          => $product_id,
        'post_status' => 'draft'
    ]);

    wp_send_json_success( 'Product unpublished' );
});
