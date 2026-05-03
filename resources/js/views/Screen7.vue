<template>
<div class="bg-background text-on-surface font-body-md selection:bg-secondary-container selection:text-on-secondary-container">
<!-- TopAppBar -->
<header class="fixed top-0 left-0 w-full flex justify-between items-center px-8 py-6 max-w-screen-2xl mx-auto bg-stone-50/80 dark:bg-slate-950/80 backdrop-blur-md text-slate-900 dark:text-stone-100 docked full-width z-50 border-b border-stone-200/50 dark:border-slate-800/50 shadow-[0_4px_30px_rgba(26,43,72,0.03)]">
<div class="text-2xl font-serif font-semibold text-slate-900 dark:text-stone-100 tracking-tighter">Shaiyra Gupta</div>
<nav class="hidden md:flex gap-8 items-center">
<a class="font-serif italic text-lg tracking-tight text-slate-500 dark:text-stone-400 hover:text-slate-700 transition-colors" href="#">Timeline</a>
<a class="font-serif italic text-lg tracking-tight text-slate-900 dark:text-stone-100 border-b-2 border-slate-900 dark:border-stone-100 pb-1 font-medium" href="#">Journal</a>
<a class="font-serif italic text-lg tracking-tight text-slate-500 dark:text-stone-400 hover:text-slate-700 transition-colors" href="#">Guestbook</a>
<a class="font-serif italic text-lg tracking-tight text-slate-500 dark:text-stone-400 hover:text-slate-700 transition-colors" href="#">Portfolio</a>
</nav>
<div class="flex items-center gap-4">
<button class="material-symbols-outlined hover:opacity-80 transition-opacity duration-300 scale-95 duration-200 ease-out" data-icon="settings">settings</button>
<div class="w-10 h-10 rounded-full bg-surface-container-highest overflow-hidden border border-outline-variant">
<img alt="Shaiyra's Portrait" data-alt="A professional and soft-lit portrait of a young woman with a serene expression, positioned against a minimalist, warm cream-colored background. Her style is elegant and modern, reflecting a curated life of sophistication and creative depth. The image uses high-key lighting to emphasize clarity and a gentle, paper-like texture characteristic of editorial photography." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA1VZbOssgSb8PuroeUtQqtG6xQ8LTcTjuZK15sPfeUGIaP2dcswALdS3AhZpZW1e6l5RzgIPoVLFlOrWnwAUF5iGhye6GdZD9BwdCqqsVysxXT9RolYvfWIocQkVjhQdV8vVv-4Qp4nUk41uJ2FLkx4lLHwMg9RG27pxyQI7RkiV5glol-GfIT69nTYNEnpAbmo3BMDFSbMRY-73MLfzSDmnSh6cJqFd-Z_q1yblt3SFnZYTGH-CAh4NVTeJJ-IBmsl3ddIvFVV7Dc"/>
</div>
</div>
</header>
<main class="pt-32 pb-section-gap">
<!-- Hero Title Section -->
<section class="max-w-container-max mx-auto px-gutter mb-16 text-center">
<h1 class="font-display-lg text-display-lg text-primary mb-4 italic">Chapters of Life</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">A delicate record of milestones, whispers, and the quiet beauty of growing up. Every entry is a preserved fragment of time.</p>
</section>
<!-- Filters Bar -->
<section class="max-w-container-max mx-auto px-gutter mb-20">
<div class="bg-surface-container-low rounded-xl p-4 flex flex-col md:flex-row items-center justify-between gap-6 border border-outline-variant/30">
<div class="flex items-center gap-4 overflow-x-auto pb-2 md:pb-0 w-full md:w-auto no-scrollbar">
<span class="font-label-caps text-label-caps text-on-surface-variant uppercase whitespace-nowrap">Filter by Age:</span>
<button class="px-4 py-1.5 rounded-full bg-primary text-on-primary font-label-caps text-[11px] whitespace-nowrap">All Time</button>
<button class="px-4 py-1.5 rounded-full bg-white border border-outline-variant text-on-surface-variant font-label-caps text-[11px] whitespace-nowrap hover:bg-secondary-container transition-colors">Newborn</button>
<button class="px-4 py-1.5 rounded-full bg-white border border-outline-variant text-on-surface-variant font-label-caps text-[11px] whitespace-nowrap hover:bg-secondary-container transition-colors">1-3 Months</button>
<button class="px-4 py-1.5 rounded-full bg-white border border-outline-variant text-on-surface-variant font-label-caps text-[11px] whitespace-nowrap hover:bg-secondary-container transition-colors">6 Months+</button>
<button class="px-4 py-1.5 rounded-full bg-white border border-outline-variant text-on-surface-variant font-label-caps text-[11px] whitespace-nowrap hover:bg-secondary-container transition-colors">1 Year</button>
</div>
<div class="flex items-center gap-4 w-full md:w-auto">
<span class="font-label-caps text-label-caps text-on-surface-variant uppercase whitespace-nowrap">Category:</span>
<select class="bg-transparent border-none font-label-caps text-[11px] text-primary focus:ring-0 cursor-pointer">
<option>All Types</option>
<option>Photos</option>
<option>Videos</option>
<option>Milestones</option>
</select>
</div>
</div>
</section>
<!-- Chronological Scrapbook Feed -->
<section class="max-w-container-max mx-auto px-gutter relative timeline-line">
<!-- Entry 1: Large Photo Milestone -->
<div class="relative z-10 flex flex-col md:flex-row items-center gap-12 mb-section-gap">
<div class="flex-1 order-2 md:order-1">
<div class="bg-white p-6 shadow-[0_30px_60px_rgba(26,43,72,0.05)] rounded-sm transform -rotate-1 border border-surface-container-highest">
<img alt="First Snow" class="w-full h-[500px] object-cover mb-6" data-alt="A cinematic, low-angle shot of a serene mountain landscape under a starlit sky, captured in a minimalist light-mode aesthetic. The composition features soft, diffused lighting and a cool color palette of whites and pale blues, reflecting the tranquility of a first snow. The overall mood is ethereal and curated, mirroring a high-end editorial scrapbook entry." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCC5QQ19_iPlfeRUAIvAjCgniopfMVmGgemfaZqyuSOrdom4hyTsHWLrKH6GrrWok2kCjZP1Jwb7LuPq6dljP-VIfjIe8C7A8Y_FUlflVaUq3W3a70HD3DD8-2oVIbsfAb2C8W-hYY7g-L-5uxL32XwllnCSHACOJkrqtSnm4s5PirpkG2o6aEaMQeDQbN_Ax-QcAWoTi6od_-U5rK1kuWms3N7mR2rF5-dfrqLlBEzP6Kz315nmlX04y-x9Dfshnn8bp0VM4ZCsmr"/>
<div class="space-y-3">
<span class="font-label-caps text-label-caps text-on-secondary-container bg-secondary-container px-2 py-0.5 rounded">Milestone</span>
<h3 class="font-headline-md text-headline-md text-primary">The First Winter Silence</h3>
<p class="font-body-md text-body-md text-on-surface-variant">The morning the world went white. We wrapped her in three layers of wool and watched her eyes widen at the quiet flakes.</p>
</div>
</div>
</div>
<div class="w-24 h-24 rounded-full bg-background border-2 border-primary flex items-center justify-center z-20 order-1 md:order-2 shrink-0">
<span class="font-display-lg text-xl text-primary italic">Dec</span>
</div>
<div class="flex-1 hidden md:block order-3"></div>
</div>
<!-- Entry 2: Asymmetric Layout (Video/Snippet) -->
<div class="relative z-10 flex flex-col md:flex-row items-center gap-12 mb-section-gap">
<div class="flex-1 hidden md:block"></div>
<div class="w-20 h-20 rounded-full bg-background border border-outline flex items-center justify-center z-20 shrink-0">
<span class="font-display-lg text-lg text-on-surface-variant italic">Oct</span>
</div>
<div class="flex-1">
<div class="bg-surface-container-low p-8 rounded-xl border border-outline-variant/20 shadow-sm relative group">
<div class="absolute -top-4 -right-4 bg-tertiary-fixed-dim p-3 rounded-full text-on-tertiary-fixed-variant">
<span class="material-symbols-outlined" data-icon="play_circle">play_circle</span>
</div>
<div class="aspect-video bg-black/5 rounded overflow-hidden mb-6 relative">
<img alt="Video Snippet" class="w-full h-full object-cover opacity-80" data-alt="A soft-focus lifestyle photograph of a minimalist nursery interior during the golden hour. The sunlight filters through linen curtains, casting long, elegant shadows across a wooden floor. The scene is dominated by a palette of warm creams and muted sages, creating a serene and timeless atmosphere for a digital journal entry." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_4ilJjGMZisU7wddNlPhKWD_6zxpCWb7oZ1gffNe-wQA3gJ6dFAAOTm_EDz3SKXqYCfEp6Mn954m6Vln_92LwUg2jEWM8D3kOVQDwTMCmRu-X5mDa0vCF-IG_t5CyqsO9DXrvPgVm1jbtbEqVgQEEzXVMJcNC3LGReRMY-O3cPJbZdWZpuXJ_cVgqJeZFuOMxGiJ_BI9EO4Ix2u5NJP7398CAX12VJYIXT38BkL_iNxpj4dWjns22sy9u5uil-GmKjB0NMhF5UEhv"/>
<div class="absolute inset-0 flex items-center justify-center">
<span class="material-symbols-outlined text-white text-5xl opacity-80" data-icon="play_arrow" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
</div>
</div>
<h3 class="font-headline-md text-2xl text-primary mb-2 italic">Laughter in the Living Room</h3>
<p class="font-body-md text-body-md text-on-surface-variant italic">"A small clip of the first time she really, truly laughed at the puppy's sneeze."</p>
</div>
</div>
</div>
<!-- Entry 3: Legacy Message Style -->
<div class="relative z-10 flex flex-col md:flex-row items-center gap-12 mb-section-gap">
<div class="flex-1">
<div class="bg-secondary-container/30 p-10 rounded-none border-l-4 border-secondary shadow-sm">
<span class="material-symbols-outlined text-secondary mb-4" data-icon="auto_stories">auto_stories</span>
<p class="font-headline-md text-2xl leading-relaxed text-on-secondary-container mb-8 italic">
                            "To my daughter, on your third month. You have started to reach for the light. I hope you never stop reaching for things that glow."
                        </p>
<div class="flex items-center justify-between border-t border-secondary/20 pt-4">
<span class="font-label-caps text-label-caps text-secondary uppercase">A Note from Mama</span>
<span class="font-body-md text-sm text-on-secondary-container">Sept 14, 2024</span>
</div>
</div>
</div>
<div class="w-16 h-16 rounded-full bg-secondary text-white flex items-center justify-center z-20 shrink-0">
<span class="material-symbols-outlined" data-icon="favorite" style="font-variation-settings: 'FILL' 1;">favorite</span>
</div>
<div class="flex-1 hidden md:block"></div>
</div>
<!-- Entry 4: Masonry Style Grid -->
<div class="relative z-10 flex flex-col md:flex-row items-start gap-12">
<div class="flex-1 hidden md:block"></div>
<div class="w-20 h-20 rounded-full bg-background border border-outline flex items-center justify-center z-20 shrink-0 mt-20">
<span class="font-display-lg text-lg text-on-surface-variant italic">Aug</span>
</div>
<div class="flex-1">
<div class="grid grid-cols-2 gap-4">
<div class="space-y-4">
<div class="bg-white p-2 shadow-sm border border-surface-container-highest">
<img alt="Toy" class="w-full aspect-square object-cover" data-alt="A minimalist, high-detail macro shot of a handcrafted wooden child's toy resting on a textured linen surface. The lighting is soft and side-lit, emphasizing the grain of the wood and the clean, organic shapes. The color palette is composed of warm neutrals and soft tans, fitting the professional scrapbook aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAhmUUlu2vAzNnZyDU6PWXgk3scVVtxnasIMSAiK3ih5iQX9zk3RT29ohTkM80fFoKbpGOkc5I3Z-ECj7eTh-9-wsUKlq1e17islVlEQ2Y7UMoIJrJdgfVlCPGzsb-sLOAMq0Y9qu23VLa1HSTES7Yfif-aU8ThWKcFfgUEw-24ZdIPMsMGjsNMLTzQjRU118Bh1fSL40fKgbl0ZARd9QiE0mU6IwrREAc_YQ9mXSnxqsZ2lj9sYD32YkAqtZw-Njf6SRPKjoMF4-mf"/>
</div>
<div class="bg-white p-2 shadow-sm border border-surface-container-highest transform rotate-2">
<img alt="Hands" class="w-full aspect-[3/4] object-cover" data-alt="A tender, close-up photograph of an adult's hand gently holding a newborn's tiny hand. The shot is captured with a shallow depth of field against a soft, creamy background. The mood is intimate and peaceful, with a professional light-mode aesthetic that highlights skin textures and the warmth of the moment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkPNWofctEu8F5R9o7f1E4UugxFvoFP9g5FXZafRO7kGXvxEkLOyJOOkOWtPDRyGiyYNqUlPJwkv652amTlEyAVWa2yh0HSASoAH9SAfKLn4oX-nmx1YTYYvbuDgNvXSXtjPV-tPol0C6SG0a3wXyj9bb_gsYb6eOdOaBvaTohNCHpwdiYvQg5cm1kO18u9rP-adl-RuvLXTL9ukXzWa4v9bF92IOtCnJff31N6wJTpHy6tgLk-csKwztl-WC1P_GU6jg2e55K7HK8"/>
</div>
</div>
<div class="pt-12 space-y-4">
<div class="bg-white p-2 shadow-sm border border-surface-container-highest transform -rotate-2">
<img alt="Shoes" class="w-full aspect-[2/3] object-cover" data-alt="An editorial-style photograph of a pair of tiny, white leather baby shoes sitting on a vintage wooden bench. The background is slightly blurred, showing a hints of a lush, green garden during a soft overcast day. The lighting is even and gentle, emphasizing the minimalist and curated lifestyle brand." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcVUPUmyKsuBJTg-j5ZH_57phtJiH1yY3p3rPkAwCkU_ZAbroO5N5hMAshP87k6ofCO3pQbP55IT6_nQD-EilRoIbSV-d_0rDp39Uxw4hXZ3qqf7i2YUa0rLj9exWefGI8TcNbVHDskvcRrJX6_Mk0n9sdO1b1QH_GJCBUkPOe83CwOtdnM_RJOkqn_k0FvOamyTnsPy_yxLLipkRjdBVOOrQIgS8LyH6v6yayyO8JO3HPu_Um6FW3_4MDXj2UfNF_DVbQVmnvua-h"/>
</div>
<div class="p-4">
<h4 class="font-label-caps text-label-caps text-primary uppercase mb-2">August Curations</h4>
<p class="font-body-md text-sm text-on-surface-variant">The small things. The tiny shoes that don't fit yet, the wooden duck, and the way you hold my thumb.</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Load More Anchor -->
<div class="mt-section-gap flex justify-center">
<button class="flex items-center gap-2 group">
<span class="w-12 h-[1px] bg-outline-variant group-hover:w-20 transition-all"></span>
<span class="font-label-caps text-label-caps text-on-surface-variant uppercase tracking-widest">Leaf Through More Chapters</span>
<span class="w-12 h-[1px] bg-outline-variant group-hover:w-20 transition-all"></span>
</button>
</div>
</main>
<!-- Footer -->
<footer class="bg-stone-50 dark:bg-slate-950 text-slate-900 dark:text-stone-100 full-width py-20 px-10 border-t border-stone-200 dark:border-slate-800 shadow-none">
<div class="flex flex-col md:flex-row justify-between items-center w-full max-w-7xl mx-auto gap-8">
<div class="font-serif italic text-slate-400">The Curated Life.</div>
<div class="flex gap-8">
<a class="font-serif text-sm tracking-wide text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 hover:opacity-80 transition-opacity transition-colors duration-500" href="#">Contact</a>
<a class="font-serif text-sm tracking-wide text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 hover:opacity-80 transition-opacity transition-colors duration-500" href="#">Archives</a>
<a class="font-serif text-sm tracking-wide text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 hover:opacity-80 transition-opacity transition-colors duration-500" href="#">Future Self</a>
<a class="font-serif text-sm tracking-wide text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 hover:opacity-80 transition-opacity transition-colors duration-500" href="#">Privacy</a>
</div>
<div class="font-serif text-sm tracking-wide">© 1999 — 2024 Shaiyra Gupta. The Curated Life.</div>
</div>
</footer>
</div>
</template>

<script>
export default {
    name: 'Screen7'
}
</script>

<style scoped>
.timeline-line::before {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 1px;
    height: 100%;
    background-color: #031632;
    opacity: 0.1;
    z-index: 0;
}
</style>
