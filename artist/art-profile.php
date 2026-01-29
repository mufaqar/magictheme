<?php  get_header(); ?>


<?php
// Get the vendor username from query var
$vendor_username = get_query_var('vendor_shop'); // 'softsgens'

// Get the WP_User object
$vendor_user = get_user_by('login', $vendor_username);

if ( ! $vendor_user || ! in_array('vendor', (array) $vendor_user->roles) ) {
    echo '<p>Vendor not found</p>';
    return;
}

// Vendor ID
$vendor_id = $vendor_user->ID;

$shop_name = get_user_meta($vendor_id, 'pv_shop_name', true); // Vendor shop name
$shop_description = get_user_meta($vendor_id, 'pv_shop_description', true); // Description
$shop_banner = get_user_meta($vendor_id, 'pv_shop_header', true); // Banner
$shop_avatar = get_user_meta($vendor_id, 'pv_shop_logo', true); // Avatar
$shop_location = get_user_meta($vendor_id, 'pv_shop_city', true); // City / location


// Get avatar and cover
$profile_avatar = get_user_meta($vendor_id, 'profile_avatar', true); // image URL or attachment ID
$profile_cover  = get_user_meta($vendor_id, 'profile_cover', true);  // image URL or attachment ID

// If stored as attachment ID, get URL
if (is_numeric($profile_avatar)) {
    $profile_avatar = wp_get_attachment_url($profile_avatar);
}

if (is_numeric($profile_cover)) {
    $profile_cover = wp_get_attachment_url($profile_cover);
}

// Set fallbacks
$avatar_url = $profile_avatar ? esc_url($profile_avatar) : get_template_directory_uri() . '/assets/images/aut_feat.png';
$cover_url  = $profile_cover ? esc_url($profile_cover) : get_template_directory_uri() . '/assets/images/profile-bg.png';

?>




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

.profile_banner img.profile_avatar {
   
    width: 70px;
     height: auto;
     max-height: 100px;
    border-radius:20px;
 
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
}

.profile-tab-content.active {
    display: block;
}

.auth_about {
    display: flex;
    flex-direction: row;
    gap: 20px;
    align-items: center;
    padding: 130px 0;
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

.Pro-slider .slick-prev:before,
.Pro-slider .slick-next:before,
.cat-slider .slick-prev:before,
.cat-slider .slick-next:before {
    color: #000000 !important;
}

.rounded-cat {
    border-radius: 85px;
    width: fit-content;
    margin: auto;
}

.rounded-cat img {
    height: 325px;
    border-radius: 85px;
    max-width: 205px;
    width: 100%;
}

.rounded-cat h6 {
    font-weight: 700;
    font-size: 20px;
    line-height: 1.1;
    color: #000;
    text-align: center;
    margin-top: 10px;
}

.rounded-cat h6 small {
    font-weight: 600;
    font-size: 15px;
    line-height: 1;
    color: rgba(0, 0, 0, 0.5);
}

.Pro-slider .slick-next,
.cat-slider .slick-next {
    right: 0px;
}

.Pro-slider .slick-prev,
.cat-slider .slick-prev {
    left: 0;
    z-index: 2;
}

.side_cta {
    padding: 89px 15px;
    border-radius: 61.99px;
}

.side_cta h6 {
    font-weight: 500;
    font-size: 25.23px;
    line-height: 1.1;
    text-align: center;
    color: #000;
}

.side_cta h3 {
    font-weight: 700;
    font-size: 46.34px;
    line-height: 1.1;
    text-align: center;
    color: #000;
}

.side_cta .sign_btn {
    background: linear-gradient(90deg, #3483AE 0%, #6059A1 100%);
    color: #fff;
    padding: 19px 10px;
    width: 100%;
    border-radius: 100px;
    font-size: 16px;
    display: block;
    text-align: center;
    text-decoration: none;
    font-weight: 400;
    z-index: 2;
    border: 2px solid transparent;
    margin-top: 50px;
    transform: translatey(0);
    transition: all 0.3s ease-in-out;
}

.side_cta .sign_btn:hover {
    transform: translatey(-15px);
}

@media (max-width: 768px) {
    .profile_banner {
        flex-direction: column;
        padding: 25px;
    }

    .auth_about {
        padding: 130px 15px 40px;
        flex-direction: column;
    }

    .pers_imgs img {
        width: 63%;
    }

    .pers_about h2 {
        font-size: 32px;
    }

    .pers_about p {
        font-size: 16px;
    }
}
</style>
<section class="proile_wrapper px-md-0 px-3" style="background-image: url('<?php echo $cover_url; ?>');">
    <div class="container profile_banner">
        <div>
            <img class="profile_avatar" src="<?php echo $avatar_url; ?>" alt="profile" width="100" height="100" />
        </div>
        <div>
            <h3 class="aut_name"><?php echo esc_html($shop_name ? $shop_name : $vendor_user->display_name); ?></h3>
            <p class="aut_locat"><?php echo esc_html($shop_location); ?></p>
            <p><?php echo esc_html($shop_description); ?></p>
            <!-- <p>Read More <i class="fa-solid fa-chevron-down"></i></p> -->
        </div>
        <div class="follow">
            <p class="d-flex">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-add.png" alt="icon" /> Follow
            </p>
            <?php
                
                $user_id = $vendor_id ?? get_current_user_id();               
                $socials = [
                    'facebook'  => ['meta' => '_wcv_facebook_url',       'icon' => 'fa-facebook'],
                    'instagram' => ['meta' => '_wcv_instagram_username', 'icon' => 'fa-instagram'],
                    'twitter'   => ['meta' => '_wcv_twitter_username',   'icon' => 'fa-twitter'],
                    'youtube'   => ['meta' => '_wcv_youtube_url',        'icon' => 'fa-youtube'],
                    'website'   => ['meta' => '_wcv_company_url',        'icon' => 'fa-globe'],
                    'tiktok'    => ['meta' => '_wcv_linkedin_url',         'icon' => 'fa-tiktok'], // if custom
                ];

                echo '<ul class="vendor-socials">';
                foreach ($socials as $key => $data) {
                    $value = get_user_meta($user_id, $data['meta'], true);

                    if ($value) {
                        // If Instagram or Twitter username, convert to full URL
                        if ($key === 'instagram') {
                            $value = "https://instagram.com/" . ltrim($value, '@');
                        } elseif ($key === 'twitter') {
                            $value = "https://twitter.com/" . ltrim($value, '@');
                        }

                        echo '<li><a href="'. esc_url($value) .'" target="_blank"><i class="fa-brands '. esc_attr($data['icon']) .'"></i></a></li>';
                    }
                }
                echo '</ul>';
                ?>

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
            <div id="profile-tab" class="profile-tab-content active">
                <div class="" style="background-color: #98F1FF1A;">
                    <div class="auth_about container">
                        <div class="pers_imgs col-md-6">
                            <img src="<?php echo $profile_avatar; ?>" alt="Author" />

                        </div>
                        <div class="pers_about col-md-6">
                            <h2>Hi! <?php echo esc_html($shop_name ? $shop_name : $vendor_user->display_name); ?></h2>
                            <hr />
                            <p>
                                <?php echo esc_html($shop_description); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php get_template_part('template-parts/author-pro-slider'); ?>
                <?php get_template_part('template-parts/author-cat-slider'); ?>
                <?php get_template_part('template-parts/testimonials'); ?>
                <div class="features-section container-fluid">
                    <div class="stats_box">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gal.png"
                            class="feature-icon" alt="">
                        <div>
                            <h4>Weirdly Meaningful Art</h4>
                            <p>Millions of designs on over 70 high quality Products.</p>
                        </div>
                    </div>

                    <div class="stats_box">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thu.png"
                            class="feature-icon" alt="">
                        <div>
                            <h4>Purchases Pay Artists</h4>
                            <p>Money goes directly into a creative person’s pocket.</p>
                        </div>
                    </div>

                    <div class="stats_box">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lef.png"
                            class="feature-icon" alt="">
                        <div>
                            <h4>Socially Responsible Production</h4>
                            <p>We’re investing in programs to offset all carbon emissions</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="artworks-tab" class="profile-tab-content">
                <!-- ARTWORKS CONTENT -->
                <?php get_template_part('template-parts/auth-work'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
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