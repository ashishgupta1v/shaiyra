import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    // Root - Redirect to login
    { path: '/', redirect: '/auth/login' },

    // PHASE 1: Foundation & Shell
    { path: '/auth/login', alias: ['/login'], component: () => import('../views/LoginPage.vue'), name: 'login-page', meta: { public: true } },
    { path: '/dashboard', alias: ['/vault'], component: () => import('../views/DashboardPage.vue'), name: 'dashboard-page', meta: { requiresAuth: true } },

    // PHASE 2: Public Narrative
    { path: '/home', alias: ['/timeline', '/our-story'], component: () => import('../views/Screen11.vue'), name: 'home-page', meta: { public: true } },
    { path: '/life-feed', alias: ['/journal'], component: () => import('../views/Screen7.vue'), name: 'life-feed-page', meta: { public: true } },
    { path: '/milestones', alias: ['/gallery'], component: () => import('../views/Screen12.vue'), name: 'milestones-page', meta: { public: true } },
    { path: '/life-journey-age-4', alias: ['/current-favorites'], component: () => import('../views/Screen6.vue'), name: 'life-journey-page', meta: { public: true } },
    { path: '/achievements', alias: ['/tiny-triumphs'], component: () => import('../views/Screen15.vue'), name: 'achievements-page', meta: { public: true } },

    // PHASE 3: Private Vault
    { path: '/family-tree', component: () => import('../views/Screen8.vue'), name: 'family-tree-page', meta: { requiresAuth: true } },
    { path: '/family-portal', alias: ['/guestbook'], component: () => import('../views/Screen13.vue'), name: 'family-portal-page', meta: { requiresAuth: true } },
    { path: '/growth-tracker', component: () => import('../views/Screen5.vue'), name: 'growth-tracker-page', meta: { requiresAuth: true } },
    { path: '/wellness-archive', component: () => import('../views/Screen3.vue'), name: 'wellness-archive-page', meta: { requiresAuth: true } },

    // PHASE 4: Strategic Legacy & Transition
    { path: '/letters-archive', alias: ['/letters', '/legacy'], component: () => import('../views/Screen14.vue'), name: 'letters-archive-page', meta: { requiresAuth: true } },
    { path: '/public-family-tree', component: () => import('../views/Screen8.vue'), name: 'public-family-tree-page', meta: { public: true } },
    { path: '/future-forward-hub', alias: ['/future-forward', '/portfolio'], component: () => import('../views/Screen10.vue'), name: 'future-forward-page', meta: { requiresAuth: true } },
    { path: '/archive-export', component: () => import('../views/ArchiveExportPage.vue'), name: 'archive-export-page', meta: { requiresAuth: true } },
    { path: '/:pathMatch(.*)*', redirect: '/home' },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Navigation Guard for authentication
router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('auth_token');
    
    if (to.meta.requiresAuth && !isAuthenticated) {
        next({ name: 'login-page', query: { redirect: to.fullPath } });
    } else {
        next();
    }
});

export default router;
