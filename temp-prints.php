<?php /*Template Name: Prints */ get_header(); ?>
<?php
$categories = [
    ["name" => "Photographic Prints", "image" => "photo.jpg"],
    ["name" => "Posters", "image" => "posters.jpg"],
    ["name" => "Wall Art", "image" => "wall-art.jpg"],
    ["name" => "Wall Tiles", "image" => "wall-tiles.jpg"],
    ["name" => "Exterior", "image" => "exterior.jpg"],
];
?>
<!-- Breadcrumb -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- Categories -->
<section class="categories-section">
    <div class="container">
        <h2 class="categories-title gradient-title">
            Explore our World of Print
        </h2>
        <p class="categories-subtitle">
            Explore a wide range of high-quality printing categories, including posters,
            photographic prints, wall photos, wall art, and exterior displays. Each product
            is crafted with premium materials and precise printing to deliver outstanding
            visual impact for every space.
        </p>
        <div class="row g-4">
            <!-- Posters -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="category-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category1.png" alt="Posters">
                    <a href="<?php echo home_url('/wall-art'); ?>" class="view-btn"><span>View Details <i class="fa-solid fa-arrow-down"
                                style="transform: rotate(-130deg);"></i></span></a>
                </div>
                <h6 class="category-name">Posters</h6>
            </div>

            <!-- Photographic Prints -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="category-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                        alt="Photographic Prints">
                    <a href="<?php echo home_url('/wall-art'); ?>" class="view-btn"><span>View Details <i class="fa-solid fa-arrow-down"
                                style="transform: rotate(-130deg);"></i></span></a>
                </div>
                <h6 class="category-name">Photographic Prints</h6>
            </div>

            <!-- Wall Tiles -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="category-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category3.png" alt="Wall Tiles">
                    <a href="<?php echo home_url('/wall-art'); ?>" class="view-btn"><span>View Details <i class="fa-solid fa-arrow-down"
                                style="transform: rotate(-130deg);"></i></span></a>
                </div>
                <h6 class="category-name">Wall Tiles</h6>
            </div>

            <!-- Wall Art -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="category-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category4.png" alt="Wall Art">
                    <a href="<?php echo home_url('/wall-art'); ?>" class="view-btn"><span>View Details <i class="fa-solid fa-arrow-down"
                                style="transform: rotate(-130deg);"></i></span></a>
                </div>
                <h6 class="category-name">Wall Art</h6>
            </div>

            <!-- Exterior -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="category-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category5.png" alt="Exterior">
                    <a href="<?php echo home_url('/wall-art'); ?>" class="view-btn"><span>View Details <i class="fa-solid fa-arrow-down"
                                style="transform: rotate(-130deg);"></i></span></a>
                </div>
                <h6 class="category-name">Exterior</h6>
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