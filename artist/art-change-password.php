<?php
/* Template Name: Artist-Change Password */
get_header();
$user_id = get_current_user_id();
if ( ! $user_id ) {
    wp_redirect( wp_login_url() );
    exit;
}
?>

<main class="profile_edit_main container mt-5">
    <style>
        /* Small visual polish to match provided design */
        .profile_box { background: #fff; padding: 28px; border-radius: 8px; box-shadow: 0 6px 18px rgba(0,0,0,0.08); }
        .profile_box h2{ font-size: 26px; margin-bottom: 8px; }
        .form_row { margin-bottom: 18px; }
        .form_row label { display:block; margin-bottom:8px; font-weight:600; color:#333; }
        .form_row input[type="password"] { width:100%; padding:12px 16px; border:1px solid #e6e6e6; border-radius:6px; background:#fff; box-sizing:border-box; }
        .action-buttons { display:flex; gap:16px; justify-content:flex-end; align-items:center; }
        .action-buttons .btn { padding:10px 28px; border-radius:30px; font-weight:600; }
        .action-buttons .btn.btn-secondary { background:transparent; border:2px solid #2EB2FA; color:#2EB2FA; }
        .action-buttons .btn.btn-primary { background: linear-gradient(90deg,#2EB2FA 0%,#8078D1 57%,#3DAFED 100%); border:none; color:#fff; }
        .profile-message .success { color: #1b7a0a; }
        .profile-message .error { color: #a51d1d; }
        /* Loader styles */
        .btn-spinner { display:inline-block; width:18px; height:18px; border-radius:50%; border:2px solid rgba(255,255,255,0.4); border-top-color: #fff; animation: spin 0.8s linear infinite; margin-left:8px; vertical-align:middle; }
        .btn[disabled] { opacity: 0.8; pointer-events: none; }
        @keyframes spin { to { transform: rotate(360deg); } }
    </style>

    <div class="row">
        <div class="col-md-3">
            <?php get_template_part('template-parts/profile-edit-side'); ?>
        </div>
        <div class="col-md-9 profile_content">
            <div class="profile_box change-password-box">
                <h2>Change Password</h2>
                <hr />
                <form id="vendor-change-password-form">
                    <div class="form_row">
                        <label for="current_password">Current Password</label>
                        <input type="password" id="current_password" name="current_password" required />
                    </div>

                    <div class="form_row">
                        <label for="new_password">New Password</label>
                        <input type="password" id="new_password" name="new_password" required />
                    </div>

                    <div class="form_row">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" required />
                    </div>

                    <div class="action-buttons mt-5">
                        <a href="<?php echo site_url('/edit-profile'); ?>" class="btn btn-secondary"><span>Back</span></a>
                        <button type="submit" class="btn btn-primary" id="change-password-submit">
                            <span class="btn-text">Save Changes</span>
                            <span class="btn-spinner" id="change-password-spinner" style="display:none;" aria-hidden="true"></span>
                        </button>
                    </div>

                    <div class="profile-message mt-3"></div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

<script>
jQuery(function($) {
    var $form = $('#vendor-change-password-form');
    var $btn = $('#change-password-submit');
    var $spinner = $('#change-password-spinner');
    var $btnText = $btn.find('.btn-text');

    $form.on('submit', function(e) {
        e.preventDefault();
        $('.profile-message').html('');

        // Show loader and disable button
        $btn.prop('disabled', true);
        $spinner.show();
        $btnText.text('Saving...');

        $.post(magicProfile.ajax_url, {
            action: 'change_vendor_password',
            current_password: $('#current_password').val(),
            new_password: $('#new_password').val(),
            confirm_password: $('#confirm_password').val(),
            nonce: magicProfile.nonce
        }, function(res) {
            if (res.success) {
                $('.profile-message').html('<span class="success">' + res.data.message + '</span>');
                $('#current_password, #new_password, #confirm_password').val('');
            } else {
                $('.profile-message').html('<span class="error">' + (res.data?.message || 'Error') + '</span>');
            }
        }).always(function() {
            // Hide loader and re-enable button
            $btn.prop('disabled', false);
            $spinner.hide();
            $btnText.text('Save Changes');
        });
    });
});
</script>