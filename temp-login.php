<?php /*Template Name: Login */ get_header(); ?>
<style>
    .login_wrapper {
        padding: 60px 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .login_title {
        font-weight: 600;
        font-size: 42px;
        line-height: 1.2;
        color: #3B3B3B;
        text-align: center;
        margin-bottom: 20px;
    }

    .login_sub {
        font-weight: 400;
        font-size: 24px;
        line-height: 1;
        text-align: center;
        color: #3B3B3B;
        margin-bottom: 50px;
    }

    .login_form {
        max-width: 817px;
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 50px;
    }

    .login_form input {
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

    .login_form input:hover,
    .login_form input:focus {
        background: linear-gradient(#fff, #fff) padding-box, linear-gradient(45deg, #42a2d6, #736bc3, #3990bf) border-box;
    }

    .login_form .forget_pass {
        font-weight: 600;
        width: fit-content;
        font-size: 24px;
        line-height: 1.1;
        color: #616161;
        text-align: right;
        margin-right: 0;
        margin-left: auto;
    }

    .login_form p {
        font-weight: 400;
        font-size: 24px;
        line-height: 1.1;
        color: #616161CC;
        text-align: center;
    }

    .login_form .login_btns {
        max-width: 614px;
        width: 100%;
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .login_form .login_btns .btn {
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

    .login_form .login_btns .btn span {
        font-weight: 600;
        font-size: 24px;
        line-height: 1.1;
        background: linear-gradient(90deg, #2EB2FA 0%, #8078D1 57.55%, #3DAFED 113.18%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

    }

    .login_form .login_btns .btn:hover {
        background: linear-gradient(90deg, #3483AE 0%, #6059A1 100%);
    }

    .login_form .login_btns .btn:hover span {
        background: linear-gradient(90deg, #ffffff 0%, #ffffff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
<section class="login_wrapper" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/right_bg.png'), url('<?php echo get_template_directory_uri(); ?>/assets/images/left_bg.png');
    background-repeat: no-repeat, no-repeat;
    background-position: left top, right bottom;
    background-size: contain, contain;
  ">
    <div class="container ">
        <h3 class="login_title">Log In</h3>
        <p class="login_sub">Need an account? <strong>Sign up</strong></p>
        <form class="login_form">
            <div>
                <label for="email" class="d-none">Email or Username</label>
                <input id="email" name="email" placeholder="Email or Username" />
            </div>
            <div>
                <label for="password" class="d-none">Password</label>
                <input id="password" name="password" placeholder="Password" />
            </div>
            <a href="#" class="forget_pass">Lost Password?</a>
            <p>
                By clicking Log In, you agree to our <strong>User Agreement</strong>
            </p>
            <div class="login_btns">
                <a href="<?php echo home_url('/sign-up'); ?>" class="btn"><span>Sign up</span></a>
                <button class="btn"><span><i class="fa-brands fa-google"></i> Continue with Google</span></button>
                <button class="btn"><span><i class="fa-brands fa-apple"></i> Continue with Apple</span></button>
            </div>
            <p> This site is protected by reCAPTCHA and the Google <strong><a href="#">Privacy
                        Policy</a></strong> and <strong><a href="#">Terms of Service</a></strong> apply. </p>
        </form>
    </div>
</section>


<?php get_footer(); ?>