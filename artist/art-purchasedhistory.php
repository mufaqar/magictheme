<?php
/* Template Name: Art Purchased */
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

                <?php if ( is_user_logged_in() ) :

                    $current_user_id = get_current_user_id();

                    $orders = wc_get_orders([
                        'customer_id' => $current_user_id,
                        'limit'       => -1,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                    ]);

                    if ( $orders ) :
                ?>

                <div class="pro_table mt-5">

                    <!-- TABLE HEADER -->
                    <ul class="pro_table_list table_head">
                        <li>Product</li>
                        <li>Order ID</li>
                        <li>Date</li>
                        <li>Customer Name</li>
                        <li>Status</li>
                        <li>Delivery Mode</li>
                        <li>Amount</li>
                        <li>Action</li>
                    </ul>

                    <?php foreach ( $orders as $order ) :

                        // Products
                        $products = [];
                        foreach ( $order->get_items() as $item ) {
                            $products[] = $item->get_name();
                        }

                        // Customer name
                        $customer_name = trim(
                            $order->get_billing_first_name() . ' ' . $order->get_billing_last_name()
                        );

                        // Delivery mode
                        $delivery_mode = '—';
                        $shipping = $order->get_shipping_methods();
                        if ( ! empty( $shipping ) ) {
                            foreach ( $shipping as $method ) {
                                $delivery_mode = $method->get_name();
                                break;
                            }
                        }
                    ?>

                    <!-- TABLE ROW -->
                    <ul class="pro_table_list">
                        <li>
                            <?php echo esc_html( implode(', ', $products) ); ?>
                        </li>

                        <li>
                            #<?php echo esc_html( $order->get_id() ); ?>
                        </li>

                        <li>
                            <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?>
                        </li>

                        <li>
                            <?php echo esc_html( $customer_name ?: 'Guest' ); ?>
                        </li>

                        <li>
                            <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
                        </li>

                        <li>
                            <?php echo esc_html( $delivery_mode ); ?>
                        </li>

                        <li>
                            <?php echo wp_kses_post( $order->get_formatted_order_total() ); ?>
                        </li>

                        <li>
                            <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </li>
                    </ul>

                    <?php endforeach; ?>
                </div>

                <?php else : ?>
                    <p>No orders found.</p>
                <?php endif; ?>

                <?php else : ?>
                    <p>Please login to view your orders.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
