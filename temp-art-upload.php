<?php /*Template Name: Art Upload */ get_header(); ?>
<style>
    .upload-art-section,
    .specs_section,
    .requirements_section {
        padding: 60px 0;
    }

    /* Upload Box */
    .upload-art-section .upload-box {
        border: 1.56px dashed #454545;
        border-radius: 16px;
        padding: 70px 30px;
        cursor: pointer;
    }

    .upload-art-section .upload-box h4 {
        font-weight: 500;
        font-size: 62.26px;
        line-height: 100%;
        letter-spacing: -1%;
        text-align: center;
        color: #828282;
        margin-bottom: 20px;
    }

    .upload-art-section .upload-box p {
        font-weight: 500;
        font-size: 31.13px;
        line-height: 100%;
        letter-spacing: -1%;
        text-align: center;
        color: #828282;
    }

    .upload-art-section .upload-box .browse-link {
        color: #2EB2FA;
        font-weight: 500;
        text-decoration: none;
    }

    .upload-art-section .upload-box p.upload-info {
        font-weight: 500;
        font-size: 24.21px;
        line-height: 1.1;
        letter-spacing: -1%;
        text-align: center;
        color: #82828280;
    }

    /* Product Info */
    .product-info .category {
        font-weight: 400;
        font-size: 15px;
        line-height: 25.35px;
        letter-spacing: 3%;
        color: #808080;
    }

    .product-size {
        font-weight: 500;
        font-size: 70px;
        line-height: 100%;
        letter-spacing: 0%;
        color: #3DAFED;
    }

    .rating {
        font-size: 16px;
        color: #f59e0b;
    }

    .rating span {
        font-weight: 400;
        font-size: 15px;
        line-height: 22.18px;
        letter-spacing: 0%;
        color: #8078D1;
    }

    .stock {
        color: #22c55e;
        font-weight: 500;
    }

    .product-info .description {
        font-weight: 400;
        font-size: 15px;
        line-height: 22.18px;
        letter-spacing: 0%;
        color: #000000;
    }

    /* Price */
    .product-info .price {
        padding-bottom: 15px;
        border-bottom: 1px solid #80808026;
    }

    .product-info .price strong {
        font-weight: 600;
        font-size: 30px;
        line-height: 18.11px;
        letter-spacing: 3%;
        color: #000000;
    }

    .product-info .price span {
        font-weight: 400;
        font-size: 15px;
        line-height: 18.11px;
        letter-spacing: 3%;
        color: #000000;
    }

    .product-info .price .seen {
        font-weight: 400;
        font-size: 15px;
        line-height: 22.18px;
        letter-spacing: 0%;
        text-decoration: underline;
        text-decoration-style: solid;
        color: #2EB2FA;
    }

    .product-info .price .seen:hover {
        color: #8078D1;
    }

    /* Features */
    .product-info .features {
        padding-bottom: 15px;
        border-bottom: 1px solid #80808026;
    }

    .product-info .features strong {
        font-weight: 600;
        font-size: 15px;
        line-height: 22.18px;
        letter-spacing: 0%;
        color: #000000;
    }

    .product-info .features ul {
        list-style: disc;
        list-style: inside;
        padding-left: 18px;
        margin-top: 10px;
    }

    .product-info .features li {
        font-weight: 400;
        font-size: 15px;
        line-height: 22.18px;
        letter-spacing: 0%;
        color: #000000;
    }

    /* Buttons */
    .action-buttons .btn-primary {
        font-family: 'MarbleRegular', sans-serif;
        background: linear-gradient(90deg, #2EB2FA, #8078D1, #3DAFED);
        padding: 10px 10px;
        width: 80%;
        border-radius: 11px;
        font-size: 20px;
        text-decoration: none;
        font-weight: 400;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        z-index: 2;
        border: none;
        transform: translatey(0);
        transition: all 0.3s ease-in-out;
    }

    .action-buttons .btn-primary:hover {
        transform: translatey(-10px);
    }

    .action-buttons .btn-secondary {
        font-family: 'MarbleRegular', sans-serif;
        background: #8078D1;
        padding: 10px 10px;
        width: 80%;
        border-radius: 11px;
        font-size: 20px;
        text-decoration: none;
        font-weight: 400;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        z-index: 2;
        border: none;
        transform: translatey(0);
        transition: all 0.3s ease-in-out;
    }

    .action-buttons .btn-secondary:hover {
        transform: translatey(-10px);
    }

    .action-buttons .notify {
        border: none;
        background: none;
        width: 10%;
    }

    /* Info Boxes */
    .info-box {
        border: 1px solid #00000080;
        border-radius: 4.22px;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 15px;
        padding: 20px;
    }

    .info-item:first-child {
        border-bottom: 1px solid #00000080;
    }

    .info-item strong {
        display: block;
        font-weight: 700;
        font-size: 15px;
        line-height: 25.35px;
        letter-spacing: 0%;
        color: #000000;
    }

    .info-item p {
        font-weight: 500;
        font-size: 10px;
        line-height: 19.01px;
        letter-spacing: 0%;
        color: #000000;
    }

    .specs_title {
        padding-bottom: 10px;
        border-bottom: 1px solid #00000080;
    }

    .specs {
        list-style: inside;
        list-style-type: disc;
        padding-left: 10px;
    }

    .specs li strong {
        font-weight: 600;
        font-size: 20px;
        line-height: 41px;
        letter-spacing: 0%;
        color: #000000;
    }

    .specs li {
        font-weight: 400;
        font-size: 20px;
        line-height: 41px;
        letter-spacing: 0%;
        color: #000000;
    }

    .steps-section {
        background: #f6fbfe;
        font-family: 'Inter', sans-serif;
    }

    /* Heading */
    .steps-title,
    .related-pro-title {
        font-weight: 800;
        font-size: 70px;
        line-height: 1.2;
        letter-spacing: 0px;
        color: #303133;
    }

    .steps-subtitle,
    .require-subtitle {
        font-size: 20px;
        color: #475569;
        margin-top: 10px;
    }

    /* Cards */
    .step-card {
        background: #ffffff;
        border-radius: 20.4px;
        padding: 30px 25px;
        height: 100%;
        border: 2px solid #E2E8F0;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        position: relative;
        transition: all 0.3s ease;
    }

    .step-card:hover {
        transform: translateY(-6px);
        border: 2px solid #2EB2FA;
    }

    /* Active Step */
    .step-card.active,
    {
    border: 2px solid #2EB2FA;
    }

    /* Step Number */
    .step-number {
        position: absolute;
        top: 18px;
        right: 18px;
        background: #409EFF;
        color: #fff;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 22.44px;
        line-height: 35.9px;
        letter-spacing: 0px;
        opacity: 1;
        border: 3px solid #E2E8F0
    }

    .step-card.active .step-number,
    .step-card:hover .step-number {
        width: 53px;
        height: 53px;
        background: #3b82f6;
        color: #fff;
        border: none;
        box-shadow: 0px 4.49px 22.44px 0px #667EEA66;

    }

    .step-card.active .step-icon,
    .step-card:hover .step-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: linear-gradient(124.4deg, #2EB2FA -3.67%, #8078D1 64.77%, #3DAFED 130.93%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* Icon */
    .step-icon {
        width: 56px;
        height: 56px;
        margin: auto;
        margin-top: 80px;
        border-radius: 14px;
        background: #3DAFED33;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .step-card:hover .step-icon img {
        filter: invert(1);
    }

    /* Text */
    .step-card h5 {
        font-weight: 600;
        font-size: 20px;
        line-height: 27.5px;
        letter-spacing: 0px;
        vertical-align: middle;
        color: #0F172A;
    }

    .step-card.active h5,
    .step-card:hover h5 {
        color: #8078D1;
    }

    .step-card p {
        font-weight: 400;
        font-size: 15px;
        line-height: 22.85px;
        letter-spacing: 0px;
        text-align: center;
        vertical-align: middle;
        color: #000;
    }

    /* List */
    .step-card ul {
        padding-left: 0;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .step-card ul li {
        font-weight: 400;
        font-size: 15px;
        line-height: 20px;
        letter-spacing: 0px;
        text-align: center;
        vertical-align: middle;
        color: #000;
    }

    .require-wrapper {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .require-item {
        border: 0.93px solid #CFCFCF;
        padding: 18px 21px;
        border-radius: 9.28px;
    }

    .require-title {
        width: 100%;
        background: none;
        border: none;
        font-size: 20px;
        font-weight: 600;
        text-align: left;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        color: #000000;
    }

    .require-icon i {
        transition: transform 0.3s ease;
    }

    .require-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.35s ease;
    }

    .require-content p {
        margin-top: 15px;
        font-weight: 500;
        font-size: 15px;
        line-height: 20px;
        letter-spacing: -2%;
        color: #000000;
    }

    /* Active state */
    .require-item.active .require-content {
        max-height: 200px;
    }

    .require-item.active .require-icon i {
        transform: rotate(180deg);
    }

    /* Card Wrapper */
    .product_card2 {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .product_card2:hover {
        transform: translateY(-6px);
    }

    /* Image */
    .product-image {
        position: relative;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 20px;
    }

    /* Discount Badge */
    .badge-discount {
        position: absolute;
        top: 12px;
        left: 12px;
        background: #8078D1;
        color: #FAFAFA;
        font-weight: 400;
        font-size: 12.44px;
        line-height: 18.66px;
        letter-spacing: 0%;
        padding: 4px 12px;
        border-radius: 4.15px;
    }

    /* Action Buttons */
    .product-actions {
        position: absolute;
        top: 12px;
        right: 12px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .action-btn {
        width: 35px;
        height: 35px;
        opacity: 1;
        border-radius: 50%;
        border: none;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .action-btn i {
        font-size: 20px;
    }

    /* Content */
    .product-content {
        padding: 15px;
    }

    .product-title {
        font-weight: 500;
        font-size: 20px;
        line-height: 100%;
        letter-spacing: 0%;
        color: #000;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 14px;
        margin-bottom: 6px;
    }

    .product-price span {
        color: #6b7280;
        font-size: 13px;
    }

    .product-reviews {
        font-size: 13px;
        color: #f59e0b;
    }

    .product-reviews span {
        color: #6b7280;
    }
</style>
<!-- Breadcrumb -->
<?php get_template_part('template-parts/breadcrumb'); ?>

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
            </div>

            <!-- Product Details -->
            <div class="col-lg-5">
                <div class="product-info">

                    <span class="category">Wall Art</span>

                    <h2 class="product-size">30” × 60”</h2>

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
                            <button class="btn btn-primary">
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
        <div class="text-center mb-5">
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
        <div class="text-center mb-5">
            <h2 class="related-pro-title mb-5">
                Explore Our <br>
                <span class="gradient-title">Wall Art Range</span>
            </h2>
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
                            <h5 class="product-title">Wall Art - 36” × 96”</h5>
                            <p class="product-price">
                                <strong>$150.00</strong>
                                <span>/ Starting From*</span>
                            </p>
                            <p class="product-reviews">
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
                            <h5 class="product-title">Wall Art - 36” × 96”</h5>
                            <p class="product-price">
                                <strong>$150.00</strong>
                                <span>/ Starting From*</span>
                            </p>
                            <p class="product-reviews">
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
                            <h5 class="product-title">Wall Art - 36” × 96”</h5>
                            <p class="product-price">
                                <strong>$150.00</strong>
                                <span>/ Starting From*</span>
                            </p>
                            <p class="product-reviews">
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
                            <h5 class="product-title">Wall Art - 36” × 96”</h5>
                            <p class="product-price">
                                <strong>$150.00</strong>
                                <span>/ Starting From*</span>
                            </p>
                            <p class="product-reviews">
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
                            <h5 class="product-title">Wall Art - 36” × 96”</h5>
                            <p class="product-price">
                                <strong>$150.00</strong>
                                <span>/ Starting From*</span>
                            </p>
                            <p class="product-reviews">
                                ⭐⭐⭐⭐⭐ <span>(99)</span>
                            </p>
                        </div>
                    </div>
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
    document.querySelector('.upload-box').addEventListener('click', function () {
        document.getElementById('fileUpload').click();
    });
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