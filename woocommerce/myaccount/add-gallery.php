<?php
if ( ! is_user_logged_in() ) return;

$user_id = get_current_user_id();

// echo '<pre>';
// print_r( wp_get_current_user()->roles );
// echo '</pre>';



$user = wp_get_current_user();

$is_vendor = in_array( 'vendor', (array) $user->roles ) 
             || user_can( $user->ID, 'manage_vendor_store' );

if ( ! $is_vendor ) {
    wp_send_json_error('Not allowed to add product');
}


// Get vendor products
$args = [
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'author'         => $user_id,
    'post_status'    => ['publish', 'pending', 'draft'],
];

$vendor_products = get_posts( $args );


?>




<?php if ( $vendor_products ) : ?>
<h3>Your Products</h3>

<div class="vendor-product-list">

    <?php foreach ( $vendor_products as $product_post ) :

            $product = wc_get_product( $product_post->ID );
            if ( ! $product ) continue;

            $categories = wp_get_post_terms(
                $product_post->ID,
                'product_cat',
                ['fields' => 'names']
            );
        ?>

    <div class="vendor-product-row">

        <div class="product-thumb">
            <?php echo $product->get_image( 'thumbnail' ); ?>
        </div>

        <div class="product-info">
            <strong><?php echo esc_html( $product->get_name() ); ?></strong>
            <?php if ( $categories ) : ?>
            <span class="category">
                <?php echo implode(', ', $categories); ?>
            </span>
            <?php endif; ?>
        </div>

        <div class="product-price">
            <?php echo wc_price( $product->get_price() ); ?>
        </div>

        <div class="product-status">
            <span class="status <?php echo esc_attr( $product_post->post_status ); ?>">
                <?php echo ucfirst( $product_post->post_status ); ?>
            </span>
        </div>

    </div>

    <?php endforeach; ?>

</div>
<?php endif; ?>



<div class="vendor-product-form-wrapper">


    <form id="vendorProductForm" enctype="multipart/form-data">

        <div class="field">
            <select name="product_category" required>
                <option value="">Select Category</option>
                <?php
            $cats = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => false
            ]);
            foreach ( $cats as $cat ) {
                echo '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';
            }
            ?>
            </select>
        </div>


        <div class="field">
            <input type="text" name="product_title" placeholder="Product Title" required>
        </div>

        <div class="field">
            <input type="number" name="product_price" placeholder="Price" step="0.01" required>
        </div>


        <!-- Beautiful uploader -->
        <p>
            <label>Product Image</label><br>
            <input type="file" name="product_image" accept="image/*" required>
        </p>

        <input type="hidden" name="action" value="vendor_ajax_add_product">
        <?php wp_nonce_field( 'vendor_ajax_product', 'vendor_nonce' ); ?>

        <button type="submit">Add Product</button>

        <div class="form-message"></div>

    </form>

</div>

<style>
/* ===== Vendor Product List ===== */

.vendor-product-list {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
    overflow: hidden;
    margin-bottom: 40px;
}

.vendor-product-row {
    display: grid;
    grid-template-columns: 70px 1fr 120px 120px;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    border-bottom: 1px solid #eee;
}

.vendor-product-row:last-child {
    border-bottom: none;
}

.product-thumb img {
    width: 60px;
    height: 60px;
    border-radius: 10px;
    object-fit: cover;
}

.product-info strong {
    display: block;
    font-size: 15px;
}

.product-info .category {
    display: block;
    font-size: 13px;
    color: #777;
}

.product-price {
    font-weight: 600;
}

.product-status .status {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
}

.status.publish {
    background: #e6f9ee;
    color: #1a7f37;
}

.status.pending {
    background: #fff3cd;
    color: #856404;
}

.status.draft {
    background: #eee;
    color: #555;
}

/* Mobile */
@media (max-width: 768px) {
    .vendor-product-row {
        grid-template-columns: 50px 1fr;
        grid-row-gap: 10px;
    }

    .product-price,
    .product-status {
        grid-column: span 2;
    }
}



/* ===== Vendor Add Product Form ===== */

.vendor-product-form-wrapper {
    background: #fff;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
    max-width: 720px;
}

.vendor-product-form-wrapper h3 {
    font-size: 22px;
    margin-bottom: 25px;
}

/* Fields */
.vendor-product-form-wrapper .field {
    margin-bottom: 20px;
}

.vendor-product-form-wrapper input,
.vendor-product-form-wrapper select {
    width: 100%;
    padding: 14px 16px;
    border-radius: 10px;
    border: 1px solid #ddd;
    font-size: 15px;
    transition: .3s;
}

.vendor-product-form-wrapper input:focus,
.vendor-product-form-wrapper select:focus {
    border-color: #000;
    outline: none;
}

/* Upload box */
.upload-box {
    border: 2px dashed #ccc;
    padding: 40px;
    text-align: center;
    border-radius: 12px;
    cursor: pointer;
    transition: .3s;
    position: relative;
}

.upload-box:hover {
    border-color: #000;
    background: #fafafa;
}

.upload-box p {
    font-size: 15px;
    color: #666;
}

.upload-box img {
    max-width: 180px;
    margin-top: 15px;
    border-radius: 12px;
}

/* Button */
.vendor-product-form-wrapper button {
    background: #000;
    color: #fff;
    padding: 14px 40px;
    border-radius: 50px;
    border: none;
    font-size: 15px;
    cursor: pointer;
    transition: .3s;
}

.vendor-product-form-wrapper button:hover {
    background: #222;
}

/* Messages */
.form-message {
    margin-top: 15px;
    font-weight: 600;
}

.form-message.success {
    color: #1a7f37;
}

.form-message.error {
    color: #c62828;
}
</style>