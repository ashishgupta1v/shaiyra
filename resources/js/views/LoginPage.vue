<template>
  <div class="min-h-screen flex items-center justify-center p-4 bg-navy text-cream animate-fade-in relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute top-0 right-0 w-[40rem] h-[40rem] rounded-full bg-blush/5 blur-3xl -z-10"></div>
    <div class="absolute bottom-0 left-0 w-[30rem] h-[30rem] rounded-full bg-sage/5 blur-3xl -z-10"></div>

    <div class="relative w-full max-w-md">
      <!-- Logo area -->
      <div class="text-center mb-12" v-reveal="'reveal-up'">
        <div class="w-24 h-24 mx-auto mb-6 flex items-center justify-center">
          <img src="/logo.png" alt="Shaiyra Logo" class="w-full h-full object-contain filter invert opacity-90 drop-shadow-lg" />
        </div>
        <h1 class="font-serif text-4xl mb-2 text-cream">Shaiyra's Journal</h1>
        <p class="text-xs font-bold tracking-widest uppercase text-cream/40">Admin Access</p>
      </div>

      <!-- Login Card -->
      <div v-reveal="'reveal-up'" v-tilt :style="`transition-delay: 0.1s`" class="p-8 border border-white/10 bg-white/5 card-lift backdrop-blur-sm">
        <h2 class="font-serif text-2xl text-cream mb-8">Sign In</h2>
        <form @submit.prevent="handleLogin" class="space-y-6">
          <FloatingInput id="email" type="email" label="Email Address" v-model="email" />
          
          <div class="relative">
            <FloatingInput id="password" :type="showPass ? 'text' : 'password'" label="Password" v-model="password" />
            <button type="button" @click="showPass=!showPass" class="absolute right-4 top-1/2 -translate-y-1/2 p-1 text-cream/40 hover:text-cream/80 transition-colors">
              <span class="material-symbols-outlined text-base">{{ showPass ? 'visibility_off' : 'visibility' }}</span>
            </button>
          </div>

          <!-- Error -->
          <div v-if="error" class="p-4 border border-red-500/20 bg-red-500/10 text-red-400 text-xs font-bold tracking-widest uppercase flex items-center gap-3">
            <span class="material-symbols-outlined text-base">error</span>
            {{ error }}
          </div>

          <button class="transition-transform hover:scale-105 active:scale-95 w-full py-4 bg-gold text-navy text-xs font-black tracking-widest uppercase transition-colors hover:bg-gold/90 disabled:opacity-50 flex items-center justify-center gap-3">
            <span v-if="loading" class="w-4 h-4 border-2 border-navy/30 border-t-navy rounded-full animate-spin"></span>
            {{ loading ? 'Signing in...' : 'Sign In' }}
          </button>
        </form>
      </div>

      <!-- Back link -->
      <div v-reveal="'reveal-up'" :style="`transition-delay: 0.2s`" class="text-center mt-8">
        <RouterLink to="/home" class="text-[10px] font-black tracking-widest uppercase text-cream/40 hover:text-cream transition-colors">
          ← Return to Shaiyra's Journal
        </RouterLink>
      </div>

      <!-- Hint (dev mode) -->
      <div v-reveal="'reveal-up'" :style="`transition-delay: 0.3s`" class="mt-12 p-4 border border-white/5 bg-white/5 text-center">
        <p class="text-[10px] font-bold tracking-widest uppercase text-cream/30">Admin credentials are set at project configuration.</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter, RouterLink } from 'vue-router';
import { useJournalStore } from '@/stores/journal';
import FloatingInput from '@/components/FloatingInput.vue';

const store = useJournalStore();
const router = useRouter();

const email = ref('');
const password = ref('');
const showPass = ref(false);
const loading = ref(false);
const error = ref('');

async function handleLogin() {
  error.value = '';
  loading.value = true;
  await new Promise(r => setTimeout(r, 600));
  const success = store.login(email.value, password.value);
  loading.value = false;
  if (success) {
    const redirect = new URLSearchParams(window.location.search).get('redirect');
    router.push(redirect || '/dashboard');
  } else {
    error.value = 'Incorrect email or password.';
  }
}
</script>
<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
