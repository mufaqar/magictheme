<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;



// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product );
   $product_id = get_the_ID();
?>>
	

<div class="">
                            <div class="product-box text-center">
                                <a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
                                    <?php echo get_the_post_thumbnail( $product_id, 'medium', [ 'class' => 'img-fluid' ] ); ?>
                                    <h3 class="mt-2">
                                        <?php echo esc_html( get_the_title( $product_id ) ); ?>
                                    </h3>
                                </a>
                            </div>
                        </div>
</li>
