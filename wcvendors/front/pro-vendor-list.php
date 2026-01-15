<?php
/**
 * Pro Vendor List Template
 *
 * @author      WC Vendors
 * @package     WC Vendors Pro
 * @version     1.9.5
 */
?>
<div class="wcv-pro-vendorlist-wrapper <?php echo esc_attr( $display_mode ); ?>">
<?php
foreach ( $vendors as $vendor ) :

    $vendor_meta = array_map(
        function ( $a ) {
            return $a[0];
        },
        get_user_meta( $vendor->ID )
    );

    wc_get_template(
        'pro-vendor-list-item.php',
        array(
            'shop_link'    => WCV_Vendors::get_vendor_shop_page( $vendor->ID ),
            'shop_name'    => $vendor->pv_shop_name,
            'vendor_id'    => $vendor->ID,
            'vendor_meta'  => $vendor_meta,
            'display_mode' => $display_mode,
        ),
        'wc-vendors/front/',
        $base_dir . 'templates/front/'
    );
    endforeach;
    ?>
</div>
