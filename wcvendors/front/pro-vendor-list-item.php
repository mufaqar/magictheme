<?php
/**
 * The Template for displaying a vendor in the vendor list shortcode
 *
 * Override this template by copying it to yourtheme/wc-vendors/front
 *
 * @package    WCVendors_Pro
 * @since      1.2.3
 * @version    1.6.3
 */

$store_icon_src   = wp_get_attachment_image_src(
    get_user_meta( $vendor_id, '_wcv_store_icon_id', true ),
    array( 150, 150 )
);
$store_icon       = '<img src="' . get_avatar_url( $vendor_id, array( 'size' => 150 ) ) . '" alt="" class="store-icon" />';
$store_banner_src = wp_get_attachment_image_src( get_user_meta( $vendor_id, '_wcv_store_banner_id', true ), 'full' );
$store_banner     = '';
$store_banner_url = WCVendors_Pro::get_option( 'default_store_banner_src' );

$shop_description   = array_key_exists( 'pv_shop_description', $vendor_meta ) ? $vendor_meta['pv_shop_description'] : '';
$store_phone        = array_key_exists( '_wcv_store_phone', $vendor_meta ) ? $vendor_meta['_wcv_store_phone'] : '';
$store_rating       = WCVendors_Pro_Ratings_Controller::get_ratings_average( $vendor_id );
$store_full_address = wcv_format_store_address( $vendor_id );

if ( is_array( $store_icon_src ) ) {
    $store_icon = '<img src="' . $store_icon_src[0] . '" alt="" class="store-icon" />';
}

if ( is_array( $store_banner_src ) ) {
    $store_banner     = '<img src="' . $store_banner_src[0] . '" alt="" class="store-banner" style="max-height: 200px;"/>';
    $store_banner_url = $store_banner_src[0];
} else {
    // Getting default banner.
    $store_banner = '<img src="' . $store_banner_url . '" alt="" class="store-banner" style="max-height: 200px;"/>';
}

?>

<div class="wcv-pro-vendorlist">
    <div class="wcv-banner-wrapper" style="background-image: url(<?php echo esc_url( $store_banner_url ); ?>);">
        <div class="wcv-inner-details">
            <div class="wcv-vendor-card">
                <?php if ( 'list' === $display_mode ) : ?>
                    <div class="wcv-store-grid__col wcv-store-grid__col--1-of-3 wcv-icon-container">
                        <?php echo wp_kses_post( $store_icon ); ?>
                        <?php if ( $store_rating ) : ?>
                            <div class="wcv-vendor-rating">
                                <span class="rating-value"><?php echo esc_html( $store_rating ); ?> <span class="dashicons dashicons-star-filled"></span></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="wcv-store-grid__col wcv-store-grid__col--2-of-3 store-info wcv-shop-details">
                        <h4><?php echo esc_html( $shop_name ); ?></h4>
                        <?php if ( $shop_description ) : ?>
                            <div class="wcv-shop-description">
                                <p><?php echo wp_kses_post( $shop_description ); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <div class="wcv-vendor-details">
                            <?php if ( $store_full_address ) : ?>
                                <div class="wcv-detail-item wcv-address">
                                    <span class="dashicons dashicons-location"></span>
                                    <span><?php echo esc_html( $store_full_address ); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ( $store_phone ) : ?>
                                <div class="wcv-detail-item wcv-phone">
                                    <span class="dashicons dashicons-phone"></span>
                                    <span><?php echo esc_html( $store_phone ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( 'grid' === $display_mode ) : ?>
                    <div class="wcv-icon-container">
                        <?php echo wp_kses_post( $store_icon ); ?>
                    </div>
                    <div class="wcv-shop-details">
                        <h4><?php echo esc_html( $shop_name ); ?></h4>
                        <?php if ( $shop_description ) : ?>
                            <div class="wcv-shop-description">
                                <p><?php echo wp_kses_post( $shop_description ); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <div class="wcv-vendor-details">
                            <?php if ( $store_full_address ) : ?>
                                <div class="wcv-detail-item wcv-address">
                                    <span class="dashicons dashicons-location"></span>
                                    <span><?php echo esc_html( $store_full_address ); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ( $store_phone ) : ?>
                                <div class="wcv-detail-item wcv-phone">
                                    <span class="dashicons dashicons-phone"></span>
                                    <span><?php echo esc_html( $store_phone ); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ( $store_rating ) : ?>
                                <div class="wcv-detail-item wcv-rating">
                                    <span class="dashicons dashicons-star-filled"></span>
                                    <span class="rating-value"><?php echo esc_html( $store_rating ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <a href="<?php echo esc_url( $shop_link ); ?>" class="wcv-view-store">
            <span class="dashicons dashicons-arrow-right-alt2"></span>
            <?php esc_html_e( 'Visit Store', 'wc-vendors-pro' ); ?>
        </a>
    </div>
</div>
