<section class="my-5 py-5">
  <div class="container">
    <h2 class="gradient-title text-center">
      Best Selling Images
    </h2>
  </div>
  <div class="mt-4">
    <div class="container">
      <div class="Pro-slider p-0">

        <?php
        // WooCommerce query for best-selling products
        $args = [
          'post_type' => 'product',
          'posts_per_page' => 12, // Adjust number of products
          'meta_key' => 'total_sales',
          'orderby' => 'meta_value_num',
          'order' => 'DESC',
        ];

        $loop = new WP_Query($args);

        if ($loop->have_posts()) :
          while ($loop->have_posts()) : $loop->the_post();
            global $product; // WooCommerce product object
        ?>
            <div class="px-2">
              <div class="product_box">
                <?php get_template_part('template-parts/cart-btns'); ?>
                <a href="<?php the_permalink(); ?>">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => get_the_title()]);
                  } else {
                    echo '<img src="' . wc_placeholder_img_src() . '" class="img-fluid" alt="No image">';
                  }
                  ?>
                </a>
                <div>
                  <h6>
                    <span>
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
                      <small>by <?php echo get_the_author(); ?></small>
                    </span>
                    <span>
                      <small>from</small><br>
                      <?php echo $product->get_price_html(); ?>
                    </span>
                  </h6>
                </div>
              </div>
            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        else :
          echo '<p>No products found</p>';
        endif;
        ?>

      </div>
    </div>
  </div>
</section>

<script>
  jQuery(document).ready(function ($) {
    $('.Pro-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 3000,
      responsive: [
        {
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
