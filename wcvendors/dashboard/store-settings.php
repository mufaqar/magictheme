<?php
/**
 * The template for displaying the store settings form
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/
 *
 * @package    WCVendors_Pro
 * @version    1.7.10
 * @version    1.8.5 - Added PayPal Payout fields
 * @version    1.9.2 - Pro dashboard to Free
 */

$settings_social = (array) get_option( 'wcvendors_hide_settings_social' );
$social_total    = count( $settings_social );
$social_count    = 0;
foreach ( $settings_social as $value ) {
    if ( 1 === (int) $value ) {
        ++$social_count;
    }
}

?>

<?php do_action( 'wcvendors_settings_before_branding_tab' ); ?>
<div class="tabs-content" id="branding">

    <div class="wcv-store-setting-section">
        <h3 class="wcv-store-setting-section-title">
            <?php esc_html_e( 'Store Design & Identity', 'wcvendors-pro' ); ?>
        </h3>
        <?php do_action( 'wcvendors_settings_before_branding' ); ?>

            <!-- Store Banner -->
            <?php WCVendors_Pro_Store_Form::store_banner(); ?>

            <!-- Store Icon -->
            <?php WCVendors_Pro_Store_Form::store_icon(); ?>

        <?php do_action( 'wcvendors_settings_after_branding' ); ?>
    </div>
</div>
<?php do_action( 'wcvendors_settings_after_branding_tab' ); ?>

<?php do_action( 'wcvendors_settings_before_shipping_tab' ); ?>
<div class="tabs-content" id="shipping">
    <div class="wcv-store-setting-section">
        <h3 class="wcv-store-setting-section-title">
            <?php esc_html_e( 'Shipping Settings & Rates', 'wcvendors-pro' ); ?>
        </h3>
        <?php do_action( 'wcvendors_settings_before_shipping' ); ?>
        <div class="control-group no-margin">
        <!-- Shipping Rates -->
        <?php WCVendors_Pro_Store_Form::vendor_shipping_type(); ?>
        <?php WCVendors_Pro_Store_Form::shipping_rates(); ?>
        </div>
        <?php do_action( 'wcvendors_settings_after_shipping' ); ?>

        <!-- Shiping Information  -->

        <?php WCVendors_Pro_Store_Form::product_handling_fee( $shipping_details ); ?>
        <?php WCVendors_Pro_Store_Form::shipping_from( $shipping_details ); ?>
        <?php WCVendors_Pro_Store_Form::shipping_address( $shipping_details ); ?>
    </div>
</div>
<?php do_action( 'wcvendors_settings_after_shipping_tab' ); ?>

<?php do_action( 'wcvendors_settings_before_social_tab' ); ?>
<?php if ( $social_count !== $social_total ) : ?>
    <div class="tabs-content" id="social">
        <div class="wcv-store-setting-section">
            <h3 class="wcv-store-setting-section-title">
                <?php esc_html_e( 'Social Media Links', 'wcvendors-pro' ); ?>
            </h3>
            <?php do_action( 'wcvendors_settings_before_social' ); ?>
            <?php WCVendors_Pro_Store_Form::render_social_media_settings(); ?>
            <?php do_action( 'wcvendors_settings_after_social' ); ?>
        </div>
    </div>
<?php endif; ?>
<?php do_action( 'wcvendors_settings_after_social_tab' ); ?>

<?php do_action( 'wcvendors_settings_before_policies_tab' ); ?>

<!-- Store Policy -->
<div class="tabs-content" id="policies">
    <div class="wcv-store-setting-section">
        <h3 class="wcv-store-setting-section-title">
            <?php esc_html_e( 'Store Policies & Terms', 'wcvendors-pro' ); ?>
        </h3>
        <?php do_action( 'wcvendors_settings_before_policies' ); ?>

        <?php WCVendors_Pro_Store_Form::store_policy( 'privacy', __( 'Privacy policy', 'wcvendors-pro' ) ); ?>
        <?php WCVendors_Pro_Store_Form::store_policy( 'terms', __( 'Terms and conditions', 'wcvendors-pro' ) ); ?>
        <?php WCVendors_Pro_Store_Form::shipping_policy( $shipping_details ); ?>
        <?php WCVendors_Pro_Store_Form::return_policy( $shipping_details ); ?>

        <?php do_action( 'wcvendors_settings_after_policies' ); ?>
    </div>
</div>

<?php do_action( 'wcvendors_settings_after_policies_tab' ); ?>

<?php do_action( 'wcvendors_settings_before_seo_tab' ); ?>

<!-- Store SEO -->
<div class="tabs-content" id="seo">

        <?php do_action( 'wcvendors_settings_before_seo' ); ?>
        <div class="wcv-store-setting-section">
        <h3 class="wcv-store-setting-section-title">
            <?php esc_html_e( 'Search Engine Optimization (SEO)', 'wcvendors-pro' ); ?>
        </h3>
        <!-- SEO Title -->
        <?php WCVendors_Pro_Store_Form::seo_title(); ?>
        </div>
        <div class="wcv-store-setting-section">
        <h3 class="wcv-store-setting-section-title">
            <?php esc_html_e( 'META', 'wcvendors-pro' ); ?>
        </h3>
        <!-- Meta description -->
        <?php WCVendors_Pro_Store_Form::seo_meta_description(); ?>
        <!-- Meta keywords -->
        <?php WCVendors_Pro_Store_Form::seo_meta_keywords(); ?>
        </div>
        <div class="wcv-store-setting-section">
        <h3 class="wcv-store-setting-section-title">
            <?php esc_html_e( 'Facebook', 'wcvendors-pro' ); ?>
        </h3>
        <!-- Facebook title -->
        <?php WCVendors_Pro_Store_Form::seo_fb_title(); ?>
        <!-- Facebook description -->
        <?php WCVendors_Pro_Store_Form::seo_fb_description(); ?>
        <!-- Facebook image  -->
        <label class="wcv-sub-heading" style="margin-bottom: 16px;"><?php esc_html_e( 'Facebook Image', 'wcvendors-pro' ); ?></label>
        <?php WCVendors_Pro_Store_Form::seo_fb_image(); ?>
        </div>
        <div class="wcv-store-setting-section">
        <h3 class="wcv-store-setting-section-title">
            <?php esc_html_e( 'X (formerly Twitter) ', 'wcvendors-pro' ); ?>
        </h3>
        <!-- Twitter Title -->
        <?php WCVendors_Pro_Store_Form::seo_twitter_title(); ?>
        <!-- Twitter Description -->
        <?php WCVendors_Pro_Store_Form::seo_twitter_description(); ?>
        <!-- Twitter Image -->
        <label class="wcv-sub-heading" style="margin-bottom: 16px;"><?php esc_html_e( 'X (Twitter) Image', 'wcvendors-pro' ); ?></label>
        <?php WCVendors_Pro_Store_Form::seo_twitter_image(); ?>
        </div>

        <?php do_action( 'wcvendors_settings_after_seo' ); ?>
</div>

<?php do_action( 'wcvendors_settings_after_seo_tab' ); ?>
