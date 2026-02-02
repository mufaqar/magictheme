<?php
/* Template Name: Artist-Close Account */
get_header();
$user_id = get_current_user_id();
if ( ! $user_id ) {
    wp_redirect( wp_login_url() );
    exit;
}
?>

<main class="profile_edit_main container mt-5">
    <style>
        /* Close account styles matching design */
        .profile_box { background: #fff; padding: 28px; border-radius: 8px; box-shadow: 0 6px 18px rgba(0,0,0,0.08); }
        .profile_box h2{ font-size: 26px; margin-bottom: 8px; }
        .close-list { margin: 8px 0 18px 0; padding-left: 0; list-style: none; }
        .close-list li { display:flex; gap:12px; align-items:flex-start; margin-bottom:10px; color:#333; }
        .close-list li .dot { width:18px; height:18px; border-radius:4px; display:inline-flex; align-items:center; justify-content:center; font-size:12px; }
        .close-list li.negative .dot { background:#DB4444; color:#ffffff; border-radius: 50%; margin-top:4px; }
        .close-list li:nth-child(2).negative .dot {background: #DB4444;color: #ffffff;border-radius: 50%;margin-top: 2px;}
        .close-list li:nth-child(3).negative .dot {background: #DB4444;color: #ffffff;border-radius: 50%;margin-top: 0;}
        .close-list li.positive .dot { background:#42c70d; color:#ffffff; border-radius:5px; }
        .benefits { margin: 14px 0; }
        .feedback { width:100%; min-height:120px; padding:12px; border:1px solid #ececec; border-radius:6px; box-sizing:border-box; }
        .warning-box { background:#3DAFED47; border-radius:6px; padding:14px; color:#1b6a93; border:1px solid #cfeaf9; margin:12px 0; }
        .action-buttons { display:flex; gap:16px; justify-content:center; align-items:center; margin-top:18px; }
        .btn.btn-keep { background: linear-gradient(90deg,#2EB2FA 0%,#8078D1 57%,#3DAFED 100%); color:#fff; border:none; padding:10px 28px; border-radius:30px; }
        .btn.btn-close { background: transparent; border: 2px solid #DB4444; color: #DB4444; padding: 12px 25px; border-radius: 30px; width: auto; display: flex; align-items: center; }
        .confirm-input { width:220px; padding:8px 10px; border:1px solid #e6e6e6; border-radius:6px; }
        .profile-message .success { color: #1b7a0a; }
        .profile-message .error { color: #a51d1d; }
        /* Spinner reuse */
        .btn-spinner { display:inline-block; width:18px; height:18px; border-radius:50%; border:2px solid rgba(255,255,255,0.4); border-top-color: #fff; animation: spin 0.8s linear infinite; margin-left:8px; vertical-align:middle; }
        .btn-close .btn-spinner { border-color: rgba(217,83,79,0.2); border-top-color: #d9534f; }

        /* Modal styles */
        .close-modal { position:fixed; inset:0; z-index:9999; display:flex; align-items:center; justify-content:center; }
        .close-modal-backdrop { position:absolute; inset:0; background:rgba(0,0,0,0.4); }
        .close-modal-panel { position:relative; background:#fff; border-radius:12px; padding:22px; width:520px; max-width:94%; box-shadow:0 10px 40px rgba(0,0,0,0.15); z-index:2; }
        .close-modal-panel h3 { margin-top:0; font-size:20px; }
        .close-modal-panel p { color:#555; }
        .close-modal .btn-secondary { background:transparent; border:1px solid #ccc; color:#333; padding:8px 14px; border-radius:10px; }
        .close-modal .btn-close { background: transparent; border: 2px solid #DB4444; color: #DB4444; padding: 12px 25px; border-radius: 30px; width: auto; display: flex; align-items: center; }
        @keyframes spin { to { transform: rotate(360deg); } }
        .warning-red { background:#DB4444; border-radius: 4px; color: #fff; padding: 5px 10px; font-size: 14px;}
    </style>

    <div class="row">
        <div class="col-md-3">
            <?php get_template_part('template-parts/profile-edit-side'); ?>
        </div>
        <div class="col-md-9 profile_content">
            <div class="profile_box">
                <h2>We’re Sorry to See you go</h2>
                <hr />

                <ul class="close-list">
                    <li class="negative"><span class="dot"><i class="fa fa-times" style="color: #fff;"></i></span><div>Your profile will be removed</div></li>
                    <li class="negative"><span class="dot"><i class="fa fa-times" style="color: #fff;"></i></span><div>You will lose access to the purchase history</div></li>
                    <li class="negative"><span class="dot"><i class="fa fa-times" style="color: #fff;"></i></span><div>Your favorite items will be removed</div></li>
                </ul>

                <h4>Benefits of Keeping your Visual Magic Store:</h4>
                <ul class="close-list benefits">
                    <li class="positive"><span class="dot"><i class="fa fa-check" style="color: #fff;"></i></span><div>Access to a global collection of unique artwork and artists</div></li>
                    <li class="positive"><span class="dot"><i class="fa fa-check" style="color: #fff;"></i></span><div>AI enhancement for your personal photos with various configuration options</div></li>
                    <li class="positive"><span class="dot"><i class="fa fa-check" style="color: #fff;"></i></span><div>Reliable customer support for orders and inquiries</div></li>
                    <li class="positive"><span class="dot"><i class="fa fa-check" style="color: #fff;"></i></span><div>High-quality printing and shipping handled by trusted professional fulfilers</div></li>
                    <li class="positive"><span class="dot"><i class="fa fa-check" style="color: #fff;"></i></span><div>Exclusive offers, curated collections, and seasonal promotions</div></li>
                </ul>

                <b>If there’s anything we can improve, we’d really appreciate your feedback:</b>
                <textarea class="feedback" id="close_feedback" placeholder="Tell us why you are leaving (optional)"></textarea>

                <div class="warning-box">
                    <span class="warning-red">Warning</span>
                    <p style="margin:6px 0 0;">Closing your account is a permanent action! We cannot restore closed accounts</p>
                </div>

                <!-- <p class="confirm-note" style="text-align:center;margin-top:12px;color:#555;">When you click <strong>Permanently close my account</strong> a confirmation dialog will open — you will need to type <strong>CLOSE</strong> to proceed.</p> -->

                <div class="profile-message mt-3"></div>

                <div class="action-buttons">
                    <a href="<?php echo site_url('/edit-profile'); ?>" class="btn btn-keep">Keep My Visual Magic Account</a>
                    <button id="permanent-close-btn" class="btn btn-close">
                        Permanently close my account
                        <span class="btn-spinner" id="close-spinner" style="display:none;" aria-hidden="true"></span>
                    </button>
                </div>

                <!-- Confirmation Modal -->
                <div id="close-modal" class="close-modal" style="display:none;">
                    <div class="close-modal-backdrop"></div>
                    <div class="close-modal-panel" role="dialog" aria-modal="true" aria-labelledby="close-modal-title">
                        <h3 id="close-modal-title">Confirm account closure</h3>
                        <p>Type <strong>CLOSE</strong> in the field below to confirm you want to permanently close your account.</p>
                        <input type="text" id="modal_close_confirm" class="confirm-input" placeholder="Type CLOSE" style="width:100%;margin-top:8px;" />
                        <div class="profile-message modal-message" style="margin-top:8px;"></div>
                        <div style="display:flex;gap:12px;justify-content:flex-end;margin-top:16px;">
                            <button id="modal-cancel" class="btn btn-secondary">Cancel</button>
                            <button id="modal-confirm-close" class="btn btn-close" disabled>
                                Confirm closure
                                <span class="btn-spinner" id="modal-close-spinner" style="display:none;" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

<script>
jQuery(function($) {
    var $btn = $('#permanent-close-btn');
    var $spinner = $('#close-spinner');

    $btn.on('click', function(e) {
        e.preventDefault();
        $('.profile-message').html('');
        // open modal
        $('#close-modal').show();
        $('#modal_close_confirm').val('').focus();
        $('.modal-message').html('');
        $('#modal-confirm-close').prop('disabled', true);
    });

    // Modal interactions
    var $modal = $('#close-modal');
    var $modalInput = $('#modal_close_confirm');
    var $modalConfirm = $('#modal-confirm-close');
    var $modalSpinner = $('#modal-close-spinner');
    var $modalCancel = $('#modal-cancel');

    function closeModal() {
        $modal.hide();
        $modalInput.val('');
    }

    $modalCancel.on('click', function() {
        closeModal();
    });

    $modal.on('click', function(e) {
        if (e.target === $modal[0]) closeModal();
    });

    $modalInput.on('input', function() {
        var val = $.trim($(this).val()).toUpperCase();
        if (val === 'CLOSE') {
            $modalConfirm.prop('disabled', false);
        } else {
            $modalConfirm.prop('disabled', true);
        }
    });

    $modalConfirm.on('click', function(e) {
        e.preventDefault();
        $('.modal-message').html('');

        // final confirmation
        var confirmText = $.trim($modalInput.val());

        // Show spinner
        $modalConfirm.prop('disabled', true);
        $modalSpinner.show();

        $.post(magicProfile.ajax_url, {
            action: 'close_vendor_account',
            feedback: $('#close_feedback').val(),
            confirm_text: confirmText,
            nonce: magicProfile.nonce
        }, function(res) {
            if (res.success) {
                // close modal and show message then redirect
                closeModal();
                $('.profile-message').html('<span class="success">' + res.data.message + '</span>');
                setTimeout(function() {
                    window.location = res.data.redirect || '/';
                }, 900);
            } else {
                $('.modal-message').html('<span class="error">' + (res.data?.message || 'Error') + '</span>');
            }
        }).always(function() {
            $modalConfirm.prop('disabled', false);
            $modalSpinner.hide();
        });
    });

    // Accessibility: Esc to close modal
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
});
</script>