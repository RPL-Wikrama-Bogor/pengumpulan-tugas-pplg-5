import '@/assets/style.css'

import { createRouter, createWebHistory } from 'vue-router';
import { createApp } from 'vue'
import App from './App.vue'
import Home from '@/pages/Home.vue';
import Portfolio from '@/pages/Portfolio.vue';
import Blog from '@/pages/Blog.vue';
import Contact from '@/pages/Contact.vue'
const routes = [
    {
        path: '/',
        component: Home,
        name: 'Home',
    },
    {
        path: '/Portfolio',
        component: Portfolio,
        name: 'Portfolio',
    },
    {
        path: '/Blog',
        component: Blog,
        name: 'Blog',
    },
    {
        path: '/Contact',
        component: Contact,
        name: 'Contact',
    }
] 

const router = createRouter ({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app')
