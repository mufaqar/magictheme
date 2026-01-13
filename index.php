<?php get_header(); ?>

<?php
$vendor_id = get_queried_object_id(); // works on vendor page
?>

<div class="container my-5">
    <h2 class="vm_artist_title text-center mb-4">
        All Products
    </h2>

    <div class="row vm_artist_gallery">

        <?php
        $args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => 12,
            'author'         => $vendor_id,
            'paged'          => get_query_var( 'paged' ) ?: 1,
        );

        $vendor_products = new WP_Query( $args );
        ?>

        <?php if ( $vendor_products->have_posts() ) : ?>
            <?php while ( $vendor_products->have_posts() ) : $vendor_products->the_post(); ?>
                <?php global $product; ?>

                <div class="col-md-3 work_card">

                    <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
                        <?php echo $product->get_image( 'woocommerce_thumbnail', ['class'=>'img-fluid w-100'] ); ?>
                    </a>

                    <div>
                        <h6>
                            <span><?php echo esc_html( $product->get_name() ); ?></span>
                            <span><?php echo $product->get_price_html(); ?></span>
                        </h6>
                    </div>

                </div>

            <?php endwhile; ?>

            <nav class="my-4 w-100">
                <?php
                echo paginate_links( array(
                    'total' => $vendor_products->max_num_pages,
                ) );
                ?>
            </nav>

        <?php else : ?>
            <p><?php esc_html_e( 'No products found.', 'my-bootstrap-theme' ); ?></p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</div>

<?php get_footer(); ?>
