<template>
  <div class="animate-fade-in bg-surface-warm min-h-screen pb-24">
    <!-- Header -->
    <div class="pt-24 pb-16 bg-navy relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-navy to-navy/80"></div>
      <div class="relative max-w-5xl mx-auto px-6">
        <p class="text-xs font-black tracking-[0.25em] text-blush uppercase mb-3 block">Little by little</p>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <h1 class="font-serif text-5xl md:text-6xl font-light text-cream mb-4 md:mb-0">Growth Tracker</h1>
          <button class="transition-transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2 px-6 py-3 bg-blush text-navy text-xs font-black tracking-widest uppercase transition-colors hover:bg-blush/90 w-full md:w-auto card-lift">
            <Plus class="w-4 h-4" />
            Add Record
          </button>
        </div>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-12">
      <!-- Latest Stats -->
      <div v-if="latestRecord" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div v-for="(metric, index) in latestMetrics" :key="metric.label" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.1}s`"
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

      <!-- Interactive Growth Chart -->
      <div v-if="store.sortedGrowth.length > 1" class="p-8 bg-white border border-sage/10 mb-16 card-lift relative">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
          <h2 class="font-serif text-2xl text-navy">Growth Progress</h2>
          <!-- Metric Toggles -->
          <div class="flex items-center gap-2 bg-surface-stone p-1 rounded-sm">
            <button v-for="metric in ['weight', 'height', 'headCirc']" :key="metric"
              @click="activeMetric = metric"
              class="px-4 py-2 text-[10px] font-black tracking-widest uppercase transition-all rounded-sm"
              :class="activeMetric === metric ? 'bg-white text-navy shadow-sm' : 'text-sage/60 hover:text-navy'">
              {{ metric === 'headCirc' ? 'Head' : metric }}
            </button>
          </div>
        </div>

        <div class="relative w-full h-64">
          <Line v-if="chartData" :data="chartData" :options="chartOptions" />
        </div>
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
                    <button  @click="openEdit(rec)" class="p-2 rounded-full hover:bg-sage/10 text-sage transition-colors transition-transform hover:scale-105 active:scale-95">
                      <Edit2 class="w-4 h-4" />
                    </button>
                    <button  @click="confirmDelete(rec)" class="p-2 rounded-full hover:bg-red-50 text-red-500 transition-colors transition-transform hover:scale-105 active:scale-95">
                      <Trash2 class="w-4 h-4" />
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div v-if="!store.sortedGrowth.length" class="text-center py-24 bg-white">
          <Ruler class="w-16 h-16 text-sage/30 mx-auto mb-6" />
          <p class="text-sage/70">No growth records yet. Add the first measurement!</p>
        </div>
      </div>
    </div>

    <!-- Add/Edit Modal -->
    <AppModal :show="showModal" :title="editingItem ? 'Edit Record' : 'New Growth Record'" @close="closeModal">
      <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <FloatingInput id="growth_date" label="Date" type="date" v-model="form.date" />
          <FloatingInput id="growth_age" label="Age Label (e.g. 2 months)" v-model="form.ageLabel" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <FloatingInput id="growth_weight" label="Weight (kg)" type="number" v-model.number="form.weight" />
          <FloatingInput id="growth_height" label="Height (cm)" type="number" v-model.number="form.height" />
          <FloatingInput id="growth_head" label="Head Circ. (cm)" type="number" v-model.number="form.headCirc" />
        </div>
        <FloatingInput id="growth_recorded_by" label="Recorded By" v-model="form.recordedBy" />
        <FloatingInput id="growth_notes" label="Notes" type="textarea" rows="3" v-model="form.notes" />
      </div>
      <template #footer>
        <button @click="closeModal" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveItem" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">
          {{ editingItem ? 'Save Record' : 'Add Record' }}
        </button>
      </template>
    </AppModal>

    <!-- Delete Modal -->
    <AppModal :show="showDeleteModal" title="Delete Record" @close="showDeleteModal=false">
      <p class="text-navy/70 leading-relaxed">Are you sure you want to delete the record for <strong class="text-navy font-bold">{{ deleteTarget?.ageLabel }}</strong>?</p>
      <template #footer>
        <button @click="showDeleteModal=false" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="doDelete" class="px-8 py-3 bg-red-600 text-white text-xs font-black tracking-widest uppercase hover:bg-red-700 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">Delete</button>
      </template>
    </AppModal>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useJournalStore } from '@/stores/journal';
import AppModal from '@/components/AppModal.vue';
import FloatingInput from '@/components/FloatingInput.vue';
import { Plus, Edit2, Trash2, Ruler } from 'lucide-vue-next';
import { Line } from 'vue-chartjs';
import { Chart as ChartJS, CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Filler } from 'chart.js';

ChartJS.register(CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Filler);

const store = useJournalStore();
store.init();

const showModal = ref(false);
const editingItem = ref(null);
const showDeleteModal = ref(false);
const deleteTarget = ref(null);

const activeMetric = ref('weight');
const metricUnits = { weight: 'kg', height: 'cm', headCirc: 'cm' };

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

const chartData = computed(() => {
  const data = store.sortedGrowth.filter(r => r[activeMetric.value]);
  if (data.length < 2) return null;
  
  return {
    labels: data.map(r => r.ageLabel.toUpperCase()),
    datasets: [{
      label: activeMetric.value === 'headCirc' ? 'Head Circumference' : activeMetric.value.charAt(0).toUpperCase() + activeMetric.value.slice(1),
      data: data.map(r => parseFloat(r[activeMetric.value])),
      borderColor: '#1C2C42', // navy
      backgroundColor: (context) => {
        const chart = context.chart;
        const {ctx, chartArea} = chart;
        if (!chartArea) return null;
        const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
        gradient.addColorStop(0, 'rgba(235, 204, 196, 0.05)'); // blush fade out
        gradient.addColorStop(1, 'rgba(235, 204, 196, 0.8)'); // blush fade in
        return gradient;
      },
      borderWidth: 2.5,
      pointBackgroundColor: '#1C2C42',
      pointBorderColor: '#fff',
      pointBorderWidth: 2,
      pointRadius: 4,
      pointHoverRadius: 6,
      fill: true,
      tension: 0.4 // Smooth curves
    }]
  };
});

const chartOptions = computed(() => ({
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: { display: false },
    tooltip: {
      backgroundColor: '#1C2C42',
      titleFont: { family: 'sans-serif', size: 10, weight: 'bold' },
      bodyFont: { family: 'sans-serif', size: 12, weight: 'bold' },
      displayColors: false,
      callbacks: {
        label: (context) => `${context.parsed.y} ${metricUnits[activeMetric.value]}`
      }
    }
  },
  scales: {
    y: {
      grid: { color: 'rgba(110, 133, 116, 0.1)', drawBorder: false }, // sage/10
      ticks: { display: false },
      beginAtZero: false,
      suggestedMin: chartData.value ? Math.min(...chartData.value.datasets[0].data) * 0.95 : 0,
      suggestedMax: chartData.value ? Math.max(...chartData.value.datasets[0].data) * 1.05 : 0
    },
    x: {
      grid: { display: false },
      ticks: { color: 'rgba(110, 133, 116, 0.7)', font: { family: 'sans-serif', size: 9, weight: 'bold' } }
    }
  },
  interaction: {
    mode: 'index',
    intersect: false,
  }
}));

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
</style>
