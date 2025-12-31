<section class="testimonial-section py-5">
  <div class="container">
    <h2 class="text-center fw-bold mb-5 gradient-title">Moments, Beautifully Preserved</h2>
    <div class="row">
      <div class="col-md-3 testimonial-header justify-content-between align-items-center mb-4">
        <div class="testimonial-text">
          <h3 class="fw-semibold mb-0">What our<br>customers are saying</h3>
        </div>

        <div class="pagination-controls d-flex align-items-center justify-content-between mt-4">
          <button class="slick-prev-btn arrow-line">←</button>

          <div class="progress-bar-wrapper">
            <div class="progress-line"></div>
          </div>

          <button class="slick-next-btn arrow-line">→</button>
        </div>
      </div>
      <div class="col-md-9 testimonial-slider">
        <?php
        $testimonials = [
          [
            'name' => 'Karan',
            'review' => 'I was amazed by the print quality! The colors came out exactly as they looked on my phone. Truly professional work.',
            'time' => '1 week ago',
            'img' => 'https://i.pravatar.cc/50'
          ],
          [
            'name' => 'Catherine',
            'review' => 'Super fast delivery and very secure packaging. My framed photo arrived safely and looked perfect.',
            'time' => '10 days ago',
            'img' => 'https://i.pravatar.cc/51'
          ],
          [
            'name' => 'Peter',
            'review' => 'I ordered a photo print and it turned out amazing! Absolutely loved it!',
            'time' => '2 weeks ago',
            'img' => 'https://i.pravatar.cc/52'
          ],
          [
            'name' => 'Baren',
            'review' => 'I ordered a photo print and it turned out amazing! Absolutely loved it!',
            'time' => '2 weeks ago',
            'img' => 'https://i.pravatar.cc/52'
          ],
          [
            'name' => 'John',
            'review' => 'I ordered a photo print and it turned out amazing! Absolutely loved it!',
            'time' => '2 weeks ago',
            'img' => 'https://i.pravatar.cc/52'
          ],
        ];

        foreach ($testimonials as $item): ?>
          <div class="px-2">
            <div class="testimonial-card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/google.png" class="google-icon"
                alt="review">
              <p class="review-text"><?php echo $item['review']; ?></p>
              <div class="stars">★★★★★</div>
            </div>
            <div class="d-flex align-items-center mt-3">
              <img src="<?php echo $item['img']; ?>" class="user-img" alt="">
              <div class="ms-2">
                <h6 class="mb-0"><?php echo $item['name']; ?></h6>
                <small class="text-muted"><?php echo $item['time']; ?></small>
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
    var $slider = $('.testimonial-slider');
    var $progressLine = $('.progress-line');

    function updateProgress(currentIndex, totalSlides) {
      var percent = ((currentIndex + 1) / totalSlides) * 100;
      $progressLine.css('width', percent + '%');
    }

    $slider.on('init', function (event, slick) {
      updateProgress(0, slick.slideCount);
    });

    $slider.on('afterChange', function (event, slick, currentSlide) {
      updateProgress(currentSlide, slick.slideCount);
    });

    $slider.slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      autoplay: false,
      autoplaySpeed: 2500,
      arrows: true,
      dots: false,
      prevArrow: $('.slick-prev-btn'),
      nextArrow: $('.slick-next-btn'),
      responsive: [
        { breakpoint: 992, settings: { slidesToShow: 2 } },
        { breakpoint: 576, settings: { slidesToShow: 1 } }
      ]
    });
  });
</script>