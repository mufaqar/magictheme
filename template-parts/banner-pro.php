<div class="vm-hero-product">
    <!-- ADD TO CART -->
    <button id="addToCart" class="border-0 bg-white p-0 cart_icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cart.png" style="object-fit: cover;">
    </button>
    <!-- MAIN IMAGE -->
    <img id="mainImage" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-image.png"
        class="rounded banner_image"  alt="Print Preview">

    <!-- OPTIONS BOX -->
    <div class="vm-option-box">
        <h5 class="fw-bold">8 × 10” Frame</h5>
        <p class="option-tag">Options</p>
        <div class="vm-option-item option-select active" data-option="lamination" data-value="No Lamination">
            Unmounted / Lamination / No <br>
            <span class="bold">Lamination</span>
        </div>
        <div class="vm-option-item option-select active" data-option="mounted" data-value="None">
            Mounted <br>
            <span class="bold">None</span>
        </div>
        <div class="vm-option-item option-select active" data-option="finish" data-value="Premium">
            Glossy <br>
            <span class="bold">Premium</span>
        </div>
        <!-- SIZE -->
        <div class="filter-box mt-3 border-bottom-0 pb-0 mb-0">
            <h5 class="filter-title">Size</h5>

            <div class="size-grid gap-1">

                <?php
                $sizes = [
                    'mini' => 'Mini',
                    'small' => 'Small',
                    'medium' => 'Medium',
                    'large' => 'Large',
                    'oversize' => 'Oversized',
                    'giant' => 'Giant'
                ];

                foreach ($sizes as $key => $label): ?>
                    <button class="filter-item" data-size="<?php echo esc_attr($key); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $key; ?>.png">
                        <span><?php echo esc_html($label); ?></span>
                    </button>
                <?php endforeach; ?>

            </div>
        </div>

        <!-- HIDDEN STATE -->
        <input type="hidden" id="selectedSize">
        <input type="hidden" id="selectedPrice">
        <input type="hidden" id="lamination" value="No Lamination">
        <input type="hidden" id="mounted" value="None">
        <input type="hidden" id="finish" value="Premium">

    </div>
</div>

<!-- THUMBNAILS -->
<div class="vm-thumbs mt-3 d-flex gap-3">
    <?php for ($i = 1; $i <= 4; $i++): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb<?php echo $i; ?>.png" class="vm-thumb"
            style="cursor:pointer">
    <?php endfor; ?>
</div>