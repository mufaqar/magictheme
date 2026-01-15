<?php
/**
 * The Template for displaying the product shipping details
 *
 * Override this template by copying it to yourtheme/wc-vendors/front/shipping
 *
 * @package    WCVendors_Pro
 * @version  1.8.0
 * @since    1.6.3
 */
?>
<?php if ( ! empty( $shipping_flat_rates ) ) : ?>
    <?php if ( ! empty( $shipping_flat_rates['national'] ) || ! empty( $shipping_flat_rates['international'] ) || ( array_key_exists( 'national_free', $shipping_flat_rates ) && 'yes' === $shipping_flat_rates['national_free'] ) || ( array_key_exists( 'international_free', $shipping_flat_rates ) && 'yes' === $shipping_flat_rates['international_free'] ) ) : ?>
        <?php if ( count( $shipping_costs['value'] ) > 0 ) : ?>
        <h3><?php echo esc_html( $shipping_costs['label'] ); ?></h3>
        <table>
            <?php foreach ( $shipping_costs['value'] as $val ) : ?>
                <tr>
                    <td width="60%">
                        <strong><?php echo esc_html( $val['label'] ); ?><?php echo esc_html( $val['country'] ); ?></strong>
                    </td>
                    <td width="40%"><?php echo wp_kses_post( wc_clean( $val['value'] ) ); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>

        <?php if ( 'yes' !== $shipping_flat_rates['national_disable'] && ! empty( $national_rate_details ) ) : ?>
            <h3><?php echo esc_html( $national_details['label'] ); ?></h3>
            <table>
                <?php foreach ( $national_details['value'] as $key => $label ) : ?>
                    <?php if ( isset( $shipping_flat_rates[ $key ] ) && '' !== $shipping_flat_rates[ $key ] ) : ?>
                    <tr>
                        <td width="60%">
                            <strong><?php echo esc_attr( $label ); ?></strong>
                        </td>
                        <td width="40%">
                            <?php echo wp_kses_post( wc_price( $shipping_flat_rates[ $key ] ) ); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <?php if ( 'yes' !== $shipping_flat_rates['international_disable'] && ! empty( $international_rate_details ) ) : ?>
            <h3><?php echo esc_html( $international_details['label'] ); ?></h3>
            <table>
                <?php foreach ( $international_details['value'] as $key => $label ) : ?>
                    <?php if ( isset( $shipping_flat_rates[ $key ] ) && '' !== $shipping_flat_rates[ $key ] ) : ?>
                    <tr>
                        <td width="60%">
                            <strong><?php echo esc_html( $label ); ?></strong>
                        </td>
                        <td width="40%">
                            <?php echo wp_kses_post( wc_price( $shipping_flat_rates[ $key ] ) ); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

    <?php else : ?>

        <h5><?php esc_html_e( 'No shipping rates are available for this product.', 'wcvendors-pro' ); ?></h5>

    <?php endif; ?>

<?php else : ?>

    <?php if ( ! empty( $shipping_table_rates['value'] ) ) : ?>
        <h3><?php echo esc_html( $shipping_table_rates['label'] ); ?></h3>
        <table>
            <thead>
            <tr>
                <th><?php esc_html_e( 'Method Name', 'wcvendors-pro' ); ?></th>
                <th><?php esc_html_e( 'Region / Country', 'wcvendors-pro' ); ?></th>
                <th><?php esc_html_e( 'State', 'wcvendors-pro' ); ?></th>
                <th><?php esc_html_e( 'Postcode', 'wcvendors-pro' ); ?></th>
                <th><?php esc_html_e( 'Cost', 'wcvendors-pro' ); ?></th>
            </tr>
            </thead>
            <?php foreach ( $shipping_table_rates['value'] as $rate ) : ?>
                <?php if ( isset( $rate['fee'] ) && $rate['fee'] >= 0 ) : ?>
                    <?php
                        $state = $rate['state'];
                        if ( '' === $state ) {
                            $state = __( 'Any', 'wcvendors-pro' );
                        } elseif ( WC()->countries->get_states( $rate['country'] ) ) {
                            $state = WC()->countries->get_states( $rate['country'] )[ $rate['state'] ];
                        }
                    ?>
                <tr>
                    <td width="20%"><?php echo isset( $rate['method_name'] ) && ! empty( $rate['method_name'] ) ? esc_html( $rate['method_name'] ) : esc_html( $default_method_name ); ?></td>
                    <td width="20%"><?php echo ( esc_attr( $rate['country'] ) !== '' ) ? esc_attr( $countries[ strtoupper( $rate['country'] ) ] ) : ( ( esc_attr( $rate['region'] ) !== '' ) ? esc_attr( $regions[ strtoupper( $rate['region'] ) ]['name'] ) : esc_html__( 'Any', 'wcvendors-pro' ) ); ?></td>
                    <td width="20%"><?php echo esc_html( $state ); ?></td>
                    <td width="20%"><?php echo ( esc_attr( $rate['postcode'] ) !== '' ) ? esc_attr( $rate['postcode'] ) : esc_html__( 'Any', 'wcvendors-pro' ); ?></td>
                    <td width="20%">
                        <?php echo ( esc_attr( $rate['fee'] ) > 0 ) ? wp_kses_post( wc_price( esc_attr( $rate['fee'] ) ) . $product->get_price_suffix() ) : esc_html__( 'Free shipping', 'wcvendors-pro' ); ?>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <h5><?php esc_html_e( 'No shipping rates are available for this product.', 'wcvendors-pro' ); ?></h5>
    <?php endif; ?>
<?php endif; ?>
<?php if ( ! empty( $shipping_details ) && count( $shipping_details['value'] ) > 0 ) : ?>
    <h3><?php echo esc_html( $shipping_details['label'] ); ?></h3>
    <table>
        <?php foreach ( $shipping_details['value'] as $key => $val ) : ?>
            <tr>
                <td><strong> <?php echo esc_html( $val['label'] ); ?></strong></td>
                <td><?php echo wp_kses_post( wc_price( $val['value'] ) ); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
