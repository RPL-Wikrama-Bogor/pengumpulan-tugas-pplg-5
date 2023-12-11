
import '@/assets/base.css'
import "@/assets/style.css";
import { createApp } from "vue";
import App from "./App.vue";
import { createRouter, createWebHistory } from "vue-router";
import Home from "@/pages/Home.vue";
import portfolio from "@/pages/Portofolio.vue";
import Blog from "@/pages/Blog.vue";
import Contact from "@/pages/Contact.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/Portofolio",
    name: "Portofolio",
    component: portfolio,
  },
  {
    path: "/Blog",
    component: Blog,
  },
  {
    path: "/Contact",
    name: "Contact",
    component: Contact,
  }

];
const router = createRouter({
  history: createWebHistory(),
  routes,
});

createApp(App).use(router).mount("#app");