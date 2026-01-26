jQuery(function ($) {

    $('#magic-login-form').on('submit', function (e) {
        e.preventDefault();

        const form = $(this);
        const messageBox = form.find('.login-message');

        messageBox.html('Logging in...');

        $.ajax({
            url: magicLogin.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'magic_ajax_login',
                nonce: magicLogin.nonce,
                username: $('#email').val(),
                password: $('#password').val(),
            },
            success: function (res) {
                if (res.success) {
                    window.location.href = res.data.redirect;
                } else {
                    messageBox.html('<span class="error">' + res.data.message + '</span>');
                }
            }
        });
    });

});
