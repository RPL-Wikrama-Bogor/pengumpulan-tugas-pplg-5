import '@/assets/style.css'

//import router
import {createRouter, createWebHistory } from "vue-router";

//import vue
import { createApp } from 'vue'

//import file vue
import App from './App.vue'

import Home from '@/pages/Home.vue';
import Blog from '@/pages/Blog.vue';
import Portofolio from '@/pages/portofolio.vue';
import Service from '@/pages/service.vue';

//routing
const routes = [
    {
        path: '/',
        component: Home,
        name: Home,
    },
    {
        path: '/portofolio',
        component: Portofolio,
        name: Portofolio,
    },
    {
        path: '/service',
        component: Service,
        name: Service,
    },
    {
        path: '/blog',
        component: Blog,
        name: Blog,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app');