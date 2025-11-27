<?php /*Template Name: Home */ get_header(); ?>

<section class="vm-hero py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="vm-hero-title">
                    We Print <br>
                    Delivered to <br>
                    Your Door
                </h1>

                <p class="vm-hero-text mt-3">
                    Upload your photo or artwork, choose your print style, and get premium-quality prints
                    delivered to your doorstep.
                </p>

                <a href="#" class="btn vm-hero-btn mt-3 px-4 py-3">
                    Print Now ↗
                </a>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6">

                <div class="vm-hero-product shadow">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-main.png"
                        class="img-fluid rounded" alt="Print Preview">
                    <!-- Options Box -->
                    <div class="vm-option-box">
                        <h5 class="fw-bold">8 × 10” Frame</h5>
                        <div class="vm-option-item">Unmounted / Lamination / No Lamination</div>
                        <div class="vm-option-item">Mounted</div>
                        <div class="vm-option-item">Glossy Premium</div>

                        <h6 class="fw-bold mt-3">Size</h6>
                        <div class="d-flex gap-3 mt-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sizes.png" width="40">

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
        <div class="row text-center">

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