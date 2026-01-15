<?php
/**
 * The Template for displaying the modern store header
 *
 * Override this template by copying it to yourtheme/wc-vendors/store
 *
 * @package    WCVendors_Pro
 * @version    1.7.9
 * @version    1.8.6 - Added new actions for plugins to hook into.
 */

$store_icon             = '';
$store_icon_src         = wp_get_attachment_image_src(
    get_user_meta( $vendor_id, '_wcv_store_icon_id', true ),
    array( 150, 150 )
);
$store_banner_src       = wp_get_attachment_image_src( get_user_meta( $vendor_id, '_wcv_store_banner_id', true ), 'full' );
$store_banner_image_url = get_option( 'wcvendors_default_store_banner_src', wcv_get_default_store_banner_src() );
$hide_store_banner      = wcv_is_store_header_element_hidden( 'store_banner' );
$hide_store_icon        = wcv_is_store_header_element_hidden( 'store_icon' );
$hide_store_description = wcv_is_store_header_element_hidden( 'store_description' );
$hide_store_phone       = wcv_is_store_header_element_hidden( 'store_phone' );
$hide_store_address     = wcv_is_store_header_element_hidden( 'store_address' );
$hide_store_sales       = wcv_is_store_header_element_hidden( 'store_sales' );
$hide_store_url         = wcv_is_store_header_element_hidden( 'store_url' );
$hide_store_name        = wcv_is_store_header_element_hidden( 'store_name' );
$allowed_tags           = array(
    'svg' => array(
        'class' => array(),
    ),
    'use' => array(
        'xlink:href' => array(),
    ),
    'a'   => array(
        'href' => array(),
    ),
);

// see if the array is valid.
if ( is_array( $store_icon_src ) && ! $hide_store_icon ) {
    $store_icon = '<img src="' . $store_icon_src[0] . '" alt="' . esc_attr__( 'Store Icon', 'wcvendors-pro' ) . '" class="store-icon" />';
} else {
    $store_icon = '<img src="' . get_avatar_url( $vendor_id, array( 'size' => 150 ) ) . '" alt="' . esc_attr__( 'Store Icon', 'wcvendors-pro' ) . '" class="store-icon" />';
}

if ( is_array( $store_banner_src ) && ! $hide_store_banner ) {
    $store_banner_image_url = $store_banner_src[0];
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

// Store title.
$_store_title      = isset( $vendor_meta['pv_shop_name'] ) ? $vendor_meta['pv_shop_name'] : '';
$store_title       = ( is_product() ) ? '<a href="' . WCV_Vendors::get_vendor_shop_page( $post->post_author ) . '">' . $_store_title . '</a>' : $_store_title;
$store_description = ( array_key_exists( 'pv_shop_description', $vendor_meta ) && ! $hide_store_description ) ? $vendor_meta['pv_shop_description'] : '';

$phone = ( array_key_exists( '_wcv_store_phone', $vendor_meta ) ) ? $vendor_meta['_wcv_store_phone'] : '';

if ( $hide_store_phone ) {
    $phone = '';
}

$address = wcv_format_store_address( $vendor_id );

if ( $hide_store_address ) {
    $address = '';
}

$social_icons = wcv_format_store_social_icons( $vendor_id );
// This is where you would load your own custom meta fields if you stored any in the settings page for the dashboard.
?>

<?php do_action( 'wcv_before_vendor_store_header' ); ?>

<div class="wcv-store-header header-modern">
    <div class="upper">
        <div class="cover" style="background-image: url(<?php echo esc_attr( $store_banner_image_url ); ?>);"></div>
        <div class="info">
            <div class="avatar">
                <?php echo wp_kses_post( $store_icon ); ?>
            </div>
            <div class="about">
                <div class="name">
                    <?php if ( ! $hide_store_name ) : ?>
                        <div class="txt"><?php echo wp_kses_post( $store_title ); ?></div>
                    <?php endif; ?>
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
                </div>
                <?php if ( ! $hide_store_description ) : ?>
                    <div class="desc desc-wrapper"><?php echo wp_kses_post( $store_description ); ?></div>
                <?php endif; ?>
                <?php if ( wcv_format_store_url( $vendor_id ) && ! $hide_store_url ) : ?>
                    <p class="url"><?php echo wp_kses_post( wcv_format_store_url( $vendor_id ) ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php do_action( 'wcvendors_before_header_meta' ); ?>
    <div class="meta">
        <?php do_action( 'wcvendors_before_header_meta_ratings' ); ?>
        <?php if ( ! wcv_is_store_header_element_hidden( 'store_ratings' ) ) : ?>
            <div class="rating block">
                <div class="label">
                    <?php echo esc_html__( 'Rating', 'wcvendors-pro' ); ?>
                </div>
                <div class="stars">
                    <?php echo wp_kses( WCVendors_Pro_Ratings_Controller::ratings_link( $vendor_id, true ), $allowed_tags ); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php do_action( 'wcvendors_after_header_meta_ratings' ); ?>
        <?php do_action( 'wcvendors_before_header_meta_phone' ); ?>
        <?php if ( ! $hide_store_phone || $phone ) : ?>
            <div class="phone block">
                <div class="label">
                    <?php echo esc_html__( 'Phone', 'wcvendors-pro' ); ?>
                </div>
                <a href="tel:<?php echo esc_attr( $phone ); ?>">
                    <svg class="wcv-icon wcv-icon-sm" style="vertical-align: middle;">
                        <use xlink:href="<?php echo esc_url( WCV_PRO_PUBLIC_ASSETS_URL ); ?>svg/wcv-icons-all.svg#wcv-icon-phone"></use>
                    </svg>
                    <span style="vertical-align: middle;"><?php echo esc_html( $phone ); ?></span>
                </a>
            </div>
        <?php endif; ?>
        <?php do_action( 'wcvendors_after_header_meta_phone' ); ?>
        <?php do_action( 'wcvendors_before_header_meta_address' ); ?>
        <?php if ( ! $hide_store_address && $address ) : ?>
            <div class="address block">
                <div class="label">
                    <?php echo esc_html__( 'Address', 'wcvendors-pro' ); ?>
                </div>
                <a href="http://maps.google.com/maps?&q=<?php echo esc_attr( $address ); ?>">
                    <address>
                        <svg class="wcv-icon wcv-icon-sm" style="vertical-align: middle;">
                            <use xlink:href="<?php echo esc_url( WCV_PRO_PUBLIC_ASSETS_URL ); ?>svg/wcv-icons.svg#wcv-icon-home"></use>
                        </svg>
                        <span style="vertical-align: middle;"><?php echo esc_html( $address ); ?></span>
                    </address>
                </a>
            </div>
        <?php endif; ?>
        <?php do_action( 'wcvendors_after_header_meta_address' ); ?>
        <?php do_action( 'wcvendors_before_header_meta_social_icons' ); ?>
        <?php if ( $social_icons && ! wcv_is_store_header_element_hidden( 'store_social_media' ) ) : ?>
            <div class="social block">
                <div class="label">
                    <?php echo esc_html__( 'Social', 'wcvendors-pro' ); ?>
                </div>
                <span style="vertical-align: middle;">&nbsp; </span>
                <?php echo wp_kses( $social_icons, wcv_allowed_html_tags() ); ?>
            </div>
        <?php endif; ?>
        <?php do_action( 'wcvendors_after_header_meta_social_icons' ); ?>
        <?php do_action( 'wcvendors_before_header_meta_sales' ); ?>
        <?php if ( ! $hide_store_sales ) : ?>
            <div class="sales block">
                <div class="label">
                    <?php echo esc_html__( 'Total Sales', 'wcvendors-pro' ); ?>
                </div>
                <div class="value">
                    <svg class="wcv-icon wcv-icon-sm" style="vertical-align: middle;">
                        <use xlink:href="<?php echo esc_url( WCV_PRO_PUBLIC_ASSETS_URL ); ?>svg/wcv-icons.svg#wcv-icon-info-circle"></use>
                    </svg>
                    <?php
                    echo do_shortcode( '[wcv_pro_vendor_totalsales vendor_id="' . $vendor_id . '" position="none"]' );
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <?php do_action( 'wcvendors_after_header_meta_sales' ); ?>
    </div>
    <?php do_action( 'wcvendors_after_header_meta' ); ?>
</div>

<?php
    do_action_deprecated( 'wcv_after_vendor_store_header', array( $vendor_id ), '1.7.10', 'wcvendors_after_vendor_store_header' );
    do_action( 'wcvendors_after_vendor_store_header' );
?>
