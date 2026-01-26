<?php
/* Template Name: Art Edit Profile */
get_header();
?>

<main class="profile_edit_main container">
    <div class="row">
        <div class="col-md-3">
            <?php get_template_part('template-parts/profile-edit-side'); ?>
        </div>
        <div class="col-md-9 profile_content">
            <div class="profile_box">
                <h3>Avatar</h3>
                <hr />
                <div class="profile_img">
                    <!-- Avatar Preview -->
                    <div class="avt_pic">
                        <img id="avatarPreview" src="<?php echo get_template_directory_uri(); ?>/assets/images/avt.png"
                            alt="Avatar">
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
                <h3>Cover image</h3>
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
                <h3>Profile</h3>
                <hr />
                <form class="personal_detail">
                    <div class="form_row">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" placeholder="First Name" />
                        <p>This will only be used for verification and notification Purposes</p>
                    </div>
                    <div class="form_row">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" placeholder="Last Name" />
                        <p>This will only be used for verification and notification Purposes</p>
                    </div>
                    <div class="form_row">
                        <label for="email">*Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Email Address" required />
                    </div>
                    <div class="col-md-9 row">
                        <div class="form_row col-md-6">
                            <label for="tax_id">Tax ID</label>
                            <input type="tax_id" id="tax_id" name="tax_id" placeholder="" />
                        </div>
                        <div class="form_row col-md-6">
                            <label for="tax_id">Tax ID</label>
                            <input type="tax_id" id="tax_id" name="tax_id" placeholder="" />
                        </div>
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
                    <h3 class="mt-4">Notifications</h3>
                    <hr>
                    <div class="form_row">
                        <h6>Email Subscriptions</h6>

                        <div class="checkbox_group">
                            <label class="checkbox_item">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                Artist Newsletters (includes design tips, sale trends, and special events)
                            </label>

                            <label class="checkbox_item">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                Customer Newsletters (includes marketplace deals, discounts, and important updates)
                            </label>

                            <label class="checkbox_item">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                Comment/reply notifications
                            </label>

                            <label class="checkbox_item">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                New followers notifications
                            </label>

                            <label class="checkbox_item">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                Product Reminders & Suggestions
                            </label>

                            <label class="checkbox_item">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                Invitations to surveys, beta groups, and interviews
                            </label>

                            <label class="checkbox_item">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                Your Magic Mail Messages
                            </label>
                        </div>
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