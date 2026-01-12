<?php /*Template Name: Shop */ get_header(); ?>

<!-- Breadcrumb -->
<?php get_template_part(
    'template-parts/breadcrumb',
    null,
    [
        'title' => 'All Artist'
    ]
); ?>
<!-- Categories -->
<section class="categories-section">
    <div class="container">
        <?php echo do_shortcode('[vendor_grid]'); ?>
    </div>

</section>


<?php get_footer(); ?>