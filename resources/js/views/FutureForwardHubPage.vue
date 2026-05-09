<template>
  <div class="animate-fade-in bg-navy min-h-screen pb-24 text-cream">
    <NavBar />

    <div class="max-w-5xl mx-auto px-6 pt-24 pb-16 relative">
      <div class="absolute inset-0 bg-gradient-to-br from-navy via-navy to-sage/10 -z-10"></div>
      
      <!-- Header -->
      <div class="mb-12" v-reveal="'reveal-up'">
        <p class="text-xs font-black tracking-[0.25em] text-gold uppercase mb-3 block">The horizon ahead</p>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <h1 class="font-serif text-5xl md:text-6xl font-light text-cream">Future Forward Hub</h1>
          <button v-if="store.isAdmin" class="transition-transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2 px-8 py-3 bg-gold text-navy text-xs font-black tracking-widest uppercase transition-colors hover:bg-gold/90 w-full md:w-auto">
            <span class="material-symbols-outlined text-base">edit</span>
            Edit Profile
          </button>
        </div>
        <p class="text-sm text-cream/60 font-light mt-4">This page grows with Shaiyra — today a baby, tomorrow a professional.</p>
      </div>

      <!-- Bio Card -->
      <div v-reveal="'reveal-up'" v-tilt class="p-8 border border-white/10 bg-white/5 mb-12 card-lift">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
          <div class="w-24 h-24 rounded-full flex items-center justify-center text-4xl font-serif border border-gold/30 bg-gold/5 text-gold flex-shrink-0 card-lift">
            S
          </div>
          <div class="flex-1 text-center md:text-left">
            <h2 class="font-serif text-3xl md:text-4xl text-cream mb-2">Shaiyra Gupta</h2>
            <p class="text-xs font-bold tracking-widest uppercase text-sage mb-6">{{ store.shaiyraAge }} <span class="text-white/20 mx-2">·</span> Born April 29, 2026</p>
            <p class="text-sm text-cream/80 leading-relaxed font-light">{{ store.portfolio?.bio || 'This is Shaiyra\'s growing profile — updated as she discovers herself.' }}</p>
          </div>
        </div>
      </div>

      <!-- Grid: Skills, Education, Achievements, Links -->
      <div class="grid md:grid-cols-2 gap-6 mb-16">
        <!-- Skills -->
        <div v-reveal="'reveal-up'" v-tilt class="p-8 border border-white/10 bg-white/5 card-lift">
          <div class="flex items-center justify-between mb-6 border-b border-white/10 pb-4">
            <h3 class="font-serif text-2xl text-cream">Skills & Interests</h3>
            <button v-if="store.isAdmin"  @click="addSkillModal=true" class="text-[10px] font-black tracking-widest uppercase px-4 py-2 border border-white/20 text-cream/60 hover:bg-white/10 transition-colors transition-transform hover:scale-105 active:scale-95">+ Add</button>
          </div>
          <div class="flex flex-wrap gap-3">
            <span v-for="(skill, i) in portfolio.skills" :key="i" class="group relative px-4 py-2 text-xs font-bold tracking-widest uppercase bg-sage/20 text-sage border border-sage/30 flex items-center gap-2">
              {{ skill }}
              <button v-if="store.isAdmin" @click="removeItem('skills', i)" class="opacity-0 group-hover:opacity-100 text-red-400/80 hover:text-red-400 transition-opacity ml-1">✕</button>
            </span>
            <p v-if="!portfolio.skills?.length" class="text-sm text-cream/40 font-light italic">Skills will appear as Shaiyra discovers her passions.</p>
          </div>
        </div>

        <!-- Education -->
        <div v-reveal="'reveal-up'" v-tilt :style="`transition-delay: 0.1s`" class="p-8 border border-white/10 bg-white/5 card-lift">
          <div class="flex items-center justify-between mb-6 border-b border-white/10 pb-4">
            <h3 class="font-serif text-2xl text-cream">Education</h3>
            <button v-if="store.isAdmin"  @click="addEduModal=true" class="text-[10px] font-black tracking-widest uppercase px-4 py-2 border border-white/20 text-cream/60 hover:bg-white/10 transition-colors transition-transform hover:scale-105 active:scale-95">+ Add</button>
          </div>
          <div class="space-y-4">
            <div v-for="(edu, i) in portfolio.education" :key="i" class="group flex items-start justify-between p-4 bg-navy/50 border border-white/5 hover:border-white/20 transition-colors">
              <div>
                <p class="text-sm font-bold text-cream mb-1">{{ edu.institution }}</p>
                <p class="text-[10px] font-bold tracking-widest uppercase text-cream/50">{{ edu.degree }} <span class="text-white/20 mx-1">·</span> {{ edu.year }}</p>
              </div>
              <button v-if="store.isAdmin" @click="removeItem('education', i)" class="opacity-0 group-hover:opacity-100 text-red-400/80 hover:text-red-400 transition-opacity">✕</button>
            </div>
            <p v-if="!portfolio.education?.length" class="text-sm text-cream/40 font-light italic">Education journey starts here.</p>
          </div>
        </div>

        <!-- Achievements -->
        <div v-reveal="'reveal-up'" v-tilt class="p-8 border border-white/10 bg-white/5 card-lift">
          <div class="flex items-center justify-between mb-6 border-b border-white/10 pb-4">
            <h3 class="font-serif text-2xl text-cream">Achievements</h3>
            <button v-if="store.isAdmin"  @click="addAchModal=true" class="text-[10px] font-black tracking-widest uppercase px-4 py-2 border border-white/20 text-cream/60 hover:bg-white/10 transition-colors transition-transform hover:scale-105 active:scale-95">+ Add</button>
          </div>
          <div class="space-y-4">
            <div v-for="(ach, i) in portfolio.achievements" :key="i" class="group flex items-center gap-4 p-4 bg-navy/50 border border-white/5 hover:border-white/20 transition-colors">
              <span class="text-2xl flex-shrink-0">{{ ach.icon || '🏆' }}</span>
              <div class="flex-1">
                <p class="text-sm font-bold text-cream mb-1">{{ ach.title }}</p>
                <p class="text-[10px] font-bold tracking-widest uppercase text-cream/50">{{ ach.year }}</p>
              </div>
              <button v-if="store.isAdmin" @click="removeItem('achievements', i)" class="opacity-0 group-hover:opacity-100 text-red-400/80 hover:text-red-400 transition-opacity">✕</button>
            </div>
            <p v-if="!portfolio.achievements?.length" class="text-sm text-cream/40 font-light italic">Every trophy, ribbon and gold star will live here.</p>
          </div>
        </div>

        <!-- Links -->
        <div v-reveal="'reveal-up'" v-tilt :style="`transition-delay: 0.1s`" class="p-8 border border-white/10 bg-white/5 card-lift">
          <div class="flex items-center justify-between mb-6 border-b border-white/10 pb-4">
            <h3 class="font-serif text-2xl text-cream">Links & Portfolio</h3>
            <button v-if="store.isAdmin"  @click="addLinkModal=true" class="text-[10px] font-black tracking-widest uppercase px-4 py-2 border border-white/20 text-cream/60 hover:bg-white/10 transition-colors transition-transform hover:scale-105 active:scale-95">+ Add</button>
          </div>
          <div class="space-y-3">
            <a v-for="(link, i) in portfolio.links" :key="i" :href="link.url" target="_blank"
              class="group flex items-center justify-between p-4 bg-navy/50 border border-white/5 hover:border-gold/30 hover:bg-gold/5 transition-all">
              <div class="flex items-center gap-3">
                <span class="text-xl">{{ link.icon || '🔗' }}</span>
                <span class="text-sm font-bold text-cream/90 group-hover:text-gold transition-colors">{{ link.label }}</span>
              </div>
              <span class="material-symbols-outlined text-sm text-cream/40 group-hover:text-gold transition-colors">open_in_new</span>
            </a>
            <p v-if="!portfolio.links?.length" class="text-sm text-cream/40 font-light italic">Portfolio links will appear here as Shaiyra builds her presence.</p>
          </div>
        </div>
      </div>

      <!-- Future Vision -->
      <div v-reveal="'reveal-up'" class="mt-8 p-12 text-center border-t border-white/10 relative">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 text-gold text-2xl bg-navy px-4">✧</div>
        <h3 class="font-serif text-3xl md:text-4xl mb-6 text-cream">The Story Isn't Written Yet</h3>
        <p class="text-sm max-w-2xl mx-auto leading-relaxed text-cream/60 font-light mb-10">
          This page is a placeholder for who Shaiyra will become. A doctor, an artist, an entrepreneur, an explorer — or something we haven't yet imagined. We're here for all of it.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-6">
          <RouterLink to="/milestones"  class="px-8 py-3 border border-white/20 text-cream text-xs font-bold tracking-widest uppercase hover:bg-white/5 transition-colors transition-transform hover:scale-105 active:scale-95">Her Milestones →</RouterLink>
          <RouterLink to="/letters-archive" v-if="store.isAdmin"  class="px-8 py-3 bg-blush text-navy text-xs font-black tracking-widest uppercase hover:bg-blush/90 transition-colors transition-transform hover:scale-105 active:scale-95">Letters to Her Future →</RouterLink>
        </div>
      </div>
    </div>

    <!-- Edit Bio Modal -->
    <AppModal :show="showEditBio" title="Edit Profile" @close="showEditBio=false">
      <div>
        <label class="block text-[10px] font-black tracking-widest uppercase text-navy/60 mb-3">Bio</label>
        <textarea v-model="bioForm" rows="5" class="w-full px-4 py-3 bg-navy/5 border border-navy/10 text-sm outline-none resize-none focus:border-navy/30 transition-colors"></textarea>
      </div>
      <template #footer>
        <button @click="showEditBio=false" class="px-8 py-3 border border-navy/20 text-navy/60 text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveBio" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">Save</button>
      </template>
    </AppModal>

    <!-- Add Skill Modal -->
    <AppModal :show="addSkillModal" title="Add Skill / Interest" @close="addSkillModal=false">
      <FloatingInput id="skill_input" label="e.g. Drawing, Piano, Coding..." v-model="newSkill" />
      <template #footer>
        <button @click="addSkillModal=false" class="px-8 py-3 border border-navy/20 text-navy/60 text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveSkill" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">Add</button>
      </template>
    </AppModal>

    <!-- Add Education Modal -->
    <AppModal :show="addEduModal" title="Add Education" @close="addEduModal=false">
      <div class="space-y-4">
        <FloatingInput id="edu_inst" label="School / University" v-model="newEdu.institution" />
        <FloatingInput id="edu_deg" label="Degree / Class" v-model="newEdu.degree" />
        <FloatingInput id="edu_year" label="Year / Year Range" v-model="newEdu.year" />
      </div>
      <template #footer>
        <button @click="addEduModal=false" class="px-8 py-3 border border-navy/20 text-navy/60 text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveEdu" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">Add</button>
      </template>
    </AppModal>

    <!-- Add Achievement Modal -->
    <AppModal :show="addAchModal" title="Add Achievement" @close="addAchModal=false">
      <div class="space-y-4">
        <FloatingInput id="ach_title" label="Achievement title" v-model="newAch.title" />
        <div class="grid grid-cols-2 gap-4">
          <FloatingInput id="ach_year" label="Year" v-model="newAch.year" />
          <FloatingInput id="ach_icon" label="Icon emoji 🏆" v-model="newAch.icon" />
        </div>
      </div>
      <template #footer>
        <button @click="addAchModal=false" class="px-8 py-3 border border-navy/20 text-navy/60 text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveAch" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">Add</button>
      </template>
    </AppModal>

    <!-- Add Link Modal -->
    <AppModal :show="addLinkModal" title="Add Link" @close="addLinkModal=false">
      <div class="space-y-4">
        <FloatingInput id="link_label" label="Label (e.g. LinkedIn, Portfolio)" v-model="newLink.label" />
        <FloatingInput id="link_url" label="URL (https://...)" v-model="newLink.url" />
        <FloatingInput id="link_icon" label="Icon emoji 🔗" v-model="newLink.icon" />
      </div>
      <template #footer>
        <button @click="addLinkModal=false" class="px-8 py-3 border border-navy/20 text-navy/60 text-xs font-bold tracking-widest uppercase hover:bg-navy/5 transition-colors w-full md:w-auto">Cancel</button>
        <button  @click="saveLink" class="px-8 py-3 bg-navy text-cream text-xs font-black tracking-widest uppercase hover:bg-navy/90 transition-colors w-full md:w-auto transition-transform hover:scale-105 active:scale-95">Add</button>
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
import FloatingInput from '@/components/FloatingInput.vue';

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
