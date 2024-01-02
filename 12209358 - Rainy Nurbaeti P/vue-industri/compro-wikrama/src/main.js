// import './assets/main.css'
import '@/assets/style.css'

// import route
import {createRouter, createWebHistory} from "vue-router"

// import vue
import { createApp } from 'vue'
// base file vue
import App from './App.vue'
// impor komonen pages nya
import Home from '@/pages/Home.vue'

// routing
const routes = [
    {
        path: '/',
        component: Home,
        name:Home,
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});
createApp(App).use(router).mount('#app')