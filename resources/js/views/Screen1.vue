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
<!-- Form -->
<form class="space-y-stack-md" @submit.prevent>
<!-- Email Field -->
<div class="group">
<label class="font-label-sm text-label-sm text-secondary block mb-2" for="email">Email Address</label>
<div class="relative">
<input class="w-full bg-transparent border-t-0 border-x-0 border-b border-secondary/30 focus:border-primary focus:ring-0 px-0 py-2 font-body-md transition-all duration-300" id="email" name="email" placeholder="Your registered email" type="email"/>
<span class="absolute right-0 bottom-2 text-secondary/40 material-symbols-outlined">alternate_email</span>
</div>
</div>
<!-- Secret Key Field -->
<div class="group">
<label class="font-label-sm text-label-sm text-secondary block mb-2" for="key">Secret Key</label>
<div class="relative">
<input class="w-full bg-transparent border-t-0 border-x-0 border-b border-secondary/30 focus:border-primary focus:ring-0 px-0 py-2 font-body-md transition-all duration-300" id="key" name="key" placeholder="••••••••••••" type="password"/>
<span class="absolute right-0 bottom-2 text-secondary/40 material-symbols-outlined">lock</span>
</div>
</div>
<!-- Remember Device & Options -->
<div class="flex items-center justify-between pt-2">
<label class="flex items-center cursor-pointer group">
<div class="relative flex items-center">
<input class="appearance-none w-4 h-4 border border-secondary/40 rounded-none checked:bg-surface-container transition-all serif-x cursor-pointer" type="checkbox"/>
</div>
<span class="ml-2 font-body-md text-sm text-secondary group-hover:text-primary transition-colors">Remember this Family Device</span>
</label>
</div>
<!-- Submit Button -->
<div class="pt-stack-md">
<button class="w-full bg-primary text-on-primary py-4 font-headline-md text-body-md hover:bg-primary-container active:opacity-70 transition-all duration-300 tracking-wide" type="submit">
                            Enter the Archive
                        </button>
</div>
</form>
<!-- Help Link -->
<div class="mt-stack-md text-center">
<a class="font-label-sm text-label-sm text-secondary hover:text-primary transition-colors border-b border-secondary/20 hover:border-primary pb-1" href="#">Request Access for Heir</a>
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
<a class="font-label-sm text-label-sm text-surface-container-highest tracking-widest uppercase hover:text-white transition-opacity opacity-60 hover:opacity-100" href="#">Privacy Policy</a>
<a class="font-label-sm text-label-sm text-surface-container-highest tracking-widest uppercase hover:text-white transition-opacity opacity-60 hover:opacity-100" href="#">Security Whitepaper</a>
<a class="font-label-sm text-label-sm text-surface-container-highest tracking-widest uppercase hover:text-white transition-opacity opacity-60 hover:opacity-100" href="#">Support</a>
</div>
</div>
</footer>
<!-- Decorative Screen Grain -->
<div class="fixed inset-0 pointer-events-none z-50 opacity-[0.03] bg-[url('https://www.transparenttextures.com/patterns/felt.png')]"></div>
</div>
</template>

<script>
export default {
    name: 'Screen1'
}
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
