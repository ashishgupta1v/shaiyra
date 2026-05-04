<template>
<div class="bg-background text-on-background font-body-md antialiased min-h-screen flex flex-col">
<!-- TopAppBar -->
<header class="bg-[#FDFCFB]/90 backdrop-blur-md fixed top-0 w-full z-50 border-b border-[#1A2B48]/10 shadow-[0_4px_30px_rgba(26,43,72,0.03)]">
<nav class="flex justify-between items-center px-8 h-20 max-w-7xl mx-auto">
<div class="text-2xl font-serif italic text-[#1A2B48] tracking-tight">The Curated Life</div>
<div class="hidden md:flex items-center gap-8">
<a class="font-serif text-slate-400 hover:text-[#1A2B48] transition-colors" href="#">Timeline</a>
<a class="font-serif text-[#1A2B48] border-b-2 border-[#1A2B48] pb-1" href="#">Letters</a>
<a class="font-serif text-slate-400 hover:text-[#1A2B48] transition-colors" href="#">Archive</a>
<a class="font-serif text-slate-400 hover:text-[#1A2B48] transition-colors" href="#">Legacy</a>
</div>
<div class="flex items-center gap-4">
<button class="px-6 py-2 border border-[#1A2B48]/20 text-[#1A2B48] font-serif hover:opacity-75 transition-all duration-300">Save Draft</button>
<button class="px-6 py-2 bg-[#1A2B48] text-white font-serif hover:opacity-75 transition-all duration-300 active:scale-[0.98]">Seal Letter</button>
</div>
</nav>
</header>
<main class="flex-grow pt-32 pb-section-gap px-4 md:px-margin-page max-w-container-max mx-auto w-full">
<section class="max-w-3xl mx-auto">
<!-- Header Section -->
<div class="text-center mb-16">
<span class="font-label-caps text-on-primary-container tracking-[0.2em] mb-4 block uppercase">Correspondence Archive</span>
<h1 class="font-display-lg text-display-lg text-primary mb-2">A Message to the Future</h1>
<p class="font-body-lg text-on-surface-variant italic">Written by Shaiyra Gupta</p>
</div>
<!-- Stationery Interface -->
<div class="relative bg-surface shadow-2xl rounded-lg p-12 md:p-20 overflow-hidden min-h-[800px] border border-surface-variant">
<!-- Decorative Stationery Elements -->
<div class="absolute inset-0 stationery-texture pointer-events-none"></div>
<div class="relative z-10 space-y-12">
<!-- Letter Metadata Fields -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-12 border-b border-surface-variant pb-8">
<div class="space-y-2">
<label class="font-label-caps text-outline block">To be opened on</label>
<div class="flex items-center gap-3 group border-b border-outline/30 focus-within:border-primary transition-colors pb-2">
<span class="material-symbols-outlined text-outline">calendar_today</span>
<select class="w-full bg-transparent border-none p-0 focus:ring-0 font-display-lg text-xl text-primary appearance-none cursor-pointer">
<option>Age 18</option>
<option selected="">Age 25</option>
<option>Wedding Day</option>
<option>10 Years from Now</option>
<option>The Birth of my First Child</option>
</select>
<span class="material-symbols-outlined text-outline">expand_more</span>
</div>
</div>
<div class="space-y-2">
<label class="font-label-caps text-outline block">Subject</label>
<input class="w-full bg-transparent border-none border-b border-outline/30 focus:border-primary focus:ring-0 p-0 pb-2 font-display-lg text-xl text-primary placeholder:text-surface-variant" placeholder="The whispers of today..." type="text" value="On the Eve of Great Changes"/>
</div>
</div>
<!-- Letter Body -->
<div class="relative min-h-[400px]">
<div class="absolute inset-0 ruled-lines pointer-events-none opacity-50"></div>
<textarea class="w-full bg-transparent border-none focus:ring-0 p-0 font-display-lg text-body-lg text-on-surface leading-[2.4rem] resize-none" placeholder="Dear Future Me..." rows="15">Dearest Shaiyra,

As I sit here today, the light is filtering through the jasmine vines in the courtyard, casting dancing shadows across this very page. I hope that when you read this, you still remember the specific scent of rain on dry earth that we loved so much this summer.

Life feels like a collection of beautiful, unformed possibilities right now. I am working through the complexities of finding my voice in a world that often demands silence. I want to remember how it felt to be twenty-one, standing on the precipice of everything, terrified and exhilarated all at once.

Tell me, did you keep the promise we made to never stop chasing the sunset? Did you find that quiet corner of the world we used to dream about? 

Whatever you have become, I hope you are kind to yourself. You were doing your best, even when it didn't feel like enough.

With all my love and hope,
Your Younger Self</textarea>
</div>
<!-- Seal with a Memory Section -->
<div class="pt-12 border-t border-surface-variant">
<div class="flex items-center justify-between mb-8">
<div>
<h3 class="font-headline-md text-primary text-2xl mb-1">Seal with a Memory</h3>
<p class="font-body-md text-on-surface-variant">Attach a visual fragment for your future self to rediscover.</p>
</div>
<button class="flex items-center gap-2 px-4 py-2 rounded-full bg-surface-container hover:bg-surface-variant transition-colors text-primary font-label-caps">
<span class="material-symbols-outlined text-sm" data-weight="fill">add_photo_alternate</span>
                                Add Media
                            </button>
</div>
<!-- Media Attachment Placeholder/Display -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="aspect-square bg-surface-container-low rounded-lg overflow-hidden border border-surface-variant group relative cursor-pointer">
<img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500" data-alt="A nostalgic, soft-focus photograph of a small bunch of dried lavender and old polaroids resting on a weathered wooden table. Warm morning light streams in from a window, creating long shadows and a serene, archival atmosphere consistent with a personal legacy journal." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCnLLz4FAUkobUh_a6XNuktAabJ5wT5HcPCzjYw25i-uef4S6r1Q7jB9OuPaNzn-oN5C4ixP-23G7GncKcdxZvkZuUOTYnE6Er6w49Novwl3m-wdmeLu8XlkMruBY8rw4QBsawu4AOzNct3DhZ-BaElQx3h60aqUmcf1rfPFeHv1pBK99dfGgsINEzyDMZ9tGxqDo3sc8l_pyTMExP5meqM-hCIbbAaidJvi7ejflAD129f6D7wZpakOqMgYUFvBW-yaDOCx6owgCU0"/>
<div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
<span class="bg-surface px-4 py-2 rounded-full font-label-caps text-primary shadow-lg">Change Memory</span>
</div>
</div>
<div class="flex flex-col justify-center p-8 bg-surface-container-low/50 rounded-lg border border-dashed border-outline/30">
<div class="text-center space-y-4">
<div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center mx-auto">
<span class="material-symbols-outlined text-on-secondary-container">videocam</span>
</div>
<div class="space-y-1">
<p class="font-label-caps text-primary">Record a Video Clip</p>
<p class="text-xs text-outline">Capture a message in motion (Max 30s)</p>
</div>
</div>
</div>
</div>
</div>
<!-- Final Action -->
<div class="flex flex-col items-center pt-16 gap-6">
<div class="w-16 h-16 rounded-full border-2 border-primary/20 flex items-center justify-center relative">
<span class="material-symbols-outlined text-primary text-3xl">history_edu</span>
</div>
<button class="px-12 py-5 bg-primary text-on-primary rounded-full font-label-caps tracking-widest text-sm hover:opacity-90 transition-all duration-300 shadow-xl hover:shadow-2xl active:scale-[0.98]">
                            Seal &amp; Send to Future
                        </button>
<p class="text-xs text-outline font-body-md">Once sealed, this letter will be encrypted and hidden until your chosen date.</p>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="w-full border-t border-[#1A2B48]/10 bg-[#FDFCFB]">
<div class="flex flex-col md:flex-row justify-between items-center px-12 py-16 max-w-7xl mx-auto gap-8">
<div class="space-y-2 text-center md:text-left">
<div class="font-serif italic text-[#1A2B48] text-xl">The Curated Life</div>
<p class="font-serif text-sm tracking-wide text-slate-500">© 2024 The Curated Life. Preserving your story for the generations to follow.</p>
</div>
<div class="flex flex-wrap justify-center gap-8">
<a class="font-serif text-sm tracking-wide text-slate-500 hover:text-[#1A2B48] transition-colors hover:underline decoration-[#1A2B48]/30 underline-offset-4" href="#">Privacy Policy</a>
<a class="font-serif text-sm tracking-wide text-slate-500 hover:text-[#1A2B48] transition-colors hover:underline decoration-[#1A2B48]/30 underline-offset-4" href="#">Terms of Service</a>
<a class="font-serif text-sm tracking-wide text-slate-500 hover:text-[#1A2B48] transition-colors hover:underline decoration-[#1A2B48]/30 underline-offset-4" href="#">Help Center</a>
<a class="font-serif text-sm tracking-wide text-slate-500 hover:text-[#1A2B48] transition-colors hover:underline decoration-[#1A2B48]/30 underline-offset-4" href="#">Contact Archive</a>
</div>
</div>
</footer>
</div>
</template>

<script>
export default {
    name: 'Screen9'
}
</script>

<style scoped>
.stationery-texture {
    background-image: radial-gradient(#1a2b48 0.5px, transparent 0.5px);
    background-size: 24px 24px;
    opacity: 0.03;
}
.ruled-lines {
    background-image: linear-gradient(#e5e2de 1px, transparent 1px);
    background-size: 100% 2.4rem;
}
</style>
