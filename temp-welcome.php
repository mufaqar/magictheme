<?php /*Template Name: Welcome Page */ get_header(); ?>

<style>
    .welcome_main {
        min-height: 100vh;
        background-repeat: no-repeat;
        background-position: left top;
        background-size: contain;
    }

    .wel_title {
        font-weight: 700;
        font-size: 42px;
        line-height: 1.1;
        color: #000;
    }

    .wel_sub {
        font-weight: 400;
        font-size: 20px;
        line-height: 1.1;
        color: #000;
    }

    .wel_banner {
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

    .wel_banner ul {
        padding-left: 0;
        padding-right: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .wel_banner ul li a {
        font-weight: 500;
        font-size: 15px;
        line-height: 1.1;
        color: #fff;
        display: flex;
        gap: 10px;
        width: fit-content;
    }

    .wel_board {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 10px;
        padding: 30px 33px;
    }

    .wel_col {
        background-color: #fff;

    }
</style>

<main class="welcome_main"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/right_bg.png');">
    <section>
        <div class="container my-5">
            <h2 class="wel_title">Hey, Welcome to Visual Magic!</h2>
            <p class="wel_sub">Complete these steps to open your shop and start selling your art.</p>
        </div>
        <div class="container wel_banner"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/wel-banner.png');">
            <h2 class="wel_title text-white">Edit Profile</h2>
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
            </div>
        </div>
    </section>
</main>