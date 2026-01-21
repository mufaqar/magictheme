<?php
defined('ABSPATH') || exit;

get_header('shop');

/**
 * Breadcrumb
 */
// get_template_part(
//     'template-parts/breadcrumb',
//     null,
//     [
//         'title' => woocommerce_page_title( false ),
//     ]
// );

/**
 * Required WooCommerce hook
 */
//do_action( 'woocommerce_before_main_content' );
?>
<section class="shop_banner"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/shop-banner.png');">
    <img class="title-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/shop.png" alt="title-img" />
    <div class="container search_wrapper">
        <h2 class="title">
            All Products
        </h2>
        <form class="product-search flex-grow-1 position-relative" action="<?php echo home_url('/search'); ?>">
            <span class="icon"> <i class="fas fa-search"></i></span>
            <input type="text" name="s" class="vm-search-input" placeholder="">
            <button type="submit" class="vm-search-button">
                Search
            </button>
        </form>
    </div>
</section>
<section class="filter-wrapper">
    <div class="container">
        <div class="row product_row">
            <!-- FILTER SIDEBAR -->
            <aside class="col-lg-3 filter-sidebar">
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

                        foreach ($vendors as $vendor):
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
                <!-- Product Categories -->
                <div class="filter-box active">
                    <h5 class="filter-title">
                        Categories
                        <span class="accordion-icon"></span>
                    </h5>
                    <div class="filter-content">
                        <?php
                        $categories = get_terms([
                            'taxonomy' => 'product_cat',
                            'hide_empty' => true,
                        ]);

                        foreach ($categories as $cat):
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
                    <span><?php woocommerce_result_count(); ?></span>

                    <span> <span>Sort By: </span>
                        <select id="sort" class="orderby">
                            <option value="menu_order" <?php selected($_GET['orderby'] ?? '', 'menu_order'); ?>>
                                Default Sorting
                            </option>
                            <option value="date" <?php selected($_GET['orderby'] ?? '', 'date'); ?>>
                                Latest
                            </option>
                            <option value="price" <?php selected($_GET['orderby'] ?? '', 'price'); ?>>
                                Price: Low to High
                            </option>
                            <option value="price-desc" <?php selected($_GET['orderby'] ?? '', 'price-desc'); ?>>
                                Price: High to Low
                            </option>
                        </select>
                    </span>
                </div>
                <!-- PRODUCT GRID -->
                <div class="grid_3">
                    <!-- PRODUCT -->
                    <?php
                    /**
                     * WooCommerce Main Product Loop
                     * Works for:
                     * - Shop page
                     * - Product category archive
                     */
                    if (woocommerce_product_loop()):

                        while (have_posts()):
                            the_post();
                            global $product;
                            $vendor_id = get_post_field('post_author', get_the_ID());
                            $vendor_name = get_the_author_meta('display_name', $vendor_id);
                            ?>
                            <div class="product_box">
                                <?php get_template_part('template-parts/cart-btns'); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium', ['class' => 'img-fluid']);
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
                    else:
                        ?>
                        <div class="col-12">
                            <p class="text-center">
                                <?php esc_html_e('No products found.', 'your-theme-textdomain'); ?>
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
<!-- Related Authors -->
<?php get_template_part('template-parts/related-author'); ?>
<!-- Inspiration-section -->
<?php get_template_part('template-parts/shop-features'); ?>
<!-- Sale Section -->
<?php get_template_part('template-parts/sale'); ?>
<!-- Testimonials Section -->
<?php get_template_part('template-parts/testimonials'); ?>
<!-- FAQs Section -->
<?php get_template_part('template-parts/faqs'); ?>
<?php
/**
 * Required WooCommerce hook
 */
do_action('woocommerce_after_main_content');

get_footer('shop');

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
    document.getElementById('sort')?.addEventListener('change', function () {
        const params = new URLSearchParams(window.location.search);
        params.set('orderby', this.value);
        window.location.search = params.toString();
    });
</script>