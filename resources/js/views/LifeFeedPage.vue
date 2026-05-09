<template>
  <div class="animate-fade-in bg-surface-warm min-h-screen pb-24">
    <!-- Header -->
    <div class="pt-24 pb-16 bg-navy relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-navy via-navy to-sage/20"></div>
      <div class="relative max-w-4xl mx-auto px-6">
        <p class="text-xs font-black tracking-[0.25em] text-cream/50 uppercase mb-3 block">Shaiyra's Story</p>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <h1 class="font-serif text-5xl md:text-6xl font-light text-cream">Life Feed</h1>
          <button class="transition-transform hover:scale-105 active:scale-95 flex items-center gap-2 px-6 py-3 rounded-none text-xs font-black tracking-widest uppercase transition-all bg-cream text-navy hover:bg-cream/90 card-lift">
            <Plus class="w-5 h-5" />
            New Entry
          </button>
        </div>
        <p class="text-sm mt-6 text-cream/50 font-light">{{ store.stats.journalCount }} entries · Documenting every beautiful moment</p>
      </div>
    </div>

    <!-- Filter Bar -->
    <div class="sticky top-[72px] z-40 bg-surface-warm/90 backdrop-blur-md border-b border-sage/10 py-4 shadow-sm">
      <div class="max-w-4xl mx-auto px-6 flex items-center gap-3 overflow-x-auto no-scrollbar">
        <button v-for="f in filters" :key="f"
          @click="activeFilter = f"
          :class="['px-5 py-2 text-xs font-bold tracking-widest uppercase whitespace-nowrap transition-all border', activeFilter===f ? 'bg-navy border-navy text-cream' : 'border-sage/20 text-sage hover:border-sage/50 bg-white']">
          {{ f }}
        </button>
      </div>
    </div>

    <!-- Entries -->
    <div class="max-w-4xl mx-auto px-6 py-16">
      <TransitionGroup name="fade" tag="div" class="space-y-12">
        <article v-for="(entry, index) in filteredEntries" :key="entry.id" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.1}s`"
          class="group relative p-8 md:p-10 border border-sage/15 glass-glow transition-all hover:shadow-xl card-lift">

          <!-- Pinned ribbon -->
          <div v-if="entry.pinned" class="absolute top-0 right-8 px-4 py-1.5 text-[10px] font-black tracking-widest uppercase bg-blush text-navy">
            ✦ Pinned
          </div>

          <!-- Date + mood -->
          <div class="flex items-center justify-between mb-8 border-b border-sage/10 pb-4">
            <div class="flex items-center gap-4">
              <time class="text-xs font-bold tracking-[0.2em] text-sage uppercase">{{ formatDate(entry.date) }}</time>
              <span v-if="entry.tags?.length" class="text-[10px] font-bold uppercase tracking-widest px-3 py-1 bg-surface-stone text-sage">{{ entry.tags[0] }}</span>
            </div>
            <div class="flex items-center gap-4">
              <span class="text-3xl">{{ entry.mood }}</span>
              <!-- Admin actions -->
              <div v-if="store.isAdmin" class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                <button  @click="openEdit(entry)" class="w-8 h-8 flex items-center justify-center hover:bg-sage/10 text-sage transition-colors rounded-full transition-transform hover:scale-105 active:scale-95">
                  <Edit2 class="w-4 h-4" />
                </button>
                <button  @click="confirmDelete('journal', entry.id, entry.title)" class="w-8 h-8 flex items-center justify-center hover:bg-red-50 text-red-400 transition-colors rounded-full transition-transform hover:scale-105 active:scale-95">
                  <Trash2 class="w-4 h-4" />
                </button>
              </div>
            </div>
          </div>

          <!-- Title -->
          <h2 class="font-serif text-3xl md:text-4xl text-navy leading-tight mb-6">{{ entry.title }}</h2>

          <!-- Content -->
          <div class="text-base md:text-lg leading-relaxed whitespace-pre-line text-sage/80 font-light">{{ entry.content }}</div>

          <!-- Tags -->
          <div v-if="entry.tags?.length" class="flex flex-wrap gap-2 mt-8 pt-6 border-t border-sage/5">
            <span v-for="tag in entry.tags" :key="tag"
              class="text-[10px] font-bold uppercase tracking-widest px-3 py-1 border border-sage/20 text-sage hover:bg-sage/5 cursor-pointer transition-colors"
              @click="activeFilter = tag">
              #{{ tag }}
            </span>
          </div>
        </article>
      </TransitionGroup>

      <!-- Empty -->
      <div v-if="!filteredEntries.length" class="text-center py-32 bg-white border border-sage/10 glass-glow card-lift">
        <BookOpen class="w-16 h-16 text-sage/30 mx-auto mb-6" />
        <p class="font-serif text-3xl text-navy mb-3">The journal awaits</p>
        <p class="text-sage/70 mb-8">{{ activeFilter !== 'All' ? 'No entries match this filter.' : 'Start writing Shaiyra\'s story.' }}</p>
        <button  v-if="store.isAdmin" @click="openAdd()" class="bg-navy text-cream px-8 py-3 text-xs font-black tracking-widest uppercase hover:bg-navy-light transition-colors transition-transform hover:scale-105 active:scale-95">Write First Entry</button>
      </div>
    </div>

    <!-- Add/Edit Modal -->
    <AppModal :show="showModal" :title="editingEntry ? 'Edit Entry' : 'New Journal Entry'" size="lg" @close="closeModal">
      <div class="space-y-6">
        <FloatingInput id="entry_title" label="Title (Give this entry a name...)" v-model="form.title" />
        <div class="grid grid-cols-2 gap-6">
          <FloatingInput id="entry_date" label="Date" type="date" v-model="form.date" />
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-sage mb-2">Mood</label>
            <div class="flex flex-wrap gap-2">
              <button v-for="mood in moods" :key="mood" @click="form.mood = mood"
                :class="['w-10 h-10 text-xl flex items-center justify-center transition-all', form.mood === mood ? 'border-2 border-navy scale-110 bg-white' : 'border border-sage/20 bg-surface-stone hover:scale-110']">
                {{ mood }}
              </button>
            </div>
          </div>
        </div>
        <FloatingInput id="entry_content" label="Story (Write freely...)" v-model="form.content" type="textarea" rows="10" />
        <FloatingInput id="entry_tags" label="Tags (comma separated)" v-model="form.tagsStr" />
        <div class="flex items-center gap-3 pt-2 border-t border-sage/10">
          <input v-model="form.pinned" type="checkbox" id="pinned" class="w-4 h-4 accent-navy">
          <label for="pinned" class="text-sm font-bold tracking-wide text-sage">Pin this entry to the top</label>
        </div>
      </div>
      <template #footer>
        <button @click="closeModal" class="px-6 py-3 border border-sage/20 text-sage text-xs font-black tracking-widest uppercase hover:bg-surface-stone transition-colors">Cancel</button>
        <button  @click="saveEntry" class="px-6 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy-light transition-colors transition-transform hover:scale-105 active:scale-95">{{ editingEntry ? 'Save Changes' : 'Publish Entry' }}</button>
      </template>
    </AppModal>

    <!-- Delete Confirm -->
    <AppModal :show="showDeleteModal" title="Delete Entry" @close="showDeleteModal=false">
      <p class="text-sage leading-relaxed">Are you sure you want to delete <strong class="text-navy font-bold">{{ deleteTarget?.name }}</strong>? This cannot be undone.</p>
      <template #footer>
        <button @click="showDeleteModal=false" class="px-6 py-3 border border-sage/20 text-sage text-xs font-black tracking-widest uppercase hover:bg-surface-stone transition-colors">Cancel</button>
        <button  @click="doDelete" class="px-6 py-3 bg-red-600 text-white text-xs font-black tracking-widest uppercase hover:bg-red-700 transition-colors transition-transform hover:scale-105 active:scale-95">Delete</button>
      </template>
    </AppModal>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useJournalStore } from '@/stores/journal';
import AppModal from '@/components/AppModal.vue';
import FloatingInput from '@/components/FloatingInput.vue';
import { Plus, Edit2, Trash2, BookOpen } from 'lucide-vue-next';

const store = useJournalStore();
store.init();

const activeFilter = ref('All');
const showModal = ref(false);
const editingEntry = ref(null);
const showDeleteModal = ref(false);
const deleteTarget = ref(null);

const moods = ['🌸','☀️','🌙','🌿','💫','🎉','😊','🥹','❤️','✨'];

const allTags = computed(() => {
  const tags = new Set();
  store.journalEntries.forEach(e => e.tags?.forEach(t => tags.add(t)));
  return ['All', ...tags];
});

const filters = computed(() => allTags.value.slice(0,8));

const filteredEntries = computed(() => {
  let list = store.sortedJournal;
  if (activeFilter.value !== 'All') list = list.filter(e => e.tags?.includes(activeFilter.value));
  return list;
});

const defaultForm = () => ({
  title: '', content: '', date: new Date().toISOString().split('T')[0],
  mood: '🌸', tagsStr: '', pinned: false,
});
const form = ref(defaultForm());

function openAdd() { form.value = defaultForm(); editingEntry.value = null; showModal.value = true; }
function openEdit(entry) {
  form.value = { ...entry, tagsStr: (entry.tags||[]).join(', ') };
  editingEntry.value = entry;
  showModal.value = true;
}
function closeModal() { showModal.value = false; editingEntry.value = null; }

function saveEntry() {
  const tags = form.value.tagsStr.split(',').map(t => t.trim()).filter(Boolean);
  const data = { ...form.value, tags };
  if (editingEntry.value) {
    store.updateJournalEntry(editingEntry.value.id, data);
  } else {
    store.addJournalEntry(data);
  }
  closeModal();
}

function confirmDelete(type, id, name) {
  deleteTarget.value = { type, id, name };
  showDeleteModal.value = true;
}

function doDelete() {
  if (deleteTarget.value?.type === 'journal') store.deleteJournalEntry(deleteTarget.value.id);
  showDeleteModal.value = false;
  deleteTarget.value = null;
}

function formatDate(d) {
  if (!d) return '';
  return new Date(d).toLocaleDateString('en-IN', { weekday:'long', day:'numeric', month:'long', year:'numeric' });
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: all 0.4s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; transform: translateY(20px); }
</style>
