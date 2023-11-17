// impor style csst
import '@/assets/style.css'

// import route
import {createRouter, createWebHistory} from 'vue-router';
// import vue
import { createApp } from 'vue'
// base file vue
import App from './App.vue'
// import components pages
import Home from '@/pages/Home.vue'

//routing
const routes = [
    {
        path : '/',
        component: Home,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app')
