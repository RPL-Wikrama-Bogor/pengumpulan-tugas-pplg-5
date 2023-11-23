import '@/assets/style.css'
import '@/assets/base.css'

import { createApp } from 'vue'
import App from './App.vue'
import { createRouter, createWebHistory } from 'vue-router';

import Beranda from './components/Beranda/Beranda.vue'
import Blog from './components/Beranda/Blog.vue'
import Portofolio from './components/Beranda/Portofolio.vue'
import Service from './components/Beranda/Service.vue'

const routes = [
    {
        path: "/",
        component: Beranda,
    },
    {
        path: "/blog",
        component: Blog,
    },
    {
        path: "/portofolio",
        component: Portofolio,
    },
    {
        path: "/service",
        component: Service,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

createApp(App).use(router).mount('#app')
