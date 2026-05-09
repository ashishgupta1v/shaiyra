<template>
  <div class="animate-fade-in bg-navy min-h-screen pb-24 text-cream">
    <!-- Header -->
    <div class="pt-24 pb-16 relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-navy to-navy/80"></div>
      <div class="relative max-w-4xl mx-auto px-6">
        <p class="text-xs font-black tracking-[0.25em] text-gold uppercase mb-3 block">Written with love</p>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <div>
            <h1 class="font-serif text-5xl md:text-6xl font-light text-cream mb-4">Letters Archive</h1>
            <p class="text-sm text-cream/60 font-light">{{ store.letters.length }} letters — {{ store.unlockedLetters.length }} readable · {{ store.lockedLetters.length }} time-locked</p>
          </div>
          <button class="transition-transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2 px-6 py-3 bg-gold text-navy text-xs font-black tracking-widest uppercase transition-colors hover:bg-gold/90 w-full md:w-auto card-lift">
            <span class="material-symbols-outlined text-sm">add</span>
            Write Letter
          </button>
        </div>
      </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-8">
      <!-- Readable Letters -->
      <div v-if="store.unlockedLetters.length" class="mb-16">
        <h2 class="font-serif text-2xl text-cream mb-8 flex items-center gap-3">
          <span class="material-symbols-outlined text-gold">mail</span> Ready to Read
        </h2>
        <div class="space-y-6">
          <article v-for="(letter, index) in store.unlockedLetters" :key="letter.id" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.1}s`"
            class="group rounded-xl overflow-hidden cursor-pointer transition-all hover:bg-white/5 border border-white/10 card-lift"
            @click="openLetter(letter)">
            <div class="p-8">
              <div class="flex items-start justify-between mb-6">
                <div>
                  <div class="flex items-center gap-3 mb-2">
                    <span class="text-xs font-bold tracking-widest uppercase px-3 py-1 rounded-full border" :class="categoryStyle(letter.category)">{{ letter.category }}</span>
                    <span class="text-xs text-cream/40 uppercase tracking-widest">{{ formatDate(letter.date) }}</span>
                  </div>
                  <h3 class="font-serif text-3xl text-cream mb-2">{{ letter.title }}</h3>
                </div>
                <div v-if="store.isAdmin" class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                  <button  @click.stop="openEdit(letter)" class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-white/10 text-gold transition-colors transition-transform hover:scale-105 active:scale-95">
                    <span class="material-symbols-outlined text-[20px]">edit</span>
                  </button>
                  <button  @click.stop="confirmDelete(letter)" class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-500/20 text-red-400 transition-colors transition-transform hover:scale-105 active:scale-95">
                    <span class="material-symbols-outlined text-[20px]">delete</span>
                  </button>
                </div>
              </div>
              <div class="flex items-center justify-between pt-6 border-t border-white/5">
                <div class="text-sm font-light text-cream/60">
                  From <strong class="text-gold font-normal">{{ letter.from }}</strong> → To <strong class="text-gold font-normal">{{ letter.to }}</strong>
                </div>
                <span class="text-xs font-bold tracking-widest uppercase text-gold/80 flex items-center gap-2 group-hover:text-gold transition-colors">
                  Tap to read <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </span>
              </div>
            </div>
          </article>
        </div>
      </div>

      <!-- Time-locked Letters -->
      <div v-if="store.lockedLetters.length">
        <h2 v-reveal="'reveal-left'" class="font-serif text-2xl text-cream mb-8 flex items-center gap-3 opacity-80">
          <span class="material-symbols-outlined">lock</span> Time-Locked
        </h2>
        <div class="space-y-4">
          <div v-for="(letter, index) in store.lockedLetters" :key="letter.id" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.1}s`"
            class="group p-6 rounded-xl border border-white/5 bg-white/5 flex flex-col md:flex-row md:items-center justify-between gap-4 card-lift">
            <div>
              <h3 class="font-serif text-xl text-cream mb-2 opacity-80">{{ letter.title }}</h3>
              <p class="text-xs font-light text-cream/50 uppercase tracking-wide">
                From <strong class="text-cream/80 font-normal">{{ letter.from }}</strong> &middot; 
                Unlocks {{ letter.unlockAge ? `on Shaiyra's ${letter.unlockAge}th birthday` : formatDate(letter.unlockDate) }}
              </p>
            </div>
            <div class="flex items-center gap-6">
              <div class="text-right">
                <div class="text-xs font-bold tracking-widest uppercase text-cream/40 mb-1">Opens in</div>
                <div class="font-mono text-lg text-gold">{{ daysUntil(letter.unlockDate) }} days</div>
              </div>
              <div class="w-12 h-12 rounded-full flex items-center justify-center bg-white/5 text-cream/50">
                <span class="material-symbols-outlined text-xl">lock</span>
              </div>
              <div v-if="store.isAdmin" class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                <button  @click="openEdit(letter)" class="p-2 rounded-full hover:bg-white/10 text-gold transition-colors transition-transform hover:scale-105 active:scale-95">
                  <span class="material-symbols-outlined text-sm">edit</span>
                </button>
                <button  @click="confirmDelete(letter)" class="p-2 rounded-full hover:bg-red-500/20 text-red-400 transition-colors transition-transform hover:scale-105 active:scale-95">
                  <span class="material-symbols-outlined text-sm">delete</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="!store.letters.length" class="text-center py-32 border border-white/5 rounded-2xl bg-white/5">
        <span class="material-symbols-outlined text-6xl text-gold/30 block mb-6 font-light">mark_email_unread</span>
        <h2 class="font-serif text-3xl text-cream mb-4">No letters yet</h2>
        <p class="text-cream/60 font-light mb-8 max-w-sm mx-auto">Start writing letters to your daughter — for now, and for someday.</p>
        <button  v-if="store.isAdmin" @click="openAdd()" class="px-8 py-3 bg-gold text-navy text-xs font-black tracking-widest uppercase hover:bg-gold/90 transition-colors transition-transform hover:scale-105 active:scale-95">
          Write First Letter
        </button>
      </div>
    </div>

    <!-- Read Letter Modal -->
    <AppModal :show="!!activeLetter" :title="activeLetter?.title || ''" subtitle="A letter just for you" size="lg" @close="activeLetter=null">
      <div v-if="activeLetter">
        <div class="mb-8 pb-6 border-b border-navy/10 flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div class="text-sm font-light text-navy/70">
            From <strong class="text-navy font-normal">{{ activeLetter.from }}</strong> to <strong class="text-navy font-normal">{{ activeLetter.to }}</strong>
          </div>
          <time class="text-xs font-bold tracking-widest uppercase text-navy/40">{{ formatDate(activeLetter.date) }}</time>
        </div>
        <div class="font-serif text-lg leading-[2.2] whitespace-pre-line text-navy/90">{{ activeLetter.content }}</div>
      </div>
      <template #footer>
        <button  @click="activeLetter=null" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">Close</button>
      </template>
    </AppModal>

    <!-- Write/Edit Modal -->
    <AppModal :show="showModal" :title="editingItem ? 'Edit Letter' : 'Write a Letter'" size="xl" @close="closeModal">
      <div class="space-y-6">
      <div class="space-y-2">
        <FloatingInput id="letter_title" label="Letter Title (On the Day You Were Born...)" v-model="form.title" />
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <FloatingInput id="letter_date" label="Date Written" type="date" v-model="form.date" />
          <FloatingInput id="letter_from" label="From (Papa)" v-model="form.from" />
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-navy/60 mb-2">Category</label>
            <select v-model="form.category" class="w-full px-4 py-3 bg-surface-stone border border-navy/20 text-navy outline-none focus:border-navy/50 transition-colors">
              <option value="birth">Birth</option>
              <option value="milestone">Milestone</option>
              <option value="everyday">Everyday</option>
              <option value="future">Future</option>
              <option value="love">Love</option>
            </select>
          </div>
        </div>
        </div>
        <FloatingInput id="letter_content" label="Letter Content (My dearest Shaiyra...)" v-model="form.content" type="textarea" rows="12" class="font-serif leading-[2]" />
        <div class="p-6 bg-surface-warm border border-navy/10 rounded-xl">
          <div class="flex items-center gap-3 mb-4">
            <input v-model="form.locked" type="checkbox" id="lockLetter" class="w-4 h-4 accent-navy">
            <label for="lockLetter" class="text-sm font-bold text-navy uppercase tracking-widest flex items-center gap-2">
              <span class="material-symbols-outlined text-sm">lock</span> Time-lock this letter
            </label>
          </div>
          <div v-if="form.locked" class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-navy/10">
            <FloatingInput id="letter_unlock_date" label="Unlock Date" type="date" v-model="form.unlockDate" />
            <FloatingInput id="letter_unlock_age" label="Unlock Age (years)" type="number" v-model.number="form.unlockAge" />
          </div>
        </div>
      </div>
      <template #footer>
        <button @click="closeModal" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveItem" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">
          {{ editingItem ? 'Save Changes' : 'Seal with Love' }}
        </button>
      </template>
    </AppModal>

    <!-- Delete Modal -->
    <AppModal :show="showDeleteModal" title="Delete Letter" @close="showDeleteModal=false">
      <p class="text-navy/70 leading-relaxed">Are you sure you want to delete the letter <strong class="text-navy font-bold">"{{ deleteTarget?.title }}"</strong>? This cannot be undone.</p>
      <template #footer>
        <button @click="showDeleteModal=false" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="doDelete" class="px-8 py-3 bg-red-600 text-white text-xs font-black tracking-widest uppercase hover:bg-red-700 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">Delete</button>
      </template>
    </AppModal>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useJournalStore } from '@/stores/journal';
import AppModal from '@/components/AppModal.vue';
import FloatingInput from '@/components/FloatingInput.vue';

const store = useJournalStore();
store.init();

const activeLetter = ref(null);
const showModal = ref(false);
const editingItem = ref(null);
const showDeleteModal = ref(false);
const deleteTarget = ref(null);

function openLetter(letter) { activeLetter.value = letter; }

function categoryStyle(cat) {
  const styles = {
    birth:     'bg-blush/20 text-blush border-blush/30',
    milestone: 'bg-gold/20 text-gold border-gold/30',
    everyday:  'bg-sage/20 text-sage border-sage/30',
    future:    'bg-white/10 text-cream border-white/20',
    love:      'bg-blush/20 text-blush border-blush/30',
  };
  return styles[cat] || 'bg-white/10 text-cream border-white/20';
}

function daysUntil(dateStr) {
  if (!dateStr) return '?';
  const diff = new Date(dateStr) - new Date();
  return Math.max(0, Math.ceil(diff / (1000 * 60 * 60 * 24)));
}

const defaultForm = () => ({
  title:'', date: new Date().toISOString().split('T')[0],
  from:'Papa', to:'Shaiyra', content:'',
  locked:false, unlockDate:null, unlockAge:null, category:'everyday',
});
const form = ref(defaultForm());

function openAdd() { form.value = defaultForm(); editingItem.value = null; showModal.value = true; }
function openEdit(item) { form.value = { ...item }; editingItem.value = item; showModal.value = true; }
function closeModal() { showModal.value = false; editingItem.value = null; }

function saveItem() {
  if (editingItem.value) store.updateLetter(editingItem.value.id, form.value);
  else store.addLetter(form.value);
  closeModal();
}

function confirmDelete(item) { deleteTarget.value = item; showDeleteModal.value = true; }
function doDelete() { store.deleteLetter(deleteTarget.value.id); showDeleteModal.value = false; }

function formatDate(d) {
  if (!d) return '';
  return new Date(d).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' });
}
</script>
<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
