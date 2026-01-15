<?php
/**
 * Recent Products Block
 *
 * @since 1.8.7
 * @version 1.8.7
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( $products ) :
?>

<div class="wcv wcv_block-store-recent-product">
    <h2 class="wcv_block-store-recent-product__title"><?php echo esc_html( $title ); ?></h2>
<?php

foreach ( $products as $product_id ) {

    $product = wc_get_product( $product_id );

    $average_rating = WCVendors_Pro_Ratings_Controller::get_product_average_rating( $product->get_id() );
    $product_link   = $product->get_permalink();
    $product_title  = $product->get_title();
    $excerpt        = $product->get_short_description();
    $image          = wp_get_attachment_image_src(
        $product->get_image_id(),
        array( '50', '50' ),
        '',
        array( 'class' => 'img-responsive' )
    );
    $stars          = '';
    for ( $i = 1; $i <= stripslashes( $average_rating ); $i++ ) {
        $stars .= '<svg class="wcv-icon wcv-icon-sm">
                    <use xlink:href="' . WCV_PRO_PUBLIC_ASSETS_URL . 'svg/wcv-icons.svg#wcv-icon-star"></use>
                </svg>';
    }

    for ( $i = stripslashes( $average_rating ); $i < 5; $i++ ) {
        $stars .= '<svg class="wcv-icon wcv-icon-sm">
                    <use xlink:href="' . WCV_PRO_PUBLIC_ASSETS_URL . 'svg/wcv-icons.svg#wcv-icon-star-o"></use>
                </svg>';
    }
    ?>

    <div class="wcv-widget-product">
        <?php do_action( 'wcvendors_pro_widget_product_item_start' ); ?>

        <a href="<?php echo esc_url( $product_link ); ?>">
            <?php echo $show_image ? wp_kses_post( $product->get_image( $image_size ) ) : ''; ?>
            <span class="product-title"><?php echo esc_html( $product_title ); ?></span>
        </a>

        <?php if ( $show_ratings && ! empty( $stars ) ) : ?>
            <br/>
            <?php echo  $stars; // phpcs:ignore ?>
        <?php endif; ?>
        <br/>
        <?php echo $product->get_price_html(); // phpcs:ignore ?>

        <?php
        if ( $show_excerpt && ! empty( $excerpt ) ) :
            printf( '<p>%s</p>', wp_kses_post( substr( $excerpt, 0, $excerpt_length ) ) );
        endif;
        ?>

        <?php do_action( 'wcvendors_pro_widget_product_item_end' ); ?>
    </div>

    <hr/>

    <?php
}
?>
</div>
<?php
else :
    echo esc_html_e( 'No products found.', 'wcvendors-pro' );
endif;

