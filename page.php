<?php get_header(); ?>
<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="row">
        <div class="col-12">
            <h1 class="mb-3"><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </div>
    </div>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>