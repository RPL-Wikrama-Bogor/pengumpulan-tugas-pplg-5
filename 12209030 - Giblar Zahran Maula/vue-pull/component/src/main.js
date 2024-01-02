

import { createApp } from 'vue'
import App from './App.vue'

import Btn from "@/components/myComponent/button.vue";

const app = createApp(App);

app.component("myBtn", Btn);
app.mount('#app');
