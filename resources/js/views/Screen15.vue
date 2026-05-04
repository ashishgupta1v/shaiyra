<template>
<div class="bg-background text-on-background font-body-md antialiased overflow-x-hidden">
<!-- TopAppBar -->
<header class="fixed top-0 w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-100 dark:border-slate-800 shadow-sm dark:shadow-none">
<div class="flex justify-between items-center px-8 h-20 w-full max-w-screen-2xl mx-auto">
<h1 class="text-2xl font-serif text-slate-900 dark:text-slate-100 tracking-wide font-serif italic tracking-tight">Shaiyra Gupta</h1>
<nav class="hidden md:flex space-x-8">
<RouterLink class="text-slate-400 dark:text-slate-500 font-body-md hover:opacity-70 transition-opacity" :to="{ name: 'home-page' }">Timeline</RouterLink>
<RouterLink class="text-slate-400 dark:text-slate-500 font-body-md hover:opacity-70 transition-opacity" :to="{ name: 'milestones-page' }">Galleries</RouterLink>
<RouterLink class="text-slate-900 dark:text-white font-semibold font-body-md hover:opacity-70 transition-opacity" :to="{ name: 'achievements-page' }">Milestones</RouterLink>
<RouterLink class="text-slate-400 dark:text-slate-500 font-body-md hover:opacity-70 transition-opacity" :to="{ name: 'letters-archive-page' }">Legacy</RouterLink>
</nav>
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-primary cursor-pointer">menu</span>
</div>
</div>
</header>
<main class="pt-20">
<!-- Hero Section: Tiny Triumphs -->
<section class="mt-32 px-8 max-w-screen-xl mx-auto text-center">
<h2 class="font-display-lg text-display-lg text-primary mb-6">Tiny Triumphs</h2>
<p class="font-headline-md text-headline-md italic text-on-primary-container max-w-2xl mx-auto">
                Capturing her first big leaps into the world, one shaky step and sweet word at a time.
            </p>
<div class="mt-16 w-full h-[500px] rounded-xl overflow-hidden shadow-2xl relative group">
<img class="w-full h-full object-cover grayscale-[20%] group-hover:scale-105 transition-transform duration-1000" data-alt="A cinematic, high-key photograph of a sun-drenched nursery with soft cream-colored linens and warm natural lighting. The scene captures a sense of peace and celebration with delicate shadows falling across a wooden floor. The aesthetic is minimalist and high-end, featuring the curated, airy palette of the Shaiyra Gupta brand, emphasizing sentimental warmth and professional clarity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAosgdameGjObrRLUr5bkj3J85bFgWmEwwOeKUPvV3s6AvtamFTTZsMXI9pTrGJNOaIY4VXZtqd1g1FsNQ2uVE1bRHmoirWufeEyirtkbEnEcXmbpHFWoTy_pbnnDFkxo1v3r_zxdMsVP6ckygMt2M6ByyISAar38dWYigic9ZwNdT3dh5phZs_zG6b5D3X-76P_7gOXfi1Ifkrw8Q-8r-SB78xbdyZ8eOg7ZU5M_LSdcqnFiW9VaeDPpDccxCunLQ92xhapDmFA7Wv"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/20 to-transparent"></div>
</div>
</section>
<!-- First Words Gallery -->
<section class="mt-section-gap px-8 max-w-screen-xl mx-auto">
<div class="flex items-baseline justify-between mb-12 border-b border-surface-container-highest pb-4">
<h3 class="font-headline-md text-headline-md text-primary">First Words</h3>
<span class="font-label-caps text-label-caps text-on-secondary-fixed-variant">Spring 2024</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
<!-- Mama Card -->
<div class="bg-surface-container-low p-10 rounded-xl hover:shadow-xl transition-all duration-500 border border-surface-container border-opacity-50 group">
<span class="font-label-caps text-label-caps text-on-tertiary-container block mb-4">March 12, 2024</span>
<h4 class="font-display-lg text-headline-md text-primary mb-8 italic">"Mama"</h4>
<div class="flex items-center gap-4 text-on-primary-container">
<button class="w-12 h-12 rounded-full border border-primary flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined">play_arrow</span>
</button>
<div class="audio-wave-container flex items-end h-6 gap-[2px]">
<span class="h-2"></span><span class="h-4"></span><span class="h-6"></span><span class="h-3"></span><span class="h-5"></span><span class="h-4"></span><span class="h-6"></span><span class="h-2"></span>
</div>
</div>
</div>
<!-- Dada Card -->
<div class="bg-surface-container-low p-10 rounded-xl hover:shadow-xl transition-all duration-500 border border-surface-container border-opacity-50 group">
<span class="font-label-caps text-label-caps text-on-tertiary-container block mb-4">April 05, 2024</span>
<h4 class="font-display-lg text-headline-md text-primary mb-8 italic">"Dada"</h4>
<div class="flex items-center gap-4 text-on-primary-container">
<button class="w-12 h-12 rounded-full border border-primary flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined">play_arrow</span>
</button>
<div class="audio-wave-container flex items-end h-6 gap-[2px]">
<span class="h-3"></span><span class="h-6"></span><span class="h-2"></span><span class="h-5"></span><span class="h-4"></span><span class="h-6"></span><span class="h-3"></span><span class="h-5"></span>
</div>
</div>
</div>
<!-- Nani Card -->
<div class="bg-surface-container-low p-10 rounded-xl hover:shadow-xl transition-all duration-500 border border-surface-container border-opacity-50 group">
<span class="font-label-caps text-label-caps text-on-tertiary-container block mb-4">May 19, 2024</span>
<h4 class="font-display-lg text-headline-md text-primary mb-8 italic">"Nani"</h4>
<div class="flex items-center gap-4 text-on-primary-container">
<button class="w-12 h-12 rounded-full border border-primary flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined">play_arrow</span>
</button>
<div class="audio-wave-container flex items-end h-6 gap-[2px]">
<span class="h-5"></span><span class="h-3"></span><span class="h-6"></span><span class="h-4"></span><span class="h-2"></span><span class="h-5"></span><span class="h-6"></span><span class="h-4"></span>
</div>
</div>
</div>
</div>
</section>
<!-- First Steps Timeline -->
<section class="mt-section-gap px-8 max-w-screen-xl mx-auto">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
<div class="lg:col-span-5">
<div class="sticky top-32">
<h3 class="font-headline-md text-headline-md text-primary mb-8">First Steps</h3>
<div class="border-l border-primary-container pl-8 relative">
<div class="absolute -left-[5px] top-0 w-[10px] h-[10px] rounded-full bg-primary"></div>
<span class="font-label-caps text-label-caps text-on-tertiary-container">August 15, 2024</span>
<h4 class="font-display-lg text-headline-md text-primary mt-2 mb-6">Freedom to Roam</h4>
<p class="font-body-lg text-body-lg text-on-surface-variant italic mb-8">
                                "A moment that stopped time. In our sun-filled living room, you let go of the coffee table and took three shaky, magnificent steps toward us. The sheer determination in your eyes was a glimpse of the woman you will become."
                            </p>
<div class="p-6 bg-secondary-container rounded-lg border-l-4 border-secondary">
<p class="font-body-md text-body-md text-on-secondary-container italic">
                                    — A note from Mama &amp; Papa
                                </p>
</div>
</div>
</div>
</div>
<div class="lg:col-span-7">
<div class="aspect-[4/5] bg-surface-container-highest rounded-2xl overflow-hidden relative shadow-lg">
<img class="w-full h-full object-cover" data-alt="A soft-focus, minimalist photograph of a toddler's small feet making their first steps on a light oak wooden floor. Warm, golden hour light streams in from a window, creating a serene and nostalgic mood. The overall aesthetic is professional yet intimate, using the neutral tones and elegant styling of the Shaiyra Gupta brand identity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD1k-55FJCOSuNgn01e7FRZ6-Y136hpxPO3FUI1wEFpzgFgcrmOMTBSAJAYqaGoOPgXN6Y3kgH_yidd5k6fMWQvu6FVrt9qRVTcY_LdtC9hmTkaI5_5NuhqdhxdZPitbJw3u5K82sszeu4S3_Pp10APO1txdi3V21l5d3_pE5SxPlwtdz3Kfm4hMJ61mnCKtQZIT6ddd8mhp1Krj_CdDaNWx_PCUtwUMyAQp_j1_GKNq82nF-HKJ4mKc_SkQ4cycAfI71tvgejxRpXt"/>
<div class="absolute inset-0 flex items-center justify-center">
<div class="w-24 h-24 rounded-full bg-white/30 backdrop-blur-md flex items-center justify-center cursor-pointer border border-white/50 hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-white text-4xl" style="font-variation-settings: 'FILL' 1;">play_circle</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- The Journey Continues -->
<section class="mt-section-gap px-8 max-w-screen-xl mx-auto mb-32">
<div class="text-center mb-16">
<h3 class="font-headline-md text-headline-md text-primary mb-4 italic">The Journey Continues</h3>
<p class="font-body-lg text-body-lg text-on-tertiary-container">Waiting for the next chapters of your story...</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter opacity-40">
<div class="border-2 border-dashed border-surface-container-highest rounded-2xl p-16 flex flex-col items-center justify-center text-center">
<span class="material-symbols-outlined text-5xl mb-6 text-on-tertiary-container">school</span>
<h5 class="font-headline-md text-headline-md text-primary mb-2">First Day of School</h5>
<p class="font-body-md text-body-md">Expected 2027</p>
</div>
<div class="border-2 border-dashed border-surface-container-highest rounded-2xl p-16 flex flex-col items-center justify-center text-center">
<span class="material-symbols-outlined text-5xl mb-6 text-on-tertiary-container">cake</span>
<h5 class="font-headline-md text-headline-md text-primary mb-2">First Tooth</h5>
<p class="font-body-md text-body-md">Coming soon</p>
</div>
</div>
</section>
<!-- Footer -->
<footer class="w-full py-20 bg-slate-50 dark:bg-slate-950 flex flex-col items-center space-y-4 text-center">
<p class="font-serif text-sm italic text-slate-500 dark:text-slate-400">The Curated Life © 2024 Shaiyra Gupta</p>
<div class="flex space-x-6">
<RouterLink class="font-serif text-sm italic text-slate-500 dark:text-slate-400 no-underline hover:text-slate-800 dark:hover:text-slate-200 transition-colors" :to="{ name: 'home-page' }">Privacy</RouterLink>
<RouterLink class="font-serif text-sm italic text-slate-500 dark:text-slate-400 no-underline hover:text-slate-800 dark:hover:text-slate-200 transition-colors" :to="{ name: 'milestones-page' }">Archive</RouterLink>
<RouterLink class="font-serif text-sm italic text-slate-500 dark:text-slate-400 no-underline hover:text-slate-800 dark:hover:text-slate-200 transition-colors" :to="{ name: 'family-portal-page' }">Contact</RouterLink>
</div>
</footer>
</main>
<!-- BottomNavBar (Mobile) -->
<nav class="md:hidden fixed bottom-0 w-full z-50 pb-safe bg-white/90 dark:bg-slate-950/90 backdrop-blur-lg border-t border-slate-100 dark:border-slate-800 shadow-[0_-4px_20px_0_rgba(26,43,72,0.05)]">
<div class="flex justify-around items-center h-20 px-4">
<RouterLink class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-600 pt-2 hover:text-slate-600 dark:hover:text-slate-300" :to="{ name: 'home-page' }">
<span class="material-symbols-outlined">auto_stories</span>
<span class="font-serif text-[11px] uppercase tracking-widest mt-1">Timeline</span>
</RouterLink>
<RouterLink class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-600 pt-2 hover:text-slate-600 dark:hover:text-slate-300" :to="{ name: 'milestones-page' }">
<span class="material-symbols-outlined">photo_library</span>
<span class="font-serif text-[11px] uppercase tracking-widest mt-1">Galleries</span>
</RouterLink>
<RouterLink class="flex flex-col items-center justify-center text-slate-900 dark:text-white border-t-2 border-slate-900 dark:border-white pt-2 Active: translate-y-[-2px] transition-all duration-500 ease-out" :to="{ name: 'achievements-page' }">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
<span class="font-serif text-[11px] uppercase tracking-widest mt-1">Milestones</span>
</RouterLink>
<RouterLink class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-600 pt-2 hover:text-slate-600 dark:hover:text-slate-300" :to="{ name: 'letters-archive-page' }">
<span class="material-symbols-outlined">history_edu</span>
<span class="font-serif text-[11px] uppercase tracking-widest mt-1">Legacy</span>
</RouterLink>
</div>
</nav>
</div>
</template>

<script>
export default {
    name: 'Screen15'
}
</script>

<style scoped>
.audio-wave-container span {
    display: inline-block;
    width: 2px;
    background: currentColor;
    margin: 0 1px;
    border-radius: 1px;
}
</style>
