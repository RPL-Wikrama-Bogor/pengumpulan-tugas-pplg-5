// import './assets/main.css'

import { createRouter, createWebHistory } from "vue-router";
import { createApp } from 'vue'
import App from './App.vue'
import Home from "@/pages/Home.vue";
import About from "@/pages/About.vue";

const routes = [
    {
        path: "/",
        component: Home,
        name: "Home",
    },
    {
        path: "/about",
        component: About,
        // name: About,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app');
