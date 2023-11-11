// import './assets/main.css'
import "@/assets/style.css";

// import router
import {createRouter, createWebHistory } from "vue-router";

// import vue
import { createApp } from 'vue';

// import file vue
import App from './App.vue';

// import components pages
import home from '@/pages/home.vue';

// import portofolio
import portfolio from '@/pages/portfolio.vue';

// routing
const routes = [
    {
        path: '/',
        name: "home",
        component: home,
    },
    {  
        path: '/portfolio',
        component: portfolio,
    }
    
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})
createApp(App).use(router).mount('#app')
