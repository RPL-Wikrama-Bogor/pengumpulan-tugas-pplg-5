// import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'

import Btn from '@/components/my-components/Button.vue';

// app a nya kecil agar tidak sama dengan pemanggilan App 
// App a ny besar karena sama dengan App dari import
const app = createApp(App);
app.component("MyBtn", Btn);
app.mount("#app");
