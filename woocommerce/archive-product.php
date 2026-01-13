<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Breadcrumb
 */
get_template_part(
    'template-parts/breadcrumb',
    null,
    [
        'title' => woocommerce_page_title( false ),
    ]
);

/**
 * Required WooCommerce hook
 */
//do_action( 'woocommerce_before_main_content' );
?>

<section class="categories-section">
    <div class="container">
        <div class="row">

            <?php
            /**
             * WooCommerce Main Product Loop
             * Works for:
             * - Shop page
             * - Product category archive
             */
            if ( woocommerce_product_loop() ) :

                while ( have_posts() ) :
                    the_post();
                    ?>

                    <div class="col-md-3 mb-4">
                        <div class="product-box text-center h-100">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'medium', [ 'class' => 'img-fluid' ] );
                                }
                                ?>
                                <h3 class="mt-2 h6">
                                    <?php the_title(); ?>
                                </h3>
                            </a>
                        </div>
                    </div>

                <?php
                endwhile;

            else :
                ?>
                <div class="col-12">
                    <p class="text-center">
                        <?php esc_html_e( 'No products found.', 'your-theme-textdomain' ); ?>
                    </p>
                </div>
            <?php endif; ?>

        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-12 text-center">
                <?php woocommerce_pagination(); ?>
            </div>
        </div>

    </div>
</section>

<?php
/**
 * Required WooCommerce hook
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
