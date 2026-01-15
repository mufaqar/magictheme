<?php
/**
 * Vendor Store Map and Adress Block template.
 *
 * @since 1.8.7
 * @version 1.8.7
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="wcv wcv_block-store-map-address">
    <h2 class="wcv_block-store-map-address__title"> <?php echo esc_html( $title ); ?></h2>
<?php
if ( ! $hide_address ) {

    echo $show_address_heading && isset( $address_heading ) ? '<p class="wcv-widget-map-heading">' . esc_attr( $address_heading ) . '</p>' : '';

    echo '<ul class="contact-card">';
    echo isset( $vendor_settings['pv_shop_name'] ) ? '<li class="wcv-widget-shop-name">' . esc_html( $vendor_settings['pv_shop_name'] ) . '</li>' : '';
    echo ! empty( $address_line1 ) ? '<li class="wcv-widget-store-address1">' . esc_html( $address_line1 ) . '</li>' : '';
    echo ! empty( $city ) ? '<li class="wcv-widget-store-city">' . esc_attr( $city ) . '</li>' : '';
    echo ! empty( $state ) ? '<li class="wcv-widget-store-state">' . esc_attr( $state ) . '</li>' : '';
    echo ! empty( $post_code ) ? '<li class="wcv-widget-store-post-code">' . esc_attr( $post_code ) . '</li>' : '';
    echo '</ul>';
}

if ( ! $hide_map && ! empty( $maps_api_key ) ) {


    ?>
    <style>
        #wcvendors_pro_map_widget {
            width: <?php echo esc_attr( $map_width ); ?>;
            height: <?php echo esc_attr( $map_height ); ?>;
        }
    </style>
    <?php echo $show_map_heading && ! empty( $map_heading ) ? '<p class="wcv-widget-map-heading">' . esc_attr( $map_heading ) . '</p>' : ''; ?>

    <div id="wcvendors_pro_map_widget"></div>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('wcvendors_pro_map_widget'), {
                zoom: <?php echo esc_attr( $zoom_level ); ?>,
                center: {lat: -34.397, lng: 150.644}
            });
            var geocoder = new google.maps.Geocoder();
            jQuery(document).ready(function () {
                geocodeAddress(geocoder, map);
            });
        }


        function geocodeAddress(geocoder, resultsMap) {
            var address = '<?php echo esc_attr( $address_line1 ) . ', ' . esc_attr( $city ); ?>';
            geocoder.geocode({'address': address}, function (results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                    console.log('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr( $maps_api_key ); ?>&callback=initMap"></script>
    <?php
}
?>
</div>
