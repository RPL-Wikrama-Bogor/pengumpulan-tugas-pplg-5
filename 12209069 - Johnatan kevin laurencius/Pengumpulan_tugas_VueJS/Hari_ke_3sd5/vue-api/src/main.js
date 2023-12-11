import '@/assets/style.css'

import {createRouter, createWebHistory } from "vue-router"
import { createApp } from 'vue'
import App from './App.vue'

import Home from '@/pages/Home.vue'
import Portofolio from '@/pages/Portofolio.vue'
import Contact from '@/pages/Contact.vue'
import Blog from '@/pages/Blog.vue'
const routes = [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/portofolio',
        component: Portofolio,
    },
    {
        path: '/contact',
        component: Contact,
    },
    {
        path: '/blog',
        component: Blog,
    },
    
]

const router = createRouter ({
    history: createWebHistory(),
    routes,
})
createApp(App).use(router).mount('#app')