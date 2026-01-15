<?php
/**
 * Vendor store price filter block template
 *
 * @since   1.8.7
 * @version 1.8.7
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$temp_min_price = isset( $_GET['min_price'] ) ? $_GET['min_price'] : $min_price;
$temp_max_price = isset( $_GET['max_price'] ) ? $_GET['max_price'] : $max_price;
?>
<style>
    #wcv_block-store-filter__price-range__slider {
        width: 100%;
        height: 5px;
        background-color: <?php echo esc_attr( $track_color ); ?>;
        background: <?php echo esc_attr( $track_color ); ?>;
        margin-bottom: 20px;
    }
    .wcv_block-store-filter__price-range__slider__min,
    .wcv_block-store-filter__price-range__slider__max {
        width: 50px;
        text-align: center;
    }
    .ui-slider-handle {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #000;
        border: 2px solid #111;
        top: -0.5em !important;
    }
    .ui-slider-range {
        background: <?php echo esc_attr( $rail_color ); ?> !important;
    }
</style>
<div class="wcv wcv_block-store-price-filter">
    <h2 class="wcv_block-store-price-filter__title">
        <?php echo esc_html( $title ); ?>
    </h2>

    <div class="wcv_block-store-filter__price-range">
        <div id="wcv_block-store-filter__price-range__slider"></div>
        <div class="wcv_block-store-filter__price-range__values" style="display:flex;justify-content:space-between;align-items:center;">
            <input type="text" class="wcv_block-store-filter__price-range__slider__min" value="<?php echo esc_attr( $temp_min_price ); ?>" />
            <input type="text" class="wcv_block-store-filter__price-range__slider__max" value="<?php echo esc_attr( $temp_max_price ); ?>" />
        </div>
    </div>
    <?php if ( $show_apply_button ) : ?>
        <button class="wcv_block-store-filter__price-range__button" id="wcv_block-store-filter__price-range__button" style="margin-top:20px;">
            <?php echo esc_html_e( 'Apply', 'wcvendors-pro' ); ?>
        </button>
    <?php endif; ?>
</div>
<script>
    ( function($) {
        $(document).ready(function() {
            var min_price = $('.wcv_block-store-filter__price-range__slider__min').val();
            var max_price = $('.wcv_block-store-filter__price-range__slider__max').val();
            var submitChange = ( e ) => {
                let bas_url = window.location.href;
                let url = new URL(bas_url);

                // Remove all params
                url.searchParams.delete('min_price');
                url.searchParams.delete('max_price');
                url.searchParams.set('min_price', min_price);
                url.searchParams.set('max_price', max_price);
                url.searchParams.set('vendor_id', <?php echo esc_attr( $vendor_id ); ?>);
                window.location.href = url.href;
            }
            $('#wcv_block-store-filter__price-range__slider').slider({
                    range: true,
                    min: 0,
                    max:  <?php echo esc_attr( $max_price ); ?>,
                    values: [ <?php echo esc_attr( $temp_min_price ); ?>,  <?php echo esc_attr( $temp_max_price ); ?>],
                    slide: function(event, ui) {
                        min_price = ui.values[0];
                        max_price = ui.values[1];
                        $('.wcv_block-store-filter__price-range__slider__min').val( min_price);
                        $('.wcv_block-store-filter__price-range__slider__max').val( max_price );
                    }
            });
            if ( $( '#wcv_block-store-filter__price-range__button' ).length == 0 ) {
                $('#wcv_block-store-filter__price-range__slider').on('slidestop', submitChange );
                $('.wcv_block-store-filter__price-range__slider__min').on( 'change', function() {
                    min_price = $(this).val();
                    $('#wcv_block-store-filter__price-range__slider').slider('values', 0, min_price).trigger('slidestop');
                });

                $('.wcv_block-store-filter__price-range__slider__max').on( 'change', function() {
                    max_price = $(this).val();
                    $('#wcv_block-store-filter__price-range__slider').slider('values', 1, max_price).trigger('slidestop');
                })
            }
          
            $( '.wcv_block-store-filter__price-range__button' ).on( 'click', submitChange );
        });


    })(jQuery);
</script>


