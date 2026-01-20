<?php /*Template Name: SignUp */ get_header(); ?>
<style>
    .signup_container {
        width: 420px;
        margin: auto;
        text-align: center;
    }

    .signup_tabs {
        display: flex;
        justify-content: center;
        margin: 25px 0;
        border-bottom: 1px solid #ddd;
    }

    .tab_btn {
        background: none;
        border: none;
        padding: 12px 20px;
        font-weight: 600;
        cursor: pointer;
        color: #777;
        position: relative;
    }

    .tab_btn.active {
        color: #2f80ed;
    }

    .tab_btn.active::after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background: #2f80ed;
    }

    .signup_form input {
        width: 100%;
        padding: 12px;
        margin-bottom: 12px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    .primary_btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(90deg, #2f80ed, #6c63ff);
        border: none;
        color: #fff;
        border-radius: 25px;
        margin: 15px 0;
    }

    .outline_btn {
        width: 100%;
        padding: 12px;
        background: #fff;
        border: 1px solid #cce0ff;
        border-radius: 25px;
        margin-bottom: 10px;
        color: #2f80ed;
    }

    .tab_content {
        display: none;
    }

    .tab_content.active {
        display: block;
    }

    .checkbox {
        display: flex;
        align-items: center;
        font-size: 13px;
        gap: 8px;
        margin-bottom: 10px;
    }

    .terms {
        font-size: 12px;
        color: #777;
        margin-top: 15px;
    }
</style>
<section class="signup_wrapper" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/right_bg.png'), url('<?php echo get_template_directory_uri(); ?>/assets/images/left_bg.png');
    background-repeat: no-repeat, no-repeat;
    background-position: left top, right bottom;
    background-size: contain, contain;
  "></section>
<div class="signup_container">

    <h2>Join Visual Magic</h2>
    <p class="subtitle">
        Sign up as a customer for 25% off your first order. Your coupon will be emailed after sign up.
    </p>

    <!-- Tabs -->
    <div class="signup_tabs">
        <button class="tab_btn active" data-tab="artist">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/art.png" />
            Artist Signup</button>
        <button class="tab_btn" data-tab="customer">Customer Signup</button>
    </div>

    <!-- Artist Form -->
    <form class="signup_form tab_content active" id="artist">
        <input type="email" placeholder="Email" required />
        <input type="text" placeholder="Shop name" required />
        <input type="password" placeholder="Password" required />

        <button class="primary_btn">Sign up</button>

        <button class="outline_btn">
            <i class="fa-brands fa-google"></i> Continue with Google
        </button>

        <button class="outline_btn">
            <i class="fa-brands fa-apple"></i> Continue with Apple
        </button>
    </form>

    <!-- Customer Form -->
    <form class="signup_form tab_content" id="customer">
        <input type="email" placeholder="Email" required />
        <input type="text" placeholder="Username" required />
        <input type="password" placeholder="Password" required />

        <label class="checkbox">
            <input type="checkbox" /> Email me special offers and artist news
        </label>

        <button class="primary_btn">Sign up</button>

        <button class="outline_btn">
            <i class="fa-brands fa-google"></i> Continue with Google
        </button>

        <button class="outline_btn">
            <i class="fa-brands fa-apple"></i> Continue with Apple
        </button>
    </form>

    <p class="terms">
        By clicking Sign up, you agree to our <strong>User Agreement</strong> and
        <strong>Privacy Policy</strong>.
    </p>

</div>
</section>



<?php get_footer(); ?>

<script>
    const tabs = document.querySelectorAll(".tab_btn");
    const contents = document.querySelectorAll(".tab_content");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            tabs.forEach(t => t.classList.remove("active"));
            contents.forEach(c => c.classList.remove("active"));

            tab.classList.add("active");
            document.getElementById(tab.dataset.tab).classList.add("active");
        });
    });
</script>