<template>
  <div :class="darkMode ? 'dark' : ''" class="scroll-smooth min-h-screen font-sans bg-cream text-navy transition-colors duration-300">
    <NavBar :darkMode="darkMode" @toggle-dark-mode="darkMode = !darkMode" />
    
    <main class="pt-16 min-h-screen">
      <!-- Use transition for router view -->
      <router-view v-slot="{ Component }">
        <transition name="fade" mode="out-in">
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
import { ref, provide, onMounted } from 'vue';
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

// Provide notification method globally
provide('showNotification', showNotification);
provide('darkMode', darkMode);

onMounted(() => {
  // Read dark mode from local storage or system preference if desired
  const isDark = localStorage.getItem('darkMode') === 'true';
  darkMode.value = isDark;
});
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease, transform 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateY(10px);
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
