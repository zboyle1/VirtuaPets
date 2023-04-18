const floatingImage = document.querySelector('.floating-image');

// define the animation properties
const animation = anime({
  targets: floatingImage,
  translateX: anime.random(-200, 200) + 'vw',
  translateY: anime.random(-200, 200) + 'vh',
  scale: anime.random(0.5, 1.5),
  rotate: anime.random(-90, 90),
  duration: anime.random(1000, 3000),
  easing: 'easeInOutQuad',
  loop: true,
  direction: 'alternate'
});