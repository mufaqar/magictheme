jQuery(function ($) {

    const box = $('#uploadBox');
    const input = $('#productImage');
    const preview = $('#imagePreview');

    box.on('click', function () {
        input.trigger('click');
    });

    input.on('change', function () {
        const file = this.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = e => {
            preview.attr('src', e.target.result).show();
            box.find('p').hide();
        };
        reader.readAsDataURL(file);
    });

    $('#vendorProductForm').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $('.form-message').html('Uploading...');

        $.ajax({
            url: vendorAjax.ajaxurl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.success) {
                    $('.form-message').html('✅ Product added successfully');
                    $('#vendorProductForm')[0].reset();
                    preview.hide();
                    box.find('p').show();
                } else {
                    $('.form-message').html('❌ ' + res.data);
                }
            }
        });
    });

});


