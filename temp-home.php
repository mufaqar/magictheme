<?php /*Template Name: Home */ get_header(); ?>

<section class="vm-hero py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="vm-hero-title gradient-title">
                    Your Life as Art on Your Walls
                </h1>
                <p class="vm-hero-text mt-3">
                    Turn your favorite memories into meaningful gifts or personal décor. From posters to wall tiles,
                    every print is crafted to bring your moments to life.
                    Premium quality, delivered ready to enjoy or gift.
                </p>

                <a href="<?php echo home_url('/customize-upload'); ?>" class="btn vm-hero-btn mt-3 px-4 py-3">
                    Customize Now <i class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i>
                </a>
            </div>
            <!-- RIGHT SIDE -->
            <div class="col-lg-6">
                <?php get_template_part('template-parts/banner-pro'); ?>

            </div>
        </div>
    </div>
</section>
<!-- STEPS SECTION -->
<div class="container my-md-5 py-md-4">
    <div class="row">

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/upload-icon.png" class="mb-3" alt="icon"
                width="40px" height="40px">
            <h5 class="fw-bold mt-2">Upload</h5>
            <p>Add your photos or artwork fast, simple, seamless.</p>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-icon.png" class="mb-3" alt="icon"
                width="40px" height="40px">
            <h5 class="fw-bold mt-2">Select</h5>
            <p>Choose from posters, prints, wall tiles, or wall & exterior.</p>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/design-icon.png" class="mb-3" alt="icon"
                width="40px" height="40px">
            <h5 class="fw-bold mt-2">Design</h5>
            <p>Customize paper size, paper type, finishing and much more.</p>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/smile-icon.png" class="mb-3" alt="icon"
                width="40px" height="40px">
            <h5 class="fw-bold mt-2">Enjoy</h5>
            <p>Get stunning, high-quality prints delivered to your door on same day.</p>
        </div>

    </div>
</div>

<!-- Immortalize -->
<section class="vm_immortalize">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9 mb-4 mb-md-0 text-center mx-auto">
                <h4>
                    Same Day Print
                </h4>
                <h2 class="immortalize-title gradient-title">
                    Same Day Delivery
                </h2>
                <h4>Same Day Installation</h4>
                <p class="vm-hero-text mt-3">
                    Upload your photo or artwork, choose your print style, and get premium-quality prints delivered to
                    your doorstep.
                </p>

                <a href="<?php echo home_url('/customize-upload'); ?>" class="btn vm-hero-btn mt-3 px-4 py-3">
                    Customize Now <i class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- Our Categories -->
<div class="container my-5 py-4">
    <div class=" Categories-flex">
        <h2 class="fw-bold mb-0">Our Categories</h2>
        <div>
            <a href="<?php echo home_url('/categories'); ?>" class="btn vm-hero-btn px-4 py-3">See All <i
                    class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i></a>
        </div>
    </div>
    <div class="col-lg-16 mt-5">
        <div class="categories-grid">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Posters.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Photographic Prints.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Wall Art.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Wall Photos.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Exterior.png" alt="">
        </div>
    </div>
</div>
<!-- Artist Spotlight -->
<section class="vm-cta vm_artist" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bwp.png');">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="immortalize-title">
                    Artist Spotlight
                </h2>
                <p class="vm-hero-text mt-3">
                    Viet Chu is an artist who chose photography as one of the mediums for his exploration and
                    expression of esoteric beauty. In his dedication of that pursuit, he infuses intuitive
                    sensibility and emotional intelligence to stop and capture a moment of time, that tells a story
                    for the rest of time.
                </p>
                <a href="#" class="btn vm-hero-btn mt-3 px-4 py-3">
                    See More <i class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i>
                </a>
            </div>
            <!-- RIGHT SIDE -->
            <div class="col-md-6">
                <div class="artist-image" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/artist-bg.png');">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/artist.png" width="633"
                        height="830">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 pt-5">
        <h2 class="vm_artist_title text-center mb-4">
            Artist Products
        </h2>
        <div class="row vm_artist_gallery align-items-end">
            <div class="col-md-3 work_card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work1.png" width="418" height="574">
                <div>
                    <h6><span>Dune</span> <span>$38.50</span></h6>
                    <p>16” - 20” <span>Multiple Size</span></p>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row align-items-end">
                    <div class="col-md-4 work_card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work2.png" width="418"
                            height="574">
                        <div>
                            <h6><span>Dune</span> <span>$38.50</span></h6>
                            <p>16” - 20” <span>Multiple Size</span></p>
                        </div>
                    </div>
                    <div class="col-md-4 work_card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work3.png" width="418"
                            height="574">
                        <div>
                            <h6><span>Dune</span> <span>$38.50</span></h6>
                            <p>16” - 20” <span>Multiple Size</span></p>
                        </div>
                    </div>
                    <div class="col-md-4 work_card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work4.png" width="418"
                            height="574">
                        <div>
                            <h6><span>Dune</span> <span>$38.50</span></h6>
                            <p>16” - 20” <span>Multiple Size</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="/shop" class="btn vm-hero-btn mt-3 px-4 py-3 ">
                Buy Now <i class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i>
            </a>
        </div>
    </div>
</section>
<!-- Stand Out Anywhere -->
<!-- <div class="hero-bg" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/background image.png');">
    <div class="container hero-wrap">
        <div class="stand">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stand.png" alt="" class="stand-main">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stand-2.png" alt="" class="stand-small">
        </div>
        <div class="hero-text">
            <h2>Stand Out Anywhere</h2>
            <p>
                Create professional prints for storefronts, events, trade shows, and promotions.
                Choose durable indoor or outdoor formats designed to showcase your brand. Fast,
                high-quality production for businesses of any size.
            </p>
            <a href="<?php echo home_url('/prints'); ?>" class=" print-btn">Design Now<i class="fa-solid fa-arrow-down"
                    style="transform: rotate(-130deg);"></i></a>
        </div>
    </div>
</div> -->

<!-- card  -->
<div class="features-section container">
    <div class="feature-box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Delivery 2.png" class="feature-icon" alt="">
        <h4>Same Day Deliver</h4>
        <p>Get your favorite photos printed and delivered to your doorstep on the very same day. Fast, easy &
            hassle-free.</p>
    </div>

    <div class="feature-box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Group.png" class="feature-icon" alt="">
        <h4>Custom Sizes & Materials</h4>
        <p>Go beyond standard posters with custom dimensions, premium finishes, mountings for high-impact displays.
        </p>
    </div>

    <div class="feature-box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector.png" class="feature-icon" alt="">
        <h4>Same Day Print</h4>
        <p>High-quality printing without the waiting. Quick setup, premium results, same-day pickup or delivery.</p>
    </div>

    <div class="feature-box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Print.png" class="feature-icon" alt="">
        <h4>Flexible Quantities Options</h4>
        <p>From single event posters to 1000-unit rollouts, we scale with you and offer agency-friendly reorders.
        </p>
    </div>
</div>

<!-- card  -->
<div class="features-section container">
    <div class="stats_box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stats1.png" class="feature-icon" alt="">
        <div>
            <h4>Worldwide Shipping</h4>
            <p>Available as standard on express delivery</p>
            <a href="#">Learn More</a>
        </div>
    </div>

    <div class="stats_box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stats2.png" class="feature-icon" alt="">
        <div>
            <h4>Secure Payments </h4>
            <p>100% Secure payment with 256-bit SSL encryption
            </p>
            <a href="#">Learn More</a>
        </div>
    </div>

    <div class="stats_box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stats3.png" class="feature-icon" alt="">
        <div>
            <h4>Free Return</h4>
            <p>Exchange or money back guarantee for all orders</p>
            <a href="#">Learn More</a>
        </div>
    </div>

    <div class="stats_box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stats4.png" class="feature-icon" alt="">
        <div>
            <h4>Local Support</h4>
            <p>24/7 Dedicated support</p>
            <a href="#">Learn More</a>
        </div>
    </div>
</div>

<!-- Click -->
<section class="vm-cta vm_inspiring container" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/click-bg.png');">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="vm_inspiring_title">
                    Click
                </h2>
                <p class="vm_inspiring_text mt-3">
                    Take photo with your <br />
                    camera of phone.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Upload. -->
<section class="vm-cta vm_inspiring click_section container">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="vm_inspiring_title">
                    Upload
                </h2>

                <p class="vm_inspiring_text mt-3">
                    Upload them to your <br />
                    Visual Magic Store.
                </p>
            </div>
            <div class="col-md-6 text-md-end text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/upload-bg.png" alt="Print" />
            </div>
        </div>
    </div>
</section>
<!-- Enhance. -->
<section class="vm-cta vm_inspiring click_section container">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="vm_inspiring_title">
                    Enhance
                </h2>

                <p class="vm_inspiring_text mt-3">
                    Enhance your memories with prints that<br /> last a lifetime.
                </p>
            </div>
            <div class="col-md-6 text-md-end text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/enhance.png" alt="Enhance" />
            </div>
        </div>
    </div>
</section>
<!-- Print -->
<section class="vm-cta vm_print container" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/print-bg.png');">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="vm_print_title">
                    Print
                </h2>

                <p class="vm_print_text mt-3">
                    Make your memories timeless<br />
                    with premium prints
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Captured Slider -->
<?php //get_template_part('template-parts/captured-slider'); ?>

<!-- Testimonial Slider -->
<?php get_template_part('template-parts/testimonials'); ?>
<!-- FAQs -->
<?php get_template_part('template-parts/faqs'); ?>

<?php get_footer(); ?>