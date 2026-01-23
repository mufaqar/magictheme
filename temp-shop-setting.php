<?php
/* Template Name: Shop Setting */
get_header();
?>

<main class="profile_edit_main container">
    <div class="row">
        <div class="col-md-3">
            <?php get_template_part('template-parts/profile-edit-side'); ?>
        </div>
        <div class="col-md-9 profile_content">
            <div class="profile_box">
                <h3>Choose Shop Profile Image</h3>
                <hr />
                <div class="profile_img">
                    <!-- Avatar Preview -->
                    <div class="avt_pic">
                        <img id="avatarPreview"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/aut_feat.png" alt="aut_feat">
                    </div>
                    <!-- Upload Controls -->
                    <div class="avatar_upload">
                        <label>
                            <p>Choose image</p>
                            <input type="file" id="avatarInput" accept="image/*">
                        </label>
                        <button type="button" class="upload_btn">
                            Upload Design
                        </button>
                    </div>
                </div>
                <p>You can inject a little more personality into your profile and help people recognize you across
                    Visual Magic by Uploading an avatar (an image, photo or other graphic icon of “you”).</p>
            </div>
            <div class="profile_box">
                <h3>Shop Cover image</h3>
                <hr />
                <div class="profile_img">
                    <!-- Upload Controls -->
                    <div class="avatar_upload">
                        <label>
                            <p>Choose image</p>
                            <input type="file" id="coverInput" accept="image/*">
                        </label>
                        <button type="button" class="upload_btn">
                            Upload Design
                        </button>
                    </div>
                </div>
                <p>Images must be 2400px wide by 600px high and in JPEG or Png format. See our blog post for tips on
                    designing eye catching cover photos.</p>
            </div>
            <div class="profile_box">
                <h3>Shop Name</h3>
                <hr />
                <form class="personal_detail">
                    <div class="form_row">
                        <label for="shopname">Shop Name</label>
                        <input type="text" id="shopname" name="shopname" placeholder="Shop Name" />
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
                        <textarea type="text" id="bio" name="bio" rows="7"></textarea>
                        <p>Describe your design style and storefront in 500 characters or less. include a little about
                            who you are, where you live, what inspires your work, some achievements, and a nudge to
                            follow you a social media. Need some help?</p>
                    </div>
                    <h3 class="mt-4 mb-0">Social Links</h3>
                    <hr>
                    <div class="form_row">
                        <label for="fb">Facebook</label>
                        <input type="text" id="fb" name="fb" placeholder="Your Facebook URL" />
                    </div>
                    <div class="form_row">
                        <label for="insta">Instagram</label>
                        <input type="text" id="insta" name="insta" placeholder="Your Instagram URL" />
                    </div>
                    <div class="form_row">
                        <label for="twitter">Twitter</label>
                        <input type="text" id="twitter" name="twitter" placeholder="Your Twitter URL" />
                    </div>
                    <div class="form_row">
                        <label for="tiktok">Tiktok</label>
                        <input type="text" id="tiktok" name="tiktok" placeholder="Your Tiktok URL" />
                    </div>
                    <div class="form_row">
                        <label for="youtube">Youtube</label>
                        <input type="text" id="youtube" name="youtube" placeholder="Your Youtube URL" />
                    </div>
                    <div class="form_row">
                        <label for="website">Personal Website</label>
                        <input type="text" id="website" name="website" placeholder="Your Personal Website URL" />
                    </div>
                    <!-- Buttons -->
                    <div class="action-buttons mt-5 col-md-6">
                        <button class="btn btn-secondary w-100"><span>Back</span></button>
                        <button class="btn btn-primary w-100"><span>Save Changes</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    document.getElementById('avatarInput').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (event) {
            document.getElementById('avatarPreview').src = event.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>

<?php get_footer(); ?>