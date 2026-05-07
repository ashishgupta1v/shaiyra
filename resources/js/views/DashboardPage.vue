<template>
  <div class="min-h-screen" style="background-color:#031632; font-family:'Manrope',sans-serif;">
    <NavBar />

    <!-- Page Header -->
    <div class="max-w-7xl mx-auto px-6 pt-10 pb-6">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-xs uppercase tracking-widest mb-1" style="color:#dcc0c0; opacity:0.5;">Admin Vault</p>
          <h1 class="font-serif text-4xl" style="color:#fcf9f5;">Shaiyra's Dashboard</h1>
          <p class="text-sm mt-1" style="color:#ffffff50;">{{ store.shaiyraAge }} · {{ today }}</p>
        </div>
        <div class="flex items-center gap-3">
          <button @click="store.exportData()" class="flex items-center gap-2 px-4 py-2 rounded-xl border text-sm transition-all hover:opacity-80" style="border-color:#dcc0c0; color:#dcc0c0;">
            <span class="material-symbols-outlined text-base">download</span>
            Export
          </button>
          <RouterLink to="/home" class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm" style="background-color:#dcc0c0; color:#031632;">
            <span class="material-symbols-outlined text-base">public</span>
            View Journal
          </RouterLink>
        </div>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 pb-16">
      <!-- Stats Grid -->
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 mb-8">
        <div v-for="stat in statCards" :key="stat.label"
          class="p-4 rounded-2xl text-center cursor-pointer transition-all hover:-translate-y-0.5"
          style="background-color:#ffffff08; border:1px solid #ffffff10;"
          @click="$router.push(stat.route)">
          <div class="text-2xl mb-1">{{ stat.icon }}</div>
          <div class="font-serif text-3xl mb-1" style="color:#dcc0c0;">{{ stat.value }}</div>
          <div class="text-xs uppercase tracking-wider" style="color:#ffffff40;">{{ stat.label }}</div>
        </div>
      </div>

      <!-- Main Bento Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

        <!-- Quick Add Panel -->
        <div class="lg:col-span-1 p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <h2 class="font-serif text-xl mb-5" style="color:#fcf9f5;">Quick Add</h2>
          <div class="space-y-2">
            <button v-for="action in quickActions" :key="action.label"
              @click="$router.push(action.route)"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left transition-all hover:scale-[1.02]"
              :style="{ backgroundColor: action.bg, color: action.color }">
              <span class="material-symbols-outlined text-lg">{{ action.icon }}</span>
              <span class="text-sm font-medium">{{ action.label }}</span>
            </button>
          </div>
        </div>

        <!-- Recent Activity -->
        <div class="lg:col-span-2 p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <h2 class="font-serif text-xl mb-5" style="color:#fcf9f5;">Recent Activity</h2>
          <div class="space-y-3">
            <div v-for="item in recentActivity" :key="item.id"
              class="flex items-start gap-4 p-4 rounded-xl transition-all hover:bg-white/5"
              style="border:1px solid #ffffff08;">
              <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 text-base" :style="{ backgroundColor: item.bg }">{{ item.icon }}</div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-medium truncate" style="color:#fcf9f5;">{{ item.title }}</p>
                <p class="text-xs mt-0.5" style="color:#ffffff50;">{{ item.meta }}</p>
              </div>
              <time class="text-xs flex-shrink-0" style="color:#ffffff30;">{{ formatDate(item.date) }}</time>
            </div>
            <p v-if="!recentActivity.length" class="text-sm text-center py-8" style="color:#ffffff30;">No activity yet — start adding memories!</p>
          </div>
        </div>

        <!-- Growth Summary -->
        <div class="p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <div class="flex items-center justify-between mb-5">
            <h2 class="font-serif text-xl" style="color:#fcf9f5;">Growth</h2>
            <RouterLink to="/growth-tracker" class="text-xs" style="color:#dcc0c0; opacity:0.7;">View all →</RouterLink>
          </div>
          <div v-if="latestGrowth" class="space-y-4">
            <div v-for="metric in growthMetrics" :key="metric.label" class="flex items-center justify-between">
              <span class="text-xs uppercase tracking-wider" style="color:#ffffff50;">{{ metric.label }}</span>
              <span class="text-lg font-serif" style="color:#dcc0c0;">{{ metric.value }}</span>
            </div>
            <p class="text-xs pt-2 border-t" style="color:#ffffff30; border-color:#ffffff10;">Recorded: {{ formatDate(latestGrowth.date) }}</p>
          </div>
          <p v-else class="text-sm text-center py-4" style="color:#ffffff30;">No growth records yet.</p>
          <button @click="$router.push('/growth-tracker')" class="mt-4 w-full py-2.5 rounded-xl text-sm" style="background-color:#dcc0c020; color:#dcc0c0; border:1px solid #dcc0c030;">
            + Add Measurement
          </button>
        </div>

        <!-- Latest Journal -->
        <div class="p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <div class="flex items-center justify-between mb-5">
            <h2 class="font-serif text-xl" style="color:#fcf9f5;">Journal</h2>
            <RouterLink to="/life-feed" class="text-xs" style="color:#dcc0c0; opacity:0.7;">View all →</RouterLink>
          </div>
          <div v-if="store.sortedJournal[0]" class="space-y-3">
            <div class="p-4 rounded-xl" style="background-color:#ffffff05;">
              <div class="flex justify-between items-start mb-2">
                <h3 class="font-serif text-base" style="color:#fcf9f5;">{{ store.sortedJournal[0].title }}</h3>
                <span class="text-xl">{{ store.sortedJournal[0].mood }}</span>
              </div>
              <p class="text-xs leading-relaxed" style="color:#ffffff50; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">{{ store.sortedJournal[0].content }}</p>
              <p class="text-xs mt-2" style="color:#ffffff30;">{{ formatDate(store.sortedJournal[0].date) }}</p>
            </div>
          </div>
          <button @click="$router.push('/life-feed')" class="mt-4 w-full py-2.5 rounded-xl text-sm" style="background-color:#56625220; color:#dcc0c0; border:1px solid #56625230;">
            + New Entry
          </button>
        </div>

        <!-- Letters Summary -->
        <div class="p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <div class="flex items-center justify-between mb-5">
            <h2 class="font-serif text-xl" style="color:#fcf9f5;">Letters</h2>
            <RouterLink to="/letters-archive" class="text-xs" style="color:#dcc0c0; opacity:0.7;">View all →</RouterLink>
          </div>
          <div class="grid grid-cols-2 gap-3 mb-4">
            <div class="p-3 rounded-xl text-center" style="background-color:#ffffff05;">
              <div class="font-serif text-2xl" style="color:#dcc0c0;">{{ store.unlockedLetters.length }}</div>
              <div class="text-xs mt-1" style="color:#ffffff40;">Readable</div>
            </div>
            <div class="p-3 rounded-xl text-center" style="background-color:#ffffff05;">
              <div class="font-serif text-2xl" style="color:#566252;">{{ store.lockedLetters.length }}</div>
              <div class="text-xs mt-1" style="color:#ffffff40;">Time-locked</div>
            </div>
          </div>
          <button @click="$router.push('/letters-archive')" class="w-full py-2.5 rounded-xl text-sm" style="background-color:#dcc0c020; color:#dcc0c0; border:1px solid #dcc0c030;">
            + Write a Letter
          </button>
        </div>

        <!-- Guestbook Pending -->
        <div class="lg:col-span-2 p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <div class="flex items-center justify-between mb-5">
            <h2 class="font-serif text-xl" style="color:#fcf9f5;">Guestbook</h2>
            <RouterLink to="/family-portal" class="text-xs" style="color:#dcc0c0; opacity:0.7;">View all →</RouterLink>
          </div>
          <div class="space-y-3">
            <div v-for="msg in pendingMessages" :key="msg.id" class="flex items-start gap-3 p-4 rounded-xl" style="border:1px solid #ffffff10;">
              <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm flex-shrink-0" style="background-color:#dcc0c020; color:#dcc0c0;">
                {{ msg.name[0] }}
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1">
                  <span class="text-sm font-medium" style="color:#fcf9f5;">{{ msg.name }}</span>
                  <span class="text-xs px-2 py-0.5 rounded-full" style="background-color:#dcc0c020; color:#dcc0c0;">Pending</span>
                </div>
                <p class="text-xs" style="color:#ffffff50; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ msg.message }}</p>
              </div>
              <button @click="store.approveGuestbookEntry(msg.id)" class="flex-shrink-0 text-xs px-3 py-1 rounded-lg" style="background-color:#56625240; color:#dcc0c0;">Approve</button>
            </div>
            <p v-if="!pendingMessages.length" class="text-sm text-center py-4" style="color:#ffffff30;">No pending messages.</p>
          </div>
        </div>

        <!-- Navigation Grid -->
        <div class="lg:col-span-3 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
          <RouterLink v-for="nav in navGrid" :key="nav.path" :to="nav.path"
            class="flex flex-col items-center gap-2 p-4 rounded-2xl text-center transition-all hover:-translate-y-1"
            style="background-color:#ffffff08; border:1px solid #ffffff10;">
            <span class="text-2xl">{{ nav.icon }}</span>
            <span class="text-xs uppercase tracking-wider" style="color:#ffffff60;">{{ nav.label }}</span>
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
