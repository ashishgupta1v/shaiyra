<template>
  <header
    :class="['fixed top-0 left-0 right-0 z-40 glass border-b border-sage/10 transition-shadow', scrolled ? 'shadow-sm' : '']">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
      <!-- Logo -->
      <RouterLink to="/home" class="flex items-center gap-3 group">
        <div
          class="w-8 h-8 flex items-center justify-center group-hover:bg-navy-light transition-colors">
          <img src="/images/shaiyra-logo.png" alt="Shaiyra Logo" class="w-full h-full object-contain filter" />
        </div>
        <span class="font-serif text-xl text-navy font-semibold hidden sm:block">Shaiyra Gupta</span>
        <span class="font-serif text-xl text-navy font-semibold sm:hidden">Shaiyra</span>
      </RouterLink>

      <!-- Desktop Nav -->
      <nav class="hidden md:flex items-center gap-1">
        <RouterLink v-for="item in navItems" :key="item.path" :to="item.path"
          class="px-4 py-1 font-serif text-sm italic transition-all text-sage hover:text-navy"
          active-class="!text-navy border-b-2 border-navy font-semibold">
          {{ item.label }}
        </RouterLink>
      </nav>

      <!-- Right Actions -->
      <div class="flex items-center gap-3">
        <!-- Admin indicator -->
        <div v-if="store.isAdmin" class="hidden sm:flex items-center gap-1.5 bg-sage/10 px-3 py-1 rounded-full">
          <span class="material-symbols-outlined text-sage text-xs" style="font-variation-settings:'FILL' 1">admin_panel_settings</span>
          <span class="text-xs font-bold text-sage uppercase tracking-wider">Admin</span>
        </div>
        
        <!-- Dark mode -->
        <button @click="$emit('toggle-dark-mode')" class="w-9 h-9 rounded-full hover:bg-sage/10 flex items-center justify-center transition-colors text-sage">
          <span class="material-symbols-outlined text-lg">{{ darkMode ? 'light_mode' : 'dark_mode' }}</span>
        </button>

        <!-- Auth -->
        <template v-if="!store.isAdmin">
          <RouterLink to="/auth/login" class="hidden sm:flex items-center gap-2 border border-sage/30 px-4 py-1.5 text-xs font-bold tracking-wider text-sage uppercase hover:bg-sage hover:text-cream transition-all">
            <span class="material-symbols-outlined text-sm">lock</span> ADMIN
          </RouterLink>
        </template>
        <template v-else>
          <button @click="store.logout()" class="hidden sm:flex items-center gap-2 text-xs font-bold tracking-wider text-sage uppercase hover:text-navy transition-colors" title="Logout">
            <span class="material-symbols-outlined text-sm">logout</span>
          </button>
        </template>
        
        <!-- Mobile menu -->
        <button @click="mobileMenu = !mobileMenu" class="md:hidden w-9 h-9 rounded-full hover:bg-sage/10 flex items-center justify-center text-navy">
          <span class="material-symbols-outlined">{{ mobileMenu ? 'close' : 'menu' }}</span>
        </button>
      </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <Transition name="slide-down">
      <div v-if="mobileMenu" class="md:hidden glass border-t border-sage/10 px-6 pb-4">
        <RouterLink v-for="item in navItems" :key="item.path + '-mob'" :to="item.path"
          @click="mobileMenu = false"
          class="flex items-center gap-3 w-full py-3 font-serif text-sm italic border-b border-sage/10 last:border-0 text-sage"
          active-class="!text-navy font-semibold">
          <span class="material-symbols-outlined text-base">{{ item.icon }}</span>
          {{ item.label }}
        </RouterLink>
      </div>
    </Transition>
  </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { RouterLink } from 'vue-router';
import { useJournalStore } from '@/stores/journal';

defineProps({
  darkMode: {
    type: Boolean,
    default: false
  }
});
defineEmits(['toggle-dark-mode']);

const store = useJournalStore();
const scrolled = ref(false);
const mobileMenu = ref(false);

const navItems = [
  { path: '/home',           label: 'Home',      icon: 'home' },
  { path: '/life-feed',      label: 'Journal',   icon: 'book' },
  { path: '/milestones',     label: 'Milestones',icon: 'star' },
  { path: '/growth-tracker', label: 'Growth',    icon: 'monitoring' },
  { path: '/family-tree',    label: 'Family',    icon: 'family_history' },
  { path: '/family-portal',  label: 'Guestbook', icon: 'comment' },
];

function handleScroll() {
  scrolled.value = window.scrollY > 20;
}

onMounted(() => window.addEventListener('scroll', handleScroll, { passive: true }));
onUnmounted(() => window.removeEventListener('scroll', handleScroll));
</script>

<style scoped>
.slide-down-enter-active, .slide-down-leave-active { transition: all 0.3s ease; }
.slide-down-enter-from, .slide-down-leave-to { opacity: 0; transform: translateY(-10px); }
</style>
