<section class="faq-section py-md-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h2 class="fw-bold faq-title mb-5">Frequently<br>asked questions</h2>
        <div class="faq-wrapper">
          <!-- FAQ Item -->
          <div class="faq-item active">
            <button class="faq-question">
              Why should I choose Visual Magic for my print?
              <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
              <p>Every product we offer is printed in house in the USA. With well over 100,000 satisfied customers, you
                can rely on Visual Magic for your print job.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              Do you have any guides on how to make a poster?
              <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
              <p>Yes, our design guide helps you create the perfect poster with bleed, layout and best print formatting.
              </p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              Where do you ship?
              <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
              <p>We ship across the USA using trusted courier partners with tracking support.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              Can I do a local pickup?
              <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
              <p>Yes, local pickup is available at checkout during order processing.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              Where is my poster shipping from?
              <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
              <p>All orders ship from our main USA-based production facility ensuring fast delivery times.</p>
            </div>
          </div>

        </div>
      </div>

      <div class="col-lg-6 text-center">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chat.png" class="faq-img" alt="FAQ">
      </div>

    </div>
  </div>
</section>

<script>
  jQuery(document).ready(function ($) {
    $('.faq-question').click(function () {
      var parent = $(this).closest('.faq-item');

      if (parent.hasClass('active')) {
        parent.removeClass('active');
      } else {
        $('.faq-item').removeClass('active'); // close others
        parent.addClass('active'); // open selected
      }
    });
  });
</script>