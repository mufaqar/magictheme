<?php
/**
 * The Template for displaying the product ratings in the product panel
 *
 * Override this template by copying it to yourtheme/wc-vendors/front/ratings
 *
 * @package    WCVendors_Pro
 * @version    1.2.3
 */

// This outputs the star rating with improved styling.
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

// translators: %s is the numerical rating value.
$stars .= '<span class="wcv-rating-value">' . sprintf( __( '%s out of 5 stars', 'wcvendors-pro' ), $rating ) . '</span>';

$stars .= '</div>';
?>

<div class="wcv-stars-rating">
    <div class="wcv-rating-item">
        <h4 class="wcv-rating-title">
            <?php if ( ! empty( $rating_title ) ) : ?>
                <?php echo esc_html( $rating_title ); ?>
            <?php endif; ?>
        </h4>
        
        <?php echo wp_kses( $stars, wcv_allowed_html_tags() ); ?>
        
        <div class="wcv-rating-meta">
            <span class="wcv-rating-date">
                <?php esc_html_e( 'Posted on ', 'wcvendors-pro' ); ?><?php echo esc_html( $post_date ); ?>
            </span>
            <span class="wcv-rating-author">
                <?php esc_html_e( ' by ', 'wcvendors-pro' ); ?>
                <?php echo esc_html( $customer_name ); ?>
            </span>
        </div>
        
        <p class="wcv-rating-comment"><?php echo esc_html( $comment ); ?></p>
    </div>
</div>
