<template>
<div class="bg-background text-on-surface font-body-md selection:bg-tertiary-fixed min-h-screen flex flex-col relative overflow-hidden">
<!-- Background Layer with Image -->
<div class="absolute inset-0 z-0">
<img class="w-full h-full object-cover filter brightness-[0.85] contrast-[1.05]" data-alt="A macro photograph of an antique leather-bound journal resting on a dark walnut table. The lighting is warm and cinematic, casting long, soft shadows across the textured grain of the leather. In the background, the soft glow of a library lamp illuminates a collection of vintage inkwells and fountain pens, creating a rich atmosphere of heritage and privacy. The color palette is dominated by deep ambers, rich browns, and soft cream highlights, reflecting a premium and secure archival space." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBrxwgLKCJ8Y1ihZUlduWPyE-AL0KAmFkz8dWbaF8SUefjSwI5EcP17q1ZZ5qsYdhf7dhEoWtLLd_9nIBpBLQ39HEGuuOExe4zl2XR-1oIcL-EJ0MThereGvSUIaUyeLDpC9rEbhR987vX0p-LuZPxJD1iMmrMphXwfkADubpDz2FaItGrbCzDBFJi4BES4Uh_9YZmOmrf-Jgsr8mpsQZQU6Al0bzgGFu15IwBPoZLPvM-EIQ0yhhNmlkLvJJFjqudzWqLqbViR9wqx"/>
<div class="absolute inset-0 bg-gradient-to-b from-primary/20 via-transparent to-primary/40"></div>
</div>
<!-- Main Content Canvas -->
<main class="flex-grow flex items-center justify-center relative z-10 px-gutter">
<div class="max-w-[1280px] w-full flex justify-center">
<!-- Login Portal Card -->
<div class="glass-panel w-full max-w-md p-stack-lg rounded-none relative">
<!-- Decorative Corner Ornaments (Custom Implementation) -->
<div class="absolute top-4 left-4 w-8 h-8 border-t border-l border-secondary/30"></div>
<div class="absolute top-4 right-4 w-8 h-8 border-t border-r border-secondary/30"></div>
<div class="absolute bottom-4 left-4 w-8 h-8 border-b border-l border-secondary/30"></div>
<div class="absolute bottom-4 right-4 w-8 h-8 border-b border-r border-secondary/30"></div>
<!-- Header -->
<div class="text-center mb-stack-lg">
<span class="font-label-sm text-label-sm text-secondary tracking-[0.2em] block mb-unit">PRIVATE ARCHIVE</span>
<h1 class="font-headline-lg text-headline-lg text-primary mb-unit">Heirloom Journal</h1>
<p class="font-body-md text-body-md text-on-surface-variant italic">Enter Shaiyra's Digital Vault</p>
</div>
<!-- Status Messages -->
<div v-if="errorMessage" class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded text-sm">
{{ errorMessage }}
</div>
<div v-if="successMessage" class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded text-sm">
{{ successMessage }}
</div>
<!-- Form -->
<form class="space-y-stack-md" @submit.prevent="handleLogin">
<!-- Email Field -->
<div class="group">
<label class="font-label-sm text-label-sm text-secondary block mb-2" for="email">Email Address</label>
<div class="relative">
<input 
  v-model="email"
  class="w-full bg-transparent border-t-0 border-x-0 border-b border-secondary/30 focus:border-primary focus:ring-0 px-0 py-2 font-body-md transition-all duration-300" 
  id="email" 
  name="email" 
  placeholder="Your registered email" 
  type="email"
  required
/>
<span class="absolute right-0 bottom-2 text-secondary/40 material-symbols-outlined">alternate_email</span>
</div>
</div>
<!-- Password Field -->
<div class="group">
<label class="font-label-sm text-label-sm text-secondary block mb-2" for="password">Secret Key</label>
<div class="relative">
<input 
  v-model="password"
  class="w-full bg-transparent border-t-0 border-x-0 border-b border-secondary/30 focus:border-primary focus:ring-0 px-0 py-2 font-body-md transition-all duration-300" 
  id="password" 
  name="password" 
  placeholder="••••••••••••" 
  type="password"
  required
/>
<span class="absolute right-0 bottom-2 text-secondary/40 material-symbols-outlined">lock</span>
</div>
</div>
<!-- Remember Device & Options -->
<div class="flex items-center justify-between pt-2">
<label class="flex items-center cursor-pointer group">
<div class="relative flex items-center">
<input 
  v-model="rememberDevice"
  class="appearance-none w-4 h-4 border border-secondary/40 rounded-none checked:bg-surface-container transition-all serif-x cursor-pointer" 
  type="checkbox"
/>
</div>
<span class="ml-2 font-body-md text-sm text-secondary group-hover:text-primary transition-colors">Remember this Family Device</span>
</label>
</div>
<!-- Submit Button -->
<div class="pt-stack-md">
<button 
  :disabled="isLoading"
  class="w-full bg-primary text-on-primary py-4 font-headline-md text-body-md hover:bg-primary-container active:opacity-70 transition-all duration-300 tracking-wide disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2" 
  type="submit"
>
<span v-if="isLoading" class="material-symbols-outlined animate-spin">hourglass_empty</span>
{{ isLoading ? 'Authenticating...' : 'Enter the Archive' }}
</button>
</div>
</form>
<!-- Help Link -->
<div class="mt-stack-md text-center">
<RouterLink class="font-label-sm text-label-sm text-secondary hover:text-primary transition-colors border-b border-secondary/20 hover:border-primary pb-1" :to="{ name: 'home-page' }">Request Access for Heir</RouterLink>
</div>
<!-- Test Credentials Info -->
<div class="mt-8 pt-6 border-t border-secondary/20 text-center">
<p class="font-label-sm text-label-sm text-secondary/60 uppercase tracking-widest mb-3">Demo Credentials</p>
<p class="font-body-sm text-body-sm text-secondary/70 mb-2">Email: <code class="bg-secondary/10 px-2 py-1 rounded">guardian@shaiyra.test</code></p>
<p class="font-body-sm text-body-sm text-secondary/70">Password: <code class="bg-secondary/10 px-2 py-1 rounded">password123</code></p>
</div>
</div>
</div>
</main>
<!-- Footer Component Integration -->
<footer class="relative z-10">
<div class="max-w-[1280px] mx-auto px-8 py-12 flex flex-col md:flex-row justify-between items-center border-t border-white/10 backdrop-blur-sm bg-primary/5">
<div class="mb-4 md:mb-0">
<p class="font-label-sm text-label-sm text-surface-container-highest tracking-widest uppercase opacity-80">
© 2024 Heirloom Digital. Encrypted &amp; Private Access.
</p>
</div>
<div class="flex space-x-gutter">
<RouterLink class="font-label-sm text-label-sm text-surface-container-highest tracking-widest uppercase hover:text-white transition-opacity opacity-60 hover:opacity-100" :to="{ name: 'home-page' }">Privacy Policy</RouterLink>
<RouterLink class="font-label-sm text-label-sm text-surface-container-highest tracking-widest uppercase hover:text-white transition-opacity opacity-60 hover:opacity-100" :to="{ name: 'wellness-archive-page' }">Security Whitepaper</RouterLink>
<RouterLink class="font-label-sm text-label-sm text-surface-container-highest tracking-widest uppercase hover:text-white transition-opacity opacity-60 hover:opacity-100" :to="{ name: 'family-portal-page' }">Support</RouterLink>
</div>
</div>
</footer>
<!-- Decorative Screen Grain -->
<div class="fixed inset-0 pointer-events-none z-50 opacity-[0.03] bg-[url('https://www.transparenttextures.com/patterns/felt.png')]"></div>
</div>
</template>

<script>
export default {
    name: 'LoginPage',
    data() {
        return {
            email: '',
            password: '',
            rememberDevice: false,
            isLoading: false,
            errorMessage: '',
            successMessage: '',
        };
    },
    methods: {
        async handleLogin() {
            this.errorMessage = '';
            this.successMessage = '';
            this.isLoading = true;

            try {
                // Call the login API endpoint
                const response = await fetch('/api/v1/auth/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        email: this.email,
                        password: this.password,
                    }),
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Login failed');
                }

                // Store token in localStorage
                localStorage.setItem('auth_token', data.token);
                localStorage.setItem('user', JSON.stringify(data.user));

                // Optionally store device preference
                if (this.rememberDevice) {
                    localStorage.setItem('remember_device', 'true');
                }

                // Show success message
                this.successMessage = `Welcome back, ${data.user.name}!`;

                const redirectTarget = typeof this.$route.query.redirect === 'string'
                    ? this.$route.query.redirect
                    : '/dashboard';

                // Redirect to dashboard after 1 second
                setTimeout(() => {
                    this.$router.push(redirectTarget);
                }, 1000);
            } catch (error) {
                this.errorMessage = error.message || 'An error occurred during login. Please try again.';
                console.error('Login error:', error);
            } finally {
                this.isLoading = false;
            }
        },
    },
    mounted() {
        // Check if already logged in
        if (localStorage.getItem('auth_token')) {
            const redirectTarget = typeof this.$route.query.redirect === 'string'
                ? this.$route.query.redirect
                : '/dashboard';

            this.$router.push(redirectTarget);
        }
    },
};
</script>

<style scoped>
.glass-panel {
    backdrop-filter: blur(12px);
    background: rgba(252, 249, 248, 0.85);
    border: 1px solid rgba(97, 94, 87, 0.1);
    box-shadow: inset 0 1px 0 0 rgba(255, 255, 255, 0.6);
}
.serif-x:checked::before {
    content: 'X';
    font-family: 'Noto Serif', serif;
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1e1e1e;
}
</style>
