import { createRouter, createWebHistory } from 'vue-router';

// Create a simple Home component that links to all screens
const Home = {
    template: `
        <div class="p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-display-lg text-primary mb-6">Shaiyra's Digital Journal - UI Screens</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <router-link v-for="i in 15" :key="i" :to="'/screen-' + i" class="p-4 border rounded shadow-sm hover:shadow-md transition-shadow bg-white block text-center">
                    Screen {{ i }}
                </router-link>
            </div>
        </div>
    `
};

const routes = [
    { path: '/', component: Home },
    { path: '/screen-1', component: () => import('../views/Screen1.vue') },
    { path: '/screen-2', component: () => import('../views/Screen2.vue') },
    { path: '/screen-3', component: () => import('../views/Screen3.vue') },
    { path: '/screen-4', component: () => import('../views/Screen4.vue') },
    { path: '/screen-5', component: () => import('../views/Screen5.vue') },
    { path: '/screen-6', component: () => import('../views/Screen6.vue') },
    { path: '/screen-7', component: () => import('../views/Screen7.vue') },
    { path: '/screen-8', component: () => import('../views/Screen8.vue') },
    { path: '/screen-9', component: () => import('../views/Screen9.vue') },
    { path: '/screen-10', component: () => import('../views/Screen10.vue') },
    { path: '/screen-11', component: () => import('../views/Screen11.vue') },
    { path: '/screen-12', component: () => import('../views/Screen12.vue') },
    { path: '/screen-13', component: () => import('../views/Screen13.vue') },
    { path: '/screen-14', component: () => import('../views/Screen14.vue') },
    { path: '/screen-15', component: () => import('../views/Screen15.vue') },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
