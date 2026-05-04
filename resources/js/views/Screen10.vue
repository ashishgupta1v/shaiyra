<template>
<div class="font-body-md text-on-surface selection:bg-secondary-container selection:text-on-secondary-container">
<!-- TopAppBar -->
<header class="bg-stone-50/80 dark:bg-slate-950/80 backdrop-blur-md text-slate-900 dark:text-stone-100 border-b border-stone-200/50 dark:border-slate-800/50 shadow-[0_4px_30px_rgba(26,43,72,0.03)] fixed top-0 left-0 w-full z-50">
<div class="max-w-screen-2xl mx-auto flex justify-between items-center px-8 py-6">
<div class="text-2xl font-serif font-semibold text-slate-900 dark:text-stone-100 tracking-tighter">Shaiyra Gupta</div>
<nav class="hidden md:flex items-center space-x-8 font-serif italic text-lg tracking-tight">
<RouterLink class="text-slate-500 dark:text-stone-400 hover:text-slate-700 transition-colors" :to="{ name: 'home-page' }">Timeline</RouterLink>
<RouterLink class="text-slate-500 dark:text-stone-400 hover:text-slate-700 transition-colors" :to="{ name: 'life-feed-page' }">Journal</RouterLink>
<RouterLink class="text-slate-500 dark:text-stone-400 hover:text-slate-700 transition-colors" :to="{ name: 'family-portal-page' }">Guestbook</RouterLink>
<RouterLink class="text-slate-900 dark:text-stone-100 border-b-2 border-slate-900 dark:border-stone-100 pb-1 font-medium" :to="{ name: 'future-forward-page' }">Portfolio</RouterLink>
</nav>
<div class="flex items-center gap-4">
<button class="hover:opacity-80 transition-opacity duration-300">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<div class="w-10 h-10 rounded-full bg-surface-container-highest overflow-hidden">
<img alt="Shaiyra's Portrait" class="w-full h-full object-cover" data-alt="A professional close-up portrait of a young woman with a thoughtful expression, set against a neutral, softly lit studio background. The lighting is warm and diffused, emphasizing a clean, high-end professional aesthetic. The image uses a palette of soft creams and muted earthy tones, reflecting a minimalist yet sophisticated brand identity that feels both approachable and authoritative." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAvnUCKX-BUEzZOSouCQndTK5mwyy1OnAvto9J7Cx7nAfzCzQRakosqC7LKkyz1UH-o4b_-IWsuPp7UqTgepuVBo1xe7Ic9jOCcVqjrbQ-mDDALzIU1Xoy7N-aVf-JiRD-ndsWNYFsuDxltWyipMMWIWFKqEH5FvcBIPLbNzJLLJ4go5Tj37mAVOt14juuuP0sMBZbyU34UBUVr434Lmyq1TqJwsbEF1sDPqAAtb9Pqi_FvZpKwiyR32SkQpLt_6kEW0vf4x8Dke45-"/>
</div>
</div>
</div>
</header>
<main class="pt-32 pb-section-gap max-w-[1120px] mx-auto px-margin-page">
<!-- Hero Section -->
<section class="mb-section-gap text-center">
<div class="inline-block px-4 py-1 mb-6 border border-outline/20 rounded-full">
<span class="font-label-caps text-label-caps text-secondary uppercase tracking-widest">The Professional Hub</span>
</div>
<h1 class="font-display-lg text-display-lg mb-4 text-primary">Future Forward</h1>
<p class="font-headline-md text-headline-md italic text-on-surface-variant max-w-2xl mx-auto">
                Building a legacy, one step at a time.
            </p>
</section>
<!-- Education & Learning (Timeline Pattern) -->
<section class="mb-section-gap">
<div class="flex items-center gap-6 mb-12">
<h2 class="font-headline-md text-headline-md text-primary">Education &amp; Learning</h2>
<div class="h-[1px] flex-grow bg-outline/20"></div>
</div>
<div class="relative pl-12 space-y-16 border-l border-primary/10">
<!-- Education Item 1 -->
<div class="relative group">
<div class="absolute -left-[54px] top-2 w-4 h-4 rounded-full border-2 border-primary bg-background group-hover:scale-125 transition-transform duration-300"></div>
<div class="grid md:grid-cols-4 gap-8">
<div class="md:col-span-1">
<span class="font-label-caps text-label-caps text-on-primary-container bg-primary-container/10 px-3 py-1 rounded">2024 — PRESENT</span>
</div>
<div class="md:col-span-3">
<h3 class="font-headline-md text-[24px] text-primary mb-2">Master of Design Innovation</h3>
<p class="font-body-lg text-body-lg text-secondary mb-4">Focusing on Human-Centered Systems and Future Narratives. Exploring the intersection of digital craft and physical experience.</p>
<div class="flex gap-2">
<span class="text-xs font-label-caps bg-surface-container px-2 py-1 text-on-surface-variant">Cognitive Science</span>
<span class="text-xs font-label-caps bg-surface-container px-2 py-1 text-on-surface-variant">Speculative Design</span>
</div>
</div>
</div>
</div>
<!-- Education Item 2 -->
<div class="relative group">
<div class="absolute -left-[54px] top-2 w-4 h-4 rounded-full border-2 border-outline bg-background group-hover:scale-125 transition-transform duration-300"></div>
<div class="grid md:grid-cols-4 gap-8">
<div class="md:col-span-1">
<span class="font-label-caps text-label-caps text-outline">2019 — 2023</span>
</div>
<div class="md:col-span-3">
<h3 class="font-headline-md text-[24px] text-primary mb-2">Bachelor of Visual Arts</h3>
<p class="font-body-lg text-body-lg text-secondary mb-4">Honors in Editorial Design and Typography. Developed a rigorous foundation in visual hierarchy and professional storytelling.</p>
<div class="flex gap-2">
<span class="text-xs font-label-caps bg-secondary-container text-on-secondary-container px-2 py-1">Distinction</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Projects & Creations (Bento Grid) -->
<section class="mb-section-gap">
<div class="flex items-center gap-6 mb-12">
<h2 class="font-headline-md text-headline-md text-primary">Projects &amp; Creations</h2>
<div class="h-[1px] flex-grow bg-outline/20"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
<!-- Featured Project -->
<div class="md:col-span-2 row-span-2 bg-surface-container-low rounded-xl overflow-hidden group border border-outline/10 hover:shadow-[0_20px_50px_rgba(26,43,72,0.05)] transition-shadow duration-500">
<div class="h-80 overflow-hidden">
<img alt="Digital Archive Project" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="An artistic high-angle shot of a sleek, modern workspace featuring a high-end monitor displaying a complex editorial interface. The color palette is composed of cool grays, deep navies, and warm wood tones. The lighting is crisp and professional, highlighting the texture of paper and the glow of the screen, creating an atmosphere of deep focus and creative production." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAg-mHITx7QhkLnSo5s3jcR3MPSH7azmS53sOFnRI90x4QWLj1-n3U4jTfavFq9_dnOvcfJHQS0UC4WcQ1hXWB9v0dbpku-46bV7WyZo7Pr_O4JqHi_2hdc7yxM0XVE7j2mjkfCcWPmF4E18Eoe7hrxRF0KV-LoJ2DAD2sknbMHk6G-JzmNR2o2rNNIGFlKNaUsuOXfeGTdLVKGActYlqKTtZ4dIsVhi77g50IEl1lBXjyvwlxL4vge4yo0Y03LPkr5VgYY1jJPUm9H"/>
</div>
<div class="p-8">
<span class="font-label-caps text-label-caps text-on-secondary-container mb-2 block">EDITORIAL / DIGITAL ARCHIVE</span>
<h3 class="font-headline-md text-headline-md text-primary mb-4">The Curated Life: Digital Edition</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-6">A multi-platform experience designed to preserve personal histories through minimalist interface design and tonal storytelling.</p>
<RouterLink class="inline-flex items-center gap-2 font-label-caps text-label-caps border-b border-primary pb-1 group-hover:gap-4 transition-all" :to="{ name: 'achievements-page' }">
                            VIEW CASE STUDY <span class="material-symbols-outlined !text-sm" data-icon="arrow_forward">arrow_forward</span>
</RouterLink>
</div>
</div>
<!-- Secondary Project -->
<div class="bg-primary-container text-white p-8 rounded-xl flex flex-col justify-between border border-primary">
<div>
<span class="material-symbols-outlined text-4xl mb-6 text-on-primary-container" data-icon="terminal">terminal</span>
<h3 class="font-headline-md text-[24px] mb-4">Future Syntax</h3>
<p class="font-body-md text-primary-fixed-dim/80">Exploring the visual language of future operating systems and AI-driven interfaces.</p>
</div>
<button class="mt-8 px-6 py-3 border border-on-primary-container/30 rounded-lg font-label-caps text-label-caps hover:bg-white/10 transition-colors">RESEARCH PAPER</button>
</div>
<!-- Tertiary Project -->
<div class="bg-surface-container-highest p-8 rounded-xl border border-outline/10 group">
<h3 class="font-headline-md text-[24px] text-primary mb-4">Kinship Branding</h3>
<p class="font-body-md text-on-surface-variant mb-6">Identity system for a boutique heritage preservation firm.</p>
<div class="aspect-square bg-white rounded-lg overflow-hidden">
<img alt="Branding project" class="w-full h-full object-cover group-hover:opacity-80 transition-opacity" data-alt="An abstract minimalist graphic design featuring flowing organic shapes in shades of charcoal, slate, and sand. The composition is balanced and elegant, suggesting a sense of heritage and timelessness. The lighting in the graphic appears soft and even, mimicking high-quality print on textured matte paper." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCTkfTFMVl29q8VWOKiWsTE-SR70dyM2UuSYyu3FFjGQF0_TxbC0-uApZ5Ne77_H2bN3RA5ozuYv3J-cS63OOMr0CWvIn6vRagDp3k5l-6gScLHAX36x-kMOXEPHg_Z2SsqrDWpL5fB2l_UT_RtwuPx5KE_htUJ-9i8_m4C-QA4t9Ut_OGDTl6XpDuty5r7fCGxMVU6btqZMR8uBgajb8OzHRumE0up37xsvK1-gwuS3vVqeuIkcqYI0C5DhmPFUI1cq2Gtivv6AUYL"/>
</div>
</div>
</div>
</section>
<!-- Skills (Structured Grid) -->
<section>
<div class="flex items-center gap-6 mb-12">
<h2 class="font-headline-md text-headline-md text-primary">Skills</h2>
<div class="h-[1px] flex-grow bg-outline/20"></div>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-gutter">
<div class="space-y-6">
<h4 class="font-label-caps text-label-caps text-secondary border-b border-outline/10 pb-2">DESIGN</h4>
<ul class="font-body-md text-on-surface space-y-3">
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Visual Identity</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Typography</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> UI/UX Design</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Motion Design</li>
</ul>
</div>
<div class="space-y-6">
<h4 class="font-label-caps text-label-caps text-secondary border-b border-outline/10 pb-2">STRATEGY</h4>
<ul class="font-body-md text-on-surface space-y-3">
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Brand Vision</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> User Research</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Content Design</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Design Systems</li>
</ul>
</div>
<div class="space-y-6">
<h4 class="font-label-caps text-label-caps text-secondary border-b border-outline/10 pb-2">TECH</h4>
<ul class="font-body-md text-on-surface space-y-3">
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> HTML / CSS</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Figma Mastery</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Adobe Suite</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Webflow</li>
</ul>
</div>
<div class="space-y-6">
<h4 class="font-label-caps text-label-caps text-secondary border-b border-outline/10 pb-2">SOFT SKILLS</h4>
<ul class="font-body-md text-on-surface space-y-3">
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Mentorship</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Public Speaking</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Collaboration</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span> Empathy</li>
</ul>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-stone-50 dark:bg-slate-950 border-t border-stone-200 dark:border-slate-800 py-20 px-10">
<div class="flex flex-col md:flex-row justify-between items-center w-full max-w-7xl mx-auto gap-8 font-serif text-sm tracking-wide text-slate-900 dark:text-stone-100">
<div class="font-serif italic text-slate-400">© 1999 — 2024 Shaiyra Gupta. The Curated Life.</div>
<div class="flex gap-8">
<RouterLink class="text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 transition-colors duration-500" :to="{ name: 'family-portal-page' }">Contact</RouterLink>
<RouterLink class="text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 transition-colors duration-500" :to="{ name: 'milestones-page' }">Archives</RouterLink>
<RouterLink class="text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 transition-colors duration-500" :to="{ name: 'future-forward-page' }">Future Self</RouterLink>
<RouterLink class="text-slate-400 dark:text-stone-500 hover:text-slate-900 dark:hover:text-stone-200 transition-colors duration-500" :to="{ name: 'home-page' }">Privacy</RouterLink>
</div>
<div class="flex items-center gap-4 text-slate-400">
<span class="material-symbols-outlined" data-icon="share">share</span>
<span class="material-symbols-outlined" data-icon="mail">mail</span>
</div>
</div>
</footer>
</div>
</template>

<script>
export default {
    name: 'Screen10'
}
</script>

<style scoped>
</style>
