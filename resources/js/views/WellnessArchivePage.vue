<template>
  <div class="min-h-screen" style="background-color:#fcf9f5; font-family:'Manrope',sans-serif;">
    <NavBar />
    <div class="pt-12 pb-8" style="background-color:#031632;">
      <div class="max-w-5xl mx-auto px-6">
        <p class="text-xs uppercase tracking-widest mb-2" style="color:#dcc0c0; opacity:0.5;">Health & wellness</p>
        <div class="flex items-end justify-between">
          <h1 class="font-serif text-5xl" style="color:#fcf9f5;">Wellness Archive</h1>
          <button v-if="store.isAdmin" @click="openAdd()"
            class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm"
            style="background-color:#dcc0c0; color:#031632;">
            <span class="material-symbols-outlined text-base">add</span> Add Record
          </button>
        </div>
      </div>
    </div>
    <div class="max-w-5xl mx-auto px-6 py-12">
      <!-- Type Filters -->
      <div class="flex flex-wrap gap-2 mb-8">
        <button v-for="t in types" :key="t.key" @click="activeType = t.key"
          :class="['px-4 py-1.5 rounded-full text-xs uppercase tracking-wider transition-all', activeType===t.key ? '' : 'border hover:opacity-80']"
          :style="activeType===t.key ? 'background-color:#031632; color:#fcf9f5;' : 'border-color:#03163220; color:#566252;'">
          {{ t.icon }} {{ t.label }}
        </button>
      </div>
      <!-- Records -->
      <div class="space-y-4">
        <div v-for="rec in filteredWellness" :key="rec.id"
          class="group p-6 rounded-2xl border transition-all hover:shadow-md"
          style="background-color:white; border-color:#03163208;">
          <div class="flex items-start justify-between">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center text-xl flex-shrink-0" :style="typeStyle(rec.type)">
                {{ typeIcon(rec.type) }}
              </div>
              <div>
                <div class="flex items-center gap-2 mb-1">
                  <h3 class="font-serif text-lg" style="color:#031632;">{{ rec.title }}</h3>
                  <span class="text-xs px-2 py-0.5 rounded-full" :style="typeStyle(rec.type)">{{ rec.type }}</span>
                </div>
                <p class="text-xs mb-2" style="color:#566252;">{{ formatDate(rec.date) }} · {{ rec.doctor }}</p>
                <p class="text-sm" style="color:#566252;">{{ rec.notes }}</p>
                <div v-if="rec.vaccinations?.length" class="flex flex-wrap gap-1 mt-2">
                  <span v-for="v in rec.vaccinations" :key="v" class="text-xs px-2 py-0.5 rounded-full" style="background-color:#56625215; color:#566252;">💉 {{ v }}</span>
                </div>
              </div>
            </div>
            <div v-if="store.isAdmin" class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
              <button @click="openEdit(rec)" class="p-1.5 rounded-lg hover:bg-blue-50" style="color:#566252;">
                <span class="material-symbols-outlined text-sm">edit</span>
              </button>
              <button @click="confirmDelete(rec)" class="p-1.5 rounded-lg hover:bg-red-50 text-red-400">
                <span class="material-symbols-outlined text-sm">delete</span>
              </button>
            </div>
          </div>
        </div>
        <div v-if="!filteredWellness.length" class="text-center py-16">
          <span class="text-5xl block mb-3">🏥</span>
          <p class="text-sm" style="color:#566252;">No wellness records yet.</p>
        </div>
      </div>
    </div>

    <AppModal :show="showModal" :title="editingItem ? 'Edit Wellness Record' : 'New Wellness Record'" size="lg" @close="closeModal">
      <div class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Date</label>
            <input v-model="form.date" type="date" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
          </div>
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Type</label>
            <select v-model="form.type" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
              <option v-for="t in types.filter(t=>t.key!=='all')" :key="t.key" :value="t.key">{{ t.label }}</option>
            </select>
          </div>
        </div>
        <div>
          <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Title</label>
          <input v-model="form.title" type="text" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        </div>
        <div>
          <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Doctor / Provider</label>
          <input v-model="form.doctor" type="text" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        </div>
        <div>
          <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Notes</label>
          <textarea v-model="form.notes" rows="4" class="w-full px-4 py-3 rounded-xl border text-sm outline-none resize-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;"></textarea>
        </div>
        <div>
          <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Vaccinations (comma separated)</label>
          <input v-model="form.vacStr" type="text" placeholder="BCG, HepB, Polio..." class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        </div>
      </div>
      <template #footer>
        <button @click="closeModal" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="saveItem" class="px-5 py-2.5 rounded-xl text-sm" style="background-color:#031632; color:#fcf9f5;">{{ editingItem ? 'Save' : 'Add Record' }}</button>
      </template>
    </AppModal>

    <AppModal :show="showDeleteModal" title="Delete Record" @close="showDeleteModal=false">
      <p class="text-sm" style="color:#566252;">Delete <strong style="color:#031632;">{{ deleteTarget?.title }}</strong>?</p>
      <template #footer>
        <button @click="showDeleteModal=false" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="doDelete" class="px-5 py-2.5 rounded-xl text-sm bg-red-600 text-white">Delete</button>
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
