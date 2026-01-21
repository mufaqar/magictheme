jQuery(document).ready(function ($) {

    $(document).on('click', '.wishlist-btn', function (e) {
        e.preventDefault();

        const btn = $(this);
        const productId = btn.data('product-id');

        $.ajax({
            url: wishlistAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'toggle_wishlist',
                product_id: productId,
                nonce: wishlistAjax.nonce
            },
            success: function (response) {

                if (!response.success) {
                    alert(response.data?.message || 'Please login');
                    return;
                }

                btn.toggleClass('active');

                const icon = btn.find('i');
                icon.toggleClass('fa-solid fa-regular');
            }
        });
    });

});
