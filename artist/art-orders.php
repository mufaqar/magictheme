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

  
    </style>

    <div class="dashboard-container">
        <!-- Header Section -->
        <div class="dashboard-header">
            <h1 class="dashboard-title">Orders</h1>            
            <!-- Filter Section -->
            <div class="filter-section">
                <span class="filter-label">Search by</span>
                <div class="filter-dropdown">
                    <span>All</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                
                <span class="filter-label">Status</span>
                <div class="filter-dropdown">
                    <span>All</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                
                <span class="filter-label">Start Date - End Date</span>
                <div class="filter-date">
                    <i class="far fa-calendar-alt"></i>
                    <span>28 Jan. 2021 - 28 Dec. 2021</span>
                </div>
            </div>
            
            <!-- Status Tabs -->
            <div class="status-tabs">
                <div class="status-tab active">All (1)</div>
                <div class="status-tab">Shipped (1)</div>
                <div class="status-tab">In Production (1)</div>
                <div class="status-tab">On Hold (0)</div>
                <div class="status-tab">Delivered (0)</div>
                <div class="status-tab">Cancelled (0)</div>
            </div>
        </div>
        
        <!-- Divider -->
        <div class="divider"></div>
        
        <!-- Order Cards -->
        <div class="row">
            <!-- New Order Card -->
            <div class="col-md-4">
                <div class="order-card new-order">
                    <div class="order-icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="order-title">New Order</div>
                    <div class="order-count">245</div>
                    <div class="order-impression">
                        <i class="fas fa-chart-line impression-up"></i>
                        <span>impression 20%</span>
                    </div>
                </div>
            </div>
            
            <!-- In Production Order Card -->
            <div class="col-md-4">
                <div class="order-card production-order">
                    <div class="order-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="order-title">In Production Order</div>
                    <div class="order-count">110</div>
                    <div class="order-impression">
                        <i class="fas fa-chart-line impression-up"></i>
                        <span>impression 18%</span>
                    </div>
                </div>
            </div>
            
            <!-- Delivered Order Card -->
            <div class="col-md-4">
                <div class="order-card delivered-order">
                    <div class="order-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="order-title">Delivered Order</div>
                    <div class="order-count">150</div>
                    <div class="order-impression">
                        <i class="fas fa-chart-line impression-up"></i>
                        <span>impression 12%</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional information section (optional) -->
        <div class="mt-4 text-center text-muted small">
            <p>Dashboard updated in real-time. Last updated: Today, 10:30 AM</p>
        </div>
    </div>


   





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

