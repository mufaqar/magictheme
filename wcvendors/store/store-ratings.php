<?php
/**
 * The Template for displaying the store ratings
 *
 * Override this template by copying it to yourtheme/wc-vendors/store
 *
 * @package    WCVendors_Pro
 * @version    1.2.5
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$vendor_shop     = urldecode( get_query_var( 'vendor_shop' ) );
$vendor_id       = WCV_Vendors::get_vendor_id( $vendor_shop );
$vendor_feedback = WCVendors_Pro_Ratings_Controller::get_vendor_feedback( $vendor_id );
$vendor_shop_url = WCV_Vendors::get_vendor_shop_page( $vendor_id );

get_header( 'shop' ); ?>

<?php do_action( 'woocommerce_before_main_content' ); ?>

    <h1 class="page-title"><?php esc_html_e( 'Customer ratings', 'wcvendors-pro' ); ?></h1>

<div class="wcv-stars-rating">
    <?php
    if ( $vendor_feedback ) {
        foreach ( $vendor_feedback as $vf ) {
            $customer      = get_userdata( $vf->customer_id );
            $rating        = $vf->rating;
            $rating_title  = $vf->rating_title;
            $feedback_text = $vf->comments; // Renamed to avoid conflict with global $comment.
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

            // Generate star rating using our improved method.
            $stars  = '';
            $rating = stripslashes( $rating );

            // Add a container div with a class for styling.
            $stars .= '<div class="wcv-rating-stars">';

            // Full stars.
            for ( $i = 1; $i <= $rating; $i++ ) {
                $stars .= wcvp_get_icon( 'wcv-icon wcv-icon-sm wcv-star-filled', 'wcv-icon-star', false );
            }

            // Empty stars.
            for ( $i = $rating; $i < 5; $i++ ) {
                $stars .= wcvp_get_icon( 'wcv-icon wcv-icon-sm wcv-star-empty', 'wcv-icon-star-o', false );
            }

            // Add rating value as text for accessibility.
            $stars .= '<span class="wcv-rating-value">' . esc_html( $rating ) . ' ' . esc_html__( 'out of 5 stars', 'wcvendors-pro' ) . '</span>';

            $stars .= '</div>';
            ?>

            <div class="wcv-rating-item">
                <h4 class="wcv-rating-title">
                    <?php if ( ! empty( $rating_title ) ) : ?>
                        <?php echo esc_html( $rating_title ); ?>
                    <?php endif; ?>
                </h4>
                
                <?php echo wp_kses( $stars, wcv_allowed_html_tags() ); ?>
                
                <div class="wcv-rating-meta">
                    <span class="wcv-rating-product">
                        <?php esc_html_e( 'Product: ', 'wcvendors-pro' ); ?>
                        <a href="<?php echo esc_url( $product_link ); ?>" target="_blank"><?php echo esc_html( $product_title ); ?></a>
                    </span>
                    <br/>
                    <span class="wcv-rating-date">
                        <?php esc_html_e( 'Posted on ', 'wcvendors-pro' ); ?><?php echo esc_html( $post_date ); ?>
                    </span>
                    <span class="wcv-rating-author">
                        <?php esc_html_e( ' by ', 'wcvendors-pro' ); ?>
                        <?php echo esc_html( $customer_name ); ?>
                    </span>
                </div>
                
                <p class="wcv-rating-comment"><?php echo esc_html( $feedback_text ); ?></p>
            </div>

            <?php
        }
    } else {
        echo esc_html__( 'No ratings have been submitted for this', 'wcvendors-pro' ) . ' ' .
            esc_html( wcv_get_vendor_name( true, false ) ) . ' ' .
            esc_html__( 'yet.', 'wcvendors-pro' );
    }
    ?>
</div>

<h3><a href="<?php echo esc_url( $vendor_shop_url ); ?>"><?php esc_html_e( 'Return to store', 'wcvendors-pro' ); ?></a></h3>

<?php do_action( 'woocommerce_after_main_content' ); ?>

<?php do_action( 'woocommerce_sidebar' ); ?>

<?php get_footer( 'shop' ); ?>
