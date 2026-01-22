<?php /*Template Name: Edit Profile */ get_header(); ?>

<style>
    .edit_main {
        min-height: 100vh;
        background-repeat: no-repeat;
        background-position: left top;
        background-size: contain;
        padding: 40px 0;
    }

    .pro_edit_title {
        font-weight: 700;
        font-size: 42px;
        line-height: 1.1;
        color: #000;
    }

    .pro_edit_sub {
        font-weight: 400;
        font-size: 20px;
        line-height: 1.1;
        color: #000;
    }

    .pro_edit_banner {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 10px;
        padding: 30px 33px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .pro_edit_banner ul {
        padding-left: 0;
        padding-right: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .pro_edit_banner ul li a {
        font-weight: 500;
        font-size: 15px;
        line-height: 1.1;
        color: #fff;
        display: flex;
        gap: 10px;
        width: fit-content;
    }

    .pro_edit_board {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 10px;
        padding: 30px 33px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 23px;
    }

    .pro_edit_col {
        background-color: #fff;
        padding: 21px 15px;
        border-radius: 5px;
    }

    .pro_edit_col h3 {
        font-weight: 700;
        font-size: 24px;
        line-height: 1.1;
        color: #000;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .pro_edit_col p {
        font-weight: 400;
        font-size: 15px;
        line-height: 1.1;
        color: #000;
    }

    .pro_edit_col ul {
        padding-left: 1rem;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .pro_edit_col ul li {
        font-weight: 500;
        font-size: 15px;
        line-height: 1.1;
        color: #000000;
        display: flex;
        gap: 10px;
        width: fit-content;
    }

    .pro_edit_col:last-child {
        grid-column: span 3;
    }

    .pro_edit_col:last-child ul {
        list-style-type: square;
        list-style: inside;
    }

    @media (max-width: 768px) {
        .pro_edit_banner {
            flex-direction: column;
            align-items: start;
            padding: 30px 20px;
        }

        .pro_edit_title {
            font-size: 28px;
        }

        .pro_edit_board {
            grid-template-columns: repeat(1, 1fr);
            padding: 30px 20px;
        }

        .pro_edit_col:last-child {
            grid-column: span 1;
        }
    }
</style>

<main class="edit_main"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/right_bg.png');">
    <section>
        <div class="container mb-5">
            <h2 class="pro_edit_title">Hey, Welcome to Visual Magic!</h2>
            <p class="pro_edit_sub">Complete these steps to open your shop and start selling your art.</p>
        </div>
        <div class="container">
            <div class="pro_edit_banner"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/wel-banner.png');">
                <h2 class="pro_edit_title text-white mb-4">Edit Profile</h2>
                <ul class="">
                    <li>
                        <a href="#"><i class="fa-solid fa-chevron-right"></i> Add a avatar</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-chevron-right"></i> Add a cover image</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-chevron-right"></i> User profile </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-chevron-right"></i> Notification Settings</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <h2 class="pro_edit_title my-5">Dashboard</h2>
            <div class="pro_edit_board"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/wel_board.png');">
                <div class="pro_edit_col">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/store.png" alt="icon" />
                    <h3>Set Up Shop</h3>
                    <p>Customize your shop to stand out. Customers look for original artists! Share your story and add
                        at least one social link.</p>
                    <ul class="">
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-right"></i> Add a profile picture</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-right"></i> Add a cover image</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-right"></i> Add social links </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-right"></i> Add a bio</a>
                        </li>
                    </ul>
                </div>
                <div class="pro_edit_col">
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
                <div class="pro_edit_col">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pen.png" alt="icon" />
                    <h3>Create Products</h3>
                    <p>Upload your original art and choose products. You need to add at least 5 public designs and
                        enable at least one product for each design for your shop to go live.</p>
                    <p>Quality is better than quantity, so remember to check your product formatting.</p>
                    <ul class="">
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-right"></i> Add design 0/5</a>
                        </li>
                    </ul>
                </div>
                <div class="pro_edit_col">
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