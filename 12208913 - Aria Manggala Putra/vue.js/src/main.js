import "@/assets/style.css";
import { createApp } from "vue";
import App from "./App.vue";
import { createRouter, createWebHistory } from "vue-router";
import Portfolio from "@/pages/Portfolio.vue";
import Home from "@/pages/Home.vue";
import Contact from "@/pages/Contact.vue";
import Blog from "@/pages/Blog.vue";

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
});

createApp(App).use(router).mount("#app");
