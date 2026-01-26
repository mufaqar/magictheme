jQuery(function ($) {

    /* ===============================
       SAVE PROFILE
    =============================== */
    $('#vendor-profile-form').on('submit', function (e) {
        e.preventDefault();

        $.post(magicProfile.ajax_url, {
            action: 'update_vendor_profile',
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            email: $('#email').val(),
            tax_id: $('#tax_id').val(),
            nonce: magicProfile.nonce
        }, function (res) {
            $('.profile-message').html(
                res.success
                    ? '<span class="success">' + res.data.message + '</span>'
                    : '<span class="error">' + res.data.message + '</span>'
            );
        });
    });

    /* ===============================
       IMAGE UPLOAD
    =============================== */
    function uploadImage(input, type, previewId) {

        const file = input.files[0];
        if (!file) return;

        const data = new FormData();
        data.append('action', 'upload_vendor_image');
        data.append('type', type);
        data.append('file', file);
        data.append('nonce', magicProfile.nonce);

        $.ajax({
            url: magicProfile.ajax_url,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (res) {

                if (!res.success) {
                    alert(res.data?.message || 'Upload failed');
                    return;
                }

                if (previewId) {
                    $('#' + previewId).attr('src', res.data.url);
                }
            }
        });
    }

    // Avatar
    $('#avatarInput').on('change', function () {
        uploadImage(this, 'avatar', 'avatarPreview');
    });

    // Cover
    $('#coverInput').on('change', function () {
        uploadImage(this, 'cover', 'coverPreview');
    });

});
