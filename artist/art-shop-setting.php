<?php
/* Template Name: Art Shop Setting */
get_header();


/* Template Name: Art Shop Setting */
get_header();

$user_id = get_current_user_id();

$shop_name  = get_user_meta($user_id, 'pv_shop_name', true);
$shop_bio   = get_user_meta($user_id, 'pv_shop_description', true);
$facebook   = get_user_meta($user_id, '_wcv_facebook_url', true);
$instagram  = get_user_meta($user_id, '_wcv_instagram_username', true);
$twitter    = get_user_meta($user_id, '_wcv_twitter_username', true);
$youtube    = get_user_meta($user_id, '_wcv_youtube_url', true);
$website    = get_user_meta($user_id, '_wcv_company_url', true);
$tiktok     = get_user_meta($user_id, '_wcv_linkedin_url', true); // custom


if (!current_user_can('vendor')) {
    wp_redirect(home_url());
    exit;
}


?>

<main class="profile_edit_main container">
    <div class="row">
        <div class="col-md-3">
            <?php get_template_part('template-parts/profile-edit-side'); ?>
        </div>
        <div class="col-md-9 profile_content mt-5">
            <div class="profile_box">
                <h3>Shop Name</h3>
                <hr />
                <form class="personal_detail" id="vendor-shop-form">
                    <div class="form_row">
                        <label for="shopname">Shop Name</label>
                       <input type="text" id="shopname" name="shopname" value="<?php echo esc_attr($shop_name); ?>" />
                        <p>This will only be used for verification and notification Purposes</p>
                    </div>
                    <div class="form_row">
                        <h6>Allow users to </h6>
                        <div class="checkbox_group">
                            <label class="checkbox_item">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                See my state or city, and country on my public profile
                            </label>

                            <label class="checkbox_item">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                Send me Magic Mail
                            </label>
                        </div>
                    </div>
                    <div class="form_row">
                        <label for="bio">Bio</label>
                       <textarea id="bio" name="bio" rows="7"><?php echo esc_textarea($shop_bio); ?></textarea>
                        <p>Describe your design style and storefront in 500 characters or less. include a little about
                            who you are, where you live, what inspires your work, some achievements, and a nudge to
                            follow you a social media. Need some help?</p>
                    </div>
                    <h3 class="mt-4 mb-0">Social Links</h3>
                    <hr>
                    <div class="form_row">
                        <label for="fb">Facebook</label>
                        <input type="text" name="fb" id="fb" value="<?php echo esc_attr($facebook); ?>" />
                    </div>
                    <div class="form_row">
                        <label for="insta">Instagram</label>
                        <input type="text" name="insta" id="insta"   value="<?php echo esc_attr($instagram); ?>" />
                    </div>
                    <div class="form_row">
                        <label for="twitter">Twitter</label>
                        <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr($twitter); ?>" />
                    </div>
                    <div class="form_row">
                        <label for="tiktok">Tiktok</label>
                        <input type="text" name="tiktok" id="tiktok"  value="<?php echo esc_attr($tiktok); ?>" />
                    </div>
                    <div class="form_row">
                        <label for="youtube">Youtube</label>
                        <input type="text" name="youtube" id="youtube" value="<?php echo esc_attr($youtube); ?>" />
                    </div>
                    <div class="form_row">
                        <label for="website">Personal Website</label>
                        <input type="text" name="website" id="website" value="<?php echo esc_attr($website); ?>" />
                    </div>
                    <!-- Buttons -->
                    <div class="action-buttons mt-5 col-md-6">
                        <button class="btn btn-secondary w-100"><span>Back</span></button>
                        <button type="submit" class="btn btn-primary w-100"><span>Save Changes</span></button>
                    </div>
                    <div class="shop-message mt-3"></div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
document.getElementById('avatarInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(event) {
        document.getElementById('avatarPreview').src = event.target.result;
    };
    reader.readAsDataURL(file);
});
</script>

<?php get_footer(); ?>

<script>
jQuery(function ($) {
    $('#vendor-shop-form').on('submit', function (e) {
        e.preventDefault();
        $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
            action: 'wcv_save_shop_settings',
            shopname: $('#shopname').val(),
            bio: $('#bio').val(),
            fb: $('#fb').val(),
            insta: $('#insta').val(),
            twitter: $('#twitter').val(),
            tiktok: $('#tiktok').val(),
            youtube: $('#youtube').val(),
            website: $('#website').val(),
        }, function (response) {
            $('.shop-message').html(response.data);
        });
    });
});
</script>
