<?php
/**
 * The template for displaying store search form
 *
 * NOTE: DO NOT REMOVE THE HIDDEN FIELD 'wcv_vendor_id' this will break the search
 *
 * This template can be overridden by copying it to yourtheme/wc-vendors/front/vendor-searchform.php.
 *
 * @package    WCVendors_Pro
 * @version    1.8.7
 * @since      1.4.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$widget_title = isset( $title ) ? $title : __( 'Search store', 'wcvendors-pro' );
?>
<div class="wcv wcv_block-store-search">
	<h2 class="wcv_block-store-search__title"><?php echo esc_html( $widget_title ); ?></h2>
	<form role="search" method="get" class="wcv-store-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label class="screen-reader-text"
			for="wcv-store-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'wcvendors-pro' ); ?></label>
		<input type="search" id="wcv-store-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"
			class="search-field" placeholder="<?php echo esc_attr__( 'Search store&hellip;', 'wcvendors-pro' ); ?>"
			value="<?php echo get_search_query(); ?>" name="s"/>
		<input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wcvendors-pro' ); ?>"/>
		<input type="hidden" name="post_type" value="product"/>
		<input type="hidden" name="wcv_vendor_id" value="<?php echo esc_attr( $vendor_id ); ?>"/>
	</form>
</div>