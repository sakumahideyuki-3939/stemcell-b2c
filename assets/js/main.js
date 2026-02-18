/* main.js — Hero Slider + Scroll Reveal */
(function () {
  'use strict';

  /* ── Hero Slider ── */
  var track = document.querySelector('.hero-slider__track');
  if (track) {
    var slides = track.querySelectorAll('.hero-slider__slide');
    var dots = document.querySelectorAll('.hero-slider__dot');
    var current = 0;
    var autoplayId = null;
    var INTERVAL = 5000;

    function goTo(index) {
      slides[current].classList.remove('is-active');
      dots[current].classList.remove('is-active');
      current = (index % slides.length + slides.length) % slides.length;
      slides[current].classList.add('is-active');
      dots[current].classList.add('is-active');
    }

    function next() { goTo(current + 1); }

    function startAutoplay() {
      stopAutoplay();
      autoplayId = setInterval(next, INTERVAL);
    }

    function stopAutoplay() {
      if (autoplayId) { clearInterval(autoplayId); autoplayId = null; }
    }

    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        goTo(parseInt(this.dataset.slide, 10));
        startAutoplay();
      });
    });

    /* Touch / swipe */
    var touchStartX = 0;
    track.addEventListener('touchstart', function (e) {
      touchStartX = e.changedTouches[0].screenX;
      stopAutoplay();
    }, { passive: true });

    track.addEventListener('touchend', function (e) {
      var diff = touchStartX - e.changedTouches[0].screenX;
      if (Math.abs(diff) > 50) {
        goTo(diff > 0 ? current + 1 : current - 1);
      }
      startAutoplay();
    }, { passive: true });

    startAutoplay();
  }

  /* ── Scroll Reveal ── */
  var reveals = document.querySelectorAll('.reveal');
  if (reveals.length && 'IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });
    reveals.forEach(function (el) { observer.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('is-visible'); });
  }
})();
