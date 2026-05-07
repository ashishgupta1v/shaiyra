<template>
  <div class="animate-fade-in bg-surface-warm min-h-screen pb-24">
    <!-- Header -->
    <div class="pt-24 pb-16 bg-navy relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-navy to-navy/80"></div>
      <div class="relative max-w-5xl mx-auto px-6">
        <p class="text-xs font-black tracking-[0.25em] text-blush uppercase mb-3 block">Little by little</p>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <h1 class="font-serif text-5xl md:text-6xl font-light text-cream mb-4 md:mb-0">Growth Tracker</h1>
          <button v-if="store.isAdmin" @click="openAdd()"
            class="flex items-center justify-center gap-2 px-6 py-3 bg-blush text-navy text-xs font-black tracking-widest uppercase transition-colors hover:bg-blush/90 w-full md:w-auto card-lift">
            <span class="material-symbols-outlined text-sm">add</span>
            Add Record
          </button>
        </div>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-12">
      <!-- Latest Stats -->
      <div v-if="latestRecord" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div v-for="metric in latestMetrics" :key="metric.label"
          class="p-8 bg-white border border-sage/10 text-center card-lift">
          <div class="text-xs font-bold tracking-widest uppercase text-sage mb-4">{{ metric.label }}</div>
          <div class="font-serif text-5xl text-navy mb-2">{{ metric.value }}</div>
          <div class="text-xs font-bold tracking-widest uppercase text-sage/70">{{ metric.unit }}</div>
          <div v-if="metric.change" class="text-xs mt-4 font-bold tracking-widest uppercase inline-flex items-center gap-1 px-3 py-1 rounded-full border" 
            :class="metric.change > 0 ? 'bg-sage/10 text-sage border-sage/20' : 'bg-red-50 text-red-500 border-red-100'">
            {{ metric.change > 0 ? '▲' : '▼' }} {{ Math.abs(metric.change) }} {{ metric.unit }}
          </div>
        </div>
      </div>

      <!-- SVG Weight Chart -->
      <div v-if="store.sortedGrowth.length > 1" class="p-8 bg-white border border-sage/10 mb-16 card-lift">
        <div class="flex items-center justify-between mb-8">
          <h2 class="font-serif text-2xl text-navy">Weight Progress</h2>
          <div class="flex items-center gap-4 text-xs font-bold tracking-widest uppercase text-sage">
            <span class="flex items-center gap-2"><span class="w-4 h-1 inline-block rounded bg-navy"></span> Weight (kg)</span>
          </div>
        </div>
        <svg :viewBox="`0 0 ${chartW} ${chartH}`" class="w-full h-64">
          <!-- Grid lines -->
          <line v-for="(y, i) in yGridLines" :key="i" :x1="padL" :y1="y" :x2="chartW-padR" :y2="y" stroke="currentColor" class="text-sage/10" stroke-width="1"/>
          <!-- X labels -->
          <text v-for="(pt, i) in chartPoints" :key="`xl${i}`" :x="pt.x" :y="chartH-4" fill="currentColor" class="text-sage/70 font-sans" font-size="9" text-anchor="middle" font-weight="bold" letter-spacing="1">{{ store.sortedGrowth[i]?.ageLabel.toUpperCase() }}</text>
          <!-- Area fill -->
          <path :d="areaPath" fill="currentColor" class="text-blush/20"/>
          <!-- Line -->
          <path :d="linePath" fill="none" stroke="currentColor" class="text-navy" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <!-- Dots -->
          <circle v-for="pt in chartPoints" :key="`d${pt.x}`" :cx="pt.x" :cy="pt.y" r="5" fill="currentColor" class="text-navy" stroke="white" stroke-width="2"/>
        </svg>
      </div>

      <!-- Records Table -->
      <div class="bg-white border border-sage/10 card-lift">
        <div class="px-8 py-6 flex items-center justify-between border-b border-sage/10">
          <h2 class="font-serif text-2xl text-navy">All Records</h2>
          <span class="text-xs font-bold tracking-widest uppercase text-sage/70">{{ store.sortedGrowth.length }} measurements</span>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead>
              <tr class="border-b border-sage/10 bg-surface-stone/50">
                <th class="px-8 py-4 text-xs font-bold tracking-widest uppercase text-sage">Date</th>
                <th class="px-8 py-4 text-xs font-bold tracking-widest uppercase text-sage">Age</th>
                <th class="px-8 py-4 text-right text-xs font-bold tracking-widest uppercase text-sage">Weight</th>
                <th class="px-8 py-4 text-right text-xs font-bold tracking-widest uppercase text-sage">Height</th>
                <th class="px-8 py-4 text-right text-xs font-bold tracking-widest uppercase text-sage">Head</th>
                <th class="px-8 py-4 text-xs font-bold tracking-widest uppercase text-sage">Notes</th>
                <th v-if="store.isAdmin" class="px-8 py-4"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(rec, idx) in [...store.sortedGrowth].reverse()" :key="rec.id"
                class="group transition-colors hover:bg-surface-stone/50 border-b border-sage/5 last:border-0">
                <td class="px-8 py-5 text-sm text-sage/80">{{ formatDate(rec.date) }}</td>
                <td class="px-8 py-5 text-sm font-bold text-navy">{{ rec.ageLabel }}</td>
                <td class="px-8 py-5 text-sm text-right font-mono text-navy font-bold">{{ rec.weight }} kg</td>
                <td class="px-8 py-5 text-sm text-right font-mono text-navy font-bold">{{ rec.height }} cm</td>
                <td class="px-8 py-5 text-sm text-right font-mono text-navy font-bold">{{ rec.headCirc }} cm</td>
                <td class="px-8 py-5 text-sm text-sage italic">{{ rec.notes }}</td>
                <td v-if="store.isAdmin" class="px-8 py-5 text-right">
                  <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button @click="openEdit(rec)" class="p-2 rounded-full hover:bg-sage/10 text-sage transition-colors">
                      <span class="material-symbols-outlined text-[20px]">edit</span>
                    </button>
                    <button @click="confirmDelete(rec)" class="p-2 rounded-full hover:bg-red-50 text-red-500 transition-colors">
                      <span class="material-symbols-outlined text-[20px]">delete</span>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div v-if="!store.sortedGrowth.length" class="text-center py-24 bg-white">
          <span class="material-symbols-outlined text-6xl text-sage/30 block mb-6" style="font-variation-settings:'FILL' 1">straighten</span>
          <p class="text-sage/70">No growth records yet. Add the first measurement!</p>
        </div>
      </div>
    </div>

    <!-- Add/Edit Modal -->
    <AppModal :show="showModal" :title="editingItem ? 'Edit Record' : 'New Growth Record'" @close="closeModal">
      <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-navy/60 mb-2">Date</label>
            <input v-model="form.date" type="date" 
              class="w-full px-4 py-3 bg-surface-stone border border-navy/20 text-navy outline-none focus:border-navy/50 transition-colors">
          </div>
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-navy/60 mb-2">Age Label</label>
            <input v-model="form.ageLabel" type="text" placeholder="e.g. 2 months" 
              class="w-full px-4 py-3 bg-surface-stone border border-navy/20 text-navy outline-none focus:border-navy/50 transition-colors">
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-navy/60 mb-2">Weight (kg)</label>
            <input v-model.number="form.weight" type="number" step="0.01" placeholder="3.3" 
              class="w-full px-4 py-3 bg-surface-stone border border-navy/20 text-navy outline-none focus:border-navy/50 transition-colors">
          </div>
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-navy/60 mb-2">Height (cm)</label>
            <input v-model.number="form.height" type="number" step="0.1" placeholder="51" 
              class="w-full px-4 py-3 bg-surface-stone border border-navy/20 text-navy outline-none focus:border-navy/50 transition-colors">
          </div>
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-navy/60 mb-2">Head Circ. (cm)</label>
            <input v-model.number="form.headCirc" type="number" step="0.1" placeholder="34" 
              class="w-full px-4 py-3 bg-surface-stone border border-navy/20 text-navy outline-none focus:border-navy/50 transition-colors">
          </div>
        </div>
        <div>
          <label class="block text-xs font-bold tracking-widest uppercase text-navy/60 mb-2">Recorded By</label>
          <input v-model="form.recordedBy" type="text" placeholder="Pediatrician / Home" 
            class="w-full px-4 py-3 bg-surface-stone border border-navy/20 text-navy outline-none focus:border-navy/50 transition-colors">
        </div>
        <div>
          <label class="block text-xs font-bold tracking-widest uppercase text-navy/60 mb-2">Notes</label>
          <textarea v-model="form.notes" rows="3" 
            class="w-full px-4 py-3 bg-surface-stone border border-navy/20 text-navy outline-none focus:border-navy/50 transition-colors resize-none"></textarea>
        </div>
      </div>
      <template #footer>
        <button @click="closeModal" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button @click="saveItem" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto">
          {{ editingItem ? 'Save Record' : 'Add Record' }}
        </button>
      </template>
    </AppModal>

    <!-- Delete Modal -->
    <AppModal :show="showDeleteModal" title="Delete Record" @close="showDeleteModal=false">
      <p class="text-navy/70 leading-relaxed">Are you sure you want to delete the record for <strong class="text-navy font-bold">{{ deleteTarget?.ageLabel }}</strong>?</p>
      <template #footer>
        <button @click="showDeleteModal=false" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button @click="doDelete" class="px-8 py-3 bg-red-600 text-white text-xs font-black tracking-widest uppercase hover:bg-red-700 transition-colors w-full md:w-auto">Delete</button>
      </template>
    </AppModal>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useJournalStore } from '@/stores/journal';
import AppModal from '@/components/AppModal.vue';

const store = useJournalStore();
store.init();

const showModal = ref(false);
const editingItem = ref(null);
const showDeleteModal = ref(false);
const deleteTarget = ref(null);

// Chart config
const chartW = 800, chartH = 180, padL = 30, padR = 20, padT = 15, padB = 30;

const latestRecord = computed(() => store.sortedGrowth[store.sortedGrowth.length - 1] || null);
const prevRecord = computed(() => store.sortedGrowth[store.sortedGrowth.length - 2] || null);

const latestMetrics = computed(() => {
  if (!latestRecord.value) return [];
  const prev = prevRecord.value;
  return [
    { label:'Weight', value: latestRecord.value.weight, unit:'kg', change: prev ? (latestRecord.value.weight - prev.weight).toFixed(2) : null },
    { label:'Height', value: latestRecord.value.height, unit:'cm', change: prev ? (latestRecord.value.height - prev.height).toFixed(1) : null },
    { label:'Head Circumference', value: latestRecord.value.headCirc, unit:'cm', change: null },
  ];
});

const chartPoints = computed(() => {
  const data = store.sortedGrowth.filter(r => r.weight);
  if (data.length < 2) return [];
  const weights = data.map(r => r.weight);
  const minW = Math.min(...weights) * 0.95;
  const maxW = Math.max(...weights) * 1.05;
  const innerW = chartW - padL - padR;
  const innerH = chartH - padT - padB;
  return data.map((r, i) => ({
    x: padL + (i / (data.length - 1)) * innerW,
    y: chartH - padB - ((r.weight - minW) / (maxW - minW)) * innerH,
  }));
});

const linePath = computed(() => {
  const pts = chartPoints.value;
  if (pts.length < 2) return '';
  return pts.map((pt, i) => (i === 0 ? `M${pt.x},${pt.y}` : `L${pt.x},${pt.y}`)).join(' ');
});

const areaPath = computed(() => {
  const pts = chartPoints.value;
  if (pts.length < 2) return '';
  const bottom = chartH - padB;
  const start = `M${pts[0].x},${bottom}`;
  const line = pts.map(pt => `L${pt.x},${pt.y}`).join(' ');
  return `${start} ${line} L${pts[pts.length-1].x},${bottom} Z`;
});

const yGridLines = computed(() => {
  const lines = [];
  const innerH = chartH - padT - padB;
  for (let i = 0; i <= 4; i++) lines.push(padT + (i / 4) * innerH);
  return lines;
});

const defaultForm = () => ({
  date: new Date().toISOString().split('T')[0], ageLabel:'',
  weight: null, height: null, headCirc: null,
  notes:'', recordedBy:'Pediatrician',
});
const form = ref(defaultForm());

function openAdd() { form.value = defaultForm(); editingItem.value = null; showModal.value = true; }
function openEdit(item) { form.value = { ...item }; editingItem.value = item; showModal.value = true; }
function closeModal() { showModal.value = false; editingItem.value = null; }

function saveItem() {
  if (editingItem.value) store.updateGrowthRecord(editingItem.value.id, form.value);
  else store.addGrowthRecord(form.value);
  closeModal();
}

function confirmDelete(item) { deleteTarget.value = item; showDeleteModal.value = true; }
function doDelete() { store.deleteGrowthRecord(deleteTarget.value.id); showDeleteModal.value = false; }

function formatDate(d) {
  if (!d) return '';
  return new Date(d).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' });
}
</script>
<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
