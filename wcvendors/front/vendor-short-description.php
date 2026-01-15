<?php
/**
 * Store Short Description Block template.
 *
 * @version 1.8.7
 * @since   1.8.7
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="wcv wcv_block-store-short-description">
    <h2 class="wcv_block-store-short-description__title"><?php echo esc_html( $title ); ?></h2>
    <?php if ( $show_heading ) : ?>
        <h3 class="wcv_block-store-short-description__heading"><?php echo esc_html( $heading ); ?></h3>
    <?php endif; ?>
    <div class="wcv_block-store-short-description__content">
        <?php echo wp_kses_post( $short_description ); ?>
    </div>
</div>
