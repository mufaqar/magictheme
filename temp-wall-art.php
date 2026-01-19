<?php /*Template Name: Wall Art */ get_header(); ?>

<!-- Breadcrumb -->
<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="filter-wrapper">
    <div class="container text-center" style="max-width: 734px; margin: auto;">
        <h2 class="categories-title gradient-title">
           What You Would like to Print today?
        </h2>
        <p class="categories-subtitle text-center">
            Your photos deserve a place on your walls. Upload your image, enhance it using AI for improved clarity and
            detail, then choose from a range of sizes, paper stocks, and finishes. Each piece is expertly printed to
            deliver exceptional quality and lasting impact.
        </p>
    </div>
    <div class="container">
        <div class="row">

            <!-- PRODUCTS AREA -->
            <div class="col-lg-12">
                <div class="product-grid">
                    <!-- PRODUCT -->
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="<?php echo home_url('/wall-art-30-x-60'); ?>" class="view-btn"><span>24x96 <br /><span
                                    class="upload_span">Upload Image <i class="fa-solid fa-arrow-down"
                                        style="transform: rotate(-130deg);"></i></span></span></a>
                    </div>
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="#" class="view-btn"><span>24x96 <br /><span class="upload_span">Upload Image <i
                                        class="fa-solid fa-arrow-down"
                                        style="transform: rotate(-130deg);"></i></span></span></a>
                    </div>
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="#" class="view-btn"><span>24x96 <br /><span class="upload_span">Upload Image <i
                                        class="fa-solid fa-arrow-down"
                                        style="transform: rotate(-130deg);"></i></span></span></a>
                    </div>
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="#" class="view-btn"><span>24x96 <br /><span class="upload_span">Upload Image <i
                                        class="fa-solid fa-arrow-down"
                                        style="transform: rotate(-130deg);"></i></span></span></a>
                    </div>
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="#" class="view-btn"><span>24x96 <br /><span class="upload_span">Upload Image <i
                                        class="fa-solid fa-arrow-down"
                                        style="transform: rotate(-130deg);"></i></span></span></a>
                    </div>
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="#" class="view-btn"><span>24x96 <br /><span class="upload_span">Upload Image <i
                                        class="fa-solid fa-arrow-down"
                                        style="transform: rotate(-130deg);"></i></span></span></a>
                    </div>
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="#" class="view-btn"><span>24x96 <br /><span class="upload_span">Upload Image <i
                                        class="fa-solid fa-arrow-down"
                                        style="transform: rotate(-130deg);"></i></span></span></a>
                    </div>
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="#" class="view-btn"><span>24x96 <br /><span class="upload_span">Upload Image <i
                                        class="fa-solid fa-arrow-down"
                                        style="transform: rotate(-130deg);"></i></span></span></a>
                    </div>
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="#" class="view-btn"><span>24x96 <br /><span class="upload_span">Upload Image <i
                                        class="fa-solid fa-arrow-down"
                                        style="transform: rotate(-130deg);"></i></span></span></a>
                    </div>
                </div>

                <!-- PAGINATION -->
                <div class="pagination">
                    <button class="prev">‹</button>
                    <button class="active">1</button>
                    <button>2</button>
                    <button class="next">›</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<?php get_template_part('template-parts/features'); ?>
<!-- Sale Section -->
<?php get_template_part('template-parts/sale'); ?>
<!-- Inspiration-section -->
<?php get_template_part('template-parts/inspiration-slider'); ?>


<?php get_template_part('template-parts/faqs'); ?>

<?php get_footer(); ?>