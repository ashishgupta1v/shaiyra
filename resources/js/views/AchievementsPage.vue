<template>
  <div class="min-h-screen" style="background-color:#fcf9f5; font-family:'Manrope',sans-serif;">
    <NavBar />

    <!-- Header -->
    <div class="pt-12 pb-8" style="background-color:#031632;">
      <div class="max-w-5xl mx-auto px-6">
        <p class="text-xs uppercase tracking-widest mb-2" style="color:#dcc0c0; opacity:0.5;">Every triumph, tiny & tall</p>
        <div class="flex items-end justify-between">
          <h1 class="font-serif text-5xl" style="color:#fcf9f5;">Achievements</h1>
          <button v-if="store.isAdmin" @click="openAdd()"
            class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm"
            style="background-color:#dcc0c0; color:#031632;">
            <span class="material-symbols-outlined text-base">add</span>
            Add Achievement
          </button>
        </div>
        <p class="text-sm mt-3" style="color:#ffffff50;">
          {{ store.milestones.filter(m => m.category === 'achievement').length }} recorded achievements
        </p>
      </div>
    </div>

    <!-- Year Filter -->
    <div class="border-b" style="background-color:#031632; border-color:#ffffff10;">
      <div class="max-w-5xl mx-auto px-6 pb-4 flex items-center gap-2 overflow-x-auto">
        <button v-for="yr in yearFilters" :key="yr"
          @click="activeYear = yr"
          :class="['px-4 py-1.5 rounded-full text-xs uppercase tracking-wider whitespace-nowrap transition-all', activeYear===yr ? '' : 'border border-white/10 text-white/50 hover:text-white/80']"
          :style="activeYear===yr ? 'background-color:#dcc0c0; color:#031632;' : ''">
          {{ yr === 'all' ? 'All Time' : yr }}
        </button>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-12">
      <!-- Trophy Shelf (top achievements pinned) -->
      <div v-if="trophyItems.length" class="mb-12">
        <h2 class="font-serif text-2xl mb-6" style="color:#031632;">🏆 Trophy Shelf</h2>
        <div class="grid sm:grid-cols-3 gap-4">
          <div v-for="item in trophyItems" :key="item.id"
            class="p-6 rounded-2xl text-center border-2 transition-all hover:-translate-y-1 hover:shadow-xl"
            style="background-color:white; border-color:#c9a84c30;">
            <div class="text-5xl mb-4">{{ item.icon }}</div>
            <h3 class="font-serif text-lg mb-2" style="color:#031632;">{{ item.title }}</h3>
            <p class="text-xs uppercase tracking-wider mb-2" style="color:#566252;">{{ formatDate(item.date) }}</p>
            <p v-if="item.description" class="text-sm" style="color:#566252; opacity:0.8;">{{ item.description }}</p>
          </div>
        </div>
      </div>

      <!-- All Achievements List -->
      <div>
        <h2 class="font-serif text-2xl mb-6" style="color:#031632;">All Achievements</h2>
        <div class="space-y-3">
          <div v-for="item in filteredAchievements" :key="item.id"
            class="group flex items-start gap-5 p-5 rounded-2xl border transition-all hover:shadow-md"
            style="background-color:white; border-color:#03163208;">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-2xl flex-shrink-0" style="background-color:#c9a84c15;">
              {{ item.icon }}
            </div>
            <div class="flex-1">
              <div class="flex items-start justify-between">
                <div>
                  <h3 class="font-serif text-lg" style="color:#031632;">{{ item.title }}</h3>
                  <p class="text-xs uppercase tracking-wider mt-0.5" style="color:#566252;">
                    {{ formatDate(item.date) }}
                    <span v-if="item.category" class="ml-2 px-2 py-0.5 rounded-full" style="background-color:#56625215;">{{ item.category }}</span>
                  </p>
                </div>
                <div v-if="store.isAdmin" class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                  <button @click="openEdit(item)" class="p-1.5 rounded-lg hover:bg-blue-50" style="color:#566252;">
                    <span class="material-symbols-outlined text-sm">edit</span>
                  </button>
                  <button @click="confirmDelete(item)" class="p-1.5 rounded-lg hover:bg-red-50 text-red-400">
                    <span class="material-symbols-outlined text-sm">delete</span>
                  </button>
                </div>
              </div>
              <p v-if="item.description" class="text-sm mt-2 leading-relaxed" style="color:#566252;">{{ item.description }}</p>
            </div>
          </div>
        </div>

        <!-- Empty -->
        <div v-if="!filteredAchievements.length" class="text-center py-20 rounded-2xl border-2 border-dashed" style="border-color:#03163210;">
          <span class="text-6xl block mb-4">🌟</span>
          <p class="font-serif text-2xl mb-2" style="color:#031632;">No achievements yet</p>
          <p class="text-sm mb-6" style="color:#566252;">Every achievement starts with a single step. Record Shaiyra's first!</p>
          <button v-if="store.isAdmin" @click="openAdd()"
            class="px-6 py-3 rounded-full text-sm" style="background-color:#031632; color:#fcf9f5;">
            Record First Achievement
          </button>
        </div>
      </div>
    </div>

    <!-- Add/Edit Modal -->
    <AppModal :show="showModal" :title="editingItem ? 'Edit Achievement' : 'New Achievement'" size="lg" @close="closeModal">
      <div class="space-y-4">
        <div>
          <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Achievement Title</label>
          <input v-model="form.title" type="text" placeholder="First steps, Gold medal, Graduation..."
            class="w-full px-4 py-3 rounded-xl border text-sm outline-none"
            style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Date</label>
            <input v-model="form.date" type="date" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
          </div>
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Category</label>
            <select v-model="form.category" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
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
          <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Icon (emoji)</label>
          <div class="flex flex-wrap gap-2">
            <button v-for="ic in iconOptions" :key="ic" @click="form.icon = ic"
              :class="['w-10 h-10 rounded-xl text-xl transition-all hover:scale-110', form.icon===ic ? 'ring-2 scale-110' : '']"
              style="background-color:#fcf9f5;">{{ ic }}</button>
          </div>
        </div>
        <div>
          <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Description</label>
          <textarea v-model="form.description" rows="3" class="w-full px-4 py-3 rounded-xl border text-sm outline-none resize-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;"></textarea>
        </div>
      </div>
      <template #footer>
        <button @click="closeModal" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="saveItem" class="px-5 py-2.5 rounded-xl text-sm" style="background-color:#031632; color:#fcf9f5;">
          {{ editingItem ? 'Save Changes' : 'Record Achievement' }}
        </button>
      </template>
    </AppModal>

    <!-- Delete Modal -->
    <AppModal :show="showDeleteModal" title="Delete Achievement" @close="showDeleteModal=false">
      <p class="text-sm" style="color:#566252;">Delete <strong style="color:#031632;">{{ deleteTarget?.title }}</strong>? This cannot be undone.</p>
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
