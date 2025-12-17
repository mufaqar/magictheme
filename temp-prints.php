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
<section class="breadcrumb-wrapper" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/breadcrumb-bg.png');">
    <div class="container text-center">
        <h1>
            <?php the_title(); ?>
        </h1>
        <p> <a href="<?php bloginfo('url'); ?>">Home</a> / <strong><?php the_title(); ?></strong></p>
    </div>
</section>
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
                    <a href="#" class="view-btn">View Details →</a>
                </div>
                <h6 class="category-name">Posters</h6>
            </div>

            <!-- Photographic Prints -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="category-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                        alt="Photographic Prints">
                    <a href="#" class="view-btn">View Details →</a>
                </div>
                <h6 class="category-name">Photographic Prints</h6>
            </div>

            <!-- Wall Tiles -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="category-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category3.png" alt="Wall Tiles">
                </div>
                <h6 class="category-name">Wall Tiles</h6>
            </div>

            <!-- Wall Art -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="category-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category4.png" alt="Wall Art">
                </div>
                <h6 class="category-name">Wall Art</h6>
            </div>

            <!-- Exterior -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="category-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category5.png" alt="Exterior">
                </div>
                <h6 class="category-name">Exterior</h6>
            </div>

        </div>
    </div>
</section>

<!-- Description -->
<div class="container text-center mt-5">
    <h2 class="section-title">Explore our World of Print</h2>
    <p class="text-muted mt-3">
        Explore a wide range of high-quality printing categories, including posters,
        photographic prints, wall photos, wall art, and exterior displays. Each product
        is crafted with premium materials and precise printing to deliver outstanding
        visual impact for every space.
    </p>
</div>

<!-- Features -->
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-4 col-12 feature-box">
            <strong>High-Resolution Printing</strong><br>
            <small>Sharp clarity & vivid colors</small>
        </div>
        <div class="col-md-4 col-12 feature-box">
            <strong>AI Perfected Prints</strong><br>
            <small>Instant AI upscaling</small>
        </div>
        <div class="col-md-4 col-12 feature-box">
            <strong>Premium Materials</strong><br>
            <small>Durable & professional</small>
        </div>
    </div>
</div>

<?php get_template_part('template-parts/faqs'); ?>

<?php get_footer(); ?>