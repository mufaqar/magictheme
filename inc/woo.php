<?php

// Shortcode to display all vendors in Bootstrap 4
function custom_wcvendors_vendor_grid() {
    // Get all active vendors
    $args = array(
        'role'    => 'vendor',
        'orderby' => 'display_name',
        'order'   => 'ASC',
        // Optional: filter only public vendors
        // 'meta_query' => array(
        //     array(
        //         'key'     => 'wcv_active', // WCVendors active flag
        //         'value'   => '1',
        //         'compare' => '='
        //     )
        // )
    );

    $vendors = get_users( $args );

    
   // print_r($vendors);

    ob_start(); // Start output buffering
    ?>
<div class="container">
    <div class="row g-4">
        <?php if ( ! empty($vendors) ) : ?>
        <?php foreach ( $vendors as $vendor ) : 
                    $vendor_id    = $vendor->ID;
                    $shop_url     = function_exists('wcv_get_vendor_shop_page') ? wcv_get_vendor_shop_page( $vendor_id ) : '#';
                    $display_name = $vendor->display_name;
                    $avatar       = get_avatar_url( $vendor_id, ['size' => 150] );

                      // ✅ Count categories for this vendor
                $vendor_categories = get_woo_categories_by_user( $vendor_id );
                $category_count = count($vendor_categories);

                ?>


        <div class="card" style="width: 18rem;">
            <img src="<?php echo $avatar  ?>" class="mt-3 rounded card-img-top" alt="...">
            <hr />
            <div class="card-body text-start">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title"><?php echo esc_html($display_name); ?> </h5>

                    <a href="<?php echo home_url('/vendor?id=' . $vendor_id); ?>"
                        class="btn btn-primary btn-sm">View</a>
                </div>

                <small class="card-title "><?php echo $category_count; ?> Gallery</small>
            </div>

        </div>

        <?php endforeach; ?>
        <?php else : ?>
        <p>No vendors found.</p>
        <?php endif; ?>
    </div>
</div>
<?php
    return ob_get_clean();
}
add_shortcode( 'all_artists', 'custom_wcvendors_vendor_grid' );



// 2️⃣ Get selected category from URL
$cat_slug = isset( $_GET['product_cat'] ) ? sanitize_text_field( $_GET['product_cat'] ) : '';

// 3️⃣ Get vendor categories (only categories this vendor has products in)
function get_woo_categories_by_user( $user_id ) {
    $products = get_posts([
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'author'         => $user_id,
        'post_status'    => 'publish',
        'fields'         => 'ids',
    ]);

    $categories = [];
    foreach ( $products as $product_id ) {
        $terms = wp_get_post_terms( $product_id, 'product_cat' );
        foreach ( $terms as $term ) {
            $categories[ $term->term_id ] = $term;
        }
    }
    return $categories;
}




add_filter( 'woocommerce_get_item_data', function ( $item_data, $cart_item ) {

    if ( isset($cart_item['aspect_ratio']) ) {
        $item_data[] = [
            'key'   => 'Aspect Ratio',
            'value' => $cart_item['aspect_ratio']
        ];
    }

    return $item_data;
}, 10, 2 );

add_action(
    'woocommerce_checkout_create_order_line_item',
    function ( $item, $cart_item_key, $values ) {

        if ( isset($values['crop_data']) ) {
            $item->add_meta_data( 'Crop Data', $values['crop_data'] );
            $item->add_meta_data( 'Aspect Ratio', $values['aspect_ratio'] );
        }

    },
    10,
    3
);




add_action('pre_get_posts', function ($query) {

    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    // Run on shop, category, tag, vendor pages
    if (
        !is_shop() &&
        !is_product_category() &&
        !is_post_type_archive('product')
    ) {
        return;
    }

    /* =====================
     * CATEGORY FILTER
     * ===================== */
    if (!empty($_GET['category'])) {

        $tax_query = (array) $query->get('tax_query');

        $tax_query[] = [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($_GET['category']),
        ];

        $query->set('tax_query', $tax_query);
    }

    /* =====================
     * VENDOR FILTER
     * ===================== */
    if (!empty($_GET['vendor'])) {
        $query->set('author', absint($_GET['vendor']));
    }
});

add_action( 'template_redirect', 'wc_force_login_cart_checkout' );
function wc_force_login_cart_checkout() {
    if (
        ! is_user_logged_in() &&
        ( is_cart() || is_checkout() )
    ) {
        wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
        exit;
    }
}