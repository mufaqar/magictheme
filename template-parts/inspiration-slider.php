<section class="inspiration-section">
  <div class="container">
    <h2 class="inspiration-title gradient-title">
      Inspired by You
    </h2>
    <p class="inspiration-subtitle">
      Real stories from customers whose ideas, images, and creative visions inspire everything we create. Their
      feedback reflects our commitment to quality printing, attention to detail, and delivering results that truly
      make an impact.
    </p>
    <div class="row mt-4">
      <div class="inspiration-slider p-0">

        <div class="col-lg-3 px-2">
          <div class="inspiration-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png" alt="Inspiration">
            <a href="#" class="view-btn"><span>@MichaelThompson</span></a>
          </div>
        </div>

        <div class="col-lg-3 px-2">
          <div class="inspiration-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png" alt="Inspiration">
            <a href="#" class="view-btn"><span>@MichaelThompson</span></a>
          </div>
        </div>

        <div class="col-lg-3 px-2">
          <div class="inspiration-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png" alt="Inspiration">
            <a href="#" class="view-btn"><span>@MichaelThompson</span></a>
          </div>
        </div>

        <div class="col-lg-3 px-2">
          <div class="inspiration-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png" alt="Inspiration">
            <a href="#" class="view-btn"><span>@MichaelThompson</span></a>
          </div>
        </div>
        <div class="col-lg-3 px-2">
          <div class="inspiration-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png" alt="Inspiration">
            <a href="#" class="view-btn"><span>@MichaelThompson</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  jQuery(document).ready(function ($) {
    $('.inspiration-slider').slick({
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