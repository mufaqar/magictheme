<?php
/**
 * The Template for displaying a store header
 *
 * Override this template by copying it to yourtheme/wc-vendors/store
 *
 * @package     WCVendors_Pro
 * @version     1.7.9
 * @version     1.8.6
 */


$store_icon_src         = wp_get_attachment_image_src(
    get_user_meta( $vendor_id, '_wcv_store_icon_id', true ),
    array( 150, 150 )
);
$store_icon             = '';
$store_banner_src       = wp_get_attachment_image_src( get_user_meta( $vendor_id, '_wcv_store_banner_id', true ), 'full' );
$store_banner           = '';
$hide_store_banner      = wcv_is_store_header_element_hidden( 'store_banner' );
$hide_store_icon        = wcv_is_store_header_element_hidden( 'store_icon' );
$hide_store_description = wcv_is_store_header_element_hidden( 'store_description' );
$hide_store_phone       = wcv_is_store_header_element_hidden( 'store_phone' );
$hide_store_address     = wcv_is_store_header_element_hidden( 'store_address' );
$hide_store_sales       = wcv_is_store_header_element_hidden( 'store_sales' );
$hide_store_url         = wcv_is_store_header_element_hidden( 'store_url' );
$hide_store_name        = wcv_is_store_header_element_hidden( 'store_name' );
// see if the array is valid.
if ( is_array( $store_icon_src ) && ! $hide_store_icon ) {
    $store_icon = '<img src="' . $store_icon_src[0] . '" alt="' . esc_attr__( 'Store Icon', 'wcvendors-pro' ) . '" class="store-icon" />';
} else {
    $store_icon = '<img src="' . get_avatar_url( $vendor_id, array( 'size' => 150 ) ) . '" alt="' . esc_attr__( 'Store Icon', 'wcvendors-pro' ) . '" class="store-icon" />';
}

if ( is_array( $store_banner_src ) && ! $hide_store_banner ) {
    $store_banner = '<img src="' . $store_banner_src[0] . '" alt="' . esc_attr__( 'Store Banner', 'wcvendors-pro' ) . '" class="store-banner" />';
} else {
    // Getting default banner.
    $default_banner_src = get_option( 'wcvendors_default_store_banner_src', wcv_get_default_store_banner_src() );
    $store_banner       = '<img src="' . $default_banner_src . '" alt="' . esc_attr__( 'Store Banner', 'wcvendors-pro' ) . '" class="wcv-store-banner" style="max-height: 200px;"/>';
}

// Verified vendor.
$verified_vendor       = 'yes' === get_user_meta( $vendor_id, '_wcv_verified_vendor', true );
$verified_vendor_label = __( get_option( 'wcvendors_verified_vendor_label', '' ), 'wcvendors-pro' ); //phpcs:ignore

// Trusted vendor.
$trusted_vendor       = 'yes' === get_user_meta( $vendor_id, '_wcv_trusted_vendor', true );
$untrusted_vendor     = 'yes' === get_user_meta( $vendor_id, '_wcv_untrusted_vendor', true );
$trusted_vendor_label = __( get_option( 'wcvendors_trusted_vendor_label', 'Trusted Vendor' ), 'wcvendors-pro' ); //phpcs:ignore

// If both trusted and untrusted are checked, don't show trusted badge.
if ( $trusted_vendor && $untrusted_vendor ) {
    $trusted_vendor = false;
}
// $verified_vendor_icon_src    = get_option( 'wcvendors_verified_vendor_icon_src' );
// Store title
$store_title       = ( is_product() ) ? '<a href="' . WCV_Vendors::get_vendor_shop_page( $post->post_author ) . '">' . $vendor_meta['pv_shop_name'] . '</a>' : $vendor_meta['pv_shop_name'];
$store_description = ( array_key_exists( 'pv_shop_description', $vendor_meta ) ) ? $vendor_meta['pv_shop_description'] : '';

// Migrate to store address array.
$phone = ( array_key_exists( '_wcv_store_phone', $vendor_meta ) ) ? $vendor_meta['_wcv_store_phone'] : '';
if ( $hide_store_phone ) {
    $phone = '';
}
// This is where you would load your own custom meta fields if you stored any in the settings page for the dashboard.

$address = wcv_format_store_address( $vendor_id );
?>

<?php do_action( 'wcv_before_vendor_store_header' ); ?>

<div class="wcv-header-container">

    <div class="wcv-store-grid wcv-store-header">

        <div id="banner-wrap">

            <?php echo wp_kses_post( $store_banner ); ?>

            <div id="inner-element">

                <?php if ( ! empty( $store_icon ) ) : ?>

                    <div class="wcv-store-grid__col wcv-store-grid__col--1-of-3  store-brand">
                        <div class="store-icon-img">
                            <?php echo wp_kses( $store_icon, wcv_allowed_html_tags() ); ?>
                        </div>
                        <?php if ( ! wcv_is_store_header_element_hidden( 'store_social_media' ) ) : ?>
                        <div class="social-icons-container">
                            <?php echo wp_kses( wcv_format_store_social_icons( $vendor_id ), wcv_allowed_html_tags() ); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $store_icon ) ) : ?>
                <div class="wcv-store-grid__col wcv-store-grid__col--2-of-3 store-info">
                    <?php else : ?>
                    <div class="wcv-store-grid__col wcv-store-grid__col--3-of-3 store-info">
                        <?php endif; ?>
                        <?php do_action( 'wcv_before_vendor_store_title' ); ?>
                        <?php if ( ! $hide_store_name ) : ?>
                            <h3><?php echo wp_kses_post( $store_title ); ?></h3>
                        <?php endif; ?>
                        <?php do_action( 'wcv_after_vendor_store_title' ); ?>
                        <?php do_action( 'wcv_before_vendor_store_rating' ); ?>
                        <?php
                        if ( ! wcv_is_store_header_element_hidden( 'store_ratings' ) ) {
                            echo wp_kses_post( WCVendors_Pro_Ratings_Controller::ratings_link( $vendor_id, true ) );
                        }
                        ?>
                        <?php do_action( 'wcv_after_vendor_store_rating' ); ?>
                        <?php do_action( 'wcv_before_vendor_store_description' ); ?>
                        <?php if ( $verified_vendor || $trusted_vendor ) : ?>
                            <div class="wcv-vendor-badges">
                                <?php if ( $verified_vendor ) : ?>
                                    <div class="wcv-vendor-badge wcv-verified-vendor">
                                        <?php wcvp_get_icon( 'wcv-icon wcv-icon-xs', 'wcv-icon-verified' ); ?>
                                        <span class="badge-text"><?php echo esc_html__( $verified_vendor_label, 'wcvendors-pro' ); //phpcs:ignore ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $trusted_vendor ) : ?>
                                    <div class="wcv-vendor-badge wcv-trusted-vendor">
                                        <?php wcvp_get_icon( 'wcv-icon wcv-icon-xs', 'wcv-icon-trusted' ); ?>
                                        <span class="badge-text"><?php echo esc_html( $trusted_vendor_label ); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! $hide_store_description ) : ?>
                            <div class="desc-wrapper"><?php echo wp_kses_post( $store_description ); ?></div>
                        <?php endif; ?>
                        <?php if ( ! $hide_store_url || wcv_format_store_url( $vendor_id ) ) : ?>
                            <p><?php echo wp_kses_post( wcv_format_store_url( $vendor_id ) ); ?></p>
                        <?php endif; ?>
                        <?php do_action( 'wcv_after_vendor_store_description' ); ?>
                        <?php do_action( 'wcvendors_before_header_store_icon' ); ?>
                        <?php if ( empty( $store_icon ) && ! wcv_is_store_header_element_hidden( 'store_social_media' ) ) : ?>
                            <?php echo wp_kses_post( wcv_format_store_social_icons( $vendor_id ) ); ?>
                        <?php endif; ?>
                        <?php do_action( 'wcvendors_after_header_store_icon' ); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="wcv-store-address-container wcv-store-grid ">
        <?php do_action( 'wcvendors_before_header_meta_address' ); ?>
        <div class="wcv-store-grid__col wcv-store-grid__col--2-of-4 store-address">
            <?php if ( ! $hide_store_address && $address ) : ?>
            <a href="http://maps.google.com/maps?&q=<?php echo esc_attr( $address ); ?>">
                <address>
                    <?php wcvp_get_icon( 'wcv-icon wcv-icon-sm wcv-icon-middle', 'wcv-icon-plane' ); ?>
                    <span class="wcv-address-text" style="vertical-align: middle;"><?php echo esc_html( $address ); ?></span>
                    </address>
                </a>
            <?php endif; ?>
        </div>
        <?php do_action( 'wcvendors_after_header_meta_address' ); ?>
        <?php do_action( 'wcvendors_before_header_meta_phone' ); ?>
        <div class="wcv-store-grid__col wcv-store-grid__col--1-of-4 store-phone">
            <?php if ( ! $hide_store_phone || '' !== $phone ) : ?>
            <a href="tel:<?php echo esc_attr( $phone ); ?>">
                <?php wcvp_get_icon( 'wcv-icon wcv-icon-sm wcv-icon-middle', 'wcv-icon-phone' ); ?>
                <span class="wcv-phone-text" style="vertical-align: middle;"><?php echo esc_html( $phone ); ?></span>
                </a>
            <?php endif; ?>
        </div>
        <?php do_action( 'wcvendors_after_header_meta_phone' ); ?>
        <?php do_action( 'wcvendors_before_header_meta_sales' ); ?>
        <?php if ( ! $hide_store_sales ) : ?>
            <div class="wcv-store-grid__col wcv-store-grid__col--1-of-4 store-sales">
                <?php wcvp_get_icon( 'wcv-icon wcv-icon-sm wcv-icon-middle', 'wcv-icon-info-circle' ); ?>
                <?php
                $label = WCVendors_Pro_Vendor_Controller::get_total_sales_label( $vendor_id, 'store' );
                echo do_shortcode( '[wcv_pro_vendor_totalsales vendor_id="' . $vendor_id . '" label="' . $label . '"]' );
                ?>
            </div>
        <?php endif; ?>
        <?php do_action( 'wcvendors_after_header_meta_sales' ); ?>
    </div>

    <?php
        do_action_deprecated( 'wcv_after_vendor_store_header', array(), '1.7.10', 'wcvendors_after_vendor_store_header' );
        do_action( 'wcvendors_after_vendor_store_header' );
    ?>
