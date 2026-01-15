<?php
/**
 * The template for displaying vendor search form
 *
 * This template can be overridden by copying it to yourtheme/wc-vendors/front/vendor-search-form.php.
 *
 * @package    WCVendors_Pro
 * @since      1.5.6
 * @version    1.5.6
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$vendors_page_id  = get_option( 'wcvendors_vendors_page_id', null );
$vendors_page_url = is_numeric( $vendors_page_id ) ? esc_url( get_permalink( $vendors_page_id ) ) : esc_url( home_url( '/vendors' ) );
$page_content     = ! is_null( $vendors_page_id ) ? get_post( $vendors_page_id )->post_content : '';

// Determine which input name to use based on shortcode presence.
$is_free_shortcode = ! empty( $page_content ) && has_shortcode( $page_content, 'wcv_vendorslist' );
$input_name        = $is_free_shortcode ? 'search' : 'vendor_search_term';
$search_param      = $is_free_shortcode ? 'search' : 'vendor_search_term';

// Get and sanitize search term.
$search_term = isset( $_GET[ $search_param ] ) ? sanitize_text_field( wp_unslash( $_GET[ $search_param ] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

// Unique ID for the search field.
$search_field_id = 'wcv-vendor-search-field-' . ( isset( $index ) ? absint( $index ) : 0 );

// Placeholder text.
$placeholder = sprintf(
    /* translators: %s: vendor name */
    __( 'Search %s&hellip;', 'wcvendors-pro' ),
    wcv_get_vendor_name()
);
?>
<form role="search" method="get" class="wcv-vendor-search" action="<?php echo esc_url( $vendors_page_url ); ?>">
    <label class="screen-reader-text" for="<?php echo esc_attr( $search_field_id ); ?>">
        <?php esc_html_e( 'Search for:', 'wcvendors-pro' ); ?>
    </label>
    <input 
        type="search" 
        id="<?php echo esc_attr( $search_field_id ); ?>"
        class="search-field"
        placeholder="<?php echo esc_attr( $placeholder ); ?>"
        value="<?php echo esc_attr( $search_term ); ?>"
        name="<?php echo esc_attr( $input_name ); ?>"
        <?php /* translators: %s: vendor name */ ?>
        aria-label="<?php echo esc_attr( sprintf( __( 'Search for %s', 'wcvendors-pro' ), wcv_get_vendor_name() ) ); ?>"
    />
    <input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wcvendors-pro' ); ?>" />
</form>
