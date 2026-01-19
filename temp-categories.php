<?php /*Template Name: Categories */ get_header(); ?>

<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Breadcrumb
get_template_part('template-parts/breadcrumb'); 
?>

<section class="filter-wrapper">
    <div class="container text-center" style="max-width: 712px; margin: auto;">
        <h2 class="categories-title gradient-title">
            What You Would like to Print today?
        </h2>
        <p class="categories-subtitle text-center">
            Turn your favorite photos into beautifully printed Wall Art designed to elevate your space. Start by
            choosing the size that fits your wall.
        </p>
    </div>

    <div class="container">

        <?php
        // Get WooCommerce Categories
        $terms = get_terms( array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => 0,
        ) );

        if ( $terms && ! is_wp_error( $terms ) ) :
            foreach ( $terms as $category ) :

                // Get products from category
                $products = wc_get_products( array(
                    'limit'        => 3,
                    'status'       => 'publish',
                    'category'     => array( $category->slug ),
                    'orderby'      => 'date',
                    'order'        => 'DESC',
                ) );
        ?>

        <div class="cat_faq">
            <h2 class="cat_faq_title">
                <span class="w-100"><?php echo esc_html( $category->name ); ?></span>
                <span><i class="fas fa-chevron-down"></i></span>
            </h2>

            <div class="cat_faq_item">
                <div class="product-grid">

                    <?php foreach ( $products as $product ) : ?>
                        <div class="product-card">
                            <img src="<?php echo esc_url( wp_get_attachment_url( $product->get_image_id() ) ); ?>"
                                alt="<?php echo esc_attr( $product->get_name() ); ?>">

                            <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="view-btn">
                                <span>
                                    <?php echo esc_html( $product->get_name() ); ?><br />
                                    <span class="upload_span">
                                        Upload Image
                                        <i class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i>
                                    </span>
                                </span>
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

        <?php endforeach; endif; ?>

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
    document.addEventListener("DOMContentLoaded", () => {
        const items = document.querySelectorAll(".cat_faq");

        items.forEach((el, i) => {
            el.classList.toggle("active", i === 0);
            el.querySelector(".cat_faq_item").style.display = i ? "none" : "block";
        });

        items.forEach(el => {
            el.querySelector(".cat_faq_title").addEventListener("click", () => {
                items.forEach(i => {
                    i.classList.remove("active");
                    i.querySelector(".cat_faq_item").style.display = "none";
                });

                el.classList.add("active");
                el.querySelector(".cat_faq_item").style.display = "block";
            });
        });
    });
</script>