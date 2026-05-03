<template>
<div class="font-body-md text-on-surface bg-background min-h-screen flex flex-col">
<!-- Shared TopNavBar Component -->
<div class="relative flex h-auto min-h-screen w-full flex-col bg-gray-50 group/design-root overflow-x-hidden" style='font-family: "Noto Serif", "Noto Sans", sans-serif;'>
<div class="layout-container flex h-full grow flex-col">
<div class="px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#eaecf1] px-10 py-3">
<div class="flex items-center gap-4 text-[#111318]">
<div class="size-4">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_6_330)">
<path clip-rule="evenodd" d="M24 0.757355L47.2426 24L24 47.2426L0.757355 24L24 0.757355ZM21 35.7574V12.2426L9.24264 24L21 35.7574Z" fill="currentColor" fill-rule="evenodd"></path>
</g>
<defs>
<clippath id="clip0_6_330"><rect fill="white" height="48" width="48"></rect></clippath>
</defs>
</svg>
</div>
<h2 class="text-[#111318] text-lg font-bold leading-tight tracking-[-0.015em]">Shaiyra's Loves</h2>
</div>
<div class="flex gap-2">
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#eaecf1] text-[#111318] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<div class="text-[#111318]" data-icon="Gear" data-size="20px" data-weight="regular">
<svg fill="currentColor" height="20px" viewbox="0 0 256 256" width="20px" xmlns="http://www.w3.org/2000/svg">
<path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path>
</svg>
</div>
</button>
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#eaecf1] text-[#111318] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<div class="text-[#111318]" data-icon="Share" data-size="20px" data-weight="regular">
<svg fill="currentColor" height="20px" viewbox="0 0 256 256" width="20px" xmlns="http://www.w3.org/2000/svg">
<path d="M229.66,109.66l-48,48a8,8,0,0,1-11.32-11.32L204.69,112H165a88,88,0,0,0-85.23,66,8,8,0,0,1-15.5-4A103.94,103.94,0,0,1,165,96h39.71L170.34,61.66a8,8,0,0,1,11.32-11.32l48,48A8,8,0,0,1,229.66,109.66ZM192,208H40V88a8,8,0,0,0-16,0V208a16,16,0,0,0,16,16H192a8,8,0,0,0,0-16Z"></path>
</svg>
</div>
</button>
</div>
</header>
<div class="flex p-4 @container">
<div class="flex w-full flex-col gap-4 items-center">
<div class="flex gap-4 flex-col items-center">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full min-h-32 w-32 border-2 border-surface-variant shadow-sm" data-alt="A warm, soft-focus portrait of a young child with a bright, joyful expression. The lighting is natural and airy, creating a professional yet intimate feel. The background is a minimalist, clean cream-colored room that aligns with a high-end editorial photography style, emphasizing pristine clarity and sentimental warmth." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAHBD27NHClCkIys6Z60NDqjclu9q2L59hnSb1p0Q5sgiisq6UEB70w9PzQBcjfRrxKI4Jl67AmmtjKqfMWmRVPsao1t9QpfIuusOYXpAonBD0qmkJ8ieuA00nA8-i5Rc_47C6B2g9Ei2OkO-kVp4TxMXYpu3X2XU-zJoQILy1Wl9aF1QffnqwYqELUH9gS4GuTF6PiPQ5-wK0D6KcceBJSETjyfigRG6UKiCRvZVdTpLWjQzon7Dpc96nW1mmUoAarB9AKVWdw0xZs");'></div>
<div class="flex flex-col items-center justify-center">
<p class="text-[#111318] text-[22px] font-bold leading-tight tracking-[-0.015em] text-center">Shaiyra Gupta</p>
<p class="text-[#5d6d89] text-base font-normal leading-normal text-center">Capturing favorites at every age</p>
<p class="text-[#5d6d89] text-base font-normal leading-normal text-center font-body-md">Last updated: Oct 2023</p>
</div>
</div>
</div>
</div>
<div class="pb-3">
<div class="flex border-b border-[#d5d9e2] px-4 gap-8">
<a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-[#5d6d89] pb-[13px] pt-4" href="#">
<p class="text-[#5d6d89] text-sm font-bold leading-normal tracking-[0.015em]">Age 2</p>
</a>
<a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-[#5d6d89] pb-[13px] pt-4" href="#">
<p class="text-[#5d6d89] text-sm font-bold leading-normal tracking-[0.015em]">Age 3</p>
</a>
<a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-[#5d6d89] pb-[13px] pt-4" href="#">
<p class="text-[#5d6d89] text-sm font-bold leading-normal tracking-[0.015em]">Age 4</p>
</a>
<a class="flex flex-col items-center justify-center border-b-[3px] border-b-[#1a2b48] text-[#111318] pb-[13px] pt-4" href="#">
<p class="text-[#111318] text-sm font-bold leading-normal tracking-[0.015em]">Current</p>
</a>
</div>
</div>
<!-- Main Content Area with Style Guidance applied -->
<main class="flex flex-col w-full gap-section-gap pt-10 pb-20">
<!-- Section: Favorite Toy -->
<section>
<h2 class="text-[#111318] font-display-lg text-headline-md px-4 pb-8 pt-5">Favorite Toy</h2>
<div class="p-4 @container">
<div class="flex flex-col items-stretch justify-start rounded-xl border border-outline-variant bg-surface-container-lowest overflow-hidden transition-shadow hover:shadow-lg @xl:flex-row @xl:items-start">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover @xl:w-1/2" data-alt="A high-quality, professional photograph of a beautiful wooden activity cube on a clean, sunlit wooden floor. The image has a soft-focus background, highlighting the craftsmanship and natural textures of the toy. The lighting is warm and golden, evoking a sense of childhood wonder and minimalist elegance in a modern home." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDFNebUJTb8lPAu7tiiXaM806g2McGld2uuM5KU2bLFAfER1THmopyWyMOR4UV_09N5qvbn8Rd4O5kbQhc7bcg8yJxwN9LO-UvFa07ja3IqW-kEGMKlxLAv6EW55iFg_nIMI32vKArPkuvuqtLEIO-rWe--BoWluFOHUeYJO-GMiVAZMxttNQ0Hw1nmc3DTA1LFhF-dBFkufz6siBdm3gY4G8xbOIxLgRnVfAk5v3eDOqLkHJnws3i1QdnGNPrRvSUPqfoV45iBfO40");'></div>
<div class="flex w-full min-w-72 grow flex-col items-stretch justify-center gap-4 p-8 @xl:w-1/2">
<p class="text-primary font-display-lg text-2xl font-bold leading-tight">Wooden Activity Cube</p>
<div class="flex flex-col gap-3">
<p class="text-on-surface-variant font-body-lg">A timeless piece for learning and play.</p>
<p class="text-on-surface-variant font-body-md opacity-80 leading-relaxed">
                            Shaiyra spends hours exploring the different sides of this beautifully crafted cube. From spinning gears to color sorting, it remains her most reached-for treasure during morning playtime.
                        </p>
</div>
</div>
</div>
</div>
</section>
<!-- Section: Favorite Book -->
<section>
<h2 class="text-[#111318] font-display-lg text-headline-md px-4 pb-8">Favorite Book</h2>
<div class="p-4 @container">
<div class="flex flex-col-reverse items-stretch justify-start rounded-xl border border-outline-variant bg-surface-container-lowest overflow-hidden transition-shadow hover:shadow-lg @xl:flex-row @xl:items-start">
<div class="flex w-full min-w-72 grow flex-col items-stretch justify-center gap-4 p-8 @xl:w-1/2">
<p class="text-primary font-display-lg text-2xl font-bold leading-tight">The Very Hungry Caterpillar</p>
<div class="flex flex-col gap-3">
<p class="text-on-surface-variant font-body-lg italic">"One Sunday morning the warm sun came up..."</p>
<p class="text-on-surface-variant font-body-md opacity-80 leading-relaxed">
                            A classic that never grows old. Shaiyra loves tracing the holes in the pages and reciting the days of the week. It has become our essential bedtime ritual, read with the same excitement every single night.
                        </p>
</div>
</div>
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover @xl:w-1/2" data-alt="An artistic flat-lay photograph of a classic children's picture book lying on an antique cream-colored linen cloth. The book's vibrant colors pop against the muted, high-end editorial background. Soft, directional light creates gentle shadows, emphasizing the texture of the paper and the high-quality, curated aesthetic of the nursery." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB2zqonmBpRMnK0MZ-eBpAjQ0M_sG1Nn2fzD4-IkgRRJtxDwh9tUyi2m59vM--nFBa88Ifj5_K4Xw9eZFljtWoDUDu15XWFa1369Xp0IxvKvlCBHnazZHTjuGiLRlXqQ0phwdNSlX2jFd_utBzizxYoHi5d6-aj_G9CJ9IO-Pdsi2XAcHFh2oypsQQd75BTmVWkz68OqGCLlF2_LyaEWLj8-M2zfKaci74XuiA8aCOVh_H8C8vnGMjdhmu1zgIftoGqFsrjAkOEhEDV");'></div>
</div>
</div>
</section>
<!-- Section: Current Obsession -->
<section>
<h2 class="text-[#111318] font-display-lg text-headline-md px-4 pb-8">Current Obsession</h2>
<div class="p-4 @container">
<div class="flex flex-col items-stretch justify-start rounded-xl border border-outline-variant bg-surface-container-lowest overflow-hidden transition-shadow hover:shadow-lg @xl:flex-row @xl:items-start">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover @xl:w-1/2" data-alt="A professional, clean studio shot of a pair of miniature canvas painting supplies and tiny colorful handprints. The scene is bright and airy with a minimalist aesthetic, using a light palette of blush and sage accents. The lighting is diffused and modern, highlighting the creative and playful energy of a child's artistic discovery." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAv7L-pWfoVQMfP8QkidFdKCLnTdItfXLer_zWa6Hy8e_RXe0wwYp5upGr1AnpvdiRHez31IioBcrSp4gSc_LSTHtz10Wa5htlCwFXyMHyjbP5Mk2rBQ4ZDGKEke4D87GExGfFdCksbHCgModMSHgso29Ur-YiKRByEQNB0zgr3MTuxkBIyk_GT9TWcWOUrYtYcqdNQXpd0tGpeBym7s37eRWcSC988wuzeFbmK9C2_DMKJO3dUPDt30ohOYE73V0cnp4XsEhHjsJ20");'></div>
<div class="flex w-full min-w-72 grow flex-col items-stretch justify-center gap-4 p-8 @xl:w-1/2">
<p class="text-primary font-display-lg text-2xl font-bold leading-tight">Finger Painting &amp; Color Mixing</p>
<div class="flex flex-col gap-3">
<p class="text-on-surface-variant font-body-lg">Discovering the world through color.</p>
<p class="text-on-surface-variant font-body-md opacity-80 leading-relaxed">
                            Everything is a canvas right now. Shaiyra is fascinated by how yellow and blue make green. Her "masterpieces" are currently taking over the kitchen gallery, and we couldn't be more proud of our little artist.
                        </p>
</div>
</div>
</div>
</div>
</section>
<!-- Section: Mood (Sentiment Focus) -->
<section class="mb-20">
<h2 class="text-[#111318] font-display-lg text-headline-md px-4 pb-8">Mood</h2>
<div class="px-4">
<div class="p-12 rounded-xl bg-secondary-container/30 border border-secondary-container flex flex-col items-center text-center gap-6 relative overflow-hidden">
<!-- Subtle decorative icon string for visual interest -->
<div class="absolute -top-10 -right-10 opacity-10">
<span class="material-symbols-outlined text-[200px]" style="font-variation-settings: 'FILL' 1;">child_care</span>
</div>
<span class="material-symbols-outlined text-secondary text-5xl">sentiment_satisfied</span>
<div class="max-w-2xl">
<p class="font-display-lg text-3xl text-primary italic mb-4">"Adventurous &amp; Curious"</p>
<p class="text-on-secondary-container font-body-lg leading-relaxed">
                        Shaiyra is in a phase of fearless exploration. Whether she's trying to climb the 'mountain' (the sofa) or asking 'why' about every leaf on the ground, her spirit is vibrant, inquisitive, and endlessly joyful.
                    </p>
</div>
<div class="w-24 h-px bg-secondary-container mt-4"></div>
<p class="font-label-caps uppercase tracking-widest text-on-secondary-container/60">Autumn 2023 Reflection</p>
</div>
</div>
</section>
</main>
<!-- Minimal Footer for Focused View -->
<footer class="border-t border-outline-variant py-12 px-10 flex justify-between items-center bg-surface-container-low">
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-primary">auto_stories</span>
<p class="font-display-lg text-lg text-primary">Shaiyra's Life Journey</p>
</div>
<div class="flex gap-6">
<button class="text-on-surface-variant hover:text-primary transition-colors flex items-center gap-2">
<span class="material-symbols-outlined">arrow_upward</span>
<span class="font-label-caps">Back to Top</span>
</button>
</div>
</footer>
</div>
</div>
</div>
</div>
</template>

<script>
export default {
    name: 'Screen6'
}
</script>

<style scoped>
</style>
