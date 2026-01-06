<?php get_header(); ?>
<div class="container my-5">
    <div class="row ">
        <div class="vendor_grid">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>
                <div class="card-body">
                    <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Gallery</a>
                </div>
            </article>
            <?php endwhile; ?>
            <nav class="my-4">
                <?php the_posts_pagination(); ?>
            </nav>
            <?php else : ?>
            <p><?php esc_html_e('No posts found.', 'my-bootstrap-theme'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>