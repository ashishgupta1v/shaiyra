<template>
  <div class="min-h-screen" style="background-color:#fcf9f5; font-family:'Manrope',sans-serif;">
    <NavBar />

    <!-- Header -->
    <div class="pt-12 pb-8" style="background-color:#031632;">
      <div class="max-w-6xl mx-auto px-6">
        <p class="text-xs uppercase tracking-widest mb-2" style="color:#dcc0c0; opacity:0.5;">The roots and branches</p>
        <div class="flex items-end justify-between">
          <h1 class="font-serif text-5xl" style="color:#fcf9f5;">Family Tree</h1>
          <button v-if="store.isAdmin" @click="openAdd()"
            class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm"
            style="background-color:#dcc0c0; color:#031632;">
            <span class="material-symbols-outlined text-base">person_add</span>
            Add Member
          </button>
        </div>
      </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-12">
      <!-- Visual Tree SVG (generations) -->
      <div class="rounded-2xl p-8 mb-10 overflow-x-auto" style="background-color:#031632;">
        <h2 class="font-serif text-xl mb-6" style="color:#fcf9f5;">Shaiyra's Family</h2>
        <div class="flex flex-col items-center gap-0" style="min-width:600px;">
          <!-- Generation 0: Grandparents -->
          <div class="flex items-end justify-center gap-16 mb-0 relative">
            <div v-for="gp in grandparents" :key="gp.id" class="flex flex-col items-center gap-2">
              <div class="w-14 h-14 rounded-full flex items-center justify-center text-xl font-serif border-2" style="background-color:#ffffff15; border-color:#dcc0c030; color:#dcc0c0;">
                {{ gp.name[0] }}
              </div>
              <div class="text-center">
                <p class="text-xs font-medium" style="color:#fcf9f5;">{{ gp.name.split(' ')[0] }}</p>
                <p class="text-xs" style="color:#ffffff40;">{{ gp.relation }}</p>
              </div>
            </div>
          </div>

          <!-- Connector lines -->
          <div v-if="grandparents.length" class="flex justify-center">
            <div class="w-px h-8" style="background-color:#dcc0c030;"></div>
          </div>

          <!-- Generation 1: Parents -->
          <div class="flex items-start justify-center gap-24 relative">
            <div v-for="parent in parents" :key="parent.id" class="flex flex-col items-center gap-2">
              <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl font-serif border-2" style="background-color:#dcc0c020; border-color:#dcc0c060; color:#dcc0c0;">
                {{ parent.name[0] }}
              </div>
              <div class="text-center">
                <p class="text-sm font-medium" style="color:#fcf9f5;">{{ parent.name.split(' ')[0] }}</p>
                <p class="text-xs" style="color:#dcc0c080;">{{ parent.relation }}</p>
              </div>
            </div>
          </div>

          <!-- Connector -->
          <div class="flex justify-center">
            <div class="w-px h-8" style="background-color:#dcc0c050;"></div>
          </div>

          <!-- Generation 2: Shaiyra -->
          <div class="flex flex-col items-center gap-2">
            <div class="w-20 h-20 rounded-full flex items-center justify-center text-3xl font-serif border-2" style="background-color:#dcc0c030; border-color:#dcc0c0; color:#fcf9f5;">
              S
            </div>
            <div class="text-center">
              <p class="text-base font-serif" style="color:#dcc0c0;">Shaiyra Gupta</p>
              <p class="text-xs" style="color:#ffffff50;">Born April 29, 2026 · ⭐ The Star</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Member Cards Grid -->
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <div v-for="member in store.family" :key="member.id"
          class="group p-6 rounded-2xl border transition-all hover:-translate-y-0.5 hover:shadow-lg"
          style="background-color:white; border-color:#03163208;">
          <!-- Avatar -->
          <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-serif border" :style="avatarStyle(member.side)">
              {{ member.name[0] }}
            </div>
            <div>
              <h3 class="font-serif text-lg" style="color:#031632;">{{ member.name }}</h3>
              <p class="text-xs uppercase tracking-wider" style="color:#566252;">{{ member.relation }}</p>
            </div>
          </div>
          <!-- Bio -->
          <p v-if="member.bio" class="text-sm leading-relaxed mb-4" style="color:#566252; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">{{ member.bio }}</p>
          <!-- Tags -->
          <div class="flex flex-wrap gap-2">
            <span class="text-xs px-2 py-0.5 rounded-full" style="background-color:#fcf9f5; color:#566252; border:1px solid #56625215;">{{ member.generation === 0 ? 'Grandparent' : member.generation === 1 ? 'Parent' : member.generation === 2 ? 'Child' : 'Extended' }}</span>
            <span v-if="member.role === 'admin'" class="text-xs px-2 py-0.5 rounded-full" style="background-color:#dcc0c020; color:#a08060;">Admin</span>
          </div>
          <!-- Admin Actions -->
          <div v-if="store.isAdmin" class="flex items-center gap-2 mt-5 pt-4 border-t opacity-0 group-hover:opacity-100 transition-opacity" style="border-color:#03163210;">
            <button @click="openEdit(member)" class="flex items-center gap-1.5 text-xs px-3 py-1.5 rounded-lg" style="border:1px solid #03163220; color:#566252;">
              <span class="material-symbols-outlined text-sm">edit</span> Edit
            </button>
            <button @click="confirmDelete(member)" class="flex items-center gap-1.5 text-xs px-3 py-1.5 rounded-lg" style="border:1px solid #ff000020; color:#ef4444;">
              <span class="material-symbols-outlined text-sm">delete</span> Remove
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Add/Edit Modal -->
    <AppModal :show="showModal" :title="editingItem ? 'Edit Family Member' : 'Add Family Member'" size="lg" @close="closeModal">
      <div class="space-y-4">
        <div>
          <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Full Name</label>
          <input v-model="form.name" type="text" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Relation</label>
            <input v-model="form.relation" type="text" placeholder="Nana, Dadi, Mama..." class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
          </div>
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Side</label>
            <select v-model="form.side" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
              <option value="paternal">Paternal</option>
              <option value="maternal">Maternal</option>
              <option value="center">Center (Shaiyra)</option>
              <option value="extended">Extended</option>
            </select>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Generation</label>
            <select v-model.number="form.generation" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
              <option :value="0">Grandparents (Gen 0)</option>
              <option :value="1">Parents (Gen 1)</option>
              <option :value="2">Shaiyra (Gen 2)</option>
              <option :value="3">Extended</option>
            </select>
          </div>
          <div>
            <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Date of Birth</label>
            <input v-model="form.dob" type="date" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
          </div>
        </div>
        <div>
          <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Bio / Note</label>
          <textarea v-model="form.bio" rows="3" class="w-full px-4 py-3 rounded-xl border text-sm outline-none resize-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;"></textarea>
        </div>
      </div>
      <template #footer>
        <button @click="closeModal" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="saveItem" class="px-5 py-2.5 rounded-xl text-sm" style="background-color:#031632; color:#fcf9f5;">{{ editingItem ? 'Save Changes' : 'Add to Family' }}</button>
      </template>
    </AppModal>

    <!-- Delete Modal -->
    <AppModal :show="showDeleteModal" title="Remove Family Member" @close="showDeleteModal=false">
      <p class="text-sm" style="color:#566252;">Remove <strong style="color:#031632;">{{ deleteTarget?.name }}</strong> from the family tree?</p>
      <template #footer>
        <button @click="showDeleteModal=false" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="doDelete" class="px-5 py-2.5 rounded-xl text-sm bg-red-600 text-white">Remove</button>
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
