// import './assets/main.css'
import '@/assets/style.css'

//import route
import {createRouter, createWebHistory} from "vue-router";

//import vue
import { createApp } from 'vue'

//base file vue
import App from './App.vue'

//import components pages
import Home from '@/pages/Home.vue'
import CardPortfolio from '@/pages/Portfolio.vue'
import Blog from '@/pages/Blog.vue'
// import Contact from '@/pages/Contact.vue'

const routes = [
    {
        path:'/',
        component: Home,
        name: Home
    },
    {
        path:'/Portfolio',
        component: CardPortfolio,
        name: CardPortfolio
    },
    {
        path:'/Blog',
        component: Blog,
        name:Blog
    },
    // {
    //     path:'/Contact',
    //     component: Contact,
    // }
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app');