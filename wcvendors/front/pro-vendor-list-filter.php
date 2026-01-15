<?php
/**
 * Vendor List Filter Template
 *
 * This template can be overridden by copying it to yourtheme/wc-vendors/front/pro-vendor-list-filter.php
 *
 * @author        Jamie Madden, WC Vendors
 * @package       WCVendors/Templates/Front
 * @version       1.9.5
 *
 * Template Variables available
 * $display_mode : Vendor list display mode grid or list
 * $search_term : The search term to use for filtering
 * $vendors_count : The total number of vendors
 */

$active_class = array(
    'grid' => '',
    'list' => '',
);
if ( 'grid' === $display_mode ) {
    $active_class['grid'] = 'active';
} else {
    $active_class['list'] = 'active';
}
?>
<div class="wcv-vendor-list-filter">
    <div class="wcv-vendor-list-search">
        <form action="" method="GET" class="wcv-form">
            <input type="text" value="<?php echo esc_attr( $search_term ); ?>" name="vendor_search_term" id="wcv-vendor-list-search" placeholder="<?php esc_attr_e( 'Search for a vendor', 'wc-vendors' ); ?>" />
            <input type="submit" class="wcv-button" value="<?php esc_attr_e( 'Search', 'wc-vendors' ); ?>" />
        </form>
    </div>
    <div class="wcv-vendor-list-switch">
        <a href="<?php echo esc_url( add_query_arg( array( 'display_mode' => 'grid' ) ) ); ?>" class="wcv-vendor-list-switch-item <?php echo esc_attr( $active_class['grid'] ); ?>" data-view="grid" title="<?php esc_attr_e( 'Grid', 'wc-vendors' ); ?>"><span class="dashicons dashicons-grid-view"></span></a>
        <a href="<?php echo esc_url( add_query_arg( array( 'display_mode' => 'list' ) ) ); ?>" class="wcv-vendor-list-switch-item <?php echo esc_attr( $active_class['list'] ); ?>" data-view="list" title="<?php esc_attr_e( 'List', 'wc-vendors' ); ?>"><span class="dashicons dashicons-editor-justify"></span></a>
    </div>
</div>
<?php if ( $search_term ) : ?>
<div class="vendor-search-result-text">
    <?php
    if ( $vendors_count > 0 ) {
        $vendors_found_str = 1 === $vendors_count ? __( 'vendor found', 'wc-vendors' ) : __( 'vendors found', 'wc-vendors' );
        printf(
            /* translators: %1$s: number of vendors found, %2$s: vendors found string */
            esc_html__( '%1$s %2$s', 'wc-vendors' ),
            '<span class="vendor-search-result-count">' . esc_html( $vendors_count ) . '</span>',
            esc_html( $vendors_found_str )
        );
    } else {
        esc_html_e( 'No vendors found', 'wc-vendors' );
    }
    ?>
    <!-- Clear search button -->
    <a href="<?php echo esc_url( remove_query_arg( 'vendor_search_term' ) ); ?>" class="vendor-search-clear-button">
        <span class="dashicons dashicons-no-alt"></span>
    </a>
</div>
<?php endif; ?>
