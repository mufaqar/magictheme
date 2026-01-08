jQuery(function($){

    let cropper;
    const image = document.querySelector(
        '.woocommerce-product-gallery img.wp-post-image'
    );

    if (!image) return;

    cropper = new Cropper(image, {
        viewMode: 1,
        autoCropArea: 1,
        responsive: true,
        movable: true,
        zoomable: true,
        background: false
    });

    $('.aspect-buttons button').on('click', function(){

        const ratio = $(this).data('ratio');
        cropper.setAspectRatio(ratio);

        $('#aspect_ratio').val($(this).text());

        $('.aspect-buttons button').removeClass('active');
        $(this).addClass('active');
    });

    $('form.cart').on('submit', function(){

        const cropData = cropper.getData(true);
        $('#crop_data').val(JSON.stringify(cropData));

    });

});