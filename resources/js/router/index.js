import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    // Root
    { path: '/', redirect: '/home' },

    // ── PHASE 1: Foundation & Shell ──────────────────────────────────────────
    { path: '/auth/login', alias: ['/login'], component: () => import('../views/LoginPage.vue'), name: 'login-page', meta: { public: true, hideNav: true } },
    { path: '/dashboard',  alias: ['/vault'],  component: () => import('../views/DashboardPage.vue'), name: 'dashboard-page', meta: { requiresAdmin: true } },

    // ── PHASE 2: Public Narrative ────────────────────────────────────────────
    { path: '/home',       alias: ['/timeline', '/our-story'], component: () => import('../views/HomePage.vue'), name: 'home-page', meta: { public: true } },
    { path: '/life-feed',  alias: ['/journal'], component: () => import('../views/LifeFeedPage.vue'), name: 'life-feed-page', meta: { public: true } },
    { path: '/milestones', alias: ['/gallery'],  component: () => import('../views/MilestonesPage.vue'), name: 'milestones-page', meta: { public: true } },
    { path: '/achievements', component: () => import('../views/AchievementsPage.vue'), name: 'achievements-page', meta: { public: true } },

    // ── PHASE 3: Private Vault ───────────────────────────────────────────────
    { path: '/family-tree',     component: () => import('../views/FamilyTreePage.vue'),    name: 'family-tree-page',     meta: { requiresAdmin: true } },
    { path: '/family-portal',   alias: ['/guestbook'], component: () => import('../views/FamilyPortalPage.vue'),  name: 'family-portal-page',   meta: { public: true } },
    { path: '/growth-tracker',  component: () => import('../views/GrowthTrackerPage.vue'), name: 'growth-tracker-page',  meta: { requiresAdmin: true } },
    { path: '/wellness-archive',component: () => import('../views/WellnessArchivePage.vue'),name:'wellness-archive-page', meta: { requiresAdmin: true } },

    // ── PHASE 4: Strategic Legacy ────────────────────────────────────────────
    { path: '/letters-archive',   alias: ['/letters', '/legacy'], component: () => import('../views/LettersArchivePage.vue'),  name: 'letters-archive-page',  meta: { requiresAdmin: true } },
    { path: '/future-forward-hub',alias: ['/portfolio'],          component: () => import('../views/FutureForwardHubPage.vue'),name: 'future-forward-page',   meta: { public: true } },
    { path: '/archive-export',    component: () => import('../views/ArchiveExportPage.vue'), name: 'archive-export-page', meta: { requiresAdmin: true } },

    // Fallback
    { path: '/:pathMatch(.*)*', redirect: '/home' },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) return savedPosition;
        return { top: 0, behavior: 'smooth' };
    },
});

// Navigation Guard — use localStorage key 'shaiyra_admin' set by our store
router.beforeEach((to, from, next) => {
    const isAdmin = !!localStorage.getItem('shaiyra_admin');

    if (to.meta.requiresAdmin && !isAdmin) {
        next({ name: 'login-page', query: { redirect: to.fullPath } });
    } else {
        next();
    }
});

export default router;
