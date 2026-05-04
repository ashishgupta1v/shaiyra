<template>
<div class="font-body-md">
<!-- Shared Top Navigation Bar -->
<div class="relative flex h-auto min-h-screen w-full flex-col bg-gray-50 group/design-root overflow-x-hidden" style='font-family: "Noto Serif", "Noto Sans", sans-serif;'>
<div class="layout-container flex h-full grow flex-col">
<div class="px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#eaecf1] px-10 py-3">
<div class="flex items-center gap-4 text-[#111318]">
<div class="size-4">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path clip-rule="evenodd" d="M24 18.4228L42 11.475V34.3663C42 34.7796 41.7457 35.1504 41.3601 35.2992L24 42V18.4228Z" fill="currentColor" fill-rule="evenodd"></path>
<path clip-rule="evenodd" d="M24 8.18819L33.4123 11.574L24 15.2071L14.5877 11.574L24 8.18819ZM9 15.8487L21 20.4805V37.6263L9 32.9945V15.8487ZM27 37.6263V20.4805L39 15.8487V32.9945L27 37.6263ZM25.354 2.29885C24.4788 1.98402 23.5212 1.98402 22.646 2.29885L4.98454 8.65208C3.7939 9.08038 3 10.2097 3 11.475V34.3663C3 36.0196 4.01719 37.5026 5.55962 38.098L22.9197 44.7987C23.6149 45.0671 24.3851 45.0671 25.0803 44.7987L42.4404 38.098C43.9828 37.5026 45 36.0196 45 34.3663V11.475C45 10.2097 44.2061 9.08038 43.0155 8.65208L25.354 2.29885Z" fill="currentColor" fill-rule="evenodd"></path>
</svg>
</div>
<h2 class="text-[#111318] text-lg font-bold leading-tight tracking-[-0.015em]">Heritage</h2>
</div>
<div class="flex gap-2">
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#eaecf1] text-[#111318] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<div class="text-[#111318]" data-icon="Share" data-size="20px" data-weight="regular">
<svg fill="currentColor" height="20px" viewbox="0 0 256 256" width="20px" xmlns="http://www.w3.org/2000/svg">
<path d="M229.66,109.66l-48,48a8,8,0,0,1-11.32-11.32L204.69,112H165a88,88,0,0,0-85.23,66,8,8,0,0,1-15.5-4A103.94,103.94,0,0,1,165,96h39.71L170.34,61.66a8,8,0,0,1,11.32-11.32l48,48A8,8,0,0,1,229.66,109.66ZM192,208H40V88a8,8,0,0,0-16,0V208a16,16,0,0,0,16,16H192a8,8,0,0,0,0-16Z"></path>
</svg>
</div>
</button>
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#eaecf1] text-[#111318] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<div class="text-[#111318]" data-icon="Gear" data-size="20px" data-weight="regular">
<svg fill="currentColor" height="20px" viewbox="0 0 256 256" width="20px" xmlns="http://www.w3.org/2000/svg">
<path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path>
</svg>
</div>
</button>
</div>
</header>
<!-- Hero Section -->
<div class="flex p-4 mt-8 @container">
<div class="flex w-full flex-col gap-6 items-center">
<div class="flex gap-6 flex-col items-center">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full border-4 border-surface-container-high min-h-40 w-40" data-alt="A high-quality, professional editorial portrait of a young South Asian woman with an elegant, serene expression. She is captured in soft, natural studio lighting that highlights her features against a minimalist, warm cream background. Her style is sophisticated and modern, reflecting a sense of curated legacy and heritage. The overall aesthetic is clean, bright, and polished in light-mode." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDapq4TbhhWyM5PZmKSp-4Ed2mOMSFK1FOK0dz7_u3BIdXpofOs9oIbZ4Jbh58SnGUon5NMR8oCd-s65LGYzUeCZIdoSZvIxsq8hCVFR5MMt4Lktl0v7L6HRb9CA6ayteYM_BG_Di0ZepV6sc8t3kCVuihqvwZUHlYoJEDnvHtVpUD3tjyWMuBOt6pzJuKLI6J8e0HhQozGcs4t_L7rU31Upl03atVBpZaxPW1P9EyySBKCz07GuZoSyfQob9TOm6pPB4yhKnWL7DdH");'></div>
<div class="flex flex-col items-center justify-center">
<h1 class="text-on-surface text-[42px] font-display-lg leading-tight tracking-tight text-center">Shaiyra Gupta</h1>
<p class="text-on-primary-container text-lg font-body-lg leading-normal text-center tracking-widest uppercase mt-2">Guardian of the Lineage</p>
<p class="text-on-surface-variant text-base font-body-md leading-normal text-center mt-1">New Delhi, India</p>
</div>
</div>
</div>
</div>
<!-- Family Tree Visualization Section -->
<section class="mt-section-gap">
<div class="flex flex-col items-center mb-12">
<h2 class="text-on-surface text-headline-md font-display-lg border-b border-outline-variant pb-4 px-12">Ancestral Tapestry</h2>
<p class="text-on-surface-variant text-body-md mt-4 max-w-lg text-center">A living chronicle of the lives and legacies that converge in Shaiyra.</p>
</div>
<!-- Grandparents Layer -->
<div class="grid grid-cols-4 gap- gutter px-4 mb-12">
<!-- Paternal Grandfather -->
<div class="flex flex-col items-center text-center p-4 border border-outline-variant rounded-lg bg-surface-container-low transition-all hover:border-primary">
<div class="w-16 h-16 rounded-full overflow-hidden mb-3 grayscale">
<img class="w-full h-full object-cover" data-alt="A dignified, black and white vintage-style portrait of an elderly South Asian patriarch with a gentle smile. The lighting is classic and soft, emphasizing a legacy of wisdom and stability. The background is a simple neutral studio wall, maintaining a professional and clean aesthetic consistent with a high-end genealogical portfolio." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAM8zufw9vmNQu9UApaDZ_aSjXBrKqOMWegzX1eKxQP64Sdv4-FJzGVg65e7gik42OGtriZKwH0mFW2szDu3jGS_qk9DZOgkNUNozkHAbfCz-pSUDl-fosvS9iGTaCqywUOVCllf2D8OZxI_Gb0w6W8d1JSMjcb4W3tZ__b5YkLMWAnw_QTdOEl4VzKuCb2UOxvEOAXFXX6_2wgx5Kv2IRYAL2_sQVsA4hsYigEnVc36pepnSas2nKk0qjggTb3qTs66RQs81_LEt0j"/>
</div>
<h4 class="text-on-surface font-bold text-sm">Vikram Gupta</h4>
<span class="text-label-caps text-on-primary-container block mt-1">Paternal Grandfather</span>
<p class="text-[11px] text-on-surface-variant italic mt-2">"Foundations of the Textile Empire"</p>
</div>
<!-- Paternal Grandmother -->
<div class="flex flex-col items-center text-center p-4 border border-outline-variant rounded-lg bg-surface-container-low transition-all hover:border-primary">
<div class="w-16 h-16 rounded-full overflow-hidden mb-3 grayscale">
<img class="w-full h-full object-cover" data-alt="An elegant black and white vintage portrait of a South Asian matriarch wearing a traditional saree. She has a poised, graceful demeanor. The image has a soft film grain texture to suggest history while remaining crisp and professional. The lighting is airy and bright, fitting a minimalist light-mode design." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHLpTBAHZImDfYYXji7sY9p1TCAa6QNzKzKyf89g4bh7GOTSIf4iNPfG9ZMNuF6yDvxr5nECCNAlvC3ErAXCd7__-VcXNtoO86G5JKzX2y4hhB2k-OiDX6r4Jh7u8ikPp7rJXP6TDW3LNCDZ3tXnF9PCrrFw_MJi1jiOJjsgf_Jg37ZX2oowVxabnbowsFaXkdyK2N6nhcF53r-co_MdYEJtEW-9CcBUD2NuhUbHSgvKWY7oZHebby8chLmeDDoHjUjZLyUMbh92JG"/>
</div>
<h4 class="text-on-surface font-bold text-sm">Meera Gupta</h4>
<span class="text-label-caps text-on-primary-container block mt-1">Paternal Grandmother</span>
<p class="text-[11px] text-on-surface-variant italic mt-2">"Matriarch of Harmony"</p>
</div>
<!-- Maternal Grandfather -->
<div class="flex flex-col items-center text-center p-4 border border-outline-variant rounded-lg bg-surface-container-low transition-all hover:border-primary">
<div class="w-16 h-16 rounded-full overflow-hidden mb-3 grayscale">
<img class="w-full h-full object-cover" data-alt="A sophisticated black and white portrait of an older South Asian man with scholarly features and spectacles. The mood is intellectual and calm, set against a clean, minimalist background. The lighting is diffused and modern, creating a sense of timeless elegance suitable for a heritage documentation interface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCaLYK0or8FRvEYYiZQ-Z5EoGHAwzH-8BIFTkUknv8ALJYAMS_pezahmtoSQ8ElPi18I08jkHxOqLbjweGLBfEb-BMdpynsaKMSzPPZhxKC7lORM4avcgPoz8kX9-O7IH1yPZWxsyXzqpjaX3nFoRNbNFr41rgoNiidV-W2J_Dd6lh8fweZ_EQrH6bkQeE9pxtspeuCeXc5hm1u7Pts7YteeO8Dg_glB3Qhjvo-eNq7LjqnTuQjzVN0qv_TkMKA1QuBjExzNThP9ALG"/>
</div>
<h4 class="text-on-surface font-bold text-sm">Dr. Arun Sharma</h4>
<span class="text-label-caps text-on-primary-container block mt-1">Maternal Grandfather</span>
<p class="text-[11px] text-on-surface-variant italic mt-2">"Guardian of Lore &amp; Science"</p>
</div>
<!-- Maternal Grandmother -->
<div class="flex flex-col items-center text-center p-4 border border-outline-variant rounded-lg bg-surface-container-low transition-all hover:border-primary">
<div class="w-16 h-16 rounded-full overflow-hidden mb-3 grayscale">
<img class="w-full h-full object-cover" data-alt="A vintage-style black and white portrait of a South Asian woman with a kind, expressive face. She is dressed in traditional attire with subtle jewelry. The image is clean and high-contrast, fitting perfectly into a professional editorial layout. The setting is bright and uncluttered, emphasizing her serene presence." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCGFaZPGbMNbT33DXsCso_4GutjYFs_BBKhcSDAOaOMMRFELMyHlV5eDDzZk-79mNm1uh8R11n8NcP2-siYwOHKt-R4pqdczrEuVaKt1FfuH9aSh7gqd9Y8pfrjQShM79GxEcx_uo0bUMZLgWLtd_gNyxYAh4DgJB1Tblozn9Y0uSmdvfI15JBBu18H3mjYM0GCQ-gTmigXwcbz5mAd4GokrzxmMGBYhcg-EWj9qL4-BTIXrgb0hTEZFlaGgC0M56A6XUdjSgnfdOd"/>
</div>
<h4 class="text-on-surface font-bold text-sm">Kamla Sharma</h4>
<span class="text-label-caps text-on-primary-container block mt-1">Maternal Grandmother</span>
<p class="text-[11px] text-on-surface-variant italic mt-2">"Spirit of the Mountains"</p>
</div>
</div>
<!-- Tree Connecting Lines -->
<div class="flex justify-around px-20 relative h-12">
<div class="w-px h-full bg-outline"></div>
<div class="w-px h-full bg-outline"></div>
</div>
<!-- Parents Layer -->
<div class="flex justify-center gap-24 mb-12">
<!-- Father -->
<div class="flex flex-col items-center text-center p-6 border border-outline-variant rounded-lg bg-surface-container-low w-64 transition-all hover:shadow-lg">
<div class="w-24 h-24 rounded-full overflow-hidden mb-4 border-2 border-surface-container-high">
<img class="w-full h-full object-cover" data-alt="A professional studio portrait of a middle-aged South Asian man in a sharp navy blazer. He exudes confidence and warmth. The lighting is crisp and modern, with a clean off-white background that matches the minimalist UI. The style is that of a high-end executive profile, reinforcing the 'Professional Elegance' theme." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9xZWR4yTnow19HX89wED8-22WTF2icglMuXPbYa6QzCkskxgal661DX-Vzav_ANVVWIqe9y1q7YMqvfx27bVxC5tMQa62xW0CiOMM3TmRKuSN2BF9Nh9NLYJqcLkoZ-CrQs8cJbmfei4av7VP5DUzJQT3fr2WUFziM3Ybqu6RrkYBuvvrKo5aCiL0sXgpaOIVX5c2qbzV5yRfFVV9ZwDLRvWfrcRVDD_wGKiPJDDLwonlZoq7FAaUcEdh_qOZwxd61zjNndULEmRi"/>
</div>
<h3 class="text-on-surface font-bold text-lg">Rajesh Gupta</h3>
<span class="text-label-caps text-on-primary-container block mt-1">Father</span>
<div class="w-8 h-px bg-outline-variant my-3"></div>
<p class="text-sm text-on-surface-variant">The architect of our modern legacy, blending tradition with innovation.</p>
</div>
<!-- Mother -->
<div class="flex flex-col items-center text-center p-6 border border-outline-variant rounded-lg bg-surface-container-low w-64 transition-all hover:shadow-lg">
<div class="w-24 h-24 rounded-full overflow-hidden mb-4 border-2 border-surface-container-high">
<img class="w-full h-full object-cover" data-alt="A beautiful, editorial-style portrait of a middle-aged South Asian woman with a poised and artistic air. She is captured in a minimalist setting with soft, ambient lighting. Her clothing is a mix of contemporary and traditional patterns. The aesthetic is clean, professional, and warmly lit, consistent with the light-mode theme." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBntvhL1wA05X4qksTHqfKu03TB2VC7cz1pis7tCQB4NrsSX_OApcvOUz4AILtFfznw7UMN6ucFruZo-6S-uSvoWyVnbtE_XhUS-WBFWaa3MQkL2zIc8fE3wRkhk__T9I1ANH7_Tm-IfACxTLebfAmdkSsLpysnaM5Bx7VVhHx4i89PBMZ4XbROjFNp8osXZKj7AbdeDZiUXFY_5NO98yTfW5AmFyjNzZAJEqC2-uolMq2mdiznkpILRPxvTYP14UBksBbW_iZA3hIs"/>
</div>
<h3 class="text-on-surface font-bold text-lg">Anita Sharma Gupta</h3>
<span class="text-label-caps text-on-primary-container block mt-1">Mother</span>
<div class="w-8 h-px bg-outline-variant my-3"></div>
<p class="text-sm text-on-surface-variant">An artist whose canvases tell the untold stories of our ancestors.</p>
</div>
</div>
<!-- Central Connection Line -->
<div class="flex flex-col items-center">
<div class="w-px h-16 bg-outline"></div>
<div class="w-4 h-4 rounded-full bg-primary mb-4"></div>
</div>
<!-- Center Focus (Shaiyra) -->
<div class="flex flex-col items-center mb-24">
<div class="p-8 border-2 border-primary rounded-xl bg-surface-container-lowest shadow-sm text-center max-w-sm">
<span class="text-label-caps text-primary tracking-widest mb-2 block">CURRENT GENERATION</span>
<h2 class="text-on-surface font-display-lg text-headline-md">Shaiyra Gupta</h2>
<p class="text-on-surface-variant text-body-md mt-4">Connecting the threads of the past to weave a future of purpose and grace.</p>
</div>
</div>
</section>
<!-- Family Stories Section -->
<section class="mt-section-gap border-t border-outline-variant pt-section-gap mb-32">
<div class="flex items-end justify-between mb-16">
<div class="max-w-xl">
<h2 class="text-on-surface text-headline-md font-display-lg mb-4">Family Stories</h2>
<p class="text-on-surface-variant text-body-lg">Enduring narratives and hand-written fragments passed down through generations, curated for the future.</p>
</div>
<button class="text-label-caps text-primary border-b border-primary pb-1 hover:text-on-primary-container hover:border-on-primary-container transition-colors" @click="$router.push({ name: 'letters-archive-page' })">EXPLORE ARCHIVE</button>
</div>
<div class="grid grid-cols-2 gap- gutter">
<!-- Story Card 1 -->
<article class="flex flex-col bg-surface-container-low p-10 rounded-lg group cursor-pointer hover:bg-surface-container-high transition-colors">
<div class="mb-8 overflow-hidden rounded">
<img class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-105" data-alt="An artistic, high-resolution photo of an antique, weathered leather-bound diary resting on a clean white linen surface. Beside the diary is a vintage fountain pen and a sprig of dried lavender. The lighting is soft and high-key, creating a peaceful, nostalgic mood that fits a minimalist digital heirloom archive." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlTR5Kz8B1fdEZ_9_02ELcwwVMCETkR9yhnOW9DGViYpPA3RRrB3RcH4S-1W-kd8lFXaok4SL7bNegBsk6aRxF7ecz8Nnrycku4ojxWyHyXTv27jVKMgZEkD5ekSXFtk3eEcFW5lmonKIJkP_IXhoeJLx5PE6TwBTaFlCa04jYX0B4SZurz7N2Zo4gq6l8Q9Fuj7KiDDMXV-WYXErCvefKYCxQx7hKZtCPU-3qYwkxyJtdcFRlb2EKjyEf1jmVyUZg6AoQ_H7c8iq5"/>
</div>
<span class="text-label-caps text-on-primary-container mb-4">CIRCA 1945</span>
<h3 class="text-on-surface font-display-lg text-2xl mb-6">The Journey to Chandni Chowk</h3>
<p class="text-on-surface-variant font-body-md leading-relaxed line-clamp-4">
                                    "It was a morning unlike any other. Vikram stood before the heavy teak doors of the new shop, the air thick with the scent of jasmine and the anticipation of a thousand looms..."
                                </p>
<div class="mt-8 flex items-center gap-2 text-primary group-hover:gap-4 transition-all">
<span class="text-sm font-bold">READ NARRATIVE</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</div>
</article>
<!-- Story Card 2 -->
<article class="flex flex-col bg-surface-container-low p-10 rounded-lg group cursor-pointer hover:bg-surface-container-high transition-colors">
<div class="mb-8 overflow-hidden rounded">
<img class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A beautiful, close-up shot of a set of old silver heirloom keys and a delicate brass locket sitting on a stack of aged, handwritten letters. The background is a bright, airy professional studio setting with plenty of negative space. The style is modern editorial, with a clean and sophisticated light-mode aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDgYamCl93BskUbQiM56kq0BaSDCymhj68mhSUBGS4ClHN3qn9MBIHpK0BzkfI-Q9BjDeDKJYDPHs-mE6fWGlrHV5rcNcoBH-drZvPHhvWDN0EzwUsWorwEdKCNCtto4QAyVBHIB6PkeSwOGFl_UzDyVEkxyytJ330vaZEU-MaLSMADLwNohptHiZYQ7Fq8cSfhT16bzdnMa1APSO2n4Fke_T8bXS3cK3ydmu-NS64OAGzcxPKmO_mwSUGri8I3aNusPHA8ATiB-VlG"/>
</div>
<span class="text-label-caps text-on-primary-container mb-4">CIRCA 1972</span>
<h3 class="text-on-surface font-display-lg text-2xl mb-6">The Keeper of the Keys</h3>
<p class="text-on-surface-variant font-body-md leading-relaxed line-clamp-4">
                                    Meera never once spoke of the hardships of those early winters in the north. Instead, she spoke of the warmth of the tea and the way the light hit the brass keys she carried everywhere...
                                </p>
<div class="mt-8 flex items-center gap-2 text-primary group-hover:gap-4 transition-all">
<span class="text-sm font-bold">READ NARRATIVE</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</div>
</article>
</div>
</section>
<!-- Footer / Transition -->
<footer class="mb-24 flex flex-col items-center">
<div class="w-16 h-px bg-outline-variant mb-8"></div>
<p class="text-on-surface-variant text-label-caps tracking-widest uppercase">The Heritage of Gupta-Sharma</p>
<p class="text-[10px] text-on-primary-container mt-4">PRIVATE ARCHIVE — ACCESS RESTRICTED</p>
</footer>
</div>
</div>
</div>
</div>
    </div>
</template>

<script>
export default {
    name: 'Screen8'
}
</script>

<style scoped>
</style>
