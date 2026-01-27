<?php
/* =============================
   ENQUEUE SCRIPT
============================= */
add_action('wp_enqueue_scripts', function () {

    wp_enqueue_script(
            'magic-login',
            get_template_directory_uri() . '/assets/js/login.js',
            ['jquery'],
            null,
            true
        );

    wp_localize_script( 'magic-login', 'magicLogin', [
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'magic_login_nonce' ),
    ]);

    wp_enqueue_script(
        'vendor-product-js',
        get_template_directory_uri() . '/assets/js/vendor-product.js',
        ['jquery'],
        null,
        true
    );

    wp_localize_script('vendor-product-js', 'vendorAjax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('vendor_ajax_product'),
    ]);
    wp_enqueue_script(
        'wishlist-js',
        get_template_directory_uri() . '/assets/js/wishlist.js',
        ['jquery'],
        null,
        true
    );

    wp_localize_script('wishlist-js', 'wishlistAjax', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('wishlist_nonce'),
    ]);

    wp_enqueue_script(
    'vendor-profile',
    get_template_directory_uri() . '/assets/js/profile.js',
    ['jquery'],
    null,
    true
);



wp_localize_script( 'vendor-profile', 'magicProfile', [
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'nonce'    => wp_create_nonce( 'vendor_profile_nonce' ),
]);



});


/* =============================
   ADD / UPDATE PRODUCT
============================= */
add_action('wp_ajax_vendor_ajax_add_product', 'vendor_ajax_add_product');

function vendor_ajax_add_product()
{

    check_ajax_referer('vendor_ajax_product', 'vendor_nonce');

    $user = wp_get_current_user();

    $is_vendor = in_array('vendor', (array) $user->roles)
        || user_can($user->ID, 'manage_vendor_store');

    if (!$is_vendor) {
        wp_send_json_error('Not allowed');
    }

    $title = sanitize_text_field($_POST['product_title']);
    $price = floatval($_POST['product_price']);
    $category = absint($_POST['product_category']);
    $product_id = !empty($_POST['product_id']) ? absint($_POST['product_id']) : 0;
    $is_update = $product_id > 0;

    /* ===== UPDATE ===== */
    if ($is_update) {

        $post = get_post($product_id);

        if (!$post || $post->post_author != $user->ID || $post->post_type !== 'product') {
            wp_send_json_error('Unauthorized');
        }

        wp_update_post([
            'ID' => $product_id,
            'post_title' => $title,
        ]);

    }
    /* ===== CREATE ===== */ else {

        $product_id = wp_insert_post([
            'post_title' => $title,
            'post_type' => 'product',
            'post_status' => 'publish', // change to pending if needed
            'post_author' => $user->ID,
        ]);

        if (is_wp_error($product_id)) {
            wp_send_json_error('Product creation failed');
        }

        wp_set_object_terms($product_id, 'simple', 'product_type');
    }

    /* ===== COMMON DATA ===== */
    wp_set_object_terms($product_id, [$category], 'product_cat');

    update_post_meta($product_id, '_regular_price', $price);
    update_post_meta($product_id, '_price', $price);

    /* ===== SHAPE ATTRIBUTE (SINGLE) ===== */
    if (!empty($_POST['product_attributes']['pa_shape'])) {

        $shape_term = absint($_POST['product_attributes']['pa_shape']);

        wp_set_object_terms($product_id, $shape_term, 'pa_shape');

        $product = wc_get_product($product_id);
        $attributes = $product->get_attributes();

        $attribute = new WC_Product_Attribute();
        $attribute->set_id(wc_attribute_taxonomy_id_by_name('pa_shape'));
        $attribute->set_name('pa_shape');
        $attribute->set_options([$shape_term]); // SINGLE VALUE
        $attribute->set_visible(true);
        $attribute->set_variation(false);

        $attributes['pa_shape'] = $attribute;

        $product->set_attributes($attributes);
        $product->save();
    }

    /* ===== FEATURED IMAGE ===== */
    if (!empty($_FILES['product_image']['name'])) {

        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $thumb_id = media_handle_upload('product_image', $product_id);

        if (!is_wp_error($thumb_id)) {
            set_post_thumbnail($product_id, $thumb_id);
        }
    }

    wp_send_json_success($is_update ? 'Product updated' : 'Product added');
}


/* =============================
   GET PRODUCT (EDIT)
============================= */
add_action('wp_ajax_vendor_get_product', function () {

    check_ajax_referer('vendor_ajax_product', 'vendor_nonce');

    $product_id = absint($_POST['product_id']);
    $product = wc_get_product($product_id);

    if (!$product || $product->get_author_id() != get_current_user_id()) {
        wp_send_json_error('Unauthorized');
    }

    $cats = wp_get_post_terms($product_id, 'product_cat', ['fields' => 'ids']);
    $shape = wp_get_post_terms($product_id, 'pa_shape', ['fields' => 'ids']);

    wp_send_json_success([
        'id' => $product_id,
        'title' => $product->get_name(),
        'price' => $product->get_price(),
        'category' => $cats[0] ?? '',
        'shape' => $shape[0] ?? '', // ✅ SHAPE RETURNED
    ]);
});


/* =============================
   UNPUBLISH PRODUCT
============================= */
add_action('wp_ajax_vendor_unpublish_product', function () {

    check_ajax_referer('vendor_ajax_product', 'vendor_nonce');

    $user = wp_get_current_user();
    $product_id = absint($_POST['product_id']);
    $post = get_post($product_id);

    if (!$post || $post->post_author != $user->ID) {
        wp_send_json_error('Unauthorized');
    }

    wp_update_post([
        'ID' => $product_id,
        'post_status' => 'draft'
    ]);

    wp_send_json_success('Product unpublished');
});

/* =============================
   Wishlist PRODUCTS
============================= */

add_action('wp_ajax_toggle_wishlist', 'toggle_wishlist');
add_action('wp_ajax_nopriv_toggle_wishlist', 'toggle_wishlist');

function toggle_wishlist()
{
    check_ajax_referer('wishlist_nonce', 'nonce');

    if (!is_user_logged_in()) {
        wp_send_json_error(['message' => 'Login required']);
    }

    $product_id = absint($_POST['product_id']);
    $user_id = get_current_user_id();

    if (!$product_id) {
        wp_send_json_error('Invalid product');
    }

    $favorites = get_user_meta($user_id, 'favorite_products', true);
    $favorites = is_array($favorites) ? $favorites : [];

    if (in_array($product_id, $favorites)) {
        $favorites = array_diff($favorites, [$product_id]);
        $status = 'removed';
    } else {
        $favorites[] = $product_id;
        $status = 'added';
    }
    update_user_meta($user_id, 'favorite_products', array_values($favorites));

    wp_send_json_success([
        'status' => $status,
        'count' => count($favorites),       
    ]);
}




add_action( 'wp_ajax_magic_ajax_login', 'magic_ajax_login' );
add_action( 'wp_ajax_nopriv_magic_ajax_login', 'magic_ajax_login' );

function magic_ajax_login() {

    check_ajax_referer( 'magic_login_nonce', 'nonce' );

    $creds = [
        'user_login'    => sanitize_text_field( $_POST['username'] ),
        'user_password' => $_POST['password'],
        'remember'      => true,
    ];

    $user = wp_signon( $creds, false );

    if ( is_wp_error( $user ) ) {
        wp_send_json_error([
            'message' => $user->get_error_message()
        ]);
    }

   if ( in_array( 'vendor', (array) $user->roles ) ) {
    wp_send_json_success([
        'redirect' => home_url( '/artist-dashboard/' )
    ]);
}

    // Normal users
    wp_send_json_success([
        'redirect' => home_url( '/`my-account`/' )
    ]);
}


// Profile Update AJAX


add_action( 'wp_ajax_update_vendor_profile', 'magic_update_vendor_profile' );

function magic_update_vendor_profile() {

    if ( ! is_user_logged_in() ) {
        wp_send_json_error(['message' => 'Unauthorized']);
    }

    $user_id = get_current_user_id();
    $user    = wp_get_current_user();

    if ( ! in_array( 'vendor', (array) $user->roles ) ) {
        wp_send_json_error(['message' => 'Not allowed']);
    }

    // Basic fields
    update_user_meta( $user_id, 'first_name', sanitize_text_field($_POST['fname']) );
    update_user_meta( $user_id, 'last_name', sanitize_text_field($_POST['lname']) );
    update_user_meta( $user_id, 'tax_id', sanitize_text_field($_POST['tax_id']) );

    // Email update
    if ( is_email( $_POST['email'] ) ) {
        wp_update_user([
            'ID'         => $user_id,
            'user_email' => sanitize_email($_POST['email']),
        ]);
    }

    wp_send_json_success([
        'message' => 'Profile updated successfully'
    ]);
}


add_action('wp_ajax_wcv_ajax_add_product', 'wcv_ajax_add_product');

function wcv_ajax_add_product() {

    if (!is_user_logged_in() || !current_user_can('vendor')) {
        wp_send_json_error('Unauthorized');
    }

    $vendor_id = get_current_user_id();

    $product_id = wp_insert_post([
        'post_title'   => sanitize_text_field($_POST['product_title']),
        'post_content' => wp_kses_post($_POST['img_bio']),
        'post_excerpt' => sanitize_textarea_field($_POST['p_feature']),
        'post_status'  => 'publish',
        'post_type'    => 'product',
        'post_author'  => $vendor_id,
    ]);

    if (is_wp_error($product_id)) {
        wp_send_json_error('Product creation failed');
    }

    // Product type
    wp_set_object_terms($product_id, 'simple', 'product_type');

    // Price
    $price = wc_format_decimal($_POST['product_price']);
    update_post_meta($product_id, '_regular_price', $price);
    update_post_meta($product_id, '_price', $price);

    // Category
    if (!empty($_POST['category'])) {
        wp_set_post_terms($product_id, [(int)$_POST['category']], 'product_cat');
    }

    // Attribute: Shape
    if (!empty($_POST['product_attributes']['pa_shape'])) {

        $term_id = (int) $_POST['product_attributes']['pa_shape'];
        $term    = get_term($term_id, 'pa_shape');

        if ($term && !is_wp_error($term)) {

            wp_set_object_terms($product_id, [$term->slug], 'pa_shape');

            update_post_meta($product_id, '_product_attributes', [
                'pa_shape' => [
                    'name'         => 'pa_shape',
                    'value'        => '',
                    'position'     => 0,
                    'is_visible'   => 1,
                    'is_variation' => 0,
                    'is_taxonomy'  => 1,
                ],
            ]);
        }
    }

    // ✅ FEATURED IMAGE FROM AJAX UPLOAD
    if (!empty($_POST['global_product_image_id'])) {
        set_post_thumbnail($product_id, (int) $_POST['global_product_image_id']);
    }

    // WC Vendors ownership
    update_post_meta($product_id, '_wcv_vendor_id', $vendor_id);

     wp_send_json_success([
        'message' => 'Product submitted successfully 🎉',
        'redirect' => site_url('artist-dashboard/manage-portfolio/')
    ]);

     
    
}



add_action('wp_ajax_wcv_ajax_upload_product_image', 'wcv_ajax_upload_product_image');

function wcv_ajax_upload_product_image() {

    if (!is_user_logged_in() || !current_user_can('vendor')) {
        wp_send_json_error('Unauthorized');
    }

    require_once ABSPATH.'wp-admin/includes/file.php';
    require_once ABSPATH.'wp-admin/includes/media.php';
    require_once ABSPATH.'wp-admin/includes/image.php';

    $id = media_handle_upload('product_image', 0);

    if (is_wp_error($id)) {
        wp_send_json_error($id->get_error_message());
    }

    wp_send_json_success([
        'id'  => $id,
        'url' => wp_get_attachment_url($id),
    ]);
}
