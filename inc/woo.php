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

    print_r($vendors);

    ob_start(); // Start output buffering
    ?>
    <div class="container">
        <div class="row">
            <?php if ( ! empty($vendors) ) : ?>
                <?php foreach ( $vendors as $vendor ) : 
                    $vendor_id    = $vendor->ID;
                    $shop_url     = function_exists('wcv_get_vendor_shop_page') ? wcv_get_vendor_shop_page( $vendor_id ) : '#';
                    $display_name = $vendor->display_name;
                    $avatar       = get_avatar_url( $vendor_id, ['size' => 150] );
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <img src="<?php echo esc_url($avatar); ?>" class="card-img-top rounded-circle mx-auto mt-3" style="width:120px; height:120px; object-fit:cover;" alt="<?php echo esc_attr($display_name); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo esc_html($display_name); ?></h5>
                            <a href="<?php echo esc_url($shop_url); ?>" class="btn btn-primary btn-sm">Visit Shop</a>
                        </div>
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
add_shortcode( 'vendor_grid', 'custom_wcvendors_vendor_grid' );
