<?php
// -----------------------------
// 1. Display Custom Options on Product Page
// -----------------------------
//add_action( 'woocommerce_before_add_to_cart_button', 'custom_product_options', 20 );
function custom_product_options() {
    global $product;

    if ( $product->is_type( 'simple' ) ) {

        echo '<div class="custom-product-options" style="margin-bottom:20px;">';

        // Aspect Ratio
        echo '<div class="aspect-ratio-panel" style="margin-bottom:15px;">';
        echo '<h4 style="margin-bottom:8px;">Choose Aspect Ratio</h4>';
        echo '<div class="aspect-buttons" style="display:flex; gap:10px; margin-bottom:10px;">
                <button type="button" data-ratio="1.777" class="btn btn-outline-primary">Landscape</button>
                <button type="button" data-ratio="0.5625" class="btn btn-outline-primary">Portrait</button>
                <button type="button" data-ratio="1" class="btn btn-outline-primary">Square</button>
                <button type="button" data-ratio="NaN" class="btn btn-outline-primary">Freeform</button>
              </div>';
        echo '<input type="hidden" name="aspect_ratio" id="aspect_ratio">';
        echo '<input type="hidden" name="crop_data" id="crop_data">';
        echo '</div>';

        // Paper Type
        echo '<p><label for="paper_type">Paper Type:</label>';
        echo '<select name="paper_type" id="paper_type" required class="form-control">
                <option value="">Select Paper Type</option>
                <option value="Paper type 1">Paper type 1</option>
                <option value="Paper type 2">Paper type 2</option>
                <option value="Paper type 3">Paper type 3</option>
              </select></p>';

        // Image Size
        echo '<p><label for="image_size">Image Size:</label>';
        echo '<select name="image_size" id="image_size" required class="form-control">
                <option value="">Select Image Size</option>
                <option value="10x12">10″ x 12″</option>
                <option value="11x14">11″ x 14″</option>
                <option value="12x16">12″ x 16″</option>
              </select></p>';

        // Frame Type
        echo '<p><label for="frame_type">Frame Type:</label>';
        echo '<select name="frame_type" id="frame_type" required class="form-control">
                <option value="">Select Frame Type</option>
                <option value="Wooden">Wooden</option>
                <option value="Steel">Steel</option>
                <option value="Copper">Copper</option>
              </select></p>';

        echo '</div>'; // end custom-product-options
    }
}


// -----------------------------
// 2. Save Custom Options to Cart Item
// -----------------------------
add_filter( 'woocommerce_add_cart_item_data', 'save_custom_product_options', 10, 2 );
function save_custom_product_options( $cart_item_data, $product_id ) {

    if ( isset($_POST['paper_type']) ) {
        $cart_item_data['paper_type'] = sanitize_text_field($_POST['paper_type']);
    }

    if ( isset($_POST['image_size']) ) {
        $cart_item_data['image_size'] = sanitize_text_field($_POST['image_size']);
    }

    if ( isset($_POST['frame_type']) ) {
        $cart_item_data['frame_type'] = sanitize_text_field($_POST['frame_type']);
    }

    if ( isset($_POST['aspect_ratio']) ) {
        $cart_item_data['aspect_ratio'] = sanitize_text_field($_POST['aspect_ratio']);
    }

    if ( isset($_POST['crop_data']) ) {
        $cart_item_data['crop_data'] = sanitize_text_field($_POST['crop_data']);
    }

    return $cart_item_data;
}


// -----------------------------
// 3. Display Custom Options in Cart & Checkout
// -----------------------------
add_filter( 'woocommerce_get_item_data', 'display_custom_product_options_cart', 10, 2 );
function display_custom_product_options_cart( $item_data, $cart_item ) {

    if ( isset($cart_item['paper_type']) ) {
        $item_data[] = array(
            'key' => 'Paper Type',
            'value' => $cart_item['paper_type']
        );
    }
    if ( isset($cart_item['image_size']) ) {
        $item_data[] = array(
            'key' => 'Image Size',
            'value' => $cart_item['image_size']
        );
    }
    if ( isset($cart_item['frame_type']) ) {
        $item_data[] = array(
            'key' => 'Frame Type',
            'value' => $cart_item['frame_type']
        );
    }
    if ( isset($cart_item['aspect_ratio']) ) {
        $item_data[] = array(
            'key' => 'Aspect Ratio',
            'value' => $cart_item['aspect_ratio']
        );
    }
    if ( isset($cart_item['crop_data']) ) {
        $item_data[] = array(
            'key' => 'Crop Data',
            'value' => $cart_item['crop_data']
        );
    }

    return $item_data;
}


// -----------------------------
// 4. Save Custom Options to Order Items
// -----------------------------
add_action( 'woocommerce_add_order_item_meta', 'add_custom_options_order', 10, 2 );
function add_custom_options_order( $item_id, $values ) {

    if ( ! empty($values['paper_type']) ) {
        wc_add_order_item_meta( $item_id, 'Paper Type', $values['paper_type'] );
    }
    if ( ! empty($values['image_size']) ) {
        wc_add_order_item_meta( $item_id, 'Image Size', $values['image_size'] );
    }
    if ( ! empty($values['frame_type']) ) {
        wc_add_order_item_meta( $item_id, 'Frame Type', $values['frame_type'] );
    }
    if ( ! empty($values['aspect_ratio']) ) {
        wc_add_order_item_meta( $item_id, 'Aspect Ratio', $values['aspect_ratio'] );
    }
    if ( ! empty($values['crop_data']) ) {
        wc_add_order_item_meta( $item_id, 'Crop Data', $values['crop_data'] );
    }
}


// -----------------------------
// 5. Cropper.js + Aspect Ratio JS
// -----------------------------
add_action( 'wp_footer', function() {
    if ( is_product() ) : ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css"/>
    <script>
    jQuery(function($){
        let cropper;
        const image = document.querySelector('.woocommerce-product-gallery img.wp-post-image');
        if (!image) return;

        cropper = new Cropper(image, {
            viewMode: 1,
            autoCropArea: 1,
            responsive: true,
            movable: true,
            zoomable: true,
            background: false
        });

        $('.aspect-buttons button').on('click', function(){

            let ratio = $(this).data('ratio');

            if(ratio === 'NaN') { ratio = NaN; } else { ratio = parseFloat(ratio); }

            cropper.setAspectRatio(ratio);

            $('#aspect_ratio').val($(this).text());

            $('.aspect-buttons button').removeClass('active');
            $(this).addClass('active');
        });

        $('form.cart').on('submit', function(){
            const cropData = cropper.getData(true);
            $('#crop_data').val(JSON.stringify(cropData));
        });

    });
    </script>
    <style>
        .aspect-buttons button.active {
            background-color: #0d6efd;
            color: #fff;
        }
    </style>
    <?php endif;
});
