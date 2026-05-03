<template>
<div class="bg-background text-on-surface font-body-md overflow-x-hidden min-h-screen">
<!-- TopAppBar -->
<header class="fixed top-0 w-full border-b border-stone-200 bg-[#fdfcfb] shadow-sm backdrop-blur-md z-50">
<div class="flex justify-between items-center px-8 h-20 max-w-[1280px] mx-auto">
<div class="text-2xl font-serif font-bold text-stone-900 font-headline-md tracking-tight">Heirloom Journal</div>
<nav class="hidden md:flex space-x-8">
<a class="font-serif text-sm text-stone-500 hover:text-stone-700 transition-colors cursor-pointer active:opacity-70" href="#">Our Story</a>
<a class="font-serif text-sm text-stone-500 hover:text-stone-700 transition-colors cursor-pointer active:opacity-70" href="#">Archives</a>
<a class="font-serif text-sm text-stone-900 border-b-2 border-stone-800 pb-1 cursor-pointer" href="#">Vault</a>
</nav>
<div class="flex items-center space-x-6">
<span class="material-symbols-outlined text-stone-800 cursor-pointer hover:bg-stone-50 p-2 rounded-full transition-colors" data-icon="lock">lock</span>
<span class="material-symbols-outlined text-stone-800 cursor-pointer hover:bg-stone-50 p-2 rounded-full transition-colors" data-icon="notifications">notifications</span>
<div class="w-10 h-10 rounded-full bg-surface-container overflow-hidden border border-outline-variant">
<img alt="User profile" class="w-full h-full object-cover" data-alt="A close-up professional portrait of an elegant middle-aged man with graying hair and a kind expression. The lighting is soft and cinematic, emphasizing a warm, familial atmosphere. The background is a blurred study with leather-bound books, reflecting a high-end, intellectual, and secure environment consistent with a private family legacy dashboard." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBO8YTiX-MYT2rHQudNnjdMZYHxwl-nYmtdqVXvDLjiCQkV5G3PkFep5uAOd2N0V943sorciyMTQpBUJVgt6-6lwsXrm0a7HxGDPszm0SyIqZ8El9jEq9aTZo5tLI-W-H_al2iq9vCmHzDEmOL9qxXZVZM9JYJlx2oOM8XlaNZKKCce_K2rqG94ooRPovRCqOqwpxbQHdKIxt3IybeguKl20O8vHpb2m0jZ49y6yOZl6VDsX2xw6EwWGI4an3stVWg1fbplibR-w8Rj"/>
</div>
</div>
</div>
</header>
<div class="flex pt-20 min-h-screen max-w-[1280px] mx-auto">
<!-- SideNavBar -->
<aside class="hidden lg:flex flex-col p-6 space-y-4 h-[calc(100vh-80px)] w-64 border-r border-stone-100 bg-[#fdfcfb]">
<div class="mb-8">
<div class="text-lg font-serif italic text-stone-700 font-headline-md">The Henderson Estate</div>
<div class="text-xs font-serif text-stone-500 uppercase tracking-widest mt-1">Established 1984</div>
</div>
<nav class="flex-1 space-y-2">
<a class="flex items-center space-x-3 p-3 text-stone-900 font-bold bg-stone-100 rounded-lg transition-all duration-300" href="#">
<span class="material-symbols-outlined" data-icon="vps">vm_group</span>
<span class="font-label-sm text-label-sm">Vault</span>
</a>
<a class="flex items-center space-x-3 p-3 text-stone-500 hover:bg-stone-50 hover:pl-5 transition-all duration-300" href="#">
<span class="material-symbols-outlined" data-icon="auto_stories">auto_stories</span>
<span class="font-label-sm text-label-sm">Memories</span>
</a>
<a class="flex items-center space-x-3 p-3 text-stone-500 hover:bg-stone-50 hover:pl-5 transition-all duration-300" href="#">
<span class="material-symbols-outlined" data-icon="group" data-weight="fill" style="font-variation-settings: 'FILL' 1;">group</span>
<span class="font-label-sm text-label-sm">Contributors</span>
</a>
<a class="flex items-center space-x-3 p-3 text-stone-500 hover:bg-stone-50 hover:pl-5 transition-all duration-300" href="#">
<span class="material-symbols-outlined" data-icon="verified_user">verified_user</span>
<span class="font-label-sm text-label-sm">Security</span>
</a>
<a class="flex items-center space-x-3 p-3 text-stone-500 hover:bg-stone-50 hover:pl-5 transition-all duration-300" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="font-label-sm text-label-sm">Settings</span>
</a>
</nav>
<button class="mt-auto w-full py-3 bg-primary text-on-primary font-headline-md font-bold text-sm tracking-wide rounded hover:opacity-90 active:scale-95 transition-all flex items-center justify-center space-x-2">
<span class="material-symbols-outlined text-sm" data-icon="add">add</span>
<span>New Entry</span>
</button>
</aside>
<!-- Main Content Canvas -->
<main class="flex-1 p-10 overflow-y-auto">
<header class="mb-12">
<div class="flex items-center space-x-3 mb-2">
<span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 text-[10px] uppercase font-bold tracking-[0.2em] rounded-sm">High Security</span>
<span class="text-outline text-xs flex items-center space-x-1">
<span class="material-symbols-outlined text-xs" data-icon="verified">verified</span>
<span class="font-label-sm">Encrypted Connection Active</span>
</span>
</div>
<h1 class="font-headline-xl text-headline-xl text-on-surface mb-2">Welcome to the Family Inner Circle</h1>
<p class="font-body-lg text-secondary text-lg max-w-2xl italic">"Preserving the moments that matter most, away from the digital noise."</p>
</header>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-12">
<!-- Primary Action: Letters to Daughter -->
<div class="md:col-span-8 group relative overflow-hidden glass-panel p-8 rounded-lg border border-outline-variant hover:border-secondary transition-all cursor-pointer">
<div class="flex justify-between items-start mb-16">
<div>
<span class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block">Private Collection</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Letters to My Daughter</h2>
<p class="text-secondary mt-2 font-body-md">7 unreleased letters scheduled for release in 2032.</p>
</div>
<div class="flex items-center space-x-2 text-outline opacity-60"><span class="material-symbols-outlined text-xl" data-icon="lock">lock</span><span class="text-[10px] uppercase tracking-widest font-bold">Restricted</span></div>
</div>
<div class="flex items-end justify-between">
<div class="flex -space-x-3 overflow-hidden">
<img alt="Family" class="inline-block h-10 w-10 rounded-full ring-2 ring-white" data-alt="A soft-focus portrait of a young woman with a serene expression, bathed in warm sunset light. The visual style is reminiscent of fine art photography, with a dreamy, timeless quality that evokes deep maternal affection and the theme of a private family heritage." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWDRGvkVLTzZsp5V7fA3lcjTVD8aj6lfjfv7_dT33Sjn0A6tV6ox9OVJE3v29hrx7bjjz8Is5yL2wZgnhga_JzNdl0kq8FZ_AkGNoCDX-B6ixXRaJREMxHdudgxu_4Wt0KRbYJwWwCwstLiWWKpMt5_ZvpA5Rzb66P5fq6CAZwXslG1znzDmmciLu2l-AlbCmLFZqqppOZVDpdztsZ1urMDvNkVp6KNowkbvgu54kJRtLNHbl5eVAWxy45Tm45LZ5TZe-VK64c6tl1"/>
<img alt="Family" class="inline-block h-10 w-10 rounded-full ring-2 ring-white" data-alt="A candid, warm-toned photograph of a father and child laughing together in a library setting. The lighting is soft and golden, highlighting the joy and security of a close family bond. The overall aesthetic is elegant and understated, matching a professional legacy platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhLCaW3KzD_Ce2ADXXJWCNguPNTBpWHjx568Aw70-6BSsDckeVcuiG-Y2XRhQr_bgJBzxB7JfHeSM2vW7hdI0oyPaeuTgUwpm-h1oHoIoI8sVCz7WoZY-FR11F0WgnXfNGYeqUrQRDd7w38ZuKTMBC4bVGNqzWk24Go6q754e5anUauCAXLpJRaKL7k5G8zIZWtFFAEbH_waOfj92yjLQEwPGbAVYRkC9l4C2wh8mxKrZ1JcDKeeTTYu7BeQfdSPLDYMlWllEa-oeP"/>
</div>
<div class="flex items-center space-x-2 text-stone-900 font-bold uppercase text-xs tracking-widest group-hover:pr-4 transition-all">
<span>Open Vault</span>
<span class="material-symbols-outlined text-sm" data-icon="arrow_forward">arrow_forward</span>
</div>
</div>
</div>
<!-- Secondary: Wellness Archive -->
<div class="md:col-span-4 glass-panel p-6 rounded-lg flex flex-col border border-stone-200">
<span class="material-symbols-outlined text-tertiary-fixed-dim mb-4" data-icon="monitor_heart" data-weight="fill" style="font-variation-settings: 'FILL' 1;">monitor_heart</span>
<h3 class="font-headline-md text-headline-md mb-2"><span class="material-symbols-outlined text-[18px] align-middle mr-1 text-outline opacity-70" data-icon="lock">lock</span>Wellness Archive</h3>
<p class="text-sm text-secondary mb-6">Confidential health milestones and family medical heritage.</p>
<div class="mt-auto pt-6 border-t border-stone-100 flex items-center justify-between text-xs font-bold uppercase tracking-widest text-stone-400">
<span>Last update: 2h ago</span>
<span class="material-symbols-outlined text-sm" data-icon="shield">shield</span>
</div>
</div>
<!-- Tertiary: Growth Tracker -->
<div class="md:col-span-4 glass-panel p-6 rounded-lg border border-stone-200">
<div class="flex justify-between items-start mb-6"><div class="flex items-center space-x-1 opacity-60"><span class="material-symbols-outlined text-sm text-outline" data-icon="lock">lock</span><span class="text-[10px] text-outline uppercase tracking-widest">Private</span></div>
<span class="material-symbols-outlined text-secondary" data-icon="timeline">timeline</span>
<span class="text-[10px] text-on-tertiary-container bg-tertiary-fixed px-2 py-1 rounded">Active</span>
</div>
<h3 class="font-headline-md text-headline-md mb-2"><span class="material-symbols-outlined text-[18px] align-middle mr-1 text-outline opacity-70" data-icon="lock">lock</span>Growth Tracker</h3>
<div class="space-y-4">
<div class="h-1 bg-stone-100 w-full overflow-hidden">
<div class="h-full bg-stone-800 w-[65%]"></div>
</div>
<p class="text-sm text-stone-500 italic">"Clara's First Decade" milestone reached 65% completion.</p>
</div>
</div>
<!-- Circle: Authorized Members -->
<div class="md:col-span-8 glass-panel p-8 rounded-lg border border-stone-200 relative">
<div class="absolute top-0 right-0 p-4">
<div class="double-border p-1 bg-white">
<span class="material-symbols-outlined text-stone-800 p-1" data-icon="lock">lock</span>
</div>
</div>
<h3 class="font-headline-md text-headline-md mb-6">Authorized Family Members</h3>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="flex items-center space-x-4 p-3 hover:bg-stone-50 rounded-lg transition-colors border border-transparent hover:border-stone-100 cursor-pointer">
<div class="w-12 h-12 rounded-full overflow-hidden bg-stone-100 border border-stone-200">
<img alt="Sarah H." data-alt="A portrait of a sophisticated woman in her 40s with a warm, intelligent gaze, wearing a cream-colored silk blouse. The background is a minimalist, softly lit home office. The image conveys trust, authority, and elegance, fitting for a member of an exclusive family digital archive." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCTwa0hnP5K-2QVDUUhLOQ36Vnv8Olgp-ivHcxjNaazPf6a8eScoyhHwDeKc0fJydC-Go_XaVd0rfdP7i0putEF0yLlkdR1pA4sqZRVVwpIme_bSjlyQcUpD7cCMkiizXFDy2-IK2-ocWQ64lIAoSgeSRuF4c-eWDSQC-3L0D71ihk0fZkchMFA3fx9-ihaQFMTKYAzm5BMCwO9dt_9umibA0S_qqo4ypU45ClqSqyfQLM4reugaSTg5nF6uhYtwXRdxAqWm485VOhV"/>
</div>
<div>
<p class="font-bold text-stone-900">Sarah Henderson</p>
<p class="text-xs text-stone-500 uppercase tracking-widest">Matriarch / Owner</p>
</div>
</div>
<div class="flex items-center space-x-4 p-3 hover:bg-stone-50 rounded-lg transition-colors border border-transparent hover:border-stone-100 cursor-pointer">
<div class="w-12 h-12 rounded-full overflow-hidden bg-stone-100 border border-stone-200">
<img alt="Julian H." data-alt="A high-end portrait of a young man with a focused and professional appearance, wearing a tailored charcoal suit jacket. The lighting is refined and directional, creating a sense of importance and legacy. The overall mood is serious yet familial, aligned with the 'Professional Elegance' theme." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGZckQNIEk3zFpLxRdMoiKTn1hZb-zjHa5GuwHofCELYCxqHe8Ou-BfdZGKLdg-_dRZ52AraTcON7HaOLeb9L_jyW6wZFVrz6_SctSYkENHzRb1dcol7oLCSv3j0-XSR_HqvUk2GnWg_B0RL3QBN7KVoJxiOdhKTUikLuo48lF_9Zt7Gr4Ht9lVi6SEoDN5SPso4ebnhYA91S8o6oDY_kE4X0ZDtU1u-B7WCgO0BlspvP3C5vaZFgf72IyGR2jnB8jagw2-2FDzcbd"/>
</div>
<div>
<p class="font-bold text-stone-900">Julian Henderson</p>
<p class="text-xs text-stone-500 uppercase tracking-widest">Trustee</p>
</div>
</div>
</div>
</div>
</div>
<!-- Recent Secure Activity -->
<section class="max-w-4xl">
<h4 class="font-label-sm text-label-sm text-stone-400 uppercase tracking-widest mb-6">Security Audit Log</h4>
<div class="space-y-1">
<div class="group flex items-center justify-between p-4 border-b border-stone-100 hover:bg-white transition-all">
<div class="flex items-center space-x-4">
<span class="material-symbols-outlined text-stone-400 group-hover:text-stone-900 transition-colors" data-icon="key">key</span>
<span class="text-sm">Two-factor authentication successful via Sarah's device</span>
</div>
<span class="text-xs text-stone-400 font-serif">Today, 09:42 AM</span>
</div>
<div class="group flex items-center justify-between p-4 border-b border-stone-100 hover:bg-white transition-all">
<div class="flex items-center space-x-4">
<span class="material-symbols-outlined text-stone-400 group-hover:text-stone-900 transition-colors" data-icon="visibility">visibility</span>
<span class="text-sm">Vault entry: 'Letters to My Daughter' accessed by Sarah Henderson</span>
</div>
<span class="text-xs text-stone-400 font-serif">Yesterday, 11:15 PM</span>
</div>
</div>
</section>
</main>
</div>
<!-- Footer -->
<footer class="w-full border-t border-stone-100 bg-[#fdfcfb]">
<div class="flex flex-col md:flex-row justify-between items-center p-12 max-w-[1280px] mx-auto">
<div class="font-serif text-xs uppercase tracking-widest text-stone-500 mb-6 md:mb-0">
                © 2024 Heirloom Digital. Encrypted &amp; Family-Owned.
            </div>
<nav class="flex space-x-12">
<a class="font-serif text-xs uppercase tracking-widest text-stone-400 hover:text-stone-800 opacity-80 hover:opacity-100 transition-colors" href="#">Privacy Policy</a>
<a class="font-serif text-xs uppercase tracking-widest text-stone-400 hover:text-stone-800 opacity-80 hover:opacity-100 transition-colors" href="#">Security Whitepaper</a>
<a class="font-serif text-xs uppercase tracking-widest text-stone-400 hover:text-stone-800 opacity-80 hover:opacity-100 transition-colors" href="#">Support</a>
</nav>
</div>
</footer>
</div>
</template>

<script>
export default {
    name: 'Screen2'
}
</script>

<style scoped>
.glass-panel {
    background: rgba(252, 249, 248, 0.7);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(229, 226, 225, 0.5);
}
.ledger-input {
    border-bottom: 1px solid #747878;
    background: transparent;
}
.double-border {
    position: relative;
    border: 1px solid #615e57;
}
.double-border::after {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    right: 2px;
    bottom: 2px;
    border: 1px solid #615e57;
    pointer-events: none;
}
</style>
