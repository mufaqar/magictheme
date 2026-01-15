<style>
    .capture_sec {
        padding: 60px 0;
    }

    .capture_title {
        text-align: center;
        font-weight: 700;
        max-width: 1051px;
        margin: 0 auto 40px;
        line-height: 1;
    }

    .mySwiper {
        width: 100%;
        padding: 60px 0;
    }

    .swiper-slide {
        width: fit-content !important;
        height: auto;
    }

    .swiper-slide .slide_inner {
        width: 280px;
        height: 400px;
        border-radius: 20px;
        overflow: hidden;
    }

    .swiper-slide .slide_inner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">


<section class="capture_sec">
    <div class="container">
        <h2 class="capture_title gradient-title">Captured by You, Enhanced by Visual Magic</h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                $images = [
                    "inspiration1.png",
                    "au.png",
                    "inspiration1.png",
                    "au.png",
                    "inspiration1.png",
                    "au.png",
                    "inspiration1.png",
                    "au.png",
                    "inspiration1.png",
                    "au.png",
                    "inspiration1.png",
                    "au.png",
                ];

                foreach ($images as $img) {
                    echo '
                <div class="swiper-slide">
                <div class="slide_inner">
                    <img src="' . get_template_directory_uri() . '/assets/images/' . $img . '" alt="">
                    </div>
                </div>';
                }
                ?>

            </div>
            <!-- ARROWS -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- PAGINATION -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        arrows: true,
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 3,
            slideShadows: false
        },
        loop: true,

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },

        // Pagination
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },

        // Keyboard navigation (optional)
        keyboard: {
            enabled: true
        },
        // Breakpoints - showing 5 slides on large screens
        breakpoints: {
            640: {
                slidesPerView: 2
            },
            768: {
                slidesPerView: 3
            },
            1024: {
                slidesPerView: 4
            },
            1280: {
                slidesPerView: 5
            }
        }
    });


</script>