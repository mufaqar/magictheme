<?php
/* Template Name: Artist Purchased History */
get_header();


?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/artist.css">
<main class="profile_edit_main container mt-5 mb-5">
    <div class="row">
        <div class="col-md-3">
            <?php get_template_part('template-parts/profile-edit-side'); ?>
        </div>
        <div class="col-md-9 profile_content">
            <div class="dashboard-container">
                <!-- Header Section -->
                <div class="dashboard-header">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="dashboard-title col-md-3">Purchased History</h1>
                        <!-- Filter Section -->
                        <div class="filter-section col-md-9">
                            <div class="col-md-4">
                                <span class="filter-label">Search by</span>
                                <select class="filter-dropdown">
                                    <option>All</option>
                                    <option>Product</option>
                                    <option>Order ID</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <span class="filter-label">Status</span>
                                <select class="filter-dropdown">
                                    <option>All</option>
                                    <option>Shipped</option>
                                    <option>In Production</option>
                                    <option>On Hold</option>
                                    <option>Delivered</option>
                                    <option>Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="filter-label">Start Date</span>
                                <input type="date" class="filter-date" />
                            </div>

                            <div class="col-md-12">
                                <form class="vm-search flex-grow-1 position-relative" action="">
                                    <input type="text" name="s" class="form-control vm-search-input"
                                        placeholder="Search...">
                                    <button type="submit" class="vm-search-button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- Status Tabs -->
                    <div class="status-tabs">
                        <div class="status-tab active">All <span>(01)</span></div>
                        <div class="status-tab">Shipped <span>(0)</span></div>
                        <div class="status-tab">In Production <span>(1)</span></div>
                        <div class="status-tab">On Hold <span>(0)</span></div>
                        <div class="status-tab">Delivered <span>(0)</span></div>
                        <div class="status-tab">Cancelled <span>(0)</span></div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="divider"></div>

                <!-- Order Cards -->
                <div class="row">
                    <!-- New Order Card -->
                    <div class="col-md-4">
                        <div class="order-card new-order">
                            <div class="order-title">New Order</div>
                            <div class="order-impression">
                                <div class="order-count">245</div>
                                <span>impression 20%</span>
                            </div>
                        </div>
                    </div>

                    <!-- In Production Order Card -->
                    <div class="col-md-4">
                        <div class="order-card production-order">

                            <div class="order-title">In Production Order</div>

                            <div class="order-impression">
                                <div class="order-count">110</div>
                                <span>impression 18%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Delivered Order Card -->
                    <div class="col-md-4">
                        <div class="order-card delivered-order">

                            <div class="order-title">Delivered Order</div>

                            <div class="order-impression">
                                <div class="order-count">150</div>
                                <span>impression 12%</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>








            <div class="">

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

                <div class="order_table">
                    <ul class="order_table_list table_header">
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


<script>
// Add interactivity to status tabs
document.addEventListener('DOMContentLoaded', function() {
    const statusTabs = document.querySelectorAll('.status-tab');

    statusTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            statusTabs.forEach(t => t.classList.remove('active'));
            // Add active class to clicked tab
            this.classList.add('active');

            // In a real application, you would filter orders based on the selected status
            console.log(`Filtering by: ${this.textContent}`);
        });
    });

    // Add interactivity to filter dropdowns
    const filterDropdowns = document.querySelectorAll('.filter-dropdown');

    filterDropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function() {
            // In a real application, you would show a dropdown menu here
            console.log('Opening filter dropdown');
        });
    });
});
</script>