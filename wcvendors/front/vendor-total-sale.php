<?php
/**
 * Block store total sales template
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$temp_lable = $show_label ? $label : '';

?>
<div class="wcv wcv_block-store-total-sale">
    <h2 class="wcv_block-store-total-sale__title"><?php echo esc_html( $title ); ?></h2>
    <?php
        if ( $display_before_label ) {
            echo sprintf( '<span class="wcv-store-total-sales-num">%s</span><span class="wcv-store-total-sales-label"> %s</span>', esc_html( $total_sales ), esc_html( $temp_lable ) );
        } else {
            echo sprintf( '<span class="wcv-store-total-sales-label">%s</span><span class="wcv-store-total-sales-num"> %s</span>', esc_html( $temp_lable ), esc_html( $total_sales ) );
        }
    ?>
</div>
