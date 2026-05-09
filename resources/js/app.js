import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import router from './router';
import App from './App.vue';

const app = createApp(App);
const pinia = createPinia();

import Lenis from '@studio-freight/lenis';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Initialize Lenis Smooth Scroll
const lenis = new Lenis({
  duration: 1.2,
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
  smooth: true,
  smoothTouch: false,
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

// Integrate GSAP with Lenis
lenis.on('scroll', ScrollTrigger.update);
gsap.ticker.add((time)=>{
  lenis.raf(time * 1000);
});
gsap.ticker.lagSmoothing(0);

// GSAP-powered Scroll Reveals
app.directive('reveal', {
  mounted(el, binding) {
    const isUp = binding.value === 'reveal-up' || !binding.value;
    const isLeft = binding.value === 'reveal-left';
    const isRight = binding.value === 'reveal-right';
    const isScale = binding.value === 'reveal-scale';

    gsap.set(el, { 
      autoAlpha: 0, 
      y: isUp ? 50 : 0, 
      x: isLeft ? 50 : isRight ? -50 : 0, 
      scale: isScale ? 0.9 : 1 
    });

    ScrollTrigger.create({
      trigger: el,
      start: "top 85%",
      onEnter: () => {
        gsap.to(el, {
          duration: 1.2,
          autoAlpha: 1,
          y: 0,
          x: 0,
          scale: 1,
          ease: "expo.out",
          overwrite: "auto"
        });
      },
      once: true
    });
  }
});

// 3D Tilt Directive for interactive cards
app.directive('tilt', {
  mounted(el) {
    el.style.transition = 'transform 0.1s ease-out';
    el.style.transformStyle = 'preserve-3d';

    el._tiltMove = (e) => {
      // Don't apply on touch devices
      if (window.matchMedia('(hover: none) and (pointer: coarse)').matches) return;
      
      const rect = el.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      
      // Limit rotation to 5 degrees for a subtle, premium feel
      const rotateX = ((y - centerY) / centerY) * -5;
      const rotateY = ((x - centerX) / centerX) * 5;

      el.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
    };

    el._tiltLeave = () => {
      el.style.transition = 'transform 0.5s cubic-bezier(0.25, 1, 0.5, 1)';
      el.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
      setTimeout(() => {
        el.style.transition = 'transform 0.1s ease-out';
      }, 500);
    };

    el.addEventListener('mousemove', el._tiltMove);
    el.addEventListener('mouseleave', el._tiltLeave);
  },
  unmounted(el) {
    el.removeEventListener('mousemove', el._tiltMove);
    el.removeEventListener('mouseleave', el._tiltLeave);
  }
});

app.use(pinia);
app.use(router);
app.mount('#app');
