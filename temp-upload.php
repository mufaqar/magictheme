<?php /*Template Name: Customize Upload */ get_header(); ?>
<style>
    .uploading_bars {
        max-width: 558px;
        margin: auto;
        padding-top: 80px;
    }

    .uploading_bars h6 {
        font-weight: 700;
        font-size: 42px;
        line-height: 1;
        color: #000000;
        text-align: center;
        margin-bottom: 60px;
    }

    .uploading_bars p {
        font-weight: 400;
        font-size: 24px;
        line-height: 1;

    }

    .uploading_bars ul {
        margin-top: 50px;
        padding-left: 0;
        font-weight: 500;
        font-size: 16px;
        line-height: 1;
        text-align: center;
        color: #808080;
    }

    .step-wrapper {
        width: 100%;
        background-color: #fff;
        margin-bottom: 20px;
        margin-top: 20px;
        box-shadow: 0px 1px 4px 0px #0000001A;
    }

    .step-indicator {
        width: fit-content;
        margin: auto;
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .step-indicator .step {
        cursor: pointer;
        padding: 24px;
        text-align: center;
        position: relative;
        font-weight: 700;
        font-size: 10px;
        line-height: 1;

    }

    .step-indicator .step::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background-image: linear-gradient(90deg, #2EB2FA 0%, #8078D1 57.55%, #3DAFED 113.18%);
        z-index: -1;
    }

    .step-indicator .step.active::after {
        z-index: 2;
    }

    .image-preview .preview_inner {
        padding: 0 30px;
        width: fit-content;
        margin: auto;
        height: 100%;
        padding: 0 0 0 30px;
    }

    .image-preview .preview_inner .image_resolution {
        font-weight: 400;
        font-size: 10px;
        text-align: center;
        line-height: 1;
        color: #000000;
        margin-top: 7px;
    }

    /* Vertical left line */
    .border-left-label {
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        height: 95%;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
    }

    .border-left-label span {
        position: absolute;
        background-color: #F2F2F2;
        width: 33px;
        height: 71px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .border-left {
        width: 1px;
        background: #000000;
        flex-grow: 1;
    }

    /* Horizontal bottom line */
    .border-bottom-label {
        position: absolute;
        bottom: -30px;
        left: 0;
        right: 0;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width: 100%;
    }

    .border-bottom-label span {
        position: absolute;
        background-color: #F2F2F2;
        width: 71px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .border-bottom {
        height: 1px;
        width: 95%;
        margin: auto;
        background: #000000 !important;
        flex-grow: 1;
        border-bottom: 0 !important;
        padding-left: 30px;
    }

    .image-preview .note {
        padding-top: 40px;
        padding-left: 0;
        font-weight: 500;
        font-size: 16px;
        line-height: 1;
        text-align: center;
        color: #808080;
        max-width: 508px;
        margin: auto;
    }

    .control-panel {
        background: #fff;
        border-radius: 15px;
        box-shadow: -2px 0px 4px 0px #0000000D;
        padding: 20px;
        border: 1px solid #ddd;
    }

    .control-panel .title {
        font-weight: 700;
        font-size: 24px;
        line-height: 1;
        color: #000;
    }

    .control-panel .subtitle {
        font-weight: 300;
        font-size: 12px;
        line-height: 12px;
        color: #000;
    }

    .pro_options {
        margin-bottom: 40px;
    }

    .pro_options label {
        font-size: 24px;
        background: linear-gradient(90deg, #2eb2fa, #8078d1, #3dafed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 700;
        border-bottom: 1px solid #000;
        padding-bottom: 3x;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .pro_options label span {
        font-weight: 400;
        font-size: 10px;
        line-height: 1;
        color: #808080 !important;
    }

    .pro_options .opt_list {
        display: flex;
        gap: 12px;
    }

    .opt_list .scale-btn {
        font-weight: 400;
        font-size: 15px;
        background: transparent;
        padding: 5px 27px;
        border-radius: 11px;
        text-decoration: none;
        color: #000;
        z-index: 2;
        border: 1px solid #000000;
        transform: translatey(0);
        transition: all 0.3s ease-in-out;
        width: 100%;
    }

    .opt_list .scale-btn.active {
        background: linear-gradient(90deg, #2eb2fa, #8078d1, #3dafed);
        color: #fff;
        border: 1px solid #2eb2fa;
    }

    .btn.upscale {
        margin: 10px 0;
        font-weight: 400;
        font-size: 16px;
        background: linear-gradient(90deg, #3483AE 0%, #6059A1 100%);
        padding: 5px 27px;
        border-radius: 11px;
        text-decoration: none;
        color: #fff;
        z-index: 2;
        border: 1px solid #3483AE;
        transform: translatey(0);
        transition: all 0.3s ease-in-out;
        width: 100%;
    }

    .scale_tip {
        background-color: #D9D9D94D;
        font-weight: 400;
        font-size: 12px;
        padding: 5px 20px;
        line-height: 1;
        border-radius: 7px;
        text-align: center;
        color: #808080;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .opt_list .img-btn {
        background-color: transparent;
        border-radius: 3.77px;
        padding: 4px;
        border: none;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
        width: 100%;
    }

    .opt_list .img-btn.active {
        background-color: #D9D9D947;
    }

    .opt_list .img-btn span {
        font-weight: 500;
        font-size: 10px;
        line-height: 1.1;
        text-align: center;
        color: #000000;
    }

    .opt_list .img-btn img {
        max-height: 31px;
        height: 100%;
    }
</style>
<section class="upload-art-section"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/uplaod-bg.png');">
    <div class="container">
        <div class="row align-items-start g-4">
            <div id="screen-upload">
                <div class="col-lg-12">
                    <label class="upload-box text-center w-full  mt-5" id="browseBtn">
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
                </div>
            </div>

            <div id="screen-uploading" style="display:none;">
                <div class="uploading_bars">
                    <h6>Uploading image</h6>

                    <p class="d-flex justify-content-between">
                        Uploading Your Artwork <small id="uploadPercent">0%</small>
                    </p>

                    <div class="progress mb-2">
                        <div class="progress-bar upload-bar" id="uploadBar" style="width:0%"></div>
                    </div>

                    <hr />

                    <p class="mt-4 d-flex justify-content-between">
                        Scaling Your Artwork <small id="scalePercent">0%</small>
                    </p>

                    <div class="progress mb-2">
                        <div class="progress-bar scale-bar" id="scaleBar" style="width:0%"></div>
                    </div>

                    <ul class="note">
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/exclam.png"
                                alt="icon" />
                            Original resolution: 1500 × 1000px,</li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/exclam.png"
                                alt="icon" /> Visual
                            Magic recommendation: Upscale image to 3000 × 2000px</li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
    <div id="screen-customize" style="display:none;">
        <div class="tabs_wrapper">
            <!-- Step Indicators -->
            <div class="step-wrapper">
                <div class="step-indicator mb-4">
                    <div class="step active">1. Upscale</div>
                    <div class="step">2. Enhance</div>
                    <div class="step">3. Configure</div>
                    <div class="step">4. Review</div>
                </div>
            </div>

            <div class="container py-5">
                <!-- Main Layout -->
                <div class="row justify-content-between">
                    <!-- Left: Image Preview -->
                    <div class="col-md-5">
                        <div class="image-preview">
                            <div class="preview_inner position-relative">
                                <!-- Vertical left line -->
                                <div class="border-left-label">
                                    <span>7'</span>
                                    <div class="border-left"></div>
                                </div>
                                <!-- The actual image -->
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/paint.png"
                                    class="img-fluid">
                                <p class="image_resolution">
                                    Image Resolution: 3000 x 2000 px
                                </p>
                                <!-- Horizontal bottom line -->
                                <div class="border-bottom-label">
                                    <span>5'</span>
                                    <div class="border-bottom"></div>
                                </div>
                            </div>

                            <ul class="note">
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/exclam.png"
                                        alt="icon" />
                                    Original resolution: 1500 × 1000px,</li>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/exclam.png"
                                        alt="icon" />
                                    New Resolution: 3000 × 2000px for perfect print quality.</li>
                            </ul>
                        </div>

                    </div>

                    <!-- Right: Control Panel -->
                    <div class="col-md-4">
                        <div class="step1 control-panel">
                            <h5 class="title">Resolution & Size</h5>
                            <p class="subtitle">Upscale your image and choose the right size to unlock more options.</p>
                            <hr />
                            <!-- <div class="pro_options upscale_options">
                                <label class="form-label">Upscale:
                                    <span>2x<i class="fas fa-chevron-up"></i></span></label>
                                <div class="opt_list">
                                    <button type="button" class="btn scale-btn active"
                                        onclick="setUpscale(2)">2x</button>
                                    <button type="button" class="btn scale-btn" onclick="setUpscale(4)">4x</button>
                                    <button type="button" class="btn scale-btn" onclick="setUpscale(6)">6x</button>
                                    <button type="button" class="btn scale-btn" onclick="setUpscale(8)">8x</button>
                                </div>
                                <button type="button" class="btn upscale">Upscale</button>
                                <p class="scale_tip">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/exclam.png"
                                        alt="icon" /> <span>Upscale your image for higher resolution. This will unlock
                                        more
                                        sizes and print categories that aren’t available right now.</span>
                                </p>
                            </div> -->

                            <div class="pro_options cat_options">
                                <label class="form-label">Categories:
                                    <span>Photographic Prints<i class="fas fa-chevron-up"></i></span></label>
                                <div class="opt_list">
                                    <button class="btn img-btn active">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/co1.png"
                                            alt="Photographic">
                                        <span>Photographic Prints</span>
                                    </button>
                                    <button type="button" class="btn img-btn"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/co2.png"
                                            alt="Posters"><span>Posters</span></button>
                                    <button type="button" class="btn img-btn"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/co3.png"
                                            alt="Wall Tiles"><span>Wall Tiles</span></button>
                                    <button type="button" class="btn img-btn"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/co4.png"
                                            alt="Wall Art"><span>Wall Art</span></button>
                                    <button type="button" class="btn img-btn"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/co5.png"
                                            alt="Exterior"><span>Exterior</span></button>
                                </div>
                            </div>

                            <div class="pro_options size_options">
                                <label class="form-label">Size:
                                    <span>5” x 7”<i class="fas fa-chevron-up"></i></span></label>
                                <div class="opt_list">
                                    <button class="btn img-btn active">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/si1.png"
                                            alt='5.25” × 5.25”'>
                                        <span>5.25” × 5.25”</span>
                                    </button>
                                    <button class="btn img-btn">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/si2.png"
                                            alt='5" x 7"'>
                                        <span>5" x 7"</span>
                                    </button>
                                    <button class="btn img-btn">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/si3.png"
                                            alt='8" x 10"'>
                                        <span>8" x 10"</span>
                                    </button>
                                    <button class="btn img-btn">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/si4.png"
                                            alt='12" x 16"'>
                                        <span>12" x 16"</span>
                                    </button>

                                    <button class="btn img-btn">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/si5.png"
                                            alt='5" x 7"'>
                                        <span>5" x 7"</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="action-buttons mt-5">
                                <button class="btn btn-secondary w-100 mb-3"
                                    onclick="prevStep()"><span>Back</span></button>
                                <button class="btn btn-primary w-100" onclick="nextStep()"><span>Next</span></button>
                            </div>
                        </div>
                        <div class="step2 control-panel" style="display: none;">
                            <h5 class="title">Enhance & Adjust</h5>
                            <!-- Buttons -->
                            <div class="action-buttons mt-5">
                                <button class="btn btn-secondary w-100 mb-3"
                                    onclick="prevStep()"><span>Back</span></button>
                                <button class="btn btn-primary w-100" onclick="nextStep()"><span>Next</span></button>
                            </div>
                        </div>
                        <div class="step3 control-panel" style="display: none;">
                            <h5 class="title">Configure</h5>
                            <!-- Buttons -->
                            <div class="action-buttons mt-5">
                                <button class="btn btn-secondary w-100 mb-3"
                                    onclick="prevStep()"><span>Back</span></button>
                                <button class="btn btn-primary w-100" onclick="nextStep()"><span>Review</span></button>
                            </div>
                        </div>
                        <div class="step4 control-panel" style="display: none;">
                            <h5 class="title">Review & Approval</h5>
                            <!-- Buttons -->
                            <div class="action-buttons mt-5">
                                <button class="btn btn-secondary w-100 mb-3"><span>Add to Cart</span></button>
                                <button class="btn btn-primary w-100"><span>Payment Process</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const fileInput = document.getElementById('fileUpload');
    const previewImg = document.querySelector('.image-preview img');
    const resolutionText = document.querySelector('.image_resolution');
    const noteList = document.querySelector('.note');
    fileInput.addEventListener('change', function () {
        if (!this.files || !this.files[0]) return;

        const file = this.files[0];

        // Only allow images
        if (!file.type.startsWith('image/')) {
            alert('Please upload an image file');
            return;
        }

        // Preview image
        const reader = new FileReader();
        reader.onload = function (e) {
            previewImg.src = e.target.result;

            // Get image dimensions
            const img = new Image();
            img.onload = function () {
                const originalWidth = img.naturalWidth;
                const originalHeight = img.naturalHeight;

                // Example upscale (2x)
                const upscaleFactor = 2;
                const newWidth = originalWidth * upscaleFactor;
                const newHeight = originalHeight * upscaleFactor;

                // Update resolution text
                resolutionText.innerText =
                    `Image Resolution: ${newWidth} x ${newHeight} px`;

                // Update notes
                noteList.innerHTML = `
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/exclam.png" />
                    Original resolution: ${originalWidth} × ${originalHeight}px
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/exclam.png" />
                    New Resolution: ${newWidth} × ${newHeight}px for perfect print quality.
                </li>
            `;
            };
            img.src = e.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>

<script>
    const uploadScreen = document.getElementById('screen-upload');
    const uploadingScreen = document.getElementById('screen-uploading');
    const customizeScreen = document.getElementById('screen-customize');

    let scale = 0; // ✅ shared scope

    document.getElementById('fileUpload').addEventListener('change', function () {
        if (!this.files.length) return;

        uploadingScreen.style.display = 'block';
        customizeScreen.style.display = 'none';

        startUpload();
    });

    function startUpload() {
        let upload = 0;

        const uploadTimer = setInterval(() => {
            upload += 5;
            document.getElementById('uploadBar').style.width = upload + '%';
            document.getElementById('uploadBar').className = 'progress-bar upload-bar theme-primary';
            document.getElementById('uploadPercent').innerText = upload + '%';

            if (upload >= 100) {
                clearInterval(uploadTimer);
                startScaling();
            }
        }, 100);
    }

    function startScaling() {
        scale = 0; // reset before starting

        const scaleTimer = setInterval(() => {
            scale += 5;
            document.getElementById('scaleBar').style.width = scale + '%';
            document.getElementById('scalePercent').innerText = scale + '%';
            document.getElementById('scaleBar').className = 'progress-bar upload-bar theme-secondary';

            if (scale >= 100) {
                clearInterval(scaleTimer);

                setTimeout(() => {
                    uploadScreen.style.display = 'none';
                    uploadingScreen.style.display = 'none';
                    customizeScreen.style.display = 'block';
                }, 300);
            }
        }, 120);
    }
</script>
<script>
    let currentStep = 1;
    const totalSteps = 4;

    const stepIndicators = document.querySelectorAll('.step-indicator .step');
    const stepPanels = {
        1: document.querySelector('.step1'),
        2: document.querySelector('.step2'),
        3: document.querySelector('.step3'),
        4: document.querySelector('.step4'),
    };

    function showStep(step) {
        // Hide all panels
        Object.values(stepPanels).forEach(panel => {
            panel.style.display = 'none';
        });

        // Remove active from all indicators
        stepIndicators.forEach(indicator => {
            indicator.classList.remove('active');
        });

        // Show current panel
        stepPanels[step].style.display = 'block';

        // Activate indicator
        stepIndicators[step - 1].classList.add('active');

        currentStep = step;
    }

    function nextStep() {
        if (currentStep < totalSteps) {
            showStep(currentStep + 1);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            showStep(currentStep - 1);
        }
    }

    // Optional: click on step indicator
    stepIndicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showStep(index + 1);
        });
    });

    // Initialize
    showStep(1);
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        /* =========================
           SCALE (2x, 4x, 6x, 8x)
        ========================== */
        document.querySelectorAll('.upscale_options .scale-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const wrapper = this.closest('.upscale_options');
                wrapper.querySelectorAll('.scale-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Update label value
                wrapper.querySelector('label span').innerHTML =
                    this.innerText + '<i class="fas fa-chevron-up"></i>';
            });
        });
        /* =========================
          CATEGORY + SIZE OPTIONS
        ========================== */
        document.querySelectorAll('.cat_options .img-btn, .size_options .img-btn')
            .forEach(btn => {
                btn.addEventListener('click', function () {
                    const wrapper = this.closest('.cat_options, .size_options');

                    wrapper.querySelectorAll('.img-btn')
                        .forEach(b => b.classList.remove('active'));

                    this.classList.add('active');

                    const text = this.querySelector('span')?.innerText || '';
                    const labelSpan = wrapper.querySelector('label span');

                    if (labelSpan) {
                        labelSpan.innerHTML =
                            text + '<i class="fas fa-chevron-up"></i>';
                    }
                });
            });
    })
</script>