<template>
  <div class="animate-fade-in bg-surface-warm min-h-screen pb-24">
    <!-- Header -->
    <div class="pt-24 pb-16 bg-sage relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-sage via-sage to-navy/20"></div>
      <div class="relative max-w-4xl mx-auto px-6">
        <p class="text-xs font-black tracking-[0.25em] text-cream/50 uppercase mb-3 block">Messages of love</p>
        <h1 class="font-serif text-5xl md:text-6xl font-light text-cream mb-4">Guestbook</h1>
        <p class="text-sm text-cream/70 font-light">Family and friends leaving their mark in Shaiyra's story.</p>
      </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-16">
      <!-- Write Message Form -->
      <div class="p-8 md:p-10 bg-white border border-sage/10 mb-16 card-lift">
        <h2 class="font-serif text-3xl text-navy mb-8">Leave a Message</h2>
        <div class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <FloatingInput id="guest_name" label="Your Name (Nana, Dadi, Chacha...)" v-model="guestForm.name" />
            <FloatingInput id="guest_relation" label="Your Relation (Grandmother, Uncle...)" v-model="guestForm.relation" />
          </div>
          <FloatingInput id="guest_message" label="Your Message to Shaiyra..." v-model="guestForm.message" type="textarea" rows="5" />
          <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pt-4 border-t border-sage/10">
            <p class="text-xs text-sage/70">Messages are reviewed before publishing.</p>
            <button class="transition-transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2 px-8 py-3 bg-sage text-cream text-xs font-black tracking-widest uppercase transition-colors hover:bg-sage/90 disabled:opacity-50">
              <span class="material-symbols-outlined text-sm">send</span>
              Send with Love
            </button>
          </div>
        </div>
      </div>

      <!-- Admin: Pending Messages -->
      <div v-if="store.isAdmin && pendingMessages.length" class="mb-16">
        <h2 class="font-serif text-2xl text-navy mb-6 flex items-center gap-3">
          <span class="w-2 h-2 rounded-full bg-blush animate-pulse"></span>
          Pending Approval ({{ pendingMessages.length }})
        </h2>
        <div class="space-y-4">
          <div v-for="msg in pendingMessages" :key="msg.id" class="p-6 bg-blush/5 border border-blush/20 flex flex-col md:flex-row md:items-start gap-4">
            <div class="w-12 h-12 rounded-full flex items-center justify-center font-serif text-xl bg-blush/20 text-blush flex-shrink-0">{{ msg.name[0] }}</div>
            <div class="flex-1">
              <div class="flex items-center gap-3 mb-2">
                <span class="font-bold text-navy">{{ msg.name }}</span>
                <span class="text-xs text-sage uppercase tracking-widest">{{ msg.relation }}</span>
              </div>
              <p class="text-sm text-sage/80 leading-relaxed font-serif italic">"{{ msg.message }}"</p>
            </div>
            <div class="flex items-center gap-2 mt-4 md:mt-0 flex-shrink-0">
              <button  @click="store.approveGuestbookEntry(msg.id)" class="px-4 py-2 bg-sage/10 text-sage text-xs font-bold tracking-widest uppercase hover:bg-sage/20 transition-colors border border-sage/20 transition-transform hover:scale-105 active:scale-95">Approve</button>
              <button  @click="store.deleteGuestbookEntry(msg.id)" class="px-4 py-2 bg-red-50 text-red-500 text-xs font-bold tracking-widest uppercase hover:bg-red-100 transition-colors border border-red-200 transition-transform hover:scale-105 active:scale-95">Reject</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Published Messages -->
      <h2 class="font-serif text-3xl text-navy mb-8">Messages for Shaiyra</h2>
      <div class="space-y-6">
        <div v-for="msg in store.approvedGuestbook" :key="msg.id"
          class="group p-8 bg-white border border-sage/10 transition-all hover:shadow-lg card-lift">
          <div class="flex flex-col md:flex-row items-start gap-6">
            <div class="w-14 h-14 rounded-full flex items-center justify-center text-2xl font-serif bg-surface-stone border border-sage/10 text-sage flex-shrink-0">
              {{ msg.name[0] }}
            </div>
            <div class="flex-1 w-full">
              <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 mb-4 pb-4 border-b border-sage/5">
                <span class="font-bold text-navy text-lg">{{ msg.name }}</span>
                <span class="text-xs font-bold tracking-widest text-sage uppercase">{{ msg.relation }}</span>
                <time class="text-xs text-sage/50 uppercase tracking-widest sm:ml-auto">{{ formatDate(msg.date) }}</time>
              </div>
              <p class="text-lg leading-relaxed font-serif text-navy/80 italic">"{{ msg.message }}"</p>
            </div>
          </div>
          <div v-if="store.isAdmin" class="flex justify-end mt-6 pt-4 border-t border-sage/5 opacity-0 group-hover:opacity-100 transition-opacity">
            <button  @click="store.deleteGuestbookEntry(msg.id)" class="text-xs px-4 py-2 border border-red-200 text-red-400 hover:bg-red-50 transition-colors uppercase tracking-widest font-bold transition-transform hover:scale-105 active:scale-95">Remove</button>
          </div>
        </div>

        <div v-if="!store.approvedGuestbook.length" class="text-center py-24 bg-white border border-sage/10">
          <span class="material-symbols-outlined text-6xl text-sage/30 block mb-6" style="font-variation-settings:'FILL' 1">forum</span>
          <p class="text-sage/70 mb-8">No messages yet — be the first to leave one for Shaiyra!</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useJournalStore } from '@/stores/journal';
import FloatingInput from '@/components/FloatingInput.vue';

const store = useJournalStore();
store.init();

const pendingMessages = computed(() => store.guestbook.filter(g => !g.approved));

const guestForm = ref({ name:'', relation:'', message:'' });

function submitGuest() {
  if (!guestForm.value.name || !guestForm.value.message) return;
  store.addGuestbookEntry({ ...guestForm.value, date: new Date().toISOString().split('T')[0] });
  guestForm.value = { name:'', relation:'', message:'' };
}

function formatDate(d) {
  if (!d) return '';
  return new Date(d).toLocaleDateString('en-IN', { day:'numeric', month:'long', year:'numeric' });
}
</script>
<style scoped>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
</style>
