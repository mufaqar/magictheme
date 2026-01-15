<div class="wcv-cols-group wcv-horizontal-gutters column-group ink-stacker gutters wcv-flex wcv-flex-wrap">
    <div class="xlarge-100 large-100 medium-100 small-100 tiny-100 wcv-bottom-space">
        <div class="wcv-section">
            <h3><?php esc_html_e( 'Total Product Sold', 'wcvendors-pro' ); ?> ( <?php echo esc_html( $store_report->total_products_sold ); ?> )</h3>
            <?php $product_chart_data = $store_report->get_product_chart_data(); ?>

            <?php if ( ! $product_chart_data ) : ?>
                <p><?php esc_html_e( 'No sales for this period. Adjust your dates above and click Update, or list new products for customers to buy.', 'wcvendors-pro' ); ?></p>
            <?php else : ?>

                <canvas id="products_chart" width="350" height="150"></canvas>
                <script type="text/javascript">
                var pieData = <?php echo $product_chart_data; //phpcs:ignore ?>
                </script>

            <?php endif; ?>
        </div>
    </div>
</div>
