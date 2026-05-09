<template>
  <div class="animate-fade-in bg-surface-warm min-h-screen pb-24">
    <NavBar />

    <!-- Header -->
    <div class="pt-24 pb-16 bg-navy relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-navy to-navy/80"></div>
      <div class="relative max-w-5xl mx-auto px-6">
        <p class="text-xs font-black tracking-[0.25em] text-gold uppercase mb-3 block">Every triumph, tiny & tall</p>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <h1 class="font-serif text-5xl md:text-6xl font-light text-cream mb-4 md:mb-0">Achievements</h1>
          <button class="transition-transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2 px-6 py-3 bg-gold text-navy text-xs font-black tracking-widest uppercase transition-colors hover:bg-gold/90 w-full md:w-auto card-lift">
            <span class="material-symbols-outlined text-sm">add</span>
            Add Achievement
          </button>
        </div>
        <p class="text-sm mt-6 font-bold tracking-widest uppercase text-sage/50">
          {{ store.milestones.filter(m => m.category === 'achievement').length }} recorded achievements
        </p>
      </div>
    </div>

    <!-- Year Filter -->
    <div class="border-b border-sage/10 bg-surface-stone sticky top-0 z-10">
      <div class="max-w-5xl mx-auto px-6 py-4 flex items-center gap-3 overflow-x-auto no-scrollbar">
        <button v-for="yr in yearFilters" :key="yr"
          @click="activeYear = yr" 
          :class="['px-5 py-2 text-[10px] font-black tracking-widest uppercase whitespace-nowrap transition-all border transition-transform hover:scale-105 active:scale-95', activeYear===yr ? 'bg-navy text-cream border-navy card-lift' : 'border-sage/20 text-sage hover:bg-sage/5 hover:border-sage/40']">
          {{ yr === 'all' ? 'All Time' : yr }}
        </button>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-12">
      <!-- Trophy Shelf (top achievements pinned) -->
      <div v-if="trophyItems.length" class="mb-16">
        <h2 class="font-serif text-2xl text-navy mb-8 flex items-center gap-3">
          <span class="text-3xl">🏆</span> Trophy Shelf
        </h2>
        <div class="grid sm:grid-cols-3 gap-6">
          <div v-for="(item, index) in trophyItems" :key="item.id" v-tilt v-reveal="'reveal-up'" :style="`transition-delay: ${index * 0.1}s`"
            class="p-8 bg-gradient-to-br from-white to-surface-warm rounded-none text-center border border-gold/30 transition-all hover:shadow-xl hover:border-gold/60 card-lift">
            <div class="text-6xl mb-6 drop-shadow-md">{{ item.icon }}</div>
            <h3 class="font-serif text-xl text-navy mb-3 leading-snug">{{ item.title }}</h3>
            <p class="text-[10px] font-black tracking-widest uppercase text-sage/80 mb-4">{{ formatDate(item.date) }}</p>
            <p v-if="item.description" class="text-sm text-sage/70 leading-relaxed">{{ item.description }}</p>
          </div>
        </div>
      </div>

      <!-- All Achievements List -->
      <div>
        <h2 class="font-serif text-2xl text-navy mb-8">All Achievements</h2>
        <div class="space-y-4">
          <div v-for="(item, index) in filteredAchievements" :key="item.id" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.05}s`"
            class="group flex flex-col md:flex-row items-start gap-6 p-6 bg-white border border-sage/10 transition-all hover:shadow-lg card-lift relative">
            <div class="w-16 h-16 flex items-center justify-center text-3xl flex-shrink-0 bg-surface-stone border border-sage/20 shadow-sm rounded-full">
              {{ item.icon }}
            </div>
            <div class="flex-1 w-full">
              <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                <div>
                  <h3 class="font-serif text-xl text-navy mb-2">{{ item.title }}</h3>
                  <p class="text-[10px] font-black tracking-widest uppercase text-sage/80 flex flex-wrap items-center gap-2">
                    {{ formatDate(item.date) }}
                    <span class="w-1 h-1 bg-sage/30 rounded-full" v-if="item.category"></span>
                    <span v-if="item.category" class="px-2 py-0.5 border border-sage/20 bg-surface-stone text-sage">{{ item.category }}</span>
                  </p>
                </div>
                <div v-if="store.isAdmin" class="flex items-center gap-2 md:opacity-0 group-hover:opacity-100 transition-opacity">
                  <button @click="openEdit(item)" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-sage/10 text-sage transition-colors">
                    <span class="material-symbols-outlined text-sm">edit</span>
                  </button>
                  <button @click="confirmDelete(item)" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-red-50 text-red-400 transition-colors">
                    <span class="material-symbols-outlined text-sm">delete</span>
                  </button>
                </div>
              </div>
              <p v-if="item.description" class="text-sm mt-4 leading-relaxed text-sage/90 font-light">{{ item.description }}</p>
            </div>
          </div>
        </div>

        <!-- Empty -->
        <div v-if="!filteredAchievements.length" class="text-center py-24 bg-white border border-sage/10 relative overflow-hidden group">
          <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
          <span class="text-6xl block mb-6 transform group-hover:scale-110 transition-transform duration-700">🌟</span>
          <p class="font-serif text-3xl text-navy mb-4 relative z-10">No achievements yet</p>
          <p class="text-sm text-sage/80 mb-8 max-w-md mx-auto relative z-10 leading-relaxed font-light">Every achievement starts with a single step. Record Shaiyra's first!</p>
          <button class="transition-transform hover:scale-105 active:scale-95 px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors relative z-10 shadow-lg card-lift">
            Record First Achievement
          </button>
        </div>
      </div>
    </div>

    <!-- Add/Edit Modal -->
    <AppModal :show="showModal" :title="editingItem ? 'Edit Achievement' : 'New Achievement'" size="lg" @close="closeModal">
      <div class="space-y-6">
        <FloatingInput id="ach_title" label="Achievement Title (First steps, Gold medal...)" v-model="form.title" />
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <FloatingInput id="ach_date" label="Date" type="date" v-model="form.date" />
          <div>
            <label class="block text-[10px] font-black tracking-widest uppercase text-sage mb-2">Category</label>
            <select v-model="form.category" class="w-full px-4 py-3 bg-surface-stone border border-sage/20 text-navy outline-none focus:border-sage/50 transition-colors">
              <option value="achievement">Achievement</option>
              <option value="school">School</option>
              <option value="sports">Sports</option>
              <option value="arts">Arts</option>
              <option value="social">Social</option>
              <option value="life">Life</option>
            </select>
          </div>
        </div>
        
        <div>
          <label class="block text-[10px] font-black tracking-widest uppercase text-sage mb-3">Icon</label>
          <div class="flex flex-wrap gap-2">
            <button v-for="ic in iconOptions" :key="ic" @click="form.icon = ic" 
              :class="['w-12 h-12 flex items-center justify-center rounded-none text-2xl transition-all border transition-transform hover:scale-105 active:scale-95', form.icon===ic ? 'border-navy bg-navy/5 scale-110 shadow-sm' : 'border-sage/20 bg-surface-stone hover:border-sage/50']">
              {{ ic }}
            </button>
          </div>
        </div>
        
        <FloatingInput id="ach_desc" label="Description" type="textarea" rows="4" v-model="form.description" />
      </div>
      <template #footer>
        <button @click="closeModal" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveItem" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">
          {{ editingItem ? 'Save Changes' : 'Record Achievement' }}
        </button>
      </template>
    </AppModal>

    <!-- Delete Modal -->
    <AppModal :show="showDeleteModal" title="Delete Achievement" @close="showDeleteModal=false">
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

const activeYear = ref('all');
const showModal = ref(false);
const editingItem = ref(null);
const showDeleteModal = ref(false);
const deleteTarget = ref(null);

const iconOptions = ['🏆','🥇','🥈','🥉','🌟','⭐','🎖️','🏅','🎓','📚','🎨','🎵','⚽','🏊','🎭','💡','🔬','✍️','🌍','🚀'];

// All achievements are milestones with category 'achievement' OR all milestones (awards)
const allAchievements = computed(() =>
  store.sortedMilestones.filter(m => ['achievement','school','sports','arts'].includes(m.category) || m.category === 'achievement')
);

const years = computed(() => {
  const yrs = new Set(allAchievements.value.map(a => new Date(a.date).getFullYear()));
  return ['all', ...[...yrs].sort((a,b)=>b-a)];
});
const yearFilters = computed(() => years.value);

const filteredAchievements = computed(() => {
  if (activeYear.value === 'all') return allAchievements.value;
  return allAchievements.value.filter(a => new Date(a.date).getFullYear() === Number(activeYear.value));
});

const trophyItems = computed(() => allAchievements.value.slice(0, 3));

const defaultForm = () => ({
  title:'', date: new Date().toISOString().split('T')[0],
  category:'achievement', icon:'🏆', description:'',
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
