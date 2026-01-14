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

<section class="filter-wrapper">

    <div class="container">
        <div class="row">
            <!-- FILTER SIDEBAR -->
            <aside class="col-lg-3 filter-sidebar">
                <!-- Categories -->
                <!-- Artist / Vendor -->
                <div class="filter-box active">
                    <h5 class="filter-title">
                        Artist
                        <span class="accordion-icon"></span>
                    </h5>

                    <div class="filter-content">
                        <?php
                            // Get vendors (authors who have products)
                            $vendors = get_users([
                                'role__in' => ['vendor', 'seller', 'administrator'],
                                'has_published_posts' => ['product'],
                            ]);

                            foreach ($vendors as $vendor) :
                                $checked = (isset($_GET['vendor']) && $_GET['vendor'] == $vendor->ID) ? 'checked' : '';
                            ?>
                        <label>
                            <input type="checkbox" class="filter-vendor" value="<?php echo esc_attr($vendor->ID); ?>"
                                <?php echo $checked; ?>>
                            <?php echo esc_html($vendor->display_name); ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>


                <!-- Paper Type -->
                <!-- Product Categories -->
                <div class="filter-box active">
                    <h5 class="filter-title">
                        Categories
                        <span class="accordion-icon"></span>
                    </h5>

                    <div class="filter-content">
                        <?php
                            $categories = get_terms([
                                'taxonomy'   => 'product_cat',
                                'hide_empty' => true,
                            ]);

                            foreach ($categories as $cat) :
                                $checked = (isset($_GET['category']) && $_GET['category'] == $cat->slug) ? 'checked' : '';
                            ?>
                        <label>
                            <input type="checkbox" class="filter-category" value="<?php echo esc_attr($cat->slug); ?>"
                                <?php echo $checked; ?>>
                            <?php echo esc_html($cat->name); ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>




            </aside>

            <!-- PRODUCTS AREA -->
            <div class="col-lg-9">
                <!-- SORT BAR -->
                <div class="sorting-bar align-items-center">
                    <span>Showing 1–12 of 24 results</span>

                    <span> <span>Sort By: </span>
                        <select id="sort">
                            <option value="default">Default Sorting</option>
                            <option value="latest">Latest</option>
                            <option value="size">Size</option>
                        </select>
                    </span>
                </div>

                <!-- PRODUCT GRID -->
                <div class="product-grid">
                    <!-- PRODUCT -->

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
                    global $product;                    
                    $vendor_id   = get_post_field('post_author', get_the_ID());
                    $vendor_name = get_the_author_meta('display_name', $vendor_id);
                    ?>
                    <div class="product_box">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'medium', [ 'class' => 'img-fluid' ] );
                                }
                                ?>
                        </a>
                        <div>
                            <h6><span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <br> <small>by
                                        <?php echo esc_html($vendor_name); ?></small></span>
                                <span><small>from</small><br>
                                    <?php echo $product->get_price_html(); ?></span>
                            </h6>
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
        </div>
    </div>
</section>


<?php
/**
 * Required WooCommerce hook
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );

?>


<script>
document.querySelectorAll('.filter-title').forEach(title => {
    title.addEventListener('click', () => {
        const box = title.closest('.filter-box');
        box.classList.toggle('active');
    });
});

document.querySelectorAll('.filter-vendor, .filter-category').forEach(input => {
    input.addEventListener('change', () => {

        const params = new URLSearchParams();

        const vendor = document.querySelector('.filter-vendor:checked');
        const category = document.querySelector('.filter-category:checked');

        if (vendor) {
            params.set('vendor', vendor.value);
        }

        if (category) {
            params.set('category', category.value);
        }

        window.location.href = window.location.pathname + '?' + params.toString();
    });
});
</script>

