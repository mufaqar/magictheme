<div class="row gap-md-0 gap-3">
    <div class="pro_img_preview col-md-6">
        <img id="productImagePreview"
             src="<?php echo get_template_directory_uri(); ?>/assets/images/produc.png"
             alt="Product Preview" />
    </div>

    <div class="col-md-6">
        <div class="prod_detail">
            <h3>Product Details</h3>
            <hr />

            <form class="personal_detail" id="vendor-add-product-form" enctype="multipart/form-data">

                <!-- attachment ID -->
                <input type="text" id="global_product_image_id" name="global_product_image_id" hidden />
                <!-- product id for edits -->
                <input type="hidden" id="product_id" name="product_id" value="" />

               
                <div class="form_row">
                    <input type="text" name="product_title" placeholder="Product Title" required>
                </div>


                <div class="form_row">
                    <textarea name="img_bio" rows="5" placeholder="Add Image Bio"></textarea>
                </div>

                <div class="form_row">
                    <textarea name="p_feature" rows="5" placeholder="Key Features"></textarea>
                </div>

                <div class="form_row">
                    <select name="category">
                        <option value="">Select Category</option>
                        <?php
                        $cats = get_terms(['taxonomy' => 'product_cat','hide_empty' => false]);
                        foreach ($cats as $cat) {
                            echo '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form_row">
                    <select name="product_attributes[pa_shape]" required>
                        <option value="">Orientation</option>
                        <?php
                        $shapes = get_terms(['taxonomy'=>'pa_shape','hide_empty'=>false]);
                        foreach ($shapes as $shape) {
                            echo '<option value="'.$shape->term_id.'">'.$shape->name.'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form_row">
                    <input type="number" name="product_price" step="0.01" placeholder="Price" required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

                <div class="product-message mt-3"></div>
            </form>
        </div>
    </div>
</div>

<script>
jQuery(function ($) {

    // IMAGE UPLOAD
    $('#product_image').on('change', function () {

    alert("TEst");

        let file = this.files[0];
        if (!file) return;

        let formData = new FormData();
        formData.append('action', 'wcv_ajax_upload_product_image');
        formData.append('product_image', file);

        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.success) {
                    $('#productImagePreview').attr('src', res.data.url);
                    $('#product_image_id').val(res.data.id);
                } else {
                    alert(res.data);
                }
            }
        });
    });

    // PRODUCT SUBMIT
    $('#vendor-add-product-form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append('action', 'wcv_ajax_add_product');

       $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    $('.product-message').html(
                        '<div class="alert alert-success">' + response.data.message + '</div>'
                    );                    
                    setTimeout(function () {
                        window.location.href = response.data.redirect;
                    }, 2000);

                } else {
                    $('.product-message').html(
                        '<div class="alert alert-danger">' + response.data + '</div>'
                    );
                }
            }
        });

    });

});
</script>
