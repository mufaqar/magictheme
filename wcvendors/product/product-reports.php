<?php
/**
 * Output the report product button and popup
 */

?>

<?php
$button_class   = ( 'link' === $display_style ) ? 'wcv-product-reports-link' : 'wcv-button wcv-product-reports-button';
$button_content = wcvp_get_icon( 'wcv-icon wcv-icon-18 wcv-icon-left wcv-icon-middle', 'wcv-icon-report', false ) . esc_html( $button_label );
?>
<div class="wcv-product-reports-button-container" style="margin-top: 10px;">
    <?php if ( 'link' === $display_style ) : ?>
        <a href="#" class="<?php echo esc_attr( $button_class ); ?>" id="open-wcv-product-reports-modal" data-toggle="modal" data-target="#wcv-product-reports-modal">
            <?php echo $button_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </a>
    <?php else : ?>
        <button type="button" class="<?php echo esc_attr( $button_class ); ?>" id="open-wcv-product-reports-modal" data-toggle="modal" data-target="#wcv-product-reports-modal">
            <?php echo $button_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </button>
    <?php endif; ?>
</div>
<?php if ( $is_logged_in ) : ?>
    <div class="wcv-shade wcv-fade" id="wcv-product-reports-modal" tabindex="-1" data-trigger="#open-wcv-product-reports-modal" role="dialog" aria-labelledby="wcv-product-reports-modal-label" aria-hidden="true">
        <div class="wcv-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="wcv-product-reports-modal-label"><?php echo esc_html( $popup_title ); ?></h4>
                        <button type="button" class="close" id="close-wcv-product-reports-modal" data-target="#wcv-product-reports-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="wcv-product-reports-form" class="wcv-form" method="POST">
                            <?php do_action( 'wcvendors_product_reports_form_start' ); ?>

                            <?php do_action( 'wcvendors_product_reports_before_reason_field' ); ?>
                                <?php WCVendors_Pro_Product_Reports_Form::report_reason_field( $select_reason_label, $select_reason_placeholder ); ?>
                            <?php do_action( 'wcvendors_product_reports_after_reason_field' ); ?>

                            <?php do_action( 'wcvendors_product_reports_before_description_field' ); ?>
                                <?php WCVendors_Pro_Product_Reports_Form::report_description_input_field( $description_input_label, $description_input_placeholder ); ?>
                            <?php do_action( 'wcvendors_product_reports_after_description_field' ); ?>

                            <?php
                                WCVendors_Pro_Product_Reports_Form::product_reports_nonce_field();
                            ?>

                            <?php do_action( 'wcvendors_product_reports_before_submit_button' ); ?>
                                <?php WCVendors_Pro_Product_Reports_Form::product_reports_submit_button(); ?>
                            <?php do_action( 'wcvendors_product_reports_after_submit_button' ); ?>

                            <?php do_action( 'wcvendors_product_reports_form_end' ); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div id="wcv-product-reports-modal" tabindex="-1" role="dialog" aria-labelledby="wcv-product-reports-modal-label" aria-hidden="true">
        <div id="wcv-product-reports-modal-content">
            <div id="wcv-product-reports-modal-content-header">
                <h3 class="wcv-product-reports-modal-title"><?php echo esc_html( $popup_title ); ?></h3>
                <button type="button" class="close" id="close-wcv-product-reports-modal" aria-hidden="true">&times;</button>
            </div>
            <div id="wcv-product-reports-modal-content-body">
            <p><?php echo esc_html( __( 'To submit a report, you must be a customer who has already purchased this product and log in to your account to report.', 'wcvendors-pro' ) ); ?></p>
            <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button button-primary"><?php echo esc_html( __( 'Login', 'wcvendors-pro' ) ); ?></a>
            </div>
        </div>
    </div>
    <style>
        #wcv-product-reports-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999;
            background-color: rgba(0, 0, 0, 0.6);
        }
        #wcv-product-reports-modal.visible {
            display: block;
        }
        #wcv-product-reports-modal-content {
            text-align: center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 500px;
            height: auto;
            max-height: 300px;
            z-index: 99999;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
        }
        #close-wcv-product-reports-modal {
            background: none;
            border: none;
            font-size: 24px;
            line-height: 1;
            color: #999;
            cursor: pointer;
            padding: 0;
        }

        #wcv-product-reports-modal-content-header .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            line-height: 1;
            color: #999;
            cursor: pointer;
            padding: 0;
        }
        #wcv-product-reports-modal-content-header .close:hover {
            color: #666;
            text-decoration: none;
        }
        #wcv-product-reports-modal-content-body {
            text-align: center;
            margin-bottom: 20px;
        }
        #wcv-product-reports-modal-content-header .wcv-product-reports-modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }
    </style>
    <script>
        jQuery(document).ready(function($) {
            $('#open-wcv-product-reports-modal').on('click', function(e) {
                e.preventDefault();
                $('#wcv-product-reports-modal').addClass('visible');
            });
            $('#close-wcv-product-reports-modal').on('click', function(e) {
                e.preventDefault();
                $('#wcv-product-reports-modal').removeClass('visible');
            });
        });

    </script>
<?php endif; ?>
