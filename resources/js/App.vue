<template>
  <div :class="darkMode ? 'dark' : ''" class="scroll-smooth min-h-screen font-sans bg-cream text-navy transition-colors duration-500">
    <!-- Custom Cursor -->
    <template v-if="!isTouchDevice">
      <div class="custom-cursor hidden md:block" :class="{ 'hovered': isHovering }" :style="{ left: mouseX + 'px', top: mouseY + 'px' }"></div>
      <div class="custom-cursor-ring hidden md:block" :class="{ 'hovered': isHovering }" :style="{ left: mouseX + 'px', top: mouseY + 'px' }"></div>
    </template>

    <NavBar :darkMode="darkMode" @toggle-dark-mode="darkMode = !darkMode" />
    
    <main class="pt-16 min-h-screen">
      <!-- Use cinematic transition for router view -->
      <router-view v-slot="{ Component }">
        <transition name="page-slide" mode="out-in">
          <component :is="Component" />
        </transition>
      </router-view>
    </main>

    <!-- Notification Toast -->
    <transition name="toast">
      <div v-if="notification.show" class="fixed top-6 right-6 z-[200] notif">
        <div :class="notification.type === 'success' ? 'bg-sage text-white' : notification.type === 'error' ? 'bg-red-600 text-white' : 'bg-navy text-white'" class="flex items-center gap-3 px-5 py-3 shadow-2xl rounded-sm">
          <span class="material-symbols-outlined text-sm">{{ notification.type === 'success' ? 'check_circle' : notification.type === 'error' ? 'error' : 'info' }}</span>
          <span class="text-sm font-semibold">{{ notification.message }}</span>
        </div>
      </div>
    </transition>
  </div>
</template>

<script setup>
import { ref, provide, onMounted, onUnmounted } from 'vue';
import NavBar from '@/components/NavBar.vue';

const darkMode = ref(false);

const notification = ref({
  show: false,
  message: '',
  type: 'info'
});

const showNotification = (message, type = 'info') => {
  notification.value = { show: true, message, type };
  setTimeout(() => {
    notification.value.show = false;
  }, 3000);
};

// Custom Cursor Logic
const mouseX = ref(-100);
const mouseY = ref(-100);
const isHovering = ref(false);
const isTouchDevice = ref(false);

const updateCursor = (e) => {
  if (isTouchDevice.value) return;
  mouseX.value = e.clientX;
  mouseY.value = e.clientY;
};

const checkHover = (e) => {
  if (isTouchDevice.value) return;
  // Check if hovering over links, buttons, or inputs
  const target = e.target.closest('a, button, input, textarea, select, .cursor-pointer, .card-lift');
  isHovering.value = !!target;
};

// Provide notification method globally
provide('showNotification', showNotification);
provide('darkMode', darkMode);

const handleTouch = () => {
  isTouchDevice.value = true;
  window.removeEventListener('touchstart', handleTouch);
};

onMounted(() => {
  // Read dark mode from local storage or system preference if desired
  const isDark = localStorage.getItem('darkMode') === 'true';
  darkMode.value = isDark;

  // Global mouse events for cursor
  window.addEventListener('touchstart', handleTouch, { passive: true });
  window.addEventListener('mousemove', updateCursor);
  window.addEventListener('mouseover', checkHover);
});

onUnmounted(() => {
  window.removeEventListener('touchstart', handleTouch);
  window.removeEventListener('mousemove', updateCursor);
  window.removeEventListener('mouseover', checkHover);
});
</script>

<style>
/* Cinematic Page Slide Transition */
.page-slide-enter-active,
.page-slide-leave-active {
  transition: opacity 0.5s cubic-bezier(0.65, 0, 0.35, 1), transform 0.5s cubic-bezier(0.65, 0, 0.35, 1);
}
.page-slide-enter-from {
  opacity: 0;
  transform: translateY(20px) scale(0.98);
}
.page-slide-leave-to {
  opacity: 0;
  transform: translateY(-20px) scale(1.02);
}

.toast-enter-active {
  transition: all 0.3s ease-out;
}
.toast-leave-active {
  transition: all 0.2s ease-in;
}
.toast-enter-from {
  opacity: 0;
  transform: translateY(-20px);
}
.toast-leave-to {
  opacity: 0;
  transform: translateY(-20px);
}
</style>
