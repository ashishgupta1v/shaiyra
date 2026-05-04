<template>
<div class="text-on-surface">
<div class="relative flex h-auto min-h-screen w-full flex-col bg-background group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<!-- Shared Header -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-outline-variant px-10 py-3 bg-surface/80 backdrop-blur-md sticky top-0 z-50">
<div class="flex items-center gap-4 text-primary">
<div class="size-6 text-primary">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M44 11.2727C44 14.0109 39.8386 16.3957 33.69 17.6364C39.8386 18.877 44 21.2618 44 24C44 26.7382 39.8386 29.123 33.69 30.3636C39.8386 31.6043 44 33.9891 44 36.7273C44 40.7439 35.0457 44 24 44C12.9543 44 4 40.7439 4 36.7273C4 33.9891 8.16144 31.6043 14.31 30.3636C8.16144 29.123 4 26.7382 4 24C4 21.2618 8.16144 18.877 14.31 17.6364C8.16144 16.3957 4 14.0109 4 11.2727C4 7.25611 12.9543 4 24 4C35.0457 4 44 7.25611 44 11.2727Z" fill="currentColor"></path>
</svg>
</div>
<h2 class="text-primary text-xl font-bold leading-tight tracking-[-0.015em] serif">Little by Little</h2>
</div>
<div class="flex gap-4">
<button class="flex items-center justify-center rounded-lg h-10 bg-surface-container-high text-primary px-3 transition-colors hover:bg-surface-container-highest">
<div data-icon="Bell" data-size="20px">
<span class="material-symbols-outlined">notifications</span>
</div>
</button>
<button class="flex items-center justify-center rounded-lg h-10 bg-surface-container-high text-primary px-3 transition-colors hover:bg-surface-container-highest">
<div data-icon="Gear" data-size="20px">
<span class="material-symbols-outlined">settings</span>
</div>
</button>
</div>
</header>
<main class="flex-1 max-w-[1120px] mx-auto w-full px-margin-page py-12">
<!-- Hero Section -->
<section class="mb-section-gap"><div class="flex justify-end mb-4">
<div class="flex items-center gap-2 px-3 py-1.5 bg-secondary-container text-on-secondary-container rounded-full">
<span class="material-symbols-outlined text-[18px]">lock</span>
<span class="text-label-caps uppercase">Private Archive</span>
</div>
</div>
<div class="flex flex-col gap-4 text-center max-w-2xl mx-auto">
<span class="text-label-caps text-secondary uppercase tracking-widest font-bold">Physical Development Portfolio</span>
<h1 class="text-display-lg serif text-primary">Shaiyra’s Growth</h1>
<p class="text-body-lg text-on-surface-variant font-light">A curated record of physical milestones, precise measurements, and developmental trends from birth to present.</p>
</div>
<!-- Key Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter mt-16">
<div class="p-8 border border-outline-variant bg-surface-container-lowest rounded-xl flex flex-col gap-2">
<p class="text-label-caps text-on-surface-variant">CURRENT HEIGHT</p>
<div class="flex items-baseline gap-2">
<span class="text-[48px] serif text-primary">85</span>
<span class="text-headline-md text-on-surface-variant">cm</span>
</div>
<div class="flex items-center gap-1 text-secondary">
<span class="material-symbols-outlined text-sm">trending_up</span>
<span class="text-sm font-bold">+2% from last month</span>
</div>
</div>
<div class="p-8 border border-outline-variant bg-surface-container-lowest rounded-xl flex flex-col gap-2">
<p class="text-label-caps text-on-surface-variant">CURRENT WEIGHT</p>
<div class="flex items-baseline gap-2">
<span class="text-[48px] serif text-primary">12.4</span>
<span class="text-headline-md text-on-surface-variant">kg</span>
</div>
<div class="flex items-center gap-1 text-secondary">
<span class="material-symbols-outlined text-sm">trending_up</span>
<span class="text-sm font-bold">+1.5% from last month</span>
</div>
</div>
</div>
</section>
<!-- Minimalist Visualization Section -->
<section class="mb-section-gap grid grid-cols-1 lg:grid-cols-2 gap-16">
<div class="flex flex-col gap-8">
<div class="flex flex-col gap-2">
<h3 class="text-headline-md serif text-primary">Height Progression</h3>
<p class="text-body-md text-on-surface-variant">Tracking growth percentile against standard developmental curves (0-24 months).</p>
</div>
<div class="h-64 w-full border-b border-l border-outline-variant relative pt-8">
<svg class="w-full h-full overflow-visible" preserveaspectratio="none" viewbox="0 0 400 200">
<!-- Grid Lines -->
<line stroke="#c5c6ce" stroke-dasharray="4" stroke-width="0.5" x1="0" x2="400" y1="50" y2="50"></line>
<line stroke="#c5c6ce" stroke-dasharray="4" stroke-width="0.5" x1="0" x2="400" y1="100" y2="100"></line>
<line stroke="#c5c6ce" stroke-dasharray="4" stroke-width="0.5" x1="0" x2="400" y1="150" y2="150"></line>
<!-- Growth Curve -->
<path d="M0,180 C50,170 100,140 150,110 S250,60 400,20" fill="none" stroke="#566252" stroke-width="2"></path>
<!-- Points -->
<circle cx="0" cy="180" fill="white" r="4" stroke="#566252" stroke-width="1"></circle>
<circle cx="100" cy="140" fill="white" r="4" stroke="#566252" stroke-width="1"></circle>
<circle cx="200" cy="85" fill="white" r="4" stroke="#566252" stroke-width="1"></circle>
<circle cx="300" cy="45" fill="white" r="4" stroke="#566252" stroke-width="1"></circle>
<circle cx="400" cy="20" fill="#566252" r="4"></circle>
</svg>
<div class="flex justify-between mt-4 text-label-caps text-on-surface-variant">
<span>Birth</span>
<span>6m</span>
<span>12m</span>
<span>18m</span>
<span>24m</span>
</div>
</div>
</div>
<div class="flex flex-col gap-8">
<div class="flex flex-col gap-2">
<h3 class="text-headline-md serif text-primary">Weight Distribution</h3>
<p class="text-body-md text-on-surface-variant">Steady weight gain over time, maintaining a healthy body-mass index.</p>
</div>
<div class="h-64 w-full border-b border-l border-outline-variant relative pt-8">
<svg class="w-full h-full overflow-visible" preserveaspectratio="none" viewbox="0 0 400 200">
<!-- Grid Lines -->
<line stroke="#c5c6ce" stroke-dasharray="4" stroke-width="0.5" x1="0" x2="400" y1="50" y2="50"></line>
<line stroke="#c5c6ce" stroke-dasharray="4" stroke-width="0.5" x1="0" x2="400" y1="100" y2="100"></line>
<line stroke="#c5c6ce" stroke-dasharray="4" stroke-width="0.5" x1="0" x2="400" y1="150" y2="150"></line>
<!-- Weight Curve -->
<path d="M0,190 Q100,160 200,120 T400,40" fill="none" stroke="#1a2b48" stroke-width="2"></path>
<!-- Points -->
<circle cx="0" cy="190" fill="white" r="4" stroke="#1a2b48" stroke-width="1"></circle>
<circle cx="150" cy="140" fill="white" r="4" stroke="#1a2b48" stroke-width="1"></circle>
<circle cx="300" cy="70" fill="white" r="4" stroke="#1a2b48" stroke-width="1"></circle>
<circle cx="400" cy="40" fill="#1a2b48" r="4"></circle>
</svg>
<div class="flex justify-between mt-4 text-label-caps text-on-surface-variant">
<span>Birth</span>
<span>6m</span>
<span>12m</span>
<span>18m</span>
<span>24m</span>
</div>
</div>
</div>
</section>
<!-- Milestone Timeline Section -->
<section class="mb-section-gap">
<div class="flex flex-col gap-12 max-w-3xl mx-auto">
<div class="text-center">
<h2 class="text-display-lg serif text-primary mb-4">Milestone Timeline</h2>
<p class="text-body-md text-on-surface-variant">The significant moments of physical discovery.</p>
</div>
<div class="relative pl-8">
<!-- Vertical Axis -->
<div class="absolute left-0 top-0 bottom-0 w-px bg-outline"></div>
<!-- Timeline Events -->
<div class="flex flex-col gap-16">
<div class="relative">
<div class="absolute -left-[37px] top-1.5 size-4 rounded-full border border-outline bg-background"></div>
<div class="flex flex-col gap-2">
<span class="serif text-headline-md text-primary leading-none">First Smile</span>
<span class="text-label-caps text-secondary uppercase tracking-widest">Month 2 • Nov 12, 2022</span>
<p class="text-body-md text-on-surface-variant max-w-lg mt-2">A spontaneous, joyful expression that marked the beginning of her social and physical interaction with the world around her.</p>
</div>
</div>
<div class="relative">
<div class="absolute -left-[37px] top-1.5 size-4 rounded-full border border-outline bg-background"></div>
<div class="flex flex-col gap-2">
<span class="serif text-headline-md text-primary leading-none">First Crawl</span>
<span class="text-label-caps text-secondary uppercase tracking-widest">Month 7 • April 20, 2023</span>
<p class="text-body-md text-on-surface-variant max-w-lg mt-2">Mastered the coordination of limbs to move forward across the living room carpet, showing immense determination.</p>
</div>
</div>
<div class="relative">
<div class="absolute -left-[37px] top-1.5 size-4 rounded-full border border-outline bg-background"></div>
<div class="flex flex-col gap-2">
<span class="serif text-headline-md text-primary leading-none">The First Tooth</span>
<span class="text-label-caps text-secondary uppercase tracking-widest">Month 8 • May 14, 2023</span>
<p class="text-body-md text-on-surface-variant max-w-lg mt-2">A tiny white speck appeared on the lower gum line, signaling a new phase in her nutritional development.</p>
</div>
</div>
<div class="relative">
<div class="absolute -left-[37px] top-1.5 size-4 rounded-full border border-outline bg-background"></div>
<div class="flex flex-col gap-2">
<span class="serif text-headline-md text-primary leading-none">Independent Steps</span>
<span class="text-label-caps text-secondary uppercase tracking-widest">Month 13 • Oct 05, 2023</span>
<p class="text-body-md text-on-surface-variant max-w-lg mt-2">Three brave, unassisted steps toward her father. The ultimate milestone in her physical autonomy.</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Detailed Records Table -->
<section class="mb-section-gap">
<div class="flex flex-col gap-8">
<div class="flex justify-between items-end">
<div>
<h3 class="text-headline-md serif text-primary">Detailed Logs</h3>
<p class="text-body-md text-on-surface-variant">Archival measurements recorded during pediatric visits.</p>
</div>
<button class="px-6 py-2 border border-primary text-primary text-sm font-bold rounded hover:bg-primary hover:text-on-primary transition-colors">
                                Export PDF Report
                            </button>
</div>
<div class="w-full overflow-hidden border-t border-outline-variant">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low">
<tr>
<th class="px-6 py-4 text-label-caps text-primary uppercase">Date</th>
<th class="px-6 py-4 text-label-caps text-primary uppercase">Age</th>
<th class="px-6 py-4 text-label-caps text-primary uppercase">Height</th>
<th class="px-6 py-4 text-label-caps text-primary uppercase">Weight</th>
<th class="px-6 py-4 text-label-caps text-primary uppercase text-right">Notes</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<tr>
<td class="px-6 py-5 text-body-md">Jan 12, 2024</td>
<td class="px-6 py-5 text-body-md">16 Months</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">82.0 cm</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">11.8 kg</td>
<td class="px-6 py-5 text-body-md text-on-surface-variant text-right">Routine checkup</td>
</tr>
<tr>
<td class="px-6 py-5 text-body-md">Oct 05, 2023</td>
<td class="px-6 py-5 text-body-md">13 Months</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">78.5 cm</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">10.9 kg</td>
<td class="px-6 py-5 text-body-md text-on-surface-variant text-right">Walking independently</td>
</tr>
<tr>
<td class="px-6 py-5 text-body-md">July 15, 2023</td>
<td class="px-6 py-5 text-body-md">10 Months</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">74.0 cm</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">9.5 kg</td>
<td class="px-6 py-5 text-body-md text-on-surface-variant text-right">Teething</td>
</tr>
<tr>
<td class="px-6 py-5 text-body-md">April 12, 2023</td>
<td class="px-6 py-5 text-body-md">7 Months</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">70.2 cm</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">8.2 kg</td>
<td class="px-6 py-5 text-body-md text-on-surface-variant text-right">Started solid foods</td>
</tr>
<tr>
<td class="px-6 py-5 text-body-md">Jan 12, 2023</td>
<td class="px-6 py-5 text-body-md">4 Months</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">64.0 cm</td>
<td class="px-6 py-5 text-body-md font-bold text-primary">6.5 kg</td>
<td class="px-6 py-5 text-body-md text-on-surface-variant text-right">Rolling over</td>
</tr>
</tbody>
</table>
</div>
</div>
</section>
<!-- Footer Call to Action -->
<section class="text-center py-16 border-t border-outline-variant">
<p class="text-label-caps text-secondary mb-4 uppercase tracking-widest font-bold">The Journey Continues</p>
<h3 class="text-display-lg serif text-primary mb-8">Building a Legacy</h3>
<div class="flex gap-4 justify-center">
<button class="bg-primary text-on-primary px-8 py-3 rounded-lg font-bold hover:opacity-90 transition-opacity">Add Measurement</button>
<button class="border border-outline text-primary px-8 py-3 rounded-lg font-bold hover:bg-surface-container transition-colors">Log Milestone</button>
</div>
</section>
</main>
<!-- Bottom Navigation -->
<nav class="flex justify-between items-center px-40 py-6 border-t border-outline-variant bg-surface-container-low">
<div class="flex gap-8">
<a class="text-sm font-bold text-primary hover:underline" href="#">Dashboard</a>
<a class="text-sm font-bold text-on-surface-variant hover:text-primary transition-colors" href="#">Milestones</a>
<a class="text-sm font-bold text-on-surface-variant hover:text-primary transition-colors" href="#">Gallery</a>
<a class="text-sm font-bold text-on-surface-variant hover:text-primary transition-colors" href="#">Messages</a>
</div>
<p class="text-sm text-on-surface-variant">© 2024 Little by Little Portfolio</p>
</nav>
</div>
</div>
</div>
</template>

<script>
export default {
    name: 'MilestonesPage'
}
</script>

<style scoped>
.serif {
    font-family: 'Noto Serif', serif;
}
</style>
