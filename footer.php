</div><!-- .container -->
<footer class="vm-footer mt-5">
    <!-- Top CTA Banner -->
    <div class="vm-footer-cta text-center text-md-start">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center py-4">
            <div>
                <p class="fw-bold mb-1">Become a Member</p>
                <h2 class="m-0">Get 25% off your first order</h2>
            </div>
            <a href="#" class="btn vm-hero-btn mt-3 px-4 py-3">
                Sign Up
            </a>
        </div>
    </div>

    <!-- Main Footer Area -->
    <div class="vm-footer-main py-5">
        <div class="container">
            <div class="row g-4">

                <!-- Logo -->
                <div class="col-md-3 text-center text-md-start">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_footer.png" alt="Logo"
                        class="mb-2" width="200" />

                </div>

                <!-- Column 1 -->
                <div class="col-md-2">
                      <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_nav1', 
                        'menu_class'     => 'list-unstyled',
                        'container'      => false,    
                        'fallback_cb'    => false,   
                    ) );
                    ?>
                </div>

                <!-- Column 2 -->
                <div class="col-md-2">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_nav2', 
                        'menu_class'     => 'list-unstyled',
                        'container'      => false,    
                        'fallback_cb'    => false,   
                    ) );
                    ?>
                </div>

                <!-- Column 3 -->
                <div class="col-md-2">
                      <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_nav3', 
                        'menu_class'     => 'list-unstyled',
                        'container'      => false,    
                        'fallback_cb'    => false,   
                    ) );
                    ?>
                </div>
                <!-- Column 4 -->
                <div class="mt-4 col-md-3 flex-end">
                    <h6 class="fw-bold mb-2">Follow Us</h6>

                    <div class="d-flex gap-3">
                        <a href="#"><i class="fab fa-amazon"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>

                    <div class="small ">
                        Made With <span style="color:#ff5e8e;">❤</span> by ei1 @ 2025
                    </div>
                </div>

            </div>

            <!-- Bottom Bar -->

        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>