<?php
/**
 * New row template for store opening hours
 *
 * @package WCVendors_Pro
 * @version 1.9.4
 */

$time_format = apply_filters( 'wcv_opening_hours_time_format', wc_time_format() );
$labels      = wcv_days_labels();
$times       = apply_filters(
    'wcv_store_opening_times',
    array_merge(
        get_time_interval_options(),
        array(
            array( 'closed' => __( 'Closed', 'wcvendors-pro' ) ),
            array( 'open' => __( 'Open All Day', 'wcvendors-pro' ) ),
        )
    )
);

unset( $labels['closed'] );
unset( $labels['open'] );
?>

<tr>
    <td class="col-status">
        <label class="mobile_header"><?php esc_html_e( 'Status', 'wcvendors-pro' ); ?></label>
        <input type="hidden" name="status[]" value="0" />
        <label class="wcv-checkbox-container">
            <input type="checkbox"  class="status" />
            <span class="checkmark"></span>
        </label>
    </td>
    <td class="col-business-days">
        <label class="mobile_header"><?php esc_html_e( 'Business Days', 'wcvendors-pro' ); ?></label>
        <select name="days[]" class="opening-day-select">
            <?php foreach ( $labels as $key => $label ) : ?>
                <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></option>
            <?php endforeach; ?>
        </select>
    </td>
    <td class="col-opening">
        <label class="mobile_header"><?php esc_html_e( 'Opening', 'wcvendors-pro' ); ?></label>
        <select name="open[]" class="opening-hours-select">
            <?php foreach ( $times as $time_option ) : ?>
                <option value="<?php echo esc_attr( key( $time_option ) ); ?>"><?php echo esc_html( current( $time_option ) ); ?></option>
            <?php endforeach; ?>
        </select>
    </td>

    <td class="col-closing">
        <label class="mobile_header"><?php esc_html_e( 'Closing', 'wcvendors-pro' ); ?></label>
        <select name="close[]" class="closing-hours-select">
            <?php foreach ( $times as $time_option ) : ?>
                <?php if ( 'open' === key( $time_option ) || 'closed' === key( $time_option ) ) : ?>
                    <?php continue; ?>
                <?php endif; ?>
                <option value="<?php echo esc_attr( key( $time_option ) ); ?>"><?php echo esc_html( current( $time_option ) ); ?></option>
            <?php endforeach; ?>
        </select>
    </td>

    <td class="wcv-actions">
        <div class="wcv-actions-wrapper">
            <a href="#" class="remove-row row-action" title="<?php esc_attr_e( 'Remove this Row', 'wcvendors-pro' ); ?>">
                <?php wcvp_get_icon( 'wcv-icon wcv-icon-24 wcv-icon-middle', 'wcv-icon-trash' ); ?>
                <span class="wcv-tooltiptext"><?php esc_html_e( 'Remove', 'wcvendors-pro' ); ?></span>
            </a>
            <div class="more-actions row-action">
                <div class="more-actions-trigger">
                    <?php wcvp_get_icon( 'wcv-icon wcv-icon-24 wcv-icon-middle', 'wcv-icon-three-dots' ); ?>
                    <span class="wcv-tooltiptext"><?php esc_html_e( 'More Actions', 'wcvendors-pro' ); ?></span>
                </div>
                <ul class="sub-actions hidden">
                    <li>
                        <a href="#" class="add-row-above" title="<?php esc_attr_e( 'Add Row Above', 'wcvendors-pro' ); ?>">
                            <?php wcvp_get_icon( 'wcv-icon wcv-icon-sm wcv-icon-middle wcv-icon-left', 'wcv-icon-plus-circle' ); ?>
                            <span class="vertical-middle"><?php esc_html_e( 'Add Row Above', 'wcvendors-pro' ); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="add-row-below" title="<?php esc_attr_e( 'Add Row Below', 'wcvendors-pro' ); ?>">
                            <?php wcvp_get_icon( 'wcv-icon wcv-icon-sm wcv-icon-middle wcv-icon-left', 'wcv-icon-plus-circle' ); ?>
                            <span class="vertical-middle"><?php esc_html_e( 'Add Row Below', 'wcvendors-pro' ); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </td>
</tr>
