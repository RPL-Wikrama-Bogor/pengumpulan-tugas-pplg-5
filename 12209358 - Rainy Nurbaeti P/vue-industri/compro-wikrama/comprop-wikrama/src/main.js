import  '@/assets/style.css'

//import route
import { createRouter, createWebHistory } from "vue-router" 
//import vue
import { createApp } from 'vue'
//base file vue
import App from './App.vue'
//import components pages
import Home from '@/pages/Home.vue'
import Portfolio from '@/pages/Portfolio.vue'
import Blog from '@/pages/Blog.vue'
//routing
const routes = [
    {
        path: '/' ,
        component: Home ,
        name: "Home" ,
    },
    {
        path: '/portfolio' ,
        component: Portfolio ,
        name: "Portfolio" ,
    },
    {
        path: '/blog' ,
        component: Blog ,
        name: "Blog" ,
    },
    
]
const router = createRouter ({
       history: createWebHistory() ,
       routes,
})

createApp(App).use(router).mount('#app')
