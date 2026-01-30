<?php


add_action('woocommerce_before_add_to_cart_button', 'ns_show_cpq_on_product_page', 20);

add_action('woocommerce_before_add_to_cart_button', function () {
    $res = get_query_var('ns_cpq_res');
    global $product;

    if (empty($res['items']))
        return;
    ?>

    <div class="custom-product-options ns-cpq-direct-container"
        style="margin-bottom:20px; border-top:1px solid #eee; padding-top:1rem;">

        <div id="ns-cpq-questions-wrapper">
            <?php foreach ($res['items'] as $q):
                $question_label = esc_html($q['values']['name'] ?? '');
                $is_aspect_ratio = stripos($question_label, 'Aspect Ratio') !== false;
                ?>

                <div class="ns-cpq-question-group" data-question-code="<?php echo esc_attr($q['question_code']); ?>"
                    data-hide-rule="<?php echo esc_attr($q['hide_rule']); ?>"
                    data-sequence="<?php echo esc_attr($q['sequence']); ?>" style="margin-bottom:1rem;">

                    <?php if ($is_aspect_ratio): ?>
                        <h4 style="margin-bottom:0.5rem; font-size:1.1rem;"><?php echo $question_label; ?></h4>
                        <div class="aspect-buttons d-flex flex-wrap gap-2 mb-2">
                            <?php foreach ($q['answers'] as $a): ?>
                                <button type="button" class="btn btn-outline-primary ns-cpq-button-option"
                                    data-value="<?php echo esc_attr($a['answer_code']); ?>"
                                    data-hide-rule="<?php echo esc_attr($a['hide_rule']); ?>"
                                    data-ns-item-id="<?php echo esc_attr($a['ns_item_id'] ?? ''); ?>">
                                    <?php echo esc_html(wp_strip_all_tags($a['label'])); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" name="cpq_question_<?php echo $q['id']; ?>" class="ns-cpq-hidden-input">

                    <?php else: ?>
                        <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">
                            <?php echo $question_label; ?>:
                        </label>
                        <select name="cpq_question_<?php echo $q['id']; ?>" class="form-control ns-cpq-input-field"
                            data-question-code="<?php echo esc_attr($q['question_code']); ?>">
                            <option value=""><?php echo esc_html__('Select ', 'woocommerce') . $question_label; ?></option>
                            <?php foreach ($q['answers'] as $a): ?>
                                <option value="<?php echo esc_attr($a['answer_code']); ?>"
                                    data-hide-rule="<?php echo esc_attr($a['hide_rule']); ?>"
                                    data-ns-item-id="<?php echo esc_attr($a['ns_item_id']); ?>">
                                    <?php echo esc_html(wp_strip_all_tags($a['label'])); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        </div>

        <div id="ns-cpq-live-summary"
            style="background:#f8f9fa; padding:1rem; border-radius:4px; margin-top:1.25rem; border:1px solid #e9ecef;">
            <div
                style="font-size: 0.95rem; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
                <strong style="color: #333;"><?php echo esc_html($product->get_name()); ?></strong>
                <span style="color: #666;">
                    <?php echo get_woocommerce_currency_symbol(); ?><span
                        id="ns-base-price"><?php echo $product->get_price(); ?></span>
                </span>
            </div>

            <div id="ns-selected-options" style="font-size:0.85rem; color:#6c757d; margin-bottom: 10px;">
            </div>

            <div
                style="font-size: 1.2rem; font-weight: bold; color: #28a745; border-top: 2px solid #eee; padding-top: 10px; display: flex; justify-content: space-between; align-items: center;">
                <span>Total:</span>
                <span>
                    <?php echo get_woocommerce_currency_symbol(); ?><span id="ns-total-price">0.00</span>
                </span>
            </div>
        </div>
    </div>

    <input type="hidden" name="aspect_ratio" id="aspect_ratio">
    <input type="hidden" name="crop_data" id="crop_data">

    </div>

    <script>
        jQuery(document).ready(function ($) {
            // Sort questions by sequence
            const container = $('#ns-cpq-questions-wrapper');
            container.children('.ns-cpq-question-group').sort((a, b) => {
                return $(a).data('sequence') - $(b).data('sequence');
            }).appendTo(container);

            // Aspect ratio button selection
            $('.ns-cpq-button-option').on('click', function () {
                const parent = $(this).closest('.ns-cpq-question-group');
                parent.find('.ns-cpq-button-option').removeClass('active btn-primary').addClass('btn-outline-primary');
                $(this).addClass('active btn-primary').removeClass('btn-outline-primary');

                parent.find('.ns-cpq-hidden-input').val($(this).data('value')).trigger('change');
                $('#aspect_ratio').val($(this).text().trim());
            });
        });
    </script>

    <style>
        .ns-cpq-button-option.active {
            background-color: #007bff !important;
            color: white !important;
            border-color: #007bff !important;
        }

        .ns-cpq-question-group[style*="display: none"] {
            visibility: hidden;
            height: 0;
            margin: 0;
            overflow: hidden;
        }
    </style>

    <?php
}, 25);

// Legacy custom options handling (if still needed – consider migrating fully to CPQ)
add_filter('woocommerce_add_cart_item_data', 'save_custom_product_options', 10, 2);
function save_custom_product_options($cart_item_data, $product_id)
{
    $fields = ['paper_type', 'image_size', 'frame_type', 'aspect_ratio', 'crop_data'];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $cart_item_data[$field] = sanitize_text_field($_POST[$field]);
        }
    }
    return $cart_item_data;
}

add_filter('woocommerce_get_item_data', 'display_custom_product_options_cart', 10, 2);
function display_custom_product_options_cart($item_data, $cart_item)
{
    $fields = [
        'paper_type' => 'Paper Type',
        'image_size' => 'Image Size',
        'frame_type' => 'Frame Type',
        'aspect_ratio' => 'Aspect Ratio',
        'crop_data' => 'Crop Data'
    ];

    foreach ($fields as $key => $label) {
        if (!empty($cart_item[$key])) {
            $item_data[] = ['key' => $label, 'value' => $cart_item[$key]];
        }
    }
    return $item_data;
}

add_action('woocommerce_add_order_item_meta', 'add_custom_options_order', 10, 2);
function add_custom_options_order($item_id, $values)
{
    $fields = ['paper_type', 'image_size', 'frame_type', 'aspect_ratio', 'crop_data'];
    foreach ($fields as $field) {
        if (!empty($values[$field])) {
            wc_add_order_item_meta($item_id, ucwords(str_replace('_', ' ', $field)), $values[$field]);
        }
    }
}

// Cropper.js integration (only on product pages)
add_action('wp_footer', function () {
    if (!is_product())
        return;
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />

    <script>
        jQuery(function ($) {
            const image = document.querySelector('.woocommerce-product-gallery img.wp-post-image');
            if (!image) return;

            const cropper = new Cropper(image, {
                viewMode: 1,
                autoCropArea: 1,
                responsive: true,
                movable: true,
                zoomable: true,
                background: false
            });

            $('.aspect-buttons button').on('click', function () {
                let ratio = $(this).data('ratio');
                ratio = (ratio === 'NaN') ? NaN : parseFloat(ratio);
                cropper.setAspectRatio(ratio);

                $('#aspect_ratio').val($(this).text().trim());
                $('.aspect-buttons button').removeClass('active');
                $(this).addClass('active');
            });

            $('form.cart').on('submit', function () {
                const cropData = cropper.getData(true);
                $('#crop_data').val(JSON.stringify(cropData));
            });
        });
    </script>

    <style>
        .aspect-buttons button.active {
            background-color: #0d6efd;
            color: white;
        }
    </style>
    <?php
});