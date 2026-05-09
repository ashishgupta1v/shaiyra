<template>
  <div class="animate-fade-in bg-surface-warm min-h-screen pb-24">
    <NavBar />

    <!-- Header -->
    <div class="pt-24 pb-16 bg-navy relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-navy to-navy/80"></div>
      <div class="relative max-w-6xl mx-auto px-6">
        <p class="text-xs font-black tracking-[0.25em] text-gold uppercase mb-3 block">The roots and branches</p>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <h1 class="font-serif text-5xl md:text-6xl font-light text-cream mb-4 md:mb-0">Family Tree</h1>
          <button class="transition-transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2 px-6 py-3 bg-gold text-navy text-xs font-black tracking-widest uppercase transition-colors hover:bg-gold/90 w-full md:w-auto card-lift">
            <span class="material-symbols-outlined text-sm">person_add</span>
            Add Member
          </button>
        </div>
      </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-12">
      <!-- Visual Tree SVG (generations) -->
      <div class="rounded-none bg-white border border-sage/10 p-8 mb-16 overflow-x-auto card-lift" v-tilt>
        <h2 class="font-serif text-2xl text-navy mb-10 text-center">Shaiyra's Family</h2>
        <div class="flex flex-col items-center gap-0" style="min-width:600px;">
          <!-- Generation 0: Grandparents -->
          <div class="flex items-end justify-center gap-16 mb-0 relative">
            <div v-for="gp in grandparents" :key="gp.id" class="flex flex-col items-center gap-3">
              <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl font-serif border border-sage/20 bg-surface-stone text-navy shadow-sm">
                {{ gp.name[0] }}
              </div>
              <div class="text-center">
                <p class="text-sm font-bold text-navy">{{ gp.name.split(' ')[0] }}</p>
                <p class="text-[10px] font-bold tracking-widest uppercase text-sage">{{ gp.relation }}</p>
              </div>
            </div>
          </div>

          <!-- Connector lines -->
          <div v-if="grandparents.length" class="flex justify-center mt-4">
            <div class="w-px h-8 bg-sage/20"></div>
          </div>

          <!-- Generation 1: Parents -->
          <div class="flex items-start justify-center gap-24 relative mt-4">
            <div v-for="parent in parents" :key="parent.id" class="flex flex-col items-center gap-3">
              <div class="w-20 h-20 rounded-full flex items-center justify-center text-3xl font-serif border-2 border-blush bg-blush/10 text-navy shadow-md">
                {{ parent.name[0] }}
              </div>
              <div class="text-center">
                <p class="text-base font-bold text-navy">{{ parent.name.split(' ')[0] }}</p>
                <p class="text-[10px] font-bold tracking-widest uppercase text-blush">{{ parent.relation }}</p>
              </div>
            </div>
          </div>

          <!-- Connector -->
          <div class="flex justify-center mt-4">
            <div class="w-px h-10 bg-sage/20"></div>
          </div>

          <!-- Generation 2: Shaiyra -->
          <div class="flex flex-col items-center gap-4 mt-4">
            <div class="w-28 h-28 rounded-full flex items-center justify-center text-5xl font-serif bg-navy text-cream shadow-xl ring-4 ring-navy/10">
              S
            </div>
            <div class="text-center">
              <p class="text-2xl font-serif text-navy">Shaiyra Gupta</p>
              <p class="text-[10px] font-bold tracking-widest uppercase text-sage mt-2">Born April 29, 2026 · The Star</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Member Cards Grid -->
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div v-for="(member, index) in store.family" :key="member.id" v-reveal="'reveal-up'" v-tilt :style="`transition-delay: ${index * 0.1}s`"
          class="group p-8 bg-white border border-sage/10 transition-all hover:shadow-xl card-lift">
          <!-- Avatar -->
          <div class="flex items-center gap-5 mb-6">
            <div class="w-14 h-14 rounded-full flex items-center justify-center text-2xl font-serif" :class="avatarStyle(member.side)">
              {{ member.name[0] }}
            </div>
            <div>
              <h3 class="font-serif text-xl text-navy">{{ member.name }}</h3>
              <p class="text-[10px] font-bold tracking-widest uppercase text-sage">{{ member.relation }}</p>
            </div>
          </div>
          <!-- Bio -->
          <p v-if="member.bio" class="text-sm leading-relaxed mb-6 text-sage/80 font-light" style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">{{ member.bio }}</p>
          <!-- Tags -->
          <div class="flex flex-wrap gap-2">
            <span class="text-[10px] font-bold tracking-widest uppercase px-3 py-1 border border-sage/20 text-sage">{{ member.generation === 0 ? 'Grandparent' : member.generation === 1 ? 'Parent' : member.generation === 2 ? 'Child' : 'Extended' }}</span>
            <span v-if="member.role === 'admin'" class="text-[10px] font-bold tracking-widest uppercase px-3 py-1 border border-blush/30 bg-blush/10 text-blush">Admin</span>
          </div>
          <!-- Admin Actions -->
          <div v-if="store.isAdmin" class="flex items-center gap-2 mt-6 pt-6 border-t border-sage/10 opacity-0 group-hover:opacity-100 transition-opacity">
            <button @click="openEdit(member)" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-sage/10 text-sage transition-colors">
              <span class="material-symbols-outlined text-sm">edit</span>
            </button>
            <button @click="confirmDelete(member)" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-red-50 text-red-400 transition-colors">
              <span class="material-symbols-outlined text-sm">delete</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Add/Edit Modal -->
    <AppModal :show="showModal" :title="editingItem ? 'Edit Family Member' : 'Add Family Member'" size="lg" @close="closeModal">
      <div class="space-y-6">
        <FloatingInput id="fam_name" label="Full Name" v-model="form.name" />
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <FloatingInput id="fam_relation" label="Relation (Nana, Dadi, Mama...)" v-model="form.relation" />
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-sage mb-2">Side</label>
            <select v-model="form.side" class="w-full px-4 py-3 bg-surface-stone border border-sage/20 text-navy outline-none focus:border-sage/50 transition-colors">
              <option value="paternal">Paternal</option>
              <option value="maternal">Maternal</option>
              <option value="center">Center (Shaiyra)</option>
              <option value="extended">Extended</option>
            </select>
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-xs font-bold tracking-widest uppercase text-sage mb-2">Generation</label>
            <select v-model.number="form.generation" class="w-full px-4 py-3 bg-surface-stone border border-sage/20 text-navy outline-none focus:border-sage/50 transition-colors">
              <option :value="0">Grandparents (Gen 0)</option>
              <option :value="1">Parents (Gen 1)</option>
              <option :value="2">Shaiyra (Gen 2)</option>
              <option :value="3">Extended</option>
            </select>
          </div>
          <FloatingInput id="fam_dob" label="Date of Birth" type="date" v-model="form.dob" />
        </div>
        <FloatingInput id="fam_bio" label="Bio / Note" type="textarea" rows="3" v-model="form.bio" />
      </div>
      <template #footer>
        <button @click="closeModal" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveItem" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">
          {{ editingItem ? 'Save Changes' : 'Add to Family' }}
        </button>
      </template>
    </AppModal>

    <!-- Delete Modal -->
    <AppModal :show="showDeleteModal" title="Remove Family Member" @close="showDeleteModal=false">
      <p class="text-navy/70 leading-relaxed">Remove <strong class="text-navy font-bold">{{ deleteTarget?.name }}</strong> from the family tree?</p>
      <template #footer>
        <button @click="showDeleteModal=false" class="px-8 py-3 border border-navy/20 text-navy text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="doDelete" class="px-8 py-3 bg-red-600 text-white text-xs font-black tracking-widest uppercase hover:bg-red-700 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">Remove</button>
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

const showModal = ref(false);
const editingItem = ref(null);
const showDeleteModal = ref(false);
const deleteTarget = ref(null);

const grandparents = computed(() => store.family.filter(f => f.generation === 0));
const parents = computed(() => store.family.filter(f => f.generation === 1));

function avatarStyle(side) {
  const styles = {
    paternal: 'background-color:#dcc0c020; border-color:#dcc0c040; color:#a08060;',
    maternal: 'background-color:#b8a9c920; border-color:#b8a9c940; color:#7060a0;',
    center:   'background-color:#03163210; border-color:#03163240; color:#031632;',
    extended: 'background-color:#56625220; border-color:#56625240; color:#566252;',
  };
  return styles[side] || styles.extended;
}

const defaultForm = () => ({
  name:'', relation:'', side:'paternal', generation:1, dob:null, bio:'', role:'family',
});
const form = ref(defaultForm());

function openAdd() { form.value = defaultForm(); editingItem.value = null; showModal.value = true; }
function openEdit(item) { form.value = { ...item }; editingItem.value = item; showModal.value = true; }
function closeModal() { showModal.value = false; editingItem.value = null; }

function saveItem() {
  if (editingItem.value) store.updateFamilyMember(editingItem.value.id, form.value);
  else store.addFamilyMember(form.value);
  closeModal();
}

function confirmDelete(item) { deleteTarget.value = item; showDeleteModal.value = true; }
function doDelete() { store.deleteFamilyMember(deleteTarget.value.id); showDeleteModal.value = false; }
</script>
<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
