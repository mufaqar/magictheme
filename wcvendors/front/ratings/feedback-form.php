<?php
/**
 * The template for displaying the feedback form for vendor ratings
 *
 * Override this template by copying it to yourtheme/wc-vendors/front/ratings
 *
 * @package    WCVendors_Pro
 * @version    1.2.5
 */
?>

<?php wc_print_notices(); ?>

<?php if ( isset( $_GET['wcv_order_id'] ) ) : // phpcs:ignore ?>
    <div class="wcv-grid">

    <h1><?php esc_html_e( 'Rate your experience', 'wcvendors-pro' ); ?></h1>

    <p>
        <?php
        $order_statuses = array(
            'processing' => __( 'Processing', 'wcvendors-pro' ),
            'on-hold'    => __( 'On hold', 'wcvendors-pro' ),
            'completed'  => __( 'Completed', 'wcvendors-pro' ),
            'cancelled'  => __( 'Cancelled', 'wcvendors-pro' ),
            'refunded'   => __( 'Refunded', 'wcvendors-pro' ),
            'failed'     => __( 'Failed', 'wcvendors-pro' ),
        );

        $order_status = isset( $order_statuses[ $order->get_status() ] ) ? $order_statuses[ $order->get_status() ] : $order->get_status();
        printf(
            /* translators: %1$s: order number, %2$s: order date format, %3$s: order status */
            __( 'Order #<mark class="order-number">%1$s</mark> was placed on <mark class="order-date">%2$s</mark> and is currently <mark class="order-status">%3$s</mark>.', 'wcvendors-pro' ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            esc_html( $order->get_order_number() ),
            esc_html( date_i18n( get_option( 'date_format' ), strtotime( $order_date ) ) ),
            esc_html( $order_status )
        );
        ?>
    </p>

    <form method="post" name="wcv_feedback" class="wcv-form" data-parsley-validate>

        <?php
        $feedback_number = 0;

        foreach ( $products as $product ) {
            $product_id       = $product['product_id'];
            $product_feedback = wp_filter_object_list( $feedback, array( 'product_id' => $product_id ) );
            if ( ! empty( $product_feedback ) ) {
                $product_feedback = reset( $product_feedback );
            }
            $vendor_id = WCV_Vendors::get_vendor_from_product( $product_id );
            $shop_name = WCV_Vendors::is_vendor( $vendor_id )
                ? sprintf( '<a href="%s">%s</a>', esc_url( WCV_Vendors::get_vendor_shop_page( $vendor_id ) ), esc_html( WCV_Vendors::get_vendor_shop_name( $vendor_id ) ) )
                : esc_html( get_bloginfo( 'name' ) );

            $feedback_comments = $product_feedback ? $product_feedback->comments : '';
            $rating_title      = $product_feedback ? $product_feedback->rating_title : '';
            $rating            = ! empty( $product_feedback ) ? $product_feedback->rating : '';

            // Does the product exist?
            if ( is_string( get_post_status( $product['product_id'] ) ) ) {
                printf(
                    '<a href="%1$s">%2$s</a> %3$s&nbsp;%4$s</br>',
                    esc_url( get_permalink( $product_id ) ),
                    esc_html( $product['name'] ),
                    esc_html__( 'from', 'wcvendors-pro' ),
                    wp_kses_post( $shop_name )
                );
            } else {
                printf(
                    '%1$s from %2$s</br>',
                    esc_html( $product['name'] ),
                    wp_kses_post( $shop_name )
                );
            }
            ?>
            <div class="control-group">
                <label class="rating-label"><?php esc_html_e( 'Rate the product on a scale of 1 to 5. (1=Poor and 5=Excellent)', 'wcvendors-pro' ); ?></label>
                <div class="all-100">
                    <input type="hidden" id="wcv-star-rating-<?php echo esc_attr( $feedback_number ); ?>-input"
                        name="wcv-feedback[<?php echo esc_attr( $feedback_number ); ?>][star-rating]"
                        value="<?php echo esc_attr( $rating ); ?>"
                        class="star-rating-input"
                        data-fn="<?php echo esc_attr( $feedback_number ); ?>">

                    <label for="wcv-star-rating-<?php echo esc_attr( $feedback_number ); ?>"
                        id="wcv-star-rating-<?php echo esc_attr( $feedback_number ); ?>-label"
                        class="wcv_star-rating-container"
                        data-fn="<?php echo esc_attr( $feedback_number ); ?>"
                        data-star-open="<?php echo esc_url( WCV_PRO_PUBLIC_ASSETS_URL ); ?>svg/wcv-icons.svg#wcv-icon-star-o"
                        data-star-closed="<?php echo esc_url( WCV_PRO_PUBLIC_ASSETS_URL ); ?>svg/wcv-icons.svg#wcv-icon-star">

                        <?php for ( $i = 1; $i < 6; $i++ ) : ?>
                        <a href="#"
                            id="star-<?php echo esc_attr( $feedback_number . '-' . $i ); ?>"
                            class="star-icon"
                            data-fn="<?php echo esc_attr( $feedback_number ); ?>"
                            data-index="<?php echo esc_attr( $i ); ?>">
                            <?php wcvp_get_icon( 'wcv-icon wcv-icon-sm', 'wcv-icon-star-o', true ); ?>
                        </a>
                        <?php endfor; ?>
                    </label>
                </div>
                <div class="all-30"></div>
            <p></p>

            <input type="text" class="feedback-title"
                name="wcv-feedback[<?php echo esc_attr( $feedback_number ); ?>][rating_title]"
                style="width:60%"
                value="<?php echo esc_attr( $rating_title ); ?>"
                placeholder="<?php esc_attr_e( 'Title', 'wcvendors-pro' ); ?>"
                data-parsley-required="true"
                data-parsley-required-message="<?php esc_attr_e( 'Please enter a title', 'wcvendors-pro' ); ?>"/>
            <textarea name="wcv-feedback[<?php echo esc_attr( $feedback_number ); ?>][comments]"
                style="width:60%"
                placeholder="<?php esc_attr_e( 'Comments: (e.g. delivery experience, item as described, quality of customer service)', 'wcvendors-pro' ); ?>"
                data-parsley-trigger="keyup"
                data-parsley-minlength="20"
                data-parsley-minlength-message="<?php esc_attr_e( 'Your comment must be at least 20 characters long', 'wcvendors-pro' ); ?>"
            ><?php echo esc_textarea( $feedback_comments ); ?></textarea>
            <input type="hidden"
                name="wcv-feedback[<?php echo esc_attr( $feedback_number ); ?>][vendor_id]"
                value="<?php echo esc_attr( $vendor_id ); ?>">
            <input type="hidden"
                name="wcv-feedback[<?php echo esc_attr( $feedback_number ); ?>][product_id]"
                value="<?php echo esc_attr( $product_id ); ?>">
            <input type="hidden"
                name="wcv-feedback[<?php echo esc_attr( $feedback_number ); ?>][customer_id]"
                value="<?php echo esc_attr( get_current_user_id() ); ?>">
            <?php if ( $product_feedback ) : ?>
                <input type="hidden"
                    name="wcv-feedback[<?php echo esc_attr( $feedback_number ); ?>][feedback_id]"
                    value="<?php echo esc_attr( $product_feedback->id ); ?>">
            <?php endif; ?>
            <br/>

            <br/>

            <?php
            ++$feedback_number;
        }
        ?>

        <p><input type="submit" class="wcv-button" value="<?php esc_attr_e( 'Submit Feedback', 'wcvendors-pro' ); ?>"></p>
        <input type="hidden" name="wcv-order_id" value="<?php echo esc_attr( $order->get_order_number() ); ?>">
        <?php wp_nonce_field( 'wcv-submit_feedback', '_wcv-submit_feedback' ); ?>
        <input type="hidden" name="action" value="post">

    </form>
    </div>
<?php endif; ?>

<style>
    input.wcv-button {
        background-color: #0f62fe;
        color: #fff;
        border: none;
        padding: 15px 30px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input.wcv-button:hover {
        background-color: #0f62fe;
        color: #fff;
        opacity: 0.8;
    }
    
    
</style>
