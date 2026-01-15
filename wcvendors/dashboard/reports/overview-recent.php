<div class="wcv_recent wcv_recent_orders wcv-cols-group wcv-horizontal-gutters column-group ink-stacker gutters wcv-flex wcv-flex-wrap">
    <div class="xlarge-100 large-100 medium-100 small-100 tiny-100 wcv-bottom-space">
        <div class="wcv-section">

        <?php if ( ! $orders_disabled ) : ?>
            <div class="wcv-flex wcv-flex-align-center">
                <h3 class="no-margin"><?php esc_html_e( 'Recent Orders', 'wcvendors-pro' ); ?></h3>
                <a href="<?php echo esc_url( WCVendors_Pro_Dashboard::get_dashboard_page_url( 'order' ) ); ?>"
                    class="wcv-view-more">
                    <?php esc_html_e( 'View All', 'wcvendors-pro' ); ?>
                </a>
            </div>
        <?php endif; ?>

        <?php $recent_orders = $pro_store_report->recent_orders_table( $store_report->orders ); ?>
        </div>
    </div>
    <div class="xlarge-100 large-100 medium-100 small-100 tiny-100 wcv-bottom-space">
        <div class="wcv-section">
            <?php if ( ! $products_disabled ) : ?>
                <div class="wcv-flex wcv-flex-align-center">
                    <h3 class="no-margin"><?php esc_html_e( 'Recent Products', 'wcvendors-pro' ); ?></h3>
                    <a
                        href="<?php echo esc_url( WCVendors_Pro_Dashboard::get_dashboard_page_url( 'product' ) ); ?>"
                        class="wcv-view-more">
                        <?php esc_html_e( 'View All', 'wcvendors-pro' ); ?>
                    </a>
                </div>

            <?php endif; ?>
            <?php $recent_products = $pro_store_report->recent_products_table(); ?>
        </div>
    </div>
</div>
