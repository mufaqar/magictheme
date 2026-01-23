<div class="row gap-md-0 gap-3">
    <div class="pro_img_preview col-md-6">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/produc.png" alt="img" />
    </div>
    <div class="col-md-6">
        <div class="prod_detail">
            <h3>Product Details</h3>
            <hr />
            <form class="personal_detail">
                <div class="form_row">
                    <label for="p_title" class="d-none">Product Title</label>
                    <input type="text" id="p_title" name="p_title" placeholder="Product Title" />
                </div>
                <div class="form_row">
                    <label for="img_bio" class="d-none">Add Image Bio</label>
                    <textarea type="text" id="img_bio" name="img_bio" rows="7" placeholder="Add Image Bio"></textarea>
                </div>
                <div class="form_row">
                    <label for="p_feature" class="d-none">Key Features</label>
                    <textarea type="text" id="p_feature" name="p_feature" rows="7"
                        placeholder="Key Features"></textarea>
                </div>
                <div class="form_row">
                    <label for="category" class="d-none">Select Category</label>
                    <select id="category" name="category">
                        <option value="">Select Category</option>
                        <option value="poster">Poster</option>
                        <option value="wall-tiles">Wall Tiles</option>
                        <option value="large-wall-art">Large Wall Art</option>
                        <option value="exterior">Exterior</option>
                    </select>
                </div>
                <div class="form_row">
                    <label for="orientation" class="d-none">Orientation</label>
                    <select id="orientation" name="orientation">
                        <option value="">Orientation</option>
                        <option value="landscape">Landscape</option>
                        <option value="portrait">Portrait</option>
                        <option value="square">Square</option>
                        <option value="freeform">Freeform</option>
                    </select>
                </div>
                <div class="form_row">
                    <label for="price" class="d-none">Price</label>
                    <input type="text" id="price" name="price" placeholder="Price" />
                </div>

                <!-- Buttons -->
                <div class="action-buttons mt-5">
                    <button class="btn btn-secondary w-100"><span>Back</span></button>
                    <button class="btn btn-primary w-100 mt-3"><span>Save</span></button>
                </div>
            </form>
        </div>
    </div>
</div>