<?php
/**
 * The template for displaying the vendor application form
 *
 * Override this template by copying it to yourtheme/wc-vendors/front
 *
 * @package    WCVendors_Pro
 * @version    1.7.7
 * @version    1.8.5 - Added PayPal Payout fields
 */
?>
    <form method="post" id="wcv-store-settings" action="#" class="wcv-form">

        <?php WCVendors_Pro_Store_Form::sign_up_form_data(); ?>

        <h3><?php esc_html_e( 'Vendor Application', 'wcvendors-pro' ); ?></h3>

        <?php do_action( 'wcvendors_signup_before_form' ); ?>


        <?php do_action( 'wcvendors_signup_before_notice' ); ?>

        <div class="wcv-signupnotice">
            <?php echo wp_kses_post( $vendor_signup_notice ); ?>
        </div>

        <?php do_action( 'wcvendors_signup_after_notice' ); ?>

        <br/>

        <?php do_action( 'wcvendors_signup_before_tabs' ); ?>

        <div class="wcv-tabs top" data-prevent-url-change="true">
            <?php WCVendors_Pro_Store_Form::store_form_tabs(); ?>

            <!-- Store Settings Form -->
            <div class="tabs-content" id="store">
                <div class="wcv-store-setting-section">
                    <h3 class="wcv-store-setting-section-title">
                    <?php
                    $hide_vendor_name = wc_string_to_bool( get_option( 'wcvendors_hide_signup_vendor_name', 'no' ) );

                    if ( ! $hide_vendor_name ) :
                        echo esc_html(
                            sprintf( '%s %s', wcv_get_vendor_name(), __( 'name', 'wcvendors-pro' ) )
                        );
                    endif;
                    ?>
                    </h3>

                    <!-- Vendor Name -->
                    <?php WCVendors_Pro_Store_Form::vendor_name(); ?>
                    <?php do_action( 'wcvendors_signup_after_vendor_name' ); ?>


                    <!-- Seller Info -->
                    <?php WCVendors_Pro_Store_Form::seller_info(); ?>

                    <?php do_action( 'wcvendors_signup_after_seller_info' ); ?>
                </div>
                <div class="wcv-store-setting-section">
                    <!-- Store Name -->
                    <h3 class="wcv-store-setting-section-title"><?php esc_html_e( 'Store details', 'wcvendors-pro' ); ?></h3>
                    <div class="wcv-cols-group wcv-horizontal-gutters">
                        <?php WCVendors_Pro_Store_Form::store_name( '' ); ?>
                        <?php do_action( 'wcvendors_signup_after_shop_name' ); ?>

                        <!-- Company URL -->
                        <?php do_action( 'wcvendors_signup_before_company_url' ); ?>
                        <?php WCVendors_Pro_Store_Form::company_url(); ?>
                        <?php do_action( 'wcvendors_signup_after_company_url' ); ?>
                    </div>
                    <!-- Store Description -->
                    <?php WCVendors_Pro_Store_Form::store_description(); ?>
                    <?php do_action( 'wcvendors_signup_after_shop_description' ); ?>
                </div>
                <div class="wcv-store-setting-section">
                    <h3 class="wcv-store-setting-section-title">
                        <?php esc_html_e( 'Store contact and address', 'wcvendors-pro' ); ?>
                    </h3>
                    <div class="wcv-cols-group wcv-horizontal-gutters">
                        <!-- Store Phone -->
                        <?php do_action( 'wcvendors_signup_before_store_phone' ); ?>
                        <?php WCVendors_Pro_Store_Form::store_phone(); ?>
                        <?php do_action( 'wcvendors_signup_after_store_phone' ); ?>

                        <?php WCVendors_Pro_Store_Form::store_address_country(); ?>
                    </div>
                    <?php WCVendors_Pro_Store_Form::store_address1(); ?>
                    <?php WCVendors_Pro_Store_Form::store_address2(); ?>

                    <?php WCVendors_Pro_Store_Form::store_address_city(); ?>
                    <?php WCVendors_Pro_Store_Form::store_address_state(); ?>
                    <?php WCVendors_Pro_Store_Form::store_address_postcode(); ?>
                    <!-- Store Address -->
                    <?php do_action( 'wcvendors_signup_before_address' ); ?>
                    <?php WCVendors_Pro_Store_Form::show_hide_map(); ?>
                    <?php WCVendors_Pro_Store_Form::location_picker(); ?>
                    <?php WCVendors_Pro_Store_Form::coordinates(); ?>
                    <?php WCVendors_Pro_Store_Form::store_opening_hours_form(); ?>
                    <?php do_action( 'wcvendors_signup_after_address' ); ?>
                </div>
            </div>

            <?php do_action( 'wcvendors_signup_after_store_tab' ); ?>

            <?php do_action( 'wcvendors_signup_before_payment_tab' ); ?>

            <div class="tabs-content" id="payment">
                <div class="wcv-store-setting-section">
                        <h3 class="wcv-store-setting-section-title">
                            <?php esc_html_e( 'Payout Details', 'wcvendors-pro' ); ?>
                        </h3>
                    <!-- Paypal address -->
                    <?php do_action( 'wcvendors_signup_before_paypal' ); ?>

                    <?php WCVendors_Pro_Store_Form::preferred_payout_method(); ?>

                    <div id="wcv-paypal-payout-fields" class="wcv-payout-method" style="display: none;">
                        <?php WCVendors_Pro_Store_Form::paypal_payout(); ?>
                        <?php WCVendors_Pro_Store_Form::paypal_address(); ?>
                        <?php WCVendors_Pro_Store_Form::paypal_venmo(); ?>
                    </div>

                    <!-- Bank Account  -->
                    <div id="wcv-bank-payout-fields" class="wcv-payout-method" style="display: none;">
                        <?php WCVendors_Pro_Store_Form::bank_account_name(); ?>
                        <?php WCVendors_Pro_Store_Form::bank_account_number(); ?>
                        <?php WCVendors_Pro_Store_Form::bank_name(); ?>
                        <?php WCVendors_Pro_Store_Form::bank_routing_number(); ?>
                        <?php WCVendors_Pro_Store_Form::bank_iban(); ?>
                        <?php WCVendors_Pro_Store_Form::bank_bic_swift(); ?>
                    </div>

                    <?php do_action( 'wcvendors_signup_after_paypal' ); ?>
                </div>
            </div>
            <?php do_action( 'wcvendors_signup_after_payment_tab' ); ?>

            <?php do_action( 'wcvendors_signup_before_branding_tab' ); ?>
            <div class="tabs-content" id="branding">
                <div class="wcv-store-setting-section">
                    <h3 class="wcv-store-setting-section-title">
                        <?php esc_html_e( 'Branding', 'wcvendors-pro' ); ?>
                    </h3>
                    <?php do_action( 'wcvendors_signup_before_branding' ); ?>
                    <?php WCVendors_Pro_Store_Form::store_banner(); ?>

                    <!-- Store Icon -->
                    <?php WCVendors_Pro_Store_Form::store_icon(); ?>
                    <?php do_action( 'wcvendors_signup_after_branding' ); ?>
                </div>
            </div>
            <?php do_action( 'wcvendors_signup_after_branding_tab' ); ?>

            <?php do_action( 'wcvendors_signup_before_shipping_tab' ); ?>
            <div class="tabs-content" id="shipping">
                <div class="wcv-store-setting-section">
                    <h3 class="wcv-store-setting-section-title">
                        <?php esc_html_e( 'Shipping', 'wcvendors-pro' ); ?>
                    </h3>

                    <?php do_action( 'wcvendors_signup_before_shipping' ); ?>

                    <!-- Shipping Rates -->
                    <?php WCVendors_Pro_Store_Form::vendor_shipping_type(); ?>
                    <?php WCVendors_Pro_Store_Form::shipping_rates(); ?>

                    <hr />

                    <!-- Shiping Information  -->

                    <?php WCVendors_Pro_Store_Form::product_handling_fee( $shipping_details ); ?>
                    <?php WCVendors_Pro_Store_Form::shipping_from( $shipping_details ); ?>
                    <?php WCVendors_Pro_Store_Form::shipping_address( $shipping_details ); ?>

                    <?php do_action( 'wcvendors_signup_after_shipping' ); ?>
                </div>
            </div>
            <?php do_action( 'wcvendors_signup_after_shipping_tab' ); ?>

            <?php do_action( 'wcvendors_signup_before_policies_tab' ); ?>
            <!-- Store Policy -->
            <div class="tabs-content" id="policies">
                <div class="wcv-store-setting-section">
                    <h3 class="wcv-store-setting-section-title">
                        <?php esc_html_e( 'Policies', 'wcvendors-pro' ); ?>
                    </h3>
                    <?php do_action( 'wcvendors_signup_before_policies' ); ?>

                    <?php WCVendors_Pro_Store_Form::store_policy( 'privacy', __( 'Privacy policy', 'wcvendors-pro' ) ); ?>
                    <?php WCVendors_Pro_Store_Form::store_policy( 'terms', __( 'Terms and conditions', 'wcvendors-pro' ) ); ?>
                    <?php WCVendors_Pro_Store_Form::shipping_policy( $shipping_details ); ?>
                    <?php WCVendors_Pro_Store_Form::return_policy( $shipping_details ); ?>

                    <?php do_action( 'wcvendors_signup_after_policies' ); ?>
                </div>
            </div>

            <?php do_action( 'wcvendors_signup_after_policies_tab' ); ?>

            <div class="tabs-content" id="social">
                <div class="wcv-store-setting-section">
                    <h3 class="wcv-store-setting-section-title">
                        <?php esc_html_e( 'Social', 'wcvendors-pro' ); ?>
                    </h3>
                    <?php do_action( 'wcvendors_signup_before_social' ); ?>
                    <?php WCVendors_Pro_Store_Form::render_social_media_settings(); ?>
                    <?php do_action( 'wcvendors_signup_after_social' ); ?>
                </div>
            </div>
            <?php do_action( 'wcvendors_signup_before_seo_tab' ); ?>

            <!-- Store SEO -->
            <div class="tabs-content" id="seo">
                <div class="wcv-store-setting-section">
                    <h3 class="wcv-store-setting-section-title">
                        <?php esc_html_e( 'SEO', 'wcvendors-pro' ); ?>
                    </h3>
                    <?php do_action( 'wcvendors_signup_before_seo' ); ?>
                    <!-- SEO Title -->
                    <?php WCVendors_Pro_Store_Form::seo_title(); ?>
                    <!-- Meta description -->
                    <?php WCVendors_Pro_Store_Form::seo_meta_description(); ?>
                    <!-- Meta keywords -->
                    <?php WCVendors_Pro_Store_Form::seo_meta_keywords(); ?>
                    <!-- Facebook title -->
                    <?php WCVendors_Pro_Store_Form::seo_fb_title(); ?>
                    <!-- Facebook description -->
                    <?php WCVendors_Pro_Store_Form::seo_fb_description(); ?>
                    <!-- Facebook image  -->
                    <?php WCVendors_Pro_Store_Form::seo_fb_image(); ?>
                    <!-- Twitter Title -->
                    <?php WCVendors_Pro_Store_Form::seo_twitter_title(); ?>
                    <!-- Twitter Description -->
                    <?php WCVendors_Pro_Store_Form::seo_twitter_description(); ?>
                    <!-- Twitter Image -->
                    <?php WCVendors_Pro_Store_Form::seo_twitter_image(); ?>

                    <?php do_action( 'wcvendors_signup_after_seo' ); ?>
                </div>
            </div>

            <?php do_action( 'wcvendors_signup_after_seo_tab' ); ?>

        </div>

        <?php do_action( 'wcvendors_signup_after_tabs' ); ?>

        <!-- Terms and Conditions -->
        <?php WCVendors_Pro_Store_Form::vendor_terms(); ?>

        <!-- Submit Button -->
        <!-- DO NOT REMOVE THE FOLLOWING TWO LINES -->
        <?php
        WCVendors_Pro_Store_Form::save_button(
            // translators: %s is the name used to refer to the vendor.
            sprintf( __( 'Apply to be a %s', 'wcvendors-pro' ), wcv_get_vendor_name() )
        );
        ?>

    </form>
<?php
do_action( 'wcvendors_signup_after_form' );
