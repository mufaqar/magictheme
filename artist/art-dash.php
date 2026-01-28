<?php /*Template Name: Art Dashboard */ get_header();


if ( ! is_user_logged_in() ) {
    wp_redirect( wc_get_page_permalink( 'myaccount' ) );
    exit;
}

$user_id = get_current_user_id();

// WC Vendors capability check
if ( ! user_can( $user_id, 'vendor' ) && ! user_can( $user_id, 'manage_vendor' ) ) {
    wp_redirect( home_url() ); // or any custom page
    exit;
}



?>

<main class="welcome_main"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/right_bg.png');">
    <section>
        <div class="container mb-5">
            <h2 class="wel_title">Hey, Welcome to Visual Magic!</h2>
            <p class="wel_sub">Complete these steps to open your shop and start selling your art.</p>
        </div>
        <div class="container">
            <div class="wel_banner"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/wel-banner.png');">
                <h2 class="wel_title text-white mb-4">Edit Profile</h2>
                <ul class="">
                    <li>
                        <a href="<?php echo home_url('/artist-dashboard/edit-profile'); ?>"><i
                                class="fa-solid fa-chevron-right"></i> Add
                            a avatar</a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/edit-profile'); ?>"><i class="fa-solid fa-chevron-right"></i> Add
                            a cover image</a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/artist-dashboard/edit-profile'); ?>"><i
                                class="fa-solid fa-chevron-right"></i>
                            User profile </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/artist-dashboard/edit-profile'); ?>"><i
                                class="fa-solid fa-chevron-right"></i>
                            Notification Settings</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <h2 class="wel_title my-5">Dashboard</h2>
            <div class="wel_board"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/wel_board.png');">
                <div class="wel_col">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/store.png" alt="icon" />
                    <h3>Set Up Shop</h3>
                    <p>Customize your shop to stand out. Customers look for original artists! Share your story and add
                        at least one social link.</p>
                    <ul class="">
                        <li>
                            <a href="<?php echo home_url('/artist-dashboard/shop-settings'); ?>"><i
                                    class="fa-solid fa-chevron-right"></i> Shop Settings</a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('/artist-dashboard/manage-portfolio'); ?>"><i
                                    class="fa-solid fa-chevron-right"></i> Manage Portfolio</a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('/artist-dashboard/shop-settings'); ?>"><i
                                    class="fa-solid fa-chevron-right"></i> Add social links </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('/artist-dashboard/shop-settings'); ?>"><i
                                    class="fa-solid fa-chevron-right"></i> Add a bio</a>
                        </li>
                    </ul>
                </div>
                <div class="wel_col">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/paid.png" alt="icon" />
                    <h3>Get Paid</h3>
                    <p>Verify your details so you can start selling.</p>
                    <ul class="">
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-right"></i> Add your name & address</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-right"></i> Confirm your email</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-right"></i> Add your payment details </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-right"></i> Confirm your mobile phone number</a>
                        </li>
                    </ul>
                </div>
                <div class="wel_col">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pen.png" alt="icon" />
                    <h3>Create Products</h3>
                    <p>Upload your original art and choose products. You need to add at least 5 public designs and
                        enable at least one product for each design for your shop to go live.</p>
                    <p>Quality is better than quantity, so remember to check your product formatting.</p>
                    <ul class="">
                        <li>
                            <a href="<?php echo home_url('/artist-dashboard/manage-portfolio'); ?>"><i class="fa-solid fa-chevron-right"></i> Add design 0/5</a>
                        </li>
                    </ul>
                </div>
                <div class="wel_col">
                    <p>Almost there! Your account will be classified once you’ve completed the steps above. A few things
                        to remember:</p>
                    <ul class="">
                        <li>
                            Account classification can take up to five business days.
                        </li>
                        <li>
                            During this time your store will remain private as we do a couple more checks on our end
                            to keep our community safe.
                        </li>
                        <li>
                            In the meantime, make sure your profile, bio, and payment details are up-to-date.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>