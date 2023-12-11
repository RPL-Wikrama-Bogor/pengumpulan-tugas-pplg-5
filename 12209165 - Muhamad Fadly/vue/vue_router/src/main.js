import "./assets/style.css"

import { createApp } from "vue";
import App from "./App.vue";
// import Home from "@/pages/Home.vue";
// import About from "@/pages/About.vue";

// const routes = [
//     {
//     path: "/",
//     name: 'Home',
//     component: Home,
//     },
//     {
//     path: "/about",
//     name: 'About',
//     component: About,
//     },
// ];
// const router = createRouter({
//     history:createWebHistory(),
//     routes,
// });
createApp(App).mount("#app");
