<template>
<div class="bg-background text-on-background font-body-md selection:bg-secondary-container selection:text-on-secondary-container">
<!-- TopNavBar -->
<header class="bg-slate-50/90 backdrop-blur-md dark:bg-slate-900/90 docked full-width top-0 sticky z-50 border-b border-slate-200 dark:border-slate-800 shadow-sm shadow-slate-900/5 transition-all duration-300">
<div class="flex justify-between items-center max-w-7xl mx-auto px-8 h-20 w-full">
<div class="text-2xl font-serif italic text-slate-900 dark:text-slate-100">
                The Curated Life
            </div>
<nav class="hidden md:flex items-center space-x-12">
<RouterLink class="text-slate-500 dark:text-slate-400 font-serif hover:text-slate-800 dark:hover:text-slate-200 transition-colors duration-500" :to="{ name: 'home-page' }">Timeline</RouterLink>
<RouterLink class="text-slate-500 dark:text-slate-400 font-serif hover:text-slate-800 dark:hover:text-slate-200 transition-colors duration-500" :to="{ name: 'life-feed-page' }">Journal</RouterLink>
<RouterLink class="text-slate-500 dark:text-slate-400 font-serif hover:text-slate-800 dark:hover:text-slate-200 transition-colors duration-500" :to="{ name: 'letters-archive-page' }">Letters</RouterLink>
<RouterLink class="text-slate-900 dark:text-slate-50 border-b-2 border-slate-900 dark:border-slate-50 pb-1 hover:text-slate-800 dark:hover:text-slate-200 transition-colors duration-500" :to="{ name: 'milestones-page' }">Gallery</RouterLink>
</nav>
<div class="flex items-center space-x-6">
<span class="material-symbols-outlined text-slate-900 dark:text-slate-50 cursor-pointer" data-icon="search">search</span>
<span class="material-symbols-outlined text-slate-900 dark:text-slate-50 cursor-pointer" data-icon="account_circle">account_circle</span>
</div>
</div>
</header>
<main class="max-w-[1440px] mx-auto">
<!-- Header Section -->
<section class="py-[120px] px-8 text-center">
<h1 class="font-display-lg text-display-lg text-primary mb-6">The Milestone Gallery</h1>
<p class="font-body-lg text-body-lg text-secondary max-w-2xl mx-auto italic">
                A visual legacy of Shaiyra’s most precious moments, preserved with the weight of permanence and the warmth of memory.
            </p>
</section>
<!-- Featured Collection (Hero) -->
<section class="px-8 mb-[120px]">
<div class="relative w-full aspect-[21/9] overflow-hidden rounded-xl group">
<img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="A warm, sun-drenched family scene featuring a new baby in a beautifully decorated nursery with cream and blush tones. The lighting is soft and ethereal, filtering through sheer white curtains, creating a serene and timeless atmosphere. The aesthetic is sophisticated and high-end, focusing on the intimate connection between the mother and the infant in a professional, minimalist-modern living space." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWgTPDfkGoiuMarDMrXHZbIcg6MWWwnu1En8egIxZ7TLICdUUjqiAElKon9CrkcfrBAzVqhBJT3J1tgDbbSDOcTy2t1l3loUYWDlYT5fMxTJlSsK4zHl6xIqzsiuK91Fl87W8AqKM3pBf-2j5B0crKhMN7vgVa79nJuPIyck_puuzCvkp39dVsGkL2RrWWUvd-zHckZdDPY44UtowpgSzkRku82OwJ1oTx9M9DhEqlS__pUvFTDsXZ7_TQru2xPwMVavO1RPF5-3xg"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/60 via-transparent to-transparent"></div>
<div class="absolute bottom-12 left-12 right-12 text-on-primary">
<span class="font-label-caps text-label-caps uppercase tracking-widest mb-2 block">Featured Collection</span>
<h2 class="font-display-lg text-display-lg mb-4">The Coming Home Collection</h2>
<p class="font-body-md text-body-md opacity-90 max-w-xl">First steps through the threshold of a lifelong sanctuary. Captured on September 14, 2023.</p>
</div>
</div>
</section>
<!-- Filtering/Sorting -->
<section class="px-8 mb-16 flex flex-col md:flex-row justify-between items-end border-b border-surface-variant pb-8">
<div class="flex space-x-8 mb-6 md:mb-0">
<button class="font-label-caps text-label-caps text-primary border-b-2 border-primary pb-2">ALL MOMENTS</button>
<button class="font-label-caps text-label-caps text-outline hover:text-primary transition-colors pb-2">BY AGE</button>
<button class="font-label-caps text-label-caps text-outline hover:text-primary transition-colors pb-2">BY CATEGORY</button>
</div>
<div class="flex items-center space-x-4">
<span class="font-body-md text-body-md text-outline italic">Curated by: Recent</span>
<span class="material-symbols-outlined text-outline" data-icon="filter_list">filter_list</span>
</div>
</section>
<!-- Gallery Grid (Albums) -->
<section class="px-8 mb-[120px]">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[32px]">
<!-- Album 1 -->
<div class="masonry-item group cursor-pointer">
<div class="aspect-[3/4] overflow-hidden rounded-lg mb-6 bg-surface-container">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A close-up artistic portrait of a newborn sleeping soundly, wrapped in a high-quality cream-colored cashmere blanket. The lighting is low-key with gentle ambient shadows, highlighting the soft texture of the fabric and the baby's delicate features. The color palette consists of warm off-whites and soft flesh tones, following a minimalist-modern editorial style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDfhI0QIacV3oXW3tJ9buEYDK_GkbPWlSOrDOf4mSjNBYuCepz4InjhLjXhLt74EMfUtouRYhixD3Kk1zKS_bgzlDeqnclCDaUnsMGM-iagXiKVPHOuG5DjiKp5wBrNBAAqqN6-lnZJmz6PnLABOqM4P6eu8SQkrEqsrJfgm7JqvPd9HODFbSdU48LWFKX4sGvbm7r2Ha6AdHR0zhimFIRIoTHdFUX__VOfbQQSxQf_5lVqBLJISdyxPes8L5f9x_L81aUfs5zv0Bsx"/>
</div>
<h3 class="font-headline-md text-headline-md text-primary mb-1">Newborn Days</h3>
<p class="font-label-caps text-label-caps text-outline uppercase">August 2023 • 24 Photos</p>
</div>
<!-- Album 2 -->
<div class="masonry-item group cursor-pointer">
<div class="aspect-[1/1] overflow-hidden rounded-lg mb-6 bg-surface-container">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A beautifully composed landscape shot of a family on a beach at sunset, with a soft sage and navy color palette. The sky is a gradient of dusty rose and pale gold, reflecting on the calm water. The scene is airy and spacious, capturing a quiet, sentimental moment of reflection during a summer holiday. Professional editorial photography with a soft focus." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA4SECmnLAiaIIvliG9dYx5GKJu60ge6tXwQlGwQqAGzvd59MOGsLDYgnLIy_43Yvm-hyvFnbpV76g9wmsr_XZtVU591RdOkCVns7PqLKXOcPdgzgMXcAv6o7-9If7WZHb_Zi96LXxjcIRK9_fpCcWh1v1F7_3oW7hxOGk3vHL5V11Kly-TIXDmRaaoM2lAR0h5UPbvFwvJ3tDHoa6_PYv66uDy3bDVKu1OQE0nKKZmYsvqaf4zB2gOy2yOSXlRNTbYQRZlDZWdkyWy"/>
</div>
<h3 class="font-headline-md text-headline-md text-primary mb-1">First Summer</h3>
<p class="font-label-caps text-label-caps text-outline uppercase">July 2024 • 18 Photos</p>
</div>
<!-- Album 3 -->
<div class="masonry-item group cursor-pointer">
<div class="aspect-[3/4] overflow-hidden rounded-lg mb-6 bg-surface-container">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="An elegant interior setting during the holidays, featuring a minimalist Christmas tree with soft white lights and wooden ornaments. Beside the tree, a collection of heritage-style toys rests on a plush cream rug. The lighting is warm and candle-lit, evoking a sense of stable, enduring family traditions and cozy achievement. The visual style is premium and curated." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBTEChB0fw6X8nn9ISyNGPN8MJVSHuoSZ-XsQKfJ1rxFtpmqd2c8XKqGhK_1qesV3hv5tZpGUPzFVz1jZjETedEQiPpSvJ1h-MDCBEqXYizhJXdsHujMZtK-3u-f_e8uVUnNvubPCTlgWhs0HFagosxbMh3DcnLgBNWK21oOmwHExzTJvKD0Z0sWJYEI1uEsa31-BJ3nr4NmC3t200JXmhw8ky6wVb4nkY1d8TavIxqZL_MFaVsXAHnsNzbRCZ2c_5KN9QNUQOh1N8B"/>
</div>
<h3 class="font-headline-md text-headline-md text-primary mb-1">Holiday Memories</h3>
<p class="font-label-caps text-label-caps text-outline uppercase">December 2023 • 32 Photos</p>
</div>
<!-- Album 4 -->
<div class="masonry-item group cursor-pointer">
<div class="aspect-[4/5] overflow-hidden rounded-lg mb-6 bg-surface-container">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A whimsical garden party scene with a focus on artisanal details: a small, rustic wooden table with a single flower in a glass vase and a delicate linen tablecloth. The background is a soft-focus blur of lush green leaves and dappled sunlight. The color palette is predominantly sage and ivory, creating an atmosphere of gentle celebration and natural beauty." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDz-s6wRQnaTf5J2vEgT6nA2D7CIBlemyR8jotvCSBHyHEzIlgWdOOb-ueDubyiJHnOSpS4L8J6gJaBVbDWEwCORjJO3_Crk3f-T0nS4BcQ_hiP3SIgbJzbcATxmTJbTIzpl2rziq_vXc6OZqlVijlayAWWmMItKKr4f2HGMQ4NkGh4bpvq6MtOVLpo1wmVoXPRkd7BpKLvCSk38aMQVllVMOrtcnp1tq4HrFbz8J7RtdQYgdo4pDuobR7IrpZ3ua3DQz3c8apuY2Dw"/>
</div>
<h3 class="font-headline-md text-headline-md text-primary mb-1">The Garden Party</h3>
<p class="font-label-caps text-label-caps text-outline uppercase">May 2024 • 12 Photos</p>
</div>
<!-- Album 5 -->
<div class="masonry-item group cursor-pointer">
<div class="aspect-[3/2] overflow-hidden rounded-lg mb-6 bg-surface-container">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="An artistic shot of a baby's tiny hand grasping a parent's finger. The image is captured in black and white with a rich, deep navy-tinted shadow. The lighting is dramatic yet soft, highlighting the textures of skin and the emotional weight of the connection. The composition is minimal and impactful, suitable for a high-end personal legacy journal." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9A5sLD1GbrZtaWfO9e1BfVIrje7-2YJ5RBUv7tROiSmq0uk1JY2XhDLPflQjta1BcvnijMWVRsBCI4LXn_GVQ8DRxpKnGgUF0USu6Iy_h1dxC6lwhqxupWm4ZNAKv58Hv2vbK3nSvSFN_rmV_ouNuAhqjdnPlITrymRKS0N8-FuM-KXk8R_51vSSNMOHBxJKjnxWYvVlPdkPaP3UrVeBZ_q-lcWiMNzD74ZO_lkwcnYsosSSaOjTgj0c3rDsl_K5nyV5pmlk2aFE8"/>
</div>
<h3 class="font-headline-md text-headline-md text-primary mb-1">Little Connections</h3>
<p class="font-label-caps text-label-caps text-outline uppercase">Ongoing • 56 Photos</p>
</div>
<!-- Album 6 -->
<div class="masonry-item group cursor-pointer">
<div class="aspect-[4/5] overflow-hidden rounded-lg mb-6 bg-surface-container">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A portrait of a toddler sitting on a clean, light wood floor, surrounded by classic, minimalist wooden blocks. The room is filled with bright, natural morning light, creating a high-key, modern aesthetic. The baby's expression is one of curiosity and discovery. The palette is neutral with soft accents of pale blue and blush, maintaining a premium editorial feel." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC19Zz3AR7f9Uhr67ItJ_-oVZOYaG6h15hh6aGWv4v2i9NPLy-B-u7AX95dfa4NMxFVc3t-OiXN-CALROaB6CObeCO0ib7wLLn9aYX66exa6zAh15_pIyQP0H6wzu-ppmscVURRqYhRsR7_ZLP5dPWeE9hgXTDjnameJKZuAPndjUU7sWo1KohCvSF0pVq88hAz3jNgl4ciwyPkPheLbFcF-um-eYu4W4i9uhUJoGey7N518Y0XmdQaT7j8ps1Np_4Y22AuKLTtamYX"/>
</div>
<h3 class="font-headline-md text-headline-md text-primary mb-1">First Play</h3>
<p class="font-label-caps text-label-caps text-outline uppercase">February 2024 • 15 Photos</p>
</div>
</div>
</section><!-- Film & Motion Section -->
<section class="px-8 mb-[120px]">
<div class="text-center mb-16">
<h2 class="font-display-lg text-headline-md text-primary mb-4">Film &amp; Motion</h2>
<p class="font-body-lg text-body-lg text-secondary max-w-2xl mx-auto italic">Moving portraits of life's most fleeting whispers.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[32px] mb-16">
<!-- Video 1 -->
<div class="group cursor-pointer">
<div class="relative aspect-video overflow-hidden rounded-lg mb-6 bg-surface-container">
<img alt="First Laugh" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9A5sLD1GbrZtaWfO9e1BfVIrje7-2YJ5RBUv7tROiSmq0uk1JY2XhDLPflQjta1BcvnijMWVRsBCI4LXn_GVQ8DRxpKnGgUF0USu6Iy_h1dxC6lwhqxupWm4ZNAKv58Hv2vbK3nSvSFN_rmV_ouNuAhqjdnPlITrymRKS0N8-FuM-KXk8R_51vSSNMOHBxJKjnxWYvVlPdkPaP3UrVeBZ_q-lcWiMNzD74ZO_lkwcnYsosSSaOjTgj0c3rDsl_K5nyV5pmlk2aFE8"/>
<div class="absolute inset-0 bg-primary/20 flex items-center justify-center opacity-80 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined text-on-primary text-5xl" style="font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 48">play_circle</span>
</div>
</div>
<h3 class="font-headline-md text-body-lg text-primary mb-1">First Laugh</h3>
<p class="font-label-caps text-label-caps text-outline uppercase">September 2023</p>
</div>
<!-- Video 2 -->
<div class="group cursor-pointer">
<div class="relative aspect-video overflow-hidden rounded-lg mb-6 bg-surface-container">
<img alt="Bath Time Antics" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDz-s6wRQnaTf5J2vEgT6nA2D7CIBlemyR8jotvCSBHyHEzIlgWdOOb-ueDubyiJHnOSpS4L8J6gJaBVbDWEwCORjJO3_Crk3f-T0nS4BcQ_hiP3SIgbJzbcATxmTJbTIzpl2rziq_vXc6OZqlVijlayAWWmMItKKr4f2HGMQ4NkGh4bpvq6MtOVLpo1wmVoXPRkd7BpKLvCSk38aMQVllVMOrtcnp1tq4HrFbz8J7RtdQYgdo4pDuobR7IrpZ3ua3DQz3c8apuY2Dw"/>
<div class="absolute inset-0 bg-primary/20 flex items-center justify-center opacity-80 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined text-on-primary text-5xl" style="font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 48">play_circle</span>
</div>
</div>
<h3 class="font-headline-md text-body-lg text-primary mb-1">Bath Time Antics</h3>
<p class="font-label-caps text-label-caps text-outline uppercase">November 2023</p>
</div>
<!-- Video 3 -->
<div class="group cursor-pointer">
<div class="relative aspect-video overflow-hidden rounded-lg mb-6 bg-surface-container">
<img alt="First Steps" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC19Zz3AR7f9Uhr67ItJ_-oVZOYaG6h15hh6aGWv4v2i9NPLy-B-u7AX95dfa4NMxFVc3t-OiXN-CALROaB6CObeCO0ib7wLLn9aYX66exa6zAh15_pIyQP0H6wzu-ppmscVURRqYhRsR7_ZLP5dPWeE9hgXTDjnameJKZuAPndjUU7sWo1KohCvSF0pVq88hAz3jNgl4ciwyPkPheLbFcF-um-eYu4W4i9uhUJoGey7N518Y0XmdQaT7j8ps1Np_4Y22AuKLTtamYX"/>
<div class="absolute inset-0 bg-primary/20 flex items-center justify-center opacity-80 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined text-on-primary text-5xl" style="font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 48">play_circle</span>
</div>
</div>
<h3 class="font-headline-md text-body-lg text-primary mb-1">First Steps</h3>
<p class="font-label-caps text-label-caps text-outline uppercase">August 2024</p>
</div>
</div>
<div class="flex justify-center">
<button class="px-10 py-4 border border-primary text-primary font-label-caps text-label-caps tracking-widest hover:bg-surface-container transition-all uppercase">View All Videos</button>
</div>
</section>
<!-- CTA / Archive Link -->
<section class="max-w-4xl mx-auto text-center py-[120px] px-8 border-t border-surface-variant/30">
<h2 class="font-display-lg text-headline-md text-primary mb-8 italic">Continue the Journey</h2>
<div class="flex flex-col md:flex-row justify-center gap-6">
<button class="px-10 py-4 bg-primary text-on-primary font-label-caps text-label-caps tracking-widest hover:opacity-90 transition-all uppercase">Browse All Photos</button>
<button class="px-10 py-4 border border-primary text-primary font-label-caps text-label-caps tracking-widest hover:bg-surface-container transition-all uppercase">Order Physical Print Book</button>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-slate-50 dark:bg-slate-950 full-width py-24 mt-40 border-t border-slate-100 dark:border-slate-900 flat no-shadow transition-opacity duration-500">
<div class="flex flex-col md:flex-row justify-between items-center max-w-7xl mx-auto px-8 w-full space-y-8 md:space-y-0">
<div class="font-serif italic text-slate-400">
                The Curated Life
            </div>
<div class="font-serif text-sm tracking-wide uppercase text-slate-900 dark:text-slate-50">
                © 2024 The Curated Life — A Lifelong Legacy
            </div>
<nav class="flex space-x-8">
<RouterLink class="text-slate-400 dark:text-slate-600 hover:text-slate-700 dark:hover:text-white underline underline-offset-8 decoration-1 transition-all font-serif text-sm tracking-wide uppercase" :to="{ name: 'family-portal-page' }">Contact</RouterLink>
<RouterLink class="text-slate-400 dark:text-slate-600 hover:text-slate-700 dark:hover:text-white underline underline-offset-8 decoration-1 transition-all font-serif text-sm tracking-wide uppercase" :to="{ name: 'dashboard-page' }">Archive</RouterLink>
<RouterLink class="text-slate-400 dark:text-slate-600 hover:text-slate-700 dark:hover:text-white underline underline-offset-8 decoration-1 transition-all font-serif text-sm tracking-wide uppercase" :to="{ name: 'home-page' }">Privacy Policy</RouterLink>
<RouterLink class="text-slate-400 dark:text-slate-600 hover:text-slate-700 dark:hover:text-white underline underline-offset-8 decoration-1 transition-all font-serif text-sm tracking-wide uppercase" :to="{ name: 'future-forward-page' }">Terms of Service</RouterLink>
</nav>
</div>
</footer>
</div>
</template>

<script>
export default {
    name: 'Screen12'
}
</script>

<style scoped>
@media (min-width: 768px) {
    .masonry-item:nth-child(even) {
        transform: translateY(40px);
    }
}
</style>
