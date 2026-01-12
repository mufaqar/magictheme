<?php
// Get passed title or fallback to post/page title
$breadcrumb_title = ! empty( $args['title'] ) ? $args['title'] : get_the_title();
?>

<section class="breadcrumb-wrapper" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/breadcrumb-bg.png');">
    <div class="container text-center">
        <h1><?php echo esc_html( $breadcrumb_title ); ?></h1>

        <p>
            <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
            / <?php echo esc_html( $breadcrumb_title ); ?>
        </p>
    </div>
</section>
