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
            Turn your favorite photos into beautifully printed Wall Art designed to elevate your space.
            Start by choosing the size that fits your wall.
        </p>
    </div>

    <div class="container">

        <?php
        // Get Parent Print Types
        $terms = get_terms( array(
            'taxonomy'   => 'print_types',
            'hide_empty' => true,
            'parent'     => 0,
        ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
            foreach ( $terms as $term ) :

                // Query Prints under this Print Type
                $prints = new WP_Query( array(
                    'post_type'      => 'prints',
                    'posts_per_page' => 10,
                    'post_status'    => 'publish',
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'print_types',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                    'orderby' => 'date',
                    'order'   => 'DESC',
                ) );
        ?>

        <div class="cat_faq">
            <h2 class="cat_faq_title">
                <span class="w-100"><?php echo esc_html( $term->name ); ?></span>
                <span><i class="fas fa-chevron-down"></i></span>
            </h2>

            <div class="cat_faq_item">
                <div class="grid_5">

                    <?php if ( $prints->have_posts() ) : ?>
                        <?php while ( $prints->have_posts() ) : $prints->the_post(); ?>

                            <div class="product-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ); ?>"
                                         alt="<?php echo esc_attr( get_the_title() ); ?>">
                                <?php endif; ?>

                                <a href="<?php echo home_url('/customize-upload'); ?>?id=<?php echo get_the_ID(); ?>" class="view-btn">
                                    <span>
                                        <?php the_title(); ?><br />
                                        <span class="upload_span">
                                            Upload Image
                                            <i class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i>
                                        </span>
                                    </span>
                                </a>
                            </div>

                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif; ?>

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