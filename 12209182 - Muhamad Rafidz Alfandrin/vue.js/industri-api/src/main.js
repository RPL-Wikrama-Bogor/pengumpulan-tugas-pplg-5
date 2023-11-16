import "./assets/style.css"
import { createRouter, createWebHistory } from "vue-router";

import { createApp } from "vue";
import App from './App.vue';

import home from '@/pages/home.vue';
import portfolio from '@/pages/portfolio.vue';
import blog from '@/pages/blog.vue';

const routes = [
    {
        path: "/",
        component: home,
    },
    {
        path: '/portfolio',
        component: portfolio,
    },
    {
        path: "/blog",
        component: blog,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount("#app");
