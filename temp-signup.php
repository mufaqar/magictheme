<?php /*Template Name: SignUp */ get_header(); ?>
<style>
.signup_wrapper {
    padding: 60px 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.signup_container {
    width: 889px;
    margin: auto;
    text-align: center;
}

.signup_title {
    font-weight: 600;
    font-size: 42px;
    line-height: 1.2;
    color: #3B3B3B;
    text-align: center;
    margin-bottom: 20px;
}

.signup_sub {
    font-weight: 400;
    font-size: 24px;
    line-height: 1;
    text-align: center;
    color: #3B3B3B;
    max-width: 663px;
    width: 100%;
    margin: 0 auto 50px;
}

.signup_tabs {
    display: flex;
    justify-content: center;
    margin: 50px 0;
    gap: 2px;
}

.tabs_wrapper {
    max-width: 652px;
    width: 100%;
    margin: auto;
}

.tab_btn {
    background: none;
    border: none;
    padding: 31px 29px;
    cursor: pointer;
    position: relative;
    text-align: left;
    border: 3px solid #D9D9D9;
    border-radius: 6.44px;
}

.tab_btn img {
    max-width: 80px;
    width: 100%;
}

.tab_btn h3 {
    font-weight: 600;
    font-size: 24px;
    line-height: 1.1;
    color: #616161;
}

.tab_btn p {
    font-weight: 400;
    font-size: 15px;
    line-height: 1.1;
    color: #616161;
    margin-bottom: 0;
}

.tab_btn.active {
    border: 3px solid #3B3B3B
}

.tab_btn.active::after {
    content: "✓";
    position: absolute;
    top: -20px;
    width: 36px;
    height: 36px;
    left: 20px;
    display: flex;
    color: #3B3B3B;
    align-items: center;
    background: #ECECEC;
    font-size: 24px;
    justify-content: center;
    border-radius: 100px;
}

.signup_form input {
    display: block;
    width: 100%;
    font-weight: 600;
    font-size: 24px;
    line-height: 1.5;
    color: #616161CC;
    padding: 8px 0;
    outline: none;
    border: none;
    border-bottom: 2px solid transparent;
    background: linear-gradient(#fff, #fff) padding-box, linear-gradient(45deg, #6161618A, #6161618A, #6161618A) border-box;
}

.signup_form input:hover,
.signup_form input:focus {
    background: linear-gradient(#fff, #fff) padding-box, linear-gradient(45deg, #42a2d6, #736bc3, #3990bf) border-box;
}

.tab_content {
    display: none;
}

.tab_content.active {
    display: flex;
    flex-direction: column;
    gap: 29px;
}

.checkbox {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
    font-weight: 400;
    font-size: 24px;
    line-height: 1.2;
    color: #3B3B3B;
}

.checkbox input {
    width: fit-content;
}

.signup_container .login_btns {
    max-width: 614px;
    width: 100%;
    margin: 29px auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.signup_container .login_btns .btn {
    background: linear-gradient(#fff, #fff) padding-box, linear-gradient(90deg, #2EB2FA 0%, #8078D1 57.55%, #3DAFED 113.18%) border-box;
    padding: 24px 10px;
    width: 100%;
    border-radius: 100px;
    font-size: 16px;
    text-decoration: none;
    font-weight: 400;
    z-index: 2;
    border: 2px solid transparent;
    transform: translatey(0);
    transition: all 0.3s ease-in-out;
}

.signup_container .login_btns .btn span {
    font-weight: 600;
    font-size: 24px;
    line-height: 1.1;
    background: linear-gradient(90deg, #2EB2FA 0%, #8078D1 57.55%, #3DAFED 113.18%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

}

.signup_container .login_btns .btn:hover {
    background: linear-gradient(90deg, #3483AE 0%, #6059A1 100%);
}

.signup_container .login_btns .btn:hover span {
    background: linear-gradient(90deg, #ffffff 0%, #ffffff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.terms {
    font-weight: 400;
    font-size: 24px;
    line-height: 1.1;
    color: #616161CC;
    text-align: center;
}

@media (max-width: 768px) {
    .signup_title {
        font-size: 28px;
    }

    .signup_sub,
    .tab_btn h3,
    .signup_form input,
    .signup_container .login_btns .btn span,
    .terms {
        font-size: 16px;
    }

    .tab_btn {
        padding: 20px 10px;
    }

    .tab_btn img {
        max-width: 60px;
        width: auto;
    }

    .signup_container .login_btns .btn {
        padding: 10px 10px;
    }
}
</style>
<section class="signup_wrapper" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/right_bg.png'), url('<?php echo get_template_directory_uri(); ?>/assets/images/left_bg.png');
    background-repeat: no-repeat, no-repeat;
    background-position: left top, right bottom;
    background-size: contain, contain;
  ">
    <div class="container signup_container">

        <h2 class="signup_title">Join Visual Magic</h2>
        <p class="signup_sub">
            Sign up as a customer for 25% off your first order. Your coupon will be emailed after sign up.
        </p>

        <div class="tabs_wrapper">
            <!-- Tabs -->
            <div class="signup_tabs">
                <button class="tab_btn active" data-tab="artist">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/art.png" alt="icon" width="80"
                        height="80" />
                    <h3>Artist Signup</h3>
                    <p>Set up shop and start selling your designs</p>
                </button>
                <button class="tab_btn" data-tab="customer">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cus.png" alt="icon" width="55"
                        height="55" />
                    <h3>Customer Signup</h3>
                    <p>Browse the marketplace and find your thing</p>
                </button>
            </div>

            <!-- Artist Form -->
            <form class="signup_form tab_content active" id="artist">
                <input type="email" name="email" placeholder="Email" required />
                <input type="text" name="shop_name" placeholder="Shop name" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="hidden" name="role" value="vendor" />
                <button type="submit" class="btn"><span>Sign up</span></button>
            </form>

            <!-- Customer Form -->
            <form class="signup_form tab_content" id="customer">
                <input type="email" name="email" placeholder="Email" required />
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <label class="checkbox">
                    <input type="checkbox" name="newsletter" /> Email me special offers and artist news
                </label>
                <input type="hidden" name="role" value="customer" />
                <button type="submit" class="btn"><span>Sign up</span></button>
            </form>
        </div>
        <div class="login_btns">
            <a href="<?php echo home_url('/sign-up'); ?>" class="btn"><span>Sign up</span></a>

        </div>
        <p class="terms">Already have an account? <strong><a href="<?php echo home_url('/login'); ?>">Log
                    In</a></strong></p>
        <p class="terms">By clicking Sign Up, you agree to our <strong><a
                    href="<?php echo home_url('/user-agreement'); ?>">User Agreement</a></strong> and
            <strong><a href="<?php echo home_url('/privacy-policy'); ?>">Privacy Policy</a></strong>, and to receive our
            promotional emails (opt out any time).
        </p>
        <p class="terms">This site is protected by reCAPTCHA and the Google <strong><a
                    href="<?php echo home_url('/privacy-policy'); ?>">Privacy
                    Policy</a></strong> and <strong><a href="<?php echo home_url('/terms-of-service'); ?>">Terms of
                    Service</a></strong> apply.</p>
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
<script>
document.addEventListener('DOMContentLoaded', function() {

    function signup(formId) {
        const form = document.getElementById(formId);
        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(form);
            formData.append('action', 'vm_signup');

            fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    window.location.href = data.redirect;
                } else {
                    alert(data.message);
                }
            });
        });
    }

    signup('artist');
    signup('customer');

});
</script>
