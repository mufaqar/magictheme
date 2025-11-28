<?php /*Template Name: Home */ get_header(); ?>

<section class="vm-hero py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="vm-hero-title">
                    We Print
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

    <!-- STEPS SECTION -->
    <div class="container mt-5 pt-4">
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
    <div class="vm-cta">
        <div class="container mt-5 pt-4">
            <div class="row align-items-center">
                <!-- LEFT SIDE -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="Immortalize-title">
                        Immortalize Your <br>
                        Moments
                    </h1>

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
                <div class="col-lg-6">
                    <div class="vm-thumbs mt-3 d-flex gap-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-1.png"
                            width="200" height="250">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-2.png"
                            width="200" height="250">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-3.png"
                            width="200" height="250">
                    </div>
                    <div class="vm-thumbs mt-3 d-flex gap-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-4.png"
                            width="200" height="250">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-5.png"
                            width="200" height="250">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Immortalize-6.png"
                            width="200" height="250">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="row">
    <div class="col-12">
        <h1 class="mb-3"><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
    </div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>