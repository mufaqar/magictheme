<?php
// Count vendor products
$product_count = count( get_posts( array(
    'post_type'   => 'product',
    'post_status' => 'publish',
    'author'      => $vendor_id,
    'fields'      => 'ids',
    'numberposts' => -1,
) ) );
?>

<div class="vendor_list">
    <div class="vendor_list_avatar">
        <a href="<?php echo esc_url( $shop_link ); ?>">
            <?php echo wp_kses_post( $avatar ); ?>
        </a>
    </div>

    <div class="vendor_list_info">
        <h3 class="vendor_list--shop-name">
            <a href="<?php echo esc_url( $shop_link ); ?>">
                <?php echo esc_html( $shop_name ); ?>
            </a>
        </h3>

        <small class="vendors_list--shop-products">
            <span class="dashicons dashicons-products"></span>
            <?php echo esc_html( $product_count ); ?> Products
        </small>
        <br />


        <a class="button vendors_list--shop-link" href="<?php echo esc_url( $shop_link ); ?>">
            <?php esc_html_e( 'View All Gallery', 'wc-vendors' ); ?>
        </a>
    </div>
</div>