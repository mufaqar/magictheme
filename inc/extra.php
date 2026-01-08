<?php


add_action( 'woocommerce_before_add_to_cart_button', 'custom_product_options' );
function custom_product_options() {
    global $product;

    if ( $product->is_type( 'simple' ) ) {
        echo '<div class="custom-product-options" style="margin-bottom: 20px;">';

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

        // **Aspect Ratio**
        echo '<p><label for="aspect_ratio">Aspect Ratio:</label>';
        echo '<select name="aspect_ratio" id="aspect_ratio" required class="form-control">
                <option value="">Select Aspect Ratio</option>
                <option value="landscape">Landscape (16:9)</option>
                <option value="portrait">Portrait (9:16)</option>
                <option value="square">Square (1:1)</option>
                <option value="freeform">Freeform</option>
              </select></p>';

        echo '</div>';
    }
}


// Save the custom fields values to cart item
add_filter( 'woocommerce_add_cart_item_data', 'save_custom_product_options', 10, 2 );
function save_custom_product_options( $cart_item_data, $product_id ) {
    if( isset( $_POST['paper_type'] ) ) {
        $cart_item_data['paper_type'] = sanitize_text_field( $_POST['paper_type'] );
    }
    if( isset( $_POST['image_size'] ) ) {
        $cart_item_data['image_size'] = sanitize_text_field( $_POST['image_size'] );
    }
    if( isset( $_POST['frame_type'] ) ) {
        $cart_item_data['frame_type'] = sanitize_text_field( $_POST['frame_type'] );
    }
    if( isset( $_POST['aspect_ratio'] ) ) {
    $cart_item_data['aspect_ratio'] = sanitize_text_field( $_POST['aspect_ratio'] );
}
    return $cart_item_data;
}


// Show selected options in cart and checkout
add_filter( 'woocommerce_get_item_data', 'display_custom_product_options_cart', 10, 2 );
function display_custom_product_options_cart( $item_data, $cart_item ) {
    if( isset( $cart_item['paper_type'] ) ) {
        $item_data[] = array(
            'key'   => 'Paper Type',
            'value' => $cart_item['paper_type']
        );
    }
    if( isset( $cart_item['image_size'] ) ) {
        $item_data[] = array(
            'key'   => 'Image Size',
            'value' => $cart_item['image_size']
        );
    }
    if( isset( $cart_item['frame_type'] ) ) {
        $item_data[] = array(
            'key'   => 'Frame Type',
            'value' => $cart_item['frame_type']
        );
    }

    if( isset( $cart_item['aspect_ratio'] ) ) {
    $item_data[] = array(
        'key'   => 'Aspect Ratio',
        'value' => ucfirst( $cart_item['aspect_ratio'] )
    );
}

// And for order items
if( ! empty( $values['aspect_ratio'] ) ) {
    wc_add_order_item_meta( $item_id, 'Aspect Ratio', $values['aspect_ratio'] );
}
    return $item_data;
}


add_action( 'woocommerce_add_order_item_meta', 'add_custom_options_order', 10, 2 );
function add_custom_options_order( $item_id, $values ) {
    if( ! empty( $values['paper_type'] ) ) {
        wc_add_order_item_meta( $item_id, 'Paper Type', $values['paper_type'] );
    }
    if( ! empty( $values['image_size'] ) ) {
        wc_add_order_item_meta( $item_id, 'Image Size', $values['image_size'] );
    }
    if( ! empty( $values['frame_type'] ) ) {
        wc_add_order_item_meta( $item_id, 'Frame Type', $values['frame_type'] );
    }
}


/*Cropp*/


add_action( 'woocommerce_before_add_to_cart_button', function () {
    ?>
    <div class="aspect-ratio-panel">

        <h4>Choose Aspect Ratio</h4>

        <div class="aspect-buttons">
            <button type="button" data-ratio="1.777">Landscape</button>
            <button type="button" data-ratio="0.5625">Portrait</button>
            <button type="button" data-ratio="1">Square</button>
            <button type="button" data-ratio="NaN">Freeform</button>
        </div>

        <input type="hidden" name="crop_data" id="crop_data">
        <input type="hidden" name="aspect_ratio" id="aspect_ratio">

    </div>
    <?php
});
