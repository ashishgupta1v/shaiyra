<template>
  <div class="animate-fade-in">
    <!-- Global Reading Progress -->
    <div class="fixed top-0 left-0 h-1 bg-gold z-[100] origin-left transition-transform duration-100 ease-out shadow-[0_0_10px_rgba(201,168,76,0.5)]" 
         :style="`transform: scaleX(${globalScrollProgress / 100})`"></div>

    <!-- HERO -->
    <div class="relative min-h-[92vh] flex items-center overflow-hidden">
      <!-- Background gradient -->
      <div class="absolute inset-0 bg-gradient-to-br from-cream via-cream to-sage/5"></div>
      <!-- Decorative circles -->
      <div v-reveal="'reveal-scale'" class="absolute top-20 right-0 w-[500px] h-[500px] rounded-full bg-sage/5 -translate-x-1/4"></div>
      <div v-reveal="'reveal-scale'" class="absolute bottom-0 left-1/4 w-80 h-80 rounded-full bg-blush/20" style="transition-delay: 0.2s"></div>

      <div class="relative max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-16">
        <!-- Left content -->
        <div class="flex-1 space-y-8">
          <div v-reveal="'reveal-up'">
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
          <div v-reveal="'reveal-up'" class="grid grid-cols-3 gap-4 max-w-sm" style="transition-delay: 0.1s">
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
          <div v-reveal="'reveal-up'" class="flex flex-wrap gap-4" style="transition-delay: 0.2s">
            <RouterLink  to="/life-feed" class="bg-navy text-cream px-8 py-3 text-xs font-black tracking-[0.2em] uppercase hover:bg-navy-light transition-colors hover:shadow-lg hover:-translate-y-0.5 transition-transform hover:scale-105 active:scale-95">READ THE JOURNAL</RouterLink>
            <RouterLink  to="/milestones" class="border border-navy text-navy px-8 py-3 text-xs font-black tracking-[0.2em] uppercase hover:bg-navy hover:text-cream transition-all transition-transform hover:scale-105 active:scale-95">VIEW MILESTONES</RouterLink>
          </div>
        </div>

        <!-- Right: Photo frame -->
        <div v-reveal="'reveal-left'" class="flex-1 flex items-center justify-center">
          <div class="relative">
            <!-- Main photo -->
            <div v-tilt class="w-80 h-96 md:w-96 md:h-[480px] bg-surface-warm rounded-sm overflow-hidden rotate-tiny-r shadow-2xl card-lift">
              <div class="w-full h-full bg-gradient-to-br from-sage/20 via-blush/30 to-gold/20 flex items-center justify-center">
                <div class="text-center">
                  <div class="w-24 h-24 rounded-full bg-white/40 flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <Baby class="w-12 h-12 text-navy/40" />
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
      <div v-reveal="'reveal-up'" class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce" style="transition-delay: 0.8s">
        <span class="text-xs text-sage uppercase tracking-widest">Scroll</span>
        <ChevronDown class="w-6 h-6 text-sage" />
      </div>
    </div>

    <!-- TIMELINE PREVIEW -->
    <div class="bg-surface-warm py-24 relative overflow-hidden">
      <!-- Decorative background -->
      <div class="absolute top-0 right-0 w-full h-full bg-gradient-to-b from-transparent to-sage/5 pointer-events-none"></div>
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="flex items-end justify-between mb-16">
          <div v-reveal="'reveal-right'">
            <span class="text-xs font-black tracking-[0.25em] text-sage uppercase mb-3 block">Growing Up</span>
            <h2 class="font-serif text-5xl text-navy font-light">Milestones &amp; Memories</h2>
            <div class="w-12 h-0.5 bg-sage mt-4"></div>
          </div>
          <RouterLink  to="/milestones" class="hidden md:flex items-center gap-2 text-xs font-bold text-sage uppercase tracking-widest hover:text-navy transition-colors transition-transform hover:scale-105 active:scale-95">
            View All <ArrowRight class="w-4 h-4 ml-1" />
          </RouterLink>
        </div>

        <!-- Timeline -->
        <div class="relative timeline-rail pl-12 space-y-12" ref="timelineSection">
          <!-- Active Timeline Progress Line -->
          <div class="absolute left-0 top-0 w-px bg-gold transition-all duration-100 ease-out shadow-[0_0_8px_rgba(201,168,76,0.5)] z-10" :style="`height: ${timelineProgress}%`"></div>

          <div v-for="(milestone, idx) in recentMilestones" :key="milestone.id" v-reveal="'reveal-up'" :style="`transition-delay: ${idx * 0.1}s`" class="relative flex items-start gap-8 group">
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
          <RouterLink  to="/milestones" class="inline-block border border-sage text-sage px-8 py-3 text-xs font-black tracking-[0.2em] uppercase hover:bg-sage hover:text-cream transition-all transition-transform hover:scale-105 active:scale-95">VIEW ALL MILESTONES</RouterLink>
        </div>
      </div>
    </div>

    <!-- CURRENT VIBES -->
    <div class="max-w-7xl mx-auto px-6 py-24">
      <div class="flex items-end justify-between mb-16">
        <div v-reveal="'reveal-up'">
          <span class="text-xs font-black tracking-[0.25em] text-sage uppercase mb-3 block">Right Now</span>
          <h2 class="font-serif text-5xl text-navy font-light">Current Vibes</h2>
          <p class="text-sage/70 mt-2">A snapshot of Shaiyra's world right now</p>
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div v-for="(vibe, index) in currentVibes" :key="vibe.label" v-reveal="'reveal-up'" :style="`transition-delay: ${index * 0.1}s`" class="p-8 border border-sage/15 glass-glow hover:shadow-lg transition-shadow card-lift">
          <component :is="vibe.icon" class="w-8 h-8 text-sage mb-4 block" />
          <div class="text-xs font-black tracking-widest text-sage uppercase mb-2">{{ vibe.label }}</div>
          <div class="font-serif text-xl text-navy mb-2">{{ vibe.value }}</div>
          <p class="text-sm text-sage/60 leading-relaxed">{{ vibe.detail }}</p>
        </div>
      </div>
    </div>

    <!-- SCRAPBOOK GALLERY -->
    <div class="bg-surface-warm py-24 relative overflow-hidden">
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="flex items-end justify-between mb-16">
          <div v-reveal="'reveal-right'">
            <span class="text-xs font-black tracking-[0.25em] text-sage uppercase mb-3 block">Captured Moments</span>
            <h2 class="font-serif text-5xl text-navy font-light">Recent Photos</h2>
          </div>
        </div>
        <div class="grid grid-cols-12 gap-4">
          <div v-tilt v-reveal="'reveal-up'" class="col-span-12 md:col-span-7 row-span-2 aspect-[4/3] bg-surface-stone rounded-sm overflow-hidden rotate-tiny-r shadow-lg card-lift">
            <div class="w-full h-full bg-gradient-to-br from-sage/20 via-blush/20 to-gold/15 flex items-center justify-center">
              <Camera class="w-16 h-16 text-navy/20" />
            </div>
          </div>
          <div v-tilt v-reveal="'reveal-left'" style="transition-delay: 0.1s" class="col-span-6 md:col-span-5 aspect-square bg-surface-stone rounded-sm overflow-hidden -rotate-slight-l shadow-md card-lift">
            <div class="w-full h-full bg-gradient-to-br from-blush/30 via-cream to-sage/10 flex items-center justify-center">
              <Baby class="w-10 h-10 text-navy/20" />
            </div>
          </div>
          <div v-tilt v-reveal="'reveal-left'" style="transition-delay: 0.2s" class="col-span-6 md:col-span-5 aspect-square bg-surface-stone rounded-sm overflow-hidden rotate-slight-r shadow-md card-lift">
            <div class="w-full h-full bg-gradient-to-br from-gold/20 via-cream to-sage/10 flex items-center justify-center">
              <Heart class="w-10 h-10 text-navy/20" />
            </div>
          </div>
        </div>
        <div class="mt-8 text-center">
          <button  class="border border-navy text-navy px-8 py-3 text-xs font-black tracking-[0.2em] uppercase hover:bg-navy hover:text-cream transition-all transition-transform hover:scale-105 active:scale-95">OPEN GALLERY</button>
        </div>
      </div>
    </div>

    <!-- STATS STRIP -->
    <div class="bg-navy py-16 relative overflow-hidden">
      <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(86,98,82,0.2),transparent_70%)]"></div>
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
          <div v-reveal="'reveal-up'">
            <div class="font-serif text-5xl text-cream font-light">{{ store.stats.milestonesCount }}+</div>
            <div class="text-xs text-cream/40 uppercase tracking-widest mt-2">Milestones</div>
          </div>
          <div v-reveal="'reveal-up'" style="transition-delay: 0.1s">
            <div class="font-serif text-5xl text-cream font-light">{{ store.stats.journalCount }}+</div>
            <div class="text-xs text-cream/40 uppercase tracking-widest mt-2">Journal Entries</div>
          </div>
          <div v-reveal="'reveal-up'" style="transition-delay: 0.2s">
            <div class="font-serif text-5xl text-cream font-light">{{ store.stats.lettersCount }}+</div>
            <div class="text-xs text-cream/40 uppercase tracking-widest mt-2">Letters & Messages</div>
          </div>
          <div v-reveal="'reveal-up'" style="transition-delay: 0.3s">
            <div class="font-serif text-5xl text-cream font-light">∞</div>
            <div class="text-xs text-cream/40 uppercase tracking-widest mt-2">Love &amp; Memories</div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Footer -->
    <footer class="py-12 border-t border-sage/10 text-center flex flex-col items-center">
      <img src="/logo.png" alt="Shaiyra Logo" class="w-16 h-16 mb-6 object-contain opacity-80" />
      <div class="font-serif text-lg mb-1 text-navy">Shaiyra Gupta</div>
      <div class="text-xs text-sage/50">Born April 29, 2026 · A heirloom journal</div>
      <div class="text-xs text-sage/40 mt-6">Made with love by Mama &amp; Papa · {{ currentYear }}</div>
    </footer>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted, shallowRef } from 'vue';
import { RouterLink } from 'vue-router';
import { useJournalStore } from '@/stores/journal';
import { Baby, ChevronDown, ArrowRight, Camera, Heart, Utensils, Music, ToyBrick, Moon } from 'lucide-vue-next';

const store = useJournalStore();
store.init();

const globalScrollProgress = ref(0);
const timelineProgress = ref(0);
const timelineSection = ref(null);

function handleScroll() {
  // Global progress
  const winScroll = window.scrollY || document.documentElement.scrollTop;
  const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  if (docHeight > 0) {
    globalScrollProgress.value = Math.min(100, Math.max(0, (winScroll / docHeight) * 100));
  }

  // Timeline section progress
  if (timelineSection.value) {
    const rect = timelineSection.value.getBoundingClientRect();
    const windowHeight = window.innerHeight;
    
    // Start tracking when the top of the timeline comes into view (mid-screen)
    // and finish when the bottom of the timeline reaches mid-screen
    const trackStart = windowHeight * 0.6; 
    const totalDistance = rect.height;
    
    const distanceScrolled = trackStart - rect.top;
    
    if (distanceScrolled < 0) {
      timelineProgress.value = 0;
    } else if (distanceScrolled > totalDistance) {
      timelineProgress.value = 100;
    } else {
      timelineProgress.value = (distanceScrolled / totalDistance) * 100;
    }
  }
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

const recentMilestones = computed(() => store.sortedMilestones.slice(0, 5));

const currentVibes = computed(() => store.vibes || [
  { icon: shallowRef(Utensils), label: 'Favorite Food', value: 'Avocado Mash', detail: 'She absolutely loves it, gets everywhere.' },
  { icon: shallowRef(Music), label: 'Favorite Song', value: 'Twinkle Twinkle', detail: 'Sings along with dada every night.' },
  { icon: shallowRef(ToyBrick), label: 'Current Obsession', value: 'Keys', detail: 'Real keys, not the plastic ones.' },
  { icon: shallowRef(Moon), label: 'Sleep Status', value: 'Sleeping Through', detail: 'Mostly. Fingers crossed.' }
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
