<?php
/**
 * Store Social Media Template.
 *
 * @since 1.8.7
 * @version 1.8.7
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="wcv wcv_block-store-social-media">
    <h2 class="wcv_block-store-social-media__title">
        <?php echo esc_html( $title ); ?>
    </h2>
    <div class="wcv_block-store-social-media__content">
        <?php if ( $show_heading ) : ?>
            <h3 class="wcv_block-store-social-media__heading">
                <?php echo esc_html( $heading ); ?>
            </h3>
        <?php endif; ?>
        <?php echo wcv_format_store_social_icons( $vendor_id, $icon_size, $hidden ); //phpcs:ignore ?>
</div>
