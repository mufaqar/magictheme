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

    <div class="vendor-product-row" data-product-id="<?php echo $product_post->ID; ?>">

        <div class="product-thumb">
            <?php echo $product->get_image( 'thumbnail' ); ?>
        </div>

        <div class="product-info">
            <strong><?php echo esc_html( $product->get_name() ); ?></strong>
            <span class="category"><?php echo implode(', ', $categories); ?></span>
        </div>

        <div class="product-price">
            <?php echo wc_price( $product->get_price() ); ?>
        </div>

        <div class="product-status">
            <span class="status <?php echo esc_attr( $product_post->post_status ); ?>">
                <?php echo ucfirst( $product_post->post_status ); ?>
            </span>
        </div>

      <div class="product_actions">
            <button type="button" class="edit-product" data-id="<?php echo $product_post->ID; ?>">Edit</button>
            <button type="button" class="unpublish-product" data-id="<?php echo $product_post->ID; ?>">Unpublish</button>
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



        <p>
            <label for="product_image" class="upload-box">Product Image
                <input class="d-none" type="file" id="product_image" name="product_image" accept="image/*" required>
            </label>
        </p>
        <input type="hidden" name="product_id" value="">

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
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 15px 20px;
    border-bottom: 1px solid #eee;
}

.vendor-product-row:last-child {
    border-bottom: none;
}

.product-info {
    width: 300px;
}

.product-thumb {
    width: 80px;

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

.product_actions button {
    padding: 6px 14px;
    border-radius: 20px;
    border: 1px solid #ddd;
    cursor: pointer;
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
    border: 2px dashed #dddd;
    width: 100%;
    height: 100%;
    text-align: center;
    padding: 20px;
    border-radius: 10px;

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
    height: auto;
    max-height: 200px;
    border-radius: 10px;
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('product_image');
    const uploadBox = input.closest('.upload-box');

    input.addEventListener('change', function(event) {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let img = uploadBox.querySelector('img');
                if (!img) {
                    img = document.createElement('img');
                    uploadBox.appendChild(img);
                }
                img.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
});



document.addEventListener('click', function(e){

    if(e.target.classList.contains('edit-product')){
        e.preventDefault();

        const productId = e.target.dataset.id;

        fetch(vendorAjax.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type':'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                action: 'vendor_get_product',
                product_id: productId,
                vendor_nonce: vendorAjax.nonce
            })
        })
        .then(res => res.json())
        .then(res => {
            if(res.success){
                const p = res.data;
                document.querySelector('[name="product_id"]').value = p.id;
                document.querySelector('[name="product_title"]').value = p.title;
                document.querySelector('[name="product_price"]').value = p.price;
                document.querySelector('[name="product_category"]').value = p.category;
            } else {
                alert(res.data);
            }
        });
    }

});





jQuery(document).on('click', '.unpublish-product', function(e){

    e.preventDefault();

    if (!confirm('Unpublish this product?')) return;

    jQuery.post(vendorAjax.ajaxurl, {
        action: 'vendor_unpublish_product',
        product_id: jQuery(this).data('id'),
        vendor_nonce: vendorAjax.nonce
    }, function(res) {

        if (res.success) {
            location.reload();
        } else {
            alert(res.data);
        }

    });
});
</script>

