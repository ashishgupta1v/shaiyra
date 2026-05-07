<template>
  <div class="min-h-screen" style="background-color:#031632; font-family:'Manrope',sans-serif;">
    <NavBar />

    <div class="max-w-3xl mx-auto px-6 pt-12 pb-16">
      <!-- Header -->
      <div class="mb-10">
        <p class="text-xs uppercase tracking-widest mb-2" style="color:#dcc0c0; opacity:0.5;">Preserve Shaiyra's story</p>
        <h1 class="font-serif text-5xl mb-3" style="color:#fcf9f5;">Archive & Export</h1>
        <p class="text-sm" style="color:#ffffff50;">Back up, export, and preserve everything in Shaiyra's journal.</p>
      </div>

      <!-- Stats Overview -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-10">
        <div v-for="stat in statCards" :key="stat.label" class="p-4 rounded-2xl text-center" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <div class="text-2xl mb-1">{{ stat.icon }}</div>
          <div class="font-serif text-2xl mb-1" style="color:#dcc0c0;">{{ stat.value }}</div>
          <div class="text-xs uppercase tracking-wider" style="color:#ffffff40;">{{ stat.label }}</div>
        </div>
      </div>

      <!-- Export Section -->
      <div class="space-y-4 mb-10">
        <h2 class="font-serif text-2xl" style="color:#fcf9f5;">Export Your Data</h2>

        <!-- JSON Export -->
        <div class="p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <div class="flex items-start justify-between">
            <div>
              <div class="flex items-center gap-2 mb-1">
                <span class="text-xl">📦</span>
                <h3 class="font-medium" style="color:#fcf9f5;">Full Journal Export (JSON)</h3>
              </div>
              <p class="text-sm" style="color:#ffffff50;">Downloads all journal entries, milestones, growth records, letters, family tree, wellness records and gallery metadata as a single JSON file.</p>
            </div>
            <button @click="store.exportData()"
              class="ml-4 flex-shrink-0 flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium transition-all hover:opacity-90"
              style="background-color:#dcc0c0; color:#031632;">
              <span class="material-symbols-outlined text-base">download</span>
              Export
            </button>
          </div>
        </div>

        <!-- Import Section -->
        <div class="p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <div class="flex items-center gap-2 mb-2">
            <span class="text-xl">📥</span>
            <h3 class="font-medium" style="color:#fcf9f5;">Import from Backup</h3>
          </div>
          <p class="text-sm mb-4" style="color:#ffffff50;">Restore the journal from a previously exported JSON backup file.</p>
          <div v-if="!importText">
            <label class="flex items-center justify-center gap-2 px-6 py-4 rounded-xl cursor-pointer transition-all hover:opacity-80" style="border:2px dashed #dcc0c030; color:#dcc0c0;">
              <span class="material-symbols-outlined text-base">upload_file</span>
              <span class="text-sm">Choose backup file (.json)</span>
              <input type="file" accept=".json" @change="loadFile" class="hidden">
            </label>
          </div>
          <div v-else class="space-y-3">
            <div class="p-3 rounded-xl text-xs font-mono overflow-hidden" style="background-color:#ffffff05; color:#dcc0c0; max-height:100px; overflow-y:auto;">{{ importText.slice(0,400) }}...</div>
            <div class="flex gap-3">
              <button @click="doImport" class="px-4 py-2.5 rounded-xl text-sm" style="background-color:#566252; color:#fcf9f5;">Apply Import</button>
              <button @click="importText=''" class="px-4 py-2.5 rounded-xl text-sm border" style="border-color:#ffffff20; color:#ffffff60;">Cancel</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Data Management -->
      <div class="space-y-4 mb-10">
        <h2 class="font-serif text-2xl" style="color:#fcf9f5;">Data Management</h2>

        <div class="p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ffffff10;">
          <h3 class="font-medium mb-1" style="color:#fcf9f5;">📊 Storage Status</h3>
          <p class="text-sm mb-4" style="color:#ffffff50;">Local storage usage for Shaiyra's journal data.</p>
          <div class="rounded-xl overflow-hidden mb-2" style="background-color:#ffffff10; height:8px;">
            <div class="h-full rounded-xl transition-all" :style="{ width: storagePercent + '%', backgroundColor: storagePercent > 80 ? '#ef4444' : '#dcc0c0' }"></div>
          </div>
          <p class="text-xs" style="color:#ffffff40;">{{ storageUsed }} KB used of ~5 MB local storage</p>
        </div>

        <div class="p-6 rounded-2xl" style="background-color:#ffffff08; border:1px solid #ff000015;">
          <div class="flex items-start justify-between">
            <div>
              <h3 class="font-medium mb-1 flex items-center gap-2" style="color:#ef4444;">
                <span class="material-symbols-outlined text-base">warning</span>
                Clear All Data
              </h3>
              <p class="text-sm" style="color:#ffffff50;">Permanently delete all journal data from this device. This cannot be undone — export first!</p>
            </div>
            <button @click="showClearConfirm=true"
              class="ml-4 flex-shrink-0 px-4 py-2.5 rounded-xl text-sm transition-all hover:opacity-90"
              style="background-color:#ef444420; border:1px solid #ef444430; color:#ef4444;">
              Clear Data
            </button>
          </div>
        </div>
      </div>

      <!-- Tips -->
      <div class="p-6 rounded-2xl" style="background-color:#ffffff05; border:1px solid #ffffff08;">
        <h3 class="font-medium mb-4 flex items-center gap-2" style="color:#dcc0c0;">
          <span class="text-lg">💡</span> Preservation Tips
        </h3>
        <ul class="space-y-3">
          <li v-for="tip in tips" :key="tip" class="flex items-start gap-2 text-sm" style="color:#ffffff60;">
            <span class="text-[#dcc0c0] mt-0.5 flex-shrink-0">✦</span>
            {{ tip }}
          </li>
        </ul>
      </div>
    </div>

    <!-- Clear Confirm Modal -->
    <AppModal :show="showClearConfirm" title="Clear All Data" @close="showClearConfirm=false">
      <div class="space-y-4">
        <div class="p-4 rounded-xl" style="background-color:#ef444415; border:1px solid #ef444430;">
          <p class="text-sm font-medium mb-1" style="color:#ef4444;">⚠️ This will permanently delete everything</p>
          <p class="text-xs" style="color:#ef444490;">All journal entries, milestones, growth records, letters, family members, wellness records and gallery items will be removed from this device.</p>
        </div>
        <p class="text-sm" style="color:#566252;">Type <strong style="color:#031632;">DELETE</strong> to confirm:</p>
        <input v-model="clearConfirmText" type="text" placeholder="Type DELETE"
          class="w-full px-4 py-3 rounded-xl border text-sm outline-none"
          style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
      </div>
      <template #footer>
        <button @click="showClearConfirm=false" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="doClear" :disabled="clearConfirmText !== 'DELETE'"
          class="px-5 py-2.5 rounded-xl text-sm bg-red-600 text-white disabled:opacity-40">
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
