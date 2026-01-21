<section class="filter-wrapper">
    <div class="container">
        <div class="row product_row">

            <!-- FILTER SIDEBAR -->
            <aside class="col-lg-3 filter-sidebar">

                <!-- Artist / Vendor -->
                <div class="filter-box active">
                    <h5 class="filter-title">Artist <span class="accordion-icon"></span></h5>
                    <div class="filter-content">
                        <?php
                        $vendors = get_users([
                            'role__in' => ['vendor', 'seller', 'administrator'],
                            'has_published_posts' => ['product'],
                        ]);

                        foreach ($vendors as $vendor):
                            $checked = (!empty($_GET['vendor']) && $_GET['vendor'] == $vendor->ID) ? 'checked' : '';
                            ?>
                            <label>
                                <input type="checkbox" class="filter-vendor" value="<?php echo esc_attr($vendor->ID); ?>"
                                    <?php echo $checked; ?>>
                                <?php echo esc_html($vendor->display_name); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Categories -->
                <div class="filter-box active">
                    <h5 class="filter-title">Categories <span class="accordion-icon"></span></h5>
                    <div class="filter-content">
                        <?php
                        $categories = get_terms([
                            'taxonomy' => 'product_cat',
                            'hide_empty' => true,
                        ]);

                        foreach ($categories as $cat):
                            $checked = (!empty($_GET['category']) && $_GET['category'] === $cat->slug) ? 'checked' : '';
                            ?>
                            <label>
                                <input type="checkbox" class="filter-category" value="<?php echo esc_attr($cat->slug); ?>"
                                    <?php echo $checked; ?>>
                                <?php echo esc_html($cat->name); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="side_cta" style="background: #17A2B814;">
                    <h6>Become a Member</h6>
                    <h3>Get 25% off your first order</h3>
                    <a href="<?php echo home_url('/sign-up'); ?>" class="sign_btn"><span>Sign up</span></a>
                </div>
            </aside>

            <!-- PRODUCTS AREA -->
            <div class="col-lg-9">

                <?php
                /* ---------------- QUERY BUILD ---------------- */
                $args = [
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                ];

                // Vendor filter
                if (!empty($_GET['vendor'])) {
                    $args['author'] = intval($_GET['vendor']);
                }

                // Category filter
                if (!empty($_GET['category'])) {
                    $args['tax_query'] = [
                        [
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => sanitize_text_field($_GET['category']),
                        ]
                    ];
                }

                // Sorting
                if (!empty($_GET['orderby'])) {
                    switch ($_GET['orderby']) {
                        case 'price':
                            $args['meta_key'] = '_price';
                            $args['orderby'] = 'meta_value_num';
                            $args['order'] = 'ASC';
                            break;

                        case 'price-desc':
                            $args['meta_key'] = '_price';
                            $args['orderby'] = 'meta_value_num';
                            $args['order'] = 'DESC';
                            break;

                        case 'date':
                            $args['orderby'] = 'date';
                            $args['order'] = 'DESC';
                            break;

                        default:
                            $args['orderby'] = 'menu_order title';
                            $args['order'] = 'ASC';
                    }
                }

                $products = new WP_Query($args);
                ?>

                <!-- SORT BAR -->
                <div class="sorting-bar align-items-center">
                    <span><?php echo esc_html($products->found_posts); ?> products found</span>

                    <span>
                        <span>Sort By: </span>
                        <select id="sort" class="orderby">
                            <option value="menu_order">Default Sorting</option>
                            <option value="date">Latest</option>
                            <option value="price">Price: Low to High</option>
                            <option value="price-desc">Price: High to Low</option>
                        </select>
                    </span>
                </div>

                <!-- PRODUCT GRID -->
                <div class="grid_3">
                    <?php
                    if ($products->have_posts()):
                        while ($products->have_posts()):
                            $products->the_post();
                            global $product;

                            $vendor_id = get_post_field('post_author', get_the_ID());
                            $vendor_name = get_the_author_meta('display_name', $vendor_id);
                            ?>
                            <div class="product_box">
                                <?php get_template_part('template-parts/cart-btns'); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                </a>
                                <div>
                                    <h6>
                                        <span>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
                                            <small>by <?php echo esc_html($vendor_name); ?></small>
                                        </span>
                                        <span>
                                            <small>from</small><br>
                                            <?php echo $product->get_price_html(); ?>
                                        </span>
                                    </h6>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        ?>
                        <p class="text-center">No products found.</p>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/profile-features'); ?>

<script>
    document.querySelectorAll('.filter-title').forEach(title => {
        title.addEventListener('click', () => {
            title.closest('.filter-box').classList.toggle('active');
        });
    });

    document.querySelectorAll('.filter-vendor, .filter-category').forEach(input => {
        input.addEventListener('change', () => {
            const params = new URLSearchParams();

            const vendor = document.querySelector('.filter-vendor:checked');
            const category = document.querySelector('.filter-category:checked');

            if (vendor) params.set('vendor', vendor.value);
            if (category) params.set('category', category.value);

            window.location.href = window.location.pathname + '?' + params.toString();
        });
    });

    document.getElementById('sort')?.addEventListener('change', function () {
        const params = new URLSearchParams(window.location.search);
        params.set('orderby', this.value);
        window.location.search = params.toString();
    });
</script>