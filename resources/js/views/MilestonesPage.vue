<template>
  <div class="animate-fade-in bg-surface-warm min-h-screen pb-24">
    <!-- Header -->
    <div class="pt-24 pb-16 bg-navy relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-navy via-navy to-sage/20"></div>
      <div class="relative max-w-6xl mx-auto px-6">
        <p class="text-xs font-black tracking-[0.25em] text-cream/50 uppercase mb-3 block">Every big moment</p>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <h1 class="font-serif text-5xl md:text-6xl font-light text-cream">Milestones</h1>
          <button v-if="store.isAdmin" @click="openAdd()"
            class="flex items-center gap-2 px-6 py-3 rounded-none text-xs font-black tracking-widest uppercase transition-all bg-cream text-navy hover:bg-cream/90">
            <span class="material-symbols-outlined text-base">add</span>
            Add Milestone
          </button>
        </div>
      </div>
    </div>

    <!-- Category Filter -->
    <div class="sticky top-[72px] z-40 bg-surface-warm/90 backdrop-blur-md border-b border-sage/10 py-4 shadow-sm">
      <div class="max-w-6xl mx-auto px-6 flex items-center gap-3 overflow-x-auto no-scrollbar">
        <button v-for="cat in categories" :key="cat.key"
          @click="activeCategory = cat.key"
          :class="['flex items-center gap-2 px-5 py-2 text-xs font-bold tracking-widest uppercase whitespace-nowrap transition-all border', activeCategory===cat.key ? 'bg-navy border-navy text-cream' : 'border-sage/20 text-sage hover:border-sage/50 bg-white']">
          <span>{{ cat.icon }}</span> <span>{{ cat.label }}</span>
        </button>
      </div>
    </div>

    <!-- Milestone Grid -->
    <div class="max-w-6xl mx-auto px-6 py-16">
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <article v-for="milestone in filteredMilestones" :key="milestone.id"
          class="group relative p-8 bg-white border border-sage/10 transition-all hover:shadow-xl card-lift">
          <!-- Category badge -->
          <div class="absolute top-6 right-6">
            <span class="text-[10px] font-bold uppercase tracking-widest px-3 py-1 bg-surface-stone text-sage border border-sage/10">
              {{ categoryLabel(milestone.category) }}
            </span>
          </div>
          <!-- Icon -->
          <div class="text-5xl mb-6">{{ milestone.icon }}</div>
          <!-- Date -->
          <time class="text-xs font-bold tracking-[0.2em] text-sage uppercase mb-3 block">{{ formatDate(milestone.date) }}</time>
          <!-- Title -->
          <h2 class="font-serif text-2xl text-navy leading-tight mb-3">{{ milestone.title }}</h2>
          <!-- Description -->
          <p class="text-sm leading-relaxed text-sage/80 font-light" style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">{{ milestone.description }}</p>
          <!-- Admin Actions -->
          <div v-if="store.isAdmin" class="flex items-center gap-2 mt-6 pt-4 border-t border-sage/10 opacity-0 group-hover:opacity-100 transition-opacity">
            <button @click="openEdit(milestone)" class="flex items-center gap-1.5 text-xs px-4 py-2 border border-sage/20 text-sage hover:bg-surface-stone transition-colors">
              <span class="material-symbols-outlined text-sm">edit</span> Edit
            </button>
            <button @click="confirmDelete(milestone)" class="flex items-center gap-1.5 text-xs px-4 py-2 border border-red-200 text-red-500 hover:bg-red-50 transition-colors">
              <span class="material-symbols-outlined text-sm">delete</span> Delete
            </button>
          </div>
        </article>
      </div>

      <!-- Empty -->
      <div v-if="!filteredMilestones.length" class="text-center py-32 bg-white border border-sage/10">
        <span class="text-6xl block mb-6">⭐</span>
        <p class="font-serif text-3xl text-navy mb-3">No milestones yet</p>
        <p class="text-sage/70 mb-8">Every great journey begins with a first step.</p>
        <button v-if="store.isAdmin" @click="openAdd()" class="bg-navy text-cream px-8 py-3 text-xs font-black tracking-widest uppercase hover:bg-navy-light transition-colors">Record First Milestone</button>
      </div>
    </div>

    <!-- Add/Edit Modal -->
    <AppModal :show="showModal" :title="editingItem ? 'Edit Milestone' : 'New Milestone'" size="lg" @close="closeModal">
      <div class="space-y-6">
        <div class="grid grid-cols-2 gap-6">
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-sage mb-2">Date</label>
            <input v-model="form.date" type="date" class="w-full px-4 py-3 bg-surface-stone border border-sage/20 text-navy outline-none focus:border-sage/50 transition-colors">
          </div>
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-sage mb-2">Category</label>
            <select v-model="form.category" class="w-full px-4 py-3 bg-surface-stone border border-sage/20 text-navy outline-none focus:border-sage/50 transition-colors">
              <option v-for="cat in categories" :key="cat.key" :value="cat.key">{{ cat.icon }} {{ cat.label }}</option>
            </select>
          </div>
        </div>
        <div>
          <label class="block text-xs font-bold tracking-widest uppercase text-sage mb-2">Milestone Title</label>
          <input v-model="form.title" type="text" placeholder="First Smile, First Steps..."
            class="w-full px-4 py-3 bg-surface-stone border border-sage/20 text-navy outline-none focus:border-sage/50 transition-colors">
        </div>
        <div>
          <label class="block text-xs font-bold tracking-widest uppercase text-sage mb-2">Icon (emoji)</label>
          <div class="flex flex-wrap gap-2">
            <button v-for="ic in iconOptions" :key="ic" @click="form.icon = ic"
              :class="['w-10 h-10 text-xl flex items-center justify-center transition-all', form.icon === ic ? 'border-2 border-navy scale-110 bg-white' : 'border border-sage/20 bg-surface-stone hover:scale-110']">
              {{ ic }}
            </button>
          </div>
        </div>
        <div>
          <label class="block text-xs font-bold tracking-widest uppercase text-sage mb-2">Description</label>
          <textarea v-model="form.description" rows="4" placeholder="Describe this special moment..."
            class="w-full px-4 py-3 bg-surface-stone border border-sage/20 text-navy outline-none focus:border-sage/50 transition-colors resize-none leading-relaxed"></textarea>
        </div>
      </div>
      <template #footer>
        <button @click="closeModal" class="px-6 py-3 border border-sage/20 text-sage text-xs font-black tracking-widest uppercase hover:bg-surface-stone transition-colors">Cancel</button>
        <button @click="saveItem" class="px-6 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy-light transition-colors">{{ editingItem ? 'Save Changes' : 'Record Milestone' }}</button>
      </template>
    </AppModal>

    <!-- Delete Modal -->
    <AppModal :show="showDeleteModal" title="Delete Milestone" @close="showDeleteModal=false">
      <p class="text-sage leading-relaxed">Delete <strong class="text-navy font-bold">{{ deleteTarget?.title }}</strong>? This cannot be undone.</p>
      <template #footer>
        <button @click="showDeleteModal=false" class="px-6 py-3 border border-sage/20 text-sage text-xs font-black tracking-widest uppercase hover:bg-surface-stone transition-colors">Cancel</button>
        <button @click="doDelete" class="px-6 py-3 bg-red-600 text-white text-xs font-black tracking-widest uppercase hover:bg-red-700 transition-colors">Delete</button>
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

const activeCategory = ref('all');
const showModal = ref(false);
const editingItem = ref(null);
const showDeleteModal = ref(false);
const deleteTarget = ref(null);

const categories = [
  { key:'all',         label:'All',         icon:'✨' },
  { key:'life',        label:'Life',         icon:'🌱' },
  { key:'development', label:'Development',  icon:'🧠' },
  { key:'health',      label:'Health',       icon:'💚' },
  { key:'social',      label:'Social',       icon:'👥' },
  { key:'school',      label:'School',       icon:'📚' },
  { key:'achievement', label:'Achievement',  icon:'🏆' },
];

const iconOptions = ['✨','🌱','🧠','💚','👥','📚','🏆','🎉','😊','🌸','🦶','✍️','🎵','🌍','⭐','💫','🎨','🏅','🔥','💌'];

const filteredMilestones = computed(() => {
  if (activeCategory.value === 'all') return store.sortedMilestones;
  return store.sortedMilestones.filter(m => m.category === activeCategory.value);
});

function categoryLabel(cat) {
  return categories.find(c => c.key === cat)?.label || cat;
}

const defaultForm = () => ({
  title:'', date: new Date().toISOString().split('T')[0],
  category:'life', icon:'✨', description:'',
});
const form = ref(defaultForm());

function openAdd() { form.value = defaultForm(); editingItem.value = null; showModal.value = true; }
function openEdit(item) { form.value = { ...item }; editingItem.value = item; showModal.value = true; }
function closeModal() { showModal.value = false; editingItem.value = null; }

function saveItem() {
  if (editingItem.value) store.updateMilestone(editingItem.value.id, form.value);
  else store.addMilestone(form.value);
  closeModal();
}

function confirmDelete(item) { deleteTarget.value = item; showDeleteModal.value = true; }
function doDelete() { store.deleteMilestone(deleteTarget.value.id); showDeleteModal.value = false; }

function formatDate(d) {
  if (!d) return '';
  return new Date(d).toLocaleDateString('en-IN', { day:'numeric', month:'long', year:'numeric' });
}
</script>

<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
