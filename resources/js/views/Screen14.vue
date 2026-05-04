<template>
<div class="bg-surface-bright text-on-surface font-body-md selection:bg-secondary-fixed">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-surface-container-high">
<div class="flex justify-between items-center w-full px-8 md:px-16 py-6 max-w-screen-2xl mx-auto">
<div class="text-2xl font-serif italic text-primary">The Legacy Journal</div>
<div class="hidden md:flex items-center gap-8">
<RouterLink class="font-serif text-lg tracking-wide text-on-surface-variant font-normal hover:text-primary transition-colors duration-300" :to="{ name: 'home-page' }">Home</RouterLink>
<RouterLink class="font-serif text-lg tracking-wide text-on-surface-variant font-normal hover:text-primary transition-colors duration-300" :to="{ name: 'life-feed-page' }">Timeline</RouterLink>
<RouterLink class="font-serif text-lg tracking-wide text-primary border-b border-primary font-semibold transition-colors duration-300" :to="{ name: 'letters-archive-page' }">Letters</RouterLink>
<RouterLink class="font-serif text-lg tracking-wide text-on-surface-variant font-normal hover:text-primary transition-colors duration-300" :to="{ name: 'milestones-page' }">Gallery</RouterLink>
<RouterLink class="font-serif text-lg tracking-wide text-on-surface-variant font-normal hover:text-primary transition-colors duration-300" :to="{ name: 'dashboard-page' }">Archive</RouterLink>
</div>
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-primary cursor-pointer hover:rotate-45 transition-transform duration-500">settings</span>
<span class="material-symbols-outlined text-primary cursor-pointer">account_circle</span>
</div>
</div>
</nav>
<main class="pt-32">
<!-- Hero Section -->
<header class="max-w-screen-xl mx-auto px-8 text-center mb-[120px]">
<div class="flex items-center justify-center mb-6">
<div class="h-px bg-outline-variant w-12 mr-4"></div>
<span class="font-label-caps text-secondary tracking-[0.3em]">SACRED MOMENTS</span>
<div class="h-px bg-outline-variant w-12 ml-4"></div>
</div>
<h1 class="font-display-lg text-display-lg md:text-6xl text-primary mb-6">Letters of Love</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto italic leading-relaxed">
                A collection of whispers, wisdom, and promises, held in trust until the day you're ready to read them.
            </p>
<div class="mt-12 flex justify-center">
<button class="group relative flex items-center gap-3 px-10 py-4 overflow-hidden border border-primary/20 text-primary font-label-caps uppercase tracking-widest hover:border-primary transition-all duration-700 rounded-sm silk-texture">
<span class="relative z-10 material-symbols-outlined text-sm">edit</span>
<span class="relative z-10">Write a New Letter</span>
</button>
</div>
</header>
<!-- Featured Letter -->
<section class="max-w-screen-lg mx-auto px-8 mb-[120px]">
<div class="decorative-card rounded-sm overflow-hidden corner-accent">
<div class="silk-texture p-12 md:p-24 shadow-inner relative overflow-hidden group">
<div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity duration-1000">
<span class="material-symbols-outlined text-9xl text-primary">auto_stories</span>
</div>
<div class="relative z-10">
<span class="font-label-caps text-label-caps text-secondary uppercase mb-8 block tracking-widest">Most Recent Addition</span>
<h2 class="font-headline-md text-headline-md text-primary mb-12 italic leading-tight">"To my darling Shaiyra, on the morning of your first birthday..."</h2>
<div class="space-y-8 font-body-lg text-body-lg text-on-surface leading-loose max-w-3xl border-l border-blush-accent pl-8">
<p class="first-letter:text-5xl first-letter:font-serif first-letter:float-left first-letter:mr-3 first-letter:mt-1 first-letter:text-secondary">
                            I am writing this while you sleep, your small chest rising and falling in the rhythm of dreams we can only guess at. You don't know yet how much the world changed the moment you arrived, how the colors seemed brighter and the air felt clearer...
                        </p>
<p>
                            There will be days when you feel small, and days when you feel you can touch the stars. I want you to remember that your worth is not measured by the things you achieve, but by the kindness you carry in your heart...
                        </p>
</div>
<div class="mt-20 pt-10 border-t border-surface-container-high flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
<div>
<p class="font-headline-md text-2xl text-primary italic">A Letter from Papa</p>
<p class="font-label-caps text-label-caps text-on-surface-variant mt-2 tracking-widest">OCTOBER 14TH, 2023</p>
</div>
<button class="group flex items-center gap-2 text-primary font-label-caps border-b border-primary/10 pb-1 hover:border-primary transition-all"><span class="material-symbols-outlined text-[16px] mr-1" style="font-variation-settings: 'FILL' 1, 'wght' 300, 'GRAD' 0, 'opsz' 20">lock</span>
    READ FULL LETTER 
    <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- Letters Grid/Archive -->
<section class="max-w-screen-xl mx-auto px-8 mb-[120px]">
<div class="flex items-center justify-between mb-16">
<h3 class="font-headline-md text-headline-md text-primary heirloom-header">The Archive</h3>
<div class="h-px bg-blush-accent flex-grow mx-8"></div>
<span class="font-label-caps text-label-caps text-on-surface-variant tracking-[0.2em]">12 LETTERS TOTAL</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
<!-- Envelope Card 1 -->
<div class="envelope-hover decorative-card rounded-sm corner-accent">
<div class="silk-texture p-8 flex flex-col justify-between h-[400px]">
<div>
<div class="flex justify-between items-start mb-8">
<span class="material-symbols-outlined text-secondary text-3xl opacity-40">mail</span>
<div class="text-right flex items-center justify-end">
<span class="material-symbols-outlined text-[12px] align-middle mr-1" style="font-variation-settings: 'FILL' 1, 'wght' 300, 'GRAD' 0, 'opsz' 20">lock</span><p class="font-label-caps text-[10px] text-secondary uppercase tracking-widest">To be opened at</p>
<p class="font-headline-md text-xl text-primary mt-1">Age 10</p>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic mb-6 leading-relaxed">
                            "The world is full of magic things, patiently waiting for our senses to grow sharper..."
                        </p>
</div>
<div>
<div class="h-px bg-surface-container-high w-full mb-6"></div>
<p class="font-label-caps text-label-caps text-primary tracking-widest">FROM MAMA</p>
<p class="font-label-caps text-[10px] text-on-surface-variant mt-1">SEPTEMBER 2022</p>
</div>
</div>
</div>
<!-- Envelope Card 2 -->
<div class="envelope-hover decorative-card rounded-sm corner-accent">
<div class="silk-texture p-8 flex flex-col justify-between h-[400px]">
<div>
<div class="flex justify-between items-start mb-8">
<span class="material-symbols-outlined text-secondary text-3xl opacity-40">mail</span>
<div class="text-right flex items-center justify-end">
<span class="material-symbols-outlined text-[12px] align-middle mr-1" style="font-variation-settings: 'FILL' 1, 'wght' 300, 'GRAD' 0, 'opsz' 20">lock</span><p class="font-label-caps text-[10px] text-secondary uppercase tracking-widest">To be opened at</p>
<p class="font-headline-md text-xl text-primary mt-1">Age 16</p>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic mb-6 leading-relaxed">
                            "Don't be afraid of the mistakes you'll make. They are the brushstrokes of a life well-lived..."
                        </p>
</div>
<div>
<div class="h-px bg-surface-container-high w-full mb-6"></div>
<p class="font-label-caps text-label-caps text-primary tracking-widest">FROM GRANDPA JOE</p>
<p class="font-label-caps text-[10px] text-on-surface-variant mt-1">JANUARY 2023</p>
</div>
</div>
</div>
<!-- Envelope Card 3 -->
<div class="envelope-hover decorative-card rounded-sm corner-accent">
<div class="silk-texture p-8 flex flex-col justify-between h-[400px]">
<div>
<div class="flex justify-between items-start mb-8">
<span class="material-symbols-outlined text-secondary text-3xl opacity-40">mail</span>
<div class="text-right flex items-center justify-end">
<span class="material-symbols-outlined text-[12px] align-middle mr-1" style="font-variation-settings: 'FILL' 1, 'wght' 300, 'GRAD' 0, 'opsz' 20">lock</span><p class="font-label-caps text-[10px] text-secondary uppercase tracking-widest">To be opened at</p>
<p class="font-headline-md text-xl text-primary mt-1">Graduation</p>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic mb-6 leading-relaxed">
                            "You have inherited more than just our names; you have inherited our courage..."
                        </p>
</div>
<div>
<div class="h-px bg-surface-container-high w-full mb-6"></div>
<p class="font-label-caps text-label-caps text-primary tracking-widest">FROM AUNTY SARA</p>
<p class="font-label-caps text-[10px] text-on-surface-variant mt-1">MARCH 2023</p>
</div>
</div>
</div>
<!-- Envelope Card 4 -->
<div class="envelope-hover decorative-card rounded-sm corner-accent">
<div class="silk-texture p-8 flex flex-col justify-between h-[400px]">
<div>
<div class="flex justify-between items-start mb-8">
<span class="material-symbols-outlined text-secondary text-3xl opacity-40">mail</span>
<div class="text-right flex items-center justify-end">
<span class="material-symbols-outlined text-[12px] align-middle mr-1" style="font-variation-settings: 'FILL' 1, 'wght' 300, 'GRAD' 0, 'opsz' 20">lock</span><p class="font-label-caps text-[10px] text-secondary uppercase tracking-widest">To be opened at</p>
<p class="font-headline-md text-xl text-primary mt-1">Age 5</p>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic mb-6 leading-relaxed">
                            "Remember the way the sand felt between your toes today. You laughed for hours..."
                        </p>
</div>
<div>
<div class="h-px bg-surface-container-high w-full mb-6"></div>
<p class="font-label-caps text-label-caps text-primary tracking-widest">FROM PAPA</p>
<p class="font-label-caps text-[10px] text-on-surface-variant mt-1">AUGUST 2022</p>
</div>
</div>
</div>
<!-- Envelope Card 5 -->
<div class="envelope-hover decorative-card rounded-sm corner-accent">
<div class="silk-texture p-8 flex flex-col justify-between h-[400px]">
<div>
<div class="flex justify-between items-start mb-8">
<span class="material-symbols-outlined text-secondary text-3xl opacity-40">mail</span>
<div class="text-right flex items-center justify-end">
<span class="material-symbols-outlined text-[12px] align-middle mr-1" style="font-variation-settings: 'FILL' 1, 'wght' 300, 'GRAD' 0, 'opsz' 20">lock</span><p class="font-label-caps text-[10px] text-secondary uppercase tracking-widest">To be opened at</p>
<p class="font-headline-md text-xl text-primary mt-1">Wedding Day</p>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic mb-6 leading-relaxed">
                            "Love is not a destination, but a way of traveling together. Always be each other's home..."
                        </p>
</div>
<div>
<div class="h-px bg-surface-container-high w-full mb-6"></div>
<p class="font-label-caps text-label-caps text-primary tracking-widest">FROM GRANDMA ROSE</p>
<p class="font-label-caps text-[10px] text-on-surface-variant mt-1">MAY 2023</p>
</div>
</div>
</div>
<!-- Quote Card -->
<div class="relative rounded-sm overflow-hidden h-[400px] group decorative-card corner-accent bg-primary/90">
<div class="absolute inset-0 flex items-center justify-center p-8 text-center">
<div class="border border-white/20 p-12 w-full h-full flex items-center justify-center">
<p class="font-headline-md text-white text-2xl italic leading-relaxed">
                            "Words are the only jewels we can leave behind that never lose their shine."
                        </p>
</div>
</div>
</div>
</div>
</section>
<!-- Final CTA -->
<section class="max-w-screen-md mx-auto px-8 text-center py-[120px] relative">
<div class="absolute top-0 left-1/2 -translate-x-1/2 w-24 h-px bg-surface-container-high"></div>
<span class="material-symbols-outlined text-6xl text-secondary mb-8 block opacity-40">history_edu</span>
<h4 class="font-display-lg text-4xl text-primary mb-6">Your wisdom is her inheritance.</h4>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-12 italic leading-relaxed">
                Every letter written today is a gift for a tomorrow we cannot yet see. Take a moment to capture the fleeting thoughts of love.
            </p>
<button class="px-14 py-6 bg-primary text-white font-label-caps uppercase tracking-[0.3em] hover:bg-slate-900 transition-all duration-500 rounded-sm shadow-xl hover:shadow-2xl">
                Begin a New Letter
            </button>
</section>
</main>
<!-- Footer -->
<footer class="w-full py-24 bg-surface-container-low border-t border-surface-container-high">
<div class="flex flex-col items-center gap-12 max-w-screen-xl mx-auto text-center">
<div class="flex flex-wrap justify-center gap-12">
<RouterLink class="font-serif italic text-sm tracking-widest text-on-surface-variant hover:text-primary transition-colors hover:underline decoration-blush-accent underline-offset-8" :to="{ name: 'home-page' }">Our Story</RouterLink>
<RouterLink class="font-serif italic text-sm tracking-widest text-on-surface-variant hover:text-primary transition-colors hover:underline decoration-blush-accent underline-offset-8" :to="{ name: 'home-page' }">Privacy Policy</RouterLink>
<RouterLink class="font-serif italic text-sm tracking-widest text-on-surface-variant hover:text-primary transition-colors hover:underline decoration-blush-accent underline-offset-8" :to="{ name: 'milestones-page' }">Archival Guidelines</RouterLink>
<RouterLink class="font-serif italic text-sm tracking-widest text-on-surface-variant hover:text-primary transition-colors hover:underline decoration-blush-accent underline-offset-8" :to="{ name: 'family-portal-page' }">Contact</RouterLink>
</div>
<div class="h-px bg-surface-container-high w-16"></div>
<p class="font-serif italic text-sm tracking-widest text-on-surface-variant uppercase">© 2024 The Curated Life Legacy</p>
</div>
</footer>
</div>
</template>

<script>
export default {
    name: 'Screen14'
}
</script>

<style scoped>
.silk-texture {
    background-color: #fcf9f8;
    position: relative;
    box-shadow: inset 0 0 40px rgba(248, 236, 234, 0.3), 0 10px 30px -10px rgba(0, 0, 0, 0.05);
}
.decorative-card {
    position: relative;
    padding: 1px;
    background: linear-gradient(135deg, #e5e2de 0%, #fff 50%, #e5e2de 100%);
    box-shadow: 0 20px 40px -15px rgba(26, 43, 72, 0.08);
}
.corner-accent::before, .corner-accent::after {
    content: "";
    position: absolute;
    width: 12px;
    height: 12px;
    border-color: #d1d5db;
    pointer-events: none;
    z-index: 20;
}
.corner-accent::before {
    top: 16px;
    left: 16px;
    border-top: 1px solid;
    border-left: 1px solid;
}
.corner-accent::after {
    bottom: 16px;
    right: 16px;
    border-bottom: 1px solid;
    border-right: 1px solid;
}
.envelope-hover {
    transition: transform 0.6s cubic-bezier(0.2, 1, 0.3, 1), box-shadow 0.6s ease;
}
.envelope-hover:hover {
    transform: translatey(-8px);
    box-shadow: 0 30px 60px -12px rgba(26, 43, 72, 0.12);
}
.heirloom-header::before, .heirloom-header::after {
    content: "";
    display: inline-block;
    width: 40px;
    height: 1px;
    background: #e5e2de;
    vertical-align: middle;
    margin: 0 20px;
}
</style>
