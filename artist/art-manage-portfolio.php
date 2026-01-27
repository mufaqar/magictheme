<?php
/* Template Name: Art Manage Portfolio */
get_header();
?>
<style>
.pro_table {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.pro_table .pro_table_list {
    display: flex;
    gap: 23px;
    box-shadow: 0px -0.58px 3.09px 0px #00000040;
    padding: 10px 23px;
    align-items: center;
    justify-content: space-between;
    border-radius: 6.42px
}

.pro_table .pro_table_list li:first-child {
    width: 70%;
}

.pro_table .pro_table_list li span {
    font-weight: 400;
    font-size: 10px;
    line-height: 1.1;
    color: #000;
}

.pro_table .pro_table_list li button {
    font-weight: 400;
    font-size: 10px;
    line-height: 1.1;
    border: none;
    background: none;
    outline: none;
    color: #000;
}

.pro_table .pro_table_list li button i {
    font-size: 14px;
    color: #000;
}

.pro_table .pro_table_list li button:hover i {
    color: #8078D1;
}

.table_pro {
    display: flex;
    align-items: center;
    gap: 15px;
}

.table_pro .table_pro_info h6 {
    font-weight: 400;
    font-size: 15px;
    line-height: 1.1;
    color: #000;
    margin-bottom: 4px;
}

.table_pro .table_pro_info p {
    font-weight: 400;
    font-size: 9px;
    line-height: 1.1;
    color: #000000;
    margin-bottom: 0;
}

.upload_product {
    padding: 60px 0;
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 100vh;
}

.upload_product h2 {
    font-weight: 600;
    font-size: 42px;
    line-height: 1.1;
    color: #000;
    text-align: center;
    margin-bottom: 61px;
}

.pro_img_preview img {
    width: 100%;
    border-radius: 24.6px;
}

.prod_detail {
    background: #fff;
    border-radius: 15px;
    padding: 36px 16px 21px;
    box-shadow: -2px 0px 4px 0px #0000000D;
}

.prod_detail h3 {
    font-weight: 700;
    font-size: 25px;
    line-height: 1.1;
    color: #000;
}

@media (max-width: 768px) {
    .pro_table {
        max-width: 100%;
        overflow-x: scroll;
    }

    .pro_table .pro_table_list {
        gap: 9px;
        padding: 10px 5px;
    }

    .pro_table .pro_table_list li:first-child {
        width: 35%;
    }

    .table_pro .table_pro_info h6 {
        font-size: 12px;
    }
}
</style>

<main class="profile_edit_main container mt-5">
    <div class="row">
        <div class="col-md-3">
            <?php get_template_part('template-parts/profile-edit-side'); ?>
        </div>
        <div class="col-md-9 profile_content ">
            <div class="profile_box">
                <label class="upload-box text-center w-full mt-5" id="browseBtn">
                    <div class="upload-icon mb-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/upload.png" />
                    </div>
                    <h4>Drag & Upload</h4>
                    <p class="mb-3">
                        or <span class="browse-link">browse files</span> on your computer
                    </p>
                    <p class="upload-info">
                        Maximum file size limit: 25MB <br>
                        Supported Files: JPG, PNG, PDF
                    </p>
                    <input type="file" class="d-none" id="fileUpload">
                </label>
                <div class="pro_table mt-5">
                    <ul class="pro_table_list">
                        <li><span>Product </span></li>
                        <li><span>Price </span></li>
                        <li><span>Publish </span></li>
                        <li><span>Edit </span></li>
                        <li><span>Private </span></li>
                        <li><span>Delete </span></li>
                    </ul>
                    <ul class="pro_table_list">
                        <li>
                            <div class="table_pro">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pro.png"
                                    alt="img" />
                                <div class="table_pro_info">
                                    <h6><a href="#">Desert Scent</a></h6>
                                    <p>Best Sellers</p>
                                </div>
                            </div>
                        </li>
                        <li><span>$20 </span></li>
                        <li><span>Unpublish </span></li>
                        <li><button>Edit </button></li>
                        <li><button><i class="fa-regular fa-eye"></i> </button></li>
                        <li><button><i class="fa-regular fa-trash-can"></i> </button></li>
                    </ul>
                </div>
                <!-- Buttons -->
                <div class="action-buttons mt-5 col-md-6">
                    <button class="btn btn-secondary w-100"><span>Back</span></button>
                    <button class="btn btn-primary w-100"><span>Save Changes</span></button>
                </div>
            </div>
        </div>
    </div>
</main>
<section class="upload_product"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/uplaod-bg.png');">
    <div class="container">
        <h2 class="upload_prod_title">Single Image Upload</h2>
        <?php get_template_part('template-parts/add-product'); ?>
    </div>
</section>



<?php get_footer(); ?>

<style>
    .upload_product {
    display: none;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const fileInput = document.getElementById('fileUpload');
    const profileSection = document.querySelector('.profile_edit_main');
    const uploadSection = document.querySelector('.upload_product');
    const previewImage = document.getElementById('productImagePreview');
    const hiddenImageId = document.getElementById('global_product_image_id');

    if (!fileInput) return;

    fileInput.addEventListener('change', function () {

        const file = this.files[0];
        if (!file) return;

        if (!file.type.startsWith('image/')) {
            alert('Please upload an image');
            return;
        }

        let formData = new FormData();
        formData.append('action', 'wcv_ajax_upload_product_image');
        formData.append('product_image', file);

        fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(res => {

            if (!res.success) {
                alert(res.data);
                return;
            }

            // ✅ Save attachment ID globally
            hiddenImageId.value = res.data.id;

            // ✅ Update preview in add-product template
            if (previewImage) {
                previewImage.src = res.data.url;
            }

            // Toggle sections
            profileSection.style.display = 'none';
            uploadSection.style.display = 'block';
            uploadSection.scrollIntoView({ behavior: 'smooth' });
        });

    });

});
</script>
