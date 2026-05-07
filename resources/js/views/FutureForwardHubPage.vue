<template>
  <div class="min-h-screen" style="background-color:#fcf9f5; font-family:'Manrope',sans-serif;">
    <NavBar />

    <!-- Header -->
    <div class="pt-12 pb-8" style="background-color:#031632;">
      <div class="max-w-5xl mx-auto px-6">
        <p class="text-xs uppercase tracking-widest mb-2" style="color:#dcc0c0; opacity:0.5;">The horizon ahead</p>
        <div class="flex items-end justify-between">
          <h1 class="font-serif text-5xl" style="color:#fcf9f5;">Future Forward Hub</h1>
          <button v-if="store.isAdmin" @click="showEditBio=true"
            class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm"
            style="background-color:#dcc0c0; color:#031632;">
            <span class="material-symbols-outlined text-base">edit</span>
            Edit Profile
          </button>
        </div>
        <p class="text-sm mt-3" style="color:#ffffff50;">This page grows with Shaiyra — today a baby, tomorrow a professional.</p>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-12">
      <!-- Bio Card -->
      <div class="p-8 rounded-2xl mb-8" style="background-color:white; border:1px solid #03163208;">
        <div class="flex items-start gap-6">
          <div class="w-20 h-20 rounded-full flex items-center justify-center text-3xl font-serif border-2 flex-shrink-0" style="background-color:#dcc0c020; border-color:#dcc0c050; color:#a08060;">
            S
          </div>
          <div class="flex-1">
            <h2 class="font-serif text-3xl mb-1" style="color:#031632;">Shaiyra Gupta</h2>
            <p class="text-sm mb-1" style="color:#566252;">{{ store.shaiyraAge }} · Born April 29, 2026</p>
            <p class="text-base leading-relaxed mt-4" style="color:#566252;">{{ store.portfolio?.bio || 'This is Shaiyra\'s growing profile — updated as she discovers herself.' }}</p>
          </div>
        </div>
      </div>

      <!-- Grid: Skills, Education, Achievements, Links -->
      <div class="grid md:grid-cols-2 gap-6">
        <!-- Skills -->
        <div class="p-6 rounded-2xl" style="background-color:white; border:1px solid #03163208;">
          <div class="flex items-center justify-between mb-5">
            <h3 class="font-serif text-xl" style="color:#031632;">Skills & Interests</h3>
            <button v-if="store.isAdmin" @click="addSkillModal=true" class="text-xs px-3 py-1.5 rounded-lg" style="background-color:#fcf9f5; border:1px solid #03163215; color:#566252;">+ Add</button>
          </div>
          <div class="flex flex-wrap gap-2">
            <span v-for="(skill, i) in portfolio.skills" :key="i" class="group relative px-3 py-1.5 rounded-full text-sm flex items-center gap-2" style="background-color:#56625215; color:#566252;">
              {{ skill }}
              <button v-if="store.isAdmin" @click="removeItem('skills', i)" class="opacity-0 group-hover:opacity-100 text-red-400 text-xs">✕</button>
            </span>
            <p v-if="!portfolio.skills?.length" class="text-sm" style="color:#566252; opacity:0.5;">Skills will appear as Shaiyra discovers her passions.</p>
          </div>
        </div>

        <!-- Education -->
        <div class="p-6 rounded-2xl" style="background-color:white; border:1px solid #03163208;">
          <div class="flex items-center justify-between mb-5">
            <h3 class="font-serif text-xl" style="color:#031632;">Education</h3>
            <button v-if="store.isAdmin" @click="addEduModal=true" class="text-xs px-3 py-1.5 rounded-lg" style="background-color:#fcf9f5; border:1px solid #03163215; color:#566252;">+ Add</button>
          </div>
          <div class="space-y-3">
            <div v-for="(edu, i) in portfolio.education" :key="i" class="group flex items-start justify-between p-3 rounded-xl" style="background-color:#fcf9f5;">
              <div>
                <p class="text-sm font-medium" style="color:#031632;">{{ edu.institution }}</p>
                <p class="text-xs" style="color:#566252;">{{ edu.degree }} · {{ edu.year }}</p>
              </div>
              <button v-if="store.isAdmin" @click="removeItem('education', i)" class="opacity-0 group-hover:opacity-100 text-red-400 text-xs">✕</button>
            </div>
            <p v-if="!portfolio.education?.length" class="text-sm" style="color:#566252; opacity:0.5;">Education journey starts here.</p>
          </div>
        </div>

        <!-- Achievements -->
        <div class="p-6 rounded-2xl" style="background-color:white; border:1px solid #03163208;">
          <div class="flex items-center justify-between mb-5">
            <h3 class="font-serif text-xl" style="color:#031632;">Achievements</h3>
            <button v-if="store.isAdmin" @click="addAchModal=true" class="text-xs px-3 py-1.5 rounded-lg" style="background-color:#fcf9f5; border:1px solid #03163215; color:#566252;">+ Add</button>
          </div>
          <div class="space-y-3">
            <div v-for="(ach, i) in portfolio.achievements" :key="i" class="group flex items-start gap-3 p-3 rounded-xl" style="background-color:#fcf9f5;">
              <span class="text-xl flex-shrink-0">{{ ach.icon || '🏆' }}</span>
              <div class="flex-1">
                <p class="text-sm font-medium" style="color:#031632;">{{ ach.title }}</p>
                <p class="text-xs" style="color:#566252;">{{ ach.year }}</p>
              </div>
              <button v-if="store.isAdmin" @click="removeItem('achievements', i)" class="opacity-0 group-hover:opacity-100 text-red-400 text-xs">✕</button>
            </div>
            <p v-if="!portfolio.achievements?.length" class="text-sm" style="color:#566252; opacity:0.5;">Every trophy, ribbon and gold star will live here.</p>
          </div>
        </div>

        <!-- Links -->
        <div class="p-6 rounded-2xl" style="background-color:white; border:1px solid #03163208;">
          <div class="flex items-center justify-between mb-5">
            <h3 class="font-serif text-xl" style="color:#031632;">Links & Portfolio</h3>
            <button v-if="store.isAdmin" @click="addLinkModal=true" class="text-xs px-3 py-1.5 rounded-lg" style="background-color:#fcf9f5; border:1px solid #03163215; color:#566252;">+ Add</button>
          </div>
          <div class="space-y-2">
            <a v-for="(link, i) in portfolio.links" :key="i" :href="link.url" target="_blank"
              class="group flex items-center justify-between p-3 rounded-xl transition-all hover:bg-[#fcf9f5]"
              style="border:1px solid #03163210;">
              <div class="flex items-center gap-2">
                <span class="text-base">{{ link.icon || '🔗' }}</span>
                <span class="text-sm" style="color:#031632;">{{ link.label }}</span>
              </div>
              <span class="material-symbols-outlined text-sm" style="color:#566252;">open_in_new</span>
            </a>
            <p v-if="!portfolio.links?.length" class="text-sm" style="color:#566252; opacity:0.5;">Portfolio links will appear here as Shaiyra builds her presence.</p>
          </div>
        </div>
      </div>

      <!-- Future Vision -->
      <div class="mt-8 p-8 rounded-2xl text-center" style="background-color:#031632;">
        <h3 class="font-serif text-3xl mb-4" style="color:#fcf9f5;">The Story Isn't Written Yet</h3>
        <p class="text-base max-w-xl mx-auto leading-relaxed" style="color:#ffffff60;">
          This page is a placeholder for who Shaiyra will become. A doctor, an artist, an entrepreneur, an explorer — or something we haven't yet imagined. We're here for all of it.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
          <RouterLink to="/milestones" class="px-6 py-3 rounded-full text-sm border" style="border-color:#dcc0c0; color:#dcc0c0;">Her Milestones →</RouterLink>
          <RouterLink to="/letters-archive" v-if="store.isAdmin" class="px-6 py-3 rounded-full text-sm" style="background-color:#dcc0c0; color:#031632;">Letters to Her Future →</RouterLink>
        </div>
      </div>
    </div>

    <!-- Edit Bio Modal -->
    <AppModal :show="showEditBio" title="Edit Profile" @close="showEditBio=false">
      <div>
        <label class="block text-xs uppercase tracking-wider mb-2" style="color:#566252;">Bio</label>
        <textarea v-model="bioForm" rows="5" class="w-full px-4 py-3 rounded-xl border text-sm outline-none resize-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;"></textarea>
      </div>
      <template #footer>
        <button @click="showEditBio=false" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="saveBio" class="px-5 py-2.5 rounded-xl text-sm" style="background-color:#031632; color:#fcf9f5;">Save</button>
      </template>
    </AppModal>

    <!-- Add Skill Modal -->
    <AppModal :show="addSkillModal" title="Add Skill / Interest" @close="addSkillModal=false">
      <input v-model="newSkill" type="text" placeholder="e.g. Drawing, Piano, Coding..." class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
      <template #footer>
        <button @click="addSkillModal=false" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="saveSkill" class="px-5 py-2.5 rounded-xl text-sm" style="background-color:#031632; color:#fcf9f5;">Add</button>
      </template>
    </AppModal>

    <!-- Add Education Modal -->
    <AppModal :show="addEduModal" title="Add Education" @close="addEduModal=false">
      <div class="space-y-3">
        <input v-model="newEdu.institution" type="text" placeholder="School / University" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        <input v-model="newEdu.degree" type="text" placeholder="Degree / Class" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        <input v-model="newEdu.year" type="text" placeholder="Year / Year Range" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
      </div>
      <template #footer>
        <button @click="addEduModal=false" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="saveEdu" class="px-5 py-2.5 rounded-xl text-sm" style="background-color:#031632; color:#fcf9f5;">Add</button>
      </template>
    </AppModal>

    <!-- Add Achievement Modal -->
    <AppModal :show="addAchModal" title="Add Achievement" @close="addAchModal=false">
      <div class="space-y-3">
        <input v-model="newAch.title" type="text" placeholder="Achievement title" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        <div class="grid grid-cols-2 gap-3">
          <input v-model="newAch.year" type="text" placeholder="Year" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
          <input v-model="newAch.icon" type="text" placeholder="Icon emoji 🏆" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        </div>
      </div>
      <template #footer>
        <button @click="addAchModal=false" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="saveAch" class="px-5 py-2.5 rounded-xl text-sm" style="background-color:#031632; color:#fcf9f5;">Add</button>
      </template>
    </AppModal>

    <!-- Add Link Modal -->
    <AppModal :show="addLinkModal" title="Add Link" @close="addLinkModal=false">
      <div class="space-y-3">
        <input v-model="newLink.label" type="text" placeholder="Label (e.g. LinkedIn, Portfolio)" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        <input v-model="newLink.url" type="url" placeholder="https://..." class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
        <input v-model="newLink.icon" type="text" placeholder="Icon emoji 🔗" class="w-full px-4 py-3 rounded-xl border text-sm outline-none" style="border-color:#03163220; background-color:#fcf9f5; color:#031632;">
      </div>
      <template #footer>
        <button @click="addLinkModal=false" class="px-5 py-2.5 rounded-xl text-sm border" style="border-color:#03163220; color:#566252;">Cancel</button>
        <button @click="saveLink" class="px-5 py-2.5 rounded-xl text-sm" style="background-color:#031632; color:#fcf9f5;">Add</button>
      </template>
    </AppModal>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { RouterLink } from 'vue-router';
import { useJournalStore } from '@/stores/journal';
import NavBar from '@/components/NavBar.vue';
import AppModal from '@/components/AppModal.vue';

const store = useJournalStore();
store.init();

const portfolio = computed(() => store.portfolio || { bio:'', skills:[], education:[], achievements:[], links:[] });

const showEditBio = ref(false);
const bioForm = ref('');
const addSkillModal = ref(false);
const addEduModal = ref(false);
const addAchModal = ref(false);
const addLinkModal = ref(false);
const newSkill = ref('');
const newEdu = ref({ institution:'', degree:'', year:'' });
const newAch = ref({ title:'', year:'', icon:'🏆' });
const newLink = ref({ label:'', url:'', icon:'🔗' });

function saveBio() {
  store.updatePortfolio({ bio: bioForm.value });
  showEditBio.value = false;
}

function saveSkill() {
  if (!newSkill.value.trim()) return;
  const skills = [...(portfolio.value.skills || []), newSkill.value.trim()];
  store.updatePortfolio({ skills });
  newSkill.value = '';
  addSkillModal.value = false;
}

function saveEdu() {
  const education = [...(portfolio.value.education || []), { ...newEdu.value }];
  store.updatePortfolio({ education });
  newEdu.value = { institution:'', degree:'', year:'' };
  addEduModal.value = false;
}

function saveAch() {
  const achievements = [...(portfolio.value.achievements || []), { ...newAch.value }];
  store.updatePortfolio({ achievements });
  newAch.value = { title:'', year:'', icon:'🏆' };
  addAchModal.value = false;
}

function saveLink() {
  const links = [...(portfolio.value.links || []), { ...newLink.value }];
  store.updatePortfolio({ links });
  newLink.value = { label:'', url:'', icon:'🔗' };
  addLinkModal.value = false;
}

function removeItem(field, index) {
  const arr = [...(portfolio.value[field] || [])];
  arr.splice(index, 1);
  store.updatePortfolio({ [field]: arr });
}

// Open bio modal with current content
function openBio() {
  bioForm.value = portfolio.value.bio || '';
  showEditBio.value = true;
}
</script>
<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
