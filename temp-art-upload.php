<?php /*Template Name: Art Upload */ get_header(); ?>

<!-- Breadcrumb -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<style>
    .print-options-card {
        width: 320px;
        background: #fff;
        border-radius: 14px;
        padding: 18px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        font-family: 'Inter', sans-serif;
    }

    .option-group {
        margin-bottom: 16px;
    }

    .option-group h6 {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    /* Image Options Grid */
    .image-options {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .image-option {
        width: 90px;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        background: #fff;
        padding: 10px 6px;
        cursor: pointer;
        text-align: center;
        transition: all 0.3s ease;
    }

    .image-option img {
        width: 40px;
        height: 40px;
        object-fit: contain;
        margin-bottom: 6px;
    }

    .image-option span {
        font-size: 12px;
        display: block;
    }

    /* Active State */
    .image-option.active {
        border-color: #3b82f6;
        background: #f0f7ff;
    }

    .image-option:hover {
        border-color: #3b82f6;
    }

    /* Info Box */
    .info-box {
        background: #f8fafc;
        border-radius: 10px;
        padding: 12px;
        margin-bottom: 16px;
    }

    .info-box h6 {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .info-box ul {
        padding-left: 16px;
    }

    .info-box li {
        font-size: 13px;
        margin-bottom: 6px;
    }

    /* Buttons */
    .btn-primary,
    .btn-secondary {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: none;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-primary {
        background: #3b82f6;
        color: #fff;
        margin-bottom: 8px;
    }

    .btn-secondary {
        background: #7c83ff;
        color: #fff;
    }
</style>
<section class="upload-art-section">
    <div class="container">
        <div class="row align-items-start g-4">

            <!-- Upload Box -->
            <div class="col-lg-7">
                <div class="upload-box text-center">
                    <div class="upload-icon mb-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/upload.png" alt="Upload" />
                    </div>
                    <h4 class="">Drag & Upload</h4>
                    <p class="mb-3">
                        or <a href="#" class="browse-link">browse files</a> on your computer
                    </p>
                    <p class="upload-info">
                        Maximum file size limit: 25MB <br>
                        Supported Files: JPG, PNG, PDF
                    </p>

                    <input type="file" class="d-none" id="fileUpload">
                </div>
                <!-- File preview -->
                <div class="file-preview text-center d-none" id="filePreview">
                    <img id="previewImage" src="" alt="Preview" style="max-width:100%; border-radius:8px;" />
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-lg-5">
                <div class="single-pro-info">
                    <span class="category">Wall Art</span>
                    <h2 class="single-pro-size">30” × 60”</h2>
                    <div class="rating mb-2">
                        ★★★★★ <span>(150 Reviews)</span>
                        <span class="stock">| In Stock</span>
                    </div>
                    <p class="description">
                        A popular wall art size ideal for feature walls and
                        vertical spaces. Perfect for showcasing your custom
                        images with a clean, balanced look.
                    </p>
                    <div class="price mb-3">
                        <strong>$80.00</strong> <span>/ Starting From*</span>
                        <div class="seen">Seen it for Less?</div>
                    </div>
                    <div class="features mb-4">
                        <strong>Key Features:</strong>
                        <ul>
                            <li>Museum-quality print finish</li>
                            <li>Available in multiple sizes</li>
                            <li>Premium matte or glossy options</li>
                            <li>Fade-resistant, long-lasting inks</li>
                        </ul>
                    </div>

                    <div class="action-buttons mb-4">
                        <div class="d-flex justify-content-between mb-4">
                            <button class="btn btn-primary" id="fileInput" type="button">
                                Upload Design
                            </button>
                            <button class="notify">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/notify.png"
                                    alt="icon" />
                            </button>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-secondary">
                                Download Template
                            </button>
                            <button class="notify">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/notify.png"
                                    alt="icon" />
                            </button>
                        </div>

                    </div>
                    <!-- STEP 1: Uploading -->
                    <div class="upload-step-box" id="stepUploading">
                        <div class="card-box">
                            <h6>Uploading image</h6>
                            <p class="d-flex justify-content-between">Uploading Your Artwork <small
                                    id="uploadPercent">0%</small></p>
                            <div class="progress mb-2">
                                <div class="progress-bar upload-bar" id="uploadBar" style="width: 0%;"></div>
                            </div>
                            <p class="mt-4 d-flex justify-content-between">Scaling Your Artwork <small
                                    id="scalePercent">0%</small></p>
                            <div class="progress mb-2">
                                <div class="progress-bar scale-bar" id="scaleBar" style="width: 0%;"></div>
                            </div>
                        </div>

                        <div class="other-actions mb-4 mt-4">
                            <div class=" mb-4">
                                <button class="btn btn-primary w-100" type="button">
                                    Upload Another Image
                                </button>
                            </div>
                            <div class="">
                                <button class="btn btn-primary w-100">
                                    Improve with AI
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="print-options-card">

                        <!-- Orientation -->
                        <div class="option-group">
                            <h6>Orientation</h6>
                            <div class="image-options">

                                <button class="image-option active">
                                    <img src="portrait.png" alt="Portrait">
                                    <span>Portrait</span>
                                </button>

                                <button class="image-option">
                                    <img src="landscape.png" alt="Landscape">
                                    <span>Landscape</span>
                                </button>

                                <button class="image-option">
                                    <img src="square.png" alt="Square">
                                    <span>Square</span>
                                </button>

                            </div>
                        </div>

                        <!-- Material -->
                        <div class="option-group">
                            <h6>Material</h6>
                            <div class="image-options">

                                <button class="image-option active">
                                    <img src="glossy.png" alt="Glossy">
                                    <span>Premium Glossy</span>
                                </button>

                                <button class="image-option">
                                    <img src="matte.png" alt="Matte">
                                    <span>Premium Matte</span>
                                </button>

                            </div>
                        </div>

                        <!-- Mount -->
                        <div class="option-group">
                            <h6>Mount & Lamination</h6>
                            <div class="image-options">

                                <button class="image-option active">
                                    <img src="unmounted.png" alt="Unmounted">
                                    <span>Unmounted</span>
                                </button>

                                <button class="image-option">
                                    <img src="mounted.png" alt="Mounted">
                                    <span>Mounted</span>
                                </button>

                            </div>
                        </div>

                        <!-- Info -->
                        <div class="info-box2">
                            <h6>Your Poster is Available for</h6>
                            <ul>
                                <li>Same-Day pickup (2–7pm)</li>
                                <li>Super-Fast Delivery</li>
                                <li>Standard Delivery (3–5 Days)</li>
                                <li>Free shipping on orders over $50</li>
                            </ul>
                        </div>

                        <!-- Buttons -->
                        <button class="btn-primary">Add to Cart</button>
                        <button class="btn-secondary">Instant Checkout</button>

                    </div>

                    <div class="info-box">
                        <div class="info-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/upl.png" alt="icon" />
                            <div>
                                <strong>Print Quality</strong>
                                <p>
                                    Your artwork is printed using professional-grade
                                    materials to ensure sharp details, vibrant colors,
                                    and a gallery-level finish.
                                </p>
                            </div>
                        </div>

                        <div class="info-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter.png"
                                alt="icon" />
                            <div>
                                <strong>Secure Upload</strong>
                                <p>
                                    Your files are encrypted and used only for printing
                                    your order. We never store or reuse customer artwork.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<section class="specs_section">
    <div class="container">
        <h2 class="gradient-title specs_title">Product Specs</h2>
        <ul class="specs">
            <li><strong>Size:</strong> 30 x 60 inches</li>
            <li><strong>Print Type:</strong> Professional-grade printing</li>
            <li><strong>Suitable For:</strong> Indoor wall display</li>
            <li><strong>Customization:</strong> Upload your own image</li>
        </ul>
    </div>
</section>
<section class="steps-section py-5">
    <div class="container">
        <!-- Heading -->
        <div class="text-center">
            <h2 class="steps-title">
                Get Your Wall Print in <br>
                <span class="gradient-title">4 Simple Steps</span>
            </h2>
            <p class="steps-subtitle">
                No design skills required, simply upload your image <br>
                and let our system handle the rest.
            </p>
        </div>
        <!-- Steps -->
        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="step-card active">
                    <span class="step-number">1</span>
                    <div class="step-icon"> <img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/edit.png" alt="icon" /></div>
                    <h5>Upload & Upscale</h5>
                    <p>
                        Upload your photo and begin your custom print journey.
                    </p>
                    <ul>
                        <li>Upload your photo</li>
                        <li>AI automatically enhances your image for your chosen size print quality</li>
                        <li>Move further for configuration</li>
                    </ul>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <span class="step-number">2</span>
                    <div class="step-icon"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ai.png"
                            alt="icon" /></div>
                    <h5>AI Enhance</h5>
                    <p>
                        Perfect your image automatically with intelligent tools.
                    </p>
                    <ul>
                        <li>Improve resolution and clarity for print quality</li>
                        <li>Remove unwanted objects or people</li>
                        <li>Fix red-eye and lighting issues</li>
                        <li>Adjust color, contrast, and sharpness</li>
                    </ul>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <span class="step-number">3</span>
                    <div class="step-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/prin.png"
                            alt="icon" /></div>
                    <h5>Customize Print</h5>
                    <p>
                        Customize paper stock, finish, and mount while previewing your artwork with live pricing.
                    </p>
                    <ul>
                        <li>Select paper type</li>
                        <li>Finish & mount option</li>
                        <li>Preview final artwork in real time</li>
                        <li>See instant price updates</li>
                    </ul>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <span class="step-number">4</span>
                    <div class="step-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ship.png"
                            alt="icon" /></div>
                    <h5>Checkout & Ship</h5>
                    <p>
                        Add to cart, check out securely, and we’ll print and ship your artwork.
                    </p>
                    <ul>
                        <li>Add your custom print to the cart</li>
                        <li>Choose delivery options</li>
                        <li>Complete checkout securely</li>
                        <li>Receive email confirmation</li>
                        <li>Artwork is professionally printed and shipped to you</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="requirements_section">
    <div class="container">
        <h2 class="gradient-title">Requirements</h2>
        <p class="require-subtitle text-black">To ensure your custom wall art looks its best when printed, please review
            the guidelines below before uploading your image.</p>
        <div class="require-wrapper">
            <div class="require-item active">
                <button class="require-title">
                    Colors That Print Beautifully
                    <span class="require-icon">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </button>
                <div class="require-content">
                    <p>
                        Images created for print look best in CMYK color mode, while RGB is typically used for screens
                        and digital displays.
                        For the best print results, we recommend uploading your artwork in CMYK.
                        If you need help or have questions, contact us at contact@visualmagic.com.
                    </p>
                </div>
            </div>
            <div class="require-item">
                <button class="require-title">
                    Accepted File Formats
                    <span class="require-icon">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </button>
                <div class="require-content">
                    <p>
                        Every product we offer is printed in house in the USA. With well over
                        100,000 satisfied customers, you can rely on Visual Magic for your print job.
                    </p>
                </div>
            </div>
            <div class="require-item">
                <button class="require-title">
                    Image Size & Quality
                    <span class="require-icon">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </button>
                <div class="require-content">
                    <p>
                        Every product we offer is printed in house in the USA. With well over
                        100,000 satisfied customers, you can rely on Visual Magic for your print job.
                    </p>
                </div>
            </div>
            <div class="require-item">
                <button class="require-title">
                    Choosing the Right Image Dimensions
                    <span class="require-icon">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </button>
                <div class="require-content">
                    <p>
                        Every product we offer is printed in house in the USA. With well over
                        100,000 satisfied customers, you can rely on Visual Magic for your print job.
                    </p>
                </div>
            </div>
            <div class="require-item">
                <button class="require-title">
                    File Size Limits
                    <span class="require-icon">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </button>
                <div class="require-content">
                    <p>
                        Every product we offer is printed in house in the USA. With well over
                        100,000 satisfied customers, you can rely on Visual Magic for your print job.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="related_pro_section">
    <div class="container">
        <!-- Heading -->
        <div class="text-center">
            <h2 class="related-pro-title mb-5">
                Explore Our <br>
                <span class="gradient-title">Wall Art Range</span>
            </h2>
            <!-- Related Products Slider Start-->
            <div class="inspiration-slider p-0">
                <div class="col-lg-3 px-2">
                    <div class="product_card2">
                        <div class="product-image">
                            <!-- Discount Badge -->
                            <span class="badge-discount">-25%</span>
                            <!-- Action Icons -->
                            <div class="product-actions">
                                <button class="action-btn">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button class="action-btn">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png"
                                alt="Inspiration">
                        </div>
                        <div class="product-content">
                            <h5 class="product-title mb-1">Wall Art - 36” × 96”</h5>
                            <div class="d-md-flex justify-content-between">
                                <p class="sale-price mb-1"> <strong>$100.00/</strong><span>Starting From*</span> </p>
                                <p class="product-price mb-1"> <strong>$150.00/</strong><span>Starting From*</span> </p>
                            </div>
                            <p class="product-reviews mb-1">
                                ⭐⭐⭐⭐⭐ <span>(99)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 px-2">
                    <div class="product_card2">
                        <div class="product-image">
                            <!-- Discount Badge -->
                            <span class="badge-discount">-25%</span>
                            <!-- Action Icons -->
                            <div class="product-actions">
                                <button class="action-btn">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button class="action-btn">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png"
                                alt="Inspiration">
                        </div>
                        <div class="product-content">
                            <h5 class="product-title mb-1">Wall Art - 36” × 96”</h5>
                            <div class="d-md-flex justify-content-between">
                                <p class="sale-price mb-1"> <strong>$100.00/</strong><span>Starting From*</span> </p>
                                <p class="product-price mb-1"> <strong>$150.00/</strong><span>Starting From*</span> </p>
                            </div>
                            <p class="product-reviews mb-1">
                                ⭐⭐⭐⭐⭐ <span>(99)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 px-2">
                    <div class="product_card2">
                        <div class="product-image">
                            <!-- Discount Badge -->
                            <span class="badge-discount">-25%</span>
                            <!-- Action Icons -->
                            <div class="product-actions">
                                <button class="action-btn">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button class="action-btn">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png"
                                alt="Inspiration">
                        </div>
                        <div class="product-content">
                            <h5 class="product-title mb-1">Wall Art - 36” × 96”</h5>
                            <div class="d-md-flex justify-content-between">
                                <p class="sale-price mb-1"> <strong>$100.00/</strong><span>Starting From*</span> </p>
                                <p class="product-price mb-1"> <strong>$150.00/</strong><span>Starting From*</span> </p>
                            </div>
                            <p class="product-reviews mb-1">
                                ⭐⭐⭐⭐⭐ <span>(99)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 px-2">
                    <div class="product_card2">
                        <div class="product-image">
                            <!-- Discount Badge -->
                            <span class="badge-discount">-25%</span>
                            <!-- Action Icons -->
                            <div class="product-actions">
                                <button class="action-btn">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button class="action-btn">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png"
                                alt="Inspiration">
                        </div>
                        <div class="product-content">
                            <h5 class="product-title mb-1">Wall Art - 36” × 96”</h5>
                            <div class="d-md-flex justify-content-between">
                                <p class="sale-price mb-1"> <strong>$100.00/</strong><span>Starting From*</span> </p>
                                <p class="product-price mb-1"> <strong>$150.00/</strong><span>Starting From*</span> </p>
                            </div>
                            <p class="product-reviews mb-1">
                                ⭐⭐⭐⭐⭐ <span>(99)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 px-2">
                    <div class="product_card2">
                        <div class="product-image">
                            <!-- Discount Badge -->
                            <span class="badge-discount">-25%</span>
                            <!-- Action Icons -->
                            <div class="product-actions">
                                <button class="action-btn">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button class="action-btn">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inspiration1.png"
                                alt="Inspiration">
                        </div>
                        <div class="product-content">
                            <h5 class="product-title mb-1">Wall Art - 36” × 96”</h5>
                            <div class="d-md-flex justify-content-between">
                                <p class="sale-price mb-1"> <strong>$100.00/</strong><span>Starting From*</span> </p>
                                <p class="product-price mb-1"> <strong>$150.00/</strong><span>Starting From*</span> </p>
                            </div>
                            <p class="product-reviews mb-1">
                                ⭐⭐⭐⭐⭐ <span>(99)</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Related Products Slider End -->
        </div>
    </div>
</section>

<section class="related_cat_section">
    <!-- Heading -->
    <div class="container text-center">
        <h2 class="related-cat-title mb-5">
            Explore Other Ways to <br>
            <span class="gradient-title">Display Your Memories</span>
        </h2>
    </div>
    <div class="sale-section py-5">
        <div class="container">
            <div class="row">
                <!-- Posters -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="category-box cat_box2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category1.png"
                            alt="Posters">
                        <a href="<?php echo home_url('/wall-art'); ?>" class="view-btn"><span>View Details <i
                                    class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i></span></a>
                    </div>
                    <h6 class="category-name">Posters</h6>
                </div>

                <!-- Photographic Prints -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="category-box cat_box2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category2.png"
                            alt="Photographic Prints">
                        <a href="<?php echo home_url('/wall-art'); ?>" class="view-btn"><span>View Details <i
                                    class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i></span></a>
                    </div>
                    <h6 class="category-name">Photographic Prints</h6>
                </div>

                <!-- Wall Tiles -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="category-box cat_box2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category3.png"
                            alt="Wall Tiles">
                        <a href="<?php echo home_url('/wall-art'); ?>" class="view-btn"><span>View Details <i
                                    class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i></span></a>
                    </div>
                    <h6 class="category-name">Wall Tiles</h6>
                </div>

                <!-- Exterior -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="category-box cat_box2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category5.png"
                            alt="Exterior">
                        <a href="<?php echo home_url('/wall-art'); ?>" class="view-btn"><span>View Details <i
                                    class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i></span></a>
                    </div>
                    <h6 class="category-name">Exterior</h6>
                </div>

            </div>
        </div>
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
    document.querySelectorAll('.require-title').forEach(button => {
        button.addEventListener('click', () => {
            const item = button.closest('.require-item');

            // Close all other items
            document.querySelectorAll('.require-item').forEach(i => {
                if (i !== item) {
                    i.classList.remove('active');
                }
            });

            // Toggle current item
            item.classList.toggle('active');
        });
    });
</script>
<script>
    const uploadBox = document.querySelector('.upload-box');
    const uploadButton = document.getElementById('fileInput'); // Upload Design button
    const fileInput = document.getElementById('fileUpload');
    const actionButtons = document.querySelector('.action-buttons');
    const infoBox = document.querySelector('.info-box');//info-box
    const stepUploading = document.getElementById('stepUploading');

    const uploadBar = document.getElementById('uploadBar');
    const scaleBar = document.getElementById('scaleBar');
    const uploadPercent = document.getElementById('uploadPercent');
    const scalePercent = document.getElementById('scalePercent');

    const filePreview = document.getElementById('filePreview');
    const previewImage = document.getElementById('previewImage');

    // Initially hide upload-step-box
    stepUploading.style.display = 'none';

    // Trigger file input when clicking upload box or button
    uploadBox.addEventListener('click', () => fileInput.click());
    uploadButton.addEventListener('click', () => fileInput.click());

    // When file is selected
    fileInput.addEventListener('change', () => {
        if (fileInput.files.length === 0) return;

        const file = fileInput.files[0];

        // Show file preview
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                filePreview.classList.remove('d-none');
                uploadBox.style.display = 'none'; // hide upload-box if needed
            };
            reader.readAsDataURL(file);
        } else {
            // For non-image files, just show the file name
            filePreview.innerHTML = `<p>${file.name}</p>`;
            filePreview.classList.remove('d-none');
            uploadBox.style.display = 'none';
        }

        // Hide action buttons
        actionButtons.style.display = 'none';
        infoBox.style.display = 'none';

        // Show upload-step-box
        stepUploading.style.display = 'block';

        // Reset progress bars
        uploadBar.style.width = '0%';
        scaleBar.style.width = '0%';
        uploadBar.className = 'progress-bar upload-bar theme-primary';
        scaleBar.className = 'progress-bar scale-bar theme-secondary';
        uploadPercent.textContent = '0%';
        scalePercent.textContent = '0%';

        // Simulate uploading
        let progress = 0;
        const interval = setInterval(() => {
            if (progress >= 100) {
                clearInterval(interval);
                // Turn bars green when done
                uploadBar.className = 'progress-bar upload-bar bg-success';
                scaleBar.className = 'progress-bar scale-bar bg-success';
            } else {
                progress += 2; // speed
                uploadBar.style.width = progress + '%';
                scaleBar.style.width = progress + '%';
                uploadPercent.textContent = progress + '%';
                scalePercent.textContent = progress + '%';
            }
        }, 100);
    });
</script>