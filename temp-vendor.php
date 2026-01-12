<?php /* Template Name: Vendor Page */ get_header(); ?>

<?php
$vendor_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

echo $vendor_id;

if ( ! $vendor_id ) {
    echo '<p>Vendor not found.</p>';
    return;
}
?>

<!-- Breadcrumb -->
<?php get_template_part(
    'template-parts/breadcrumb',
    null,
    [
        'title' => 'Artist Albumbs'
    ]
); ?>

<div class="container my-5">
    <div class="row vm_artist_gallery">
        <div class="container my-5">
            <div class="row">
                <?php 
        
       
        $vendor_categories = get_woo_categories_by_user( $vendor_id );
        
        if ( ! empty($vendor_categories) ) : ?>
                <?php foreach ( $vendor_categories as $cat_id ) :
                $category = get_term( $cat_id, 'product_cat' );
                if ( ! $category || is_wp_error($category) ) continue;

                $cat_link = add_query_arg('vendor_id',$vendor_id, get_term_link( $category ));
                $cat_name = $category->name;
                $cat_thumb_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                $cat_thumb_url = $cat_thumb_id ? wp_get_attachment_url( $cat_thumb_id ) : wc_placeholder_img_src();
            ?>
                <div class="col-md-3 mb-4 text-center">
                    <a href="<?php echo esc_url($cat_link); ?>">
                        <img src="<?php echo esc_url($cat_thumb_url); ?>" alt="<?php echo esc_attr($cat_name); ?>"
                            class="img-fluid rounded mb-2">
                        <h5><?php echo esc_html($cat_name); ?></h5>
                    </a>
                </div>
                <?php endforeach; ?>
                <?php else : ?>
                <p class="text-center">
                    <?php esc_html_e( 'No categories found for this vendor.', 'my-bootstrap-theme' ); ?></p>
                <?php endif; ?>
            </div>
        </div>



    </div>
</div>

<?php get_footer(); ?>