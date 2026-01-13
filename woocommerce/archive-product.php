<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Vendor info
 */
$vendor_id   = isset( $_GET['vendor_id'] ) ? intval( $_GET['vendor_id'] ) : 0;
$vendor_name = $vendor_id
    ? get_the_author_meta( 'display_name', $vendor_id )
    : single_term_title( '', false );

/**
 * Breadcrumb
 */
get_template_part(
    'template-parts/breadcrumb',
    null,
    [
        'title' => "Shop"
    ]
);
?>

<section class="categories-section">
    <div class="container">
        <div class="row">

            <?php
            /**
             * Products by vendor
             */
          

                $args = [
                    'post_type'      => 'product',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
               //     'author'         => $vendor_id,
                ];

                $products = new WP_Query( $args );

                if ( $products->have_posts() ) :
                    while ( $products->have_posts() ) :
                        $products->the_post();

                        $product_id = get_the_ID();
                        ?>
            <div class="col-md-3 mb-4">
                <div class="product-box text-center">
                    <a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
                        <?php echo get_the_post_thumbnail( $product_id, 'medium', [ 'class' => 'img-fluid' ] ); ?>
                        <h3 class="mt-2">
                            <?php echo esc_html( get_the_title( $product_id ) ); ?>
                        </h3>
                    </a>
                </div>
            </div>
            <?php
                    endwhile;

                    wp_reset_postdata();

                else :
                    ?>
            <p class="text-center">
                <?php esc_html_e( 'No products found for this vendor.', 'your-theme-textdomain' ); ?>
            </p>
            <?php
                endif;

           
            ?>

        </div>
    </div>
</section>

<?php
get_footer( 'shop' );