import '@/assets/style.css'

//import route
import { createRouter, createWebHistory } from "vue-router";
//import vue
import { createApp } from 'vue'
//base file vue
import App from './App.vue'
//import componen pages
import Home from '@/pages/Home.vue';
import Blog from '@/pages/Blog.vue'
import Portofolio from '@/pages/Portofolio.vue'
import Contact from '@/pages/Contact.vue'

//routing
const routes = [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/Blog',
        component: Blog,
        name: "Blog"
    },
    {
        path: '/Portofolio',
        component: Portofolio,
        name: "Portofolio"
    },
    {
        path: '/Contact',
        component: Contact,
        name: "Contact"
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app')
