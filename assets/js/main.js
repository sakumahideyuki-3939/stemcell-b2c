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

  /* ── Mobile Drawer ── */
  var burger = document.querySelector('.algo-header__burger');
  var drawer = document.querySelector('.algo-drawer');
  var drawerClose = document.querySelector('.algo-drawer__close');

  if (burger && drawer) {
    function openDrawer() {
      drawer.classList.add('is-open');
      drawer.setAttribute('aria-hidden', 'false');
      burger.setAttribute('aria-expanded', 'true');
      document.body.classList.add('drawer-open');
    }
    function closeDrawer() {
      drawer.classList.remove('is-open');
      drawer.setAttribute('aria-hidden', 'true');
      burger.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('drawer-open');
    }
    burger.addEventListener('click', openDrawer);
    if (drawerClose) { drawerClose.addEventListener('click', closeDrawer); }
    drawer.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeDrawer);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
        closeDrawer();
      }
    });
  }
})();
