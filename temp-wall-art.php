<?php /*Template Name: Wall Art */ get_header(); ?>

<!-- Breadcrumb -->
<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="filter-wrapper">
    <div class="container text-center">
        <h2 class="categories-title gradient-title">
            Your Life as Art on Your Walls
        </h2>
        <p class="categories-subtitle text-center">
            Your photos deserve a place on your walls. Upload your image, enhance it using AI for improved clarity and
            detail, then choose from a range of sizes, paper stocks, and finishes. Each piece is expertly printed to
            deliver exceptional quality and lasting impact.
        </p>
    </div>
    <div class="container">
        <div class="row">
            <!-- FILTER SIDEBAR -->
            <aside class="col-lg-3 filter-sidebar">
                <!-- Categories -->
                <div class="filter-box active">
                    <h5 class="filter-title">
                        Categories
                        <span class="accordion-icon"></span>
                    </h5>

                    <div class="filter-content">
                        <label><input type="checkbox" data-filter="photos"> Photos</label>
                        <label><input type="checkbox" data-filter="posters"> Posters</label>
                        <label><input type="checkbox" data-filter="wall"> Wall Tiles</label>
                        <label><input type="checkbox" data-filter="art"> Wall Art</label>
                    </div>
                </div>

                <!-- Paper Type -->
                <div class="filter-box">
                    <h5 class="filter-title">
                        Paper Type
                        <span class="accordion-icon"></span>
                    </h5>

                    <div class="filter-content">
                        <label><input type="checkbox" data-filter="matte"> Matte</label>
                        <label><input type="checkbox" data-filter="glossy"> Glossy</label>
                        <label><input type="checkbox" data-filter="premium"> Premium Glossy</label>
                    </div>
                </div>

                <!-- Shape -->
                <div class="filter-box">
                    <h5 class="filter-title">
                        Shape
                        <span class="accordion-icon"></span>
                    </h5>
                    <div class="filter-content">
                        <div class="shape-grid">

                            <button class="filter-item" data-shape="portrait">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/portrait.png"
                                    alt="Portrait">
                                <span>Portrait</span>
                            </button>

                            <button class="filter-item" data-shape="panoramic">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/panaromic.png"
                                    alt="Panoramic">
                                <span>Panoramic</span>
                            </button>

                            <button class="filter-item" data-shape="landscape">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/landscape.png"
                                    alt="Landscape">
                                <span>Landscape</span>
                            </button>

                        </div>
                    </div>
                </div>

                <!-- Size -->
                <div class="filter-box">
                    <h5 class="filter-title">
                        Size
                        <span class="accordion-icon"></span>
                    </h5>

                    <div class="filter-content">
                        <div class="size-grid">

                            <button class="filter-item" data-size="mini">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini.png"
                                    alt="Mini">
                                <span>Mini</span>
                            </button>

                            <button class="filter-item" data-size="small">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/small.png"
                                    alt="Small">
                                <span>Small</span>
                            </button>

                            <button class="filter-item" data-size="medium">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/medium.png"
                                    alt="Medium">
                                <span>Medium</span>
                            </button>

                            <button class="filter-item" data-size="large">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/large.png"
                                    alt="Large">
                                <span>Large</span>
                            </button>

                            <button class="filter-item" data-size="oversized">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/oversize.png"
                                    alt="Oversized">
                                <span>Oversized</span>
                            </button>

                            <button class="filter-item" data-size="giant">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/giant.png"
                                    alt="Giant">
                                <span>Giant</span>
                            </button>

                        </div>
                    </div>
                </div>
            </aside>

            <!-- PRODUCTS AREA -->
            <div class="col-lg-9">
                <!-- SORT BAR -->
                <div class="sorting-bar align-items-center">
                    <span>Showing 1–12 of 24 results</span>

                    <span> <span>Sort By: </span>
                        <select id="sort">
                            <option value="default">Default Sorting</option>
                            <option value="latest">Latest</option>
                            <option value="size">Size</option>
                        </select>
                    </span>
                </div>

                <!-- PRODUCT GRID -->
                <div class="product-grid">
                    <!-- PRODUCT -->
                    <div class="product-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="<?php echo home_url('/wall-art-30-x-60'); ?>" class="view-btn"><span>24x96 <br /><span class="upload_span">Upload Image <i
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


<script>
    document.querySelectorAll('.filter-title').forEach(title => {
        title.addEventListener('click', () => {
            const box = title.closest('.filter-box');
            box.classList.toggle('active');
        });
    });
</script>