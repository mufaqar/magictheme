<?php /*Template Name: Vendor Profile */ get_header(); ?>


<style>
    .proile_wrapper {
        padding-top: 80px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
    }

    .profile_banner {
        background-color: #FFFFFF;
        border-radius: 14.14px;
        padding: 28px 50px;
        display: flex;
        gap: 30px;
        flex-direction: row;
        justify-content: space-between;
        margin-bottom: -48px;
        z-index: 1;
    }

    .aut_name {
        font-weight: 700;
        font-size: 24px;
        line-height: 1.1;
        color: #000;
    }

    .aut_locat,
    .profile_banner p {
        font-weight: 400;
        font-size: 15px;
        line-height: 1.1;
        color: #616161;
        margin-bottom: 10px;
    }

    .follow {
        width: fit-content;
        margin-left: auto;
        margin-right: 0;
        text-align: right;
    }

    .follow p {
        justify-content: end;
    }

    .follow ul {
        display: flex;
        gap: 5px;
        align-items: center;
    }

    .follow ul li a .fa-brands {
        background: linear-gradient(90deg, #2EB2FA 0%, #8078D1 94.71%, #3DAFED 193.17%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .profile-tabs {
        width: 100%;
    }

    .profile-tabs__nav {
        display: inline-flex;
        background: #F3F3F3;
        border-radius: 6.47px;
        padding: 4px;
        gap: 4px;
        margin-bottom: 40px;
        max-width: 427px;
        width: 100%;
    }

    .profile-tab {
        background: transparent;
        width: 100%;
        padding: 7px;
        border: none;
        font-weight: 400;
        font-size: 15px;
        line-height: 1;
        border-radius: 4.31px;
        cursor: pointer;
        color: #616161;
        transition: all 0.25s ease;
    }

    .profile-tab.active {
        box-shadow: 0px 0px 4.31px 0px #00000040;
        background: #fff;
        color: #616161;
    }

    .profile-tab-content {
        display: none;
        padding: 130px 0;
    }

    .profile-tab-content.active {
        display: block;
    }

    .auth_about {
        display: flex;
        flex-direction: row;
        gap: 20px;
        align-items: center;
    }

    .pers_imgs {
        display: flex;
        flex-direction: row;
    }

    .pers_imgs img {
        max-width: 360px;
        width: 100%;
        border-radius: 20px;
    }

    .pers_imgs :last-child {
        margin-top: -80px;
        margin-left: -90px;
        margin-bottom: 80px;
    }

    .pers_about h2 {
        font-weight: 700;
        font-size: 42px;
        line-height: 1.1;
        background: linear-gradient(90deg, #2eb2fa, #8078d1, #3dafed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .pers_about p {
        font-weight: 400;
        font-size: 22px;
        line-height: 1.1;
        color: #000000;

    }

    @media (max-width: 768px) {
        .profile_banner {
            flex-direction: column;
            padding: 25px;
        }

        .auth_about {
            flex-direction: column;
        }

        .pers_imgs img {
            width: 65%;
        }

        .pers_about h2 {
            font-size: 32px;
        }

        .pers_about p {
            font-size: 16px;
        }

        .profile-tab-content {
            padding-bottom: 40px;
        }
    }
</style>
<section class="proile_wrapper"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/profile-bg.png');">
    <div class="container profile_banner">
        <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aut_feat.png" alt="profile" />
        </div>
        <div>
            <h3 class="aut_name">Viet Chu</h3>
            <p class="aut_locat">New York, USA</p>
            <p>Viet Chu is an artist who chose photography as one of the mediums for his exploration and expression of
                esoteric beauty. </p>
            <p>Read More <i class="fa-solid fa-chevron-down"></i></p>
        </div>
        <div class="follow">
            <p class="d-flex">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-add.png" alt="icon" /> Follow
            </p>
            <ul>
                <li>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="proile_wrapper">
    <div class="profile-tabs">
        <div class="container">
            <div class="profile-tabs__nav">
                <button class="profile-tab active" data-tab="profile-tab">
                    Profile
                </button>
                <button class="profile-tab" data-tab="artworks-tab">
                    All Artworks <span>(750)</span>
                </button>
            </div>
        </div>
        <div class="profile-tabs__content">
            <div id="profile-tab" class="profile-tab-content active" style="background-color: #98F1FF1A;">
                <div class="auth_about container">
                    <div class="pers_imgs col-md-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/auth1.png" alt="Author" />
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/auth2.png" alt="Author" />
                    </div>
                    <div class="pers_about col-md-6">
                        <h2>Hi! My name is Viet</h2>
                        <hr />
                        <p>
                            Viet Chu is an artist who chose photography as one of the mediums for his exploration and
                            expression of esoteric beauty. In his dedication of that pursuit, he infuses intuitive
                            sensibility and emotional intelligence to stop and capture a moment of time, that tells a
                            story for the rest of time.
                        </p>
                        <p>“The relationship between a photographer and his/her image is a very fluid dynamic that
                            continuously shifts and expands. It is within these moments of transition and
                            transformation...the flux of inter-spatial time within and between creativity and creation
                            where I find my passion.”
                        </p>
                    </div>
                </div>
            </div>
            <div id="artworks-tab" class="profile-tab-content">
                <!-- ARTWORKS CONTENT -->
                <p>Artworks grid goes here…</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.profile-tabs').forEach(tabs => {
            const buttons = tabs.querySelectorAll('.profile-tab');
            const contents = tabs.querySelectorAll('.profile-tab-content');
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    buttons.forEach(btn => btn.classList.remove('active'));
                    contents.forEach(content => content.classList.remove('active'));
                    button.classList.add('active');
                    tabs.querySelector('#' + button.dataset.tab).classList.add('active');
                });
            });
        });
    });
</script>