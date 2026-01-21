<?php
/* Template Name: Wishlist */
get_header();

$user_id = get_current_user_id();
$favorites = [];

// Get favorite product IDs
if ($user_id) {
    $favorites = get_user_meta($user_id, 'favorite_products', true);
}

if (!is_array($favorites)) {
    $favorites = [];
}
?>

<style>
    .favor_wrapper {
        padding: 60px 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .favor_title {
        font-weight: 600;
        font-size: 42px;
        line-height: 1.2;
        color: #000;
        margin-bottom: 20px;
    }

    .favor_sub {
        font-weight: 500;
        font-size: 24px;
        line-height: 1.1;
        color: #000;
    }
</style>

<section class="favor_wrapper" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/images/right_bg.png');
    background-repeat:no-repeat;
    background-position:left top;
    background-size:contain;">

    <!-- ================= FAVORITES ================= -->
    <div class="container favor_container">
        <h2 class="favor_title">Favorites</h2>
        <p class="favor_sub"><?php echo count($favorites); ?> items</p>
        <hr />

        <div class="grid_4">
            <?php
            if (!empty($favorites)):

                $fav_query = new WP_Query([
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'post__in' => $favorites,
                    'orderby' => 'post__in',
                ]);

                if ($fav_query->have_posts()):
                    while ($fav_query->have_posts()):
                        $fav_query->the_post();
                        global $product;

                        $vendor_id = get_post_field('post_author', get_the_ID());
                        $vendor_name = get_the_author_meta('display_name', $vendor_id);
                        ?>
                        <div class="product_box position-relative">
                            <?php get_template_part('template-parts/cart-btns'); ?>

                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                            </a>

                            <div>
                                <h6 class="d-flex justify-content-between">
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
                    echo '<p class="text-center">No favorite products found.</p>';
                endif;

            else:
                echo '<p class="text-center">You have no favorite products.</p>';
            endif;
            ?>
        </div>
    </div>

    <!-- ================= RELATED PRODUCTS ================= -->
    <div class="container favor_container mt-5">
        <h2 class="favor_title">Inspired by Artwork on This List</h2>
        <hr />

        <div class="grid_4">
            <?php
            if (!empty($favorites)):

                // Collect categories from favorite products
                $related_cat_ids = [];

                foreach ($favorites as $fav_id) {
                    $cats = wp_get_post_terms($fav_id, 'product_cat', ['fields' => 'ids']);
                    $related_cat_ids = array_merge($related_cat_ids, $cats);
                }

                $related_cat_ids = array_unique($related_cat_ids);

                if (!empty($related_cat_ids)):

                    $related_query = new WP_Query([
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'posts_per_page' => 8,
                        'post__not_in' => $favorites, // exclude wishlist
                        'tax_query' => [
                            [
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $related_cat_ids,
                            ]
                        ],
                    ]);

                    if ($related_query->have_posts()):
                        while ($related_query->have_posts()):
                            $related_query->the_post();
                            global $product;

                            $vendor_id = get_post_field('post_author', get_the_ID());
                            $vendor_name = get_the_author_meta('display_name', $vendor_id);
                            ?>
                            <div class="product_box position-relative">
                                <?php get_template_part('template-parts/cart-btns'); ?>

                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                </a>

                                <div>
                                    <h6 class="d-flex justify-content-between">
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
                        echo '<p class="text-center">No related products found.</p>';
                    endif;

                else:
                    echo '<p class="text-center">No related categories found.</p>';
                endif;

            else:
                echo '<p class="text-center">Add items to wishlist to see inspired products.</p>';
            endif;
            ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>