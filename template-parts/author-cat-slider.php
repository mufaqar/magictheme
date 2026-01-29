<section class="my-5 py-5">
    <div class="container">
        <h2 class="gradient-title text-center">
            Categories
        </h2>
    </div>
    <div class="mt-4">
        <div class="container">
            <div class="cat-slider p-0">

                <?php
        // Get all WooCommerce product categories
        $product_categories = get_terms([
          'taxonomy' => 'product_cat',
          'hide_empty' => true, // only show categories with products
        ]);

        if (!empty($product_categories) && !is_wp_error($product_categories)) :
          foreach ($product_categories as $category) :
            // Get category thumbnail
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src();
        ?>
                <div class="px-2">
                    <div class="rounded-cat">
                        <a href="<?php echo esc_url(get_term_link($category)); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" class="img-fluid"
                                alt="<?php echo esc_attr($category->name); ?>">
                        </a>
                        <div>
                            <h6>
                                <a
                                    href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                            </h6>
                        </div>
                    </div>
                </div>
                <?php
          endforeach;
        else :
          echo '<p>No categories found.</p>';
        endif;
        ?>

            </div>
        </div>
    </div>
</section>

<script>
jQuery(document).ready(function($) {
    $('.cat-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});
</script>