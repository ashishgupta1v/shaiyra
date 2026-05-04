<template>
<div class="bg-background text-on-surface selection:bg-secondary-container selection:text-on-secondary-container font-body-md">
<!-- TopAppBar -->
<header class="fixed top-0 left-0 w-full flex justify-between items-center px-8 py-6 max-w-screen-2xl mx-auto bg-stone-50/80 backdrop-blur-md border-b border-stone-200/50 z-50 shadow-[0_4px_30px_rgba(26,43,72,0.03)]">
<div class="text-2xl font-serif font-semibold text-slate-900 tracking-tighter">Shaiyra Gupta</div>
<nav class="hidden md:flex gap-8 items-center">
<RouterLink class="font-serif italic text-lg tracking-tight text-slate-500 hover:text-slate-700 transition-colors" :to="{ name: 'home-page' }">Timeline</RouterLink>
<RouterLink class="font-serif italic text-lg tracking-tight text-slate-500 hover:text-slate-700 transition-colors" :to="{ name: 'life-feed-page' }">Journal</RouterLink>
<RouterLink class="font-serif italic text-lg tracking-tight text-slate-900 border-b-2 border-slate-900 pb-1 font-medium" :to="{ name: 'family-portal-page' }">Guestbook</RouterLink>
<RouterLink class="font-serif italic text-lg tracking-tight text-slate-500 hover:text-slate-700 transition-colors" :to="{ name: 'future-forward-page' }">Portfolio</RouterLink>
</nav>
<div class="flex items-center gap-4">
<button class="p-2 hover:opacity-80 transition-opacity duration-300 scale-95 duration-200 ease-out">
<span class="material-symbols-outlined text-slate-900" data-icon="settings">settings</span>
</button>
<div class="w-10 h-10 rounded-full bg-surface-container-highest overflow-hidden">
<img alt="Shaiyra's Portrait" class="w-full h-full object-cover" data-alt="A sophisticated editorial portrait of a young woman with a serene expression, captured in soft, natural window lighting that highlights the subtle textures of the ivory silk fabric she wears. The background is a clean, minimalist studio setting with warm beige tones, echoing the 'Curated Life' aesthetic of the overall UI. The mood is professional yet deeply personal and warm." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWj1PBTesVdkzVdCM97djdN5MVFW1A3wyNtjlAPn413nGaYoZDMcZ5o1mqt0Oj8eKCbdE0wSIOCBmHZ75cK4vLeXns4Nn2DiQKrtcPsCM0FfldkpISiiCYtsT9ULuZGJZ_bx2Y0jXYV2Xd_JsbIP1kUTdsMQ-x9LHNR4slXUQPENgTCgJlhpuQIAfuAhyLpp6dwURAlKE35pyJO7U6ETUArBH9v1VuR1HDwJV1wJSM2RjgmdNbSihhUf_4yX58_56IoJpjcWFkKiYp"/>
</div>
</div>
</header>
<main class="pt-[120px] pb-section-gap px-margin-page max-w-7xl mx-auto">
<!-- Hero Section -->
<section class="mb-section-gap text-center">
<h1 class="font-display-lg text-display-lg mb-4">Love Notes</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto italic">
                A digital mantlepiece for the words that shape our lives. To my family: thank you for being my anchor and my inspiration.
            </p>
<div class="mt-12">
<button class="px-8 py-3 border border-primary text-primary font-label-caps uppercase tracking-widest hover:bg-primary hover:text-on-primary transition-all duration-300">
                    Leave a Note
                </button>
</div>
</section>
<!-- Guestbook Grid: Loose Masonry Layout -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
<!-- Message Card 1 -->
<div class="p-10 bg-surface-container-low shadow-[0_30px_60px_rgba(26,43,72,0.05)] border-t border-l border-white/50 -rotate-1 hover:rotate-0 transition-transform duration-500 flex flex-col min-h-[400px]">
<div class="flex-grow">
<span class="material-symbols-outlined text-on-secondary-container mb-6 block" data-icon="format_quote">format_quote</span>
<p class="font-headline-md text-headline-md leading-relaxed italic mb-8">
                        "Your graduation was such a proud moment for all of us. I still remember you reading under the big oak tree when you were five. Keep following that curiosity, Shaiyra."
                    </p>
</div>
<div class="border-t border-outline-variant pt-6">
<p class="font-label-caps text-label-caps text-secondary mb-1">GRANDMA MARY</p>
<p class="font-body-md text-body-md text-on-surface-variant italic">Grandmother</p>
</div>
</div>
<!-- Message Card 2 -->
<div class="p-10 bg-[#fdfaf6] paper-texture shadow-[0_30px_60px_rgba(26,43,72,0.03)] border border-surface-container-highest rotate-1 hover:rotate-0 transition-transform duration-500 flex flex-col min-h-[450px]">
<div class="flex-grow">
<div class="w-12 h-1 bg-tertiary-fixed-dim mb-8"></div>
<p class="font-body-lg text-body-lg text-on-surface leading-loose mb-8">
                        Watching you build your career has been the greatest joy. You've always had a vision for the 'Curated Life'—one filled with intention and grace. Your father and I are always in your corner, cheering the loudest.
                    </p>
</div>
<div class="pt-6">
<p class="font-label-caps text-label-caps text-primary mb-1">MUM &amp; DAD</p>
<p class="font-body-md text-body-md text-on-surface-variant">Your Biggest Fans</p>
</div>
</div>
<!-- Message Card 3 -->
<div class="p-10 bg-secondary-container/30 shadow-[0_30px_60px_rgba(26,43,72,0.04)] -rotate-1 hover:rotate-0 transition-transform duration-500 flex flex-col min-h-[380px]">
<div class="flex-grow">
<span class="material-symbols-outlined text-secondary mb-6 block" data-icon="favorite" style="font-variation-settings: 'FILL' 1;">favorite</span>
<p class="font-headline-md text-headline-md italic mb-8">
                        "To my favorite sister: thanks for always sharing your books and your wisdom. You make us all better."
                    </p>
</div>
<div class="pt-6 border-b border-secondary/20 pb-4">
<p class="font-label-caps text-label-caps text-on-secondary-container mb-1">ARJUN GUPTA</p>
<p class="font-body-md text-body-md text-on-secondary-container/80">Brother</p>
</div>
</div>
<!-- Message Card 4 -->
<div class="p-10 bg-white border border-stone-100 shadow-[0_30px_60px_rgba(26,43,72,0.03)] rotate-1 hover:rotate-0 transition-transform duration-500 flex flex-col lg:mt-12">
<div class="flex-grow">
<p class="font-body-lg text-body-lg text-on-surface leading-relaxed mb-8">
                        The way you handle challenges with such poise is remarkable. I'm honored to be part of your journey and can't wait to see the next chapter of your timeline.
                    </p>
</div>
<div class="pt-6">
<p class="font-label-caps text-label-caps text-primary mb-1">UNCLE VIKRAM</p>
<p class="font-body-md text-body-md text-on-surface-variant italic">Mentor &amp; Uncle</p>
</div>
</div>
<!-- Message Card 5 (Stationery Style) -->
<div class="p-12 bg-surface-container-highest/50 border-r-4 border-primary shadow-[0_20px_40px_rgba(0,0,0,0.02)] flex flex-col min-h-[420px]">
<div class="flex-grow">
<p class="font-label-caps text-[10px] text-on-surface-variant mb-12 uppercase tracking-[0.3em]">POSTED JULY 2024</p>
<p class="font-display-lg text-[28px] text-on-surface mb-8">
                        Stay hungry, stay foolish. You're doing great, kiddo.
                    </p>
</div>
<div class="pt-6 border-t border-surface-dim">
<p class="font-label-caps text-label-caps text-on-surface mb-1">COUSIN RHEA</p>
<p class="font-body-md text-body-md text-on-surface-variant">The 'Cool' Cousin</p>
</div>
</div>
<!-- Message Card 6 -->
<div class="p-10 bg-stone-50 border-l-2 border-dashed border-stone-300 shadow-[0_30px_60px_rgba(26,43,72,0.03)] flex flex-col -rotate-1 hover:rotate-0 transition-transform duration-500">
<div class="flex-grow">
<p class="font-body-lg text-body-lg text-on-surface italic leading-relaxed mb-8">
                        "Your home is a reflection of your soul—peaceful, organized, and filled with light. Thank you for hosting us last summer."
                    </p>
</div>
<div class="pt-6">
<p class="font-label-caps text-label-caps text-secondary mb-1">AUNTY MEERA</p>
<p class="font-body-md text-body-md text-on-surface-variant">Family Friend</p>
</div>
</div>
</div>
<!-- Form Section (Simple and Beautiful) -->
<section class="mt-section-gap max-w-2xl mx-auto border-t border-stone-200 pt-section-gap">
<div class="text-center mb-12">
<h2 class="font-headline-md text-headline-md mb-2">Leave a Note</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Share a memory, a wish, or a simple hello.</p>
</div>
<form class="space-y-8" @submit.prevent>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="relative">
<input class="w-full bg-transparent border-0 border-b border-stone-300 focus:ring-0 focus:border-primary px-0 py-2 font-body-md placeholder:text-stone-400" placeholder="Your Name" type="text"/>
</div>
<div class="relative">
<input class="w-full bg-transparent border-0 border-b border-stone-300 focus:ring-0 focus:border-primary px-0 py-2 font-body-md placeholder:text-stone-400" placeholder="Relationship (e.g., Brother)" type="text"/>
</div>
</div>
<div class="relative">
<textarea class="w-full bg-transparent border-0 border-b border-stone-300 focus:ring-0 focus:border-primary px-0 py-2 font-body-md placeholder:text-stone-400" placeholder="Your message..." rows="4"></textarea>
</div>
<div class="flex justify-center">
<button class="group flex items-center gap-3 px-10 py-4 bg-primary text-on-primary font-label-caps tracking-widest hover:bg-primary-container transition-all" type="submit">
                        SEND NOTE
                        <span class="material-symbols-outlined text-sm transition-transform group-hover:translate-x-1" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
</form>
</section>
</main>
<!-- Footer -->
<footer class="bg-stone-50 border-t border-stone-200 full-width py-20 px-10">
<div class="flex flex-col md:flex-row justify-between items-center w-full max-w-7xl mx-auto gap-8">
<div class="font-serif italic text-slate-400 text-lg">Shaiyra Gupta.</div>
<div class="font-serif text-sm tracking-wide text-slate-900 flex flex-wrap justify-center gap-8">
<RouterLink class="text-slate-400 hover:text-slate-900 transition-colors duration-500" :to="{ name: 'family-portal-page' }">Contact</RouterLink>
<RouterLink class="text-slate-400 hover:text-slate-900 transition-colors duration-500" :to="{ name: 'milestones-page' }">Archives</RouterLink>
<RouterLink class="text-slate-400 hover:text-slate-900 transition-colors duration-500" :to="{ name: 'future-forward-page' }">Future Self</RouterLink>
<RouterLink class="text-slate-400 hover:text-slate-900 transition-colors duration-500" :to="{ name: 'home-page' }">Privacy</RouterLink>
</div>
<p class="font-serif text-sm tracking-wide text-slate-400">© 1999 — 2024 Shaiyra Gupta. The Curated Life.</p>
</div>
</footer>
</div>
</template>

<script>
export default {
    name: 'Screen13'
}
</script>

<style scoped>
.paper-texture {
    background-image: radial-gradient(#dcdad6 0.5px, transparent 0.5px);
    background-size: 24px 24px;
}
</style>
