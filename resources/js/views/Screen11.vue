<template>
<div class="font-body-md text-on-background">
<!-- TopAppBar -->
<header class="fixed top-0 left-0 w-full flex justify-between items-center px-8 py-6 max-w-screen-2xl mx-auto bg-stone-50/80 dark:bg-slate-950/80 backdrop-blur-md border-b border-stone-200/50 dark:border-slate-800/50 shadow-[0_4px_30px_rgba(26,43,72,0.03)] z-50">
<div class="text-2xl font-serif font-semibold text-slate-900 dark:text-stone-100 tracking-tighter">Shaiyra Gupta</div>
<nav class="hidden md:flex items-center gap-8 font-serif italic text-lg tracking-tight">
<RouterLink class="text-slate-900 dark:text-stone-100 border-b-2 border-slate-900 dark:border-stone-100 pb-1 font-medium" :to="{ name: 'home-page' }">Timeline</RouterLink>
<RouterLink class="text-slate-500 dark:text-stone-400 hover:text-slate-700 transition-colors" :to="{ name: 'life-feed-page' }">Journal</RouterLink>
<RouterLink class="text-slate-500 dark:text-stone-400 hover:text-slate-700 transition-colors" :to="{ name: 'family-portal-page' }">Guestbook</RouterLink>
<RouterLink class="text-slate-500 dark:text-stone-400 hover:text-slate-700 transition-colors" :to="{ name: 'future-forward-page' }">Portfolio</RouterLink>
</nav>
<div class="flex items-center gap-4">
<button class="material-symbols-outlined text-slate-900 dark:text-stone-100 hover:opacity-80 transition-opacity duration-300">settings</button>
<div class="w-10 h-10 rounded-full overflow-hidden bg-surface-container-highest">
<img alt="Shaiyra's Portrait" class="w-full h-full object-cover" data-alt="A gentle, soft-focus portrait of a newborn baby sleeping peacefully on a cream-colored knit blanket. The lighting is ethereal and warm, suggesting a quiet afternoon in a nursery with high-key light. The color palette consists of soft ivories, muted beiges, and subtle wood tones, embodying a minimalist and sentimental aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHzhz0-ixbrMXEFMa1SydfYXPhqTirR8HfkIC3d5YRyLAcpTpGlPOeqpQV1rHRCx3sg0ljn7GrTRX8gi6kB-A6JNzEGppuBcm6ZViZpVzMlSsHuemE28b6jGISFncmAtpm2UrbU5DpmGuePJDc5p6BllGJiBfcRyOQ4KKQkjUXrZPtRDcpAu-hE0BZtFkRZLVoBlnx7gMi7dyR9s2eHOAyvOeCkukguvAJDM_QL34_COCCxB3tSC90HTBSJvz3K4rVB22AGsjEmQR0"/>
</div>
</div>
</header>
<main class="pt-32">
<!-- Hero Section -->
<section class="max-w-[1120px] mx-auto px-margin-page mb-section-gap">
<div class="flex flex-col md:flex-row items-center gap-gutter">
<div class="w-full md:w-1/2 space-y-6">
<span class="font-label-caps text-label-caps text-secondary uppercase tracking-widest">Est. April 29, 2024</span>
<h1 class="font-display-lg text-display-lg text-primary leading-none">World, Meet <br/><span class="italic font-serif">Shaiyra.</span></h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-md">
                        A digital archive of first breaths, first steps, and the quiet moments in between. This is the curated beginning of a legacy.
                    </p>
<div class="pt-4">
<button class="border border-primary text-primary px-8 py-3 font-label-caps text-label-caps hover:bg-primary hover:text-on-primary transition-all duration-300" @click="$router.push({ name: 'life-feed-page' })">
                            READ THE JOURNAL
                        </button>
</div>
</div>
<div class="w-full md:w-1/2 relative">
<div class="aspect-[4/5] bg-surface-container-high rounded-xl overflow-hidden shadow-[0_30px_60px_rgba(26,43,72,0.08)]">
<img alt="Shaiyra at Birth" class="w-full h-full object-cover" data-alt="A breathtaking, cinematic close-up of a newborn baby's tiny hand holding an adult's finger. The image is bathed in soft, natural window light, creating a high-contrast yet gentle scene with deep shadows and luminous highlights. The background is a soft-focus nursery with hints of sage green and warm wood, maintaining a minimalist and editorial feel." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlDdGxGX-EfBhP0Nr_aEcHafOEPeqFWT3uawIgygZ7Nihp9zEjKjBtQyVqA6J9Wv1bH2EidLtQtTnH0ukX0bMv100AliQ2XIbpvsJvO-oOCtx9ixHEAxeLhsrG24aO9VDoQUYLci33gCVFxp26TFaZWufUWvCeAanmo7VMgb0YAIRem7PiwTXZcw6-x-OPWxOnAYh3_ZvCq01108ajyhyjeCTkN_LUgfWZzzjNB5O9fdhNI50KtJkq1GuNR3ngKINDovFvFzzdccZo"/>
</div>
<div class="absolute -bottom-6 -left-6 bg-white p-6 shadow-xl max-w-[200px] hidden lg:block">
<p class="font-serif italic text-primary-container text-sm leading-relaxed">
                            "The smallest feet make the biggest footprints in our hearts."
                        </p>
</div>
</div>
</div>
</section>
<!-- Growth Timeline Summary -->
<section class="bg-surface-container-low py-section-gap">
<div class="max-w-[1120px] mx-auto px-margin-page">
<div class="text-center mb-16">
<h2 class="font-headline-md text-headline-md text-primary">Milestones &amp; Memories</h2>
<div class="w-12 h-[1px] bg-secondary mx-auto mt-4"></div>
</div>
<div class="relative">
<!-- Vertical Line (Mobile) / Horizontal Line (Desktop) -->
<div class="absolute left-1/2 -translate-x-1/2 w-[1px] h-full timeline-line hidden md:block"></div>
<div class="space-y-24 relative">
<!-- Milestone 1 -->
<div class="flex flex-col md:flex-row items-center justify-between">
<div class="w-full md:w-[45%] text-right hidden md:block">
<h3 class="font-headline-md text-2xl text-primary">The Arrival</h3>
<p class="font-body-md text-on-surface-variant mt-2">A crisp spring morning at 8:42 AM. The world grew a little brighter.</p>
</div>
<div class="w-8 h-8 rounded-full border border-secondary bg-surface flex items-center justify-center z-10">
<div class="w-2 h-2 rounded-full bg-secondary"></div>
</div>
<div class="w-full md:w-[45%] pl-8 md:pl-0">
<div class="md:hidden">
<h3 class="font-headline-md text-2xl text-primary">The Arrival</h3>
<p class="font-body-md text-on-surface-variant mt-2">A crisp spring morning at 8:42 AM.</p>
</div>
<span class="font-serif italic text-secondary text-lg">April 29, 2024</span>
</div>
</div>
<!-- Milestone 2 -->
<div class="flex flex-col md:flex-row items-center justify-between">
<div class="w-full md:w-[45%] pr-8 md:pr-0 text-right">
<span class="font-serif italic text-secondary text-lg">May 12, 2024</span>
</div>
<div class="w-8 h-8 rounded-full border border-secondary bg-surface flex items-center justify-center z-10">
<div class="w-2 h-2 rounded-full bg-secondary"></div>
</div>
<div class="w-full md:w-[45%] pl-8 md:pl-0">
<h3 class="font-headline-md text-2xl text-primary">First Home</h3>
<p class="font-body-md text-on-surface-variant mt-2">Tucked into the nursery for the very first time. Surrounded by love and sage walls.</p>
</div>
</div>
<!-- Milestone 3 -->
<div class="flex flex-col md:flex-row items-center justify-between">
<div class="w-full md:w-[45%] text-right hidden md:block">
<h3 class="font-headline-md text-2xl text-primary">Family Portrait</h3>
<p class="font-body-md text-on-surface-variant mt-2">Grandparents, cousins, and the whole clan. Shaiyra was the center of it all.</p>
</div>
<div class="w-8 h-8 rounded-full border border-secondary bg-surface flex items-center justify-center z-10">
<div class="w-2 h-2 rounded-full bg-secondary"></div>
</div>
<div class="w-full md:w-[45%] pl-8 md:pl-0">
<div class="md:hidden">
<h3 class="font-headline-md text-2xl text-primary">Family Portrait</h3>
<p class="font-body-md text-on-surface-variant mt-2">The whole clan together.</p>
</div>
<span class="font-serif italic text-secondary text-lg">June 05, 2024</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Current Vibes Section -->
<section class="max-w-[1120px] mx-auto px-margin-page py-section-gap">
<div class="flex justify-between items-end mb-12">
<div class="max-w-md">
<h2 class="font-headline-md text-headline-md text-primary">Current Vibes</h2>
<p class="font-body-md text-on-surface-variant mt-2">A snapshot of Shaiyra's world right now.</p>
</div>
<div class="hidden md:block">
<span class="font-serif italic text-secondary">Updated weekly</span>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
<!-- Card 1 -->
<div class="bg-secondary-container/30 p-8 rounded-xl border border-secondary-container/50 hover:shadow-xl transition-shadow duration-500">
<span class="material-symbols-outlined text-secondary text-3xl mb-4">music_note</span>
<h4 class="font-label-caps text-label-caps text-secondary mb-1">CURRENT SONG</h4>
<p class="font-headline-md text-xl text-primary">Brahms Lullaby</p>
<p class="font-body-md text-on-secondary-container mt-2">The only melody that guarantees a peaceful slumber.</p>
</div>
<!-- Card 2 -->
<div class="bg-tertiary-fixed/30 p-8 rounded-xl border border-tertiary-fixed/50 hover:shadow-xl transition-shadow duration-500">
<span class="material-symbols-outlined text-on-tertiary-container text-3xl mb-4">mood</span>
<h4 class="font-label-caps text-label-caps text-on-tertiary-container mb-1">MOOD</h4>
<p class="font-headline-md text-xl text-primary">Sleepy &amp; Sweet</p>
<p class="font-body-md text-on-tertiary-container mt-2">Mostly dreaming of milk and warm swaddles.</p>
</div>
<!-- Card 3 -->
<div class="bg-primary-container/5 p-8 rounded-xl border border-primary-container/10 hover:shadow-xl transition-shadow duration-500">
<span class="material-symbols-outlined text-primary text-3xl mb-4">brick</span>
<h4 class="font-label-caps text-label-caps text-primary mb-1">FAVORITE TOY</h4>
<p class="font-headline-md text-xl text-primary">Silk Bunny</p>
<p class="font-body-md text-on-primary-container mt-2">Soft ears for grasping and a very friendly face.</p>
</div>
</div>
</section>
<!-- Gallery / Scrapbook Section -->
<section class="max-w-[1120px] mx-auto px-margin-page mb-section-gap">
<div class="grid grid-cols-12 gap-6">
<div class="col-span-12 md:col-span-8 aspect-video bg-surface-container-high rounded-xl overflow-hidden transform rotate-1 shadow-lg">
<img alt="Quiet Moments" class="w-full h-full object-cover" data-alt="A soft and airy photograph of a nursery bookshelf filled with classic cloth-bound children's books and a vintage wooden toy horse. The scene is shot with a shallow depth of field, focusing on the texture of the linen book covers. The lighting is bright and cheerful, using a palette of creams, sages, and natural wood tones to evoke a sense of timeless elegance." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbsbO1eW0QryCJcCFMIHZqo2Th9XHSDjOpviNwfAU5JglBqb3fCCyED0r-jR_hlKqByN3BqR4boYxQPgfYmPu6k82hi-yXNB6f9jo278Wvv0Amu0zOLiUPJjRt5GSorGuutIMbzSb-NoyfcpZQ44JFCwFpNeKjHAE8kKsXYWKyfsrcHuseLRaNDozrKZQKCKZMvNUs3iL38rIrt3_aJMuI4qEhUkAeU3td7pN9WM7vQ8VkBnuxvj5Euy8JwNd6yR9trSB6lyQ9UOnW"/>
</div>
<div class="col-span-12 md:col-span-4 aspect-square bg-surface-container-high rounded-xl overflow-hidden transform -rotate-2 mt-8 shadow-lg">
<img alt="Sleeping Beauty" class="w-full h-full object-cover" data-alt="A minimalist and high-end lifestyle photograph of a white baby onesie laid out on a marble surface next to a sprig of fresh lavender. The composition is clean and editorial, with soft shadows and a cool, bright lighting setup. The colors are predominantly white and soft grey with a touch of natural purple, fitting the curated life aesthetic perfectly." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzuFHjtqZspiyfr0PowBF0Po3NgVHXW8UpXJK2ASr2BsUnLt-gdz3tdw-0piw2UjvdKkjhFLNgf6i88nF_f2-HQWxwnrnhJ682GPIle29uxzF8qUf0Tklpe8-LMYcrz2yUCzM_9vsQ7HDeVINWYqNeEljKUioy5maf3MEv5wwEtjwF44jiK3pv-d9lKWobWjCCSVqr4xwVkkKGHsPzyqZM7jpw0a0w_AiAXYXRGXelhZh_wS64OyDy194r506YdZIb1U3KCkRzpkO6"/>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-stone-50 dark:bg-slate-950 py-20 px-10 border-t border-stone-200 dark:border-slate-800">
<div class="flex flex-col md:flex-row justify-between items-center w-full max-w-7xl mx-auto gap-8">
<div class="font-serif italic text-slate-400">© 1999 — 2024 Shaiyra Gupta. The Curated Life.</div>
<nav class="flex gap-8 font-serif text-sm tracking-wide">
<RouterLink class="text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 transition-colors duration-500" :to="{ name: 'family-portal-page' }">Contact</RouterLink>
<RouterLink class="text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 transition-colors duration-500" :to="{ name: 'milestones-page' }">Archives</RouterLink>
<RouterLink class="text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 transition-colors duration-500" :to="{ name: 'future-forward-page' }">Future Self</RouterLink>
<RouterLink class="text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 transition-colors duration-500" :to="{ name: 'home-page' }">Privacy</RouterLink>
</nav>
<div class="flex items-center gap-4">
<RouterLink class="w-8 h-8 rounded-full border border-stone-200 flex items-center justify-center hover:bg-stone-100 transition-colors" :to="{ name: 'family-portal-page' }">
<span class="material-symbols-outlined text-sm">favorite</span>
</RouterLink>
</div>
</div>
</footer>
</div>
</template>

<script>
export default {
    name: 'Screen11'
}
</script>

<style scoped>
.timeline-line {
    background: linear-gradient(to bottom, transparent, #566252 10%, #566252 90%, transparent);
}
</style>
