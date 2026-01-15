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

    .pro_options label {
        font-size: 24px;
        background: linear-gradient(90deg, #2eb2fa, #8078d1, #3dafed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 700;

    }

    .pro_options .opt_list {
        display: flex;
        gap: 12px;
    }

    .size-btn,
    .category-btn {
        font-weight: 400;
        font-size: 15px;
        background: linear-gradient(90deg, #2eb2fa, #8078d1, #3dafed);
        padding: 5px 27px;
        border-radius: 11px;
        text-decoration: none;
        color: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        z-index: 2;
        border: none;
        transform: translatey(0);
        transition: all 0.3s ease-in-out;
    }
</style>
<section class="upload-art-section"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/uplaod-bg.png');">
    <div class="container">
        <div class="row align-items-start g-4">
            <div id="screen-upload">
                <div class="col-lg-12">
                    <div class="upload-box text-center">
                        <div class="upload-icon mb-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/upload.png" />
                        </div>
                        <h4>Drag & Upload</h4>
                        <p>
                            or <a href="#" id="browseBtn">browse files</a>
                        </p>
                        <p class="upload-info">
                            Maximum file size limit: 25MB <br>
                            Supported Files: JPG, PNG, PDF
                        </p>
                        <input type="file" class="d-none" id="fileUpload">
                    </div>
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

            <div class="container">
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
                    <div class="col-md-5">
                        <div class="control-panel">
                            <h5 class="title">Resolution & Size</h5>
                            <p class="subtitle">Upscale your image and choose the right size:</p>
                            <hr />
                            <div class="mb-3 pro_options upscale">
                                <label class="form-label">Upscale:</label>
                                <div class="opt_list">
                                    <button type="button" class="size-btn" onclick="setUpscale(2)">2x</button>
                                    <button type="button" class="size-btn" onclick="setUpscale(4)">4x</button>
                                    <button type="button" class="size-btn" onclick="setUpscale(6)">6x</button>
                                    <button type="button" class="size-btn" onclick="setUpscale(8)">8x</button>
                                </div>
                            </div>

                            <div class="mb-3 pro_options">
                                <label class="form-label">Categories:</label>
                                <div class="opt_list">
                                    <button type="button" class="category-btn">Photographic
                                        Prints</button>
                                    <button type="button" class="category-btn">Posters</button>
                                    <button type="button" class="category-btn">Wall Tiles</button>
                                    <button type="button" class="category-btn">Wall Art</button>
                                </div>
                            </div>

                            <div class="mb-3 pro_options">
                                <label class="form-label">Size:</label>
                                <div class="opt_list">
                                    <button type="button" class="size-btn">5" x 7"</button>
                                    <button type="button" class="size-btn">8" x 10"</button>
                                    <button type="button" class="size-btn">12" x 16"</button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="prevStep()">Back</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    const uploadScreen = document.getElementById('screen-upload');
    const uploadingScreen = document.getElementById('screen-uploading');
    const customizeScreen = document.getElementById('screen-customize');

    document.getElementById('browseBtn').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('fileUpload').click();
    });

    document.getElementById('fileUpload').addEventListener('change', function () {
        if (!this.files.length) return;

        // Show uploading screen
        uploadScreen.style.display = 'none';
        uploadingScreen.style.display = 'block';
        customizeScreen.style.display = 'none';

        startUpload();
    });

    function startUpload() {
        let upload = 0;
        let scale = 0;

        const uploadTimer = setInterval(() => {
            upload += 5;
            document.getElementById('uploadBar').style.width = upload + '%';
            document.getElementById('uploadPercent').innerText = upload + '%';

            if (upload >= 100) {
                clearInterval(uploadTimer);
                startScaling();
            }
        }, 100);
    }

    function startScaling() {
        const scaleTimer = setInterval(() => {
            scale += 5;
            document.getElementById('scaleBar').style.width = scale + '%';
            document.getElementById('scalePercent').innerText = scale + '%';

            if (scale >= 100) {
                clearInterval(scaleTimer);

                // AUTO SHOW CUSTOMIZE SCREEN
                setTimeout(() => {
                    uploadingScreen.style.display = 'none';
                    customizeScreen.style.display = 'block';
                }, 300);
            }
        }, 120);
    }
</script>