<?php /*Template Name: Home */ get_header(); ?>

<section class="vm-hero py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="vm-hero-title">
                    Same Day Print
                    Delivered to
                    Your Door
                </h1>

                <p class="vm-hero-text mt-3">
                    Upload your photo or artwork, choose your print style,
                    and get premium-quality prints delivered to your doorstep.
                </p>

                <a href="#" class="btn vm-hero-btn mt-3 px-4 py-3">
                    Print Now ↗
                </a>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6">

                <div class="vm-hero-product">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-main.png"
                        class="img-fluid rounded" alt="Print Preview">
                    <!-- Options Box -->
                    <div class="vm-option-box">
                        <h5 class="fw-bold">8 × 10” Frame</h5>
                        <p>Options</p>
                        <div class="vm-option-item">Unmounted / Lamination / No <br><span class="bold">Lamination</span>
                        </div>
                        <div class="vm-option-item">Mounted <br><span class="bold">None</span></div>
                        <div class="vm-option-item">Glossy <br><span class="bold">Premium</span> </div>

                        <h6 class="fw-bold mt-3">Size</h6>
                        <div class="d-flex gap-3 mt-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sizes.png" width="200">

                        </div>
                    </div>

                </div>

                <!-- Thumbnail Row -->
                <div class="vm-thumbs mt-3 d-flex gap-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb1.png" class="vm-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb2.png" class="vm-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb3.png" class="vm-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb4.png" class="vm-thumb">
                </div>

            </div>
        </div>
    </div>
</section>
<!-- STEPS SECTION -->
<div class="container mt-md-5 pt-md-4">
    <div class="row">

        <div class="col-md-3">
            <i class="fas fa-upload vm-step-icon"></i>
            <h5 class="fw-bold mt-2">Upload</h5>
            <p>Add your photo or artwork fast, simple, seamless.</p>
        </div>

        <div class="col-md-3">
            <i class="fas fa-check-square vm-step-icon"></i>
            <h5 class="fw-bold mt-2">Select</h5>
            <p>Choose from posters, prints, wall tiles, or exterior.</p>
        </div>

        <div class="col-md-3">
            <i class="fas fa-pencil-ruler vm-step-icon"></i>
            <h5 class="fw-bold mt-2">Design</h5>
            <p>Customize size, paper, finishing and more.</p>
        </div>

        <div class="col-md-3">
            <i class="far fa-smile vm-step-icon"></i>
            <h5 class="fw-bold mt-2">Enjoy</h5>
            <p>Get high-quality prints delivered to your door.</p>
        </div>

    </div>
</div>

<!-- Immortalize -->
<section class="vm-cta vm_immortalize">
    <div class="container mt-md-5 pt-md-4">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-md-5 mb-4 mb-md-0">
                <h2 class="immortalize-title">
                    Immortalize Your <br>
                    Moments
                </h2>

                <p class="vm-hero-text mt-3">
                    Turn your favorite memories into meaningful gifts or personal décor.
                    From posters to wall tiles, every print is crafted to bring your moments to life.
                    Premium quality, delivered ready to enjoy or gift.
                </p>

                <a href="#" class="btn vm-hero-btn mt-3 px-4 py-3">
                    Print Now ↗
                </a>
            </div>
            <!-- RIGHT SIDE -->
            <div class="col-md-7 immortalize_gallery">
                <div class="vm-thumbs mt-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-1.png" width="200"
                        height="250">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-2.png" width="200"
                        height="250">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-3.png" width="200"
                        height="250">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-4.png" width="200"
                        height="250">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-5.png" width="200"
                        height="250">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-6.png" width="200"
                        height="250">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Categories -->
<div class="container mt-md-5 pt-md-4">
    <div class=" Categories-flex">
        <h2 class="fw-bold mb-0">Our Categories</h2>
        <div>
            <a href="#" class="btn vm-hero-btn px-4 py-3">Print Now ↗</a>
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

<!-- Stand Out Anywhere -->
<div class="hero-bg" style="
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
            <a href="#" class=" print-btn">Print Now ↗</a>
        </div>

    </div>
</div>

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
                    See More ↗
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
        <div class="row vm_artist_gallery align-items-end">
            <div class="col-md-3 work_card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work1.png" width="418" height="574">
                <div>
                    <h6><span>Dune</span> <span>$38.50</span></h6>
                    <p>16” - 20” Multiple Size</p>
                </div>
            </div>
            <div class="col-md-9">
                <h2 class="vm_artist_title mb-4">
                    Artist Products
                </h2>
                <div class="row">
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
            <a href="#" class="btn vm-hero-btn mt-3 px-4 py-3 ">
                See More ↗
            </a>
        </div>
    </div>
</section>

<!-- card  -->
<div class="features-section container">
    <div class="stats_box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stats1.png" class="feature-icon" alt="">
        <div>
            <h4>Same Day Deliver</h4>
            <p>Get your favorite photos printed and delivered to your doorstep on the very same day. Fast, easy &
                hassle-free.</p>
                <a href="#">Learn More</a>
        </div>
    </div>

    <div class="stats_box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stats2.png" class="feature-icon" alt="">
        <div>
            <h4>Custom Sizes & Materials</h4>
            <p>Go beyond standard posters with custom dimensions, premium finishes, mountings for high-impact
                displays.
            </p>
            <a href="#">Learn More</a>
        </div>
    </div>

    <div class="stats_box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stats3.png" class="feature-icon" alt="">
        <div>
            <h4>Same Day Print</h4>
            <p>High-quality printing without the waiting. Quick setup, premium results, same-day pickup or delivery.
            </p>
            <a href="#">Learn More</a>
        </div>
    </div>

    <div class="stats_box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stats4.png" class="feature-icon" alt="">
        <div>
            <h4>Flexible Quantities Options</h4>
            <p>From single event posters to 1000-unit rollouts, we scale with you and offer agency-friendly
                reorders.
            </p>
            <a href="#">Learn More</a>
        </div>
    </div>
</div>

<!-- Click -->
<section class="vm-cta vm_inspiring container" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/click.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="vm_inspiring_title">
                    Click
                </h2>

                <p class="vm_inspiring_text mt-3">
                    Take photo with your
                    camera of phone.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Click -->
<section class="vm-cta vm_inspiring container" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/click.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="vm_inspiring_title">
                    Click
                </h2>

                <p class="vm_inspiring_text mt-3">
                    Take photo with your
                    camera of phone.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Click -->
<section class="vm-cta vm_inspiring container" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/click.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT SIDE -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="vm_inspiring_title">
                    Click
                </h2>

                <p class="vm_inspiring_text mt-3">
                    Take photo with your
                    camera of phone.
                </p>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/testimonials'); ?>
<?php get_template_part('template-parts/faqs'); ?>

<?php get_footer(); ?>