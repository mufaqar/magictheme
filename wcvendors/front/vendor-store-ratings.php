<?php
/**
 * Store Ratings Block Template
 *
 * @since 1.8.7
 * @version 1.8.7
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="wcv wcv_block-store-ratings">
    <h2 class="wcv_block-store-ratings__title"><?php esc_html( $title ); ?></h2>
<?php
if ( $vendor_feedback ) {

foreach ( $vendor_feedback as $vf ) {

    $customer      = get_userdata( $vf->customer_id );
    $rating        = stripslashes( $vf->rating );
    $rating_title  = $vf->rating_title;
    $store_comment = $vf->comments;
    $post_date     = date_i18n( get_option( 'date_format' ), strtotime( $vf->postdate ) );

    // Handle deleted customers gracefully.
    if ( $customer && ! empty( $customer->display_name ) ) {
        $customer_name = ucfirst( $customer->display_name );
    } else {
        $customer_name = __( 'Unknown Customer', 'wcvendors-pro' );
    }
    $product_link  = get_permalink( $vf->product_id );
    $product_title = get_the_title( $vf->product_id );

    // Handle deleted products gracefully.
    if ( empty( $product_title ) ) {
        $product_title = __( 'Deleted Product', 'wcvendors-pro' );
        $product_link  = '#';
    }

    // This outputs the star rating.
    $stars = '';
    for ( $i = 1; $i <= $rating; $i++ ) {
        $stars .= '<svg class="wcv-icon wcv-icon-sm">
                    <use xlink:href="' . WCV_PRO_PUBLIC_ASSETS_URL . 'svg/wcv-icons.svg#wcv-icon-star"></use>
                </svg>';
    }

    for ( $i = $rating; $i < 5; $i++ ) {
        $stars .= '<svg class="wcv-icon wcv-icon-sm">
                    <use xlink:href="' . WCV_PRO_PUBLIC_ASSETS_URL . 'svg/wcv-icons.svg#wcv-icon-star-o"></use>
                </svg>';
    }
    ?>

    <h3>
    <?php
        if ( ! empty( $rating_title ) && $show_rating_title ) {
                echo esc_html( $rating_title ) . ' :: ';
        }
        echo $stars; // phpcs:ignore 
    ?>
    </h3>

    <?php if ( $show_product ) : ?>
        <p><?php esc_html_e( 'Product : ', 'wcvendors-pro' ); ?>
            <a href="<?php echo esc_url( $product_link ); ?>" target="_blank"><?php echo esc_html( $product_title ); ?></a>
        </p>
    <?php endif; ?>

    <?php if ( $show_date ) : ?>
        <span><?php echo esc_html_e( 'Posted on', 'wcvendors-pro' ); ?>&nbsp;<?php echo esc_html( $post_date ); ?></span>&nbsp;
    <?php endif; ?>

    <?php
    if ( $show_customer ) :
        // translators: %s customer name.
        printf( esc_html__( 'by %s', 'wcvendors-pro' ), esc_html( $customer_name ) );
    ?>
    <br/>
    <?php endif; ?>

    <?php if ( $show_comment ) : ?>
        <p><?php echo esc_html( $store_comment ); ?></p>
    <?php endif; ?>
    <hr/>

    <?php
}
} else {

    printf(
        // translators: %s vendor name.
        esc_html__(
            'No ratings have been submitted for this %s yet.',
            'wcvendors-pro'
        ),
        esc_html(
            wcv_get_vendor_name( true, false )
        )
    );
}
?>
</div>
