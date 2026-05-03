<template>
<div class="bg-background text-on-surface">
<!-- Top Navigation Bar (Shared Component Logic) -->
<div class="relative flex h-auto min-h-screen w-full flex-col bg-gray-50 group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#eaecf1] px-10 py-3 bg-white/80 backdrop-blur-md sticky top-0 z-50">
<div class="flex items-center gap-4 text-[#111318]">
<div class="size-4">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_6_535)">
<path clip-rule="evenodd" d="M47.2426 24L24 47.2426L0.757355 24L24 0.757355L47.2426 24ZM12.2426 21H35.7574L24 9.24264L12.2426 21Z" fill="currentColor" fill-rule="evenodd"></path>
</g>
<defs>
<clippath id="clip0_6_535"><rect fill="white" height="48" width="48"></rect></clippath>
</defs>
</svg>
</div>
<h2 class="text-[#111318] text-lg font-bold leading-tight tracking-[-0.015em] serif-display">Wellness Archive</h2>
</div>
<div class="flex flex-1 justify-end gap-8">
<label class="flex flex-col min-w-40 !h-10 max-w-64">
<div class="flex w-full flex-1 items-stretch rounded-lg h-full">
<div class="text-[#5d6d89] flex border-none bg-[#eaecf1] items-center justify-center pl-4 rounded-l-lg border-r-0" data-icon="MagnifyingGlass" data-size="24px" data-weight="regular">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111318] focus:outline-0 focus:ring-0 border-none bg-[#eaecf1] focus:border-none h-full placeholder:text-[#5d6d89] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal" placeholder="Search" value=""/>
</div>
</label>
<div class="flex gap-2">
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#eaecf1] text-[#111318] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<div class="text-[#111318]" data-icon="Bell" data-size="20px" data-weight="regular">
<span class="material-symbols-outlined">notifications</span>
</div>
</button>
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#eaecf1] text-[#111318] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<div class="text-[#111318]" data-icon="UserCircle" data-size="20px" data-weight="regular">
<span class="material-symbols-outlined">account_circle</span>
</div>
</button>
</div>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="A professional and soft studio portrait of a woman with a gentle expression, lit by natural side-lighting. The background is a clean, neutral cream color that aligns with a minimalist and sophisticated editorial style. The overall mood is calm, trustworthy, and archived with high-quality clarity." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCTLd1uDxz-l-GQENW3KOzGpqCw7joaXFa791hXKd_8hqeV0oYJzE8pKfaeNZcZDLVaF1p9mP_fl2IlPHT2-hsPS1Mi29Mb76tr4OthVyTPPeRpLxpMdoBtuckka5NijVQIRZXp_bEvUzb5kydnQbjdkZx0f4GO4_Por4c9TatmREEtL9940u_2fRz_jyWlWw_Y0z8roBR_-OR-fUL4u7ZsiEsZmSiWOhpooV0Hc-Ji3BjShVlnvlUMM0vkg4W5dO2jBaZzpANKD-C8");'></div>
</div>
</header>
<!-- Profile Header -->
<div class="flex p-8 flex-col items-center bg-background border-b border-surface-variant">
<div class="flex w-full flex-col gap-6 items-center">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full min-h-32 w-32 ring-4 ring-white shadow-sm" data-alt="Close up portrait of a professional woman in her 30s, looking directly at the camera with a subtle, confident smile. The lighting is soft and diffused, highlighting natural skin textures in a high-end editorial fashion. The color palette is composed of warm beige and neutral tones, evoking a sense of stable wellness and personal care." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCXy8R9FD1wic-329lFSElLjbUGqjmXGknGFrlEyog3kMOa607hUEbm1i8Xk6bDR4_VgijPG0jVTOctdwNDCeSo7XQPeG0lyej15uCbDNvI2clGOZ36JyXSd0OOkjOZ-Slisy3w-jnIJrMIeuu_T6TsxEB9M3IVxZwL72GhWRgDTNdMNv-iTEdOlWgF7taU75cnGBaszl7YQFZDhFdDPie3Y9EVfcKH-2xo24D9eAu6uBIuB03sKRJZ98QTDWHmikouWek2jJ94SWTi");'></div>
<div class="flex flex-col items-center justify-center text-center">
<h1 class="text-on-surface text-4xl font-normal leading-tight serif-display">Shaiyra Gupta</h1>
<p class="text-outline text-sm font-bold tracking-widest uppercase mt-2">Medical ID: SG-2024-9981</p>
<p class="text-outline text-base font-normal mt-1 italic">Last synchronized: October 24, 2023 • St. Jude Medical</p>
</div>
</div>
</div>
<!-- Navigation Tabs -->
<nav class="sticky top-[68px] z-40 bg-background/90 backdrop-blur-sm border-b border-surface-variant">
<div class="flex px-4 gap-12 justify-center">
<a class="flex flex-col items-center justify-center border-b-2 border-primary text-primary pb-4 pt-5" href="#">
<span class="text-xs font-bold tracking-widest uppercase">Check-ups</span>
</a>
<a class="flex flex-col items-center justify-center border-b-2 border-transparent text-outline hover:text-primary transition-colors pb-4 pt-5" href="#">
<span class="text-xs font-bold tracking-widest uppercase">Vaccinations</span>
</a>
<a class="flex flex-col items-center justify-center border-b-2 border-transparent text-outline hover:text-primary transition-colors pb-4 pt-5" href="#">
<span class="text-xs font-bold tracking-widest uppercase">General Wellness</span>
</a>
<a class="flex flex-col items-center justify-center border-b-2 border-transparent text-outline hover:text-primary transition-colors pb-4 pt-5" href="#">
<span class="text-xs font-bold tracking-widest uppercase">Legacy Files</span>
</a>
</div>
</nav>
<main class="flex flex-col gap-section-gap py-20 px-4">
<!-- Section: Recent Records (Timeline) -->
<section>
<div class="flex items-baseline justify-between mb-12">
<h2 class="serif-display text-3xl text-primary">Check-up History</h2>
<span class="text-xs font-bold text-outline uppercase tracking-tighter">View All Records →</span>
</div>
<div class="flex flex-col gap-10 timeline-axis pl-8">
<!-- Record Item -->
<div class="relative">
<div class="absolute -left-[36.5px] top-1.5 size-4 rounded-full border-2 border-primary bg-background z-10"></div>
<div class="bg-white p-8 border border-surface-variant shadow-sm rounded-lg flex justify-between items-start">
<div class="flex flex-col gap-2">
<span class="serif-display text-lg text-outline">October 15, 2023</span>
<h3 class="text-xl font-medium text-primary">Annual Comprehensive Screening</h3>
<p class="text-on-surface-variant text-base leading-relaxed max-w-md">Dr. Helena Vance • St. Jude Medical Center. All vitals within normal range. Recommended Vitamin D supplementation for the winter quarter.</p>
</div>
<button class="px-6 py-2 border border-primary text-primary hover:bg-primary hover:text-white transition-all text-sm font-bold uppercase tracking-widest">
                                            Open Results
                                        </button>
</div>
</div>
<!-- Record Item -->
<div class="relative">
<div class="absolute -left-[36.5px] top-1.5 size-4 rounded-full border-2 border-outline bg-background z-10"></div>
<div class="bg-white p-8 border border-surface-variant shadow-sm rounded-lg flex justify-between items-start">
<div class="flex flex-col gap-2">
<span class="serif-display text-lg text-outline">May 22, 2023</span>
<h3 class="text-xl font-medium text-primary">Bi-Annual Dental Prophylaxis</h3>
<p class="text-on-surface-variant text-base leading-relaxed max-w-md">Pearl White Clinic • Dr. Marcus Chen. General cleaning and plaque removal. No cavities detected. Next appointment scheduled for November.</p>
</div>
<button class="px-6 py-2 border border-primary text-primary hover:bg-primary hover:text-white transition-all text-sm font-bold uppercase tracking-widest">
                                            Open Results
                                        </button>
</div>
</div>
</div>
</section>
<!-- Section: Vaccinations (Grid Cards) -->
<section>
<div class="flex items-baseline justify-between mb-12">
<h2 class="serif-display text-3xl text-primary">Vaccination Shield</h2>
<p class="text-on-surface-variant max-w-xs text-sm">A verified record of immunizations maintained with archival precision.</p>
</div>
<div class="grid grid-cols-2 gap-gutter">
<div class="p-8 bg-secondary-container/30 border border-secondary/20 rounded-xl">
<div class="flex justify-between items-start mb-6">
<span class="material-symbols-outlined text-secondary text-3xl" data-weight="fill">verified_user</span>
<span class="text-[10px] font-black uppercase tracking-widest bg-white px-2 py-1 rounded border border-secondary/10">Active Protection</span>
</div>
<h4 class="serif-display text-xl mb-2">Influenza (Quadrivalent)</h4>
<p class="text-sm text-on-secondary-container mb-4">Administered: Sep 10, 2023</p>
<div class="h-px w-full bg-secondary/10 my-4"></div>
<p class="text-xs text-on-secondary-container italic">"Patient showed no immediate adverse reaction. Immunity expected through Spring 2024."</p>
</div>
<div class="p-8 bg-surface-container border border-surface-variant rounded-xl">
<div class="flex justify-between items-start mb-6">
<span class="material-symbols-outlined text-outline text-3xl">history</span>
<span class="text-[10px] font-black uppercase tracking-widest bg-white/50 px-2 py-1 rounded border border-surface-variant">Booster Required</span>
</div>
<h4 class="serif-display text-xl mb-2">Tdap (Tetanus, Diphtheria, Pertussis)</h4>
<p class="text-sm text-outline mb-4">Last Dose: June 2014</p>
<div class="h-px w-full bg-surface-variant my-4"></div>
<button class="text-xs font-bold uppercase tracking-widest text-primary flex items-center gap-2">
                                        Schedule Renewal <span class="material-symbols-outlined text-xs">arrow_forward</span>
</button>
</div>
</div>
</section>
<!-- Section: General Wellness (Loose Masonry/Scrapbook Style) -->
<section>
<div class="mb-12">
<h2 class="serif-display text-3xl text-primary">Wellness Journals</h2>
<p class="text-on-surface-variant mt-2">Personal health milestones and holistic wellbeing logs.</p>
</div>
<div class="grid grid-cols-12 gap-8 items-start">
<div class="col-span-7 bg-tertiary-fixed/20 p-10 rounded-2xl border border-tertiary-fixed-dim">
<h3 class="serif-display text-2xl mb-4 italic text-on-tertiary-fixed-variant">Mindfulness &amp; Sleep Analysis</h3>
<p class="body-lg mb-8 text-on-tertiary-fixed-variant">Quarterly reflection: Sleep hygiene has improved by 15% following the introduction of a digital curfew. Average REM sleep cycles recorded at 1.8 hours per night.</p>
<div class="w-full h-64 bg-white rounded-lg overflow-hidden">
<img class="w-full h-full object-cover" data-alt="A tranquil and minimalist scene of a person meditating in a sunlit, white-walled room with a single green plant. The lighting is high-key and ethereal, creating a sense of peace and professional wellness. The style is clean, modern, and editorial, with a focus on serene composition and a warm, natural color palette of whites and soft earth tones." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBJ22ibf1F13vJGSZ7qXBDkcZQGM10XqiB1HuySVIS2PZNSlBTF9SkPrmMCGwd1aatAuLYs1pQrb0aTBE57ByunCm2LQkwntCxed1DmFgZgUh-ts0kohcpzblSyUIHCHz2FFsws2DT2NFzH23ynYts8f1gKB9LPvI70iqp6M-02BJu1hT98bZvPF84l9RYstftu-UpiisJfBH9v7tXqD-Bf1JaEKOyijda9_sjQ7pPaJVNf4TXbKGwoQvnv6iwxKdmnfE73LWK2RQni"/>
</div>
</div>
<div class="col-span-5 flex flex-col gap-8">
<div class="bg-white p-6 border border-surface-variant shadow-sm rotate-2">
<p class="serif-display text-lg mb-2">Vitamin Protocol</p>
<ul class="text-sm space-y-2 text-outline">
<li>• Omega-3 Fish Oil (1000mg)</li>
<li>• Magnesium Glycinate (200mg)</li>
<li>• Vitamin D3 (2000 IU)</li>
</ul>
<div class="mt-4 pt-4 border-t border-dashed border-surface-variant flex items-center gap-3">
<div class="size-8 rounded-full bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-sm">medication</span>
</div>
<span class="text-[10px] font-bold uppercase tracking-tighter">Verified by Pharmacy</span>
</div>
</div>
<div class="bg-primary-container text-white p-8 rounded-lg -rotate-1">
<h4 class="serif-display text-xl mb-4 text-on-primary-fixed">Activity Goal: 10k Steps</h4>
<div class="flex items-end gap-2">
<span class="text-4xl font-bold">88%</span>
<span class="text-xs mb-1 uppercase tracking-widest opacity-60">Avg. Consistency</span>
</div>
<div class="w-full bg-white/10 h-1 mt-4 rounded-full">
<div class="bg-primary-fixed w-[88%] h-full rounded-full"></div>
</div>
</div>
</div>
</div>
</section>
<!-- Legacy Message Area -->
<section class="max-w-3xl mx-auto py-20 px-12 bg-white shadow-2xl rounded-sm border border-surface-container-highest">
<div class="flex flex-col items-center text-center">
<span class="material-symbols-outlined text-4xl text-outline mb-6">workspace_premium</span>
<h2 class="serif-display text-3xl mb-8">Physician's Note for the Archive</h2>
<p class="serif-display text-xl leading-relaxed italic text-on-surface-variant">
                                    "Shaiyra has demonstrated an exceptional commitment to her proactive health management this year. Her metabolic health is at a peak performance level, and her adoption of holistic wellness practices alongside clinical check-ups serves as a model for longitudinal care. We will review her hormonal profile again in Spring."
                                </p>
<div class="mt-10 flex flex-col items-center">
<div class="w-24 h-px bg-primary mb-4"></div>
<p class="font-bold text-primary uppercase tracking-widest text-sm">Dr. Helena Vance</p>
<p class="text-outline text-xs uppercase tracking-tighter">Chief Medical Officer, St. Jude</p>
</div>
</div>
</section>
</main>
<!-- Footer Content -->
<footer class="mt-section-gap pb-20 border-t border-surface-variant pt-10 px-10">
<div class="flex justify-between items-end">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-3">
<div class="size-6 text-primary">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path clip-rule="evenodd" d="M47.2426 24L24 47.2426L0.757355 24L24 0.757355L47.2426 24ZM12.2426 21H35.7574L24 9.24264L12.2426 21Z" fill="currentColor" fill-rule="evenodd"></path>
</svg>
</div>
<span class="serif-display text-xl font-bold">Wellness Archive</span>
</div>
<p class="text-xs text-outline max-w-xs">A secure, encrypted repository of medical history, curated for a life of intentional wellness and health longevity.</p>
</div>
<div class="flex gap-12 text-xs font-bold uppercase tracking-widest text-primary">
<a class="hover:underline" href="#">Privacy Policy</a>
<a class="hover:underline" href="#">Data Export</a>
<a class="hover:underline" href="#">Contact Support</a>
</div>
</div>
<p class="text-[10px] text-outline text-center mt-20 opacity-40">© 2024 SHAIYRA GUPTA WELLNESS LEDGER. ALL RIGHTS RESERVED. ENCRYPTED AT REST.</p>
</footer>
</div>
</div>
</div>
</div>
<div class="fixed top-6 right-6 z-[100] flex items-center gap-2 bg-secondary-container/90 backdrop-blur-md px-4 py-2 rounded-full border border-secondary/20 shadow-lg pointer-events-none">
<span class="material-symbols-outlined text-secondary text-lg" data-weight="fill">lock</span>
<span class="text-[10px] font-black uppercase tracking-widest text-on-secondary-container">Private Archive</span>
</div>
</div>
</template>

<script>
export default {
    name: 'Screen3'
}
</script>

<style scoped>
.serif-display {
    font-family: 'Noto Serif', serif;
}
.archive-border {
    border-bottom: 1px solid #e5e2de;
}
.timeline-axis {
    position: relative;
}
.timeline-axis::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 1px;
    background-color: #1a2b48;
    opacity: 0.2;
}
</style>
