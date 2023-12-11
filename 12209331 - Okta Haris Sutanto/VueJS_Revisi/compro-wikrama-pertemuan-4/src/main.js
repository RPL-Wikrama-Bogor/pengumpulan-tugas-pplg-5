import "@/assets/style.css";
import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import Home from "@/pages/Home.vue";
import Portfolio from "@/pages/Portfolio.vue";
import Contact from "@/pages/Contact.vue";
import Blog from '@/pages/Blog.vue';

import App from "./App.vue";
const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/portfolio",
    name: "portfolio",
    component: Portfolio,
  },
  {
    path: "/contact",
    name: "contact",
    component: Contact,
  },
  {
    path: "/blog",
    name: "blog",
    component: Blog,
  }
];
const router = createRouter({
  history: createWebHistory(),
  routes,
  // Rute fallback untuk penanganan 404
  // Misalnya, dapat diarahkan ke halaman 404 khusus
  fallback: true,
});

createApp(App).use(router).mount("#app");
