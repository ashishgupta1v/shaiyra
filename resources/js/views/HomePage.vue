<template>
  <div class="animate-fade-in">
    <!-- HERO -->
    <div class="relative min-h-[92vh] flex items-center overflow-hidden">
      <!-- Background gradient -->
      <div class="absolute inset-0 bg-gradient-to-br from-cream via-cream to-sage/5"></div>
      <!-- Decorative circles -->
      <div class="absolute top-20 right-0 w-[500px] h-[500px] rounded-full bg-sage/5 -translate-x-1/4"></div>
      <div class="absolute bottom-0 left-1/4 w-80 h-80 rounded-full bg-blush/20"></div>

      <div class="relative max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-16">
        <!-- Left content -->
        <div class="flex-1 space-y-8">
          <div>
            <span class="inline-block text-xs font-black tracking-[0.3em] text-sage uppercase mb-6">Est. April 29, 2026</span>
            <h1 class="font-serif text-6xl md:text-8xl font-light text-navy leading-[1.05] mb-6">
              World, Meet<br/><em class="text-sage">Shaiyra.</em>
            </h1>
            <div class="w-16 h-0.5 bg-sage mb-6"></div>
            <p class="text-lg text-sage/80 max-w-lg leading-relaxed font-light">
              A digital heirloom — capturing first breaths, first steps, and every extraordinary ordinary moment. This is the curated beginning of a legacy that will last forever.
            </p>
          </div>

          <!-- Birth stats -->
          <div class="grid grid-cols-3 gap-4 max-w-sm">
            <div class="text-center p-4 border border-sage/20 bg-white/50">
              <div class="font-serif text-2xl font-semibold text-navy">2.8 kg</div>
              <div class="text-xs text-sage uppercase tracking-widest mt-1">Birth Weight</div>
            </div>
            <div class="text-center p-4 border border-sage/20 bg-white/50">
              <div class="font-serif text-2xl font-semibold text-navy">48 cm</div>
              <div class="text-xs text-sage uppercase tracking-widest mt-1">Length</div>
            </div>
            <div class="text-center p-4 border border-sage/20 bg-white/50">
              <div class="font-serif text-2xl font-semibold text-navy">{{ store.shaiyraAge }}</div>
              <div class="text-xs text-sage uppercase tracking-widest mt-1">Age</div>
            </div>
          </div>

          <!-- CTAs -->
          <div class="flex flex-wrap gap-4">
            <RouterLink to="/life-feed" class="bg-navy text-cream px-8 py-3 text-xs font-black tracking-[0.2em] uppercase hover:bg-navy-light transition-colors">READ THE JOURNAL</RouterLink>
            <RouterLink to="/milestones" class="border border-navy text-navy px-8 py-3 text-xs font-black tracking-[0.2em] uppercase hover:bg-navy hover:text-cream transition-all">VIEW MILESTONES</RouterLink>
          </div>
        </div>

        <!-- Right: Photo frame -->
        <div class="flex-1 flex items-center justify-center">
          <div class="relative">
            <!-- Main photo -->
            <div class="w-80 h-96 md:w-96 md:h-[480px] bg-surface-warm rounded-sm overflow-hidden rotate-tiny-r shadow-2xl">
              <div class="w-full h-full bg-gradient-to-br from-sage/20 via-blush/30 to-gold/20 flex items-center justify-center">
                <div class="text-center">
                  <div class="w-24 h-24 rounded-full bg-white/40 flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <span class="material-symbols-outlined text-5xl text-navy/40" style="font-variation-settings:'FILL' 1">child_care</span>
                  </div>
                  <p class="font-serif italic text-navy/50 text-sm">Photo of Shaiyra</p>
                  <p class="text-xs text-sage/50 mt-1">April 29, 2026</p>
                </div>
              </div>
            </div>
            <!-- Quote card floating -->
            <div class="absolute -bottom-6 -left-8 bg-white p-5 shadow-xl max-w-[200px] rotate-slight-l border border-sage/10">
              <p class="font-serif italic text-navy text-xs leading-relaxed">"The smallest feet make the biggest footprints in our hearts."</p>
              <div class="w-8 h-0.5 bg-sage mt-3"></div>
            </div>
            <!-- Stats floating -->
            <div class="absolute -top-4 -right-6 bg-sage text-cream p-4 shadow-lg">
              <div class="font-serif text-2xl font-bold">{{ daysSince('2026-04-29') }}</div>
              <div class="text-xs font-bold tracking-widest uppercase mt-1">Days Old</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Scroll indicator -->
      <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce">
        <span class="text-xs text-sage uppercase tracking-widest">Scroll</span>
        <span class="material-symbols-outlined text-sage">expand_more</span>
      </div>
    </div>

    <!-- TIMELINE PREVIEW -->
    <div class="bg-surface-warm py-24">
      <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-end justify-between mb-16">
          <div>
            <span class="text-xs font-black tracking-[0.25em] text-sage uppercase mb-3 block">Growing Up</span>
            <h2 class="font-serif text-5xl text-navy font-light">Milestones &amp; Memories</h2>
            <div class="w-12 h-0.5 bg-sage mt-4"></div>
          </div>
          <RouterLink to="/milestones" class="hidden md:flex items-center gap-2 text-xs font-bold text-sage uppercase tracking-widest hover:text-navy transition-colors">
            View All <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </RouterLink>
        </div>

        <!-- Timeline -->
        <div class="relative timeline-rail pl-12 space-y-12">
          <div v-for="(milestone, idx) in recentMilestones" :key="milestone.id" class="relative flex items-start gap-8 group">
            <div class="absolute -left-3 top-2 w-6 h-6 rounded-full border-2 flex items-center justify-center bg-cream z-10 transition-all group-hover:scale-125" :class="idx === 0 ? 'border-sage bg-sage' : 'border-sage/40'">
              <div :class="idx === 0 ? 'bg-cream' : 'bg-sage/30'" class="w-2 h-2 rounded-full"></div>
            </div>
            <div class="flex-1 bg-white p-6 shadow-sm border border-sage/10 card-lift">
              <div class="flex items-start justify-between gap-4">
                <div>
                  <span class="font-serif italic text-sage text-sm">{{ formatDate(milestone.date) }}</span>
                  <h3 class="font-serif text-xl text-navy mt-1 mb-2">{{ milestone.title }}</h3>
                  <p class="text-sm text-sage/70 leading-relaxed">{{ milestone.description }}</p>
                  <div class="flex gap-2 mt-3">
                    <span class="milestone-badge bg-sage/10 text-sage">{{ milestone.category || 'Milestone' }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-12 text-center">
          <RouterLink to="/milestones" class="inline-block border border-sage text-sage px-8 py-3 text-xs font-black tracking-[0.2em] uppercase hover:bg-sage hover:text-cream transition-all">VIEW ALL MILESTONES</RouterLink>
        </div>
      </div>
    </div>

    <!-- CURRENT VIBES -->
    <div class="max-w-7xl mx-auto px-6 py-24">
      <div class="flex items-end justify-between mb-16">
        <div>
          <span class="text-xs font-black tracking-[0.25em] text-sage uppercase mb-3 block">Right Now</span>
          <h2 class="font-serif text-5xl text-navy font-light">Current Vibes</h2>
          <p class="text-sage/70 mt-2">A snapshot of Shaiyra's world right now</p>
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div v-for="vibe in currentVibes" :key="vibe.label" class="p-8 border border-sage/15 bg-white/60 hover:shadow-lg transition-shadow card-lift">
          <span class="material-symbols-outlined text-3xl text-sage mb-4 block" style="font-variation-settings:'FILL' 1">{{ vibe.icon }}</span>
          <div class="text-xs font-black tracking-widest text-sage uppercase mb-2">{{ vibe.label }}</div>
          <div class="font-serif text-xl text-navy mb-2">{{ vibe.value }}</div>
          <p class="text-sm text-sage/60 leading-relaxed">{{ vibe.detail }}</p>
        </div>
      </div>
    </div>

    <!-- SCRAPBOOK GALLERY -->
    <div class="bg-surface-warm py-24">
      <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-end justify-between mb-16">
          <div>
            <span class="text-xs font-black tracking-[0.25em] text-sage uppercase mb-3 block">Captured Moments</span>
            <h2 class="font-serif text-5xl text-navy font-light">Recent Photos</h2>
          </div>
        </div>
        <div class="grid grid-cols-12 gap-4">
          <div class="col-span-12 md:col-span-7 row-span-2 aspect-[4/3] bg-surface-stone rounded-sm overflow-hidden rotate-tiny-r shadow-lg card-lift">
            <div class="w-full h-full bg-gradient-to-br from-sage/20 via-blush/20 to-gold/15 flex items-center justify-center">
              <span class="material-symbols-outlined text-6xl text-navy/20" style="font-variation-settings:'FILL' 1">photo_camera</span>
            </div>
          </div>
          <div class="col-span-6 md:col-span-5 aspect-square bg-surface-stone rounded-sm overflow-hidden -rotate-slight-l shadow-md card-lift">
            <div class="w-full h-full bg-gradient-to-br from-blush/30 via-cream to-sage/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-4xl text-navy/20" style="font-variation-settings:'FILL' 1">child_care</span>
            </div>
          </div>
          <div class="col-span-6 md:col-span-5 aspect-square bg-surface-stone rounded-sm overflow-hidden rotate-slight-r shadow-md card-lift">
            <div class="w-full h-full bg-gradient-to-br from-gold/20 via-cream to-sage/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-4xl text-navy/20" style="font-variation-settings:'FILL' 1">favorite</span>
            </div>
          </div>
        </div>
        <div class="mt-8 text-center">
          <button class="border border-navy text-navy px-8 py-3 text-xs font-black tracking-[0.2em] uppercase hover:bg-navy hover:text-cream transition-all">OPEN GALLERY</button>
        </div>
      </div>
    </div>

    <!-- STATS STRIP -->
    <div class="bg-navy py-16">
      <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
          <div>
            <div class="font-serif text-5xl text-cream font-light">{{ store.stats.milestonesCount }}+</div>
            <div class="text-xs text-cream/40 uppercase tracking-widest mt-2">Milestones</div>
          </div>
          <div>
            <div class="font-serif text-5xl text-cream font-light">{{ store.stats.journalCount }}+</div>
            <div class="text-xs text-cream/40 uppercase tracking-widest mt-2">Journal Entries</div>
          </div>
          <div>
            <div class="font-serif text-5xl text-cream font-light">{{ store.stats.lettersCount }}+</div>
            <div class="text-xs text-cream/40 uppercase tracking-widest mt-2">Letters & Messages</div>
          </div>
          <div>
            <div class="font-serif text-5xl text-cream font-light">∞</div>
            <div class="text-xs text-cream/40 uppercase tracking-widest mt-2">Love &amp; Memories</div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Footer -->
    <footer class="py-12 border-t border-sage/10 text-center flex flex-col items-center">
      <img src="/images/shaiyra-logo.png" alt="Shaiyra Logo" class="w-16 h-16 mb-6 object-contain opacity-80" />
      <div class="font-serif text-lg mb-1 text-navy">Shaiyra Gupta</div>
      <div class="text-xs text-sage/50">Born April 29, 2026 · A heirloom journal</div>
      <div class="text-xs text-sage/40 mt-6">Made with love by Mama &amp; Papa · {{ currentYear }}</div>
    </footer>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { RouterLink } from 'vue-router';
import { useJournalStore } from '@/stores/journal';

const store = useJournalStore();
store.init();

const recentMilestones = computed(() => store.sortedMilestones.slice(0, 5));

const currentVibes = computed(() => store.vibes || [
  { icon: 'restaurant', label: 'Favorite Food', value: 'Avocado Mash', detail: 'She absolutely loves it, gets everywhere.' },
  { icon: 'music_note', label: 'Favorite Song', value: 'Twinkle Twinkle', detail: 'Sings along with dada every night.' },
  { icon: 'toys', label: 'Current Obsession', value: 'Keys', detail: 'Real keys, not the plastic ones.' },
  { icon: 'bedtime', label: 'Sleep Status', value: 'Sleeping Through', detail: 'Mostly. Fingers crossed.' }
]);

const currentYear = new Date().getFullYear();

function daysSince(dateStr) {
  return Math.floor((Date.now() - new Date(dateStr).getTime()) / (1000 * 60 * 60 * 24));
}

function formatDate(dateStr) {
  if (!dateStr) return '';
  return new Date(dateStr).toLocaleDateString('en-IN', { day: 'numeric', month: 'long', year: 'numeric' });
}
</script>
