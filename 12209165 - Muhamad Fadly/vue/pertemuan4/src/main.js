import "@/assets/style.css";
import { createApp } from "vue";
import App from "./App.vue";
import { createRouter, createWebHistory } from "vue-router";
import Home from "@/pages/Home.vue";
import Portfolio from "@/pages/Portfolio.vue";
import Blog from "@/pages/Blog.vue";
import contact from "@/pages/contact.vue";

const routes = [
  {
    path: "/",
    component: Home,
  },
  {
    path: "/Portfolio",
    component: Portfolio,
  },
  {
    path: "/Blog",
    component: Blog,
  },
  {
    path: "/contact",
    component: contact,
  },
];
const router = createRouter({
  history: createWebHistory(),
  routes,
});

createApp(App).use(router).mount("#app");
