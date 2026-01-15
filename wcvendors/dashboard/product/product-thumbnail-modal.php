<div class="wcv-shade wcv-fade" aria-hidden="true">
    <div class="wcv-modal wcv-fade" id="wcv-product-thumbnail-popup" data-trigger="#open-product-thumb-modal" role="dialog" aria-hidden="true">
        <div class="modal-header">
            <h4 class="modal-title" id="wcv-product-thumbnail-popup-label"></h4>
            <button type="button" class="modal-close wcv-dismiss" data-dismiss="modal" aria-hidden="true">
                <?php wcvp_get_icon( 'wcv-icon wcv-icon-sm', 'wcv-icon-times' ); ?>
                <span class="sr-only"><?php esc_html_e( 'Close', 'wcvendors-pro' ); ?></span>
            </button>
        </div>
        <div class="modal-body" id="wcv-product-thumbnail-popup-image-container">
            <img class="wp-post-image" src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php esc_attr_e( 'Product Thumbnail', 'wcvendors-pro' ); ?>" id="wcv-product-thumbnail-popup-image">
        </div>
        <div class="modal-footer">
            <div class="wcv-cols-group wcv-horizontal-gutters">
                <div class="all-100 wcv-button-group">
                    <button type="button" class="button" id="wcv-zoom-out">
                        <span><?php esc_html_e( 'Zoom Out', 'wcvendors-pro' ); ?></span>
                    </button>
                    <button type="button" class="button" id="wcv-zoom-reset">
                        <span><?php esc_html_e( 'Reset', 'wcvendors-pro' ); ?></span>
                    </button>
                    <button type="button" class="button" id="wcv-zoom-in">
                        <span><?php esc_html_e( 'Zoom In', 'wcvendors-pro' ); ?></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
