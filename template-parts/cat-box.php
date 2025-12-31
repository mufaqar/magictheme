<?php
$categories = [
    [
        'name' => 'Photographic Prints',
        'image' => get_template_directory_uri() . '/assets/images/category2.png',
        'description' => [
            'Timeless prints for everyday memories.',
            'High-quality photo prints designed to bring your favorite moments to life.'
        ],
        'starting_price' => 11.00,
        'link' => home_url('/wall-art'),
        'features' => [
            'Crisp color and fine-detail printing',
            'Multiple sizes for frames or albums',
            'AI-enhanced for clarity and balance'
        ],
        'options' => [
            [
                'icon' => get_template_directory_uri() . '/assets/images/pickup.png',
                'label' => 'Store Pickup'
            ],
            [
                'icon' => get_template_directory_uri() . '/assets/images/delivery.png',
                'label' => 'Delivery'
            ],
            [
                'icon' => get_template_directory_uri() . '/assets/images/shipping.png',
                'label' => 'Shipping'
            ]
        ]
    ],

    // 🔹 You can add more cards like this
    [
        'name' => 'Wall Tiles',
        'image' => get_template_directory_uri() . '/assets/images/category3.png',
        'description' => [
            'Modern layouts with a creative edge.',
            'Museum-quality canvas stretched on solid wood frames.'
        ],
        'starting_price' => 29.00,
        'link' => home_url('/wall-art'),
        'features' => [
            'Fade-resistant inks',
            'Premium cotton canvas',
            'Ready to hang'
        ],
        'options' => [
            [
                'icon' => get_template_directory_uri() . '/assets/images/delivery.png',
                'label' => 'Delivery'
            ],
            [
                'icon' => get_template_directory_uri() . '/assets/images/shipping.png',
                'label' => 'Shipping'
            ]
        ]
    ],
    [
        'name' => 'Posters',
        'image' => get_template_directory_uri() . '/assets/images/category1.png',
        'description' => [
            'Classic prints that make a statement.',
            'High-quality photo prints designed to bring your favorite moments to life.'
        ],
        'starting_price' => 11.00,
        'link' => home_url('/wall-art'),
        'features' => [
            'Crisp color and fine-detail printing',
            'Multiple sizes for frames or albums',
            'AI-enhanced for clarity and balance'
        ],
        'options' => [
            [
                'icon' => get_template_directory_uri() . '/assets/images/pickup.png',
                'label' => 'Store Pickup'
            ],
            [
                'icon' => get_template_directory_uri() . '/assets/images/delivery.png',
                'label' => 'Delivery'
            ],
            [
                'icon' => get_template_directory_uri() . '/assets/images/shipping.png',
                'label' => 'Shipping'
            ]
        ]
    ],
    [
        'name' => 'Wall Art',
        'image' => get_template_directory_uri() . '/assets/images/category4.png',
        'description' => [
            'Gallery-style prints on premium paper',
            'High-quality photo prints designed to bring your favorite moments to life.'
        ],
        'starting_price' => 11.00,
        'link' => home_url('/wall-art'),
        'features' => [
            'Crisp color and fine-detail printing',
            'Multiple sizes for frames or albums',
            'AI-enhanced for clarity and balance'
        ],
        'options' => [
            [
                'icon' => get_template_directory_uri() . '/assets/images/pickup.png',
                'label' => 'Store Pickup'
            ],
            [
                'icon' => get_template_directory_uri() . '/assets/images/delivery.png',
                'label' => 'Delivery'
            ],
            [
                'icon' => get_template_directory_uri() . '/assets/images/shipping.png',
                'label' => 'Shipping'
            ]
        ]
    ],
    [
        'name' => 'Exterior',
        'image' => get_template_directory_uri() . '/assets/images/category5.png',
        'description' => [
            'Bold canvas prints made to stand out.',
            'High-quality photo prints designed to bring your favorite moments to life.'
        ],
        'starting_price' => 11.00,
        'link' => home_url('/wall-art'),
        'features' => [
            'Crisp color and fine-detail printing',
            'Multiple sizes for frames or albums',
            'AI-enhanced for clarity and balance'
        ],
        'options' => [
            [
                'icon' => get_template_directory_uri() . '/assets/images/pickup.png',
                'label' => 'Store Pickup'
            ],
            [
                'icon' => get_template_directory_uri() . '/assets/images/delivery.png',
                'label' => 'Delivery'
            ],
            [
                'icon' => get_template_directory_uri() . '/assets/images/shipping.png',
                'label' => 'Shipping'
            ]
        ]
    ],

];
?>

<?php foreach ($categories as $cat): ?>
    <div class="cat_box3">

        <div class="cat_feature">
            <img src="<?php echo esc_url($cat['image']); ?>" alt="<?php echo esc_attr($cat['name']); ?>">
        </div>

        <div class="cat_detail text-start">

            <h6 class="category-name mb-4">
                <?php echo esc_html($cat['name']); ?>
            </h6>

            <?php foreach ($cat['description'] as $desc): ?>
                <p><?php echo esc_html($desc); ?></p>
            <?php endforeach; ?>

            <p class="mt-5">Starting at:</p>
            <h6 class="cat_price mt-0">
                $<?php echo number_format($cat['starting_price'], 2); ?>
            </h6>

            <a href="<?php echo esc_url($cat['link']); ?>" class="btn vm-single-btn mt-3 px-4 py-3">
                Curate Your Piece
                <i class="fa-solid fa-arrow-down" style="transform: rotate(-130deg);"></i>
            </a>

            <hr />

            <ul class="opt_list">
                <?php foreach ($cat['features'] as $feature): ?>
                    <li><?php echo esc_html($feature); ?></li>
                <?php endforeach; ?>
            </ul>

            <hr />

            <h6 class="cat_opt my-4">Options Available for</h6>

            <ul class="info">
                <?php foreach ($cat['options'] as $option): ?>
                    <li>
                        <img src="<?php echo esc_url($option['icon']); ?>" width="24" height="24">
                        <span><?php echo esc_html($option['label']); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
<?php endforeach; ?>