<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if (is_search()) { ?>
        <meta name="robots" content="noindex, nofollow" />
    <?php } ?>
    <title>
        <?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged, $post;

        wp_title('|', true, 'right');

        // Add the blog name.
        bloginfo('name');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";

        // Add a page number if necessary:
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', 'wpv'), max($paged, $page));
        ?>
    </title>
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="vm-header py-2">
        <div class="container">

            <!-- Top Row -->
            <div class="d-flex flex-md-row flex-row justify-content-between align-items-center">
                <a href="<?php bloginfo('url'); ?>" class="d-flex align-items-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Visual Magic"
                        width="290" class="me-2">
                </a>
                <form class="vm-search flex-grow-1 mx-4 position-relative" action="<?php echo home_url('/search'); ?>">
                    <input type="text" name="s" class="form-control vm-search-input" placeholder="Search...">
                    <button type="submit" class="vm-search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <!-- RIGHT MENU -->
                <div class="d-md-flex d-none align-items-center gap-3 vm-right-menu">
                    <a href="<?php echo home_url('/shop'); ?>" class="vm-link">Shop</a>
                    <a href="<?php echo home_url('/'); ?>" class="vm-link">Login</a>
                    <a href="<?php echo home_url('/'); ?>" class="vm-link">Signup</a>
                    <a href="<?php echo home_url('/shop'); ?>" class="vm-icon icon-gradient"><i class="far fa-heart"></i></a>
                    <a href="<?php echo home_url('/cart'); ?>" class="vm-icon"><i class="fas fa-shopping-cart"></i></a>
                </div>
                <!-- Hamburger Toggler for Mobile -->
                <button id="mobileToggle" class="navbar-toggler d-md-none" data-bs-toggle="collapse"
                    data-bs-target="#mobileNav">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- NAV MENU ROW (Collapsible on Mobile) -->
            <div class="collapse navbar-collapse d-md-block" id="mobileNav">
                <nav class="vm-nav mt-2">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'menu_class' => 'nav gap-md-4',
                        'container' => false,
                        'fallback_cb' => false,
                        'walker' => new Walker_Nav_Menu_Bootstrap(),
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </header>

   




    <script>
        document.getElementById("mobileToggle").addEventListener("click", function () {
            const icon = this.querySelector("i");
            icon.classList.toggle("fa-bars");
            icon.classList.toggle("fa-times");
        });
    </script>