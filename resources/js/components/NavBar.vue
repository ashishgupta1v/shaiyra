<template>
  <header
    :class="[
      'fixed top-0 left-0 right-0 z-40 transition-all duration-300',
      scrolled ? 'glass border-b border-sage/10 shadow-sm' : 'bg-transparent'
    ]">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
      <!-- Logo -->
      <RouterLink to="/home" class="flex items-center gap-3 group">
        <div class="w-8 h-8 flex items-center justify-center transition-colors group-hover:bg-navy-light/10">
          <img src="/logo.png" alt="Shaiyra Logo" class="w-full h-full object-contain filter" />
        </div>
        <span class="font-serif text-xl font-semibold hidden sm:block transition-colors text-navy">Shaiyra Gupta</span>
        <span class="font-serif text-xl font-semibold sm:hidden transition-colors text-navy">Shaiyra</span>
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
        <div v-if="store.isAdmin" class="hidden sm:flex items-center gap-1.5 px-3 py-1 rounded-full bg-sage/10">
          <ShieldCheck class="w-3.5 h-3.5 text-sage" />
          <span class="text-xs font-bold uppercase tracking-wider text-sage">Admin</span>
        </div>
        
        <!-- Auth -->
        <template v-if="!store.isAdmin">
          <RouterLink to="/auth/login" class="hidden sm:flex items-center gap-2 border px-4 py-1.5 text-xs font-bold tracking-wider uppercase transition-all border-sage/30 text-sage hover:bg-sage hover:text-cream transition-transform hover:scale-105 active:scale-95">
            <Lock class="w-3.5 h-3.5" /> ADMIN
          </RouterLink>
        </template>
        <template v-else>
          <button @click="store.logout()" class="hidden sm:flex items-center gap-2 text-xs font-bold tracking-wider uppercase transition-colors text-sage hover:text-navy transition-transform hover:scale-105 active:scale-95" title="Logout">
            <LogOut class="w-4 h-4" />
          </button>
        </template>
        
        <!-- Mobile menu -->
        <button @click="mobileMenu = !mobileMenu" class="md:hidden w-9 h-9 rounded-full flex items-center justify-center transition-colors hover:bg-sage/10 text-navy transition-transform hover:scale-105 active:scale-95">
          <X v-if="mobileMenu" class="w-5 h-5" />
          <Menu v-else class="w-5 h-5" />
        </button>
      </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <Transition name="slide-down">
      <div v-if="mobileMenu" class="md:hidden border-t px-6 pb-4 glass border-sage/10">
        <RouterLink v-for="item in navItems" :key="item.path + '-mob'" :to="item.path"
          @click="mobileMenu = false"
          class="flex items-center gap-3 w-full py-3 font-serif text-sm italic border-b last:border-0 text-sage border-sage/10 hover:bg-sage/5 transition-colors"
          active-class="!text-navy font-semibold">
          <component :is="item.icon" class="w-4 h-4" />
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
import { ShieldCheck, Lock, LogOut, Menu, X, Home, Book, Star, Activity, Users, MessageSquare } from 'lucide-vue-next';

const store = useJournalStore();
const scrolled = ref(false);
const mobileMenu = ref(false);

const navItems = [
  { path: '/home',           label: 'Home',      icon: Home },
  { path: '/life-feed',      label: 'Journal',   icon: Book },
  { path: '/milestones',     label: 'Milestones',icon: Star },
  { path: '/growth-tracker', label: 'Growth',    icon: Activity },
  { path: '/family-tree',    label: 'Family',    icon: Users },
  { path: '/family-portal',  label: 'Guestbook', icon: MessageSquare },
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
