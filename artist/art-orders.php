<?php
/* Template Name: Artist Orders */
get_header();


?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/artist.css">

<main class="profile_edit_main container mt-5">
    <div class="row">
        <div class="col-md-3">
            <?php get_template_part('template-parts/profile-edit-side'); ?>
        </div>
       <div class="col-md-9 profile_content">
    <div class="profile_box">

        <?php
        if ( is_user_logged_in() ) {

            $current_user_id = get_current_user_id();

            $orders = wc_get_orders( array(
                'customer_id' => $current_user_id,
                'limit'       => -1,
                'orderby'     => 'date',
                'order'       => 'DESC',
            ) );

            if ( ! empty( $orders ) ) :
        ?>

            <div class="order_table mt-5">
                <ul class="order_table_list">
                    <li><span>Order</span></li>
                    <li><span>Date</span></li>
                    <li><span>Status</span></li>
                    <li><span>Total</span></li>
                    <li><span>View</span></li>
                </ul>
                <?php foreach ( $orders as $order ) : ?>

                    <ul class="order_table_list">
                        <li>
                            <span>#<?php echo $order->get_id(); ?></span>
                        </li>

                        <li>
                            <span><?php echo wc_format_datetime( $order->get_date_created() ); ?></span>
                        </li>

                        <li>
                            <span><?php echo wc_get_order_status_name( $order->get_status() ); ?></span>
                        </li>

                        <li>
                            <span><?php echo $order->get_formatted_order_total(); ?></span>
                        </li>

                        <li>
                            <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </li>
                    </ul>

                <?php endforeach; ?>

            </div>

        <?php
            else :
                echo '<p>No orders found.</p>';
            endif;

        } else {
            echo '<p>Please login to view your orders.</p>';
        }
        ?>

    </div>
</div>

    </div>
</main>



<?php get_footer(); ?>

