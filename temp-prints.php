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
        <h2 class="categories-title gradient-title col-md-7 mx-auto">
            What You Would like to Print today?
        </h2>
        <p class="categories-subtitle col-md-7 mx-auto">
            Turn your favorite photos into beautifully printed Wall Art designed to elevate your space. Start by
            choosing the size that fits your wall.
        </p>
        <div class="cat_grid">
            <!-- Posters -->
            <?php get_template_part('template-parts/cat-box'); ?>
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