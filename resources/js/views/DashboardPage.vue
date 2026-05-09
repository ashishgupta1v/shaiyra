<template>
  <div class="animate-fade-in bg-surface-warm min-h-screen pb-24">
    <NavBar />

    <!-- Page Header -->
    <div class="pt-24 pb-16 bg-navy relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-navy to-navy/80"></div>
      <div class="relative max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <div>
            <p class="text-xs font-black tracking-[0.25em] text-gold uppercase mb-3 block">Admin Vault</p>
            <h1 class="font-serif text-4xl md:text-5xl font-light text-cream mb-2">Shaiyra's Dashboard</h1>
            <p class="text-sm font-bold tracking-widest uppercase text-sage/50">{{ store.shaiyraAge }} · {{ today }}</p>
          </div>
          <div class="flex items-center gap-4 w-full md:w-auto">
            <button  @click="store.exportData()" class="flex-1 md:flex-none flex items-center justify-center gap-2 px-6 py-3 border border-sage/20 text-cream text-xs font-black tracking-widest uppercase hover:bg-white/5 transition-colors card-lift transition-transform hover:scale-105 active:scale-95">
              <span class="material-symbols-outlined text-sm">download</span>
              Export
            </button>
            <RouterLink to="/home"  class="flex-1 md:flex-none flex items-center justify-center gap-2 px-6 py-3 bg-gold text-navy text-xs font-black tracking-widest uppercase hover:bg-gold/90 transition-colors card-lift transition-transform hover:scale-105 active:scale-95">
              <span class="material-symbols-outlined text-sm">public</span>
              View Journal
            </RouterLink>
          </div>
        </div>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-12">
      <!-- Stats Grid -->
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 mb-12">
        <div v-for="(stat, index) in statCards" :key="stat.label" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.05}s`"
          class="p-6 bg-white border border-sage/10 text-center cursor-pointer transition-all hover:shadow-lg card-lift"
          @click="$router.push(stat.route)">
          <div class="text-3xl mb-3 drop-shadow-sm">{{ stat.icon }}</div>
          <div class="font-serif text-3xl text-navy mb-1">{{ stat.value }}</div>
          <div class="text-[10px] font-black tracking-widest uppercase text-sage/80">{{ stat.label }}</div>
        </div>
      </div>

      <!-- Main Bento Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Quick Add Panel -->
        <div class="lg:col-span-1 p-8 bg-white border border-sage/10 rounded-none card-lift" v-tilt v-reveal="'reveal-up'">
          <h2 class="font-serif text-2xl text-navy mb-6">Quick Add</h2>
          <div class="space-y-3">
            <button v-for="action in quickActions" :key="action.label" class="transition-transform hover:scale-105 active:scale-95 w-full flex items-center gap-4 px-5 py-4 border transition-all hover:shadow-md bg-surface-stone border-sage/20 hover:border-sage/50 text-navy group">
              <span class="material-symbols-outlined text-xl text-sage group-hover:text-navy transition-colors">{{ action.icon }}</span>
              <span class="text-xs font-black tracking-widest uppercase">{{ action.label }}</span>
            </button>
          </div>
        </div>

        <!-- Recent Activity -->
        <div class="lg:col-span-2 p-8 bg-white border border-sage/10 rounded-none card-lift" v-tilt v-reveal="'reveal-up'">
          <h2 class="font-serif text-2xl text-navy mb-6">Recent Activity</h2>
          <div class="space-y-4">
            <div v-for="item in recentActivity" :key="item.id"
              class="flex items-start gap-5 p-5 bg-surface-stone border border-sage/20 transition-all hover:shadow-sm">
              <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 text-xl border border-sage/20 bg-white shadow-sm">{{ item.icon }}</div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-navy truncate mb-1">{{ item.title }}</p>
                <p class="text-[10px] font-black tracking-widest uppercase text-sage/80">{{ item.meta }}</p>
              </div>
              <time class="text-[10px] font-black tracking-widest uppercase text-sage/60 flex-shrink-0 pt-1">{{ formatDate(item.date) }}</time>
            </div>
            <div v-if="!recentActivity.length" class="text-center py-12 bg-surface-stone border border-sage/20">
              <p class="text-sm text-sage font-light">No activity yet — start adding memories!</p>
            </div>
          </div>
        </div>

        <!-- Growth Summary -->
        <div class="p-8 bg-white border border-sage/10 rounded-none card-lift flex flex-col h-full" v-tilt v-reveal="'reveal-up'">
          <div class="flex items-center justify-between mb-8">
            <h2 class="font-serif text-2xl text-navy">Growth</h2>
            <RouterLink to="/growth-tracker" class="text-[10px] font-black tracking-widest uppercase text-sage hover:text-navy transition-colors">View all →</RouterLink>
          </div>
          <div v-if="latestGrowth" class="space-y-6 flex-1">
            <div v-for="metric in growthMetrics" :key="metric.label" class="flex items-center justify-between border-b border-sage/10 pb-4 last:border-0 last:pb-0">
              <span class="text-[10px] font-black tracking-widest uppercase text-sage">{{ metric.label }}</span>
              <span class="text-xl font-serif text-navy">{{ metric.value }}</span>
            </div>
            <p class="text-[10px] font-black tracking-widest uppercase text-sage/60 pt-4 mt-auto">Recorded: {{ formatDate(latestGrowth.date) }}</p>
          </div>
          <div v-else class="text-center py-8 bg-surface-stone border border-sage/20 flex-1 flex items-center justify-center mb-6">
            <p class="text-sm text-sage font-light">No growth records yet.</p>
          </div>
          <button  @click="$router.push('/growth-tracker')" class="w-full py-3 border border-sage/30 text-navy text-xs font-black tracking-widest uppercase hover:bg-surface-stone transition-colors mt-6 transition-transform hover:scale-105 active:scale-95">
            + Add Measurement
          </button>
        </div>

        <!-- Latest Journal -->
        <div class="p-8 bg-white border border-sage/10 rounded-none card-lift flex flex-col h-full" v-tilt v-reveal="'reveal-up'">
          <div class="flex items-center justify-between mb-8">
            <h2 class="font-serif text-2xl text-navy">Journal</h2>
            <RouterLink to="/life-feed" class="text-[10px] font-black tracking-widest uppercase text-sage hover:text-navy transition-colors">View all →</RouterLink>
          </div>
          <div v-if="store.sortedJournal[0]" class="flex-1">
            <div class="p-6 bg-surface-stone border border-sage/20 h-full flex flex-col">
              <div class="flex justify-between items-start mb-4">
                <h3 class="font-serif text-lg text-navy leading-snug">{{ store.sortedJournal[0].title }}</h3>
                <span class="text-2xl drop-shadow-sm">{{ store.sortedJournal[0].mood }}</span>
              </div>
              <p class="text-sm leading-relaxed text-sage/80 font-light mb-6 flex-1" style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">{{ store.sortedJournal[0].content }}</p>
              <p class="text-[10px] font-black tracking-widest uppercase text-sage/60 pt-4 border-t border-sage/10">{{ formatDate(store.sortedJournal[0].date) }}</p>
            </div>
          </div>
          <div v-else class="text-center py-8 bg-surface-stone border border-sage/20 flex-1 flex items-center justify-center mb-6">
            <p class="text-sm text-sage font-light">No journal entries yet.</p>
          </div>
          <button  @click="$router.push('/life-feed')" class="w-full py-3 border border-sage/30 text-navy text-xs font-black tracking-widest uppercase hover:bg-surface-stone transition-colors mt-6 transition-transform hover:scale-105 active:scale-95">
            + New Entry
          </button>
        </div>

        <!-- Letters Summary -->
        <div class="p-8 bg-white border border-sage/10 rounded-none card-lift flex flex-col h-full" v-tilt v-reveal="'reveal-up'">
          <div class="flex items-center justify-between mb-8">
            <h2 class="font-serif text-2xl text-navy">Letters</h2>
            <RouterLink to="/letters-archive" class="text-[10px] font-black tracking-widest uppercase text-sage hover:text-navy transition-colors">View all →</RouterLink>
          </div>
          <div class="grid grid-cols-2 gap-4 flex-1">
            <div class="p-5 bg-surface-stone border border-sage/20 text-center flex flex-col justify-center">
              <div class="font-serif text-4xl text-navy mb-2">{{ store.unlockedLetters.length }}</div>
              <div class="text-[10px] font-black tracking-widest uppercase text-sage">Readable</div>
            </div>
            <div class="p-5 bg-surface-stone border border-sage/20 text-center flex flex-col justify-center">
              <div class="font-serif text-4xl text-sage/50 mb-2">{{ store.lockedLetters.length }}</div>
              <div class="text-[10px] font-black tracking-widest uppercase text-sage">Time-locked</div>
            </div>
          </div>
          <button  @click="$router.push('/letters-archive')" class="w-full py-3 border border-sage/30 text-navy text-xs font-black tracking-widest uppercase hover:bg-surface-stone transition-colors mt-6 transition-transform hover:scale-105 active:scale-95">
            + Write a Letter
          </button>
        </div>

        <!-- Guestbook Pending -->
        <div class="lg:col-span-3 p-8 bg-white border border-sage/10 rounded-none card-lift" v-tilt v-reveal="'reveal-up'">
          <div class="flex items-center justify-between mb-8">
            <h2 class="font-serif text-2xl text-navy">Guestbook</h2>
            <RouterLink to="/family-portal" class="text-[10px] font-black tracking-widest uppercase text-sage hover:text-navy transition-colors">View all →</RouterLink>
          </div>
          <div class="space-y-4">
            <div v-for="msg in pendingMessages" :key="msg.id" class="flex items-start gap-4 p-5 bg-surface-stone border border-sage/20 transition-all hover:shadow-sm">
              <div class="w-10 h-10 rounded-full flex items-center justify-center text-lg font-serif border border-sage/20 bg-white text-navy flex-shrink-0 shadow-sm">
                {{ msg.name[0] }}
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex items-center gap-3 mb-2">
                  <span class="text-sm font-bold text-navy">{{ msg.name }}</span>
                  <span class="text-[10px] font-black tracking-widest uppercase px-2 py-0.5 border border-gold/40 bg-gold/10 text-gold">Pending</span>
                </div>
                <p class="text-sm text-sage/80 leading-relaxed font-light" style="display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ msg.message }}</p>
              </div>
              <button  @click="store.approveGuestbookEntry(msg.id)" class="flex-shrink-0 text-[10px] font-black tracking-widest uppercase px-4 py-2 bg-navy text-cream hover:bg-navy/90 transition-colors transition-transform hover:scale-105 active:scale-95">Approve</button>
            </div>
            <div v-if="!pendingMessages.length" class="text-center py-8 bg-surface-stone border border-sage/20">
              <p class="text-sm text-sage font-light">No pending messages.</p>
            </div>
          </div>
        </div>

        <!-- Navigation Grid -->
        <div class="lg:col-span-3 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6">
          <RouterLink v-for="(nav, index) in navGrid" :key="nav.path" :to="nav.path" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.05}s`"
            class="flex flex-col items-center gap-3 p-6 bg-white border border-sage/10 text-center transition-all hover:shadow-lg card-lift">
            <span class="text-3xl drop-shadow-sm">{{ nav.icon }}</span>
            <span class="text-[10px] font-black tracking-widest uppercase text-navy">{{ nav.label }}</span>
          </RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { RouterLink, useRouter } from 'vue-router';
import { useJournalStore } from '@/stores/journal';
import NavBar from '@/components/NavBar.vue';

const store = useJournalStore();
const router = useRouter();
store.init();

const today = new Date().toLocaleDateString('en-IN', { weekday:'long', day:'numeric', month:'long', year:'numeric' });

const statCards = computed(() => [
  { label:'Journal', value: store.stats.journalCount,    icon:'📝', route:'/life-feed',      bg:'#56625220' },
  { label:'Milestones', value: store.stats.milestonesCount, icon:'⭐', route:'/milestones',  bg:'#dcc0c020' },
  { label:'Photos',  value: store.stats.photosCount,     icon:'🖼️', route:'/milestones',    bg:'#b8a9c920' },
  { label:'Letters', value: store.stats.lettersCount,    icon:'💌', route:'/letters-archive', bg:'#dcc0c020' },
  { label:'Family',  value: store.stats.familyCount,     icon:'👨‍👩‍👧', route:'/family-tree',   bg:'#56625220' },
  { label:'Adventures',value:store.stats.adventuresCount,icon:'🌍', route:'/life-feed',      bg:'#b8a9c920' },
]);

const quickActions = [
  { label:'Write Journal Entry', icon:'edit_note',    route:'/life-feed',       bg:'#56625240', color:'#fcf9f5' },
  { label:'Add Milestone',       icon:'star',         route:'/milestones',      bg:'#dcc0c030', color:'#fcf9f5' },
  { label:'Record Growth',       icon:'monitoring',   route:'/growth-tracker',  bg:'#b8a9c930', color:'#fcf9f5' },
  { label:'Write a Letter',      icon:'mail',         route:'/letters-archive', bg:'#dcc0c020', color:'#dcc0c0' },
  { label:'Add Family Member',   icon:'person_add',   route:'/family-tree',     bg:'#56625220', color:'#dcc0c0' },
  { label:'Health Record',       icon:'health_and_safety', route:'/wellness-archive', bg:'#b8a9c920', color:'#dcc0c0' },
];

const recentActivity = computed(() => {
  const items = [];
  store.sortedJournal.slice(0,2).forEach(e => items.push({ id:`j${e.id}`, icon:'📝', bg:'#56625240', title:e.title, meta:'Journal entry', date:e.date }));
  store.sortedMilestones.slice(0,2).forEach(m => items.push({ id:`m${m.id}`, icon:m.icon||'⭐', bg:'#dcc0c020', title:m.title, meta:'Milestone', date:m.date }));
  store.growth.slice(-1).forEach(g => items.push({ id:`g${g.id}`, icon:'📏', bg:'#b8a9c920', title:`Growth: ${g.weight}kg`, meta:`At ${g.ageLabel}`, date:g.date }));
  return items.sort((a,b) => new Date(b.date) - new Date(a.date)).slice(0,6);
});

const latestGrowth = computed(() => store.sortedGrowth[store.sortedGrowth.length - 1] || null);
const growthMetrics = computed(() => {
  if (!latestGrowth.value) return [];
  return [
    { label:'Weight', value: `${latestGrowth.value.weight} kg` },
    { label:'Height', value: `${latestGrowth.value.height} cm` },
    { label:'Head Circ.', value: `${latestGrowth.value.headCirc} cm` },
  ];
});

const pendingMessages = computed(() => store.guestbook.filter(g => !g.approved));

const navGrid = [
  { path:'/life-feed',         label:'Journal',    icon:'📖' },
  { path:'/milestones',        label:'Milestones', icon:'🏆' },
  { path:'/growth-tracker',    label:'Growth',     icon:'📈' },
  { path:'/family-tree',       label:'Family',     icon:'🌳' },
  { path:'/letters-archive',   label:'Letters',    icon:'💌' },
  { path:'/wellness-archive',  label:'Wellness',   icon:'🏥' },
];

function formatDate(d) {
  if (!d) return '';
  return new Date(d).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' });
}
</script>

<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
