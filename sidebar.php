<aside id="secondary" class="widget-area">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php else : ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sidebar</h5>
                <p>Add widgets in the admin to populate this area.</p>
            </div>
        </div>
    <?php endif; ?>
</aside>
