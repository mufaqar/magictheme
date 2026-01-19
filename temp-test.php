<?php
/* Template Name: Ultimate 3D Slider */
get_header(); 
?>

<style>
#carousel3D {
  width: 90%;
  max-width: 1000px;
  height: 450px;
  perspective: 1200px; /* 3D depth */
  margin: 100px auto;
  position: relative;
  user-select: none;
}

#carousel3D .carousel-inner {
  width: 100%;
  height: 100%;
  position: relative;
  transform-style: preserve-3d;
}

#carousel3D .carousel-item {
  position: absolute;
  top: 50%;
  left: 50%;
  transform-style: preserve-3d;
  transform-origin: center center;
  transition: transform 0.5s ease, opacity 0.5s ease;
}

#carousel3D img {
  width: 250px;
  height: 250px;
  object-fit: cover;
  border-radius: 15px;
  box-shadow: 0 15px 30px rgba(0,0,0,0.5);
  cursor: grab;
  transition: transform 0.5s ease, opacity 0.5s ease;
}

#carousel3D img:active {
  cursor: grabbing;
}

/* Optional: highlight center image with a subtle scale */
#carousel3D .carousel-item.center img {
  transform: scale(1.1);
}
</style>

<div id="carousel3D" class="carousel slide">
  <div class="carousel-inner">
    <?php
    $images = [
      'category1.png',
      'category2.png',
      'category3.png',
      'category4.png',
      'category5.png'
    ];
    foreach ($images as $img) {
      echo '<div class="carousel-item">';
      echo '<img src="' . get_template_directory_uri() . '/assets/images/' . $img . '" alt="Image">';
      echo '</div>';
    }
    ?>
  </div>
</div>

<script>
const carouselItems = document.querySelectorAll('#carousel3D .carousel-item');
const itemCount = carouselItems.length;
const angle = 360 / itemCount;
let rotation = 0;
let isDragging = false;
let startX;
let velocity = 0;
let lastTime;

// Update positions with Framer-style 3D transform
function updateCarousel() {
  carouselItems.forEach((item, index) => {
    const itemAngle = angle * index + rotation;
    const rad = itemAngle * Math.PI / 180;
    const radius = 400;

    const x = Math.sin(rad) * radius;
    const z = Math.cos(rad) * radius;

    // Scale and opacity based on Z (front/back)
    const scale = 0.7 + (z/radius)*0.3; 
    const opacity = 0.3 + (z/radius)*0.7; 
    const zIndex = Math.round(z);

    item.classList.toggle('center', z > 0.9 * radius); // highlight center image

    item.style.willChange = "transform, opacity";
    item.style.opacity = opacity;
    item.style.transform = `perspective(1200px) rotateY(${itemAngle}deg) translateX(${x}px) translateZ(${z}px) scale(${scale})`;
    item.style.zIndex = zIndex;
  });
}

updateCarousel();

// Auto-rotation
let lastFrameTime;
function animate(time) {
  if(!lastFrameTime) lastFrameTime = time;
  const delta = time - lastFrameTime;
  if(!isDragging) rotation += delta * 0.02 + velocity; // rotation + momentum
  velocity *= 0.95; // gradual slowdown
  updateCarousel();
  lastFrameTime = time;
  requestAnimationFrame(animate);
}
requestAnimationFrame(animate);

// Drag functionality
const carouselInner = document.querySelector('#carousel3D .carousel-inner');

carouselInner.addEventListener('mousedown', (e) => {
  isDragging = true;
  startX = e.clientX;
  velocity = 0;
  carouselInner.style.cursor = 'grabbing';
});

carouselInner.addEventListener('mousemove', (e) => {
  if(isDragging) {
    const dx = e.clientX - startX;
    rotation += dx * 0.5;
    velocity = dx * 0.05;
    updateCarousel();
    startX = e.clientX;
  }
});

carouselInner.addEventListener('mouseup', () => { isDragging = false; });
carouselInner.addEventListener('mouseleave', () => { isDragging = false; });

// Touch support
carouselInner.addEventListener('touchstart', (e) => {
  isDragging = true;
  startX = e.touches[0].clientX;
  velocity = 0;
});

carouselInner.addEventListener('touchmove', (e) => {
  if(isDragging) {
    const dx = e.touches[0].clientX - startX;
    rotation += dx * 0.5;
    velocity = dx * 0.05;
    updateCarousel();
    startX = e.touches[0].clientX;
  }
});

carouselInner.addEventListener('touchend', () => { isDragging = false; });
</script>
