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
    // Ensure product exists and belongs to current user
    $post = get_post($product_id);
    $product = wc_get_product($product_id);

    if ( ! $product || ! $post || $post->post_author != get_current_user_id() ) {
        wp_send_json_error('Unauthorized');
    }

    $cats = wp_get_post_terms($product_id, 'product_cat', ['fields' => 'ids']);
    $shape = wp_get_post_terms($product_id, 'pa_shape', ['fields' => 'ids']);

    // Get featured image
    $image_id = get_post_thumbnail_id($product_id);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    $image_thumbnail = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : '';

    wp_send_json_success([
        'id' => $product_id,
        'title' => $product->get_name(),
        'price' => $product->get_price(),
        'category' => $cats[0] ?? '',
        'shape' => $shape[0] ?? '',
        'image_id' => $image_id,
        'image_url' => $image_url,
        'image_thumbnail' => $image_thumbnail,
        'img_bio' => $product->get_description(),
        'p_feature' => $product->get_short_description(),
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
   DELETE PRODUCT
============================= */
add_action('wp_ajax_wcv_ajax_delete_product', 'wcv_ajax_delete_product');

function wcv_ajax_delete_product() {

    check_ajax_referer('vendor_ajax_product', 'vendor_nonce');

    if (!is_user_logged_in() || !current_user_can('vendor')) {
        wp_send_json_error('Unauthorized');
    }

    $product_id = absint($_POST['product_id']);
    $post = get_post($product_id);

    if (!$post || $post->post_type !== 'product' || $post->post_author != get_current_user_id()) {
        wp_send_json_error('Unauthorized');
    }

    // Move product to trash
    wp_trash_post($product_id);

    wp_send_json_success('Product deleted');
}


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


// Change Password AJAX
add_action('wp_ajax_change_vendor_password', 'magic_change_vendor_password');

function magic_change_vendor_password() {

    check_ajax_referer('vendor_profile_nonce', 'nonce');

    if ( ! is_user_logged_in() ) {
        wp_send_json_error(['message' => 'Unauthorized']);
    }

    $user_id = get_current_user_id();
    $user    = wp_get_current_user();

    if ( ! in_array( 'vendor', (array) $user->roles ) ) {
        wp_send_json_error(['message' => 'Not allowed']);
    }

    $current = isset($_POST['current_password']) ? wp_unslash($_POST['current_password']) : '';
    $new     = isset($_POST['new_password']) ? wp_unslash($_POST['new_password']) : '';
    $confirm = isset($_POST['confirm_password']) ? wp_unslash($_POST['confirm_password']) : '';

    if ( empty( $current ) || empty( $new ) || empty( $confirm ) ) {
        wp_send_json_error(['message' => 'Please fill all fields']);
    }

    if ( $new !== $confirm ) {
        wp_send_json_error(['message' => 'New password and confirm password do not match']);
    }

    if ( strlen( $new ) < 6 ) {
        wp_send_json_error(['message' => 'Password must be at least 6 characters']);
    }

    if ( ! wp_check_password( $current, $user->user_pass, $user_id ) ) {
        wp_send_json_error(['message' => 'Current password is incorrect']);
    }

    // Set new password
    wp_set_password( $new, $user_id );

    // Re-authenticate user to keep the session active
    wp_set_current_user( $user_id );
    wp_set_auth_cookie( $user_id );

    wp_send_json_success(['message' => 'Password updated successfully']);
}


// Close Account AJAX
add_action('wp_ajax_close_vendor_account', 'magic_close_vendor_account');

function magic_close_vendor_account() {

    check_ajax_referer('vendor_profile_nonce', 'nonce');

    if ( ! is_user_logged_in() ) {
        wp_send_json_error(['message' => 'Unauthorized']);
    }

    $user_id = get_current_user_id();
    $user    = wp_get_current_user();

    if ( ! in_array( 'vendor', (array) $user->roles ) ) {
        wp_send_json_error(['message' => 'Not allowed']);
    }

    $confirm = isset($_POST['confirm_text']) ? sanitize_text_field($_POST['confirm_text']) : '';
    $feedback = isset($_POST['feedback']) ? sanitize_textarea_field($_POST['feedback']) : '';

    if ( strtoupper($confirm) !== 'CLOSE' ) {
        wp_send_json_error(['message' => 'Invalid confirmation text']);
    }

    // Send feedback to admin email for review (non-blocking)
    if ( ! empty( $feedback ) ) {
        $admin_email = get_option('admin_email');
        $subject = 'User closed account - ID ' . $user_id;
        $message = "User ID: {$user_id}\nUser Email: {$user->user_email}\nFeedback:\n{$feedback}";
        wp_mail( $admin_email, $subject, $message );
    }

    // Delete user
    $deleted = wp_delete_user( $user_id );

    if ( ! $deleted ) {
        wp_send_json_error(['message' => 'Could not delete account, please contact support']);
    }

    wp_send_json_success(['message' => 'Your account has been closed', 'redirect' => home_url('/')]);
}


// Artist Add Product AJAX

add_action('wp_ajax_wcv_ajax_add_product', 'wcv_ajax_add_product');

function wcv_ajax_add_product() {

    if (!is_user_logged_in() || !current_user_can('vendor')) {
        wp_send_json_error('Unauthorized');
    }

    $vendor_id = get_current_user_id();

    $product_id = !empty($_POST['product_id']) ? absint($_POST['product_id']) : 0;

    // Update existing product
    if ($product_id) {
        $post = get_post($product_id);
        if (!$post || $post->post_author != $vendor_id || $post->post_type !== 'product') {
            wp_send_json_error('Unauthorized');
        }

        wp_update_post([
            'ID' => $product_id,
            'post_title'   => sanitize_text_field($_POST['product_title']),
            'post_content' => wp_kses_post($_POST['img_bio']),
            'post_excerpt' => sanitize_textarea_field($_POST['p_feature']),
        ]);

    } else {
        // Create new product
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
    $returned_image = null;
    if (!empty($_POST['global_product_image_id'])) {
        $thumb_id = (int) $_POST['global_product_image_id'];

        // Try the normal API first
        set_post_thumbnail($product_id, $thumb_id);

        // Double-check and fallback to direct meta update if needed
        if (get_post_thumbnail_id($product_id) != $thumb_id) {
            update_post_meta($product_id, '_thumbnail_id', $thumb_id);
        }

        // Ensure attachment is attached to the product (helps some themes/plugins)
        if (get_post($thumb_id)) {
            wp_update_post(['ID' => $thumb_id, 'post_parent' => $product_id]);
        }

        // Ensure attachment metadata exists (generate if missing)
        $meta = wp_get_attachment_metadata($thumb_id);
        if (empty($meta)) {
            require_once ABSPATH . 'wp-admin/includes/image.php';
            $file = get_attached_file($thumb_id);
            if (file_exists($file)) {
                $meta = wp_generate_attachment_metadata($thumb_id, $file);
                if (!empty($meta)) wp_update_attachment_metadata($thumb_id, $meta);
            }
        }

        $returned_image = [
            'id'        => $thumb_id,
            'url'       => wp_get_attachment_url($thumb_id),
            'thumbnail' => wp_get_attachment_image_url($thumb_id, 'thumbnail'),
        ];
    }

    // WC Vendors ownership
    update_post_meta($product_id, '_wcv_vendor_id', $vendor_id);

    $response = [
        'message' => 'Product submitted successfully 🎉',
        'redirect' => site_url('artist-dashboard/manage-portfolio/')
    ];

    if ($returned_image) {
        $response['image'] = $returned_image;
    }

    wp_send_json_success($response);

     
    
}


// Artist Add Product AJAX - IMAGE UPLOAD First Step
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
        'id'        => $id,
        'url'       => wp_get_attachment_url($id),
        'thumbnail' => wp_get_attachment_image_url($id, 'thumbnail'),
    ]);
}



add_action( 'wp_ajax_upload_vendor_image', 'magic_upload_vendor_image' );

function magic_upload_vendor_image() {

    check_ajax_referer( 'vendor_profile_nonce', 'nonce' );

    if ( ! is_user_logged_in() ) {
        wp_send_json_error(['message' => 'Not logged in']);
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    if ( empty( $_FILES['file'] ) ) {
        wp_send_json_error(['message' => 'No file']);
    }

    $user_id = get_current_user_id();
    $type    = sanitize_text_field( $_POST['type'] );

    $attachment_id = media_handle_upload( 'file', 0 );

    if ( is_wp_error( $attachment_id ) ) {
        wp_send_json_error(['message' => $attachment_id->get_error_message()]);
    }

    update_user_meta( $user_id, 'profile_' . $type, $attachment_id );

    wp_send_json_success([
        'url' => wp_get_attachment_url( $attachment_id )
    ]);
}


add_action('wp_ajax_wcv_save_shop_settings', 'wcv_save_shop_settings');

function wcv_save_shop_settings() {

    if (!is_user_logged_in() || !current_user_can('vendor')) {
        wp_send_json_error('Unauthorized');
    }

    $user_id = get_current_user_id();

    // Core shop info
    update_user_meta($user_id, 'pv_shop_name', sanitize_text_field($_POST['shopname']));
    update_user_meta($user_id, 'pv_shop_description', sanitize_textarea_field($_POST['bio']));

    // Socials (WC Vendors native keys)
    update_user_meta($user_id, '_wcv_facebook_url', esc_url_raw($_POST['fb']));
    update_user_meta($user_id, '_wcv_youtube_url', esc_url_raw($_POST['youtube']));
    update_user_meta($user_id, '_wcv_company_url', esc_url_raw($_POST['website']));

    // Username-based fields
    update_user_meta(
        $user_id,
        '_wcv_instagram_username',
        sanitize_text_field(ltrim(parse_url($_POST['insta'], PHP_URL_PATH), '/'))
    );

    update_user_meta(
        $user_id,
        '_wcv_twitter_username',
        sanitize_text_field(ltrim(parse_url($_POST['twitter'], PHP_URL_PATH), '/'))
    );

    /**
     * TikTok (using LinkedIn key as custom reuse)
     * Works, but consider creating a new key later
     */
    update_user_meta($user_id, '_wcv_linkedin_url', esc_url_raw($_POST['tiktok']));

    wp_send_json_success('Shop settings saved successfully ✅');
}


add_action('wp_ajax_nopriv_vm_signup', 'vm_signup_callback');
function vm_signup_callback() {
    if(!isset($_POST['email'], $_POST['password'], $_POST['role'])) {
        wp_send_json_error(['message' => 'Invalid submission']);
    }

    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $role = sanitize_text_field($_POST['role']);
    $username = isset($_POST['username']) ? sanitize_user($_POST['username']) : sanitize_user(current(explode('@', $email)));

    if(email_exists($email) || username_exists($username)) {
        wp_send_json_error(['message' => 'Email or username already exists']);
    }

    // Create user
    $user_id = wp_create_user($username, $password, $email);
    if(is_wp_error($user_id)) {
        wp_send_json_error(['message' => $user_id->get_error_message()]);
    }

    // Set role
    $user = new WP_User($user_id);
    $user->set_role($role);

    // For vendor, set shop name if provided
    if($role === 'vendor' && !empty($_POST['shop_name'])) {
        update_user_meta($user_id, 'pv_shop_name', sanitize_text_field($_POST['shop_name']));
    }

    // Optional: newsletter checkbox
    if(isset($_POST['newsletter']) && $_POST['newsletter'] === 'on') {
        update_user_meta($user_id, 'newsletter', 1);
    }

    // Optional: login user automatically
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);

  $redirect = ($role === 'vendor')
    ? home_url('/artist-dashboard')
    : wc_get_page_permalink('myaccount');

wp_send_json_success([
    'message' => 'Signup successful!',
    'redirect' => $redirect
]);
}