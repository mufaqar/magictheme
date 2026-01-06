<?php get_header(); ?>

<div class="container my-5">
    <h2 class="vm_artist_title text-center mb-4">
        Artist Products
    </h2>

    <div class="row vm_artist_gallery align-items-end">

        <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
                    global $product;

                    if ( ! is_a( $product, 'WC_Product' ) ) {
                        continue;
                    }
                    ?>

        <div class="col-md-3 work_card">
            <!-- Product Image -->
            <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
                <?php
                            echo $product->get_image(
                                'woocommerce_thumbnail',
                                [ 'class' => 'img-fluid w-100' ]
                            );
                            ?>
            </a>

            <!-- Product Info -->
            <div>
                <h6>
                    <span><?php echo esc_html( $product->get_name() ); ?></span>
                    <span><?php echo $product->get_price_html(); ?></span>
                </h6>

                <?php if ( $product->has_weight() ) : ?>
                <p>
                    <?php echo esc_html( wc_format_weight( $product->get_weight() ) ); ?>
                </p>
                <?php endif; ?>
            </div>

        </div>

        <?php endwhile; ?>

        <nav class="my-4">
            <?php the_posts_pagination(); ?>
        </nav>

        <?php else : ?>
        <p><?php esc_html_e( 'No products found.', 'my-bootstrap-theme' ); ?></p>
        <?php endif; ?>


    </div>
</div>

<?php get_footer(); ?>