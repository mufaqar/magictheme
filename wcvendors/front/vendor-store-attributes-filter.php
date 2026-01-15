<?php
/**
 * Store attributes filter block template
 *
 * @since   1.8.7
 * @version 1.8.7
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div class="wcv wcv_block-store-attributes-filter">
    <h2 class="wcv_block-store-attributes-filter__title">
        <?php echo esc_html( $title ); ?>
    </h2>
    <?php
    $filters     = get_query_var( 'filter_attribute' );
    $filters     = explode( ',', $filters );
    $filter_attr = array();
    foreach ( $filters as $filter ) {
        $filter_attr[ $filter ] = explode( ',', get_query_var( 'filter_' . $filter ) );
    }
    foreach ( $attributes as $attribute ) :
        echo '<h3 class="wcv_block-store-attributes-filter__attribute-title">' . esc_html( $attribute['name'] ) . '</h3>';
        $terms = $attribute['terms'];
        foreach ( $terms as $t ) :
        ?>
            <div id="checkbox-container" class="wcv_block-store-attributes-filter__attribute">
                <input
                    type="checkbox"
                    name="<?php echo esc_attr( $attribute['slug'] ); ?>"
                    id="<?php echo esc_attr( $attribute['slug'] . '-' . $t->term_id ); ?>"
                    value="<?php echo esc_attr( $t->term_id ); ?>"
                    class="wcv_block-store-attributes-filter__attribute-checkbox"
                    <?php echo isset( $filter_attr[ $attribute['slug'] ] ) && in_array( $t->term_id, $filter_attr[ $attribute['slug'] ], true ) ? 'checked' : ''; ?>
                />
                <label
                    for="<?php echo esc_attr( $attribute['slug'] . '-' . $t->term_id ); ?>"
                    class="wcv_block-store-attributes-filter__attribute-label"
                >
                    <?php echo esc_html( $t->name ); ?>
                </label>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>
