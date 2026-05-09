<template>
  <div class="animate-fade-in bg-surface-warm min-h-screen pb-24">
    <!-- Header -->
    <div class="pt-24 pb-16 bg-navy relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-navy to-navy/80"></div>
      <div class="relative max-w-5xl mx-auto px-6">
        <p class="text-xs font-black tracking-[0.25em] text-blush uppercase mb-3 block">Health & Wellness</p>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <h1 class="font-serif text-5xl md:text-6xl font-light text-cream mb-4 md:mb-0">Wellness Archive</h1>
          <button class="transition-transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2 px-6 py-3 bg-blush text-navy text-xs font-black tracking-widest uppercase transition-colors hover:bg-blush/90 w-full md:w-auto card-lift">
            <span class="material-symbols-outlined text-sm">add</span>
            Add Record
          </button>
        </div>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-12">
      <!-- Type Filters -->
      <div class="flex flex-wrap gap-2 mb-12">
        <button v-for="t in types" :key="t.key" @click="activeType = t.key"
          :class="['px-5 py-2 text-xs font-bold tracking-widest uppercase transition-all border', activeType===t.key ? 'bg-navy border-navy text-cream' : 'border-sage/20 text-sage hover:border-sage/50 bg-white']">
          {{ t.icon }} {{ t.label }}
        </button>
      </div>

      <!-- Records -->
      <div class="space-y-6">
        <div v-for="(rec, index) in filteredWellness" :key="rec.id" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.1}s`"
          class="group p-8 bg-white border border-sage/10 transition-all hover:shadow-xl card-lift">
          <div class="flex items-start justify-between">
            <div class="flex items-start gap-6">
              <div class="w-12 h-12 flex items-center justify-center text-2xl flex-shrink-0 bg-surface-stone text-navy">
                {{ typeIcon(rec.type) }}
              </div>
              <div>
                <div class="flex items-center gap-3 mb-2">
                  <h3 class="font-serif text-2xl text-navy">{{ rec.title }}</h3>
                  <span class="text-[10px] font-bold uppercase tracking-widest px-3 py-1 bg-surface-stone text-sage">{{ rec.type }}</span>
                </div>
                <p class="text-xs font-bold tracking-[0.2em] text-sage uppercase mb-4">{{ formatDate(rec.date) }} <span v-if="rec.doctor" class="mx-2">·</span> {{ rec.doctor }}</p>
                <p class="text-base text-sage/80 leading-relaxed font-light mb-4">{{ rec.notes }}</p>
                <div v-if="rec.vaccinations?.length" class="flex flex-wrap gap-2">
                  <span v-for="v in rec.vaccinations" :key="v" class="text-[10px] font-bold uppercase tracking-widest px-3 py-1 border border-sage/20 text-sage">💉 {{ v }}</span>
                </div>
              </div>
            </div>
            <div v-if="store.isAdmin" class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
              <button  @click="openEdit(rec)" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-sage/10 text-sage transition-colors transition-transform hover:scale-105 active:scale-95">
                <span class="material-symbols-outlined text-sm">edit</span>
              </button>
              <button  @click="confirmDelete(rec)" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-red-50 text-red-400 transition-colors transition-transform hover:scale-105 active:scale-95">
                <span class="material-symbols-outlined text-sm">delete</span>
              </button>
            </div>
          </div>
        </div>
        <div v-if="!filteredWellness.length" class="text-center py-32 bg-white border border-sage/10">
          <span class="text-6xl block mb-6">🏥</span>
          <p class="font-serif text-3xl text-navy mb-3">No wellness records yet</p>
          <p class="text-sage/70">Health is wealth. Keep track of Shaiyra's medical history here.</p>
        </div>
      </div>
    </div>

    <!-- Add/Edit Modal -->
    <AppModal :show="showModal" :title="editingItem ? 'Edit Wellness Record' : 'New Wellness Record'" size="lg" @close="closeModal">
      <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <FloatingInput id="well_date" label="Date" type="date" v-model="form.date" />
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-sage mb-2">Type</label>
            <select v-model="form.type" class="w-full px-4 py-3 bg-surface-stone border border-sage/20 text-navy outline-none focus:border-sage/50 transition-colors">
              <option v-for="t in types.filter(t=>t.key!=='all')" :key="t.key" :value="t.key">{{ t.label }}</option>
            </select>
          </div>
        </div>
        <FloatingInput id="well_title" label="Title (e.g. 6-Month Checkup)" v-model="form.title" />
        <FloatingInput id="well_doctor" label="Doctor / Provider" v-model="form.doctor" />
        <FloatingInput id="well_notes" label="Notes" type="textarea" rows="4" v-model="form.notes" />
        <FloatingInput id="well_vaccinations" label="Vaccinations (comma separated)" v-model="form.vacStr" />
      </div>
      <template #footer>
        <button @click="closeModal" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveItem" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">
          {{ editingItem ? 'Save Changes' : 'Add Record' }}
        </button>
      </template>
    </AppModal>

    <!-- Delete Modal -->
    <AppModal :show="showDeleteModal" title="Delete Record" @close="showDeleteModal=false">
      <p class="text-navy/70 leading-relaxed">Delete <strong class="text-navy font-bold">{{ deleteTarget?.title }}</strong>? This cannot be undone.</p>
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
import NavBar from '@/components/NavBar.vue';
import AppModal from '@/components/AppModal.vue';
import FloatingInput from '@/components/FloatingInput.vue';

const store = useJournalStore();
store.init();

const activeType = ref('all');
const showModal = ref(false);
const editingItem = ref(null);
const showDeleteModal = ref(false);
const deleteTarget = ref(null);

const types = [
  { key:'all',        label:'All',         icon:'📋' },
  { key:'checkup',    label:'Checkup',     icon:'🩺' },
  { key:'vaccination',label:'Vaccination', icon:'💉' },
  { key:'illness',    label:'Illness',     icon:'🤒' },
  { key:'dental',     label:'Dental',      icon:'🦷' },
  { key:'eye',        label:'Eye',         icon:'👁️' },
];

const filteredWellness = computed(() => {
  const list = [...store.wellness].sort((a,b) => new Date(b.date)-new Date(a.date));
  if (activeType.value === 'all') return list;
  return list.filter(w => w.type === activeType.value);
});

function typeStyle(t) {
  const s = { checkup:'background-color:#56625215; color:#566252;', vaccination:'background-color:#dcc0c020; color:#a08060;', illness:'background-color:#ff000010; color:#ef4444;', dental:'background-color:#b8a9c920; color:#7060a0;', eye:'background-color:#03163210; color:#031632;' };
  return s[t] || 'background-color:#fcf9f5; color:#566252;';
}
function typeIcon(t) {
  const ic = { checkup:'🩺', vaccination:'💉', illness:'🤒', dental:'🦷', eye:'👁️' };
  return ic[t] || '📋';
}

const defaultForm = () => ({ date: new Date().toISOString().split('T')[0], type:'checkup', title:'', doctor:'', notes:'', vacStr:'', vaccinations:[] });
const form = ref(defaultForm());

function openAdd() { form.value = defaultForm(); editingItem.value = null; showModal.value = true; }
function openEdit(item) { form.value = { ...item, vacStr: (item.vaccinations||[]).join(', ') }; editingItem.value = item; showModal.value = true; }
function closeModal() { showModal.value = false; editingItem.value = null; }
function saveItem() {
  const vaccinations = (form.value.vacStr||'').split(',').map(v=>v.trim()).filter(Boolean);
  const data = { ...form.value, vaccinations };
  if (editingItem.value) store.updateWellnessRecord(editingItem.value.id, data);
  else store.addWellnessRecord(data);
  closeModal();
}
function confirmDelete(item) { deleteTarget.value = item; showDeleteModal.value = true; }
function doDelete() { store.deleteWellnessRecord(deleteTarget.value.id); showDeleteModal.value = false; }
function formatDate(d) { if(!d) return ''; return new Date(d).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' }); }
</script>
<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
