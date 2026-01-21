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
        // Static array of products
        $products = [
          [
            'title' => 'Best Sellers',
            'permalink' => '#',
            'image' => '/assets/images/work2.png',
            'vendor_name' => 'by Viet Chu',
          ],
          [
            'title' => 'Featured',
            'permalink' => '#',
            'image' => '/assets/images/work3.png',
            'vendor_name' => 'Jane Smith',
          ],
          [
            'title' => 'Themes',
            'permalink' => '#',
            'image' => '/assets/images/work4.png',
            'vendor_name' => 'Alex Brown',
          ],
          [
            'title' => 'Destinations',
            'permalink' => '#',
            'image' => '/assets/images/work2.png',
            'vendor_name' => 'Emma White',
          ],
          [
            'title' => 'Featured',
            'permalink' => '#',
            'image' => '/assets/images/work3.png',
            'vendor_name' => 'Jane Smith',
          ],
        ];

        // Loop through products
        foreach ($products as $product): ?>
          <div class="px-2">
            <div class="rounded-cat">
              <a href="<?php echo esc_url($product['permalink']); ?>">
                <img src="<?php echo get_template_directory_uri() . $product['image']; ?>" class="img-fluid"
                  alt="<?php echo esc_attr($product['title']); ?>">
              </a>
              <div>
                <h6>
                  <a href="<?php echo esc_url($product['permalink']); ?>"><?php echo esc_html($product['title']); ?></a>
                  <br>
                  <small>by <?php echo esc_html($product['vendor_name']); ?></small>
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
    $('.cat-slider').slick({
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