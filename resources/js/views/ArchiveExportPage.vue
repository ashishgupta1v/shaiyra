<template>
  <div class="animate-fade-in bg-navy min-h-screen pb-24 text-cream">
    <NavBar />
    <div class="max-w-4xl mx-auto px-6 pt-24 pb-16 relative">
      <div class="absolute inset-0 bg-gradient-to-br from-navy via-navy to-sage/10 -z-10"></div>
      <!-- Header -->
      <div class="mb-12" v-reveal="'reveal-up'">
        <p class="text-xs font-black tracking-[0.25em] text-gold uppercase mb-3 block">Preserve Shaiyra's story</p>
        <h1 class="font-serif text-5xl md:text-6xl font-light text-cream mb-4">Archive & Export</h1>
        <p class="text-sm text-cream/60 font-light">Back up, export, and preserve everything in Shaiyra's journal.</p>
      </div>

      <!-- Stats Overview -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-16">
        <div v-for="(stat, index) in statCards" :key="stat.label" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.1}s`"
          class="p-6 text-center border border-white/10 bg-white/5 card-lift">
          <div class="text-3xl mb-2">{{ stat.icon }}</div>
          <div class="font-serif text-3xl text-gold mb-1">{{ stat.value }}</div>
          <div class="text-[10px] font-bold uppercase tracking-widest text-cream/40">{{ stat.label }}</div>
        </div>
      </div>

      <!-- Export Section -->
      <div class="space-y-6 mb-16">
        <h2 v-reveal="'reveal-right'" class="font-serif text-3xl text-cream mb-4">Export Your Data</h2>

        <!-- JSON Export -->
        <div v-reveal="'reveal-up'" v-tilt class="p-8 border border-white/10 bg-white/5 flex flex-col md:flex-row md:items-center justify-between gap-6 card-lift">
          <div>
            <div class="flex items-center gap-3 mb-2">
              <span class="text-2xl">📦</span>
              <h3 class="font-serif text-2xl text-cream">Full Journal Export (JSON)</h3>
            </div>
            <p class="text-sm text-cream/60 leading-relaxed max-w-xl">Downloads all journal entries, milestones, growth records, letters, family tree, wellness records and gallery metadata as a single JSON file.</p>
          </div>
          <button class="transition-transform hover:scale-105 active:scale-95 flex-shrink-0 flex items-center justify-center gap-2 px-8 py-3 bg-gold text-navy text-xs font-black tracking-widest uppercase transition-colors hover:bg-gold/90 w-full md:w-auto">
            <span class="material-symbols-outlined text-base">download</span>
            Export Backup
          </button>
        </div>

        <!-- Import Section -->
        <div v-reveal="'reveal-up'" v-tilt class="p-8 border border-white/10 bg-white/5 card-lift">
          <div class="flex items-center gap-3 mb-4">
            <span class="text-2xl">📥</span>
            <h3 class="font-serif text-2xl text-cream">Import from Backup</h3>
          </div>
          <p class="text-sm text-cream/60 leading-relaxed mb-6">Restore the journal from a previously exported JSON backup file.</p>
          <div v-if="!importText">
            <label class="flex flex-col items-center justify-center gap-3 p-8 cursor-pointer transition-all hover:bg-white/5 border border-dashed border-gold/30">
              <span class="material-symbols-outlined text-3xl text-gold/60">upload_file</span>
              <span class="text-xs font-bold tracking-widest uppercase text-gold">Choose backup file (.json)</span>
              <input type="file" accept=".json" @change="loadFile" class="hidden">
            </label>
          </div>
          <div v-else class="space-y-4">
            <div class="p-4 bg-navy/50 border border-white/10 text-xs font-mono text-gold/80 max-h-32 overflow-y-auto">
              {{ importText.slice(0,400) }}...
            </div>
            <div class="flex gap-4">
              <button  @click="doImport" class="px-8 py-3 bg-sage text-cream text-xs font-black tracking-widest uppercase transition-colors hover:bg-sage/90 flex-1 md:flex-none text-center transition-transform hover:scale-105 active:scale-95">Apply Import</button>
              <button  @click="importText=''" class="px-8 py-3 border border-white/20 text-cream/60 text-xs font-bold tracking-widest uppercase hover:bg-white/10 transition-colors flex-1 md:flex-none text-center transition-transform hover:scale-105 active:scale-95">Cancel</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Data Management -->
      <div class="space-y-6 mb-16">
        <h2 v-reveal="'reveal-right'" class="font-serif text-3xl text-cream mb-4">Data Management</h2>

        <div v-reveal="'reveal-up'" v-tilt class="p-8 border border-white/10 bg-white/5 card-lift">
          <h3 class="font-serif text-2xl text-cream mb-2 flex items-center gap-3">📊 Storage Status</h3>
          <p class="text-sm text-cream/60 mb-6">Local storage usage for Shaiyra's journal data.</p>
          <div class="h-2 bg-white/10 overflow-hidden mb-3">
            <div class="h-full transition-all" :class="storagePercent > 80 ? 'bg-red-500' : 'bg-gold'" :style="{ width: storagePercent + '%' }"></div>
          </div>
          <p class="text-[10px] font-bold tracking-widest uppercase text-cream/40">{{ storageUsed }} KB used of ~5 MB local storage</p>
        </div>

        <div v-reveal="'reveal-up'" v-tilt class="p-8 border border-red-500/20 bg-red-500/5 card-lift">
          <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
              <h3 class="font-serif text-2xl text-red-400 mb-2 flex items-center gap-3">
                <span class="material-symbols-outlined text-base">warning</span>
                Clear All Data
              </h3>
              <p class="text-sm text-cream/60 leading-relaxed max-w-xl">Permanently delete all journal data from this device. This cannot be undone — export first!</p>
            </div>
            <button class="transition-transform hover:scale-105 active:scale-95 flex-shrink-0 px-8 py-3 border border-red-500/30 text-red-400 text-xs font-black tracking-widest uppercase hover:bg-red-500/10 transition-colors w-full md:w-auto">
              Clear Data
            </button>
          </div>
        </div>
      </div>

      <!-- Tips -->
      <div v-reveal="'reveal-up'" v-tilt class="p-8 border border-white/5 bg-white/5 card-lift">
        <h3 class="font-serif text-2xl text-gold mb-6 flex items-center gap-3">
          <span class="text-2xl">💡</span> Preservation Tips
        </h3>
        <ul class="space-y-4">
          <li v-for="tip in tips" :key="tip" class="flex items-start gap-4 text-sm text-cream/70 font-light leading-relaxed">
            <span class="text-gold mt-1 flex-shrink-0 text-[10px]">✦</span>
            {{ tip }}
          </li>
        </ul>
      </div>
    </div>

    <!-- Clear Confirm Modal -->
    <AppModal :show="showClearConfirm" title="Clear All Data" @close="showClearConfirm=false">
      <div class="space-y-6">
        <div class="p-6 bg-red-500/10 border border-red-500/20">
          <p class="text-sm font-bold text-red-400 uppercase tracking-widest mb-2">⚠️ This will permanently delete everything</p>
          <p class="text-sm text-red-400/80 leading-relaxed">All journal entries, milestones, growth records, letters, family members, wellness records and gallery items will be removed from this device.</p>
        </div>
        <div>
          <p class="text-sm text-navy/80 mb-3">Type <strong class="text-navy font-black">DELETE</strong> to confirm:</p>
          <FloatingInput id="clear_confirm" label="Type DELETE" v-model="clearConfirmText" />
        </div>
      </div>
      <template #footer>
        <button @click="showClearConfirm=false" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button class="transition-transform hover:scale-105 active:scale-95 px-8 py-3 bg-red-600 text-white text-xs font-black tracking-widest uppercase hover:bg-red-700 disabled:opacity-40 transition-colors w-full md:w-auto">
          Clear All Data
        </button>
      </template>
    </AppModal>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useJournalStore } from '@/stores/journal';
import NavBar from '@/components/NavBar.vue';
import AppModal from '@/components/AppModal.vue';
import FloatingInput from '@/components/FloatingInput.vue';

const store = useJournalStore();
store.init();

const importText = ref('');
const showClearConfirm = ref(false);
const clearConfirmText = ref('');

const statCards = computed(() => [
  { label:'Journal',     value: store.stats.journalCount,     icon:'📝' },
  { label:'Milestones',  value: store.stats.milestonesCount,  icon:'⭐' },
  { label:'Letters',     value: store.stats.lettersCount,     icon:'💌' },
  { label:'Family',      value: store.stats.familyCount,      icon:'👨‍👩‍👧' },
]);

const storageUsed = computed(() => {
  try {
    const raw = localStorage.getItem('shaiyra_journal_data') || '';
    return Math.round(raw.length / 1024);
  } catch { return 0; }
});

const storagePercent = computed(() => Math.min(100, Math.round((storageUsed.value / 5120) * 100)));

function loadFile(event) {
  const file = event.target.files[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = (e) => { importText.value = e.target.result; };
  reader.readAsText(file);
}

function doImport() {
  store.importData(importText.value);
  importText.value = '';
}

function doClear() {
  if (clearConfirmText.value !== 'DELETE') return;
  localStorage.removeItem('shaiyra_journal_data');
  localStorage.removeItem('shaiyra_admin');
  location.reload();
}

const tips = [
  'Export the journal backup monthly and store it in Google Drive or iCloud for long-term safety.',
  'The JSON backup file contains ALL your data — treat it like a precious family photo album.',
  'For 20-year archival, also print key journal entries and letters annually as physical keepsakes.',
  'Share the export with a trusted family member so the data is never lost to a single device.',
  'When Shaiyra is older, you can migrate this data into a dedicated server or private hosting.',
];
</script>
<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
