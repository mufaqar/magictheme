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
        // Static array of products
        $products = [
          [
            'title' => 'Abstract Art #1',
            'permalink' => '#',
            'image' => '/assets/images/work2.png',
            'vendor_name' => 'John Doe',
            'price' => '$120'
          ],
          [
            'title' => 'Modern Painting #2',
            'permalink' => '#',
            'image' => '/assets/images/work3.png',
            'vendor_name' => 'Jane Smith',
            'price' => '$200'
          ],
          [
            'title' => 'Sculpture #3',
            'permalink' => '#',
            'image' => '/assets/images/work4.png',
            'vendor_name' => 'Alex Brown',
            'price' => '$350'
          ],
          [
            'title' => 'Street Art #4',
            'permalink' => '#',
            'image' => '/assets/images/work2.png',
            'vendor_name' => 'Emma White',
            'price' => '$180'
          ],
          [
            'title' => '',
            'permalink' => '#',
            'image' => '/assets/images/work3.png',
            'vendor_name' => 'Jane Smith',
            'price' => '$200'
          ],
        ];

        // Loop through products
        foreach ($products as $product): ?>
          <div class="px-2">
            <div class="product_box">
              <?php get_template_part('template-parts/cart-btns'); ?>
              <a href="<?php echo esc_url($product['permalink']); ?>">
                <img src="<?php echo get_template_directory_uri() . $product['image']; ?>" class="img-fluid"
                  alt="<?php echo esc_attr($product['title']); ?>">
              </a>
              <div>
                <h6>
                  <span>
                    <a href="<?php echo esc_url($product['permalink']); ?>"><?php echo esc_html($product['title']); ?></a>
                    <br>
                    <small>by <?php echo esc_html($product['vendor_name']); ?></small>
                  </span>
                  <span>
                    <small>from</small><br>
                    <?php echo esc_html($product['price']); ?>
                  </span>
                </h6>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

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