<template>
  <div class="min-h-screen flex items-center justify-center p-4" style="background-color:#031632; font-family:'Manrope',sans-serif;">
    <!-- Background decoration -->
    <div class="absolute top-0 right-0 w-96 h-96 rounded-full opacity-5" style="background:radial-gradient(circle,#dcc0c0,transparent);"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full opacity-5" style="background:radial-gradient(circle,#566252,transparent);"></div>

    <div class="relative w-full max-w-md">
      <!-- Logo area -->
      <div class="text-center mb-10">
        <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center font-serif text-3xl border-2" style="background-color:#dcc0c020; border-color:#dcc0c050; color:#dcc0c0;">
          S
        </div>
        <h1 class="font-serif text-3xl mb-1" style="color:#fcf9f5;">Shaiyra's Journal</h1>
        <p class="text-sm" style="color:#ffffff40;">Admin access — family administrators only</p>
      </div>

      <!-- Login Card -->
      <div class="p-8 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
        <h2 class="font-serif text-xl mb-6" style="color:#fcf9f5;">Sign In</h2>
        <form @submit.prevent="handleLogin" class="space-y-4">
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#ffffff60;">Email</label>
            <input v-model="email" type="email" placeholder="ashishgupta1v@gmail.com"
              class="w-full px-4 py-3 rounded-xl text-sm outline-none transition-colors"
              style="background-color:#ffffff10; border:1px solid #ffffff15; color:#fcf9f5; placeholder-color:#ffffff30;">
          </div>
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#ffffff60;">Password</label>
            <div class="relative">
              <input v-model="password" :type="showPass ? 'text' : 'password'" placeholder="••••••••••"
                class="w-full px-4 py-3 rounded-xl text-sm outline-none pr-12"
                style="background-color:#ffffff10; border:1px solid #ffffff15; color:#fcf9f5;">
              <button type="button" @click="showPass=!showPass" class="absolute right-3 top-1/2 -translate-y-1/2 p-1" style="color:#ffffff40;">
                <span class="material-symbols-outlined text-base">{{ showPass ? 'visibility_off' : 'visibility' }}</span>
              </button>
            </div>
          </div>

          <!-- Error -->
          <div v-if="error" class="px-4 py-3 rounded-xl text-sm flex items-center gap-2" style="background-color:#ff000015; border:1px solid #ff000030; color:#ff6b6b;">
            <span class="material-symbols-outlined text-base">error</span>
            {{ error }}
          </div>

          <button type="submit" :disabled="loading"
            class="w-full py-3.5 rounded-xl text-sm font-medium transition-all hover:opacity-90 disabled:opacity-50 flex items-center justify-center gap-2"
            style="background-color:#dcc0c0; color:#031632;">
            <span v-if="loading" class="w-4 h-4 border-2 border-[#031632]/30 border-t-[#031632] rounded-full animate-spin"></span>
            {{ loading ? 'Signing in...' : 'Sign In' }}
          </button>
        </form>
      </div>

      <!-- Back link -->
      <div class="text-center mt-6">
        <RouterLink to="/home" class="text-sm transition-opacity hover:opacity-100" style="color:#ffffff40;">
          ← Return to Shaiyra's Journal
        </RouterLink>
      </div>

      <!-- Hint (dev mode) -->
      <div class="mt-8 p-4 rounded-xl text-center" style="background-color:#ffffff05; border:1px solid #ffffff08;">
        <p class="text-xs" style="color:#ffffff30;">Admin credentials are set at project configuration.</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter, RouterLink } from 'vue-router';
import { useJournalStore } from '@/stores/journal';

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
input::placeholder { color: rgba(252,249,245,0.3); }
</style>
