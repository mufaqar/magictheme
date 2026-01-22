<?php
/* Template Name: Edit Profile */
get_header();
?>

<style>
    .profile_edit_main {
        padding: 91px 0;
    }

    .profile_content {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .profile_box {
        background-color: #fff;
        padding: 35px 18px;
        border-radius: 6px;
        box-shadow: 0px 4px 21.2px 0px #00000040;
    }

    .profile_box h3 {
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .profile_img {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 30px;
        margin-bottom: 44px;
    }

    .avt_pic {
        width: 104px;
        height: 102px;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0px 4px 4px 0px #00000040;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar_upload {
        display: flex;
        flex-direction: row;
        gap: 12px;
        max-width: 420px;
        align-items: end;
        justify-content: space-between;
    }

    .avatar_upload label p {
        font-weight: 700;
        font-size: 15px;
        line-height: 1.5;
        color: #000000;
        margin-bottom: 10px;
    }

    .avatar_upload input[type="file"] {
        font-weight: 500;
        font-size: 12px;
        line-height: 1;
        color: #000000;
    }

    .profile_img .upload_btn {
        width: fit-content;
        padding: 10px 22px;
        border-radius: 30px;
        border: none;
        background: linear-gradient(90deg, #2EB2FA 0%, #8078D1 57.55%, #3DAFED 113.18%);
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }

    .profile_box p {
        font-weight: 500;
        font-size: 12px;
        line-height: 1.1;
        color: #000000;
    }

    .personal_detail {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .personal_detail .form_row label {
        font-weight: 400;
        font-size: 15px;
        line-height: 1.1;
        color: #000000;
        margin-bottom: 10px;
    }

    .personal_detail .form_row input {
        display: block;
        width: 100%;
        padding: 6px 15px;
        border: 2px solid #D9D9D9;
        border-radius: 5px;
        outline: none;
    }

    .personal_detail .form_row input:hover,
    .personal_detail .form_row input:focus {
        border: 2px solid transparent;
        background: linear-gradient(#fff, #fff) padding-box, linear-gradient(45deg, #42a2d6, #736bc3, #3990bf) border-box;
    }

    .personal_detail .form_row p {
        font-weight: 400;
        font-size: 10px;
        line-height: 1.1;
        color: #000000;
        margin-top: 13px;
        margin-bottom: 0;
    }

    .form_row .checkbox_group {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 10px;
    }

    .form_row .checkbox_item {
        position: relative;
        padding-left: 30px;
        line-height: 1.4;
        color: #000;
        cursor: pointer;
    }

    .form_row .checkbox_item input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .form_row .checkmark {
        position: absolute;
        left: 0;
        top: 3px;
        height: 16px;
        width: 16px;
        border: 2px solid #bdbdbd;
        border-radius: 3px;
        background-color: #fff;
    }

    /* Checked state */
    .form_row .checkbox_item input:checked~.checkmark {
        /* background: linear-gradient(90deg, #2EB2FA 0%, #8078D1 57.55%, #3DAFED 113.18%); */

        border: 2px solid transparent;
        background: linear-gradient(90deg, #2EB2FA 0%, #8078D1 57.55%, #3DAFED 113.18%) padding-box, linear-gradient(90deg, #2EB2FA 0%, #8078D1 57.55%, #3DAFED 113.18%) border-box;
    }

    .form_row .checkmark::after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Check icon */
    .form_row .checkbox_item input:checked~.checkmark::after {
        display: block;
        left: 4px;
        top: 0px;
        width: 5px;
        height: 9px;
        border: solid #fff;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .form_row h6,
    .personal_detail .form_row label.checkbox_item {
        font-weight: 400;
        font-size: 12px;
        line-height: 1.1;
        color: #000;
    }

    .personal_detail .action-buttons {
        display: flex;
        justify-content: end;
        margin-left: auto;
        margin-right: 0;
        gap: 15px;
    }

    @media (max-width: 768px) {
        .profile_edit_main {
            padding: 91px 15px;
        }

        .profile_img,
        .avatar_upload,
        .personal_detail .action-buttons {
            flex-direction: column;
            align-items: start;
        }

        .profile_box h3 {
            font-size: 20px;
        }
    }
</style>

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