import { defineStore } from 'pinia';
import { ref, computed } from 'vue';

// ─── Design System ────────────────────────────────────────────────────────────
export const DS = {
  cream: '#fcf9f5',
  navy: '#031632',
  sage: '#566252',
  blush: '#dcc0c0',
  gold: '#c9a84c',
  lavender: '#b8a9c9',
};

// ─── Seed Data ────────────────────────────────────────────────────────────────
const SEED = {
  journalEntries: [
    {
      id: 1, date: '2026-04-29', title: 'Day One — You Are Here',
      content: 'At 3:42 AM, the world changed forever. Shaiyra Gupta arrived with a cry that felt like music. Seven pounds, three ounces of absolute perfection. Your mama cried. I cried. The nurses smiled. Welcome to your story, little one.',
      mood: '🌸', tags: ['birth', 'day-one', 'family'], pinned: true, photos: [],
    },
    {
      id: 2, date: '2026-05-01', title: 'First Night Home',
      content: 'We brought you home today and every corner of the house feels different — fuller, warmer, more alive. You slept in the crook of your mama\'s arm while I watched over both of you. This is everything.',
      mood: '🏠', tags: ['home', 'first-week'], pinned: false, photos: [],
    },
  ],
  milestones: [
    { id: 1, date: '2026-04-29', title: 'Born into the World', category: 'life', icon: '✨', description: 'Shaiyra Gupta arrived at 3:42 AM. Weight: 3.3 kg, Length: 51 cm.', media: [] },
    { id: 2, date: '2026-04-29', title: 'First Breath', category: 'health', icon: '🌬️', description: 'First independent breath, first cry, first look at the world.', media: [] },
    { id: 3, date: '2026-05-03', title: 'First Smile (Reflex)', category: 'development', icon: '😊', description: 'A tiny reflexive smile while sleeping. We choose to believe it was for us.', media: [] },
  ],
  growth: [
    { id: 1, date: '2026-04-29', ageLabel: 'Birth', weight: 3.3, height: 51, headCirc: 34, notes: 'Birth measurements', recordedBy: 'Hospital' },
    { id: 2, date: '2026-05-06', ageLabel: '1 week', weight: 3.1, height: 51.5, headCirc: 34.2, notes: 'Slight weight dip — normal newborn', recordedBy: 'Pediatrician' },
  ],
  letters: [
    {
      id: 1, title: 'On the Day You Were Born', date: '2026-04-29',
      from: 'Baba (Papa)', to: 'Shaiyra',
      content: 'My darling Shaiyra,\n\nToday you came into our world and I am still catching my breath...\n\nI have been waiting to meet you for months, but nothing could have prepared me for the overwhelming, humbling, heart-cracking love that arrived with you. You are seven pounds of pure miracle.\n\nI promise you this: I will try every single day to be worthy of being your father. I will teach you everything I know, and gladly learn from you in return.\n\nWith all my love, forever and always,\nYour Baba',
      locked: false, unlockDate: null, unlockAge: null, category: 'birth',
    },
    {
      id: 2, title: 'For Your 18th Birthday', date: '2026-04-29',
      from: 'Mama & Papa', to: 'Shaiyra',
      content: 'Our dearest Shaiyra,\n\nIf you are reading this, you are eighteen years old. We wrote this the week you were born, marveling at your tiny fingers...\n\n[Content unlocks on your birthday]',
      locked: true, unlockDate: '2044-04-29', unlockAge: 18, category: 'milestone',
    },
  ],
  family: [
    { id: 1, name: 'Ashish Gupta', relation: 'Papa', role: 'admin', generation: 1, side: 'paternal', photo: null, bio: 'Your devoted father, who wrote this website for you.', dob: null },
    { id: 2, name: 'Shaiyra\'s Mama', relation: 'Mama', role: 'admin', generation: 1, side: 'maternal', photo: null, bio: 'The woman who carried you and loves you beyond measure.', dob: null },
    { id: 3, name: 'Shaiyra Gupta', relation: 'Our Baby Girl', role: 'subject', generation: 2, side: 'center', photo: null, bio: 'Born April 29, 2026 — the star of this story.', dob: '2026-04-29' },
  ],
  wellness: [
    { id: 1, date: '2026-04-29', type: 'checkup', title: 'Birth Health Assessment', doctor: 'Hospital Pediatrician', notes: 'APGAR score 9/10. All vitals normal.', weight: 3.3, temperature: 36.8, vaccinations: [], medications: [] },
  ],
  gallery: [
    { id: 1, date: '2026-04-29', title: 'First Light', caption: 'Moments after arrival — the whole world in a tiny face.', type: 'photo', url: null, tags: ['birth', 'hospital'], album: 'Birth Day' },
  ],
  adventures: [
    { id: 1, date: '2026-05-01', title: 'First Ride Home', location: 'Hospital → Home', description: 'The drive home felt like the most careful, important journey we\'ve ever taken.', photos: [], tags: ['first', 'home'] },
  ],
  guestbook: [
    { id: 1, date: '2026-05-01', name: 'Nana (Maternal Grandmother)', relation: 'Grandmother', message: 'Shaiyra jaan, you are already the light of our family. Welcome to the world, my precious granddaughter.', approved: true },
  ],
  vibes: [
    { id: 1, label: 'Favorite Lullaby', value: 'Tujhe Kitna Chahne Lage', icon: '🎵', category: 'music' },
    { id: 2, label: 'First Smell', value: 'Johnson\'s baby powder & Mama\'s warmth', icon: '🌸', category: 'senses' },
    { id: 3, label: 'Sleep Style', value: 'Curled up like a tiny shrimp 🦐', icon: '💤', category: 'habits' },
  ],
  portfolio: {
    bio: 'Born April 29, 2026, in the heart of a family overflowing with love. Shaiyra\'s story is just beginning.',
    skills: [],
    education: [],
    achievements: [],
    links: [],
  },
};

// ─── Store ────────────────────────────────────────────────────────────────────
export const useJournalStore = defineStore('journal', () => {
  // Auth
  const isAdmin = ref(false);
  const ADMIN_EMAIL = 'ashishgupta1v@gmail.com';
  const ADMIN_PASSWORD = 'Shaiyra@2026';

  // Core data
  const journalEntries = ref([]);
  const milestones = ref([]);
  const growth = ref([]);
  const letters = ref([]);
  const family = ref([]);
  const wellness = ref([]);
  const gallery = ref([]);
  const adventures = ref([]);
  const guestbook = ref([]);
  const vibes = ref([]);
  const portfolio = ref({});

  // UI
  const activeModal = ref(null);
  const modalData = ref({});
  const notification = ref(null);

  // ── Auth ────────────────────────────────────────────────────────────────────
  function login(email, password) {
    if (email === ADMIN_EMAIL && password === ADMIN_PASSWORD) {
      isAdmin.value = true;
      localStorage.setItem('shaiyra_admin', JSON.stringify({ email, ts: Date.now() }));
      notify('Welcome back, Baba! 🌸', 'success');
      return true;
    }
    notify('Incorrect credentials.', 'error');
    return false;
  }

  function logout() {
    isAdmin.value = false;
    localStorage.removeItem('shaiyra_admin');
    notify('Signed out. The journal remains beautiful. 🌿', 'info');
  }

  function checkAuth() {
    const stored = localStorage.getItem('shaiyra_admin');
    if (stored) {
      try {
        const { ts } = JSON.parse(stored);
        // Session expires after 7 days
        if (Date.now() - ts < 7 * 24 * 60 * 60 * 1000) {
          isAdmin.value = true;
        } else {
          localStorage.removeItem('shaiyra_admin');
        }
      } catch {
        localStorage.removeItem('shaiyra_admin');
      }
    }
  }

  // ── Computed ────────────────────────────────────────────────────────────────
  const sortedJournal = computed(() =>
    [...journalEntries.value].sort((a, b) => new Date(b.date) - new Date(a.date))
  );

  const sortedMilestones = computed(() =>
    [...milestones.value].sort((a, b) => new Date(b.date) - new Date(a.date))
  );

  const sortedGrowth = computed(() =>
    [...growth.value].sort((a, b) => new Date(a.date) - new Date(b.date))
  );

  const unlockedLetters = computed(() =>
    letters.value.filter(l => !l.locked || (l.unlockDate && new Date() >= new Date(l.unlockDate)))
  );

  const lockedLetters = computed(() =>
    letters.value.filter(l => l.locked && (!l.unlockDate || new Date() < new Date(l.unlockDate)))
  );

  const approvedGuestbook = computed(() =>
    guestbook.value.filter(g => g.approved)
  );

  const shaiyraAge = computed(() => {
    const birth = new Date('2026-04-29');
    const now = new Date();
    const diffMs = now - birth;
    const days = Math.floor(diffMs / (1000 * 60 * 60 * 24));
    const weeks = Math.floor(days / 7);
    const months = Math.floor(days / 30.44);
    const years = Math.floor(days / 365.25);
    if (years > 0) return `${years} year${years > 1 ? 's' : ''} old`;
    if (months > 0) return `${months} month${months > 1 ? 's' : ''} old`;
    if (weeks > 0) return `${weeks} week${weeks > 1 ? 's' : ''} old`;
    return `${days} day${days !== 1 ? 's' : ''} old`;
  });

  const stats = computed(() => ({
    journalCount: journalEntries.value.length,
    milestonesCount: milestones.value.length,
    photosCount: gallery.value.length,
    lettersCount: letters.value.length,
    familyCount: family.value.length,
    adventuresCount: adventures.value.length,
  }));

  // ── CRUD: Journal ───────────────────────────────────────────────────────────
  function addJournalEntry(entry) {
    const id = Date.now();
    journalEntries.value.push({ id, ...entry, photos: entry.photos || [] });
    saveAll();
    notify('Journal entry saved. 📝', 'success');
    return id;
  }

  function updateJournalEntry(id, updates) {
    const idx = journalEntries.value.findIndex(e => e.id === id);
    if (idx !== -1) {
      journalEntries.value[idx] = { ...journalEntries.value[idx], ...updates };
      saveAll();
      notify('Entry updated. ✨', 'success');
    }
  }

  function deleteJournalEntry(id) {
    journalEntries.value = journalEntries.value.filter(e => e.id !== id);
    saveAll();
    notify('Entry removed.', 'info');
  }

  // ── CRUD: Milestones ────────────────────────────────────────────────────────
  function addMilestone(milestone) {
    const id = Date.now();
    milestones.value.push({ id, ...milestone, media: milestone.media || [] });
    saveAll();
    notify('Milestone recorded! 🎉', 'success');
    return id;
  }

  function updateMilestone(id, updates) {
    const idx = milestones.value.findIndex(m => m.id === id);
    if (idx !== -1) {
      milestones.value[idx] = { ...milestones.value[idx], ...updates };
      saveAll();
      notify('Milestone updated. ✨', 'success');
    }
  }

  function deleteMilestone(id) {
    milestones.value = milestones.value.filter(m => m.id !== id);
    saveAll();
    notify('Milestone removed.', 'info');
  }

  // ── CRUD: Growth ────────────────────────────────────────────────────────────
  function addGrowthRecord(record) {
    const id = Date.now();
    growth.value.push({ id, ...record });
    saveAll();
    notify('Growth record saved. 📏', 'success');
    return id;
  }

  function updateGrowthRecord(id, updates) {
    const idx = growth.value.findIndex(g => g.id === id);
    if (idx !== -1) {
      growth.value[idx] = { ...growth.value[idx], ...updates };
      saveAll();
    }
  }

  function deleteGrowthRecord(id) {
    growth.value = growth.value.filter(g => g.id !== id);
    saveAll();
  }

  // ── CRUD: Letters ───────────────────────────────────────────────────────────
  function addLetter(letter) {
    const id = Date.now();
    letters.value.push({ id, ...letter });
    saveAll();
    notify('Letter sealed with love. 💌', 'success');
    return id;
  }

  function updateLetter(id, updates) {
    const idx = letters.value.findIndex(l => l.id === id);
    if (idx !== -1) {
      letters.value[idx] = { ...letters.value[idx], ...updates };
      saveAll();
    }
  }

  function deleteLetter(id) {
    letters.value = letters.value.filter(l => l.id !== id);
    saveAll();
  }

  // ── CRUD: Family ────────────────────────────────────────────────────────────
  function addFamilyMember(member) {
    const id = Date.now();
    family.value.push({ id, ...member });
    saveAll();
    notify('Family member added. 👨‍👩‍👧', 'success');
    return id;
  }

  function updateFamilyMember(id, updates) {
    const idx = family.value.findIndex(f => f.id === id);
    if (idx !== -1) {
      family.value[idx] = { ...family.value[idx], ...updates };
      saveAll();
    }
  }

  function deleteFamilyMember(id) {
    family.value = family.value.filter(f => f.id !== id);
    saveAll();
  }

  // ── CRUD: Wellness ──────────────────────────────────────────────────────────
  function addWellnessRecord(record) {
    const id = Date.now();
    wellness.value.push({ id, ...record, vaccinations: record.vaccinations || [], medications: record.medications || [] });
    saveAll();
    notify('Health record saved. 🏥', 'success');
    return id;
  }

  function updateWellnessRecord(id, updates) {
    const idx = wellness.value.findIndex(w => w.id === id);
    if (idx !== -1) {
      wellness.value[idx] = { ...wellness.value[idx], ...updates };
      saveAll();
    }
  }

  function deleteWellnessRecord(id) {
    wellness.value = wellness.value.filter(w => w.id !== id);
    saveAll();
  }

  // ── CRUD: Gallery ───────────────────────────────────────────────────────────
  function addGalleryItem(item) {
    const id = Date.now();
    gallery.value.push({ id, ...item, tags: item.tags || [] });
    saveAll();
    notify('Memory added to gallery. 🖼️', 'success');
    return id;
  }

  function updateGalleryItem(id, updates) {
    const idx = gallery.value.findIndex(g => g.id === id);
    if (idx !== -1) {
      gallery.value[idx] = { ...gallery.value[idx], ...updates };
      saveAll();
    }
  }

  function deleteGalleryItem(id) {
    gallery.value = gallery.value.filter(g => g.id !== id);
    saveAll();
  }

  // ── CRUD: Adventures ────────────────────────────────────────────────────────
  function addAdventure(adventure) {
    const id = Date.now();
    adventures.value.push({ id, ...adventure, photos: adventure.photos || [], tags: adventure.tags || [] });
    saveAll();
    notify('Adventure logged! 🌍', 'success');
    return id;
  }

  function updateAdventure(id, updates) {
    const idx = adventures.value.findIndex(a => a.id === id);
    if (idx !== -1) {
      adventures.value[idx] = { ...adventures.value[idx], ...updates };
      saveAll();
    }
  }

  function deleteAdventure(id) {
    adventures.value = adventures.value.filter(a => a.id !== id);
    saveAll();
  }

  // ── CRUD: Guestbook ─────────────────────────────────────────────────────────
  function addGuestbookEntry(entry) {
    const id = Date.now();
    guestbook.value.push({ id, ...entry, approved: isAdmin.value });
    saveAll();
    notify(isAdmin.value ? 'Guestbook message published! 📖' : 'Message submitted for review. ✉️', 'success');
    return id;
  }

  function approveGuestbookEntry(id) {
    const idx = guestbook.value.findIndex(g => g.id === id);
    if (idx !== -1) {
      guestbook.value[idx].approved = true;
      saveAll();
      notify('Message approved!', 'success');
    }
  }

  function deleteGuestbookEntry(id) {
    guestbook.value = guestbook.value.filter(g => g.id !== id);
    saveAll();
  }

  // ── CRUD: Vibes ─────────────────────────────────────────────────────────────
  function addVibe(vibe) {
    const id = Date.now();
    vibes.value.push({ id, ...vibe });
    saveAll();
    notify('Vibe captured! ✨', 'success');
  }

  function updateVibe(id, updates) {
    const idx = vibes.value.findIndex(v => v.id === id);
    if (idx !== -1) {
      vibes.value[idx] = { ...vibes.value[idx], ...updates };
      saveAll();
    }
  }

  function deleteVibe(id) {
    vibes.value = vibes.value.filter(v => v.id !== id);
    saveAll();
  }

  // ── Portfolio ───────────────────────────────────────────────────────────────
  function updatePortfolio(updates) {
    portfolio.value = { ...portfolio.value, ...updates };
    saveAll();
  }

  // ── Modal helpers ───────────────────────────────────────────────────────────
  function openModal(name, data = {}) {
    activeModal.value = name;
    modalData.value = { ...data };
  }

  function closeModal() {
    activeModal.value = null;
    modalData.value = {};
  }

  // ── Notifications ───────────────────────────────────────────────────────────
  function notify(message, type = 'info') {
    notification.value = { message, type, id: Date.now() };
    setTimeout(() => { notification.value = null; }, 3500);
  }

  // ── Persistence ─────────────────────────────────────────────────────────────
  const STORAGE_KEY = 'shaiyra_journal_data';

  function saveAll() {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify({
        journalEntries: journalEntries.value,
        milestones: milestones.value,
        growth: growth.value,
        letters: letters.value,
        family: family.value,
        wellness: wellness.value,
        gallery: gallery.value,
        adventures: adventures.value,
        guestbook: guestbook.value,
        vibes: vibes.value,
        portfolio: portfolio.value,
        savedAt: new Date().toISOString(),
      }));
    } catch (e) {
      console.warn('[Shaiyra] Save failed:', e);
    }
  }

  function loadAll() {
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      if (!raw) return false;
      const data = JSON.parse(raw);
      if (data.journalEntries?.length) journalEntries.value = data.journalEntries;
      if (data.milestones?.length) milestones.value = data.milestones;
      if (data.growth?.length) growth.value = data.growth;
      if (data.letters?.length) letters.value = data.letters;
      if (data.family?.length) family.value = data.family;
      if (data.wellness?.length) wellness.value = data.wellness;
      if (data.gallery?.length) gallery.value = data.gallery;
      if (data.adventures?.length) adventures.value = data.adventures;
      if (data.guestbook?.length) guestbook.value = data.guestbook;
      if (data.vibes?.length) vibes.value = data.vibes;
      if (data.portfolio) portfolio.value = data.portfolio;
      return true;
    } catch (e) {
      console.warn('[Shaiyra] Load failed:', e);
      return false;
    }
  }

  function seedDefaults() {
    if (!journalEntries.value.length) journalEntries.value = SEED.journalEntries;
    if (!milestones.value.length) milestones.value = SEED.milestones;
    if (!growth.value.length) growth.value = SEED.growth;
    if (!letters.value.length) letters.value = SEED.letters;
    if (!family.value.length) family.value = SEED.family;
    if (!wellness.value.length) wellness.value = SEED.wellness;
    if (!gallery.value.length) gallery.value = SEED.gallery;
    if (!adventures.value.length) adventures.value = SEED.adventures;
    if (!guestbook.value.length) guestbook.value = SEED.guestbook;
    if (!vibes.value.length) vibes.value = SEED.vibes;
    if (!portfolio.value?.bio) portfolio.value = SEED.portfolio;
  }

  function exportData() {
    const data = JSON.parse(localStorage.getItem(STORAGE_KEY) || '{}');
    const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `shaiyra_journal_${new Date().toISOString().split('T')[0]}.json`;
    a.click();
    URL.revokeObjectURL(url);
    notify('Journal exported successfully! 💾', 'success');
  }

  function importData(jsonString) {
    try {
      const data = JSON.parse(jsonString);
      localStorage.setItem(STORAGE_KEY, jsonString);
      loadAll();
      notify('Journal imported successfully! 🎉', 'success');
    } catch {
      notify('Import failed — invalid file.', 'error');
    }
  }

  // ── Init ────────────────────────────────────────────────────────────────────
  function init() {
    checkAuth();
    const loaded = loadAll();
    if (!loaded) seedDefaults();
  }

  return {
    // state
    isAdmin, activeModal, modalData, notification,
    journalEntries, milestones, growth, letters, family,
    wellness, gallery, adventures, guestbook, vibes, portfolio,
    // computed
    sortedJournal, sortedMilestones, sortedGrowth,
    unlockedLetters, lockedLetters, approvedGuestbook,
    shaiyraAge, stats,
    // auth
    login, logout, checkAuth,
    // crud
    addJournalEntry, updateJournalEntry, deleteJournalEntry,
    addMilestone, updateMilestone, deleteMilestone,
    addGrowthRecord, updateGrowthRecord, deleteGrowthRecord,
    addLetter, updateLetter, deleteLetter,
    addFamilyMember, updateFamilyMember, deleteFamilyMember,
    addWellnessRecord, updateWellnessRecord, deleteWellnessRecord,
    addGalleryItem, updateGalleryItem, deleteGalleryItem,
    addAdventure, updateAdventure, deleteAdventure,
    addGuestbookEntry, approveGuestbookEntry, deleteGuestbookEntry,
    addVibe, updateVibe, deleteVibe,
    updatePortfolio,
    // modal
    openModal, closeModal,
    // notifications
    notify,
    // persistence
    saveAll, loadAll, seedDefaults, exportData, importData, init,
  };
});
