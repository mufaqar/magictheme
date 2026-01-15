<?php
/**
 * Store Ratings Fiter block template
 *
 * @since 1.8.7
 * @version 1.8.7
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$ratingsCount = array();
$ratingsSum   = array();
?>
<div class="wcv wcv_block-store-ratings-filter">
    <h2 class="wcv_block-store-ratings-filter__title"><?php echo esc_html( $title ); ?></h2>
    <?php
    $ratingsCount = array();
    $ratingsSum   = array();

    foreach ( $ratings as $item ) {
        $rating = intval( $item->meta_value );

        if ( ! isset( $ratingsCount[ $rating ] ) ) {
            $ratingsCount[ $rating ] = 0;
            $ratingsSum[ $rating ]   = 0;
        }
        ++$ratingsCount[ $rating ];

        $ratingsSum[ $rating ] += $rating;
    }

    $averages = array();
    foreach ( $ratingsCount as $rating => $count ) {
        $average             = $ratingsSum[ $rating ] / $count;
        $averages[ $rating ] = $average;
    }

    asort( $averages );
    if ( $show_as_dropdown ) :
?>
<select class="wcv_block-store-ratings-filter__select"> 
    <option value=""><?php esc_html_e( 'Filter by rating', 'wcvendors-pro' ); ?></option>
    <?php
    foreach ( $averages as $rating => $average ) :
        $rating = intval( $rating );
        ?>
        <option value="<?php echo esc_attr( $rating ); ?>" <?php selected( $rating, get_query_var( 'rating_filter', '' ) ); ?> >
            <?php echo esc_html( $rating ); ?> <?php esc_html_e( 'star', 'wcvendors-pro' ); ?><?php echo esc_html( $rating > 1 ? 's' : '' ); ?>
            <?php if ( $show_count ) : ?>
                (<?php echo esc_html( $ratingsCount[ $rating ] ); ?>)
            <?php endif; ?>
        </option>
    <?php endforeach; ?>
</select>
<?php else : ?>
    <ul class="wcv_block-store-ratings-filter__list">
        <?php
        foreach ( $averages as $rating => $average ) :
            $rating = intval( $rating );
            ?>
            <li class="wcv_block-store-ratings-filter__item">
                <a href="<?php echo esc_url( add_query_arg( array( 'rating_filter' => $rating ) ) ); ?>" class="wcv_block-store-ratings-filter__link" data-rating="<?php echo esc_attr( $rating ); ?>">
                    <?php
                    for ( $i = 1; $i <= $rating; $i++ ) :
                        ?>
                        <svg class="wcv-icon wcv-icon-sm">
                            <use xlink:href="<?php echo esc_url( WCV_PRO_PUBLIC_ASSETS_URL . 'svg/wcv-icons.svg#wcv-icon-star' ); ?>"></use>
                        </svg>
                    <?php endfor; ?>
                    <?php
                    for ( $i = $rating; $i < 5; $i++ ) :
                        ?>
                        <svg class="wcv-icon wcv-icon-sm">
                            <use xlink:href="<?php echo esc_url( WCV_PRO_PUBLIC_ASSETS_URL . 'svg/wcv-icons.svg#wcv-icon-star-o' ); ?>"></use>
                        </svg>
                    <?php endfor; ?>
                    <?php if ( $show_count ) : ?>
                        (<?php echo esc_html( $ratingsCount[ $rating ] ); ?>)
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<p>
    <a href="<?php echo esc_url( remove_query_arg( 'rating_filter' ) ); ?>" class="wcv_block-store-ratings-filter__reset"><?php esc_html_e( 'Reset', 'wcvendors-pro' ); ?></a>
</p>
</div>
<script>
    (function ($) {
        $(document).ready(function () {
            $('.wcv_block-store-ratings-filter__select').on('change', function () {
                var rating = $(this).val();
                if (rating) {
                    window.location.href = '<?php echo esc_url( add_query_arg( array( 'rating_filter' => '' ) ) ); ?>' + `=${rating}`;
                }
            });
        });
    })(jQuery);
</script>
